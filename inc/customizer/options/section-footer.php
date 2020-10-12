<?php
/**
 * Footer Customizer panel
 *
 * @package Brooklyn Lite
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
	'default'     => __('&copy; 2020 All Rights Reserved','polmo-lite'),
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'url',
	'settings'    => 'polmo_lite_facebook',
	'label'       => esc_html__( 'Facebook URL', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'url',
	'settings'    => 'polmo_lite_twitter',
	'label'       => esc_html__( 'Twitter URL', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'url',
	'settings'    => 'polmo_lite_skype',
	'label'       => esc_html__( 'Skype URL', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'url',
	'settings'    => 'polmo_lite_instagram',
	'label'       => esc_html__( 'Instagram URL', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );


Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'url',
	'settings'    => 'polmo_lite_dribble',
	'label'       => esc_html__( 'Dribbble URL', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );


Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'url',
	'settings'    => 'polmo_lite_vimeo',
	'label'       => esc_html__( 'Vimeo URL', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );
