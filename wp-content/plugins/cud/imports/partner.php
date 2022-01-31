<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/partner/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/partner/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $partner = json_decode($body); {
            if (!empty($partner)) {
                $partner_id = add_partner($partner[0]);

                if ($partner_id) {
                    $url = $partner[0]->view_node;

                    delete_add_custom_permalink($partner_id, $url);
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


function add_partner($partner)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($partner->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'partner'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $partner->nid, $partner->status, "partner", null);

            $post_status = ($partner->status === "True") ? 'publish' : 'draft';

            $partner_add = array(
                'title' => wp_strip_all_tags($partner->title),
                'content' => $partner->body,
                'author'   => 1,
                'date_gmt' => $partner->created,
                'date' => $partner->created,
                'status' => $post_status,
                'slug' => $new_slug
            );
    

            $partner_id = pods('partner')->add($partner_add);

            $pod =  pods('partner', $partner_id);

            $arr_partner_subtag_ids = array();

            if ($partner_id) {

                $partner_tag = term_exists( 'Education Partner', 'category' );

                if ($partner_tag) {

                    $partner_tag_id = $partner_tag['term_id'];

                    if ($partner->field_tags) 
                    {

                        $arr_partner_tag_subcategories = explode(",", $partner->field_tags);

                        if (is_array($arr_partner_tag_subcategories) && count($arr_partner_tag_subcategories)) 
                        {
                            foreach ($arr_partner_tag_subcategories as $value) {
                                
                                if ($partner_subtag = term_exists(trim($value), 'category')) {
                                    array_push($arr_partner_subtag_ids, $partner_subtag['term_id']);
                                } else {
                                    $partner_subtag = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $partner_tag_id
                                        )
                                    );   
                                    array_push($arr_partner_subtag_ids, $partner_subtag['term_id']);                                 
                                }
                            }
                        } else {
                            if ($partner_subtag = term_exists(trim($partner->field_tags), 'category')) {
                            } else {
                                array_push($arr_partner_subtag_ids, $partner_subtag['term_id']);          
                            }
                        }

                    }

                    if (count($arr_partner_subtag_ids)) {
                        wp_set_post_categories( $partner_id, $arr_partner_subtag_ids );
                    }

                }

                $pod->save('reference_node_id', $partner->nid);

                if (!empty($partner->field_image)) 
                {
                    $partner_image = explode(",", $partner->field_image);

                    if (is_array($partner_image) && count($partner_image)) 
                    {
                        $ctr = 1;
                        foreach ($partner_image as $value) {

                            $img_id = add_image($url_address, trim($value), $partner_id, ($ctr == 1) ? true : false);

                            if ($img_id) {
                                $pod->add_to('intro_image', $img_id); 
                            }

                            $ctr++;
                        }

                    } else {
                        $img_id = add_image($url_address,  $partner_image, $partner_id, true);

                        $pod->add_to('intro_image', $img_id); 
                    }
                }

                if (!empty($partner->field_gallery_reference)) {

                    $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/partner_gallery/$partner->field_gallery_reference");

                    $body = wp_remote_retrieve_body($request);

                    $partner_gallery  = json_decode($body);
                    
                    if (!empty($partner_gallery)) {

                        $partner_gallery_new_slug = sanitize_title($partner->title);

                        $partner_gallery_new_slug = wp_unique_post_slug($partner_gallery_new_slug, $partner_gallery[0]->nid, $partner_gallery[0]->status, "custom_gallery", null);

                        $partner_gallery_post_status = ($partner_gallery[0]->status === "True") ? 'publish' : 'draft';

                        $partner_gallery_item = array(
                            'title' => wp_strip_all_tags($partner_gallery[0]->title),
                            'content' => $partner_gallery[0]->body,
                            'author'   => 1,
                            'date_gmt' => $partner_gallery[0]->created,
                            'date' => $partner_gallery[0]->created,
                            'status' => $partner_gallery_post_status,
                            'slug' => $partner_gallery_new_slug
                        );         
            
                        $partner_gallery_id = pods('gallery')->add($partner_gallery_item);
            
                        $pod_gallery =  pods('gallery', $partner_gallery_id);

                        $pod_gallery->save('reference_node_id', $partner_gallery[0]->nid);

                        if ($partner_gallery_id) {

                            $partner_gallery_image = explode(",", $partner_gallery[0]->field_image);                        

                            if (is_array($partner_gallery_image) && count($partner_gallery_image)) {
                                $ctr = 1;
                                foreach ($partner_gallery_image as $value) {
                                    $img_id = add_image($url_address, trim($value), $partner_gallery_id, ($ctr == 1) ? true : false);
        
                                    if ($img_id) {
                                        $pod_gallery->add_to('gallery', $img_id); 
                                    }

                                    $ctr++;
                                }
        
                            } else {
                               $img_id = add_image($url_address,  $partner_gallery_image, $partner_gallery_id, true);

                               $pod_gallery->add_to('gallery', $img_id); 
                            }

                            $partner_gallery_url = $partner_gallery[0]->view_node;

                            delete_add_custom_permalink($partner_gallery_id, $partner_gallery_url);

                            $pod->save('gallery_reference', $partner_gallery_id, $partner_id);
                        }                        
                        
                    }

                    
                    
                }
                
                echo "..  " . $partner_id . " success <br />";

                return $partner_id;
            }

            return "--error--. partner id generated is not valid";

        } catch (Exception $e) {

            return "--error--. $e->message";
        }
    }

    echo "<br />";

    return null;
}


function add_image($url_address, $image_url, $partner_id, $thumbnail = false) {

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
                set_post_thumbnail($partner_id, $attach_id);
            }

            return $attach_id;
    }
        
}