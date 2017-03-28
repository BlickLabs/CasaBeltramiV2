<?php
/*
Plugin Name: redShortcodes
Plugin URI: http://www.redcodn.com
Description: Shortcode generator. 
Version: 0.1
Author: redcodn
Author URI: http://redcodn.com
*/

class redShortcodes {

    function __construct() 
    {	
    	require_once( plugin_dir_path( __FILE__ ) .'functions.php');
    	require_once( plugin_dir_path( __FILE__ ) .'shortcodes.php' );
    	define('red_TINYMCE_URI', plugin_dir_url( __FILE__ ) .'tinymce');
		define('red_TEMPLATE_PATH', 'redshortcodes');
		
        add_action('init', array(&$this, 'init'));
        add_action('admin_init', array(&$this, 'admin_init'));

	}
	
	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function init()
	{

		$siteurl = get_option('siteurl');
        if( !empty($siteurl) ){
            $siteurl = rtrim( $siteurl , '/') . '/wp-admin/admin-ajax.php' ;
        }else{
            $siteurl = home_url('/wp-admin/admin-ajax.php');
        }

		add_action('wp_ajax_red_send_contact' , 'red_send_contact' );
		add_action('wp_ajax_nopriv_red_send_contact' , 'red_send_contact' );

		if( ! is_admin() )
		{
			wp_enqueue_style( 'red-shortcodes', plugin_dir_url( __FILE__ ) . 'css/shortcodes.css' );
			//wp_enqueue_script( 'jquery-ui-accordion' );
			//wp_enqueue_script( 'jquery-ui-tabs' );
			wp_enqueue_script( 'red-shortcodes-lib', plugin_dir_url( __FILE__ ) . 'js/red-shortcodes-lib.js', array('jquery', 'jquery-ui-accordion', 'jquery-ui-tabs'), 1.0, true );
			wp_localize_script( 'red-shortcodes-lib', 'ajaxurl', $siteurl);

			
		}

		if( is_admin() ){
			wp_enqueue_script( 'actionsjs', plugin_dir_url( __FILE__ ) . 'js/actions.js', array('jquery') );

			
			wp_localize_script( 'actionsjs', 'ajaxurl', $siteurl);
			wp_localize_script( 'actionsjs', 'ajaxTaxNonce', wp_create_nonce( 'ajax-Tax-nonce' ));
			
			// colorpicker
			wp_enqueue_style( 'wp-color-picker' );
	    	wp_enqueue_script( 'wp-color-picker' );
		}


		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	
		if ( get_user_option('rich_editing') == 'true' )
		{
			add_filter( 'mce_external_plugins', array(&$this, 'add_rich_plugins') ); // filter which is executed when the buttons are about to be loaded
			add_filter( 'mce_buttons', array(&$this, 'register_rich_buttons') ); // filter which is executed when the editor loads the plugins
		}
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return	void
	 */
	function add_rich_plugins( $plugin_array )
	{
		$plugin_array['redShortcodes'] = red_TINYMCE_URI . '/plugin.js'; // The JavaScript file that is used to register the TinyMCE plugin through the TinyMCE API
		return $plugin_array;
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function register_rich_buttons( $buttons )
	{
		array_push( $buttons, "|", 'red_button' );
		return $buttons;
	}
	
	/**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
	function admin_init()
	{
		// css
		wp_enqueue_style( 'red-popup', red_TINYMCE_URI . '/css/popup.css', false, '1.0', 'all' );
		
		// js
		wp_enqueue_script( 'red-ui-sortable' );
		wp_enqueue_script( 'jquery-livequery', red_TINYMCE_URI . '/js/jquery.livequery.js', false, '1.1.1', false );
		wp_enqueue_script( 'jquery-appendo', red_TINYMCE_URI . '/js/jquery.appendo.js', false, '1.0', false );
		wp_enqueue_script( 'base64', red_TINYMCE_URI . '/js/base64.js', false, '1.0', false );
		wp_enqueue_script( 'red-popup', red_TINYMCE_URI . '/js/popup.js', false, '1.0', false );
		
		wp_localize_script( 'jquery', 'redShortcodes', array('plugin_folder' => WP_PLUGIN_URL .'/red-shortcodes') );

		add_action('wp_ajax_get_c_post_tax' , 'cs_getTaxonomies' );
		//add_action('get_c_post_tax' , 'cs_getTaxonomies' );

		// Now transmitting data with theme name
		$theme_name = wp_get_theme();
		wp_localize_script( 'jquery', 'red_theme_name', $theme_name->Name );

	}
    

}
$red_shortcodes = new redShortcodes();


// used for dinamicaly changing the Taxonomy options via ajax depanding on selected post type
function cs_getTaxonomies(){

	if(isset($_POST['ajaxTaxNonce'])  && isset($_POST['post_type'])){
            
        $nonce = $_POST['ajaxTaxNonce'];
		
		if ( ! wp_verify_nonce( $nonce, 'ajax-Tax-nonce' ) )
	        die ( 'Busted! Wrong Nonce');

	    $options = '<option value="">'.__('All','textdomain').'</option>';

		$taxonomies = get_object_taxonomies($_POST['post_type']);
		
		if(is_array($taxonomies) && sizeof($taxonomies)){

			foreach ($taxonomies as $key => $value) {
				if($value != 'post_format'){
					$options .= '<option value="'.$value.'">'.$value.'</option>';	
				}
				
			}
			
		}
	    
	    echo $options;

	}

    exit();
}

function red_send_contact(){
	
	if(isset($_POST['action']) && $_POST['action'] == 'red_send_contact'){
		$result = array();
	    
	    $tomail = $_POST['red-contact-email'];
	    $frommail = '';

	    if( isset( $_POST['red-name'] ) && strlen( $_POST['red-name'] )  ) {
	        $name =  trim( $_POST['red-name'] );
	    }else{
	        $result['contact_name'] = '<p>'. __('Error, name is required field. ','textdomain').'</p>';
	    }

	    if( isset( $_POST['red-email'] ) && is_email( $_POST['red-email'] ) ){
            $frommail = trim( $_POST['red-email'] );
        }else{
            
            $result['contact_email'] = '<p>'. __('Error, please enter a valid email address. ','textdomain').'</p>';

        }

        $message = '';
        if( isset($_POST['red-name']) ){
            $message .= __('Contact name: ','textdomain'). trim($_POST['red-name'])."\n";
        }
        if( isset($_POST['red-email']) ){
            $message .= __('Contact email: ','textdomain'). trim($_POST['red-email'])."\n";
        }
        if( isset($_POST['red-phone']) ){
            $message .= __('Contact phone: ','textdomain'). trim($_POST['red-phone'])."\n\n";
        }
        if( isset($_POST['red-subject']) ){
            $message .= __('Subject: ','textdomain'). trim($_POST['red-subject'])."\n\n";
        }

        $message .= trim( $_POST['red-message'] );

        if( is_email( $tomail ) && strlen( $tomail ) && strlen( $frommail ) &&  strlen( $name ) && strlen( $message ) ){
            $subject = __('New email from','textdomain'). ' '.get_bloginfo('name'). '.'.__('Sent via contact form.','textdomain');
            wp_mail($tomail, $subject , $message);
            $result['message'] = '<span class="success" >' . __('Email was sent successfully ','textdomain') . '</span>';
            
        }

        echo json_encode( $result );
	}
	

	exit();
}

?>