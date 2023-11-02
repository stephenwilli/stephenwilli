<?php 
  $date = get_the_date('F j, Y');
?>
<section class="post-content">

  <div class="post-meta">
    <?php echo $date; ?>
  </div>
  <?php the_content();?>
  
  <?php get_template_part( 'partials/04_flex/flex-layouts' ); ?>

</section>