<?php
  $sectionTitle  = $data['fc_section_title'];
  $sectionText = $data['fc_section_text'];  
  $items = $data['fc_grid_items'];
  $subhead = $data['fc_subhead'];  
?>

<section class="flex-gallery container pad-y">

  <div class="js-mosaic-gallery gallery-mosaic -projects">
      <?php if($sectionTitle){?>
        <a class="mosaic-image intro-card" href="<?= $full;?>">
          <?php if($subhead){?>
            <h4><?= $subhead;?></h4>
          <?php } ?>
          <h2 class="section-title"><?= $sectionTitle;?></h2>
          <?php if($sectionText){?>
            <p><?= $sectionText;?></p>
          <?php } ?>
        </a>
      <?php }?>
    <?php
        foreach( $items as $post ) {
          setup_postdata($post);
          $terms = get_the_terms(get_the_ID(), 'project-categories');
      ?>
      <a title="<?php the_title();?> - Stephen Williams Photography" class="mosaic-image" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium') ?>
        <div class="project-text">
          <h3><?php the_title();?></h3>
          <?php if(!empty($terms)) {
              foreach($terms as $term){
              $term = array_pop($terms);
              $catLink = get_term_link($term);
              $catTitle = $term->name; ?>
                <span class="cat-link" href="<?= $catLink;?>"><?= $catTitle;?></span>
              <?php } }?> 
        </div>
      </a>
    <?php  } wp_reset_postdata();?>
  </div>

</section><!-- /section -->

