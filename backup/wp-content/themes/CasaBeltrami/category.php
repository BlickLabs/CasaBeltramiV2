<?php get_header(); ?>

<?php  if(options::get_value( 'layout', 'category' ) !== 'full') {
	$sidebar_class = 'has-'. options::get_value( 'layout', 'category' ) . '-sidebar';
}else{
	$sidebar_class = '';
}
?>
<section id="main" class="<?php  echo $sidebar_class; ?>redcodn">

    
    <div class="main-container">
    	<?php get_template_part('title-archives'); ?>
    	<?php if ( tools::primary_class( 0 , 'category', $return_just_class = true) != 'twelve columns' ): ?>
    		<div class="row">
    	<?php endif ?>
        <?php layout::side( 'left' , 0 , 'category' ); ?>
            <?php red_loop( 'category', tools::primary_class( 0 , 'category', $return_just_class = true ) ); ?>
        <?php layout::side( 'right' , 0 , 'category' ); ?>
        <?php if (tools::primary_class( 0 , 'category', $return_just_class = true) != 'twelve columns' ): ?>
        	</div>
        <?php endif ?>
    </div>
</section>
<?php get_footer(); ?>
