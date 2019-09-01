<?php

add_action('init', function() {
    add_theme_support('title-tag');
    // add_theme_support('post-thumbnails', ['page', 'post']);
    // add_post_type_support('page', ['excerpt']);
    // set_post_thumbnail_size($width, $height, true);
    // add_image_size($name, $width, $height, true);
});

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_action('template_redirect', function() {

    global $post;
    $redirect_to = null;

    if (is_attachment()) {
        $redirect_to = home_url();
    }

    if ($redirect_to !== null) {
        wp_redirect($redirect_to, 301);
        exit();
    }
});

add_filter('excerpt_length', function($length) {
    return 30;
});

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




// uncomment to force updates
// wp_maybe_auto_update();

if (!is_admin()) return;


add_action('init', function() {

    // TODO: split these admin assets up? build/admin/main.css, build/admin/editor.css, build/admin/login.css?
    // wp_enqueue_script('admin', build_url('admin.js'), ['wp-blocks', 'wp-editor'], null, true);
    // wp_enqueue_style('admin', build_url('admin.css'));
    // add_editor_style(build_url('admin.css'));
    // add_theme_support('editor-styles');
    // add_theme_support('editor-color-palette');
    // add_theme_support('disable-custom-colors');

    // hide specified taxonomies
    global $wp_taxonomies;
    $taxonomies = defined('ADMIN_HIDE_TAXONOMIES') ? ADMIN_HIDE_TAXONOMIES : [];
    foreach ($taxonomies as $key) if (taxonomy_exists($key)) unset($wp_taxonomies[$key]);

    // hide specified WYSIWYG editors
    $id = isset($_GET['post']) ? $_GET['post'] : null ;
    if ($id && defined('ADMIN_HIDE_EDITORS') && in_array($id, ADMIN_HIDE_EDITORS)) remove_post_type_support('page', 'editor');

    // add an ID column to all admin tables
    function pid_column($cols) {
        $cols['pid'] = 'ID';
        return $cols;
    }

    function pid_value($column, $id) {
        if ($column == 'pid') echo $id;
    }

    function pid_return_value($value, $column, $id) {
        if ($column == 'pid') $value = $id;
        return $value;
    }

    add_filter('manage_posts_columns',       'pid_column');
    add_action('manage_posts_custom_column', 'pid_value', 10, 2);
    add_filter('manage_pages_columns',       'pid_column');
    add_action('manage_pages_custom_column', 'pid_value', 10, 2);
    add_filter('manage_media_columns',       'pid_column');
    add_action('manage_media_custom_column', 'pid_value', 10, 2);

    foreach (get_taxonomies() as $taxonomy) {
        add_action("manage_edit-${taxonomy}_columns",  'pid_column');
        add_filter("manage_${taxonomy}_custom_column", 'pid_return_value', 10, 3);
    }
});


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


