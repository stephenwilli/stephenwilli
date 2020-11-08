<?php get_header(); 
  $obj = get_queried_object();
  $title = $obj->name;
  $slug = $obj->slug;
?>

<main class="page-main" role="main">
		
		<?php if(have_posts()): ?>
				
      <?php 
        $images = get_field( 'default_header_image', 'option' );
        $rand = rand(0, (count($images) - 1));
        $heroImage = $images[$rand]['header_image'];
        $credit = $heroImage['caption']; 
      ?>

      <section class="page-hero" style="background-image: url('<?php echo $heroImage['sizes']['full_screen'];?>')">
        <div class="overlay"></div>
        <h1 class="hero-title"><?php echo $title;?></h1>
        <?php if($credit){?>
          <span class="photo-credit">Photo: <?php echo $credit;?></span>
        <?php }?>
      </section><!-- /section -->
      
				<div class="blog-wrap loop-wrap">
					<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'partials/02_molecule/post-loop' ); ?>
					<?php endwhile; // end of the loop. ?>
			  </div>
        
        <?php
          if ( function_exists('wp_bootstrap_pagination') )
            wp_bootstrap_pagination();
        ?>

			<?php endif;?>

</main>
<!-- #page-main -->

<?php get_footer();
