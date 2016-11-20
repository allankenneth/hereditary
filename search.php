<?php get_header(); ?>

<div class="container">
	<?php if ( have_posts() ) : ?>

	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'hereditary' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>

			<?php while ( have_posts() ) : the_post(); ?>
				<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
				<div class="maincontentbg"><?php the_excerpt() ?></div>
			<?php endwhile;?>
			<?php
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :

		endif;
		?>
		</div>
	</div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
