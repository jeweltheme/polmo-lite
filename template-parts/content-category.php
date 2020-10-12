<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Polmo
 */
$polmo_lite_hide_thumb  = Polmo_Lite_Kirki::get_option('polmo_lite','index_hide_thumb');
$polmo_lite_layout      = polmo_lite_blog_layout();

?>
<article class="blog-post">
    <div class="row">
        <div class="col-sm-6">
            <div class="text-content">
                <?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <?php echo polmo_lite_ateam_entry_post_meta();?>

                <p>
                    <?php the_excerpt(); ?>
                </p>

                <div class="btn-container default">
                    <a class="btn btn-bg" href="<?php the_permalink();?>">Read On</a>
                </div><!-- /.btn-container -->
            </div><!-- /.text-content -->
        </div><!-- /.col-sm-6 -->
        <div class="col-sm-6">
            <div class="media-content">
                <div class="post-image">

                    <?php 
                    if ( $polmo_lite_hide_thumb == '' ){
                        if ( has_post_thumbnail() ) { 
                            polmo_lite_post_thumbnail();
                        } 
                    }?>

                </div><!-- /.post-image -->
            </div><!-- /.media-content -->                  
        </div><!-- /.col-sm-6 -->
    </div><!-- /.row -->
</article><!-- /#blog-post -->
