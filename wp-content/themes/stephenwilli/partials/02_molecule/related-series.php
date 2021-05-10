<section class="related-posts">
  <div class="posts-wrap">
  <?php
    $prevSeries = get_field('previous_series');
    ?>
    <div class="post-link -prev">
      <?php if($prevSeries){ 
        $prevThumbnail = get_the_post_thumbnail_url($prevSeries->ID, 'large' );
        ?>
          <a href="<?php echo $prevSeries->guid ?>">
            <h4>Previous Series</h4>
            <h2><?php echo $prevSeries->post_title ?></h2>
          </a>
      <?php } ?>
    </div>
    
    <?php
    $nextSeries = get_field('next_series');?>
      <div class="post-link -next">
        <?php if($nextSeries) { 
          $nextThumbnail = get_the_post_thumbnail_url($nextSeries->ID, 'large' );?>
            <a href="<?php echo $nextSeries->guid ?>">
              <h4>Next Series</h4>
              <h2><?php echo $nextSeries->post_title ?></h2>
            </a>
        <?php } ?>
      </div>
  </div>
</section>

