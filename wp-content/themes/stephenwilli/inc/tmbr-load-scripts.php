<?php

// is production switch for serving up compiled stylesheets
function is_production() {
	return ( function_exists('is_wpe') && is_wpe() );
}

function is_staging() {
	return ( function_exists('is_wpe_snapshot') && is_wpe_snapshot() );
}

function _s_asset($target) {
	return get_stylesheet_directory_uri() . '/public/' . $target;
}

// asset revving for serving up hashed files
// use `gulp build` to generate new releases and builds
function _s_revved_asset($target) {
	$scripts = file_get_contents(STYLESHEETPATH . '/public/rev-manifest.json');
	$scripts = json_decode($scripts);
	if ( isset( $scripts->{$target} ) ) {
		return get_stylesheet_directory_uri() . '/public/' . $scripts->{$target};
	}
	return $target . ' :: file-not-found-in-public-dir';
}


add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style(
		'application',
		is_production()
			? _s_revved_asset('css/application.min.css')
			: _s_asset('css/application.css'),
		array(),
		'' // @TODO pull revved number
	);

	$in_footer = true;
	wp_deregister_script('jquery');
	wp_enqueue_script(
		'jquery',
		is_production()
			? _s_revved_asset('js/vendor.min.js')
			: _s_asset('js/vendor.js'),
		array(),
		'', // @TODO pull revved number from asset
		!$in_footer
	);
	wp_enqueue_script(
		'application',
		is_production()
			? _s_revved_asset('js/application.min.js')
			: _s_asset('js/application.js'),
		array('jquery'),
		'', // @TODO pull revved number from asset
		$in_footer
	);
});


// CONDITIONAL SCRIPTS
function cond_IE() { ?>

    <!--[if gte IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" />
	<![endif]-->

<?php }

add_action( 'wp_head', 'cond_IE' );