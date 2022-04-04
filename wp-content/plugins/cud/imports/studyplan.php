<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get('http://devs.cud.ac.ae/staging/wp/migrate/content/studyplan/ids');

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);

$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/studyplan/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $studyplan = json_decode($body); {
            if ( !empty( $studyplan ) ) {
                $studyplan_id = add_studyplan($studyplan[0]);

                if ($studyplan_id) {
                    $url = $studyplan->view_node;
        
                    delete_add_custom_permalink($studyplan_id, $url);    
                }
            }
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

function add_studyplan($studyplan)
{   
    $url_address = "https://cud.ac.ae";

    // check the slug and run an update if necessary 
    $new_slug = sanitize_title( $studyplan->title );

    echo "Processing... " . $new_slug;

    $query = new WP_Query( array( 'name' => $new_slug, 'post_type' => 'studyplan' ) );

    if ( !$query->have_posts() ) {

        // use this line if you have multiple posts with the same title
        $new_slug = wp_unique_post_slug( $new_slug, $studyplan->nid, $studyplan->status, "studyplan", null );
 
        $image_url = str_replace('%2F', '/', urlencode(ltrim(stripcslashes($studyplan->field_image), "/")));

        $image_url = str_replace('staging/', '/', $url_address . $image_url);

        $post_status = ($studyplan->status === "True") ? 'publish' : 'draft';

        $studyplan_add = array(
            'post_title' => $studyplan->title,
            'post_content' => $studyplan->body,
            'post_date_gmt' => $studyplan->created,
            'post_date' => $studyplan->created,
            'post_status' => $post_status,
            'reference_node_id' => $studyplan->nid,
            'slug' => $new_slug,
            'post_type' => 'studyplan'
        );

        $studyplan_id = wp_insert_post($studyplan_add);

        if ($studyplan_id) {
            update_field('reference_node_id', $studyplan->nid, $studyplan_id);
        }
        
        echo "... success";

        echo "<br />";

        return $studyplan_id;
    }

    echo "... exists";

    echo "<br />";

    return null;

}