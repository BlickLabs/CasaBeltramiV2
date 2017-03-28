<?php
/*
Template Name: Blog Posts
*/
?>

<?php get_header(); ?>
<?php
    global $massonry_class, $the_query;
    $massonry_class = ' massonry-elem ';
    $enable_massonry = true;

    if($enable_massonry){
        wp_enqueue_script( 'isotope' , get_template_directory_uri() . '/js/jquery.isotope.min.js' , array( 'jquery' ),false,true );
        wp_localize_script( 'functions', 'enable_massonry', '1');
    }else{
        wp_localize_script( 'functions', 'enable_massonry', '0');
    }

?>

<section id="main" class="left-layout narrow-post">
    <?php 

        $slideshow = meta::get_meta( $post->ID , 'slideshowSettings' ); 
        if (isset($slideshow['slideshow_select'])) {
            $post_slide = get_post($slideshow['slideshow_select']); 
            red_get_slideshow($slideshow['slideshow_select']);
        }

    ?>
    <div class="main-container row">
        <div class="nine columns">
            <?php the_content(); ?>
            
        	<div class="row red-list-view">

                <?php 
                    if ( get_query_var('paged') ) {
                        $current = get_query_var('paged');
                    } elseif ( get_query_var('page') ) {
                        $current = get_query_var('page');
                    } else {
                        $current = 1;
                    }
                	$query_args = array('post_type' => 'post',
                                        'paged' => $current 
                                    );
                    
                    $the_query = new WP_Query($query_args); 

                ?>
    			<?php 
                    
                    $post_ids = array();
                    while ($the_query->have_posts()) : $the_query->the_post(); 
                ?>
    				<?php get_template_part('redshortcodes/red-list-view')?>
    			<?php 
                        $post_ids[] = $the_query->post->ID;
                    endwhile; 
                ?>
    		</div>
    		
    		<?php get_template_part( 'template-pagination' ); ?>
        </div>
        
        <?php layout::side( 'right' , $post->ID, 'single'); ?>

    </div>
</section>
<?php get_footer(); ?>
