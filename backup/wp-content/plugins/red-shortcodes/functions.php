<?php
	/*-----------------------------------------------------------------------------------*/
	/*	get available post types
	/*  returns an array  with available custom post types
	/*-----------------------------------------------------------------------------------*/

	if (!function_exists('red_get_post_types')) {
		function red_get_post_types() {
		    
		    $post_types=get_post_types('','names'); 

		    $post_types_to_exclude = array(
		    	"attachment",
				"revision" ,
				"nav_menu_item",
			);
		
			foreach ($post_types as $p_type_slag => $p_type_name) {
				if(in_array($p_type_slag, $post_types_to_exclude)){
					unset($post_types[$p_type_slag]); 
				}
			}
			return $post_types;
		}
		
	}

	/*-----------------------------------------------------------------------------------*/
	/*	get available taxonomies
	/*  returns an array  with available taxonomies, excluding some deafault WP taxonomies
	/*-----------------------------------------------------------------------------------*/

	if (!function_exists('red_get_available_taxonomies')) {
		function red_get_available_taxonomies() {
		    
		    $post_types=get_post_types('','names'); 
		    $taxonomies=get_taxonomies(); 

		    $all_taxonomies = array(''=>__('All','textdomain'));
		    $taxonomies = array_merge((array)$all_taxonomies, (array)$taxonomies);

		    
		    $tax_types_to_exclude = array(
		    	"nav_menu",
				"link_category" ,
				"post_format",
			);
		
			foreach ($taxonomies as $tax_slag => $tax_name) {
				if(in_array($tax_slag, $tax_types_to_exclude)){
					unset($taxonomies[$tax_slag]); 
				}
			}
			return $taxonomies;
		}
		
	}

	/*-----------------------------------------------------------------------------------*/
	/*	get available view type
	/*  returns an array  with available taxonomies, excluding some deafault WP taxonomies
	/*-----------------------------------------------------------------------------------*/

	if (!function_exists('red_get_view_types')) {
		function red_get_view_types() {
		    
		    $view_types = array(
		    	'red-list-view'=>__('List view','textdomain'),
		    	'red-grid-view'=>__('Grid view','textdomain'),
		    	'red-thumb-view'=>__('Thumbnail view','textdomain'),
		    );
		    
			return $view_types;
		}
		
	}
	

	/*-----------------------------------------------------------------------------------*/
	/*	get available view type
	/*  returns an array  with available taxonomies, excluding some deafault WP taxonomies
	/*-----------------------------------------------------------------------------------*/

	if (!function_exists('red_get_order_by_options')) {
		function red_get_order_by_options() {
		    
		    $order_by = array(
		    	'date'=>__('Date','textdomain'),
		    	'title'=>__('Title','textdomain'),
		    	'rand'=>__('Random','textdomain'),
		    	'ID'=>__('post ID','textdomain'),
		    );
		    
			return $order_by;
		}
		
	}


	/**
	 * Get other templates (e.g. product attributes) passing attributes and including the file.
	 *
	 * @access public
	 * @param mixed $template_name
	 * @param array $args (default: array())
	 * @param string $template_path (default: '')
	 * @param string $default_path (default: '')
	 * @return void
	 */
	function red_get_template( $template_name, $template_path = '', $default_path = '', $args = array() ) {
		
		if ( $args && is_array($args) )
			extract( $args );

		$located = red_locate_template( $template_name, $template_path, $default_path );

		//do_action( 'red_before_template_part', $template_name, $template_path, $located, $args );

		include( $located );

		//do_action( 'red_after_template_part', $template_name, $template_path, $located, $args );
	}


	/**
	 * Locate a template and return the path for inclusion.
	 *
	 * This is the load order:
	 *
	 *		yourtheme		/	$template_path	/	$template_name
	 *		yourtheme		/	$template_name
	 *		$default_path	/	$template_name
	 *
	 * @access public
	 * @param mixed $template_name
	 * @param string $template_path (default: '')
	 * @param string $default_path (default: '')
	 * @return string
	 */
	function red_locate_template( $template_name, $template_path = '', $default_path = '' ) {
		global $woocommerce;

		if ( ! $template_path ) $template_path = red_TEMPLATE_PATH;
		if ( ! $default_path ) $default_path = plugin_dir_path( __FILE__ ) . 'templates/';

		// Look within passed path within the theme - this is priority
		$template = locate_template(
			array(
				trailingslashit( $template_path ) . $template_name,
				$template_name
			)
		);

		// Get default template
		if ( ! $template )
			$template = $default_path . $template_name;

		// Return what we found
		return apply_filters('red_locate_template', $template, $template_name, $template_path);
	}

	/**
	* Description   : this function will return the class name for the blocks depending on the input (number of columns we want to have)
	* 
	*
	* @param    int $arabic - number of columns we want to have
	* 
	* @return str
	*****/
	if ( ! function_exists( 'red_columns_arabic_to_word' ) ) {
	    function red_columns_arabic_to_word( $arabic ){
	        $words_full_width = array( 0 => '', 1 => '', 2 => 'red-one-half', 3 => 'red-one-third', 4 => 'red-one-fourth', 5 => 'red-one-fifth', 6 => 'red-one-sixth');
	        return $words_full_width[ $arabic ];
	    }
	}
?>