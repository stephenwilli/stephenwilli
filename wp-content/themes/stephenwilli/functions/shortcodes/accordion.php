<?php

add_shortcode('accordion', function($atts, $content = null) {

    if (!is_array($atts)) $atts = [];

    $props = [
        'initial'  => isset($atts['initial']) ? intval($atts['initial']) : null,
        'multiple' => in_array('multiple', $atts) ?: null
    ];

    $content = remove_empty_p($content);
    $content = do_shortcode($content);

    $tag = 'h4';
    $dom = new DOMDocument;
    $dom->loadHTML('<?xml encoding="UTF-8">'.$content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $headings = iterator_to_array($dom->childNodes);
    $headings = array_filter($headings, fn($el) => is_a($el, 'DOMElement') && $el->tagName === $tag);

    $items = array_map(function($heading) use ($tag) {

        $siblings = [];
        $next = $heading->nextSibling;

        while (is_a($next, 'DOMElement') && $next->tagName !== $tag) {
            $siblings[] = $next->C14N();
            $next = $next->nextSibling;
        }

        return [
            'heading' => $heading->textContent,
            'content' => join('', $siblings)
        ];

    }, $headings);

    return render('accordion', [
        'items' => array_values($items),
        'props' => array_filter($props, fn($var) => !is_null($var)),
        'class' => $atts['class'] ?? null,
    ], true);
});
