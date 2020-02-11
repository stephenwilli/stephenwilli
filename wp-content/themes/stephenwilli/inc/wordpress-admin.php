<?php

add_action('init', function() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', ['page', 'post']);
    add_theme_support('automatic-feed-links');
    add_theme_support( 'html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );
});

// ADD LOGO TO LOGIN PAGE
add_action('login_head', 'tmbr_login_head');

function tmbr_login_head() {
	echo "
	<style>
		body.login #login h1 a {
			background: url('".get_bloginfo('template_url')."/assets/images/login-logo.svg') no-repeat scroll center top transparent;
			background-size: contain;
			height: 150px;
			width: 300px;
			margin: 0 auto;
		}
	</style>
	";
}

// add ie conditional html5 shim to header
function add_ie_html5_shim () {
	echo '<!--[if lt IE 9]>';
	echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
	echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');


// SVG UPLOADS
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// EXCERPT LENGTH
add_filter('excerpt_length', function($length) {
    return 30;
});

// HIDE ADMIN BAR
add_filter('show_admin_bar', '__return_false');


add_action('wp_footer', function() {
    if (WP_DEBUG === false) return;
    echo PHP_EOL.'<!-- '.get_num_queries().' queries | '.timer_stop(0) . ' seconds | version '.$GLOBALS['wp_version'].' -->'.PHP_EOL;
}, 100);

add_action('login_head', function() {
    echo '<link rel="stylesheet" href="'.build_url('admin.css').'">'.PHP_EOL;
});

add_filter('login_headerurl', function() {
    return get_bloginfo('url');
});

// remove unnecessary queries
add_action('widgets_init', function() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
});

// remove unnecessary header junk
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


add_action('wp_print_scripts', function() {
    wp_deregister_script('autosave');
});

add_filter('admin_footer_text', function() {
    echo get_bloginfo('name');
});

// REMOVE DASHBOARD WIDGETS
add_action('admin_init', function() {
    remove_meta_box('dashboard_right_now',   'dashboard', 'normal');
    remove_meta_box('dashboard_activity',    'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary',     'dashboard', 'side');
    remove_meta_box('commentsdiv',           'page', 'normal');
    remove_meta_box('commentstatusdiv',      'page', 'normal');
    remove_meta_box('postcustom',            'page', 'normal');
    remove_meta_box('postcustom',            'post', 'normal');
});

// TINY MCE CUSTOMIZATION
add_filter('tiny_mce_before_init', function($init) {

    $init['wordpress_adv_hidden'] = false;
    $init['toolbar1'] = 'bold,italic,bullist,numlist,blockquote,hr,link,unlink,spellchecker,pastetext,removeformat,charmap,undo,redo';
    $init['toolbar2'] = 'formatselect,styleselect';
    $init['block_formats'] = 'Paragraph=p;h2=h2;h3=h3';

    $init['style_formats'] = json_encode(array(
        array('title' => 'Lead',           'selector' => 'p', 'classes' => 'lead'),
        array('title' => 'Call-to-Action', 'selector' => 'a', 'classes' => 'cta-link'),
        array('title' => 'Button',         'selector' => 'a', 'classes' => 'btn'),
        array('title' => 'Footnote',       'selector' => 'p', 'classes' => 'footnote')
    ));

    return $init;
});


