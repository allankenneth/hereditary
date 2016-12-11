
<div class="container">
	<div class="row">
	<div class="card-deck-wrapper">
		<div class="card-deck">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
		<?php dynamic_sidebar( 'footer' ); ?>
		<?php endif; ?>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
