<?php

add_action('init', function() {

    register_post_type('photos', [
        'labels' => custom_post_type_labels('Photo', 'Photos'),
        'public' => true,
        'show_ui' => true,
        'supports' => array('title','editor','thumbnail','page-attributes'),
        'menu_icon' => 'dashicons-format-gallery',
        'menu_position' => 4,
    ]);

    register_post_type('projects', [
        'labels' => custom_post_type_labels('Project', 'Projects'),
        'public' => true,
        'show_ui' => true,
        'supports' => array('title','editor','thumbnail','page-attributes'),
        'menu_icon' => 'dashicons-format-gallery',
        'menu_position' => 4,
    ]);

});
