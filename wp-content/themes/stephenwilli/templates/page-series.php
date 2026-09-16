<?php
  /*
  Template Name: Series
  */
  get_header(); 
  while (have_posts()):the_post();
  $series = get_field('series_slug');
  $seriesTitle = get_the_title();
  $seriesSubtitle = get_field('series_subtitle');
  $seriesText = get_the_content();
  $seriesEnd = get_field('series_end_card');
  
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
        'tax_query'             => array(
          array(
              'taxonomy'  => 'product_cat',
              'field'     => 'slug',
              'terms' => $series,
              'operator'  => 'IN',
          )
     )
       
      );

      $images = new WP_Query($args);
      $i = 1;?>
        <div class="mosaic-image intro-card">
          <div class="reveal" data-animate="reveal-up"></div>
          <div class="series-text">
            <h1 class="h2"><?= $seriesTitle;?></h1>
            <h3><?= $seriesSubtitle;?></h3>
            <p><?= $seriesText;?></p>
            <?php  
              // get_template_part( 'partials/02_molecule/social-share' ); 
            ?>
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
      <?php if($seriesEnd){?>
      <div class="mosaic-image series-end">
        <div class="reveal"  data-animate="reveal-up"></div>
        <div class="series-text">
          <?= $seriesEnd;?>
        </div>
      </div>
      <?php } ?>
    </div>
    <?php  render( 'related-series' ); ?>
  </main>
  
  <?php endwhile; 
get_footer();