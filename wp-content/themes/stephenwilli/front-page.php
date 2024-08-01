<?php get_header() ?>

<div id="site-loader">
    <div class="loader-wrap">
        <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/sw-03.svg'); ?>
        <h3 class="loader-title">Stephen Williams</h3>
        <h4 class="loader-title">Photographer // Creative Developer</h4>
    </div>
</div>
  
<?php render('home-hero-slider'); ?>
  
<div class="inner-wrap">
    <div class="inner-border">
    </div>
</div>
  
<?php 
    get_footer('home');