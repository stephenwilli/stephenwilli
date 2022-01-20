<?php

// Theme Setup & Support
// http://codex.wordpress.org/Function_Reference/add_theme_support

function inversion_setup() {

	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}

add_action('after_setup_theme', 'inversion_setup');


/*  Excerpt ending
/* ------------------------------------ */
function inversion_excerpt_more( $more ) {
    return '&#46;&#46;&#46;';
}
add_filter( 'excerpt_more', 'inversion_excerpt_more' );


// ADD inversion LOGO TO LOGIN PAGE
add_action('login_head', 'inversion_login_head');

function inversion_login_head() {
	echo "
	<style>
		body.login #login h1 a {
			background: url('".get_bloginfo('template_url')."/assets/images/swp-01.svg') no-repeat scroll center top transparent;
			background-size: contain;
			height: 150px;
			width: 300px;
			margin: 0 auto;
		}
	</style>
	";
}

// add ie conditional html5 shim to header
// http://css-tricks.com/snippets/wordpress/html5-shim-in-functions-php/
function add_ie_html5_shim () {
	echo '<!--[if lt IE 9]>';
	echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
	echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');
