<?php

// [blog_posts]

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
   "name"			=> esc_html__('Blog Posts', 'eva'),
   "category"		=> esc_html__('Content', 'eva'),
   "description"	=> esc_html__('Display the latest posts in the blog', 'eva'),
   "base"			=> "blog_posts_mixed",
   "class"			=> "",
   "icon"			=> "blog_posts_mixed",

   
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
			"type" 			=> "textfield",
			"holder" 		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading" 		=> esc_html__('Number of Posts', 'eva'),
			"param_name" 	=> "posts",
			"value" 		=> "9",
			"description" 	=> esc_html__('Number of posts to be displayed in the slider.', 'eva'),
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