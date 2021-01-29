<?php 
  $primaryLogo = get_field('site_primary_logo', 'option');
 ?>
<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
  <img class="logo" src="<?php echo $primaryLogo['sizes']['medium'];?>" alt="<?php echo get_bloginfo('name');?>" />
</a>

<a class="js-hamburger-toggle" data-target=".navbar-menu">
  <div class="navbar-hamburger">
    <span></span>
  </div>
</a>

<div class="navbar-menu">
  <div class="navbar-border"></div>
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
</div>