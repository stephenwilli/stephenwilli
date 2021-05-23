<footer class="footer">
  <?php	edit_post_link( __( 'Edit', '_s' ), '<span class="post-edit-link">', '</span>' ); ?>
  <?php 
  if(have_rows('footer_links', 'option')){ ?> 
    <div class="footer-links">
      <?php while(have_rows('footer_links', 'option')){ the_row();
        $link = get_sub_field('footer_link');
        ?>
          <a class="footer-link" href="<?= $link['url'];?>"><?= $link['title'];?></a>
      <?php } ?>
    </div>
  <?php } ?>
  <div class="copyright">
    <p><?php echo sprintf( __( '%1$s %2$s %3$s.'), '&copy;', date('Y'), esc_html(get_bloginfo('name')) );  ?></p>
  </div>
</footer>
<?php wp_footer(); ?>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html> 