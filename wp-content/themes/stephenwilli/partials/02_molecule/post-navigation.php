<div class="post-navigation">
  <?php
    $next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID );
    $previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID );
    $postID = get_field('photo_number');
  ?>
  <?php
    if($previous_post_url) {   
    ?>
      <a href="<?= $previous_post_url; ?>" class="page-link -prev"><i class="icon icon-arrow-right"></i></a>
  <?php } ?>
  <div class="counter">
    <span class="post-number">07</span> <span class="total">// 10</span>
  </div>
  <?php
    if($next_post_url) {   
    ?>
      <a href="<?= $next_post_url; ?>" class="page-link -next"><i class="icon icon-arrow-left"></i></a>
  <?php } ?>
</div><!-- /section -->

