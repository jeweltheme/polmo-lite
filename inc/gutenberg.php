<?php

/* Gutenberg */
global $wp_version;

if ( version_compare( $wp_version, '5.0', '>=' ) ) {
	polmo_lite_admin_notice_requires();
}

function polmo_lite_admin_notice_requires(){
	
	require_once get_template_directory()  . '/inc/class-tgm-plugin-activation.php';

	add_action( 'tgmpa_register', 'polmo_lite_register_required_plugins' );
}


function polmo_lite_register_required_plugins(){

    $plugins = array(   
        array(
            'name'               => esc_html__( 'Master Addons for Elementor', 'polmo-lite' ),
            'slug'               => 'master-addons',
            'required'           => true,
            'force_activation'   => false,
        )   
    );


    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
	'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
        'strings'           => array(
            'page_title'                                => esc_html__( 'Install Required Plugins', 'polmo-lite' ),
            'menu_title'                                => esc_html__( 'Install Plugins', 'polmo-lite' ),
            'installing'                                => esc_html__( 'Installing Plugin: %s', 'polmo-lite' ), // %1$s = plugin name
            'oops'                                      => esc_html__( 'Something went wrong with the plugin API.', 'polmo-lite' ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ,'polmo-lite' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','polmo-lite' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','polmo-lite' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','polmo-lite' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','polmo-lite' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','polmo-lite' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','polmo-lite' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','polmo-lite' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'polmo-lite' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'polmo-lite' ),
            'return'                                    => esc_html__( 'Return to Required Plugins Installer', 'polmo-lite' ),
            'plugin_activated'                          => esc_html__( 'Plugin activated successfully.', 'polmo-lite' ),
            'complete'                                  => esc_html__( 'All plugins installed and activated successfully. %s', 'polmo-lite' ) // %1$s = dashboard link
        )
    );

    tgmpa( $plugins, $config );    
}