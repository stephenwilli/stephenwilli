<?php
  $sectionTitle  = $data['section_title'];
  $sectionText = $data['section_text'];  
  $subhead = $data['subhead'];
  $items = $data['carousel_item'];
?>

<section class="flex-carousel pad-y" >
<?php if($sectionTitle){ ?>
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
<?php } ?>

<div class="js-carousel carousel-wrap" data-animate="fade-up">
    <?php foreach($items as $item){ 
          $type = $item['item_type'];
          $video = $item['video_url'];
          $props = json_encode(['video' => $video]); 
         $image = $item['image'];
         $text = $item['text'];
      ?>
      <?php if($type === 'image'){ ?>
        <div class="carousel-item">
          <img src="<?= $image['sizes']['large'];?>">
          <span><?= $text;?></span>
        </div>
      <?php } elseif($type === 'video'){ ?>
        <div class="carousel-item">
          <div class="hero" data-props='<?= $props ?>'>
          </div>
          <span><?= $text;?></span>
        </div>
      <?php } ?>

    <?php } ?>
</div>

</section><!-- /section -->

