<?php 
class EVA_Post_Types {

	public $domain = 'eva_starter';

	protected static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'eva' ), '2.1' );
	}

	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'eva' ), '2.1' );
	}

	public function __construct() {
		
		// Hook into the 'init' action
		add_action( 'init', array($this, 'size_guide'), 1 );

	}

	// **********************************************************************// 
	// ! Register Custom Post Type for Size Guide
	// **********************************************************************// 
	public function size_guide() {
		$tdl_options = eva_global_var();
	
		if ( ! $tdl_options['tdl_size_chart'] ) {
			return;
		}

		$labels = array(
			'name'                => esc_html__( 'Size Guides', 'eva' ),
			'singular_name'       => esc_html__( 'Size Guide', 'eva' ),
			'menu_name'           => esc_html__( 'Size Guides', 'eva' ),
			'add_new'             => esc_html__( 'Add new', 'eva' ),
			'add_new_item'        => esc_html__( 'Add new size guide', 'eva' ),
			'new_item'            => esc_html__( 'New size guide', 'eva' ),
			'edit_item'           => esc_html__( 'Edit size guide', 'eva' ),
			'view_item'           => esc_html__( 'View size guide', 'eva' ),
			'all_items'           => esc_html__( 'All size guides', 'eva' ),
			'search_items'        => esc_html__( 'Search size guides', 'eva' ),
			'not_found'           => esc_html__( 'No size guides found.', 'eva' ),
			'not_found_in_trash'  => esc_html__( 'No size guides found in trash.', 'eva' )
		);

		$args = array(
			'label'               => esc_html__( 'eva_size_guide', 'eva' ),
			'description'         => esc_html__( 'Size guide to place in your products', 'eva' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 29,
			'menu_icon'           => 'dashicons-editor-kitchensink',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'rewrite'             => false,
			'capability_type'     => 'page',
		);

		register_post_type( 'eva_size_guide', $args );
	}
	


	/**
	 * Get the plugin url.
	 * @return string
	 */
	public function plugin_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	/**
	 * Get the plugin path.
	 * @return string
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}


}

function EVA_Theme_Plugin() {
	return EVA_Post_Types::instance();
}

$GLOBALS['eva_theme_plugin'] = EVA_Theme_Plugin();

if ( ! function_exists( 'eva_compress' ) ) {
	function eva_compress($variable){
		return base64_encode($variable);
	}
}

if ( ! function_exists( 'eva_decompress' ) ) {
	function eva_decompress($variable){
		return base64_decode($variable);
	}
}

if ( ! function_exists( 'eva_get_svg' ) ) {
	function eva_get_svg( $file ){
		if ( ! apply_filters( 'eva_svg_cache', true ) ) {
			return file_get_contents( $file );
		} 

		$file_path = array_reverse( explode( '/', $file ) );
		$slug = 'wdm-svg-' . $file_path[2] . '-' . $file_path[1] . '-' . $file_path[0];
		$content = get_transient( $slug );

		if ( ! $content ) {
			$content = eva_compress( file_get_contents( $file ) );
			set_transient( $slug, $content, apply_filters( 'eva_svg_cache_time', 60 * 60 * 24 * 7 ) );
		}

		return eva_decompress( $content );
	}
}

// **********************************************************************// 
// ! Support shortcodes in text widget
// **********************************************************************// 

add_filter('widget_text', 'do_shortcode');
?>
