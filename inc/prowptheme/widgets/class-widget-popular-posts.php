<?php
/**
* Polmo Lite Popular Posts Widget    
* @package Polmo Lite WP
* @author Liton Arefin 
* @copyright Copyright (c) 2015 - 2016 Liton Arefin
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/
if(!( class_exists('Polmo_Lite_Popular_Posts_Widget') )){
    class Polmo_Lite_Popular_Posts_Widget extends WP_Widget {

        /**
        * Register widget with WordPress.
        */
        public function __construct() {
            parent::__construct(
                'polmo-lite-popular-posts', // Base ID
                'Polmo Lite: Popular Posts', // Name
                array( 'description' => __( 'Popular Posts Display Widget', 'polmo-lite' ), ) // Args
            );
        }

        /**
        *
        * Limit Popular Posts Text 
        *
        *
        **/
        function cText($text, $limit = 10, $sep='...') {

            $text = strip_tags($text);
            $text = explode(' ',$text);
            $sep = (count($text)>$limit) ? '...' : '';
            $text=implode(' ', array_slice($text,0,$limit)) . $sep;

            return $text;
        }

        /**
        * Front-end display of widget.
        *
        * @see WP_Widget::widget()
        *
        * @param array $args     Widget arguments.
        * @param array $instance Saved values from database.
        */
        public function widget( $args, $instance ) {
            extract( $args );

            $title = apply_filters('widget_title', empty($instance['title']) ? __( 'Popular Posts', 'polmo-lite' ) : $instance['title'], $instance, $this->id_base);

            $avatar_size = empty($instance['avatar_size']) ? 48 : $instance['avatar_size'];
            $word_limit = empty($instance['word_limit']) ? 20 : $instance['word_limit'];
            $count = empty($instance['count']) ? 5 : $instance['count'];

            echo $before_widget;

            echo $before_title . $title . $after_title;

            ?>


              <div class="widget-details text-left">

                <?php $pc = new WP_Query('orderby=comment_count&posts_per_page=' . $count . '');  
                if( $pc->have_posts() ){ while ($pc->have_posts()) { $pc->the_post(); ?>
                    
                    <article class="post type-post media">

                    <?php if ( has_post_thumbnail() ) { 
                        $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array(70,70) );
                        ?>                        
                        <div class="post-thumbnail media-left">
                            <img class="img-circle" src="<?php echo esc_url( $url[0] ); ?>" alt="<?php the_title();?>" />
                        </div><!-- /.post-thumbnail -->    
                    <?php } ?>
                      
                      <div class="post-content media-body">
                        <h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <div class="post-meta">
                          <div class="entry-date">
                            <time datetime="<?php echo get_the_time('Y-m-j'); ?>">
                                <?php echo get_the_time('M'); ?> <?php echo get_the_time('y'); ?>
                            </time>
                          </div><!-- /.entry-date -->
                          <div class="comments">
                            <span class="comments-icon"><i class="fa fa-comments"></i></span>
                            <span class="count"><?php echo get_comments_number(); ?></span> <?php echo esc_html__("comments","polmo-lite");?>
                          </div><!-- /.comments -->
                        </div><!-- /.post-meta -->
                      </div><!-- /.post-content -->
                    </article>

                <?php 
                        }
                        wp_reset_postdata();
                    }
                    
                ?>

              </div><!-- /.widget-details -->



            <?php

            echo $after_widget;
        }

        /**
        * Sanitize widget form values as they are saved.
        *
        * @see WP_Widget::update()
        *
        * @param array $new_instance Values just sent to be saved.
        * @param array $old_instance Previously saved values from database.
        *
        * @return array Updated safe values to be saved.
        */
        public function update( $new_instance, $old_instance ) {
            $instance                   = array();
            $instance['title']          = strip_tags( $new_instance['title'] );
            $instance['avatar_size']    = strip_tags( $new_instance['avatar_size'] );
            $instance['count']          = strip_tags( $new_instance['count'] );

            return $instance;
        }

        /**
        * Back-end widget form.
        *
        * @see WP_Widget::form()
        *
        * @param array $instance Previously saved values from database.
        */
        public function form( $instance ) {
            $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
            $avatar_size = isset($instance['avatar_size']) ? esc_attr($instance['avatar_size']) : '48';
            $count = isset($instance['count']) ? esc_attr($instance['count']) : '5';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html__( 'Title:', 'polmo-lite' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php esc_html__( 'Post Count:', 'polmo-lite' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'avatar_size' ); ?>"><?php esc_html__( 'Avatar Size:', 'polmo-lite' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'avatar_size' ); ?>" name="<?php echo $this->get_field_name( 'avatar_size' ); ?>" type="text" value="<?php echo esc_attr( $avatar_size ); ?>" />
        </p>
        <?php
        }

    } // class Polmo_Lite_Popular_Posts_Widget
}


// register Polmo Popular Posts widget
function polmo_lite_register_popular_posts(){
     register_widget( 'Polmo_Lite_Popular_Posts_Widget' );
}
add_action( 'widgets_init', 'polmo_lite_register_popular_posts');