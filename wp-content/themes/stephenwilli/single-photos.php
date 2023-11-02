<?php
  get_header();
  while(have_posts()) { the_post(); 
    $title = get_the_title();
    $content = get_the_content();
    $photo = get_field('featured_photo');
    $orientation = get_field('photo_orientation');
    $subtitle = get_field('photo_subtitle');
    $printLink = get_field('print_link');
    $kicker = get_field('photo_kicker');
  ?>
  
  <main class="single-photo" role="main">
    <section class="photo-wrap -<?= $orientation;?>">
      <div class="photo-content" data-animate="fade-left" data-delay="1">
        <h1 id="intro-title"><?= $title; ?></h1>
        <?php if($subtitle){?>
          <h3><?= $subtitle; ?></h3>
        <?php } ?>
        <p><?= $content;?></p>
        <?php if($printLink){?>
          <a href="<?= $printLink['url'];?>">Purchase Prints</a>
        <?php } else { ?>
          <p>Prints coming soon</p>
        <?php } ?>
        
        <?php if($kicker){?>
          <div class="kicker" data-animate="fade-left-2" data-delay="2">
            <p><?= $kicker;?></p>
          </div>
        <?php } ?>
        
        <?php render( 'post-navigation' ); ?> 
      </div>
      
      <div class="photo-full -<?= $orientation;?>">
        <div class="reveal" data-delay="2" data-animate="reveal-up"></div>
        <img src="<?= $photo['sizes']['large'];?>" alt="<?php the_title();?> - Stephen Williams Photography, Jackson Wyoming" />
      </div>
    </section>
    
  </main>
  
<?php }
get_footer();