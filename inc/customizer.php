<?php
/**
 * Polmo Theme Customizer
 *
 * @package Polmo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function polmo_lite_customize_register( $wp_customize ) {
	
	if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
	

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



	 //=============================================================
	 // Remove header image and widgets option from theme customizer
	 //=============================================================
	 // $wp_customize->remove_control("header_image");

	 //=============================================================
	 // Remove Colors, Background image, and Static front page 
	 // option from theme customizer     
	 //=============================================================
	 $wp_customize->remove_section("colors");
	 $wp_customize->remove_section("background_image");
	 // $wp_customize->remove_section("static_front_page");



	$wp_customize->add_section( 'theme_detail', array(
        'title'    => __( 'About Theme', 'polmo-lite' ),
        'priority' => 9
    ) );

    
    $wp_customize->add_setting( 'upgrade_text', array(
        'default' => '',
        'sanitize_callback' => '__return_false'
    ) );


    $wp_customize->add_panel( 'polmo_lite_panel', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'title' => __( 'Polmo Theme Options', 'polmo-lite' ),
    ) );


}
add_action( 'customize_register', 'polmo_lite_customize_register' );

function polmo_lite_customize_preview_js() {
	wp_enqueue_script( 'polmo_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), POLMO_LITE_VER, true );
}
add_action( 'customize_preview_init', 'polmo_lite_customize_preview_js' );


//Santize Text function
function polmo_lite_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function polmo_lite_custom_customize_enqueue() {
	wp_enqueue_script( 'polmo_lite-custom-customize', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'polmo_lite_custom_customize_enqueue' );





/**
 * Kirki
 */
if ( !class_exists( 'Kirki' ) ) return;
require get_template_directory() . '/inc/customizer/kirki/include-kirki.php';
require get_template_directory() . '/inc/customizer/kirki/class-prowptheme-kirki.php';

/**
 * Add Kirki config
 */
Polmo_Lite_Kirki::add_config( 'polmo_lite', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/**
 * Load option files
 */
require get_template_directory() . '/inc/customizer/options/section-blog.php';
require get_template_directory() . '/inc/customizer/options/section-header.php';
require get_template_directory() . '/inc/customizer/options/section-footer.php';
require get_template_directory() . '/inc/customizer/options/section-typography.php';
require get_template_directory() . '/inc/customizer/options/section-colors.php';