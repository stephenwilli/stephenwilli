<?php 
  $bgTexture = get_field('home_intro_background_texture');
  $bgTitle = get_field('home_intro_background_title');
  $title = get_field('home_intro_title');
  $icon = get_field('home_intro_icon');
  $text = get_field('home_intro_text');
?>

<section class="home-intro" style="background-image: url('<?php echo $bgTexture['sizes']['full_screen']; ?>')">
  <h2 class="xl-header"><?php echo $bgTitle;?></h2>
  <img class="section-icon" src="<?php echo $icon['sizes']['large'];?>" />
  <div class="section-intro">
    <h1><?php echo $title;?></h1>
    <p><?php echo $text;?></p>
  </div>
  
  <?php 
    $images = get_field('home_intro_gallery');
    $galleryLink = get_field('home_intro_gallery_link');
    if($images){
      ?>
      <div id="js-intro-gallery">
        <?php foreach ($images as $image) { ?>
          <div class="gallery-image">
            <img src="<?php echo $image['sizes']['large'];?>"/>
          </div>
        <?php } ?>
      </div>
      <a href="<?php echo $galleryLink['url'];?>"><?php echo $galleryLink['title'];?></a>
  <?php } ?>
</section>

