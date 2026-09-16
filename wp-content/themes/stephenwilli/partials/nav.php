<?php
// $menu = get_field('menu', 'option');
// debug($menu);
?>

<button type="button" class="nav-toggle" aria-label="Menu" aria-controls="nav" aria-expanded="false">
    <svg fill="currentColor" viewBox="0 0 50 50">
        <rect width="50" height="2" y="12"/>
        <rect width="50" height="2" y="24"/>
        <rect width="50" height="2" y="36"/>
    </svg>
</button>

<nav class="nav" id="nav">

    <ul class="nav-menu">

        <li class="nav-item has-submenu">

            <?php $id = uniqid('submenu-') ?>
            <button type="button" aria-controls="<?= $id ?>" aria-expanded="false">Work</button>

            <ul class="nav-submenu" id="<?= $id ?>">
                <li><a href="#">Branding</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Web Development</a></li>
            </ul>

        </li>

        <li class="nav-item has-submenu">

            <?php $id = uniqid('submenu-') ?>
            <a href="#" aria-controls="<?= $id ?>" aria-expanded="false">About</a>

            <ul class="nav-submenu" id="<?= $id ?>">
                <li><a href="#">Overview</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Culture</a></li>
                <li><a href="#">Careers</a></li>
            </ul>

        </li>

        <li class="nav-item">
            <a href="#">News</a>
        </li>

        <li class="nav-item">
            <a href="#">Contact</a>
        </li>

    </ul>

</nav>
