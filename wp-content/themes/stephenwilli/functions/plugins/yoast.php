<?php

namespace Theme;

function remove_yoast_columns($columns) {
    return array_filter($columns, fn($key) => !str_starts_with($key, 'wpseo-'), ARRAY_FILTER_USE_KEY);
}

add_action('admin_init', function() {

    $types = [
        ...array_keys(get_post_types()),
        ...array_keys(get_taxonomies())
    ];

    foreach ($types as $type) {
        add_filter("manage_edit-{$type}_columns", __NAMESPACE__.'\remove_yoast_columns');
    }
});

add_filter('wpseo_primary_term_taxonomies', function() {
    return [];
});

add_filter('wpseo_metabox_prio', function() {
    return 'low';
});
