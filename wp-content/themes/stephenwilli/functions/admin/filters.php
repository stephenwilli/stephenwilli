<?php

add_filter('show_admin_bar', '__return_false');

if (!is_admin()) return;

// Display the template name and remove "Privacy Policy Page"
add_filter('display_post_states', function($post_states) {

    if ($slug = get_page_template_slug()) {
        $templates = wp_get_theme()->get_page_templates();
        if (array_key_exists($slug, $templates)) $post_states[] = $templates[$slug].' Template';
    }

    unset($post_states['page_for_privacy_policy']);
    return $post_states;
});

// Remove "Thank you for creating with WordPress" from the footer
add_filter('admin_footer_text', function($text) {
    return null;
});
