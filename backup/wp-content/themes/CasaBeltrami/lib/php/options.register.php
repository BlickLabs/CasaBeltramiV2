<?php
    /* register pages */
	
	$current_theme_name = wp_get_theme();
    
    options::$menu['redcodn']['general']            = array( 'label' => __( 'General' , 'redcodn' ) , 'title' => __( 'General settings' , 'redcodn' ) , 'description' => __( 'General page description.' , 'redcodn' ) , 'type' => 'main' , 'main_label' => $current_theme_name );
    options::$menu['redcodn']['layout']             = array( 'label' => __( 'Layout' , 'redcodn' )  , 'title' => __( 'Layout page settings' , 'redcodn' )  , 'description' => __( 'Layout page description.' , 'redcodn' ) );
    options::$menu['redcodn']['styling']            = array( 'label' => __( 'Styling' , 'redcodn' )  , 'title' => __( 'Styling settings' , 'redcodn' )  , 'description' => __( 'Styling page description.' , 'redcodn' ) );
    options::$menu['redcodn']['colors']             = array( 'label' => __( 'Colors' , 'redcodn' )  , 'title' => __( 'General color settings' , 'redcodn' )  , 'description' => __( 'Colors page description.' , 'redcodn' ) );
    options::$menu['redcodn']['typography']         = array( 'label' => __( 'Typography' , 'redcodn' )  , 'title' => __( 'Typography settings' , 'redcodn' )  , 'description' => __( 'Typography page description.' , 'redcodn' ) );
    options::$menu['redcodn']['imagesizes']         = array( 'label' => __( 'Image sizes' , 'redcodn' )  , 'title' => __( 'Image sizes settings' , 'redcodn' )  , 'description' => __( 'Image sizes page description.' , 'redcodn' ) );
    options::$menu['redcodn']['likes']              = array( 'label' => __( 'Likes' , 'redcodn' )  , 'title' => __( 'Likes' , 'redcodn' )  , 'description' => __( 'Likes page description.' , 'redcodn' ) );
    options::$menu['redcodn']['blog_post']          = array( 'label' => __( 'Post settings' , 'redcodn' )  , 'title' => __( 'Blog post settings' , 'redcodn' )  , 'description' => __( 'Blog post page description.' , 'redcodn' ) );

    options::$menu['redcodn']['header_settings']    = array( 'label' => __( 'Header settings' , 'redcodn' )  , 'title' => __( 'Header settings' , 'redcodn' )  , 'description' => __( 'Header page description.' , 'redcodn' ) );    
    options::$menu['redcodn']['content_settings']   = array( 'label' => __( 'Content settings' , 'redcodn' )  , 'title' => __( 'Content settings' , 'redcodn' )  , 'description' => __( 'Content page description.' , 'redcodn' ) );    
    options::$menu['redcodn']['footer_settings']    = array( 'label' => __( 'Footer settings' , 'redcodn' )  , 'title' => __( 'Footer settings' , 'redcodn' )  , 'description' => __( 'Footer page description.' , 'redcodn' ) );    
    options::$menu['redcodn']['social']             = array( 'label' => __( 'Social networks' , 'redcodn' )  , 'title' => __( 'Social network settings' , 'redcodn' )  , 'description' => __( 'Social page description.' , 'redcodn' ) );
	options::$menu['redcodn']['_sidebar']           = array( 'label' => __( 'Sidebars' , 'redcodn' )  , 'title' => __( 'Sidebar manager' , 'redcodn' )  , 'description' => __( 'Sidebar manager page description.' , 'redcodn' ) , 'update' => false );
    options::$menu['redcodn']['custom_css']         = array( 'label' => __( 'Custom CSS' , 'redcodn' )  , 'title' => __( 'Custom CSS' , 'redcodn' )  , 'description' => __( 'Custom CSS' , 'redcodn' ) , 'update' => true );
	//options::$menu['redcodn']['redcodn']        = array( 'label' => __( 'redcodn' , 'redcodn' )  , 'title' => __( 'redcodn' , 'redcodn' )  , 'description' => __( 'redcodn notifications.' , 'redcodn' ) );
    options::$menu['redcodn']['io']                 = array( 'label' => __( 'Import / Export' , 'redcodn' )  , 'title' => __( 'Import/Export' , 'redcodn' )  , 'description' => __( 'Import and export settings' , 'redcodn' ) );
   
    /* OPTIONS */
      
    
    /* GENERAL OPTIONS */
	
    $preloading_types = array('none' => __( 'No preloader' , 'redcodn' ) , 'frontpage' => __( 'Frontpage only' , 'redcodn' ) , 'website' => __( 'Active on the whole website' , 'redcodn' ) );

    options::$fields['general']['show_admin_bar']       = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show WordPress admin bar' , 'redcodn' ));
    options::$default['general']['show_admin_bar']      = 'no'; 

    options::$fields['general']['show_preloader']       = array( 'type' => 'st--select', 'value' => $preloading_types , 'label' => __( 'Show preloader on website' , 'redcodn' ));
    options::$default['general']['show_preloader']      = 'none'; 

    options::$fields['general']['tracking_code']        = array('type' => 'st--textarea' , 'label' => __( 'Tracking code' , 'redcodn' ) , 'hint' => __( 'Paste your Google Analytics or other tracking code here.<br />It will be added into the footer of this theme' , 'redcodn' ) );
    options::$fields['general']['copy_right']   	    = array('type' => 'st--textarea' , 'label' => __( 'Copyright text' , 'redcodn' ) , 'hint' => __( 'Type here the Copyright text that will appear in the footer.<br />To display the current year use "%year%"' , 'redcodn' ) );
    
    options::$default['general']['copy_right'] 			= 'Copyright &copy; %year% <a href="http://redcodn.com" target="_blank">REDCODN</a>. All rights reserved.';




	/* LAYOUT DEFAULT VALUE */
    options::$default['layout']['front_page']           = 'full';
    options::$default['layout']['v_front_page']         = 'yes';
    options::$default['layout']['404']                  = 'full';
    options::$default['layout']['author']               = 'full';
    options::$default['layout']['v_author']             = 'yes';
    options::$default['layout']['page']                 = 'full';
    options::$default['layout']['single']               = 'right';
    options::$default['layout']['blog_page']            = 'full';
    options::$default['layout']['v_blog_page']          = 'yes';

    options::$default['layout']['search']               = 'full';
    options::$default['layout']['v_search']             = 'yes';
    options::$default['layout']['archive']              = 'full';
    options::$default['layout']['v_archive']            = 'yes';
    options::$default['layout']['category']             = 'full';
    options::$default['layout']['v_category']           = 'yes';
    options::$default['layout']['tag']                  = 'full';
    options::$default['layout']['shop']                  = 'full';
    options::$default['layout']['v_tag']                = 'yes';
    options::$default['layout']['attachment']           = 'full';

    /* LAYOUT OPTIONS */
    $layouts                                            = array('left' => __( 'Left sidebar' , 'redcodn' ) , 'right' => __( 'Right sidebar' , 'redcodn' ) , 'full' => __( 'Full width' , 'redcodn' ) );
    $sidebars_record = options::get_value( '_sidebar' );
    if( !is_array( $sidebars_record ) || empty( $sidebars_record ) ){
        $sidebar = array( '' => 'main' );
    }else{
        foreach( $sidebars_record as $sidebars ){
            $sidebar[ trim( strtolower( str_replace( ' ' , '-' , $sidebars['title'] ) ) ) ] = $sidebars['title'];
        }
        $sidebar[''] = 'main';
    }

    
    options::$fields['layout']['sidebar_width']            = array('type' => 'st--select' , 'label' => __( 'Sidebar width ' , 'redcodn' ) , 'value' => array( '2' =>  __( '1/6' , 'redcodn' )  , '3' => __('1/4' , 'redcodn' ) , '4' => __('1/3' , 'redcodn' ) , '5' => __('5/12' , 'redcodn' )  ) , 'hint' => __( 'Choose sidebar width for sidebar sections.' , 'redcodn' ) );
    options::$default['layout']['sidebar_width']              = '3';

    options::$fields['layout']['404']                   = array('type' => 'st--select' , 'label' => __( '404' , 'redcodn' ) , 'hint' => __('Layout for 404 page', 'redcodn' ), 'value' => $layouts , 'action' => "act.select('.layout_404' , { 'left' : '.sidebar_404' , 'right' : '.sidebar_404' } , 'sh_' )" , 'iclasses' => 'layout_404'  );
    options::$fields['layout']['404_sidebar']           = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for 404 template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'sidebar_404' );
    if( options::get_value( 'layout' , '404' ) == 'full' ){
        options::$fields['layout']['404_sidebar']['classes'] = 'sidebar_404 hidden';
    }
    options::$fields['layout']['author']                = array('type' => 'st--select' ,'label' => __( 'Author' , 'redcodn' ), 'hint' => __( 'Layout for author page' , 'redcodn' ) , 'value' => $layouts , 'action' => "act.select('.author_layout' , { 'left' : '.author_sidebar' , 'right' : '.author_sidebar' } , 'sh_' )" , 'iclasses' => 'author_layout' );
    options::$fields['layout']['author_sidebar']        = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for author template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'author_sidebar' );
    if( options::get_value( 'layout' , 'author' ) == 'full' ){
        options::$fields['layout']['author_sidebar']['classes'] = 'author_sidebar hidden';
    }

    options::$fields['layout']['page']                  = array('type' => 'st--select' , 'label' => __( 'Pages / single post' , 'redcodn' ), 'hint' => __( 'Layout for pages' , 'redcodn' ) , 'value' => $layouts , 'action' => "act.select('.page_layout' , { 'left' : '.page_sidebar' , 'right' : '.page_sidebar' } , 'sh_' )" , 'iclasses' => 'page_layout' );
    options::$fields['layout']['page_sidebar']          = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for page template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'page_sidebar' );
    if( options::get_value( 'layout' , 'page' ) == 'full' ){
        options::$fields['layout']['page_sidebar']['classes'] = 'page_sidebar hidden';
    }
    options::$fields['layout']['single']                = array('type' => 'st--select' , 'hint' => __( 'Layout for single post' , 'redcodn' ) , 'value' => $layouts , 'action' => "act.select('.single_layout' , { 'left' : '.single_sidebar' , 'right' : '.single_sidebar' } , 'sh_' )" , 'iclasses' => 'single_layout' );
    options::$fields['layout']['single_sidebar']        = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for single page template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'single_sidebar' );
    if( options::get_value( 'layout' , 'single' ) == 'full' ){
        options::$fields['layout']['single_sidebar']['classes'] = 'single_sidebar hidden';
    }
    options::$fields['layout']['blog_page']             = array('type' => 'st--select' , 'label' => __( 'Blog page' , 'redcodn' ), 'hint' => __( 'Layout for blog page' , 'redcodn' ) , 'value' => $layouts , 'action' => "act.select('.blog_page_layout' , { 'left' : '.blog_page_sidebar' , 'right' : '.blog_page_sidebar' } , 'sh_' )" , 'iclasses' => 'blog_page_layout' );
    options::$fields['layout']['blog_page_sidebar']     = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for blog page template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'blog_page_sidebar' );
    if( options::get_value( 'layout' , 'blog_page' ) == 'full' ){
        options::$fields['layout']['blog_page_sidebar']['classes'] = 'blog_page_sidebar hidden';
    }

    options::$fields['layout']['search']                = array('type' => 'st--select' , 'label' => __( 'Search' , 'redcodn' ), 'hint' => __( 'Layout for search page' , 'redcodn' ) , 'value' => $layouts , 'action' => "act.select('.search_layout' , { 'left' : '.search_sidebar' , 'right' : '.search_sidebar' } , 'sh_' )" , 'iclasses' => 'search_layout' );
    options::$fields['layout']['search_sidebar']        = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for search template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'search_sidebar' );
    if( options::get_value( 'layout' , 'search' ) == 'full' ){
        options::$fields['layout']['search_sidebar']['classes'] = 'search_sidebar hidden';
    }
    options::$fields['layout']['archive']               = array('type' => 'st--select' , 'label' => __( 'Archive' , 'redcodn' ), 'hint' => __( 'Layout for archive page' , 'redcodn' ) , 'value' => $layouts , 'action' => "act.select('.archive_layout' , { 'left' : '.archive_sidebar' , 'right' : '.archive_sidebar' } , 'sh_' )" , 'iclasses' => 'archive_layout' );
    options::$fields['layout']['archive_sidebar']       = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for archive template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'archive_sidebar' );
    if( options::get_value( 'layout' , 'archive' ) == 'full' ){
        options::$fields['layout']['archive_sidebar']['classes'] = 'archive_sidebar hidden';
    }
    options::$fields['layout']['category']              = array('type' => 'st--select' , 'label' => __( 'Category' , 'redcodn' ), 'hint' => __( 'Layout for category page' , 'redcodn' ) , 'value' => $layouts , 'action' => "act.select('.category_layout' , { 'left' : '.category_sidebar' , 'right' : '.category_sidebar' } , 'sh_' )" , 'iclasses' => 'category_layout' );
    options::$fields['layout']['category_sidebar']      = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for category template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'category_sidebar' );
    if( options::get_value( 'layout' , 'category' ) == 'full' ){
        options::$fields['layout']['category_sidebar']['classes'] = 'category_sidebar hidden';
    }
    options::$fields['layout']['shop']              = array('type' => 'st--select' , 'label' => __( 'Shop' , 'redcodn' ), 'hint' => __( 'Layout for shop page' , 'redcodn' ) , 'value' => $layouts , 'action' => "act.select('.shop_layout' , { 'left' : '.shop_sidebar' , 'right' : '.shop_sidebar' } , 'sh_' )" , 'iclasses' => 'shop_layout' );
    options::$fields['layout']['shop_sidebar']      = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for shop template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'shop_sidebar' );
    if( options::get_value( 'layout' , 'shop' ) == 'full' ){
        options::$fields['layout']['shop_sidebar']['classes'] = 'shop_sidebar hidden';
    }
    options::$fields['layout']['tag']                   = array('type' => 'st--select' , 'label' => __( 'Tags' , 'redcodn' ), 'hint' => __( 'Layout for tags page' , 'redcodn' ) , 'value' => $layouts , 'action' => "act.select('.tag_layout' , { 'left' : '.tag_sidebar' , 'right' : '.tag_sidebar' } , 'sh_' )" , 'iclasses' => 'tag_layout' );
    options::$fields['layout']['tag_sidebar']           = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for tags template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'tag_sidebar' );
    if( options::get_value( 'layout' , 'tag' ) == 'full' ){
        options::$fields['layout']['tag_sidebar']['classes'] = 'tag_sidebar hidden';
    }
    options::$fields['layout']['attachment']            = array('type' => 'st--select' , 'label' => __( 'Attachment page' , 'redcodn' ), 'hint' => __( 'Layout for attachment page' , 'redcodn' ) , 'value' => $layouts , 'action' => "act.select('.attachment_layout' , { 'left' : '.attachment_sidebar' , 'right' : '.attachment_sidebar' } , 'sh_' )" , 'iclasses' => 'attachment_layout' );
    options::$fields['layout']['attachment_sidebar']    = array('type' => 'st--select' , 'hint' => __( 'Select sidebar for attachment template' , 'redcodn' ) , 'value' =>  $sidebar , 'classes' => 'attachment_sidebar' );
    if( options::get_value( 'layout' , 'attachment' ) == 'full' ){
        options::$fields['layout']['attachment_sidebar']['classes'] = 'attachment_sidebar hidden';
    }

    /* LIKES settings */

/*default values for likes*/
    
    
    
    

    options::$fields['likes']['enb_likes']            = array( 'type' => 'st--logic-radio' , 'label' => __( 'Enable Likes for posts' , 'redcodn') , 'action' => "act.check( this , { 'yes' : '.g_like , .g_l_register' , 'no' : '' } , 'sh' );" , 'iclasses' => 'g_e_likes');
    options::$default['likes']['enb_likes']           = 'yes';

    options::$fields['likes']['min_likes']            = array( 'type' => 'st--digit-like' , 'label' => __( 'Minimum number of Likes to set Featured' , 'redcodn' ) , 'hint' => __( 'Set minimum number of post likes to change it into a featured post' , 'redcodn' ) , 'id' => 'nr_min_likes' ,'action' => "act.min_likes(  jQuery( '#nr_min_likes').val() , 1 );"  );
    options::$default['likes']['min_likes']           =  50;

    options::$fields['likes']['sim_likes']            = array( 'type' => 'st--button' , 'value' => __( 'Generate' , 'redcodn' ) , 'label' => __( 'Generate random number of Likes for posts' , 'redcodn' ) , 'action' => "act.sim_likes( 1 );" , 'hint' => __( 'WARNING! This will reset all current Likes.' , 'redcodn' ) );
    options::$fields['likes']['reset_likes']          = array( 'type' => 'st--button' , 'value' => __( 'Reset' , 'redcodn' ) , 'label' => __( 'Reset likes' , 'redcodn' ) , 'action' =>"act.reset_likes(1);" , 'hint' => __( 'WARNING! This will reset all the likes for all the posts!', 'redcodn'  ) );
    
    options::$fields['likes'][ 'icons' ]            = array(
        'type' => 'st--preview-select', 'value' => array(
            'heart' => __( 'Heart', 'redcodn' ),
            'star' => __( 'Star', 'redcodn' ),
            'thumb' => __( 'Thumb', 'redcodn' )
        ),
        'label' => __( 'Icon style', 'redcodn' ),
        'action' => 'act.preview_select( this );',
        'hint' => __( 'You may choose between a heart, a star or a thumb up for "like it" icon','redcodn' )
    );
    options::$default['likes']['icons']               = 'icon-like';

    options::$fields['likes']['label']                = array(
        'type' => 'st--text', 
        'label' => __( 'Label for votes', 'redcodn' ),
        'hint' => __( 'This is used on single post page.','redcodn' )
    );
    options::$default['likes']['label']               = __(' likes','redcodn');
    
    if( options::logic( 'likes' , 'enb_likes' ) ){
        options::$fields['likes']['min_likes']['classes']     = 'g_like';
        options::$fields['likes']['sim_likes']['classes']     = 'g_like generate_likes';
        options::$fields['likes']['reset_likes']['classes']   = 'g_like reset_likes';
        options::$fields['likes']['label']['classes']         = 'g_like label';
        options::$fields['likes']['icons']['classes']         = 'g_like icons';
    }else{
        options::$fields['likes']['min_likes']['classes']     = 'g_like hidden';
        options::$fields['likes']['sim_likes']['classes']     = 'g_like generate_likes hidden';
        options::$fields['likes']['reset_likes']['classes']   = 'g_like reset_likes hidden';
        options::$fields['likes']['label']['classes']         = 'g_like label hidden';
        options::$fields['likes']['icons']['classes']         = 'g_like icons hidden';
    }

	/* STYLING DEFAULT VALUES */
    
    options::$default['styling']['logo_type']           = 'image';
    options::$default['styling']['boxed']           = 'no';
    options::$default['styling']['go_to_top']           = 'yes';
	options::$default['styling']['background_cover']           = 'yes';

    /* STYLING OPTIONS */
    
    

    /* color */
    /* background */
    $default_pattern_path = 'pattern/';

    options::$fields['styling']['post_title01']         = array('type' => 'ni--title' , 'title' => __( 'Content Style' , 'redcodn' ) );

    options::$fields['styling']['background_image']     = array( 'type' => 'st--hint' , 'value' => __( 'To set a background image go to' , 'redcodn' ) . ' <a href="themes.php?page=custom-background">' . __( 'Appearence - Background'  , 'redcodn' ) . '</a>' );

    $path_parts = pathinfo( options::get_value( 'styling' , 'favicon' ) );
    if( strlen( options::get_value( 'styling' , 'favicon' ) ) && $path_parts['extension'] != 'ico' ){
        $ico_hint = '<span style="color:#cc0000;">' . __( 'Error, please select "ico" type media file' , 'redcodn' ) . '</span>';
    }else{
        $ico_hint = __( "Please select 'ico' type media file. Make sure you allow uploading 'ico' type in General Settings -> Upload file types" , 'redcodn' );
    }

    options::$fields['styling']['favicon']              = array('type' => 'st--upload' , 'label' => __( 'Custom favicon' , 'redcodn' ) , 'id' => 'favicon_path' , 'hint' => $ico_hint );

    options::$fields['styling']['logo_delimiter_top']   = array( 'type' => 'ni--delimiter' );

    options::$fields['styling']['boxed']            = array('type' => 'st--logic-radio' , 'label' => __( 'Website boxed version ' , 'redcodn' ) , 'hint' => __( 'Enable boxed version of the website.' , 'redcodn' ) );
    options::$fields['styling']['go_to_top']            = array('type' => 'st--logic-radio' , 'label' => __( 'Enable go to top button ' , 'redcodn' ) , 'hint' => __( 'If enabled, it will show a button in the bottom-right corner for going to top of the window on click.' , 'redcodn' ) );
    options::$fields['styling']['background_cover']            = array('type' => 'st--logic-radio' , 'label' => __( 'Enable background size as cover ' , 'redcodn' ) , 'hint' => __( 'If enabled, it background will adjust to fit the screen.' , 'redcodn' ) );
    options::$fields['styling']['logo_type']            = array('type' => 'st--select' , 'label' => __( 'Logo type ' , 'redcodn' ) , 'value' => array( 'text' => 'Text logo' , 'image' => 'Image logo' ) , 'hint' => __( 'Enable text-based site title and tagline.' , 'redcodn' ) , 'action' => "act.select( '.g_logo_type' , { 'text':'.g_logo_text' , 'image':'.g_logo_image' } , 'sh_' );" , 'iclasses' => 'g_logo_type' );

    /* fields for general -> logo_type */
    options::$fields['styling']['logo_url']             = array('type' => 'st--upload' , 'label' => __( 'Custom logo URL' , 'redcodn' ) , 'id' => 'logo_path' );

    /* hide not used fields */
	if( options::get_value( 'styling' , 'logo_type') == 'image' ){
        options::$fields['styling']['logo_url']['classes'] 	= 'g_logo_image';
        text::fields( 'styling' , 'logo' ,  'g_logo_text hidden' , get_option( 'blogname' ) );
        options::$fields['styling']['hint']                 = array('type' => 'st--hint' , 'classes' => 'g_logo_text hidden' ,'value' => __( 'To change blog title go to <a href="options-general.php">General settings</a> ' , 'redcodn') );
    }else{
		options::$fields['styling']['logo_url']['classes'] 	= 'generic-hint g_logo_image hidden';
        options::$fields['styling']['post_title111']         = array('type' => 'ni--title' , 'title' => __( 'Logo Font styling' , 'redcodn' ) );
        text::fields( 'styling' , 'logo' ,  'g_logo_text' , __( 'Preview Text' , 'redcodn' ) );
        options::$fields['styling']['hint']                 = array('type' => 'st--hint' , 'classes' => 'generic-hint g_logo_text' , 'value' => __( 'To change blog title go to <a href="options-general.php">General settings </a> ' , 'redcodn') );
    }
    
           
    /* Colors DEFAULT VALUES */
    
    options::$default['colors']['content_color']        = '#444444';
    options::$default['colors']['menu_color']           = '#7e7e7e';
    options::$default['colors']['menu_color_hover']     = '#f25860';
    options::$default['colors']['submenu_color']        = '#7e7e7e';
    options::$default['colors']['submenu_color_hover']  = '#f25860';
    options::$default['colors']['submenu_bg_color']     = '#f1f1f1';

    options::$default['colors']['sticky_menu_bg_color']     = '#FFF';
    options::$default['colors']['sticky_menu_text_color']     = '#7e7e7e';

    options::$default['colors']['thumb_bg_hover']       = '#FFFFFF';
    options::$default['colors']['thumb_text_hover']     = '#69737D';
    options::$default['colors']['accent_color']         = '#f25860';
    options::$default['colors']['thumb_bg_opacity']     = '85';
    options::$default['colors']['links_color']          = '#646D77';
    options::$default['colors']['links_hover_color']    = '#3a3e42';
    options::$default['colors']['main_bg_color']    = '#f25860';
    options::$default['colors']['main_text_color']    = '#FFFFFF';

    /* Colors OPTIONS */
    options::$fields['colors']['content_color']            = array('type' => 'st--color-picker' , 'label' => __( 'Content text color' , 'redcodn' ),  'hint' => __( 'This option is applied to body text color.' , 'redcodn' ));    
    options::$fields['colors']['menu_color']               = array('type' => 'st--color-picker' , 'label' => __( 'Menu links color' , 'redcodn' ),  'hint' => __( 'Main menu link color' , 'redcodn' ));
    options::$fields['colors']['menu_color_hover']         = array('type' => 'st--color-picker', 'hint' => __( 'Main menu link hover color' , 'redcodn' ));
    options::$fields['colors']['submenu_color']            = array('type' => 'st--color-picker' , 'label' => __( 'Submenu Links Color' , 'redcodn' ),  'hint' => __( 'Submenu link color' , 'redcodn' ));
    options::$fields['colors']['submenu_color_hover']      = array('type' => 'st--color-picker', 'hint' => __( 'Submenu link hover color' , 'redcodn' ));
    options::$fields['colors']['submenu_bg_color']         = array('type' => 'st--color-picker' , 'label' => __( 'Submenu Background Color' , 'redcodn' ),  'hint' => __( 'Submenu background color' , 'redcodn' ));
    options::$fields['colors']['sticky_menu_bg_color']         = array('type' => 'st--color-picker' , 'label' => __( 'Sticky menu color' , 'redcodn' ),  'hint' => __( 'Change the background of the sticky menu' , 'redcodn' ));
    options::$fields['colors']['sticky_menu_text_color']         = array('type' => 'st--color-picker',  'hint' => __( 'Change the text color of the sticky menu' , 'redcodn' ));
    options::$fields['colors']['accent_color']             = array('type' => 'st--color-picker', 'label' => __( 'Accent color' , 'redcodn' ), 'hint' => __( 'Accent color. This is used on the entire website for details like the dotted delimiters for the views, etc.' , 'redcodn' ));
    options::$fields['colors']['links_color']              = array('type' => 'st--color-picker' , 'label' => __( 'Links color' , 'redcodn' ),  'hint' => __( 'Links color' , 'redcodn' ));
    options::$fields['colors']['links_hover_color']        = array('type' => 'st--color-picker' ,  'hint' => __( 'Links hover color' , 'redcodn' ));
    options::$fields['colors']['main_bg_color']        = array('type' => 'st--color-picker' , 'label' => __( 'Main color' , 'redcodn' ),  'hint' => __( 'The main color of the website' , 'redcodn' ));
    options::$fields['colors']['main_text_color']        = array('type' => 'st--color-picker' , 'hint' => __( 'Color of the text for where is text over the main color' , 'redcodn' ));
    options::$fields['colors']['thumb_bg_hover']           = array('type' => 'st--color-picker' , 'label' => __( 'Thumbnail background color settings' , 'redcodn' ),  'hint' => __( 'Thumbnail hover background color' , 'redcodn' ));
    options::$fields['colors']['thumb_text_hover']         = array('type' => 'st--color-picker', 'hint' => __( 'Thumbnail hover text color' , 'redcodn' ));
    options::$fields['colors']['thumb_bg_opacity']         = array('type' => 'st--slider', 'hint' => __( 'Thumbnail hover opacity' , 'redcodn' ));

    /* Typography DEFAULT VALUES */

    options::$fields['typography']['typo_01']                 = array('type' => 'ni--title' , 'title' => __( 'General Font' , 'redcodn' ) );
    text::fields( 'typography' , 'general_font' ,  'general_font' , __( 'Preview Text' , 'redcodn' ), array( 'Arvo' , 14 , 'normal' ) );

    options::$fields['typography']['typo_02']                 = array('type' => 'ni--title' , 'title' => __( 'H1 Font' , 'redcodn' ) );
    text::fields( 'typography' , 'h1_font' ,  'h1_font' , __( 'Preview Text' , 'redcodn' ), array( 'Corben' , 36 , 'normal' ) );

    options::$fields['typography']['typo_03']                 = array('type' => 'ni--title' , 'title' => __( 'H2 Font' , 'redcodn' ) );
    text::fields( 'typography' , 'h2_font' ,  'h2_font' , __( 'Preview Text' , 'redcodn' ), array( 'Corben' , 32 , 'normal' ) );

    options::$fields['typography']['typo_04']                 = array('type' => 'ni--title' , 'title' => __( 'H3 Font' , 'redcodn' ) );
    text::fields( 'typography' , 'h3_font' ,  'h3_font' , __( 'Preview Text' , 'redcodn' ), array( 'Corben' , 24 , 'normal' ) );

    options::$fields['typography']['typo_05']                 = array('type' => 'ni--title' , 'title' => __( 'H4 Font' , 'redcodn' ) );
    text::fields( 'typography' , 'h4_font' ,  'h4_font' , __( 'Preview Text' , 'redcodn' ), array( 'Calligraffitti' , 16 , 'normal' ) );

    options::$fields['typography']['typo_06']                 = array('type' => 'ni--title' , 'title' => __( 'H5 Font' , 'redcodn' ) );
    text::fields( 'typography' , 'h5_font' ,  'h5_font' , __( 'Preview Text' , 'redcodn' ),  array( 'Montserrat' , 14 , 'normal' ) );

    options::$fields['typography']['typo_07']                 = array('type' => 'ni--title' , 'title' => __( 'Navigation Font' , 'redcodn' ) );
    text::fields( 'typography' , 'navigation_font' ,  'navigation_font' , __( 'Preview Text' , 'redcodn' ), array( 'Raleway' , 15 , 'thin' ), __('Choose a font for your navigation', 'redcodn') );


    /* image size manager */
    options::$default['imagesizes']['slideshow_width']      = '1920';
    options::$fields['imagesizes']['slideshow_width'] = array('type' => 'st--digit' , 'label' => __( 'Slideshow  - image width ' , 'redcodn' ), 'hint' => __( 'The width of the Slideshow image, 1170px by default' , 'redcodn' ) );
    /*400*/
    options::$default['imagesizes']['slideshow_height']      = '500';
    options::$fields['imagesizes']['slideshow_height'] = array('type' => 'st--digit' , 'label' => __( 'Slideshow - image height' , 'redcodn' ), 'hint' => __( 'The height of the Slideshow image, 400px by default.' , 'redcodn' ) );
    options::$fields['imagesizes']['delimiter_2']             = array( 'type' => 'ni--delimiter' );

    /*9999 tsingle_gallery*/
    options::$default['imagesizes']['single_gallery_width']      = '9999';
    options::$fields['imagesizes']['single_gallery_width'] = array('type' => 'st--digit' , 'label' => __( 'Gallery - image width' , 'redcodn' ), 'hint' => __( 'Gallery images width. 9999 means it will be resized proportionaly by height. We strongly recommend not to change this size.' , 'redcodn' ) );
    /*900*/
    options::$default['imagesizes']['single_gallery_height']      = '700';
    options::$fields['imagesizes']['single_gallery_height'] = array('type' => 'st--digit' , 'label' => __( 'Gallery - image height' , 'redcodn' ), 'hint' => __( 'Gallery images height. 900px by default.' , 'redcodn' ) );
    options::$fields['imagesizes']['delimiter_1']             = array( 'type' => 'ni--delimiter' );
    /*9999 t_gallery*/
    options::$default['imagesizes']['gallery_format_slider_width']      = '9999';
    options::$fields['imagesizes']['gallery_format_slider_width'] = array('type' => 'st--digit' , 'label' => __( 'Post-format Gallery  - image width ' , 'redcodn' ), 'hint' => __( 'Blog posts images width for gallery post-format. 9999 means it will be resized proportionaly by height. We strongly recommend not to change this size.' , 'redcodn' ) );
    /*400*/
    options::$default['imagesizes']['gallery_format_slider_height']      = '600';
    options::$fields['imagesizes']['gallery_format_slider_height'] = array('type' => 'st--digit' , 'label' => __( 'Post-format Gallery - image height' , 'redcodn' ), 'hint' => __( 'Blog posts images height for gallery post-format. 400px by default.' , 'redcodn' ) );
    options::$fields['imagesizes']['delimiter_2']             = array( 'type' => 'ni--delimiter' );
    /*265 t_attached_gallery*/
    options::$default['imagesizes']['image_format_width']      = '265';
    options::$fields['imagesizes']['image_format_width'] = array('type' => 'st--digit' , 'label' => __( 'Post-format Image - image width' , 'redcodn' ), 'hint' => __( 'Blog posts images width for image post-format. 265px by default.' , 'redcodn' ) );
    /*165*/
    options::$default['imagesizes']['image_format_height']      = '165';
    options::$fields['imagesizes']['image_format_height'] = array('type' => 'st--digit' , 'label' => __( 'Post-format Image - image height' , 'redcodn' ), 'hint' => __( 'Blog posts images height for image post format. 165px by default.' , 'redcodn' ) );
    options::$fields['imagesizes']['delimiter_3']             = array( 'type' => 'ni--delimiter' );
    /*640 tlist_view*/
    options::$default['imagesizes']['list_view_width']      = '760';
    options::$fields['imagesizes']['list_view_width'] = array('type' => 'st--digit' , 'label' => __( 'List-view - image width' , 'redcodn' ), 'hint' => __( 'Archives images width for list-view. 640px by default.' , 'redcodn' ) );
    /*340*/
    options::$default['imagesizes']['list_view_height']      = '405';
    options::$fields['imagesizes']['list_view_height'] = array('type' => 'st--digit' , 'label' => __( 'List-view - image height' , 'redcodn' ), 'hint' => __( 'Archives images height for list-view. 340px by default.' , 'redcodn' ) );
    options::$fields['imagesizes']['delimiter_4']             = array( 'type' => 'ni--delimiter' );
    
    /*720 'tlist' */   /* used for grid, thumb view - crop */
    options::$default['imagesizes']['grid_big_width']      = '720';
    options::$fields['imagesizes']['grid_big_width'] = array('type' => 'st--digit' , 'label' => __( 'Grid/thumb-view - image width' , 'redcodn' ), 'hint' => __( 'Archives images width for grid, thumb (the big square image). 720px by default.' , 'redcodn' ) );
    /*720*/
    options::$default['imagesizes']['grid_big_height']      = '555';
    options::$fields['imagesizes']['grid_big_height'] = array('type' => 'st--digit' , 'label' => __( 'Grid/thumb-view - image height' , 'redcodn' ), 'hint' => __( 'Archives images height for grid, thumb (the big square image). 555px by default.' , 'redcodn' ) );
    options::$fields['imagesizes']['delimiter_7']             = array( 'type' => 'ni--delimiter' );

    /*products image size 'tlist' */   /* used for products, cropped */
    options::$default['imagesizes']['product_grid_width']      = '500';
    options::$fields['imagesizes']['product_grid_width'] = array('type' => 'st--digit' , 'label' => __( 'Product grid - image width' , 'redcodn' ), 'hint' => __( 'Archives images width for product grids, 500px by default.' , 'redcodn' ) );
    /*720*/
    options::$default['imagesizes']['product_grid_height']      = '650';
    options::$fields['imagesizes']['product_grid_height'] = array('type' => 'st--digit' , 'label' => __( 'Product grid - image height' , 'redcodn' ), 'hint' => __( 'Archives images height for product grids, 800px by default.' , 'redcodn' ) );
    options::$fields['imagesizes']['delimiter_7']             = array( 'type' => 'ni--delimiter' );
    
    /*'1170 single featured cropped'   */ /* used on single page when cropped version is selected from theme options */
    options::$default['imagesizes']['single_resized_width']      = '1170';
    options::$fields['imagesizes']['single_resized_width'] = array('type' => 'st--digit' , 'label' => __( 'Single page thumbnails, resized version - image width' , 'redcodn' ), 'hint' => __( 'Featured image width for single blog post when using resized-version (settable in general options). 1170px by default.' , 'redcodn' ) );
    /*9999*/
    options::$default['imagesizes']['single_resized_height']      = '9999';
    options::$fields['imagesizes']['single_resized_height'] = array('type' => 'st--digit' , 'label' => __( 'Single page thumbnails, resized version - image height' , 'redcodn' ), 'hint' => __( 'Featured image height for single blog post when using resized-version (settable in general options). 9999 means  it will be resized proportionaly by width. We strongly recommend not to change this size.' , 'redcodn' ) );
    //options::$fields['imagesizes']['delimiter_99']           = array( 'type' => 'ni--delimiter' );


    /* HEADER OPTIONS*/
    $header_option = array('header_style1' => 'h_style1.png', 'header_style2' => 'h_style2.png', 'header_style3' => 'h_style3.png');
    $header_menu_style = array('top' => 'menu_style1.png', 'middle' => 'menu_style2.png', 'bottom' => 'menu_style3.png');
    $header_fullscreen_style = array('none' => 'Normal header', 'homepage' => 'Fullscreen homepage', 'website' => 'The whole website');
    $header_bg_pages = array('all' => 'All pages', 'homepage' => 'For homepage only');
    $header_content_bg_pages = array('none' => 'None', 'all' => 'All pages', 'homepage' => 'For homepage only');

    options::$fields['header_settings']['post_title01']           = array('type' => 'ni--title' , 'title' => __( 'Logo & Navigation' , 'redcodn' ) );
    options::$fields['header_settings']['header_logo_style']      = array('type' => 'st--radio-icon' , 'value' => $header_option , 'path' => $default_pattern_path , 'in_row' => 3, 'hint' => __('Choose your Logo and Navigation layout.', 'redcodn') );
    options::$fields['header_settings']['header_menu_style']      = array('type' => 'st--radio-icon' , 'value' => $header_menu_style, 'path' => $default_pattern_path, 'in_row' => 3, 'label' => __( 'Menu position' , 'redcodn' ) , 'hint' => __('Choose your menu position. You can place your menu either above the header either inside it.', 'redcodn') );
    //options::$fields['imagesizes']['delimiter_99']           = array( 'type' => 'ni--delimiter' );
    options::$fields['header_settings']['header_full_screen']      = array('type' => 'st--select' ,'value' => $header_fullscreen_style , 'label' => __( 'Header full-screen mode' , 'redcodn' ) , 'hint' => __('Extern header on full-screen.', 'redcodn') );
    
    options::$fields['header_settings']['header_bg_color']        = array('type' => 'st--color-picker' , 'label' => __( 'Header background color' , 'redcodn' ),  'hint' => __( 'Select header background color' , 'redcodn' ));
    options::$default['header_settings']['header_bg_color']    = '#FFF';
    options::$fields['header_settings']['header_bg_image']             = array('type' => 'st--upload' , 'label' => __( 'Header background image' , 'redcodn' ) , 'id' => 'header_bg_path' );
    options::$fields['header_settings']['header_bg_cover']      = array('type' => 'st--logic-radio' ,  'label' => __( 'Use header image background as cover' , 'redcodn' ) , 'hint' => __('If enabled, it will scale you image to fit to header size.', 'redcodn') );
    options::$fields['header_settings']['header_bg_pages']      = array('type' => 'st--select' , 'value' => $header_bg_pages,  'label' => __( 'Background use' , 'redcodn' ) , 'hint' => __('Choose the pages on which your background will be active.', 'redcodn') );
    options::$fields['header_settings']['header_bg_video']             = array('type' => 'st--upload' , 'label' => __( 'Header video background' , 'redcodn' ) , 'id' => 'header_bg_video_path' );
    options::$fields['header_settings']['header_mask']      = array('type' => 'st--logic-radio' ,  'label' => __( 'Enable mask inside header over the background' , 'redcodn' ) , 'hint' => __('If enabled, it will show mask over the header background.', 'redcodn') );
    options::$fields['header_settings']['header_mask_color']         = array('type' => 'st--color-picker', 'hint' => __( 'Header mask color' , 'redcodn' ));
    options::$fields['header_settings']['header_mask_opacity']         = array('type' => 'st--slider', 'hint' => __( 'Header mask hover opacity' , 'redcodn' ));
    options::$fields['header_settings']['header_content_bgcolor']         = array('type' => 'st--color-picker', 'label' => 'Header content background', 'hint' => __( 'Header content area background color. Use this with fullscreen header options for best effect.' , 'redcodn' ));
    options::$fields['header_settings']['header_content_opacity']         = array('type' => 'st--slider', 'hint' => __( 'Header content area background opacity' , 'redcodn' ));
    options::$fields['header_settings']['header_content_pages']      = array('type' => 'st--select' , 'value' => $header_content_bg_pages,  'label' => __( 'Background use' , 'redcodn' ) , 'hint' => __('Choose the pages on which your background will be active.', 'redcodn') );
    options::$fields['header_settings']['header_sticky_menu']      = array('type' => 'st--logic-radio' ,  'label' => __( 'Enable sticky menu' , 'redcodn' ) , 'hint' => __('If enabled, when scrolling down it will activate the sticky menu.', 'redcodn') );
    options::$fields['header_settings']['header_social_icons']      = array('type' => 'st--logic-radio' ,  'label' => __( 'Enable social icons in header' , 'redcodn' ) , 'hint' => __('If disabled, it will hide the social icons in header.', 'redcodn') );
    options::$fields['header_settings']['header_searchbar']      = array('type' => 'st--logic-radio' ,  'label' => __( 'Enable the searchbar in header' , 'redcodn' ) , 'hint' => __('If disabled, it will hide the the searchbar in header.', 'redcodn') );
    options::$fields['header_settings']['header_textarea']      = array('type' => 'st--textarea' ,  'label' => __( 'The text to include in the middle of the header' , 'redcodn' ) , 'hint' => __('If you write something here, it will be shown in the middle of your header (Only available with fullscreen header). You can use HTML tags to put your text here.', 'redcodn') );
    if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
        options::$fields['header_settings']['header_minicart']      = array('type' => 'st--logic-radio' ,  'label' => __( 'Enable the mini-cart in header (for WooCommerce)' , 'redcodn' ) , 'hint' => __('If disabled, it will hide the the mini-cart in header. Comes if WooCommerce is active.', 'redcodn') );
    }
    
    
    /* HEADER DEFAULT VALUE */
    options::$default['header_settings']['header_logo_style']  = 'header_style3';
    options::$default['header_settings']['header_menu_style']  = 'top';
    options::$default['header_settings']['header_full_screen']  = 'no';
    options::$default['header_settings']['header_bg_pages']  = 'no';
    options::$default['header_settings']['header_bg_cover']  = 'yes';
    options::$default['header_settings']['header_social_icons']  = 'no';
    options::$default['header_settings']['header_searchbar']  = 'no';
    options::$default['header_settings']['header_sticky_menu']  = 'yes';
    options::$default['header_settings']['header_mask']  = 'no';
    options::$default['header_settings']['header_mask_color']  = '#000';
    options::$default['header_settings']['header_mask_opacity']  = '60';
    options::$default['header_settings']['header_content_bgcolor']  = '#000000';
    options::$default['header_settings']['header_content_opacity']  = '0';
    options::$default['header_settings']['header_content_pages']  = 'all';
    options::$default['header_settings']['header_textarea']  = '';
    options::$default['header_settings']['header_minicart']  = 'yes';
    
    /* EOF HEADER OPTIONS*/

    /* FOOTER OPTIONS*/
    options::$fields['footer_settings']['footer_bg_color']        = array('type' => 'st--color-picker' , 'label' => __( 'Footer background color' , 'redcodn' ),  'hint' => __( 'Select footer background color' , 'redcodn' ));
    options::$default['footer_settings']['footer_bg_color']       = '#f5f6f7';

    options::$fields['footer_settings']['footer_text_color']        = array('type' => 'st--color-picker' , 'label' => __( 'Footer text color' , 'redcodn' ),  'hint' => __( 'Select footer text color' , 'redcodn' ));
    options::$default['footer_settings']['footer_text_color']       = '#7e7e7e';

    options::$fields['footer_settings']['footer_bg']             = array('type' => 'st--upload' , 'label' => __( 'Footer image background' , 'redcodn' ) , 'id' => 'footer_bg_path' );
    options::$default['footer_settings']['footer_bg']       = '';

    options::$fields['footer_settings']['footer_bg_cover']           = array('type' => 'st--logic-radio' , 'label' => __( 'Make footer background as cover<img src="http://www.lolinez.com/sw.jpg">' , 'redcodn' ) , 'hint' => __( 'If activated, it will fit the image to the container size' , 'redcodn' ) );
    options::$default['footer_settings']['footer_bg_cover']        = 'yes';

    /* EOF FOOTER OPTIONS*/

    /* POSTS OPTIONS */
    $default_blog_listing_layout = array('list' => 'list.jpg', 'thumb' => 'thumb.jpg', 'grid' => 'grid.jpg');
    $default_blog_post_layout = array('left' => 'left.jpg', 'center' => 'center.jpg');

    options::$fields['content_settings']['post_title04']           = array('type' => 'ni--title' , 'title' => __( 'Blog Post Layout' , 'redcodn' ) );
    options::$fields['content_settings']['blog_post_layout']       = array('type' => 'st--radio-icon' , 'value' => $default_blog_post_layout , 'path' => $default_pattern_path , 'in_row' => 3, 'hint' => __('Choose your blog content position.', 'redcodn') );
    options::$default['content_settings']['blog_post_layout']      = 'center';

    options::$fields['content_settings']['post_title05']           = array('type' => 'ni--title' , 'title' => __( 'Blog Listing Layout ( View type )' , 'redcodn' ) );
    options::$fields['content_settings']['blog_listing_layout']    = array('type' => 'st--radio-icon' , 'value' => $default_blog_listing_layout , 'path' => $default_pattern_path , 'in_row' => 3, 'hint' => __('Choose your blog layout. You can 3 options: List, Thumbnails and Grid.', 'redcodn') );
    options::$default['content_settings']['blog_listing_layout']   = 'list';

    options::$fields['content_settings']['post_title06']           = array('type' => 'ni--title' , 'title' => __( 'Archive Listing Layout ( View type )' , 'redcodn' ) );
    options::$fields['content_settings']['archive_listing_layout'] = array('type' => 'st--radio-icon' , 'value' => $default_blog_listing_layout , 'path' => $default_pattern_path , 'in_row' => 3, 'hint' => __('Choose your archive layout. You can 3 options: List, Thumbnails and Grid.', 'redcodn') );
    options::$default['content_settings']['archive_listing_layout']= 'list';

    options::$fields['content_settings']['post_title07']           = array('type' => 'ni--title' , 'title' => __( 'Blog Grid/Thumbnail Layout' , 'redcodn' ) );
    $default_blog_grid_layout = array('grid1' => 'grid_01.png', 'grid2' => 'grid_02.png', 'grid3' => 'grid_03.png');
    options::$fields['content_settings']['blog_grid_layout']       = array('type' => 'st--radio-icon' , 'value' => $default_blog_grid_layout , 'path' => $default_pattern_path , 'in_row' => 4, 'hint' => __('Select number of articles to show per row (line)', 'redcodn') );
    options::$default['content_settings']['blog_grid_layout']      = 'grid2';

    
    options::$fields['blog_post']['post_title0']            = array('type' => 'ni--title' , 'title' => __( 'General Posts Settings' , 'redcodn' ) );

    options::$fields['blog_post']['show_similar']           = array('type' => 'st--logic-radio' , 'label' => __( 'Enable similar posts' , 'redcodn' ), 'action' => "act.check( this , { 'yes' : '.similar_type_class ' , 'no' : '' } , 'sh' );" );
    options::$default['blog_post']['show_similar']        = 'yes';

	$similar_type_options = array('post_tag'=>__('Same tags','redcodn'), 'category'=> __('Same category','redcodn'));

	options::$fields['blog_post']['similar_type']           = array('type' => 'st--select' , 'value' => $similar_type_options , 'label' => __( 'Similar posts criteria' , 'redcodn' ) );
    options::$default['blog_post']['similar_type']        = 'post_tag';
    options::$fields['blog_post']['similar_delimiter']      = array( 'type' => 'ni--delimiter' );

    options::$fields['blog_post']['enb_lightbox']           = array('type' => 'st--logic-radio' , 'label' => __( 'Enable pretty-photo ligthbox' , 'redcodn' ) , 'hint' => __( 'Images inside posts will open inside a fancy lightbox' , 'redcodn' ) );
    options::$default['blog_post']['enb_lightbox']        = 'yes';

    options::$fields['blog_post']['post_sharing']           = array('type' => 'st--logic-radio' , 'label' => __( 'Enable social sharing for posts' , 'redcodn' ) );
    options::$default['blog_post']['post_sharing']        = 'yes';

    options::$fields['blog_post']['author_box']             = array('type' => 'st--logic-radio' , 'label' => __( 'Enable author box' , 'redcodn' ), 'hint' => __( 'Show author box on single post' , 'redcodn' ) );
    options::$default['blog_post']['author_box']          = 'yes';

    options::$fields['blog_post']['breadcrumbs']            = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show breadcrumbs' , 'redcodn') );
    options::$default['blog_post']['breadcrumbs']         = 'no';

    options::$fields['blog_post']['meta']                   = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show entry meta' , 'redcodn' ) , 'hint' => __( ' In blog / archive / search / tag / category page' , 'redcodn' ), 'action' => "act.check( this , { 'yes' : '.meta_view ' , 'no' : '' } , 'sh' );" );
    options::$default['blog_post']['meta']                = 'yes';

    options::$fields['blog_post']['video_single_extent']                   = array( 'type' => 'st--logic-radio' , 'label' => __( 'Extend video on fullwidth for video post single page' , 'redcodn' ) , 'hint' => __( ' In single video post, the video container will be extended to fullwidth if active.' , 'redcodn' ) );
    options::$default['blog_post']['video_single_extent']                = 'no';

    options::$fields['blog_post']['video_single_content']                   = array( 'type' => 'st--logic-radio' , 'label' => __( 'Hide content for video post' , 'redcodn' ) , 'hint' => __( ' If active, the content will be hidden by default. You will have to press the more info button to see the content.' , 'redcodn' ) );
    options::$default['blog_post']['video_single_content']                = 'no';

    options::$fields['blog_post']['gallery_single_content']                   = array( 'type' => 'st--logic-radio' , 'label' => __( 'Hide content for gallery post' , 'redcodn' ) , 'hint' => __( ' If active, the content will be hidden by default. You will have to press the more info button to see the content.' , 'redcodn' ) );
    options::$default['blog_post']['gallery_single_content']                = 'no';

    options::$fields['blog_post']['time']                   = array( 'type' => 'st--logic-radio' , 'label' => __( 'Use human time' , 'redcodn') ,  'hint' => __( 'If set No will use WordPress time format'  , 'redcodn' ) );
    options::$default['blog_post']['time']                = 'yes';

    options::$fields['blog_post']['fb_comments']            = array( 'type' => 'st--logic-radio' , 'label' => __( 'Use Facebook comments' , 'redcodn' ), 'action' => "act.check( this , { 'yes' : '.fb_app_id ' , 'no' : '' } , 'sh' );" );
    options::$default['blog_post']['fb_comments']         = 'yes';

    options::$fields['blog_post']['fb_app_id_note']         = array( 'type' => 'st--hint' , 'value' => __( 'You can set Facebook application ID' , 'redcodn' ) . ' <a href="admin.php?page=redcodn__social">' . __( 'here' , 'redcodn') . '</a> ' );
    
    if( options::logic( 'blog_post' , 'fb_comments' ) ){
        options::$fields['blog_post']['fb_app_id_note']['classes']     = 'fb_app_id';
    }else{
        options::$fields['blog_post']['fb_app_id_note']['classes']     = 'fb_app_id hidden';
    }
    options::$fields['blog_post']['facebook_delimiter']   = array( 'type' => 'ni--delimiter' );

    options::$fields['blog_post']['post_title1']        = array('type' => 'ni--title' , 'title' => __( 'General Page Settings' , 'redcodn' ) );
    options::$fields['blog_post']['page_sharing']       = array('type' => 'st--logic-radio' , 'label' => __( 'Enable social sharing for page' , 'redcodn' ) );
    options::$default['blog_post']['page_sharing']        = 'no';
    
    /* POSTS DEFAULT VALUE */
    
    
    

	if( options::logic( 'blog_post' , 'show_similar' ) ){
		options::$fields['blog_post']['similar_type']['classes']     = 'similar_type_class';
    }else{ 
		options::$fields['blog_post']['similar_type']['classes']     = 'similar_type_class hidden';
    }

    /* SOCIAL OPTIONS */
    
    options::$fields['social']['facebook_app_id']       = array('type' => 'st--text' , 'label' => __( 'Facebook Application ID' , 'redcodn' ) , 'hint' => __( 'You can create a fb application from <a href="https://developers.facebook.com/apps">here</a>' , 'redcodn' ) );
    options::$fields['social']['facebook_secret']       = array('type' => 'st--text' , 'label' => __( 'Facebook Secret key' , 'redcodn' ) , 'hint' => __( 'Needed for Facebook Connect' , 'redcodn' ) );

    options::$default[ 'social' ][ 'rss' ]              = 'yes';


    options::$fields[ 'social' ][ 'rss' ]               = array('type' => 'st--logic-radio' , 'label' => __( 'Show RSS icon' , 'redcodn' ) );
    options::$fields['social']['facebook']              = array('type' => 'st--text' , 'label' => __( 'Facebook profile ID' , 'redcodn' ), 'hint' => __( '(i.e. redcodn)' , 'redcodn' )  );
    options::$fields['social']['twitter']               = array('type' => 'st--text' , 'label' => __( 'Twitter ID' , 'redcodn' ), 'hint' => __( '(i.e. redcodn)' , 'redcodn' ) );

    options::$fields['social']['gplus']                 = array('type' => 'st--text' , 'label' => __( 'G+ public profile URL' , 'redcodn' ), 'hint' => __( '(i.e. https://plus.google.com/u/0/107285294994146126204)' , 'redcodn' ) );
    options::$fields['social']['yahoo']                 = array('type' => 'st--text' , 'label' => __( 'Yahoo public profile URL' , 'redcodn' ), 'hint' => __( '(i.e. http://profile.yahoo.com/56W6RLSUQBHREPTDQW4U/)' , 'redcodn' ) );
    options::$fields['social']['dribbble']              = array('type' => 'st--text' , 'label' => __( 'Dribbble public profile URL' , 'redcodn' ), 'hint' => __( '(i.e. http://dribbble.com/redcodn)' , 'redcodn' ) );
    options::$fields['social']['linkedin']              = array('type' => 'st--text' , 'label' => __( 'LinkedIn public profile URL' , 'redcodn' ) , 'hint' => __( '(i.e. http://www.linkedin.com/company/redcodn)' , 'redcodn' ) );

    options::$fields['social']['vimeo']                 = array('type' => 'st--text' , 'label' => __( 'Vimeo public profile URL' , 'redcodn' ) , 'hint' => __( '(i.e. http://vimeo.com/user9316982)' , 'redcodn' ) );
    options::$fields['social']['youtube']               = array('type' => 'st--text' , 'label' => __( 'Youtube public profile URL' , 'redcodn' ) , 'hint' => __( '(i.e. http://www.youtube.com/user/redcodn)' , 'redcodn' ) );
    options::$fields['social']['tumblr']                = array('type' => 'st--text' , 'label' => __( 'Tumblr public profile URL' , 'redcodn' ) , 'hint' => __( '(i.e. http://redcodn.tumblr.com/)' , 'redcodn' ) );
    options::$fields['social']['delicious']             = array('type' => 'st--text' , 'label' => __( 'Delicious public profile URL' , 'redcodn' ) , 'hint' => __( '(i.e. https://delicious.com/redcodn)' , 'redcodn' ) );
    options::$fields['social']['flickr']                = array('type' => 'st--text' , 'label' => __( 'Flickr public profile URL' , 'redcodn' ) , 'hint' => __( '(i.e. http://www.flickr.com/photos/redcodn/)' , 'redcodn' ) );
    options::$fields['social']['instagram']             = array('type' => 'st--text' , 'label' => __( 'Instagram public profile URL' , 'redcodn' ) , 'hint' => __( '(i.e. http://instagram.com/yourname)' , 'redcodn' ) );
    options::$fields['social']['pinterest']             = array('type' => 'st--text' , 'label' => __( 'Pinterest public profile URL' , 'redcodn' ) , 'hint' => __( '(i.e. http://pinterest.com/redcodn)' , 'redcodn' ) );

    options::$fields['social']['email']                 = array('type' => 'st--text' , 'label' => __( 'Contact email' , 'redcodn' )  );
    options::$fields['social']['skype']                 = array('type' => 'st--text' , 'label' => __( 'Skype Name' , 'redcodn' )  );



    options::$default[ 'styling' ][ 'logo_type' ]       = 'image';


    /*options::$fields['social']['linkedin']              = array('type' => 'st--text' , 'label' => __( 'LinkedIn public profile URL' , 'redcodn' ) , 'hint' => __( '(i.e. http://www.linkedin.com/company/redcodn)' , 'redcodn' ) );
    options::$fields['social']['email']                 = array('type' => 'st--text' , 'label' => __( 'Contact email' , 'redcodn' )  );
    options::$fields['social']['flickr']                = array('type' => 'st--text' , 'label' => __( 'Flickr ID' , 'redcodn' ) , 'hint' => __( 'Insert your Flickr ID (<a target="_blank" href="http://www.idgettr.com">idGettr</a>)' , 'redcodn' ) );
    */
       
    /* sidebar manager */
    $struct = array(
        'layout' => 'A',
        'check-column' => array(
            'name' => 'idrow[]',
            'type' => 'hidden'
        ),
        'info-column-0' => array(
            0 => array(
                'name' => 'title',
                'type' => 'text',
                'label' => 'Sidebar Title',
                'classes' => 'sidebar-title'
            )
        ),
        'select' => 'title',
        'actions' => array( 'sortable' => true )
    );

    /* delete_option( '_sidebar' ); */
    
    options::$fields['_sidebar']['idrow']               = array('type' => 'st--m-hidden' , 'value' => 1 , 'id' => 'sidebar_title_id' , 'single' => true );
    options::$fields['_sidebar']['title']               = array('type' => 'st--text' , 'label' => __( 'Set title for new sidebar','redcodn' ) , 'id' => 'sidebar_title' , 'single' => true );
    options::$fields['_sidebar']['save']                = array('type' => 'st--button' , 'value' => 'Add new sidebar' , 'action' => "extra.add( '_sidebar' , { 'input' : [ 'sidebar_title_id' , 'sidebar_title'] })" );

    options::$fields['_sidebar']['struct']              = $struct;
    options::$fields['_sidebar']['hint']                = __( 'List of generic dynamic sidebars<br />Drag and drop blocks to rearrange position' , 'redcodn' );

    options::$fields['_sidebar']['list']                = array( 'type' => 'ex--extra' , 'cid' => 'container__sidebar');
    
    /* Custom css */
    options::$fields['custom_css']['css']               = array('type' => 'st--textarea' , 'label' => __( 'Add your custom CSS' , 'redcodn' )  );
    

    /*redcodn options*/

    if( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'redcodn__io' ){
        $export = array();
        foreach( options::$menu['redcodn'] as $option_name => $whatever ){
            $export[$option_name] = get_option( $option_name );
        }
        $exportdata = base64_encode( json_encode( $export ) );
    }else{
        $exportdata = '';
    }

    options::$fields[ 'io' ][ 'warning' ] = array(
        'type' => 'cd--whatever',
        'content' => '<h2 class="import-warning">' . __( 'Warning! You WILL lose all your current settings FOREVER', 'redcodn' ) . '<br>'
            . __( 'if you paste the import data and click "Update settings".', 'redcodn' ) . '<br>'
            . __( 'Double check everything!', 'redcodn' ) . '</h2><b class="import-warning">' . __( 'Please check settings where pages are assigned. If there is something wrong set them manually.', 'redcodn' ) . '</b><div class="clear">&nbsp;</div>'
    );

    options::$fields[ 'io' ][ 'export' ] = array(
        'label' => __( 'This is the export data', 'redcodn' ),
        'hint' => __( 'Just copy-paste it', 'redcodn' ),
        'type' => 'st--textarea',
        'value' => $exportdata
    );

    options::$fields[ 'io' ][ 'import' ] = array(
        'label' => __( 'This is the import zone', 'redcodn' ),
        'hint' => __( 'Paste the import data here', 'redcodn' ),
        'type' => 'st--textarea',
        'value' => ''
    );

    // this renders Button that installs dummy data
    /*options::$fields[ 'io' ][ 'install_dummy_data' ] = array(
        //'label' => __( 'This is the import zone', 'redcodn' ),
        'hint' => __( 'If you are new to wordpress or have problems creating posts or pages that look like the theme preview you can import dummy posts and pages here that will definitely help to understand how those tasks are done.', 'redcodn' ),
        'type' => 'st--install_dummy_data',
        'value' => ''
    );*/

    if( isset( $_POST[ 'io' ] ) && isset( $_POST[ 'io' ][ 'import' ] ) && strlen( trim( $import = $_POST[ 'io' ][ 'import' ] ) ) ){
        $import = @json_decode( base64_decode( $import ),true );
        if( is_array( $import ) && count( $import ) ){
            foreach( $import as $name => $value ){
                update_option( $name, $value );
            }
        }
    }
    
    options::$register['redcodn']                   = options::$fields;
?>