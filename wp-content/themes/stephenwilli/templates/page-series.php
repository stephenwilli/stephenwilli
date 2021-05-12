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
  <main class="series-wrap">
    <div class="gallery-mosaic js-mosaic-gallery">
      <?php 
      $args = array(  
        'post_type' => 'Photos',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'tax_query' => array(
          array (
            'taxonomy' => 'series',
            'field' => 'slug',
            'terms' => $series,
          )
        ),
      );

      $images = new WP_Query($args);
      $i = 1;?>
        <div class="mosaic-image intro-card">
          <div class="reveal"  data-delay="1" data-animate="reveal-up"></div>
          <div class="series-text">
            <h1 id="intro-title"><?= $seriesTitle;?></h1>
            <h3><?= $seriesSubtitle;?></h3>
            <p><?= $seriesText;?></p>
          </div>
        </div>
      <?php while ( $images->have_posts()) { $images->the_post();
            $photo = get_field('featured_photo')
          ?>
          <a class="js-photo-open mosaic-image" href="<?php the_permalink();?>">
            <div class="reveal" data-delay="2" data-animate="reveal-up"></div>
            <img class="thumbnail" src="<?= $photo['sizes']['large'];?>" alt="<?php the_title();?> - Stephen Williams Photography"/>
            <div id="photo-open-<?= $i;?>" class="photo-open">
              <!-- <img class="enlarged" src="<?= $photo['sizes']['full_screen'];?>" alt="<?php the_title();?>"/> -->
            </div> 
          </a>
      <?php $i++; } 
      wp_reset_postdata();
      ?>
      <?php if($seriesEnd){?>
      <div class="mosaic-image series-end">
        <div class="reveal"  data-delay="2" data-animate="reveal-up"></div>
        <div class="series-text">
          <?= $seriesEnd;?>
        </div>
      </div>
      <?php } ?>
    </div>
    <?php  
      get_template_part( 'partials/02_molecule/related-series' ); 
    ?>
  </main>
  
  <?php endwhile; 
get_footer();