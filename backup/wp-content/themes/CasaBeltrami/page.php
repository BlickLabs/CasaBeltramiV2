<?php get_header(); ?>
<section id="main">
    

    <?php
        while( have_posts () ){
            the_post();
            $post_id = $post -> ID;
                    
            $template = 'page';
            $size = 'tsingle_style'; 

            $s = image::asize( image::size( $post->ID , $template , $size ) );
            
            $zoom = false; 
            
            if ( has_post_thumbnail( $post -> ID ) && get_post_format( $post -> ID ) != 'video' ) {
                $src        = image::thumbnail( $post -> ID , $template , $size );
                $src_       = image::thumbnail( $post -> ID , $template , 'full' );
                $caption    = image::caption( $post -> ID );
                $zoom       = true;
            }
    ?>
                
                <div id="primary" >
                    <div id="content" role="main">
                        
                            <div class="single-row-container <?php echo options::get_value('content_settings' , 'blog_post_layout'); ?>-layout <?php if (is_front_page() || is_home()) { echo options::get_value('content_settings' , 'default_frontpage_width'); } else { echo options::get_value('content_settings' , 'default_post_width'); } ?>-post ">
                                <div>
                                        <?php 

                                            $slideshow = meta::get_meta( $post->ID , 'slideshowSettings' ); 
                                            if (isset($slideshow['slideshow_select'])) {
                                                $post_slide = get_post($slideshow['slideshow_select']); 
                                                red_get_slideshow($slideshow['slideshow_select']);
                                            }
                                        ?>
                                </div>
                                

                                <div class="row">
                                    <?php if( options::logic( 'blog_post' , 'breadcrumbs' ) ){ ?>
                                        <div class="twelve columns breadcrumbs">
                                            <?php echo red_breadcrumbs();?>
                                        </div>
                                    <?php } ?>
                                    <?php layout::side( 'left' , $post_id , 'single'); ?>
                                        
                                    <div class="main-container <?php echo tools::primary_class( $post_id , 'single', $return_just_class = true ); ?>">
                                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'post big-post single-post no_bg' , $post -> ID ); ?>>

                                            <?php if(!is_front_page() && meta::logic( $post , 'settings' , 'page_title' ) ) { ?>
                                            <div class="row">
                                                <div class="twelve columns">
                                                    <h2 class="post-title page-title">
                                                        <?php the_title(); ?>
                                                    </h2>
                                                </div>
                                            </div>
                                            <?php } ?>

                                            <div class="entry-content ">
                                                <div class="row">
                                                                                                       
                                                    <div class="twelve columns">
                                                       <?php
                                                            if( meta::logic( $post , 'settings' , 'meta' ) ){
                                                                red_post_meta( $post );
                                                            }
                                                        ?>                                                        
                                                        <?php 
                                                            the_content(); 
                                                        ?>
                                                        <?php the_tags(); ?>
                                                        <div class="clear"></div>
                                                        <?php wp_link_pages(array('before' => '<div class="pagenumbers"><p>Pages:','after' => '</p></div>  ', 'next_or_number' => 'number'));  ?>
                                                        <?php get_template_part('social-sharing'); ?>

                                                    </div>
                                                </div>

                                                <?php 
                                                    /* related posts */
                                                    get_template_part( 'related-posts' ); 
                                                ?>
                                                <?php
                                                    /* comments */
                                                    if( comments_open() ){
                                                ?>
                                               
                                                    <div class="row">
                                                        <div class="red-comments twelve columns">       
                                                <?php        
                                                        if( options::logic( 'blog_post' , 'fb_comments' ) ){
                                                            ?>
                                                            <div id="comments">
                                                                <div class="row">
                                                                    <div class="twelve columns">
                                                                        <h3 id="reply-title"><?php _e( 'Leave a reply' , 'redcodn' ); ?></h3>
                                                                        <p class="delimiter">&nbsp;</p>
                                                                        <fb:comments href="<?php the_permalink(); ?>" num_posts="5" width="430" height="120" reverse="true"></fb:comments>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }else{
                                                            comments_template( '', true );
                                                        }
                                                ?>   
                                                        </div> <!-- eof red comments -->

                                                    </div> 

                                                <?php    
                                                    }
                                                ?>   

                                            </div>    
                                        </article>
                                    </div>
                                    
                                    <?php layout::side( 'right' , $post_id , 'single' ); ?>
                                </div>
                            </div>
                    </div>
                        
                </div>
                
                
    <?php
        }
    ?>


</section>
<?php get_footer(); ?>
