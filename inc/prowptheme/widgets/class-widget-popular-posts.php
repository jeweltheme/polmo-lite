<?php
/**
* Polmo Lite Popular Posts Widget    
* @package Polmo Lite WP
* @author Liton Arefin 
* @copyright Copyright (c) 2015 - 2016 Liton Arefin
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/

add_action('widgets_init', 'polmo_lite_required_widgets');
function polmo_lite_required_widgets(){
    register_widget('Polmo_Lite_Popular_Post');
}

class Polmo_Lite_Popular_Post extends WP_Widget {

    /* Widget setup */
    function  __construct() {

        /* Widget settings */
        $widget_ops = array( 
            'classname'   => 'popular-posts-widget', 
            'description' => esc_html__('A widget that show popular posts', 'polmo-lite') 
        );

        /* Widget control settings */
        $control_ops = array( 
            'width'   => 250, 
            'height'  => 350, 
            'id_base' => 'post-popular' 
        );

        /* Create the widget */
        parent::__construct(
            'post-popular', 
            '&#x1F536; '. esc_html__('Polmo Lite', 'polmo-lite') . ' &raquo; ' . esc_html__('Popular Posts ', 'polmo-lite'),
            $widget_ops, $control_ops
        );
    }


    /* Display the widget on the screen */
    function widget($args, $instance) {

        $title = $instance['title'];
        $num   = $instance['num'];

        echo polmo_lite_core_escape($args['before_widget']);
        
        if ( ! empty( $title ) ) echo polmo_lite_core_escape($args['before_title'] . apply_filters( 'widget_title', $title ). $args['after_title']);
        
        echo '<div class="widget-details text-left">'; 

        $popular_posts = '';
        $temp = $popular_posts;
        $popular_posts = new WP_Query(array(
            'showposts' => intval($num), 
            'orderby' => 'comment_count', 
            'ignore_sticky_posts' => true
        ));
        if ($popular_posts->have_posts()) { while ($popular_posts->have_posts()) { $popular_posts->the_post(); 
        ?>
                <?php
                $img_url = false;
                $size = 'thumbnail';
                $img_id = get_post_thumbnail_id($popular_posts->post->ID);
                $photo = wp_get_attachment_image_src($img_id, $size);
                $img_url = (isset($photo[0])) ? $photo[0] : '';
                
                $has_img = ($img_url) ? 'has-img' : '';
                
                ?>

                <article class="post type-post media">
                    <?php if($img_url) { ?>
                        <div class="entry-thumbnail media-left">
                            <img width="75" src="<?php echo esc_url_raw($img_url); ?>" alt="<?php echo esc_attr($popular_posts->post->post_title); ?>"/>
                        </div><!-- /.entry-thumbnail -->
                    <?php } ?>
                    <div class="entry-content media-body">
                        <h4 class="entry-title">
                            <a href="<?php echo get_permalink($popular_posts->post->ID); ?>">
                                <?php echo the_title(); ?>          
                            </a>
                        </h4><!-- /.entry-title -->
                        <div class="entry-meta">
                            <time datetime="<?php echo get_the_modified_date( 'c' );?>">
                                <?php echo get_the_time('j M Y', $popular_posts->post->ID); ?>      
                            </time>
                        </div><!-- /.entry-meta -->
                    </div><!-- /.entry-content -->
                </article><!-- /.type-post -->


        <?php
            wp_reset_postdata();
            wp_reset_query();
        } }

        $popular_posts = $temp;
        echo '</div><!-- /.widget-details -->';
        
        echo polmo_lite_core_escape($args['after_widget']);
    }


    /* Update the widget settings */
    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['num']   = strip_tags($new_instance['num']);

        return $instance;
    }


    /* Displays the widget settings controls on the widget panel */
    function form($instance) {

        $defaults = array( 
            'title' => __('Popular Posts', 'polmo-lite'), 
            'num'   => '5',
        );
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'polmo-lite'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('num')); ?>"><?php _e('Show Count', 'polmo-lite'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('num')); ?>" name="<?php echo esc_attr($this->get_field_name('num')); ?>" value="<?php echo esc_attr($instance['num']); ?>" />
        </p>
    <?php
    }
}