<?php

# is_production
# debug
# url
# trim_url
# build_url
# class_attr
# style_attr
# icon
# render
# minify
# shortid
# echo_if
# has_content
# is_acf_image
# is_child_of
# is_external_url
# is_post_type
# to_array
# to_html
# get_first_child
# get_first_term
# get_image_src
# get_image_alt
# remove_empty_p
# custom_post_type_labels
# custom_taxonomy_labels

function is_production() {
    return wp_get_environment_type() === 'production';
}

function debug($var, $exit = false) {
    if (!WP_DEBUG) return;
    echo '<pre class="debug">'.print_r($var, true).'</pre>';
    if ($exit) exit;
}

function url($to) {
    $url = is_string($to) ? get_template_directory_uri().'/'.ltrim($to, '/') : get_permalink($to);
    return trim_url($url);
}

function trim_url($url) {
    return is_admin() ? $url : str_replace(get_bloginfo('url'), '', $url);
}

function build_url($file) {
    $slug = is_production() ? 'min' : 'dev';
    $file = preg_replace('/(\w+).(css|js)/i', "$1.{$slug}.$2", $file);
    $version = filemtime(TEMPLATEPATH.'/build/'.$file);
    return url("build/$file?v=$version");
}

function class_attr($classes) {
    if (is_string($classes)) return $classes;
    $result = [];
    foreach ($classes as $key => $condition) $result[] = is_int($key)
        ? $classes[$key]
        : ($condition ? $key : null);
    return join(' ', array_filter($result));
}

function style_attr($styles) {
    if (is_string($styles)) return $styles;
    $result = [];
    foreach ($styles as $key => $value) {
        if (empty($value)) continue;
        $result[] = $key.': '.$value;
    }
    return join('; ', array_filter($result));
}

function icon($name) {
    return render('icon', $name, true);
}

function render($partial, $data = [], $return = false) {

    $file = TEMPLATEPATH.'/partials/'.str_replace('.php', '', $partial).'.php';
    if (!file_exists($file)) return;

    ob_start();
    global $post;
    include($file);
    $html = ob_get_clean();

    if ($return) return $html;
    echo $html;
}

function minify($html) {
    $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', trim($html));
    $html = preg_replace('/<!--(.|\s)*?-->/', '', $html);
    return $html;
}

function shortid($input, $length = 8) {
    $hash = base64_encode(hash('sha256', $input, true));
    $hash = strtr($hash, '+/', '-_');
    $hash = rtrim($hash, '=');
    return substr($hash, 0, $length);
}

function echo_if($check, $true, $false = '') {
    echo !empty($check) ? $true : $false;
}

function has_content($post = null) {
    if (empty($post)) $post = $GLOBALS['post'];
    return $post && !empty(trim($post->post_content));
}

function is_acf_image($var) {
    return is_array($var) && isset($var['type']) && $var['type'] === 'image';
}

function is_child_of($parent_id, $child_id = null) {
    global $post;
    $child = ($child_id === null) ? $post : get_post($child_id);
    return $child && ($child->post_parent === $parent_id || in_array($parent_id, get_post_ancestors($child)));
}

function is_external_url($url) {
    return !empty($url) &&
        is_string($url) &&
        !str_contains($url, get_bloginfo('url')) &&
        !str_starts_with($url, '/') &&
        !str_starts_with($url, '#');
}

function is_post_type($types, $post = null) {
    if (!$post) global $post;
    if (!is_array($types)) $types = [$types];
    return in_array(get_post_type($post), $types);
}

function to_array($string, $delimiter = ',') {
    return array_filter(array_map('trim', explode($delimiter, $string)));
}

function to_html($string, $find, $replace, $wildcard = '*') {
    $char = explode($wildcard, $find);
    $html = explode($wildcard, $replace);
    $string = str_replace($char[0], $html[0], $string);
    $string = str_replace($char[1], $html[1], $string);
    return $string;
}

function get_first_child($post = null, $args = []) {
    if (!$post) global $post;
    $args = array_merge([
        'post_parent' => $post->ID ?? $post,
        'post_status' => 'publish',
        'numberposts' => 1,
        'orderby' => ['menu_order' => 'ASC'],
    ], $args);
    return current(get_children($args));
}

function get_first_term($taxonomy, $post = null) {
    if (!$post) global $post;
    $terms = get_the_terms($post, $taxonomy);
    return (is_array($terms) && count($terms)) ? $terms[0] : null;
}

function get_image_src($size, $image_id = null) {
    if ($image_id === null) $image_id = get_post_thumbnail_id();
    $image = wp_get_attachment_image_src($image_id, $size);
    return is_array($image) ? $image[0] : null;
}

function get_image_alt($image_id = null) {
    if ($image_id === null) $image_id = get_post_thumbnail_id();
    return get_post_meta($image_id, '_wp_attachment_image_alt', true);
}

function remove_empty_p($content) {
    $content = force_balance_tags($content);
    $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
    $content = preg_replace('~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content);
    $content = preg_replace('(<br\s*?/?>)', '', $content);
    return trim($content);
}

// https://developer.wordpress.org/reference/functions/get_post_type_labels/
function custom_post_type_labels($singular, $plural = null, $labels = []) {
    if (!$plural) $plural = $singular.'s';
    return array_merge([
        'name'                     => $plural,
        'menu_name'                => $plural,
        'singular_name'            => $singular,
        'add_new'                  => "Add New",
        'add_new_item'             => "Add New $singular",
        'edit_item'                => "Edit $singular",
        'new_item'                 => "New $singular",
        'view_item'                => "View $singular",
        'view_items'               => "View $plural",
        'search_items'             => "Search $plural",
        'not_found'                => "No $plural found",
        'not_found_in_trash'       => "No $plural found in Trash",
        'parent_item_colon'        => "Parent $plural:",
        'all_items'                => "All $plural",
        'archives'                 => "$singular Archives",
        'attributes'               => "$singular Attributes",
        'insert_into_item'         => "Add Media",
        'uploaded_to_this_item'    => "Uploaded to this $singular",
        'item_updated'             => "$singular updated",
        'item_scheduled'           => "$singular scheduled",
        'item_published'           => "$singular published",
        'item_published_privately' => "$singular published privately",
        'item_reverted_to_draft'   => "$singular reverted to draft",
        'item_link'                => "$singular Link",
        'item_link_description'    => "Link to a $singular",
        // 'featured_image'        => "Featured image",
        // 'set_featured_image'    => "Set featured image",
        // 'use_featured_image'    => "Use as featured image",
        // 'remove_featured_image' => "Remove featured image",
    ], $labels);
}

// https://developer.wordpress.org/reference/functions/get_taxonomy_labels/
function custom_taxonomy_labels($singular, $plural = null, $labels = []) {
    if (!$plural) $plural = $singular.'s';
    return array_merge([
        'name'                       => $plural,
        'menu_name'                  => $plural,
        'singular_name'              => $singular,
        'all_items'                  => "All $plural",
        'edit_item'                  => "Edit $singular",
        'view_item'                  => "View $singular",
        'update_item'                => "Update $singular",
        'add_new_item'               => "Add New $singular",
        'new_item_name'              => "New $singular",
        'parent_item'                => "Parent $singular",
        'parent_item_colon'          => "Parent $singular:",
        'search_items'               => "Search $plural",
        'popular_items'              => "Popular $plural",
        'separate_items_with_commas' => 'Separate '.strtolower($plural).' with commas',
        'add_or_remove_items'        => 'Add or remove '.strtolower($plural),
        'choose_from_most_used'      => 'Choose from the most used '.strtolower($plural),
        'filter_by_item'             => "Filter by $singular",
        'not_found'                  => "No $plural found",
        'no_terms'                   => "No $plural",
        'back_to_items'              => "Back to $plural",
        'item_link'                  => "$singular Link",
        'item_link_description'      => "Link to a $singular",
        'name_field_description'     => null,
        'slug_field_description'     => null,
        'parent_field_description'   => null,
        'desc_field_description'     => null,
    ], $labels);
}
