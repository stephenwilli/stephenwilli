<?php 
  $modalTitle = get_field('modal_title', 'option');
  $modalText = get_field('modal_text', 'option');
  $modalContent = get_field('modal_content', 'option');
?>

<div id="form-modal" class="form-modal mfp-hide">
  <?php if($modalTitle) { ?>
    <h3><?php echo $modalTitle;?></h3>
  <?php } ?>
  <?php if($modalText) { ?>
    <p><?php echo $modalText;?></p>
  <?php } ?>
  <?php if($modalContent) { ?>
    <div class="form-wrap">
      <?php echo $modalContent;?>
    </div>
  <?php } ?>

</div>