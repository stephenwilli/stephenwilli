<section class="related-posts">
  <div class="posts-wrap">
  <?php
    $prevSeries = get_field('previous_series');
    $prevUrl = get_permalink($prevSeries->ID);
    ?>
    <div class="post-link -prev">
      <?php if($prevSeries){ 
        $prevThumbnail = get_the_post_thumbnail_url($prevSeries->ID, 'large' );
        ?>
          <a href="<?= $prevUrl;?>">
            <h4>Previous Series</h4>
            <h2><?php echo $prevSeries->post_title ?></h2>
            <?= icon('arrow-right'); ?>
          </a>
      <?php } ?>
    </div>
    
    <?php
    $nextSeries = get_field('next_series');
    $nextUrl = get_permalink($nextSeries->ID);
    ?>
      <div class="post-link -next">
        <?php if($nextSeries) { 
          $nextThumbnail = get_the_post_thumbnail_url($nextSeries->ID, 'large' );?>
            <a href="<?= $nextUrl;?>">
              <h4>Next Series</h4>
              <h2><?php echo $nextSeries->post_title ?></h2>
              <?= icon('arrow-left'); ?>
            </a>
        <?php } ?>
      </div>
  </div>
</section>

