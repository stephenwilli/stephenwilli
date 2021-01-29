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
  
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <div class="site-wrap">
    
    <?php get_template_part( 'partials/03_organism/image-warp' ); ?>
    
    <div class="inner-wrap">
      <div class="inner-border">
      </div>
    </div>
    
    <header class="site-header" id="header" role="header">
      <?php get_template_part( 'partials/03_organism/site-header' ); ?>
    </header>
