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
  
  <!-- <link rel="stylesheet" href="https://use.typekit.net/skp1szj.css"> -->
  
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
  
  <?php // get_template_part( 'partials/02_molecule/form-modal' ); ?>
  

  <div class="js-sitewrap site-wrap">

    <header class="site-header" id="header" role="header">
      <?php get_template_part( 'partials/03_organism/site-header' ); ?>
    </header>
