<?php

if (!function_exists('have_rows')) return;

wp_reset_query();

$sections = get_field('flex_content');
if (empty($sections)) return;

$mapping = [];

$prev_layout = null;
$next_layout = null;

for ($index = 0; $index < count($sections); $index++) {

    $data = $sections[$index];
    $data['prev_layout'] = $sections[$index - 1]['acf_fc_layout'] ?? null;
    $data['next_layout'] = $sections[$index + 1]['acf_fc_layout'] ?? null;

    foreach ($data as $key => $value) {
        if ($value === '') unset($data[$key]);
    }

    $slug = $data['acf_fc_layout'] ?? '';
    $slug = $mapping[$slug] ?? str_replace('_', '-', $slug);

    render("layouts/$slug", $data);
}
