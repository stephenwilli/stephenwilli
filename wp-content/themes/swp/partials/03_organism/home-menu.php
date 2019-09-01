<?php 
  $bgTexture = get_field('home_menu_background_texture');
  $bgTitle = get_field('home_menu_background_title');
  $title = get_field('home_menu_title');
  $icon = get_field('home_menu_icon');
  $text = get_field('home_menu_text');
?>

<section class="home-menu" style="background-image: url('<?php echo $bgTexture['sizes']['full_screen']; ?>')">
  <h2 class="xl-header"><?php echo $bgTitle;?></h2>
  <img class="section-icon" src="<?php echo $icon['sizes']['large'];?>" />
  <div class="section-intro">
    <h1><?php echo $title;?></h1>
    <p><?php echo $text;?></p>
  </div>
  
</section>

