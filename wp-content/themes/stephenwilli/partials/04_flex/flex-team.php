<?php 
  $sectionID = get_sub_field('fc_section_id');
  $sectionTitle = get_sub_field('fc_section_title');
  $sectionText = get_sub_field('fc_section_text');
  
?>

<section <?php if($sectionID){ ?>id="<?php echo $sectionID;?>"<?php } ?> class="flex-team">
  <?php if($sectionTitle){?>
    <h3 class="section-title"><?php echo $sectionTitle;?></h3>
  <?php } ?>
  <?php if($sectionText){?>
    <p><?php echo $sectionText;?></p>
  <?php } ?>
  
  <?php if(have_rows('fc_team_member')){ ?>
    <div class="team-wrap">
      <?php while(have_rows('fc_team_member')){ the_row();
          $teamImage = get_sub_field('fc_team_member_photo');
          $teamName = get_sub_field('fc_team_member_name');
          $teamAffiliation = get_sub_field('fc_team_member_affiliation');
          $teamBio = get_sub_field('fc_team_member_bio');
          $teamEmail = get_sub_field('fc_team_member_email');
        ?>
        <div class="team-item">
          <img class="team-image" src="<?php echo $teamImage['sizes']['square'];?>" alt="<?php echo $teamName;?>" />
          <?php if($teamName){?>
            <h3><?php echo $teamName;?></h3>
          <?php } if($teamAffiliation){ ?>
            <h5><?php echo $teamAffiliation;?></h5>
          <?php } if($teamEmail){ ?>
            <a href="mailto:<?php echo $teamEmail;?>" target="_blank"><strong><i class="icon icon-mail"></i> <?php echo $teamEmail;?></strong></a>
          <?php } if($teamBio){ ?>
            <p><?php echo $teamBio;?></p>
          <?php } ?> 
        </div>
      <?php } ?>
    </div>
  <?php } ?>
  
  
  <?php 
  
  $boardTitle = get_sub_field('fc_board_title');
  if(have_rows('fc_board_member')){ 
      
    ?>
    <div class="board-section">
      <?php echo file_get_contents(get_template_directory() . '/assets/images/svgs/wave-02.svg'); ?>
      <h3 class="section-title"><?php echo $boardTitle;?></h3>
      <div class="board-wrap">
        <?php while(have_rows('fc_board_member')){ the_row(); 
          $boardName = get_sub_field('fc_board_member_name');
          $boardBio = get_sub_field('fc_board_member_bio');
          $boardEmail = get_sub_field('fc_board_member_email');
          ?>
          <div class="board-item">
            <?php if($boardName){?>
              <h5><?php echo $boardName;?></h5>
            <?php } ?>
            <?php if($boardBio){?>
              <p><?php echo $boardBio;?></p>
            <?php } ?>
          </div>
        <?php }?>
      </div>
    </div>
  <?php }?>
</section><!-- /section -->

