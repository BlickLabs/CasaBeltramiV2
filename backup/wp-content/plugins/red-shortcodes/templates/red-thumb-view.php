<?php
    $size = 'medium';
    global $post, $number_columns, $column_class;

    if(isset($number_columns) && is_numeric($number_columns)){
        $block_width = ' ' . red_columns_arabic_to_word($number_columns). ' ';
    }else{
        $block_width = ' four ';
    }
?>


<article <?php post_class($block_width . ' ' . $column_class) ?> >
    <?php if (has_post_thumbnail($post->ID)) { ?>
    <header class="entry-header">
        <div class="featimg">
            <?php
                if (has_post_thumbnail($post->ID)) {

                    $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ,  $size );
                ?>
                    <a href="<?php echo get_permalink($post->ID);  ?>">
                        <img src="<?php echo $img_url[0]; ?>" alt="<?php echo $post->post_title; ?>" >
                    </a>
                <?php    
                }
            ?> 
        </div>
    </header>
    <?php } ?> 
    <section class="entry-content">
        <h2 class="entry-title">
            <a href="<?php echo get_permalink($post->ID);  ?>" title="<?php _e('Permalink to', 'redcodn'); ?> <?php echo $post->post_title; ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>
    </section>
</article>