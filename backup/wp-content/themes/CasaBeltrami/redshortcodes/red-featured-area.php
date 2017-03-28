<?php
    $size = 'grid_big';
    global $post, $current_post;

    if( is_page_template('latest-portfolios.php') ){
        $filter_classes =  red_get_distinct_post_terms( $post->ID, 'portfolio-category', $return_names = true, $filter_type='' );    
    }else{
        $filter_classes = '';
    }

?>
<?php if( $current_post <= 7 ): ?>
<div <?php post_class('twelve columns all-elements post-cblock '.$filter_classes); ?> data-post-id="<?php echo $post->ID; ?>" >
    <article>
        <header class="entry-header">
            <div class="featimg">
                <?php
                    if (has_post_thumbnail($post->ID)) {

                       $img_url1 = wp_get_attachment_url( get_post_thumbnail_id( $post -> ID )  ,'full'); //get img URL
                       
                       $aqua_crop = true;
                       
                       $img_url = aq_resize( $img_url1, get_aqua_size($size), get_aqua_size($size, 'height'), $aqua_crop, true); //
                    ?>
                    <?php if ( $current_post !== 1 || $current_post == 1 && get_post_format() != 'gallery'){ ?>
                        <a href="<?php echo get_permalink($post->ID);  ?>">
                            <img src="<?php echo $img_url; ?>" alt="<?php echo $post->post_title; ?>" >
                        </a>
                        <?php if( get_post_format() == 'video' ) : ?>
                        <div class="video-post-id">
                            <i class="icon-play"></i>
                        </div>
                        <?php endif; ?>
                        <div class="feat-overlay">
                            <div class="entry-share">
                                <ul class="ul-sharing">
                                    <li>
                                        <a class="icon-facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID); ?>"></a>
                                    </li>
                                    <li>
                                        <a class="icon-twitter" target="_blank" href="http://twitter.com/home?status=<?php echo urlencode($post->post_title); ?>+<?php echo get_permalink($post->ID); ?>"></a>
                                    </li>
                                    <li>
                                        <a class="icon-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>&amp;description=<?php echo urlencode(get_the_title()); ?>" ></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php } elseif($current_post == 1 && get_post_format() === 'gallery' ){ ?>
                        <?php 
                            ob_start();
                            ob_clean();
                            red_get_flex_post_img_slideshow( $post -> ID, $size = 'grid_big', $background_color = '', $background_img = '' , $position = '', $repeat = '', $bgatt = ''); 
                            $post_img_slideshow = ob_get_clean();

                        ?>
                        <?php if(strlen($post_img_slideshow) && $current_post == 1){ ?>
                            <?php echo $post_img_slideshow; ?>  
                        <?php } ?>
                    <?php
                        }  
                    } else{ ?>
                        <a href="<?php echo get_permalink($post->ID);  ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/images/no.image.600x300.png" alt="<?php echo $post->post_title; ?>" />
                        </a>
                    <?php }
                ?>
                <?php if(get_overall_post_score($post->ID, true) != ''){ ?>
                    <div class="entry-score">
                        <?php get_overall_post_score($post->ID); ?>/10
                    </div>
                <?php } ?>
            </div>
        </header>
        <section class="entry-content">
            <?php if( $current_post == 1 ): ?>
                <div class="entry-meta">
                    <div class="entry-date">
                        <?php echo red_get_post_date($post -> ID); ?>
                    </div>
                    <div class="entry-author">
                        <?php the_author_posts_link(); ?>
                    </div>
                    <div class="entry-categories">
                        <?php                                        
                            if(get_post_type($post -> ID) == 'post'){
                                $cat_tax = 'category';    
                            }
                            if(isset($cat_tax)){
                                $the_categories = get_post_categories($post->ID, $only_first_cat = false, $taxonomy = $cat_tax, $margin_elem_start = '', $margin_elem_end = ' ', $delimiter = ', '); 
                            }else{
                                $the_categories = '';
                            }
                        ?>
                        <?php if(strlen(trim($the_categories))){ ?>
                            <?php echo $the_categories; ?>
                        <?php } ?>
                    </div>
                    <div class="entry-like">
                        <?php echo like::content($post->ID,$return = false, $additional_class = '', $show_label = false);  ?>
                    </div>
                </div>
                <div class="entry-delimiter">
                    &bull;&bull;&bull;
                </div>
            <?php endif; ?>
            <h2 class="entry-title">
                <a href="<?php echo get_permalink($post->ID);  ?>" title="<?php _e('Permalink to', 'redcodn'); ?> <?php echo $post->post_title; ?>" rel="bookmark">
                    <?php if(get_post_type( $post ) == 'video'){ ?>
                        <div><i class="icon-play"></i></div>
                    <?php } ?>
                    <?php echo $post->post_title; ?>
                </a>
            </h2>
        </section>
    </article>
</div>
<?php endif; ?>