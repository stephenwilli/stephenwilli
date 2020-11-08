<?php 
  $heroImage = get_field('page_hero_image');
  $custom = get_field('page_hero_custom_title');
  if($custom){
    $title = get_field('page_hero_custom_title_text');
  } else {
    $title = get_the_title();
  }
  if(!$heroImage){
    $images = get_field( 'default_header_image', 'option' );
    $rand = rand(0, (count($images) - 1));
    $heroImage = $images[$rand]['header_image']; 
  }
  $credit = $heroImage['caption'];
?>

<section class="page-hero" style="background-image: url('<?php echo $heroImage['sizes']['full_screen'];?>')">
  <div class="overlay"></div>
  <h1 class="hero-title"><?php echo $title;?></h1>
  <?php if($credit){?>
    <span class="photo-credit">Photo: <?php echo $credit;?></span>
  <?php }?>
</section><!-- /section -->




