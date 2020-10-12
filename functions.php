<?php
/**
 * Polmo functions and definitions
 *
 * @package Polmo
 */

define('JWPOLMO', wp_get_theme()->get( 'Name' ));

if (!defined('POLMO_LITE_VER')) {
	define( 'POLMO_LITE_VER', wp_get_theme()->get( 'Version' ));
}

define('JWCSS', get_template_directory_uri().'/assets/css/');

define('JWJS', get_template_directory_uri().'/assets/js/');

define('JWT_FEATURED_EMAGE','https://www.youtube.com/watch?v=qZ92n79Ul5A');


if (!defined('POLMO_LITE_PATH')) {
	define( 'POLMO_LITE_PATH', get_template_directory());
}

if (!defined('POLMO_LITE_THEME_URI')) {
	define( 'POLMO_LITE_THEME_URI', get_template_directory_uri());
}

if (!defined('PROWPTHEME_PATH')) {
	define( 'PROWPTHEME_PATH', get_template_directory() . '/inc/prowptheme/');
}
if (!defined('PROWPTHEME_THEME_URI')) {
	define( 'PROWPTHEME_THEME_URI', get_template_directory_uri() . '/inc/prowptheme/');
}

if ( ! function_exists( 'polmo_setup' ) ) {
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function polmo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Polmo, use a find and replace
		 * to change 'polmo-lite' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'polmo-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 35,
			'flex-height' => true,
			) );


		add_editor_style();

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'polmo-blog-thumb', '900', '400', true );

		add_image_size( 'polmo-home-blog', '375', '275', true );

		add_image_size( 'polmo-portfolio', '650', '440', true );



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'polmo-lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array('aside','audio','chat','image','link','quote','status') );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'polmo_lite_custom_background_args', array(
			'default-color' 	=> 'ffffff',
			'default-image' 	=>  '',
		) ) );




	/*
	* Gutenberg Support
	*/
	add_theme_support( 'customize-selective-refresh-widgets' );
	// Add support for Block Styles
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Editor color palette
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Primary Color', 'polmo-lite' ),
				'slug'  => 'primary',
				'color' => polmo_lite_blog_hsl_hex( 'default' === get_theme_mod( 'colorscheme' ) ? 199 : get_theme_mod( 'colorscheme_primary_hue', 199 ), 100, 33 ),
			),
		)
	);

	// Add support for responsive embedded content
	add_theme_support( 'responsive-embeds' );


	}
} // polmo_setup
add_action( 'after_setup_theme', 'polmo_setup' );



function polmo_excerpt( $length ) {
	return $length;
}
add_filter( 'excerpt_length', 'polmo_excerpt', 999 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function polmo_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'polmo_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'polmo_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function polmo_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'polmo-lite' ),
		'id'            => 'blog-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'polmo-lite' ),
		'id'            => 'footer-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu', 'polmo-lite' ),
		'id'            => 'footer-menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget widget_menu %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'polmo_lite_widgets_init' );



// Google Fonts
function polmo_lite_google_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'polmo-lite' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900|Belgrano' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}



/**
 * Enqueue scripts and styles.
 */
function polmo_lite_scripts() {

	
		wp_enqueue_style( 'polmo-lite-style', get_stylesheet_uri() );

		
		if ( is_page() && basename(get_page_template()) == "front-page.php") {

			//CSS
			wp_enqueue_style( 'bootstrap', JWCSS . 'bootstrap.min.css');
			// wp_enqueue_style( 'animate', JWCSS . 'animate.min.css');
			// wp_enqueue_style( 'font-awesome', JWCSS . 'font-awesome.min.css');
			// wp_enqueue_style( 'magnific-popup', JWCSS . 'magnific-popup.css');
			// wp_enqueue_style( 'bxslider', JWCSS . 'jquery.bxslider.css');
			wp_enqueue_style( 'polmo-theme', JWCSS . 'theme.css');
			wp_enqueue_style( 'polmo-responsive', JWCSS . 'responsive.min.css');

			//Google Fonts			
			// wp_register_style('polmo-googleFontsLato','//fonts.googleapis.com/css?family=Lato:300,400,700,900');
			// wp_enqueue_style( 'polmo-googleFontsLato'); 

			// wp_register_style('polmo-googleFontsLatoBelgrano','//fonts.googleapis.com/css?family=Belgrano');
			// wp_enqueue_style( 'polmo-googleFontsLatoBelgrano');


			//JS
			// wp_enqueue_script( 'modernizr', JWJS . 'modernizr-2.8.3-respond-1.4.2.min.js', array('jquery'), '', false );
			// wp_enqueue_script( 'wow', JWJS . 'wow.js', array('jquery'), '', true );
			// wp_enqueue_script( 'custom', 'http://maps.google.com/maps/api/js?sensor=true', array('jquery'), '', true );
			// wp_enqueue_script( 'gmap3', JWJS . 'gmap3.js', array('jquery'), '', true );
			// wp_enqueue_script( 'waypoints', JWJS . 'waypoints.min.js', array('jquery'), '', true );
			wp_enqueue_script( 'polmo-custom.min', JWJS . 'custom.min.js', array('jquery'), '', true );	
			// wp_enqueue_script( 'ajaxchimp.min', JWJS . 'jquery.ajaxchimp.min.js', array('jquery'), '', true );
			// wp_enqueue_script( 'jquery.bxslider', JWJS . 'jquery.bxslider.min.js', array('jquery'), '', true );

		} else {

			// Blog Page

			//CSS
			wp_enqueue_style( 'bootstrap', JWCSS . 'bootstrap.min.css');			
			// wp_enqueue_style( 'font-awesome', JWCSS . 'font-awesome.min.css');			
			// wp_enqueue_style( 'bxslider', JWCSS . 'jquery.bxslider.css');
			wp_enqueue_style( 'polmo-theme', JWCSS . 'theme.css');
			wp_enqueue_style( 'polmo-responsive', JWCSS . 'responsive.min.css');

			//Google Fonts			
			// wp_register_style('polmo-googleFontsLato','//fonts.googleapis.com/css?family=Lato:300,400,700,900');
			// wp_enqueue_style( 'polmo-googleFontsLato'); 

			// wp_register_style('polmo-googleFontsLatoBelgrano','//fonts.googleapis.com/css?family=Belgrano');
			// wp_enqueue_style( 'polmo-googleFontsLatoBelgrano');

			//JS
			// wp_enqueue_script( 'modernizr', JWJS . 'modernizr-2.8.3-respond-1.4.2.min.js', array('jquery'), '', false );			
			wp_enqueue_script( 'polmo-custom', JWJS . 'custom.min.js', array('jquery'), '', true );
			// wp_enqueue_script( 'wow', JWJS . 'wow.js', array('jquery'), '', true );		
			// wp_enqueue_script( 'waypoints', JWJS . 'waypoints.min.js', array('jquery'), '', true );
			// wp_enqueue_script( 'jquery.bxslider', JWJS . 'jquery.bxslider.min.js', array('jquery'), '', true );
			
		}

	wp_enqueue_script( 'polmo-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'polmo-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'polmo_lite_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Sanitization
 */
require get_template_directory() . '/inc/sanitization.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
* Quick Styles
*
*/
require get_template_directory() . '/inc/quick_styles.php';

require get_template_directory() . '/inc/gutenberg.php';

/*===================================================================================
 * Search Form
 * =================================================================================*/
add_filter('get_search_form', 'polmo_lite_search_form');

function polmo_lite_search_form($form) {
	$form = '<form role="search" class="search-form" method="get" action="' . esc_url( home_url( '/' ) ) . '" >
		<input class="search-field" type="text" name="s" id="s" value="' . esc_attr( get_search_query() ) . '" placeholder="Search" required>
		 <button type="submit" id="search-submit" class="search-submit"><i class="fa fa-search"></i></button>
	</form>';

return $form;
}


// Get Blog Link
function polmo_lite_get_blog_link(){
    $blog_post = get_option("page_for_posts");
    if($blog_post){
        $permalink = get_permalink($blog_post);
    }
    else
        $permalink = home_url( '/' );
    
    return $permalink;
}



function polmo_lite_get_custom_posts($category_name, $limit = 20, $order = "DESC"){
    $args = array(
        "posts_per_page" => $limit,
        "post_type" => 'post',
        "category" => $category_name,
        "orderby" => "ID",
        "order" => "DESC",
    );
    $custom_posts = get_posts($args);
    return $custom_posts;
}



/*
* Starter Content Support
* Afer v2.3.0
*/

function polmo_lite_starter_content() {
	// Twenty Seventeen
	add_theme_support( 'starter-content', array(		
		'posts' => array(
			'home',
			'blog',
        ),

		'nav_menus' => array(
			'primary'      => array(
				'name'  => __( 'Primary Menu', 'polmo-lite' ),
				'items' => array(
					'page_home',
					'page_blog',
				),
			),
		),

		'options' => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),
	) );

}
add_action( 'after_setup_theme', 'polmo_lite_starter_content' );



/* Breadcrumb Trail */
require POLMO_LITE_PATH . '/inc/breadcrumb-trail.php';

/* ProWP Theme Core */
require PROWPTHEME_PATH . 'pwpt-core.php';