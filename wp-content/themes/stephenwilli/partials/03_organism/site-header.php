<?php 
  $primaryLogo = get_field('site_primary_logo', 'option');
  $secondaryLogo = get_field('site_secondary_logo', 'option');
  $alert = get_field('show_alert_bar', 'option');
 ?>
 

<nav class="navbar -fixed js-nav-scroll <?php if($alert){?>-alert-bump<?php }?>" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
  <?php if(have_rows('utility_navigation_item', 'option')){ ?>
    <?php
      if($alert){
        get_template_part( 'partials/03_organism/alert-bar' );
      }
    ?>
    <div class="navbar-utility">

      <ul class="utility-list">
        <?php while(have_rows('utility_navigation_item', 'option')){ the_row(); ?>
              <li class="utility-item"><a class="" href="<?php echo $link['url'];?>"></li>
        <?php } ?>
      </ul>
    </div>
  <?php } ?>
  
  <div class="navbar-main">
    <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
      <img class="logo" src="<?php echo $secondaryLogo['sizes']['medium'];?>" alt="<?php echo get_bloginfo('name');?>" />
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
    </div>

  
  </div>
</nav>