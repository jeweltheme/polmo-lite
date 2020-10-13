<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Polmo
 */

get_header(); 
$layout = polmo_lite_blog_layout();
?>

	<div class="<?php echo esc_attr( $layout['type'] ); ?> <?php echo esc_attr( $layout['cols'] ); ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="row">

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php echo function_exists('polmo_lite_pagination') ? polmo_lite_pagination() : posts_nav_link();?>

			</div> <!-- .row -->

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	</div>

	<?php if ( $layout['sidebar'] ) { ?>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>


<?php get_footer(); ?>
