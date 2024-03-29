<?php

// [product_category_slider]
function shortcode_product_category_slider($atts, $content = null) {
	global $woocommerce;
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		'title' => '',
		'category' => '',
		'per_page'  => '12',
		'columns'  => '4',
        'layout'  => 'listing',
        'orderby' => 'date',
        'order' => 'desc'
	), $atts));
	ob_start();
	?>

    <?php 
	/**
	* Check if WooCommerce is active
	**/
	if (class_exists('WooCommerce')) {
	?>

     <div class="woocommerce shortcode_products_slider">
         <div id="products-carousel" class="products-carousels-<?php echo $sliderrandomid ?>">

		<?php 
		if ($title != '') {
			echo '<h2 class="carousel-title">' . $title . '</h2>';
		}
		?>		
    
            <?php
			
			// Get products on sale
			
			$meta_query = $woocommerce->query->get_meta_query();
			
            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $category
                    )
                ),
                'ignore_sticky_posts'   => 1,
                'posts_per_page' => $per_page,
                'orderby'   => $orderby,
                'order' => $order

            );
            
            $products = new WP_Query( $args );
            
            if ( $products->have_posts() ) : ?>
                        
            <ul id="products" class="products products-grid product-layout-grid owl-carousel owl-theme">            
                <?php while ( $products->have_posts() ) : $products->the_post(); ?>
            
                    <?php wc_get_template_part( 'content', 'product' ); ?>
        
                <?php endwhile; // end of the loop. ?>
            </ul>
                
            <?php
            
            endif;
            
            ?>
        </div>
    </div>
    
    <?php } ?>
    
    <script>
    jQuery(document).ready(function($) {

        "use strict";

        var owl = $('.products-carousels-<?php echo $sliderrandomid ?> #products');
        owl.owlCarousel({
            rtl: (eva_scripts_vars.rtl === 'true'),
            items:<?php echo $columns; ?>,
            margin:30,
            lazyLoad:true,
            dots:true,
            responsiveClass:true,
            nav:true,
            mouseDrag:true,
            navText: [
                "",
                ""
            ],
            responsive:{
                0:{
                    margin:20,
                    items:2,
                    nav:false,
                },
                600:{
                    margin:25,
                    items:3,
                    nav:false,
                },
                1000:{
                    items:4,
                    nav:true,
                    dots:false,
                },
                1200:{
                    items:<?php echo $columns; ?>,
                    nav:true,
                    dots:false,
                }
            }
        });
    
    });
    </script>

	<?php
    wp_reset_query();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("product_category_slider", "shortcode_product_category_slider");

