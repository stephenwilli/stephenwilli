<section class="related-posts">
  <div class="posts-wrap">
  <?php
    $prevPost = get_previous_post();?>
    <div class="post-link -prev">
      <?php if($prevPost){ 
        $prevThumbnail = get_the_post_thumbnail_url($prevPost->ID, 'large' );
        ?>
          <a href="<?php echo $prevPost->guid ?>">
            <h4>Previous Post</h4>
            <h2><?php echo $prevPost->post_title ?></h2>
          </a>
      <?php } ?>
    </div>
    
    <?php
    $nextPost = get_next_post();?>
      <div class="post-link -next">
        <?php if($nextPost) { 
          $nextThumbnail = get_the_post_thumbnail_url($nextPost->ID, 'large' );?>
            <a href="<?php echo $nextPost->guid ?>">
              <h4>Next Post</h4>
              <h2><?php echo $nextPost->post_title ?></h2>
            </a>
        <?php } ?>
      </div>
  </div>
    <div class="back-link">
      <a href="/photo-journal/">Back to Photo Journal</a>
    </div>
</section>

