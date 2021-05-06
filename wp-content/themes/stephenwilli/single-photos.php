<?php
  get_header();
  while(have_posts()) { the_post(); 
    $title = get_the_title();
    $content = get_the_content();
    $photo = get_field('featured_photo');
    $kicker = get_field('photo_kicker');
    $orientation = get_field('photo_orientation')
  ?>
  
  <main class="single-photo" role="main">
    <?php if($kicker){?>
      <div class="kicker">
        <p><?= $kicker;?></p>
      </div>
    <?php }?>
    <section class="photo-wrap -<?= $orientation;?>">
      <div class="photo-content" data-animate="fade-left" data-delay="1">
        <h1><?= $title; ?></h1>
        <p><?= $content;?></p>
        <?php get_template_part( 'partials/02_molecule/post-navigation' ); ?>
      </div>
      
      <div class="photo-full -<?= $orientation;?>">
        <div class="reveal" data-delay="2" data-animate="reveal-up"></div>
        <img src="<?= $photo['sizes']['full_screen'];?>" alt="Stephen Williams Photography, Jackson Wyoming" />
      </div>
    </section>
  </main>
  
<?php }
get_footer();