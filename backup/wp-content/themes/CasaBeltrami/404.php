<?php get_header(); ?>

<section id="main">
    
    <div class="row">
        
            <h2 class="content-title search"><?php _e( 'Upss Error 404 lo que buscas no se encuentra' , 'redcodn' ); ?></h2>
            
    </div>

    <div class="row">
        <?php layout::side( 'left' , 0 , '404' ); ?>
            <div class="<?php echo tools::primary_class( 0 , '404', $return_just_class = true ); ?>" id="primary">
        
                    <?php get_template_part( 'loop' , '404' ); ?>
            </div>                    
 
        <?php layout::side( 'right' , 0 , '404' ); ?>
    </div>
</section>
<?php get_footer(); ?>