<?php

/**
 *
 * The framework's functions and definitions
 *
 */

#-----------------------------------------------------------------#
# Define constants
#-----------------------------------------------------------------#

define('EVA_OPTIONS_NAME', 'eva_options_theme_customizer');
define('EVA_THEME_DIR', get_template_directory_uri());
define('EVA_THEME_PATH', get_template_directory());
define('EVA_CSS', get_template_directory() . '/css');
define('EVA_INCLUDES', get_template_directory() . '/includes');
define('EVA_FUNCTIONS', get_template_directory() . '/functions');
define('EVA_THEME_URI', get_template_directory_uri());
define('EVA_THEME_ENABLED', true);

include_once( EVA_FUNCTIONS . '/body-classes.php' ); // Theme Options
include_once( EVA_FUNCTIONS . '/theme-options.php' ); // Theme Options
include_once( EVA_FUNCTIONS . '/woo-options.php' ); // WooCommerce Options
include_once( EVA_FUNCTIONS . '/product-meta-box-data.php' ); // Product Meta Box
include_once( EVA_INCLUDES . '/quick_view.php'); //Quick View


#-----------------------------------------------------------------#
# Plugin recommendations
#-----------------------------------------------------------------#

require_once( EVA_FUNCTIONS . '/tgm/class-tgm-plugin-activation.php' );
require_once( EVA_FUNCTIONS . '/tgm/plugins.php' );

require get_parent_theme_file_path( '/includes/merlin/vendor/autoload.php' );
if ( is_admin() ) {
	require get_parent_theme_file_path( '/includes/merlin/class-merlin.php' );
	require get_parent_theme_file_path( '/includes/merlin/includes/wizard-config.php' );
}

#-----------------------------------------------------------------#
# Custom Menu
#-----------------------------------------------------------------#
include_once( EVA_INCLUDES . '/menu/custom-menu.php'); 



#-----------------------------------------------------------------#
# Redux Framework
#-----------------------------------------------------------------#

if ( !isset( $redux_demo ) && file_exists( EVA_FUNCTIONS . '/framework/settings.php' ) ) {
    require_once( EVA_FUNCTIONS . '/framework/settings.php' );
}

#-----------------------------------------------------------------#
# Size Guides
#-----------------------------------------------------------------# 

require_once get_template_directory() . '/includes/size-guide/size-guide.php';

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/*-----------------------------------------------------------------------------------*/
/*	Add Font Awesome to Redux
/*-----------------------------------------------------------------------------------*/

function eva_reduxAwesome() {

    wp_register_style(
        'redux-font-awesome',
        get_template_directory_uri() . '/fonts/fontawesome/font-awesome.min.css',
        array(),
        time(),
        'all'
    );  
    wp_enqueue_style( 'redux-font-awesome' );
}
add_action( 'redux/page/tdl_options/enqueue', 'eva_reduxAwesome' );


/*-----------------------------------------------------------------------------------*/
/*	Register Global Var
/*-----------------------------------------------------------------------------------*/

function eva_global_var(){
   global $tdl_options;
   return $tdl_options;
}


/* ---------------------------------------------------------------- */
/* ACF theme fields
/* ---------------------------------------------------------------- */
require_once EVA_THEME_PATH . '/autoimport/custom_metaboxes.php';


/* ---------------------------------------------------------------- */
/* Add ACF fallback
/* ---------------------------------------------------------------- */
if (! is_admin() && ! function_exists('get_field')) {
	function get_field($name) {
		return false;
	}
}


/* ---------------------------------------------------------------- */
/* 	Register Navigation
/* ---------------------------------------------------------------- */

register_nav_menus( array(
	'main_navigation' 		=> esc_html__('Main Navigation', 'eva'),
));

/*-----------------------------------------------------------------------------------*/
/*	Sidebars
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'eva_widgets_init' ) ):
	function eva_widgets_init() {

		register_sidebar(array(
			'name' => esc_html__('Sidebar', 'eva'),
			'id' => 'sidebar',
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		
		register_sidebar(array(
			'name' => esc_html__('Shop Sidebar', 'eva'),
			'id' => 'widgets-product-listing',
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));	
		
		register_sidebar(array(
			'name' => esc_html__('Footer 1', 'eva'),
			'id' => 'footer-sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		
		register_sidebar(array(
			'name' => esc_html__('Footer 2', 'eva'),
			'id' => 'footer-sidebar-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		
		register_sidebar(array(
			'name' => esc_html__('Footer 3', 'eva'),			
			'id' => 'footer-sidebar-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		
		register_sidebar(array(
			'name' => esc_html__('Footer 4', 'eva'),			
			'id' => 'footer-sidebar-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar(array(
			'name' => esc_html__('Footer 5', 'eva'),			
			'id' => 'footer-sidebar-5',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

}
endif;
add_action( 'widgets_init', 'eva_widgets_init' );



/*-----------------------------------------------------------------------------------*/
/*	Theme Support
/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'eva_theme_support' ) ) {
		function eva_theme_support() {
			global $tdl_options;

			// Theme support.
			add_theme_support( 'title-tag' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'customize-selective-refresh-widgets' );
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'woocommerce');
			add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'quote', 'video' ) );

			global $eva_woocommerce;
			$eva_woocommerce = new Eva_WooCommerce;
            	
			if ( is_admin() ) {
				new Eva_Meta_Box_Product_Data;
			}

			// Gutenberg.
			add_theme_support( 'align-wide' );
			add_theme_support( 'editor-styles' );
			add_theme_support( 'wp-block-styles' );
			add_theme_support( 'responsive-embeds' );
	
			add_editor_style( 'css/admin/editor-styles.css' );
	
			add_post_type_support('page', 'excerpt');


			/** Add Image Sizes **/
			add_image_size( 'blog-isotope', 620, 500, true ); 	

            
			// Localisation support
			load_theme_textdomain( 'eva', get_template_directory() . '/languages' );


			/******************************************************************************/
			/* WooCommerce remove review tab **********************************************/
			/******************************************************************************/
			if ( (isset($tdl_options['tdl_review_tab'])) && ($tdl_options['tdl_review_tab'] == "0" ) ) {
			add_filter( 'woocommerce_product_tabs', 'eva_remove_reviews_tab', 98);
				function eva_remove_reviews_tab($tabs) {
					unset($tabs['reviews']);
					return $tabs;
				}
			}

			// **********************************************************************// 
			// ! Get Items per page number on the shop page
			// **********************************************************************// 

			if( ! function_exists( 'eva_get_products_per_page' ) ) {
				function eva_get_products_per_page() {
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


			/*-----------------------------------------------------------------------------------*/
			/*	WooCommerce Number of products displayed per page
			/*-----------------------------------------------------------------------------------*/

			if( ! function_exists( 'eva_shop_products_per_page' ) ) {
				
				function eva_shop_products_per_page() {
					$per_page = 12;
					$number = apply_filters('eva_shop_per_page', eva_get_products_per_page() );
					if( is_numeric( $number ) ) {
						$per_page = $number;
					}
					return $per_page;
				}

				$shop_pagination = (!empty($tdl_options['tdl_shop_pagination'])) ? $tdl_options['tdl_shop_pagination'] : 'classic'; 

				if ( $shop_pagination != 'classic' ) {
					add_filter( 'loop_shop_per_page', 'eva_shop_products_per_page', 20 );
				}
				
			}


		}
	}
	add_action( 'after_setup_theme', 'eva_theme_support' );

	if ( is_admin() ) :
		
		// =============================================================================
		// Enqueue Admin Scripts
		// =============================================================================

		function eva_admin_scripts() {
		    
		    global $pagenow, $post_type, $tdl_options;

	    	wp_enqueue_script( 'eva-admin-scripts', get_template_directory_uri() . '/js/admin/admin.js', array(), eva_theme_version(), true );				

			if ( !empty($tdl_options['tdl_size_chart']) ) {
				wp_enqueue_script( 'eva-edittable-scripts', get_template_directory_uri() . '/js/admin/jquery.edittable.min.js', array(), eva_theme_version(), true );
			}		
		    
		}
		
		add_action( 'admin_init', 'eva_admin_scripts' );		

	endif;	


/******************************************************************************/
/****** Set woocommerce images sizes ******************************************/
/******************************************************************************/

/**
 * Hook in on activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'eva_woocommerce_image_dimensions', 1 );

/**
 * Define image sizes
 */

if ( ! function_exists('eva_woocommerce_image_dimensions') ) :
	function eva_woocommerce_image_dimensions() {
		global $pagenow;
	 
		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}

	  	$catalog = array(
			'width' 	=> '300',	// px
			'height'	=> '372',	// px
			'crop'		=> 1 		// true
		);

		$single = array(
			'width' 	=> '564',	// px
			'height'	=> '720',	// px
			'crop'		=> 1 		// true
		);

		$thumbnail = array(
			'width' 	=> '150',	// px
			'height'	=> '200',	// px
			'crop'		=> 0 		// false
		);

		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
	}
	add_action( 'after_switch_theme', 'eva_woocommerce_image_dimensions', 1 );
endif;

	
// Maximum width for media
if ( ! isset( $content_width ) ) {
	$content_width = 1200; // Pixels
}


/*-----------------------------------------------------------------------------------*/
/*	Registers and loads styles
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists('eva_theme_styles') ) :

	function eva_theme_styles () {

			global $tdl_options, $wp_styles;

			$theme_info = wp_get_theme();

			// Edit CSS within their files
			wp_register_style( 'stylesheet', get_stylesheet_uri(), array(), '1.0', 'all' );
			wp_register_style( 'eva-app', get_template_directory_uri() .  "/css/app.css", array(), '1.3', null);
			wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), '3.5.1', 'all' );
			wp_enqueue_style('fresco', get_template_directory_uri() . '/css/fresco/fresco.css', NULL, '1.3.0', 'all' );


			wp_enqueue_style('eva-font-linea-arrows', get_template_directory_uri() . '/fonts/linea-fonts/arrows/styles.css', NULL, eva_theme_version(), 'all' );
			wp_enqueue_style('eva-font-linea-basic', get_template_directory_uri() . '/fonts/linea-fonts/basic/styles.css', NULL, eva_theme_version(), 'all' );
			wp_enqueue_style('eva-font-linea-basic_elaboration', get_template_directory_uri() . '/fonts/linea-fonts/basic_elaboration/styles.css', NULL, eva_theme_version(), 'all' );
			wp_enqueue_style('eva-font-linea-ecommerce', get_template_directory_uri() . '/fonts/linea-fonts/ecommerce/styles.css', NULL, eva_theme_version(), 'all' );
			wp_enqueue_style('eva-font-linea-music', get_template_directory_uri() . '/fonts/linea-fonts/music/styles.css', NULL, eva_theme_version(), 'all' );
			wp_enqueue_style('eva-font-linea-software', get_template_directory_uri() . '/fonts/linea-fonts/software/styles.css', NULL, eva_theme_version(), 'all' );
			wp_enqueue_style('eva-font-linea-weather', get_template_directory_uri() . '/fonts/linea-fonts/weather/styles.css', NULL, eva_theme_version(), 'all' );


			wp_enqueue_style('eva-app');
			wp_enqueue_style('stylesheet' );

			ob_start(); 
			include( EVA_CSS . '/custom.php' ); 
			$style_custom = ob_get_clean();
			$style_custom = str_replace(array("\r\n", "\r"), "\n", $style_custom);
			$lines = explode("\n", $style_custom);
			$new_lines = array();
			foreach ($lines as $i => $line) { if(!empty($line)) $new_lines[] = trim($line); }

			wp_add_inline_style( 'eva-app', implode($new_lines) );

			if ( (isset($tdl_options['tdl_custom_css'])) && (trim($tdl_options['tdl_custom_css']) != "" ) ) {
				wp_add_inline_style( 'eva-app', html_entity_decode( $tdl_options['tdl_custom_css'] ) );
			}						
	}
	add_action('wp_enqueue_scripts', 'eva_theme_styles' );

endif;

/*-----------------------------------------------------------------------------------*/
/*	Registers and loads front-end javascript
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists('eva_register_js') ) :

	function eva_register_js() {

	// Get theme version info

	global $tdl_options;

	if ( EVA_VISUAL_COMPOSER_IS_ACTIVE) // If VC exists/active load scripts after VC
	{
		$dependencies = array('jquery', 'wpb_composer_front_js');
	}
	else // Do not depend on VC
	{
		$dependencies = array('jquery');
	}

	if ( (isset($tdl_options['tdl_sticky_menu'])) && (trim($tdl_options['tdl_sticky_menu']) == "1" ) ) {	
		wp_enqueue_script('eva-sticky-header', get_template_directory_uri() . '/js/components/sticky-header.js', array('jquery'), '1.0', TRUE);
	}
	wp_enqueue_script('eva-scripts', get_template_directory_uri() . '/js/min/eva-plugins.js', $dependencies, eva_theme_version(), TRUE);		
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '2.8.3', TRUE);
	wp_enqueue_script('eva-custom-scripts', get_template_directory_uri() . '/js/min/app.js', array('jquery'), '1.3', TRUE);	


	

	// Send variables to js
	$eva_scripts_vars_array = array(
		'eva_ajax_url'				=> admin_url( 'admin-ajax.php' ),
		'nonce'						=> wp_create_nonce( '_eva_nonce' ),
		'add_to_cart_nonce'	 => wp_create_nonce( 'eva-add-to-cart' ),
		
		'ajax_load_more_locale' 	=> esc_html__( 'Load More Items', 'eva' ),
		'ajax_loading_locale' 		=> esc_html__( 'Loading Items', 'eva' ),
		'ajax_no_more_items_locale' => esc_html__( 'No more items available.', 'eva' ),
		'share_fb' => esc_html__( 'Share on Facebook', 'eva' ),
		'pin_it' => esc_html__( 'Pin it', 'eva' ),
		'tweet' => esc_html__( 'Tweet', 'eva' ),
		'download_image' => esc_html__( 'Download image', 'eva' ),		

		// 'catalog_ajax_filter'         => (isset($tdl_options['tdl_ajax_filter']) && $tdl_options['tdl_ajax_filter'] == 1) ? '1' : '0',
		'product_add_to_cart_ajax'  => (isset($tdl_options['tdl_product_addtocart_ajax']) && $tdl_options['tdl_product_addtocart_ajax'] == 1) ? '1' : '0',

		'shop_pagination_type' 		=> (!empty($tdl_options['tdl_shop_pagination'])) ? $tdl_options['tdl_shop_pagination'] : 'classic',
		'product_lightbox'			=> (isset($tdl_options['tdl_product_gallery_lightbox']) && $tdl_options['tdl_product_gallery_lightbox'] == 1) ? '1' : '0',
		'product_lightbox_dominant'			=> (isset($tdl_options['tdl_product_gallery_dominant']) && $tdl_options['tdl_product_gallery_dominant'] == 1) ? '1' : '0',
		'rtl'                       => is_rtl() ? 'true' : 'false',
		
		'mapApiKey' => (!empty($tdl_options['tdl_google_map_api_key'])) ? $tdl_options['tdl_google_map_api_key'] : ''

	);
	
	wp_localize_script( 'eva-scripts', 'eva_scripts_vars', $eva_scripts_vars_array );


	if (is_singular() && comments_open() && get_option( 'thread_comments')) {
		wp_enqueue_script('comment-reply');
	}


	}

	add_action('wp_enqueue_scripts', 'eva_register_js');

endif;

function eva_admin_styles( $hook ) {

	global $tdl_options;

	if ( is_admin() ) {


		if ( !empty($tdl_options['tdl_size_chart']) ) {
			wp_enqueue_style( 'eva-edittable-style', get_template_directory_uri() . '/css/admin/jquery.edittable.min.css', array(), eva_theme_version() );
		}		

    	wp_enqueue_style("eva-admin-styles", get_template_directory_uri() . "/css/wp-admin-custom.css", false, "1.0", "all");

			if (class_exists('WPBakeryVisualComposerAbstract')) { 
				wp_enqueue_style('eva-visual-composer', get_template_directory_uri() .'/css/visual-composer.css', false, "1.0", 'all');
				wp_enqueue_style('eva-font-linea-arrows', get_template_directory_uri() . '/fonts/linea-fonts/arrows/styles.css', false, eva_theme_version(), 'all' );
				wp_enqueue_style('eva-font-linea-basic', get_template_directory_uri() . '/fonts/linea-fonts/basic/styles.css', false, eva_theme_version(), 'all' );
				wp_enqueue_style('eva-font-linea-basic_elaboration', get_template_directory_uri() . '/fonts/linea-fonts/basic_elaboration/styles.css', false, eva_theme_version(), 'all' );
				wp_enqueue_style('eva-font-linea-ecommerce', get_template_directory_uri() . '/fonts/linea-fonts/ecommerce/styles.css', false, eva_theme_version(), 'all' );
				wp_enqueue_style('eva-font-linea-music', get_template_directory_uri() . '/fonts/linea-fonts/music/styles.css', false, eva_theme_version(), 'all' );
				wp_enqueue_style('eva-font-linea-software', get_template_directory_uri() . '/fonts/linea-fonts/software/styles.css', false, eva_theme_version(), 'all' );
				wp_enqueue_style('eva-font-linea-weather', get_template_directory_uri() . '/fonts/linea-fonts/weather/styles.css', false, eva_theme_version(), 'all' );				
			}
    	}
}
add_action('admin_enqueue_scripts', 'eva_admin_styles');