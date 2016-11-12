
<div class="container">
	<div class="row">
	<?php if ( is_active_sidebar( 'footer' ) ) : ?>
		<?php dynamic_sidebar( 'footer' ); ?>
	<?php endif; ?>
	</div>
</div>
<script src="/wp-content/themes/hereditary/node_modules/bootstrap/node_modules/tether/dist/js/tether.min.js"></script>
<script src="/wp-content/themes/hereditary/node_modules/bootstrap/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/wp-content/themes/hereditary/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>
