<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function polmo_lite_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'polmo-lite' ),
        'id'            => 'blog-sidebar',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Sidebar', 'polmo-lite' ),
        'id'            => 'footer-sidebar',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Menu', 'polmo-lite' ),
        'id'            => 'footer-menu',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget widget_menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'polmo_lite_widgets_init' );



// Register Widgets
require PROWPTHEME_PATH . 'widgets/class-widget-popular-posts.php';
require PROWPTHEME_PATH . 'widgets/class-widget-recent-posts.php';
require PROWPTHEME_PATH . 'widgets/class-widget-social-followers.php';
require PROWPTHEME_PATH . 'widgets/class-widget-social-profile.php';