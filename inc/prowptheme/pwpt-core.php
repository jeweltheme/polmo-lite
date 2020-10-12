<?php
/**
 * Load Core Files
 *

/* Template Functions */
require PROWPTHEME_PATH . 'template-functions.php';


/**
 * Upgrade to pro
 */
require PROWPTHEME_PATH . 'upsell/class-customize.php';
require PROWPTHEME_PATH . 'dynamic-css.php';


/**
 * Theme Info
 */
if ( current_user_can( 'manage_options' ) ) {
	require PROWPTHEME_PATH . 'theme-info.php';
}

function polmo_lite_admin_menu_icon_size() {
    echo '<style>.toplevel_page_polmo-lite-info img{width:20px;height:20px;}</style>';
}

add_action('admin_head', 'polmo_lite_admin_menu_icon_size');



/**
 * Custom Elementor widgets
 */
function polmo_lite_register_elementor_widgets() {

	if ( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ) {

		require PROWPTHEME_PATH . 'compatibility/elementor/blocks/block-blog.php';
	}
}
add_action( 'elementor/widgets/widgets_registered', 'polmo_lite_register_elementor_widgets' );


/**
 * Custom Elementor category
 */
function polmo_lite_block_category() {
	
	if ( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ) {
		\Elementor\Plugin::$instance->elements_manager->add_category( 
		'prowptheme-elements',
		[
			'title' => __( 'ProWPTheme Elements', 'polmo-lite' ),
			'icon' => 'fa fa-plug',
		], 1 );
	}	
}
add_action( 'elementor/elements/categories_registered', 'polmo_lite_block_category' );

/**
 * Elementor skins
 */
add_action( 'elementor/init', 'polmo_lite_add_elementor_skins' );
function polmo_lite_add_elementor_skins(){
	require PROWPTHEME_PATH . 'compatibility/elementor/skins/class-prowptheme-google-maps-skin.php';
	require PROWPTHEME_PATH . 'compatibility/elementor/skins/class-prowptheme-image-icon-box-skin.php';
	require PROWPTHEME_PATH . 'compatibility/elementor/skins/class-prowptheme-blog-skin.php';
	require PROWPTHEME_PATH . 'compatibility/elementor/skins/class-prowptheme-blog-skin-2.php';
	require PROWPTHEME_PATH . 'compatibility/elementor/skins/class-prowptheme-blog-skin-3.php';
	require PROWPTHEME_PATH . 'compatibility/elementor/skins/class-prowptheme-blog-skin-4.php';
	require PROWPTHEME_PATH . 'compatibility/elementor/skins/class-prowptheme-blog-skin-6.php';
}

/**
 * Widgets
 */
require PROWPTHEME_PATH . 'widgets/class-prowptheme-social.php';
require PROWPTHEME_PATH . 'widgets/class-prowptheme-recent-posts.php';


/**
 * Load Learnpress compatibility file.
 */
if ( class_exists( 'LearnPress' ) ) {
	require PROWPTHEME_PATH . 'compatibility/learnpress.php';
}