<?php
  $heroBGVideo = get_field('hero_background_video');
  $heroImage = get_field('hero_image');
  $heroLink = get_field('hero_video_link');
  $heroTitle = get_field('hero_title');
?>

<section class="home-hero" style="background-image:url('<?php echo $heroImage['sizes']['full_screen'];?>');">
  <div class="overlay"></div>
  <div class="cap-wrap">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="caption">
          <h1><?php echo $heroTitle;?></h1>
          <a href="<?php echo $heroLink;?>" class="js-popup-video play-button">
            <?php get_template_part( 'partials/02_molecule/play-button.svg' ); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section><!-- /section -->


