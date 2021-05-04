<?php
  get_header();

  while ( have_posts() ) : the_post(); 
    $title = get_the_title();
    $content = get_the_content();
    $photo = get_field('featured_photo');;
  ?>
  
  <main class="single-photo" role="main">
    <section class="photo-wrap">
      <div class="photo-content">
        <h1><?= $title; ?></h1>
        <p><?= $content;?></p>
      </div>
      
      <div class="photo-full">
        <img src="<?= $photo['sizes']['full_screen'];?>" alt="Stephen Williams Photography, Jackson Woming" />
      </div>
    </section>
  </main>
  
<?php endwhile;
get_footer();