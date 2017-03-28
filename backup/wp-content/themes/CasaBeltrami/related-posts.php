<?php
    /* related posts by herarchical taxonomy */
    /* get tax slugs and number of similar posts  */ 
    function similar_query( $post_id , $taxonomy ){
        
            $topics = wp_get_post_terms( $post_id , $taxonomy );

            $terms = array();
            if( !empty( $topics ) ){
                foreach ( $topics as $topic ) {
                    $term = get_category( $topic->slug );

                    array_push( $terms, $topic->slug );
                }
            }

            if( !empty( $terms ) ){
                $query = new WP_Query( array(
                    'post__not_in' => array( $post_id ) ,
                    'posts_per_page' => 3,
                    'orderby' => 'rand',
                    'tax_query' => array(
                        array(
                        'taxonomy' => $taxonomy ,
                        'field' => 'slug',
                        'terms' => $terms ,
                        )
                    )
                ));
            }else{
                $query = array();
            }
        

        return $query;
    }

    /* post taxonomy */
    $tax = options::get_value( 'blog_post' , 'similar_type' );

    if( get_post_type($post->ID) == 'post' ){
        $tax = $tax;
    } elseif( get_post_type($post->ID) == 'gallery' ){
        if( $tax == 'category' ){
            $tax = 'gallery-category';
        } else{
            $tax = 'gallery-tag';
        }
    }  elseif( get_post_type($post->ID) == 'video' ){
        if( $tax == 'category' ){
            $tax = 'video-category';
        } else{
            $tax = 'video-tag';
        }
    }

    $layout = meta::get_meta( $post -> ID , 'layout' );
    
    $label  = __( 'Related Posts' , 'redcodn' );
    $query  = similar_query( $post -> ID , $tax , 4 );
    $length = layout::length( $post -> ID , 'single' );


    if( !empty( $query ) ){
        $result = $query -> posts;
    }

    if( !empty( $result) && meta::logic( $post , 'settings' , 'related' ) ){
?>
    <div class="related-box">
        <div class="row red-thumb-view title-below">
            <div class="twelve columns">
                <h3 id="related-title"><?php _e( 'Related posts' , 'redcodn' ); ?></h3>
            </div>
            
            <?php             

                foreach( $result as $post ){
                ?>
                        <div class="four columns">
                            <article>
                                <?php if(has_post_thumbnail( $post -> ID )){ 
                                    $size = 'grid_big';     
                                        
                                    $img_url1 = wp_get_attachment_url( get_post_thumbnail_id( $post -> ID )  ,'full'); //get img URL
                               
                                    $img_url = aq_resize( $img_url1, get_aqua_size($size), get_aqua_size($size, 'height'), true, true); //crop img
                                ?>
                                <header class="entry-header">
                                    <div class="featimg">
                                        <a href="<?php echo get_permalink($post->ID);  ?>" title="<?php _e('Permalink to', 'redcodn'); ?> <?php echo $post->post_title; ?>" rel="bookmark">
                                            <img src="<?php echo $img_url; ?>" alt="<?php echo $post -> post_title; ?>">
                                        </a>
                                    </div>
                                </header>
                                <?php } else { ?>
                                <header class="entry-header">
                                    <div class="featimg">
                                        <a href="<?php echo get_permalink($post->ID);  ?>" title="<?php _e('Permalink to', 'redcodn'); ?> <?php echo $post->post_title; ?>" rel="bookmark">
                                            <img src="<?php echo get_template_directory_uri() ?>/images/no.image.600x300.png" alt="<?php echo $post->post_title; ?>" />
                                        </a>
                                    </div>
                                </header>
                                <?php } ?>
                                <section class="entry-content">
                                    <h2 class="entry-title">
                                        <a href="<?php echo get_permalink($post->ID);  ?>" title="<?php _e('Permalink to', 'redcodn'); ?> <?php echo $post->post_title; ?>" rel="bookmark"><?php echo $post->post_title; ?></a>
                                    </h2>
                                </section>

                            </article>
                        </div>

                <?php    
                    
                }

            

            ?>
        
    
    </div>
</div>
<?php

        wp_reset_postdata();
    }
?>
    