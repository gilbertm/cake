<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">

	<?php if ( ! WC()->cart->is_empty() ) : ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<?php
					echo apply_filters(
						'woocommerce_cart_item_remove_link', sprintf(
						'<a href="%s" class="remove" title="%s" data-item_key="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times" aria-hidden="true"></i></a>',
						esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
						esc_attr__( 'Remove this item', 'woocommerce' ),
						esc_attr( $cart_item_key ),
						esc_attr( $product_id ),
						esc_attr( $_product->get_sku() )
					), $cart_item_key
					);
					?>
						<?php if ( empty( $product_permalink ) ) : ?>
							<?php echo wp_kses( $thumbnail, array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) ); echo wp_kses_post( $product_name ) ?>
						<?php else : ?>
							<a href="<?php echo esc_url( $product_permalink ); ?>">
							<?php echo wp_kses( $thumbnail, array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) ); echo wp_kses_post( $product_name ) ?>
							</a>
						<?php endif; ?>
						<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>

						<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>

				</li>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
		</ul><!-- end product list -->
		
	<?php else : ?>

	<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<li class="empty">

			<div class="empty-cart-offcanvas-box"><span></span></div>
			<h3><?php _e( 'No products in the cart.', 'woocommerce' ); ?></h3>

			<?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
				<p class="return-to-shop">
					<a class="button btn1 bshadow wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
						<span><i class="fa fa-reply" aria-hidden="true"></i><?php _e( 'Return to shop', 'woocommerce' ) ?></span>
					</a>
				</p>
			<?php endif; ?>

		</li>		
	</ul>

	<?php endif; ?>



<?php if ( ! WC()->cart->is_empty() ) : ?>
	<p class="woocommerce-mini-cart__total total">
		<?php
		/**
		 * Woocommerce_widget_shopping_cart_total hook.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action( 'woocommerce_widget_shopping_cart_total' );
		?>
	</p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="buttons">
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="button btn1 wc-forward cart-but"><span><?php _e( 'View cart', 'woocommerce' ); ?></span></a>
		<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button btn1 checkout wc-forward bshadow"><span><?php _e( 'Checkout', 'woocommerce' ); ?></span></a>
	</p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
