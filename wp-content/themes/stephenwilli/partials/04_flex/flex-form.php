<?php
  $sectionID = get_sub_field('fc_section_id');
  $sectionTitle = get_sub_field('fc_section_title');
  $sectionText = get_sub_field('fc_section_text');
  $form = get_sub_field('fc_form_shortcode');
 ?>

<section <?php if($sectionID){ ?>id="<?php echo $sectionID;?>"<?php } ?> class="flex-form">
  <div class="form-wrap">
    <?php if($sectionTitle){?>
      <h3 class="section-title"><?php echo $sectionTitle;?></h3>
    <?php } ?>
    
    <?php if($sectionText){?>
      <p class="section-text"><?php echo $sectionText;?></p>
    <?php } ?>
    
    <div id="flex-form" class="form">
      <?php echo do_shortcode($form);?>
    </div>
  </div>
</section>
