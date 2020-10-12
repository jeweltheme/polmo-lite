<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Polmo
 */

?>

<section class="no-results not-found">
	<header class="section-title"><?php esc_html_e('Sorry! Nothing Found!','polmo-lite');?></header><!-- /.section-title -->
	<div class="no-search">
		<?php get_search_form(); ?>	
	</div>	
</section><!-- .no-results -->
