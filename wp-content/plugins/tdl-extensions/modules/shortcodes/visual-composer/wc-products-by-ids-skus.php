<?php

// [products_mixed]

/* All products dropdown */
function products_settings_field($settings, $value) {   
    $attr = array("post_type"=>"product", "orderby"=>"name", "order"=>"asc", 'posts_per_page'   => -1);
    $categories = get_posts($attr); 
    $data = '<input type="text" value="'.$value.'" name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select vc_custom_select_custom_val '.$settings['param_name'].' '.$settings['type'].'" id="vc_custom_select_custom_prod">';
    $data .= '<div class="vc_custom_select_custom_wrapper"><ul class="vc_custom_select_custom_vals">';
    $insterted_vals = explode(',', $value);
    foreach($categories as $val) {
        if( in_array($val->ID, $insterted_vals) ) {
          $data .= '<li data-val="'.$val->ID.'">'.$val->post_title.'<button>×</button></li>';
        }
    }
    $data .= '</ul>'; 
    $data .= '<ul class="vc_custom_select_custom">';
    foreach($categories as $val) {
        $selected = '';
        if( in_array($val->ID, $insterted_vals) ) {
          $selected = ' class="selected"';
        }
        $data .= '<li' . $selected . ' data-val="'.$val->ID.'">'.$val->post_title.'</li>';
    }
    $data .= '</ul></div>';
    return $data;
}
vc_add_shortcode_param('products' , 'products_settings_field', get_template_directory_uri() . '/js/wp-admin-visual-composer.js');

vc_map(array(
   "name" 			=> esc_html__('Multiple / Specific Products', 'eva'),
   "category" 		=> 'WooCommerce',
   "description"	=> "",
   "base" 			=> "products_mixed",
   "class" 			=> "",
   "icon" 			=> "products_mixed",
   
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
			"type" 			=> "products",
			"holder" 		=> "div",
			"heading" 		=> "Products",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"param_name" 	=> "ids",
			"description" 	=> esc_html__("Select the products you'd like to display.", "eva"),
		),
		
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> esc_html__('Columns', 'eva'),
			"description"	=> "",
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
		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Order By",
			"description"	=> "",
			"param_name"	=> "orderby",
			"value"			=> array(
				__( 'Date', 'js_composer' ) => 'date',
				__( 'ID', 'js_composer' ) => 'ID',
				__( 'Author', 'js_composer' ) => 'author',
				__( 'Title', 'js_composer' ) => 'title',
				__( 'Modified', 'js_composer' ) => 'modified',
				__( 'Random', 'js_composer' ) => 'rand',
				__( 'Comment count', 'js_composer' ) => 'comment_count',
				__( 'Menu order', 'js_composer' ) => 'menu_order',
			),
		),
		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Order",
			"description"	=> "",
			"param_name"	=> "order",
			"value"			=> array(
				__( 'Descending', 'js_composer' ) => 'DESC',
				__( 'Ascending', 'js_composer' ) => 'ASC',
			),
		),
   )
   
));