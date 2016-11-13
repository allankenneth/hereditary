<?php get_header() ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php $video = get_post_meta($post->ID, 'Video', true); ?>
<?php if($video): ?>
	<?php echo bsreference_video_embed($video); ?>
<?php endif; ?>

<div class="container">
	<div class="row">


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


	</div> <!-- /.row -->
</div> <!-- /.container -->
<?php endwhile; ?>
<?php get_footer() ?>
