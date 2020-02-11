<?php 
  $logo = get_field('site_primary_logo', 'option');
 ?>

<nav class="navbar -fixed js-nav-scroll" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
  <div class="navbar-main">
    <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
      <img class="logo logo-large logo-white" src="<?php echo $logo['sizes']['medium'];?>" alt="<?php bloginfo('name'); ?>" />
    </a>
    
    <div class="navbar-hamburger">
      <a class="js-hamburger-toggle" data-target=".navbar-menu">
        <span class="hamburger-bar -one"></span>
        <span class="hamburger-bar -two"></span>
        <span class="hamburger-bar -three"></span>
      </a>
    </div>
    
    <div class="navbar-menu">
      <?php                              
        wp_nav_menu( array(
          'menu'              => $menu->term_id,
          'menu_class'        => "parent-menu",
          'menu_id'           => "",
          'container'         => "parent-item",
          'container_id'      => "",
          'container_class'   => '',
          'depth'            => 0
          ));
        ?>
    </div>
    
  </div>
</nav>