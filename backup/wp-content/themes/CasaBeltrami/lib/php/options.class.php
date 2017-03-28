<?php
    class options{
		static $menu;
		static $register;
		static $default;
		static $fields;

        static function menu( ){

            if( is_array( self::$menu ) && !empty( self::$menu) ){
                

                foreach( self::$menu as $main => $items ){
                    
                    foreach( $items as $slug => $item ){
                        
                        switch( $main ){ 
                            default :{
								if( isset( $item['type'] ) ){
									if( $item['type'] == 'main' ){
										add_menu_page( $item['main_label'] , $item['main_label'] , 'administrator' , $main . '__' . $slug  , array( get_class() , $main . '__' . $slug ) , get_template_directory_uri() . '/lib/images/icon.png' );
                                        
                                        //call_user_func_array( get_class() . '::' . $main . '__' . $slug, array_slice( array( 'name' , 'arguments' ) , 0, (int) 2 ) );
										$main_slug =  $main . '__' . $slug;
									}else{
                                        add_submenu_page( $main_slug , $item['label'] , $item['label'] , 'administrator' , $main . '__' . $slug , array( get_class() , $main . '__' . $slug )  );
									}
								}else{ 
                                    add_submenu_page( $main_slug , $item['label'] , $item['label'] , 'administrator' , $main . '__' . $slug , array( get_class() , $main . '__' . $slug )  );
								}
                                break;
                            }
                        }
                    }
                }
            }
        }

        static function redcodn__general(){
            self::CallMenu( 'redcodn__general' );
        }
        static function redcodn__layout(){
            self::CallMenu( 'redcodn__layout' );
        }
        static function redcodn__styling(){
            self::CallMenu( 'redcodn__styling' );
        }
        static function redcodn__typography(){
            self::CallMenu( 'redcodn__typography' );
        }       
        static function redcodn__colors(){
            self::CallMenu( 'redcodn__colors' );
        }
        static function redcodn__imagesizes(){
            self::CallMenu( 'redcodn__imagesizes' );
        }
        static function redcodn__likes(){
            self::CallMenu( 'redcodn__likes' );
        }
        static function redcodn__conference(){
            self::CallMenu( 'redcodn__conference' );
        }
        static function redcodn__header_settings(){
            self::CallMenu( 'redcodn__header_settings' );
        }
        static function redcodn__content_settings(){
            self::CallMenu( 'redcodn__content_settings' );
        }        
        static function redcodn__blog_post(){
            self::CallMenu( 'redcodn__blog_post' );
        }
        static function redcodn__footer_settings(){
            self::CallMenu( 'redcodn__footer_settings' );
        }
        static function redcodn__advertisement(){
            self::CallMenu( 'redcodn__advertisement' );
        }

        static function redcodn__social(){
            self::CallMenu( 'redcodn__social' );
        }

        static function redcodn__slider(){
            self::CallMenu( 'redcodn__slider' );
        }
		
		static function redcodn__upload(){
            self::CallMenu( 'redcodn__upload' );
        }

        static function redcodn___sidebar(){
            self::CallMenu( 'redcodn___sidebar' );
        }

        static function redcodn__custom_css(){
            self::CallMenu( 'redcodn__custom_css' );
        }

        static function redcodn__stylos(){
            self::CallMenu( 'redcodn__stylos' );
        }
		  
		static function redcodn__redcodn(){
            self::CallMenu( 'redcodn__redcodn' );
        }

        static function redcodn__io(){
            self::CallMenu( 'redcodn__io' );
        }
        
        static function CallMenu( $name ) {

            $slug           = $name;
            $items 			= explode( '__' , $slug );

            if( !isset( $items[1] ) ){
                exit();
            }

            $label          = isset( self::$menu[ $items[0] ][$items[1]]['label'] ) ? self::$menu[ $items[0] ][$items[1]]['label'] : '';
            $title          = isset( self::$menu[ $items[0] ][$items[1]]['title'] ) ? self::$menu[ $items[0] ][$items[1]]['title'] : '';
            $description    = isset( self::$menu[ $items[0] ][$items[1]]['desctiption'] ) ? self::$menu[ $items[0] ][$items[1]]['desctiption'] : '';
            $update         = isset( self::$menu[ $items[0] ][$items[1]]['update'] ) ? self::$menu[ $items[0] ][$items[1]]['update'] : true ;

            includes::load_css(  );
            includes::load_js(  );
            echo '<div class="admin-page">';
            self::get_header( $items[0] , $items[1] );
            self::get_page( $title , $slug , $description , $update );
            echo '</div>';
        }

        static function register( ){
            if( is_array( self::$register ) && !empty( self::$register ) ){
                foreach( self::$register as $page => $groups ){
                    if( is_array( $groups ) && !empty( $groups ) ){
                        foreach( $groups as $group => $side ){
                            if( substr( $group , 0 , 1 ) != '_'){
                                register_setting( $page . '__' . $group , $group );
                            }
                        }
                    }
                }
            }
        }


        static function box(){
            if( is_array( self::$menu ) && !empty( self::$menu ) ){
                foreach( self::$menu  as $key => $value ){
                    switch( count( $value )  ){
                        case 7 : {
                            $value[0]( $value[1] , $value[2] , $value[3] , $value[4] , $value[5] , $value[6] );
                            break;
                        }
                    }
                }
            }
        }

		static function get_header( $item , $current ){
			$result = '';
            $menu = self::$menu[ $item ];

			if(BRAND == ''){
				$brand_logo = get_template_directory_uri().'/images/freetotryme.png';
			}else{
				$brand_logo = get_template_directory_uri().'/images/redcodn.png';
			}
			
			$ct = wp_get_theme();
            
			$result .= '<div class="mythemes-intro">';
            $result .= '<img src="'.$brand_logo.'" />';
			$result .= '<span class="theme">'.$ct->title.' '.__('Version' , 'redcodn').': '.$ct->version.'</span>';
            $result .= '</div>';
			
			if( is_array( $menu ) ){
				$result .= '<div class="admin-menu">';
				$result .= '<ul>';
				foreach( $menu as $slug => $info){
                    $result .= '<li '. self::get_class( $slug , $current ) .'><a href="' . self::get_path( $item . '__' . $slug ) . '">' . get_item_label( $info['label'] ) . '</a></li>';
				}
				$result .= '</ul>';
				$result .= '</div>';
			}

            echo $result;
		}

        static function get_path( $slug ){
            $path = '?page=' . $slug;
            return $path;
        }

        static function get_class( $slug , $current ){
            
            if( $current == $slug ){
                if( substr( $slug , 0 , 1 ) == '_' ){
                    $slug = substr( $slug , 1 , strlen( $slug ) );
                }
            
                $slug = str_replace( '_' , '-' , $slug  );
                
                if($slug == 'advertisement'){
                    $slug = 'red-pub';
                }
                return 'class="current ' . $slug . '"';
            }else{
                if( substr( $slug , 0 , 1 ) == '_' ){
                    $slug = substr( $slug , 1 , strlen( $slug ) );
                }
            
                $slug = str_replace( '_' , '-' , $slug  );
                
                if($slug == 'advertisement'){
                    $slug = 'red-pub';
                }
                return ' class="' . $slug . '"';
            }

        }

        static function get_page( $title , $slug ,  $description = '' , $update = true ){
?>
            <div class="admin-content">
<?php
                if(isset($_GET['settings-updated']) && $_GET['settings-updated'] = 'true'){
?>

                    <div id="message" class="updated">
                        <p><strong><?php _e('Settings saved.','redcodn') ?></strong></p>
                    </div>
<?php
                }
?>                    
                <div class="title">
                    <h2><?php echo $title; ?></h2>
                    <?php
                        if( strlen( $description ) ){
                    ?>
                            <p><?php echo $description; ?></p>
                    <?php
                        }
                    ?>
                </div>
            <?php
                if( $update ){
            ?>
                    <form action="options.php" method="post">
            <?php
                        
                }
                        settings_fields( $slug );
						$items = explode( '__' , $slug );

                        echo self::get_fields( $items[1] );
                if( $update ){
            ?>
                        <div class="standard-generic-field submit">
                            <div class="field">
                                <input type="submit" value="<?php _e( 'Update Settings' , 'redcodn' ); ?>"/>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </form>
            <?php
                }else{
            ?>
                    <div class="record submit"></div>
            <?php
                }
            ?>
			</div>
<?php
        }

        static function get_fields( $group ){
            $result = '';
            if( isset( self::$fields[ $group ] ) ){
                foreach( self::$fields[ $group ] as $side => $field ){
                    if(is_array($field)){
                        $field['topic'] = $side;
                        $field['group'] = $group;
                        if( !isset( $field['value'] ) ){
                            $field['value'] = self::get_value( $group , $side );
                        }

                        $field['ivalue'] = self::get_value( $group , $side );
                    }
                    /* special for upload-id*/
                    if( isset( $field['type'] ) ){
                        $type = explode( '--' , $field['type'] );
                        if( isset( $type[1] ) && $type[1] == 'upload-id' ){
							$option = self::get_value( $group );
                            $value_id = isset( $option[ $side .'_id' ] ) ? $option[ $side .'_id' ] : 0;
                            $field['value_id'] = $value_id;
                        }
                    }

                    $result .= fields::layout( $field );
                }
            }
			
            return $result;
        }

        

        static function get_digit_array( $to , $from = 0 , $twodigit = false ){
            $result = array();
            for( $i = $from; $i < $to + 1; $i ++ ){
                if( $twodigit ){
                    $i = (string)$i;
                    if( strlen( $i ) == 1 ){
                        $i = '0' . $i;
                    }
                    $result[$i] = $i;
                }else{
                    $result[$i] = $i;
                }
            }

            return $result;
        }

        static function get_value( $group , $side = null , $id = null){
            $g = $group;
            $s = $side;
            $i = $id;
            
            $v = @get_option( $g );
            if( is_array( $v ) ){
                if( strlen( $s ) ){
                    if( isset( $v[ $s ] ) ){
                        if( is_int( $i ) ){
                            if( isset( $v[ $s ][ $i ] ) ){
                                return $v[ $s ][ $i ];
                            }else{
                                if( isset( options::$default[ $g ][ $s ][ $i ] )){
                                    return options::$default[ $g ][ $s ][ $i ];
                                }else{
                                    return '';
                                }
                            }
                        }else{
                            return $v[ $s ];
                        }
                    }else{
                        if( isset( options::$default[ $g ][ $s ])){
                            return options::$default[ $g ][ $s ];
                        }else{
                            return '';
                        }
                    }
                }else{
                    return $v;
                }
            }else{
                if( strlen( $s ) ){
                    if( isset( options::$default[ $g ][ $s ] ) ){
                        if( is_int( $i ) ){
                            if( isset( options::$default[ $g ][ $s ][ $i ] ) ){
                                return options::$default[ $g ][ $s ][ $i ];
                            }else{
                                return '';
                            }
                        }else{
                            return options::$default[ $g ][ $s ];
                        }
                    }else{
                        return '';
                    }
                }else{
                    if( isset( options::$default[ $g ])){
                        return options::$default[ $g ];
                    }else{
                        return '';
                    }
                }
            }
        }

        static function logic( $group , $side = null , $id = null ){
 
            $values = self::get_value( $group , $side , $id );
            if( !is_array( $values ) ){
                if( $values == 'yes' ){
                    return  true;
                }

                if( $values == 'no' ){
                    return false;
                }
            }

            return $values;
        }
        
    	static function my_categories( $nr = -1  , $exclude = array() ){
            $categories = get_categories();

            $result = array();
            foreach($categories as $key => $category){
                if( $key == $nr ){
                    break;
                }
                if( $nr > 0 ){
                    if( !in_array( $category -> term_id , $exclude ) ){
                        $result[ $category -> term_id ] = $category -> term_id;
                    }
                }else{
                    if( !in_array( $category -> term_id , $exclude ) ){
                        $result[ $category -> term_id ] = $category -> cat_name;
                    }
                }
            }

            return $result;
        }

    }


/*    static function importDummyData(){
        
    }*/

?>