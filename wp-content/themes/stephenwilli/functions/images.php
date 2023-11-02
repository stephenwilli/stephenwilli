<?php

// 1px transparent gif
define('PIXEL', 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');

add_filter('wp_get_attachment_image_attributes', function($attributes, $attachment) {

    if (is_admin()) return $attributes;

    $atts = [];
    $atts['src'] = PIXEL;
    $atts['alt'] = $attributes['alt'];
    $atts['data-src'] = trim_url($attributes['src']);
    $atts['draggable'] = 'false';

    if (!empty($attributes['width'])) {
        $atts['width'] = $attributes['width'];
    }
    if (!empty($attributes['height'])) {
        $atts['height'] = $attributes['height'];
    }
    if (!empty($attributes['srcset'])) {
        $atts['data-srcset'] = trim_url($attributes['srcset']);
    }
    if (!empty($attributes['srcset']) && !empty($attributes['sizes'])) {
        $atts['data-sizes'] = $attributes['sizes'];
    }

    return $atts;

}, 100, 2);

add_filter('intermediate_image_sizes', function($sizes) {
    $defaults = ['thumbnail', 'medium', 'large'];
    return array_filter($sizes, fn($size) => in_array($size, $defaults));
});

add_filter('jpeg_quality', function($quality) {
    return 90;
});
