<?php $mainbgtxtclass = get_theme_mod("hereditary_content_text");
$mainbgcolor = get_theme_mod("hereditary_contentbg");
get_header() ?>
<div class="container">
	<div class="row">
	<div class="col-md-9">
		<?php while ( have_posts() ) : the_post(); ?>
		<div <?php post_class() ?>>
			<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
			<a class="featuredimage" href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('large') ?>
			</a>
			<div class="<?php echo $mainbgtxtclass ?>" style="background: <?php echo $mainbgcolor ?>;">
			<?php the_excerpt() ?>
			</div>
		</div>
		<?php endwhile; ?>
		<ul class="pagination">
		<?php 
		$pages = paginate_links( array('type' => 'array'));
		foreach($pages as $page):
			echo '<li class="page-item">' . str_replace('page-numbers','page-link',$page) . '</li>';
		endforeach;
		?>
		</ul>
	</div>
	<div class="col-md-3">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	<?php endif; ?>
	</div>
	</div> <!-- /.row -->
</div> <!-- /.container -->
<?php get_footer() ?>
