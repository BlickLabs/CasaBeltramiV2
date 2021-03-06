<?php
    class tools{
        static function primary_class( $post_id , $template, $return_just_class = false ){
            if($return_just_class){
                return layout::length( $post_id , $template  );
            }else{
                echo 'class="' . layout::length( $post_id , $template  ) . '"';    
            }
            
        }

        static function content_class( $post_id , $template , $side = '' , $with_grid = true ){
            $grid = self::is_grid( $template , $side );

            echo 'class="w_' . layout::length( $post_id , $template ) . '  ' . str_replace( '_' , '-' , $template ) . ' ';
            if( $with_grid ){
                if( $grid ){
                    echo 'grid-view';
                }else{
                    echo 'list-view';
                }
            }
            echo '"';
        }

        static function entry_class( $post_id , $template , $classes = '' ){
            ob_start();
            ob_clean();
            $left = layout::side( 'left' , $post_id , $template );
            if( layout::length( $post_id , $template ) == layout::$size['large'] ){
                $classes .= ' b w_290';
            }else{
                if( $left ){
                    $classes .= ' w_610';
                }else{
                    $classes .= ' w_610';
                }
            }
            ob_get_clean();
            echo 'class="' . $classes . '"';
        }
        
        static function is_grid( $template , $side = '' ){
            $grid = false;

            if( isset( $_COOKIE[ZIP_NAME.'_grid_' . $template . $side ] ) ){
                if( $_COOKIE[ZIP_NAME.'_grid_' . $template . $side ] == 'grid'  ){
                    $grid = true;
                }else{
                    $grid = false;
                }
            }else{
                if( strlen( $side ) ){
                    if( options::logic( 'front_page' , 'v' . $side  ) ){
                        $grid = false;
                    }else{
                        $grid = true;
                    }
                }else{
                    if( options::logic( 'layout' , 'v_' . $template  ) ){
                        $grid = false;
                    }else{
                        $grid = true;
                    }
                }
            }

            return $grid;
        }
        
        static function tour( $pos ,  $location , $id , $type , $title , $body , $nr ,  $next = true ){
            
            $nrs = explode('/' , $nr );
            
            /* stap */
            if( isset( $_COOKIE[ ZIP_NAME.'_tour_stap_' . $location . '_' . $id ] ) && (int)$_COOKIE[ ZIP_NAME.'_tour_stap_' . $location . '_' . $id ] > 0  ){
                $k = $_COOKIE[ ZIP_NAME.'_tour_stap_' . $location . '_' . $id ] + 1;
            }else{
                $k = 1;
            }
            
            if( $nrs[0] == $k ){
                $classes = '';
            }else{
                $classes = 'hidden';
            }
        ?>
            <div class="demo-tooltip <?php echo $classes; ?>" index="<?php echo $nrs[0] - 1; ?>" rel="<?php echo $location . '_' . $id; ?>" style="top: <?php echo $pos[0]; ?>px; left: <?php echo $pos[1]; ?>px; "><!--Virtual guide starts here. Set coordinates top and left-->
                <span class="arrow <?php echo $type; ?>">&nbsp;</span><!--Available arrow position: left, right, top -->
                <header class="demo-steps">
                    <strong class="fl"><?php echo stripslashes($title); ?></strong>
                    <span class="fr"><?php echo $nr; ?></span><!--Step number from-->
                </header>
                <div class="demo-content">
                    <?php echo stripslashes( $body ); ?>
                    <?php
                        if( $next ){
                    ?>
                            <p class="fr close"><a href="#" class="close"><?php _e( 'Do not show hints anymore' , 'redcodn' ); ?></a></p>
                    <?php
                        }
                    ?>
                </div>
                <footer class="demo-buttons">
                    <?php
                        if( $next ){
                    ?>
                            <p class="fl button-small gray"><a href="#" class="next"><?php _e( 'Next feature' , 'redcodn' ); ?></a></p>
                            <p class="fr button-small blue"><a href="#" class="skip"><?php _e( 'Skip' , 'redcodn' ); ?></a></p>
                    <?php
                        }else{
                            ?><p class="fr button-small red"><a href="#" class="close"><?php _e( 'Close' , 'redcodn' ); ?></a></p><?php
                        }
                    ?>
                            
                    
                </footer>
            </div>
        <?php
        }
    }
?>