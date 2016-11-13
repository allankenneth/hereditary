<?php
/*
Template Name: Blog
*/
?>
<?php get_header() ?>
<div class="section">
<div class="container">
<?php 
$args = array( 'post_type' => 'post' );
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		<?php the_excerpt() ?>
	</div>
	</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>
</div>
<?php get_footer() ?>
