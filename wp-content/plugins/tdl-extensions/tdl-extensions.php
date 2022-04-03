<?php
/*
Plugin Name: Eva Theme Extensions
Plugin URI: http://eva.temashdesign.com
Description: Extensions for Eva Wordpress Theme. Supplied as a separate plugin so that the customer does not find empty shortcodes on changing the theme.
Version: 2.1
Author: Temash Design
Author URI: http://temashdesign.com/
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'EVA_ADDONS_DIR' ) ) {
	define( 'EVA_ADDONS_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'EVA_ADDONS_URL' ) ) {
	define( 'EVA_ADDONS_URL', plugin_dir_url( __FILE__ ) );
}

$theme = wp_get_theme();
if ( $theme->template != 'eva') {
	return;
}

global $tdl_plugin_dir;

$tdl_plugin_dir = plugin_dir_path( __FILE__ );

//Load Modules

#-----------------------------------------------------------------
# Theme Shortcodes
#-----------------------------------------------------------------

require_once EVA_ADDONS_DIR . '/modules/theme-shortcodes.php';

require_once EVA_ADDONS_DIR . '/modules/widgets/widgets.php';

require_once EVA_ADDONS_DIR . '/post-types.php';


/**
 * Load plugin textdomain.
 *
 * @since 1.0
 */
function eva_extensions_load_textdomain() {
	load_plugin_textdomain( 'eva', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

add_action( 'plugins_loaded', 'eva_extensions_load_textdomain' );




if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/framework/loader.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/loader.php' );
}