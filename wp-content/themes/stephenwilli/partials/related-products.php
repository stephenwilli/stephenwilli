<section class="related-products pad-y" data-animate="fade-up">
  <div class="container">
    <h2>Other Photos</h2>
  </div>

  <?php 
    $terms = get_the_terms($product->ID, 'product_cat');
    foreach ($terms as $term) {
      $product_cat = $term->name;
      }

    $args = array(      
      'post_type' => 'product',
      'post_status' => 'publish',
      'post__not_in' => array( $post->ID ),
      'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'name',
            'terms'    => array($product_cat),
            ),
        ),
      );
      $query = new WP_Query($args);
  ?>
  <div class="js-product-carousel carousel-wrap" data-animate="fade-up">
      <?php     
        while ($query->have_posts()){
          $query->the_post();
          $photo = get_the_post_thumbnail_url(get_the_ID(),'large');
          ?>
          <a href="<?php the_permalink();?>" class="product-slide">
          <img src="<?= $photo;?>" alt="<?php the_title();?> - Stephen Williams Photography"/>
        </a>

      <?php } wp_reset_postdata(); ?>
  </div>

</section><!-- /section -->



