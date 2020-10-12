<?php
function polmo_lite_quick_style(){ 
	$polmo_lite_subscriber_image = get_theme_mod('polmo_lite_subscriber_image', get_template_directory_uri() . '/images/background/1.jpg');
?>
	<style type="text/css">

	<?php 
	if ( get_header_image() ) { ?>
		.page-head{
			background: url("<?php echo header_image(); ?>") no-repeat center top fixed;
			background-size: cover;
		}		
	<?php } ?>
		
	    .subscribe-section {
	    	background: url( "<?php echo esc_url_raw( $polmo_lite_subscriber_image ); ?>") no-repeat center center fixed;
	    }  

	</style>
<?php 

}
add_action( 'wp_head', 'polmo_lite_quick_style', 100);

