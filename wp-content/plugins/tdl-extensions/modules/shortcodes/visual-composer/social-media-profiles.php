<?php

// [social-media]

vc_map(array(
   "name"						=> esc_html__('Social Media Profiles', 'eva'),
   "category"					=> esc_html__('Social', 'eva'),
   "description"				=> esc_html__('Links to your social media profiles', 'eva'),
   "base"						=> "social-media",
   "class"						=> "",
   "icon"						=> "social-media",
   
   "params" 	=> array(

		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Align', 'eva'),
			"param_name"	=> "items_align",
			"value"			=> array(
				"Left"		=> "left",
				"Center"	=> "center",
				"Right"		=> "right"
			)
		),

		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Font Size (px, em)', 'eva'),
			"param_name"	=> "font_size",
		),

		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Color', 'eva'),
			"param_name"	=> "color",
		),
		
   )
   
));