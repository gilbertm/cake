<?php 
  $tdl_options = eva_global_var();
  global $yith_wcwl;
?>

<?php if ( EVA_WOOCOMMERCE_IS_ACTIVE ) : ?>   
		<div class="loading-overlay"><i class="button-loader"></i></div>
		<div class="offcanvas_minicart woocommerce" data-empty-bag-txt="<?php esc_html_e( 'No products in the cart.', 'eva' ); ?>">
			<div class="offcanvas_close"></div>
			<h2 class="cart-title"><?php esc_html_e( 'Cart', 'woocommerce' ); ?></h2>
			
			<?php if ( class_exists( 'WC_Widget_Cart' ) ) { the_widget( 'WC_Widget_Cart' ); } ?>
		</div>
<?php endif; ?> 

	<div class="offcanvas_search">
		<div class="offcanvas_close"></div>
		<h2 class="search-title"><?php esc_html_e( 'Search', 'eva' ); ?></h2>
		<?php EVA_WOOCOMMERCE_IS_ACTIVE ? get_product_search_form() : get_search_form(true); ?>
		
		<?php if ( plugins_is_active( 'woo-search-box/woo-search-box.php' ) ) {?>
			<div class="suggestion_results">
				<div class="guaven_woos_suggestion"></div> 
			</div>
		 <?php } ?>	
	</div>

<?php 
 if ( EVA_WOOCOMMERCE_IS_ACTIVE ) {
  if ( is_product() ) {
 ?>
	<?php if ( (isset($tdl_options['tdl_size_chart'])) && ($tdl_options['tdl_size_chart'] == "1" ) ): ?>
		<div class="offcanvas_sizechart">
			<div class="offcanvas_close"></div>
			<?php do_action( 'woocommerce_before_size_guide' ); ?>
		</div>

	<?php endif; ?>
<?php } ?>
<?php } ?>
