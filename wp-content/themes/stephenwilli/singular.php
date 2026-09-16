<?php get_header() ?>

    <article>

        <?php render('page-header') ?>

        <?php if (has_content()): ?>
        <div class="container content my-8">
            <?php the_content() ?>
        </div>
        <?php endif; ?>

        <?php render('sections') ?>

    </article>

<?php get_footer() ?>
