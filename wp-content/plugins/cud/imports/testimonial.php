<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/testimonial/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/testimonial/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $testimonial = json_decode($body); {
            if (!empty($testimonial)) {
                $testimonial_id = add_testimonial($testimonial[0]);

                if ($testimonial_id) {
                    $url = $testimonial[0]->view_node;

                    delete_add_custom_permalink($testimonial_id, $url);
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

function add_testimonial($testimonial)
{   
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title( $testimonial->title );

    echo "Processing... " . $new_slug;

    $query = new WP_Query( array( 'name' => $new_slug, 'post_type' => 'testimonials' ) );

    if ( !$query->have_posts() ) {

        // use this line if you have multiple posts with the same title
        $new_slug = wp_unique_post_slug( $new_slug, $testimonial->nid, $testimonial->status, "testimonials", null );
 
        $image_url = str_replace('%2F', '/', urlencode(ltrim(stripcslashes($testimonial->field_image), "/")));

        $image_url = str_replace('staging/', '/', $url_address . $image_url);

        $post_status = ($testimonial->status === "True") ? 'publish' : 'draft';

        $testimonial_add = array(
            'post_title' => $testimonial->title,
            'post_content' => $testimonial->body,
            'post_excerpt' => $testimonial->body_1, 
            'post_date_gmt' => $testimonial->created,
            'post_date' => $testimonial->created,
            'post_status' => $post_status,
            'reference_node_id' => $testimonial->nid,
            'slug' => $new_slug,
            'post_type' => 'testimonials'
        );

        $testimonial_id = wp_insert_post($testimonial_add);

        if ($testimonial_id) {

            update_field('reference_node_id', $testimonial->nid, $testimonial_id);


            $arr_testimonial_subtag_ids = array();

            $testimonial_tag = term_exists( 'Testimonial Classification', 'category' );

                if ($testimonial_tag) {

                    $testimonial_tag_id = $testimonial_tag['term_id'];

                    if ($testimonial->field_tags) 
                    {

                        $arr_testimonial_tag_subcategories = explode(",", $testimonial->field_tags);

                        if (is_array($arr_testimonial_tag_subcategories) && count($arr_testimonial_tag_subcategories)) 
                        {
                            foreach ($arr_testimonial_tag_subcategories as $value) {
                                
                                if ($testimonial_subtag = term_exists(trim($value), 'category', $testimonial_tag_id)) {
                                    array_push($arr_testimonial_subtag_ids, $testimonial_subtag['term_id']);
                                } else {
                                    $testimonial_subtag = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $testimonial_tag_id
                                        )
                                    );   
                                    array_push($arr_testimonial_subtag_ids, $testimonial_subtag['term_id']);                                 
                                }
                            }
                        } else {
                            if ($testimonial_subtag = term_exists(trim($testimonial->field_tags), 'category')) {
                            } else {
                                array_push($arr_testimonial_subtag_ids, $testimonial_subtag['term_id']);          
                            }
                        }

                    }

                    if (count($arr_testimonial_subtag_ids)) {
                        wp_set_post_categories( $testimonial_id, $arr_testimonial_subtag_ids );

                        update_field('classification', $arr_testimonial_subtag_ids, $testimonial_id);
                    }

                }


            if (!empty($testimonial->field_image)) 
            {
                $testimonial_image = explode(",", $testimonial->field_image);

                if (is_array($testimonial_image) && count($testimonial_image)) 
                {
                    $ctr = 1;

                    foreach ($testimonial_image as $value) {
                        
                        $img_id = add_image($url_address, trim($value), $testimonial_id, ($ctr == 1) ? true : false);

                        $ctr++;
                    }

                } else {
                    $img_id = add_image($url_address,  $testimonial_image, $testimonial_id, true);
                }
            }

            if (!empty($testimonial->field_video)) 
            {
                update_field('video_url', $testimonial->field_video, $testimonial_id);
            }

            
            
            echo "..  " . $testimonial_id . " success <br />";

            return $testimonial_id;
        }

        echo "... success";

        echo "<br />";

        return $testimonial_id;
    }

    echo "... exists";

    echo "<br />";

    return null;

}

function add_image($url_address, $image_url, $testimonial_id, $thumbnail = false) {

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
                set_post_thumbnail($testimonial_id, $attach_id);
            }

            return $attach_id;
    }
        
}