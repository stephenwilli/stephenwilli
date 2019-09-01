<?php
  get_header();
  while ( have_posts() ) : the_post(); ?>

  <main class="page-main" role="main">
    <?php
      
      // HOME SECTIONS

      get_template_part( 'partials/03_organism/home-hero' );
      
      get_template_part( 'partials/03_organism/home-intro' );
      
      get_template_part( 'partials/03_organism/home-menu' );
      
      get_template_part( 'partials/03_organism/home-events' );
      
      get_template_part( 'partials/03_organism/event-calendar' );
      
      get_template_part( 'partials/03_organism/image-gallery' );
      
      get_template_part( 'partials/03_organism/instagram-feed' );
      
    ?>
  </main>
  
<?php endwhile;
get_footer();