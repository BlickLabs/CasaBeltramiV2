<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="images">

		<div id="product-slider" class="flexslider">
	      
		    <div class="flex-viewport" >
		    	<ul class="slides" >
		<?php

			$attachment_ids = $product->get_gallery_attachment_ids();


			if ( sizeof($attachment_ids) ){

				foreach ( $attachment_ids as $attachment_id ) {

					$classes = array( 'zoom' );

					$image_link = wp_get_attachment_url( $attachment_id );


					if ( ! $image_link )
						continue;
					$red_img_src = wp_get_attachment_url( $attachment_id   ,'full'); //get img URL
                    $red_img_url = aq_resize( $red_img_src, '800', '9999', false, true); //resize img


					$image_class = esc_attr( implode( ' ', $classes ) );
					$image_title = esc_attr( get_the_title( $attachment_id ) );
					$image =  '<img src="'. $red_img_url .'" alt="'. $image_title .'" class="'. $image_class .'" />';

					echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s"  data-rel="prettyPhoto">%s</a></li>', $image_link, $image_title, $image ), $post->ID );
					
				}
				
			} else {

				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><img src="%s" alt="Placeholder" /></li>', woocommerce_placeholder_img_src() ), $post->ID );
			}
		?>
				</ul>
		  	</div>

	  	</div>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
