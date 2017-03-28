<?php
	if(is_category()){
		if( have_posts () ){
            ?><h2 class="content-title category"><?php _e( 'Category archives: ' , 'redcodn' ); echo get_cat_name( get_query_var('cat') ); ?></h2><?php

        }else{
            ?><h2 class="content-title category"><?php _e( 'Sorry, no posts found' , 'redcodn' ); ?></h2><?php

        }
	}elseif(is_tag()){
		if( have_posts () ){
            ?><h2 class="content-titletag"><?php _e( 'Tags archives' , 'redcodn' ); echo ': ';  echo  urldecode(get_query_var('tag')); ?></h2><?php

        }else{
            ?><h2 class="content-titlearchive"><?php _e( 'Sorry, no posts found' , 'redcodn' ); ?></h2><?php
        }
	}elseif(is_author()){
		if( have_posts () ){
            ?><h2 class="content-title archive">
                <?php _e( 'Author archives: ' , 'redcodn' ); echo get_cat_name( get_query_var('cat') ); ?>
                <span class='vcard'>
                    <a class="url fn n" href="" title="<?php echo esc_attr( get_the_author_meta( 'display_name' , $post-> post_author ) ); ?>" rel="me">
                        <?php echo get_the_author_meta( 'display_name' , $post-> post_author ); ?>
                    </a>
                </span>
            </h2><?php

        }else{
            ?><h2 class="content-title archive"><?php _e( 'Sorry, no posts found' , 'redcodn' ); ?></h2><?php

        }
	}elseif(is_search()){
		if( have_posts () ){
            ?><h2 class="content-title search"><?php _e( 'Search results: ' , 'redcodn' ); echo get_search_query(); ?></h2><?php

        }else{
            ?><h2 class="content-title search"><?php _e( 'Sorry, no posts found' , 'redcodn' ); ?></h2><?php

        }
	}elseif(is_home() && !is_front_page() ){
		if( have_posts () ){
            ?><h2 class="content-title blog_page"><?php _e( 'Blog page' , 'redcodn' ); ?></h2><?php

        }else{
            ?><h2 class="content-title blog_page"><?php _e( 'Sorry, no posts found' , 'redcodn' ); ?></h2><?php

        }
	}elseif(is_archive()){
		if( have_posts () ){
            ?>
            <h2 class="content-title archive">
                <?php

                if ( is_day() ) {
                    echo __( 'Daily archives' , 'redcodn' ) . ':' . get_the_date();
                }else if ( is_month() ) {
                    echo __( 'Monthly archives' , 'redcodn' ) . ':' . get_the_date( 'F Y' );
                }else if ( is_year() ) {
                    echo __( 'Yearly archives' , 'redcodn' ) . ':' . get_the_date( 'Y' );
                }else if (is_tax( 'post_format' )){
                    echo __( 'Post format archives' , 'redcodn' ) . ':' . get_post_format(); 
                }else if (get_post_type() == 'video'){
                    echo __( 'Video archives' , 'redcodn' ); 
                }else if (get_post_type() == 'gallery'){
                    echo __( 'Gallery archives' , 'redcodn' ); 
                }else if(is_post_type_archive()){    
                    echo sprintf(__( '%s archives' , 'redcodn' ), post_type_archive_title());
                }else {
                    echo  __( 'Blog archives' , 'redcodn' ) ;
                }
                ?>

            </h2><?php

        }else{
            ?><h2 class="content-title search"><?php _e( 'Sorry, no posts found' , 'redcodn' ); ?></h2><?php

        }
	}
    
?>