<?php get_header(); ?>
<section id="main">
	<div id="primary">
        <div id="content" role="main">
		<?php
	        while( have_posts () ){
	            the_post();
	            $post_id = $post -> ID
	    ?>
		    <div class="single-row-container">
		        <div class="row">
				<?php layout::side( 'left' , 0 , 'attachment' ); ?>

				<div class="main-container <?php echo tools::primary_class( 0 , 'attachment', $return_just_class = true ); ?>">
				    <article id="attachment-<?php the_ID(); ?>" <?php post_class( 'attachment' , $post -> ID ); ?>>       
				        <div class="row">            
				            <div class="twelve columns">                
				                <h2 class="post-title">
				                    <?php the_title(); ?>
				                </h2> 
				            </div>
				        </div>
				        <div class="entry-content ">
				            <div class="row">
				            	<div class="twelve columns">
					                 <div class="featimg"   >
										<?php
											$img_src = wp_get_attachment_image_src(  $post_id  , 'full' );
											echo '<img src="'.$img_src[0].'" alt="" />';			
										?>                
									</div>
									<?php echo the_content(); ?>
								</div>
				            </div>
				        </div>
				    </article>
				</div>
				<?php layout::side( 'right' , 0 , 'attachment' ); ?>
				</div>
			</div>
		<?php
		  }
		?>
		</div>
	</div>
</section>
<?php get_footer(); ?>