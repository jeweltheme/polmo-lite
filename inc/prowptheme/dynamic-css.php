<?php
/**
 * Dynamic css
 *
 * @since Polmo Lite 1.0.6
 */
if (!function_exists('polmo_lite_dynamic_css')) :

    function polmo_lite_dynamic_css(){
        global $polmo_lite_theme_options;

        /* Color Options Options */
        $polmo_lite_primary_color  = esc_attr(get_theme_mod( 'color_primary' ));
        
        $custom_css = '';

        //Primary Background Color
        if (!empty($polmo_lite_primary_color)) {
            $custom_css .= "
            .comment-form input[type='submit'], .comment-content a.reply-btn,
            aside .widget-title:before{ 
                background-color: ". $polmo_lite_primary_color."; 
            }";

        }

        //Primary Color
        if (!empty($polmo_lite_primary_color)) {
            $custom_css .= "
            .author-details a.author-link, .respond a,
            .post-navigation a,
            .navbar .navbar-collapse .navbar-nav li.current-menu-item a{ 
                color : ". $polmo_lite_primary_color." !important; 
            }";
        }


        wp_add_inline_style('polmo-lite-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'polmo_lite_dynamic_css', 99);