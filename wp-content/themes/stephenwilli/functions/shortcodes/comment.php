<?php

add_shortcode('comment', function($atts, $content = null) {
    return WP_DEBUG ? '<!-- '.trim(strip_tags($content)).' -->' : null;
});
