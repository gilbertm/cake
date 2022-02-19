<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tdl_options = eva_global_var();

$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );
?>

<?php if ( (isset($tdl_options['tdl_category_view'])) && ($tdl_options['tdl_category_view'] == 'perspective_hover') ) : ?>
	<li class="category_grid_item column">
		<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="tilter tilter--1">
			<figure class="tilter__figure_nytowl">
				<?php 
					if ( $image ) { ?>
					<img class="tilter__image" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html($category->name); ?>" />
					<?php  } else {  ?>
					<div class="tilter__image_blank"></div>
				<?php	}
				?>
				<div class="tilter__deco tilter__deco--shine"><div></div></div>
				<div class="tilter__deco tilter__deco--overlay"></div>
				<figcaption class="tilter__caption_nytowl" style="position: absolute;bottom: 0;width: 100%;padding: 2.2em;">
					<h3 class="tilter__title" style="text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.75);font-size:2.5rem;
font-family: 'Cookie', cursive;
text-transform: capitalize;
color: rgb(255, 21, 154);"><?php echo esc_html($category->name); ?></h3>					
					<p style="padding: 0;
margin: 0;
font-family: 'Patrick Hand', cursive;
font-size: small;
text-transform: inherit;
letter-spacing: normal;
font-weight: normal;
font-size: 12px;
text-shadow: none;
font-style: inherit;" class="tilter__description"><?php echo sprintf (_n( '%d item', '%d items', $category->count , 'eva'), $category->count ); ?></p>
				</figcaption>
				<div class="tilter__deco--lines_nytowl"><span></span></div>
			</figure>
		</a>
	</li>
<?php else: ?> 
	<li class="category_grid_item column">
		<div class="category_grid_box">
			<a class="category_item" href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
				<div class="category_overlay"></div>
				<span class="category_name">
					<span><?php echo sprintf (_n( '%d item', '%d items', $category->count, 'eva' ), $category->count ); ?></span>
					<h3><?php echo esc_html($category->name); ?></h3>
				</span>                                            
				<?php 
				if ( $image ) { ?>
				<img class="category_item_bkg" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html($category->name); ?>" />
					<?php  } else {  ?>
					<div class="category_item_bkg_blank"></div>
				<?php	}
				?>                                          
			</a>
		</div>                                           
	</li>
<?php endif; ?>

