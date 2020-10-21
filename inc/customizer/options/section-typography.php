<?php
/**
 * Typography Customizer panel
 *
 * @package Polmo Lite
 */

/**
 * Typography
 */
Polmo_Lite_Kirki::add_section( 'polmo_lite_section_fonts', array(
    'title'       	 => __( 'Typography Settings', 'polmo-lite' ),
    'panel'			 => 'polmo_lite_panel',
    'priority'       => 5,
) );


//Headings family
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'typography',
	'settings'    => 'headings_font',
	'label'       => esc_attr__( 'Headings', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_fonts',
	'default'     => array(
		'font-family'    => 'Belgrano',
		'variant'        => '300,400,700,900',
	),
	'priority'    => 1033,
	'output'      => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,h6,.site-title, .entry-title, .section-title',
		),
		array(
			'element'  => '.editor-block-list__layout h1,.editor-block-list__layout h2,.editor-block-list__layout h3,.editor-block-list__layout h4,.editor-block-list__layout h5,.editor-block-list__layout h6,.editor-post-title__block .editor-post-title__input',
			'context'  => array( 'editor' ),
		),		
	),
) );

//Body family
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'typography',
	'settings'    => 'body_font',
	'label'       => esc_attr__( 'Body', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_fonts',
	'default'     => array(
		'font-family'    => 'Lato',
		'variant'        => '300,400,700,900',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'body, article .entry-content p',
		),
		array(
			'element'  => '.editor-block-list__layout,.editor-block-list__layout .editor-block-list__block',
			'context'  => array( 'editor' ),
		),		
	),
) );

/**
 * Font sizes
 */
Polmo_Lite_Kirki::add_section( 'polmo_lite_section_font_sizes', array(
    'title'       	 => esc_attr__( 'Font sizes', 'polmo-lite' ),
    'section'     	 => 'polmo_lite_section_fonts',
    'priority'       => 16,
) );

//Header font sizes
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_general',
	'label'       => '',
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'General', 'polmo-lite' ) . '</div>',
	'priority'    => 10,
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_body',
	'label'       =>  esc_attr__( 'Body', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => 'body, article .entry-content p',
			'property' => 'font-size',
			'units'    => 'px',
		),
		array(
			'element'  => '.editor-styles-wrapper p',
			'context'  => array( 'editor' ),
		),
	),	
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_header',
	'label'       => '',
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'Header area', 'polmo-lite' ) . '</div>',
	'priority'    => 10,
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_site_title',
	'label'       =>  esc_attr__( 'Site Title', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '36',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 16,
		'max'  => 50,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => 'h1.navbar-brand',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_site_desc',
	'label'       =>  esc_attr__( 'Site description', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 12,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.site-description',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_menu_top_items',
	'label'       =>  esc_attr__( 'Top level menu items', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '#main-menu li',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_sub_menu_items',
	'label'       =>  esc_attr__( 'Submenu items', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '#main-menu ul ul li',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

//Blog
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_blog',
	'label'       => '',
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'Blog', 'polmo-lite' ) . '</div>',
	'priority'    => 10,
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_index_title',
	'label'       =>  esc_attr__( 'Post titles (archives)', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.archive article .entry-title, .category article .entry-title,.blog .entry-title, .entry-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_single_title',
	'label'       =>  esc_attr__( 'Post titles (singles)', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '36',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.single article .entry-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

//Footer font sizes
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_footer',
	'label'       => '',
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'Footer area', 'polmo-lite' ) . '</div>',
	'priority'    => 10,
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_footer_credits',
	'label'       =>  esc_attr__( 'Footer Copyrights', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.footer-bottom',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );