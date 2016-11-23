<?php get_header() ?>

<div class="container">
	<div class="row">

		<?php while ( have_posts() ) : the_post(); ?>

		<div class="col-md-6 offset-md-3">
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

	</div> <!-- /.row -->
</div> <!-- /.container -->

<?php get_footer() ?>
