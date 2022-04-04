<?php 


/**
 * Class for all WooCommerce template modification
 *
 * @version 1.0
 */
class Eva_WooCommerce {

	/**
	 * Construction function
	 *
	 * @since  1.0
	 * @return Eva_WooCommerce
	 */
	function __construct() {
		// Check if Woocomerce plugin is actived
		if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			return;
		}

		// Define all hook
		add_action( 'template_redirect', array( $this, 'hooks' ) );

		// Need an early hook to ajaxify update mini shop cart
		add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'add_to_cart_fragments' ) );

		add_action( 'wp_ajax_eva_remove_mini_cart_item', array( $this, 'remove_mini_cart_item' ) );
		add_action( 'wp_ajax_nopriv_eva_remove_mini_cart_item', array( $this, 'remove_mini_cart_item' ) );	

		add_action( 'wp_ajax_eva_update_wishlist_count', array( $this, 'update_wishlist_count' ) );
		add_action( 'wp_ajax_nopriv_eva_update_wishlist_count', array( $this, 'update_wishlist_count' ) );	
		
		// remove_filter( 'woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories' );

	}

	/**
	 * Hooks to WooCommerce actions, filters
	 *
	 * @since  1.0
	 * @return void
	 */
	function hooks() {

		add_action( 'woocommerce_after_shop_loop_item_title', array( $this, 'product_attribute' ), 4 );

		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals' );

		add_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals' );
		add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 20 );

		add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	}


	//==============================================================================
	// Ajaxify update cart viewer
	//==============================================================================


	function add_to_cart_fragments( $fragments ) {
		global $woocommerce;

		if ( empty( $woocommerce ) ) {
			return $fragments;
		}

		ob_start();
		?>

				<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-contents">
						<div class="row text-center px-0">
							<div class="col col-12 px-2">
								<i class="cart-button-icon"></i> 
								<?php /* <?php esc_html_e( 'Cart', 'woocommerce' ); */ ?>
							</div>
							<div class="col col-12 p-0">
								<span class="cart_items_number counter_number animated rubberBand" style="position: relative;
								display: inline-block;
								left: 0;"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span> 
							</div>
							<div class="col col-12 p-0">
								<span class="cart_total" style="font-size:9px;font-family:'Six Caps','PT Sans Narrow',Arial"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
							</div>
						</div>
					</a>

		<?php
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}


	//==============================================================================
	// Remove mini cart item
	//==============================================================================

	function remove_mini_cart_item() {
		global $woocommerce;
		$nonce       = isset( $_POST['nonce'] ) ? $_POST['nonce'] : '';
		$remove_item = isset( $_POST['item'] ) ? $_POST['item'] : '';
		$response    = 0;
		if ( wp_verify_nonce( $nonce, '_eva_nonce' ) && ! empty( $remove_item ) ) {
			$woocommerce->cart->remove_cart_item( $remove_item );
			$response = 1;
		}
		// Send the comment data back to Javascript.
		wp_send_json_success( $response );
		die();
	}


	//==============================================================================
	// Display product attribute
	//==============================================================================

	function product_attribute() {

		global $tdl_options;

		$product_attribute  = (!empty($tdl_options['tdl_product_attribute'])) ? $tdl_options['tdl_product_attribute'] : 'none';

		$default_attribute = sanitize_title( $product_attribute );

		if ( $default_attribute == '' || $default_attribute == 'none' ) {
			return;
		}

		$default_attribute = 'pa_' . $default_attribute;

		global $product;
		$attributes         = maybe_unserialize( get_post_meta( $product->get_id(), '_product_attributes', true ) );
		$product_attributes = maybe_unserialize( get_post_meta( $product->get_id(), 'attributes_extra', true ) );

		if ( $product_attributes == 'none' ) {
			return;
		}

		if ( $product_attributes == '' ) {
			$product_attributes = $default_attribute;
		}

		$variations = $this->get_variations( $product_attributes );

		if ( ! $attributes ) {
			return;
		}

		foreach ( $attributes as $attribute ) {


			if ( $product->get_type() == 'variable' ) {
				if ( ! $attribute['is_variation'] ) {
					continue;
				}
			}

			if ( sanitize_title( $attribute['name'] ) == $product_attributes ) {

				echo '<div class="ev-attr-swatches">';
				if ( $attribute['is_taxonomy'] ) {
					$post_terms = wp_get_post_terms( $product->get_id(), $attribute['name'] );

					$attr_type = '';

					if ( function_exists( 'TA_WCVS' ) ) {
						$attr = TA_WCVS()->get_tax_attribute( $attribute['name'] );
						if ( $attr ) {
							$attr_type = $attr->attribute_type;
						}
					}
					$found = false;
					foreach ( $post_terms as $term ) {
						$css_class = '';
						if ( is_wp_error( $term ) ) {
							continue;
						}
						if ( $variations && isset( $variations[$term->slug] ) ) {
							$attachment_id = $variations[$term->slug];
							$attachment    = wp_get_attachment_image_src( $attachment_id, 'shop_catalog' );
							$image_srcset  = '';

								$image_srcset = wp_get_attachment_image_srcset( $attachment_id, 'shop_catalog' );


							if ( $attachment_id == get_post_thumbnail_id() && ! $found ) {
								$css_class .= ' selected';
								$found = true;
							}

							if ( $attachment ) {
								$css_class .= ' ev-swatch-variation-image';
								$img_src = $attachment[0];
								echo wp_kses_post($this->swatch_html( $term, $attr_type, $img_src, $css_class, $image_srcset ));
							}

						}
					}
				}
				echo '</div>';
				break;
			}
		}

	}

	//==============================================================================
	// Print HTML of a single swatch
	//==============================================================================

	public function swatch_html( $term, $attr_type, $img_src, $css_class, $image_srcset ) {

		$html = '';
		$name = $term->name;

		switch ( $attr_type ) {
			case 'color':
				$color = get_term_meta( $term->term_id, 'color', true );
				list( $r, $g, $b ) = sscanf( $color, "#%02x%02x%02x" );
				$html = sprintf(
					'<span class="swatch swatch-color %s" data-src="%s" data-src-set="%s" title="%s"><span class="sub-swatch" style="background-color:%s;color:%s;"></span> </span>',
					esc_attr( $css_class ),
					esc_url( $img_src ),
					esc_attr( $image_srcset ),
					esc_attr( $name ),
					esc_attr( $color ),
					"rgba($r,$g,$b,0.5)"
				);
				break;

			case 'image':
				$image = get_term_meta( $term->term_id, 'image', true );
				if ( $image ) {
					$image = wp_get_attachment_image_src( $image );
					$image = $image ? $image[0] : WC()->plugin_url() . '/assets/images/placeholder.png';
					$html  = sprintf(
						'<span class="swatch swatch-image %s" data-src="%s" data-src-set="%s" title="%s"><img src="%s" alt="%s"></span>',
						esc_attr( $css_class ),
						esc_url( $img_src ),
						esc_attr( $image_srcset ),
						esc_attr( $name ),
						esc_url( $image ),
						esc_attr( $name )
					);
				}

				break;

			default:
				$label = get_term_meta( $term->term_id, 'label', true );
				$label = $label ? $label : $name;
				$html  = sprintf(
					'<span class="swatch swatch-label %s" data-src="%s" data-src-set="%s" title="%s">%s</span>',
					esc_attr( $css_class ),
					esc_url( $img_src ),
					esc_attr( $image_srcset ),
					esc_attr( $name ),
					esc_html( $label )
				);
				break;


		}

		return $html;
	}


	//==============================================================================
	// Get variations
	//==============================================================================

	function get_variations( $default_attribute ) {
		global $product;

		$variations = array();
		if ( $product->get_type() == 'variable' ) {
			$args = array(
				'post_parent' => $product->get_id(),
				'post_type'   => 'product_variation',
				'orderby'     => 'menu_order',
				'order'       => 'ASC',
				'fields'      => 'ids',
				'post_status' => 'publish',
				'numberposts' => - 1
			);

			if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
				$args['meta_query'][] = array(
					'key'     => '_stock_status',
					'value'   => 'instock',
					'compare' => '=',
				);
			}

			$thumbnail_id = get_post_thumbnail_id();

			$posts = get_posts( $args );

			foreach ( $posts as $post_id ) {
				$attachment_id = get_post_thumbnail_id( $post_id );
				$attribute     = $this->get_variation_attributes( $post_id, 'attribute_' . $default_attribute );

				if ( ! $attachment_id ) {
					$attachment_id = $thumbnail_id;
				}

				if ( $attribute ) {
					$variations[$attribute[0]] = $attachment_id;
				}

			}

		}

		return $variations;
	}


	//==============================================================================
	// Ajaxify update count wishlist
	//==============================================================================

	function update_wishlist_count() {
		if ( ! function_exists( 'YITH_WCWL' ) ) {
			return;
		}

		wp_send_json( YITH_WCWL()->count_products() );

	}


	//==============================================================================
	// Get variation attribute
	//==============================================================================

	public function get_variation_attributes( $child_id, $attribute ) {
		global $wpdb;

		$values = array_unique(
			$wpdb->get_col(
				$wpdb->prepare(
					"SELECT meta_value FROM {$wpdb->postmeta} WHERE meta_key = %s AND post_id IN (" . $child_id . ")",
					$attribute
				)
			)
		);

		return $values;
	}
}


	//==============================================================================
	// Add photoswipe template to body
	//==============================================================================

	add_action( 'eva_after_footer', 'eva_photoswipe_template', 1000 );
	if( ! function_exists( 'eva_photoswipe_template' ) ) {
		function eva_photoswipe_template() {
			if( is_singular( 'product' ) )
				get_template_part('woocommerce/single-product/photoswipe');
		}
	}

	//==============================================================================
	// WooCommerce Post Count Filter
	//==============================================================================

	if ( ! function_exists('eva_categories_postcount_filter') ) :
	function eva_categories_postcount_filter($variable) {
		$variable = str_replace('(', '', $variable);
		$variable = str_replace(')', '', $variable);
		return $variable;
	}
	add_filter('wp_list_categories','eva_categories_postcount_filter');
	endif;


	//==============================================================================
	// WooCommerce Layered Nav Filter
	//==============================================================================

	if ( ! function_exists('eva_layered_nav_postcount_filter') ) :
	function eva_layered_nav_postcount_filter($variable) {
		$variable = str_replace('(', '', $variable);
		$variable = str_replace(')', '', $variable);
		return $variable;
	}
	add_filter('woocommerce_layered_nav_count','eva_layered_nav_postcount_filter');
	endif;

/******************************************************************************/
/* WooCommerce Wrap Oembed Stuff **********************************************/
/******************************************************************************/
add_filter('embed_oembed_html', 'eva_embed_oembed_html', 99, 4);
function eva_embed_oembed_html($html, $url, $attr, $post_id) {
	return '<div class="video-container">' . $html . '</div>';
}


/**
 * ------------------------------------------------------------------------------------------------
 * WooCommerce Number of Related Products
 * ------------------------------------------------------------------------------------------------
 */
if( ! function_exists( 'woocommerce_output_related_products' ) ) {
	function woocommerce_output_related_products() {
		global $product, $woocommerce; 
		$atts = array(
			'posts_per_page' => '12',
			'orderby'        => 'rand'
		);
		woocommerce_related_products($atts);
	}
}

/**
 * ------------------------------------------------------------------------------------------------
 * Remove WooCommerce styles and scripts
 * ------------------------------------------------------------------------------------------------
 */

function eva_woo_remove_lightboxes() {
         
        // Styles
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
         
        // Scripts
        wp_dequeue_script( 'prettyPhoto' );
        wp_dequeue_script( 'prettyPhoto-init' );
        wp_dequeue_script( 'fancybox' );
        wp_dequeue_script( 'enable-lightbox' );
      
}
  
add_action( 'wp_enqueue_scripts', 'eva_woo_remove_lightboxes', 99 );

//==============================================================================
// Woocommerce Product Page Get Caption Text
//==============================================================================
function wp_get_attachment( $attachment_id ) {
    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}

/******************************************************************************/
/* WooCommerce Add data-src & lazyOwl to Thumbnails ***************************/
/******************************************************************************/
function woocommerce_get_product_thumbnail( $size = 'product_small_thumbnail', $placeholder_width = 0, $placeholder_height = 0  ) {
	global $post;

	if ( has_post_thumbnail() ) {
		$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'shop_catalog' );
		return get_the_post_thumbnail( $post->ID, $size, array('data-src' => $image_src[0], 'class' => 'lazyOwl') );
		//return '<div><img data-src="' . $image_src[0] . '" class="lazyOwl"></div>';
	} elseif ( wc_placeholder_img_src() ) {
		return wc_placeholder_img( $size );
	}
}

/**
 * ------------------------------------------------------------------------------------------------
 * Function returns numbers of items in the cart. Filter woocommerce fragments
 * ------------------------------------------------------------------------------------------------
 */

if ( EVA_WOOCOMMERCE_IS_ACTIVE ) {

/******************************************************************************/
/*******Show Woocommerce Cart Widget Everywhere *******************************/
/******************************************************************************/

	if ( ! function_exists('eva_woocommerce_widget_cart_everywhere') ) :
	function eva_woocommerce_widget_cart_everywhere() { 
	    return false; 
	};
	add_filter( 'woocommerce_widget_cart_is_hidden', 'eva_woocommerce_widget_cart_everywhere', 10, 1 );
	endif;
	
}



/******************************************************************************/
/******* WooCommerce Reviews Tab **********************************************/
/******************************************************************************/

if ( ! function_exists('eva_rename_reviews_tab') ) :
	function eva_rename_reviews_tab($tabs) {
		global $product, $post;
		$reviews_tab_title = esc_html__( 'Reviews', 'woocommerce' ) . '<sup>' . $product->get_review_count() . '</sup>';
		return $reviews_tab_title;
	}
	add_filter( 'woocommerce_product_reviews_tab_title', 'eva_rename_reviews_tab', 98);
endif;

/******************************************************************************/
/* WooCommerce Product Layout *************************************************/
/******************************************************************************/	

function eva_product_layout($page_id) {

	$tdl_options = eva_global_var();

	$custom_product_layout = isset($tdl_options['tdl_product_design']) ? $tdl_options['tdl_product_design'] : "default";
	$page_product_layout = get_field('tdl_prod_layout' , $page_id);

	$product_layout = "default";


	// Product Layout from Customiser

	switch ($custom_product_layout)
	{        
	    case "default":
	        $product_layout = "default";
	        break;
	    case "images_scroll":
	        $product_layout = "images_scroll";
	        break;
	    default:
	        $product_layout = "default";
	        break;
	}


	// Overwrite Global Product Layout from Product Page Options

	switch ( $page_product_layout ) {        
	    case "inherit":
	        // do nothing
	        break;
	    case "default":
	        $product_layout = "default";
	        break;
	    case "images_scroll":
	        $product_layout = "images_scroll";
	        break;
	    default:
	        // do nothing
	        break;
	}

	return $product_layout;

}


/******************************************************************************/
/* WooCommerce Remove Tabs Titles *********************************************/
/******************************************************************************/

if ( EVA_WOOCOMMERCE_IS_ACTIVE ) {	

	function eva_product_description_heading() {
	    echo "";
	}
	add_filter( 'woocommerce_product_description_heading', 'eva_product_description_heading' );

	
	function eva_product_additional_information_heading() {
	    echo "";
	}
	add_filter( 'woocommerce_product_additional_information_heading', 'eva_product_additional_information_heading' );
	
}


/******************************************************************************/
/****** WOO GET PRODUCT PER PAGE **********************************************/
/******************************************************************************/

if( ! function_exists( 'eva_products_per_page_select' ) ) {
	add_action( 'eva_per_page_loop', 'eva_products_per_page_select', 25 );

	function eva_products_per_page_select() {
		global $tdl_options;

		if ( !$tdl_options['tdl_product_count'] || ( wc_get_loop_prop( 'is_shortcode' ) || ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) ) return;

		global $wp_query;

			$per_page_options = $tdl_options['tdl_product_count'];

			$products_per_page_options = (!empty($per_page_options)) ? explode(',', $per_page_options) : array(12,24,36,-1);

			?>

			<li>
				<form class="woocommerce-viewing" method="get">
					<select name="per_page" class="count">
							<?php foreach( $products_per_page_options as $key => $value ) : ?>
									<option value="<?php echo esc_attr( $value ); ?>" <?php selected( eva_get_products_per_page(), $value ); ?>><?php
										$text = '%s';
										esc_html( printf( $text, $value == -1 ? esc_html__( 'All', 'eva' ) : $value ) );
									?></option>
							<?php endforeach; ?>
					</select>
					<input type="hidden" name="paged" value=""/>
						<?php
						// Keep query string vars intact
						foreach ( $_GET as $key => $val ) {
								if ( 'per_page' === $key || 'submit' === $key || 'paged' === $key ) {
										continue;
								}
								if ( is_array( $val ) ) {
										foreach( $val as $innerVal ) {
												echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
										}
								} else {
										echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
								}
						}
						?>
				</form>
			</li>			


			<?php
		}
	}

/**
 * ------------------------------------------------------------------------------------------------
 * Change number of products displayed per page
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'eva_shop_products_per_page' ) ) {
	function eva_shop_products_per_page() {
		$per_page = 12;
		$number = apply_filters('eva_shop_per_page', eva_get_products_per_page() );
		if( is_numeric( $number ) ) {
			$per_page = $number;
		}
		return $per_page;
	}

	add_filter( 'loop_shop_per_page', 'eva_shop_products_per_page', 20 );
}

// **********************************************************************//
// ! Get Items per page number on the shop page
// **********************************************************************//

if( ! function_exists( 'eva_get_products_per_page' ) ) {
	function eva_get_products_per_page() {
		if ( apply_filters( 'eva_woo_session', false ) ) {
			return eva_woo_get_products_per_page();
		} else {
			return eva_new_get_products_per_page();
		}
	}
}

if( ! function_exists( 'eva_new_get_products_per_page' ) ) {
	function eva_new_get_products_per_page() {
		global $tdl_options;
		$shop_per_page = (!empty($tdl_options['tdl_shop_per_page'])) ? $tdl_options['tdl_shop_per_page'] : 12;
		if ( isset( $_REQUEST['per_page'] ) && ! empty( $_REQUEST['per_page'] ) ) {
			return intval( $_REQUEST['per_page'] );
		} elseif ( isset( $_COOKIE['shop_per_page'] ) ) {
			$val = $_COOKIE['shop_per_page'];
			
			if ( ! empty( $val ) ) {
				return intval( $val );
			}
		}
		
		return intval( $shop_per_page );
	}
}

if( ! function_exists( 'eva_woo_get_products_per_page' ) ) {
	function eva_woo_get_products_per_page() {
		global $tdl_options;
		if( ! class_exists('WC_Session_Handler') ) return;
		$s = WC()->session; // WC()->session
		if ( is_null( $s ) ) return intval( $tdl_options['tdl_shop_per_page'] );
		
		if ( isset( $_REQUEST['per_page'] ) && ! empty( $_REQUEST['per_page'] ) ) :
			return intval( $_REQUEST['per_page'] );
		elseif ( $s->__isset( 'shop_per_page' ) ) :
			$val = $s->__get( 'shop_per_page' );
			if( ! empty( $val ) )
				return intval( $s->__get( 'shop_per_page' ) );
		endif;
		return intval( $tdl_options['tdl_shop_per_page'] );
	}
}

if( ! function_exists( 'eva_set_customer_session' ) ) {
	function eva_set_customer_session() {
		if ( ! function_exists( 'WC' ) || ! apply_filters( 'eva_woo_session', false ) ) {
			return;
		}

		if ( WC()->version > '2.1' && ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' ) ) :
			WC()->session->set_customer_session_cookie( true );
		endif;
	}
	add_action( 'eva_before_shop_page', 'eva_set_customer_session', 10 );
}


/******************************************************************************/
/****** PRODUCT NAVIGATION ****************************************************/
/******************************************************************************/


if( ! function_exists( 'eva_products_nav' ) ) {
	function eva_products_nav() {
		global $post;
	    $next = get_next_post(true,'','product_cat');
	    $prev = get_previous_post(true,'','product_cat');

	    $next = ( ! empty( $next ) ) ? wc_get_product( $next->ID ) : false;
	    $prev = ( ! empty( $prev ) ) ? wc_get_product( $prev->ID ) : false;
		?>
			<div class="products-nav">
				<?php if ( ! empty( $prev ) ): ?>
				<div class="product-btn product-prev">
					<a href="<?php echo esc_url( $prev->get_permalink() ); ?>"><?php _e('Previous product', 'eva'); ?><i class="icon-px-solid-prev"></i></a>
					<div class="thb-wrapper">
						<div class="product-short">
							<a href="<?php echo esc_url( $prev->get_permalink() ); ?>" class="product-thumb">
								<?php echo wp_kses( $prev->get_image(), array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) );?>
							</a>
							<h3><a href="<?php echo esc_url( $prev->get_permalink() ); ?>" class="product-title">
								<?php echo esc_attr($prev->get_title()); ?>
							</a></h3>
							<span class="price">
								<?php echo wp_kses_post($prev->get_price_html()); ?>
							</span>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php if ( ! empty( $next ) ): ?>
				<div class="product-btn product-next">
					<a href="<?php echo esc_url( $next->get_permalink() ); ?>"><?php _e('Next product', 'eva'); ?><i class="icon-px-solid-next"></i></a>
					<div class="thb-wrapper">
						<div class="product-short">
							<a href="<?php echo esc_url( $next->get_permalink() ); ?>" class="product-thumb">
								<?php echo wp_kses( $next->get_image(), array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) );?>
							</a>
							<h3><a href="<?php echo esc_url( $next->get_permalink() ); ?>" class="product-title">
								<?php echo esc_attr($next->get_title()); ?>
							</a></h3>
							<span class="price">
								<?php echo wp_kses_post($next->get_price_html()); ?>
							</span>
						</div>
					</div>
				</div>
				<?php endif ?>
			</div>
		<?php
	}
}

/******************************************************************************/
/****** Back Button ***********************************************************/
/******************************************************************************/

if( ! function_exists( 'eva_back_button' ) ) {
	function eva_back_button() {
		?>
			<a href="#" class="back-btn"><span><?php esc_html_e('Back', 'eva') ?></span></a>
		<?php
	}
}



 ?>