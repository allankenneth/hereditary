<?php get_header() ?>

<div class="container">
	<div class="row">

		<?php while ( have_posts() ) : the_post(); ?>

		<div class="col-md-12">
			<date><?php the_date() ?></date>
			<h1><?php the_title() ?></h1>
			<div class="content">
				<?php the_content() ?>
			</div>
			<div class="editlink">
					<?php edit_post_link( __( 'Edit' )); ?>
				</div>
		</div>

		<?php endwhile; ?>

	</div> <!-- /.row -->
</div> <!-- /.container -->

<?php get_footer() ?>
