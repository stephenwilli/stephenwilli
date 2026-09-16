<?php
  $heroTitle = get_field('home_hero_title');
  $subtitle = get_field('home_hero_subtitle');
  $heroLink = get_field('home_hero_link');
  $kicker = get_field('home_hero_kicker');
?>

<section class="home-hero">
  <?php 
      $slides = get_field( 'home_hero_slide' );
      $rand = rand(0, (count($slides) - 1));
      $slides[$rand]['slide_image_bg'];
      $bgImage = $slides[$rand]['slide_image_bg'];
      $overlay = $slides[$rand]['slide_image_overlay'];
    ?>
    <div id="image-warp" class="cursor-compass image-warp">
      <div id="background" style="background-image:url('<?= $bgImage;?>"></div>
      <div id="overlay" style="background-image:url('<?= $overlay;?>');"></div>
    </div>
  
  <div class="hero-caption">
    <a href="<?= $heroLink['url'];?>" class="block-link">
      <h1><?= $heroTitle;?></h1>
      <h3><?= $subtitle;?></h3>
      <a href="<?= $heroLink['url'];?>" class="button"><?= $heroLink['title'];?></a>
    </a>
  </div>
  <div class="kicker">
    <p><?= $kicker;?></p>
  </div>
</section>