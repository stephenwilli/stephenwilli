<?php
  $sectionID = get_sub_field('fc_section_id');
  $sectionTitle = get_sub_field('fc_section_title');
?>

<section <?php if($sectionID){ ?>id="<?php echo $sectionID;?>"<?php } ?> class="flex-image-columns">
  <?php if($sectionTitle){?>
    <h3 class="section-title"><?php echo $sectionTitle;?></h3>
  <?php } ?>
  
  <?php if(have_rows('fc_image_column')) {?>
      <?php while(have_rows('fc_image_column')) { the_row();
          $title = get_sub_field('fc_image_column_title');
          $text = get_sub_field('fc_image_column_text');
          $btn = get_sub_field('fc_image_column_btn');
          $image = get_sub_field('fc_image_column_image');
        ?>
        <div class="column-wrap">
          <div class="column-image">
            <img src="<?php echo $image['sizes']['lg_thumb'];?>" alt="<?php echo $title;?>">
          </div>
          <div class="column-text">
            <?php if($title){ ?>
              <h3 class="column-title"><?php echo $title;?></h2>
            <?php } if($text){ ?>
              <p><?php echo $text;?></p>
            <?php } if($btn){ ?>
              <a class="btn" href="<?php echo $btn['url'];?>"><?php echo $btn['title'];?></a>
            <?php } ?>
          </div>
        </div>
      <?php } ?>

  <?php } ?>
</section><!-- /section -->

