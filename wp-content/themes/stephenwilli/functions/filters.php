<?php

add_filter('excerpt_length', function($length) {
    return 30;
});

add_filter('excerpt_more', function($string) {
    return '...';
});

add_filter('body_class', function($classes) {

    $classes = [];

    if (is_front_page()) {
        $classes[] = 'home';
    } else if (is_archive()) {
        $classes[] = 'archive';
        $classes[] = 'archive-'.get_query_var('post_type');
    } else if (is_singular()) {
        $classes[] = 'single';
        $classes[] = 'single-'.get_post_type();
        $classes[] = get_post_type().'-'.get_the_ID();
        $classes[] = get_post_type().'-'.(get_post()->post_parent ? 'child' : 'parent');
    } else if (is_404()) {
        $classes[] = 'not-found';
    }

    return $classes;
});

add_filter('template_include', function($template) {

    $templates = defined('AUTO_TEMPLATES') ? AUTO_TEMPLATES : [];
    $id = get_the_ID();

    if (array_key_exists($id, $templates)) {
        $file = ltrim($templates[$id], '/');
        $file = TEMPLATEPATH.'/'.rtrim($file, '.php').'.php';
        $template = file_exists($file) ? $file : $template;
    }

    return $template;

}, 100);
