<?php

/**
 * Polmo Lite Excerpt Length
 * @since Polmo Lite 1.0.0
 *
 */
function polmo_lite_excerpt_length( $excerpt_length ) {
	if(!is_admin () ){
		$excerpt_length = absint(Polmo_Lite_Kirki::get_option('polmo_lite','polmo_lite_blog_excerpt'));
		if($excerpt_length){
			$excerpt_length = $excerpt_length;
		} else{
			$excerpt_length = 25;
		}
		return $excerpt_length;
	}
}
add_filter( 'excerpt_length', 'polmo_lite_excerpt_length', 999 );



/**
 * Polmo Lite Excerpt More
 * @since Polmo Lite 1.0.0
 *
 * @param null
 * @return void
 */
if ( !function_exists('polmo_lite_excerpt_more') ) :
function polmo_lite_excerpt_more( $more ) {
    if(!is_admin() ){
        return '';
    }
}
endif;
add_filter('excerpt_more', 'polmo_lite_excerpt_more');



// Get Trim Excerpt
function polmo_lite_trim_excerpt($text) {
  return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'polmo_lite_trim_excerpt');



// Read More
function polmo_lite_read_more(){ 
	$read_more = get_theme_mod( 'polmo_lite_read_more_text' );
	if(!empty($read_more)){ ?>
		<a class="read-more" href="<?php the_permalink();?>">
			<?php echo esc_html($read_more); ?>
		</a>
	<?php }else{ ?>
	<a class="read-more" href="<?php the_permalink();?>">
		<?php echo esc_attr('Read More...','polmo-lite');?>		
	</a>	
<?php }
}

