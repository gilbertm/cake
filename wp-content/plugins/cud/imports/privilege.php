<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/privileges/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/privileges/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $privilege = json_decode($body); {
            if (!empty($privilege)) {
                $privilege_id = add_privilege($privilege[0]);

                if ($privilege_id) {
                    $url = $privilege[0]->view_node;

                    delete_add_custom_permalink($privilege_id, $url);
                }
            }
        }
    }
}

function delete_add_custom_permalink($post_id, $custom_permalink)
{
    delete_post_meta($post_id, 'custom_permalink');

    $permalink = str_replace('%2F', '/', urlencode(ltrim(stripcslashes($custom_permalink), "/")));

    $permalink = str_replace('staging/', '', $permalink);

    add_post_meta(
        $post_id,
        'custom_permalink',
        $permalink
    );
}

function custom_post_permalink($custom_permalink)
{

    $url = $custom_permalink;

    return $url;
}


function add_privilege($privilege)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($privilege->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'privilege'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $privilege->nid, $privilege->status, "privilege", null);

            $post_status = ($privilege->status === "True") ? 'publish' : 'draft';

            $privilege_add = array(
                'title' => wp_strip_all_tags($privilege->title),
                'content' => $privilege->body,
                'excerpt' => $privilege->body_1,
                'author'   => 1,
                'date_gmt' => $privilege->created,
                'date' => $privilege->created,
                'status' => $post_status,
                'slug' => $new_slug
            );
    

            $privilege_id = pods('privilege')->add($privilege_add);

            $pod =  pods('privilege', $privilege_id);

            $arr_privilege_subtag_ids = array();

            if ($privilege_id) {

                $privilege_tag = term_exists( 'Privilege', 'category' );

                if ($privilege_tag) {

                    $privilege_tag_id = $privilege_tag['term_id'];

                    if ($privilege->field_tags) 
                    {

                        $arr_privilege_tag_subcategories = explode(",", $privilege->field_tags);

                        if (is_array($arr_privilege_tag_subcategories) && count($arr_privilege_tag_subcategories)) 
                        {
                            foreach ($arr_privilege_tag_subcategories as $value) {
                                
                                if ($privilege_subtag = term_exists(trim($value), 'category')) {
                                    array_push($arr_privilege_subtag_ids, $privilege_subtag['term_id']);
                                } else {
                                    $privilege_subtag = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $privilege_tag_id
                                        )
                                    );   
                                    array_push($arr_privilege_subtag_ids, $privilege_subtag['term_id']);                                 
                                }
                            }
                        } else {
                            if ($privilege_subtag = term_exists(trim($privilege->field_tags), 'category')) {
                            } else {
                                array_push($arr_privilege_subtag_ids, $privilege_subtag['term_id']);          
                            }
                        }

                    }

                    if ($privilege->field_group_privilege) 
                    {

                        $arr_privilege_type_subcategories = explode(",", $privilege->field_group_privilege);

                        if (is_array($arr_privilege_type_subcategories) && count($arr_privilege_type_subcategories)) 
                        {
                            foreach ($arr_privilege_type_subcategories as $value) {
                                
                                if ($privilege_subtype = term_exists(trim($value), 'category')) {
                                    array_push($arr_privilege_subtag_ids, $privilege_subtype['term_id']);
                                } else {
                                    $privilege_subtype = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $privilege_tag_id
                                        )
                                    );   
                                    array_push($arr_privilege_subtag_ids, $privilege_subtype['term_id']);                                 
                                }
                            }
                        } else {
                            if ($privilege_subtype = term_exists(trim($privilege->field_group_privilege), 'category')) {
                            } else {
                                array_push($arr_privilege_subtag_ids, $privilege_subtype['term_id']);          
                            }
                        }

                    }

                    if (count($arr_privilege_subtag_ids)) {
                        wp_set_post_categories( $privilege_id, $arr_privilege_subtag_ids );
                    }

                }
              
                $pod->save('reference_node_id', $privilege->nid);

                if (!empty($privilege->field_image)) 
                {
                    $privilege_image = explode(",", $privilege->field_image);

                    if (is_array($privilege_image) && count($privilege_image)) 
                    {
                        $ctr = 1;

                        foreach ($privilege_image as $value) {
                            
                            $img_id = add_image($url_address, trim($value), $privilege_id, ($ctr == 1) ? true : false);

                            if ($img_id) {
                                $pod->add_to('image', $img_id); 
                            }

                            $ctr++;
                        }

                    } else {
                        $img_id = add_image($url_address,  $privilege_image, $privilege_id, true);

                        $pod->add_to('image', $img_id); 
                    }
                }
                
                echo "..  " . $privilege_id . " success <br />";

                return $privilege_id;
            }

            return "--error--. privilege id generated is not valid";

        } catch (Exception $e) {

            return "--error--. $e->message";
        }
    }

    echo "<br />";

    return null;
}


function add_image($url_address, $image_url, $privilege_id, $thumbnail = false) {

    $image_url = str_replace('%2F', '/', ltrim(stripcslashes($image_url), "/"));

    $image_url = str_replace('staging/', '/', $url_address . $image_url);


    if (@getimagesize($image_url)) {

            // Add Featured Image to Post
            $image_name       = basename($image_url);
            $upload_dir       = wp_upload_dir();
            $image_data       = file_get_contents($image_url);
            $unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
            $filename         = basename($unique_file_name);

            if (wp_mkdir_p($upload_dir['path'])) {
                $file = $upload_dir['path'] . '/' . $filename;
            } else {
                $file = $upload_dir['basedir'] . '/' . $filename;
            }

            file_put_contents($file, $image_data);

            $wp_filetype = wp_check_filetype($filename, null);

            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title'     => sanitize_file_name($filename),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );

            $attach_id = wp_insert_attachment($attachment, $file);

            require_once(ABSPATH . 'wp-admin/includes/image.php');

            $attach_data = wp_generate_attachment_metadata($attach_id, $file);

            wp_update_attachment_metadata($attach_id, $attach_data);

            if ($thumbnail) {
                set_post_thumbnail($privilege_id, $attach_id);
            }

            return $attach_id;
    }
        
}