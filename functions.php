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

if ( ! function_exists( 'polmo_lite_setup' ) ) {
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function polmo_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Polmo, use a find and replace
		 * to change 'polmo-lite' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'polmo-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 60,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

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
} // polmo_lite_setup
add_action( 'after_setup_theme', 'polmo_lite_setup' );

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

	//CSS
	wp_enqueue_style( 'polmo-bootstrap', JWCSS . 'bootstrap.min.css');
	wp_enqueue_style( 'polmo-theme', JWCSS . 'theme.css');
	wp_enqueue_style( 'polmo-responsive', JWCSS . 'responsive.min.css');
	wp_enqueue_style( 'polmo-google-fonts', polmo_lite_google_fonts_url());


	//JS
	wp_enqueue_script( 'polmo-custom', JWJS . 'custom.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap', JWJS . 'bootstrap.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'polmo-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'polmo-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'polmo_lite_scripts', 999 );


// Script Conflicting issues
add_action( 'wp_print_styles', 'polmo_lite_dequeue_styles' );
add_action( 'wp_print_scripts', 'polmo_lite_dequeue_scripts' );

//Dequeue Styles
function polmo_lite_dequeue_styles() {
    
    // conflicting issue with Master Addons
	if ( is_plugin_active( 'master-addons/master-addons.php' ) ) {
		wp_dequeue_style('bootstrap');
	}
}

//Dequeue JavaScripts
function polmo_lite_dequeue_scripts() {
    wp_dequeue_script( 'modernizr-js' );
        wp_deregister_script( 'modernizr-js' );
    wp_dequeue_script( 'project-js' );
        wp_deregister_script( 'project-js' );
}



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

// Navwalker
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

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



function polmo_lite_add_menu_link_class($atts, $item, $args){
    $atts['class'] = 'nav-link';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'polmo_lite_add_menu_link_class', 1, 3);