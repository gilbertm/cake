<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/*
 * If your child theme has more than one .css file (eg. ie.css, style.css, main.css) then
 * you will have to make sure to maintain all of the parent theme dependencies.
 *
 * Make sure you're using the correct handle for loading the parent theme's styles.
 * Failure to use the proper tag will result in a CSS file needlessly being loaded twice.
 * This will usually not affect the site appearance, but it's inefficient and extends your page's loading time.
 *
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 */


/* $post_id = 2058;
$meta_key = '_wc_average_rating';
$meta_value = '0';

update_post_meta( $post_id, $meta_key, $meta_value ); */

/**
 * Prevent update notification for plugin
 * http://www.thecreativedev.com/disable-updates-for-specific-plugin-in-wordpress/
 * Place in theme functions.php or at bottom of wp-config.php
 */
function disable_plugin_updates( $value ) {
  $plugins_to_disable = [
      'pi-woocommerce-order-date-time-and-type/pi-woocommerce-order-date-time-and-type.php'
  ];
  if ( isset($value) && is_object($value) ) {
      foreach ($plugins_to_disable as $plugin) {
          if ( isset( $value->response[$plugin] ) ) {
              unset( $value->response[$plugin] );
          }
      }
  }
  return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );


//add_filter( 'auto_update_plugin', '__return_false' );

//add_filter( 'auto_update_theme', '__return_false' );

function eva_child_enqueue_styles() {

    wp_enqueue_style( 'eva-style-fontawesome' , get_template_directory_uri() . '/fonts/fontawesome/font-awesome.min-min.css' );

    wp_enqueue_style( 'eva-style' , get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'eva-child-style', get_stylesheet_directory_uri() . '/css/style.css' );

    wp_enqueue_style( 'eva-child-main-style', get_stylesheet_directory_uri() . '/css/main.min.css', array( 'eva-style' ),    wp_get_theme()->get('Version') );

    if ( is_rtl() ) {
      wp_enqueue_style(  'eva-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
    }
}

add_action(  'wp_enqueue_scripts', 'eva_child_enqueue_styles',100 );


function bootstraps(){
  
  wp_enqueue_script( 'eva-child-bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' );

  // wp_enqueue_script( 'eva-child-jquery-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js' );

  wp_enqueue_script( 'eva-child-script', get_stylesheet_directory_uri() . '/js/script.js', array(), wp_get_theme()->get('Version'), true );
  
  wp_enqueue_style( 'eva-child-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );

}

add_action('wp_enqueue_scripts' , 'bootstraps');

function eva_child_icomoon_enqueue_styles() {
  wp_enqueue_style( 'eva-child-icomoon-free-style', get_stylesheet_directory_uri() . '/fonts/icomoon-free.css', array(), wp_get_theme()->get('Version')      );
  // wp_enqueue_script( 'icomoon-free',  get_stylesheet_directory_uri() . '/fonts/icomoon-free.js' );
  // wp_enqueue_script( 'icomoon-free-liga',  get_stylesheet_directory_uri() . '/fonts/icomoon-free-liga.js' );
 }
 
 add_action(  'wp_enqueue_scripts', 'eva_child_icomoon_enqueue_styles', 100 );

 
/**
 * Custom currency and currency symbol
 */
add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {
     $currencies['AED'] = __( 'United Arab Emirates (custom format)', 'woocommerce' );
     return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'AED': $currency_symbol = 'AED'; break;
     }
     return $currency_symbol;
}


/* --------------------------------------------------------------------------------- */
/* class MyTracker {

    static $hooks;
        static function track_hooks( ) { 
            $filter = current_filter();
            
              if (! empty($GLOBALS['wp_filter'][$filter]) ) {
         foreach ( $GLOBALS['wp_filter'][$filter] as $priority => $tag_hooks ) {
           foreach ( $tag_hooks as $hook ) {
             if ( is_array($hook['function']) )  {
               if ( is_object($hook['function'][0]) ) {
                  $func = get_class($hook['function'][0]) . '->' . $hook['function'][1];
                  } elseif ( is_string($hook['function'][0]) ) {
                    $func = $hook['function'][0] . '::' . $hook['function'][1];
                  }
              } elseif( $hook['function'] instanceof Closure ) {
                 $func = 'a closure';
              } elseif( is_string($hook['function']) ) {
                 $func = $hook['function'];
              }
               self::$hooks[] = 'On hook <span></span><b>"' . $filter . '"</b> run <b>'. $func . '</b> at priority ' . $priority;
             }
          }
       }
    } 
}
   
   // add_action( 'all', array('MyTracker', 'track_hooks') );
   
   / * add_action( 'shutdown', function() {
     echo "<div style='font-family:Arial,sans-serif'>";
     echo implode( '<br />', MyTracker::$hooks );
      echo "</div>";
   }, 9999); */


add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true' );

if ( ! function_exists( 'toggle_shipping_address' ) ){
    function toggle_shipping_address(){
        global $post;
        if($post->post_name === 'checkout'){
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function($)
        {   
            $("#ship-to-different-address-checkbox").change(function() {
              if($(this).is(':checked'))
              {
                $(this).val(1);
                $(".shipping_address").css({"display":"block"});
              }else
              {
                $(this).val(0);
                $(".shipping_address").css({"display":"none"});
              }
            });

        });
        </script>
        <?php
        }
    }
}
add_action( 'wp_footer', 'toggle_shipping_address' );