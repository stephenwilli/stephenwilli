<?php
  get_header(); 
  while (have_posts()):the_post();
?>
  <main class="main-wrap">
    <?php  
      get_template_part( 'partials/04_flex/flex-layouts' ); 
    ?>
  </main>
  <?php endwhile; 
get_footer();