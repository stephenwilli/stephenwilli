<?php
  get_header();
  while ( have_posts() ) : the_post(); ?>
  
  <main class="page-main" role="main">
    <?php
      // PAGE HERO
      //get_template_part( 'partials/03_organism/series-gallery' );    
        
      // FLEXIBLE CONTENT
      get_template_part( 'partials/04_flex/flex-layouts' ); 
    ?>
  </main>
  
<?php endwhile;
get_footer();