<?php
  get_header();
  while(have_posts()) { the_post(); 
    $title = get_the_title();
    $content = get_the_content();
    $photo = get_field('featured_photo');;
  ?>
  
  <main class="single-photo" role="main">
    <section class="photo-wrap">
      <div class="photo-content" data-animate="fade-left" data-delay="1">
        <h1><?= $title; ?></h1>
        <p><?= $content;?></p>
        <?php get_template_part( 'partials/02_molecule/post-navigation' ); ?>
      </div>
      
      <div class="photo-full">
        <div class="reveal" data-delay="2" data-animate="reveal-up"></div>
        <img src="<?= $photo['sizes']['full_screen'];?>" alt="Stephen Williams Photography, Jackson Woming" />
      </div>
    </section>
    

  </main>
  
<?php }
get_footer();