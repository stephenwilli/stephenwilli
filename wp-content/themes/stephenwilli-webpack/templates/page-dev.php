<?php
  /*
  Template Name: Dev Home
  */
  get_header();
  while ( have_posts() ) : the_post(); ?>
  <div class="dev-home">
    <?php get_template_part( 'partials/03_organism/dev-hero' ); ?>
    
    <!-- <div class="inner-wrap">
      <div class="inner-border">
      </div>
    </div> -->
  </div>
  <?php endwhile;
  get_footer('home');