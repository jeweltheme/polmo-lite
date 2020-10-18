<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Polmo
 */

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

	<header id="masthead" class="masthead navbar navbar-default navbar-fixed-top">
		<div class="container">
			
			<!-- Brand and toggle get grouped for better mobile display -->			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
					<i class="fa fa-bars"></i>
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


			<nav id="main-menu" class="navbar-collapse float-right">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#main-slider"><?php echo esc_html('Home','polmo-lite');?></a></li>
					<li><a href="#services"><?php echo esc_html('Services','polmo-lite');?></a></li>
					<li><a href="#about"><?php echo esc_html('About Us','polmo-lite');?></a></li>
					<li><a href="#portfolio"><?php echo esc_html('Portfolio','polmo-lite');?></a></li>
					<li><a href="#blog"><?php echo esc_html('Blog','polmo-lite');?></a></li>
					<li><a href="#contact"><?php echo esc_html('Contact us','polmo-lite');?></a></li>
				</ul>
			</nav> <!-- /.navbar-collapse  -->

		</div><!-- /.container -->
	</header><!-- /#masthead -->


