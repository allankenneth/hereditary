<?php get_header() ?>

<div class="container">
	<div class="row">

	<div class="col-md-5 offset-md-2">
		<?php while ( have_posts() ) : the_post(); ?>

		<div <?php post_class() ?>>
			<date><?php the_date() ?></date>
			<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
<?php 
    $mainbgtxtclass = get_theme_mod("hereditary_content_text");
    $mainbgcolor = get_theme_mod("hereditary_contentbg");
?>
			<div class="<?php echo $mainbgtxtclass ?>" style="background: <?php echo $mainbgcolor ?>;">
			<?php the_excerpt() ?>
			</div>

			<div class="editlink">
			<?php edit_post_link( __( 'Edit' )); ?>
			</div>
		</div>

		<?php endwhile; ?>
	</div>
	<div class="col-md-3">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	<?php endif; ?>

	</div>

	</div> <!-- /.row -->
</div> <!-- /.container -->

<?php get_footer() ?>
