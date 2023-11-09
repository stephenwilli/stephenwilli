<?php

add_action('login_head', function() {

    $logo = url('assets/images/logo.svg');

    echo <<<HTML
    <style>

    :root {
        --login-bg: #FFF;
        --login-pb: 20%;
    }

    body.login {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--login-bg);
    }
    #login {
        width: min(350px, 85%);
        margin: 1.5em auto;
        padding: 1.5rem;
    }
    #login h1 {
        margin: 0 0 1.5em 0;
    }
    #login h1 a {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
        font-size: 0;
        background: url($logo) center / contain no-repeat;
        padding-bottom: var(--login-pb);
    }
    #login form {
        padding: 0;
        border: 0;
        box-shadow: none;
        background-color: transparent;
        overflow: visible;
    }
    #login form:after {
        content: '';
        display: table;
        clear: both;
    }
    #login .forgetmenot {
        margin-top: 0.667em;
    }
    #login .forgetmenot label {
        margin: 0;
    }
    #login #nav {
        margin: 0.75em 0 0 0;
        padding: 0;
        text-align: right;
    }
    #login #nav a {
        box-shadow: none;
    }
    #login :where(#backtoblog, .privacy-policy-page-link) {
        display: none !important;
    }

    .login h1 a {
        background: url('../wp-content/themes/stephenwilli/assets/images/swp-01.svg') center / contain no-repeat !important;
        width: 400px !important;
        height: 200px !important;
    }
    </style>
    HTML;
});

add_filter('login_headerurl', function() {
    return get_bloginfo('url');
});

add_filter('shake_error_codes', function() {
    return false;
});
