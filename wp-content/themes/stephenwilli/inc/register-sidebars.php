<?php

// Registers Sidebars
// http://codex.wordpress.org/Function_Reference/register_sidebars

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id'   => 'page_sidebar',
		'description'   => 'Add widgets to the Page Sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
}

if (function_exists('register_sidebars')) {
	register_sidebars(4, array(
		'name'=>'Footer %d',
		'before_title'  => '<h5 class="list-title">',
		'after_title'   => '</h5>'
	));
}