<?php
  get_header(); 
  $postImage = get_the_post_thumbnail_url(get_the_ID(),'full_screen');
  $role = get_field('project_role');
  $terms = get_the_terms(get_the_ID(), 'category');
  $credits = get_field('project_credits');
  $terms = get_the_terms(get_the_ID(), 'project-categories');
?>

  <section class="content-wrap container pad-b" data-animate="fade-right" data-delay="1">
      <div class="post-content">
        <h1 class="h2" id="intro-title"><?php the_title();?></h1>
        <div class="post-meta">
          <ul class="credits">
          <?php if(!empty($terms)) {
              foreach($terms as $term){
              $term = array_pop($terms);
              $catLink = get_term_link($term);
              $catTitle = $term->name; ?>
                <a class="cat-link" href="<?= $catLink;?>"><?= $catTitle;?></a>
              <?php } }?> 
            <?php foreach($credits as $credit){ 
              $text = $credit['credit'];
              ?>
              <li><?= $text;?></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="post-image">
        <div class="reveal-wrap">
          <div class="reveal" data-delay="1" data-animate="reveal-up"></div>  
          <img src="<?= $postImage;?>" alt="<?php the_title();?>">
        </div>
      </div>
    </section>

  <section class="flex-wysiwyg container-center pad-b" data-animate="fade-right" data-delay="1">
    <?php the_content();?>
  </section><!-- /section -->

  <?php render( 'sections' ); ?>
  
  <?php
get_footer();