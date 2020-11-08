<?php
  get_header();
  while ( have_posts() ) : the_post(); ?>
  
  <main class="page-main" role="main">
    <?php
      // PAGE HERO
      get_template_part( 'partials/03_organism/page-hero' );
      
      $content = get_the_content();
      if($content) {
        get_template_part( 'partials/03_organism/post-content' );
      }    
        
      // FLEXIBLE CONTENT
      get_template_part( 'partials/04_flex/flex-layouts' );
      
      get_template_part( 'partials/02_molecule/related-posts' ); 
      
      //get_template_part( 'partials/02_molecule/post-navigation' ); 
    ?>
  </main>
  
<?php endwhile;
get_footer();