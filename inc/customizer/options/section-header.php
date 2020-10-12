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
	'settings'    => 'menu_type',
	'label'       => __( 'Menu type', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_menu',
	'default'     => 'header-default',
	'choices'     => array(
		'header-default' 		=> esc_attr__( 'Default Header', 'polmo-lite' ),
		'header-transparent' 	=> esc_attr__( 'Transparent Header', 'polmo-lite' )
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