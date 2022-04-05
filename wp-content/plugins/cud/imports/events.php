<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/events/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);

$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/events/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $events = json_decode($body); {
            if (!empty($events)) {
                $events_id = add_events($events[0]);

                if ($events_id) {
                    $url = $events[0]->view_node;

                    delete_add_custom_permalink($events_id, $url);
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


function add_events($events)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($events->nid . "-" . $events->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'events'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $events->nid, $events->status, "events", null);

            $post_status = ($events->status === "True") ? 'publish' : 'draft';

            $events_add = array(
                'title' => wp_strip_all_tags($events->title),
                'content' => $events->body,
                'excerpt' => $events->body_1,
                'author'   => 1,
                'date_gmt' => $events->created,
                'date' => $events->created,
                'tp_event_date_start' => $events->field_date,
                'tp_event_date_end' => !empty($events->field_date_end) ? $events->field_date_end : $events->field_date,
                'status' => $post_status,
                'slug' => $new_slug
            );
    

            $events_id = pods('tp_event')->add($events_add);

            $pod =  pods('tp_event', $events_id);

            if ($events_id) {

                if (!empty($events->field_department)) 
                {
                    $events_department = explode(",", $events->field_department);

                    if (is_array($events_department) && count($events_department)) 
                    {
                        $ctr = 1;

                        foreach ($events_department as $value) {
                            
                            $department = post_exists(trim($value), '', '', 'department');

                            if ($department) {
                                $pod->add_to('department', $department); 
                            }
                        }

                    } else {

                        $department = post_exists($events_department, '', '', 'department');

                        if ($department) {
                            $pod->add_to('department', $events_department); 
                        }
                    }
                }

                if (!empty($events->field_faculty)) 
                {
                    $events_faculty = explode(",", $events->field_faculty);

                    if (is_array($events_faculty) && count($events_faculty)) 
                    {
                        $ctr = 1;

                        foreach ($events_faculty as $value) {
                            
                            $faculty = post_exists(trim($value), '', '', 'faculty');

                            if ($faculty) {
                                $pod->add_to('faculty', $faculty); 
                            }
                        }

                    } else {

                        $faculty = post_exists($events_faculty, '', '', 'faculty');

                        if ($faculty) {
                            $pod->add_to('faculty', $events_faculty); 
                        }
                    }
                }

                $pod->save('reference_node_id', $events->nid);

                $pod->save('cta_url', $events->field_simple_url);

                if (!empty($events->field_image)) 
                {
                    $events_image = explode(",", $events->field_image);

                    if (is_array($events_image) && count($events_image)) 
                    {
                        $ctr = 1;

                        foreach ($events_image as $value) {
                            
                            $img_id = add_image($url_address, trim($value), $events_id, ($ctr == 1) ? true : false);

                            if ($img_id) {
                                $pod->add_to('image', $img_id); 
                            }

                            $ctr++;
                        }

                    } else {
                        $img_id = add_image($url_address,  $events_image, $events_id, true);

                        $pod->add_to('image', $img_id); 
                    }
                }
                
                echo "..  " . $events_id . " success <br />";

                return $events_id;
            }

            return "--error--. events id generated is not valid";

        } catch (Exception $e) {

            return "--error--" . $e->message;
        }
    }

    echo "<br />";

    return null;
}


function add_image($url_address, $image_url, $events_id, $thumbnail = false) {

    $image_url = str_replace('%2F', '/', ltrim(stripcslashes($image_url), "/"));

    // $image_url = str_replace('staging/', '/', $url_address . $image_url);


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

            // Prepare an array of post data for the attachment.
            $attachment = array(
                'guid'           => $upload_dir['url'] . '/' . basename( $filename ),
                'post_mime_type' => $wp_filetype['type'],
                'post_title'     => sanitize_file_name($filename),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );

            // Does the attachment already exist ?
            if( post_exists( sanitize_file_name($filename) ) ){
            $attachment = get_page_by_title( sanitize_file_name($filename), OBJECT, 'attachment');

            if( !empty( $attachment ) ){
                $attachment_data['ID'] = $attachment->ID;
            }
            }

            // If no parent id is set, reset to default(0)
            if( empty( $parent_id ) ){
            $parent_id = 0;
            }

            // Insert the attachment.
            $attach_id = wp_insert_attachment( $attachment, $file, $parent_id );

            require_once(ABSPATH . 'wp-admin/includes/image.php');

            $attach_data = wp_generate_attachment_metadata($attach_id, $file);

            wp_update_attachment_metadata($attach_id, $attach_data);

            if ($thumbnail) {
                set_post_thumbnail($events_id, $attach_id);
            }

            return $attach_id;
    }
        
}