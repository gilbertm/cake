<?php

if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
});

// add the child style.css
// https://creativethemes.com/blocksy/docs/getting-started/child-theme/
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style('blocksy-child-style', get_stylesheet_uri());
});