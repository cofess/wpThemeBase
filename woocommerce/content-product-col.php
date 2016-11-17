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

<div class="entity hover-up bg-white b b-light shadow-hover clearfix">
  <div class="entity-header">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php  echo my_woocommerce_get_product_thumbnail('shop_thumbnail'); ?></a>
  </div>
  <div class="entity-body ph-1x">
    <h3 class="fs-xs text-nowrap-1x"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="text-break"><?php the_title(); ?></a></h3>
    <div class="colored-line bg-black"></div>
    <div class="mheight-ss">
      <p class="text-nowrap-2x text-muted"><?php echo get_the_excerpt()?></p>
    </div>
    <p class="mb-2x">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" role="button">Learn More<i class="fa fa-arrow-circle-right ml-2x"></i></a>
      <span class="social-share share-noborder pull-right" data-sites="facebook,twitter,google,linkedin" data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-description="<?php echo get_the_excerpt()?>" data-image="<?php echo wpjam_get_post_thumbnail_uri($post->ID);?>"></span>
    </p>
  </div>
</div>
