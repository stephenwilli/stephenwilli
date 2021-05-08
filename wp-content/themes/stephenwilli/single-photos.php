<?php
  get_header();
  while(have_posts()) { the_post(); 
    $title = get_the_title();
    $content = get_the_content();
    $photo = get_field('featured_photo');
    $orientation = get_field('photo_orientation');
    $subtitle = get_field('photo_subtitle');
    $printLink = get_field('print_link');
  ?>
  
  <main class="single-photo" role="main">
    <section class="photo-wrap -<?= $orientation;?>">
      <div class="photo-content" data-animate="fade-left" data-delay="1">
        <h1><?= $title; ?></h1>
        <?php if($subtitle){?>
          <h3><?= $subtitle; ?></h3>
        <?php } ?>
        <p><?= $content;?></p>
        <?php if($printLink){?>
          <a href="<?= $printLink['url'];?>">Purchase Prints</a>
        <?php } else { ?>
          <p>Prints coming soon</p>
        <?php } ?>
        <?php get_template_part( 'partials/02_molecule/post-navigation' ); ?> 
      </div>
      
      <div class="photo-full -<?= $orientation;?>">
        <div class="reveal" data-delay="2" data-animate="reveal-up"></div>
        <img src="<?= $photo['sizes']['full_screen'];?>" alt="Stephen Williams Photography, Jackson Wyoming" />
      </div>
    </section>
    
    <!-- <div class="kicker" data-animate="fade-left-2" data-delay="2">
      
    </div> -->
    
  </main>
  
<?php }
get_footer();