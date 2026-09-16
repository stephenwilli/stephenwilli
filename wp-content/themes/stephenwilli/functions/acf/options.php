<?php

// https://www.advancedcustomfields.com/resources/acf_add_options_page/
// https://www.advancedcustomfields.com/resources/acf_add_options_sub_page/

acf_add_options_page([
    'page_title' => 'Options',
    'menu_slug' => 'options',
    'capability' => 'manage_options',
    'autoload' => true,
    'position' => 2
]);

// acf_add_options_sub_page([
//     'page_title'  => 'General',
//     'parent_slug' => 'options',
// ]);

// acf_add_options_sub_page([
//     'page_title'  => 'Navigation',
//     'parent_slug' => 'options',
// ]);

// acf_add_options_sub_page([
//     'page_title'  => 'Contact',
//     'parent_slug' => 'options',
// ]);
