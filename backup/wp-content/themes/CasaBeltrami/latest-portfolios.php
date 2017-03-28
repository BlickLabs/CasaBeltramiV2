<?php
/*
Template Name: Latest portfolios
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

    //portfolioTemplateSettings
    $portfolioTemplateSettings = meta::get_meta( $post->ID , 'portfolioTemplateSettings' );

    if(isset($portfolioTemplateSettings['pagination_type']) && $portfolioTemplateSettings['pagination_type'] == 'infinitescroll'){
        wp_enqueue_script( 'infinitescroll' , get_template_directory_uri() . '/js/jquery.infinitescroll.min.js' , array( 'jquery' ),false,true ); 
        wp_localize_script( 'functions', 'enb_infinitescroll', '1');
    }else{
        wp_localize_script( 'functions', 'enb_infinitescroll', '0');
    }

?>

<section id="main">
    <?php 

        $slideshow = meta::get_meta( $post->ID , 'slideshowSettings' ); 
        if (isset($slideshow['slideshow_select'])) {
            $post_slide = get_post($slideshow['slideshow_select']); 
            red_get_slideshow($slideshow['slideshow_select']);
        }

    ?>
    <div class="main-container row latest-portfolios">

        <?php the_content(); ?>

        <?php
            if( isset($portfolioTemplateSettings['enb_filters']) && 'yes' == $portfolioTemplateSettings['enb_filters']  ){
            
                echo red_get_filters($portfolioTemplateSettings['categories'],'portfolio-category', $filter_type = '', $title = '');
                $filter_class = 'filter-on';
                wp_localize_script( 'functions', 'enable_filters', '1');
            }else{
                $filter_class = '';
            }

        ?>

    	<div class="row red-thumb-view title-over massonry <?php echo $filter_class; ?> ">

            <?php 
                if ( get_query_var('paged') ) {
                    $current = get_query_var('paged');
                } elseif ( get_query_var('page') ) {
                    $current = get_query_var('page');
                } else {
                    $current = 1;
                }
            	$query_args = array('post_type' => 'portfolio',
                                    'paged' => $current 
                                );

                if( isset($portfolioTemplateSettings['categories']) && is_array($portfolioTemplateSettings['categories']) ){
                    if(!(sizeof($portfolioTemplateSettings['categories']) == 1 && 'all' == $portfolioTemplateSettings['categories'][0])){ // if user didn't select just all categories
                        $query_args['tax_query'] = array(
                                                    array(  'taxonomy' => 'portfolio-category',
                                                            'field' => 'slug',
                                                            'terms' => $portfolioTemplateSettings['categories']
                                                    )
                                                );
                    }
                    
                }
                
                $the_query = new WP_Query($query_args); 

            ?>
			<?php 
                
                $post_ids = array();
                while ($the_query->have_posts()) : $the_query->the_post(); 
            ?>
				<?php get_template_part('redshortcodes/red-thumb-view')?>
			<?php 
                    $post_ids[] = $the_query->post->ID;
                endwhile; 
                wp_reset_query();
            ?>
		</div>
        <?php if (!isset($portfolioTemplateSettings['enb_filters']) || 'no' == $portfolioTemplateSettings['enb_filters']) { ?>
            <?php if(isset($portfolioTemplateSettings['pagination_type']) && $portfolioTemplateSettings['pagination_type'] == 'infinitescroll') { ?>
    		<nav  id="page_nav">
                <?php echo get_next_posts_link('Go to next page', get_option( 'posts_per_page' )); ?>
            </nav>
            <?php } else { 
                get_template_part( 'template-pagination' ); 
            } ?>
        <?php } ?>

    </div>
</section>
<?php get_footer(); ?>
