<section class="related-posts">
  <div class="posts-wrap">
  <?php
    $prevProject = get_field('previous_project');
    $prevUrl = get_permalink($prevProject->ID);
    ?>
    <div class="post-link -prev">
      <?php if($prevProject){ 
        $prevThumbnail = get_the_post_thumbnail_url($prevProject->ID, 'large' );
        ?>
          <a href="<?= $prevUrl;?>">
            <h4>Previous Project</h4>
            <h2><?php echo $prevProject->post_title ?></h2>
            <?= icon('arrow-right'); ?>
          </a>
      <?php } ?>
    </div>
    
    <?php
    $nextProject = get_field('next_project');
    $nextUrl = get_permalink($nextProject->ID);
    ?>
      <div class="post-link -next">
        <?php if($nextProject) { 
          $nextThumbnail = get_the_post_thumbnail_url($nextProject->ID, 'large' );?>
            <a href="<?= $nextUrl;?>">
              <h4>Next Project</h4>
              <h2><?php echo $nextProject->post_title ?></h2>
              <?= icon('arrow-left'); ?>
            </a>
        <?php } ?>
      </div>
  </div>
</section>