<?php

if (!defined('ABSPATH') || !function_exists('have_rows')) return;

while (have_rows('sections')) {
    the_row();
    $partial = 'partials/'.str_replace('_', '-', get_row_layout());
    render($partial);
}