<?php

if (!is_admin()) return;

add_action('admin_init', function() {

    // Enqueue admin styles and scripts, if they exist
    $style = '/assets/admin.css';
    if (is_file(TEMPLATEPATH.$style)) wp_enqueue_style('admin', url($style), null, filemtime(TEMPLATEPATH.$style));

    $script = '/assets/admin.js';
    if (is_file(TEMPLATEPATH.$script)) wp_enqueue_script('admin', url($script), null, filemtime(TEMPLATEPATH.$script));

    // Disable comments
    remove_post_type_support('page', 'comments');
    remove_post_type_support('post', 'comments');
    remove_post_type_support('attachment', 'comments');

    // Add an ID column to all post and taxonomy tables
    add_action('admin_print_styles', function() {
        echo '<style> #id_column { width: 50px; } </style>';
    });

    add_filter('manage_posts_columns',       __NAMESPACE__.'\id_column', 10);
    add_action('manage_posts_custom_column', __NAMESPACE__.'\id_value',  10, 2);
    add_filter('manage_pages_columns',       __NAMESPACE__.'\id_column', 10);
    add_action('manage_pages_custom_column', __NAMESPACE__.'\id_value',  10, 2);
    add_filter('manage_media_columns',       __NAMESPACE__.'\id_column', 10);
    add_action('manage_media_custom_column', __NAMESPACE__.'\id_value',  10, 2);

    foreach (get_taxonomies() as $taxonomy) {
        add_action("manage_edit-{$taxonomy}_columns",  __NAMESPACE__.'\id_column');
        add_filter("manage_{$taxonomy}_custom_column", __NAMESPACE__.'\id_return', 10, 3);
    }
});

function id_column($cols) {
    return array_merge($cols, ['id_column' => 'ID']);
}

function id_value($column, $id) {
    if ($column === 'id_column') echo $id;
}

function id_return($value, $column, $id) {
    return $column === 'id_column' ? $id : $value;
}

// Remove items from wp admin bar
add_action('admin_bar_menu', function($wp_admin_bar) {
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('archive');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_menu('user-info');
    $wp_admin_bar->remove_menu('wpseo-menu');
}, 100);

// Remove menu items and "Appearance > Customize"
add_action('admin_menu', function() {
    global $menu, $submenu;
    $hidden = defined('ADMIN_HIDE_MENUS') ? ADMIN_HIDE_MENUS : [];

    foreach ($menu as $item) {
        if (in_array($item[2], $hidden)) remove_menu_page($item[2]);
    }
    foreach ($submenu['themes.php'] ?? [] as $index => $item) {
        if ($item[0] === 'Customize') unset($submenu['themes.php'][$index]);
    }
});

// Hide editors and excerpts by ID
add_action('current_screen', function($screen) {
    $post = get_post($_GET['post'] ?? null);
    if (empty($post)) return;

    $hide_editor = defined('ADMIN_HIDE_EDITORS') && in_array($post->ID, ADMIN_HIDE_EDITORS);
    if ($hide_editor) remove_post_type_support($post->post_type, 'editor');

    $hide_excerpt = defined('ADMIN_HIDE_EXCERPTS') && in_array($post->ID, ADMIN_HIDE_EXCERPTS);
    if ($hide_excerpt) remove_post_type_support($post->post_type, 'excerpt');
});

// Remove dashboard metaboxes
add_action('wp_dashboard_setup', function() {
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now',   'dashboard', 'normal');
    remove_meta_box('dashboard_activity',    'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary',     'dashboard', 'side');
}, 100);

// Remove comments and unwanted metaboxes from post edit screens
add_action('add_meta_boxes', function() {
    $post_types = get_post_types(['public' => true]);
    foreach ($post_types as $type) {
        remove_meta_box('commentstatusdiv', $type, 'normal');
        remove_meta_box('commentsdiv',      $type, 'normal');
        remove_meta_box('trackbacksdiv',    $type, 'normal');
        remove_meta_box('authordiv',        $type, 'normal');
    }
});

// Disable autosave to avoid accumulating lots of post revisions
add_action('wp_print_scripts', function() {
    wp_deregister_script('autosave');
});
