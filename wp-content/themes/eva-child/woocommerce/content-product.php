<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$tdl_options = eva_global_var();

//woocommerce_before_shop_loop_item
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

//woocommerce_after_shop_loop_item
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

//woocommerce_after_shop_loop_item_title
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_action( 'woocommerce_after_shop_loop_item_title_loop_price', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title_loop_rating', 'woocommerce_template_loop_rating', 5 );

//woocommerce_before_shop_loop_item_title
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}

$custom_shop_second_image = (!empty($tdl_options['tdl_shop_second_image'])) ? $tdl_options['tdl_shop_second_image'] : 1;
$quick_view  = (!empty($tdl_options['tdl_quick_view'])) ? $tdl_options['tdl_quick_view'] : 1;
$add_to_cart_display  = (!empty($tdl_options['tdl_add_to_cart_display'])) ? $tdl_options['tdl_add_to_cart_display'] : 'display_buttons';
?>

<div class="custom product column <?php  if ( (isset($tdl_options['tdl_catalog_mode'])) && ($tdl_options['tdl_catalog_mode'] == 1) ) : ?>catalog_mode<?php endif; 
    echo esc_attr($add_to_cart_display) ?>">

    <?php 
    // quick view
    // do_action('woocommerce_before_shop_loop_item'); 
    ?>
        
    <?php
    // thumbnail
    $attachment_ids = $product->get_gallery_image_ids();
    if ($attachment_ids) {
        $loop = 0;

        foreach ( $attachment_ids as $attachment_id ) {
            
            $image_link = wp_get_attachment_url($attachment_id);

            if (!$image_link) {
                continue;
            }
            
            $loop++;
            $product_thumbnail_second = wp_get_attachment_image_src($attachment_id, 'shop_catalog');
             
            if ($loop == 1) {
                break;
            }
        }
    }
    ?>

    <div class="product-card">
        <div class="m-0 card pb-3">
            <div class="card-image <?php echo ent2ncr($class); ?>">
                <div class="m-2 p-1 text-primary position-absolute rounded-pill price-wrapper">
                    <?php do_action( 'woocommerce_after_shop_loop_item_title_loop_price' ); ?>
                </div>
                
                <a href="<?php the_permalink(); ?>">

                <?php if (has_post_thumbnail($post->ID)) : ?>

                        <?php if ( $custom_shop_second_image == "1" ) : ?>
                            <span class="product_thumbnail_secondary" style="<?php echo ent2ncr($style); ?>"></span>            
                        <?php endif; ?>

                <?php endif; ?>

                    <?php
                        if (has_post_thumbnail($post->ID) ) {
                            echo  get_the_post_thumbnail($post->ID, 'post-thumbnail');
                        } else {
                            echo apply_filters('woocommerce_single_product_image_html', sprintf('<img src="%s" alt="Placeholder" />', wc_placeholder_img_src()), $post->ID);
                        }
                    ?>
                </a>
            </div>
             <?php if ( (isset($tdl_options['tdl_catalog_mode'])) && ($tdl_options['tdl_catalog_mode'] == 0) ) : ?>
               
                <?php if ( !$product->is_in_stock() ) : ?>
                    <div class="card-img-overlay">
                        <span class="out_of_stock_title">
                        <?php 
                            if (isset($tdl_options['tdl_out_of_stock_text'])) {
                                esc_html_e($tdl_options['tdl_out_of_stock_text'], 'eva');
                            } else {
                                esc_html_e('Out of stock', 'woocommerce');
                            }
                        ?>
                        </span> 
                    
                     </div>
                <?php endif; ?>           
            <?php endif; ?>

            <div class="card-header bg-transparent">
                <a class="shop_product_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php // extra infos, showing variants //do_action( 'woocommerce_after_shop_loop_item_title' ); ?> 
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col col-7">
                        <?php if ( (isset($tdl_options['tdl_catalog_mode'])) && ($tdl_options['tdl_catalog_mode'] == 0) ) : ?>
                            <?php wc_get_template( 'loop/sale-flash.php' ); ?>
                        <?php endif; ?>
                    
                        <?php if ( (isset($tdl_options['tdl_review_off'])) && ($tdl_options['tdl_review_off'] == 1) ) : ?>
                            <?php do_action( 'woocommerce_after_shop_loop_item_title_loop_rating' ); ?>
                        <?php endif; ?>

                        <?php 
                        $catalog_mode  = (!empty($tdl_options['tdl_catalog_mode'])) ? $tdl_options['tdl_catalog_mode'] : 0;

                        $category_listing  = (!empty($tdl_options['tdl_category_listing'])) ? $tdl_options['tdl_category_listing'] : 'first_category'; ?>

                        <?php if ( $category_listing !== 'none') { ?>
                                
                                <?php if ( $category_listing == 'brand') { ?>
                                
                                    <?php if(($term_id = get_brands_term_by_product_id($product->get_id())) > 0): $term = get_term($term_id,'brands');?>
                                        <p class="product-category-listing w-75 mx-auto text-center"><a href="<?php echo get_term_link($term_id,'brands');?>" class="product-category-link"><?php echo esc_attr($term->name) ?></a></p>
                                    <?php endif; ?>            
                                
                                <?php } else if ( $category_listing == 'first_category') { ?>

                                        <?php 

                                        $product_cats = strip_tags(wc_get_product_category_list ($product->get_id(), '|||', '', '')); 
                                        list($firstpart) = explode('|||', $product_cats);
                                        $category_object = get_term_by('name', $firstpart, 'product_cat');
                                        $category_id = $category_object->term_id;
                                        if(empty($category_id)){
                                            $category_url = $firstpart;
                                        } else {
                                            $category_url = get_term_link( (int)$category_id, 'product_cat' );
                                        }
                                        ?>
                                        <p class="product-category-listing mx-auto px-2"><a href="<?php echo esc_url($category_url); ?>" class="product-category-link"><?php echo esc_attr($firstpart); ?></a></p>

                                <?php } else { ?>
                                        <?php
                                            echo wc_get_product_category_list($product->get_id(), ', ', '<p class="product-category-listing  w-75 mx-auto text-center">', '</p>');
                                        ?>
                                <?php } ?>

                        <?php } ?>
                    </div>
                    <div class="col col-5">
                        <ul class="card-action-buttons">
                            <li>
                                <button type="button" class="btn btn-wish btn-circle m-1"><?php if (class_exists('YITH_WCWL')) : ?><?php echo trim(do_shortcode('[yith_wcwl_add_to_wishlist]')); ?><?php endif; ?></button>
                            </li>
                        </ul>
                    </div>
                </div>
               
            </div>

            <div class="card-content text-center">
                
                <div class="button jelly text-center">
                    <?php do_action( 'woocommerce_after_shop_loop_item' ); ?> 
                </div>
            </div>
        </div>
    </div>
</div>