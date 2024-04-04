<?php if(have_rows('hero_slide')){?>
  <section class="js-hero-slider home-hero">
  <?php while(have_rows('hero_slide')){ the_row();
    $image = get_sub_field('slide_image');
    $title = get_sub_field('slide_title');
    $subtitle = get_sub_field('slide_subtitle');
    $link = get_sub_field('slide_link');
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
<?php } ?>