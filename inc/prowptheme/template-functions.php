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
			$excerpt_length = 45;
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
	$read_more = Polmo_Lite_Kirki::get_option('polmo_lite','polmo_lite_read_more_text');
	$index_hide_read_more = Polmo_Lite_Kirki::get_option('polmo_lite','index_hide_read_more');
	
	if ( $index_hide_read_more == '' ){
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
}






/**
 * Blog layout
 */
if ( !function_exists( 'polmo_lite_blog_layout' ) ) {
	function polmo_lite_blog_layout() {

		$layout = get_theme_mod( 'blog_layout', 'layout-default' );

		//Blog archive columns
		if ( $layout == 'layout-grid' || $layout == 'layout-masonry' ) {
			$cols 		= 'col-md-12';
			$sidebar	= false;
		}
		elseif ( $layout == 'layout-classic' || $layout == 'layout-two-columns' )
		{
			$cols 		= 'col-lg-9';
			$sidebar 	= true;
		}
		else {
			$cols 		= 'col-md-9';
			$sidebar 	= true;
		}	

		//Inner columns for list layout
		if ( $layout == 'layout-list' ) {
			$item_inner_cols = 'col-md-6 col-sm-12';
		}
		elseif ( $layout == 'layout-classic' )
		{
			$item_inner_cols = '';
		}
		else {
			$item_inner_cols = 'col-md-12';
		}

		$setup = array(
			'type'				=> $layout,
			'sidebar' 			=> $sidebar,
			'cols'	  			=> $cols,
			'item_inner_cols' 	=> $item_inner_cols
		);
		
		return $setup;

	}
}



/**
 * Single post layout
 */
if ( !function_exists( 'polmo_lite_single_layout' ) ) {
	function polmo_lite_single_layout() {

		$layout = get_theme_mod( 'single_post_layout', 'layout-default' );

		//Single post columns
		if ( $layout == 'layout-default' ) {
			$cols 		= '';
			$sidebar	= true;
		} else {
			$cols 		= 'col-md-12';
			$sidebar 	= false;
		}

		$setup = array(
			'type'		=> $layout,
			'sidebar' 	=> $sidebar,
			'cols'	  	=> $cols,
		);
		
		return $setup;

	}
}


/**
 * Adds class for blog grid and masonry layouts
 */
function polmo_lite_blog_grid( $classes ) {

	$layout = polmo_lite_blog_layout();

	if ( !is_singular() && ( $layout['type'] == 'layout-grid' || $layout['type'] == 'layout-masonry' ) ) {
		$classes[] = 'col-lg-4 col-md-6';
	}

	return $classes;
}
add_filter( 'post_class', 'polmo_lite_blog_grid' );




/**
 * Returns menu type and if the menu is contained or stretched
 */
function polmo_lite_menu_layout() {

	//Type
	$type 		= get_theme_mod( 'menu_type', 'header-default' );
	
	//Contained or stretched
	$contained 	= get_theme_mod( 'menu_container', 'menu-container' );	

	$layout = array(
		'type' 		=> $type,
		'contained'	=> $contained,
	);

	return $layout;
}


/**
 * Menu container
 */
function polmo_lite_menu_container() {
	$layout = polmo_lite_menu_layout();

	if ( 'menu-full-width' === $layout['contained'] ) {
		$container = 'container-fluid';
	} else {
		$container = 'container';
	}

	return $container;
}

// Post Meta Date
function polmo_lite_post_date(){ 
	$index_hide_date 		= Polmo_Lite_Kirki::get_option('polmo_lite','index_hide_date');
	if ( $index_hide_date == '' ){ ?>
		<div class="entry-date media-left text-center">
			<time datetime="<?php echo get_the_time('Y-m-j'); ?>">
				<?php echo get_the_time('M'); ?> <span> <?php echo get_the_time('d'); ?> </span>
			</time>
		</div><!-- /.entry-date -->
	<?php 
	} 
}