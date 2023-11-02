<div class="post-navigation">
  <?php
    $postID = get_field('photo_number');
    $seriesLink = get_field('series_link');
    $order = get_post_field('menu_order');
    if($order < 10){
      $order = '0' . $order;
    }
  ?>
    <div class="page-link -prev">
        <?php previous_post_link( '%link', '', $in_same_term = true, $excluded_terms = '',  $taxonomy = 'series'); ?>                
    </div>
    
    <div class="counter">
      <span class="post-number"><?= $order;?></span> <span class="total">// 10</span>
    </div>
    
    <div class="page-link -next">
        <?php next_post_link('%link', '', $in_same_term = true, $excluded_terms = '', $taxonomy = 'series'); ?>                    
    </div>
    <p>
      <a class="series-link" href="<?= $seriesLink['url'];?>">Back to Series</a>
    </p>
</div><!-- /section -->

