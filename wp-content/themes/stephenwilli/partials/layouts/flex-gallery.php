<?php
  $sectionTitle  = $data['fc_section_title'];
  $sectionText = $data['fc_section_text'];  
  $images = $data['fc_images'];
  $subhead = $data['fc_subhead'];  
?>

<section class="flex-gallery container pad-y">

  <div class="js-mosaic-gallery gallery-mosaic">
      <?php if($sectionTitle){?>
        <a class="mosaic-image intro-card" href="<?= $full;?>">
          <?php if($subhead){?>
            <h4><?= $subhead;?></h4>
          <?php } ?>
          <h2 class="section-title"><?= $sectionTitle;?></h2>
          <?php if($sectionText){?>
            <p><?= $sectionText;?></p>
          <?php } ?>
        </a>
      <?php }?>
    <?php
        foreach( $images as $image ) {
        $thumb = $image['sizes']['large'];
        $full = $image['sizes']['large'];
        $caption = $image['caption'];
      ?>
      <a title="<?= $caption;?> - Stephen Williams Photography" class="js-flex-gallery-img mosaic-image" href="<?php echo $full;?>">
        <div class="reveal" data-animate="reveal-up"></div>
        <div class="overlay"></div>
        <div class="" data-animate="fade-in">
        <img src="<?= $thumb;?>" alt="<?= $image['alt'];?> - Stephen Williams Photography"/>
        </div>
      </a>
    <?php }?>
  </div>

</section><!-- /section -->

