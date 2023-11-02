<?php

define('EDITOR_TOOLBAR', [
    // 'formatselect',
    'styleselect',
    'pastetext',
    'removeformat',
    // 'forecolor',
    // 'alignleft',
    // 'aligncenter',
    // 'alignright',
    // 'outdent',
    // 'indent',
    'bullist',
    // 'numlist',
    // 'blockquote',
    'link',
    // 'unlink',
    'bold',
    'italic',
    // 'strikethrough',
    'hr',
    'charmap',
    // 'undo',
    // 'redo',
    // 'wp_help',
]);

add_filter('use_block_editor_for_post', '__return_false');
add_filter('img_caption_shortcode_width', '__return_false');

add_action('after_setup_theme', function() {
    add_editor_style('assets/editor.css');
    update_option('image_default_align', 'none');
    update_option('image_default_link_type', 'none');
    update_option('image_default_size', 'large');
});

add_filter('acf/fields/wysiwyg/toolbars', function($toolbars) {
    $toolbars['Full' ] = [1 => EDITOR_TOOLBAR];
    $toolbars['Basic'] = [1 => ['link']];
    return $toolbars;
});

add_filter('tiny_mce_before_init', function($init) {

    $init['toolbar1'] = join(' ', EDITOR_TOOLBAR);
    unset($init['toolbar2']);

    $init['style_formats'] = json_encode([
        // elements
        ['title' => 'Heading 2', 'block' => 'h2'],
        ['title' => 'Heading 3', 'block' => 'h3'],
        ['title' => 'Heading 4', 'block' => 'h4'],
        ['title' => 'Paragraph', 'block' => 'p'],
        // classes
        // ['title' => 'Lead Paragraph', 'selector' => 'p', 'classes' => 'lead'],
        // ['title' => 'Call-to-Action', 'selector' => 'a', 'classes' => 'cta-link'],
        ['title' => 'Button',            'selector' => 'a', 'classes' => 'button'],
        // ['title' => 'Footnote',       'selector' => 'p', 'classes' => 'footnote']
    ]);

    $init['cache_suffix'] = filemtime(TEMPLATEPATH.'/assets/editor.css');
    $init['paste_as_text'] = true;
    $init['preview_styles'] = false;
    $init['wordpress_adv_hidden'] = true;

    return $init;
});

add_filter('quicktags_settings', function($init) {
    $init['buttons'] = '&nbsp;';
    return $init;
});
