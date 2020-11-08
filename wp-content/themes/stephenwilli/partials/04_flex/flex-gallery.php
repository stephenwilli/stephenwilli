<?php
  $sectionID = get_sub_field('fc_section_id');
  $sectionTitle = get_sub_field('fc_section_title');
  $images = get_sub_field('fc_images');
?>

<section <?php if($sectionID){ ?>id="<?php echo $sectionID;?>"<?php } ?> class="flex-gallery">
  <?php if($sectionTitle){?>
    <h3 class="section-title"><?php echo $sectionTitle;?></h3>
  <?php } ?>
  <div class="gallery-mosaic-<?php echo $sectionID;?>">
    <?php
        foreach( $images as $image ) {
        $thumb = $image['sizes']['large'];
        $full = $image['sizes']['full_screen'];
      ?>
      <a class="js-flex-gallery-img mosaic-image-<?php echo $sectionID;?>" href="<?php echo $full;?>">
        <div class="overlay"></div>
        <img src="<?php echo $thumb;?>" alt="<?php echo $image['alt'];?>"/>
      </a>
    <?php }?>
  </div>

</section><!-- /section -->

