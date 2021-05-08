<?php
  get_header(); 
  while (have_posts()):the_post();
?>
  <main class="main-wrap">
    <section class="post-content">
      <?php the_content();?>
    </section>
    <?php  
      get_template_part( 'partials/04_flex/flex-layouts' ); 
    ?>
  </main>
  <?php endwhile; 
get_footer();