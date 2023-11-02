<?php

/**
 * General contact info, typically pulled from ACF options and used in the footer.
 * Needs to happen in `init` after ACF has initialized.
 */
add_action('init', function() {
    $email = get_field('contact_email', 'option') ?: get_bloginfo('admin_email');
    $phone = get_field('contact_phone', 'option') ?: '000.000.0000';
    $address = get_field('contact_address', 'option') ?: '125 Scott Ln, Suite 2 '.PHP_EOL.'Jackson, WY 83002';
    define('CONTACT_EMAIL', $email);
    define('CONTACT_PHONE', $phone);
    define('CONTACT_ADDRESS', $address);
});

/**
 * Outputs Google Tag Manager if is_production() and enables ACF's Google Map field.
 * The api key can be made available to scripts via the following in footer.php:
 * site.GOOGLE_KEY = '<?= GOOGLE_KEY ?>';
 */
// define('GOOGLE_GTM', '');
// define('GOOGLE_KEY', '');

/**
 * Identify key pages by ID to avoid the use of magic numbers
 * in hooks and theme files (e.g. get_permalink(PAGE_NEWS))
 */
define('PAGE_HOME', 2);
// define('PAGE_NEWS', 3);
// define('PAGE_ABOUT', 4);
// define('PAGE_CONTACT', 5);

/**
 * Automatically load unique templates for specific pages while avoiding:
 * 1. Slugs that could change and break page-$slug.php
 * 2. Unclear template names like page-$id.php
 * 3. Custom page templates when there should only be once instance
 */
define('AUTO_TEMPLATES', [
    // PAGE_CONTACT => 'templates/contact'
]);

/**
 * Custom page templates, identified here for easiser use in hooks
 * and theme files (e.g. is_page_template(TEMPLATE_EXAMPLE))
 */
// define('TEMPLATE_EXAMPLE', 'templates/example.php');

/**
 * Enable or disable ACF flexible content layouts by id, type or template.
 * Assumes the field name is 'sections'
 * https://support.advancedcustomfields.com/forums/topic/filter-for-flexible-content-layouts/#post-88749
 */
define('ACF_LAYOUT_RULES', [
    // 'layout' => [PAGE_HOME, TEMPLATE_EXAMPLE, 'activity']
]);

/**
 * Allow or prevent rendering of ACF fields by id, type or template.
 * Supports using both field names and keys
 */
define('ACF_FIELD_RULES', [
    // 'name' => []
    // 'field_63979f523da4b' => []
]);

/**
 * Remove the default post_content and post_excerpt by ID (e.g. PAGE_HOME).
 * Available via TMBR Hooks plugin for more control:
 *
 * add_filter('tmbr/hide_editor', $bool, $post);
 * add_filter('tmbr/hide_excerpt', $bool, $post);
 */
define('ADMIN_HIDE_EDITORS', [
    // PAGE_HOME
]);
define('ADMIN_HIDE_EXCERPTS', [
    // PAGE_NEWS
]);

/**
 * Hide top-level admin menus via slug
 * and unregister unused taxonomies
 */
define('ADMIN_HIDE_MENUS', [
    'edit-comments.php'
]);
