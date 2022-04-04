<?php

// [best_selling_products_mixed]

vc_map(array(
   "name" 			=> esc_html__('Best Selling Products', 'eva'),
   "category" 		=> 'WooCommerce',
   "description"	=> "",
   "base" 			=> "best_selling_products_mixed",
   "class" 			=> "",
   "icon" 			=> "best_selling_products_mixed",
   
   "params" 	=> array(

		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Title', 'eva'),
			"description"	=> "",
			"param_name"	=> "title",
		),
      
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Number of Products', 'eva'),
			"param_name"	=> "per_page",
			"value"			=> "4",
		),
		
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Columns', 'eva'),
			"param_name"	=> "columns",
			"value"			=> "4",
		),
		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Layout Style', 'eva'),
			"param_name"	=> "layout",
			"value"			=> array(
				"Listing"	=> "listing",
				"Slider"	=> "slider"
			),
		),
   )
   
));