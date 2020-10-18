<?php
/**
 * Header Customizer panel
 *
 * @package Brooklyn Lite
 */

//Header Menu
Polmo_Lite_Kirki::add_section( 'polmo_lite_section_menu', array(
    'title'       	 => __( 'Header Layout', 'polmo-lite' ),
    'panel'			 => 'polmo_lite_panel',
    'priority'       => 1,
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'radio',
	'settings'    => 'header_color',
	'label'       => __( 'Header Variation', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_menu',
	'default'     => 'default',
	'choices'     => array(
		'default' 				=> esc_attr__( 'Default Header', 'polmo-lite' ),
		'bg-light' 				=> esc_attr__( 'Light Header', 'polmo-lite' ),
		'bg-dark' 				=> esc_attr__( 'Dark Header', 'polmo-lite' ),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'radio',
	'settings'    => 'header_scroll',
	'label'       => __( 'Scroll Type', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_menu',
	'default'     => 'default',
	'choices'     => array(
		'default' 				=> esc_attr__( 'Scroll', 'polmo-lite' ),
		'fixed-top' 			=> esc_attr__( 'Fixed Top', 'polmo-lite' ),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'radio',
	'settings'    => 'menu_type',
	'label'       => __( 'Menu type', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_menu',
	'default'     => 'header-default',
	'choices'     => array(
		'header-default' 		=> esc_attr__( 'Default Header', 'polmo-lite' ),
		'transparent-header' 	=> esc_attr__( 'Transparent Header', 'polmo-lite' ),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'radio',
	'settings'    => 'menu_container',
	'label'       => __( 'Menu width', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_menu',
	'default'     => 'menu-container',
	'choices'     => array(
		'menu-container' 	=> esc_attr__( 'Container Menu', 'polmo-lite' ),
		'menu-full-width' 	=> esc_attr__( 'Full/Stretched Menu', 'polmo-lite' ),
	)
) );

/**
 * Checks if menu type is extended
 */
function polmo_lite_menu_type_callback() {
    $type = get_theme_mod( 'menu_type' );

    if ( $type == 'menuStyle3' || $type == 'menuStyle4' ) {
    	return true;
    } else {
    	return false;
    }
}