<?php
  /**
   * The template for displaying 404 pages (Not Found)
   */
  get_header();?>
  
  <main class="page-main" role="main">
    <?php 
      $images = get_field( 'default_header_image', 'option' );
      $rand = rand(0, (count($images) - 1));
      $heroImage = $images[$rand]['header_image']; 
      $credit = $heroImage['caption'];
    ?>

    <section class="page-hero" style="background-image: url('<?php echo $heroImage['sizes']['full_screen'];?>')">
      <div class="overlay"></div>
      <h1 class="hero-title">Page Not Found</h1>
      <?php if($credit){?>
        <span class="photo-credit">Photo: <?php echo $credit;?></span>
      <?php }?>
    </section><!-- /section --> 
     
    <section class="post-content content-404">
      
      <h5>Oops. Looks like this page was not found. Here are some helpful links</h5>
      <?php wp_list_pages();?>

    </section>
        
  </main>
  
<?php
get_footer();