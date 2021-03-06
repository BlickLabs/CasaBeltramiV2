<?php
	// attched images management
	
function red_meta_boxes() {
	global $post;

	// add meta box that will hold attached images
	add_meta_box( 'lala-post-images-gallery', __( 'Gallery images', 'redcodn' ), 'red_product_images_box', 'gallery', 'side', 'high' );
	add_meta_box( 'lala-post-images-video', __( 'Gallery images', 'redcodn' ), 'red_product_images_box', 'video', 'side', 'high' );
	add_meta_box( 'lala-post-images-post', __( 'Gallery images', 'redcodn' ), 'red_product_images_box', 'post', 'side', 'low' );

}

add_action( 'add_meta_boxes', 'red_meta_boxes' );	

	/**
 * Product Images
 *
 * Function for displaying the product images meta box.
 *
 */


/**
 * Display the product images meta box.
 *
 * @access public
 * @return void
 */
function red_product_images_box() {
	global $post;
	?>
	<div id="post_images_container">
		<ul class="product_images">
			<?php
			
				if ( metadata_exists( 'post', $post->ID, '_post_image_gallery' ) ) {

					$product_image_gallery = get_post_meta( $post->ID, '_post_image_gallery', true );

					$attachments = array_filter( explode( ',', $product_image_gallery ) );
				}

	            
				if ( isset( $attachments ) ){
					foreach ( $attachments as $attachment_id ) {
						echo '<li class="image" data-attachment_id="' . $attachment_id . '">
							' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '
							<ul class="actions">
								<li><a href="#" class=" icon-delete" title="' . __( 'Delete image', 'redcodn' ) . '"></a></li>
							</ul>
						</li>';
					}
				}
					


				if(!isset($product_image_gallery)){
					$product_image_gallery = '';
				}
			?>
		</ul>

		<input type="hidden" id="product_image_gallery" name="product_image_gallery" value="<?php echo esc_attr( $product_image_gallery ); ?>" />

	</div>
	<p class="add_product_images hide-if-no-js">
		<a href="#"><?php _e( 'Add gallery images', 'redcodn' ); ?></a>
	</p>
	<script type="text/javascript">
		jQuery(document).ready(function($){

			// Uploading files
			var product_gallery_frame;
			var $image_gallery_ids = $('#product_image_gallery');
			var $product_images = $('#post_images_container ul.product_images');

			jQuery('.add_product_images').on( 'click', 'a', function( event ) {

				var $el = $(this);
				var attachment_ids = $image_gallery_ids.val();

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if ( product_gallery_frame ) {
					product_gallery_frame.open();
					return;
				}

				// Create the media frame.
				product_gallery_frame = wp.media.frames.downloadable_file = wp.media({
					// Set the title of the modal.
					title: '<?php _e( 'Add Images to Gallery', 'redcodn' ); ?>',
					button: {
						text: '<?php _e( 'Add to gallery', 'redcodn' ); ?>',
					},
					multiple: true
				});

				// When an image is selected, run a callback.
				product_gallery_frame.on( 'select', function() {
					
					var selection = product_gallery_frame.state().get('selection');

					selection.map( function( attachment ) {

						attachment = attachment.toJSON();

						if ( attachment.id ) {
							attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

							$product_images.append('\
								<li class="image" data-attachment_id="' + attachment.id + '">\
									<img src="' + attachment.url + '" />\
									<ul class="actions">\
										<li><a href="#" class=" icon-delete" title="<?php _e( 'Delete image', 'redcodn' ); ?>"><?php //_e( 'Delete', 'redcodn' ); ?></a></li>\
									</ul>\
								</li>');
						}

					} );

					$image_gallery_ids.val( attachment_ids );
				});

				// Finally, open the modal.
				product_gallery_frame.open();
			});

			// Image ordering
			$product_images.sortable({
				items: 'li.image',
				cursor: 'move',
				scrollSensitivity:40,
				forcePlaceholderSize: true,
				forceHelperSize: false,
				helper: 'clone',
				opacity: 0.65,
				placeholder: 'wc-metabox-sortable-placeholder',
				start:function(event,ui){
					ui.item.css('background-color','#f6f6f6');
				},
				stop:function(event,ui){
					ui.item.removeAttr('style');
				},
				update: function(event, ui) {
					var attachment_ids = '';

					$('#post_images_container ul li.image').css('cursor','default').each(function() {
						var attachment_id = jQuery(this).attr( 'data-attachment_id' );
						attachment_ids = attachment_ids + attachment_id + ',';
					});

					$image_gallery_ids.val( attachment_ids );
				}
			});

			// Remove images
			$('#post_images_container').on( 'click', 'a.icon-delete', function() {

				$(this).closest('li.image').remove();

				var attachment_ids = '';

				$('#post_images_container ul li.image').css('cursor','default').each(function() {
					var attachment_id = jQuery(this).attr( 'data-attachment_id' );
					attachment_ids = attachment_ids + attachment_id + ',';
				});

				$image_gallery_ids.val( attachment_ids );

				return false;
			} );

		});
	</script>
	<?php
}


add_action('save_post', 'lala_save_attached_images');

// save attached images meta data
function lala_save_attached_images($post_id){
	//// GLOBAL $POST
	global $post;

	// Gallery Images
	if(isset($_POST['product_image_gallery'] )){
		$attachment_ids = array_filter( explode( ',', lala_clean( $_POST['product_image_gallery'] ) ) );
		update_post_meta( $post_id, '_post_image_gallery', implode( ',', $attachment_ids ) );
	
	}
	
}


//// REGISTER OUR STYLES for attached images AND PUTS IN OUR ADMIN PAGE
function lala_attached_images_style() {
	wp_register_style('AttachedImagesStyle', get_template_directory_uri().'/lib/css/attached_images.css');
	wp_enqueue_style('AttachedImagesStyle');
}


//// ADDS STYLE IN OUR HEAD SO THE attached images look nice
	add_action('admin_init', 'lala_attached_images_style');

/**
 * Clean variables
 *
 * @access public
 * @param string $var
 * @return string
 */
function lala_clean( $var ) {
	return sanitize_text_field( $var );
}

?>