<?php
  get_header(); 
  $postImage = get_the_post_thumbnail_url(get_the_ID(),'full_screen');
  $post_thumbnail_id = get_post_thumbnail_id($post);
  $caption = wp_get_attachment_caption($post_thumbnail_id);
  $terms = get_the_terms(get_the_ID(), 'category');
  $credits = get_field('project_credits');
  $terms = get_the_terms(get_the_ID(), 'project-categories');
?>

<section class="project-hero" style="background-image: url('<?= $postImage;?>');">
  <div class="overlay"></div>
  <div class="project-title">
    <h1 class="h2"><?php the_title();?></h1>
  </div>
</section>

  <section class="content-wrap container pad-b">
      <div class="project-intro">

        <div class="project-meta">
          <h4>Project Role</h4>    
          <?php if(!empty($terms)) {
              foreach($terms as $term){
              $term = array_pop($terms);
              $catLink = get_term_link($term);
              $catTitle = $term->name; ?>
                <span class="cat-link" href="<?= $catLink;?>"><?= $catTitle;?></span>
              <?php } }?>
            <div class="credits"> 
              <h4>Project Credits</h4> 
              <ul>
                <?php foreach($credits as $credit){ 
                  $text = $credit['credit'];
                  ?>
                  <li><?= $text;?></li>
                <?php } ?>
              </ul>
            </div>
        </div>
        <div class="project-content">
          <?php the_content();?>
        </div>

      </div>
            
    </section>


  <?php render( 'sections' ); ?>

  <?php  
      render( 'related-projects' ); 
    ?>
  
  <?php
get_footer();