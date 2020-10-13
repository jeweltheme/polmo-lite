<?php


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function polmo_lite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	//Menu type
	$menu_layout = polmo_lite_menu_layout();
	$classes[] 	= $menu_layout['type'];
	$classes[] 	= $menu_layout['contained'];

	//Sticky menu
	$sticky 	= get_theme_mod('sticky_menu', 'sticky-header');
	$classes[] 	= esc_attr( $sticky );	


	// primary type
	if ( is_home() ){
		$layout = polmo_lite_blog_layout();
		$classes[] = $layout[ 'type' ];
	}		

	if ( class_exists( 'WooCommerce' ) ) {
		$check = polmo_lite_wc_archive_check();
		
		if ( $check ) {
			$classes[] = 'woocommerce-product-loop';
		}
	}


	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'polmo_lite_body_classes' );



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

		$layout  = Polmo_Lite_Kirki::get_option('polmo_lite','blog_layout');

		//Blog archive columns
		if ( $layout == 'layout-grid' || $layout == 'layout-masonry' ) {
			$cols 		= 'col-md-12';
			$sidebar	= false;
		} elseif ( $layout == 'layout-classic' || $layout == 'layout-two-columns' ) {
			$cols 		= 'col-md-9';
			$sidebar 	= true;
		} else {
			$cols 		= 'col-md-9';
			$sidebar 	= true;
		}	

		//Inner columns for list layout
		if ( $layout == 'layout-list' ) {
			$item_inner_cols = 'col-md-6 col-sm-12';
		} elseif ( $layout == 'layout-classic' ) {
			$item_inner_cols = '';
		} else {
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
			$cols 		= 'col-md-9';
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

/**
 * Returns true if current page is shop, product archive or product tag
 */
function polmo_lite_wc_archive_check() {
    if ( is_shop() || is_product_category() || is_product_tag() ) {
        return true;
    } else {
        return false;
    }
}



/**
 * Returns Custom Blog Posts Pagination
 * @author Jewel Theme
 * @since v1.0.0
 */

if(!( function_exists('polmo_lite_pagination') )){
	function polmo_lite_pagination($pages = '', $range = 2){
		$showitems = ($range * 1)+1;

		global $paged;
		if(empty($paged)) $paged = 1;

		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
				if(!$pages) {
					$pages = 1;
				}
		}

		if(1 != $pages){
			echo '<nav class="page-navigation"><ul class="pagination">';

			if($paged > 1 && $paged > $range+1 && $showitems < $pages){
				echo '<li class="page-item"><a href="'.get_pagenum_link(1).'" class="page-link prev"><i class="fa fa-arrow-left"></i> ' . esc_html__('Prev','brooklyn-lite') . '</a></li>';
			}

			for ($i=1; $i <= $pages; $i++)
			{
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					echo ($paged == $i)? "<li class='page-item'><a href='#' class='page-link active'>".$i."</a></li>":"<li class='page-item'><a class='page-link' href='".get_pagenum_link($i)."'>".$i."</a></li>";
				}
			}

			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
				echo '<li class="page-item"><a href="'.get_pagenum_link($pages).'" class="page-link next">' . esc_html__('Next','brooklyn-lite') . ' <i class="fa fa-arrow-right"></i></a></li>';
			}

			echo "</ul></nav>";
		}
	}
}




// Copyright Text
function polmo_lite_footer_credit(){
    $copyright_text = get_theme_mod( 'copyright_text' );

    if($copyright_text ==''){ ?>

		<div class="copy-right float-right">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'brooklyn-lite' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'brooklyn-lite' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %2$s by %1$s.', 'brooklyn-lite' ), 'ProWPTheme', '<a href="' . esc_url('https://prowptheme.com/themes/polmo-business-wordpress-theme/') . '" rel="nofollow" target="_blank">Polmo Lite</a>' );
				?>
		</div><!-- .site-info -->

    <?php } else {
		echo $copyright_text;
    }
}
