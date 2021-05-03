<?php
  get_header();
?>
  
  <main class="series-wrap">      
    <?php
      while (have_posts()):the_post(); 
      // PAGE HERO
      //get_template_part( 'partials/03_organism/series-gallery' );    
        
      // FLEXIBLE CONTENT
      get_template_part( 'partials/04_flex/flex-layouts' ); 
      endwhile; ?>
    ?>
  </main>
  
<?php get_footer();