<?php
  $sectionTitle  = $data['section_title'];
  $sectionText = $data['section_text'];  
  $image = $data['screen_image'];  
  $video = $data['screen_video'];  
?>

<section class="flex-screen pad-y" data-animate="fade-right" data-delay="1">
<div class="container-center">
  <?php if($sectionTitle){ ?>
    <h2><?= $sectionTitle;?></h2>
  <?php } ?>

  <?php if($sectionText){ ?>
    <div class="content"><?= $sectionText;?></div>
  <?php } ?>
</div>

<div class="container">
  <div class="screen-frame">
    <img src="<?= $image['sizes']['full_screen'];?>">
  </div>
</div>

</section><!-- /section -->

