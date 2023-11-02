<?php 
if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'edit_posts',
		'icon_url'		=> 'dashicons-admin-generic',
		'redirect'		=> false,
    'position' => 3
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-settings',
		'capability'	=> 'manage_options'
	));

}