<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>

<section class="pv-xl clearfix">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-xl-10 col-xl-offset-1">
        <div class="row"> 
          <!-- Carousel -->
          <div class="col-md-5">
            <?php $attachment_ids = $product->get_gallery_attachment_ids();
	if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	?>
            <div id="metroCarousel" class="carousel slide metroCarousel b b-light" data-interval="5000"> 
              <!-- Carousel items -->
              <div class="carousel-inner">
                <?php
		foreach ( $attachment_ids as $attachment_id ) {
			$classes = '';
			if ( $loop == 0 )
				$classes = 'active';
			//if ( ( $loop + 1 ) % $columns == 0 )
				//$classes[] = 'last';
			$image_link = wp_get_attachment_url( $attachment_id );
			if ( ! $image_link )
				continue;

			$image_title 	= esc_attr( get_the_title( $attachment_id ) );
			$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $attr = array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );

			//$image_class = esc_attr( implode( ' ', $classes ) );
			echo '<div class="'.$classes.' item"><img data-toggle="magnify" src="'.$image_link.'" class="img-responsive" alt="'.get_the_title().'"/></div>';

			$loop++;
		}

	?>
              </div>
              <!-- Carousel indicators -->
              <ol class="carousel-indicators">
                <?php $i = 0;
			foreach ( $attachment_ids as $attachment_id ) {
			$classes = '';
			if ( $i == 0 )
				$classes = 'active';
            echo '<li data-target="#metroCarousel" data-slide-to="'.$i.'" class="'.$classes.'"></li>';
			$i++;
		   }?>
              </ol>
              <!-- Carousel nav --> 
              <a class="carousel-control left" href="#metroCarousel" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="carousel-control right" href="#metroCarousel" data-slide="next"><i class="fa fa-angle-right"></i></a> </div>
            <?php
} else{
	echo '<img src="'.wc_placeholder_img_src().'" class="img-responsive" alt="'.get_the_title().'"/>';
}?>
          </div>
          <!-- //End Tabs and Carousel -->
          
          <div class="col-md-6 col-md-offset-1">
            <h1 class="mheight-xxs">
              <?php the_title(); ?>
            </h1>
            <ul class="list-unstyled hl-md mv-xl">
              <?php if($product->get_sale_price()){
                echo '<li><span class="text-md color-orange-900">'.get_woocommerce_currency_symbol().$product->get_sale_price().'</span><span class="text-muted"> ( '.get_woocommerce_currency().' )</span></li>';
                }?>
              <li><span class="text-muted mr-md mwidth-xs">ASTA Code:</span><span><?php echo $product->get_attribute( 'asta-code' );?></span></li>
              <li><span class="text-muted mr-md mwidth-xs">OEM Code:</span><span><?php echo $product->get_attribute( 'oem-code' );?></span></li>
              <li><span class="text-muted mr-md mwidth-xs">Type:</span><span><?php echo $product->get_attribute( 'product-type' );?></span></li>
              <?php if( $product->get_attribute( 'color' )=='BK'){
					echo '<li><span class="text-muted mr-md mwidth-xs">Color:</span><span><i class="fa fa-circle fa-fw"></i></span></li>';  
				  } elseif($product->get_attribute( 'color' )=='K/C/Y/M'){
					echo '<li><span class="text-muted mr-md mwidth-xs">Color:</span><span><i class="fa fa-circle fa-fw"></i><i class="fa fa-circle fa-fw color-light-blue-400"></i><i class="fa fa-circle fa-fw color-yellow-400"></i><i class="fa fa-circle fa-fw color-pink-400"></i></span></li>';  
				  } elseif($product->get_attribute( 'color' )=='C/Y/M'){
					echo '<li><span class="text-muted mr-md mwidth-xs">Color:</span><span><i class="fa fa-circle fa-fw color-light-blue-400"></i><i class="fa fa-circle fa-fw color-yellow-400"></i><i class="fa fa-circle fa-fw color-pink-400"></i></span></li>';  
				  }
				  ?>
              <li><span class="text-muted mr-md mwidth-xs">Min.Order Quantity:</span><span><?php echo $product->get_attribute( 'min-order-quantity' );?></span></li>
              <li><span class="text-muted mr-md mwidth-xs">Supply Ability :</span><span><?php echo $product->get_attribute( 'supply-ability' );?></span></li>
              <li><span class="text-muted mr-md mwidth-xs">Place of Origin:</span><span><?php echo $product->get_attribute( 'place-of-origin' );?></span></li>
            </ul>
            <p class="meta-tags text-muted mt-lg"><i class="fa fa-tags"></i><?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', sizeof( get_the_terms( $post->ID, 'product_tag' ) ), 'woocommerce' ) . ' ', '</span>' ); ?></p>
            <p class="meta-category text-muted mb-lg"><i class="fa fa-folder-open"></i> <?php echo $product->get_categories( ', ', '<span>' . _n( 'Category:', 'Categories:', sizeof( get_the_terms( $post->ID, 'product_cat' ) ), 'woocommerce' ) . ' ', '.</span>' ); ?></p>
            <p class="hide"><a class="btn btn-danger btn-outline btn-round btn-lg ph-xl" href="#"><i class="fa fa-edit"></i> inquire now</a></p>
          </div>
        </div>
        <!--/row-fluid--> 
      </div>
    </div>
  </div>
</section>
