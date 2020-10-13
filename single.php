<?php
/**
 * The template for displaying all single posts.
 *
 * @package Polmo
 */
get_header(); 
$plmo_lite_single_layout    = polmo_lite_single_layout();
?>

	<div class="<?php echo esc_attr( $brooklyn_lite_single_layout['cols'] ); ?>">
		<?php 
			if ( have_posts() ) { while ( have_posts() ) { the_post(); 
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
					get_template_part( 'template-parts/single', get_post_format() );
				}
				
				the_posts_navigation();
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				} else { 
					get_template_part( 'template-parts/content', 'none' ); 
				}
		?>
	</div>

	<?php if ( $plmo_lite_single_layout['sidebar'] ) { ?>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>

<?php get_footer();