<?php
	// add here the custom functions for redShortcodes plugin
	
	function red_list_posts_custom( $atts, $content = null ) {
		global $view_type, $number_columns, $column_class, $aditional_classes, $massonry_class, $ajax_container_class;


		$defaults = array( 
			'post_type' => 'post',
			'taxonomy' => '',
			'term_name' => '',
			'view_type' => 'red_list_view',
			'number_posts' => get_option('posts_per_page'),
			'number_columns' => 3,
			'pagination' => 'none',
			'orderby' => 'date',
			'order' => 'DESC',
			'gutter' => '',
			'thumb_title_pos' => 'title-over',
			'massonry' => ''
		);

		
		extract( shortcode_atts( $defaults, $atts ) );

		$aditional_classes = ' ';
		$massonry_class = ' ';

		$enable_massonry = false;

		if ($view_type == 'red-thumb-view') {
			$aditional_classes .= $gutter.' ';
			$aditional_classes .= ' '.$thumb_title_pos.' ';
			$aditional_classes .= ' '.$massonry.' ';
			if(strlen($massonry)){
				$massonry_class = ' massonry-elem ';
				$enable_massonry = true;
			}
		
				
		}

		if ($view_type == 'red-grid-view') {
			$aditional_classes .= $gutter.' ';
			$aditional_classes .= ' '.$massonry.' ';
			if(strlen($massonry)){
				$massonry_class = ' massonry-elem ';
				$enable_massonry = true;
			}
		
				
		}

		if($enable_massonry){
			wp_enqueue_script( 'isotope' , get_template_directory_uri() . '/js/jquery.isotope.min.js' , array( 'jquery' ),false,true );
			wp_localize_script( 'functions', 'enable_massonry', '1');
		}else{
			wp_localize_script( 'functions', 'enable_massonry', '0');
		}

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
	//deb::e($query);	
		ob_start();
        ob_clean();
        	// The Loop

        	// hook into before red loop filter, for example you may want to add here advertising or something else
			$before_loop = apply_filters('red_before_loop', '');
			if ( $before_loop != '' ){
				echo $before_loop;
			}
			$ajax_container_class = 'red-ajax-box-'.mt_rand(0,999999);
			red_get_template( 'loop/loop-start.php' );
			if ( $query->have_posts() ) {
				$current_post = 1;

				
	        	if($pagination == 'carousel'){ // if carousel is enabled
					echo '<div class="carousel-wrapper">
						<ul class="carousel-nav">
		                    <li class="carousel-nav-left icon-prev" style="opacity: 1;"></li>
		                    <li class="carousel-nav-right icon-next" style="opacity: 0.4;"></li>
		                </ul>
	                	<div class="carousel-container">';
				}
				$post_ids = array();
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

					$post_ids[] = $query->post->ID;

					$current_post++;
				}
				if($pagination == 'carousel'){ // if carousel is enabled
					echo '</div></div>';
				}
			} else {
				// no posts found
			}

			?>
			<?php
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
                        echo '<ul class="b_pag center p_b">';
                        foreach($pgn as $k => $link){
                            echo '<li>'; 
                            echo str_replace( "'" , '"' , $link );
                            echo '</li>';
                        }
                        echo '</ul>';
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
	remove_shortcode('red_list_posts');  // remove the plugin generated shortcode
	add_shortcode('red_list_posts', 'red_list_posts_custom'); // use the function from the theme

	if(!function_exists('red_set_list_posts_shortcode')){
		/**
			/////////////////////////////////=================================/////////////////////////////////
		*
		*	overwrite the default parameters for red_list_posts shortcode
		*	For the necesary format and possible arguments see the red Shortcodes plugin (/tinymce/config.php) 
		*	Returns and array with configuration settings for the shortcode
		*/

		function red_set_list_posts_shortcode(){
			$red_list_posts_config = array(
				'no_preview' => true,
				'params' => array(

					
					'post_type' => array(
						'type' => 'select',
						'label' => __('Post type', 'redcodn'),
						'desc' => __('Select the post type you want to be displayed', 'redcodn'),
						'options' => red_get_post_types_hc()
					),
					'taxonomy' => array(
						'type' => 'select',
						'label' => __('Taxonomy', 'redcodn'),
						'desc' => __('Select All to retrieve all the posts, or you can select a taxonomy beloging to a post type selected above.', 'redcodn'),
						'options' => array( ''=>__('All','redcodn'), 'category'=>'category', 'post_tag' => 'post_tag') // by default we show onlt taxonomies for the 'post' type
					),
					'term_name' => array(
						'std' => '',
						'type' => 'text',
						'label' => __('Term name ', 'redcodn'),
						'desc' => __('If taxonomy parameter is not set to All, then you should set here the name of the term from which you want to retrieve the posts. For example if "category" is selected as taxonomy, you can type here "uncategorized" to get posts from that category.', 'redcodn'),
						
					),
					'view_type' => array(
						'type' => 'select',
						'label' => __('View type', 'redcodn'),
						'desc' => '',
						'options' => red_get_view_types(),
					//	'action' => "actionSelect( '#red_view_type' , { 'red-list-view' : '.number-columns' } , 'hs_' );" // we want to show/hide the row with class '.number-columns' when the selected value is changed
						'action' => "actionSelect( '#red_view_type' , { 'red-grid-view' : '.number-columns,.massonry-option,.gutter-options', 'red-thumb-view' : '.number-columns,.massonry-option,.thumb-options,.gutter-options' } , 'sh_' );" // we want to show/hide the row with class '.number-columns' when the selected value is changed
					
					),
					// 'thumb_title_pos' => array(
					// 	'type' => 'select',
					// 	'label' => __('Title position', 'redcodn'),
					// 	'desc' => __('Specify where you want the post title.', 'redcodn'),
					// 	'class' => ' thumb-options ', // additional class to settings row, this class is used to show/hide this settings depending on view type value
					// 	'hide_default' => true,        // we want to hide this option by default, because we need it only for grid and thumb view, and by default we have list view
					// 	'options' => array(
					// 					'title-over'=>__('Over the image', 'redcodn'),
					// 					'title-below'=>__('Below the image', 'redcodn')
					// 			    )
					// ),
					'gutter' => array(
						'type' => 'select',
						'label' => __('Use gutter', 'redcodn'),
						'desc' => __('Adds space between blocks', 'redcodn'),
						'class' => ' gutter-options ', // additional class to settings row, this class is used to show/hide this settings depending on view type value
						'hide_default' => true,        // we want to hide this option by default, because we need it only for grid and thumb view, and by default we have list view
						'options' => array(
										'no-gutter'=>__('Off', 'redcodn'),
										''=>__('On', 'redcodn')
								    )
					),
					'massonry' => array(
						'type' => 'select',
						'label' => __('Massonry', 'redcodn'),
						'desc' => __('If enabled, it will place the elements in optimal position based on available vertical space', 'redcodn'),
						'class' => ' massonry-option ', // additional class to settings row, this class is used to show/hide this settings depending on view type value
						'hide_default' => true,        // we want to hide this option by default, because we need it only for grid and thumb view, and by default we have list view
						'options' => array(
										''=>__('Off', 'redcodn'),
										'massonry'=>__('On', 'redcodn')
								    )
					),
					'number_columns' => array(
						'type' => 'select',
						'label' => __('Number of columns', 'redcodn'),
						'desc' => '',
						'class' => ' number-columns ', // additional class to settings row, this class is used to show/hide this settings depending on view type value
						'hide_default' => true,        // we want to hide this option by default, because we need it only for grid and thumb view, and by default we have list view
						'options' => array(
										'2'=>2,
										'3'=>3,
								    	'4'=>4
								    )
					),
					'number_posts' => array(
						'std' => '',
						'type' => 'text',
						'label' => __('Number of posts', 'redcodn'),
						'desc' => ''
					),
					
					'pagination' => array(
						'type' => 'select',
						'label' => __('Pagination', 'redcodn'),
						'desc' => '',
						'options' => array(
										'none'=>__('None', 'redcodn'),
										'pagination'=>__('Enable pagination', 'redcodn'),
										'carousel'=>__('Enable carousel', 'redcodn')
								    )
					),
					
					'orderby' => array(
						'type' => 'select',
						'label' => __('Order by', 'redcodn'),
						'options' => red_get_order_by_options(),
						'desc' => ''
					),
					'order' => array(
						'type' => 'select',
						'label' => __('Order', 'redcodn'),
						'desc' => '',
						'options' => array(
										'DESC'=>__('Descending','redcodn'),
								    	'ASC'=>__('Ascending','redcodn')
								    )
					),

					
				),
				'shortcode' => '[red_list_posts 
									post_type="{{post_type}}" 
									taxonomy="{{taxonomy}}" 
									term_name="{{term_name}}" 
									view_type="{{view_type}}" 
									number_columns="{{number_columns}}" 
									number_posts="{{number_posts}}" 
									orderby="{{orderby}}" 
									order="{{order}}"
			 						pagination="{{pagination}}"
			 						gutter="{{gutter}}"
			 						thumb_title_pos="{{thumb_title_pos}}"
			 						massonry="{{massonry}}"

									]
								[/red_list_posts]',
				'popup_title' => __('Insert List Posts Shortcode', 'redcodn')
			);

			return $red_list_posts_config;
		}
	}

	if (!function_exists('custom_red_team_member')) {
		function custom_red_team_member( $atts, $content = null ) {
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
	                    <div class="dotted-separator">
                            <div class="idot">
                            </div>
                        </div>
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
		remove_shortcode('red_team_member', 'red_team_member');
		add_shortcode('red_team_member', 'custom_red_team_member');
	}

	if (!function_exists('red_contact_form_custom')) {
		function red_contact_form_custom( $atts, $content = null ) {
		    extract(shortcode_atts(array(
				'email'    	 => ''
		    ), $atts));
		
			if ( !is_email( $email ) ) {
			    $output = __('por favor utilice una dirección electr&oacute;nica v&aacute;lida', 'textdomain');
			}else{

			ob_start();
			ob_clean();
			?>
			
			<form id="red-contact-form" class="red-contact-form">
					
				<div class="row">		
					<div class="six columns">			
						<p class="contact-form-name">
							<label for="red-name"><?php _e('Nombre', 'textdomain'); ?> <span class="required">*</span></label> 
							<input id="red-name" name="red-name" type="text" value="" aria-required="true">
						</p>
						<p class="contact-form-email">
							<label for="red-email"><?php _e('Email', 'textdomain'); ?> <span class="required">*</span></label> 
							<input id="red-email" name="red-email" type="text" value="" aria-required="true">
						</p>
					</div>
					<div class="six columns">			
						<p class="contact-form-phone">
							<label for="red-phone"><?php _e('Tel&eacute;fono', 'textdomain'); ?> </label> 
							<input id="red-phone" name="red-phone" type="text" value="" >
						</p>
						<p class="contact-form-subject">
							<label for="red-subject"><?php _e('Asunto', 'textdomain'); ?> </label> 
							<input id="red-subject" name="red-subject" type="text" value="" >
						</p>
					</div>
					<div class="twelve columns">
						<p class="comment-form-comment">
							<label for="red-message"><?php _e('Mensaje', 'textdomain'); ?> </label> 
							<textarea id="red-message" name="red-message" cols="45" rows="8" ></textarea>
						</p>
						<p class="form-submit submit gray">
							<input type="button" value="<?php _e('Enviar mensaje', 'textdomain'); ?>" tabindex="5" id="red-send-msg" name="btn_submit" onclick="red_send_mail( '#red-contact-form' , 'div#red_contact_response' );">
						</p>
					</div>
					<div class="twelve columns">
						<input type="hidden" name="red-contact-email"  value="<?php echo $email; ?>">
						<div id="red_contact_response"></div>
					</div>
					
				</div>		
			</form>

			<?php
			$output = ob_get_clean();
			}

			return $output;
		}
		remove_shortcode('red_contact_form');  // remove the plugin generated shortcode
	add_shortcode('red_contact_form', 'red_contact_form_custom'); // use the function from the theme
		
	}
?>