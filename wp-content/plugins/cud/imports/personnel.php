<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("https://www.cud.ac.ae/wp/migrate/content/personnel/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("https://www.cud.ac.ae/wp/migrate/content/personnel/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $personnel = json_decode($body); {
            if (!empty($personnel)) {
                $personnel_id = add_personnel($personnel[0]);

                if ($personnel_id) {
                    $url = $personnel[0]->view_node;

                    delete_add_custom_permalink($personnel_id, $url);
                }
            }
        }
    }
}

function delete_add_custom_permalink($post_id, $custom_permalink)
{

    // add_filter( 'post_link', 'custom_post_permalink', 'edit_files', 2 );
    // add_filter( 'page_link', 'custom_post_permalink', 'edit_files', 2 );
    // add_filter( 'post_type_link', 'custom_post_permalink', 'edit_files', 2 );

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


function add_personnel($personnel)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($personnel->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'our_team'));

    if (!$query->have_posts()) {
        
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $personnel->nid, $personnel->status, "our_team", null);

            $image_url = str_replace('%2F', '/', urlencode(ltrim(stripcslashes($personnel->field_image), "/")));

            $image_url = str_replace('staging/', '/', $url_address . $image_url);

            $post_status = ($personnel->status === "True") ? 'publish' : 'draft';

            $personnel_add = array(
                'post_title'    => wp_strip_all_tags($personnel->title),
                'post_name'     => $new_slug,
                'post_content'  => $personnel->body,
                'post_author'   => 1,
                'post_type' => 'our_team',
                'post_date_gmt' => $personnel->created,
                'post_date' => $personnel->created,
                'post_status' => $post_status,
                'slug' => $new_slug
            );

            $personnel_id = wp_insert_post($personnel_add);

            $arr_personnel_subposition_ids = array();
            $arr_personnel_subresearch_interest_ids = array();

            if ($personnel_id) {

                $personnel_position = term_exists( 'Personnel Position', 'category' );

                if ($personnel_position) {

                    $personnel_position_id = $personnel_position['term_id'];

                    if ($personnel->field_personnel_position) 
                    {

                        $arr_personnel_position_subcategories = explode(",", $personnel->field_personnel_position);

                        if (is_array($arr_personnel_position_subcategories)) 
                        {
                            foreach ($arr_personnel_position_subcategories as $value) {
                                
                                if ($personnel_subposition = term_exists(trim($value), 'category')) {
                                    array_push($arr_personnel_subposition_ids, $personnel_subposition['term_id']);
                                } else {
                                    $personnel_subposition = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $personnel_position_id
                                        )
                                    );   
                                    array_push($arr_personnel_subposition_ids, $personnel_subposition['term_id']);                                 
                                }
                            }
                        }

                    }

                    if (count($arr_personnel_subposition_ids)) {
                        update_field('personnel_position', $arr_personnel_subposition_ids, $personnel_id);
                    }

                }

                $personnel_research_interest = term_exists( 'Personnel Research Interest', 'category' );

                if ($personnel_research_interest) {

                    $personnel_research_interest_id = $personnel_research_interest['term_id'];

                    if ($personnel->field_personnel_res_interests) 
                    {

                        $arr_field_personnel_res_subinterests = explode(",", $personnel->field_personnel_res_interests);

                        if (is_array($arr_field_personnel_res_subinterests)) 
                        {
                            foreach ($arr_field_personnel_res_subinterests as $value) {
                                
                                if ($personnel_research_subinterest = term_exists(trim($value), 'category')) {
                                    array_push($arr_personnel_subresearch_interest_ids, $personnel_research_subinterest['term_id']);
                                } else {
                                    $personnel_research_subinterest = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $personnel_research_interest_id
                                        )
                                    );   
                                    array_push($arr_personnel_subresearch_interest_ids, $personnel_research_subinterest['term_id']);                                 
                                }
                            }
                        }

                    }
                    
                    if (count($arr_personnel_subresearch_interest_ids)) {
                        update_field('personnel_research_interests', $arr_personnel_subresearch_interest_ids, $personnel_id);
                    }

                }

                update_field('our_team_category', array(185), $personnel_id);
                update_field('personnel_extras', $personnel->field_body_extras, $personnel_id);
                update_field('personnel_arrangement', $personnel->field_force_arrangement, $personnel_id);
                update_field('personnel_academic_publications_book_chapters', $personnel->field_personnel_ap_book_chapters, $personnel_id);
                update_field('personnel_academic_publications_books', $personnel->field_personnel_ap_books, $personnel_id);
                update_field('personnel_academic_publications_conference_papers', $personnel->field_personnel_ap_conf_papers, $personnel_id);
                update_field('personnel_academic_publications_journal', $personnel->field_personnel_ap_journals, $personnel_id);
                update_field('personnel_academic_publications_research', $personnel->field_personnel_ap_research, $personnel_id);
                update_field('personnel_awards_and_honors', $personnel->field_personnel_awards_honors, $personnel_id);
                update_field('personnel_biography', $personnel->field_personnel_biography, $personnel_id);
                update_field('personnel_email', $personnel->field_personnel_email, $personnel_id);
                update_field('personnel_highest_degree', $personnel->field_personnel_highest_degree, $personnel_id);

                update_field('personnel_office_location', $personnel->field_personnel_office_location, $personnel_id);
                update_field('personnel_other_contributions', $personnel->field_personnel_other_contrib, $personnel_id);
                update_field('personnel_other_titles', $personnel->field_personnel_other_titles, $personnel_id);
                update_field('personnel_participation_in_scientific', $personnel->field_personnel_participation, $personnel_id);
                update_field('personnel_professional_memberships', $personnel->field_personnel_prof_membership, $personnel_id);
                update_field('personnel_telephone', $personnel->field_personnel_telephone, $personnel_id);

                $department = (empty($personnel->field_department)) ? 0 : post_exists($personnel->field_department, '', '', 'department');

                $faculty = (empty($personnel->field_faculty)) ? 0 : post_exists($personnel->field_faculty, '', '', 'faculty');

                update_field('department', $department, $personnel_id);
                update_field('faculty', $faculty, $personnel_id);
                update_field('reference_node_id', $personnel->nid, $personnel_id);

                if (!empty($personnel->field_image)) 
                {
                    $personnel_image = explode(",", $personnel->field_image);

                    if (is_array($personnel_image) && count($personnel_image)) 
                    {
                        $ctr = 1;

                        foreach ($personnel_image as $value) {
                            
                            $img_id = add_image($url_address, trim($value), $personnel_id, ($ctr == 1) ? true : false);

                            $ctr++;
                        }

                    } else {
                        $img_id = add_image($url_address,  trim($personnel_image), $personnel_id, true);

                    }
                }
                
                echo "..  " . $personnel_id . " success <br />";

                return $personnel_id;
            }

            return "--error--. personnel id generated is not valid";

        } 
        catch (Exception $e) 
        {

            return "--error--" . $e->message;
        }

    } else {

        foreach ($query->posts as $post) {

            $personnel_id = $post->ID;

            $arr_personnel_subposition_ids = array();
            $arr_personnel_subresearch_interest_ids = array();

            if ($personnel_id) {

                $personnel_position = term_exists( 'Personnel Position', 'category' );

                if ($personnel_position) {

                    $personnel_position_id = $personnel_position['term_id'];

                    if ($personnel->field_personnel_position) 
                    {

                        $arr_personnel_position_subcategories = explode(",", $personnel->field_personnel_position);

                        if (is_array($arr_personnel_position_subcategories)) 
                        {
                            foreach ($arr_personnel_position_subcategories as $value) {
                                
                                if ($personnel_subposition = term_exists(trim($value), 'category')) {
                                    array_push($arr_personnel_subposition_ids, $personnel_subposition['term_id']);
                                } else {
                                    $personnel_subposition = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $personnel_position_id
                                        )
                                    );   
                                    array_push($arr_personnel_subposition_ids, $personnel_subposition['term_id']);                                 
                                }
                            }
                        }

                    }

                    if (count($arr_personnel_subposition_ids)) {
                        update_field('personnel_position', $arr_personnel_subposition_ids, $personnel_id);
                    }

                }

                $personnel_research_interest = term_exists( 'Personnel Research Interest', 'category' );

                if ($personnel_research_interest) {

                    $personnel_research_interest_id = $personnel_research_interest['term_id'];

                    if ($personnel->field_personnel_res_interests) 
                    {

                        $arr_field_personnel_res_subinterests = explode(",", $personnel->field_personnel_res_interests);

                        if (is_array($arr_field_personnel_res_subinterests)) 
                        {
                            foreach ($arr_field_personnel_res_subinterests as $value) {
                                
                                if ($personnel_research_subinterest = term_exists(trim($value), 'category')) {
                                    array_push($arr_personnel_subresearch_interest_ids, $personnel_research_subinterest['term_id']);
                                } else {
                                    $personnel_research_subinterest = wp_insert_term(
                                        trim($value),
                                        'category',
                                        array(
                                            'parent'=> $personnel_research_interest_id
                                        )
                                    );   
                                    array_push($arr_personnel_subresearch_interest_ids, $personnel_research_subinterest['term_id']);                                 
                                }
                            }
                        }

                    }
                    
                    if (count($arr_personnel_subresearch_interest_ids)) {
                        update_field('personnel_research_interests', $arr_personnel_subresearch_interest_ids, $personnel_id);
                    }

                }

                update_field('our_team_category', array(185), $personnel_id);
                update_field('personnel_extras', $personnel->field_body_extras, $personnel_id);
                update_field('personnel_arrangement', $personnel->field_force_arrangement, $personnel_id);
                update_field('personnel_academic_publications_book_chapters', $personnel->field_personnel_ap_book_chapters, $personnel_id);
                update_field('personnel_academic_publications_books', $personnel->field_personnel_ap_books, $personnel_id);
                update_field('personnel_academic_publications_conference_papers', $personnel->field_personnel_ap_conf_papers, $personnel_id);
                update_field('personnel_academic_publications_journal', $personnel->field_personnel_ap_journals, $personnel_id);
                update_field('personnel_academic_publications_research', $personnel->field_personnel_ap_research, $personnel_id);
                update_field('personnel_awards_and_honors', $personnel->field_personnel_awards_honors, $personnel_id);
                update_field('personnel_biography', $personnel->field_personnel_biography, $personnel_id);
                update_field('personnel_email', $personnel->field_personnel_email, $personnel_id);
                update_field('personnel_highest_degree', $personnel->field_personnel_highest_degree, $personnel_id);

                update_field('personnel_office_location', $personnel->field_personnel_office_location, $personnel_id);
                update_field('personnel_other_contributions', $personnel->field_personnel_other_contrib, $personnel_id);
                update_field('personnel_other_titles', $personnel->field_personnel_other_titles, $personnel_id);
                update_field('personnel_participation_in_scientific', $personnel->field_personnel_participation, $personnel_id);
                update_field('personnel_professional_memberships', $personnel->field_personnel_prof_membership, $personnel_id);
                update_field('personnel_telephone', $personnel->field_personnel_telephone, $personnel_id);

                $department = (empty($personnel->field_department)) ? 0 : post_exists($personnel->field_department, '', '', 'department');

                $faculty = (empty($personnel->field_faculty)) ? 0 : post_exists($personnel->field_faculty, '', '', 'faculty');

                update_field('department', $department, $personnel_id);
                update_field('faculty', $faculty, $personnel_id);
                update_field('reference_node_id', $personnel->nid, $personnel_id);

                if ($image_url) 
                {
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

                    $attach_id = wp_insert_attachment($attachment, $file, $personnel_id);

                    require_once(ABSPATH . 'wp-admin/includes/image.php');

                    $attach_data = wp_generate_attachment_metadata($attach_id, $file);

                    wp_update_attachment_metadata($attach_id, $attach_data);

                    set_post_thumbnail($personnel_id, $attach_id);
                }
                
                echo "..  " . $personnel_id . " success <br />";

                return $personnel_id;
            }         

            echo "..  " . $personnel_id . " success <br />";

            return $personnel_id;
        }
        
        echo "..  " . $personnel_id . " exists <br />";
    }

    echo "<br />";

    return null;
}

function add_image($url_address, $image_url, $personnel_id, $thumbnail = false) {

    $image_url = $url_address . $image_url;


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
                set_post_thumbnail($personnel_id, $attach_id);
            }

            return $attach_id;
    }
        
}
