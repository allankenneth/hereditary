<?php
/*
Template Name: Single Narrow Column
*/
?>
<?php get_header() ?>
<div class="section">
<div class="container">
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
	<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title() ?></h1>
		<?php the_content() ?>
	<?php endwhile; ?>
	</div>
	</div>
</div>
</div>
<?php get_footer() ?>
