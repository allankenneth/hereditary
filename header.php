<!DOCTYPE html>
<html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php
	// Returns the title based on the type of page being viewed
        if ( is_single() ) {
                single_post_title(); echo ' | '; bloginfo( 'name' );
        } elseif ( is_home() || is_front_page() ) {
                bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
        } elseif ( is_page() ) {
                single_post_title( '' ); echo ' | '; bloginfo( 'name' );
        } elseif ( is_search() ) {
                printf( __( 'Search results for "%s"', 'fresh' ), get_search_query() ); echo ' | '; bloginfo( 'name' );
        } elseif ( is_404() ) {
                _e( 'Not Found', 'fresh' ); echo ' | '; bloginfo( 'name' );
        } else {
                wp_title( '' ); echo ' | '; bloginfo( 'name' );
        }
?></title>
<meta name="description" content="<?php bloginfo( 'description' ) ?>">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/hereditary/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/hereditary/css/tether.min.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<nav class="navbar navbar-static-top navbar-light">
<?php 
$url = home_url();
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
	<a class="navbar-brand" href="<?php echo esc_url( $url ) ?>">
		<?php if($custom_logo_id): ?>
		<img class="d-inline-block align-top logo" 
			src="<?php echo $image[0] ?>" alt="<?php bloginfo( 'name' ) ?>"
			height="30"
			width="30">
		<?php endif ?>
		<?php bloginfo( 'name' ) ?>
	</a>
	<button class="float-md-left hidden-sm-up navbar-toggler" 
		type="button" 
		data-toggle="collapse" 
		data-target="#hereditary-collapse" 
		aria-controls="bsref-collapse" aria-expanded="false" aria-label="Toggle navigation">
	</button>

	<ul class="float-md-left nav navbar-nav">
	<?php wp_nav_menu( array(
		'menu'              => 'primary',
		'theme_location'    => 'primary',
		'depth'             => 2,
		'container'         => 'div',
		'container_class'   => 'collapse in navbar-collapse',
		'container_id'      => 'hereditary-collapse',
		'menu_class'        => 'nav navbar-nav',
		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		'walker'            => new wp_bootstrap_navwalker())
	) ?>
	</ul>
	<form class="form-inline float-md-right" action="/" method="get">
		<input class="form-control" name="s" id="s" type="text" placeholder="Search" value="<?php the_search_query(); ?>">
	</form>

</nav>
<div id="hereditaryfoo"><?php echo get_theme_mod("hereditary_foo"); ?></div>
