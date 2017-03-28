<?php get_header(); ?>

<?php  if(options::get_value( 'layout', 'tag' ) !== 'full') {
	$sidebar_class = 'has-'. options::get_value( 'layout', 'tag' ) . '-sidebar';
}else{
	$sidebar_class = '';
}
?>
<section id="main" class="<?php  echo $sidebar_class; ?>redcodn">
    <div class="main-container row">
    	<?php if ( tools::primary_class( 0 , 'tag', $return_just_class = true) != 'twelve columns' ): ?>
    		<div class="row">
    	<?php endif ?>
    	<?php get_template_part('title-archives'); ?>
        <?php layout::side( 'left' , 0 , 'tag' ); ?>
            <?php red_loop( 'tag', tools::primary_class( 0 , 'tag', $return_just_class = true) ); ?>
        <?php layout::side( 'right' , 0 , 'tag' ); ?>
        <?php if ( tools::primary_class( 0 , 'tag', $return_just_class = true) != 'twelve columns' ): ?>
    		</div>
    	<?php endif ?>
    </div>
</section>
<?php get_footer(); ?>
