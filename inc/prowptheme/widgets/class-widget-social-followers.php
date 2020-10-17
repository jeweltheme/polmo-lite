<?php
/**
* Polmo Lite Socials    
* @package Polmo Lite
* @author Liton Arefin 
* @copyright Copyright (c) 2015 - 2016 Liton Arefin
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/

if(!( class_exists('Polmo_Lite_Socials_Follow_Us') )){
    class Polmo_Lite_Socials_Follow_Us extends WP_Widget {

        /**
        * Register widget with WordPress.
        */
        public function __construct() {
            parent::__construct(
                'polmo-lite-social-followers', // Base ID
                '&#x1F536; '. esc_html__('Polmo Lite:', 'polmo-lite') . ' &raquo; ' . esc_html__('Follow Us ', 'polmo-lite'),
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

            $title = empty($instance['title'] !="") ? "" : $instance['title'];

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

    } // class Polmo_Lite_Socials_Follow_Us
}

// register Polmo Popular Posts widget
function polmo_lite_register_social_follow(){
     register_widget( 'Polmo_Lite_Socials_Follow_Us' );
}

// register Polmo Popular Posts widget
add_action( 'widgets_init', 'polmo_lite_register_social_follow');