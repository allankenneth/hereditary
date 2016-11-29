<?php get_header() ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php $video = get_post_meta($post->ID, 'Video', true); ?>
<?php if($video): ?>
	<?php echo bsreference_video_embed($video); ?>
<?php endif; ?>

<div class="container">
	<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Home</a></li>
		<li class="breadcrumb-item"><a href="/blog">Blog</a></li>
		<li class="breadcrumb-item active"><?php the_title() ?></li>
		</ol>
	</div>

		<div class="col-md-6 offset-md-1">
			<div class="featured-image">
				<?php the_post_thumbnail() ?>
			</div>
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
	<div class="col-md-4">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	<?php endif; ?>

	</div>
	</div> <!-- /.row -->
</div> <!-- /.container -->

<?php get_footer() ?>
