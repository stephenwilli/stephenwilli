<?php
// http://codex.wordpress.org/Function_Reference/register_post_type

add_action( 'init', 'create_post_type' );

	function create_post_type() {

	register_post_type( 'products',
			array (	'label' => 'Products',
				'description' => 'Products',
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
				'menu_icon' => 'dashicons-shield-alt',
				'menu_position' 		=>4,

				'labels' =>
					array (
  					'name' => 'Products', 
  					'singular_name' => 'Product',
						'menu_name' => 'Products', 
						'add_new' => 'Add Product', 
						'add_new_item' => 'Add New Product',
						'edit' => 'Edit',
						'edit_item' => 'Edit Product',
						'new_item' => 'New Product',
						'view_item' => 'View Product',
						'search_items' => 'Search Products',
						'not_found' => 'No Products Found',
						'not_found_in_trash' => 'No Products Found in Trash'
						),
			)
	);
}