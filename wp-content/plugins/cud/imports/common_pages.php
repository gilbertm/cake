<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/common-pages/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/common-pages/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $pages = json_decode($body); {
            if (!empty($pages)) {
                $pages_id = add_pages($pages[0]);

                if ($pages_id) {
                    $url = $pages[0]->view_node;

                    delete_add_custom_permalink($pages_id, $url);
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


function add_pages($pages)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($pages->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'common'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $pages->nid, $pages->status, "common", null);

            $post_status = ($pages->status === "True") ? 'publish' : 'draft';

            $pages_add = array(
                'title' => wp_strip_all_tags($pages->title),
                'content' => $pages->body,
                'author'   => 1,
                'date_gmt' => $pages->created,
                'date' => $pages->created,
                'status' => $post_status,
                'slug' => $new_slug
            );
    

            $pages_id = pods('common')->add($pages_add);

            $pod =  pods('common', $pages_id);

            $arr_pages_subtag_ids = array();

            if ($pages_id) {

                $pages_tag = term_exists( 'Common Page', 'category' );

                if ($pages_tag) {

                    $pages_tag_id = $pages_tag['term_id'];

                    if ($pages->field_tags) 
                    {

                        $arr_pages_tag_subcategories = explode(",", $pages->field_tags);

                        if (is_array($arr_pages_tag_subcategories) && count($arr_pages_tag_subcategories)) 
                        {
                            foreach ($arr_pages_tag_subcategories as $value) {
                                
                                if ($pages_subtag = term_exists(trim($value), 'category')) {
                                    array_push($arr_pages_subtag_ids, $pages_subtag['term_id']);
                                } else {
                                    $pages_subtag = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $pages_tag_id
                                        )
                                    );   
                                    array_push($arr_pages_subtag_ids, $pages_subtag['term_id']);                                 
                                }
                            }
                        } else {
                            if ($pages_subtag = term_exists(trim($pages->field_tags), 'category')) {
                            } else {
                                array_push($arr_pages_subtag_ids, $pages_subtag['term_id']);          
                            }
                        }

                    }

                    if ($pages->type) 
                    {

                        $arr_pages_type_subcategories = explode(",", $pages->type);

                        if (is_array($arr_pages_type_subcategories) && count($arr_pages_type_subcategories)) 
                        {
                            foreach ($arr_pages_type_subcategories as $value) {
                                
                                if ($pages_subtype = term_exists(trim($value), 'category')) {
                                    array_push($arr_pages_subtag_ids, $pages_subtype['term_id']);
                                } else {
                                    $pages_subtype = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $pages_tag_id
                                        )
                                    );   
                                    array_push($arr_pages_subtag_ids, $pages_subtype['term_id']);                                 
                                }
                            }
                        } else {
                            if ($pages_subtype = term_exists(trim($pages->type), 'category')) {
                            } else {
                                array_push($arr_pages_subtag_ids, $pages_subtype['term_id']);          
                            }
                        }

                    }

                    if (count($arr_pages_subtag_ids)) {
                        wp_set_post_categories( $pages_id, $arr_pages_subtag_ids );
                    }

                }

                $pod->save('reference_node_id', $pages->nid);

                if (!empty($pages->field_image)) 
                {
                    $pages_image = explode(",", $pages->field_image);

                    if (is_array($pages_image) && count($pages_image)) 
                    {
                        $ctr = 1;

                        foreach ($pages_image as $value) {
                            
                            $img_id = add_image($url_address, trim($value), $pages_id, ($ctr == 1) ? true : false);

                            if ($img_id) {
                                $pod->add_to('image', $img_id); 
                            }

                            $ctr++;
                        }

                    } else {
                        $img_id = add_image($url_address,  $pages_image, $pages_id, true);

                        $pod->add_to('image', $img_id); 
                    }
                }
                
                echo "..  " . $pages_id . " success <br />";

                return $pages_id;
            }

            return "--error--. pages id generated is not valid";

        } catch (Exception $e) {

            return "--error--. $e->message";
        }
    }

    echo "<br />";

    return null;
}


function add_image($url_address, $image_url, $pages_id, $thumbnail = false) {

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
                set_post_thumbnail($pages_id, $attach_id);
            }

            return $attach_id;
    }
        
}