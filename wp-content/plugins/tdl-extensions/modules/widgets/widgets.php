<?php


/**
 * Register widgets
 *
 * @since  1.0
 *
 * @return void
 */


function eva_addons_register_widgets() {

	if ( class_exists( 'WC_Widget' ) ) {
    require_once EVA_ADDONS_DIR . '/modules/widgets/woo-attributes-filter.php';

		register_widget( 'Eva_Widget_Attributes_Filter' );
	}
}

add_action( 'widgets_init', 'eva_addons_register_widgets' );