
	<header class="page-header">

		<div class="container">

			<h1 class="page-headline"><?php
			if (is_page() || is_single()) {
	            echo get_the_title();
	        } elseif (is_category()) {
	            echo get_the_title(get_option('page_for_posts', true)).': '.single_cat_title('', false);
	        } elseif (is_tag()) {
	            echo get_the_title(get_option('page_for_posts', true)).': '.single_tag_title('', false);
	        } elseif (is_author()) {
	            echo 'Author: ' . get_the_author();
	        } elseif (is_day()) {
	            echo 'Archive: ' . get_the_date('F j, Y');
	        } elseif (is_month()) {
	            echo 'Archive: ' . get_the_date('j Y');
	        } elseif (is_year()) {
	            echo 'Archive: ' . get_the_date('Y');
	        } elseif (is_front_page()) {
	            echo get_bloginfo('name');
	        } elseif (is_home()) {
	            echo get_the_title(get_option('page_for_posts', true));
	        } elseif (is_archive()) {
	            post_type_archive_title();
	        } elseif (is_search()) {
	            echo 'Search Results:' . get_search_query();
	        } elseif (is_404()) {
	            echo 'Page Not Found';
	        } else {
	            echo 'Archives';
	        }
			?></h1>

		</div>

	</header>