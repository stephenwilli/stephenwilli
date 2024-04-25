<?php
  get_header(); 
  while (have_posts()):the_post();
?>
  <main class="main-wrap">

    <?php 
    $content = get_the_content();
    if($content){?>
        <?php the_content();?>
    <?php }?>


    <?php render( 'sections' ); ?>
  </main>
  <?php endwhile; 
get_footer();