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
<style>
<?php 
$linkcolor = get_theme_mod("hereditary_links");
$mainbgcolor = get_theme_mod("hereditary_contentbg");
?>
a {
	color: <?php echo $linkcolor ?>;
}
.custom-background .list-group-item,
.custom-background .breadcrumb {
	background-color: <?php echo $mainbgcolor; ?>;
	border: 0;
}
.custom-background .list-group-item-warning {
}
.custom-background {
	-webkit-background-size: cover !important;
	-moz-background-size: cover !important;
	-o-background-size: cover !important;
	background-size: cover !important;
}
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
$navbar_class = get_theme_mod("hereditary_navbar");
$navbar_color = get_theme_mod("hereditary_navbar_color");
$url = home_url();
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<nav class="<?php echo $navbar_class ?>" style="background-color: <?php echo $navbar_color ?>">
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
