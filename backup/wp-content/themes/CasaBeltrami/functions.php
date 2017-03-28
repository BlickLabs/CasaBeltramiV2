<?php
    define('_LIMIT_' , 10 );
    define('_AUTL_' , 7 );
    define('BLOCK_TITLE_LEN' , 50 );
    
    /* google maps defines */
    define('DEFAULT_AVATAR'   , get_template_directory_uri()."/images/default_avatar.jpg" );
	define('DEFAULT_AVATAR_100'   , get_template_directory_uri()."/images/default_avatar_100.jpg" );
	define('DEFAULT_AVATAR_LOGIN'   , get_template_directory_uri()."/images/default_avatar_login.png" );
    define( '_TN_'      , wp_get_theme() );
    
	define('BRAND'      , '' );
	define('ZIP_NAME'   , 'Photoform' );


    add_action('admin_bar_menu', 'de_redcodn');

    include 'lib/php/aq_resizer.php'; 
    include 'redshortcodes/custom-functions.php';

    include 'lib/php/main.php';

    
    
    include 'lib/php/actions.register.php';
    include 'lib/php/menu.register.php';

    $content_width = 600;
  
    if( function_exists( 'add_theme_support' ) ){ 
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
    }
    $gallery_shortcode_on;
    //image::add_size();

    if( isset( $_GET['post_id'] ) && $_GET['post_id'] == -1 ){
        /*disable flash uploader, we need that to avoid uploader failure on front end*/
        add_filter('flash_uploader', '__return_false', 5);
    }

	add_theme_support( 'custom-background' );
    

	add_theme_support( 'post-formats' , array( 'image' , 'video' , 'audio','gallery', 'quote'  ) );
	add_editor_style('editor-style.css');
	
	

    /* Localization */
    load_theme_textdomain( 'redcodn' );
    load_theme_textdomain( 'redcodn' , get_template_directory() . '/languages' );
    
    if ( function_exists( 'load_child_theme_textdomain' ) ){
        load_child_theme_textdomain( 'redcodn' );
    }

    /* redcodn Backend link */
    function de_redcodn() {
        global $wp_admin_bar;    
        if ( !is_super_admin() || !is_admin_bar_showing() ){
            return;
        }
        $wp_admin_bar -> add_menu( array(
            'id' => 'redcodn',
            'parent' => '',
            'title' => _TN_,
            'href' => admin_url( 'admin.php?page=redcodn__general' )
            ) );   
    }

	add_filter('excerpt_length', 'red_excerpt_length');
	function red_excerpt_length($length) {
		return 70;  /* Or whatever you want the length to be. */
	}

	if( !options::logic( 'general' , 'show_admin_bar' ) ){
		add_filter( 'show_admin_bar', '__return_false' );
	}
	function red_load_css() {
		
		wp_register_style( 'default_stylesheet',get_stylesheet_uri() );
		wp_enqueue_style( 'default_stylesheet' );

		
		
		$files = scandir( get_template_directory()."/css/autoinclude" );
		foreach( $files as $file ){
			if( is_file( get_template_directory()."/css/autoinclude/$file" ) ){
				wp_register_style( $file.'-style',get_template_directory_uri() . '/css/autoinclude/'.$file );
				wp_enqueue_style( $file.'-style' );
			}
		}
		
		// Add the WooCommerce additional styling
		wp_register_style( 'woocommerce_stylesheet',get_stylesheet_directory_uri() . '/woocommerce/woocommerce.css' );
		wp_enqueue_style( 'woocommerce_stylesheet' );


		if(options::logic( 'blog_post' , 'enb_lightbox' ) && is_singular()){
			wp_register_style( 'prettyPhoto',get_template_directory_uri() . '/css/prettyPhoto.css' );
			wp_enqueue_style( 'prettyPhoto' );
		}

		$protocol = is_ssl() ? 'https' : 'http';

		load_google_fonts();

	    if( options::get_value( 'styling' , 'logo_type' ) == 'text' ) {
	    	$logo_font = str_replace(' ' , '+' , trim( options::get_value( 'styling' , 'logo_font_family' ) ) );
	    	wp_enqueue_style( 'logo_gfont', "$protocol://fonts.googleapis.com/css?family=$logo_font' rel='stylesheet' type='text/css" );
	    }
	    
		wp_enqueue_script( 'modernizr' , get_template_directory_uri() . '/js/modernizr.custom.79639.js' , array( 'jquery' ),false,true );	
		wp_enqueue_script( 'flexslider' , get_template_directory_uri() . '/js/jquery.flexslider-min.js' , array( 'jquery' ),false,true );	
		wp_enqueue_script( 'camera' , get_template_directory_uri() . '/js/camera.min.js' , array( 'jquery' ),false,true );	
		wp_enqueue_script( 'easing' , get_template_directory_uri() . '/js/jquery.easing.1.3.js' , array( 'jquery' ),false,true );	

		wp_enqueue_script( 'superfish' , get_template_directory_uri() . '/js/jquery.superfish.js' , array( 'jquery' ),false,true ); 
		wp_enqueue_script( 'supersubs' , get_template_directory_uri() . '/js/jquery.supersubs.js' , array( 'jquery' ),false,true ); 

		wp_enqueue_script( 'dlmenu' , get_template_directory_uri() . '/js/jquery.dlmenu.js' , array( 'jquery' ),false,true );  

		wp_enqueue_script( 'mousewheel' , get_template_directory_uri() . '/js/jquery.mousewheel.js' , array( 'jquery' ),false,true );  

		$video_play_mode = '';
		if(is_single()){
			global $post;
			
			if(get_post_type($post -> ID) == 'video'){

				$embed_meta = get_post_meta($post -> ID,'redembed',true); // get embed meta
				if(isset($embed_meta['url']) && strlen($embed_meta['url'])){
					// if it is a Vimeo video
					if(strpos($embed_meta['url'], 'vimeo')){
						wp_enqueue_script( 'froogaloop' , get_template_directory_uri() . '/js/froogaloop.min.js' , array( 'jquery' ),false,true );     //for vimeo API		
						$video_play_mode = 'vimeo';		
					}
				}
				
			}
			
		}
		

		wp_enqueue_script( 'mediaelement' , get_template_directory_uri() . '/js/mediaelementplayer.min.js' , array( 'jquery' ),false,true );    
		wp_enqueue_script( 'hoverIntent' , get_template_directory_uri() . '/js/jquery.hoverIntent.js' , array( 'jquery' ),false,true );    
		wp_enqueue_script( 'scrollto' , get_template_directory_uri() . '/js/jquery.scrollTo-1.4.2-min.js' , array( 'jquery' ),false,true );
		wp_enqueue_script( 'tinyscrollbar' , get_template_directory_uri() . '/js/sly.min.js' , array( 'jquery' ),false,true );
		wp_enqueue_script( 'functions' , get_template_directory_uri() . '/js/functions.js' , array( 'jquery' , 'jquery-ui-tabs' , 'scrollto' ),false,true );
		wp_enqueue_script( 'jquery-cookie' , get_template_directory_uri() . '/js/jquery.cookie.js' , array( 'jquery' ),false,true );
		
		if( is_singular() && get_post_type( get_the_ID() ) == 'gallery' ){

			// Load the necessary scripts for each gallery type only
			$single_gallery_layout = meta::get_meta( $post -> ID , 'settings' );
			$single_gallery_layout = $single_gallery_layout['gallery_layout'];

			if( $single_gallery_layout == 'grid' ){
				wp_enqueue_script( 'masonry' , get_template_directory_uri() . '/js/masonry.pkgd.min.js' , array( 'jquery' ),false,true );
				wp_enqueue_script( 'imagesloaded' , get_template_directory_uri() . '/js/imagesloaded.js' , array( 'jquery' ),false,true );
				wp_enqueue_script( 'moder2' , get_template_directory_uri() . '/js/modernizr.custom2.js' , array( 'jquery' ),false,true );
				wp_enqueue_script( 'classie' , get_template_directory_uri() . '/js/classie.js' , array( 'jquery' ),false,true );
				wp_enqueue_script( 'animon' , get_template_directory_uri() . '/js/AnimOnScroll.js' , array( 'jquery' ),false,true );
			} elseif ( $single_gallery_layout == 'fotorama') {
				wp_enqueue_script( 'fotorama' , get_template_directory_uri() . '/js/fotorama.js' , array( 'jquery' ),false,true );
			}
			wp_localize_script( 'functions', 'single_gallery_layout', $single_gallery_layout );
		}
		if(options::logic( 'blog_post' , 'enb_lightbox' ) && is_singular()){
			wp_enqueue_script( 'prettyPhoto' , get_template_directory_uri() . '/js/jquery.prettyPhoto.js' , array( 'jquery' ),false,true );
			wp_enqueue_script( 'prettyPhotoSettings' , get_template_directory_uri() . '/js/prettyPhoto.settings.js' , array( 'prettyPhoto' ),false,true );
		}

		if ( is_singular() ){ wp_enqueue_script( "comment-reply" ); } 
            
		wp_register_script( 'actions', get_template_directory_uri().'/lib/js/actions.js' , array('jquery'),false,true );
        
        if(is_page() ) {
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox'); 
            
            wp_enqueue_style( 'ui-lightness');
            wp_enqueue_style('thickbox');
        }
        
        wp_enqueue_script( 'actions' );

		/*  localize cookies_prefix for tooltip script */
		wp_localize_script( 'tour', 'cookies_prefix', ZIP_NAME);

        $siteurl = get_option('siteurl');
        if( !empty($siteurl) ){
            $siteurl = rtrim( $siteurl , '/') . '/wp-admin/admin-ajax.php' ;
        }else{
            $siteurl = home_url('/wp-admin/admin-ajax.php');
        }
    
    	/*  localize ajaxurl for actions.js script */
		wp_localize_script( 'actions', 'ajaxurl', $siteurl);
		
		wp_localize_script( 'actions', 'MyAjax', array(
		    
		    // generate a nonce with a unique ID "myajax-post-comment-nonce"
		    // so that you can check it later when an AJAX request is sent
		    'getMoreNonce' => wp_create_nonce( 'myajax-getMore-nonce' ),
		    )
		);

		wp_localize_script( 'functions', 'ajaxurl', $siteurl);
		wp_localize_script( 'functions', 'video_play_mode', $video_play_mode );
		
		wp_localize_script( 'functions', 'ajaxPreviewNonce', wp_create_nonce( 'ajax-Preview-nonce' ));
		

	}

	add_action('wp_enqueue_scripts', 'red_load_css');
	if (!is_admin()) {
		add_action('wp_head', 'red_get_custom_css');
		add_action('wp_head', 'localize_logo_content');
	}


	function localize_logo_content(){
		if( options::get_value( 'styling' , 'logo_type' ) == 'text' ) { 
		    ob_start();
		    ob_clean();
		    bloginfo('name');
		    $blog_name = ob_get_clean();

		    $logo_content = '<a href="'.home_url().'" class="text-logo"><h1>' . $blog_name . '</h1><span>'. get_bloginfo( 'description' ). '</span></a>';
		        
		}elseif(options::get_value( 'styling' , 'logo_type' ) == 'image' && options::get_value( 'styling' , 'logo_url' ) == '' ){ 

		    if (options::logic( 'styling' , 'use_retina_logo' )) {
		        $size = getimagesize(get_template_directory_uri().'/images/logo.png');
		        $retina_size = 'width="' .$size[0] / 2 .'"';
		        $retina_size_class = 'style="width:'. $size[0] / 2 . 'px"';
		    }else{
		        $retina_size = '';
		        $retina_size_class = '';
		    }
		    
		    $logo_content = '
		        <a '. $retina_size_class .' href="'.home_url().'" class="hover">
		            <img '. $retina_size .' src="'.get_template_directory_uri().'/images/logo.png" />
		        </a>';
		}else{

		    $logo_src = options::get_value( 'styling' , 'logo_url' ); 
		    
		    $logo_content = '
		    <a href="'.home_url().'" class="hover">
		        <img src="'.$logo_src.'" >
		    </a>';

		}

		wp_localize_script( 'functions', 'logo', array(
		    // localize logo that will be inserted in hte bidlle of the menu
		    'logoContent'          => $logo_content,
		    )
		);
	}

	/**********************************************/
	/************ Plugin recommendations **********/
	/**********************************************/
	require_once ('lib/php/plugin-recommendations.php');
	

	/* action for color picker*/
	add_action( 'admin_enqueue_scripts', 'red_enqueue_color_picker' );
	function red_enqueue_color_picker( $hook_suffix ) {
	    // first check that $hook_suffix is appropriate for your admin page
	    wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_script( 'wp-color-picker' );
	}



	require_once ('woocommerce/theme-woocommerce.php');

?>
<?php if(is_singular()){ ?>
        <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
        <script type="text/javascript">
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>
    <?php } ?>