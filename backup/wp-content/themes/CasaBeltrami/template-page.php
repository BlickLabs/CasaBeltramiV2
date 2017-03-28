<?php
/*
Template Name: Fullwidth Page
*/
?>

<?php get_header(); ?>

<section id="main">
    <?php 
        $slideshow = meta::get_meta( $post->ID , 'slideshowSettings' ); 
        if (isset($slideshow['slideshow_select'])) {
            $post_slide = get_post($slideshow['slideshow_select']); 
            red_get_slideshow($slideshow['slideshow_select']);
        }
    ?>
    <div class="main-container">
            <?php if(!is_front_page() && meta::logic( $post , 'settings' , 'page_title' ) ) : ?>
                <h2 class="post-title page-title"><?php the_title(); ?></h2>
            <?php endif; ?>
            <?php the_content(); ?>            
    </div>
</section>
<?php get_footer(); ?>
