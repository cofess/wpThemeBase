<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>

			<div class="product_meta">
			<?php do_action( 'woocommerce_product_meta_start' ); ?>
              <h2 class="fs-sm text-break"><?php the_title(); ?></h2>
              <ul class="list-unstyled lh-md mv-4x">
              	<?php if($product->get_sale_price()){
                	echo '<li><span class="fs-sm color-main">'.get_woocommerce_currency_symbol().$product->get_sale_price().'</span><span class="text-muted"> ( '.get_woocommerce_currency().' )</span></li>';
                }?>
                <?php if($product->get_attribute( 'asta-code' )){?>
                <li><span class="text-muted mr-1x mwidth-sm">ASTA Code:</span><span><?php echo $product->get_attribute( 'asta-code' );?></span></li>
                <?php }?>
                <li><span class="text-muted mr-1x mwidth-sm">OEM Code:</span><span><?php echo $product->get_attribute( 'oem-code' );?></span></li>
                <li><span class="text-muted mr-1x mwidth-sm">Type:</span><span><?php echo $product->get_attribute( 'product-type' );?></span></li>
                <?php if( $product->get_attribute( 'color' )=='BK'){
					echo '<li><span class="text-muted mr-1x mwidth-sm">Color:</span><span><i class="fa fa-circle fa-fw"></i></span></li>';  
				  } elseif($product->get_attribute( 'color' )=='K/C/Y/M'){
					echo '<li><span class="text-muted mr-1x mwidth-sm">Color:</span><span><i class="fa fa-circle fa-fw"></i><i class="fa fa-circle fa-fw color-info-light"></i><i class="fa fa-circle fa-fw color-warning-light"></i><i class="fa fa-circle fa-fw color-pink-light"></i></span></li>';  
				  } elseif($product->get_attribute( 'color' )=='C/Y/M'){
					echo '<li><span class="text-muted mr-1x mwidth-sm">Color:</span><span><i class="fa fa-circle fa-fw color-info-light"></i><i class="fa fa-circle fa-fw color-warning-light"></i><i class="fa fa-circle fa-fw color-pink-light"></i></span></li>';  
				  }
				  ?>
                <li><span class="text-muted mr-1x mwidth-sm">Min.Order Quantity:</span><span><?php echo $product->get_attribute( 'min-order-quantity' );?></span></li>
                <li><span class="text-muted mr-1x mwidth-sm">Supply Ability :</span><span><?php echo $product->get_attribute( 'supply-ability' );?></span></li>
                <li><span class="text-muted mr-1x mwidth-sm">Place of Origin:</span><span><?php echo $product->get_attribute( 'place-of-origin' );?></span></li>
              </ul>
              <p class="meta-tags text-muted">
              <?php echo $product->get_categories( ', ', '<span class="posted_in"><i class="fa fa-tags fa-fw"></i>' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '</span>' ); ?>
              </p>
              <p class="meta-category text-muted mb-4x">
              <?php echo $product->get_tags( ', ', '<span class="tagged_as"><i class="fa fa-folder-open fa-fw"></i>' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '</span>' ); ?>
              </p>
              <?php do_action( 'woocommerce_product_meta_end' ); ?>
            </div>
