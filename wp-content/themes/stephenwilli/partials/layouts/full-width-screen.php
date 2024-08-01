<?php
  $sectionTitle  = $data['section_title'];
  $sectionText = $data['section_text'];  
  $image = $data['screen_image'];  
  $video = $data['screen_video'];
  $props = json_encode(['video' => $video]);  
  $subhead = $data['subhead'];
?>

<section class="flex-screen pad-y" >
<div class="container-center" data-animate="fade-up">

  <?php if($subhead){?>
    <h4><?= $subhead;?></h4>
  <?php } ?>

  <?php if($sectionTitle){ ?>
    <h2><?= $sectionTitle;?></h2>
  <?php } ?>

  <?php if($sectionText){ ?>
    <div class="content"><?= $sectionText;?></div>
  <?php } ?>
</div>

<div class="container-center" data-animate="fade-up">
  <div class="screen-frame">

    <?php if($image){?>
      <img src="<?= $image['sizes']['large'];?>">
    <?php } ?>

    <?php if($video){?>
      <div class="hero" data-props='<?= $props; ?>'>
      </div>
    <?php } ?>

  </div>
</div>

</section><!-- /section -->

