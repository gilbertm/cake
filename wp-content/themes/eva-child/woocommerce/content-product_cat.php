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
		<figure class="custom_product_listing">
				<?php 
					if ( $image ) { ?>
					<img class="tilter__image" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html($category->name); ?>" />
					<?php  } else {  ?>
					<div class="tilter__image_blank"></div>
				<?php	}
				?>
			<figcaption>
				<h1 class="title_1"><?php echo esc_html($category->name); ?></h1>
				<h2 class="title_2"><?php echo sprintf (_n( '%d item', '%d items', $category->count , 'eva'), $category->count ); ?></h2>
			</figcaption><a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>"></a>
		</figure>
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

