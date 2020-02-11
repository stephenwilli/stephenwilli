<?php

defined('ABSPATH') or die;

// ENQUEUE ASSETS
require 'inc/enqueue-assets.php';
// require 'inc/tmbr-load-scripts.php';

// WORDPRESS CUSTOMIZATION
require 'inc/wordpress-admin.php';
require 'inc/image-sizes.php';

// CMS SETUP
require 'inc/register-menus.php';
require 'inc/register-post-type.php';
require 'inc/register-sidebars.php';
require 'inc/register-taxonomy.php';
require 'inc/register-option-pages.php';
require 'inc/shortcodes.php';

// HELPER FUNCTIONS
require 'inc/helper-functions.php';
require 'inc/tmbr-load-template.php';

// VENDOR
// require 'inc/gravity-form-filters.php';


