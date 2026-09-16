<?php

/**
 * Plugin Name: Image Position
 * Description: Enables setting a focal point on image uploads
 * Version:     1.0.0
 */


add_action('admin_enqueue_scripts', __NAMESPACE__.'\admin_enqueue');
add_filter('attachment_fields_to_edit', __NAMESPACE__.'\image_fields_edit', null, 2);
add_filter('attachment_fields_to_save', __NAMESPACE__.'\image_fields_save', null, 2);

function admin_enqueue() {
    $style = 'admin.css';
    $script = 'admin.js';
    wp_enqueue_style('image-position-style', plugin_dir_url(__FILE__).$style, null, filemtime(__DIR__.'/'.$style));
    wp_enqueue_script('image-position-script', plugin_dir_url(__FILE__).$script, null, filemtime(__DIR__.'/'.$script));
}

function image_fields_edit($fields, $post) {

    // only available in the attachment details modal
    if (!wp_doing_ajax()) return $fields;

    $mime = $post->post_mime_type;
    if (!str_starts_with($mime, 'image') || str_contains($mime, 'svg')) return $fields;

    $position = get_post_meta($post->ID, 'image_position', true);
    $disabled = empty($position) ? 'disabled' : null;

    $html = <<<HTML
        <p>Click on the image to set a focal point</p>
        <input type="hidden" name="attachments[$post->ID][image_position]" value="$position" />
        <button type="button" class="button button-small image-position-reset" $disabled>Remove focal point</button>

        <div class="image-position-viewer">
            <img src="$post->guid" alt="">
            <img src="$post->guid" alt="">
            <img src="$post->guid" alt="">
        </div>

    HTML;

    $fields['image_position'] = [
        'label' => null,
        'input' => 'html',
        'html'  => $html
    ];

    return $fields;
}

function image_fields_save($post, $data) {
    empty($data['image_position'])
        ? delete_post_meta($post['ID'], 'image_position')
        : update_post_meta($post['ID'], 'image_position', $data['image_position']);
	return $post;
}
