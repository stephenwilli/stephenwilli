<section class="flex-split">
  <?php if(have_rows('fc_split_half')) {?>
    <div class="split-wrap">
      <?php while(have_rows('fc_split_half')) { the_row();
          $type = get_sub_field('fc_split_half_type');
          $text = get_sub_field('fc_text_editor');
          $image1 = get_sub_field('fc_split_image_1');
          $image2 = get_sub_field('fc_split_image_2');
        ?>
        <?php if($type === 'text'){?>
          <div class="split-half -text">
            <?= $text;?>
          </div>
        <?php } elseif($type === 'image'){?>
          <div class="split-half -image">
            <?php if($image1){?>
              <img src="<?= $image1['sizes']['full_screen'];?>" alt="Stephen Williams Photography, Jackson Wyoming">
            <?php } ?>
            <?php if($image2){?>
              <img src="<?= $image2['sizes']['full_screen'];?>" alt="Stephen Williams Photography, Jackson Wyoming">
            <?php } ?>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  <?php } ?>
</section><!-- /section -->

