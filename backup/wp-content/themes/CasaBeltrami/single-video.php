<?php get_header(); ?>
<section id="main">
<?php
while( have_posts () ){
    the_post();
    $post_id = $post -> ID;

    $embed_meta = get_post_meta($post -> ID,'redembed',true);

    // feat img container class
    if(isset($embed_meta['url']) && strlen($embed_meta['url'])){
        //if the video is available we will have this class:
        $feat_img_container_class = 'featimg featimg-video'; // this class has binded to it a 'onclick' event
    }else{
        $feat_img_container_class = 'featimg';
    }

    if ( metadata_exists( 'post', $post -> ID , '_post_image_gallery' ) ) {

        $product_image_gallery = get_post_meta( $post_id, '_post_image_gallery', true );
        
        if(strlen($product_image_gallery)){
            $img_id_array = array_filter( explode( ',', $product_image_gallery ) );    
        }
        
    }

    
    if(isset($img_id_array) && is_array($img_id_array)){
        $content_class = ' five columns ';
    }else{
        $content_class = ' twelve columns ';

    }
    $bg_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>  
    <div class="main-container">                          
        <article <?php post_class( 'post video-post' ); ?>>
            <?php
                if(isset($embed_meta['url']) && strlen($embed_meta['url'])){   // if is set the embed / URL we show it instead of feat img
            ?>

                    <div class="featvideo <?php if( options::logic('blog_post', 'video_single_extent') ){echo ' fullwidth-video';} ?>">
                        <div class="feat-video-container <?php if( !options::logic('blog_post', 'video_single_extent') ){echo ' boxed';} ?>">
                            <?php if(red_isValidURL($embed_meta['url'])){
                                // for URL
                                global $wp_embed; 
                                echo $wp_embed->run_shortcode( '[embed]'.trim($embed_meta['url']).'[/embed]' );
                            }else{
                                // for embeds
                                echo $embed_meta['url'];
                            } ?>
                            <?php 
                                $prevPost = get_previous_post();
                                $nextPost = get_next_post();

                                $root_first_categ = get_post_categories($post->ID, $only_first_cat = true, $taxonomy = 'video-category', $margin_elem_start = '', $margin_elem_end = ' ', $delimiter = ', ', $a_class = 'icon-root', $show_cat_name = false); 

                            ?>
                                    
                            
                        </div>
                    </div>
            <?php } ?>
            <?php if( options::logic('blog_post', 'video_single_content') ): ?>
            <div class="hidden-post-content">
                <div class="content-expander">
                    <i class="icon-prev"></i>
                    <i class="icon-next"></i>
                </div>
            <?php endif; ?>
            <div class="video-info">
                <div class="video-container">
                    <div class="row">
                        <div class="four columns" >
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
                                            $categories = wp_get_post_terms($post->ID, 'video-category');
                                            if (!empty($categories)) {
                                                ?>
                                            <li>
                                                    <ul class="post-meta-categories">
                                                        <?php                         
                                                            echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'video-category', $margin_elem_start = '<li>', $margin_elem_end = '</li>  ', $delimiter = ''); 
                                                        ?>
                                                    </ul>
                                            </li>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            $tags = wp_get_post_terms($post->ID, 'video-tag');

                                            if (!empty($tags)) {
                                            ?>  <li class="meta-tags"><span class="tagged-in-categ"><?php _e('tagged in', 'redcodn'); ?></span>
                                                    <?php
                                                        echo red_get_post_taxonomies($post->ID, $only_first_cat = false, $taxonomy = 'video-tag', $margin_elem_start = '', $margin_elem_end = '', $delimiter = ', '); 
                                                    ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
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
                            
                        </div>
                        <div class="eight columns">
                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>
                            <?php get_template_part('social-sharing'); ?>
                            <?php if(isset($img_id_array) && is_array($img_id_array)){ ?>
                                <?php 
                                    foreach ($img_id_array as $img_id) {
                                        $full_img_url = wp_get_attachment_url($img_id);

                                        $thumbnail_url = aq_resize( $full_img_url, 650, 9999, false, false ); //resize img, Return an array containing url, width, and height.

                                        echo '<img src="'.$thumbnail_url[0].'" alt="" />';

                                    }
                                ?>
                            <?php } ?>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php if( options::logic('blog_post', 'video_single_content') ): ?>
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
