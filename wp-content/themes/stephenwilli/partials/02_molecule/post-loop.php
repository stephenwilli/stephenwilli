<?php 
  $date = get_the_date('F j, Y');
  $link = get_field('press_link');
    $url = get_the_permalink();
  
  if ( has_post_thumbnail() ) { 
    $image = get_the_post_thumbnail_url($post->ID, 'lg_thumb');
  } else {
    $imageObject = get_field('default_image', 'option');
    $image = $imageObject['sizes']['lg_thumb'];
  }
  
  
?>
  <div class="loop-item">
    <a class="loop-thumb" href="<?php echo $url;?>">
      <img src="<?php echo $image; ?>" alt="<?php the_title();?>">
    </a>

    <h3 class="loop-title">
      <a href="<?php echo $url;?>"><?php the_title(); ?></a>
    </h3>
    <div class="loop-meta">
      <?php echo $date; ?>
    </div>

    <div class="loop-content">
      <?php the_excerpt(); ?>
      <a class="btn btn-red" href="<?php echo $url;?>">Read More</a>
    </div>
  </div>