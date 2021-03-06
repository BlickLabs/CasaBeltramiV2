<?php
    class widget_featured_posts extends WP_Widget {

        function widget_featured_posts() {
            $widget_ops = array( 'classname' => 'widget_tabber ' , 'description' => __( 'Featured posts' , 'redcodn' ) );
            $this -> WP_Widget( 'widget_red_featured_posts' , _TN_ . ' : ' . __( 'Featured posts' , 'redcodn' ) , $widget_ops );
        }

        function widget( $args , $instance ) {

            /* prints the widget*/
            extract($args, EXTR_SKIP);

            if( isset( $instance['title'] ) ){
                $title = $instance['title'];
            }else{
                $title = '';
            }

            if( isset( $instance['nr_hot_posts'] ) ){
                $nr_hot_posts = $instance['nr_hot_posts'];
            }else{
                $nr_hot_posts = 0;
            }

            if( isset( $instance['period'] ) ){
                $period = $instance['period'];
            }else{
                $period = 0;
            }

            
            echo $before_widget;

            if( !empty( $title ) ){
                echo $before_title . $title . $after_title;
            }

        ?>
           
            
            <!-- panel hot posts -->
            <?php
                if( options::logic( 'likes' , 'enb_likes' ) ){
                    $nclasses = 'hidden';
                }else{
                    $nclasses = '';
                }

                if( options::logic( 'likes' , 'enb_likes' ) ){
            ?>

                    <div id="hot_posts_panel" class="tab_menu_content tabs-container">
                        <?php
                            $args = array(
                                'posts_per_page' => $nr_hot_posts,
                                'post_status' => 'publish' ,
                                'meta_key' => 'hot_date' ,
                                
                                'orderby' => 'meta_value_num' ,
                                'meta_query' => array(
                                        array(
                                            'key' => 'nr_like' ,
                                            'value' => options::get_value( 'general' , 'min_likes' ) ,
                                            'compare' => '>=' ,
                                            'type' => 'numeric',
                                        ) ),
                                'order' => 'DESC'
                            );


                            /* today */
                            if( $period == 0 ){
                                $today = getdate();
                                $args['day'] = $today["mday"];
                            }

                            /* filter - 7 days */
                            if( $period == 7 ){
                                add_filter( 'posts_where', array( 'widget_tabber' , 'filter_where_07' ) );
                            }

                            /* filter - 30 days */
                            if( $period == 30 ){
                                add_filter( 'posts_where', array( 'widget_tabber' , 'filter_where_30' ) );
                            }

                            $wp_query = new WP_Query( $args );

                            /* remove filter - 7 days */
                            if( $period == 7 ){
                                remove_filter( 'posts_where', array( 'widget_tabber' , 'filter_where_07' ) );
                            }

                            /* remove filter - 30 days */
                            if( $period == 30 ){
                                remove_filter( 'posts_where', array( 'widget_tabber' , 'filter_where_30' ) );
                            }

                            /* list posts */
                            if( $wp_query -> have_posts() ){
                                echo '<ul class="widget-list">';
                                foreach( $wp_query -> posts as $post ){
                                    $wp_query -> the_post();
                                    self::post( $post );
                                }
                                echo '</ul>';
                            }else{
                                echo '<p>' . __( 'Sorry, no hot posts found.' , 'redcodn' ) . '</p>';
                            }

                            wp_reset_query();
                        ?>
                    </div>
            <?php
                }else{
            ?>
                <div id="hot_posts_panel" class="tab_menu_content tabs-container">
                     <?php _e('Please enable posts voting','redcodn') ?> 
                </div>
            <?php
                }
            ?>

        <?php
            echo $after_widget;
        }

        function update( $new_instance, $old_instance) {

            /*save the widget*/
            $instance = $old_instance;
            $instance['title']              = strip_tags( $new_instance['title'] );
            $instance['nr_hot_posts']       = strip_tags( $new_instance['nr_hot_posts'] );
            $instance['period']             = strip_tags( $new_instance['period'] );
            
            return $instance;
        }

        function form($instance) {

            /* widget form in backend */
            $instance       = wp_parse_args( (array) $instance, array( 'title' => '' , 'nr_hot_posts' => 10 , 'period' => 7 ) );
            $title          = strip_tags( $instance['title'] );
            $nr_hot_posts   = strip_tags( $instance['nr_hot_posts'] );
            $period         = strip_tags( $instance['period'] );
            
    ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','redcodn') ?>:
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('nr_hot_posts'); ?>"><?php _e( 'Number of featured posts' , 'redcodn' ) ?>:
                    <input class="widefat digit" id="<?php echo $this->get_field_id('nr_hot_posts'); ?>" name="<?php echo $this->get_field_name('nr_hot_posts'); ?>" type="text" value="<?php echo esc_attr( $nr_hot_posts ); ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('period'); ?>"><?php _e( 'Period of featured posts' , 'redcodn' ) ?>:
                    <select class="widefat" id="<?php echo $this->get_field_id('period'); ?>" name="<?php echo $this->get_field_name('period'); ?>">
                    <?php
                        if( $period == 0 ){
                            ?><option value="0" selected="selected"><?php _e( 'Today' , 'redcodn' ); ?></option><?php
                        }else{
                            ?><option value="0"><?php _e( 'Today' , 'redcodn' ); ?></option><?php
                        }

                        if( $period == 7 ){
                            ?><option value="7" selected="selected"><?php _e( '7 days' , 'redcodn' ); ?></option><?php
                        }else{
                            ?><option value="7"><?php _e( '7 days' , 'redcodn' ); ?></option><?php
                        }

                        if( $period == 30 ){
                            ?><option value="30" selected="selected"><?php _e( '30 days' , 'redcodn' ); ?></option><?php
                        }else{
                            ?><option value="30"><?php _e( '30 days' , 'redcodn' ); ?></option><?php
                        }
                    ?>
                    </select>
                </label>
            </p>
            
    <?php
        }

        /* aditional functions */
        function post( $post ){

            /* featured image */
            if( get_post_thumbnail_id( $post -> ID ) ){
                $post_img = wp_get_attachment_image( get_post_thumbnail_id( $post -> ID ) , 'thumbnail' , '' );
                $cnt_a1 = ' href="' . get_permalink($post -> ID) . '"';
                $cnt_a2 = ' href="' . get_permalink($post -> ID) . '#comments"';
                $cnt_a3 = ' class="entry-img" href="' . get_permalink($post -> ID) . '"';
                
            }else{
                $post_img = '<img src="' . get_template_directory_uri() . '/images/no.image.50x50.png" />';
                $cnt_a1 = ' href="' . get_permalink($post -> ID) . '"';
                $cnt_a2 = ' href="' . get_permalink($post -> ID) . '#comments"';
                $cnt_a3 = ' class="entry-img" href="' . get_permalink($post -> ID) . '"';
            }

            $likes = meta::get_meta( $post -> ID , 'like' );

            $nr_like = count( $likes );
        ?>
            <li>


                <article class="row">
                    <div class="four mobile-one columns">
                        <a <?php echo $cnt_a3; ?>><?php echo $post_img; ?></a><!-- post featured image -->
                    </div>
                    <div class="eight mobile-three columns">
                        <h6>
                            <a <?php echo $cnt_a1; ?>>
                                <?php
                                    echo mb_substr( $post -> post_title , 0 , BLOCK_TITLE_LEN );
                                    if( strlen( $post->post_title ) > BLOCK_TITLE_LEN ) {
                                        echo '...';
                                    }
                                ?>
                            </a>
                        </h6>
                        <div class="widget-meta st">
                            <ul>
                                <li class="red-comments"><!-- comments -->
                                    <?php
                                        if ( $post -> comment_status == 'open' ) {
                                    ?>
                                            <a <?php echo $cnt_a2; ?>>
                                                <i class="icon-comments"></i>
                                                <span class="comments-count">
                                                <?php
                                                    if( options::logic( 'blog_post' , 'fb_comments' ) ){
                                                        ?> <fb:comments-count href=<?php echo get_permalink( $post -> ID  ) ?>></fb:comments-count> <?php
                                                    }else{
                                                        echo $post -> comment_count . ' ';
                                                    }
                                                ?>
                                                </span>
                                            </a>
                                    <?php
                                        }
                                    ?>
                                </li>
                                <li class="thelike">
                                    <?php echo like::content($post->ID,$return = false);  ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>
            </li>
        <?php
        }

        static function filter_where_30( $where = '' ) {
            /* posts in the last 30 days */
            
            global $wpdb;
            
            $where .= " AND  FROM_UNIXTIME(".$wpdb->prefix."postmeta.meta_value)  > '" . date('Y-m-d', strtotime('-30 days')) . "'";
            return $where;
        }

        static function filter_where_07( $where = '' ) {
            /* posts in the last 7 days */
            global $wpdb;
            $where .= " AND FROM_UNIXTIME(".$wpdb->prefix."postmeta.meta_value) > '" . date('Y-m-d', strtotime('-7 days')) . "'";
            return $where;
        }
    }
?>