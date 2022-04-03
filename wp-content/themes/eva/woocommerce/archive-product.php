<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $woocommerce_loop;
$tdl_options = eva_global_var();

$page_id = wc_get_page_id('shop');

get_header( 'shop' ); 

//woocommerce_before_main_content
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

//woocommerce_before_shop_loop
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_action( 'woocommerce_before_shop_loop_result_count', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop_catalog_ordering', 'woocommerce_catalog_ordering', 30 );

// Sidebar Settings
$shop_has_sidebar = false;
$shop_sidebar = 'full-width';


if ( 
    is_active_sidebar( 'widgets-product-listing' )
     && (isset($tdl_options['tdl_sidebar_style']))
     && ($tdl_options['tdl_sidebar_style'] == "1") 
)
{
    $shop_has_sidebar = true;
    $shop_sidebar = 'shop-has-sidebar';
} else {
    $shop_has_sidebar = false;
    $shop_sidebar = 'full-width';    
}

if (isset($_GET["shop_sidebar"])) $shop_sidebar = $_GET["shop_sidebar"];

?>



<div id="primary" class="content-area shop-page<?php echo esc_attr($shop_has_sidebar) ? ' '. esc_attr($shop_sidebar):'';?>">

    <?php get_template_part( 'includes/headers/shop', 'header' ); ?>

        <!-- Shop Content Area -->  

        <div id="content" class="site-content" role="main">
            <div class="row">
                <?php if ( $shop_has_sidebar && $shop_sidebar != "full-width" ) : ?>
                    <div class="xlarge-2 large-3 columns show-for-large-up sidebar-pos">
                        <div class="shop_sidebar wpb_widgetised_column">                   
                            <?php if ( is_active_sidebar( 'widgets-product-listing' ) ) { ?>
                                <div id="secondary" class="widget-area" role="complementary">
                                    <?php dynamic_sidebar( 'widgets-product-listing' ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                           
                    <div id="content-position" class="xlarge-10 large-9 columns content-pos">
                <?php else : ?>

                <div class="large-12 columns">
                            
                <?php endif; ?>  
                
                    <!-- Shop Order Bar -->

                    <div class="top_bar_shop">

                        <div class="catalog-ordering">
                            <?php if ( is_active_sidebar( 'widgets-product-listing' ) ) : ?>
                                <div class="shop-filter"><span><?php echo esc_html__( 'Filter', 'eva' ); ?></span></div>
                            <?php endif; ?>
                            <?php if ( have_posts() ) : ?>
                                <?php do_action( 'woocommerce_before_shop_loop_result_count' ); ?>
                            <?php endif; ?>
                        </div> <!--catalog-ordering-->
                        <div class="clearfix"></div>
                    </div><!-- .top_bar_shop-->     
                    
                    <?php if ( woocommerce_product_loop() ) { ?> 
                        <?php
                            /**
                             * woocommerce_before_shop_loop hook.
                             *
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            do_action( 'woocommerce_before_shop_loop' );
                        ?>
                        <div class="active_filters_ontop"><?php the_widget( 'WC_Widget_Layered_Nav_Filters', array(), array() ); ?></div>    
                                            
                        <?php 
                                woocommerce_product_loop_start();

                                if ( wc_get_loop_prop( 'total' ) ) {
                                    while ( have_posts() ) {
                                        the_post();

                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         *
                                         * @hooked WC_Structured_Data::generate_product_data() - 10
                                         */
                                        do_action( 'woocommerce_shop_loop' );

                                        wc_get_template_part( 'content', 'product' );
                                    }
                                }

                                woocommerce_product_loop_end();
                             ?>                        

                        <?php
                            /**
                             * woocommerce_after_shop_loop hook.
                             *
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action( 'woocommerce_after_shop_loop' );
                        ?>
                    <?php } else { ?>
                
                        <?php wc_get_template( 'loop/no-products-found.php' ); ?>
            
                    <?php } ?>



                </div><!-- .columns -->            
            </div><!-- .row -->
        </div><!-- #content --> 

</div><!-- #primary -->

<?php get_footer( 'shop' ); ?>
