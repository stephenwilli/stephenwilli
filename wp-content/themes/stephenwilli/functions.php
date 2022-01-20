<?php

defined('ABSPATH') or die;

// ENQUEUE ASSETS
require 'inc/enqueue-assets.php';

// WORDPRESS CUSTOMIZATION
require 'inc/wordpress-admin.php';
require 'inc/inversion-theme-setup.php';
require 'inc/image-sizes.php';
require 'inc/site-config.php';

// CMS SETUP
require 'inc/register-menus.php';
require 'inc/register-post-type.php';
require 'inc/register-sidebars.php';
require 'inc/register-taxonomy.php';
require 'inc/register-option-pages.php';

// HELPER FUNCTIONS
require 'inc/helper-functions.php';
require 'inc/inversion-load-template.php';
require 'inc/wp_bootstrap_pagination.php';

// VENDOR
require 'inc/gravity-form-filters.php';



