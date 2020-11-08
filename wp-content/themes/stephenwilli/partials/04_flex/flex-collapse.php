<?php
  $sectionID = get_sub_field('fc_section_id'); 
  $sectionTitle = get_sub_field('fc_section_title');
  $sectionText = get_sub_field('fc_section_text');
 ?>

<section <?php if($sectionID){ ?>id="<?php echo $sectionID;?>"<?php } ?> class="flex-collapse">
  <?php if($sectionTitle){?>
    <h3 class="section-title"><?php echo $sectionTitle;?></h3>
  <?php } ?>

  <?php if($sectionText){?>
    <p class="section-text"><?php echo $sectionText;?></p>
  <?php } ?>
  
  <?php if(have_rows('fc_collapse_item')){ ?>
    <div class="collapse-wrap">
      <?php $i=1; while(have_rows('fc_collapse_item')){ the_row();
          $itemTitle = get_sub_field('fc_collapse_item_title');
          $itemText = get_sub_field('fc_collapse_item_text');
          $itemLink = get_sub_field('fc_collapse_item_button');
        ?>
        <div id="js-collapse-<?php echo $i;?>" class="collapse-item">
          <h5 class="collapse-title"><?php echo $itemTitle;?></h5>
          <div class="collapse-text">
            <p><?php echo $itemText;?></p>
            <?php if($itemLink){?>
              <a class="btn" href="<?php echo $itemLink['url'];?>"><?php echo $itemLink['title'];?></a>
            <?php } ?>
          </div>
        </div>
      <?php $i++; } ?>
    </div>
  <?php } ?>
</section>
