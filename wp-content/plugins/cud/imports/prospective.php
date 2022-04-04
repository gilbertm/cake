<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/prospective/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/prospective/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $prospective = json_decode($body); {
            if (!empty($prospective)) {
                $prospective_id = add_prospective($prospective[0]);

                if ($prospective_id) {
                    $url = $prospective[0]->view_node;

                    delete_add_custom_permalink($prospective_id, $url);
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


function add_prospective($prospective)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($prospective->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'prospective'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $prospective->nid, $prospective->status, "prospective", null);

            $post_status = ($prospective->status === "True") ? 'publish' : 'draft';

            $prospective_add = array(
                'title' => wp_strip_all_tags($prospective->title),
                'content' => $prospective->body,
                'author'   => 1,
                'date_gmt' => $prospective->created,
                'date' => $prospective->created,
                'status' => $post_status,
                'slug' => $new_slug
            );
    

            $prospective_id = pods('prospective')->add($prospective_add);

            $pod =  pods('prospective', $prospective_id);

            $arr_prospective_subtag_ids = array();

            if ($prospective_id) {

                $prospective_tag = term_exists( 'Prospective', 'category' );

                if ($prospective_tag) {

                    $prospective_tag_id = $prospective_tag['term_id'];

                    if ($prospective->field_tags) 
                    {

                        $arr_prospective_tag_subcategories = explode(",", $prospective->field_tags);

                        if (is_array($arr_prospective_tag_subcategories) && count($arr_prospective_tag_subcategories)) 
                        {
                            foreach ($arr_prospective_tag_subcategories as $value) {
                                
                                if ($prospective_subtag = term_exists(trim($value), 'category')) {
                                    array_push($arr_prospective_subtag_ids, $prospective_subtag['term_id']);
                                } else {
                                    $prospective_subtag = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $prospective_tag_id
                                        )
                                    );   
                                    array_push($arr_prospective_subtag_ids, $prospective_subtag['term_id']);                                 
                                }
                            }
                        } else {
                            if ($prospective_subtag = term_exists(trim($prospective->field_tags), 'category')) {
                            } else {
                                array_push($arr_prospective_subtag_ids, $prospective_subtag['term_id']);          
                            }
                        }

                    }

                    if (count($arr_prospective_subtag_ids)) {
                        wp_set_post_categories( $prospective_id, $arr_prospective_subtag_ids );
                    }

                }
              
                $pod->save('reference_node_id', $prospective->nid);

                if (!empty($prospective->field_image)) 
                {
                    $prospective_image = explode(",", $prospective->field_image);

                    if (is_array($prospective_image) && count($prospective_image)) 
                    {
                        $ctr = 1;

                        foreach ($prospective_image as $value) {
                            
                            $img_id = add_image($url_address, trim($value), $prospective_id, ($ctr == 1) ? true : false);

                            if ($img_id) {
                                $pod->add_to('image', $img_id); 
                            }

                            $ctr++;
                        }

                    } else {
                        $img_id = add_image($url_address,  $prospective_image, $prospective_id, true);

                        $pod->add_to('image', $img_id); 
                    }
                }
                
                echo "..  " . $prospective_id . " success <br />";

                return $prospective_id;
            }

            return "--error--. prospective id generated is not valid";

        } catch (Exception $e) {

            return "--error--" . $e->message;
        }
    }

    echo "<br />";

    return null;
}


function add_image($url_address, $image_url, $prospective_id, $thumbnail = false) {

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
                set_post_thumbnail($prospective_id, $attach_id);
            }

            return $attach_id;
    }
        
}