<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Polmo
 */
?>

<article <?php post_class();?>>

    <?php if ( has_post_thumbnail() ) { ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('polmo-blog-thumb'); ?>
        </div>
    <?php } ?>

    <div class="post-content">
        
        <a href="<?php the_permalink();?>">
            <?php the_title( sprintf( '<h2 class="post-title">', esc_url( get_permalink() ) ), '</h2>' ); ?>
        </a>

        <?php echo polmo_lite_ateam_entry_post_meta();?>


        <div class="entry-content">
            <p>
                <?php the_excerpt(); ?>
            </p>
            
            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'polmo-lite' ),
                'after'  => '</div>',
                ) );
                ?>
        </div><!-- /.entry -->

    </div><!-- /.post-content --> 
</article><!-- /.post -->


<?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || '0' != get_comments_number() ) :
        comments_template();
    endif;