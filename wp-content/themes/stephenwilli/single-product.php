<?php
  get_header(); 
  while (have_posts()):the_post();
  $postImage = get_the_post_thumbnail_url(get_the_ID(),'full_screen');
  $orientation = get_field('photo_orientation');
  $seriesLink = get_field('series_link');
?>

  <main class="single-photo pad-t" role="main">
    <section class="photo-wrap -<?= $orientation;?>">
      <div class="photo-content" data-animate="fade-left">
      <h1 class="h2""><?php the_title();?></h1>
        <div class="post-meta">
          <?php if($seriesLink){?>
            <p>Series: <a href="<?= $seriesLink['url'];?>"><?= $seriesLink['title'];?></a></p><br>
          <?php } ?>
        </div>
        <?php the_content();?>
        
      </div>
      
      <div class="photo-full -<?= $orientation;?> reveal-wrap">
        <div class="reveal" data-animate="reveal-up"></div>
        <img src="<?= $postImage;?>" alt="<?php the_title();?> - Stephen Williams Photography, Jackson Wyoming">
      </div>
    </section>
    <?php  
      render( 'related-products' ); 
    ?>
  </main>
  
  <?php endwhile; 
get_footer();