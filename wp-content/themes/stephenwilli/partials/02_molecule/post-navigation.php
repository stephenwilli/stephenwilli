<section class="post-navigation">
  <?php
    $prevPost = get_previous_post(true);
    if($prevPost) {   
      $prevThumbnail = get_the_post_thumbnail_url($prevPost->ID, 'full_screen');
      if(!$prevThumbnail){
        $images = get_field( 'default_header_image', 'option' );
        $rand = rand(0, (count($images) - 1));
        $image = $images[$rand]['header_image'];
        $prevThumbnail = $image['sizes']['full_screen'];
      }
      ?>
      <a href="<?php echo $prevPost->guid ?>" class="page-link -left" style="background-image: url('<?php echo $prevThumbnail;?>')">
        <div class="overlay"></div>
        <div class="text-conent">
          <i class="icon icon-angle-left"></i>
          <h5>Previous Post</h5>
          <h4 class="back-title"><?php echo $prevPost->post_title ?></h4>
          <?php echo get_the_excerpt( $prevPost->ID ); ?>
        </div>
      </a>
    <?php } ?>
    
    <?php
      $nextPost = get_previous_post(true);
      if($nextPost) {   
        $nextThumbnail = get_the_post_thumbnail_url($nextPost->ID, 'full_screen');
        if(!$nextThumbnail){
          $images = get_field( 'default_header_image', 'option' );
          $rand = rand(0, (count($images) - 1));
          $image = $images[$rand]['header_image'];
          $nextThumbnail = $image['sizes']['full_screen'];
        }
        ?>
        <a href="<?php echo $nextPost->guid ?>" class="page-link -left" style="background-image: url('<?php echo $$nextThumbnail;?>')">
          <div class="text-conent"></div>
          <div class="">
            <i class="icon icon-angle-left"></i>
            <h5>Next Post</h5>
            <h4 class="back-title"><?php echo $nextPost->post_title ?></h4>
            <?php echo get_the_excerpt( $nextPost->ID ); ?>
          </div>
        </a>
      <?php } ?>



</section><!-- /section -->