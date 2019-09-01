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
    'page_title' 	=> 'Navigation',
    'menu_title'	=> 'Navigation',
    'parent_slug'	=> 'site-settings',
    'capability'	=> 'manage_options'
  ));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-settings',
		'capability'	=> 'manage_options'
	));
  
  acf_add_options_page(array(
    'page_title' 	=> 'Kitchen Menus',
    'menu_title'	=> 'Kitchen Menus',
    'menu_slug' 	=> 'kitchen-menus',
    'capability'	=> 'edit_posts',
    'icon_url'		=> 'dashicons-carrot',
    'redirect'		=> true,
    'position' => 3
  ));


}