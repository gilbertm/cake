<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/news/ids/201801");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);

$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/news/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $news = json_decode($body); {
            if (!empty($news)) {
                $news_id = add_news($news[0]);

                if ($news_id) {
                    $url = $news[0]->view_node;

                    delete_add_custom_permalink($news_id, $url);
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


function add_news($news)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($news->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'news'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $news->nid, $news->status, "news", null);

            $post_status = ($news->status === "True") ? 'publish' : 'draft';

            $news_add = array(
                'title' => wp_strip_all_tags($news->title),
                'content' => $news->body,
                'excerpt' => $news->body_1,
                'author'   => 1,
                'date_gmt' => $news->created,
                'date' => $news->created,
                'status' => $post_status,
                'slug' => $new_slug
            );
    

            $news_id = pods('news')->add($news_add);

            $pod =  pods('news', $news_id);

            if ($news_id) {

                if (!empty($news->field_department)) 
                {
                    $news_department = explode(",", $news->field_department);

                    if (is_array($news_department) && count($news_department)) 
                    {
                        $ctr = 1;

                        foreach ($news_department as $value) {
                            
                            $department = post_exists(trim($value), '', '', 'department');

                            if ($department) {
                                $pod->add_to('department', $department); 
                            }
                        }

                    } else {

                        $department = post_exists($news_department, '', '', 'department');

                        if ($department) {
                            $pod->add_to('department', $news_department); 
                        }
                    }
                }

                if (!empty($news->field_faculty)) 
                {
                    $news_faculty = explode(",", $news->field_faculty);

                    if (is_array($news_faculty) && count($news_faculty)) 
                    {
                        $ctr = 1;

                        foreach ($news_faculty as $value) {
                            
                            $faculty = post_exists(trim($value), '', '', 'faculty');

                            if ($faculty) {
                                $pod->add_to('faculty', $faculty); 
                            }
                        }

                    } else {

                        $faculty = post_exists($news_faculty, '', '', 'faculty');

                        if ($faculty) {
                            $pod->add_to('faculty', $news_faculty); 
                        }
                    }
                }

                $pod->save('reference_node_id', $news->nid);

                if (!empty($news->field_image)) 
                {
                    $news_image = explode(",", $news->field_image);

                    if (is_array($news_image) && count($news_image)) 
                    {
                        $ctr = 1;

                        foreach ($news_image as $value) {
                            
                            $img_id = add_image($url_address, trim($value), $news_id, ($ctr == 1) ? true : false);

                            if ($img_id) {
                                $pod->add_to('image', $img_id); 
                            }

                            $ctr++;
                        }

                    } else {
                        $img_id = add_image($url_address,  $news_image, $news_id, true);

                        $pod->add_to('image', $img_id); 
                    }
                }
                
                echo "..  " . $news_id . " success <br />";

                return $news_id;
            }

            return "--error--. news id generated is not valid";

        } catch (Exception $e) {

            return "--error--" . $e->message;
        }
    } else {

        return;

        if (count($query->posts)) {
            $post = $query->posts[0];

            $pod =  pods('news', $post->ID);
            
            if ($pod) {
                if (!empty($news->field_image)) 
                {
                    $news_image = explode(",", $news->field_image);
    
                    if (is_array($news_image) && count($news_image)) 
                    {
                        $ctr = 1;
    
                        foreach ($news_image as $value) {
                            
                            $img_id = add_image($url_address, trim($value), $post->ID, ($ctr == 1) ? true : false);
    
                            if ($img_id) {
                                $pod->add_to('image', $img_id); 
                            }
    
                            $ctr++;
                        }
    
                    } else {
                        $img_id = add_image($url_address,  $news_image, $post->ID, true);
    
                        $pod->add_to('image', $img_id); 
                    }
                }
            }

           
        }

    }

    echo "<br />";

    return null;
}


function add_image($url_address, $image_url, $news_id, $thumbnail = false) {

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
                set_post_thumbnail($news_id, $attach_id);
            }

            return $attach_id;
    }
        
}