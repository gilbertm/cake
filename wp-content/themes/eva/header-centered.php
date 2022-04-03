<?php 
global $yith_wcwl, $woocommerce;
$tdl_options = eva_global_var();
if ( EVA_WOOCOMMERCE_IS_ACTIVE ) {
  if (is_shop()) {
    $page_id = wc_get_page_id('shop');
  }
}
$page_header_color_switcher = get_field('tdl_bg_change', $page_id);
if (is_search()) {
  $page_header_color_switcher = 'inherit';
}
$menu_trigger = (!empty($tdl_options['tdl_trigger_menu_style'])) ? $tdl_options['tdl_trigger_menu_style'] : 'menu_trigger_1';


if ( EVA_WOOCOMMERCE_IS_ACTIVE ) {
  if ( is_product_category() ) {
    $term = get_queried_object();
    $page_header_color_switcher = get_field('tdl_prodcat_bg_change', $term);
  }
}
?>

<header class="site-header animate-search <?php echo esc_attr( $page_header_color_switcher ); ?>" role="banner">

	<div class="header-wrapper row">

      <div class="nav">
      <?php if ( has_nav_menu('main_navigation') ) : ?>
        <div class="header-nav">
          <div class="menu-trigger <?php echo esc_attr($menu_trigger) ?>">
            <div><span></span></div>
            <?php if ( $menu_trigger == "menu_trigger_1" ) : ?>
            <span class="menu-title"><?php esc_html_e( 'Menu', 'eva' ); ?></span>
            <?php endif; ?>
          </div>

          <nav class="main-navigation">
            <?php 
              $walker = new rc_scm_walker;
              wp_nav_menu(array(
                  'theme_location'  => 'main_navigation',
                  'fallback_cb'     => false,
                  'container'       => false,
                  'link_before'       => '<span>',
                  'link_after'       => '</span>',                  
                  'items_wrap'      => '<ul class="%1$s">%3$s</ul>',
                  'walker'      => $walker
              ));
            ?>             
          </nav>


        </div> 

      

      <?php endif; ?>
   
      </div><!-- .nav -->

      <div class="site-branding">

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

        	<?php if ( ! empty( $tdl_options['tdl_main_logo_noretina']['url'] ) ) : ?>

            <?php 
            if (is_ssl()) {
              $site_logo = str_replace("http://", "https://", $tdl_options['tdl_main_logo_noretina']['url']);
              $site_logo_retina = str_replace("http://", "https://", $tdl_options['tdl_main_logo_retina']['url']);
            } else {
              $site_logo = $tdl_options['tdl_main_logo_noretina']['url'];
              $site_logo_retina = $tdl_options['tdl_main_logo_retina']['url'];
            }
            ?>

        		<!-- Main Logo -->

        		<?php if ( ! empty( $tdl_options['tdl_main_logo_retina']['url'] ) ) : ?>
        			<img class="main-logo dark animated fadeIn" src="<?php echo esc_url($site_logo); ?>" srcset="<?php echo esc_url($site_logo_retina); ?> 2x">
        		<?php else : ?>
        			<img class="main-logo dark animated fadeIn" src="<?php echo esc_url($site_logo); ?>">
        		<?php endif; ?>

        	<?php else : ?>

    				<h1><?php esc_html(bloginfo( 'name' )); ?></h1>
    				<?php if (isset($tdl_options['tdl_logo_description']) && $tdl_options['tdl_logo_description'] == 1) {?>
    					<small><?php echo esc_html(get_bloginfo('description')); ?></small>              
    				<?php } ?>

        	<?php endif; ?>


          <?php if ( ! empty( $tdl_options['tdl_main_logo_noretina_light']['url'] ) ) : ?>

            <?php 
            if (is_ssl()) {
              $site_logo_light = str_replace("http://", "https://", $tdl_options['tdl_main_logo_noretina_light']['url']);
              $site_logo_retina_light = str_replace("http://", "https://", $tdl_options['tdl_main_logo_retina_light']['url']);
            } else {
              $site_logo_light = $tdl_options['tdl_main_logo_noretina_light']['url'];
              $site_logo_retina_light = $tdl_options['tdl_main_logo_retina_light']['url'];
            }
            ?>            

            <!-- Main Logo for Dark Background -->

            <?php if ( ! empty( $tdl_options['tdl_main_logo_retina_light']['url'] ) ) : ?>
              <img class="main-logo light animated fadeIn" src="<?php echo esc_url($site_logo_light); ?>" srcset="<?php echo esc_url($site_logo_retina_light); ?> 2x">
            <?php else : ?>
              <img class="main-logo light animated fadeIn" src="<?php echo esc_url($site_logo_light); ?>">
            <?php endif; ?>
                    
          <?php endif; ?>
        


           <?php if ( ! empty( $tdl_options['tdl_sticky_logo_noretina']['url'] ) ) : ?>

            <?php 
            if (is_ssl()) {
              $site_logo_sticky = str_replace("http://", "https://", $tdl_options['tdl_sticky_logo_noretina']['url']);
              $site_logo_retina_sticky = str_replace("http://", "https://", $tdl_options['tdl_sticky_logo_retina']['url']);
            } else {
              $site_logo_sticky = $tdl_options['tdl_sticky_logo_noretina']['url'];
              $site_logo_retina_sticky = $tdl_options['tdl_sticky_logo_retina']['url'];
            }
            ?>            

            <!-- Sticky Header Logo -->

            <?php if ( ! empty( $tdl_options['tdl_sticky_logo_retina']['url'] ) ) : ?>
              <img class="sticky-logo animated fadeIn" src="<?php echo esc_url($site_logo_sticky); ?>" srcset="<?php echo esc_url($site_logo_retina_sticky); ?> 2x" >
            <?php else : ?>
              <img class="sticky-logo animated fadeIn" src="<?php echo esc_url($site_logo_sticky); ?>" >
            <?php endif; ?>
                    
          <?php else : ?>
            <div class="sticky-logo">
            <h1><?php esc_html(bloginfo( 'name' )); ?></h1>
            <?php if (isset($tdl_options['tdl_logo_description']) && $tdl_options['tdl_logo_description'] == 1) {?>
              <small><?php echo esc_html(get_bloginfo('description')); ?></small>              
            <?php } ?>              
            </div>


          <?php endif; ?>        


        </a>
      </div><!-- .site-branding -->


      <div class="tools">
        <ul>

          <?php eva_header_search() ?>
        
          <?php eva_header_wishlist() ?>

          <?php eva_header_account() ?>
  
          <?php eva_header_cart() ?>               

        </ul>
      </div><!-- .tools -->      
</div>


</header>