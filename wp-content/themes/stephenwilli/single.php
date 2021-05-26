<?php
  get_header(); 
  while (have_posts()):the_post();
  $postImage = get_the_post_thumbnail_url(get_the_ID(),'full_screen');
  $date = get_the_date('F j, Y');
  $terms = get_the_terms(get_the_ID(), 'category');
?>
  <main class="main-wrap">
    <section class="content-wrap" data-animate="fade-right" data-delay="1">
      <div class="post-content">
        <h1 id="intro-title"><?php the_title();?></h1>
        <div class="post-meta">
          <p><?= $date ?> / / 
            <?php if(!empty($terms)) {
              foreach($terms as $term){
              $term = array_pop($terms);
              $catLink = get_term_link($term);
              $catTitle = $term->name; ?>
                <a class="cat-link" href="<?= $catLink;?>"><?= $catTitle;?></a>
              <?php } }?> 
            </p>
          <?php  
            get_template_part( 'partials/02_molecule/social-share' ); 
          ?>
        </div>
        <?php the_content();?>
      </div>
      <div class="post-image">
        <div class="reveal-wrap">
          <div class="reveal" data-delay="1" data-animate="reveal-up"></div>  
          <img src="<?= $postImage;?>" alt="<?php the_title();?>">
        </div>
      </div>
    </section>
    <?php  
      get_template_part( 'partials/04_flex/flex-layouts' ); 
    ?>
    
    <?php  
      get_template_part( 'partials/02_molecule/related-posts' ); 
    ?>
  </main>
  <?php endwhile; 
get_footer();