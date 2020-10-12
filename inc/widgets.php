<?php
    /**
    * Polmo Lite Popular Widget    
    * @package Polmo Lite WP
    * @author Liton Arefin 
    * @copyright Copyright (c) 2015 - 2016 Liton Arefin
    * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
    */
    if(!( class_exists('JewelTheme_Polmo_Popular_Posts_Widget') )){
        class JewelTheme_Polmo_Popular_Posts_Widget extends WP_Widget {

            /**
            * Register widget with WordPress.
            */
            public function __construct() {
                parent::__construct(
                    'polmo_lite_popular_posts', // Base ID
                    'Polmo Lite Popular Posts', // Name
                    array( 'description' => __( 'Popular Posts Display Widget', 'polmo-lite' ), ) // Args
                );
            }

            /**
            *
            * Limit Popular Text 
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


                <div class="widget_recent_post">
                  <div class="widget-details">

                    <?php $pc = new WP_Query('orderby=comment_count&posts_per_page=' . $count . '');  
                    if( $pc->have_posts() ){ while ($pc->have_posts()) { $pc->the_post(); ?>
                        
                        <article class="type-post post">
                          <div class="post-thumbnail pull-left">

                            <?php if ( has_post_thumbnail() ) { 
                                $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array(70,70) );
                                ?>
                                <img class="img-circle" src="<?php echo esc_url( $url[0] ); ?>" alt="<?php the_title();?>" />
                            <?php } ?>
                          </div><!-- /.post-thumbnail -->
                          <div class="post-content">
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
                </div><!-- /.widget -->



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

        } // class JewelTheme_Polmo_Popular_Posts_Widget
    }


    // register Polmo Popular Posts widget
    function polmo_lite_register_popular_posts(){
         register_widget( 'JewelTheme_Polmo_Popular_Posts_Widget' );
    }
    add_action( 'widgets_init', 'polmo_lite_register_popular_posts');

    // add_action( 'widgets_init', create_function( '', 'register_widget( "JewelTheme_Polmo_Popular_Posts_Widget" );' ) );




    /**
    * Polmo Lite Popular Widget    
    * @package Polmo Lite
    * @author Liton Arefin 
    * @copyright Copyright (c) 2015 - 2016 Liton Arefin
    * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
    */
    if(!( class_exists('JewelTheme_Polmo_Recent_Posts_Widget') )){
        class JewelTheme_Polmo_Recent_Posts_Widget extends WP_Widget {

            /**
            * Register widget with WordPress.
            */
            public function __construct() {
                parent::__construct(
                    'polmo_lite_recent_posts', // Base ID
                    'Polmo Lite Recent Posts', // Name
                    array( 'description' => __( 'Recent Posts Display Widget', 'polmo-lite' ), ) // Args
                );
            }

            /**
            *
            * Limit Popular Text 
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

                $title = apply_filters('widget_title', empty($instance['title']) ? __( 'Recent Posts', 'polmo-lite' ) : $instance['title'], $instance, $this->id_base);

                $avatar_size = empty($instance['avatar_size']) ? 70 : $instance['avatar_size'];
                $word_limit = empty($instance['word_limit']) ? 20 : $instance['word_limit'];
                $count = empty($instance['count']) ? 2 : $instance['count'];

                echo $before_widget;

                echo $before_title . $title . $after_title;

                ?>

                <div class="widget widget_recent_post">
                  <div class="widget-details">

                    <?php $rp = new WP_Query('order=DESC&posts_per_page=' . $count . ''); 
                    if( $rp->have_posts() ){ while ($rp->have_posts()) { $rp->the_post(); ?>
                        
                        <article class="type-post post">
                          <div class="post-thumbnail pull-left">

                            <?php if ( has_post_thumbnail() ) { 
                                $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array(70,70) );
                                ?>
                                <img class="img-circle" src="<?php echo esc_url( $url[0] ); ?>" alt="<?php the_title();?>" />
                            <?php } ?>
                          </div><!-- /.post-thumbnail -->
                          <div class="post-content">
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
                </div><!-- /.widget -->


                <?php
                // $output = ob_get_clean();
                // return $output;

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
                $count = isset($instance['count']) ? esc_attr($instance['count']) : '2';
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

        } // class JewelTheme_Polmo_Recent_Posts_Widget
    }

    // register Polmo Recent Posts widget
    function polmo_lite_register_recent_posts(){
         register_widget( 'JewelTheme_Polmo_Recent_Posts_Widget' );
    }
    // register Polmo Recent Posts widget
    add_action( 'widgets_init', 'polmo_lite_register_recent_posts');



/**
* Polmo Lite Socials    
* @package Polmo Lite
* @author Liton Arefin 
* @copyright Copyright (c) 2015 - 2016 Liton Arefin
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/

    if(!( class_exists('JewelTheme_Polmo_Socials_Follow_Us') )){
        class JewelTheme_Polmo_Socials_Follow_Us extends WP_Widget {

            /**
            * Register widget with WordPress.
            */
            public function __construct() {
                parent::__construct(
                    'polmo_lite_social_share', // Base ID
                    'Polmo Lite Follow Us', // Name
                    array( 'description' => __( 'Polmo Follow Us Socials', 'polmo-lite' ), ) // Args
                );
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

                $title = apply_filters('widget_title', empty($instance['title']) ? __( 'Follow Us', 'polmo-lite' ) : $instance['title'], $instance, $this->id_base);

                $facebook = empty($instance['facebook']) ? '' : $instance['facebook'];
                $twitter = empty($instance['twitter']) ? '' : $instance['twitter'];
                $google_plus = empty($instance['google_plus']) ? '' : $instance['google_plus'];
                $pinterest = empty($instance['pinterest']) ? '' : $instance['pinterest'];
                $linkedin = empty($instance['linkedin']) ? '' : $instance['linkedin'];
                $youtube = empty($instance['youtube']) ? '' : $instance['youtube'];
              
                echo $before_widget;
                echo $before_title . $title . $after_title;
                ?>

             
                    <div class="widget_social_follow">
                      <div class="widget-details">
                        <ul class="social-list">

                            <?php if( $facebook != ""){ ?>
                                <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <?php } if( $twitter != ""){ ?>
                                <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <?php } if( $google_plus != ""){?>
                                <li><a href="<?php echo esc_url( $google_plus ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <?php } if( $pinterest != ""){ ?>
                                <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <?php } if( $linkedin != ""){?>
                                <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <?php } if( $youtube != ""){ ?>
                                <li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <?php } ?>

                        </ul>
                      </div><!-- /.widget-details -->
                    </div><!-- /.widget -->



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

                $instance['title']              = strip_tags( $new_instance['title'] );
                $instance['facebook']           = strip_tags( $new_instance['facebook'] );
                $instance['twitter']            = strip_tags( $new_instance['twitter'] );
                $instance['google_plus']        = strip_tags( $new_instance['google_plus'] );
                $instance['pinterest']          = strip_tags( $new_instance['pinterest'] );
                $instance['linkedin']           = strip_tags( $new_instance['linkedin'] );
                $instance['youtube']            = strip_tags( $new_instance['youtube'] );

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
                $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Follow Us';
                $facebook = isset($instance['facebook']) ? esc_attr($instance['facebook']) : 'https://www.facebook.com/jwthemeltd/';
                $twitter = isset($instance['twitter']) ? esc_attr($instance['twitter']) : 'https://twitter.com/jwthemeltd';
                $google_plus = isset($instance['google_plus']) ? esc_attr($instance['google_plus']) : 'http://plus.google.com/107246285439631984162';
                $pinterest = isset($instance['pinterest']) ? esc_attr($instance['pinterest']) : 'https://www.pinterest.com/jeweltheme/';
                $linkedin = isset($instance['linkedin']) ? esc_attr($instance['linkedin']) : 'https://www.linkedin.com/company/jeweltheme';
                $youtube = isset($instance['youtube']) ? esc_attr($instance['youtube']) : 'https://www.youtube.com/channel/UCAPfTXvzbNebKsB322Iz6HQ';

            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html__( 'Title:', 'polmo-lite' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php esc_html__( 'Facebook:', 'polmo-lite' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php esc_html__( 'Twitter:', 'polmo-lite' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'google_plus' ); ?>"><?php esc_html__( 'Google Plus:', 'polmo-lite' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'google_plus' ); ?>" name="<?php echo $this->get_field_name( 'google_plus' ); ?>" type="text" value="<?php echo esc_attr( $google_plus ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php esc_html__( 'Pinterest:', 'polmo-lite' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php esc_html__( 'Linked In:', 'polmo-lite' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php esc_html__( 'Youtube:', 'polmo-lite' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
            </p>

            <?php
            }

        } // class JewelTheme_Polmo_Socials_Follow_Us
    }

    // register Polmo Popular Posts widget
    function polmo_lite_register_social_follow(){
         register_widget( 'JewelTheme_Polmo_Socials_Follow_Us' );
    }
    // register Polmo Popular Posts widget
    add_action( 'widgets_init', 'polmo_lite_register_social_follow');


