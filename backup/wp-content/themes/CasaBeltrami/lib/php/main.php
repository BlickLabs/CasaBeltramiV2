<?php
	function ilove__autoload( $class_name ){
        if( substr( $class_name , 0 , 6 ) == 'widget'){
            $class_name = str_replace( 'widget_' , '' ,  $class_name );
            if( is_file( get_template_directory() . '/lib/php/widget/' . $class_name . '.php' ) ){
                include get_template_directory() . '/lib/php/widget/' . $class_name . '.php';

            }
        }
		if( is_file( get_template_directory() . '/lib/php/' . $class_name . '.class.php' ) ){
			include_once get_template_directory() . '/lib/php/' . $class_name . '.class.php';
            if( is_file( get_template_directory() . '/lib/php/' . $class_name . '.register.php' ) ){
				include_once get_template_directory() . '/lib/php/' . $class_name . '.register.php';
			}
		}
	}
    
	spl_autoload_register ("ilove__autoload");


    
    add_action( 'init', 'register_custom_taxonomies', 0 );
    function register_custom_taxonomies()
    {
            /*register tags and categories taxonomies for video posts*/
            $video_categ_permalink = options::get_value( 'general' , 'video_categ_link' );
            if (!$video_categ_permalink) {
                $video_categ_permalink = 'video-category';
            }

            $video_tags_permalink = options::get_value( 'general' , 'video_tags_link' );
            if (!$video_tags_permalink) {
                $video_tags_permalink = 'video-tag';
            }

            $video_category = array(
                'hierarchical' => true,
                'labels' => array(
                    'name' => _x( 'Video Categories', 'taxonomy general name' ,'redcodn' ),
                    'singular_name' => _x( 'Video Category', 'taxonomy singular name','redcodn' ),
                    'search_items' =>  __( 'Search Categories', 'redcodn' ),
                    'all_items' => __( 'All Categories', 'redcodn' ),
                    'parent_item' => __( 'Parent Category', 'redcodn' ),
                    'parent_item_colon' => __( 'Parent Category:', 'redcodn' ),
                    'edit_item' => __( 'Edit Category', 'redcodn' ), 
                    'update_item' => __( 'Update Category', 'redcodn' ),
                    'add_new_item' => __( 'Add New Category', 'redcodn' ),
                    'new_item_name' => __( 'New Category Name', 'redcodn' ),
                    'menu_name' => __( 'Categories', 'redcodn' ),
                ),  
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => $video_categ_permalink ),
            );

            $video_tag = array(
                'hierarchical' => false,
                'labels' => array(
                    'name' => _x( 'Video Tags', 'taxonomy general name','redcodn' ),
                    'singular_name' => _x( 'Video Tag', 'taxonomy singular name','redcodn' ),
                    'search_items' =>  __( 'Search Tags', 'redcodn' ),
                    'popular_items' => __( 'Popular Tags', 'redcodn' ),
                    'all_items' => __( 'All Tags', 'redcodn' ),
                    'parent_item' => null,
                    'parent_item_colon' => null,
                    'edit_item' => __( 'Edit Tag', 'redcodn' ),
                    'update_item' => __( 'Update Tag', 'redcodn' ),
                    'add_new_item' => __( 'Add New Tag', 'redcodn' ),
                    'new_item_name' => __( 'New Tag Name', 'redcodn' ),
                    'separate_items_with_commas' => __( 'Separate tags with commas', 'redcodn' ),
                    'add_or_remove_items' => __( 'Add or remove tags', 'redcodn' ),
                    'choose_from_most_used' => __( 'Choose from the most used tags', 'redcodn' ),
                    'menu_name' => __( 'Tags', 'redcodn' ),
                  ),
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array( 'slug' => $video_tags_permalink ),
            );
            register_taxonomy('video-category', 'video', $video_category);
            register_taxonomy('video-tag', 'video', $video_tag);
            /* EOF register tags and categories taxonomies for video posts */
             
            /*register tags and categories taxonomies for gallery posts*/
            $gallery_categ_permalink = options::get_value( 'general' , 'gallery_categ_link' );
            if (!$gallery_categ_permalink) {
                $gallery_categ_permalink = 'gallery-category';
            }

            $gallery_tags_permalink = options::get_value( 'general' , 'gallery_tags_link' );
            if (!$gallery_tags_permalink) {
                $gallery_tags_permalink = 'gallery-tag';
            }

            $gallery_category = array(
                'hierarchical' => true,
                'labels' => array(
                    'name' => _x( 'Gallery Categories', 'taxonomy general name' ,'redcodn' ),
                    'singular_name' => _x( 'Gallery Category', 'taxonomy singular name','redcodn' ),
                    'search_items' =>  __( 'Search Categories', 'redcodn' ),
                    'all_items' => __( 'All Categories', 'redcodn' ),
                    'parent_item' => __( 'Parent Category', 'redcodn' ),
                    'parent_item_colon' => __( 'Parent Category:', 'redcodn' ),
                    'edit_item' => __( 'Edit Category', 'redcodn' ), 
                    'update_item' => __( 'Update Category', 'redcodn' ),
                    'add_new_item' => __( 'Add New Category', 'redcodn' ),
                    'new_item_name' => __( 'New Category Name', 'redcodn' ),
                    'menu_name' => __( 'Categories', 'redcodn' ),
                ),  
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => $gallery_categ_permalink ),
            );

            $gallery_tag = array(
                'hierarchical' => false,
                'labels' => array(
                    'name' => _x( 'Gallery Tags', 'taxonomy general name','redcodn' ),
                    'singular_name' => _x( 'Gallery Tag', 'taxonomy singular name','redcodn' ),
                    'search_items' =>  __( 'Search Tags', 'redcodn' ),
                    'popular_items' => __( 'Popular Tags', 'redcodn' ),
                    'all_items' => __( 'All Tags', 'redcodn' ),
                    'parent_item' => null,
                    'parent_item_colon' => null,
                    'edit_item' => __( 'Edit Tag', 'redcodn' ),
                    'update_item' => __( 'Update Tag', 'redcodn' ),
                    'add_new_item' => __( 'Add New Tag', 'redcodn' ),
                    'new_item_name' => __( 'New Tag Name', 'redcodn' ),
                    'separate_items_with_commas' => __( 'Separate tags with commas', 'redcodn' ),
                    'add_or_remove_items' => __( 'Add or remove tags', 'redcodn' ),
                    'choose_from_most_used' => __( 'Choose from the most used tags', 'redcodn' ),
                    'menu_name' => __( 'Tags', 'redcodn' ),
                  ),
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array( 'slug' => $gallery_tags_permalink ),
            );

            register_taxonomy('gallery-category', 'gallery', $gallery_category);
            register_taxonomy('gallery-tag', 'gallery', $gallery_tag);
            /* EOF register tags and categories taxonomies for gallery posts */  

            /*register tags and categories taxonomies for portfolio posts*/
                $portfolio_categ_permalink = options::get_value( 'general' , 'portfolio_categ_link' );
                if (!$portfolio_categ_permalink) {
                    $portfolio_categ_permalink = 'portfolio-category';
                }

                $portfolio_tags_permalink = options::get_value( 'general' , 'portfolio_tags_link' );
                if (!$portfolio_tags_permalink) {
                    $portfolio_tags_permalink = 'portfolio-tag';
                }

                $portfolio_category = array(
                    'hierarchical' => true,
                    'labels' => array(
                        'name' => _x( 'Portfolio Categories', 'taxonomy general name' ,'redcodn' ),
                        'singular_name' => _x( 'Portfolio Category', 'taxonomy singular name','redcodn' ),
                        'search_items' =>  __( 'Search Categories', 'redcodn' ),
                        'all_items' => __( 'All Categories', 'redcodn' ),
                        'parent_item' => __( 'Parent Category', 'redcodn' ),
                        'parent_item_colon' => __( 'Parent Category:', 'redcodn' ),
                        'edit_item' => __( 'Edit Category', 'redcodn' ), 
                        'update_item' => __( 'Update Category', 'redcodn' ),
                        'add_new_item' => __( 'Add New Category', 'redcodn' ),
                        'new_item_name' => __( 'New Category Name', 'redcodn' ),
                        'menu_name' => __( 'Categories', 'redcodn' ),
                    ),  
                    'show_ui' => true,
                    'query_var' => true,
                    'rewrite' => array( 'slug' => $portfolio_categ_permalink ),
                );

                $portfolio_tag = array(
                    'hierarchical' => false,
                    'labels' => array(
                        'name' => _x( 'Portfolio Tags', 'taxonomy general name','redcodn' ),
                        'singular_name' => _x( 'Portfolio Tag', 'taxonomy singular name','redcodn' ),
                        'search_items' =>  __( 'Search Tags', 'redcodn' ),
                        'popular_items' => __( 'Popular Tags', 'redcodn' ),
                        'all_items' => __( 'All Tags', 'redcodn' ),
                        'parent_item' => null,
                        'parent_item_colon' => null,
                        'edit_item' => __( 'Edit Tag', 'redcodn' ),
                        'update_item' => __( 'Update Tag', 'redcodn' ),
                        'add_new_item' => __( 'Add New Tag', 'redcodn' ),
                        'new_item_name' => __( 'New Tag Name', 'redcodn' ),
                        'separate_items_with_commas' => __( 'Separate tags with commas', 'redcodn' ),
                        'add_or_remove_items' => __( 'Add or remove tags', 'redcodn' ),
                        'choose_from_most_used' => __( 'Choose from the most used tags', 'redcodn' ),
                        'menu_name' => __( 'Tags', 'redcodn' ),
                      ),
                    'show_ui' => true,
                    'update_count_callback' => '_update_post_term_count',
                    'query_var' => true,
                    'rewrite' => array( 'slug' => $portfolio_tags_permalink ),
                );

                register_taxonomy('portfolio-category', 'portfolio', $portfolio_category);
                register_taxonomy('portfolio-tag', 'portfolio', $portfolio_tag);
                /* EOF register tags and categories taxonomies for portfolio posts */ 
    }
     

    function get_post_categories($post_id, $only_first_cat = false, $taxonomy = 'category', $margin_elem_start = '', $margin_elem_end = '', $delimiter = ', ',  $a_class = '', $show_cat_name = true){
                        
        $cat = '';
        $categories = wp_get_post_terms($post_id, $taxonomy );
        if (!empty($categories)) {
            
            $ind = 1;
            foreach ($categories as $category) {
                $categ = get_category($category);
                if($ind != count($categories) && !$only_first_cat){
                    $cat_delimiter = $delimiter;   
                }else{
                    $cat_delimiter = '';   
                }

                if ($show_cat_name) {
                    $name =  $category->name;
                }else{
                    $name = '';
                }
                $cat .= $margin_elem_start . '<a href="' . get_category_link($category) . '" class="'.$a_class.'">' . $name . $cat_delimiter . '</a>' . $margin_elem_end;
                
                if($only_first_cat){
                    break;    
                }
                

                $ind ++;
            }
            
            
            //$cat = __('in','redcodn').' '.   $cat;   
        }
                        
          return $cat .' ' ;
    }
	
    function load_google_fonts(){
        $protocol = is_ssl() ? 'https' : 'http';
        

        $result = '';
        $fonts = array();
        $settings_fonts = array(
            options::get_value( 'typography' , 'general_font_font_family' ),            
            options::get_value( 'typography' , 'h1_font_font_family' ),
            options::get_value( 'typography' , 'h2_font_font_family' ),
            options::get_value( 'typography' , 'h3_font_font_family' ),
            options::get_value( 'typography' , 'h4_font_font_family' ),
            options::get_value( 'typography' , 'h5_font_font_family' ),
            options::get_value( 'typography' , 'navigation_font_font_family' ),            

        );
        if( options::get_value( 'styling' , 'logo_type' ) == 'text' ) { 
            $settings_fonts[] = options::get_value( 'styling' , 'logo_font_family' );
        }

        foreach ($settings_fonts as $font) {
            if(!empty($font)){
                if(strpos($font, '&v1') === false){
                    $font .= ':100,200,400,700&v1';
                } else{
                     $font .= ':100,200,400,700';
                }
            }
            
            if(!in_array($font, $fonts)){ 
                
                $fonts[] = $font; /*append each font only 1 time*/
            }
        }

        $counter = 1;
        foreach ($fonts as $g_font) {
            if(!empty($g_font)){
                $the_font = str_replace(' ' , '+' , trim( $g_font ) );
                wp_enqueue_style( 'red-gfont-'.$counter, "$protocol://fonts.googleapis.com/css?family=$the_font'" );

            }
            $counter ++;
        }

    }


    function red_get_logo() {
        echo '<div class="logo">';
        if( options::get_value( 'styling' , 'logo_type' ) == 'text' ) { 
            ob_start();
            ob_clean();
            bloginfo('name');
            $blog_name = ob_get_clean();

            echo '<a href="'.home_url().'"><h1>' . $blog_name . '</h1></a>';
                
        }elseif(options::get_value( 'styling' , 'logo_type' ) == 'image' && options::get_value( 'styling' , 'logo_url' ) == '' ){ 
        
            echo '<a href="'.home_url().'">
                    <img src="'.get_template_directory_uri().'/images/logo.png" alt="" />
                </a>';
        }else{
                echo '<a href="'.home_url().'">
                    <img src="'.options::get_value( 'styling' , 'logo_url' ).'" alt="" />
                </a>';
        }
        echo '</div>';
    }

    function get_item_label( $item ){
        $item = basename( $item );
        $item = str_replace( '-' , ' ' , $item );
        return $item;
    }
   
    function get__categories( $nr = -1 ){
        $categories = get_categories();

        $result = array();
        foreach($categories as $key => $category){
            if( $key == $nr ){
                break;
            }
            if( $nr > 0 ){
                $result[ $category -> term_id ] = $category -> term_id;
            }else{
                $result[ $category -> term_id ] = $category -> cat_name;
            }
        }

        return $result;
    }

    function get__pages( $first_label = 'Select item' ){
        $pages = get_pages();
        $result = array();
        if( is_array( $first_label ) ){
            $result = $first_label;
        }else{
            if( strlen( $first_label ) ){
                $result[] = $first_label;
            }
        }
        foreach($pages as $page){
            $result[ $page -> ID ] = $page -> post_title;
        }

        return $result;
    }

    function get__posts( $args = array() , $first_label = 'Select item' ){
        $posts = get_posts( $args );
        $result = array();
        
        if( is_array( $first_label ) ){
            $result = $first_label;
        }else{
            if( strlen( $first_label ) ){
                $result[] = $first_label;
            }
        }
        if( is_array( $posts ) && !empty( $posts ) ){
            foreach( $posts as $post ){
                $result[ $post -> ID  ] = $post -> post_title;
            }
        }

        return $result;
    }

    function menu( $id ,  $args = array() ){

        $menu = new menu( $args );

        $vargs = array(
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => isset( $args['class'] ) ? $args['class'] : '',
            'menu_id'         => '',
            'echo'            => false,
            'fallback_cb'     => '',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'depth'           => 0,
            'walker'          => $menu,
            'theme_location'  => $id ,
        );

        $result = wp_nav_menu( $vargs );

        if(!strlen($result)){

            $result = $menu -> get_terms_menu();
            
            //var_dump($result);
        }

        if( $menu -> need_more &&  $id != 'megusta' ){
                $result .="</li></ul>".$menu -> aftersubm ;
        }
        
        return $result;
    }


           
    if ( ! function_exists( 'clear_meta' ) ) {        
        function clear_meta( $post_id ){

            $resources = array( 'conference' => array( 'sponsor' , 'presentation' , 'exhibitor' )  , 'presentation' => array( 'speaker' )  );
            foreach( $resources as $res => $boxes ){
                $posts = get_posts( array( 'post_type' => $res ));
                foreach( $posts as $post ){
                    foreach( $boxes as $box ){
                        $box_meta = meta::get_meta( $post -> ID , $box );
                        foreach( $box_meta as $index => $meta ){
                            if( $meta['idrecord'] == $post_id ){
                                meta::delete( $res , $box ,  $post -> ID , '' , $index );
                            }
                        }
                    }
                }
            }
        }
    }

    if ( ! function_exists( 'red_breadcrumbs' ) ) { 
    	function red_breadcrumbs() {

          $delimiter = '';
          $home = __('Home','redcodn'); // text for the 'Home' link

          $start_container = '<ul>';
          $end_container = '</ul>';
          $before = '<li>'; // tag before the current crumb
          $after = '</li>'; // tag after the current crumb

          if (  !is_front_page() || is_paged() ) {

            /*echo '<div id="crumbs">';*/

            global $post;
            $homeLink = home_url();
            echo $start_container;
            echo '<li><a href="' . $homeLink . '">' . $home . '</a> </li>' . $delimiter . ' ';

            if ( is_category() ) {
              global $wp_query;
              $cat_obj = $wp_query->get_queried_object();
              $thisCat = $cat_obj->term_id;
              $thisCat = get_category($thisCat);
              $parentCat = get_category($thisCat->parent);
              if ($thisCat->parent != 0) echo($before .get_category_parents($parentCat, TRUE, ' ' . '</li><li>' . ' '). $after);
              echo $before . __('Archive by category','redcodn').' "' . single_cat_title('', false) . '"' . $after;

            } elseif ( is_day() ) {
              echo $before.'<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> '. $after . $delimiter . ' ';
              echo $before.'<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> '. $after . $delimiter . ' ';
              echo $before . get_the_time('d') . $after;

            } elseif ( is_month() ) {
              echo $before . '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> '. $after . $delimiter . ' ';
              echo $before . get_the_time('F') . $after;

            } elseif ( is_year() ) {
              echo $before . get_the_time('Y') . $after;

            } elseif ( is_single() && !is_attachment() ) {
              if ( get_post_type() != 'post' ) {

                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo $before . '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> '. $after . $delimiter . ' ';
                echo $before . get_the_title() . $after;
              } else {
                $cat = get_the_category(); $cat = $cat[0];
                //echo $before . get_category_parents($cat, TRUE, ' ' . '</li><li>' . ' ') . $after;
                echo $before . get_category_parents($cat, TRUE, ' ' ) . $after;
                echo $before . get_the_title() . $after;
              }

            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
              $post_type = get_post_type_object(get_post_type()); 
              if($post_type){
                echo $before . $post_type->labels->singular_name . $after;
              }  

            } elseif ( is_attachment() ) {
              $parent = get_post($post->post_parent);
              /*$cat = get_the_category($parent->ID); $cat = $cat[0];*/
              /*echo $before . get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') . $after;*/
              echo $before . '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> '. $after . $delimiter . ' ';
              echo $before . get_the_title() . $after;

            } elseif ( is_page() && !$post->post_parent ) {
              echo $before . get_the_title() . $after;

            } elseif ( is_page() && $post->post_parent ) {
              $parent_id  = $post->post_parent;
              $breadcrumbs = array();
              while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = $before .'<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>'.$after ;
                $parent_id  = $page->post_parent;
              }
              $breadcrumbs = array_reverse($breadcrumbs);
              foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
              echo $before . get_the_title() . $after;

            } elseif ( is_search() ) {
              echo $before . __('Search results for','redcodn').' "' . get_search_query() . '"' . $after;

            } elseif ( is_tag() ) {
              echo $before . __('Posts tagged','redcodn').' "' . single_tag_title('', false) . '"' . $after;

            } elseif ( is_author() ) {
               global $author;
              $userdata = get_userdata($author);
              echo $before . __('Articles posted by ','redcodn') . $userdata->display_name . $after;

            } elseif ( is_404() ) {
              echo $before . __('Error 404','redcodn') . $after;
            }

            if ( get_query_var('paged') ) {
              if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
              echo __('Page','redcodn') . ' ' . get_query_var('paged');
              if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }

            if(is_home()){
                echo $before . __('Blog','redcodn'). $after;
            }
            echo $end_container;
            /*echo '</div>';*/

          }
        } /* end red_breadcrumbs()*/
    }

    if ( ! function_exists( 'red_get_custom_css' ) ) { 
        function red_get_custom_css() { ?>
            <!--Custom CSS-->
            <?php if( strlen( options::get_value( 'custom_css' , 'css' ) )  > 0 ){ ?>
                <style type="text/css">
                    <?php echo options::get_value( 'custom_css' , 'css' ); ?>    
                </style>

            <?php }  ?>

            <?php if( options::get_value( 'styling' , 'logo_type' ) == 'text' ) {
                $logo_font_family = explode('&',options::get_value('styling' , 'logo_font_family'));
                $logo_font_family = $logo_font_family[0];
                $logo_font_family = str_replace( '+',' ',$logo_font_family );
            ?>
                <style type="text/css">
                    .logo a h1{
                    font-family: '<?php echo $logo_font_family ?>', arial, serif;
                    font-size: <?php echo options::get_value('styling' , 'logo_font_size')?>px;
                    font-weight: <?php echo options::get_value('styling' , 'logo_font_weight')?>;
                }
                </style>
            <?php } ?>


            <?php 
                if( strlen(options::get_value( 'colors' , 'content_color' )) ) {
                    $content_color = options::get_value( 'colors' , 'content_color' );
                } else { 
                    $content_color =''; 
                }

                if( strlen(options::get_value( 'colors' , 'menu_color' )) ) {
                    $menu_link_color = options::get_value( 'colors' , 'menu_color' );
                } else { 
                    $menu_link_color =''; 
                }
                if( strlen(options::get_value( 'colors' , 'menu_color_hover' )) ) {
                    $menu_color_hover = options::get_value( 'colors' , 'menu_color_hover' );
                }else{
                    $menu_color_hover = '';
                }
                if( strlen(options::get_value( 'colors' , 'submenu_color' )) ) {
                    $submenu_color = options::get_value( 'colors' , 'submenu_color' );
                }else{
                    $submenu_color = '';
                }
                if( strlen(options::get_value( 'colors' , 'submenu_color_hover' )) ) {
                    $submenu_color_hover = options::get_value( 'colors' , 'submenu_color_hover' );
                }else{
                    $submenu_color_hover = '';
                }
                if( strlen(options::get_value( 'colors' , 'sticky_menu_bg_color' )) ) {
                    $sticky_menu_bg_color = options::get_value( 'colors' , 'sticky_menu_bg_color' );
                }else{
                    $sticky_menu_bg_color = '';
                }
                if( strlen(options::get_value( 'colors' , 'sticky_menu_text_color' )) ) {
                    $sticky_menu_text_color = options::get_value( 'colors' , 'sticky_menu_text_color' );
                }else{
                    $sticky_menu_text_color = '';
                }
                if( strlen(options::get_value( 'colors' , 'submenu_bg_color' )) ) {
                    $submenu_bg_color = options::get_value( 'colors' , 'submenu_bg_color' );
                }else{
                    $submenu_bg_color = '';
                }
                if( strlen(options::get_value( 'colors' , 'accent_color' )) ) {
                    $accent_color = options::get_value( 'colors' , 'accent_color' );
                }else{
                    $accent_color = '';
                }
                if( strlen(options::get_value( 'colors' , 'thumb_bg_hover' )) ) {
                    $thumb_bg_hover = options::get_value( 'colors' , 'thumb_bg_hover' );
                }else{
                    $thumb_bg_hover = '';
                }
                if( strlen(options::get_value( 'colors' , 'thumb_text_hover' )) ) {
                    $thumb_text_hover = options::get_value( 'colors' , 'thumb_text_hover' );
                }else{
                    $thumb_text_hover = '';
                }
                if( strlen(options::get_value( 'colors' , 'thumb_bg_opacity' )) ) {
                    $thumb_bg_opacity = options::get_value( 'colors' , 'thumb_bg_opacity' );
                }else{
                    $thumb_bg_opacity = '';
                }
                if( strlen(options::get_value( 'colors' , 'links_color' )) ) {
                    $links_color = options::get_value( 'colors' , 'links_color' );
                }else{
                    $links_color = '';
                }
                if( strlen(options::get_value( 'colors' , 'links_hover_color' )) ) {
                    $links_hover_color = options::get_value( 'colors' , 'links_hover_color' );
                }else{
                    $links_hover_color = '';
                }
                if( strlen(options::get_value( 'colors' , 'main_bg_color' )) ) {
                    $main_bg_color = options::get_value( 'colors' , 'main_bg_color' );
                }else{
                    $main_bg_color = '';
                }
                if( strlen(options::get_value( 'colors' , 'main_text_color' )) ) {
                    $main_text_color = options::get_value( 'colors' , 'main_text_color' );
                }else{
                    $main_text_color = '';
                }
                if( strlen(options::get_value( 'header_settings' , 'header_bg_color' )) ) {
                    $header_bg_color = options::get_value( 'header_settings' , 'header_bg_color' );
                }else{
                    $header_bg_color = '';
                }

                if( strlen(options::get_value( 'header_settings' , 'header_content_bgcolor' )) ) {
                    $header_content_bgcolor = options::get_value( 'header_settings' , 'header_content_bgcolor' );
                }else{
                    $header_content_bgcolor = '';
                }

                if( strlen(options::get_value( 'header_settings' , 'header_content_opacity' )) ) {
                    $header_content_opacity = options::get_value( 'header_settings' , 'header_content_opacity' );
                }else{
                    $header_content_opacity = '';
                }

                if( strlen(options::get_value( 'footer_settings' , 'footer_bg_color' )) ) {
                    $footer_bg_color = options::get_value( 'footer_settings' , 'footer_bg_color' );
                }else{
                    $footer_bg_color = '';
                }

                if( strlen(options::get_value( 'footer_settings' , 'footer_text_color' )) ) {
                    $footer_text_color = options::get_value( 'footer_settings' , 'footer_text_color' );
                }else{
                    $footer_text_color = '';
                }

                if (strlen(options::get_value( 'typography' , 'general_font_font_size' ))){
                    $general_font_size = 'font-size:'. options::get_value( 'typography' , 'general_font_font_size' ) . 'px; ';
                }else{ $general_font_size = ''; }
                if (strlen(options::get_value( 'typography' , 'general_font_font_family' ))){
                    $general_font_family = 'font-family: "'. str_replace( '+' , ' ' , rtrim( options::get_value( 'typography' , 'general_font_font_family' )  , '&v1' ) ) . '" !important; ';
                }else{ $general_font_family = ''; }
                if (strlen(options::get_value( 'typography' , 'general_font_font_weight' ))){
                    $general_font_weight = 'font-weight:'. options::get_value( 'typography' , 'general_font_font_weight' ). '; ';
                }else{ $general_font_weight = ''; }

                if (strlen(options::get_value( 'typography' , 'h1_font_font_size' ))){
                    $h1_font_size = 'font-size:'. options::get_value( 'typography' , 'h1_font_font_size' ) . 'px; ';
                }else{ $h1_font_size = ''; }
                if (strlen(options::get_value( 'typography' , 'h1_font_font_family' ))){
                    $h1_font_family = 'font-family: "'. str_replace( '+' , ' ' , rtrim( options::get_value( 'typography' , 'h1_font_font_family' )  , '&v1' ) ) . '" !important; ';
                }else{ $h1_font_family = ''; }
                if (strlen(options::get_value( 'typography' , 'h1_font_font_weight' ))){
                    $h1_font_weight = 'font-weight:'. options::get_value( 'typography' , 'h1_font_font_weight' ). '; ';
                }else{ $h1_font_weight = ''; }

                if (strlen(options::get_value( 'typography' , 'h2_font_font_size' ))){
                    $h2_font_size = 'font-size:'. options::get_value( 'typography' , 'h2_font_font_size' ) . 'px; ';
                }else{ $h2_font_size = ''; }
                if (strlen(options::get_value( 'typography' , 'h2_font_font_family' ))){
                    $h2_font_family = 'font-family: "'. str_replace( '+' , ' ' , rtrim( options::get_value( 'typography' , 'h2_font_font_family' )  , '&v1' ) ) . '" !important; ';
                }else{ $h2_font_family = ''; }
                if (strlen(options::get_value( 'typography' , 'h2_font_font_weight' ))){
                    $h2_font_weight = 'font-weight:'. options::get_value( 'typography' , 'h2_font_font_weight' ). '; ';
                }else{ $h2_font_weight = ''; }

                if (strlen(options::get_value( 'typography' , 'h3_font_font_size' ))){
                    $h3_font_size = 'font-size:'. options::get_value( 'typography' , 'h3_font_font_size' ) . 'px; ';
                }else{ $h3_font_size = ''; }
                if (strlen(options::get_value( 'typography' , 'h3_font_font_family' ))){
                    $h3_font_family = 'font-family: "'. str_replace( '+' , ' ' , rtrim( options::get_value( 'typography' , 'h3_font_font_family' )  , '&v1' ) ) . '" !important; ';
                }else{ $h3_font_family = ''; }
                if (strlen(options::get_value( 'typography' , 'h3_font_font_weight' ))){
                    $h3_font_weight = 'font-weight:'. options::get_value( 'typography' , 'h3_font_font_weight' ). '; ';
                }else{ $h3_font_weight = ''; }

                if (strlen(options::get_value( 'typography' , 'h4_font_font_size' ))){
                    $h4_font_size = 'font-size:'. options::get_value( 'typography' , 'h4_font_font_size' ) . 'px; ';
                }else{ $h4_font_size = ''; }
                if (strlen(options::get_value( 'typography' , 'h4_font_font_family' ))){
                    $h4_font_family = 'font-family: "'. str_replace( '+' , ' ' , rtrim( options::get_value( 'typography' , 'h4_font_font_family' )  , '&v1' ) ) . '" !important; ';
                }else{ $h4_font_family = ''; }
                if (strlen(options::get_value( 'typography' , 'h4_font_font_weight' ))){
                    $h4_font_weight = 'font-weight:'. options::get_value( 'typography' , 'h4_font_font_weight' ). '; ';
                }else{ $h4_font_weight = ''; }

                if (strlen(options::get_value( 'typography' , 'h5_font_font_size' ))){
                    $h5_font_size = 'font-size:'. options::get_value( 'typography' , 'h5_font_font_size' ) . 'px; ';
                }else{ $h5_font_size = ''; }
                if (strlen(options::get_value( 'typography' , 'h5_font_font_family' ))){
                    $h5_font_family = 'font-family: "'. str_replace( '+' , ' ' , rtrim( options::get_value( 'typography' , 'h5_font_font_family' )  , '&v1' ) ) . '" !important; ';
                }else{ $h5_font_family = ''; }
                if (strlen(options::get_value( 'typography' , 'h5_font_font_weight' ))){
                    $h5_font_weight = 'font-weight:'. options::get_value( 'typography' , 'h5_font_font_weight' ). '; ';
                }else{ $h5_font_weight = ''; }

                if (strlen(options::get_value( 'typography' , 'navigation_font_font_size' ))){
                    $navigation_font_size = 'font-size:'. options::get_value( 'typography' , 'navigation_font_font_size' ) . 'px; ';
                }else{ $navigation_font_size = ''; }
                if (strlen(options::get_value( 'typography' , 'navigation_font_font_family' ))){
                    $navigation_font_family = 'font-family: "'. str_replace( '+' , ' ' , rtrim( options::get_value( 'typography' , 'navigation_font_font_family' )  , '&v1' ) ) . '" !important; ';
                }else{ $navigation_font_family = ''; }
                if (strlen(options::get_value( 'typography' , 'navigation_font_font_weight' ))){
                    $navigation_font_weight = 'font-weight:'. options::get_value( 'typography' , 'navigation_font_font_weight' ). '; ';
                }else{ $navigation_font_weight = ''; }


            ?>
                <style type="text/css">
                    <?php
                        if( options::logic( 'styling' , 'background_cover' )  ){ ?>
                        body.custom-background{
                            background-size: cover;
                        }
                    <?php } ?>

                    body, .post-title, .red-list-view article header h2.entry-title a{
                        color: <?php echo $content_color ?>;
                    }
                    a {
                        color: <?php echo $links_color ?>;
                    }
                    a:hover {
                        color: <?php echo $links_hover_color ?>;
                    }
                    .red-list-view article .entry-date a.e-date span:before, .red-grid-view article .entry-content a.e-date span:before, #searchform .button, .red-skill > div > div, .dl-menuwrapper button, .gallery-scroll .thumb, .splitter li a:hover:after, .thumbs-splitter li a:hover:after{
                        background: <?php echo $accent_color ?>;
                    }
                    .splitter li.selected, .thumbs-splitter li.selected, .splitter li:hover, .thumbs-splitter li:hover{
                        border-color: <?php echo $accent_color ?>;
                    }
                    .red-list-view article footer.entry-footer, .red-grid-view article footer.entry-footer{
                        border-color: <?php echo $accent_color ?>;
                    }
                    .ul-sharing li a:hover{
                        color: <?php echo $accent_color ?>;
                    }
                    nav.main-menu > ul > li > a, .main-menu a:link, .main-menu a:visited, .main-menu a:active, .menu-btn .icon-bottom, .socialicons > ul.red-social > li > a, #megaMenu ul.megaMenu > li.menu-item.current-menu-item > a, #megaMenu ul.megaMenu > li.menu-item.current-menu-parent > a, #megaMenu ul.megaMenu > li.menu-item.current-menu-ancestor > a{
                        color: <?php echo $menu_link_color ?>;
                    }
                    #searchform .search-container .input-wrapper input{
                        border-color: <?php echo $menu_link_color ?>;
                    }
                    nav.main-menu > ul > li > a:hover, #megaMenu ul.megaMenu > li.menu-item:hover > a, #megaMenu ul.megaMenu > li.menu-item > a:hover, #megaMenu ul.megaMenu > li.menu-item.megaHover > a, #megaMenu ul.megaMenu > li.menu-item:hover > span.um-anchoremulator, #megaMenu ul.megaMenu > li.menu-item > span.um-anchoremulator:hover, #megaMenu ul.megaMenu > li.menu-item.megaHover > span.um-anchoremulator{
                        color: <?php echo $menu_color_hover ?>;
                    }
                    nav.main-menu > ul > li > ul.children > li a{
                        color: <?php echo $submenu_color ?>;
                    }
                    nav.main-menu ul li ul:before {
                        border-bottom-color: <?php echo $submenu_bg_color; ?>;
                    }
                    nav.main-menu > ul > li > ul.children > li a:hover, #megaMenu ul.megaMenu li.menu-item.ss-nav-menu-mega ul.sub-menu li a:hover, #megaMenu ul li.menu-item.ss-nav-menu-mega ul ul.sub-menu li.menu-item > a:hover{
                        color: <?php echo $submenu_color_hover ?>;
                    }
                    .sf-menu li ul, #megaMenu ul.megaMenu > li.menu-item.ss-nav-menu-mega > ul.sub-menu-1, #megaMenu ul.megaMenu li.menu-item.ss-nav-menu-reg ul.sub-menu{
                        background: <?php echo $submenu_bg_color; ?>;
                    }
                    .featured-area > div.twelve.columns article section .entry-delimiter,
                    .red-grid-view article section .entry-delimiter,
                    .red-list-view article section .entry-delimiter,
                    .red-thumb-view.title-below article h2:after,
                    .featured-slider > div.featured-slider-article article section .entry-delimiter
                    {
                        color: <?php echo $accent_color ?>;
                    }
                    .featured-area article .flex-direction-nav a,
                    .featured-area > div.twelve.columns article .entry-score,
                    .featured-area > div.two.columns article .entry-score,
                    .red-grid-view .entry-score,
                    .red-list-view .entry-score,
                    .featured-slider article .flex-direction-nav a,
                    .featured-slider > div.featured-slider-article article .entry-score,
                    .featured-slider > div.featured-slider-other article .entry-score,
                    .flex-direction-nav a,
                    .post-rating

                    {
                        background: <?php echo $main_bg_color;?>;
                        color: <?php echo $main_text_color;?>;
                    }
                    .red-rating-line{
                        background: <?php echo $main_text_color;?>;
                    }
                    .featured-area > div.twelve.columns article .entry-score:after,
                    .red-grid-view .entry-score:after,
                    .featured-slider > div.featured-slider-article article .entry-score:after,
                    .featured-slider > div.featured-slider-other article .entry-score:after
                    {
                        border-left-color: <?php echo $main_bg_color;?>;
                    }
                    .red-list-view .entry-score:after{
                        border-right-color: <?php echo $main_bg_color;?>;
                    }
                    body, p, .entry-excerpt, .red-list-view article footer.entry-footer .entry-meta, .red-list-view article .entry-date, div, ul li, #searchform input[type="text"], #searchform .button { <?php echo $general_font_size . $general_font_family . $general_font_weight; ?> }
                    h1 { <?php echo $h1_font_size . $h1_font_family . $h1_font_weight; ?> }
                    h2 { <?php echo $h2_font_size . $h2_font_family . $h2_font_weight; ?> }
                    h3 { <?php echo $h3_font_size . $h3_font_family . $h3_font_weight; ?> }
                    h4 { <?php echo $h4_font_size . $h4_font_family . $h4_font_weight; ?> }
                    h5 { <?php echo $h5_font_size . $h5_font_family . $h5_font_weight; ?> }
                    h6 { <?php echo $h4_font_size . $h4_font_family . $h4_font_weight; ?> }
                    .post-navigation > ul > li, .red-contact-form #red-send-msg { <?php echo $h3_font_family; ?> }
                    .widget .tabs-controller li a, .video-post-meta-categories a, .woocommerce ul.cart_list li ins, .woocommerce-page ul.cart_list li ins, .woocommerce ul.product_list_widget li ins, .woocommerce-page ul.product_list_widget li ins, .header-slideshow-elem-content .slide-button{ <?php echo $h5_font_family . $h5_font_weight; ?> }
                    nav.main-menu > ul li a { <?php echo $navigation_font_size . $navigation_font_family . $navigation_font_weight; ?> }
                    #megaMenu ul.megaMenu > li.menu-item > a, #megaMenu ul.megaMenu > li.menu-item > span.um-anchoremulator, .megaMenuToggle, #megaMenu ul li.menu-item.ss-nav-menu-mega ul.sub-menu-1 > li.menu-item > a, #megaMenu ul li.menu-item.ss-nav-menu-mega ul.sub-menu-1 > li.menu-item:hover > a, #megaMenu ul li.menu-item.ss-nav-menu-mega ul ul.sub-menu .ss-nav-menu-header > a, #megaMenu ul li.menu-item.ss-nav-menu-mega ul.sub-menu-1 > li.menu-item > span.um-anchoremulator, #megaMenu ul li.menu-item.ss-nav-menu-mega ul ul.sub-menu .ss-nav-menu-header > span.um-anchoremulator, .wpmega-widgetarea h2.widgettitle, #megaMenu ul li.menu-item.ss-nav-menu-mega ul ul.sub-menu li.menu-item > a, #megaMenu ul li.menu-item.ss-nav-menu-mega ul ul.sub-menu li.menu-item > span.um-anchoremulator, #megaMenu ul ul.sub-menu li.menu-item > a, #megaMenu ul ul.sub-menu li.menu-item > span.um-anchoremulator  { <?php echo $navigation_font_size . $navigation_font_family . $navigation_font_weight; ?>
                    }

                    .share-options li, .box-sharing, .red-button{
                        <?php echo $navigation_font_family; ?>;
                    }
                    header#header {
                        background-color: <?php echo $header_bg_color; ?>;
                    }
                    
                    footer#footer-container {
                        background: <?php echo $footer_bg_color; ?>;
                        color: <?php echo $footer_text_color; ?>;
                    }
                    footer#footer-container a{
                        color: <?php echo $footer_text_color; ?>;
                    }

                    <?php if( options::logic('header_settings', 'header_mask') ): ?>
                    <?php
                        $mask_color = options::logic('header_settings', 'header_mask_color');
                        $mask_color_opacity = options::logic('header_settings', 'header_mask_opacity');
                        $mask_rgb_color = hex2rgb($mask_color);
                        $rgb_color = 'rgba('.$mask_rgb_color.' '. 0.01*(int)$mask_color_opacity. ')';
                    ?>
                    header#header:after {
                        background: <?php echo $rgb_color; ?>;
                        content: "";
                        display: block;
                        height: 100%;
                        left: 0;
                        position: absolute;
                        top: 0;
                        width: 100%;
                        z-index: 0;
                    }
                    <?php endif; ?>
                    .red-grid-view article header .featimg .entry-date, .ilike, .red-list-view article header .featimg .entry-date, .idot{
                        background: <?php echo $main_bg_color;?>;
                        color: <?php echo $main_text_color;?>;
                    }
                    .red-grid-view article section.entry-content h2.entry-title, .red-list-view article section.entry-content h2.entry-title{
                        color: <?php echo $links_color ?>;
                    }
                    .red-grid-view article section.entry-content h2.entry-title span:after, .red-list-view article section.entry-content h2.entry-title span:after{
                        background: <?php echo $links_color ?>;
                    }
                    .ilike:after{
                        box-shadow: 0 0 0 2px <?php echo $main_bg_color;?>;
                    }
                    .single-like .ilike:after{
                        box-shadow: 0 0 0 3px <?php echo $main_bg_color;?>;
                    }
                    .red-grid-view article header .featimg .entry-feat-overlay, .red-list-view article header .featimg .entry-feat-overlay{
                        <?php
                            $thumb_bg_rgba = hex2rgb($thumb_bg_hover) . 0.01*(int)$thumb_bg_opacity;
                        ?>
                        background: rgba(<?php echo $thumb_bg_rgba; ?>);
                        color: <?php echo $thumb_text_hover; ?>;
                    }
                    .red-thumb-view article h2.entry-title{
                        color: <?php echo $thumb_text_hover; ?>;
                    }
                    .ilike, .ilike a{
                        color: <?php echo $main_text_color;?>;
                    }
                    <?php if( options::get_value('header_settings', 'header_content_pages') == 'all' || options::get_value('header_settings', 'header_content_pages') == 'homepage' && is_front_page() ): ?>
                    .header-containe-wrapper{
                        <?php
                            $header_content_bgcolor_rgba = hex2rgb($header_content_bgcolor) . 0.01*(int)$header_content_opacity;
                        ?>
                        background: rgba(<?php echo $header_content_bgcolor_rgba; ?>);
                    }
                    <?php endif; ?>
                    .content-expander, .red-contact-form #red-send-msg, .carousel-wrapper ul.carousel-nav > li, .wp-availability-month table tbody td.wp-availability-booked, .no-post-search{
                        background: <?php echo $main_bg_color;?>;
                        color: <?php echo $main_text_color;?>;
                    }
                    .sticky-menu-container{
                        background: <?php echo $sticky_menu_bg_color; ?>;
                    }
                    .sticky-menu-container .main-menu a{
                        color: <?php echo $sticky_menu_text_color; ?>;;
                    }
                    .scrollbar .handle{
                        background: <?php echo $accent_color ?>;
                    }
                    .widget .tabs-controller li.active a, .widget #comment_form input[type="button"]:hover{
                        border-bottom-color: <?php echo $accent_color ?>;
                    }
                    .no-posts-found .icon-warning, .no-posts-smile{
                        color: <?php echo $accent_color ?>;
                    }
                    .woocommerce-info:before, .woocommerce-message:before{
                        background: <?php echo $main_bg_color;?> !important;
                        color: <?php echo $main_text_color;?> !important;
                    }
                    .woocommerce div.product span.price, .woocommerce-page div.product span.price, .woocommerce #content div.product span.price, .woocommerce-page #content div.product span.price, .woocommerce div.product p.price, .woocommerce-page div.product p.price, .woocommerce #content div.product p.price, .woocommerce-page #content div.product p.price, .woocommerce div.product span.price ins{
                        color: <?php echo $accent_color ?> !important;
                    }
                    .woocommerce .red-grid-view article .add_to_cart_button.button, .woocommerce .red-grid-view article .button.product_type_variable.button, .woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, .gbtr_little_shopping_bag .overview .minicart_total, .woocommerce span.onsale, .woocommerce-page span.onsale{
                        background: <?php echo $main_bg_color;?> !important;
                        color: <?php echo $main_text_color;?> !important;
                    }
                    .scroll-controls .btn:hover{
                        color: <?php echo $accent_color ?>;
                    }
                    h4.red-title-centered:before{
                        border-left-color: <?php echo $accent_color ?>;
                    }
                    h4.red-title-centered:after{
                        border-right-color: <?php echo $accent_color ?>;
                    }
                    .woocommerce ul.cart_list li ins, .woocommerce-page ul.cart_list li ins, .woocommerce ul.product_list_widget li ins, .woocommerce-page ul.product_list_widget li ins{
                        color: <?php echo $accent_color ?> !important;
                    }
                    .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle{
                        background: <?php echo $main_bg_color;?> !important;
                        color: <?php echo $main_text_color;?> !important;
                    }
                    .banner-box-link{
                        background: <?php echo $main_bg_color;?>;
                        color: <?php echo $main_text_color;?>;
                    }
                </style>

        <?php
        }    
    }


    /**
        render social icons
    */
    if ( ! function_exists( 'red_get_social_icons' ) ) { 
        function red_get_social_icons(){
          
            ob_start();
            ob_clean();

            $fb_id = options::get_value( 'social' , 'facebook' );
            if( strlen( trim( $fb_id ) ) ){
                ?>
                <li><a href="<?php echo 'http://facebook.com/people/@/'  . $fb_id ; ?>" target="_blank" class="fb hover-menu"><i class="icon-facebook"></i></a></li>
                <?php
            }

            if( strlen( options::get_value( 'social' , 'twitter' ) ) ){
                ?>
                <li><a href="http://twitter.com/<?php echo options::get_value( 'social' , 'twitter' ) ?>" target="_blank" class="twitter hover-menu"><i class="icon-twitter"></i></a></li>
                <?php
            }
            ?>
            <?php
            if( strlen( options::get_value( 'social' , 'gplus' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'gplus' ) ?>" target="_blank" class="gplus hover-menu"><i class="icon-gplus"></i></a></li>
                <?php
            }
            if( strlen( options::get_value( 'social' , 'yahoo' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'yahoo' ) ?>" target="_blank" class="yahoo hover-menu"><i class="icon-yahoo"></i></a></li>
                <?php
            }
            if( strlen( options::get_value( 'social' , 'dribbble' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'dribbble' ) ?>" target="_blank" class="dribbble hover-menu"><i class="icon-dribbble"></i></a></li>
                <?php
            }
            if( strlen( options::get_value( 'social' , 'linkedin' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'linkedin' ) ?>" target="_blank" class="linkedin hover-menu"><i class="icon-linkedin"></i></a></li>
                <?php
            }

            if( strlen( options::get_value( 'social' , 'vimeo' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'vimeo' ) ?>" target="_blank" class="vimeo hover-menu"><i class="icon-vimeo"></i></a></li>
                <?php
            }
            
            if( strlen( options::get_value( 'social' , 'youtube' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'youtube' ) ?>" target="_blank" class="yt hover-menu"><i class="icon-youtube"></i></a></li>
                <?php
            }
            
            if( strlen( options::get_value( 'social' , 'tumblr' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'tumblr' ) ?>" target="_blank" class="tumblr hover-menu"><i class="icon-tumblr"></i></a></li>
                <?php
            }
            
            if( strlen( options::get_value( 'social' , 'delicious' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'delicious' ) ?>" target="_blank" class="delicious hover-menu"><i class="icon-delicious"></i></a></li>
                <?php
            }
            
            if( strlen( options::get_value( 'social' , 'flickr' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'flickr' ) ?>" target="_blank" class="flickr hover-menu"><i class="icon-flickr"></i></a></li>
                <?php
            }

            if( strlen( options::get_value( 'social' , 'instagram' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'instagram' ) ?>" target="_blank" class="instagram hover-menu"><i class="icon-instagram"></i></a></li>
                <?php
            }

            if( strlen( options::get_value( 'social' , 'pinterest' ) ) ){
                ?>
                <li><a href="<?php echo options::get_value( 'social' , 'pinterest' ) ?>" target="_blank" class="pinterest hover-menu"><i class="icon-pinterest"></i></a></li>
                <?php
            }
            
            if( strlen( options::get_value( 'social' , 'skype' ) ) ){
                ?>
                <li><a href="skype:<?php echo options::get_value( 'social' , 'skype' ) ?>?call" target="_blank" class="skype hover-menu"><i class="icon-skype"></i></a></li>
                <?php
            }

            if( strlen( options::get_value( 'social' , 'email' ) ) ){
                ?>
                <li><a href="mailto:<?php echo options::get_value( 'social' , 'email' ); ?>" target="_blank" class="email hover-menu"><i class="icon-email"></i></a></li>
                <?php
            }

            if( options::logic( 'social' , 'rss' ) ){
                ?>
                <li><a href="<?php bloginfo('rss2_url'); ?>" class="rss hover-menu"><i class="icon-rss"></i></a></li>
                <?php
            }

            $social_icons_content = ob_get_clean();

            if(strlen(trim($social_icons_content))){
            ?>    
                <div class="socialicons">
                    <ul class="red-social">
                        <?php echo $social_icons_content; ?>
                    </ul>
                </div>
            <?php
            }
            
        }
    }

    /**
        render attached images gallery
    */
    if ( ! function_exists( 'red_get_post_img_slideshow' ) ) { 
        function red_get_post_img_slideshow($post_id, $size="gallery_format_slider"){

            /*check the meta data where the attached image ids are stored*/

            if ( metadata_exists( 'post', $post_id, '_post_image_gallery' ) ) {

                $product_image_gallery = get_post_meta( $post_id, '_post_image_gallery', true );

                $img_id_array = array_filter( explode( ',', $product_image_gallery ) );
            }

            
            if(isset($img_id_array) && is_array($img_id_array)){
                foreach ($img_id_array as $value) {
                    $attachments[$value] = $value; // create attachments array in hte format that will work for us                    
                }
            }

            
            
            if(isset($attachments) && count($attachments) > 0){
                $pretty_colection_id = mt_rand(0,9999);
                if($size== "gallery_format_slider"){
                    $images_to_show_first = 99999;
                }else{
                    $images_to_show_first = 5;
                }
                
                $additional_items = ''; /*in this string we will store the images that are left after loading the number of images defined in $images_to_show_first var*/
                $counter = 0; ?>
                <div class="gallery-scroll">
                            <ul class="gallery-list">
                <?php 
                foreach($attachments as $att_id => $attachment) {
                    $full_img_url = wp_get_attachment_url($att_id);

                    if ( wp_is_mobile() ) {
                        $thumbnail_url = aq_resize( $full_img_url, 9999, 150, false, false ); //resize img, Return an array containing url, width, and height.
                    } else {
                        $thumbnail_url = aq_resize( $full_img_url, 9999, 500, false, false ); //resize img, Return an array containing url, width, and height.
                    }

                    //$thumbnail_url= wp_get_attachment_image_src( $att_id, $size);
                    
                    
                    if($counter < $images_to_show_first){
                        $src = $thumbnail_url[0]; // for the first X images we will give original img src
                    }else{
                        $src = get_template_directory_uri().'/images/grey.gif';  // for the rest of the images we will load a 1px image to not load the page
                    }

                    //$caption    = image::caption( $att_id );
                    $attachment_info = get_post($att_id); //deb::e($attachment_info );
                    $caption = $attachment_info->post_excerpt;


            ?>                                 
                                <li class="gallery-slide">
                                    <img src="<?php echo $src; ?>"  data-original="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $caption; ?>" data-width="<?php echo $thumbnail_url[1]; ?>" data-height="<?php echo $thumbnail_url[2]; ?>" />                               
                                    <?php if( options::logic( 'blog_post' , 'enb_lightbox' )){ ?>
                                    <div class="zoom-image">
                                        <a href="<?php echo $full_img_url; ?>" data-rel="prettyPhoto[<?php echo $pretty_colection_id; ?>]" title="">&nbsp;</a>
                                    </div>
                                    <?php } ?>
                                </li>

                             <?php } ?>
                            </ul>
                            <div class="preloader"></div>
                </div>
                <div class="scroll-controls">
                    <div class="btn prev icon-prev"></div>
                    <div class="btn next icon-next"></div>
                </div>
                <div class="row">
                    <div class="twelve columns">
                        <div class="scrollbar">
                            <div class="handle">
                                <div class="mousearea"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php }    
        }
    }
    /**
        render attached images gallery
    */
    if ( ! function_exists( 'red_get_flex_post_img_slideshow' ) ) { 
        function red_get_flex_post_img_slideshow($post_id, $size="grid_big"){

            /*check the meta data where the attached image ids are stored*/

            if ( metadata_exists( 'post', $post_id, '_post_image_gallery' ) ) {

                $product_image_gallery = get_post_meta( $post_id, '_post_image_gallery', true );

                $img_id_array = array_filter( explode( ',', $product_image_gallery ) );
            }

            
            if(isset($img_id_array) && is_array($img_id_array)){
                foreach ($img_id_array as $value) {
                    $attachments[$value] = $value; // create attachments array in hte format that will work for us                    
                }
            }

            
            
            if(isset($attachments) && count($attachments) > 0){
                $pretty_colection_id = mt_rand(0,9999);
                if($size== "gallery_format_slider"){
                    $images_to_show_first = 99999;
                }else{
                    $images_to_show_first = 5;
                }
                
                $additional_items = ''; /*in this string we will store the images that are left after loading the number of images defined in $images_to_show_first var*/
                $counter = 0; ?>
                <div class="flexslider">
                    <ul class="flex-gallery-list slides">
                        <?php 
                            foreach($attachments as $att_id => $attachment) {
                                $full_img_url = wp_get_attachment_url($att_id);

                                $thumbnail_url = aq_resize( $full_img_url, get_aqua_size($size), get_aqua_size($size, 'height'), false, false ); //resize img, Return an array containing url, width, and height.

                                //$thumbnail_url= wp_get_attachment_image_src( $att_id, $size);
                                
                                
                                if($counter < $images_to_show_first){
                                    $src = $thumbnail_url[0]; // for the first X images we will give original img src
                                }else{
                                    $src = get_template_directory_uri().'/images/grey.gif';  // for the rest of the images we will load a 1px image to not load the page
                                }

                                //$caption    = image::caption( $att_id );
                                $attachment_info = get_post($att_id); //deb::e($attachment_info );
                                $caption = $attachment_info->post_excerpt;


                        ?>                                 
                                <li class="flex-slide">
                                    <img src="<?php echo $src; ?>"  data-original="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $caption; ?>" data-width="<?php echo $thumbnail_url[1]; ?>" data-height="<?php echo $thumbnail_url[2]; ?>" />                               
                                    <?php if( options::logic( 'blog_post' , 'enb_lightbox' )){ ?>
                                    <div class="zoom-image">
                                        <a href="<?php echo $full_img_url; ?>" data-rel="prettyPhoto[<?php echo $pretty_colection_id; ?>]" title="">&nbsp;</a>
                                    </div>
                                    <?php } ?>
                                </li>

                             <?php } ?>
                    </ul>
                </div>
            <?php }    
        }
    }

    /**
        render attached images gallery
    * params:
    * int - $post_id - the ID of the post for which we wsant to retrieve the categories
    * bool - $only_first_cat - return only first categ or all of them
    * string - $taxonomy - the name of the wanted taxonomy, 'category' by default , other values may be 'post_tag' for standard posts or something ele for custom posts
    * string - $margin_elem_start  -  it shuld be a html element that will show up before each category
    * string - $margin_elem_end  -  it shuld be a html element that will show up after each category 
    * string - $delimiter  -  the string between the taxonomies   
    * string - $a_class  -  the class that is used for the anchor that surrounds the taxonomies   
    * string - $no_link - use or not links around the taxonomies
    */
    if ( ! function_exists( 'red_get_post_taxonomies' ) ) {
        function red_get_post_taxonomies($post_id, $only_first_cat = false, $taxonomy = 'category', $margin_elem_start = '', $margin_elem_end = '', $delimiter = ', ',  $a_class = '', $no_link = false){

            
                            
            $cat = '';
            $categories = wp_get_post_terms($post_id, $taxonomy );
            if (!empty($categories)) {
                
                $ind = 1;
                foreach ($categories as $category) {
                    $categ = get_category($category);
                    if($ind != count($categories) && !$only_first_cat){
                        $cat_delimiter = $delimiter;   
                    }else{
                        $cat_delimiter = '';   
                    }

                    if($no_link){
                        $cat .= $margin_elem_start . $categ->name . $cat_delimiter  . $margin_elem_end;
                    }else{
                        $cat .= $margin_elem_start . '<a href="' . get_category_link($category) . '" class="'.$a_class.'">' . $category->name . $cat_delimiter . '</a>' . $margin_elem_end;    
                    }
                    
                    
                    if($only_first_cat){
                        break;    
                    }
                    

                    $ind ++;
                }
                
                
                //$cat = __('in','redcodn').' '.   $cat;   
            }
                            
              return $cat .' ' ;
        }
    }


    /**
        render a gallery single slideshow
    * params:
    * int - $post_id - the ID of the post for which we want to retrieve the post format
    */
    if ( ! function_exists( 'up_grid_gallery' ) ) { 
        function up_grid_gallery($post_id, $size="gallery_format_slider"){

            /*check the meta data where the attached image ids are stored*/

            if ( metadata_exists( 'post', $post_id, '_post_image_gallery' ) ) {

                $product_image_gallery = get_post_meta( $post_id, '_post_image_gallery', true );

                $img_id_array = array_filter( explode( ',', $product_image_gallery ) );
            }

            
            if(isset($img_id_array) && is_array($img_id_array)){
                foreach ($img_id_array as $value) {
                    $attachments[$value] = $value; // create attachments array in hte format that will work for us                    
                }
            }

            
            
            if(isset($attachments) && count($attachments) > 0){
                $pretty_colection_id = mt_rand(0,9999);
                if($size== "gallery_format_slider"){
                    $images_to_show_first = 99999;
                }else{
                    $images_to_show_first = 5;
                }
                
                $additional_items = ''; /*in this string we will store the images that are left after loading the number of images defined in $images_to_show_first var*/
                $counter = 0; ?>
                <div id="gal-grid" class="gallery-grid">
                    <ul class="gallery-list">
                        <?php 
                        foreach($attachments as $att_id => $attachment) {
                            $full_img_url = wp_get_attachment_url($att_id);

                            $thumbnail_url = aq_resize( $full_img_url, get_aqua_size($size), get_aqua_size($size, 'height'), false, false ); //resize img, Return an array containing url, width, and height.

                            //$thumbnail_url= wp_get_attachment_image_src( $att_id, $size);
                            
                            
                            if($counter < $images_to_show_first){
                                $src = $thumbnail_url[0]; // for the first X images we will give original img src
                            }else{
                                $src = get_template_directory_uri().'/images/grey.gif';  // for the rest of the images we will load a 1px image to not load the page
                            }

                            //$caption    = image::caption( $att_id );
                            $attachment_info = get_post($att_id); //deb::e($attachment_info );
                            $caption = $attachment_info->post_excerpt;


                    ?>                                 
                        <li class="">
                            <img src="<?php echo $src; ?>"  data-original="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $caption; ?>" data-width="<?php echo $thumbnail_url[1]; ?>" data-height="<?php echo $thumbnail_url[2]; ?>" />                               
                            <?php if( options::logic( 'blog_post' , 'enb_lightbox' )){ ?>
                            <div class="zoom-image">
                                <a href="<?php echo $full_img_url; ?>" data-rel="prettyPhoto[<?php echo $pretty_colection_id; ?>]" title="">&nbsp;</a>
                            </div>
                            <?php } ?>
                        </li>

                     <?php } ?>
                    </ul>
                </div>
            <?php }    
        }
    }

    /**
        render a gallery single slideshow
    * params:
    * int - $post_id - the ID of the post for which we want to retrieve the post format
    */
    if ( ! function_exists( 'up_fotorama_gallery' ) ) { 
        function up_fotorama_gallery($post_id, $size="gallery_format_slider"){

            /*check the meta data where the attached image ids are stored*/

            if ( metadata_exists( 'post', $post_id, '_post_image_gallery' ) ) {

                $product_image_gallery = get_post_meta( $post_id, '_post_image_gallery', true );

                $img_id_array = array_filter( explode( ',', $product_image_gallery ) );
            }

            
            if(isset($img_id_array) && is_array($img_id_array)){
                foreach ($img_id_array as $value) {
                    $attachments[$value] = $value; // create attachments array in hte format that will work for us                    
                }
            }

            
            
            if(isset($attachments) && count($attachments) > 0){
                $pretty_colection_id = mt_rand(0,9999);
                if($size== "gallery_format_slider"){
                    $images_to_show_first = 99999;
                }else{
                    $images_to_show_first = 5;
                }
                
                $additional_items = ''; /*in this string we will store the images that are left after loading the number of images defined in $images_to_show_first var*/
                $counter = 0; ?>
                <div class="gallery-fotorama fotorama" data-width="100%" data-maxheight="100%" data-nav="thumbs" data-keyboard="true" data-allowfullscreen="native">
                        <?php 
                        foreach($attachments as $att_id => $attachment) {
                            $full_img_url = wp_get_attachment_url($att_id);

                            $thumbnail_url = aq_resize( $full_img_url, get_aqua_size($size), get_aqua_size($size, 'height'), false, false ); //resize img, Return an array containing url, width, and height.

                            //$thumbnail_url= wp_get_attachment_image_src( $att_id, $size);
                            
                            
                            if($counter < $images_to_show_first){
                                $src = $thumbnail_url[0]; // for the first X images we will give original img src
                            }else{
                                $src = get_template_directory_uri().'/images/grey.gif';  // for the rest of the images we will load a 1px image to not load the page
                            }

                            //$caption    = image::caption( $att_id );
                            $attachment_info = get_post($att_id); //deb::e($attachment_info );
                            $caption = $attachment_info->post_excerpt;


                    ?>                                 
                                <img src="<?php echo $src; ?>"  data-original="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $caption; ?>" data-width="<?php echo $thumbnail_url[1]; ?>" data-height="<?php echo $thumbnail_url[2]; ?>" />
                     <?php } ?>
                </div>
            <?php }    
        }
    }

    /**
        render a gallery single slideshow
    * params:
    * int - $post_id - the ID of the post for which we want to retrieve the post format
    */
    if ( ! function_exists( 'up_list_gallery' ) ) { 
        function up_list_gallery($post_id, $size="gallery_format_slider"){

            /*check the meta data where the attached image ids are stored*/

            if ( metadata_exists( 'post', $post_id, '_post_image_gallery' ) ) {

                $product_image_gallery = get_post_meta( $post_id, '_post_image_gallery', true );

                $img_id_array = array_filter( explode( ',', $product_image_gallery ) );
            }

            
            if(isset($img_id_array) && is_array($img_id_array)){
                foreach ($img_id_array as $value) {
                    $attachments[$value] = $value; // create attachments array in hte format that will work for us                    
                }
            }

            
            
            if(isset($attachments) && count($attachments) > 0){
                $pretty_colection_id = mt_rand(0,9999);
                if($size== "gallery_format_slider"){
                    $images_to_show_first = 99999;
                }else{
                    $images_to_show_first = 5;
                }
                
                $additional_items = ''; /*in this string we will store the images that are left after loading the number of images defined in $images_to_show_first var*/
                $counter = 0; ?>
                <div class="row">
                    <div class="twelve columns">
                        <div class="gallery-list">
                            <ul>
                                <?php 
                                foreach($attachments as $att_id => $attachment) {
                                    $full_img_url = wp_get_attachment_url($att_id);

                                    $thumbnail_url = aq_resize( $full_img_url, 1200, 1200, true, false ); //resize img, Return an array containing url, width, and height.

                                    //$thumbnail_url= wp_get_attachment_image_src( $att_id, $size);
                                    
                                    
                                    if($counter < $images_to_show_first){
                                        $src = $thumbnail_url[0]; // for the first X images we will give original img src
                                    }else{
                                        $src = get_template_directory_uri().'/images/grey.gif';  // for the rest of the images we will load a 1px image to not load the page
                                    }

                                    //$caption    = image::caption( $att_id );
                                    $attachment_info = get_post($att_id); //deb::e($attachment_info );
                                    $caption = $attachment_info->post_excerpt;
                            ?>                                 
                                        <li class="">
                                            <img src="<?php echo $src; ?>"  data-original="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $caption; ?>" data-width="<?php echo $thumbnail_url[1]; ?>" data-height="<?php echo $thumbnail_url[2]; ?>" />                               
                                            <?php if( options::logic( 'blog_post' , 'enb_lightbox' )){ ?>
                                            <div class="zoom-image">
                                                <a href="<?php echo $full_img_url; ?>" data-rel="prettyPhoto[<?php echo $pretty_colection_id; ?>]" title="">&nbsp;</a>
                                            </div>
                                            <?php } ?>
                                        </li>
                             <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php }    
        }
    }

    /**
        render a link to the post's post format archive, the link has a specific class depending on hte post format
    * params:
    * int - $post_id - the ID of the post for which we want to retrieve the post format
    */
    
if ( ! function_exists( 'red_get_post_format_link' ) ) {
    function red_get_post_format_link($post_id){
        
        $result = '';    
        $format = get_post_format( $post_id );
        $format_link = get_post_format_link($format);
        if(!strlen($format_link)){
            $format_link = "javascript:void(0);";
        }

        switch ($format) {
            case 'video':
                $result .= '<a class="entry-format" href="'.$format_link.'"><i class="icon-video"></i></a>';
                break;
            case 'image':
                $result .= '<a class="entry-format" href="'.$format_link.'"><i class="icon-image"></i></a>';
                break;
            case 'audio':
                $result .= '<a class="entry-format" href="'.$format_link.'"><i class="icon-audio"></i></a>';
                break;
            case 'link':
                $result .= '<a class="entry-format" href="'.$format_link.'"><i class="icon-attachment"></i></a>';
                break;    
            case 'gallery':
                $result .= '<a class="entry-format" href="'.$format_link.'"><i class="icon-gallery"></i></a>';
                break;  
            case 'quote':
                $result .= '<a class="entry-format" href="'.$format_link.'"><i class="icon-quote"></i></a>';
                break;                            
            default:
                $result .= '<a class="entry-format" href="'.$format_link.'"><i class="icon-standard"></i></a>';
                break;
        }
        
        return $result;
    }
}



/**
    retrieves the post date in the format specified in the theme settings
* params:
* int - $post_id - the ID of the post for which we want to retrieve the post format
*/
    
if ( ! function_exists( 'red_get_post_date' ) ) {
    function red_get_post_date($post_id){
        if (options::logic('blog_post', 'time')) {
             $post_date = human_time_diff(get_the_time('U', $post_id), current_time('timestamp')) . ' ' . __('ago', 'redcodn'); 
        } else {
            $post_date = __('on','redcodn'). ' '.date_i18n(get_option('date_format'), get_the_time('U', $post_id)); 
        }

        return $post_date .' ';
    }
}
    

/**
check if a given string is a valid URL
*/
if ( ! function_exists( 'red_isValidURL' ) ) {
    function red_isValidURL($url){
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
    }
}

/**
render post meta
*/
if ( ! function_exists( 'red_post_meta' ) ) {
    function red_post_meta( $post ) {
        global $wp_query;        
    ?>  
        <div class="post-meta-container">
            <ul class="post-meta">
                <li><?php echo red_get_post_date($post -> ID); ?></li>
                <li><a href="<?php echo get_author_posts_url($post->post_author) ?>">
                        <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                    </a>
                </li>

                <?php
                    if (comments_open($post->ID)) {
                        $comments_label = __('comments','redcodn');  
                        if (options::logic('blog_post', 'fb_comments')) {
                            ?><li class="meta-elem red-comments" title=""><a href="<?php echo get_comments_link($post->ID); ?>"> <fb:comments-count href="<?php echo get_permalink($post->ID) ?>"></fb:comments-count> <?php echo $comments_label; ?></a></li><?php
                        } else {
                            
                            if(get_comments_number($post->ID) == 1){
                                $comments_label = __('comment','redcodn');
                            }
                            ?><li class="meta-elem red-comments" title="<?php echo get_comments_number($post->ID); echo ' '.$comments_label; ?>"><a href="<?php echo get_comments_link($post->ID) ?>"> <?php echo get_comments_number($post->ID) . ' ' . $comments_label ?> </a></li><?php
                        }
                    }
                ?>
                <li class="thelike">
                    <?php echo like::content($post->ID,$return = false, $additional_class = '', $show_label = true);  ?>
                </li>

                <?php if(!is_page()) { ?>
                <?php
                $tags = wp_get_post_terms($post->ID, 'post_tag');

                if (!empty($tags)) {
                    ?>
                <li class="meta-elem">
                    
                        <i class="icon-tag"></i>
                        <ul class="b_tag">
                            <?php
                         
                                echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'post_tag', $margin_elem_start = '<li>', $margin_elem_end = '</li> ', $delimiter = ','); 

                            ?>
                        </ul>
                       
                </li>
                <?php } ?>
                <li class="meta-elem">
                    <?php
                    $categories = wp_get_post_terms($post->ID, 'category');
                    if (!empty($categories)) {
                        ?>
                        <i class="icon-category"></i>
                        <ul class="category">
                            <?php                         
                                echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'category', $margin_elem_start = '<li>', $margin_elem_end = '</li> ', $delimiter = ','); 
                            ?>
                        </ul>
                        <?php
                    }
                    ?>
                </li>
                <?php } ?>

            </ul>
        </div>

    <?php
    }
}


/**
red loop
*/
if ( ! function_exists( 'red_loop' ) ) {
    function red_loop($template, $column_class = 'nine columns', $side = '') {     
        global $wp_query, $massonry_class;  

        $enable_massonry = false;
        

        if ($template == 'blog_page') {
            $view_type = options::get_value('content_settings', 'blog_listing_layout');
        }else{
            $view_type = options::get_value('content_settings', 'archive_listing_layout');
        }
        if ( count( $wp_query->posts) > 0 ) { 
            
            if ($view_type == 'grid') { 
                
            ?>              
            <div class="red-grid-view <?php if(layout::length(0, $template) != layout::$size['large']) { echo layout::length(0, $template); } else { echo 'row'; } ?>">

                <?php if(layout::length(0, $template) != layout::$size['large']) { echo '<div class="row'.$masonry_enabled_on_row.'">';}?>
                <?php 

                
                foreach ($wp_query->posts as $index => $post) {
                    $wp_query->the_post();         
                    get_template_part( 'redshortcodes/red-grid-view' ); 
                }
                if(layout::length(0, $template) != layout::$size['large']) { echo '</div>';}

                ?> 
                
            </div>
        <?php 
                get_template_part('pagination');
            } elseif($view_type == 'list'){
                
            ?> 
            <div class="red-list-view <?php if(layout::length(0, $template) != layout::$size['large']) { echo layout::length(0, $template); } else { echo 'row'; } ?>">
                <?php if(layout::length(0, $template) != layout::$size['large']) { echo '<div class="row">';}?>
                <?php  

                foreach ($wp_query->posts as $index => $post) {
                    $wp_query->the_post();         
                    get_template_part( 'redshortcodes/red-list-view' ); 
                }
                if(layout::length(0, $template) != layout::$size['large']) { echo '</div>';}

                get_template_part('pagination');
                ?> 
                
            </div>
        <?php } elseif($view_type == 'thumb'){ 

            ?> 
            <div class="red-thumb-view <?php if(layout::length(0, $template) != layout::$size['large']) { echo layout::length(0, $template); } else { echo 'row'; }  ?>">
                <?php if(layout::length(0, $template) != layout::$size['large']) { echo '<div class="row">';}?>
                <?php    

                
                foreach ($wp_query->posts as $index => $post) {
                    $wp_query->the_post();         
                    get_template_part( 'redshortcodes/red-thumb-view' ); 
                }
                if(layout::length(0, $template) != layout::$size['large']) { echo '</div>';}
                ?> 
                
            </div>
        <?php 
                get_template_part('pagination');
            }

            wp_reset_postdata();  /* Restore original Post Data */
        } else {
            get_template_part('loop', '404');
        }
    }
}

    
/**
* Title     : Aqua Resizer
* Description   : this function will return the image size that will be passed to aq_resize function
* 
*
* @param    string $size_name - (required) the name of the size option, for example 'single_cropped'
* @param    int $width_or_height - (not required) specifyes what demention we want to get, the width or the height of the image (default - width)
* 
* @return str|array
*****/

function get_aqua_size($size_name, $width_or_height = 'width'){
    
    $result = options::get_value( 'imagesizes' , $size_name.'_'.$width_or_height );
    
    if(is_numeric($result)){
       return $result; 
    }else{
        /*if the omption is empty or not numeric for some reason, we return the default*/
        return options::$default['imagesizes'][$size_name.'_'.$width_or_height];
    }
}

/**
* Description   : this function will return the class name for the blocks depending on the input (number of columns we want to have)
* 
*
* @param    int $arabic - number of columns we want to have
* 
* @return str
*****/
if ( ! function_exists( 'red_columns_arabic_to_chars' ) ) {
    function red_columns_arabic_to_chars( $arabic ){
        $words_full_width = array( 0 => 'twelve', 1 => 'twelve', 2 => 'six', 3 => 'four', 4 => 'three', 5 => 'three', 6 => 'two', 7 => 'two', 8 => 'one', 9 => 'one', 10 => 'one', 11 => 'one', 12 => 'one' );
        return $words_full_width[ $arabic ];
    }
}

/**
Load more
*/
if ( ! function_exists( 'red_load_more' ) ) {
    /*used for infinit scrolling - it appends content when the users is viewing the end of the current existing content*/
    function red_load_more(){
        $response = array();
        if(isset($_POST['getMoreNonce'])){
            $nonce = $_POST['getMoreNonce'];

            // check to see if the submitted nonce matches with the
            // generated nonce we created earlier
            if ( ! wp_verify_nonce( $nonce, 'myajax-getMore-nonce' ) )
                die ( 'Busted! Wrong Nonce');
                

            
            if(isset($_POST['current_page']) && is_numeric($_POST['current_page'])){
                $current_page = $_POST['current_page'] + 1;
            }else{
                $current_page = 2;
            }   

            if(isset($_POST['is_front_page']) && $_POST['is_front_page'] == 1){
                $is_front_page = true;
            }else{
                $is_front_page = false;
            }

            $query = array();

            if(isset( $_POST['the_current_query'] ) && !empty( $_POST['the_current_query'] )){
                /*get the query passed via ajax*/
                $query = (array)json_decode( stripslashes (urldecode( $_POST['the_current_query']) ) );
            }

            $query['post_status'] = 'publish';
            $query['post_type'] = 'post';
            $query['paged'] = $current_page; /*update the current retrieved page*/

            $wp_query = new WP_Query( $query );
            
            ob_start();
            ob_clean();

            foreach ($wp_query->posts as $index => $post) {
                $wp_query->the_post();
                
                get_template_part( 'redshortcodes/red-thumb-view' ); 
            }

                
                
            $more_content = ob_get_clean();

            $response['post_count'] = $wp_query -> post_count;
            if(strlen(trim($more_content))){
                $response['content'] = $more_content;
            }else{
                $response['content'] = '';    
            }                        
            
        }
        
        echo json_encode($response);
        exit;    
    }

}

    if ( ! function_exists( 'hex2rgb' ) ) {
        function hex2rgb($hex) {
           $hex = str_replace("#", "", $hex);

           if(strlen($hex) == 3) {
              $r = hexdec(substr($hex,0,1).substr($hex,0,1));
              $g = hexdec(substr($hex,1,1).substr($hex,1,1));
              $b = hexdec(substr($hex,2,1).substr($hex,2,1));
           } else {
              $r = hexdec(substr($hex,0,2));
              $g = hexdec(substr($hex,2,2));
              $b = hexdec(substr($hex,4,2));
           }
           //$rgb = array($r, $g, $b);
           $rgb = $r.','. $g.','. $b.', ';

           //return implode(",", $rgb); // returns the rgb values separated by commas
           return $rgb; // returns an array with the rgb values
        }
    }

    /**
    red_get_post_types_hc 
    */
    if ( ! function_exists( 'red_get_post_types_hc' ) ) {
    /**
    * Description   : this function will return an array of registered custom post types
    *       
    * @return array
    *****/
        function red_get_post_types_hc(){
            //of course it can be done via get_post_types, but for some reason it return only posts and pages, and no custom posts, and we have to hardcode this shit


            return array( 'post' => __('Post','redcodn'), 'video' => __('Video','redcodn'), 'gallery' => __('Gallery','redcodn'), 'portfolio' => __('Portfolio','redcodn') );
        }
    }
    /**
    red_get_post_types_hc 
    */
    if ( ! function_exists( 'red_get_gallery_posts' ) ) {
    /**
    * Description   : this function will return an array of registered custom post types
    *       
    * @return array
    *****/
        function red_get_gallery_posts(){
            //of course it can be done via get_post_types, but for some reason it return only posts and pages, and no custom posts, and we have to hardcode this shit

            $loop = new WP_Query( array( 'post_type' => 'gallery', 'posts_per_page' => -1 ) );

            while ( $loop->have_posts() ) : $loop->the_post();
                $idGallery = get_the_ID();
                $titleGallery = get_the_title();
                $galleries[$idGallery] = $titleGallery;
            endwhile;
            return $galleries;
        }
    }


    /**
    maybe_red_ajax 
    */
    if ( ! function_exists( 'maybe_red_ajax' ) ) {
    /**
    * Description   : this function will return speciall attributes for anchors, that will allow us to load content via ajax
    * 
    * params: 
    * Object - $post       
    * @return string
    *****/
        function maybe_red_ajax($post, $ajax_container = 'red-ajax-box', $need_class = true){
            if( options::logic( 'blog_post' , 'load_via_ajax' ) && is_singular() && !is_page_template('latest-videos.php') && !wp_is_mobile() ){ // if loading preview via ajax is enabled
                if($need_class){
                    $class =  'class="ajax-preview"';
                }else{
                    $class = '';
                }

                return 'data-post-id="'.$post->ID.'" '.$class.' data-ajax-container="'.$ajax_container.'"';
            }else{
                return '';
            }
        }
    }

    if ( ! function_exists( 'red_load_preview' ) ) {
    /**
    * Description   : this function will return the preview content for a given post
    * 
    * params: 
    * None
    *      
    * @return string
    *****/
        function red_load_preview(){
            if(isset($_POST['ajaxPreviewNonce']) && isset($_POST['post_id'])){
                // check to see if the submitted nonce matches with the
                // generated nonce we created earlier
                if ( ! wp_verify_nonce( $_POST['ajaxPreviewNonce'], 'ajax-Preview-nonce' ) ){
                    die ( 'Busted! Wrong Nonce');
                }
                    
                global $ajax_post_id;

                $ajax_post_id = $_POST['post_id'];
                 get_template_part('preview-content-ajax');


            }

            exit();
        }
    }
    
    if ( ! function_exists( 'red_get_prev_next_elem' ) ) {
    /**
    * Description   : this function will return the the next and prev siblings of the given element from an string
    * 
    * params: 
    * $haystack -  string of elements separated by comma  where we are looking for our values
    * $current_elem - string, the current element for which we need the siblings      
    * @return array that contains next and prev elem
    *****/    
        function red_get_prev_next_elem($haystack, $current_elem){
            $haystack_array = explode(",",$haystack);

            $current_key = array_search ( $current_elem , $haystack_array );

            if(isset($haystack_array[$current_key-1])){
                $siblings['previous'] = $haystack_array[$current_key-1];
            }else{
                $siblings['previous'] = 0;
            }

            if(isset($haystack_array[$current_key+1])){
                $siblings['next'] = $haystack_array[$current_key+1];
            }else{
                $siblings['next'] = 0;
            }

            return $siblings;
        }
    }


    if ( ! function_exists( 'red_get_distinct_post_terms' ) ) {
        /*
            Returns distinct taxonomies for a given post, or nothig if nothing found.
        */
        function red_get_distinct_post_terms($post_id, $taxonomy, $return_names = false, $filter_type = '' ){
            
            $ids = array();
            $names = '';

            $terms = wp_get_post_terms( $post_id , $taxonomy );

            if(is_array($terms)){
                foreach ($terms as $term) {
                    if(!in_array($term->term_id, $ids) ){
                        $ids[] = $term->term_id;

                        $names .= ' '.$term->slug.'-'.$filter_type.' ';
                    }
                }
            }

            if($return_names){
                return $names;
            }else{
                return $ids;    
            }
        }
    }

    if ( ! function_exists( 'red_get_filters' ) ) {
        /*
            this function returns the filter by taxonomy 
            Params:
            $term_ids - and array or term IDs
            $taxonomy -  for example 'category' or 'portfolio'
            $filter_type - we need that to have distinct data-value, to not affect other filters
        */
        function red_get_filters($term_slugs,$taxonomy, $filter_type = 'thumbs', $title = ''){
            
            $result = '';    
            if(is_array($term_slugs) && sizeof($term_slugs)){
                $result .= $title;
                $result .= '<ul class="thumbs-splitter" data-option-key="filter">';
                $result .= '    <li class="segment-0 selected-0 selected">
                                    <a href="#filter" data-option-value="*" class="selected">'.__('All','redcodn').'</a>
                                </li>';
                $i = 0;
                foreach ($term_slugs as $term_slug) {
                    if($term_slug != 'all'){
                        $i++;
                        //$term = get_term( $term_id, $taxonomy );
                        $term = get_term_by( 'slug', $term_slug, $taxonomy);

                        
                        $result .= '<li class="segment-'.$i.'">
                                        <a href="#filter" data-option-value=".'.$term->slug.'-'.$filter_type.'">'.$term->name.'</a>
                                    </li>';
                    }
                    
                }
                $result .= '</ul>';
            }

            return $result;
        }
    }


    if ( ! function_exists( 'red_get_slideshow' ) ) {
        function red_get_slideshow($slideshow_id){
            global $slideshow;
            $slideshow = meta::get_meta( $slideshow_id, 'box' ); 
            //var_dump($slideshow);

            $slideshow_settings = meta::get_meta( $slideshow_id, 'slidesettings' );
            
            $slideshow_source = 'none'; /*by default there is no source: the use must add slides manually*/
            if(isset($slideshow_settings['slideshowSource'])){
                $slideshow_source = $slideshow_settings['slideshowSource'];
            }

            if(isset($slideshow_settings['numberOfPosts'])){
                $numberOfPosts = $slideshow_settings['numberOfPosts'];
            }else{
                $numberOfPosts = 5; /*in case this value is not defined*/
            }

            $latest_slideshow_posts = array(); /*initialize an empty array where latest/featured posts/posrtfolios will be added*/

            switch ($slideshow_source) {
                case 'latest_posts':
                    $query_args = array('post_type' => 'post', 'posts_per_page' => $numberOfPosts);
                    
                    break;

                default:
                    # code...
                    break;
            }

            if(isset($query_args)){
                $latest_posts = new WP_Query( $query_args ); 
                    
                if(isset($latest_posts -> posts) and sizeof($latest_posts -> posts)){
                    foreach ($latest_posts -> posts as $post) {
                        /*add the post to the array*/
                        $latest_slideshow_posts[] = array('type_res' => 'post',
                                                          'resources' => $post -> ID,
                                                          'slide' => '',
                                                          'slide_id' => '',
                                                          'title' => $post -> post_title,
                                                          'title_color' => '',
                                                          'title_position' => 'right',
                                                          'description' => $post -> post_excerpt,
                                                          'description_color' => '',
                                                          'idrow' => '', 
                                                          );
                    }
                }

            }

            if(!empty($latest_slideshow_posts)){

                if(!empty( $slideshow ) && is_array( $slideshow )){
                    $slideshow = array_merge($latest_slideshow_posts, $slideshow);
                }else{
                    $slideshow = $latest_slideshow_posts;
                }

                
            }

            if( !( isset( $slideshow ) && is_array( $slideshow ) && count( $slideshow ) ) ){
                return;   
            }
            if( wp_is_mobile() ){
                $slideshow_height = '300px';
            }
            elseif( options::get_value('imagesizes', 'slideshow_height') != ''){
                $slideshow_height = options::get_value('imagesizes', 'slideshow_height') . 'px';
            } else{
                $slideshow_height = '500px';
            }
            if ( !empty( $slideshow ) && is_array( $slideshow ) && is_array( $slideshow_settings )  && count( $slideshow_settings ) ) {
                    extract( $slideshow_settings ); ?>
                    <script>
                        jQuery(function(){
                            
                            jQuery('#camera_wrap_1').camera({
                                height: '<?php echo $slideshow_height; ?>',
                                pagination: false,
                                thumbnails: false, 
                                fx: '<?php echo $slideshow_settings["slideshowEffects"] ?>'
                            });

                        });
                    </script>
                   <?php get_template_part('slideshow');
                               
            }  
        }
    }

    /**
     Create the post rating lines
    */
     if ( ! function_exists( 'red_get_score_line' ) ) {
         function red_get_score_line($number){
            $line_percentage = $number*10 . '%';
            ?>
            <div class="red-rating-line" style="width: <?php echo $line_percentage; ?>">

            </div>
            <?php
         }
     }
    /**
     Create the post rating lines
    */
     if ( ! function_exists( 'get_overall_post_score' ) ) {
         function get_overall_post_score($postID, $return = false){
            $rating_items = get_post_meta($postID, 'up_post_rating', TRUE);

            if( isset($rating_items) && $rating_items != '' ){
                $rating_scores = array();
                foreach ($rating_items as $item) {
                    $rating_scores[] = $item['rating_score'];
                }
                // Get number of scores
                $nr_of_scores = count($rating_scores);
                if($nr_of_scores == 0){
                    return '';
                }
                // Get the overall score
                $score_sum = 0;
                foreach ($rating_scores as $s => $score) {
                    $score_sum = $score_sum + $score;
                }
                $overall_score = round($score_sum / $nr_of_scores , 1);
                if($return == false){   
                    echo trim($overall_score);
                }
                else{
                    return trim($overall_score);
                }
            } else{
                return '';
            }
         }
     }
     function is_post_review($postID){
        $rating_items = get_post_meta($postID, 'up_post_rating', TRUE);
        if( isset($rating_items) && $rating_items != '' ){
            return true;
        } else{
            return false;
        }
     }
    /**
     Include gallery manager
    */
    get_template_part('/lib/php/attached_images_manager');

    
?>