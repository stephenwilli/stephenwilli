<?php
add_action('wp_enqueue_scripts', function() {

    if (is_admin()) return;

    // wp_deregister_script('jquery');
    wp_deregister_script('wp-embed');

    wp_enqueue_style('main', build_url('main.css'));
    wp_enqueue_script('main', build_url('main.js'), ['jquery'], null, true);
});