<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Polmo
 */

?>


		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /#main-content -->

<!-- Footer Section -->

<footer id="colophon" class="footer site-footer" role="contentinfo">

	<div class="footer-top">
		<div class="section-padding">
			<div class="container">
				<div class="row">

					<?php 
					if ( is_active_sidebar( 'footer-sidebar' ) ) { 
						dynamic_sidebar('footer-sidebar'); 
					} else{
						get_sidebar();
					}
					?>

				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.section-padding -->
	</div><!-- /.footer-top -->

	<div class="footer-bottom">
		<div class="container">
			<div class="footer-menu float-left">
				<?php 
				if ( is_active_sidebar( 'footer-menu' ) ) { 
					dynamic_sidebar('footer-menu'); 
				} 
				?>

			</div><!-- /.footer-menu -->
			
			<?php echo polmo_lite_footer_credit();?>

		</div><!-- /.container -->
	</div><!-- /.footer-bottom -->
</footer><!-- /#colophon -->

<!-- Footer Section -->



<div id="scroll-to-top" class="scroll-to-top">
	<span>
		<i class="fa fa-chevron-up"></i>    
	</span>
</div><!-- /#scroll-to-top -->


<?php wp_footer(); ?>

</body>
</html>
