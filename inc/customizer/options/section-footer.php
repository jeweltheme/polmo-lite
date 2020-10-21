<?php
/**
 * Footer Customizer panel
 *
 * @package Polmo Lite
 */


Polmo_Lite_Kirki::add_section( 'polmo_lite_section_footer', array(
    'title'       	 => __( 'Footer Settings', 'polmo-lite' ),
    'panel'			 => 'polmo_lite_panel',
    'priority'       => 5,
) );


Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'textarea',
	'settings'    => 'copyright_text',
	'label'    => esc_html__( 'Copyright Text', 'polmo-lite' ),
	'description' => esc_html__( 'Copyright Text', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_footer',
	'default'     => __('&copy; <a href="https://prowptheme.com/themes/polmo-business-wordpress-theme/" rel="nofollow" target="_blank">Polmo Lite</a> ' . date_i18n('Y') .'. All Rights Reserved by <a href="https://prowptheme.com/" rel="nofollow" target="_blank">ProWPTheme</a>','polmo-lite'),
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );
