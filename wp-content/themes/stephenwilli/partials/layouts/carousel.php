<?php
  $sectionTitle  = $data['section_title'];
  $sectionText = $data['section_text'];  
  $subhead = $data['subhead'];
  $items = $data['carousel_item'];
?>

<section class="flex-carousel pad-y" >
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

<div class="js-carousel carousel-wrap" data-animate="fade-up">
    <?php foreach($items as $item){ 
         $image = $item['image'];
         $text = $item['text'];
      ?>
      <div class="carousel-item">
        <img src="<?= $image['sizes']['large'];?>">
        <span><?= $text;?></span>
      </div>
    <?php } ?>
</div>

</section><!-- /section -->

