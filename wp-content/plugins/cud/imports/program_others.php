<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/program_other/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/program_other/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $program_others = json_decode($body); {
            if (!empty($program_others)) {
                $program_others_id = add_program_others($program_others[0]);

                if ($program_others_id) {
                    $url = $program_others[0]->view_node;

                    delete_add_custom_permalink($program_others_id, $url);
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


function add_program_others($program_others)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($program_others->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'program_other'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $program_others->nid, $program_others->status, "program_other", null);

            $post_status = ($program_others->status === "True") ? 'publish' : 'draft';

            $program_others_add = array(
                'title' => wp_strip_all_tags($program_others->title),
                'content' => $program_others->body,
                'excerpt' => $program_others->body_1,
                'author'   => 1,
                'date_gmt' => $program_others->created,
                'date' => $program_others->created,
                'status' => $post_status,
                'slug' => $new_slug
            );
    

            $program_others_id = pods('program_other')->add($program_others_add);

            $pod =  pods('program_other', $program_others_id);

            $arr_program_others_subtag_ids = array();

            if ($program_others_id) {

                $program_others_tag = term_exists( 'Program Other', 'category' );

                if ($program_others_tag) {

                    $program_others_tag_id = $program_others_tag['term_id'];

                    if ($program_others->field_course_categories) 
                    {

                        $arr_program_others_tag_subcategories = explode(",", $program_others->field_course_categories);

                        if (is_array($arr_program_others_tag_subcategories) && count($arr_program_others_tag_subcategories)) 
                        {
                            foreach ($arr_program_others_tag_subcategories as $value) {
                                
                                if ($program_others_subtag = term_exists(trim($value), 'category', $program_others_tag_id)) {
                                    array_push($arr_program_others_subtag_ids, $program_others_subtag['term_id']);
                                    
                                    $pod->add_to('classification', $program_others_subtag['term_id']); 

                                } else {
                                    $program_others_subtag = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $program_others_tag_id
                                        )
                                    );   
                                    array_push($arr_program_others_subtag_ids, $program_others_subtag['term_id']);
                                    
                                    $pod->add_to('classification', $program_others_subtag['term_id']); 
                                }
                            }
                        } else {
                            $program_others_subtag = term_exists(trim($program_others->field_tags), 'category', $program_others_tag_id);

                            if ($program_others_subtag ) {
                            } else {
                                array_push($arr_program_others_subtag_ids, $program_others_subtag['term_id']);
                                
                                $pod->add_to('classification', $program_others_subtag['term_id']); 
                            }
                        }

                    }

                    if (count($arr_program_others_subtag_ids)) {
                        wp_set_post_categories( $program_others_id, $arr_program_others_subtag_ids );
                    }

                }
              
                $pod->save('reference_node_id', $program_others->nid);

                if (!empty($program_others->field_image)) 
                {
                    $program_others_image = explode(",", $program_others->field_image);

                    if (is_array($program_others_image) && count($program_others_image)) 
                    {
                        $ctr = 1;

                        foreach ($program_others_image as $value) {
                            
                            $img_id = add_image($url_address, trim($value), $program_others_id, ($ctr == 1) ? true : false);

                            if ($img_id) {
                                $pod->add_to('image', $img_id); 
                            }

                            $ctr++;
                        }

                    } else {
                        $img_id = add_image($url_address,  $program_others_image, $program_others_id, true);

                        $pod->add_to('image', $img_id); 
                    }
                }
                
                echo "..  " . $program_others_id . " success <br />";

                return $program_others_id;
            }

            return "--error--. program_others id generated is not valid";

        } catch (Exception $e) {

            return "--error--" . $e->message;
        }
    }

    echo "<br />";

    return null;
}


function add_image($url_address, $image_url, $program_others_id, $thumbnail = false) {

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
                set_post_thumbnail($program_others_id, $attach_id);
            }

            return $attach_id;
    }
        
}