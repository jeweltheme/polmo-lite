<?php
/**
 * Blog Customizer panel
 *
 * @package Brooklyn Lite
 */

/**
 * Index
 */
Polmo_Lite_Kirki::add_section( 'polmo_lite_section_blog_index', array(
	'title'       	 => __( 'Blog & Archive Settings', 'polmo-lite' ),
	'panel'			 => 'polmo_lite_panel',
    'priority'       => 3,
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'radio',
	'settings'    => 'blog_layout',
	'label'       => __( 'Blog layout', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-default' 			=> esc_attr__( 'Default', 'polmo-lite' ),
		'layout-grid' 				=> esc_attr__( 'Grid', 'polmo-lite' ),
		'layout-classic' 			=> esc_attr__( 'Classic', 'polmo-lite' ),
		'layout-two-columns' 		=> esc_attr__( 'Two Columns', 'polmo-lite' ),
	),
) );

/*Excerpt Length*/
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'number',
	'settings'    => 'polmo_lite_blog_excerpt',
	'label'       => esc_attr__( 'Excerpt length', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => 20,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 5,
		'max'  => 80,
		'step' => 1,
	),
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'text',
	'settings'    => 'polmo_lite_read_more_text',
	'label'       => esc_attr__( 'Read more text', 'polmo-lite' ),
	'description' => esc_attr__( 'Leave empty to hide', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => esc_attr__( 'Read more', 'polmo-lite' ),
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'index_hide_read_more',
            'value'    => '0',
            'operator' => '==',
        ),
	),		
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'polmo_lite_blog_meta',
	'label'       => esc_attr__( 'Hide All Meta?', 'polmo-lite' ),
	'description' => __('Check to hide the date, category, tags etc on blog page.', 'polmo-lite'),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_thumb',
	'label'       => esc_attr__( 'Hide post thumbnail?', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'polmo_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_date',
	'label'       => esc_attr__( 'Hide post date?', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'polmo_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_cats',
	'label'       => esc_attr__( 'Hide post categories?', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'polmo_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_tags',
	'label'       => esc_attr__( 'Hide post Tags?', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'polmo_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_author',
	'label'       => esc_attr__( 'Hide post author?', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'polmo_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_comments',
	'label'       => esc_attr__( 'Hide comments number?', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'polmo_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_read_more',
	'label'       => esc_attr__( 'Hide Read More?', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'polmo_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'polmo_lite_breadcrumbs',
	'label'       => esc_attr__( 'Hide Breadcrumbs?', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10
) );


/**
 * Single posts
 */
Polmo_Lite_Kirki::add_section( 'polmo_lite_section_blog_single', array(
	'title'       	 => __( 'Single Post Settings', 'polmo-lite' ),
	'panel'			 => 'polmo_lite_panel',	
    'priority'       => 5,
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'radio',
	'settings'    => 'single_post_layout',
	'label'       => __( 'Single post layout', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_single',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-default' 	=> esc_attr__( 'Default', 'polmo-lite' ),
		'layout-full' 		=> esc_attr__( 'No sidebar', 'polmo-lite' ),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'radio',
	'settings'    => 'single_post_content_layout',
	'label'       => __( 'Content layout', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_single',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-default' 	=> esc_attr__( 'Default', 'polmo-lite' ),
		'layout-2' 		=> esc_attr__( 'Layout 2', 'polmo-lite' ),
		'layout-3' 		=> esc_attr__( 'Layout 3', 'polmo-lite' ),
	),
) );