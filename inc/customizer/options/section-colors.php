<?php
/**
 * Colors Customizer panel
 *
 * @package Brooklyn Lite
 */

/**
 * Colors Section
 */
Polmo_Lite_Kirki::add_section( 'polmo_lite_section_colors', array(
	'title'       	 => __( 'Customize Colors', 'polmo-lite' ),
	'panel'			 => 'polmo_lite_panel',
    'priority'       => 17,
) );


Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_primary',
	'label'       => esc_attr__( 'Primary color', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors',
	'default'     => '#ffd200',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.product div.entry-summary p.price, .product div.entry-summary span.price, .byline a:hover,.single-post .posted-on a,.blog-loop .posted-on a,.entry-title a:hover,.polmo_lite_recent_entries .post-date,.menuStyle3 .top-bar .contact-item .fa,.widget_categories li:hover a,.post-navigation a, .call-to-action .btn:hover, .widget_categories li:hover a, .widget_categories li:hover i, .widget_archive li:hover a, .widget_archive li:hover i, .copyright a, header .navbar .navbar-collapse .navbar-nav li a:hover, header .navbar .navbar-collapse .navbar-nav li a:focus, header .navbar .navbar-collapse .navbar-nav li.current-menu-item a, .banner-contents .btn, .entry-footer .read-more:hover,.respond a,.author-details a.author-link, .post-navigation a,.navbar .navbar-collapse .navbar-nav li.current-menu-item a',
			'property' => 'color',
		),
		array(
			'element'  => '.product .single_add_to_cart_button.button.alt,.button,input[type="button"],input[type="reset"],input[type="submit"],.entry-footer .read-more',
			'property' => 'border-color',
		),		
		array(
			'element'  => '.woocommerce-checkout button.button.alt,.woocommerce-checkout button.button.alt:hover,.woocommerce-cart .cart-collaterals .cart_totals .button:hover,.woocommerce-cart .cart-collaterals .cart_totals .button,.product .single_add_to_cart_button.button.alt:hover,.product .single_add_to_cart_button.button.alt,.woocommerce ul.products li.product .button,.comments-area .comment-reply-link:hover,button,.button,input[type="button"],input[type="reset"],input[type="submit"],.entry-footer .read-more, .page-navigation a, .comment-form input[type="submit"],.comment-content a.reply-btn, aside .widget-title:before',
			'property' => 'background-color',
		),		
	),			
) );



/**
 * Header colors
 */
Polmo_Lite_Kirki::add_section( 'polmo_lite_section_colors_header', array(
    'title'       	 => esc_attr__( 'Header Colors', 'polmo-lite' ),
	'panel'          => 'polmo_lite_panel',
	'section'     	 => 'polmo_lite_section_colors',
	'description'    => esc_attr__( 'Different color options show up here, based on the type of menu you select from the Header > Menu section', 'polmo-lite' ),
    'priority'       => 2,
) );

/**
 * Menu type 1
 */
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_site_title',
	'label'       => esc_attr__( 'Site title', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'header-default',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.header-default a.navbar-brand',
			'property' => 'color',
		),
	),			
) );

// Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
// 	'type'        => 'color',
// 	'settings'    => 'color_mt1_site_title_sticky',
// 	'label'       => esc_attr__( 'Site title (sticky)', 'polmo-lite' ),
// 	'section'     => 'polmo_lite_section_colors_header',
// 	'default'     => '#191919',
//     'required'  => array(
//         array(
//             'setting'  => 'menu_type',
//             'value'    => 'header-default',
//             'operator' => '==',
//         ),
// 	),
// 	'transport'	 => 'auto',
// 	'output' => array(
// 		array(
// 			'element'  => '.header-default .sticky-wrapper.is-sticky .site-title a',
// 			'property' => 'color',
// 		),
// 	),			
// ) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_site_desc',
	'label'       => esc_attr__( 'Site description', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_header',
	'default'     => '#ffffff',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'header-default',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.main-header .site-description',
			'property' => 'color',
		),
	),
) );
// Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
// 	'type'        => 'color',
// 	'settings'    => 'color_mt1_site_desc_sticky',
// 	'label'       => esc_attr__( 'Site description (sticky)', 'polmo-lite' ),
// 	'section'     => 'polmo_lite_section_colors_header',
// 	'default'     => '#191919',
//     'required'  => array(
//         array(
//             'setting'  => 'menu_type',
//             'value'    => 'header-default',
//             'operator' => '==',
//         ),
// 	),
// 	'transport'	 => 'auto',
// 	'output' => array(
// 		array(
// 			'element'  => '.header-default .sticky-wrapper.is-sticky .site-description',
// 			'property' => 'color',
// 		),
// 	),
// ) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_top_menu_items',
	'label'       => esc_attr__( 'Top level menu items', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_header',
	'default'     => '#262626',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'header-default',
            'operator' => '==',
        ),
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.main-header #main-menu a, .header-default .fa-search',
			'property' => 'color',
		),
	),
) );
// Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
// 	'type'        => 'color',
// 	'settings'    => 'color_mt1_top_menu_items_sticky',
// 	'label'       => esc_attr__( 'Top level menu items (sticky)', 'polmo-lite' ),
// 	'section'     => 'polmo_lite_section_colors_header',
// 	'default'     => '#191919',
//     'required'  => array(
//         array(
//             'setting'  => 'menu_type',
//             'value'    => 'header-default',
//             'operator' => '==',
//         ),
// 	),
// 	'transport'	 => 'auto',
// 	'output' => array(
// 		array(
// 			'element'  => '.header-default .sticky-wrapper.is-sticky #main-menu a, .header-default .sticky-wrapper.is-sticky .fa-search',
// 			'property' => 'color',
// 		),
// 	),
// ) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_bg_color',
	'label'       => esc_attr__( 'Header Background color', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_header',
	'default'     => '',
    'required'  => array(
        array(
            'setting'  => 'menu_type',
            'value'    => 'header-default',
            'operator' => '==',
        ),
	),
	'choices'     => array(
		'alpha' => true,
	),	
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.main-header',
			'property' => 'background-color',
		),
	),
) );
// Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
// 	'type'        => 'color',
// 	'settings'    => 'color_mt1_bg_color_sticky',
// 	'label'       => esc_attr__( 'Background color (sticky)', 'polmo-lite' ),
// 	'section'     => 'polmo_lite_section_colors_header',
// 	'default'     => '#ffffff',
//     'required'  => array(
//         array(
//             'setting'  => 'menu_type',
//             'value'    => 'header-default',
//             'operator' => '==',
//         ),
// 	),
// 	'choices'     => array(
// 		'alpha' => true,
// 	),	
// 	'transport'	 => 'auto',
// 	'output' => array(
// 		array(
// 			'element'  => '.header-default .is-sticky .site-header',
// 			'property' => 'background-color',
// 		),
// 	),
// ) );



//Submenu
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_submenu_items',
	'label'       => esc_attr__( 'Submenu items', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_header',
	'default'     => '#262626',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '#main-menu .sub-menu li a',
			'property' => 'color',
		),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_submenu_bg',
	'label'       => esc_attr__( 'Submenu background', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_header',
	'default'     => '#fff',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '#main-menu ul ul li',
			'property' => 'background-color',
		),
	),
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'mobile_toggle_color',
	'label'       => esc_attr__( 'Mobile Toggle Icon color', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_header',
	'default'     => '',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.navbar-toggler-icon, .main-menu li.menu-item-has-children > .subnav-toggle, .main-menu li.page_item_has_children > .subnav-toggle',
			'property' => 'color',
		),
	),			
) );



/**
 * Blog colors
 */
Polmo_Lite_Kirki::add_section( 'polmo_lite_section_colors_blog', array(
    'title'       	 => esc_attr__( 'Blog Colors', 'polmo-lite' ),
	'section'     	 => 'polmo_lite_section_colors',
    'priority'       => 4,
) );

Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_index_post_title',
	'label'       => esc_attr__( 'Post title (archives)', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_blog',
	'default'     => '#262626',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.page-header .page-title',
			'property' => 'color',
		),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_single_post_title',
	'label'       => esc_attr__( 'Post title (single)', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_blog',
	'default'     => '#262626',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.blog-posts .entry-title',
			'property' => 'color',
		),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_meta_cat_bg',
	'label'       => esc_attr__( 'Categories (single and archives)', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_blog',
	'default'     => '#fff',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.blog-posts .cat-links',
			'property' => 'background-color',
		),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_meta_text',
	'label'       => esc_attr__( 'Meta text', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_blog',
	'default'     => '#999',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single .entry-meta',
			'property' => 'color',
		),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_meta_links',
	'label'       => esc_attr__( 'Meta links', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_blog',
	'default'     => '#999',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single .entry-meta a',
			'property' => 'color',
		),
	),
) );
Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
	'type'        => 'color',
	'settings'    => 'color_post_text',
	'label'       => esc_attr__( 'Body text', 'polmo-lite' ),
	'section'     => 'polmo_lite_section_colors_blog',
	'default'     => '#262626',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .entry-content, .blog-loop .entry-content, article .entry-content p',
			'property' => 'color',
		),
		array(
			'element'  => '.editor-block-list__layout, .editor-block-list__layout .editor-block-list__block',
			'context'  => array( 'editor' ),
		),		
	),
) );



/**
 * Widgets
 */

// Polmo_Lite_Kirki::add_section( 'polmo_lite_section_colors_widgets', array(
//     'title'       	 => esc_attr__( 'Footer Colors', 'polmo-lite' ),
// 	'section'     	 => 'polmo_lite_section_colors',
//     'priority'       => 12,
// ) );

// Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
// 	'type'        => 'color',
// 	'settings'    => 'color_widgets_title',
// 	'label'       => esc_attr__( 'Widget titles', 'polmo-lite' ),
// 	'section'     => 'polmo_lite_section_colors_widgets',
// 	'default'     => '#191919',
// 	'transport'	 => 'auto',
// 	'output' => array(
// 		array(
// 			'element'  => '.widget .widget-title',
// 			'property' => 'color',
// 		),
// 	),
// ) );

// Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
// 	'type'        => 'color',
// 	'settings'    => 'color_widgets_text',
// 	'label'       => esc_attr__( 'Widget text', 'polmo-lite' ),
// 	'section'     => 'polmo_lite_section_colors_widgets',
// 	'default'     => '#707070',
// 	'transport'	 => 'auto',
// 	'output' => array(
// 		array(
// 			'element'  => '.widget',
// 			'property' => 'color',
// 		),
// 	),
// ) );

// Polmo_Lite_Kirki::add_field( 'polmo_lite', array(
// 	'type'        => 'color',
// 	'settings'    => 'color_widgets_links',
// 	'label'       => esc_attr__( 'Widget links', 'polmo-lite' ),
// 	'section'     => 'polmo_lite_section_colors_widgets',
// 	'default'     => '#595959',
// 	'transport'	 => 'auto',
// 	'output' => array(
// 		array(
// 			'element'  => '.widget a',
// 			'property' => 'color',
// 		),
// 	),
// ) );