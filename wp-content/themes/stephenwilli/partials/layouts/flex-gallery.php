<?php
  $sectionTitle  = $data['fc_section_title'];
  $sectionText = $data['fc_section_text'];  
  $images = $data['fc_images'];  
?>

<section class="flex-gallery">

  <div class="js-mosaic-gallery gallery-mosaic">
      <?php if($sectionTitle){?>
        <a class="mosaic-image intro-card" href="<?php echo $full;?>">
          <h2 class="section-title"><?php echo $sectionTitle;?></h2>
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
        <div class="reveal" data-delay="2" data-animate="reveal-up"></div>
        <div class="overlay"></div>
        <img src="<?php echo $thumb;?>" alt="<?php echo $image['alt'];?> - Stephen Williams Photography"/>
      </a>
    <?php }?>
  </div>

</section><!-- /section -->

