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
	<div class="col-md-6 offset-md-3">
		<date><?php the_date() ?></date>
		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<?php 
    $mainbgtxtclass = get_theme_mod("hereditary_content_text");
    $mainbgcolor = get_theme_mod("hereditary_contentbg");
?>
		<div class="<?php echo $mainbgtxtclass ?>" style="background: <?php echo $mainbgcolor ?>;">
		<?php the_excerpt() ?>
		</div>
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
