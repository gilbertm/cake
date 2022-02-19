<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
    return;
}

global $post, $product;

$page_product_youtube = get_field('tdl_video_review');

$attachment_ids = $product->get_gallery_image_ids();
    
if ( $attachment_ids || $page_product_youtube ) {
    
?>      
    
    <ul class="product_thumbnails flex-control-nav flex-control-thumbs">

        <?php        

            // Featured

            if ( has_post_thumbnail() ) {
            
                $image_title        = esc_attr( get_the_title( get_post_thumbnail_id() ) );
                $featured_image_src    = wp_get_attachment_image_src( get_post_thumbnail_id(), 'shop_thumbnail' );


                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li class="carousel-cell is-nav-selected"><img class="%s" src="%s" /></li>', 'attachment-shop_thumbnail size-shop_thumbnail', $featured_image_src[0]  ), $post->ID );

            } else {
                
                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li class="carousel-cell is-nav-selected"><img src="%s" alt="Placeholder" /></li>', wc_placeholder_img_src() ), $post->ID ); 

            }

            

            // Thumbs

            $attachment_ids = $product->get_gallery_image_ids();

            if ( $attachment_ids ) {
            
                foreach ( $attachment_ids as $attachment_id ) {

                    $image_title    = esc_attr( get_the_title( $attachment_id ) );
                    $image          = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );                

                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li class="carousel-cell">%s</li>', $image ), $attachment_id, $post->ID );
                    
                }

            }


            // Youtube Video

            if ( $page_product_youtube  ) {
                echo '<li class="carousel-cell youtube"></li>';
            }

        ?>
        
    </ul>

    

<?php
    
}