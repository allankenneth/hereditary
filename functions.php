<?php
function hereditary_enqueue() {
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/tether.min.css');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '',  true);
	wp_enqueue_script('tether', get_template_directory_uri() . '/js/tether.min.js', array('jquery'), '',  true);
}
add_action( 'wp_enqueue_scripts', 'hereditary_enqueue');
require_once('wp_bootstrap_navwalker.php');
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
function hereditary_widgets_init() {

        register_sidebar( array(
                'name'          => 'Sidebar',
                'id'            => 'sidebar',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<h1>',
                'after_title'   => '</h1>',
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
add_action( 'widgets_init', 'hereditary_widgets_init' );



function hereditary_video_embed($video_url) {
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

function hereditary_customize_register($wp_customize) 
{

	require_once( dirname( __FILE__ ) . '/alpha-color-picker/alpha-color-picker.php' );

	$wp_customize->add_section("hereditary", array(
		"title" => __("Hereditary", "customizer_hereditary_sections"),
		"priority" => 0,
	));
	$wp_customize->add_setting("hereditary_header_color", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_setting("hereditary_links", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_setting("hereditary_navpos", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_setting("hereditary_links_hover", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_setting("hereditary_nav_highlight", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_setting("hereditary_navbar", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_setting("hereditary_navbar_color", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_setting("hereditary_pageheader", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_setting("hereditary_contentbg", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_setting("hereditary_content_text", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_setting("hereditary_excludepages", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_setting("hereditary_postlinks", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_setting("hereditary_searchbg", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"hereditary_navpos",
		array(
			"label" => __("Nav Bar Position", "customizer_hereditary_navpos_label"),
			"section" => "hereditary",
			"settings" => "hereditary_navpos",
			'type'     => 'radio',
			'choices'  => array(
				''  => 'Scrolls with content',
				'navbar-fixed-top'  => 'Fixed to the top',
				'navbar-fixed-bottom' => 'Fixed to the bottom',
		),
		)
	));
    $wp_customize->add_control(
        new Customize_Alpha_Color_Control(
            $wp_customize,
            'hereditary_searchbg',
            array(
                'label'         => __( 'Search field background color', 'customizer_hereditary_searchbg_label' ),
                'section'       => 'colors',
                'settings'      => 'hereditary_searchbg',
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
            )
        )
    );
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"hereditary_navbar",
		array(
			"label" => __("Navbar Base Color", "customizer_hereditary_navbar_label"),
			"section" => "colors",
			"settings" => "hereditary_navbar",
			'type'     => 'radio',
			'choices'  => array(
				'navbar-light'  => 'Dark',
				'navbar-dark' => 'White',
		),
		)
	));
    $wp_customize->add_control(
        new Customize_Alpha_Color_Control(
            $wp_customize,
            'alpha_color_control',
            array(
                'label'         => __( 'Navbar Color', 'customizer_hereditary_navbar_color_label' ),
                'section'       => 'colors',
                'settings'      => 'hereditary_navbar_color',
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
            )
        )
    );
    $wp_customize->add_control(
        new Customize_Alpha_Color_Control(
            $wp_customize,
            'hereditary_pageheader',
            array(
                'label'         => __( 'Main Page Header Color', 'customizer_hereditary_pageheader_label' ),
                'section'       => 'colors',
                'settings'      => 'hereditary_pageheader',
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
            )
        )
    );
 	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"hereditary_content_text",
		array(
			"label" => __("Content Text Color", "customizer_hereditary_navbar_label"),
			"section" => "colors",
			"settings" => "hereditary_content_text",
			'type'     => 'radio',
			'choices'  => array(
				'maincontentbg'  => 'Dark text',
				'maincontentbg text-white' => 'White text',
			),
		)
	));       
        
    $wp_customize->add_control(
        new Customize_Alpha_Color_Control(
            $wp_customize,
            'main_content_bg',
            array(
                'label'         => __( 'Main Content Background Color', 'yourtextdomain' ),
                'section'       => 'colors',
                'settings'      => 'hereditary_contentbg',
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
            )
        )
    );
    $wp_customize->add_control(
        new Customize_Alpha_Color_Control(
            $wp_customize,
            'hereditary_nav_highlight',
            array(
                'label'         => __( 'Navigation Page Highlight Background', 'customizer_hereditary_nav_highlight_label' ),
                'section'       => 'colors',
                'settings'      => 'hereditary_nav_highlight',
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
            )
        )
    );

    $wp_customize->add_control(
        new Customize_Alpha_Color_Control(
            $wp_customize,
            'hereditary_links',
            array(
                'label'         => __( 'Link Color', 'customizer_hereditary_links_color_label' ),
                'section'       => 'colors',
                'settings'      => 'hereditary_links',
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
            )
        )
    );
    $wp_customize->add_control(
        new Customize_Alpha_Color_Control(
            $wp_customize,
            'hereditary_links',
            array(
                'label'         => __( 'Link Color', 'customizer_hereditary_links_color_label' ),
                'section'       => 'colors',
                'settings'      => 'hereditary_links',
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
            )
        )
    );


    $wp_customize->add_control(
        new Customize_Alpha_Color_Control(
            $wp_customize,
            'hereditary_links_hover',
            array(
                'label'         => __( 'Link Hover Color', 'customizer_hereditary_links_hover_color_label' ),
                'section'       => 'colors',
                'settings'      => 'hereditary_links_hover',
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
            )
        )
    );
    $wp_customize->add_control(
        new Customize_Alpha_Color_Control(
            $wp_customize,
            'hereditary_postlinks',
            array(
                'label'         => __( 'Post Header/Link Color', 'customizer_hereditary_postlinks_label' ),
                'section'       => 'colors',
                'settings'      => 'hereditary_postlinks',
                'show_opacity'  => true, // Optional.
                'palette'   => array(
                    'rgb(150, 50, 220)', // RGB, RGBa, and hex values supported
                    'rgba(50,50,50,0.8)',
                    'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                    '#00CC99' // Mix of color types = no problem
                )
            )
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "hereditary_excludepage",
        array(  
            "label" => __("Exclude pages from menu", "customizer_hereditary_excludepage_label"),
            "section" => "hereditary",
            "settings" => "hereditary_excludepages",
            "type"     => "text",
                )
    ));

}

add_action("customize_register","hereditary_customize_register");

function hereditary_customizer_live_preview()
{
	wp_enqueue_script("hereditary-themecustomizer", get_template_directory_uri() . "/js/theme-customizer.js", array("jquery", "customize-preview"), '',  true);
}

add_action("customize_preview_init", "hereditary_customizer_live_preview");

class My_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'bootstrap_categories',
			'description' => 'Bootstrap List Group Categories',
		);
		parent::__construct( 'bootstrap_categories', 'Bootstrap List Group Categories', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$cat_args = array(
			'orderby'      => 'name',
			'show_count'   => $c,
			'hierarchical' => $h,
		);
		$cat_args['title_li'] = '';
		//wp_list_categories( $cat_args );
		$cats = get_categories(); ?>
		<ul class="list-group">
		<?php foreach($cats as $cat): ?>
		<li class="list-group-item"><a href="/category/<?php echo $cat->slug ?>"><?php echo $cat->name ?></a></li>
		<?php endforeach; ?>
		</ul>
		<?php echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'My_Widget' );
});
