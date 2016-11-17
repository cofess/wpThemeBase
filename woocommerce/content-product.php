<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>
<li class="item">
  <div class="box scalebox b b-light">
    <div class="photo"> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php  echo my_woocommerce_get_product_thumbnail('shop_thumbnail'); ?></a> </div>
    <div class="info bg p-sm">
      <h3 class="text-nowrap text-sm mt-no"><a href="<?php the_permalink(); ?>" class="color-black" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
      <p class="mheight-xxs text-break hidden-xs"><?php echo mb_substr(get_the_excerpt(),0,70,"utf8").'...'?></p>
      <a href="<?php the_permalink(); ?>" class="color-orange-800 hidden-xs" title="<?php the_title(); ?>">Learn More<i class="fa fa-angle-double-right fa-fw"></i></a>
      <div class="clearfix"> </div>
    </div>
  </div>
</li>
