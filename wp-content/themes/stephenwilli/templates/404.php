<?php

get_header();
render('parials/page-header');

?>

    <div class="container content">
        <p>We're sorry, the page you're looking for could not be found. <a href="<?php echo home_url(); ?>">Click here</a> to go back to the home page.</p>
    </div>

<?php get_footer(); ?>