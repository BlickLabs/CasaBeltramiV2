<?php get_header(); ?>

<?php  if(options::get_value( 'layout', 'blog_page' ) !== 'full') {
	$sidebar_class = 'has-'. options::get_value( 'layout', 'blog_page' ) . '-sidebar';
}else{
	$sidebar_class = '';
}
?>
<section id="main" class="<?php  echo $sidebar_class; ?>">
    <div class="main-container">
    	<?php if( have_posts () ){
            ?><?php
        }else{
            ?><h2 class="content-title blog_page"><?php _e( 'Sorry, no posts found' , 'redcodn' ); ?></h2><?php
        } ?>

        <?php layout::side( 'left' , 0 , 'blog_page' ); ?>
            <?php red_loop( 'blog_page', tools::primary_class( 0 , 'blog_page', $return_just_class = true ) ); ?>
        <?php layout::side( 'right' , 0 , 'blog_page' ); ?>
    </div>
</section>
<?php get_footer(); ?>