<?php
  get_header(); 
  $postImage = get_the_post_thumbnail_url(get_the_ID(),'full_screen');
  $role = get_field('project_role');
  $terms = get_the_terms(get_the_ID(), 'category');
  $credits = get_field('project_credits');
?>

  <section class="content-wrap container pad-b" data-animate="fade-right" data-delay="1">
      <div class="post-content">
        <h1 class="h2" id="intro-title"><?php the_title();?></h1>
        <div class="post-meta">
          <ul class="credits">
            <?php foreach($credits as $credit){ 
              $text = $credit['credit'];
              ?>
              <li><?= $text;?></li>
            <?php } ?>
          </ul>
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
    <?php render( 'sections' ); ?>
  
  <?php
get_footer();