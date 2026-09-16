<?php

$social = [
    // 'facebook'  => '#',
    // 'instagram' => '#',
    // 'twitter'   => '#',
    // 'youtube'   => '#',
];

if (empty($social)) return;

?>

<div class="social">
    <?php foreach ($social as $icon => $href): ?>
    <a href="<?= $href ?>" target="_blank"><?= icon($icon) ?></a>
    <?php endforeach; ?>
</div>
