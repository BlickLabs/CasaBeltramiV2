<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new red_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="red-popup">

	<div id="red-shortcode-wrap">
		
		<div id="red-sc-form-wrap">
		
			<div id="red-sc-form-head">
			
				<?php echo $shortcode->popup_title; ?>
			
			</div>
			<!-- /#red-sc-form-head -->
			
			<form method="post" id="red-sc-form">
			
				<table id="red-sc-form-table">
				
					<?php echo $shortcode->output; ?>
					
					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary red-insert">Insert Shortcode</a></td>							
						</tr>
					</tbody>
				
				</table>
				<!-- /#red-sc-form-table -->
				
			</form>
			<!-- /#red-sc-form -->
		
		</div>
		<!-- /#red-sc-form-wrap -->
		
		<div class="clear"></div>
		
	</div>
	<!-- /#red-shortcode-wrap -->

</div>
<!-- /#red-popup -->

</body>
</html>