<?php
  $sectionTitle  = $data['section_title'];
  $sectionText = $data['section_text'];  
  $image = $data['image'];  
  $subhead = $data['subhead'];
?>

<section class="flex-full pad-y">
<div class="container-center content" data-animate="fade-up">

  <?php if($subhead){?>
    <h4><?= $subhead;?></h4>
  <?php } ?>

  <?php if($sectionTitle){ ?>
    <h2><?= $sectionTitle;?></h2>
  <?php } ?>

  <?php if($sectionText){ ?>
    <div><?= $sectionText;?></div>
  <?php } ?>
</div>

<img src="<?= $image;?>" alt="" data-animate="fade-up">

</section><!-- /section -->

