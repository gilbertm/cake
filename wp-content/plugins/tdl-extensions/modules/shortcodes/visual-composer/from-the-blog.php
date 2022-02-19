<?php

// [from_the_blog]

$args = array(
	'type'                     => 'post',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false
);

$categories = get_categories($args);

$output_categories = array();

$output_categories["All"] = "";

foreach($categories as $category) { 
	$output_categories[htmlspecialchars_decode($category->name)] = $category->slug;
}

vc_map(array(
   "name"			=> esc_html__('Posts Slider', 'eva'),
   "category"		=> esc_html__('Content', 'eva'),
   "description"	=> esc_html__('Display the latest posts in the blog', 'eva'),
   "base"			=> "from_the_blog",
   "class"			=> "",
   "icon"			=> "from_the_blog",

   
   "params" 	=> array(
      
		array(
			"type" 			=> "textfield",
			"holder" 		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading" 		=> esc_html__('Number of Posts', 'eva'),
			"param_name" 	=> "posts",
			"value" 		=> "",
			"description" 	=> esc_html__('Number of posts to be displayed in the slider.', 'eva')
		),
		
		array(
			"type" 			=> "dropdown",
			"holder" 		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading" 		=> esc_html__('Category', 'eva'),
			"param_name" 	=> "category",
			"value" 		=> $output_categories
		),
   )
   
));