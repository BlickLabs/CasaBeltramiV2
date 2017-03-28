<?php
    /* aditional options and meta-data init menu, register functions and options labels */
    add_action('admin_menu', array( 'options' , 'menu' ) );

    

    add_action('admin_init', array( 'options' , 'register' ) );
    /* register resource */
    add_action('init', array( 'resources' , 'register' ) , 1 );
    
    add_action('admin_init', array( 'includes' , 'load_css' ) , 1 );
    add_action('admin_init', array( 'includes' , 'load_js' ) , 1 );

    /* on delete action */
    add_action( 'delete_post', 'clear_meta' );
	
	/* ajax actions */
	/* meta actions */
	add_action('wp_ajax_meta_save', array( 'meta' , 'save' ) );
    add_action('wp_ajax_meta_delete' , array( 'meta' , 'delete') );
    add_action('wp_ajax_meta_sort' , array( 'meta' , 'sort') );
    add_action('wp_ajax_meta_update' , array( 'meta' , 'update') );

    add_action('wp_ajax_search' , array( 'post' , 'search' ) );
    add_action('wp_ajax_min_likes' , array( 'like' , 'min_likes' ) );
    add_action('wp_ajax_sim_likes' , array( 'like' , 'sim_likes' ) );
	add_action('wp_ajax_reset_likes' , array( 'like' , 'reset_likes' ) );
    
    
    /* options actions */
    add_action( 'wp_ajax_text_preview' , array( 'text' , 'preview' ) );

    /* add like action */
    add_action( 'wp_ajax_like' , array( 'like' , 'set' ) );
    add_action( 'wp_ajax_nopriv_like' , array( 'like' , 'set' ) );
    
    /*action for red news */
	add_action( 'wp_ajax_set_red_news' , array( 'options' , 'set_red_news' ) );

	/* extra actions */
	add_action('wp_ajax_get_rows'       ,   array('extra' , 'get') );
    add_action('wp_ajax_extra_add'      ,   array('extra' , 'add') );
    add_action('wp_ajax_extra_del'      ,   array('extra' , 'del') );
    add_action('wp_ajax_extra_update'   ,   array('extra' , 'update') );
    add_action('wp_ajax_extra_sort'     ,   array('extra' , 'sort') );

    /* new action */
    add_action('wp_ajax_post_relation'  , 'get_post_relation' );
    add_action('wp_ajax_search_relation'  , 'search_relation' );

    /* contact form action */
    if(is_user_logged_in () ){
        add_action('wp_ajax_contact' , array('contact' , 'send_mail') );
    }else{
        add_action('wp_ajax_nopriv_contact' , array('contact' , 'send_mail') );
    }

    add_action('wp_ajax_load_more' , 'red_load_more' );
    add_action('wp_ajax_nopriv_load_more' , 'red_load_more' );


    add_action('wp_ajax_load_preview' , 'red_load_preview' );
    add_action('wp_ajax_nopriv_load_preview' , 'red_load_preview' );

    
    /* google map actions */
    add_action('wp_ajax_load_map' , array( 'map' ,'load_map' ) );
    add_action('wp_ajax_set_map_meta' , array( 'map' ,'set_map_meta' ) );
    add_action('wp_ajax_get_contact_map' , array( 'map' ,'get_contact_map' ) );

    add_filter('the_content', 'do_shortcode');  /*we need this to be able to have nested shortcodes*/
    add_filter('widget_text', 'do_shortcode');


    /* widgets */
    /* general widgets */
    register_widget("widget_tweets");
    register_widget("widget_flickr");
    register_widget("widget_socialicons");
    register_widget("widget_contact");

    register_widget("widget_tabber");
    register_widget("widget_tags");
    register_widget("widget_custom_post");
    //register_widget("widget_comments");
    register_widget("widget_latest_posts");
    //register_widget("widget_category_icons");
	register_widget("widget_featured_posts");
    register_widget("widget_instagram");


    /* register sidebars */
    if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
			'name' => __( 'Main Sidebar', 'redcodn' ),
			'id' => 'main',
			'before_widget' => '<aside id="%1$s" class="widget"><div class="%2$s">',
			'after_widget' => '</div></aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5><p class="widget-delimiter">&nbsp;</p>',
		));

        register_sidebar(array(
			'name' => __( 'Footer First', 'redcodn' ),
			'id' => 'footer-first',
			'before_widget' => '<aside id="%1$s" class="widget"><div class="%2$s">',
			'after_widget' => '</div></aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5><p class="widget-delimiter">&nbsp;</p>',
		));

        register_sidebar(array(
			'name' => __( 'Footer Second', 'redcodn' ),
			'id' => 'footer-second',
			'before_widget' => '<aside id="%1$s" class="widget"><div class="%2$s">',
			'after_widget' => '</div></aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5><p class="widget-delimiter">&nbsp;</p>',
		));

        register_sidebar(array(
            'name' => __( 'Footer Third', 'redcodn' ),
            'id' => 'footer-third',
            'before_widget' => '<aside id="%1$s" class="widget"><div class="%2$s">',
            'after_widget' => '</div></aside>',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5><p class="widget-delimiter">&nbsp;</p>',
        ));


        register_sidebar(array(
            'name' => __( 'Footer Fourth', 'redcodn' ),
            'id' => 'footer-fourth',
            'before_widget' => '<aside id="%1$s" class="widget"><div class="%2$s">',
            'after_widget' => '</div></aside>',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5><p class="widget-delimiter">&nbsp;</p>',
        ));

        register_sidebar(array(
			'name' => __( 'Footer Fullwidth', 'redcodn' ),
			'id' => 'footer-fifth',
			'before_widget' => '<aside id="%1$s" class="widget"><div class="%2$s">',
			'after_widget' => '</div></aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5><p class="widget-delimiter">&nbsp;</p>',
		));

		/*register_sidebar(array(
			'name' => __( 'Social media icons', 'redcodn' ),
			'id' => 'social-media',
			'before_widget' => '<aside id="%1$s" class="widget"><div class="%2$s">',
			'after_widget' => '</div></aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5><p class="delimiter">&nbsp;</p>',
		));*/

        $sidebars = options::get_value( '_sidebar' );
        
        /* register dinamic sidebar */
        if( is_array( $sidebars ) && !empty( $sidebars ) ){
            foreach( $sidebars as $sidebar ){
                register_sidebar(array(
                    'name' => $sidebar['title'] ,
                    'id' => trim( strtolower( str_replace( ' ' , '-' , $sidebar['title'] ) ) ),
                    'before_widget' => '<aside id="%1$s" class="widget"><div class="%2$s">',
                    'after_widget' => '</div></aside>',
                    'before_title' => '<h5 class="widget-title">',
                    'after_title' => '</h5><p class="widget-delimiter">&nbsp;</p>',
                ));
            }
        }
    }
?>