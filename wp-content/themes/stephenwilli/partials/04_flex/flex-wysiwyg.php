<?php 
  $sectionID = get_sub_field('fc_section_id');
?>

<section <?php if($sectionID){ ?>id="<?php echo $sectionID;?>"<?php } ?> class="flex-wysiwyg">
  <?php 
  $wysiwyg = get_sub_field('fc_wysiwyg');
  ?>
    <?php echo $wysiwyg;?>
</section><!-- /section -->

