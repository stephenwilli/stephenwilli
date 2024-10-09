<?php
  /*
  Template Name: All Photos
  */
  get_header(); 
  while (have_posts()):the_post();
  
?>
  <main class="series-wrap container pad-y">
    <div class="gallery-mosaic js-mosaic-gallery">
      <?php 
      $args = array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => -1,
       
      );

      $images = new WP_Query($args);
      $i = 1;?>
        <div class="mosaic-image intro-card">
          <div class="reveal" data-animate="reveal-up"></div>
          <div class="series-text">
            <?php the_content();?>
          </div>
        </div>
      <?php while ( $images->have_posts()) { $images->the_post();
            $photo = get_the_post_thumbnail_url(get_the_ID(),'large');
          ?>
          <a class="mosaic-image" href="<?php the_permalink();?>">
            <div class="reveal" data-animate="reveal-up"></div>
            <img class="thumbnail" src="<?= $photo;?>" alt="<?php the_title();?> - Stephen Williams Photography"/>
          </a>
      <?php $i++; } 
      wp_reset_postdata();
      ?>
    </div>
    <?php  render( 'related-series' ); ?>
  </main>
  
  <?php endwhile; 
get_footer();