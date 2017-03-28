<?php
    $size = 'grid_big';
    global $post, $number_columns, $massonry_class, $ajax_container_class;
//deb::e($ajax_container_class);
    if(isset($number_columns) && is_numeric($number_columns)){
        $block_width = ' ' . red_columns_arabic_to_chars($number_columns). ' ';
    }elseif(strlen(options::get_value('content_settings', 'blog_grid_layout')) != ''){
        $nr_cols = options::get_value('content_settings', 'blog_grid_layout');
        if ($nr_cols == 'grid1') {
            $block_width = ' six ';
        }elseif($nr_cols == 'grid2'){
            $block_width = ' four ';
        }elseif($nr_cols == 'grid3'){
            $block_width = ' three ';
        }
    }else{
        $block_width = ' four ';
    }

    if(isset($ajax_container_class) && strlen($ajax_container_class)){
        $ajax_container = $ajax_container_class;
    }else{
        $ajax_container = 'red-ajax-box';
    }
    
?>

<div <?php post_class($block_width . ' columns '. $massonry_class. 'post-cblock'); ?> data-post-id="<?php echo $post->ID; ?>" >
    <article>
        <header class="entry-header">
            <div class="featimg">
                    <?php
                        if (has_post_thumbnail($post->ID)) {

                           $img_url1 = wp_get_attachment_url( get_post_thumbnail_id( $post -> ID )  ,'full'); //get img URL
                           
                           if( trim($massonry_class) == 'massonry-elem'){
                               $aqua_crop = false; // if massonry is enabled we resize the image, else we crop it
                           }else{
                               $aqua_crop = true;
                           }
                           
                           $img_url = aq_resize( $img_url1, get_aqua_size($size), get_aqua_size($size, 'height'), $aqua_crop, true); //
                        ?>
                            <a href="<?php echo get_permalink($post->ID);  ?>">
                                <img src="<?php echo $img_url; ?>" alt="<?php echo $post->post_title; ?>" >
                            </a>
                        <?php    
                        } else{ ?>
                            <a href="<?php echo get_permalink($post->ID);  ?>">
                                <img src="<?php echo get_template_directory_uri() ?>/images/no.image.600x300.png" alt="<?php echo $post->post_title; ?>" />
                            </a>
                        <?php }
                    ?> 
                    <a href="<?php echo get_permalink($post->ID);  ?>" class="entry-date">
                        <?php echo red_get_post_date($post -> ID); ?>
                    </a>
                    <div class="entry-feat-overlay">
                        <a href="<?php echo get_permalink($post->ID);  ?>" class="view-more">
                            <i class="icon-search"></i>
                        </a>
                        <div class="overlay-effect">                                                        
                            <ul class="share-options">
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
            </div>
        </header>
        <section class="entry-content">
            <h2 class="entry-title">
                <a href="<?php echo get_permalink($post->ID);  ?>" title="<?php _e('Permalink to', 'redcodn'); ?> <?php echo $post->post_title; ?>" rel="bookmark"><span><?php echo $post->post_title; ?></span></a>
            </h2>
            <div class="entry-excerpt">
                <?php
                    $ln = 140;
                    if (!empty($post->post_excerpt)) {
                        if (strlen(strip_tags(strip_shortcodes($post->post_excerpt))) > $ln) {
                            echo mb_substr(strip_tags(strip_shortcodes($post->post_excerpt)), 0, $ln) . '...';
                        } else {
                            echo strip_tags(strip_shortcodes($post->post_excerpt));
                        }
                    } else {
                        if (strlen(strip_tags(strip_shortcodes($post->post_content))) > $ln) {
                            echo mb_substr(strip_tags(strip_shortcodes($post->post_content)), 0, $ln) . '...';
                        } else {
                            echo strip_tags(strip_shortcodes($post->post_content));
                        }
                    }    
                ?>
            </div>
        </section>
        <footer class="entry-footer">
            <?php if( meta::logic( $post , 'settings' , 'love' ) ): ?>
            <div class="dotted-separator">
                <div class="ilike">
                    <?php echo like::content($post->ID,$return = false, $additional_class = 'no-count', $show_label = false);  ?>
                </div>
            </div>
            <?php endif; ?>
        </footer>
    </article>
</div> 