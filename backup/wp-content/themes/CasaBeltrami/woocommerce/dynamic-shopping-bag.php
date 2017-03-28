<?php 
/**
* Check if WooCommerce is active
**/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    global $woocommerce;

?>

<!---->

<div class="woocommerce gbtr_dynamic_shopping_bag">

    <div class="gbtr_little_shopping_bag_wrapper">
        <div class="gbtr_little_shopping_bag">
            <div class="overview"><span class="minicart_items <?php if($woocommerce->cart->cart_contents_count == 0){ echo 'no-items'; } ?> "><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span> <span class="minicart_total"><?php echo $woocommerce->cart->get_cart_total(); ?></span> </div>
        </div>
        <div class="gbtr_minicart_wrapper">
            <h4><?php _e('Mi cesta de la compra', 'redcodn'); ?></h4>
            <div class="gbtr_minicart">
            <?php                                    
            echo '<ul class="cart_list">';                                        
                if (sizeof($woocommerce->cart->cart_contents)>0) : foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
                
                    $_product = $cart_item['data'];                                            
                    if ($_product->exists() && $cart_item['quantity']>0) :                                            
                        echo '<li class="cart_list_product">';
                            echo '<a class="cart_list_product_img" href="'.get_permalink($cart_item['product_id']).'"> ' . $_product->get_image().'</a>';                                                    
                            echo '<div class="cart_list_product_title">';
                                //echo '<a href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_categories( '', ''.__('', 'woocommerce').' ', '') . '</a>';
                                $gbtr_product_title = $_product->get_title();
                                $gbtr_short_product_title = (strlen($gbtr_product_title) > 28) ? substr($gbtr_product_title, 0, 25) . '...' : $gbtr_product_title;
                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key ) . '<a href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $gbtr_short_product_title, $_product) . '</a><span class="cart_list_product_quantity"> ('.$cart_item['quantity'].')</span>' . ' - <span class="cart_list_product_price">'.woocommerce_price($_product->get_price()).'</span>';
                            echo '</div>';
                            echo '<div class="clr"></div>';                                                
                        echo '</li>';                                         
                    endif;                                        
                endforeach;
                ?>
                        
                <li class="minicart_total_checkout">                                        
                    <div><?php _e('Cart subtotal', 'redcodn'); ?></div> <span><?php echo $woocommerce->cart->get_cart_total(); ?></span>                                   
                </li>
                <li class="clr">
                    <div class="row">
                        <div class="six columns">
                            <a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="button gbtr_minicart_cart_but"><?php _e('Ver Carrito', 'redcodn'); ?></a>   
                        </div>
                        <div class="six columns">
                            <a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="button gbtr_minicart_checkout_but"><?php _e('Caja', 'redcodn'); ?></a>
                        </div>
                    </div>                   
                </li>
                <?php                                        
                else: echo '<li class="empty">'.__('No hay productos en el carrito.','redcodn').'</li>'; endif;                                    
            echo '</ul>';                                    
            ?>                                                                        

            </div>
        </div>
        
    </div>

</div>

<!---->

<?php } ?>