<?php

add_filter('automatic_updates_is_vcs_checkout', '__return_false', 1);
add_filter('allow_major_auto_core_updates', '__return_false');
add_filter('allow_minor_auto_core_updates', '__return_true');
add_filter('auto_plugin_update_send_email', '__return_false');
add_filter('auto_core_update_send_email', fn($send, $status) => $status !== 'success', 10, 2);
add_filter('auto_update_theme', '__return_false');
