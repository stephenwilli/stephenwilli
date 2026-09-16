<?php if(have_rows('social_media_link', 'option')): ?>
  <div class="social-links">
    <ul>
      <?php while(have_rows('social_media_link', 'option')): the_row();
        $icon = get_sub_field('social_media_site');
        $url = get_sub_field('social_media_url');
        ?>
        <li><a href="<?php echo $url;?>" target="_blank"><i class="icon icon-<?php echo $icon;?>"></i></a></li>
      <?php endwhile; ?>
    </ul>
  </div>
<?php endif;?>