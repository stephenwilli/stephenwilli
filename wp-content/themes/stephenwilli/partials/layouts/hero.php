<?php
  $slides = $data['hero_slide'];
?>
<section class="home-hero">
  <div class="js-hero-slider">
    <?php foreach($slides as $slide) {
      $image = $slide['image'];
      $mobileimage = $slide['mobile_image'];
      $title = $slide['title'];
      $subtitle = $slide['subtitle'];
      $link = $slide['link'];
      ?>
      <div class="hero-slide" style="background-image: url('<?= $image['sizes']['large'];?>');">
        <div class="overlay"></div>
        <?php if($mobileimage){ ?>
          <img class="mobile-image" src="<?= $mobileimage['sizes']['large'];?>"/>
        <?php } ?>
        <div class="hero-caption">
            <h1><?= $title;?></h1>

            <?php if($subtitle){?>
              <h3><?= $subtitle;?></h3>
            <?php } ?>
            
            <?php if($link){?>
              <a href="<?= $link['url'];?>" class="button"><?= $link['title'];?></a>
            <?php } ?>
        </div>
      </div>
      <?php } ?>
    </div>

    <a href="" class="hero-scroll">
      <?= icon('arrow-right'); ?>
    </a>
  </section>