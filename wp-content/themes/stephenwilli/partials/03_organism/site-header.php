<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
  <i class="icon icon-sw"></i>
</a>

<a class="js-hamburger-toggle" data-target=".navbar-menu">
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
  <?php get_template_part('partials/02_molecule/contact-nav')?>
</div>

