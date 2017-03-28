<?php get_header(); ?>

<?php  if(options::get_value( 'layout', 'search' ) !== 'full') {
	$sidebar_class = 'has-'. options::get_value( 'layout', 'search' ) . '-sidebar';
}else{
	$sidebar_class = '';
}
?>
<section id="main" class="<?php  echo $sidebar_class; ?>redcodn">
    <div class="main-container">
    	<div class="row">
    		<div class="twelve columns">
				<?php get_template_part('title-archives'); ?>
				<?php if ( tools::primary_class( 0 , 'search', $return_just_class = true) != 'twelve columns' ): ?>
		    		<div class="row">
		    	<?php endif ?>
			    <?php layout::side( 'left' , 0 , 'search' ); ?>
			        <?php red_loop( 'search', tools::primary_class( 0 , 'search', $return_just_class = true ) ); ?>       
			    <?php layout::side( 'right' , 0 , 'search' ); ?>
			    <?php if ( tools::primary_class( 0 , 'search', $return_just_class = true) != 'twelve columns' ): ?>
		    		<div class="row">
		    	<?php endif ?>	
    		</div>
    	</div>
    </div>
</section>
<?php get_footer(); ?>

