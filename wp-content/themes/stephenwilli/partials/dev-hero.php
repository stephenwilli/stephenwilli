<?php
  $image = get_field('dev_hero_image');
  $imageBG = get_field('dev_hero_image_background');
  $heroTitle = get_field('dev_hero_title');
?>

<section class="dev-hero">
      
  <div class="screen-overlay">
    <img class="hero-image" src="<?= $image['sizes']['full_screen'];?>"/>
    <span id="js-cursor-circle" class="circle-follow">
    </span>
  </div>
  <div class="screen-wrap">

    <img class="image-bg mask-bg-color" src="<?= $imageBG['sizes']['full_screen'];?>"/>
  </div>
  
  <div class="dev-hero-caption">
      <h1><?= $heroTitle;?></h1>
      <!-- <a href="<?= $heroLink['url'];?>" class="btn"><?= $heroLink['title'];?></a> -->
  </div>
  <!-- <div class="kicker">
    <p><?= $kicker;?></p>
  </div> -->
</section>



