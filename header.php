<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Polmo
 */
$plmo_lite_single_layout    = polmo_lite_single_layout();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="masthead navbar navbar-default navbar-expand-md navbar-fixed-top">
		<div class="<?php echo esc_attr( polmo_lite_menu_container() ); ?>">
			<!-- Brand and toggle get grouped for better mobile display -->

			<div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>

					<?php polmo_lite_the_custom_logo(); ?>

					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="navbar-brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<h1 class="navbar-brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; 
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;
					?>
			</div>


			<nav id="main-menu" class="collapse navbar-collapse main-menu pull-right" role="navigation" aria-label="<?php _e( 'Main Menu', 'polmo-lite' ); ?>">
				<?php 
				wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 4,
						'container'         => 'ul',
						'fallback_cb'       => 'wp_page_menu',
						'container_class'   => '',
						'container_id'    	=> 'main-menu',
						'menu_class'        => 'navbar-nav pwpt-main-menu',
						'menu_id'         	=> '',
						'depth'           	=> 4,
					)
				); ?>
			</nav> <!-- /.navbar-collapse  -->
			<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

		</div><!-- /.container -->
	</header><!-- /#masthead -->

<?php
$blog_header_section = Polmo_Lite_Kirki::get_option('polmo_lite','blog_header_section');
$polmo_lite_general_blog_title = Polmo_Lite_Kirki::get_option('polmo_lite','polmo_lite_general_blog_title');
$polmo_lite_general_blog_desc = Polmo_Lite_Kirki::get_option('polmo_lite','polmo_lite_general_blog_desc');
$polmo_lite_banner_image = Polmo_Lite_Kirki::get_option('polmo_lite','polmo_lite_banner_image');


if( true == $blog_header_section){ ?>

	<section id="page-head" class="page-head text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
		<div class="head-overlay">
			<div class="section-padding">
				<div class="container">
					<h1 class="page-title">
						<?php echo wp_kses_post($polmo_lite_general_blog_title); ?>
					</h1><!-- /.page-title -->
					<p class="page-description">
						<?php echo esc_attr($polmo_lite_general_blog_desc ); ?>
					</p><!-- /.page-description -->
				</div><!-- /.container -->
			</div><!-- /.section-padding -->
		</div><!-- /.head-overlay -->
	</section><!-- /#page-head -->

<?php } ?>


<?php 
$polmo_lite_breadcrumbs = Polmo_Lite_Kirki::get_option('polmo_lite','polmo_lite_breadcrumbs');
if ( $polmo_lite_breadcrumbs == '' ){ ?>
	<section class="polmo-lite-page background-bg">
	    <div class="polmo-lite-gray-bg">
	        <div class="section-padding">
	            <div class="container">
	                <?php brooklyn_lite_breadcrumb_trail();?>
	            </div><!-- /.container -->
	        </div><!-- /.section-padding -->
	    </div><!-- /.overlay -->
	</section>
<?php } ?>

	<section id="main-content" class="main-content <?php echo esc_attr( $plmo_lite_single_layout['type'] ); ?>">
		<div class="container">
			<div class="row">