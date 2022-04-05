<?php

// [top_rated_products_listing]
function shortcode_top_rated_products_listing($atts, $content = null) {
	$randomid = rand();

	extract(shortcode_atts(array(
		'title' => '',
		'per_page'  => '12',
		'columns'  => '4',
		'layout'  => 'listing',
        'orderby' => 'date',
        'order' => 'desc',
        
	), $atts));

	ob_start();

	?>

    <?php 
	/**
	* Check if WooCommerce is active
	**/
	if (class_exists('WooCommerce')) {
	?>

     <div class="woocommerce shortcode_products_listing">
         <div  class="products_listing_section" id="products-listing-<?php echo $randomid; ?>">

        <?php 

		if ($title != '') {
			echo '<h2 class="shortcode_title">' . $title . '</h2>';
		}

        echo do_shortcode('[top_rated_products per_page="'.$per_page.'" columns="'.$columns.'" orderby="'.$orderby.'" order="'.$order.'"]'); 
        ?>
 
        </div>
    </div>
    
    <?php } ?>


	<?php
    wp_reset_query();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("top_rated_products_listing", "shortcode_top_rated_products_listing");