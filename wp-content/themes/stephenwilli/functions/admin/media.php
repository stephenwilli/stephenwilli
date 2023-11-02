<?php

// Redirect attachment pages
add_filter('attachment_link', function($link, $id) {
    return wp_get_attachment_url($id) ?: $link;
}, 10, 2);

add_action('template_redirect', function() {
    if (!is_attachment()) return;
    wp_redirect(get_attachment_link() ?: home_url(), 301);
    exit;
});

// Enable svg uploads
add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

// Add styles for properly displaying uploaded svg files
add_action('admin_print_styles', function() {
    echo <<<HTML
    <style>
    /* classic */
    :is(#postimagediv, table.media .media-icon) img[src$=".svg"] {
        width: 100% !important;
    }
    /* gutenberg */
    .editor-post-featured-image__preview:has(img[src$=".svg"]) {
        aspect-ratio: 1;
        min-height: 200px;
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2 2'%3E%3Cpath d='M1 2V0h1v1H0v1z' fill-opacity='0.05'/%3E%3C/svg%3E") 0 0 / 1rem 1rem;
    }
    .editor-post-featured-image__preview:has(img[src$=".svg"]) > * {
        width: 100%;
        height: 100%;
    }
    .editor-post-featured-image__preview:has(img[src$=".svg"]) img {
        max-width: calc(100% - 2rem);
        max-height: calc(100% - 2rem);
    }
    </style>
    HTML;
});
