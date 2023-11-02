<?php

namespace Theme;

add_filter('gform_submit_button', function($button, $form) {
    if (is_admin()) return $button;
    $label = $form['button']['text'] ?: 'Submit';
    return '<button type="submit" class="button" id="gform_submit_button_'.$form['id'].'">'.$label.'</button>';
}, 10, 2);

add_filter('gform_menu_position', function($position) {
    return 50;
});
