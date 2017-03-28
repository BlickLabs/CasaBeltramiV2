<?php

/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_one_third')) {
	function red_one_third( $atts, $content = null ) {
	   return '<div class="red-one-third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_one_third', 'red_one_third');
}

if (!function_exists('red_one_third_last')) {
	function red_one_third_last( $atts, $content = null ) {
	   return '<div class="red-one-third red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_one_third_last', 'red_one_third_last');
}

if (!function_exists('red_two_third')) {
	function red_two_third( $atts, $content = null ) {
	   return '<div class="red-two-third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_two_third', 'red_two_third');
}

if (!function_exists('red_two_third_last')) {
	function red_two_third_last( $atts, $content = null ) {
	   return '<div class="red-two-third red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_two_third_last', 'red_two_third_last');
}

if (!function_exists('red_one_half')) {
	function red_one_half( $atts, $content = null ) {
	   return '<div class="red-one-half">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_one_half', 'red_one_half');
}

if (!function_exists('red_one_half_last')) {
	function red_one_half_last( $atts, $content = null ) {
	   return '<div class="red-one-half red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_one_half_last', 'red_one_half_last');
}

if (!function_exists('red_one_fourth')) {
	function red_one_fourth( $atts, $content = null ) {
	   return '<div class="red-one-fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_one_fourth', 'red_one_fourth');
}

if (!function_exists('red_one_fourth_last')) {
	function red_one_fourth_last( $atts, $content = null ) {
	   return '<div class="red-one-fourth red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_one_fourth_last', 'red_one_fourth_last');
}

if (!function_exists('red_three_fourth')) {
	function red_three_fourth( $atts, $content = null ) {
	   return '<div class="red-three-fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_three_fourth', 'red_three_fourth');
}

if (!function_exists('red_three_fourth_last')) {
	function red_three_fourth_last( $atts, $content = null ) {
	   return '<div class="red-three-fourth red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_three_fourth_last', 'red_three_fourth_last');
}

if (!function_exists('red_one_fifth')) {
	function red_one_fifth( $atts, $content = null ) {
	   return '<div class="red-one-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_one_fifth', 'red_one_fifth');
}

if (!function_exists('red_one_fifth_last')) {
	function red_one_fifth_last( $atts, $content = null ) {
	   return '<div class="red-one-fifth red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_one_fifth_last', 'red_one_fifth_last');
}

if (!function_exists('red_two_fifth')) {
	function red_two_fifth( $atts, $content = null ) {
	   return '<div class="red-two-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_two_fifth', 'red_two_fifth');
}

if (!function_exists('red_two_fifth_last')) {
	function red_two_fifth_last( $atts, $content = null ) {
	   return '<div class="red-two-fifth red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_two_fifth_last', 'red_two_fifth_last');
}

if (!function_exists('red_three_fifth')) {
	function red_three_fifth( $atts, $content = null ) {
	   return '<div class="red-three-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_three_fifth', 'red_three_fifth');
}

if (!function_exists('red_three_fifth_last')) {
	function red_three_fifth_last( $atts, $content = null ) {
	   return '<div class="red-three-fifth red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_three_fifth_last', 'red_three_fifth_last');
}

if (!function_exists('red_four_fifth')) {
	function red_four_fifth( $atts, $content = null ) {
	   return '<div class="red-four-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_four_fifth', 'red_four_fifth');
}

if (!function_exists('red_four_fifth_last')) {
	function red_four_fifth_last( $atts, $content = null ) {
	   return '<div class="red-four-fifth red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_four_fifth_last', 'red_four_fifth_last');
}

if (!function_exists('red_one_sixth')) {
	function red_one_sixth( $atts, $content = null ) {
	   return '<div class="red-one-sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_one_sixth', 'red_one_sixth');
}

if (!function_exists('red_one_sixth_last')) {
	function red_one_sixth_last( $atts, $content = null ) {
	   return '<div class="red-one-sixth red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_one_sixth_last', 'red_one_sixth_last');
}

if (!function_exists('red_five_sixth')) {
	function red_five_sixth( $atts, $content = null ) {
	   return '<div class="red-five-sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_five_sixth', 'red_five_sixth');
}

if (!function_exists('red_five_sixth_last')) {
	function red_five_sixth_last( $atts, $content = null ) {
	   return '<div class="red-five-sixth red-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('red_five_sixth_last', 'red_five_sixth_last');
}


/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_button')) {
	function red_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'target' => '_self',
			'style' => 'grey',
			'size' => 'small',
			'type' => 'round'
	    ), $atts));
		
	   return '<a target="'.$target.'" class="red-button '.$size.' '.$style.' '. $type .'" href="'.$url.'">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('red_button', 'red_button');
}


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_alert')) {
	function red_alert( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'white'
	    ), $atts));
		
	   return '<div class="red-alert '.$style.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('red_alert', 'red_alert');
}


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_toggle')) {
	function red_toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open'
	    ), $atts));
	
		return "<div data-id='".$state."' class=\"red-toggle\"><span class=\"red-toggle-title\">". $title ."</span><div class=\"red-toggle-inner\">". do_shortcode($content) ."</div></div>";
	}
	add_shortcode('red_toggle', 'red_toggle');
}


/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_tabs')) {
	function red_tabs( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="red-tabs-'. $i .'" class="red-tabs"><div class="red-tab-inner">';
			$output .= '<ul class="red-nav red-clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#red-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'red_tabs', 'red_tabs' );
}

if (!function_exists('red_tab')) {
	function red_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="red-tab-'. sanitize_title( $title ) .'" class="red-tab">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'red_tab', 'red_tab' );
}

/*-----------------------------------------------------------------------------------*/
/*	List posts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_list_posts')) {
	function red_list_posts( $atts, $content = null ) {
		global $view_type, $number_columns, $column_class;


		$defaults = array( 
			'post_type' => 'post',
			'taxonomy' => '',
			'term_name' => '',
			'view_type' => 'red_list_view',
			'number_posts' => get_option('posts_per_page'),
			'number_columns' => 3,
			'pagination' => 'none',
			'orderby' => 'date',
			'order' => 'DESC'

		);
		extract( shortcode_atts( $defaults, $atts ) );

		$current = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$query_args = array( 'post_type' => $post_type, 'orderby' => $orderby, 'paged' => $current, 'order' => $order );
		
		if(strlen($number_posts)){
			$query_args['posts_per_page'] = $number_posts;
		}

		if(strlen($taxonomy) && strlen($term_name)){
			$query_args['tax_query'] = array(
											array(
												'taxonomy' => $taxonomy,
												'field' => 'slug',
												'terms' => $term_name
											)
										);
		}

		$query = new WP_Query( $query_args );
		
		ob_start();
        ob_clean();
        	// The Loop

        	// hook into before red loop filter, for example you may want to add here advertising or something else
			$before_loop = apply_filters('red_before_loop', '');
			if ( $before_loop != '' ){
				echo $before_loop;
			}

        	red_get_template( 'loop/loop-start.php' );

        	
			if ( $query->have_posts() ) {
				$current_post = 1;
				while ( $query->have_posts() ) {

					if ($current_post % $number_columns == 0) {
						$column_class = 'red-column-last';
					}else if($current_post % $number_columns == 1){
						$column_class = 'red-column-first';
					}else{
						$column_class = '';
					}

					$query->the_post();
					red_get_template( $view_type.'.php' );

					$current_post++;
				}
			} else {
				// no posts found
			}
			
			red_get_template( 'loop/loop-end.php' );

			//==========================Pagination==============================
			if($pagination == 'pagination'){ // if pagination is enabled

				$total = $query->max_num_pages;
				if($query->max_num_pages > 1 ){ // if we have more than 1 page

                  	$pl_args = array(
	                    'base'     => add_query_arg('paged','%#%'),
	                    'format'   => '',
	                    'total'    => $query->max_num_pages,
	                    'current'  => max(1, $current),
	                    'type' => 'array'
                  	);

                  	// for ".../page/n"
                  	if($GLOBALS['wp_rewrite']->using_permalinks())
                    $pl_args['base'] = user_trailingslashit(trailingslashit(get_pagenum_link(1)).'page/%#%/', 'paged');

                    $pgn = paginate_links($pl_args);
                   
                    if(!empty($pgn)){
                        echo '<div class="red-list-posts  pag">';
                        //echo '<ul class="b_pag center p_b">';
                        foreach($pgn as $k => $link){
                            //echo '<li>'; 
                            echo str_replace( "'" , '"' , $link );
                            //echo '</li>';
                        }
                        //echo '</ul>';
                        echo '</div>';
                    }
                }
			}
			//==========================EOF Pagination==============================

			// hook into after red loop filter, for example you may want to add here advertising or something else
			$after_loop = apply_filters('red_after_loop', '');
			if ( $after_loop != '' ){
				echo $after_loop;
			}
	
			/* Restore original Post Data */
			wp_reset_postdata();

        $posts_list = ob_get_clean();
		
	   return $posts_list;
	}
	add_shortcode('red_list_posts', 'red_list_posts');
}


/*-----------------------------------------------------------------------------------*/
/*	Featured area
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_featured_area')) {
	function red_featured_area( $atts, $content = null ) {

		$defaults = array( 
			'post_type' => 'post',
			'taxonomy' => '',
			'term_name' => '',
			'number_posts' => '7',
			'orderby' => 'date',
			'order' => 'DESC'

		);
		extract( shortcode_atts( $defaults, $atts ) );

		$current = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$query_args = array( 'post_type' => $post_type, 'orderby' => $orderby, 'order' => $order );
		
		if(strlen($number_posts)){
			$query_args['posts_per_page'] = $number_posts;
		}

		if(strlen($taxonomy) && strlen($term_name)){
			$query_args['tax_query'] = array(
											array(
												'taxonomy' => $taxonomy,
												'field' => 'slug',
												'terms' => $term_name
											)
										);
		}

		$query = new WP_Query( $query_args );
		$is_mobile = wp_is_mobile();
		$mobile_class = '';
		if( $is_mobile ){
			$mobile_class = 'is-mobile';
		}
		$before_loop = '<div class="row featured-area '. $mobile_class .'">';
		$after_loop = '</div>';

		ob_start();
        ob_clean();
        	// The Loop

        	echo $before_loop;
			if ( $query->have_posts() ) {
				
				if( !$is_mobile ){
					global $current_post;
					$current_post = 1;
					while ( $query->have_posts() ) {
							if ($current_post == '2') {
								echo '<div class="two columns others">';
							}
							$query->the_post();
							if( $current_post < 5 && $current_post > 1){
								if( $current_post != 1){
									red_get_template('red-featured-area.php' );
								}
							}
							if ($current_post == '4') {
								echo '</div>';
							}
						$current_post++;
					}
					$current_post = 1;
					while ( $query->have_posts() ) {
						$query->the_post();
						if( $current_post == 1){
							red_get_template('red-featured-area.php' );
						}
						$current_post++;
					}
					$current_post = 1;
					while ( $query->have_posts() ) {
							if ( $current_post == '5' ) {
								echo '<div class="two columns others">';
							}
							$query->the_post();
							if( $current_post > 4){
								red_get_template('red-featured-area.php' );
							}
							if ($current_post == '7') {
								echo '</div>';
							}
						$current_post++;
					}
				} else{
					global $current_post;
					$current_post = 1;
					while ( $query->have_posts() ) {
							$query->the_post();
							red_get_template('red-featured-area.php' );
							}
						$current_post++;
				}
			} else {
				// no posts found
			}
			echo $after_loop;
			/* Restore original Post Data */
			wp_reset_postdata();

        $posts_list = ob_get_clean();
		
	   return $posts_list;
	}
	add_shortcode('red_featured_area', 'red_featured_area');
}


/*-----------------------------------------------------------------------------------*/
/*	Featured area
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_gallery_post')) {
	function red_gallery_post( $atts, $content = null ) {

		$defaults = array( 
			'gallery_layout' => 'scroll',
			'post_id' => '74'

		);
		extract( shortcode_atts( $defaults, $atts ) );

		$query_args = array( 'post_type' => '', 'p' => $post_id);
		
		$query = new WP_Query( $query_args );
		wp_localize_script( 'functions', 'we_have_gallery_on_page', 'yes' );
		$single_gallery_layout = $gallery_layout;
		if( $single_gallery_layout == 'grid' ){
			echo '<script src="' . get_template_directory_uri() . '/js/masonry.pkgd.min.js"></script>';
			echo '<script src="' .  get_template_directory_uri() . '/js/imagesloaded.js"></script>';
			echo '<script src="' .  get_template_directory_uri() . '/js/modernizr.custom2.js"></script>';
			echo '<script src="' .  get_template_directory_uri() . '/js/classie.js"></script>';
			echo '<script src="' .  get_template_directory_uri() . '/js/AnimOnScroll.js"></script>';
		} elseif ( $single_gallery_layout == 'justified') {
			echo '<script src="' .  get_template_directory_uri() . '/js/jquery.colorbox-min.js"></script>';
			echo '<script src="' .  get_template_directory_uri() . '/js/jquery.justifiedgallery.min.js"></script>';
		} elseif ( $single_gallery_layout == 'fotorama') {
			echo '<script src="' .  get_template_directory_uri() . '/js/fotorama.js"></script>';
		}

		wp_localize_script( 'functions', 'single_gallery_layout', $single_gallery_layout );
		$before_loop = '<div class="gallery-type-container">';
		$after_loop = '</div>';



		$post_img_slideshow = '';
		ob_start();
        ob_clean();
        	// The Loop

        	echo $before_loop;
			if( $single_gallery_layout == 'scroll' ){
			    red_get_post_img_slideshow( $post_id, $size = 'single_gallery'); 
			    $post_img_slideshow = ob_get_clean();
			} elseif( $single_gallery_layout == 'grid' ){
			    up_grid_gallery( $post_id, $size = 'single_gallery'); 
			    
			} elseif( $single_gallery_layout == 'justified' ){
			    up_justify_gallery( $post_id, $size = 'single_gallery'); 
			    
			} elseif( $single_gallery_layout == 'slider' ){
			    echo '<div class="row"><div class="twelve columns horizontal-slider">';
			    red_get_flex_post_img_slideshow( $post_id, $size = 'single_gallery'); 
			    echo '</div></div>';
			    
			} elseif( $single_gallery_layout == 'fotorama' ){
			    up_fotorama_gallery( $post_id, $size = 'single_gallery'); 
			    
			} elseif( $single_gallery_layout == 'list' ){
			    up_list_gallery( $post_id, $size = 'single_gallery'); 
			    
			}

			// Show the gallery content
			if(strlen($post_img_slideshow)){
			    echo $post_img_slideshow;
			}
			echo $after_loop;
			/* Restore original Post Data */
			wp_reset_postdata();

        $posts_list = ob_get_clean();
		
	   return $posts_list;
	}
	add_shortcode('red_gallery_post', 'red_gallery_post');
}


/*-----------------------------------------------------------------------------------*/
/*	Featured slider
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_featured_slider')) {
	function red_featured_slider( $atts, $content = null ) {

		$defaults = array( 
			'post_type' => 'post',
			'taxonomy' => '',
			'term_name' => '',
			'number_posts' => '7',
			'orderby' => 'date',
			'order' => 'DESC'

		);
		extract( shortcode_atts( $defaults, $atts ) );

		$current = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$query_args = array( 'post_type' => $post_type, 'orderby' => $orderby, 'order' => $order );
		
		if(strlen($number_posts)){
			$query_args['posts_per_page'] = $number_posts;
		}

		if(strlen($taxonomy) && strlen($term_name)){
			$query_args['tax_query'] = array(
											array(
												'taxonomy' => $taxonomy,
												'field' => 'slug',
												'terms' => $term_name
											)
										);
		}

		$query = new WP_Query( $query_args );
		
		$before_loop = '<div class="row featured-slider">';
		$after_loop = '</div>';

		ob_start();
        ob_clean();
        	// The Loop

        	echo $before_loop;
			if ( $query->have_posts() ) {
				global $current_post;
				
				$current_post = 1;
				while ( $query->have_posts() ) {
					$query->the_post();
					if( $current_post == 1){
						echo '<div class="featured-slider-article">';
						red_get_template('red-featured-slider.php' );
						echo '</div>';
					}
					$current_post++;
				}
				$current_post = 1;
				while ( $query->have_posts() ) {
						if ($current_post == '2') {
							echo '<div class="featured-slider-other">';
						}
						$query->the_post();
						if( $current_post < 5 && $current_post > 1){
							if( $current_post != 1){
								red_get_template('red-featured-slider.php' );
							}
						}
						if ($current_post == '4') {
							echo '</div>';
						}
					$current_post++;
				}
			} else {
				// no posts found
			}
			echo $after_loop;
			/* Restore original Post Data */
			wp_reset_postdata();

        $posts_list = ob_get_clean();
		
	   return $posts_list;
	}
	add_shortcode('red_featured_slider', 'red_featured_slider');
}


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_team_member')) {
	function red_team_member( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'image_url'    	 => '',
			'name'		 => '',
			'job'    	 => '',
			'description'    	 => '',
			'social'    	 => ''
	    ), $atts));

	    if(strlen($social)){
	    	$social_array = explode(' ', $social);

	    	$the_soc_profile_array = array();
	    	foreach ($social_array as $key => $value) {
	    		if(strlen(trim($value))){
	    			$current_social_profile = explode(',', $value);
	    			$the_soc_profile_array[$current_social_profile[0]] = $current_social_profile[1];
	    		}
	    	}
	    }
	    ob_start();
		ob_clean();
	?>
		<article class=" red-team-member">
			<?php if(strlen($image_url)){ ?>
            <header>
                <div class="featimg">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $name; ?>">
                </div>
            </header>
            <?php } ?>
            <div class="entry-content">
                <ul>
                	<?php if(strlen($name)){ ?>
                    <li class="entry-content-name"><h4><?php echo $name; ?></h4></li>
                    <?php } ?>
                    <?php if(strlen($job)){ ?>
                    <li class="entry-content-job"><?php echo $job; ?></li>
                    <?php } ?>
                    <?php if(strlen($description)){ ?>
                    <li class="entry-content-desc"><?php echo $description; ?></li>
                    <?php } ?>
					<?php if(isset($the_soc_profile_array) && sizeof($the_soc_profile_array)){ ?>
					<li class="entry-content-social">
                        <ul class="red-social">
							<?php
								foreach ($the_soc_profile_array as $social_network_name => $socoal_profile_link) {
							?>
										<li>
		                                    <a href="<?php echo $socoal_profile_link; ?>" class="<?php echo $social_network_name; ?>"><?php echo $social_network_name; ?></i></a>
		                                </li>
							<?php		
								}
							?>
						</ul>
                    </li>
					<?php } ?>
                    
            </ul>
            </div>
        </article>
	<?php
		$output = ob_get_clean();
		return  do_shortcode($output);
	}
	add_shortcode('red_team_member', 'red_team_member');
}

/*-----------------------------------------------------------------------------------*/
/*	Features shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_feature')) {
	function red_feature( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'image_url'    	 => '',
			'title'		 => '',
			'description'    	 => '',
	    ), $atts));

	    ob_start();
		ob_clean();
	?>
		<article class="red-feature">
			<?php if(strlen($image_url)){ ?>
            <header>
                <div class="featimg">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>">
                </div>
            </header>
            <?php } ?>
            <div class="entry-content">
                <ul>
                	<?php if(strlen($title)){ ?>
                    <li class="entry-content-title"><h4><?php echo $title; ?></h4></li>
                    <?php } ?>
                    <?php if(strlen($description)){ ?>
                    <li class="entry-content-desc"><?php echo $description; ?></li>
                    <?php } ?>
            </ul>
            </div>
        </article>
	<?php
		$output = ob_get_clean();
		return  do_shortcode($output);
	}
	add_shortcode('red_feature', 'red_feature');
}

/*-----------------------------------------------------------------------------------*/
/*	Box Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_box')) {
	function red_box( $atts, $content = null ) {
	    extract(shortcode_atts(array(
				'box_bg_color'    	 => '',
				'box_text_color'	 => '',
				'content_width' 	 => '',
				'padding_top_bottom' => '0',
				'padding_sides' => '0',
				'content_width' 	 => '',
				'content_align' => 'left'
		    ), $atts));
		
			if(strlen($box_bg_color)){
				$bg_color = 'background-color: '.$box_bg_color.';';
			}else{
				$bg_color = '';
			}

			if(strlen($box_text_color)){
				$text_color = 'color: '.$box_text_color.';';
			}else{
				$text_color = '';
			}
			if(strlen($content_align)){
				$text_align = 'text-align: '.$content_align.';';
			}else{
				$text_align = '';
			}

			
			if($padding_top_bottom != ''){
				$the_padding_top_bottom = ' padding-top: ' . $padding_top_bottom . 'px;' . 'padding-bottom: ' . $padding_top_bottom . 'px;';
			}else{
				$the_padding_top_bottom = '';
			}
			if($padding_sides != ''){
				$the_padding_sides = ' padding-left: ' . $padding_sides . 'px;' . 'padding-right: ' . $padding_sides . 'px;';
			} else{
				$the_padding_sides = '';
			}
			$result = "<div class='red-box ' style='$bg_color $text_color $text_align $the_padding_top_bottom $the_padding_sides' >";
			if(strlen($content_width) && $content_width == '1140px'){
				$result .= '<div class="row">';
			}
			$result .= do_shortcode($content);
			if(strlen($content_width) && $content_width == '1140px'){
				$result .= '</div>';
			}
			$result .= "</div>";
			return $result;
	}
	add_shortcode('red_box', 'red_box');
}

/*-----------------------------------------------------------------------------------*/
/*	Red Banner Box Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_banner_box')) {
	function red_banner_box( $atts, $content = null ) {
	    extract(shortcode_atts(array(
				'box_bg_color'    	 => '',
				'box_text_color'	 => '',
				'box_image' 	 => '',
				'headline' 	 => '',
				'button' 	 => '',
				'url' 	 => '',
				'padding_top_bottom' => '0',
				'padding_sides' => '0',
				'content_width' 	 => '',
				'content_align' => 'left'
		    ), $atts));
		
			if(strlen($box_bg_color)){
				$bg_color = 'background-color: '.$box_bg_color.';';
			}else{
				$bg_color = '';
			}

			if(strlen($box_text_color)){
				$text_color = 'color: '.$box_text_color.';';
			}else{
				$text_color = '';
			}
			if(strlen($content_align)){
				$text_align = 'text-align: '.$content_align.';';
			}else{
				$text_align = '';
			}

			if(strlen($box_image)){
				$box_image = 'background: url('.$box_image.') no-repeat center top;background-size: cover;';
			}else{
				$box_image = '';
			}

			if(strlen($url)){
				$url = $url;
			}else{
				$url = '';
			}

			if(strlen($button)){
				$button = '<a class="banner-box-link" href="'.$url.'">'.$button.'</a>';
			}else{
				$button = '';
			}

			if(strlen($headline)){
				$headline = '<h1>'.$headline.'</h1>';
			}else{
				$headline = '';
			}

			
			if($padding_top_bottom != ''){
				$the_padding_top_bottom = ' padding-top: ' . $padding_top_bottom . 'px;' . 'padding-bottom: ' . $padding_top_bottom . 'px;';
			}else{
				$the_padding_top_bottom = '';
			}
			if($padding_sides != ''){
				$the_padding_sides = ' padding-left: ' . $padding_sides . 'px;' . 'padding-right: ' . $padding_sides . 'px;';
			} else{
				$the_padding_sides = '';
			}
			$result = "<div class='red-banner-box' style='$box_image $bg_color $text_color $text_align $the_padding_top_bottom $the_padding_sides' >";

			$result .= $headline .'<div class="delim"></div>';
			$result .= $button;

			$result .= "</div>";
			return $result;
	}
	add_shortcode('red_banner_box', 'red_banner_box');
}



/*-----------------------------------------------------------------------------------*/
/*	Spacer
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_spacer')) {
	function red_spacer( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'spacer_margin'    	 => ''
	    ), $atts));
	
		if(strlen($spacer_margin)){
			$the_margin = 'margin-bottom: '.$spacer_margin.'px;';
		}else{
			$the_margin = '';
		}
		return "<div class='spacer' style='$the_margin' >". do_shortcode($content) ."</div>";
	}
	add_shortcode('red_spacer', 'red_spacer');
}
/*-----------------------------------------------------------------------------------*/
/*	Skills
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_skill')) {
	function red_skill( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'skill_title'    	 => '',
			'skill_percentage'    	 => ''
	    ), $atts));
	
		if(strlen($skill_percentage)){
			$the_pct = 'width: '.$skill_percentage.'%;';
		}else{
			$the_pct = '';
		}
		return "<div class='red-skill'><span>$skill_title</span><div><div style='$the_pct'></div></div>". do_shortcode($content) ."</div>";
	}
	add_shortcode('red_skill', 'red_skill');
}


/*-----------------------------------------------------------------------------------*/
/*	Titles
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_title')) {
	function red_title( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => '',
			'subtitle'    	 => '',
			'style'    	 => ''
	    ), $atts));
		
	    $content = '';

		if( isset($title) ){
			$content = "<h3 class='$style' >". $title ."</h3>";
		}
		if( isset($subtitle) ){
			$content .= "<h4 class='$style'>" . $subtitle . "</h4>";
		}
		return $content;
	}
	add_shortcode('red_title', 'red_title');
}

/*-----------------------------------------------------------------------------------*/
/*	Contact form
/*-----------------------------------------------------------------------------------*/

if (!function_exists('red_contact_form')) {
	function red_contact_form( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'email'    	 => ''
	    ), $atts));
	
		if ( !is_email( $email ) ) {
		    $output = __('plese use a valid email address', 'textdomain');
		}else{

		ob_start();
		ob_clean();
		?>
		
		<form id="red-contact-form" class="red-contact-form">
									
			<p class="contact-form-name">
				<label for="red-name"><?php _e('Name', 'textdomain'); ?> <span class="required">*</span></label> 
				<input id="red-name" name="red-name" type="text" value="" aria-required="true">
			</p>
			<p class="contact-form-email">
				<label for="red-email"><?php _e('Email', 'textdomain'); ?> <span class="required">*</span></label> 
				<input id="red-email" name="red-email" type="text" value="" aria-required="true">
			</p>
			<p class="contact-form-phone">
				<label for="red-phone"><?php _e('Phone', 'textdomain'); ?> </label> 
				<input id="red-phone" name="red-phone" type="text" value="" >
			</p>
			<p class="contact-form-subject">
				<label for="red-subject"><?php _e('Subject', 'textdomain'); ?> </label> 
				<input id="red-subject" name="red-subject" type="text" value="" >
			</p>
			<p class="comment-form-comment">
				<label for="red-message"><?php _e('Message', 'textdomain'); ?> </label> 
				<textarea id="red-message" name="red-message" cols="45" rows="8" ></textarea>
			</p>
			<p class="form-submit submit gray">
				<input type="button" value="<?php _e('Send Message', 'textdomain'); ?>" tabindex="5" id="red-send-msg" name="btn_submit" onclick="red_send_mail( '#red-contact-form' , 'div#red_contact_response' );">
			</p>
			<input type="hidden" name="red-contact-email"  value="<?php echo $email; ?>">
			<div id="red_contact_response"></div>
						
		</form>

		<?php
		$output = ob_get_clean();
		}

		return $output;
	}
	add_shortcode('red_contact_form', 'red_contact_form');
}
?>