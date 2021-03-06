<?php // Setup customizer variables
$url = home_url();
$mainpadding = get_theme_mod("hereditary_maincontent_padding");
$searchenable = get_theme_mod("hereditary_search");
$pageheader = get_theme_mod("hereditary_pageheader");
$btnsuccess = get_theme_mod("hereditary_btn-success");
$linkcolor = get_theme_mod("hereditary_links");
$searchbg = get_theme_mod("hereditary_searchbg");
$hovercolor = get_theme_mod("hereditary_links_hover");
$navlight = get_theme_mod("hereditary_nav_highlight");
$navpos = get_theme_mod("hereditary_navpos");
$mainbgcolor = get_theme_mod("hereditary_contentbg");
$postlinks = get_theme_mod("hereditary_postlinks");
$navbar_base = get_theme_mod("hereditary_navbar");
$navbar_color = get_theme_mod("hereditary_navbar_color");
$footerwidget = get_theme_mod("hereditary_footerwidget");
$footerwidget_title = get_theme_mod("hereditary_footerwidget_title");
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ) ?>">
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
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ) ?>">
<?php wp_head(); ?>
<style>
<?php if($navpos): ?>
body, html { padding-top: 27px; }
<?php endif; ?>
.maincontentbg a:not(.btn),
.breadcrumb a,
.card a,
.page-link,
.list-group-item a,
.nav-item a {
	color: <?php echo $linkcolor ?>;
}
.maincontentbg a:not(.btn):hover,
.breadcrumb a:hover,
.card a:hover,
.page-link:hover,
.list-group-item a:hover,
.nav-item a:hover {
	color: <?php echo $hovercolor ?>;
}
.page-link:hover {
	background: <?php echo $navlight ?>;
}
.section-menu,
.post-edit-link,
#sectionNav .nav,
.page-link,
input, textarea,
.custom-background .list-group-item,
.custom-background .breadcrumb {
	background-color: <?php echo $mainbgcolor ?>;
	border: 0;
}
#sectionNav .nav {
	border-radius: 4px;
}
#sectionNav .active {
	background-color: <?php echo $navlight ?>;
	border-radius: 4px;
}
.pagetitle {
	color: <?php echo $pageheader ?>;
}
.post h1 a {
	color: <?php echo $postlinks ?>;
}
.maincontentbg {
	background-color: <?php echo $mainbgcolor ?>;
	padding: <?php echo $mainpadding ?>;
}
.jumbotron,
.card {
	background-color: <?php echo $footerwidget ?>;
	color: <?php echo $footerwidget_title ?>;
}
.card h1 {
	font-weight: 200;
}
.btn-success,
.btn-success:hover {
	background-color: <?php echo $btnsuccess ?>;
	border-color: <?php echo $btnsuccess ?>;
}
</style>
</head>
<body <?php body_class(); ?>>
<nav class="navbar navbar-full <?php echo $navpos ?> <?php echo $navbar_base ?>" 
	style="background-color: <?php echo $navbar_color ?>">
	<a class="navbar-brand" href="<?php echo esc_url( $url ) ?>">
		<?php if($custom_logo_id): ?>
		<img class="d-inline-block align-top logo" 
			src="<?php echo $image[0] ?>" alt="<?php bloginfo( 'name' ) ?>"
			height="30"
			width="30">
		<?php endif ?>
		<?php bloginfo( 'name' ) ?>
	</a>
	<button class="float-md-right hidden-lg-up navbar-toggler" 
		type="button" 
		data-toggle="collapse" 
		data-target="#hereditary-collapse" 
		aria-controls="hereditary-collapse" aria-expanded="false" aria-label="Toggle navigation">
	</button>
	<div class="collapse navbar-toggleable-md" id="hereditary-collapse">
	<?php wp_nav_menu( array(
		'menu'              => 'primary',
		'theme_location'    => 'primary',
		'depth'             => 2,
		'container'         => '',
		'container_class'   => 'nav navbar-nav',
		'container_id'      => '',
		'menu_class'        => 'nav navbar-nav',
		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		'walker'            => new wp_bootstrap_navwalker())
	) ?>
	<?php if($searchenable): ?>
	<form class="form-inline float-md-right" action="/" method="get">
		<input style="background: <?php echo $searchbg ?>" 
			class="form-control" 
			name="s" 
			id="s" 
			type="text" 
			placeholder="Search" 
			value="<?php the_search_query() ?>">
	</form>
	<?php endif; ?>
	</div>

</nav>

