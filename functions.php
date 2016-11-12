<?php
require_once('wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');
require_once('wp_bootstrap_listwalker.php');
require_once('wp_bootstrap_sidenavwalker.php');
register_nav_menus( array('primary' => 'Primary Navigation') );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'widgets' );
add_theme_support( 'custom-background');
add_theme_support( 'custom-logo');

/**
 * Register our sidebars and widgetized areas.
 *
 */
function bsreference_widgets_init() {

        register_sidebar( array(
                'name'          => 'Home Primary',
                'id'            => 'home_primary',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => '',
        ) );
        register_sidebar( array(
                'name'          => 'Home Secondary',
                'id'            => 'home_secondary',
                'before_widget' => '<div class="col-md-4">',
                'after_widget'  => '</div>',
                'before_title'  => '<h1>',
                'after_title'   => '</h1>',
        ) );

        register_sidebar( array(
                'name'          => 'Menu Widgets',
                'id'            => 'menu_widgets',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => '',
        ) );
        register_sidebar( array(
                'name'          => 'Footer',
                'id'            => 'footer',
                'before_widget' => '<div class="col-md-4">',
                'after_widget'  => '</div>',
                'before_title'  => '<h1>',
                'after_title'   => '</h1>',
        ) );


}
add_action( 'widgets_init', 'bsreference_widgets_init' );



function bsreference_video_embed($video_url) {
	$link = parse_url($video_url);
	$provider = $link['host'];
	$provider = explode("www.",$provider);
	$embedcode = '<div class="embed-responsive embed-responsive-16by9">';
	$embedcode .= '<iframe ';
	if($provider[1] == 'vimeo.com'):
		$videoid = $link["path"];
		$embedcode .= 'src="https://player.vimeo.com/video' . $videoid . '"';
	elseif($provider[1] == 'youtube.com'):
		$videoid = $link['query'];
		$videoid = explode('v=',$videoid);
		$embedcode .= 'src="https://www.youtube.com/embed/' . $videoid[1] . '"';
	endif;
	$embedcode .= ' width="100%" height="300" frameborder="0"';
	$embedcode .= ' class="embed-responsive-item" allowfullscreen>';
	$embedcode .= '</iframe>';
	$embedcode .= '</div>';

	return $embedcode;

}
