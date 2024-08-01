<?php 
  $splits = $data['fc_split_half'];
?>
<section class="flex-split container pad-y">
    <div class="split-wrap">

      <?php 
        foreach($splits as $split){
          $type = $split['fc_split_half_type'];
          $text = $split['fc_text_editor'];
          $subhead = $split['fc_subhead'];
          $image1 = $split['fc_split_image_1'];
          $image2 = $split['fc_split_image_2'];
          $caption = $split['fc_split_image_caption'];
        ?>
        <?php if($type === 'text'){?>
          <div class="split-half -text flex-text" data-animate="fade-right" >
            <?php if($subhead){?>
              <h4><?= $subhead;?></h4>
            <?php } ?>
            <?= $text;?>
          </div>
        <?php } elseif($type === 'image'){?>
          <div class="split-half -image<?php if($image2){ ?>s<?php } ?>">
            <?php if($image1){?>
              <div class="image-1">
                <div class="reveal-wrap">
                  <div class="reveal" data-animate="reveal-up"></div>  
                  <img src="<?= $image1['sizes']['medium'];?>" alt="Stephen Williams Photography, Jackson Wyoming">
                </div>
                <?php if($caption){?>
                  <span data-animate="fade-in" class="caption"><?= $caption;?></span>
                <?php } ?>
              </div>
            <?php } ?>
            <?php if($image2){?>
              <div class="image-2">
                <div class="reveal-wrap">
                  <div class="reveal" data-animate="reveal-up"></div>  
                  <img src="<?= $image2['sizes']['medium'];?>" alt="Stephen Williams Photography, Jackson Wyoming">
                </div>
              </div>
            <?php } ?>
          </div>
          <?php } elseif($type === 'screen'){
              $video = $split['fc_split_screen_url'];
              $props = json_encode(['video' => $video]); 
            ?>
            <div class="split-half" data-animate="fade-up">
              <div class="screen-frame">
                <div class="hero" data-props='<?= $props; ?>'>
                </div>
              </div>
            </div>
      <?php } ?>
      <?php } ?>
    </div>
</section><!-- /section -->