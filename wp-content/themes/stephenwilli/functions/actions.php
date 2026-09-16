<?php

add_action('wp_enqueue_scripts', function() {
    // styles
    wp_deregister_style('classic-theme-styles');
    wp_deregister_style('wp-block-library');
    wp_deregister_style('global-styles');
    // scripts
    wp_deregister_script('jquery');
    wp_deregister_script('wp-embed');
    wp_enqueue_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js', null, '3.6.1');
    wp_enqueue_script('jquery.magnific', '//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', ['jquery'], '1.1.0');
    wp_enqueue_script('jquery.slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', ['jquery'], '1.8.1');
});

add_action('wp_head', function() {
    ob_start(); ?><!--
    <link rel="preload" as="style" href="<?= build_url('main.css') ?>" />
    <link rel="preload" as="script" href="<?= build_url('main.js') ?>" crossorigin />
    <link rel="preload" as="font" type="font/woff2" href="<?= url('assets/fonts/Example-One.woff2') ?>" crossorigin />
    <link rel="preload" as="font" type="font/woff2" href="<?= url('assets/fonts/Example-Two.woff2') ?>" crossorigin />
    -->
    <link rel="icon" href="<?= url('assets/images/favicon.svg') ?>" type="image/svg+xml" />
    <link rel="icon" href="<?= url('assets/images/favicon.png') ?>" type="image/png" />
    <link rel="manifest" href="<?= url('assets/manifest.json') ?>" crossorigin="use-credentials" />
    
<?php echo PHP_EOL.ob_get_clean();
});

add_action('after_setup_theme', function() {
    // add_post_type_support('page', 'excerpt');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('html5', ['script', 'style', 'gallery', 'caption', 'search-form', 'comment-form', 'comment-list']);
});

add_action('wp_body_open', function() {
    if (!defined('GOOGLE_GTM') || !is_production()) return;
    ob_start(); ?>
    <script>
    (function(w,d,s,l,i) { w[l] = w[l] || []; w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'}); var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f); })(window, document, 'script', 'dataLayer', '<?= GOOGLE_GTM ?>');
    </script>
    <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=<?= GOOGLE_GTM ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <?php
    $output = str_replace('    ', '', trim(ob_get_clean()));
    echo PHP_EOL.$output.PHP_EOL;
});

add_action('wp_footer', function() {
    ob_start();
    include 'assets/images/icons.svg';
    echo minify(ob_get_clean());
    if (WP_DEBUG) echo PHP_EOL.PHP_EOL.'<!-- '.get_num_queries().' queries -->'.PHP_EOL;
}, 100);

// Remove unecessary wp output
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
remove_filter('wp_robots', 'wp_robots_max_image_preview_large');
