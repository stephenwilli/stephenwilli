<?php

/*
** ACF Image Helper
**
** @Param $imageId: int - image ID you are using
** @Param $size: string - image size you want to retrieve
** @Return Array - image url and alt text for image
**
EXAMPLE :
$imageObj = inversion_get_cropped_image( get_field( 'image', $trailHead ), 'archive' );
$imageUrl = $imageObj['url'];
$imageAlt = $imageObj['alt'];
*/

function inversion_get_cropped_image( $imageId, $size ) {
	$imageArr = wp_get_attachment_image_src( $imageId, $size );
	$image = $imageArr[0];
	return $image;
}

/*
** ALLOWS YOU TO OUTPUT EXCERPTS WITH LENGTHS OF YOUR CHOOSING
** Usage: If you want to output an excerpt of 25 words
**	<?php echo inversion_excerpt(25); ?>
*/

function inversion_excerpt($limit) {
	 $excerpt = explode(' ', get_the_excerpt(), $limit);
	 if (count($excerpt)>=$limit) {
	 array_pop($excerpt);
	 $excerpt = implode(" ",$excerpt).'...';
	 } else {
	 $excerpt = implode(" ",$excerpt);
	 }
	 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	 return $excerpt;
}

/**
 * Prints a preformatted display of the passed in variable for debugging purposes.
 *
 * @param mixed $var the array or object to display
 * @param boolean $exit whether or not to immediately exit the script
 * @return void
 */
function debug($var, $exit = false) {
    if (!WP_DEBUG) return;
    echo '<pre class="debug">'.print_r($var, true).'</pre>';
    if ($exit) exit();
}

/**
 * Convenience function for generating urls to a given theme file.
 *
 * @param string $file relative path to the file
 * @uses get_template_directory_uri()
 * @return string returns the absolute url
 */
function url_to($file) {
    return get_template_directory_uri().'/'.ltrim($file, '/');
}

/**
 * Convenience function for generating urls to build assets
 *
 * @param string $file file name corresponding to the manifest.json key
 * @param boolean $cachebuster whether or not to append a date and hash cashbuster to the url
 * @uses url_to()
 * @return string returns the absolute url
 */
function build_url($file, $cachebuster = true) {

    if (empty($GLOBALS['manifest'])) {
        $manifest = file_get_contents(TEMPLATEPATH.'/build/manifest.json');
        $manifest = json_decode($manifest, true);
        $GLOBALS['manifest'] = $manifest;
    }

    $build = $GLOBALS['manifest'];
    return url_to('build/'.$build[$file].($cachebuster ? '?v='.$build['date'].'.'.$build['hash'] : ''));
}

/**
 * Like get_template_part but with local variables
 *
 * @param string $template relative path to template to load,
 * @param array $props (optional) local variables to be available within the template
 * @param array $return (optional) return the rendered html rather than outputing it
 */
function render($template, $props = [], $return = false) {

    $template = ltrim($template, '/');
    $template = str_replace('.php', '', $template);
    $template = TEMPLATEPATH.'/'.$template.((strpos($template, '.html') ? '' : '.php'));

    if (!file_exists($template)) return null;

    ob_start();
    if (!empty($props)) extract($props);
    if (WP_DEBUG) echo '<!-- START '.str_replace(TEMPLATEPATH.'/', '', $template).' '.json_encode($props).' -->';
    include($template);
    if (WP_DEBUG) echo '<!-- END '.str_replace(TEMPLATEPATH.'/', '', $template).' -->';
    $html = ob_get_clean();

    if ($return) return $html;
    echo $html;
}

function remove_empty_p($content) {
    $content = force_balance_tags($content);
    $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
    $content = preg_replace('~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content);
    return $content;
}

function is_first_post($query = null) {
    global $wp_query;
    if (!$query) $query = $wp_query;
    return $query->current_post === 0;
}

function is_last_post($query = null) {
    global $wp_query;
    if (!$query) $query = $wp_query;
    return ($query->current_post + 1) === $query->post_count;
}

function get_image_alt($image_id = null) {
    if (!$image_id) $image_id = get_post_thumbnail_id();
    return get_post_meta($image_id, '_wp_attachment_image_alt', true);
}

function get_image_src($size, $image_id = null) {
    if (!$image_id) $image_id = get_post_thumbnail_id();
    $image = wp_get_attachment_image_src($image_id, $size);
    return (is_array($image)) ? $image[0] : null;
}

// GET POSTS COUNT
function sw_get_posts_count() {
    global $wp_query;
    return $wp_query->post_count;
}



