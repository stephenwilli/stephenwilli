<footer class="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<div class="row">
		<div class="col-sm-4">
			<div class="footer-contact">
				<?php 
					$email = get_field('site_email', 'option');
					$name = get_field('site_name', 'option');
					$phone = get_field('site_phone_number', 'option');
					$address1 = get_field('site_address_1', 'option');
					$address2 = get_field('site_address_2', 'option');
					$city = get_field('site_city', 'option');
					$state = get_field('site_state', 'option');
					$zip = get_field('site_zip_code', 'option');
				?>
				<h4><?php echo $name;?></h4>
				<ul>
					<li><?php echo $address1;?></li>
					<li><?php echo $address2;?></li>
					<li><?php echo $city;?>, <?php echo $state;?></li>
					<li><?php echo $zip;?></li>
				</ul>
			</div>
		</div><!-- /col -->

		<div class="col-sm-4">

		</div><!-- /col -->

		<div class="col-sm-4">

		</div><!-- /col -->

	</div><!-- /row -->
		
	<div class="row">
		<?php get_template_part('partials/02_molecule/social-bar'); ?>
		<div class="col-sm-12">
			<p class="copyright mb4">
				<?php echo sprintf( __( '%1$s %2$s %3$s.'), 'Copyright &copy;', date('Y'), esc_html(get_bloginfo('name')) );  ?> Site by <a href="" target="_blank">TMBR</a>
			</p>
		</div>
	</div>
</footer><!-- footer -->

</div><!-- .body -->

<?php wp_footer(); ?>

</body>
</html> 