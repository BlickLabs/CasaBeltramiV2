<?php
    $size = 'full';
    global $post;
?>

<article <?php post_class(); ?> >
	<div class="row">
		<div >
			
			<header class="entry-header">
				<h2 class="entry-title">
					<a href="<?php echo get_permalink($post->ID);  ?>" title="<?php _e('Permalink to', 'cosmotheme'); ?> <?php echo $post->post_title; ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
				<?php if (has_post_thumbnail($post->ID)) { ?>
				<div class="featimg">
	                <?php
                        $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ,  $size );
                    ?>
                    <a href="<?php echo get_permalink($post->ID);  ?>">
                        <img src="<?php echo $img_url[0]; ?>" alt="<?php echo $post->post_title; ?>" >
                    </a>
                </div>
                <?php } ?> 
			</header>
			
			<section class="entry-content">
				<div class="entry-excerpt">
					<?php
	                    the_excerpt();  
	                ?>
				</div>
			</section>
			
		</div>
	</div>
</article>
