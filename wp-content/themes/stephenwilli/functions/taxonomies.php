<?php

add_action('init', function() {

    register_taxonomy('series', ['photos'], [
        'labels' => custom_taxonomy_labels('Series'),
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true
    ]);

    register_taxonomy('locations', ['photos'], [
        'labels' => custom_taxonomy_labels('Locations'),
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true
    ]);

    register_taxonomy('project-categories', ['projects'], [
        'labels' => custom_taxonomy_labels('Project Categories'),
        'public' => false,
        'show_ui' => true,
        'hierarchical' => true
    ]);

});
