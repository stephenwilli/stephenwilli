<?php
  get_header(); 
  while (have_posts()):the_post();
?>
  <main class="main-wrap">

    <?php render( 'sections' ); ?>
  </main>
  <?php endwhile; 
get_footer();