<?php

/*
** ACF Image Helper
**
** @Param $imageId: int - image ID you are using
** @Param $size: string - image size you want to retrieve
** @Return Array - image url and alt text for image
**
EXAMPLE :
$imageObj = tmbr_get_cropped_image( get_field( 'image', $trailHead ), 'archive' );
$imageUrl = $imageObj['url'];
$imageAlt = $imageObj['alt'];
*/

function tmbr_get_cropped_image( $imageId, $size ) {
	$imageArr = wp_get_attachment_image_src( $imageId, $size );
	$image = $imageArr[0];
	return $image;
}

/*
** ALLOWS YOU TO OUTPUT EXCERPTS WITH LENGTHS OF YOUR CHOOSING
** Usage: If you want to output an excerpt of 25 words
**	<?php echo tmbr_excerpt(25); ?>
*/

function tmbr_excerpt($limit) {
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

function get_first_p($str) {
	return substr($str, strpos($str, "<p"), strpos($str, "</p>") + 4);
}

function remove_empty_p($content) {
    $content = force_balance_tags($content);
    $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
    $content = preg_replace('~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content);
    return $content;
}

function starts_with($haystack, $needle) {
    $length = strlen($needle);
    return substr($haystack, 0, $length) === $needle;
}

function ends_with($haystack, $needle) {
   $length = strlen($needle);
   if ($length === 0) return true;
   return substr($haystack, -$length) === $needle;
}

/**
 * Convert comma separated values to an array.
 *
 * @param string $str string to be converted
 * @return array
 */
function to_array($str, $reqex = ',') {
    $values = preg_split('/'.$reqex.'/', $str, -1, PREG_SPLIT_NO_EMPTY);
    $values = array_map('trim', $values);
    return $values;
}

function is_external_url($url) {
    return strpos($url, get_bloginfo('url')) === false && substr($url, 0, 1) != '/';
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

function is_child_of($parent_id, $child_id = null) {
    global $post;
    $child = ($child_id == null) ? $post : get_post($child_id);
    return $child && ($child->post_parent == $parent_id || in_array($parent_id, get_post_ancestors($child)));
}

function get_youtube_id($url) {

    if (strpos($url, '&')) {
        $parts = explode('&', $url)[0];
        $url = $parts[0];
    }

    $url = ltrim($url, 'http://');
    $url = ltrim($url, 'https://');
    $replace = (strrpos($url, 'youtu.be') !== false) ? 'youtu.be/' : 'www.youtube.com/watch?v=' ;
    return str_replace($replace, '', $url);
}

function get_youtube_url($id, $params = []) {
    return 'http://youtu.be/'.$id.'?autoplay=1&rel=0';
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

function custom_post_type_labels($singular, $plural = null, $labels = []) {

    if (!$plural) $plural = $singular.'s';

    return array_merge([
        'name'                       => $plural,
        'singular_name'              => $singular,
        'menu_name'                  => $plural,
        'name_admin_bar'             => $singular,
        'all_items'                  => 'All '.$plural,
        'add_new'                    => 'Add New',
        'add_new_item'               => 'Add New',
        'edit_item'                  => 'Edit '.$singular,
        'new_item'                   => 'New '.$singular,
        'view_item'                  => 'View '.$singular,
        'search_items'               => 'Search '.$plural,
        'not_found'                  => 'No '.$plural.' found',
        'not_found_in_trash'         => 'No '.$plural.' found in Trash',
        'parent_item_colon'          => 'Parent '.$plural.':'
    ], $labels);
}

function custom_taxonomy_labels($singular, $plural = null, $labels = []) {

    if (!$plural) $plural = $singular.'s';

    return array_merge([
        'name'                       => $plural,
        'singular_name'              => $singular,
        'menu_name'                  => $plural,
        'all_items'                  => 'All '.$plural,
        'edit_item'                  => 'Edit '.$singular,
        'view_item'                  => 'View '.$singular,
        'update_item'                => 'Update '.$singular,
        'add_new_item'               => 'Add New '.$singular,
        'new_item_name'              => 'New '.$singular,
        'parent_item'                => 'Parent '.$singular,
        'parent_item_colon'          => 'Parent '.$singular.':',
        'search_items'               => 'Search '.$plural,
        'popular_items'              => 'Popular '.$plural,
        'separate_items_with_commas' => 'Separate '.strtolower($plural).' with commas',
        'add_or_remove_items'        => 'Add or remove '.strtolower($plural),
        'choose_from_most_used'      => 'Choose from the most used '.strtolower($plural),
        'not_found'                  => 'No '.$plural.' found'
    ], $labels);
}