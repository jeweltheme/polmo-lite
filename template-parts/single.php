<?php
/**
 * Template part for displaying posts.
 *
 * @package Polmo
 */

$polmo_lite_hide_thumb  = Polmo_Lite_Kirki::get_option('polmo_lite','index_hide_thumb');
$polmo_lite_layout      = polmo_lite_blog_layout();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-head media">
        
        <?php polmo_lite_post_date();?>
        
        <div class="media-body">
            <?php the_title( sprintf( '<h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1>' ); ?>

            <?php echo polmo_lite_post_meta();?>

        </div>
    </div><!-- /.post-head -->

    <div class="post-content">

        <?php 
        if ( $polmo_lite_hide_thumb == '' ){
            if ( has_post_thumbnail() ) { 
                polmo_lite_post_thumbnail();
            } 
        }?>

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

    </div><!-- /.post-content -->
</article><!-- /.type-post -->

<?php echo polmo_lite_author_bio(); ?>