</main>

<?php render('site-footer') ?>

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
