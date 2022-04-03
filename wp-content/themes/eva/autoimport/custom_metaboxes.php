<?php
if(function_exists("register_field_group")) {

	/* Woo Categories / Tags Settings */

	register_field_group(array (
		'id' => 'acf_products-categories',
		'title' => 'Products categories',
		'fields' => array (


			array (
				'key' => 'field_prodcat_img_header',
				'label' => esc_html__('Image Header', 'eva'),
				'name' => 'tdl_prodcat_image_header',
				'type' => 'image',
				'instructions' => esc_html__('Specify the image you want to display at the top of current category page.', 'eva'),
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),

			array (
				'key' => 'field_prodcat_header_height',
				'label' => esc_html__('Page Header height (px)', 'eva'),
				'name' => 'tdl_prodcat_header_height',
				'type' => 'number',
				'instructions' => esc_html__("How tall do you want your header? Don't include 'px' in the string. e.g. 450", 'eva'),
				// 'default_value' => '400',
			),
	

			array (
				'key' => 'field_prodcat_header_bgchange',
				'label' => esc_html__('Header Transparency', 'eva'),
				'name' => 'tdl_prodcat_bg_change',
				'type' => 'select',
				'instructions' => esc_html__('Select the content color for Header.', 'eva'),
				'choices' => array (
					'' => esc_html__('Inherit', 'eva'),
					'background--light' => esc_html__('Light', 'eva'),
					'background--dark' => esc_html__('Dark', 'eva'),
					// 'background--auto' => esc_html__('Automatic check background', 'eva'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),								


		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'product_cat',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	/* Attributes */



	/* Product */
	register_field_group(array (
		'id' => 'acf_sidebar',
		'title' => esc_html__('Product Settings', 'eva'),
		'fields' => array (

			array (
				'key' => 'field_prod_layout',
				'label' => esc_html__('Product layout', 'eva'),
				'name' => 'tdl_prod_layout',
				'type' => 'select',
				'instructions' => esc_html__('Select product page layout.', 'eva'),
				'choices' => array (
					'inherit' => esc_html__('Inherit', 'eva'),
					'default' => esc_html__('Default', 'eva'),
					'images_scroll' => esc_html__('Images Scroll', 'eva'),
				),
				'default_value' => 'inherit',
				'allow_null' => 0,
				'multiple' => 0,
			),

			array (
				'key' => 'field_prod_layout_bg',
				'label' => esc_html__('Product Layout Background', 'eva'),
				'name' => 'tdl_prod_layout_bg',
				'type' => 'select',
				// 'instructions' => esc_html__('Select product page layout.', 'eva'),
				'choices' => array (
					'inherit' => esc_html__('Inherit', 'eva'),
					'custom' => esc_html__('Custom', 'eva'),
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_prod_layout',
							'operator' => '==',
							'value' => 'images_scroll',
						),
					),
					'allorany' => 'all',
				),

				'default_value' => 'inherit',
				'allow_null' => 0,
				'multiple' => 0,
			),			

			array (
				'key' => 'field_prod_layout_color',
				'label' => 'Product Background Color',
				'name' => 'tdl_prod_layout_color',
				'type' => 'color_picker',
				'instructions' => 'Specify the product background color',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_prod_layout_bg',
							'operator' => '==',
							'value' => 'custom',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#ffffff',
			),

			// array (
			// 	'key' => 'field_prod_layout_img',
			// 	'label' => esc_html__('Image Background', 'eva'),
			// 	'name' => 'tdl_prod_layout_img',
			// 	'type' => 'image',
			// 	'instructions' => esc_html__('Specify the background image.', 'woodstock'),
			// 	'conditional_logic' => array (
			// 		'status' => 1,
			// 		'rules' => array (
			// 			array (
			// 				'field' => 'field_prod_layout_bg',
			// 				'operator' => '==',
			// 				'value' => 'custom',
			// 			),
			// 		),
			// 		'allorany' => 'all',
			// 	),
			// 	'save_format' => 'object',
			// 	'preview_size' => 'thumbnail',
			// 	'library' => 'all',
			// ),	

			// array (
			// 	'key' => 'field_prod_layout_bg_repeat',
			// 	'label' => esc_html__('Background Repeat', 'eva'),
			// 	'name' => 'tdl_prod_layout_bg_repeat',
			// 	'type' => 'select',
			// 	'instructions' => esc_html__('Specify the background image repeat', 'eva'),
			// 	'choices' => array (
			// 		'no-repeat' => esc_html__('No Repeat', 'eva'),
			// 		'repeat' => esc_html__('Repeat All', 'eva'),
			// 		'repeat-x' => esc_html__('Repeat Horizontally', 'eva'),
			// 		'repeat-y' => esc_html__('Repeat Vertically', 'eva'),
			// 		'inherit' => esc_html__('Inherit', 'eva'),
			// 	),				
			// 	'conditional_logic' => array (
			// 		'status' => 1,
			// 		'rules' => array (
			// 			array (
			// 				'field' => 'field_prod_layout_bg',
			// 				'operator' => '==',
			// 				'value' => 'custom',
			// 			),
			// 		),
			// 		'allorany' => 'all',
			// 	),
			// 	'save_format' => 'object',
			// 	'preview_size' => 'thumbnail',
			// 	'library' => 'all',
			// 	'default_value' => 'no-repeat',
			// ),

			// array (
			// 	'key' => 'field_prod_layout_bg_size',
			// 	'label' => esc_html__('Background Size', 'eva'),
			// 	'name' => 'tdl_prod_layout_bg_size',
			// 	'type' => 'select',
			// 	'instructions' => esc_html__('Specify the background image size', 'eva'),
			// 	'choices' => array (
			// 		'inherit' => esc_html__('Inherit', 'eva'),
			// 		'cover' => esc_html__('Cover', 'eva'),
			// 		'contain' => esc_html__('Contain', 'eva'),
			// 	),				
			// 	'conditional_logic' => array (
			// 		'status' => 1,
			// 		'rules' => array (
			// 			array (
			// 				'field' => 'field_prod_layout_bg',
			// 				'operator' => '==',
			// 				'value' => 'custom',
			// 			),
			// 		),
			// 		'allorany' => 'all',
			// 	),
			// 	'save_format' => 'object',
			// 	'preview_size' => 'thumbnail',
			// 	'library' => 'all',
			// 	'default_value' => 'inherit',
			// ),

			// array (
			// 	'key' => 'field_prod_layout_bg_attachment',
			// 	'label' => esc_html__('Background Attachment', 'eva'),
			// 	'name' => 'tdl_prod_layout_bg_attachment',
			// 	'type' => 'select',
			// 	'instructions' => esc_html__('Specify the background image attachment', 'eva'),
			// 	'choices' => array (
			// 		'fixed' => esc_html__('Fixed', 'eva'),
			// 		'scroll' => esc_html__('Scroll', 'eva'),
			// 		'contain' => esc_html__('Contain', 'eva'),
			// 	),				
			// 	'conditional_logic' => array (
			// 		'status' => 1,
			// 		'rules' => array (
			// 			array (
			// 				'field' => 'field_prod_layout_bg',
			// 				'operator' => '==',
			// 				'value' => 'custom',
			// 			),
			// 		),
			// 		'allorany' => 'all',
			// 	),
			// 	'save_format' => 'object',
			// 	'preview_size' => 'thumbnail',
			// 	'library' => 'all',
			// 	'default_value' => 'contain',
			// ),

			// array (
			// 	'key' => 'field_prod_layout_bg_position',
			// 	'label' => esc_html__('Background Position', 'eva'),
			// 	'name' => 'tdl_prod_layout_bg_position',
			// 	'type' => 'select',
			// 	'instructions' => esc_html__('Specify the background image position', 'eva'),
			// 	'choices' => array (
			// 		'left-top' => esc_html__('Left Top', 'eva'),
			// 		'left-center' => esc_html__('Left Center', 'eva'),
			// 		'left-bottom' => esc_html__('Left Bottom', 'eva'),
			// 		'center-top' => esc_html__('Center Top', 'eva'),
			// 		'center-center' => esc_html__('Center Center', 'eva'),
			// 		'center-bottom' => esc_html__('Center Bottom', 'eva'),
			// 		'right-top' => esc_html__('Right Top', 'eva'),
			// 		'right-center' => esc_html__('Right Center', 'eva'),
			// 		'right-bottom' => esc_html__('Right Bottom', 'eva'),
			// 	),				
			// 	'conditional_logic' => array (
			// 		'status' => 1,
			// 		'rules' => array (
			// 			array (
			// 				'field' => 'field_prod_layout_bg',
			// 				'operator' => '==',
			// 				'value' => 'custom',
			// 			),
			// 		),
			// 		'allorany' => 'all',
			// 	),
			// 	'save_format' => 'object',
			// 	'preview_size' => 'thumbnail',
			// 	'library' => 'all',
			// 	'default_value' => 'contain',
			// ),



			array (
				'key' => 'field_product_video',
				'label' => esc_html__('Video Embed Code', 'eva'),
				'name' => 'tdl_video_review',
				'type' => 'text',
				'instructions' => esc_html__('Enter the direct URL to a YouTube or Vimeo video page.', 'eva'),
			),			

			array (
				'key' => 'field_qickview_color',
				'label' => esc_html__('Quick View button color', 'eva'),
				'name' => 'tdl_qickview_color',
				'type' => 'select',
				'instructions' => esc_html__('Select color for Quick View button', 'eva'),
				'choices' => array (
					'background--light' => esc_html__('Light', 'eva'),
					'background--dark' => esc_html__('Dark', 'eva'),
					// 'background--auto' => esc_html__('Automatic check background', 'eva'),
				),
				'default_value' => 'background--light',
				'allow_null' => 0,
				'multiple' => 0,
			),

		),
		'location' => array (

			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 6,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));


	/* Page Settings */
	register_field_group(array (
		'id' => 'acf_page-settings',
		'title' => 'Page Settings',
		'fields' => array (

			array (
				'key' => 'field_page_header_title',
				'label' => esc_html__('Show Title Area', 'eva'),
				'name' => 'tdl_hide_title',
				'type' => 'true_false',
				'instructions' => esc_html__('Check this if you want to show/hide page title area.', 'eva'),
				'message' => esc_html__('Show Title Area', 'eva'),
				'default_value' => 1,
			),		

			array (
				'key' => 'field_page_title',
				'label' => esc_html__('Page SubTitle', 'eva'),
				'name' => 'tdl_subtitle',
				'type' => 'text',
				'instructions' => esc_html__('Enter page subtitle.', 'eva'),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_page_header_title',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
			),

			array (
				'key' => 'field_page_header_height',
				'label' => esc_html__('Page Header height (px)', 'eva'),
				'name' => 'tdl_header_height',
				'type' => 'number',
				'instructions' => esc_html__("How tall do you want your header? Don't include 'px' in the string. e.g. 450", 'eva'),
				// 'default_value' => '400',
			),

			// array (
			// 	'key' => 'field_page_header_bgchange',
			// 	'label' => esc_html__('Automatic Header Content color switcher', 'eva'),
			// 	'name' => 'tdl_bg_change',
			// 	'type' => 'true_false',
			// 	'instructions' => esc_html__('Check this if you want to automatically switch to a darker or a lighter header content depending on the brightness of background header images behind it. (Required page featured image)', 'eva'),
			// 	'message' => esc_html__('Automatic Header Content color switcher', 'eva'),
			// 	'default_value' => 0,
			// ),

			array (
				'key' => 'field_page_header_bgchange',
				'label' => esc_html__('Header Transparency', 'eva'),
				'name' => 'tdl_bg_change',
				'type' => 'select',
				'instructions' => esc_html__('Select the content color for Header.', 'eva'),
				'choices' => array (
					'' => esc_html__('Inherit', 'eva'),
					'background--light' => esc_html__('Light', 'eva'),
					'background--dark' => esc_html__('Dark', 'eva'),
					// 'background--auto' => esc_html__('Automatic check background', 'eva'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),

			array (
				'key' => 'field_bottom_padding',
				'label' => esc_html__('Disable Bottom Padding', 'eva'),
				'name' => 'tdl_bottom_padding',
				'type' => 'true_false',
				'message' => esc_html__('Check to Disable Bottom Padding', 'eva'),
				'default_value' => 0,
			),	

			array (
				'key' => 'field_instagram',
				'label' => 'Hide Instagram Feed',
				'name' => 'tdl_hide_instagram',
				'type' => 'true_false',
				'instructions' => 'Check this if you want to hide instagram feed for this page.',
				'message' => 'Hide Instagram Feed',
				'default_value' => 0,
			),	

		),

		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'default',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-right-sidebar.php',
					'order_no' => 0,
					'group_no' => 2,
				),
			),	
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-left-sidebar.php',
					'order_no' => 0,
					'group_no' => 3,
				),
			),	
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-full-width.php',
					'order_no' => 0,
					'group_no' => 4,
				),
			),	
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-narrow.php',
					'order_no' => 0,
					'group_no' => 5,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));


	/* Post Type: Link */
	register_field_group(array (
		'id' => 'acf_post-type-link',
		'title' => esc_html__('Post Type: Link', 'eva'),
		'fields' => array (
			array (
				'key' => 'field_52613356beee6',
				'label' => esc_html__('Link URL', 'eva'),
				'name' => 'tdl_link_url',
				'type' => 'text',
				'instructions' => esc_html__('Specify the URL to replace post title permalink.', 'eva'),
				'default_value' => '',
				'placeholder' => esc_html__('URL', 'eva'),
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'link',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	/* Post Type: Quote */
	register_field_group(array (
		'id' => 'acf_post-type-quote',
		'title' => esc_html__('Post Type: Quote', 'eva'),
		'fields' => array (
			array (
				'key' => 'field_526135682f07d',
				'label' => esc_html__('Quote Text', 'eva'),
				'name' => 'tdl_quote_text',
				'type' => 'textarea',
				'instructions' => esc_html__('Specify the quote text.', 'eva'),
				'default_value' => '',
				'placeholder' => esc_html__('Quote text', 'eva'),
				'maxlength' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_526135822f07e',
				'label' => esc_html__('Quote Author', 'eva'),
				'name' => 'tdl_quote_author',
				'type' => 'text',
				'instructions' => esc_html__('Specify the quote author.', 'eva'),
				'default_value' => '',
				'placeholder' => esc_html__('Quote author', 'eva'),
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'quote',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));


}
