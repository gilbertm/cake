<?php
	
vc_map(array(
   
   "name"			=> esc_html__('Title', 'eva'),
   "category"		=> 'Content',
   "description"	=> esc_html__('Place Title', 'eva'),
   "base"			=> "title",
   "class"			=> "",
   "icon"			=> "title",

   
   "params" 	=> array(
      
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Title', 'eva'),
			"param_name"	=> "text",
			"value"			=> "Title",
		),

		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Tag', 'eva'),
			"param_name"	=> "tag",
			"value"			=> array(
				"H1"		=> "h1",
				"H2"		=> "h2",
				"H3"		=> "h3",
				"H4"		=> "h4",
				"H5"		=> "h5",
				"H6"		=> "h6",
			),
		),

		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Font Family', 'eva'),
			"param_name"	=> "font",
			"value"			=> array(
				"Main Font"			=> "main_font",
				"Secondary Font"	=> "secondary_font"
			),
		),

		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Font Size (px, em)', 'eva'),
			"param_name"	=> "font_size",
			"value"			=> "",
		),

		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Line Height (px, em)', 'eva'),
			"param_name"	=> "line_height",
			"value"			=> "",
		),

		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Color', 'eva'),
			"param_name"	=> "color",
			"value"			=> "",
		),

		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Text Align', 'eva'),
			"param_name"	=> "text_align",
			"value"			=> array(
				"Left"		=> "left",
				"Center"	=> "center",
				"Right"		=> "right",
			),
		),

		array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'eva'),
            'param_name' => 'css',
            'group' => "Design Options",
        ),

        array(
			"type" => "textfield",
			"heading" => esc_html__('Extra Class Name', 'eva'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eva'),
		)

   )
   
));