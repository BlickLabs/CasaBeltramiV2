<?php
    class widget_socialicons extends WP_Widget {

        function widget_socialicons() {
            $widget_ops = array( 'classname' => 'widget_socialicons' , 'description' => __( 'Social icons' , 'redcodn' ) );
            $this -> WP_Widget( 'widget_red_socialicons' , _TN_ . ' : ' . __( 'Social icons' , 'redcodn' ) , $widget_ops );
        }

        function widget( $args , $instance ) {

            /* prints the widget*/
            extract($args, EXTR_SKIP);

            if( isset( $instance['title'] ) ){
                $title = $instance['title'];
            }else{
                $title = '';
            }

			echo $before_widget;

            if( !empty( $title ) ){
                echo $before_title . $title . $after_title;
            }

        ?>
            <div class="socialicons ">
                <?php  red_get_social_icons();  ?> 
            </div>
        <?php
            echo $after_widget;
        }

        function update( $new_instance, $old_instance) {

            /*save the widget*/
            $instance = $old_instance;
            $instance['title']              = strip_tags( $new_instance['title'] );
			
            return $instance;
        }

        function form($instance) {

            /* widget form in backend */
            $instance       = wp_parse_args( (array) $instance, array( 'title' => '') );
            $title          = strip_tags( $instance['title'] );
			
    ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','redcodn') ?>:
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
                </label>
            </p>
            <span class="hint">
                <?php echo sprintf(__('All the social profile settings can be set %s here %s','redcodn'), '<a href="admin.php?page=redcodn__social" target="blank">','</a>' ); ?>
            </span>
			
    <?php
        }
    }
?>