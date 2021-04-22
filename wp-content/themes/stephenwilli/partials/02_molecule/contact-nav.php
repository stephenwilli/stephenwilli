<div class="contact-nav">
<?php if(have_rows('social_media_link', 'option')): ?>
  <div class="social-links">
    <?php while(have_rows('social_media_link', 'option')): the_row();
      $icon = get_sub_field('social_media_site');
      $url = get_sub_field('social_media_url');
      ?>
      <a href="<?php echo $url;?>" target="_blank"><i class="icon icon-<?php echo $icon;?>"></i></a>
    <?php endwhile; ?>
  </div>
<?php endif;?>
</div>