<?php

add_filter('embed_oembed_html', function($html, $url, $atts) {

    $regex = '/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/';
    preg_match($regex, $url, $match);
    $id = $match[6] ?? null;

    if (is_admin() || empty($id)) return $html;

    $props = shortcode_atts([
        'id' => $id,
        'url' => $url
    ], $atts);

    preg_match('/width="(.*?)"/',  $html, $width);
    preg_match('/height="(.*?)"/', $html, $height);

    $props['width'] = intval($width[1] ?? 16);
    $props['height'] = intval($height[1] ?? 9);

    $ratio = $props['height'] / $props['width'];
    $props = json_encode($props);

    $src = is_numeric($id)
        ? "https://player.vimeo.com/video/$id"
        : "https://www.youtube.com/embed/$id";

    ob_start(); ?>
    <div class="image" style="--image-ratio: <?= $ratio ?>" data-video='<?= $props ?>'>
        <iframe data-src="<?= $src ?>" allow="autoplay; fullscreen; encrypted-media"></iframe>
    </div>
    <?php return ob_get_clean();

}, 100, 3);
