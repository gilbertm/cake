<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/lrc/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/lrc/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $lrc = json_decode($body); {
            if (!empty($lrc)) {
                $lrc_id = add_lrc($lrc[0]);

                if ($lrc_id) {
                    $url = $lrc[0]->view_node;

                    delete_add_custom_permalink($lrc_id, $url);
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


function add_lrc($lrc)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($lrc->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'lrc'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $lrc->nid, $lrc->status, "lrc", null);

            $post_status = ($lrc->status === "True") ? 'publish' : 'draft';

            $lrc_add = array(
                'title' => wp_strip_all_tags($lrc->title),
                'content' => $lrc->body,
                'author'   => 1,
                'date_gmt' => $lrc->created,
                'date' => $lrc->created,
                'status' => $post_status,
                'slug' => $new_slug
            );
    

            $lrc_id = pods('lrc')->add($lrc_add);

            $pod =  pods('lrc', $lrc_id);

            $arr_lrc_subtag_ids = array();

            if ($lrc_id) {

                $pod->save('reference_node_id', $lrc->nid);

                if (!empty($lrc->field_image)) 
                {
                    $lrc_image = explode(",", $lrc->field_image);

                    if (is_array($lrc_image) && count($lrc_image)) 
                    {
                        $ctr = 1;

                        foreach ($lrc_image as $value) {
                            
                            $img_id = add_image($url_address, trim($value), $lrc_id, ($ctr == 1) ? true : false);

                            if ($img_id) {
                                $pod->add_to('image', $img_id); 
                            }

                            $ctr++;
                        }

                    } else {
                        $img_id = add_image($url_address,  $lrc_image, $lrc_id, true);

                        $pod->add_to('image', $img_id); 
                    }
                }
                
                echo "..  " . $lrc_id . " success <br />";

                return $lrc_id;
            }

            return "--error--. lrc id generated is not valid";

        } catch (Exception $e) {

            return "--error--" . $e->message;
        }
    }

    echo "<br />";

    return null;
}


function add_image($url_address, $image_url, $lrc_id, $thumbnail = false) {

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
                set_post_thumbnail($lrc_id, $attach_id);
            }

            return $attach_id;
    }
        
}