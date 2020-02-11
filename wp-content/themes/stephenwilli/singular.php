<?php

get_header();
get_template_part('parials/page-header');

?>

    <div class="container">

        <article <?php post_class(); ?>>

            <?php if(is_singular('post')): ?>
            <header class="article-header">
                <h1 class="article-header__title"><?php the_title(); ?></h1>
                <?php
                // get_template_part('partials/article-meta');
                // get_template_part('partials/share');
                ?>
            </header>
            <?php endif; ?>

            <div class="content">
                <?php

                while(have_posts()) {
                    the_post();
                    the_content();
                }

                ?>
            </div>

        </article>

        <?php // if(is_singular('post')): get_template_part('partials/nav-posts'); endif; ?>

    </div>

    <?php get_template_part('partials/index'); ?>

<?php get_footer(); ?>