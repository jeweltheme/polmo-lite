<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Polmo
 */

if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
	return;
}
?>

<aside id="sidebar" class="sidebar">
	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
</aside><!-- #secondary -->
