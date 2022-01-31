<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/files/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    $count = 0;

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/files/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $downloadable_id = null;

        $downloadable = json_decode($body); {
            if (!empty($downloadable)) {
                $downloadable_id = add_downloadable($downloadable[0]);

                if ($downloadable_id) {
                    $url = $downloadable[0]->view_node;

                    delete_add_custom_permalink($downloadable_id, $url);
                }
            }
        }

        if ($downloadable_id !== null){ 
            $count++;
        }

        if ($count == 50) {
            return;
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


function add_downloadable($downloadable)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($downloadable->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'downloadable'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $downloadable->nid, $downloadable->status, "downloadable", null);

            $post_status = ($downloadable->status === "True") ? 'publish' : 'draft';

            $downloadable_add = array(
                'title' => wp_strip_all_tags($downloadable->title),
                'content' => $downloadable->body,
                'author'   => 1,
                'date_gmt' => $downloadable->created,
                'date' => $downloadable->created,
                'status' => $post_status,
                'slug' => $new_slug
            );
    

            $downloadable_id = pods('downloadable')->add($downloadable_add);

            $pod =  pods('downloadable', $downloadable_id);

            $arr_downloadable_subtag_ids = array();

            if ($downloadable_id) {

                $downloadable_tag = term_exists( 'Downloadables', 'category' );

                if ($downloadable_tag) {

                    $downloadable_tag_id = $downloadable_tag['term_id'];

                    if ($downloadable->field_tags) 
                    {

                        $arr_downloadable_tag_subcategories = explode(",", $downloadable->field_tags);

                        if (is_array($arr_downloadable_tag_subcategories) && count($arr_downloadable_tag_subcategories)) 
                        {
                            foreach ($arr_downloadable_tag_subcategories as $value) {
                                
                                if ($downloadable_subtag = term_exists(trim($value), 'category')) {
                                    array_push($arr_downloadable_subtag_ids, $downloadable_subtag['term_id']);
                                } else {
                                    $downloadable_subtag = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $downloadable_tag_id
                                        )
                                    );   
                                    array_push($arr_downloadable_subtag_ids, $downloadable_subtag['term_id']);                                 
                                }
                            }
                        } else {
                            if ($downloadable_subtag = term_exists(trim($downloadable->field_tags), 'category')) {
                            } else {
                                array_push($arr_downloadable_subtag_ids, $downloadable_subtag['term_id']);          
                            }
                        }

                    }

                    if (count($arr_downloadable_subtag_ids)) {
                        wp_set_post_categories( $downloadable_id, $arr_downloadable_subtag_ids );
                    }

                }

                $pod->save('reference_node_id', $downloadable->nid);

                if (!empty($downloadable->field_image)) 
                {
                    $img_id = add_file($url_address,  $downloadable->field_image, $downloadable_id, true, true);
                }

                if (!empty($downloadable->field_file)) 
                {
                    $downloadable_file = explode(",", $downloadable->field_file);

                    if (is_array($downloadable_file) && count($downloadable_file)) 
                    {
                        $ctr = 1;

                        foreach ($downloadable_file as $value) {
                            
                            $img_id = add_file($url_address, trim($value), $downloadable_id, false, false);

                            if ($img_id) {
                                $pod->add_to('resource', $img_id); 
                            }

                            $ctr++;
                        }

                    } else {
                        $img_id = add_file($url_address,  $downloadable_file, $downloadable_id, true);

                        $pod->add_to('resource', $img_id); 
                    }
                }
                
                echo "..  " . $downloadable_id . " success <br />";

                return $downloadable_id;
            }

            return "--error--. downloadable id generated is not valid";

        } catch (Exception $e) {

            return "--error--. $e->message";
        }
    }

    echo "<br />";

    return null;
}


function add_file($url_address, $file_url, $downloadable_id, $thumbnail = false, $is_image = true) {

    $file_url = str_replace('%2F', '/', ltrim(stripcslashes($file_url), "/"));

    $file_url = str_replace('staging/', '/', $url_address . $file_url);

    echo $file_url . "<br />";

    // if (false!==file($file_url)) {

            // Add Featured file to Post
            $file_name       = basename($file_url);
            // echo $file_name . ". file name <br />";
            $upload_dir       = wp_upload_dir();
            // echo var_dump($upload_dir) . ". upload dir<br />";
            $file_data       = file_get_contents($file_url);
            // echo $file_data . ". file data dir<br />";
            $unique_file_name = wp_unique_filename($upload_dir['path'], $file_name);
            // echo $unique_file_name . ". unique_file_name<br />";
            $filename         = basename($unique_file_name);

            if (wp_mkdir_p($upload_dir['path'])) {
                $file = $upload_dir['path'] . '/' . $filename;
                // echo $unique_file_name . ". unique_file_name<br />";
            } else {
                $file = $upload_dir['basedir'] . '/' . $filename;
            }

            file_put_contents($file, $file_data);

            $wp_filetype = wp_check_filetype($filename, null);

            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title'     => sanitize_file_name($filename),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );

            $attach_id = wp_insert_attachment($attachment, $file);

            echo $attach_id . ". attach_id<br />";

            require_once(ABSPATH . 'wp-admin/includes/file.php');

            $attach_data = wp_generate_attachment_metadata($attach_id, $file);

            wp_update_attachment_metadata($attach_id, $attach_data);

            if ($thumbnail && false == $is_image) {
                set_post_thumbnail($downloadable_id, $attach_id);
            }

            return $attach_id;
    // }
        
}


function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}