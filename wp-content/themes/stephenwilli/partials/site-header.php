<header class="site-header js-nav-scroll" id="header" role="header">
  <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
    <?= icon('sw') ?>
    <h4 class="tagline">Stephen Williams<h4>
  </a>

  <a class="js-hamburger-toggle hamburger-wrap" data-target=".navbar-menu">
    <div class="navbar-hamburger">
      <span></span>
    </div>
  </a>

  <div class="navbar-menu">
    <?php                              
      wp_nav_menu( array(
        'menu'              => "",
        'menu_class'        => "parent-menu",
        'menu_id'           => "",
        'container'         => "parent-item",
        'container_id'      => "",
        'container_class'   => '',
        'depth'            => 0
        ));
      ?>
    <?php render('contact-nav')?>
  </div>
</header>
