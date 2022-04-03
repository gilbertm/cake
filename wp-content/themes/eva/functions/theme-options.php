<?php 

define( 'EVA_WOOCOMMERCE_IS_ACTIVE',	class_exists( 'WooCommerce' ) );
define( 'EVA_VISUAL_COMPOSER_IS_ACTIVE',	defined( 'WPB_VC_VERSION' ) );
define( 'EVA_REV_SLIDER_IS_ACTIVE',	class_exists( 'RevSlider' ) );
define( 'EVA_WPML_IS_ACTIVE',	defined( 'ICL_SITEPRESS_VERSION' ) );
define( 'EVA_WISHLIST_IS_ACTIVE',	class_exists( 'YITH_WCWL' ) );
define( 'EVA_ACF_IS_ACTIVE',	class_exists( 'ACF' ) );

/**
 * Checks if the required plugin is active in network or single site.
 *
 * @param $plugin
 *
 * @return bool
 */
function plugins_is_active( $plugin ) {
	$network_active = false;
	if ( is_multisite() ) {
		$plugins = get_site_option( 'active_sitewide_plugins' );
		if ( isset( $plugins[$plugin] ) ) {
			$network_active = true;
		}
	}
	return in_array( $plugin, get_option( 'active_plugins' ) ) || $network_active;
}

// -----------------------------------------------------------------------------
// Theme Version
// -----------------------------------------------------------------------------

if ( ! function_exists( 'eva_theme_version' ) ) :
function eva_theme_version() {
	$eva_theme = wp_get_theme();
	return $eva_theme->get('Version');
}
endif;


/******************************************************************************/
/*************************** Back to top button *******************************/
/******************************************************************************/

if( ! function_exists( 'eva_backtotop_button' ) ) {
	function eva_backtotop_button() {
		global $tdl_options;

		if ( (isset($tdl_options['tdl_backtotop'])) && ($tdl_options['tdl_backtotop'] == "0") ) {
			return '';
		}

		$progress_bar = '<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg>';

		echo sprintf( '<div class="progress-page"><div class="scrolltotop is-active is-visible"><div class="arrow-top"></div><div class="arrow-top-line"></div></div>%s</div>', $progress_bar);

	}
	add_action( 'wp_footer', 'eva_backtotop_button', 200 );
}

/******************************************************************************/
/************************ Header MyAccount Section ****************************/
/******************************************************************************/

if ( ! function_exists( 'eva_header_account' ) ) :
	function eva_header_account() {
		global $tdl_options;

		if ( (isset($tdl_options['tdl_header_my_account'])) && ($tdl_options['tdl_header_my_account'] == "0") ) {
			return '';
		}

		printf(
			'<li class="myaccount-button">
				<a href="%s">
					<div class="row text-center px-0">
						<div class="col col-12 px-2">
							<i class="myaccount-button-icon"></i>
						</div>
						<div class="col col-12 p-0">
						</div>
					</div>
				</a>
			</li>',
			esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) )
		);

	}
endif;

/******************************************************************************/
/************************** Header Search Section *****************************/
/******************************************************************************/

if ( ! function_exists( 'eva_header_search' ) ) :
	function eva_header_search() {
		global $tdl_options;

		if ( (isset($tdl_options['tdl_header_search_bar'])) && ($tdl_options['tdl_header_search_bar'] == "0") ) {
			return '';
		}

		printf(
			'<li class="search-button">
				<a href="#search" class="cd-search-trigger cd-text-replace">
					<div class="row text-center px-0">
						<div class="col col-12 px-2">
							<i class="search-button-icon"></i>
						</div>
						<div class="col col-12 p-0">
						</div>
					</div>
				</a>
			</li>'
		);

	}
endif;

/******************************************************************************/
/************************* Header Wishlist Section ****************************/
/******************************************************************************/

if ( ! function_exists( 'eva_header_wishlist' ) ) :
	function eva_header_wishlist() {

		if ( ! function_exists( 'YITH_WCWL' ) ) {
			return '';
		}

		$count = YITH_WCWL()->count_products();

		if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {

			printf(
				'<li class="wishlist-button">
					<a href="%s">
						<div class="row text-center px-0">
							<div class="col col-12 px-2">
								<i class="wishlist-button-icon"></i>
							</div>
							<div class="col col-12 p-0">
								<span class="wishlist_items_number counter_number animated rubberBand" style="position: relative;
								display: inline-block;
								left: 0;">%s</span>
							</div>
						</div>
					</a>
				</li>',
				esc_url( get_permalink( get_option( 'yith_wcwl_wishlist_page_id' ) ) ),
				intval( $count )
			);

		}

	}
endif;

/******************************************************************************/
/*************************** Header Cart Section ******************************/
/******************************************************************************/

if ( ! function_exists( 'eva_header_cart' ) ) :
	function eva_header_cart() {
		global $woocommerce, $tdl_options;

		if ( ! function_exists( 'woocommerce_mini_cart' ) ) {
			return '';
		}

		if ( (isset($tdl_options['tdl_catalog_mode'])) && ($tdl_options['tdl_catalog_mode'] == "1") ) {
			return '';
		}		


		printf(
			'<li class="cart-button">
				<a href="%s" class="cart-contents">
					<div class="row text-center px-0">
						<div class="vertical-align-center col col-12 px-2">
							<i class="cart-button-icon"></i>
						</div>
						<div class="col col-12 p-0" style="font-size:12px">							
							<span class="cart_items_number counter_number animated rubberBand">%s</span>
						</div>
						<div class="col col-12 p-0" style="font-size:12px">
							<div class="cart-desc">
								<span class="cart_total" style="font-size:9px;font-family:\'Six Caps\',\'PT Sans Narrow,Arial\'">%s</span>
								<span class="d-none">%s</span>
							</div>
						</div>
					</div>
				</a>
			</li>',
			esc_url( wc_get_cart_url() ),
			WC()->cart->get_cart_subtotal(),
			esc_html__( 'Cart', 'woocommerce' ),
			intval( $woocommerce->cart->cart_contents_count )
		);

	}
endif;


/*-----------------------------------------------------------------------------------*/
/*	WPML/Currency dropdown
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'eva_language_and_currency' ) ) {
	function eva_language_and_currency() { 

		?>

		<nav class="language_currency">
                
            <?php 
            if (function_exists('icl_get_languages')) {

            function languages_list(){
                $languages = icl_get_languages('skip_missing=N&link_empty_to=str');
                if(!empty($languages)){
                    echo '<ul class="languages">';
                    foreach($languages as $l){

                    	if (!$l['active']) {
                    		echo '<li><a href="'.$l['url'].'">'.icl_disp_language($l['translated_name']).'</a></li>';
                    	} else {
                    		echo '<li class="current-menu-item"><span>'.icl_disp_language($l['translated_name']).'</span></li>';
                    	}
                    }
                    echo '</ul>';
                }
            }
            	languages_list();
            }
            ?>
                
			<?php if (class_exists('woocommerce_wpml')) { ?>
				<?php do_action('wcml_currency_switcher', array('format' => '%code% (%symbol%)','switcher_style' => 'wcml-horizontal-list')); ?>
			<?php } ?>
                
		</nav><!--.language-and-currency-->

	<?php }
}

if ( ! function_exists( 'eva_language_and_currency_topbar' ) ) {
	function eva_language_and_currency_topbar() { 

		?>

		<nav class="language_currency">
                
            <?php 
            if (function_exists('icl_get_languages')) {

            function languages_list_topbar(){
                $languages = icl_get_languages('skip_missing=N&link_empty_to=str');
                if(!empty($languages)){
                    echo '<ul class="languages">';
                    foreach($languages as $l){

                    	if (!$l['active']) {
                    		echo '<li><a href="'.$l['url'].'">'.icl_disp_language($l['translated_name']).'</a></li>';
                    	} else {
                    		echo '<li class="current-menu-item"><span>'.icl_disp_language($l['translated_name']).'</span></li>';
                    	}
                    }
                    echo '</ul>';
                }
            }
            	languages_list_topbar();
            }
            ?>
                
			<?php if (class_exists('woocommerce_wpml')) { ?>
				<?php do_action('wcml_currency_switcher', array('format' => '%code% (%symbol%)','switcher_style' => 'wcml-horizontal-list')); ?>
			<?php } ?>
                
		</nav><!--.language-and-currency-->

	<?php }
}

/*-----------------------------------------------------------------------------------*/
/*	Custom password form
/*-----------------------------------------------------------------------------------*/

add_filter( 'the_password_form', 'custom_password_form' );
function custom_password_form() {
	global $post;
	$post = get_post( $post );
	$label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
	$output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
	<p>' . esc_attr__( 'This content is password protected. To view it please enter your password below:', 'eva' ) . '</p>
	<p><label for="' . $label . '">' . esc_attr__( 'Password:', 'eva' ) . ' </label>  <input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" value="' . esc_attr__( 'Submit', 'eva' ) . '" /></p></form>';
	return $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Read More Link
/*-----------------------------------------------------------------------------------*/

function eva_read_more_link() {
    return '<div class="morelink"><a class="more-link" href="' . get_permalink() . '">'. esc_html__( 'Continue reading &rarr;', 'eva' ). '</a></div>';
}
add_filter( 'the_content_more_link', 'eva_read_more_link' );


/*-----------------------------------------------------------------------------------*/
/*	Share
/*-----------------------------------------------------------------------------------*/

function eva_share() {
    global $post, $product, $tdl_options;
    if ( (isset($tdl_options['tdl_sharing_options'])) && ($tdl_options['tdl_sharing_options'] == "1" ) ) :
    $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false, '');
?>

    <div class="box-share-master-container" data-name="<?php esc_html_e( 'Share', 'eva' )?>" data-share-elem="<?php echo implode(',', $tdl_options['tdl_share_select']);?>">
		<a href="javascript:;" class="social-sharing" data-shareimg="<?php echo esc_url($src[0]) ?>" data-name="<?php echo get_the_title(); ?>">
			<i class="icon-px-solid-share"></i>
			<span><?php esc_html_e( 'Share', 'eva' )?></span>
		</a>
    </div><!--.box-share-master-container-->

<?php
    endif;
}


/******************************************************************************/
/****** Add Fresco to Galleries ***********************************************/
/******************************************************************************/

add_filter( 'wp_get_attachment_link', 'eva_sant_prettyadd', 10, 6);
function eva_sant_prettyadd ($content, $id, $size, $permalink, $icon, $text) {
    if ($permalink) {
    	return $content;    
    }
    $content = preg_replace("/<a/","<span class=\"fresco\" data-fresco-group=\"\"", $content, 1);
    return $content;
}


/*-----------------------------------------------------------------------------------*/
/*	BREADCRUMBS
/*-----------------------------------------------------------------------------------*/

	function eva_breadcrumbs() {
		$breadcrumb_output = "";
		
		if ( function_exists('bcn_display') ) {
			$breadcrumb_output .= '<div id="breadcrumbs">'. "\n";
			$breadcrumb_output .= bcn_display(true);
			$breadcrumb_output .= '</div>'. "\n";
		} else if ( function_exists('yoast_breadcrumb') ) {
			$breadcrumb_output .= '<div id="breadcrumbs">'. "\n";
			$breadcrumb_output .= yoast_breadcrumb("","",false);
			$breadcrumb_output .= '</div>'. "\n";			
		} else {
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			}
			$breadcrumb_output .= ''. "\n";
			// $breadcrumb_output .= '<div id="breadcrumbs">'. "\n";
			// $breadcrumb_output .= do_action('woocommerce_before_main_content_breadcrumb');
			// $breadcrumb_output .= '</div>'. "\n";
		}
		
		return $breadcrumb_output;
	}


/*-----------------------------------------------------------------------------------*/
/*	Blog Navigation
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'eva_content_nav' ) ) :
function eva_content_nav( $nav_id ) {
	global $wp_query, $post, $tdl_options;
    
    $blog_with_sidebar = "";
    if ( (isset($tdl_options['tdl_single_blog_layout'])) && ($tdl_options['tdl_single_blog_layout'] == "1" ) ) $blog_with_sidebar = "yes";
    if (isset($_GET["blog_with_sidebar"])) $blog_with_sidebar = $_GET["blog_with_sidebar"];

	
	$blog_masonry = "";
	if ( (isset($tdl_options['tdl_blog_layout'])) && ($tdl_options['tdl_blog_layout'] == "2" ) ) :
		$blog_masonry = "yes";
	endif;
	
	
	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo esc_attr($nav_class); ?>">

        <div class="row">
        
			<?php if ( $blog_masonry == "yes" && !is_single() ) : ?>
            <div class="large-12 columns">
        	<?php elseif ( $blog_with_sidebar == "yes" ) : ?>
            <div class="large-12 columns">
        	<?php else : ?>
            <div class="large-8 large-centered columns without-sidebar">
        	<?php endif; ?>
        
				<?php if ( is_single() ) : // navigation links for single posts ?>
        
                    <div class="row">
                        
                        <div class="large-6 columns nav-left">
                            <?php previous_post_link( '<div class="nav-previous">%link', '<div class="nav-previous-title"><span>'.esc_html__( "Previous Reading", "eva" ).'</span></div>%title</div>' ); ?>
                        </div><!-- .columns -->
                        
                        <div class="large-6 columns nav-right">
                            <?php next_post_link( '<div class="nav-next">%link', '<div class="nav-next-title"><span>'.esc_html__( "Next Reading", "eva" ).'</span></div> %title</div>' ); ?>
                        </div><!-- .columns -->
                        
                    </div><!-- .row -->
            
				<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
            
					<div class="archive-navigation">
						<div class="row">
							
							<div class="small-6 columns text-left">
								<?php if ( get_next_posts_link() ) : ?>
								<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'eva' ) ); ?></div>
								<?php endif; ?>
							</div>
							
							<div class="small-6 columns text-right">
								<?php if ( get_previous_posts_link() ) : ?>
								<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'eva' ) ); ?></div>
							<?php endif; ?>
							</div>
						
						</div>
					</div>
				
                <?php endif; ?>
            
            </div><!-- .columns -->
        
        </div><!-- .row -->

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // eva_content_nav

/*-----------------------------------------------------------------------------------*/
/*	Post Meta Date
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'eva_post_header_date' ) ) :
function eva_post_header_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'eva' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'eva' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo wp_kses_post($date);

	return $date;
}
endif;

/*-----------------------------------------------------------------------------------*/
/*	Post Meta
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'eva_post_entry_meta' ) ) :
function eva_post_entry_meta($echo = true) {

	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'eva' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="post_date">'. __( ' on ', 'eva' ) . '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'eva' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo wp_kses_post($date);

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( ', ' );
	if ( $categories_list ) {
		echo '<span class="post_categories">'. esc_html__( ' in ', 'eva' ) . $categories_list . '</span>';
	}

	eva_share();

}
endif;



/*-----------------------------------------------------------------------------------*/
/*	Blog Meta
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'eva_entry_meta' ) ) :
function eva_entry_meta() {
	
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . esc_html__( 'Sticky', 'eva' ) . '</span>';

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( esc_html__( ' This entry was posted by ', 'eva' ) . '<a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'eva' ), get_the_author() ) ),
			get_the_author()
		);
	}
	
	/*if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		eva_post_header_entry();*/

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( ', ' );
	if ( $categories_list ) {
		echo esc_html__( ' in ', 'eva' ) . $categories_list . '';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		echo esc_html__( ' and tagged ', 'eva' ) . $tag_list . '';
	}
}
endif;

/*-----------------------------------------------------------------------------------*/
/*	Blog Comments
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'eva_comment' ) ) :
function eva_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php esc_html_e( 'Pingback:', 'eva' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'eva' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<div class="comment-content">
				
				<div class="comment-author-avatar">
					<?php echo get_avatar( $comment, 140 ); ?>
				</div><!-- .comment-author-avatar -->
				
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'eva' ); ?></p>
				<?php endif; ?>
				
				<?php printf( esc_html__( '%s', 'eva' ), sprintf( '<h3 class="comment-author">%s</h3>', get_comment_author_link() ) ); ?>
                
                <div class="comment-metadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                        <time datetime="<?php comment_time( 'c' ); ?>">
                            <?php printf( esc_html__( '%1$s at %2$s', 'eva' ), get_comment_date(), get_comment_time() ); ?>
                        </time>
                    </a>
                </div><!-- .comment-metadata -->

				<div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->
                
                <?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<span class="comment-reply"><i class="fa fa-reply"></i>',
						'after'     => '</span>',
					) ) );
				?>
				
				<?php edit_comment_link( esc_html__( 'Edit', 'eva' ), '<span class="comment-edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>' ); ?>
                
			</div><!-- .comment-content -->
            
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for eva_comment()

/*-----------------------------------------------------------------------------------*/
/*	Blog Gallery
/*-----------------------------------------------------------------------------------*/


if ( ! is_admin() ) {

function eva_grab_ids_from_gallery() {
			
	global $post;
    
    if ( !isset($post) ) return;
    
	$attachment_ids = array();
	$pattern = get_shortcode_regex();
	$ids = array();
	
	if (preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches ) ) {   //finds the "gallery" shortcode and puts the image ids in an associative array at $matches[3]
		//$count = count($matches[3]); //in case there is more than one gallery in the post.
		$count = 1;
		for ($i = 0; $i < $count; $i++){
			$atts = shortcode_parse_atts( $matches[3][$i] );
			if ( isset( $atts['ids'] ) ){
				$attachment_ids = explode( ',', $atts['ids'] );
				$ids = array_merge($ids, $attachment_ids);
			}
		}
	}
	
	return $ids;
	
}
add_action( 'wp', 'eva_grab_ids_from_gallery' );

}

// =============================================================================
// Top Bar Contact Section
// =============================================================================

if ( ! function_exists( 'eva_contact_topbar' ) ) :

	function eva_contact_topbar() {
	global $tdl_options;
?>

	<?php if ( (isset($tdl_options['tdl_topbar_contact'])) && ($tdl_options['tdl_topbar_contact'] == "1") ) : ?>
		<div class="topbar_contact topbar-item">
          <?php if ( (isset($tdl_options['tdl_topbar_contact_icon'])) && ($tdl_options['tdl_topbar_contact_icon'] == "1") ) : ?>
            <i class="header-contact-icon"></i>
          <?php endif; ?>	
          <div class="header-contact-desc">
            <?php if ( isset($tdl_options['tdl_topbar_contact_subtitle']) ) : ?>
              <span><?php echo esc_attr($tdl_options['tdl_topbar_contact_subtitle']); ?></span>
            <?php endif; ?>
            <?php if ( isset($tdl_options['tdl_topbar_contact_title']) ) : ?>
              <h3><?php echo esc_attr($tdl_options['tdl_topbar_contact_title']); ?></h3> 
            <?php endif; ?>
          </div>	          			
		</div>
	<?php endif; ?>

<?php
	}
endif;

// =============================================================================
// Contact Section
// =============================================================================

if ( ! function_exists( 'eva_contact' ) ) :

	function eva_contact() {
	global $tdl_options;
?>

        <?php if ( (isset($tdl_options['tdl_contact_bar'])) && ($tdl_options['tdl_contact_bar'] == "1")) : ?>
        <div class="header-contact">
          <?php if ( (isset($tdl_options['tdl_contact_icon'])) && ($tdl_options['tdl_contact_icon'] == "1") ) : ?>
            <i class="header-contact-icon"></i>
          <?php endif; ?>
          <div class="header-contact-desc">
            <?php if ( isset($tdl_options['tdl_contact_subtitle']) ) : ?>
              <span><?php echo esc_attr($tdl_options['tdl_contact_subtitle']); ?></span>
            <?php endif; ?>
            <?php if ( isset($tdl_options['tdl_contact_title']) ) : ?>
              <h3><?php echo esc_attr($tdl_options['tdl_contact_title']); ?></h3> 
            <?php endif; ?>
          </div>
        </div> 
        <?php endif; ?>

<?php
	}
endif;

// =============================================================================
// Contact Section Mobile
// =============================================================================

if ( ! function_exists( 'eva_contact_mobile' ) ) :

	function eva_contact_mobile() {
	global $tdl_options;
?>

        <?php if ( (isset($tdl_options['tdl_contact_mobile'])) && ($tdl_options['tdl_contact_mobile'] == "1")) : ?>
        <div class="header-contact">
          <?php if ( (isset($tdl_options['tdl_contact_icon'])) && ($tdl_options['tdl_contact_icon'] == "1") ) : ?>
            <i class="header-contact-icon"></i>
          <?php endif; ?>
          <div class="header-contact-desc">
            <?php if ( isset($tdl_options['tdl_contact_subtitle']) ) : ?>
              <span><?php echo esc_attr($tdl_options['tdl_contact_subtitle']); ?></span>
            <?php endif; ?>
            <?php if ( isset($tdl_options['tdl_contact_title']) ) : ?>
              <h3><?php echo esc_attr($tdl_options['tdl_contact_title']); ?></h3> 
            <?php endif; ?>
          </div>
        </div> 
        <?php endif; ?>

<?php
	}
endif;

// =============================================================================
// Social Icons
// =============================================================================

if ( ! function_exists( 'eva_socials' ) ) :

	function eva_socials() {
	global $tdl_options;
?>

<ul class="social-icons">
	<?php if ( (isset($tdl_options['twitter_link'])) && (trim($tdl_options['twitter_link']) != "" ) ) { ?><li class="twitter"><a target="_blank" title="Twitter" href="<?php echo esc_url($tdl_options['twitter_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['facebook_link'])) && (trim($tdl_options['facebook_link']) != "" ) ) { ?><li class="facebook"><a target="_blank" title="Facebook" href="<?php echo esc_url($tdl_options['facebook_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['googleplus_link'])) && (trim($tdl_options['googleplus_link']) != "" ) ) { ?><li class="googleplus"><a target="_blank" title="Google Plus" href="<?php echo esc_url($tdl_options['googleplus_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['pinterest_link'])) && (trim($tdl_options['pinterest_link']) != "" ) ) { ?><li class="pinterest"><a target="_blank" title="Pinterest" href="<?php echo esc_url($tdl_options['pinterest_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['vimeo_link'])) && (trim($tdl_options['vimeo_link']) != "" ) ) { ?><li class="vimeo"><a target="_blank" title="Vimeo" href="<?php echo esc_url($tdl_options['vimeo_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['youtube_link'])) && (trim($tdl_options['youtube_link']) != "" ) ) { ?><li class="youtube"><a target="_blank" title="YouTube" href="<?php echo esc_url($tdl_options['youtube_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['flickr_link'])) && (trim($tdl_options['flickr_link']) != "" ) ) { ?><li class="flickr"><a target="_blank" title="Flickr" href="<?php echo esc_url($tdl_options['flickr_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['skype_link'])) && (trim($tdl_options['skype_link']) != "" ) ) { ?><li class="skype"><a target="_blank" title="Skype" href="<?php echo esc_url($tdl_options['skype_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['behance_link'])) && (trim($tdl_options['behance_link']) != "" ) ) { ?><li class="behance"><a target="_blank" title="Behance" href="<?php echo esc_url($tdl_options['behance_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['dribbble_link'])) && (trim($tdl_options['dribbble_link']) != "" ) ) { ?><li class="dribbble"><a target="_blank" title="Dribbble" href="<?php echo esc_url($tdl_options['dribbble_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['tumblr_link'])) && (trim($tdl_options['tumblr_link']) != "" ) ) { ?><li class="tumblr"><a target="_blank" title="Tumblr" href="<?php echo esc_url($tdl_options['tumblr_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['linkedin_link'])) && (trim($tdl_options['linkedin_link']) != "" ) ) { ?><li class="linkedin"><a target="_blank" title="Linkedin" href="<?php echo esc_url($tdl_options['linkedin_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['github_link'])) && (trim($tdl_options['github_link']) != "" ) ) { ?><li class="github"><a target="_blank" title="Github" href="<?php echo esc_url($tdl_options['github_link']); ?>"></a></li><?php } ?>
  	<?php if ( (isset($tdl_options['vine_link'])) && (trim($tdl_options['vine_link']) != "" ) ) { ?><li class="vine"><a target="_blank" title="Vine" href="<?php echo esc_url($tdl_options['vine_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['instagram_link'])) && (trim($tdl_options['instagram_link']) != "" ) ) { ?><li class="instagram"><a target="_blank" title="Instagram" href="<?php echo esc_url($tdl_options['instagram_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['dropbox_link'])) && (trim($tdl_options['dropbox_link']) != "" ) ) { ?><li class="dropbox"><a target="_blank" title="Dropbox" href="<?php echo esc_url($tdl_options['dropbox_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['rss_link'])) && (trim($tdl_options['rss_link']) != "" ) ) { ?><li class="rss"><a target="_blank" title="RSS" href="<?php echo esc_url($tdl_options['rss_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['stumbleupon_link'])) && (trim($tdl_options['stumbleupon_link']) != "" ) ) { ?><li class="stumbleupon"><a target="_blank" title="Stumbleupon" href="<?php echo esc_url($tdl_options['stumbleupon_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['paypal_link'])) && (trim($tdl_options['paypal_link']) != "" ) ) { ?><li class="paypal"><a target="_blank" title="Paypal" href="<?php echo esc_url($tdl_options['paypal_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['foursquare_link'])) && (trim($tdl_options['foursquare_link']) != "" ) ) { ?><li class="foursquare"><a target="_blank" title="Foursquare" href="<?php echo esc_url($tdl_options['foursquare_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['soundcloud_link'])) && (trim($tdl_options['soundcloud_link']) != "" ) ) { ?><li class="soundcloud"><a target="_blank" title="Soundcloud" href="<?php echo esc_url($tdl_options['soundcloud_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['spotify_link'])) && (trim($tdl_options['spotify_link']) != "" ) ) { ?><li class="spotify"><a target="_blank" title="Spotify" href="<?php echo esc_url($tdl_options['spotify_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['vk_link'])) && (trim($tdl_options['vk_link']) != "" ) ) { ?><li class="vk"><a target="_blank" title="VKontakte" href="<?php echo esc_url($tdl_options['vk_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['android_link'])) && (trim($tdl_options['android_link']) != "" ) ) { ?><li class="android"><a target="_blank" title="Android" href="<?php echo esc_url($tdl_options['android_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['apple_link'])) && (trim($tdl_options['apple_link']) != "" ) ) { ?><li class="apple"><a target="_blank" title="Apple" href="<?php echo esc_url($tdl_options['apple_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['windows_link'])) && (trim($tdl_options['windows_link']) != "" ) ) { ?><li class="windows"><a target="_blank" title="Windows" href="<?php echo esc_url($tdl_options['windows_link']); ?>"></a></li><?php } ?>  
	<?php if ( (isset($tdl_options['telegram_link'])) && (trim($tdl_options['telegram_link']) != "" ) ) { ?><li class="telegram"><a target="_blank" title="Telegram" href="<?php echo esc_url($tdl_options['telegram_link']); ?>"></a></li><?php } ?>
	<?php if ( (isset($tdl_options['whatsapp_link'])) && (trim($tdl_options['whatsapp_link']) != "" ) ) { ?><li class="whatsapp"><a target="_blank" title="WhatsApp" href="<?php echo esc_url($tdl_options['whatsapp_link']); ?>"></a></li><?php } ?>	 	                               
</ul>

<?php
	}
endif;



// =============================================================================
// Instagram feed
// =============================================================================

if ( ! function_exists( 'eva_footer_instagram' ) ) :
	/**
	 * Prints HTML for footer Instagram feeds block.
	 */
	function eva_footer_instagram() {
		global $tdl_options;
		$instagram_name = $tdl_options['tdl_instagram_name'];
		$instaclass = '';		
		

		if (class_exists( 'SB_Instagram_Single' ) || class_exists( 'SB_Instagram_Settings_Pro' )){
			if (class_exists( 'SB_Instagram_Settings_Pro' )){
				$instaclass = 'feed-pro';
			} else {
				$instaclass = 'feed-simple';
			}
		} else {
			return;
		}
	?>

		<div class="footer-instagram-section <?php echo esc_attr( $instaclass ); ?>" data-profile-text="<?php echo esc_html( $tdl_options['tdl_instagram_text'] ); ?>">

		<?php echo do_shortcode('[instagram-feed]'); ?>	
		<?php if ( $tdl_options['tdl_instagram_profile'] ) : ?>
			<p class=clear>
				<a href="<?php echo esc_url( 'https://www.instagram.com/' . $instagram_name ) ?>" class="profile-link" target="_blank" rel="nofollow"><?php echo esc_html( $tdl_options['tdl_instagram_text'] ); ?></a>	
			</p>		
		<?php endif; ?>
		</div>


	<?php

	}
endif;

/*-----------------------------------------------------------------------------------*/
/*  Translation strings
/*-----------------------------------------------------------------------------------*/

$eva_core_translations = array(
    esc_html__( 'Size Guide', 'eva' ),
    esc_html__( 'Size Guides', 'eva' ),
    esc_html__( 'Add new', 'eva' ),
    esc_html__( 'Add new size guide', 'eva' ),
    esc_html__( 'New size guide', 'eva' ),
    esc_html__( 'Edit size guide', 'eva' ),
    esc_html__( 'View size guide', 'eva' ),
    esc_html__( 'All size guides', 'eva' ),
    esc_html__( 'Search size guides', 'eva' ),
    esc_html__( 'No size guides found.', 'eva' ),
    esc_html__( 'No size guides found in trash.', 'eva' ),
    esc_html__( 'barberry_size_guide', 'eva' ),
    esc_html__( 'Size guide to place in your products', 'eva' ),
);

/*-----------------------------------------------------------------------------------*/
/*	Import Settings
/*-----------------------------------------------------------------------------------*/


function eva_merlin_import_files() {
	return [
		[
			'type'                     => 'fashion',
			'import_file_name'         => 'Fashion Demo',
			'categories'               => [],
			'local_import_file'        => get_parent_theme_file_path() . '/includes/demo/fashion/content.xml',
			'local_import_widget_file' => get_parent_theme_file_path() . '/includes/demo/fashion/widgets.json',
			'local_import_rev_slider_file' => get_parent_theme_file_path() . '/includes/demo/fashion/homepage-slider-2.zip',
			'import_preview_image_url' => get_parent_theme_file_uri() . '/includes/demo/fashion/fashion.jpg',
			'import_notice'            => esc_html__( 'Fashion demo import', 'eva' ),
			'local_import_redux'       => [
				[
					'file_path'   => get_parent_theme_file_path() . '/includes/demo/fashion/redux_options.json',
					'option_name' => 'tdl_options',
				],
			],
			'preview_url'              => esc_url( 'https://eva.temashdesign.com/fashion/' ),
		],
	];
}

add_filter( 'merlin_import_files', 'eva_merlin_import_files' );


function eva_import_options_demo( $fields ) {
	if ( empty( $fields ) ) {
		return false;
	}

	$fields = json_decode( $fields, true );

	foreach ( $fields as $key => $value ) {
		update_option( $key, $value, false );
	}

	return true;
}

?>