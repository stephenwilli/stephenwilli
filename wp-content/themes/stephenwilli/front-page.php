<?php get_header() ?>

<div id="site-loader">
    <div class="loader-wrap">
        <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/sw-03.svg'); ?>
    </div>
</div>
  
<?php render('home-hero-slider'); ?>
  
<div class="inner-wrap">
    <div class="inner-border">
    </div>
</div>
  
<?php 
    get_footer('home');