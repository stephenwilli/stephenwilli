<section class="nav-sidebar">
  <?php
    $logo = get_field('site_primary_logo', 'option');
    $phone = get_field('site_phone_number', 'option');
    $address = get_field('site_address', 'option');
    $city = get_field('site_city', 'option');
    $state = get_field('site_state', 'option');
    $zip = get_field('site_zip_code', 'option');
  ?>
  
  <div class="sidebar-content">
    <img class="logo" src="<?php echo $logo['sizes']['large'];?>"/>

    <?php if(get_field('site_social_media_link','option')) : ?>
      <div class="social-bar">
      <?php while(has_sub_field('site_social_media_link','option')) : ?>
        <a href="<?php the_sub_field('social_media_link','option'); ?>" target="_blank"><i class="icon icon-<?php the_sub_field('site_social_media_site','option'); ?>"></i></a>
      <?php endwhile; ?>
      </div><!-- /social-bar -->
    <?php endif; ?>
    
  </div>
  
  <div class="sidebar-footer">
    <p><?php echo $address;?><br>
    <?php echo $city;?>, <?php echo $state;?> <?php echo $zip;?><br>
    <a href="tel:<?php echo $phone;?>"><?php echo $phone;?></a></p>
  </div>
</section>

