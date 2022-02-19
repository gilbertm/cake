<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/program/ids");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/program/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $program = json_decode($body); {
            if (!empty($program)) {
                $program_id = add_program($program[0]);

                if ($program_id) {
                    $url = $program[0]->view_node;

                    delete_add_custom_permalink($program_id, $url);
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


function add_program($program)
{
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title($program->title);

    echo "Processing... " . $new_slug;

    $query = new WP_Query(array('name' => $new_slug, 'post_type' => 'lp_course'));

    if (!$query->have_posts()) {
        try {

            // use this line if you have multiple posts with the same title
            $new_slug = wp_unique_post_slug($new_slug, $program->nid, $program->status, "program", null);

            $image_url = str_replace('%2F', '/', urlencode(ltrim(stripcslashes($program->field_image), "/")));

            $image_url = str_replace('staging/', '/', $url_address . $image_url);

            $post_status = ($program->status === "True") ? 'publish' : 'draft';

            $program_add = array(
                'post_title'    => wp_strip_all_tags($program->title),
                'post_name'     => $new_slug,
                'post_content'  => $program->body,
                'post_excerpt'  => $program->body_1,
                'post_author'   => 1,
                'post_type' => 'lp_course',
                'post_date_gmt' => $program->created,
                'post_date' => $program->created,
                'post_status' => $post_status,
                'slug' => $new_slug
            );

            $program_id = wp_insert_post($program_add);

            if ($program_id) {

                update_field('reference_node_id', $program->nid, $program_id);

                $post_is_new = ($program->field_is_new === "True") ? true : false;

                $post_is_only_arabic = ($program->field_only_in_arabic === "True") ? true : false;

                $post_is_also_arabic = ($program->field_also_in_arabic === "True") ? true : false;

                $study_plan_posts = get_posts(array(
                    'numberposts'    => 1,
                    'post_type'        => 'studyplan',
                    'meta_key'        => 'reference_node_id',
                    'meta_value'    => "$program->field_study_plan"
                ));

                $study_plan = "";
                if (count($study_plan_posts)) {
                    $study_plan = get_post($study_plan_posts[0]->ID);
                    $study_plan = apply_filters('the_content', $study_plan->post_content);
                }

                $department = post_exists($program->field_department, '', '', 'department');

                $faculty = post_exists($program->field_faculty, '', '', 'faculty');

                update_field('credit_hours', $program->field_program_credit_hours, $program_id);
                update_field('minor', $program->field_program_minor, $program_id);
                update_field('opening_dates', $program->field_program_opening_dates, $program_id);
                update_field('years', $program->field_program_years, $program_id);

                update_field('group', $program->field_program_group, $program_id);
                update_field('is_new', $post_is_new, $program_id);
                update_field('is_only_arabic', $post_is_only_arabic, $program_id);
                update_field('is_also_in_arabic', $post_is_also_arabic, $program_id);
                update_field('is_ministry_accredited', true, $program_id);

                update_field('instructors', '', $program_id);
                update_field('study_plan', $study_plan, $program_id);
                update_field('department', $department, $program_id);
                update_field('faculty', $faculty, $program_id);
                update_field('program_structure', $program->body, $program_id);
                update_field('reference_node_id', $program->nid, $program_id);

                // Add Featured Image to Post
                if (@getimagesize($image_url)) {
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

                $attach_id = wp_insert_attachment($attachment, $file, $program_id);

                require_once(ABSPATH . 'wp-admin/includes/image.php');

                $attach_data = wp_generate_attachment_metadata($attach_id, $file);

                wp_update_attachment_metadata($attach_id, $attach_data);

                set_post_thumbnail($program_id, $attach_id);
                }
                

                echo "... success";

                echo "<br />";

                return $program_id;
            }

            return "--error--. program id generated is not valid";
        } catch (Exception $e) {

            return "--error--. $e->message";
        }
    } else {

        foreach ($query->posts as $post) {

            $program_id = $post->ID;

            $post_is_new = ($program->field_is_new === "True") ? true : false;

            $post_is_only_arabic = ($program->field_only_in_arabic === "True") ? true : false;

            $post_is_also_arabic = ($program->field_also_in_arabic === "True") ? true : false;

            $study_plan_posts = get_posts(array(
                'numberposts'    => 1,
                'post_type'        => 'studyplan',
                'meta_key'        => 'reference_node_id',
                'meta_value'    => "$program->field_study_plan"
            ));

            $study_plan = "";
            if (count($study_plan_posts)) {
                $study_plan = get_post($study_plan_posts[0]->ID);
                $study_plan = apply_filters('the_content', $study_plan->post_content);
            }

            $department = post_exists($program->field_department, '', '', 'department');

            $faculty = post_exists($program->field_faculty, '', '', 'faculty');

            update_field('credit_hours', $program->field_program_credit_hours, $program_id);
            update_field('minor', $program->field_program_minor, $program_id);
            update_field('opening_dates', $program->field_program_opening_dates, $program_id);
            update_field('years', $program->field_program_years, $program_id);

            update_field('group', $program->field_program_group, $program_id);
            update_field('is_new', $post_is_new, $program_id);
            update_field('is_only_arabic', $post_is_only_arabic, $program_id);
            update_field('is_also_in_arabic', $post_is_also_arabic, $program_id);
            update_field('is_ministry_accredited', true, $program_id);

            update_field('instructors', '', $program_id);
            update_field('study_plan', $study_plan, $program_id);
            update_field('department', $department, $program_id);
            update_field('faculty', $faculty, $program_id);
            update_field('program_structure', $program->body, $program_id);
            update_field('reference_node_id', $program->nid, $program_id);

            echo "... success";

            echo "<br />";

            return $program_id;
        }

        echo "... updated ... exists";
    }

    echo "<br />";

    return null;
}
