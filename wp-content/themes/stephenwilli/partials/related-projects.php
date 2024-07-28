<section class="related-posts">
  <div class="posts-wrap">
  <?php
    $prevPost = get_previous_post();
    if($prevPost) { 
      $prevUrl = get_permalink($prevPost->ID);
    }
    ?>
    <div class="post-link -prev">
      <?php if($prevPost){ 
        $prevThumbnail = get_the_post_thumbnail_url($prevPost->ID, 'large' );
        ?>
          <a href="<?= $prevUrl; ?>">
            <h4>Previous Project</h4>
            <h2><?php echo $prevPost->post_title ?></h2>
            <?= icon('arrow-right'); ?>
          </a>
      <?php } ?>
    </div>
    
    <?php
    $nextPost = get_next_post();
    if($nextPost) { 
      $nextUrl = get_permalink($nextPost->ID);
    }
    ?>
      <div class="post-link -next">
        <?php if($nextPost) { 
          $nextThumbnail = get_the_post_thumbnail_url($nextPost->ID, 'large' );?>
            <a href="<?= $nextUrl; ?>">
              <h4>Next Project</h4>
              <h2><?php echo $nextPost->post_title ?></h2>
              <?= icon('arrow-left'); ?>
            </a>
        <?php } ?>
      </div>
  </div>
    <div class="back-link">
      <a href="/projects/">Back to Projects</a>
    </div>
</section>

