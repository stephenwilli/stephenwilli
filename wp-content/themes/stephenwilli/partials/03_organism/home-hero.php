<section class="home-hero">
  <?php
    $heroType = get_field('home_hero_type');
    if($heroType ==='video') { 
        $videoURL = get_field('home_hero_video_url');
      ?>
      <div class="hero-video">
        <video playsinline autoplay muted loop>
         <source src="<?php echo $videoURL; ?>" type='video/mp4' />
        </video>
      </div>
      <div class="hero-caption">
        <h1 class="hero-title">
        </h1>
      </div>
      
    <?php } elseif($heroType ==='slider') { 
        if(have_rows('home_hero_slide')) {
      ?>

        <div id="js-hero-slider">
          <?php while(have_rows('home_hero_slide')) { the_row();
              $slideImage = get_sub_field('home_hero_image');
            ?>
            <div class="hero-slide">
              <div class="overlay"></div>
              <div class="hero-image" style="background-image:url('<?php echo $slideImage['sizes']['full_screen'];?>');">
              </div>
              <div class="hero-caption">
                <h1 class="hero-title">
                </h1>
              </div>
            </div>
          <?php } ?>
        </div>

      <?php }?>
    <?php } ?>
    
  </section><!-- /section -->




