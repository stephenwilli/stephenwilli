<?php
// http://codex.wordpress.org/Function_Reference/register_post_type

add_action( 'init', 'create_post_type' );

	function create_post_type() {

	register_post_type( 'photos',
			array (	'label' => 'Photos',
				'description' => 'Photos',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'has_archive' => true,
				'rewrite' => true,
				'query_var' => true,
				'supports' => array('title','editor','thumbnail','page-attributes'),
				'taxonomies' => array(),
				'menu_icon' => 'dashicons-format-gallery',
				'menu_position' 		=>4,

				'labels' =>
					array (
  					'name' => 'Photos', 
  					'singular_name' => 'Photo',
						'menu_name' => 'Photos', 
						'add_new' => 'Add Photo', 
						'add_new_item' => 'Add New Photo',
						'edit' => 'Edit',
						'edit_item' => 'Edit Photo',
						'new_item' => 'New Photo',
						'view_item' => 'View Photo',
						'search_items' => 'Search Photos',
						'not_found' => 'No Photos Found',
						'not_found_in_trash' => 'No Photos Found in Trash'
						),
			)
	);


	register_post_type( 'projects',
			array (	'label' => 'Projects',
				'description' => 'Projects',
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'has_archive' => true,
				'rewrite' => true,
				'query_var' => true,
				'supports' => array('title','editor','thumbnail','page-attributes'),
				'taxonomies' => array(),
				'menu_icon' => 'dashicons-format-gallery',
				'menu_position' 		=>4,

				'labels' =>
					array (
  					'name' => 'Projects', 
  					'singular_name' => 'Project',
						'menu_name' => 'Projects', 
						'add_new' => 'Add Project', 
						'add_new_item' => 'Add New Project',
						'edit' => 'Edit',
						'edit_item' => 'Edit Project',
						'new_item' => 'New Project',
						'view_item' => 'View Project',
						'search_items' => 'Search Projects',
						'not_found' => 'No Projects Found',
						'not_found_in_trash' => 'No Projects Found in Trash'
						),
			)
	);
}