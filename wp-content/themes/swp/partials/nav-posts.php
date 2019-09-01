
	<?php

	$prev = get_previous_post_link('%link');
	$next = get_next_post_link('%link');

	if($prev || $next): ?>

	<ul class="nav-posts hide-print">
		<?php echo ($prev) ? '<li class="nav-posts__item nav-posts__item--prev">'.$prev.'</li>' : ''; ?>
		<?php echo ($next) ? '<li class="nav-posts__item nav-posts__item--next">'.$next.'</li>' : ''; ?>
	</ul>

	<?php endif; ?>