<?php 
    $fb_id = options::get_value( 'social' , 'facebook' );
    if( strlen( trim( $fb_id ) ) ){
        $fb['likes'] = social::pbd_get_transient($name = 'facebook',$user_id=$fb_id,$cacheTime = 120); /*cache - in minutes*/
        $fb['link'] = 'http://facebook.com/people/@/'  . $fb_id ;
    }
?>  
<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9 oldie" lang="en"> <![endif]-->
<?php
    function is_facebook(){
        if(!(stristr($_SERVER["HTTP_USER_AGENT"],'facebook') === FALSE)) {
            return true;
        }
    }
?>
<!--[if gt IE 8]><!--> <html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> <?php if(is_facebook()){ echo ' xmlns:fb="http://ogp.me/ns/fb#" ';} ?> ><!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="robots"  content="index, follow" />
    
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>" /> 
    <?php if( is_single() || is_page() ){ ?>
        <meta property="og:title" content="<?php the_title() ?>" />
        <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
        <meta property="og:url" content="<?php the_permalink() ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:description" content="<?php echo get_the_excerpt(); ?>"/>
        <?php 
            if(options::get_value( 'social' , 'facebook_app_id' ) != ''){
                ?><meta property='fb:app_id' content='<?php echo options::get_value( 'social' , 'facebook_app_id' ); ?>'><?php
            }
            
            global $post;
            $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post -> ID ) , 'thumbnail' );
            
            if(strlen($src[0])){
                echo '<meta property="og:image" content="'.$src[0].'"/>'; 
                echo ' <link rel="image_src" href="'.$src[0].'" />';               
            }else{
                echo '<meta property="og:image" content="'.get_template_directory_uri().'/fb_screenshot.png"/>'; 
            }
            
            wp_reset_query();   
        }else{ ?>
            <meta property="og:title" content="<?php echo get_bloginfo('name'); ?>"/>
            <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>"/>
            <meta property="og:url" content="<?php echo home_url() ?>/"/>
            <meta property="og:type" content="blog"/>
            <meta property="og:locale" content="es_ES"/>
            <meta property="og:description" content="<?php echo get_bloginfo('name') . get_bloginfo('description'); ?>"/>
            <meta property="og:image" content="<?php echo get_template_directory_uri()?>/fb_screenshot.png"/> 
    <?php
        }
    ?>

    <title><?php bloginfo('name'); ?> &raquo; <?php bloginfo('description'); ?><?php if ( is_single() ) { ?><?php } ?><?php wp_title(); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <?php
        if( strlen( options::get_value( 'styling' , 'favicon' ) ) ){
            $path_parts = pathinfo( options::get_value( 'styling' , 'favicon' ) );
            if( $path_parts['extension'] == 'ico' ){
    ?>
                <link rel="shortcut icon" href="<?php echo options::get_value( 'styling' , 'favicon' ); ?>" />
    <?php
            }else{
    ?>
                <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
    <?php
            }
        }else{
    ?>
            <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
    <?php
        }
    ?>

    <link rel="profile" href="http://gmpg.org/xfn/11" />


    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    <!--[if lt IE 9]>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/autoinclude/ie.css">
    <![endif]-->
    
    <?php wp_head(); ?>    
</head>
<?php 

$position   = '';
$repeat     = '';
$bgatt      = '';
$background_img = '';
$background_color = '';

if( is_single() || is_page() ){
    $settings = meta::get_meta( $post -> ID , 'settings' );
    if( ( isset( $settings['post_bg'] ) && !empty( $settings['post_bg'] ) ) || ( isset( $settings['color'] ) && !empty( $settings['color'] ) ) ){
        if( isset( $settings['post_bg'] ) && !empty( $settings['post_bg'] ) ){ 
            $background_img = "background-image: url('" . $settings['post_bg'] . "');";
        }

        if( isset( $settings['color'] ) && !empty( $settings['color'] ) ){
            $background_color = "background-color: " . $settings['color'] . "; ";
        }

        if( isset( $settings['position'] ) && !empty( $settings['position'] ) ){
            $position = 'background-position: '. $settings['position'] . ';';
        }
        if( isset( $settings['repeat'] ) && !empty( $settings['repeat'] ) ){
            $repeat = 'background-repeat: '. $settings['repeat'] . ';';
        }
        if( isset( $settings['attachment'] ) && !empty( $settings['attachment'] ) ){
            $bgatt = 'background-attachment: '. $settings['attachment'] . ';';
        }
    }else{
        if(get_background_image() == ''){ 
            
            $background_img = '';
            
        }else{
            $background_img = get_background_image();
        }
        
    }
}else{
    if(get_background_image() == '' ){
        $background_img = '';
    }else{
        $background_img = get_background_image();
    }
    
}
if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
    $woo_is_active = true;
} else{
    $woo_is_active = false;
}
$header_full_mode = '';
if( options::get_value('header_settings', 'header_full_screen') == 'website' ||  options::get_value('header_settings', 'header_full_screen') == 'homepage' && is_front_page() ){
    $header_full_mode = 'full-screen-header';
}
$header_bg_image = '';
if( options::get_value('header_settings', 'header_bg_image') != '' && options::get_value('header_settings', 'header_bg_pages') == 'all' || options::get_value('header_settings', 'header_bg_image') != '' && options::get_value('header_settings', 'header_bg_pages') == 'homepage' && is_front_page() ){
    $header_bg_image = options::get_value('header_settings', 'header_bg_image');
    $header_full_mode .= ' header-has-background';
}
if( wp_is_mobile() ){
    $header_full_mode .= ' is-mobile ';
}

if( options::logic('header_settings', 'header_sticky_menu') ){
    $header_full_mode .= ' sticky-menu-active';
}
if( options::logic('header_settings', 'header_bg_cover') ){
    $header_bg_size = 'cover';
    $header_bg_repeat = 'no-repeat';
} else{
    $header_bg_size = 'auto';
    $header_bg_repeat = 'repeat';
}

$header_full_mode .= ' menu-' . options::get_value('header_settings', 'header_menu_style') .'-header' ;


if ( options::logic('general', 'show_preloader') == 'frontpage' && is_front_page() || options::logic('general', 'show_preloader') == 'website' ){
    $header_full_mode .= ' preloaded';
}
?>
<body <?php body_class($header_full_mode); ?> style="<?php echo $background_color ; ?> <?php echo $background_img ; ?>  <?php echo $position; ?> <?php echo $repeat; ?> <?php echo $bgatt; ?>">
    <?php
        $boxed_class = '';
        if( options::logic('styling', 'boxed') == 'yes' ){
            $boxed_class = 'boxed';
        }
    ?>
    <?php if ( options::logic('general', 'show_preloader') == 'frontpage' && is_front_page() || options::logic('general', 'show_preloader') == 'website' ): ?>
        <div class="preloader-cortina">
            <div></div>
        </div>
    <?php endif ?>
    <div id="page" class="<?php echo options::get_value('content_settings', 'blog_post_layout'); ?>-layout <?php echo $boxed_class; ?>">
        <div id="fb-root"></div>
        
        <?php
            if( options::logic( 'blog_post' , 'fb_comments' ) ){
                if(options::get_value( 'social' , 'facebook_app_id' ) != ''){
        ?>
                  
                <script src="http://connect.facebook.net/en_US/all.js#xfbml=1" type="text/javascript"></script>
                  
        <?php
                }else{
        ?>
                    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1" type="text/javascript"></script>

        <?php   }
            }else{
        ?>  
                <script src="http://connect.facebook.net/en_US/all.js#xfbml=1" type="text/javascript" id="fb_script"></script>  
        <?php   
            }
        ?> 
        <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"> </script>
        
        <?php
            if( options::get_value('header_settings', 'header_menu_style') == 'bottom' && options::get_value('header_settings', 'header_full_screen') == 'website' ||  options::get_value('header_settings', 'header_full_screen') == 'homepage' && is_front_page() && options::get_value('header_settings', 'header_menu_style') == 'bottom' ){
                $bottom_menu = ' header-is-bottom';
            } else{
                $bottom_menu = '';
            }
        ?>
        <header id="header" class="<?php echo options::get_value('header_settings' , 'header_logo_style'); ?>" style="background-image: url(<?php echo $header_bg_image; ?>);background-size: <?php echo $header_bg_size; ?>;background-repeat: <?php echo $header_bg_repeat; ?>;">
            <?php if( options::logic('header_settings' , 'header_sticky_menu') ): ?>
                <div class="sticky-menu-container">
                    <div class="row">
                        <div class="twelve columns">
                            <nav class="main-menu">
                                <?php echo menu( 'header_menu' , array( 'number-items' => options::get_value( 'menu' , 'header' )  , 'current-class' => 'active','type' => 'category', 'class' => 'sf-menu' , 'menu_id' => 'sticky_menu' ) ); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( strlen( options::get_value('header_settings','header_bg_video') )  && options::get_value('header_settings', 'header_bg_pages') == 'all' || strlen( options::get_value('header_settings','header_bg_video') ) && options::get_value('header_settings', 'header_bg_pages') == 'homepage' && is_front_page() ):?>
                <div class="header-video-bg-container">
                    <video autoplay loop id="headerbgvideo" width="100%" height="100%"> 
                        <source src="<?php echo options::get_value('header_settings','header_bg_video');?>" type="video/webm">
                    </video>
                </div>
            <?php endif; ?>
            <?php if( strlen( options::get_value('header_settings','header_textarea') ) && options::get_value('header_settings', 'header_full_screen') == 'website' ||  options::get_value('header_settings', 'header_full_screen') == 'homepage' && is_front_page() ): ?>
                <div class="header-text">
                    <div class="row">
                        <div class="eight columns offset-by-two">
                            <?php echo options::get_value('header_settings','header_textarea'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if( options::get_value('header_settings', 'header_menu_style') == 'bottom'  && options::get_value('header_settings', 'header_full_screen') == 'website' ||  options::get_value('header_settings', 'header_full_screen') == 'homepage' && is_front_page() ): ?>
                <div class="<?php echo $bottom_menu; ?>">
            <?php endif; ?>
            <div class="header-containe-wrapper header-main-menu">
                <div class="row">
                        <?php global $uberMenu;
                            if( !isset($uberMenu) ){ ?>
                            <div id="dl-menu" class="dl-menuwrapper">
                                <button class="dl-trigger">Open Menu</button>
                                <?php echo menu( 'header_menu' , array( 'number-items' => options::get_value( 'menu' , 'header' )  , 'current-class' => 'active','type' => 'category', 'class' => ' dl-menu ', 'menu_id' => 'mobile_menu', 'submenu-class' => 'dl-submenu' ) ); ?>
                            </div>
                            <?php if( options::get_value('header_settings', 'header_logo_style') == 'header_style3' ): ?>
                                <div class="mobile-centered-logo">
                                    <?php red_get_logo(); ?>
                                </div>
                            <?php endif; ?>
                        <?php } ?>
                        <div class="five columns">
                            <?php if( options::logic('header_settings', 'header_social_icons') ): ?>
                                <?php red_get_social_icons(); ?>
                            <?php endif; ?>
                        </div>
                        <?php
                            if( $woo_is_active && options::logic('header_settings', 'header_minicart') ){
                                $search_columns = 'five columns';
                            } else{
                                $search_columns = 'seven columns';
                            }
                        ?>
                        <div class="<?php echo $search_columns; ?>">
                            <?php if( options::logic('header_settings', 'header_searchbar') ): ?>
                                <?php get_template_part('searchform-header'); ?>
                            <?php endif; ?>
                        </div>
                        <?php if( $woo_is_active ){ ?>
                            <div class="two columns">
                                <?php if( options::logic('header_settings', 'header_minicart') ): ?>
                                    <?php get_template_part('/woocommerce/dynamic-shopping-bag'); ?>
                            <?php endif; ?>
                            </div>
                        <?php } ?>
                        <div class="twelve columns">
                            <?php if( options::get_value('header_settings', 'header_logo_style') != 'header_style3' ): ?>
                                <?php red_get_logo(); ?>
                            <?php endif; ?>
                            <?php if( options::get_value('header_settings', 'header_logo_style') == 'header_style3' ): ?>
                            <div class="menu-with-logo">
                            <?php endif; ?>

                            <nav role="navigation" class="main-menu">
                                <?php
                                global $uberMenu;
                                if( !isset($uberMenu) ){
                                    echo menu( 'header_menu' , array( 'number-items' => options::get_value( 'menu' , 'header' )  , 'current-class' => 'active','type' => 'category', 'class' => 'sf-menu ' , 'menu_id' => 'desktop_menu' ) );
                                } else{
                                    wp_nav_menu( array( 'theme_location' => 'header_menu', 'id' => 'megaMenu' ) );
                                }
                                ?>
                            </nav>

                            <?php if( options::get_value('header_settings', 'header_logo_style') == 'header_style3' ): ?>
                            </div>
                            <?php endif; ?>
                        </div>
                </div>
            </div>
            <?php if( options::get_value('header_settings', 'header_menu_style') == 'bottom' && options::get_value('header_settings', 'header_full_screen') == 'website' ||  options::get_value('header_settings', 'header_full_screen') == 'homepage' && is_front_page() ): ?>
                </div>
            <?php endif; ?>
        </header>
