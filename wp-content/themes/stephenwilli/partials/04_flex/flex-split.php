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
          <div class="split-half -text flex-text" data-animate="fade-right" data-delay="1">
            <?= $text;?>
          </div>
        <?php } elseif($type === 'image'){?>
          <div class="split-half -image<?php if($image2){ ?>s<?php } ?>">
            <?php if($image1){?>
              <div class="image-1">
                <div class="reveal-wrap">
                  <div class="reveal" data-delay="1" data-animate="reveal-up"></div>  
                  <img src="<?= $image1['sizes']['full_screen'];?>" alt="Stephen Williams Photography, Jackson Wyoming">
                </div>
              </div>
            <?php } ?>
            <?php if($image2){?>
              <div class="image-2">
                <div class="reveal-wrap">
                  <div class="reveal" data-delay="1" data-animate="reveal-up"></div>  
                  <img src="<?= $image2['sizes']['full_screen'];?>" alt="Stephen Williams Photography, Jackson Wyoming">
                </div>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  <?php } ?>
</section><!-- /section -->

