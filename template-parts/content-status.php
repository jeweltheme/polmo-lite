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
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

            <?php echo polmo_lite_post_meta();?>

        </div>
    </div><!-- /.post-head -->

    <div class="post-content">

        <p class="entry-content">
            <?php the_excerpt(); ?>
            <a class="read-more" href="<?php the_permalink();?>"><?php echo esc_attr('Read More...','polmo-lite');?></a>
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
</article><!-- /.type-post -->
