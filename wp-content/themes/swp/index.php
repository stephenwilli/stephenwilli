<?php

get_header();
render('partials/page-header');

?>

    <div class="container">

        <?php while (have_posts()): the_post(); ?>
        <article <?php post_class(); ?>>

            <?php if (has_post_thumbnail()): ?>
            <a class="post__thumb" href="<?php the_permalink(); ?>">
                <img src="<?php echo get_thumbnail_src(); ?>" alt="<?php the_title_attribute(); ?>">
            </a>
            <?php endif; ?>

            <header class="article-header">
                <h2 class="article-header__title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <?php
                // render('partials/article-meta');
                // render('partials/share');
                ?>
            </header>

            <div class="content content--excerpt">
                <?php the_excerpt(); ?>
                <a class="cta-link" href="<?php the_permalink(); ?>">Read More</a>
            </div>

        </article>
        <?php endwhile; ?>

        <?php if (is_singular('post')) render('partials/nav-archive'); ?>

    </div>

<?php get_footer(); ?>