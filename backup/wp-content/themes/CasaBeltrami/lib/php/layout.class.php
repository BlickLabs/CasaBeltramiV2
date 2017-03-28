<?php
	class layout{
        static $size = array(
            'large' => 'twelve columns',
            //'lmedium' => 'nine columns',
            'medium' => 'nine columns'
        );
        static function side( $side = 'right' , $post_id = 0 , $template = null ){
            
            $words_width = array( 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',  5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten', 11 => 'eleven', 12 => 'twelve' );
        
            $sidebar_width = options::get_value( 'layout' , 'sidebar_width' );

            $sidebar_width_class = $words_width[$sidebar_width];
            $content_width_class = $words_width[12-$sidebar_width];

            $position = false;
            if( strlen( $side ) ){
                if( $post_id > 0 ){
                    $layout = meta::get_meta( $post_id , 'layout' );

                    if( isset( $layout['type'] ) && !empty( $layout['type'] ) ){
                        $result = $layout['type'];
                    }else{
                        
                        if( strlen( $template ) ){
                            $result = options::get_value( 'layout' , $template );
                        }else{
                            $result = $side;
                        }
                    }
                }else{
                    if( strlen( $template ) ){
                        $result = options::get_value( 'layout' , $template );
                    }else{
                        $result = $side;
                    }
                }

                if( $side == 'right' ){
                    $classes = 'right-sidebar '.$sidebar_width_class.' columns';
                }else{
                    $classes = 'left-sidebar '.$sidebar_width_class.' columns top-separator';
                }

                if( $result == $side ){
                    if (is_single() || is_page() || is_404()) {
                        $column_class = ''.$sidebar_width_class.' columns';
                    }else{
                        $column_class = '';
                    }
                    echo '<div id="secondary" class="'. $column_class . '  ' . $classes . '" role="complementary">';
                    if( isset( $layout['sidebar'] ) && !empty( $layout['sidebar'] ) ){                        
                        if(dynamic_sidebar( $layout['sidebar'] ) ){

                        }
                    }else{
                        $layout = options::get_value( 'layout' , $template . '_sidebar' );
                        if( !empty( $layout ) ){
                            if(dynamic_sidebar( $layout ) ){

                            }
                        }else{
                            get_sidebar( );
                        }
                        
                    }
                    //echo '</div>';
                    echo '</div>';

                    $position = true;
                }
            }

            return $position;
        }

        static function length( $post_id = 0 , $template = null ){
            $layout = meta::get_meta( $post_id , 'layout' );
            if( isset( $layout['type'] ) && !empty( $layout['type'] ) && $layout['type'] == 'full' ) {
                $length = self::$size['large'];
            }else{
                if( strlen( $template ) ){
                    $result = options::get_value( 'layout' , $template );

                    $words_width = array( 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',  5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten', 11 => 'eleven', 12 => 'twelve' );
        
                    $sidebar_width = options::get_value( 'layout' , 'sidebar_width' );

                    $content_width_class = $words_width[12-$sidebar_width];

                    self::$size['medium'] = ' '.$content_width_class.' columns ';

                    if( $result == 'full' ){
                        if( isset( $layout['type'] ) && $layout['type'] != 'full' ){
                            $length = self::$size['medium'];
                        }else{
                            $length = self::$size['large'];
                        }
                    }else{
                        $length = self::$size['medium'];
                    }
                }
            }

            return $length;
        }

	}
?>