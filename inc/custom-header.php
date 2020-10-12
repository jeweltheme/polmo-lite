<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package Polmo
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses polmo_lite_header_style()
 * @uses polmo_lite_admin_header_style()
 * @uses polmo_lite_admin_header_image()
 */
function polmo_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'polmo_lite_custom_header_args', array(
		'default-image'          =>  get_template_directory_uri() . '/images/background/blog.jpg',
		'default-text-color'     => '000000',
		'width'                  => 1200,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'polmo_lite_header_style',
		'admin-head-callback'    => 'polmo_lite_admin_header_style',
		'admin-preview-callback' => 'polmo_lite_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'polmo_lite_custom_header_setup' );

if ( ! function_exists( 'polmo_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see polmo_lite_custom_header_setup().
 */
function polmo_lite_header_style() {
	$header_text_color = get_header_textcolor();

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // polmo_lite_header_style

if ( ! function_exists( 'polmo_lite_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see polmo_lite_custom_header_setup().
 */
function polmo_lite_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // polmo_lite_admin_header_style

if ( ! function_exists( 'polmo_lite_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see polmo_lite_custom_header_setup().
 */
function polmo_lite_admin_header_image() {
	$polmo_lite_general_blog_title = get_theme_mod('polmo_lite_general_blog_title',esc_html__('Welcome To <span>Polmo</span> Blog','polmo-lite'));
	$polmo_lite_general_blog_desc = get_theme_mod('polmo_lite_general_blog_desc',esc_html__('Our Creative Blog Will keep you always Updated','polmo-lite'));

?>
	<div id="headimg">
		<h1 class="displaying-header-text">
			<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>

	<section id="page-head" class="page-head text-center" style="background: url("<?php echo header_image(); ?>") no-repeat center top fixed;" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
		<div class="head-overlay">
			<div class="section-padding">
				<div class="container">
					<h1 class="page-title">
						<?php echo  wp_kses_post($polmo_lite_general_blog_title); ?>
					</h1><!-- /.page-title -->
					<p class="page-description">
						<?php echo esc_attr($polmo_lite_general_blog_desc ); ?>
					</p><!-- /.page-description -->
				</div><!-- /.container -->
			</div><!-- /.section-padding -->
		</div><!-- /.head-overlay -->
	</section><!-- /#page-head -->
<?php
}
endif; // polmo_lite_admin_header_image
