<?php
    $size = 'list_view';
    global $post;

    $no_feat_class = '';
    $content_class = 'four columns';
    if ( !has_post_thumbnail($post->ID) ) {
    	$no_feat_class = 'no-feat-img';
    	$content_class = 'twelve columns';
    }

?>

<div <?php post_class(' twelve columns post-cblock ' . $no_feat_class); ?> data-post-id="<?php echo $post->ID; ?>">
	<article class="list-large-thumb">
		<div class="row">
			<?php if ( has_post_thumbnail($post->ID) ) { ?>
			<div class="eight columns">
				<header class="entry-header">
					<div class="featimg">
						<?php
		                    if (has_post_thumbnail($post->ID)) {

		                        $img_url1 = wp_get_attachment_url( get_post_thumbnail_id( $post -> ID )  ,'full'); //get img URL
		                        $img_url = aq_resize( $img_url1, get_aqua_size($size), get_aqua_size($size, 'height'), true, true); //crop img
		                    ?>
		                        <a href="<?php echo get_permalink($post->ID);  ?>" >
		                            <img src="<?php echo $img_url; ?>" alt="<?php echo $post->post_title; ?>" >
		                        </a>
		                    <?php    
		                    }
		                ?>
		                <?php if( get_post_format() == 'video' ) : ?>
	                        <div class="video-post-id">
	                            <i class="icon-play"></i>
	                        </div>
                        <?php endif; ?>
						<a href="<?php echo get_permalink($post->ID);  ?>" class="entry-date">
							<?php echo red_get_post_date($post -> ID); ?>
						</a>
						<div class="entry-feat-overlay">
							<a href="<?php echo get_permalink($post->ID);  ?>" class="view-more">
								<i class="icon-search"></i>
							</a>
						</div>
					</div>
				</header>
			</div>
			<?php } ?>
			<div class="<?php echo $content_class; ?>">
				<section class="entry-content">
					<h2 class="entry-title">
						<a href="<?php echo get_permalink($post->ID);  ?>"  title="<?php _e('Permalink to', 'redcodn'); ?>  <?php echo $post->post_title; ?>" rel="bookmark"><span><?php echo $post->post_title; ?></span></a>
					</h2>
					<?php if( meta::logic( $post , 'settings' , 'love' ) ): ?>
					<div class="entry-meta">
						<div class="dotted-separator">
							<div class="ilike">
								<?php echo like::content($post->ID,$return = false, $additional_class = 'no-count', $show_label = false);  ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="entry-excerpt">
						<?php //the_content('Read more...');
		                    $ln = 360;
		                    if (!empty($post->post_excerpt)) {
		                        if (strlen(strip_tags(strip_shortcodes($post->post_excerpt))) > $ln) {
		                            echo mb_substr(strip_tags(strip_shortcodes($post->post_excerpt)), 0, $ln) . '[...]';
		                        } else {
		                            echo strip_tags(strip_shortcodes($post->post_excerpt));
		                        }
		                    } else {
		                        if (strlen(strip_tags(strip_shortcodes($post->post_content))) > $ln) {
		                            echo mb_substr(strip_tags(strip_shortcodes($post->post_content)), 0, $ln) . '[...]';
		                        } else {
		                            echo strip_tags(strip_shortcodes($post->post_content));
		                        }
		                    }    
		                ?>
					</div>													
					<ul class="share-options">
						<li>
							<a class="icon-facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID); ?>"></a>
						</li>
		                <li>
		                	<a class="icon-twitter" target="_blank" href="http://twitter.com/home?status=<?php echo urlencode($post->post_title); ?>+<?php echo get_permalink($post->ID); ?>"></a>
		                </li>
		                <li>
		                    <a class="icon-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>&amp;description=<?php echo urlencode(get_the_title()); ?>" ></a>
		                </li>
					</ul>
				</section>
			</div>
		</div>
	</article>
</div>