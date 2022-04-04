<?php


function eva_theme_register_required_plugins() {

  $plugins = array(
        'woocommerce' => array(
        'name'               => 'WooCommerce',
        'slug'               => 'woocommerce',
        'required'           => true,
        'description'        => 'The eCommerce engine of your WordPress site.',
        'demo_required'      => true
        ),

        'redux-framework'=> array(
            'name'               => 'Redux Framework',
            'slug'               => 'redux-framework',
            'required'           => true,
            'description'        => 'Build better sites in WordPress fast!',
            'demo_required'      => true
          ),

        'tdl-extensions' => array(
            'name'               => 'Eva Theme Extensions',
            'slug'               => 'tdl-extensions',
            'source'             => 'https://temash.design/tdplugins/eva/1.9.9.5/tdl-extensions.zip',
            'required'           => true,
            'external_url'       => '',
            'description'        => 'Extends the functionality of with theme-specific features.',
            'demo_required'      => true,
            'version'            => '2.1'
        ),

        'js_composer' => array(
          'name'               => 'WPBakery Page Builder',
          'slug'               => 'js_composer',
          'source'             => 'https://temash.design/tdplugins/eva/1.9.9.5/js_composer.zip',
          'required'           => true,
          'external_url'       => '',
          'description'        => 'The page builder plugin coming with the theme.',
          'demo_required'      => true,
          'version'            => '6.7.0'
        ),
        'revslider' => array(
          'name'               => 'Slider Revolution',
          'slug'               => 'revslider',
          'source'             => 'https://temash.design/tdplugins/eva/1.9.9.5/revslider.zip',
          'required'           => false,
          'external_url'       => '',
          'description'        => 'Slider Revolution - Premium responsive slider',
          'demo_required'      => true,
          'version'            => '6.5.8'
        ),  

        'woo-search-box' => array(
            'name'               => 'WooCommerce Search Engine',
            'slug'               => 'woo-search-box',
            'source'             => 'https://temash.design/tdplugins/eva/1.9.9.6/woo-search-box.zip',
            'required'           => true,
            'external_url'       => '',
            'description'        => 'Ultimate WordPress plugin which turns a simple search box of your WooCommerce Store to the smart, powerful and multifunctional magic box that helps you to sell more products.',
            'demo_required'      => true,
            'version'            => '2.2.5'
          ),

        'advanced-custom-fields'=> array(
            'name'               => 'Advanced Custom Fields',
            'slug'               => 'advanced-custom-fields',
            'required'           => true,
            'description'        => 'Customize WordPress with powerful, professional and intuitive fields.',
            'demo_required'      => true      
        ), 

        'breadcrumb-navxt'=> array(
            'name'               => 'Breadcrumb NavXT',
            'slug'               => 'breadcrumb-navxt',
            'required'           => true,
            'description'        => 'Adds a breadcrumb navigation showing the visitors path to their current location.',
            'demo_required'      => true      
        ),

        'yith-woocommerce-wishlist'=> array(
          'name'               => 'YITH WooCommerce Wishlist',
          'slug'               => 'yith-woocommerce-wishlist',
          'required'           => false,
          'description'        => 'YITH WooCommerce Wishlist gives your users the possibility to create, fill, manage and share their wishlists allowing you to analyze their interests and needs to improve your marketing strategies.',
          'demo_required'      => false
        ), 
        'contact-form-7'=> array(
          'name'               => 'Contact Form 7',
          'slug'               => 'contact-form-7',
          'required'           => false,
          'description'        => 'Just another contact form plugin. Simple but flexible.',
          'demo_required'      => false
        ),  
        
        'instagram-feed'=> array(
            'name'               => 'Smash Balloon Instagram Feed',
            'slug'               => 'instagram-feed',
            'required'           => false,
            'description'        => 'Display beautifully clean, customizable, and responsive Instagram feeds.',
            'demo_required'      => false      
        ),

        'envato-market'        => array(
          'name'               => 'Envato Market',
          'slug'               => 'envato-market',
          'required'           => false,
          'demo_required'      => false,
          'source'             => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
          'description'        => 'Enables updates for all your Envato purchases.',
        ),

        'safe-svg'=> array(
          'name'               => 'Safe SVG',
          'slug'               => 'safe-svg',
          'required'           => false,
          'description'        => 'Allows SVG uploads into WordPress and sanitizes the SVG before saving it',
          'demo_required'      => true
        ),
      );

  $config = array(
    'id'               => 'eva',
    'default_path'      => '',
    'parent_slug'       => 'themes.php',
    'menu'              => 'tgmpa-install-plugins',
    'has_notices'       => false,
    'is_automatic'      => true,
  );

  tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'eva_theme_register_required_plugins' );


