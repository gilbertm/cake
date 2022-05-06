<?php 
$tdl_options = eva_global_var();
$number_of_widgets = (!empty($tdl_options['tdl_footer_layout'])) ? $tdl_options['tdl_footer_layout'] : '4';

$footer_align_1 = (!empty($tdl_options['tdl_footer_1_align'])) ? $tdl_options['tdl_footer_1_align'] : 'left-align';
$footer_align_2 = (!empty($tdl_options['tdl_footer_2_align'])) ? $tdl_options['tdl_footer_2_align'] : 'left-align';
$footer_align_3 = (!empty($tdl_options['tdl_footer_3_align'])) ? $tdl_options['tdl_footer_3_align'] : 'left-align';
$footer_align_4 = (!empty($tdl_options['tdl_footer_4_align'])) ? $tdl_options['tdl_footer_4_align'] : 'left-align';
$footer_align_5 = (!empty($tdl_options['tdl_footer_5_align'])) ? $tdl_options['tdl_footer_5_align'] : 'left-align';

$hide_instagram = get_field('tdl_hide_instagram', $page_id);


if ( EVA_WOOCOMMERCE_IS_ACTIVE ) {
  if ( is_shop() ) {
    $hide_instagram_shop_url = wc_get_page_id('shop');
    $hide_instagram = get_field('tdl_hide_instagram', $hide_instagram_shop_url);
  }
}



$footer_text = (!empty($tdl_options['tdl_footer_text'])) ? $tdl_options['tdl_footer_text'] : '&copy; 2021 - Eva Woocommerce Theme. Created by <a href=\'https://temash.design\'>TemashDesign</a>';

    if ( $number_of_widgets == 5 ) {
      $grid_class = "small-up-1 large-up-5";
    } 

    if ( $number_of_widgets == 4 ) {
      $grid_class = "small-up-1 large-up-4";
    } 
    else if ( $number_of_widgets == 3 ) {
      $grid_class = "small-up-1 large-up-3";
    }
    else if ( $number_of_widgets == 2 ) {
      $grid_class = "small-up-1 large-up-2";
    }   
    else if ( $number_of_widgets == 1 ) {
      $grid_class = "small-up-1 large-up-1";
    }
?>

      <footer id="site-footer">

        <div class="row">
          <div class="col col-12 col-md-4 mb-3">
            <div class="row">
              <div class="col col-3">
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
                    <img class="main-logo dark animated fadeIn w-100" src="<?php echo esc_url($site_logo); ?>" srcset="<?php echo esc_url($site_logo_retina); ?> 2x" >
                  <?php else : ?>
                    <img class="main-logo dark animated fadeIn w-100" src="<?php echo esc_url($site_logo); ?>" >
                  <?php endif; ?>

                <?php endif; ?>

                </a>
              </div>
              <div class="col col-9">
                <h3 class="mb-0 pt-1" style="font-size:1.25rem;line-height:1.5rem">Sunshine's Sweettooth</h3>
                <p class="mt-0 mb-2">Cake shop</p>
								<p class="small">Shop No. 2, Amir Building, Al Qusais<br>
											Dubai, United Arab Emirates<br>
									<a href="tel:+971505063624" class="text-primary mt-2 d-inline-block"><i class="fa fa-phone small" aria-hidden="true"><!-- empty --></i> (050) 506 3624</a></p>
              </div>
            </div>
            <div class="row m-0 mb-3">
              <div class="col col-12 border-top mt-3 pt-3 mx-auto text-center">
              <?php if ( (isset($tdl_options['tdl_footer_social'])) && ($tdl_options['tdl_footer_social'] == "1") ) : ?>
                    <?php eva_socials(); ?>  
                  <?php endif; ?> 
              </div>
            </div>
            <div class="row">
              <div class="col col-12">
                 <?php /* <div style="width: 100%"><iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=250&amp;hl=en&amp;q=Shop%20No.%202,%20Amir%20Building%20-%20Al%20Qusais%20-%20Dubai+(Sunshine's%20Sweettooth%20Cake%20shop)&amp;data=!3m1!4b1!4m5!3m4!1s0x3e5f5fda299bce2b:0x944635ec973d1b58!8m2!3d25.2846164!4d55.4083836&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed&amp;key=AIzaSyAo2dd5EqI3m_p14rFLRtySDwlIObD6ftY"></iframe></div> */ ?>

                  <div id="footer_map" style="width:100%;height:250px"></div>

                  <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
                  <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAo2dd5EqI3m_p14rFLRtySDwlIObD6ftY&callback=initFooterMap&v=weekly"
                    async
                  ></script>
                  <script type="text/javascript">
                    function initFooterMap() {
                        const myLatLng = { lat: 25.2846164, lng: 55.4061949 };
                        const footer_map = new google.maps.Map(document.getElementById("footer_map"), {
                          zoom: 14,
                          center: myLatLng,
                        });

                        new google.maps.Marker({
                          position: myLatLng,
                          footer_map,
                          title: "Sunshine Sweettooth Cake Shop",
                        });
                      }
                  </script>
              </div>
            </div>
          </div>
          <div class="col col-12 col-md-4 mb-3">
            <div class="row">
              <div class="col widget widget_meta">
                <h5 style="font-family:Rubik">About</h5>
                <ul class="list">
                  <li><a class="text-primary" href="/contact-us/">Contact us</a></li>
                  <li><a class="text-primary" target="_blank" href="https://www.facebook.com/sweettoothbysunshine">Facebook</a></li>
                </ul>
              </div>
              <div class="col widget widget_meta">
              <h5 style="font-family:Rubik">Shop</h5>
                  <ul class="list">
                    <li><a class="text-primary" href="/shop">Categories</a></li>
                    <li><a class="text-primary" href="/cart/">Cart</a></li>
                    <li><a class="text-primary" href="/checkout/">Checkout</a></li>
                    <li><a class="text-primary" href="/wishlist/">Wishlist</a></li>
                  </ul>
              </div>
            </div>
            
          </div>
          <div class="ccol col-12 col-md-4 mb-3">
          <h5 style="font-family:Rubik">Subscribe</h5>           	
            <?php echo apply_shortcodes('[contact-form-7 id="1657" title="Contact form 1"]'); ?>            
          </div>
        </div>

        <div class="f-copyright">
          <div class="row">
            <div class="col-12 columns copytxt"><p style="font-size:12px;color:#777;font-family:Arial,Helvetica,serif"><?php echo wp_kses( $footer_text, array(
                            'ul' => array('class' => array(),),
                            'li' => array('class' => array(),),
                            'br' => array(),
                            'a' => array(
                              'class' => array(),
                              'href'  => array(),
                              'rel'   => array(),
                              'title' => array(),
                              'target' => array(),
                            ),
                            'img' => array(
                                'src' => array(),
                                'class' => array(),
                                'alt' => array(),
                                'title' => array(),
                            ),
                        ) ); ?></p></div>
          </div>    
        </div>      
      </footer>

      </div><!-- .page-wrapper -->
    </div><!-- .offcanvas_main_content -->


    <!-- OffCanvas Aside Content Left -->
    <div class="offcanvas_aside offcanvas_aside_left">
      <div class="nano">
        <div class="nano-content">
          <div class="offcanvas_aside_content">
            <?php get_template_part( 'offcanvas', 'left' ); ?>
          </div>
        </div>
      </div>
    </div>      

      <!-- OffCanvas Aside Content Right -->
      <div class="offcanvas_aside offcanvas_aside_right">        
      <div class="nano">
        <div class="nano-content">
          <div class="offcanvas_aside_content">
            <?php get_template_part( 'offcanvas', 'right' ); ?>
          </div>
        </div>
      </div>
      </div>

      <div class="offcanvas_overlay"></div>      
		</div><!-- .offcanvas_container -->
    
    <div class="floating-menu">
      <ul class="social-media-container">
        <li class="social-media facebook">
          <i class="fa fa-facebook"></i>
          <a href="https://www.facebook.com/sweettoothbysunshine" target="_blank">Follow us on Facebook</a>
        </li>
        <li class="social-media instagram">
          <i class="fa fa-instagram"></i>
          <a href="https://www.instagram.com/sunshinessweettoothlove" target="_blank">Follow us on Instagram</a>
        </li>
        <li class="social-media whatsapp">
          <i class="fa fa-whatsapp"></i>
          <a href="https://api.whatsapp.com/send?phone=971505063624" target="_blank">Chat us on WhatsApp</a>
        </li>
      </ul>
    </div>
    


    <div class="cd-quick-view woocommerce">
    </div> <!-- cd-quick-view -->
    <div class="rellax"></div>

    <!-- ******************************************************************** -->
    <!-- * Custom Footer JavaScript Code ************************************ -->
    <!-- ******************************************************************** -->
        
    <?php if ( (isset($tdl_options['tdl_custom_js_footer'])) && ($tdl_options['tdl_custom_js_footer'] != "") ) : ?>
      <?php echo do_shortcode($tdl_options['tdl_custom_js_footer']); ?>
    <?php endif; ?>
    
		<?php wp_footer(); ?>
    <?php do_action( 'eva_after_footer' ); ?>
    
	</body>
</html>