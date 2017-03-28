<?php

// load wordpress
require_once('get_wp.php');

class red_shortcodes
{
	var	$conf;
	var	$popup;
	var	$params;
	var	$shortcode;
	var $cparams;
	var $cshortcode;
	var $popup_title;
	var $no_preview;
	var $has_child;
	var	$output;
	var	$errors;

	// --------------------------------------------------------------------------

	function __construct( $popup )
	{
		if( file_exists( dirname(__FILE__) . '/config.php' ) )
		{
			$this->conf = dirname(__FILE__) . '/config.php';
			$this->popup = $popup;
			
			$this->formate_shortcode();
		}
		else
		{
			$this->append_error('Config file does not exist');
		}
	}
	
	// --------------------------------------------------------------------------
	
	function formate_shortcode()
	{
		// get config file
		require_once( $this->conf );
		
		if( isset( $red_shortcodes[$this->popup]['child_shortcode'] ) )
			$this->has_child = true;
		
		if( isset( $red_shortcodes ) && is_array( $red_shortcodes ) )
		{
			// get shortcode config stuff
			$this->params = $red_shortcodes[$this->popup]['params'];
			$this->shortcode = $red_shortcodes[$this->popup]['shortcode'];
			$this->popup_title = $red_shortcodes[$this->popup]['popup_title'];
			
			// adds stuff for js use			
			$this->append_output( "\n" . '<div id="_red_shortcode" class="hidden">' . $this->shortcode . '</div>' );
			$this->append_output( "\n" . '<div id="_red_popup" class="hidden">' . $this->popup . '</div>' );
			
			if( isset( $red_shortcodes[$this->popup]['no_preview'] ) && $red_shortcodes[$this->popup]['no_preview'] )
			{
				//$this->append_output( "\n" . '<div id="_red_preview" class="hidden">false</div>' );
				$this->no_preview = true;		
			}
			
			// filters and excutes params
			foreach( $this->params as $pkey => $param )
			{
				// prefix the fields names and ids with red_
				$pkey = 'red_' . $pkey;
				
				if(isset($param['hide_default']) && $param['hide_default'] === true){
					$tbody_class = 'hidden';
				}else{
					$tbody_class = '';
				}

				if(isset($param['class']) && strlen($param['class']) ){
					$tbody_class .= ' ' .$param['class'].' ';
				}

				if(isset( $param['action'] )){
					$action = $param['action'];
				}else{
					$action = '';
				}
				
				// popup form row start
				$row_start  = '<tbody class="'.$tbody_class.'">' . "\n";
				$row_start .= '<tr class="form-row">' . "\n";
				$row_start .= '<td class="label">' . $param['label'] . '</td>' . "\n";
				$row_start .= '<td class="field">' . "\n";
				
				// popup form row end
				$row_end	= '<span class="red-form-desc">' . $param['desc'] . '</span>' . "\n";
				$row_end   .= '</td>' . "\n";
				$row_end   .= '</tr>' . "\n";					
				$row_end   .= '</tbody>' . "\n";
				
				switch( $param['type'] )
				{
					case 'text' :
						
						// prepare
						$output  = $row_start;
						$output .= '<input type="text" class="red-form-text red-input" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" '.self::action( $action , 'text' ).' />' . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;
						
					case 'textarea' :
						
						// prepare
						$output  = $row_start;
						$output .= '<textarea rows="10" cols="30" name="' . $pkey . '" id="' . $pkey . '" class="red-form-textarea red-input" '.self::action( $action , 'textarea' ).' >' . $param['std'] . '</textarea>' . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;
						
					case 'select' :
						
						// prepare
						$output  = $row_start;
						$output .= '<select name="' . $pkey . '" id="' . $pkey . '" class="red-form-select red-input" '.self::action( $action , 'select' ).' >' . "\n";
						
						foreach( $param['options'] as $value => $option )
						{
							$output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
						}
						
						$output .= '</select>' . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;
						
					case 'checkbox' :
						
						// prepare
						$output  = $row_start;
						$output .= '<label for="' . $pkey . '" class="red-form-checkbox">' . "\n";
						$output .= '<input type="checkbox" class="red-input" name="' . $pkey . '" id="' . $pkey . '" ' . ( $param['std'] ? 'checked' : '' ) . ' '.self::action( $action , 'checkbox' ).' />' . "\n";
						$output .= ' ' . $param['checkbox_text'] . '</label>' . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;

					case 'image' :
						
						// prepare
						
						$output  = $row_start;
						//$output .= '<label for="' . $pkey . '" class="red-form-checkbox">' . "\n";
						$output .= '<input type="hidden" class="red-attached-image-url red-input" id="' . $pkey . '" name="' . $pkey . '" value="' . $param['std'] . '"  />' . "\n";
						$output .= '<img  class="red-team-attached-image" src="" />' . "\n";
						$output .= '<input type="button" class="red-button-browse" value="'.__('Upload', 'textdomain').'" />' . "\n";
						
						
						ob_start();
					    ob_clean();
					    ?>
						<script>
							// Uploading files
							var product_gallery_frame;

							jQuery('#red-sc-form').on( 'click', '.red-button-browse', function( event ) {

							// If the media frame already exists, reopen it.
							if ( product_gallery_frame ) {
								product_gallery_frame.open();
								return;
							}

							// Create the media frame.
							product_gallery_frame = wp.media.frames.downloadable_file = wp.media({
								// Set the title of the modal.
								title: '<?php _e( 'Add Image', 'textdomain' ); ?>',
								button: {
									text: '<?php _e( 'Add image', 'textdomain' ); ?>',
								},
								multiple: false
							});

							// When an image is selected, run a callback.
							product_gallery_frame.on( 'select', function() {
								
								var selection = product_gallery_frame.state().get('selection');

								selection.map( function( attachment ) {

									attachment = attachment.toJSON();

									if ( attachment.id ) {
										jQuery('.red-team-attached-image').attr('src',attachment.url);
										jQuery('.red-attached-image-url').val(attachment.url);
										
									}

								} );

								
							});

							// Finally, open the modal.
							product_gallery_frame.open();
						});
						</script>
					    <?php
					    $output .= ob_get_clean();
						//$output .= '<input type="checkbox" class="red-input" name="' . $pkey . '" id="' . $pkey . '" ' . ( $param['std'] ? 'checked' : '' ) . ' '.self::action( $action , 'checkbox' ).' />' . "\n";
						//$output .= ' ' . $param['checkbox_text'] . '</label>' . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;	

					case 'colorpicker' :
						
						// prepare
						$output  = $row_start;
						$output .= '<input type="text" class=" red-colorpicker red-input" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '"  />' . "\n";

						ob_start();
					    ob_clean();
					    ?>
						<script>
						jQuery('.red-colorpicker').each(function() {
					        jQuery(this).wpColorPicker();
					    });
					    jQuery('.red-insert').click(function(){ 
					    	jQuery('.red-colorpicker').change(); // trigger change on the input in order to be able to insert the selected value
					    	
					    });
					    </script>
					    <?php
					    $output .= ob_get_clean();
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;
				}
			}
			
			// checks if has a child shortcode
			if( isset( $red_shortcodes[$this->popup]['child_shortcode'] ) )
			{
				// set child shortcode
				$this->cparams = $red_shortcodes[$this->popup]['child_shortcode']['params'];
				$this->cshortcode = $red_shortcodes[$this->popup]['child_shortcode']['shortcode'];
			
				// popup parent form row start
				$prow_start  = '<tbody>' . "\n";
				$prow_start .= '<tr class="form-row has-child">' . "\n";
				$prow_start .= '<td><a href="#" id="form-child-add" class="button-secondary">' . $red_shortcodes[$this->popup]['child_shortcode']['clone_button'] . '</a>' . "\n";
				$prow_start .= '<div class="child-clone-rows">' . "\n";
				
				// for js use
				$prow_start .= '<div id="_red_cshortcode" class="hidden">' . $this->cshortcode . '</div>' . "\n";
				
				// start the default row
				$prow_start .= '<div class="child-clone-row">' . "\n";
				$prow_start .= '<ul class="child-clone-row-form">' . "\n";
				
				// add $prow_start to output
				$this->append_output( $prow_start );
				
				foreach( $this->cparams as $cpkey => $cparam )
				{
				
					if(isset( $cparam['action'] )){
						$action = $cparam['action'];
					}else{
						$action = '';
					}
					// prefix the fields names and ids with red_
					$cpkey = 'red_' . $cpkey;
					
					// popup form row start
					$crow_start  = '<li class="child-clone-row-form-row">' . "\n";
					$crow_start .= '<div class="child-clone-row-label">' . "\n";
					$crow_start .= '<label>' . $cparam['label'] . '</label>' . "\n";
					$crow_start .= '</div>' . "\n";
					$crow_start .= '<div class="child-clone-row-field">' . "\n";
					
					// popup form row end
					$crow_end	  = '<span class="child-clone-row-desc">' . $cparam['desc'] . '</span>' . "\n";
					$crow_end   .= '</div>' . "\n";
					$crow_end   .= '</li>' . "\n";
					
					switch( $cparam['type'] )
					{
						case 'text' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<input type="text" class="red-form-text red-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" '.self::action( $action , 'text' ).' />' . "\n";
							$coutput .= $crow_end;
							
							// append
							$this->append_output( $coutput );
							
							break;
							
						case 'textarea' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<textarea rows="10" cols="30" name="' . $cpkey . '" id="' . $cpkey . '" class="red-form-textarea red-cinput" '.self::action( $action , 'textarea' ).' >' . $cparam['std'] . '</textarea>' . "\n";
							$coutput .= $crow_end;
							
							// append
							$this->append_output( $coutput );
							
							break;
							
						case 'select' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<select name="' . $cpkey . '" id="' . $cpkey . '" class="red-form-select red-cinput"  '.self::action( $action , 'select' ).' >' . "\n";
							
							foreach( $cparam['options'] as $value => $option )
							{
								$coutput .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
							}
							
							$coutput .= '</select>' . "\n";
							$coutput .= $crow_end;
							
							// append
							$this->append_output( $coutput );
							
							break;
							
						case 'checkbox' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<label for="' . $cpkey . '" class="red-form-checkbox">' . "\n";
							$coutput .= '<input type="checkbox" class="red-cinput" name="' . $cpkey . '" id="' . $cpkey . '" ' . ( $cparam['std'] ? 'checked' : '' ) . '  '.self::action( $action , 'checkbox' ).' />' . "\n";
							$coutput .= ' ' . $cparam['checkbox_text'] . '</label>' . "\n";
							$coutput .= $crow_end;
							
							// append
							$this->append_output( $coutput );
							
							break;
					}
				}
				
				// popup parent form row end
				$prow_end    = '</ul>' . "\n";		// end .child-clone-row-form
				$prow_end   .= '<a href="#" class="child-clone-row-remove">Remove</a>' . "\n";
				$prow_end   .= '</div>' . "\n";		// end .child-clone-row
				
				
				$prow_end   .= '</div>' . "\n";		// end .child-clone-rows
				$prow_end   .= '</td>' . "\n";
				$prow_end   .= '</tr>' . "\n";					
				$prow_end   .= '</tbody>' . "\n";
				
				// add $prow_end to output
				$this->append_output( $prow_end );
			}			
		}
	}
	

	static function action( $action , $type ){

        if( empty( $action ) ){
            return '';
        }
        
        $result = '';
        switch( $type ){
            case 'text' : {
                $result = 'onkeyup="javascript:' . $action . ';"';
                break;
            }
            case 'radio-icon' : {
                $result = 'onclick="javascript:act.radio_icon(\'' . $action['group'] . '\' , \'' . $action['topic'] . '\' ,  \'' . $action['index'] . '\' );"';
                break;
            }
            case 'textarea' : {
                $result = 'onkeyup="javascript:' . $action . ';"';
                break;
            }
            case 'radio' : {
                $result = 'onclick="javascript:' . $action . ';"';
                break;
            }
            case 'checkbox' : {
                $result = 'onclick="javascript:' . $action . ';"';
                break;
            }
            
            case 'search' : {
                $result = 'onchange="javascript:' . $action . ';"';
                break;
            }
            
            case 'datetimepicker' : {
                $result = 'onchange="javascript:' . $action . ';"';
                break;
            }

            case 'select' : {
                $result = 'onchange="javascript:' . $action . ';"';
                break;
            }
            case 'logic-radio' : {
                $result = 'onclick="javascript:' . $action . ';"';
                break;
            }
            case 'm-select' : {
                $result = 'onchange="javascript:' . $action . ';"';
                break;
            }
            case 'button' : {
                $result = 'onclick="javascript:' . $action . ';"';
                break;
            }
            case 'digit-like' : {
                $result = 'onclick="javascript:' . $action . ';"';
                break;
            }
            case 'meta-save' : {
                $result = 'onclick="javascript:meta.save(\'' . $action['res'] . '\' , \'' . $action['group'] . '\' , '.$action['post_id'].' , \''.$action['selector'].'\' );meta.clear(\'.generic-' . $action['group'] . '\');"';
                break;
            }
            case 'attach' : {
                $result = 'onclick="javascript:meta.save_data(\'' . $action['res'] . '\' , \'' . $action['group'] . '\' , extra.val(\''.$action['attach_selector'].'\') , [ { \'name\' : \''.$action['group'].'[idrecord][]\' , \'value\' : ' . $action['post_id'] . ' }] , \''.$action['selector'].'\' );"';
                break;
            }
            case 'upload' : {
                $result = 'onclick="javascript:act.upload(\'input#' . $action . '\' );"';
                break;
            }
            case 'generate' : {
                $result = 'onclick="javascript:act.generate( \'' . $action . '\' );"';
                break;
            }
            case 'upload-id' : {
				if(isset($action['upload_url']) && $action['upload_url'] != ''){  
					$upload_url =  $action['upload_url'];
				}else{
					$upload_url =  '';
				}	
                $result = 'onclick="javascript:act.upload_id(\'' . $action['group'] . '\' , \'' . $action['topic'] . '\' , \''.$action['index'].'\',\''.$upload_url.'\' );"';
                break;
            }

            case 'extern-upload-id' : {
				if(isset($action['upload_url']) && $action['upload_url'] != ''){
					$upload_url =  $action['upload_url'];
				}else{
					$upload_url =  '';
				}
                $result = 'onclick="javascript:act.extern_upload_id(\'' . $action['group'] . '\' , \'' . $action['topic'] . '\' , \''.$action['index'].'\',\''.$upload_url.'\' );"';
                break;
            }

		  case "":
		  break;
        }

        return $result;
    }

	// --------------------------------------------------------------------------
	
	function append_output( $output )
	{
		$this->output = $this->output . "\n" . $output;		
	}
	
	// --------------------------------------------------------------------------
	
	function reset_output( $output )
	{
		$this->output = '';
	}
	
	// --------------------------------------------------------------------------
	
	function append_error( $error )
	{
		$this->errors = $this->errors . "\n" . $error;
	}
}

?>