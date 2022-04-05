<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get('http://devs.cud.ac.ae/staging/wp/migrate/content/faq');

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);


$data = json_decode($body);

if (!empty($data)) {

    foreach ($data as $faq) {

        $faq_id = add_faq($faq);

        if ($faq_id) {
            $url = $faq->view_node;

            delete_add_custom_permalink($faq_id, $url);    
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

function add_faq($faq)
{   
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title( $faq->title );

    echo "Processing... " . $new_slug;

    $query = new WP_Query( array( 'name' => $new_slug, 'post_type' => 'faq' ) );

    if ( !$query->have_posts() ) {

        // use this line if you have multiple posts with the same title
        $new_slug = wp_unique_post_slug( $new_slug, $faq->nid, $faq->status, "faq", null );
 
        $image_url = str_replace('%2F', '/', urlencode(ltrim(stripcslashes($faq->field_image), "/")));

        $image_url = str_replace('staging/', '/', $url_address . $image_url);

        $post_status = ($faq->status === "True") ? 'publish' : 'draft';

        $faq_add = array(
            'post_title' => $faq->title,
            'post_content' => $faq->body,
            'post_date_gmt' => $faq->created,
            'post_date' => $faq->created,
            'post_status' => $post_status,
            'reference_node_id' => $faq->nid,
            'slug' => $new_slug,
            'post_type' => 'faq'
        );

        $faq_id = wp_insert_post($faq_add);

        if ($faq_id) {
            update_field('reference_node_id', $faq->nid, $faq_id);
        }

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

        $attach_id = wp_insert_attachment($attachment, $file, $faq_id);

        require_once(ABSPATH . 'wp-admin/includes/image.php');

        $attach_data = wp_generate_attachment_metadata($attach_id, $file);

        wp_update_attachment_metadata($attach_id, $attach_data);

        set_post_thumbnail($faq_id, $attach_id);

        echo "... success";

        echo "<br />";

        return $faq_id;
    }

    echo "... exists";

    echo "<br />";

    return null;

}