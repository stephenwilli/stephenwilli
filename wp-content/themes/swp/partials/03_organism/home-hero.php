<?php 
  $bgImage = get_field('hero_image');
  $overlay = get_field('hero_overlay');
?>

<section class="home-hero" style="background-image: url('<?php echo $bgImage['sizes']['full_screen']; ?>')">
  <img class="hero-overlay" src="<?php echo $overlay['sizes']['full_screen']; ?>">
</section>

