<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
if( $woocommerce_loop['columns'] == 3 ){
	$classes[] = 'four columns';
} elseif( $woocommerce_loop['columns'] == 4 ){
	$classes[] = 'three columns';
} elseif( $woocommerce_loop['columns'] == 2 ){
	$classes[] = 'six columns';
} elseif( $woocommerce_loop['columns'] == 5 ){
	$classes[] = 'three columns';
} elseif( $woocommerce_loop['columns'] == 6 ){
	$classes[] = 'two columns';
} else{
	$classes[] = 'four columns';
}

$size = 'product_grid';

?>

<div <?php post_class( $classes ); ?> data-post-id="<?php echo $post->ID; ?>" >
    <article>
        <header>
            <div class="featimg">
            	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
                <?php
                    if (has_post_thumbnail($post->ID)) {
                        $img_url1 = wp_get_attachment_url( get_post_thumbnail_id( $post -> ID )  ,'full'); //get img URL
                        $img_url = aq_resize( $img_url1, get_aqua_size($size), get_aqua_size($size, 'height'), true, true); //
                    ?>
                        <a href="<?php echo get_permalink($post->ID);  ?>">
                            <img src="<?php echo $img_url; ?>" alt="<?php echo $post->post_title; ?>" >
                        </a>
                    <?php    
                    }
                ?>
            </div>
        </header>
        <section>
            <div class="entry-title">
                <h3>
                    <a href="<?php echo get_permalink($post->ID);  ?>" title="<?php _e('Permalink to', 'redcodn'); ?> <?php echo $post->post_title; ?>" rel="bookmark"><?php echo $post->post_title; ?></a>
                </h3>
            </div>
            <div class="entry-meta">
                <div class="entry-date">
                    <?php echo red_get_post_date($post -> ID); ?>
                </div>
                <div class="entry-categories">
                    <?php                                        
                        $cat_tax = 'product_cat';    
                        if(isset($cat_tax)){
                            $the_categories = get_post_categories($post->ID, $only_first_cat = false, $taxonomy = $cat_tax, $margin_elem_start = '', $margin_elem_end = ' ', $delimiter = ', '); 
                        }else{
                            $the_categories = '';
                        }
                    ?>
                    <?php if(strlen(trim($the_categories))){ ?>
                        <?php echo $the_categories; ?>
                    <?php } ?>
                </div>
            </div>
            <div class="dotted-separator product-delimiter">
                <div class="idot">
                </div>
            </div>
            

            <div class="grid-shop-options">
            	<div class="price-options">
		            <?php
						/**
						 * woocommerce_after_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' );
					?>
				</div>
	            <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
            </div>
        </section>
        
    </article>
</div>