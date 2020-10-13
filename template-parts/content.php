<?php
/**
 * Template part for displaying posts.
 *
 * @package Polmo
 */
$polmo_lite_hide_thumb 	= Polmo_Lite_Kirki::get_option('polmo_lite','index_hide_thumb');
$polmo_lite_layout 		= polmo_lite_blog_layout();

if($polmo_lite_layout['type'] == "layout-two-columns"){
	$post_class[] = 'col-md-6';	
}
$post_class[] = $polmo_lite_layout['type'];

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( implode( ' ', $post_class ) ); ?>>

<div class="post-inner">
    <?php if($polmo_lite_layout['type'] == "layout-grid"){?>

        <div class="post-head media">

			<?php polmo_lite_post_date();?>

			<div class="media-body">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php echo polmo_lite_post_meta();?>

		</div><!-- /.post-head -->
		</div><!-- /.post-head -->

	<?php } else{?>

        <div class="post-head media">

			<?php polmo_lite_post_date();?>

			<div class="media-body">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php echo polmo_lite_post_meta();?>

			</div>

		</div><!-- /.post-head -->
	<?php } ?>

		<div class="post-content">
			<?php 
			if ( $polmo_lite_hide_thumb == '' ){
				if ( has_post_thumbnail() ) { 
					polmo_lite_post_thumbnail();
				} 
			}?>

			<p class="entry-content">
				<?php the_excerpt(); 
				polmo_lite_read_more();?>

			</p><!-- /.entry-content -->

			<?php 
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'polmo-lite' ) );
			if( $tags_list ){ ?>
				<div class="post-tag">
					<ul class="tag-list">
						<li><?php echo polmo_lite_entry_footer();?></li>
					</ul><!-- /.tag-list -->
				</div><!-- /.post-tag -->
			<?php } ?>	

		</div><!-- /.post-content -->
	</div><!-- /.post-inner-->
</article><!-- /.type-post -->
