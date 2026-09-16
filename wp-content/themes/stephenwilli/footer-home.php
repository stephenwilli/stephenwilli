</main>

<?php if (WP_DEBUG && !is_production()): ?>
<div id="spacing" class="pad">
    <?php for ($i = 1; $i <= 10; $i++): ?>
    <div style="height:var(--s-<?= $i ?>);margin-top:var(--s-1);background:#333;color:#CCC;position:relative"><span></span></div>
    <?php endfor; ?>
</div>
<script>
(new ResizeObserver(entries => {
    Array.from(entries[0].target.children).forEach(div => {
        const span = div.firstElementChild;
        span.style.cssText = 'position:absolute;left:1.5rem;top:50%;transform:translateY(-50%);font:12px monospace;';
        span.textContent = div.getBoundingClientRect().height.toFixed(2);
    });
})).observe(document.currentScript.previousElementSibling);
</script>
<?php endif; ?>

<?php //render('site-footer') ?>

</div>

<?php wp_footer() ?>

<script nomodule>
var div = document.createElement('div');
div.style.cssText = 'position:fixed;z-index:10000;left:0;bottom:0;width:100%;font-size:1rem;padding:2em;background:#FFF;color:#000;text-align:center;';
div.textContent = 'You are using an outdated and unsupported browser';
document.body.classList.add('unsupported');
document.body.appendChild(div);
</script>

<script type="module">
window.site = {<?php if (WP_DEBUG) echo 'debug: true' ?>};
site.api = '<?= trim_url(get_rest_url(null, 'api')) ?>';
site.dir = '<?= trim_url(get_bloginfo('template_url')) ?>';
site.url = '<?= get_site_url() ?>';
</script>

<script type="module" src="<?= build_url('main.js') ?>"></script>

</body>
</html>
