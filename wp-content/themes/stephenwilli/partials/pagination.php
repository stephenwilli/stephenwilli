<?php

$query = $data['query'] ?? $GLOBALS['wp_query'];
$big = 999999999;

$pagination = paginate_links([
    'base'               => str_replace($big, '%#%', get_pagenum_link($big, false)),
    'format'             => '?page=%#%',
    'total'              => $query->max_num_pages,
    'current'            => max(1, get_query_var('paged')),
    'show_all'           => (5 > $query->max_num_pages) ? true : false,
    'end_size'           => 1,
    'mid_size'           => 1,
    'prev_next'          => true,
    'prev_text'          => 'Prev',
    'next_text'          => 'Next',
    'type'               => 'list',
    'add_args'           => false,
    'add_fragment'       => $data['hash'] ?? '',
    'before_page_number' => '',
    'after_page_number'  => ''
]);

if (empty($pagination)) return;

?>

<nav class="pagination">
    <?= $pagination; ?>
</nav>
