<?php

add_shortcode('example', function($atts, $content = null) {

    extract(shortcode_atts([
        'name' => null,
    ], $atts));

    ob_start(); ?>

    <!-- Hello, <?= $name ?>! -->

    <?php return ob_get_clean();
});
