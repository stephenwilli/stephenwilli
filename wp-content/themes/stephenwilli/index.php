<?php get_header(); 
  $title = get_field('post_page_title', 'option');
	$text = get_field('post_page_text', 'option');
?>

<main class="archive-wrap">
  
		<?php if(have_posts()): ?>
      <div class="gallery-mosaic js-mosaic-gallery">
        
        <div class="mosaic-image intro-card">
          <div class="reveal" data-delay="1" data-animate="reveal-up"></div>
          <h1 class="h2"><?= $title;?></h1>
					<p><?= $text;?></h1>
        </div>
        
				<?php while(have_posts()) : the_post(); 
          $postImage = get_the_post_thumbnail_url(get_the_ID(),'large');
        ?>
            <a class="mosaic-image" href="<?php the_permalink();?>">
              <div class="reveal" data-delay="2" data-animate="reveal-up"></div>
              <img class="thumbnail" src="<?= $postImage;?>" alt="<?php the_title();?>"/>
              <div class="post-meta">
                <h3><?php the_title();?></h3>
                <?php the_excerpt();?>
                <span class="read-more">Read More</span>
              </div>
            </a>
        <?php endwhile;?>
      </div>
      <?php
        if (function_exists('wp_bootstrap_pagination'))
          wp_bootstrap_pagination();
      ?>
		<?php endif;?>

</main>

<?php get_footer();
