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
                bloginfo( 'name' );
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
<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/hereditary/node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/hereditary/node_modules/bootstrap/node_modules/tether/dist/css/tether.min.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<nav class="navbar navbar-static-top navbar-dark bg-inverse">
  <a class="navbar-brand" href="#"><?php bloginfo( 'name' ) ?></a>
<!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bsref-collapse" aria-controls="bsref-collapse" aria-expanded="false" aria-label="Toggle navigation"></button>-->
  <ul class="nav navbar-nav">
  <?php
//                'container_class'   => 'collapse navbar-collapse',
//		'container_id'      => 'bsref-collapse',
wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',

                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
  ?>
  </ul>
</nav>
