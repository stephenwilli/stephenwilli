<?php

// Disable Post Types and Taxonomies features from ACF 6.1
add_filter('acf/settings/enable_post_types', '__return_false');

// Default page_headline field to post_title if empty
add_filter('acf/load_value/name=page_headline', function($value, $post_id) {
    return (is_admin() || $value) ? $value : get_the_title($post_id);
}, 10, 2);

// Ensure link fields have a target and default to _blank for external links
add_filter('acf/format_value/type=link', function($value) {
    if (empty($value)) return $value;
    $value['target'] = $value['target'] ?: (is_external_url($value['url']) ? '_blank' : '_self');
    return $value;
});

add_filter('acf/fields/google_map/api', function($api) {
    if (defined('GOOGLE_KEY')) $api['key'] = GOOGLE_KEY;
    return $api;
});

// TODO: test, document, and add custom filters
add_filter('acf/prepare_field/name=sections', function($field) {

    global $post;
    $template = get_page_template_slug();
    $mapping = defined('ACF_LAYOUT_RULES') ? ACF_LAYOUT_RULES : [];
    $layouts = $field['layouts'] ?? [];
    $field['layouts'] = [];

    foreach ($layouts as $layout) {

        $key = $layout['name'];
        $rules = empty($mapping[$key]) ? null : (is_array($mapping[$key]) ? $mapping[$key] : [$mapping[$key]]);

        if (!array_key_exists($key, $mapping) || empty($rules)) {
            $field['layouts'][] = $layout;
            continue;
        }

        $allow_id = in_array($post->ID, $rules);
        $block_id = in_array($post->ID * -1, $rules);

        $allow_type = in_array($post->post_type, $rules);
        $block_type = in_array('!'.$post->post_type, $rules);

        $allow_template = in_array($template, $rules);
        $block_template = in_array('!'.$template, $rules);

        $is_allowed = $allow_id || $allow_template || $allow_type;
        $is_blocked = $block_id || $block_template || $block_type;

        if ($is_allowed && !$is_blocked) {
            $field['layouts'][] = $layout;
        }
    }

    return $field;
});

// TODO: test, document, and add custom filters
add_filter('acf/prepare_field', function($field) {

    if (empty($field)) return;

    global $post;
    $mapping = defined('ACF_FIELD_RULES') ? ACF_FIELD_RULES : [];

    $rules = array_key_exists($field['key'], $mapping)
        ? $mapping[$field['key']]
        : $mapping[$field['_name']] ?? [];

    if (!is_array($rules)) {
        $rules = [$rules];
    }

    if (!empty($rules)) {

        $template = get_page_template_slug();

        $block_id = in_array($post->ID * -1, $rules);
        if ($block_id) return false;

        $allow_id = in_array($post->ID, $rules);
        if ($allow_id) return $field;

        $block_template = in_array('!'.$template, $rules);
        if ($block_template) return false;

        $allow_template = in_array($template, $rules);
        if ($allow_template) return $field;

        $block_type = in_array('!'.$post->post_type, $rules);
        if ($block_type) return false;

        $allow_type = in_array($post->post_type, $rules);
        if ($allow_type) return $field;
    }

    return $field;
});
