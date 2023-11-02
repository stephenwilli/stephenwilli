<?php

$items = $data['items'] ?? [];
$props = json_encode($data['props'] ?? []);
$class = class_attr(['accordion', $data['class'] ?? '']);

?>

<dl class="<?= $class ?>" data-props='<?= $props ?>'>

    <?php foreach ($items as $item): $id = uniqid('accordion-'); ?>
    <div class="accordion-block">

        <dt class="accordion-heading h4">
            <button type="button" aria-expanded="false" aria-controls="<?= $id ?>">
                <?= $item['heading'] ?>
                <svg viewBox="0 0 100 100">
                    <rect width="100" height="12" y="44" rx="1" />
                    <rect width="12" height="100" x="44" rx="1" />
                </svg>
            </button>
        </dt>

        <dd class="accordion-content" aria-hidden="true" id="<?= $id ?>">
            <div><?= $item['content'] ?></div>
        </dd>

    </div>
    <?php endforeach; ?>

</dl>
