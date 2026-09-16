<?php $id = is_home() ? get_option('page_for_posts') : get_the_ID() ?>
<header class="page-header py-9">
    <div class="container">
        <h1 class="m-0"><?= get_field('page_headline', $id) ?></h1>
    </div>
</header>
