<?php
  get_header();
  while ( have_posts() ) : the_post(); ?>
  
  <div id="site-loader">
    <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/sw-03.svg'); ?>
  </div>
  
  <?php get_template_part( 'partials/03_organism/image-warp' ); ?>
  
  <div class="inner-wrap">
    <div class="inner-border">
    </div>
  </div>
  
<?php endwhile;
get_footer();