<div class="contact-nav">
<?php if(have_rows('social_media_link', 'option')){ ?>
  <div class="social-links">
    <?php while(have_rows('social_media_link', 'option')){ the_row();
      $icon = get_sub_field('social_media_site');
      $url = get_sub_field('social_media_link');
      ?>
      <a class="social-link" href="<?= $url;?>" target="_blank"><?= icon($icon); ?></a>
    <?php } ?>
          <?php
      $items = WC()->cart->get_cart_contents_count();
      if($items != 0){
    ?>
      <a class="social-link cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"><?= icon('cart'); ?></a>
    <?php } ?>

  </div>
<?php }?>
</div>