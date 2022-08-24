<?php
  $heroTitle = get_field('home_hero_title');
  $subtitle = get_field('home_hero_subtitle');
  $heroLink = get_field('home_hero_link');
  $slides = get_field('image_warp_slide', 'option');
  $rand = rand(0, (count($slides) - 1));
  $overlay = $slides[$rand]['slide_overlay_image'];
  $bgImage = $slides[$rand]['slide_bg_image'];
?>
  <div id="js-hero-slider">
      <section id="image-warp" class="cursor-compass">
        <div id="background" style="background-image:url('<?= $bgImage;?>"></div>
        <div id="overlay" style="background-image:url('<?= $overlay;?>');"></div>
      </section>
  </div>
  <div class="hero-caption">
    <a href="<?= $heroLink['url'];?>" class="block-link">
      <h1 class="js-reveal-title"><?= $heroTitle;?></h1>
      <h4><?= $subtitle;?></h4>
      <a href="<?= $heroLink['url'];?>" class="btn"><?= $heroLink['title'];?></a>
    </a>
  </div>
