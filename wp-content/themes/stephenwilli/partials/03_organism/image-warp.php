<?php if(have_rows('image_warp_slide', 'option')){ ?>
  <div id="js-hero-slider">
    <?php $i=1; while(have_rows('image_warp_slide', 'option')){ the_row();
      $overlay = get_sub_field('slide_overlay_image');
      $bgImage = get_sub_field('slide_bg_image');
    ?>
      <section id="image-warp-<?= $i;?>" class="cursor-compass">
        <div id="background-<?= $i;?>" style="background-image:url('<?= $bgImage;?>"></div>
        <div id="overlay-<?= $i;?>" style="background-image:url('<?= $overlay;?>');"></div>
      </section>
      <?php $i++; } ?>
  </div>
  <div class="hero-caption">
    <h1>Inversions</h1>
    <h3>Series 1</h3>
    <a href="/" class="btn">View Series</a>
  </div>
<?php } ?>