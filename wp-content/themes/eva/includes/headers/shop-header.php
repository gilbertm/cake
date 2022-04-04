<?php
$tdl_options = eva_global_var();

$page_id = wc_get_page_id('shop');
$page_url = get_permalink( $page_id );
?>

<?php 
if (is_shop()) {
    $page_title_option = 1;
    $subtitle = null;
    $page_header_height = 0;
    $page_header_color_switcher = '';
    
    if ( EVA_ACF_IS_ACTIVE ) {
        $page_title_option = esc_attr(get_field('tdl_hide_title', $page_id));
        $subtitle = get_field('tdl_subtitle', $page_id);
        $page_header_color_switcher = get_field('tdl_bg_change', $page_id);
        $page_header_height = get_field('tdl_header_height', $page_id);
    }

  $thumb_id = get_post_thumbnail_id($page_id);
  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
  $thumb_url = $thumb_url_array[0];
  $parallax = '';

  if (has_post_thumbnail($page_id)) {
    $parallax = '-3';
  } else {
    $thumb_url = '';
    $parallax = '0';
  }

  } else {
  $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
  if ( is_product_category() ) {
    $term = get_queried_object();
  }  
  $page_header_height = get_field('tdl_prodcat_header_height', $term);
  $page_header_color_switcher = get_field('tdl_prodcat_bg_change', $term);
  $subtitle = '';
  $page_title_option = 1;

  $image_header = get_field('tdl_prodcat_image_header', $term);
  $thumb_url = (!empty($image_header['url'])) ? $image_header['url'] : ''; 
  

  if ($image_header) {
    $parallax = '-3';
  } else {
    $thumb_url = '';
    $parallax = '0';
  }  
}
?>


        <div class="page-header">

        <div class="page-header-bg-wrapper rellax" data-rellax-speed="<?php echo esc_html($parallax); ?>" style="background-image: url(<?php echo esc_url($thumb_url); ?>)"></div>


          <div class="row">
            <?php if ( $page_title_option == 1 ): ?>
              <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <div class="title-section <?php echo esc_attr( $page_header_color_switcher ); ?>">
                  <?php echo eva_breadcrumbs(); ?>
                  <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

                  <?php if ( esc_attr( $subtitle ) ) : ?>
                    <div class="term-description"><p><?php echo esc_attr( $subtitle ); ?></p></div>
                  <?php else: ?>
                    <?php do_action( 'woocommerce_archive_description' ); ?>
                  <?php endif; ?>
                  
                  <!-- Shop Categories Area -->  

                  <?php 
                  $shop_categories = (!empty($tdl_options['tdl_shop_categories'])) ? $tdl_options['tdl_shop_categories'] : 1;
                  // Find the category + category parent, if applicable
                  if (!empty($tdl_options['tdl_shop_categories']) == 1) {
                    $term           = get_queried_object();
                    $parent_id      = empty( $term->term_id ) ? 0 : $term->term_id;
                    $categories     = get_terms('product_cat', array('hide_empty' => 1, 'parent' => $parent_id));
                    if ($categories) :
                  ?> 

                  <ul class="list_shop_categories mobile list-centered">
                    <li class="category_item"><a href="#categories"><?php echo esc_html__( 'Categories', 'eva' ); ?><i class="togarrow"></i></a></li>
                  </ul>
                                            
                  <ul class="list_shop_categories desktop list-centered animated fadeIn">

                          <li class="category_item">
                            <?php if ($categories) : ?>
                            
                              <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="category_item_link"><?php echo esc_html__( 'All', 'eva' ); ?>
                              </a><span class="counter"><?php echo wp_count_posts('product')->publish; ?></span>                    
                            <?php else: ?> 
                              <i class="backtoall"></i>
                              <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="category_item_link"><?php echo esc_html__( 'Back to All', 'eva' ); ?>
                              </a><span class="counter"><?php echo wp_count_posts('product')->publish; ?></span>                 
                            <?php endif; ?>
                          </li>  
        
                          <?php foreach($categories as $category) : ?>

                            <li class="category_item">
                              <span>/</span>
                              <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="category_item_link"><?php echo esc_html($category->name); ?>
                              </a><span class="counter"><?php echo esc_html($category->count); ?></span>  
                            </li>
                                      
                          <?php endforeach; ?>
                                              
                  </ul><!-- .list_shop_categories-->
                  
                  <?php endif; ?>
                  <?php } ?>

    

                </div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>