<?php 
  $sectionID = get_sub_field('fc_section_id');
  $sectionTitle = get_sub_field('fc_section_title');
?>

<section <?php if($sectionID){ ?>id="<?php echo $sectionID;?>"<?php } ?> class="flex-icon-columns">
  <?php if(have_rows('fc_icon_column')){?>
    <div class="icon-wrap">
      <?php while(have_rows('fc_icon_column')){ the_row(); 
          $icon = get_sub_field('fc_column_icon');
          $title = get_sub_field('fc_column_title');
          $link = get_sub_field('fc_column_link');
        ?>
        <div class="icon-column">
          <a href="<?php echo $link['url'];?>">
            <div class="icon">
              <img src="<?php echo $icon['sizes']['medium'];?>" alt="<?php echo $title;?>"/>
            </div>
            <h3 class="title"><?php echo $title;?></h3>
          </a>
        </div>
      <?php } ?>
    </div>
  <?php } ?>
</section><!-- /section -->

