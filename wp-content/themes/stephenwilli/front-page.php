<?php
  get_header();
  while ( have_posts() ) : the_post(); ?>

  <main class="page-main" role="main">
    <?php
      // PAGE HERO
      get_template_part( 'partials/03_organism/home-hero' );
      
      // PAGE CONTENT
      get_template_part( 'partials/03_organism/page-content' );

      // FLEXIBLE CONTENT
      get_template_part( 'partials/03_organism/flex-layouts' ); 
    ?>
  </main>
  
<?php endwhile;
get_footer();