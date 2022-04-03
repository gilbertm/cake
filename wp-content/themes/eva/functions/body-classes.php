<?php


// -----------------------------------------------------------------------------
// Body Class - No Animation
// -----------------------------------------------------------------------------

function eva_body_classes($classes) {
	global $tdl_options;
    $classes[] = 'no-offcanvas-animation';

	// if ( $tdl_options['tdl_ajax_filter'] == 1 ) {
	// 	$classes[] = 'catalog-ajax-filter';
	// }


    return $classes;
}


// -----------------------------------------------------------------------------
// Print Body Classes
// -----------------------------------------------------------------------------
    
function eva_custom_body_classes() {    

    add_filter( 'body_class', 'eva_body_classes' );

}

add_action( 'wp_head', 'eva_custom_body_classes', 100 );