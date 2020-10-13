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

Polmo_Lite_Kirki::add_field( 'polmo_lite', [
	'type'        => 'switch',
	'settings'    => 'blog_header_section',
	'label'       => esc_html__( 'Header Section?', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'polmo-lite' ),
		'off' => esc_html__( 'Hide', 'polmo-lite' ),
	],
] );

Polmo_Lite_Kirki::add_field( 'polmo_lite', [
	'type'        => 'background',
	'settings'    => 'polmo_lite_banner_image',
	'label'       => esc_html__( 'Blog Header Image', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => [
		'background-color'      => 'rgba(20,20,20,.8)',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.page-head',
		],
	],

    'required'  => array(
        array(
            'setting'  => 'blog_header_section',
            'value'    => true,
            'operator' => '==',
        ),
	),
] );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'textarea',
	'settings'    => 'polmo_lite_general_blog_title',
	'label'       => __( 'Blog Title', 'polmo-lite' ),
	'description' => __( 'Leave empty for No Title', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => __( 'Welcome To <span>Polmo</span> Blog', 'polmo-lite' ),
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'blog_header_section',
            'value'    => true,
            'operator' => '==',
        ),
	),		
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'textarea',
	'settings'    => 'polmo_lite_general_blog_desc',
	'label'       => __( 'Blog Description', 'polmo-lite' ),
	'description' => __( 'Leave empty for No Description', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => __( 'Our Creative Blog Will keep you always Updated', 'polmo-lite' ),
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'blog_header_section',
            'value'    => true,
            'operator' => '==',
        ),
	),		
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'radio',
	'settings'    => 'blog_layout',
	'label'       => __( 'Blog layout', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-classic' 			=> esc_attr__( 'Classic', 'polmo-lite' ),
		'layout-grid' 				=> esc_attr__( 'Grid', 'polmo-lite' ),
		'layout-two-columns' 		=> esc_attr__( 'Two Columns', 'polmo-lite' ),
	),
) );

/*Excerpt Length*/
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'number',
	'settings'    => 'polmo_lite_blog_excerpt',
	'label'       => esc_attr__( 'Excerpt length', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_blog_index',
	'default'     => 45,
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
	'default'     => esc_attr__( 'Read More', 'polmo-lite' ),
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
	'label'       => esc_attr__( 'Show/Hide Meta\'s', 'polmo-lite' ),
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
// Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
// 	'type'        => 'checkbox',
// 	'settings'    => 'index_hide_cats',
// 	'label'       => esc_attr__( 'Hide post categories?', 'polmo-lite' ),
// 	'section'     => 'polmo_lite_section_blog_index',
// 	'default'     => '0',
// 	'priority'    => 10,
//     'required'  => array(
//         array(
//             'setting'  => 'polmo_lite_blog_meta',
//             'value'    => '1',
//             'operator' => '==',
//         ),
// 	),	
// ) );
// Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
// 	'type'        => 'checkbox',
// 	'settings'    => 'index_hide_tags',
// 	'label'       => esc_attr__( 'Hide post Tags?', 'polmo-lite' ),
// 	'section'     => 'polmo_lite_section_blog_index',
// 	'default'     => '0',
// 	'priority'    => 10,
//     'required'  => array(
//         array(
//             'setting'  => 'polmo_lite_blog_meta',
//             'value'    => '1',
//             'operator' => '==',
//         ),
// 	),	
// ) );
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