<?php

include_once(WP_PLUGIN_DIR . '/custom-permalinks/frontend/class-custom-permalinks-frontend.php');

$request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/news/ids/all/2020");

if (is_wp_error($request)) {
    return false; // Bail early
}

$body = wp_remote_retrieve_body($request);

$ids = json_decode($body);

if (!empty($ids)) {

    foreach ($ids as $id) {

        $request = wp_remote_get("http://devs.cud.ac.ae/staging/wp/migrate/content/news/excerpt/$id->nid");

        $body = wp_remote_retrieve_body($request);

        $news = json_decode($body); {
            if (!empty($news)) {
                $news_id = update_news($news[0]);
            }
        }
    }
}

function update_news($news)
{
    $new_slug = sanitize_title($news->title);

    echo "Processing... " . $new_slug . " success <br />";

    $query = new WP_Query(
        array(
            
            'name' => $new_slug, 
            'post_type' => 'news',
            'meta_query' => array(
                array(
                    'key' => 'reference_node_id',
                    'value' => $news->nid,
                    'compare' => '='
                )
            )
        
        )

);

    if (!$query->have_posts()) {
    } else {

        if (count($query->posts)) {
            $post = $query->posts[0];

            $pod =  pods('news', $post->ID);
            
            if ($pod) {
                $data = array(
                    'excerpt' => $news->body_1
                );

                $pod->save( $data );
            }

           
        }

    }

    echo "<br />";

    return null;
}