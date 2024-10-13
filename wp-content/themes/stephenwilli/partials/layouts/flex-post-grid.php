<?php
  $sectionTitle  = $data['fc_section_title'];
  $sectionText = $data['fc_section_text'];  
  $items = $data['fc_grid_items'];
  $subhead = $data['fc_subhead'];  
?>

<section class="flex-gallery container pad-y">

  <div class="js-mosaic-gallery gallery-mosaic -projects">
      <?php if($sectionTitle){?>
        <div class="mosaic-image intro-card">
          <?php if($subhead){?>
            <h4><?= $subhead;?></h4>
          <?php } ?>
          <h2 class="section-title"><?= $sectionTitle;?></h2>
          <?php if($sectionText){?>
            <p><?= $sectionText;?></p>
          <?php } ?>
          </div>
      <?php }?>
    <?php
        foreach( $items as $post ) {
          setup_postdata($post);
          $terms = get_the_terms(get_the_ID(), 'project-categories');
          $photo = get_the_post_thumbnail_url(get_the_ID(),'large');
      ?>
        <a class="mosaic-image" href="<?php the_permalink();?>">
        <div class="reveal" data-animate="reveal-up"></div>
          <div class="overlay"></div>
          <img class="thumbnail" src="<?= $photo;?>" alt="<?php the_title();?> - Stephen Williams Photography"/>
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

