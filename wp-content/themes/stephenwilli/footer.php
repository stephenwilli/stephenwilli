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

</body>
</html> 