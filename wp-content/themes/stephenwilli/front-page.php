<?php get_header() ?>

<div id="site-loader">
    <div class="loader-wrap">
        <?php echo file_get_contents(get_template_directory_uri() . '/assets/images/sw-03.svg'); ?>
        <h1 class="loader-heading" id="loader-heading" data-split-text>Stephen Williams Photography</h1>
    </div>
</div>
  
<?php render('home-hero'); ?>
  
<div class="inner-wrap">
    <div class="inner-border">
    </div>
</div>
  
<?php 
    get_footer('home');