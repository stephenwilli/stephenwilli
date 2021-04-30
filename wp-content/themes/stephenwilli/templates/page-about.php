<?php
  /*
  Template Name: About
  */
  get_header();
  while ( have_posts() ) : the_post(); ?>
  
  <main class="inner-wrap">
    <div class="inner-border">
      <div class="about-wrap">
      <?php
        $image1 = get_field('about_image');
        $image2 = get_field('about_second_image');?>
        <section class="about-images">
          <img class="first" src="<?= $image1['sizes']['full_screen'];?>"/>
          <img class="second" src="<?= $image2['sizes']['full_screen'];?>"/>
        </section>
        
        <section class="page-content">
          <?php the_content();?>
        </section>
      </div>
    </div>
  </main>


  
<?php endwhile;
get_footer();