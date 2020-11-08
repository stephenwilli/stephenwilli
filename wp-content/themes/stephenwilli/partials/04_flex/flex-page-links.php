<?php 
  $leftLink = get_sub_field('fc_left_page_link');
  $leftImage = get_the_post_thumbnail_url( $leftLink, 'large' );
  $rightLink = get_sub_field('fc_right_page_link');
  $rightImage = get_the_post_thumbnail_url( $rightLink, 'large' );
 ?>


<section class="flex-page-links">
  
  <a href="<?php echo get_permalink( $leftLink );?>" class="page-link -left" style="background-image: url('<?php echo $leftImage;?>')">
    <div class="overlay"></div>
    <i class="icon icon-angle-left"></i>
    <h4 class="title"></h4>
  </a>

  <a href="<?php echo get_permalink( $rightLink );?>" class="page-link -right" style="background-image: url('<?php echo $rightImage;?>')">
    <div class="overlay"></div>
    <i class="icon icon-angle-right"></i>
    <h4 class="title"></h4>
  </a>

</section><!-- /section -->

