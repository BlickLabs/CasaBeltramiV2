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
    ?>
            
                                        
        <div class="main-container">  
            <div class="row">
                <?php layout::side( 'left' , $post_id , 'single'); ?>    
                <div class="<?php echo  tools::primary_class( $post_id , 'single', $return_just_class = true );?>">
                    <article <?php post_class( 'post single-blog ');?>>
                        <div class="row" style="<?php echo $background_img .' '. $background_color .' '. $position .' '. $repeat .' '. $bgatt;  ?>">
                           <?php if( options::logic( 'blog_post' , 'breadcrumbs' ) ){ ?>
                                <div class="twelve columns breadcrumbs">
                                    <?php echo red_breadcrumbs();?>
                                </div>
                            <?php } ?>    
                            
                            
                            <div class="twelve columns">
                                <h1 class="post-title"><?php the_title(); ?></h1>

                               <?php if( options::logic( 'blog_post' , 'meta' ) && meta::logic( $post , 'settings' , 'meta' )) { ?>
                                   <?php if( meta::logic( $post , 'settings' , 'love' ) ): ?>
                                   <div class="dotted-separator single-like custom-post-like">
                                       <div class="ilike">
                                           <?php echo like::content($post->ID,$return = false, $additional_class = '', $show_label = false);  ?>
                                       </div>
                                   </div>
                                   <?php endif; ?>
                                   <div class="post-meta-container">
                                       <div class="post-meta">
                                           <ul>
                                               <li><?php echo red_get_post_date($post -> ID); ?></li>
                                               <li><a href="<?php echo get_author_posts_url($post->post_author) ?>">
                                                       <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                                                   </a>
                                               </li>
                                               <?php
                                               $categories = wp_get_post_terms($post->ID, 'portfolio-category');
                                               if (!empty($categories)) {
                                                   ?>
                                               <li>
                                                       <ul class="post-meta-categories">
                                                           <?php                         
                                                               echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'portfolio-category', $margin_elem_start = '<li>', $margin_elem_end = '</li>  ', $delimiter = ''); 
                                                           ?>
                                                       </ul>
                                               </li>
                                                   <?php
                                               }
                                               ?>
                                               <?php
                                               $tags = wp_get_post_terms($post->ID, 'portfolio-tag');

                                               if (!empty($tags)) {
                                               ?>  <li class="meta-tags"><span class="tagged-in-categ"><?php _e('Categor&iacute;as', 'redcodn'); ?></span>
                                                       <?php
                                                           echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'portfolio-tag', $margin_elem_start = '', $margin_elem_end = '', $delimiter = ', '); 
                                                       ?>
                                                   </li>
                                               <?php } ?>
                                           </ul>
                                       </div>
                                   </div>
                               <?php } ?>
                                <?php 
                                    $portfolio_meta = get_post_meta($post->ID, 'rc_portfolio_meta', TRUE);

                                    if( isset($portfolio_meta) ) :
                                ?>
                                <div class="portfolio-meta">
                                    <ul>
                                        <?php if( $portfolio_meta['client'] != '' ) : ?>
                                        <li class="client">
                                            <i><?php _e('Cliente', 'redcodn'); ?></i>
                                            <strong><?php echo $portfolio_meta['client']; ?></strong>
                                        </li>
                                        <?php endif; ?>
                                        <?php if( $portfolio_meta['work'] != '' ) : ?>
                                        <li>
                                            <i><?php _e('Evento', 'redcodn'); ?></i>
                                            <strong><?php echo $portfolio_meta['work']; ?></strong>
                                        </li>
                                        <?php endif; ?>
                                        <?php if( $portfolio_meta['url'] != '' ) : ?>
                                        <li>
                                            <i><?php _e('URL', 'redcodn'); ?></i>
                                            <strong><a href="<?php echo $portfolio_meta['url']; ?>" target="_blank"><?php echo $portfolio_meta['url']; ?></a></strong>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>

                                <div class="post-content">
                                    <?php the_content(); ?>

                                    <?php
                                        $portfolio_items = get_post_meta($post->ID, 'rc_portfolio', TRUE);
                                        foreach ($portfolio_items as $item) {
                                            if($item['item_type'] == 'i'){
                                                echo '<div class="portfolio-item portfolio-item-image">';
                                                echo '<img src="' . $item['item_url'] . '" alt="' . $item['slide_title'] . '" />';
                                                echo '</div>';
                                            } elseif($item['item_type'] == 'v'){
                                                echo '<div class="portfolio-item portfolio-item-video">';
                                                echo '<div class="featvideo">';
                                                echo '<div class="feat-video-container">';
                                                echo apply_filters('the_content', htmlspecialchars_decode(trim($item['embed'])));
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        }
                                    ?>

                                    <?php
                                    $tags = wp_get_post_terms($post->ID, 'post_tag');

                                    if (!empty($tags)) {
                                    ?>  <div class="meta-tags"><span class="tagged-in-categ"><?php _e('Categorias', 'redcodn'); ?></span>
                                            <?php
                                                echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'post_tag', $margin_elem_start = '', $margin_elem_end = '', $delimiter = ', '); 
                                            ?>
                                        </div>
                                    <?php } ?>

                                    <div class="clear"></div>
                                    <?php wp_link_pages(array('before' => '<div class="pagenumbers"><p>Pages:','after' => '</p></div>  ', 'next_or_number' => 'number'));  ?>  
                                    <?php get_template_part('social-sharing'); ?>                               
                                </div>

                                <?php if( options::logic( 'blog_post' , 'author_box' ) && meta::logic( $post , 'settings' , 'author_box' )) { ?>
                                <div class="post-author-box">
                                    <a href="<?php echo get_author_posts_url($post->post_author) ?>"><?php echo get_avatar( get_the_author_meta('email'), '120' ); ?></a>
                                    <h5 class="author-title"><?php the_author_link(); ?></h5>
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
