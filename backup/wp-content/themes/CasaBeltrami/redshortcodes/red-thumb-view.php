<?php
    $size = 'grid_big';
    global $post, $number_columns, $massonry_class, $ajax_container_class;

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


    if( is_page_template('latest-portfolios.php') ){
        $filter_classes =  red_get_distinct_post_terms( $post->ID, 'portfolio-category', $return_names = true, $filter_type='' );    
    }elseif( is_page_template('latest-galleries.php') ){
        $filter_classes =  red_get_distinct_post_terms( $post->ID, 'gallery-category', $return_names = true, $filter_type='' );    
    }else{
        $filter_classes = '';
    }
    
?>

<div <?php post_class($block_width . ' columns all-elements '. $massonry_class. 'post-cblock '.$filter_classes); ?> data-post-id="<?php echo $post->ID; ?>" >
    <article>
        <header class="entry-header">
            <div class="featimg">
                <?php
                    if (has_post_thumbnail($post->ID)) {

                       $img_url1 = wp_get_attachment_url( get_post_thumbnail_id( $post -> ID )  ,'full'); //get img URL
                       
                       $aqua_crop = true;
                       
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
                <div class="entry-feat-overlay">
                    <h2 class="entry-title">
                        <a href="<?php echo get_permalink($post->ID);  ?>" title="<?php _e('Permalink to', 'redcodn'); ?> <?php echo $post->post_title; ?>" rel="bookmark">
                            <?php if(get_post_type( $post ) == 'video'){ ?>
                                <i class="icon-play"></i>
                            <?php } ?>
                            <?php echo $post->post_title; ?>
                        </a>
                    </h2>
                </div>
            </div>
        </header>
        <?php if( meta::logic( $post , 'settings' , 'love' ) ): ?>
        <footer class="entry-footer">
            <div class="dotted-separator">
                <div class="ilike">
                    <?php echo like::content($post->ID,$return = false, $additional_class = 'no-count', $show_label = false);  ?>
                </div>
            </div>
        </footer>
        <?php endif; ?>
    </article>
</div>