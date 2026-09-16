<?php

// Disable default wp json endpoints for non logged in users
add_filter('rest_authentication_errors', function($response) {
    global $wp;
    return !is_user_logged_in() && str_starts_with($wp->request, 'wp-json/wp')
        ? new WP_Error('rest_unauthorized', 'Unauthorized', ['status' => 401])
        : $response;
});

// Register custom api endpoints
add_action('rest_api_init', function() {

    // register_rest_route('api', '/example', [
    //     'methods' => [WP_REST_Server::READABLE],
    //     'callback' => 'api_example',
    //     'permission_callback' => '__return_true',
    // ]);
});

function api_example(WP_REST_Request $request) {
    $name = $request->get_param('name');
    $data = ['hello' => $name];
    return $data; // or new WP_REST_Response($data, 200);
}

// Register ajax endpionts (need to include {action: 'example'} in request)
// add_action('wp_ajax_example', 'ajax_example');
// add_action('wp_ajax_nopriv_example', 'ajax_example');
function ajax_example() {
    wp_send_json(['hello' => $_POST['name']]);
}
