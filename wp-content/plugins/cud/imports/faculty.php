<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get('http://devs.cud.ac.ae/staging/wp/migrate/content/faculty');

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$data = json_decode($body);

if (!empty($data)) {

    foreach ($data as $faculty) {

        $faculty_id = add_faculty($faculty);

        if ($faculty_id) {
            $url = $faculty->view_node;

            delete_add_custom_permalink($faculty_id, $url);    
        }
    }
}

function delete_add_custom_permalink($post_id, $custom_permalink) {

    delete_post_meta($post_id, 'custom_permalink');

    $permalink = str_replace('%2F', '/', urlencode(ltrim(stripcslashes($custom_permalink), "/")));

    $permalink = str_replace('staging/', '', $permalink);

    add_post_meta(
        $post_id,
        'custom_permalink',
        $permalink
    );
}

function add_faculty($faculty)
{   
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title( $faculty->title );

    echo "Processing... " . $new_slug;

    $query = new WP_Query( array( 'name' => $new_slug, 'post_type' => 'faculty' ) );

    if ( !$query->have_posts() ) {

        // use this line if you have multiple posts with the same title
        $new_slug = wp_unique_post_slug( $new_slug, $faculty->nid, $faculty->status, "faculty", null );
 
        $image_url = str_replace('%2F', '/', urlencode(ltrim(stripcslashes($faculty->field_image), "/")));

        $image_url = str_replace('staging/', '/', $url_address . $image_url);

        $post_status = ($faculty->status === "True") ? 'publish' : 'draft';
    
        $faculty_add = array(
            'post_title' => $faculty->title,
            'post_content' => $faculty->body,
            'post_date_gmt' => $faculty->created,
            'post_date' => $faculty->created,
            'post_status' => $post_status,
            'reference_node_id' => $faculty->nid,
            'slug' => $new_slug,
            'post_type' => 'faculty'
        );

        $faculty_id = wp_insert_post($faculty_add);

        if ($faculty_id) {
            update_field('reference_node_id', $faculty->nid, $faculty_id);
        }

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

        $attach_id = wp_insert_attachment($attachment, $file, $faculty_id);

        require_once(ABSPATH . 'wp-admin/includes/image.php');

        $attach_data = wp_generate_attachment_metadata($attach_id, $file);

        wp_update_attachment_metadata($attach_id, $attach_data);

        set_post_thumbnail($faculty_id, $attach_id);
        }
        

        echo "... success";

        echo "<br />";

        return $faculty_id;
    }

    echo "... exists";

    echo "<br />";

    return null;

}