<?php

add_shortcode('youtube', function($atts, $content = null) {

    extract(shortcode_atts(array(
        'id' => '',
        'width' => '1120',
        'height' => '630',
        'autoplay' => '0',
        'controls' => '0',
        'showinfo' => '0'
    ), $atts));

    $html = '<iframe id="video-'.get_youtube_id($id).'" width="'.$width.'" height="'.$height.'" src="//www.youtube.com/embed/'.$id.'?autoplay='.$autoplay.'&controls='.$controls.'&showinfo='.$showinfo.'&rel=0&iv_load_policy=3&enablejsapi=1&wmode=transparent" frameborder="0" allowfullscreen></iframe>';
    return $html;
});

add_shortcode('email', function($atts , $content = null) {
    if( ! is_email($content)) return;
    return '<a href="mailto:'.antispambot($content).'">'.antispambot($content).'</a>';
});

add_shortcode('columns', function($atts, $content = null) {

    $columns = [];
    preg_match_all('/(\[col]?)([ \s\S]*?)(\[\/col\]?)/s', $content, $columns, PREG_SET_ORDER);

    add_filter('the_content', 'remove_empty_p');

    $html = '<div class="columns columns-shortcode">';
    $span = 12 / count($columns);

    foreach($columns as $column) {
        $html .= '<div class="lg:col-'.$span.'">';
        $html .= apply_filters('the_content', $column[2]);
        $html .= '</div>';
    }

    $html .= '</div>';

    remove_filter('the_content', 'remove_empty_p');
    return $html;
});