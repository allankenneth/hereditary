<?php 
    $mainbgtxtclass = get_theme_mod("hereditary_content_text");
?>
<?php get_header() ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php $video = get_post_meta($post->ID, 'Video', true); ?>
<?php if($video): ?>
	<?php echo bsreference_video_embed($video); ?>
<?php endif; ?>

<div class="container">
	<div class="row">

		<div class="col-md-9">
			<date class="pagetitle"><?php the_date() ?></date>
			<h1 class="pagetitle"><?php the_title() ?></h1>

			<div class="featured-image">
				<?php the_post_thumbnail() ?>
			</div>
			<div class="<?php echo $mainbgtxtclass ?> maincontentbg">
				<?php the_content() ?>
			</div>
			<div class="card">
				<div class="card-block">
				<p>This entry was posted on 
				<?php the_time('l, F jS, Y') ?> at 
				<?php the_time() ?> and is filed 
				under <?php the_category(', ') ?>.</p>
				<p>
				<?php the_tags() ?>
				</p>
				<?php edit_post_link( __( 'Edit' )); ?>
				</div>
			</div>
			<?php if(comments_open()): ?>
			<div class="card">
				<div class="card-block">
			<?php comments_template(); ?> 
				</div>
			</div>
			<?php endif; ?>

		</div>

<?php endwhile; ?>
	<div class="col-md-3">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	<?php endif; ?>

	</div>
	</div> <!-- /.row -->
</div> <!-- /.container -->

<?php get_footer() ?>
