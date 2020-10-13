<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Polmo
 */

get_header(); 
$layout = polmo_lite_blog_layout();
?>

	<div class="<?php echo esc_attr( $layout['type'] ); ?> <?php echo esc_attr( $layout['cols'] ); ?>">

				
		<?php if(($layout['type'] != "layout-grid") || ($layout['type'] == "layout-two-columns")){?>
			<!-- <div class="col-md-9"> -->
		<?php } ?>	
		

		<?php if ( have_posts() ) {?>

			<div class="row">
		 		<?php while ( have_posts() ) { the_post(); 
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
						get_template_part( 'template-parts/content', get_post_format() );
					}
					echo function_exists('polmo_lite_pagination') ? polmo_lite_pagination() : posts_nav_link();
				?>
			</div>

		<?php } else { 
			get_template_part( 'template-parts/content', 'none' ); 
		}?>
		

		<?php if(($layout['type'] != "layout-grid") || ($layout['type'] != "layout-two-columns")){?>
			<!-- </div> -->
		<?php } ?>

	</div>

	<?php if ( $layout['sidebar'] ) { ?>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>


<?php get_footer(); ?>
