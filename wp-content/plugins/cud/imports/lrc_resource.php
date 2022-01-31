<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/lrc_resource/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/lrc_resource/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $lrc_resource = json_decode($body); {
            if (!empty($lrc_resource)) {
                $lrc_resource_id = add_lrc_resource($lrc_resource[0]);

                if ($lrc_resource_id) {
                    $url = $lrc_resource[0]->view_node;

                    delete_add_custom_permalink($lrc_resource_id, $url);
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


function add_lrc_resource($lrc_resource)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($lrc_resource->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'lrc_resource'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $lrc_resource->nid, $lrc_resource->status, "lrc_resource", null);

            $post_status = ($lrc_resource->status === "True") ? 'publish' : 'draft';

            $post_is_ebook = ($lrc_resource->field_lrc_is_ebook === "True") ? true : false;


            $lrc_resource_add = array(
                'title' => wp_strip_all_tags($lrc_resource->title),
                'content' => $lrc_resource->body,
                'author'   => 1,
                'date_gmt' => $lrc_resource->created,
                'date' => $lrc_resource->created,
                'status' => $post_status,
                'is_ebook' => $post_is_ebook,
                'simple_url' => $lrc_resource->field_simple_url,
                'slug' => $new_slug
            );
    

            $lrc_resource_id = pods('lrc_resource')->add($lrc_resource_add);

            $pod =  pods('lrc_resource', $lrc_resource_id);

            $arr_lrc_resource_subtype_ids = array();
            $arr_lrc_resource_subcat_ids = array();

            if ($lrc_resource_id) {

                $lrc_resource_type = term_exists( 'LRC Resource Type', 'category' );

                if ($lrc_resource_type) {

                    $lrc_resource_type_id = $lrc_resource_type['term_id'];

                    if ($lrc_resource->field_lrc_resource_type) 
                    {

                        $arr_lrc_resource_type_subcategories = explode(",", $lrc_resource->field_lrc_resource_type);

                        if (is_array($arr_lrc_resource_type_subcategories) && count($arr_lrc_resource_type_subcategories)) 
                        {
                            foreach ($arr_lrc_resource_type_subcategories as $value) {
                                
                                if ($lrc_resource_subtype = term_exists(trim($value), 'category')) {
                                    array_push($arr_lrc_resource_subtype_ids, $lrc_resource_subtype['term_id']);
                                } else {
                                    $lrc_resource_subtype = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $lrc_resource_type_id
                                        )
                                    );   
                                    array_push($arr_lrc_resource_subtype_ids, $lrc_resource_subtype['term_id']);                                 
                                }
                            }
                        } else {
                            if ($lrc_resource_subtype = term_exists(trim($lrc_resource->field_types), 'category')) {
                            } else {
                                array_push($arr_lrc_resource_subtype_ids, $lrc_resource_subtype['term_id']);          
                            }
                        }

                    }

                    if (count($arr_lrc_resource_subtype_ids)) {
                        wp_set_post_categories( $lrc_resource_id, $arr_lrc_resource_subtype_ids );
                    }

                }

                $lrc_resource_cat = term_exists( 'LRC Category', 'category' );

                if ($lrc_resource_cat) {

                    $lrc_resource_cat_id = $lrc_resource_cat['term_id'];

                    if ($lrc_resource->field_lrc_category) 
                    {

                        $arr_lrc_resource_cat_subcategories = explode(",", $lrc_resource->field_lrc_category);

                        if (is_array($arr_lrc_resource_cat_subcategories) && count($arr_lrc_resource_cat_subcategories)) 
                        {
                            foreach ($arr_lrc_resource_cat_subcategories as $value) {
                                
                                if ($lrc_resource_subcat = term_exists(trim($value), 'category')) {
                                    array_push($arr_lrc_resource_subcat_ids, $lrc_resource_subcat['term_id']);
                                } else {
                                    $lrc_resource_subcat = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $lrc_resource_cat_id
                                        )
                                    );   
                                    array_push($arr_lrc_resource_subcat_ids, $lrc_resource_subcat['term_id']);                                 
                                }
                            }
                        } else {
                            if ($lrc_resource_subcat = term_exists(trim($lrc_resource->field_cats), 'category')) {
                            } else {
                                array_push($arr_lrc_resource_subcat_ids, $lrc_resource_subcat['term_id']);          
                            }
                        }

                    }

                    if (count($arr_lrc_resource_subcat_ids)) {
                        wp_set_post_categories( $lrc_resource_id, $arr_lrc_resource_subcat_ids );
                    }

                }
              
                $pod->save('reference_node_id', $lrc_resource->nid);

                if (!empty($lrc_resource->field_image)) 
                {
                    $lrc_resource_image = explode(",", $lrc_resource->field_image);

                    if (is_array($lrc_resource_image) && count($lrc_resource_image)) 
                    {
                        $ctr = 1;

                        foreach ($lrc_resource_image as $value) {
                            
                            $img_id = add_image($url_address, trim($value), $lrc_resource_id, ($ctr == 1) ? true : false);

                            if ($img_id) {
                                $pod->add_to('image', $img_id); 
                            }

                            $ctr++;
                        }

                    } else {
                        $img_id = add_image($url_address,  $lrc_resource_image, $lrc_resource_id, true);

                        $pod->add_to('image', $img_id); 
                    }
                }
                
                echo "..  " . $lrc_resource_id . " success <br />";

                return $lrc_resource_id;
            }

            return "--error--. lrc_resource id generated is not valid";

        } catch (Exception $e) {

            return "--error--" . $e->message;
        }
    }

    echo "<br />";

    return null;
}


function add_image($url_address, $image_url, $lrc_resource_id, $thumbnail = false) {

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
                set_post_thumbnail($lrc_resource_id, $attach_id);
            }

            return $attach_id;
    }
        
}