<!DOCTYPE html>
<html <?php language_attributes() ?> class="no-js loading">
<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />

    <script>
    (function(c) { c.replace('no-js','js') })(document.documentElement.classList);
    </script>

    <?php wp_head() ?>

    <link rel="stylesheet" href="https://use.typekit.net/qzz4jnb.css">

    <link rel="stylesheet" href="<?= build_url('main.css') ?>" />

</head>
<body <?php
  if (is_front_page()){
    body_class('home-template');
    } else {
    body_class('internal-template');
  }
  ?>
>

<a href="#content">Skip to Content</a>
<?php wp_body_open() ?>

<div class="site">


    <?php render('site-header'); ?>


    <main class="site-content" id="content">
