<?php
/**
 * Theme info page
 *
 * @package ProWPTheme
 */

/**
 * Recommended plugins
 */
require PROWPTHEME_PATH . 'class-polmo-lite-recommended-plugins.php';

//Add the theme page
add_action('admin_menu', 'polmo_lite_add_theme_info', 9 );
function polmo_lite_add_theme_info(){
    if (!current_user_can('install_plugins')) {
        return;
    }

	$theme_info = add_menu_page(
		esc_html__( 'Polmo Lite Info', 'polmo-lite' ), // Page Title
		esc_html__( 'Polmo Lite', 'polmo-lite' ),    // Menu Title
		'manage_options',
		'polmo-lite-info.php',
		'polmo_lite_info_page',
		POLMO_LITE_THEME_URI . '/images/icon.svg',
		4
	);

	add_submenu_page(
	    'polmo-lite-info.php',
	    esc_html__('Customize', 'polmo-lite'),
	    esc_html__('Customize', 'polmo-lite'),
	    'manage_options',
	    admin_url( '/customize.php?' )
	);

    add_action('load-' . $theme_info, 'polmo_lite_info_hook_styles');
}

//Callback
function polmo_lite_info_page(){

    $user = wp_get_current_user(); ?>
	<div class="info-container">
		<p class="hello-user"><?php echo sprintf(__('Hello, %s,', 'polmo-lite'), '<span>' . esc_html(ucfirst($user->display_name)) . '</span>'); ?></p>
		<h1 class="info-title"><?php echo sprintf(__('Welcome to %s', 'polmo-lite'), JWPOLMO); ?><span class="info-version"><?php echo 'v' . POLMO_LITE_VER; ?></span></h1>
		<p class="welcome-desc"><?php _e(
      'Polmo Lite is now installed and ready to go. To help you with the next step, we’ve gathered together on this page all the resources you might need. We hope you enjoy using Polmo Lite. You can always come back to this page by going to <strong>Appearance > Polmo Lite Info</strong>.',
      'polmo-lite'
  ); ?>
	

		<div class="polmo-lite-theme-tabs">

			<div class="polmo-lite-tab-nav nav-tab-wrapper">
				<a href="#begin" data-target="begin" class="nav-button nav-tab begin active"><?php esc_html_e('Getting started', 'polmo-lite'); ?></a>
				<a href="#support" data-target="support" class="nav-button support nav-tab"><?php esc_html_e('Support', 'polmo-lite'); ?></a>
				<a href="#table" data-target="table" class="nav-button table nav-tab"><?php esc_html_e('Free vs Pro', 'polmo-lite'); ?></a>
			</div>

			<div class="polmo-lite-tab-wrapper">

				<div id="#begin" class="polmo-lite-tab begin show">
					
					<div class="plugins-row">
						<h2><span class="step-number">1</span><?php esc_html_e('Install recommended plugins', 'polmo-lite'); ?></h2>
						<p><?php _e('Install one plugin at a time. Wait for each plugin to activate.', 'polmo-lite'); ?></p>

						<div style="margin: 0 -15px;overflow:hidden;display:flex;">

							<div class="plugin-block">
								<?php $plugin = 'elementor'; ?>
								<h3><?php esc_html_e('Elementor', 'polmo-lite'); ?></h3>
								<p><?php esc_html_e('Elementor will enable you to create pages by adding widgets to them using drag and drop.', 'polmo-lite'); ?>
								<?php
						        //If Elementor is active, show a link to Elementor's getting started video
						        $is_elementor_active = Polmo_Lite_Recommended_Plugins::instance()->check_plugin_state($plugin);
						        if ($is_elementor_active == 'deactivate') {
						            echo '<a target="_blank" href="https://www.youtube.com/watch?v=nZlgNmbC-Cw&feature=emb_title">' . __('First time Elementor user?', 'polmo-lite') . '</a>';
						        }
						        ?>
								</p>
								<?php echo Polmo_Lite_Recommended_Plugins::instance()->get_button_html($plugin); ?>
							</div>

							<div class="plugin-block">
								<?php $plugin = 'master-addons'; ?>
								<h3><?php esc_html_e('Master Addons', 'polmo-lite'); ?></h3>
								<p><?php esc_html_e('Create powerful website with Master Addons. It has 500+ pre-built ready templates. 50+ Addons & Extensions.', 'polmo-lite'); ?></p>
								<?php echo Polmo_Lite_Recommended_Plugins::instance()->get_button_html($plugin); ?>
							</div>

							<div class="plugin-block">
								<?php $plugin = 'one-click-demo-import'; ?>
								<h3><?php esc_html_e('One Click Demo Import', 'polmo-lite'); ?></h3>
								<p><?php esc_html_e('This plugin is useful for importing our demos. You can uninstall it after you\'re done with it.', 'polmo-lite'); ?></p>
								<?php echo Polmo_Lite_Recommended_Plugins::instance()->get_button_html($plugin); ?>
							</div>

							<div class="plugin-block">
								<?php $plugin = 'polmo-lite-demo-importer'; ?>
								<h3>Polmo Demo Importer</h3>
								<p><?php esc_html_e( 'Polmo Demo Importer is a free addon for the Polmo WordPress theme. It acts as an interface between the One Click Demo Import plugin and our theme.', 'polmo-lite' ); ?></p>
								<?php echo Polmo_Lite_Recommended_Plugins::instance()->get_button_html( $plugin ); ?>
							</div>

							<div class="plugin-block">
								<?php $plugin = 'kirki'; ?>
								<h3>Kirki</h3>
								<p><?php echo sprintf(__('Kirki is a framework for theme options. You need this plugin to access %s\'s options.', 'polmo-lite'), JWPOLMO); ?></p>
								<?php echo Polmo_Lite_Recommended_Plugins::instance()->get_button_html($plugin); ?>
							</div>															
						</div>
					</div>
					<hr style="margin-top:25px;margin-bottom:25px;">
					
					<div class="import-row">
						<h2><span class="step-number">2</span><?php esc_html_e('Import demo content (optional)', 'polmo-lite'); ?></h2>
						<p><?php esc_html_e('Importing the demo will make your website look like our website.', 'polmo-lite'); ?></p>
						<?php
							$master_addons = 'master-addons';
							$is_polmo_lite_toolbox_active = Polmo_Lite_Recommended_Plugins::instance()->check_plugin_state($master_addons);

							$elementor = 'elementor';
							$is_elementor_active = Polmo_Lite_Recommended_Plugins::instance()->check_plugin_state($elementor);

							$one_click_demo_importer = 'one-click-demo-import';
							$is_ocdi_active = Polmo_Lite_Recommended_Plugins::instance()->check_plugin_state($one_click_demo_importer);

							$polmo_lite_demo_importer = 'polmo-lite-demo-importer';
							$is_ocdi_active = Polmo_Lite_Recommended_Plugins::instance()->check_plugin_state($polmo_lite_demo_importer);

							$kirki = 'kirki';
							$is_kirki_active = Polmo_Lite_Recommended_Plugins::instance()->check_plugin_state($kirki);
						?>
							<?php if ($is_polmo_lite_toolbox_active == 'deactivate' && $is_elementor_active == 'deactivate' && $is_ocdi_active == 'deactivate' && $is_kirki_active == 'deactivate'): ?>
								<a class="button button-primary button-large" href="<?php echo admin_url('admin.php?page=polmo-lite-demo-importer'); ?>"><?php esc_html_e('One Click Demo importer', 'polmo-lite'); ?></a>
							<?php else: ?>
								<p class="polmo-lite-notice"><?php esc_html_e('All recommended plugins need to be installed and activated for this step.', 'polmo-lite'); ?></p>
							<?php endif; ?>
					</div>
					<hr style="margin-top:25px;margin-bottom:25px;">

					<div class="customizer-row">
						<h2><span class="step-number">3</span><?php esc_html_e('Styling with the Customizer', 'polmo-lite'); ?></h2>
						<p><?php esc_html_e('Theme elements can be styled from the Customizer. Use the links below to go straight to the section you want.', 'polmo-lite'); ?></p>		
						<p><a target="_blank" href="<?php echo esc_url(admin_url('/customize.php?autofocus[section]=title_tagline')); ?>"><?php esc_html_e('Change your site title or add a logo', 'polmo-lite'); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url(admin_url('/customize.php?autofocus[section]=polmo_lite_section_menu')); ?>"><?php esc_html_e('Header options', 'polmo-lite'); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url(admin_url('/customize.php?autofocus[section]=polmo_lite_section_colors')); ?>"><?php esc_html_e('Color options', 'polmo-lite'); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url(admin_url('/customize.php?autofocus[section]=polmo_lite_section_fonts')); ?>"><?php esc_html_e('Font options', 'polmo-lite'); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url(admin_url('/customize.php?autofocus[section]=polmo_lite_section_blog_index')); ?>"><?php esc_html_e('Blog options', 'polmo-lite'); ?></a></p>		
					</div>


				</div>

				<div id="#support" class="polmo-lite-tab support">
					<div class="column-wrapper">
						<div class="tab-column">
						<span class="dashicons dashicons-sos"></span>
						<h3><?php esc_html_e('Visit our forums', 'polmo-lite'); ?></h3>
						<p><?php esc_html_e('Need help? Go ahead and visit our support forums and we\'ll be happy to assist you with any theme related questions you might have', 'polmo-lite'); ?></p>
							<a href="<?php echo esc_url_raw('https://prowptheme.com/support/');?>" target="_blank"><?php esc_html_e('Visit the forums', 'polmo-lite'); ?></a>				
							</div>
						<div class="tab-column">
						<span class="dashicons dashicons-book-alt"></span>
						<h3><?php esc_html_e('Documentation', 'polmo-lite'); ?></h3>
						<p><?php esc_html_e('Our documentation can help you learn how to use the theme and also provides you with premade code snippets and answers to FAQs.', 'polmo-lite'); ?></p>
						<a href="<?php echo esc_url_raw('https://prowptheme.com/docs/polmo-lite/');?>" target="_blank"><?php esc_html_e('See the Documentation', 'polmo-lite'); ?></a>
						</div>
					</div>
				</div>
				<div id="#table" class="polmo-lite-tab table">
					<table class="widefat fixed featuresList">
					    <thead>
					        <tr>
					            <td>
					                <strong>
					                    <h3><?php esc_html_e('Feature', 'polmo-lite'); ?></h3>
					                </strong>
					            </td>
					            <td style="width: 20%;">
					                <strong>
					                    <h3><?php esc_html_e('Polmo Lite', 'polmo-lite'); ?></h3>
					                </strong>
					            </td>
					            <td style="width: 20%;">
					                <strong>
					                    <h3><?php esc_html_e('Polmo Pro', 'polmo-lite'); ?></h3>
					                </strong>
					            </td>
					        </tr>
					    </thead>
					    <tbody>
					        <tr>
					            <td><?php esc_html_e('Elementor Support', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Master Addons Support', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Access to all Google Fonts', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Fully Responsive', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Motion Effects', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Parallax backgrounds', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Social Icons', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Translation ready', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('WPML ready', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Learnpress compatible', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>					        
					        <tr>
					            <td><?php esc_html_e('Color options', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Blog options', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Widgetized footer', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Background Image support', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('WooCommerce compatible', 'polmo-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Growing collection of premium demos', 'polmo-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Footer Credits option', 'polmo-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Footer background image', 'polmo-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Extra Elementor blocks', 'polmo-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Extra blog layouts (List, Masonry, Carousel)', 'polmo-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Extended WooCommerce options', 'polmo-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Priority support', 'polmo-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					    </tbody>
					</table>

				  <p style="text-align: right;"><a class="button button-primary button-large" href="https://prowptheme.com/themes/polmo-business-wordpress-theme/?utm_source=theme_table&utm_medium=button&utm_campaign=Polmo"><?php esc_html_e(
          'View Polmo Lite Pro',
          'polmo-lite'
      ); ?></a></p>
				</div>		
			</div>
		</div>

		<div class="polmo-lite-theme-sidebar">
			<div class="polmo-lite-sidebar-widget">
				<h3><?php echo sprintf(__('Review %s', 'polmo-lite'), JWPOLMO); ?></h3>
				<p><?php echo esc_html__('It makes us happy to hear from our users. We would appreciate a review.', 'polmo-lite'); ?> </p>	
				<p><a target="_blank" href="https://wordpress.org/support/theme/polmo-lite/reviews/"><?php echo esc_html__('Submit a review here', 'polmo-lite'); ?></a></p>		
			</div>
			<hr style="margin-top:25px;margin-bottom:25px;">
			<div class="polmo-lite-sidebar-widget">
				<h3><?php esc_html_e('Changelog', 'polmo-lite'); ?></h3>
				<p><?php echo esc_html__('Keep informed about each theme update.', 'polmo-lite'); ?> </p>	
				<p><a target="_blank" href="<?php echo esc_url_raw('https://prowptheme.com/changelog/polmo/');?>"><?php echo esc_html__('See the changelog', 'polmo-lite'); ?></a></p>		
			</div>	
			<hr style="margin-top:25px;margin-bottom:25px;">
			<div class="polmo-lite-sidebar-widget">
				<h3><?php esc_html_e('Upgrade to Polmo Pro', 'polmo-lite'); ?></h3>
				<p><?php echo esc_html__('Take Polmo Lite to a whole other level by upgrading to the Pro version.', 'polmo-lite'); ?> </p>	
				<p><a target="_blank" href="https://prowptheme.com/themes/polmo-business-wordpress-theme/?utm_source=theme_info&utm_medium=link&utm_campaign=Polmo"><?php echo esc_html__('Discover Polmo Lite Pro', 'polmo-lite'); ?></a></p>		
			</div>									
		</div>
	</div>
<?php
}


// Styles & Scripts
function polmo_lite_info_hook_styles(){
    add_action('admin_enqueue_scripts', 'polmo_lite_info_page_styles');
}

function polmo_lite_info_page_styles(){
    wp_enqueue_style('polmo-lite-theme-info', PROWPTHEME_THEME_URI . 'css/theme-info.css', [], true);

    wp_enqueue_script('polmo-lite-theme-info', PROWPTHEME_THEME_URI . 'js/theme-info.js', ['jquery'], '', true);
}