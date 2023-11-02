<section class="related-posts">
  <h3 class="section-title">Related Posts</h3>
  <?php
  $args = array(
  	'posts_per_page' => 3,
  	'post__not_in'   => array( get_the_ID() ),
  	'no_found_rows'  => true,
  );

  $cats = wp_get_post_terms( get_the_ID(), 'category' ); 
  $cats_ids = array();  
  foreach( $cats as $wpex_related_cat ) {
  	$cats_ids[] = $wpex_related_cat->term_id; 
  }
  if ( ! empty( $cats_ids ) ) {
  	$args['category__in'] = $cats_ids;
  }
  $wpex_query = new wp_query( $args );
  foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
  	
  	get_template_part( 'partials/02_molecule/post-loop' );

  endforeach;
  wp_reset_postdata(); ?>
</section><!-- /section -->