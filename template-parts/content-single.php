<?php
/**
 * Template part for displaying posts.
 *
 * @package Polmo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-head media">
        <div class="entry-date media-left text-center">
            <time datetime="<?php echo get_the_time('Y-m-j'); ?>">
                <?php echo get_the_time('M'); ?> <span> <?php echo get_the_time('d'); ?> </span>
            </time>
        </div><!-- /.entry-date -->
        <div class="media-body">
            <?php the_title( sprintf( '<h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1>' ); ?>

            <?php echo polmo_lite_post_meta();?>

        </div>
    </div><!-- /.post-head -->

    <div class="post-content">
        <div class="post-thumbnail">
            <?php if ( has_post_thumbnail() ) { 
                $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'polmo-blog-thumb' );
                ?>
                <img src="<?php echo esc_url( $url[0] ); ?>" alt="<?php the_title();?>" />
            <?php } ?>
        </div><!-- /.post-thumbnail -->

        <div class="entry-content">
            <?php the_content(); ?>
            
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'polmo-lite' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        
        <?php 
        $tags_list = get_the_tag_list( '', esc_html__( ', ', 'polmo-lite' ) );
        if( $tags_list ){ ?>
            <div class="post-tag">
                <ul class="tag-list">
                    <li><?php echo polmo_lite_entry_footer();?></li>
                </ul><!-- /.tag-list -->
            </div><!-- /.post-tag -->
        <?php } ?>  

        <div class="author-bio-container media">
        	<div class="author-avatar media-left pull-left">
        		<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
        	</div><!-- /.author-avatar -->
        	<div class="author-details media-body">
        		<div class="details-top">
        			<?php echo esc_html__('by', 'polmo-lite');?> <span class="author-name"><?php echo get_the_author_meta('display_name');?></span>
        		</div><!-- /.details-top -->
        		<p class="about-author">
        			<?php echo get_the_author_meta('description');?>
        		</p><!-- /.about-author -->
        	</div><!-- /.author-details -->
        </div><!-- /.author-bio-container -->

    </div><!-- /.post-content -->
</article><!-- /.type-post -->
