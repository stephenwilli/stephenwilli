<?php
  get_header();
  while ( have_posts() ) : the_post(); ?>
  
  <div id="site-loader">
    <div class="loader-wrap">
      <a href></a>
      <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/sw-03.svg'); ?>
      <h1 class="loader-heading" id="loader-heading" data-split-text>Stephen Williams Photography</h1>
    </div>
  </div>
  
  <div class="photo-home">
    <?php get_template_part( 'partials/03_organism/home-hero' ); ?>
    
    <div class="inner-wrap">
      <div class="inner-border">
      </div>
    </div>
  </div>
  
  <div class="dev-home">
    <?php get_template_part( 'partials/03_organism/dev-hero' ); ?>
    
    <div class="inner-wrap">
      <div class="inner-border">
      </div>
    </div>
  </div>
  
<?php endwhile;
get_footer('home');