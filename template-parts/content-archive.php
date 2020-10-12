<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Polmo
 */

$polmo_lite_hide_thumb  = Polmo_Lite_Kirki::get_option('polmo_lite','index_hide_thumb');
$polmo_lite_layout      = polmo_lite_blog_layout();

?>

<article <?php post_class();?>>

        <?php 
        if ( $polmo_lite_hide_thumb == '' ){
            if ( has_post_thumbnail() ) { 
                polmo_lite_post_thumbnail();
            } 
        }?>

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