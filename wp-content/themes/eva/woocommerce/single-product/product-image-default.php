<?php
	
	global $post, $product;
	$tdl_options = eva_global_var();

	$pwrapper_class = "";
	$pwrapper_item_class = "";
    $modal_class = "";
	$zoom_class = "";
	$plus_button = "";

	
	if ( (isset($tdl_options['tdl_product_gallery_lightbox'])) && ($tdl_options['tdl_product_gallery_lightbox'] == "1" ) ) {
		$pwrapper_class = "photoswipe-wrapper";
		$pwrapper_item_class = "photoswipe-item";
        $modal_class = "zoom_enabled";
		$zoom_class = "";
    } else {
    	$pwrapper_class = "disableClick";
    	$zoom_class = "";
    }
	
	if ( (isset($tdl_options['tdl_product_gallery_zoom'])) && ($tdl_options['tdl_product_gallery_zoom'] == "1" ) ) {
		$modal_class = "";
		$zoom_class = "easyzoom";
	}

?>

<?php
    
//Featured

$featured_image_title 				= esc_html( get_the_title( get_post_thumbnail_id() ) );
$featured_image_src 				= wp_get_attachment_image_src( get_post_thumbnail_id(), 'shop_thumbnail' );
$featured_image_data_src			= wp_get_attachment_image_src( get_post_thumbnail_id(), 'shop_single' );
$featured_image_data_src_original 	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
$featured_image_link  				= has_post_thumbnail() ? wp_get_attachment_url( get_post_thumbnail_id() ) : wc_placeholder_img_src();

$featured_attachment_meta 			= wp_get_attachment(get_post_thumbnail_id());

$page_product_youtube 	= get_field('tdl_video_review');

$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
?>

<div class="product-images-layout product-images-default images">
    
    <div class="product_images woocommerce-product-gallery">

		<div id="product-images" class="swiper-container display-gallery product-images-carousel  woocommerce-product-gallery__wrapper" >
			<div class="swiper-wrapper <?php echo esc_attr($pwrapper_class); ?>">


				<?php

	            // Featured	            
				
				?>
				<div class="swiper-slide product-image">
					<div class="<?php echo esc_html($zoom_class); ?> <?php echo esc_attr($pwrapper_item_class); ?>  woocommerce-product-gallery__image">
						<a class="<?php echo esc_html($modal_class); ?>" href="<?php echo esc_url( $full_size_image[0] ); ?>">
							<?php if ( has_post_thumbnail() ) { ?>
								<img src="<?php echo esc_url($full_size_image[0]); ?>" data-src="<?php echo esc_url($full_size_image[0]); ?>" alt="<?php echo esc_attr($featured_image_title); ?>" class="swiper-lazy wp-post-image" data-large_image_width="<?php echo esc_attr($full_size_image[1]); ?>" data-large_image_height="<?php echo esc_attr($full_size_image[2]); ?>">
							<?php } else { ?>
								<img src="<?php echo esc_url(wc_placeholder_img_src()); ?>" data-src="<?php echo esc_url(wc_placeholder_img_src()); ?>" class="swiper-lazy">
							<?php } ?>
						</a>
					</div>
					<div class="swiper-lazy-preloader"></div>
				</div>	


				<?php
	            
				// Gallery
	            
	            $attachment_ids = $product->get_gallery_image_ids();
	            
	            if ( $attachment_ids ) {
	                
	                foreach ( $attachment_ids as $attachment_id ) {
	        
	                    $gallery_image_title       			= esc_attr( get_the_title( $attachment_id ) );
	                    $gallery_image_src         			= wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
						$gallery_image_data_src    			= wp_get_attachment_image_src( $attachment_id, 'shop_single' );
						$gallery_image_data_src_original 	= wp_get_attachment_image_src( $attachment_id, 'full' );
						$gallery_image_link        			= wp_get_attachment_url( $attachment_id );
					    
					    $gallery_attachment_meta			= wp_get_attachment($attachment_id);
					    $thumbnail_size_a    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
					    $full_size_image_a   = wp_get_attachment_image_src( $attachment_id, $thumbnail_size_a );				    
						
						?>


						<div class="swiper-slide">
							<div class="<?php echo esc_attr($zoom_class); ?> <?php echo esc_attr($pwrapper_item_class); ?>">
								<a class="<?php echo esc_html($modal_class); ?> zoom" href="<?php echo esc_url($full_size_image_a[0]); ?>" >
									<img src="<?php echo esc_url($full_size_image_a[0]); ?>" data-src="<?php echo esc_url($full_size_image_a[0]); ?>" alt="<?php echo esc_attr($gallery_image_title); ?>" data-large_image_width="<?php echo esc_attr($full_size_image_a[1]); ?>" data-large_image_height="<?php echo esc_attr($full_size_image_a[2]); ?>" class="swiper-lazy">
									<div class="swiper-lazy-preloader"></div>
								</a>
							</div>
						</div>

	                	<?php
					
	                }
	                
	            } ?> 

	            <?php // Youtube Video

				if ( $page_product_youtube ) : ?>
					
					<div class="swiper-slide video">
						<a href="<?php echo esc_url($page_product_youtube); ?>"><?php echo wp_oembed_get( $page_product_youtube ); ?></a>
					</div>

				<?php endif; ?>	          

			</div><!-- /swiper-wrapper -->

			    <div class="swiper-button-next"></div>
    			<div class="swiper-button-prev"></div>
		</div><!-- /swiper-container -->
        
    </div><!-- /.product_images -->

</div><!-- /.images -->
