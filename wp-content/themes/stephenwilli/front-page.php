<?php
  get_header();
  while ( have_posts() ) : the_post(); ?>

  <section class="full-screen" style="background-image:url('<?php bloginfo( 'template_url' ); ?>/assets/images/crest_trail_55.jpg');">
    <?php
      // FLEXIBLE CONTENT
      //get_template_part( 'partials/03_organism/flex-layouts' ); 
    ?>
  </section>
  
<?php endwhile;
get_footer();