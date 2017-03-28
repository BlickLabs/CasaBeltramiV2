<?php get_header(); ?>
<section id="main">
    

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
    ?>


    <?php
        while( have_posts () ){
            the_post();
            $post_id = $post -> ID;
                    
            $template = 'single';
            $size = 'single_resized'; 

            $s = image::asize( image::size( $post->ID , $template , $size ) );
            
            $zoom = false; 
            
            if ( has_post_thumbnail( $post -> ID ) && get_post_format( $post -> ID ) != 'video' ) {
                $src        = image::thumbnail( $post -> ID , $template , $size );
                $src_       = image::thumbnail( $post -> ID , $template , 'full' );
                $caption    = image::caption( $post -> ID );
                $zoom       = true;
            }

            // Get the single layout
            $post_layout = meta::get_meta( $post -> ID , 'settings' );
            if( isset($post_layout['post_access']) && $post_layout['post_access'] != '' ){
                $post_access = $post_layout['post_access'];
            } else{
                $post_access = 'normal';
            }


            if( isset($post_layout['post_layout']) ){
                $post_layout = $post_layout['post_layout'];
            } else{
                $post_layout = NULL;
            }


            if( get_post_format() == 'gallery' ){
                ob_start();
                ob_clean();
                $single_slideshow = red_get_flex_post_img_slideshow($post->ID, 'single_resized');
                $single_slideshow = ob_get_clean();
            }

    ?>
            
                                        
        <div class="main-container">  
            <div class="row">
                <?php layout::side( 'left' , $post_id , 'single'); ?>    
                <div class="<?php echo  tools::primary_class( $post_id , 'single', $return_just_class = true );?>">
                    <article <?php post_class( 'post single-blog ');?>>

                            <?php

                                $embed_meta = get_post_meta($post -> ID,'redembed',true);



                                        if(isset($embed_meta['url']) && strlen($embed_meta['url']) && get_post_format( $post -> ID ) == 'video'){   // if is set the embed / URL we show it instead of feat img
                                    ?>
                                            <div class="entry-header">
                                                <div class="featimg featvideo">
                                                    <div class="feat-video-container">
                                                        <?php if(red_isValidURL($embed_meta['url'])){
                                                            // for URL
                                                            global $wp_embed; 
                                                            echo $wp_embed->run_shortcode( '[embed]'.$embed_meta['url'].'[/embed]' );
                                                        }else{
                                                            // for embeds
                                                            echo $embed_meta['url'];
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }elseif ( has_post_thumbnail( $post -> ID ) && get_post_format( $post -> ID ) != 'video' && get_post_format( $post -> ID ) != 'gallery' && get_post_format( $post -> ID ) != 'audio' ) {
                                            $src = wp_get_attachment_url( get_post_thumbnail_id( $post -> ID )  ,'full'); //get img URL
                                            $img_url = aq_resize( $src, get_aqua_size($size), get_aqua_size($size, 'height'), false, true); //crop img
                                ?>
                                            <div class="entry-header">
                                                <div class="featimg">
                                                    <?php
                                                        echo '<img src="' . $img_url . '" alt="' . $caption . '" >';
                                                    ?>
                                                    <?php if( options::logic( 'blog_post' , 'enb_lightbox' )){ ?>
                                                    <div class="zoom-image">
                                                        <a href="<?php echo $src; ?>" data-rel="prettyPhoto" title="">&nbsp;</a>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                <?php
                                        } elseif( get_post_format( $post -> ID ) == 'gallery' ){
                                            echo $single_slideshow;

                                            // in case there is any embeded code or URL provided by user, we will show it bellow the slider
                                            if(isset($embed_meta['url']) && strlen($embed_meta['url'])){

                                                if(red_isValidURL($embed_meta['url'])){
                                                    // for URL
                                                    global $wp_embed; 
                                                    echo $wp_embed->run_shortcode( '[embed]'.$embed_meta['url'].'[/embed]' );
                                                }else{
                                                    // for embeds
                                                    echo $embed_meta['url'];
                                                }
                                            }
                                        } elseif( get_post_format( $post -> ID ) == 'audio'){
                                            $src = wp_get_attachment_url( get_post_thumbnail_id( $post -> ID )  ,'full'); //get img URL
                                            $img_url = aq_resize( $src, get_aqua_size($size), get_aqua_size($size, 'height'), false, true); //crop img
                                            ?>
                                                <div class="entry-header">
                                                    <div class="featimg">
                                                        <?php
                                                            echo '<img src="' . $img_url . '" alt="' . $caption . '" >';
                                                        ?>
                                                        <?php if( options::logic( 'blog_post' , 'enb_lightbox' )){ ?>
                                                        <div class="zoom-image">
                                                            <a href="<?php echo $src; ?>" data-rel="prettyPhoto" title="">&nbsp;</a>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="feat-audio">

                                                    <?php
                                                    // in case there is any embeded code or URL provided by user, we will show it bellow the slider
                                                    if(isset($embed_meta['url']) && strlen($embed_meta['url'])){

                                                        if(red_isValidURL($embed_meta['url'])){
                                                            // for URL
                                                            global $wp_embed; 
                                                            echo $wp_embed->run_shortcode( '[embed]'.$embed_meta['url'].'[/embed]' );
                                                        }else{
                                                            // for embeds
                                                            echo $embed_meta['url'];
                                                        }
                                                    }
                                                    ?>
                                                </div>  
                                            <?php
                                        }
                            ?>
                            <div class="row" style="<?php echo $background_img .' '. $background_color .' '. $position .' '. $repeat .' '. $bgatt;  ?>">
                               <?php if( options::logic( 'blog_post' , 'breadcrumbs' ) ){ ?>
                                    <div class="twelve columns breadcrumbs">
                                        <?php echo red_breadcrumbs();?>
                                    </div>
                                <?php } ?>    
                                
                                
                                <div class="twelve columns">

                                    <?php if( options::logic( 'blog_post' , 'meta' ) && meta::logic( $post , 'settings' , 'meta' )) { ?>
                                    <?php if( meta::logic( $post , 'settings' , 'love' ) ): ?>
                                    <div class="dotted-separator single-like">
                                        <div class="ilike">
                                            <?php echo like::content($post->ID,$return = false, $additional_class = '', $show_label = false);  ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <h1 class="post-title"><?php the_title(); ?></h1>
                                    <div class="dotted-separator single-title-delimiter">
                                        <div class="idot">
                                        </div>
                                    </div>
                                    <div class="post-meta pre-meta">
                                        <ul>
                                            <li>
                                                <a href="<?php echo get_author_posts_url($post->post_author) ?>">
                                                    <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                                                </a>
                                            </li>
                                            <li><?php echo red_get_post_date($post -> ID); ?></li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                    <div class="post-preamble">
                                        <?php
                                            $post_preamble = get_post_meta($post->ID, 'post_preamble', TRUE);
                                            echo $post_preamble;
                                        ?>
                                    </div>

                                    <div class="post-content">
                                        <?php the_content(); ?>
                                        
                                        <?php
                                        $tags = wp_get_post_terms($post->ID, 'post_tag');

                                        ?>
                                        <div class="post-meta">
                                            <ul>
                                                <li><span class="tagged-in-categ"><?php _e('added in', 'redcodn'); ?></span> 
                                                    <?php
                                                        $categories = wp_get_post_terms($post->ID, 'category');
                                                        if (!empty($categories)) {
                                                            ?>
                                                            <ul class="post-meta-categories">
                                                                <?php                         
                                                                    echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'category', $margin_elem_start = '<li>', $margin_elem_end = '</li>  ', $delimiter = ''); 
                                                                ?>
                                                            </ul>
                                                            <?php
                                                        }
                                                        ?>
                                                </li>
                                                <?php if (!empty($tags)) {?>
                                                <li>
                                                    <div class="meta-tags"><span class="tagged-in-categ"><?php _e('tagged in', 'redcodn'); ?></span>
                                                            <?php
                                                                echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'post_tag', $margin_elem_start = '', $margin_elem_end = '', $delimiter = ', '); 
                                                            ?>
                                                        </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                        <?php wp_link_pages(array('before' => '<div class="pagenumbers"><p>Pages:','after' => '</p></div>  ', 'next_or_number' => 'number'));  ?>  
                                        <?php get_template_part('social-sharing'); ?>                               
                                    </div>
                                    <?php 
                                        $prevPost = get_previous_post();
                                        $nextPost = get_next_post();

                                        $root_first_categ = get_post_categories($post->ID, $only_first_cat = true, $taxonomy = 'cat', $margin_elem_start = '', $margin_elem_end = ' ', $delimiter = ', ', $a_class = 'icon-root', $show_cat_name = false); 
                                    ?>
                                    <div class="post-navigation">
                                        <ul>
                                            <li>         
                                                <?php 
                                                    if ($prevPost != '') {
                                                        previous_post_link('<i class="icon-prev"></i> %link');
                                                    }
                                                ?>
                                            </li>
                                            <?php                     
                                                if(strlen($root_first_categ)){
                                                    echo '<li>'.$root_first_categ.'</li>';
                                                }
                                            ?>
                                            <li>
                                                <?php       
                                                    if ($nextPost != '') {
                                                        next_post_link('%link <i class="icon-next"></i>');
                                                    }
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php if( options::logic( 'blog_post' , 'author_box' ) && meta::logic( $post , 'settings' , 'author_box' )) { ?>
                                    <div class="post-author-box">
                                        <a href="<?php echo get_author_posts_url($post->post_author) ?>"><?php echo get_avatar( get_the_author_meta('email'), '120' ); ?></a>
                                        <h5 class="author-title" itemprop="reviewer"><?php the_author_link(); ?></h5>
                                        <div class="author-box-info"><?php the_author_meta('description'); ?>
                                            <?php
                                             if(strlen(get_the_author_meta('user_url'))!=''){?>
                                                <span><?php _e('Website:', 'redcodn'); ?> <a href="<?php the_author_meta('user_url');?>"><?php the_author_meta('user_url');?></a></span>
                                            <?php } ?>
                                        </div>                                 
                                    </div>
                                    <?php } ?>

                                    <?php
                                        /* comments */
                                        if( comments_open() ){
                                    ?>
                                    <div class="red-comments">       
                                    <?php        
                                            if( options::logic( 'blog_post' , 'fb_comments' ) ){
                                                ?>
                                                <div id="comments">
                                                    <h3 id="reply-title"><?php _e( 'Leave a reply' , 'redcodn' ); ?></h3>
                                                    <fb:comments href="<?php the_permalink(); ?>" num_posts="5" width="430" height="120" reverse="true"></fb:comments>
                                                </div>
                                                <?php
                                            }else{
                                                comments_template( '', true );
                                            }
                                    ?>   
                                    </div> <!-- eof red comments -->

                                    <?php    
                                        }
                                    ?>  
                                </div>
                                
                            </div>
                    </article>
                </div>
                <?php layout::side( 'right' , $post_id , 'single' ); ?>
            </div>
            
        </div>
            <?php 
                /* related posts */
                get_template_part( 'related-posts' ); 
            ?>               
                
    <?php
        }
    ?>


</section>
<?php get_footer(); ?>
