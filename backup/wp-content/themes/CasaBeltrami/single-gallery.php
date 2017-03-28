<?php get_header(); ?>
<section id="main">
<?php
while( have_posts () ){
    the_post();
    $post_id = $post -> ID;
?>
            
                                        
    <div class="main-container">                          
        <article <?php post_class( 'post gallery-post' ); ?>>
            <?php
                    $size = 'single_gallery';
                    $src = wp_get_attachment_url( get_post_thumbnail_id( $post -> ID )  ,'full'); //get img URL
                    

                    // Get the layout of the gallery
                    $single_gallery_settings = meta::get_meta( $post -> ID , 'settings' );
                    global $single_gallery_layout;
                    $single_gallery_layout = $single_gallery_settings['gallery_layout'];

            ?>
            <div class="gallery-type-container">
                <?php
                $post_img_slideshow;
                // Generating content for the gallery
                if( $single_gallery_layout == 'scroll' ){
                    ob_start();
                    ob_clean();
                    red_get_post_img_slideshow( $post -> ID, $size = 'single_gallery'); 
                    $post_img_slideshow = ob_get_clean();
                } elseif( $single_gallery_layout == 'grid' ){
                    ob_start();
                    ob_clean();
                    up_grid_gallery( $post -> ID, $size = 'single_gallery'); 
                    $post_img_slideshow = ob_get_clean();
                    
                }  elseif( $single_gallery_layout == 'slider' ){
                    ob_start();
                    ob_clean();
                    echo '<div class="row"><div class="twelve columns horizontal-slider">';
                    red_get_flex_post_img_slideshow( $post -> ID, $size = 'single_gallery'); 
                    echo '</div></div>';
                    $post_img_slideshow = ob_get_clean();
                    
                } elseif( $single_gallery_layout == 'fotorama' ){
                    ob_start();
                    ob_clean();
                    up_fotorama_gallery( $post -> ID, $size = 'single_gallery'); 
                    $post_img_slideshow = ob_get_clean();
                    
                } elseif( $single_gallery_layout == 'list' ){
                    ob_start();
                    ob_clean();
                    up_list_gallery( $post -> ID, $size = 'single_gallery'); 
                    $post_img_slideshow = ob_get_clean();
                    
                }

                // Show the gallery content
                if(strlen($post_img_slideshow)){
                    echo $post_img_slideshow;
                }
                ?>
            </div>
            <?php if( options::logic('blog_post', 'gallery_single_content') ): ?>
            <div class="hidden-post-content">
                <div class="content-expander">
                    <i class="icon-prev"></i>
                    <i class="icon-next"></i>
                </div>
            <?php endif; ?>
                <div class="row">
                
                       <?php if( options::logic( 'blog_post' , 'breadcrumbs' ) ){ ?>
                            <div class="twelve columns breadcrumbs">
                                <?php echo red_breadcrumbs();?>
                            </div>
                        <?php } ?>    
                        <div class="twelve columns">
                            <h2 class="post-title"><?php the_title(); ?></h2>
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
                                            $categories = wp_get_post_terms($post->ID, 'gallery-category');
                                            if (!empty($categories)) {
                                                ?>
                                            <li>
                                                    <ul class="post-meta-categories">
                                                        <?php                         
                                                            echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'gallery-category', $margin_elem_start = '<li>', $margin_elem_end = '</li>  ', $delimiter = ''); 
                                                        ?>
                                                    </ul>
                                            </li>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            $tags = wp_get_post_terms($post->ID, 'gallery-tag');

                                            if (!empty($tags)) {
                                            ?>  <li class="meta-tags"><span class="tagged-in-categ"><?php _e('tagged in', 'redcodn'); ?></span>
                                                    <?php
                                                        echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'gallery-tag', $margin_elem_start = '', $margin_elem_end = '', $delimiter = ', '); 
                                                    ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>
                            <?php 
                                $prevPost = get_previous_post();
                                $nextPost = get_next_post();

                                $root_first_categ = get_post_categories($post->ID, $only_first_cat = true, $taxonomy = 'gallery-category', $margin_elem_start = '', $margin_elem_end = ' ', $delimiter = ', ', $a_class = 'icon-root', $show_cat_name = false); 
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
                            <div class="clear bottom-separator"></div>
                            <?php wp_link_pages(array('before' => '<div class="pagenumbers"><p>Pages:','after' => '</p></div>  ', 'next_or_number' => 'number'));  ?>  
                            <?php get_template_part('social-sharing'); ?>                               
                        </div>
                        
                </div>
            <?php if( options::logic('blog_post', 'gallery_single_content') ): ?>
            </div>
            <?php endif; ?>
        </article>
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
