<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

while ( have_posts() ) : the_post();

	global $post, $product;
	$tdl_options = eva_global_var();

    add_action( 'woocommerce_before_single_product_summary_sale_flash', 'woocommerce_show_product_sale_flash', 10 );
    add_action( 'woocommerce_before_single_product_summary_product_images', 'woocommerce_show_product_images', 20 );

    add_action( 'woocommerce_single_product_summary_single_title', 'woocommerce_template_single_title', 5 );
    add_action( 'woocommerce_single_product_summary_single_rating', 'woocommerce_template_single_rating', 10 );
    add_action( 'woocommerce_single_product_summary_single_price', 'woocommerce_template_single_price', 10 );
    add_action( 'woocommerce_single_product_summary_single_excerpt', 'woocommerce_template_single_excerpt', 20 );
    add_action( 'woocommerce_single_product_summary_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 30 );
    add_action( 'woocommerce_single_product_summary_single_meta', 'woocommerce_template_single_meta', 40 );
    add_action( 'woocommerce_single_product_summary_single_sharing', 'woocommerce_template_single_sharing', 50 );

    add_action( 'woocommerce_product_summary_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

    function add_product_class($classes) {
	    $classes[] = "product";
	    return $classes;
	}
	add_filter('post_class', 'add_product_class');

	?>

	<?php if ( !post_password_required() ) : ?>

	<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php 
        /* get swatch html */
        add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'eva_get_swatch_html', 10, 2 );
        function eva_get_swatch_html( $html, $args ) {

            /* return `$html` when `WooCommerce Variation Swatches` plugin not installed */
            if(!function_exists('TA_WCVS')) return $html;

            $swatch_types = TA_WCVS()->types;
            $attr         = TA_WCVS()->get_tax_attribute( $args['attribute'] );
    
            /* Return if this is normal attribute */
            if ( empty( $attr ) ) {
                return $html;
            }
    
            if ( ! array_key_exists( $attr->attribute_type, $swatch_types ) ) {
                return $html;
            }
    
            $options   = $args['options'];
            $product   = $args['product'];
            $attribute = $args['attribute'];
            $class     = "variation-selector variation-select-{$attr->attribute_type}";
            $swatches  = '';
    
            if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
                $attributes = $product->get_variation_attributes();
                $options    = $attributes[$attribute];
            }

            if ( array_key_exists( $attr->attribute_type, $swatch_types ) ) {
                if ( ! empty( $options ) && $product && taxonomy_exists( $attribute ) ) {
                    /* Get terms if this is a taxonomy - ordered. We need the names too. */
                    $terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );
    
                    foreach ( $terms as $term ) {
                        if ( in_array( $term->slug, $options ) ) {
                            $swatches .= apply_filters( 'tawcvs_swatch_html', '', $term, $attr, $args );
                        }
                    }
                }
    
                if ( ! empty( $swatches ) ) {
                    $class .= ' hidden';
    
                    $swatches = '<div class="tawcvs-swatches" data-attribute_name="attribute_' . esc_attr( $attribute ) . '">' . $swatches . '</div>';
                    $html     = '<div class="' . esc_attr( $class ) . '">' . $html . '</div>' . $swatches;
                }
            }
    
            return $html;
        }

        /* print html watch */
        add_filter( 'tawcvs_swatch_html', 'eva_swatch_html', 5, 4 );
        function eva_swatch_html( $html, $term, $attr, $args ) {

            /* return `$html` when `WooCommerce Variation Swatches` plugin not installed */
            if(!function_exists('TA_WCVS')) return $html;

            $selected = sanitize_title( $args['selected'] ) == $term->slug ? 'selected' : '';
            $name     = esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) );
    
            switch ( $attr->attribute_type ) {
                case 'color':
                    $color = get_term_meta( $term->term_id, 'color', true );
                    list( $r, $g, $b ) = sscanf( $color, "#%02x%02x%02x" );
                    $html = sprintf(
                        '<span class="swatch swatch-color swatch-%s %s" style="background-color:%s;color:%s;" title="%s" data-value="%s">%s</span>',
                        esc_attr( $term->slug ),
                        $selected,
                        esc_attr( $color ),
                        "rgba($r,$g,$b,0.5)",
                        esc_attr( $name ),
                        esc_attr( $term->slug ),
                        $name
                    );
                    break;
    
                case 'image':
                    $image = get_term_meta( $term->term_id, 'image', true );
                    $image = $image ? wp_get_attachment_image_src( $image ) : '';
                    $image = $image ? $image[0] : WC()->plugin_url() . '/assets/images/placeholder.png';
                    $html  = sprintf(
                        '<span class="swatch swatch-image swatch-%s %s" title="%s" data-value="%s"><img src="%s" alt="%s">%s</span>',
                        esc_attr( $term->slug ),
                        $selected,
                        esc_attr( $name ),
                        esc_attr( $term->slug ),
                        esc_url( $image ),
                        esc_attr( $name ),
                        esc_attr( $name )
                    );
                    break;
    
                case 'label':
                    $label = get_term_meta( $term->term_id, 'label', true );
                    $label = $label ? $label : $name;
                    $html  = sprintf(
                        '<span class="swatch swatch-label swatch-%s %s" title="%s" data-value="%s">%s</span>',
                        esc_attr( $term->slug ),
                        $selected,
                        esc_attr( $name ),
                        esc_attr( $term->slug ),
                        esc_html( $label )
                    );
                    break;
            }
    
            return $html;
        }

	 ?>


		<a href="#0" class="cd-close"></a>
        <div class="cd-slider-wrapper">   
        	<?php  
        	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
            $image_title 				= esc_attr( get_the_title( $post_thumbnail_id ) );
			$image_src 					= wp_get_attachment_image_src( $post_thumbnail_id, 'shop_thumbnail' );
			$image_data_src				= wp_get_attachment_image_src( $post_thumbnail_id, 'shop_single' );
			$image_data_src_original 	= wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
			$image_link  				= wp_get_attachment_url( $post_thumbnail_id );
			$image       				= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
			$image_original				= get_the_post_thumbnail( $post->ID, 'full' );
			$attachment_count   		= count( $product->get_gallery_image_ids() );
			$catalog_image 				= get_the_post_thumbnail( $post->ID, 'shop_catalog');
			?>

			<div class="cover-image">
				<?php echo wp_kses_post($catalog_image); ?>
            </div>

			<div class="swiper-container">
				<div class="swiper-wrapper images woocommerce-product-gallery__wrapper">
					<?php if ( has_post_thumbnail() ) { ?>  
					<div class="swiper-slide woocommerce-product-gallery__image">
						<?php echo wp_kses_post($image); ?>
		            </div>
					<?php
		            $attachment_ids = $product->get_gallery_image_ids();
		            if ( $attachment_ids ) {
		                foreach ( $attachment_ids as $attachment_id ) {
		                    $image_link = wp_get_attachment_url( $attachment_id );
		                    if (!$image_link) continue;
		                    $image_title       			= esc_attr( get_the_title( $attachment_id ) );
		                    $image_src         			= wp_get_attachment_image_src( $attachment_id, 'shop_single_small_thumbnail' );
							$image_data_src    			= wp_get_attachment_image_src( $attachment_id, 'shop_single' );
							$image_data_src_original 	= wp_get_attachment_image_src( $attachment_id, 'full' );
							$image_link        			= wp_get_attachment_url( $attachment_id );
						    $image		      			= wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );?>                    		
							<div class="swiper-slide">
	                            <img src="<?php echo esc_url($image_data_src[0]); ?>" alt="<?php echo esc_html($image_title); ?>">
		                    </div>
		                	<?php
						}
					}
		            ?>		                
					<?php
					} else {
				        echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );
				    }
				    ?>
				</div>

				<div class="swiper-pagination"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>

			</div>
        </div><!-- cd-slider-wrapper -->

        <div class="cd-item-info">
            <div class="product_infos">
                <div class="quickview-badges">
				    <?php if ( (isset($tdl_options['tdl_catalog_mode'])) && ($tdl_options['tdl_catalog_mode'] == 0) ) : ?>
				        <?php wc_get_template( 'loop/sale-flash.php' ); ?>
				    <?php endif; ?> 
                </div>


                <?php do_action( 'woocommerce_single_product_summary_single_rating' );?>
                <a href="<?php the_permalink(); ?>"><?php do_action( 'woocommerce_single_product_summary_single_title' );?></a>

				<div class="product_price">
                    <?php do_action( 'woocommerce_single_product_summary_single_price' ); ?>
                </div>

                <div class="product_excerpt">
                	<?php do_action( 'woocommerce_single_product_summary_single_excerpt' ); ?>
          		</div>   
				<?php if ( (isset($tdl_options['tdl_catalog_mode'])) && ($tdl_options['tdl_catalog_mode'] == 0) ) { ?>
        			<?php do_action( 'woocommerce_single_product_summary_single_add_to_cart' ); ?>
        		<?php } ?>
            </div><!-- product_infos -->
        </div><!-- cd-item-info -->
	</div><!-- #product-<?php the_ID(); ?> -->

	<?php else: ?>

	<div class="row">
	    <div class="large-9 large-centered columns">
	    <br/><br/><br/><br/>
			<?php echo get_the_password_form(); ?>
		</div>
	</div>	

	<?php endif; ?>

<?php endwhile; // end of the loop.