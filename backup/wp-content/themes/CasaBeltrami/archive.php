<?php get_header(); ?>

<?php  if(options::get_value( 'layout', 'archive' ) !== 'full') {
	$sidebar_class = 'has-'. options::get_value( 'layout', 'archive' ) . '-sidebar';
}else{
	$sidebar_class = '';
}
?>
<section id="main" class="<?php  echo $sidebar_class; ?>">
    <div class="main-container">
		<?php get_template_part('title-archives'); ?>
		<?php if (tools::primary_class( 0 , 'archive', $return_just_class = true) != 'twelve columns' ): ?>
        	<div class="row">
        <?php endif ?>
        <?php layout::side( 'left' , 0 , 'archive' ); ?>
            <?php red_loop( 'archive', tools::primary_class( 0 , 'archive', $return_just_class = true) ); ?>
        <?php layout::side( 'right' , 0 , 'archive' ); ?>
        <?php if (tools::primary_class( 0 , 'archive', $return_just_class = true) != 'twelve columns' ): ?>
        	</div>
        <?php endif ?>
    </div>
</section>
<?php get_footer(); ?>
