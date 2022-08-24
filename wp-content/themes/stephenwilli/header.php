<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

  <script>
  (function(html){html.className=html.className.replace('no-js','js');})(document.documentElement);
  var site = window.site || {};
  site.dir = '<?php echo get_bloginfo('template_url') ?>';
  </script>
  
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  
  <link rel="stylesheet" href="https://use.typekit.net/qzz4jnb.css">
  
  <link rel="icon" type="image/png" href="<?php echo(get_template_directory_uri()) ?>/favicon.ico" />
  
  <title><?php wp_title(' | ', true, 'right'); ?></title>

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-N7MNBV');</script>
  <!-- End Google Tag Manager -->

  <?php wp_head(); ?>

</head>

<body 
<?php
  if (is_front_page()){
    body_class('full-screen');
    } else {
    body_class();
  }
  ?>
>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7MNBV"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <header class="site-header js-nav-scroll" id="header" role="header">
    <?php get_template_part( 'partials/03_organism/site-header' ); ?>
  </header>
