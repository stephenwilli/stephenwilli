<?php 
  $slides = get_field('hero_slide');
  // shuffle($slides);
  ?>
  <section class="js-hero-slider home-hero">
  <?php foreach($slides as $slide) {
    $image = $slide['slide_image'];
    $title = $slide['slide_title'];
    $subtitle = $slide['slide_subtitle'];
    $link = $slide['slide_link'];
    ?>
    <div class="hero-slide" style="background-image: url('<?= $image['sizes']['large'];?>');">
      <div class="hero-caption">
        <a href="<?= $link['url'];?>" class="block-link">
          <h1><?= $title;?></h1>
          <h3><?= $subtitle;?></h3>
          <a href="<?= $link['url'];?>" class="button"><?= $link['title'];?></a>
        </a>
      </div>
    </div>
    <?php } ?>
  </section>