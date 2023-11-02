<?php

add_action('parse_query', function($query) {
    if (!is_search()) return;
    $query->is_search = false;
    $query->is_404 = true;
});
