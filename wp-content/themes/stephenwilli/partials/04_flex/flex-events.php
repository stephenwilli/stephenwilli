<?php
  $sectionID = get_sub_field('fc_section_id'); 
  $sectionTitle = get_sub_field('fc_section_title');
 ?>

<section <?php if($sectionID){ ?>id="<?php echo $sectionID;?>"<?php } ?> class="flex-events">
  <?php if($sectionTitle){?>
    <h3 class="section-title"><?php echo $sectionTitle;?></h3>
  <?php } ?>
  
  <div class="events-wrap">
    <?php 
      global $post;
      $events = tribe_get_events([ 
        'posts_per_page' => 3,
        'eventDisplay'		=>	'list' 
      ]);   
      
      foreach ( $events as $post ) {
        setup_postdata( $post ); 
        $image_id = get_post_thumbnail_id();
        list( $url, $width, $height ) = wp_get_attachment_image_src( $image_id, 'lg_thumb' );
        $month = tribe_get_start_time ( $post, 'F');
        $date = tribe_get_start_time ( $post, 'd');
        $startTime = tribe_get_start_time ( $post, 'g:ia');
        $startTime = ltrim($startTime, '0');
        $endTime = tribe_get_end_time ( $post, 'g:ia');
        $endTime = ltrim($endTime, '0');  
        ?>  
          <div class="event-item">
          </div>
      <?php } wp_reset_postdata();?>
  </div>
</section><!-- /section -->



