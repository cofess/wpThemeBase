<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
get_header();?>
<!-- main -->
<main class="main" id="main" role="main">
  <section class="page-head pinned bg bb b-light lh-md hidden-xs hidden-sm">
    <div class="container-fluid">
    <div class="navbar-header">
      <!--<button class="navbar-toggle collapsed pv-no" type="button" data-toggle="collapse" data-target="#bread-navbar" aria-controls="bread-navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span><i class="fa fa-plus"></i></span>
      </button>-->
      <?php if ( function_exists( 'bread_crumb' ) ) bread_crumb(); ?>    
    </div>
    <nav id="bread-navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-map-marker"></i></a>
          <ul class="dropdown-menu dot-nav">
            <li><a href="#detail">▪ Product Description</a></li>
            <li><a href="#advantage">▪ Why Choose ASTA</a></li>
            <li><a href="#trade">▪ Packaging & Shipping</a></li>
            <li><a href="#quality">▪ Quality Details</a></li>
            <li><a href="#process">▪ Production Process</a></li>
            <li><a href="#related">▪ Related Products</a></li>
            <li><a href="#comments">▪ Comments</a></li>
          </ul>
        </li>
        <?php
$prev_post = get_previous_post();
if (!empty( $prev_post )): ?>
          <li><a href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo $prev_post->post_title; ?>"><i class="fa fa-angle-left"></i></a></li>
          <?php endif; ?>
          <?php
      $terms = get_the_terms( $post->ID, 'product_cat' );
      echo '<li><a href="'.get_term_link( $terms[0]->term_id, 'product_cat' ).'" title="'.$terms[0]->name.' list"><i class="fa fa-th"></i></a></li>';
    ?>
          <?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
          <li><a href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo $next_post->post_title; ?>"><i class="fa fa-angle-right"></i></a></li>
          <?php endif; ?>
      </ul>
    </nav>
  </div>
  </section>
  <?php while ( have_posts() ) : the_post(); ?>
  <section class="pv-4x" id="summary">   
    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="row"> 
            <!-- Carousel -->
            <div class="col-md-5">
            <?php $attachment_ids = $product->get_gallery_attachment_ids();
              if ( $attachment_ids ) {
                $loop     = 0;
                $columns  = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );?>
              <div id="metroCarousel" class="carousel slide metroCarousel" data-interval="5000"> 
                <!-- Carousel items -->
                <div class="carousel-inner">
                <?php foreach ( $attachment_ids as $attachment_id ) {
                  $classes = '';
                  if ( $loop == 0 ) $classes = 'active';
                  $image_link = wp_get_attachment_url( $attachment_id );
                  if ( ! $image_link ) continue;
                  $image_title  = esc_attr( get_the_title( $attachment_id ) );
                  $image_caption  = esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

                  $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $attr = array('title' => $image_title,'alt' => $image_title) );

                  echo '<div class="'.$classes.' item"><img data-toggle="magnify" src="'.$image_link.'" class="img-responsive" alt="'.get_the_title().'"/></div>';

                $loop++;}?>
                </div>
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                <?php $i = 0;
                foreach ( $attachment_ids as $attachment_id ) {
                  $classes = '';
                  if ( $i == 0 ) $classes = 'active';
                  echo '<li data-target="#metroCarousel" data-slide-to="'.$i.'" class="'.$classes.'"></li>';
                  $i++;
                }?>
                </ol>
                <!-- Carousel nav --> 
                <a class="carousel-control left" href="#metroCarousel" data-slide="prev"><i class="fa fa-angle-left"></i></a> 
                <a class="carousel-control right" href="#metroCarousel" data-slide="next"><i class="fa fa-angle-right"></i></a> 
              </div>
            <?php
            } else{
              echo '<img src="'.wc_placeholder_img_src().'" class="img-responsive" alt="'.get_the_title().'"/>';
            }?>
            </div>
            <!-- //End Tabs and Carousel -->
            
            <div class="col-md-6 col-md-offset-1">
              <?php get_template_part('woocommerce/single-product/meta'); ?>
            </div>
          </div>
          <!--/row-fluid--> 
        </div>
      </div>
      <!-- /row -->
    </div>   
  </section>
  <!-- detail -->
  <section id="detail" class="bt b-light pv-4x">
    <div class="container-fluid">
      <h2 class="mb-2x"><i class="fa fa-print fa-fw"></i>Product Description</h2>
      <div class="row">
        <ul class="list-unstyled">
        <?php if($product->get_attribute( 'asta-code' )){?>
          <li class="col-xs-12 col-sm-6 col-md-4">
            <h3 class="fs-xs font-bold">ASTA Code</h3>
            <p><?php echo $product->get_attribute( 'asta-code' );?></p>
          </li>
        <?php }?>
          <li class="col-xs-12 col-sm-6 col-md-4">
            <h3 class="fs-xs font-bold">OEM Code</h3>
            <p><?php echo $product->get_attribute( 'oem-code' );?></p>
          </li>
          <li class="col-xs-6 col-sm-6 col-md-4">
            <h3 class="fs-xs font-bold">Type</h3>
            <p><?php echo $product->get_attribute( 'product-type' );?></p>
          </li>
          <li class="col-xs-6 col-sm-6 col-md-4">
            <h3 class="fs-xs font-bold">Color</h3>
            <p><?php echo $product->get_attribute( 'color' );?></p>
          </li>
          <li class="col-xs-6 col-sm-6 col-md-4">
            <h3 class="fs-xs font-bold">Compatible Brand</h3>
            <p><?php echo $product->get_categories( sizeof( get_the_terms( $post->ID, 'product_cat' ) )); ?></p>
          </li>
          <li class="col-xs-6 col-sm-6 col-md-4">
            <h3 class="fs-xs font-bold">New/Reman</h3>
            <p><?php echo $product->get_attribute( 'newreman' );?></p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-4">
            <h3 class="fs-xs font-bold">Page Yield</h3>
            <p><?php echo $product->get_attribute( 'page-yield' );?></p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-4">
            <h3 class="fs-xs font-bold">Supply Ability</h3>
            <p><?php echo $product->get_attribute( 'supply-ability' );?></p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-4">
            <h3 class="fs-xs font-bold">Min.Order Quantity </h3>
            <p><?php echo $product->get_attribute( 'min-order-quantity' );?></p>
          </li>
          <li class="col-xs-12 col-md-12">
            <h3 class="fs-xs font-bold">For use in</h3>
            <p><?php echo $product->get_attribute( 'for-use-in' );?></p>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- /detail -->
  <!-- advantage -->
  <section id="advantage" class="hidden-xs">
      <div class="pull-in">
        <div class="row">
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center">
            <div class="pv-4x ph-2x">
              <i class="fa fa-cog fa-3x"></i>
              <h3 class="fs">Warranty</h3>
              <p>18 month</p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center">             
            <div class="pv-4x ph-2x">
              <i class="fa fa-shield fa-3x"></i>
              <h3 class="fs">Guarantte</h3>
              <p>1:1 replacement</p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center">            
            <div class="pv-4x ph-2x">
              <i class="fa fa-diamond fa-3x"></i>
              <h3 class="fs">Defective</h3>
              <p><0.5%</p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center"> 
            <div class="pv-4x ph-2x">
              <i class="fa fa-trophy fa-3x"></i>
              <h3 class="fs">Expert</h3>
              <p>More Than 10 years OEM Service</p>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- /advantage -->  
  <!-- trade -->
  <section id="trade">
      <div class="pull-in hidden-xs">
        <div class="row">
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center"> 
            <div class="pv-3x ph-2x">
              <i class="fa fa-paypal fa-3x"></i>
              <h3 class="fs">Payment Terms</h3>
              <p><?php echo $product->get_attribute( 'payment-terms' );?></p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center"> 
            <div class="pv-3x ph-2x">
              <i class="fa fa-ship fa-3x"></i>
              <h3 class="fs">Shipping</h3>
              <p><?php echo $product->get_attribute( 'shipping' );?></p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center">             
            <div class="pv-3x ph-2x">
              <i class="fa fa-usd fa-3x"></i>
              <h3 class="fs">Trade Terms</h3>
              <p><?php echo $product->get_attribute( 'trade-terms' );?></p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center"> 
            <div class="pv-3x ph-2x">
              <i class="fa fa-heart fa-3x"></i>
              <h3 class="fs">Delivery Date</h3>
              <ul class="list-unstyled"><li>7-10 working days for LCL/20GP</li><li>10-15 working days for 40GP</li></ul>
            </div>
          </div>
        </div>
      </div>
      <div class="pull-in">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 b b-light">
          <div class="row pv-3x ph-5x ph-xs-1x mheight-lg">
            <div class="media-body">
              <h3 class="text-nowrap">Certificate</h3>
              <p class="text-muted mheight-xs"><?php echo $product->get_attribute( 'certificate' );?></p>
              <img src="<?php echo get_template_directory_uri();?>/assets/images/certification.png"> </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 b b-light">
          <div class="row pv-3x ph-5x ph-xs-1x mheight-lg">
            <div class="media-body">
              <h3 class="text-nowrap">Packaging Terms</h3>
              <ul class="list-inside pl-no">
                <li>ASTA Brand & ACO Brand color box;</li>
                <li>Neutral color box;</li>
                <li>Customized color box;</li>
              </ul>
              <img src="<?php echo get_template_directory_uri();?>/assets/images/detail/packaging.png"> </div>
          </div>
        </div>
      </div>
      </div>
  </section>
  <!-- /trade -->
  <!-- quality -->
  <section id="quality" class="hidden-xs">
    <div class="pull-in">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="row mheight-xl">
            <div class="pt-5x ph-5x">
              <h3 class="text-uppercase mv-2x">Imported OPC</h3>
              <p>Wear-resisting OPC comply with Europe and USA inspection standard , prolonging the life span of the machine which print with a high-definition result, perfectly compatible with OEM.</p>
              <div class="text-center"><img src="<?php echo get_template_directory_uri();?>/assets/images/detail/opc.jpg"></div>
            </div>
          </div>
        </div>
        <div class="section-mr col-xs-12 col-sm-6 col-md-6 col-lg-6 bg-sub bg-inverse">
          <div class="row mheight-xl">
            <div class="pt-5x ph-5x">
              <h3 class="text-uppercase mv-2x">Super Wear-resisting MR</h3>
              <p>Strong wearability MR with high charge and stable magnetic fields.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right">
          <div class="row mheight-xl">
            <div class="pt-5x ph-5x">
              <h3 class="text-uppercase mv-2x">Premium Toner Powder</h3>
              <p>High definition polymerized toner guarantee a high quality printing result.</p>
              <div class="text-center"><img src="<?php echo get_template_directory_uri();?>/assets/images/detail/powder.jpg"></div>
            </div>
          </div>
        </div>
        <div class="section-blade col-xs-12 col-sm-6 col-md-6 col-lg-6 bg-main bg-inverse">
          <div class="row mheight-xl">
            <div class="pt-5x ph-5x">
              <h3 class="text-uppercase mv-2x">High-end blades</h3>
              <p>Selected material is not easy to deform or broken which greatly provide you a good printing experience.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
  <!-- /quality -->
  <!-- process -->
  <section id="process" class="bg pt-4x hidden-xs">
    <div class="container-fluid">
      <h3 class="text-center text-uppercase">Production Process</h3>
      <p class="text-muted text-center">Premium Material · Lean Production · Professional Package</p>
      <p class="color-sub text-center ">Premium Care Every Production Details </p>
      <div class="swiper-container slide6 mt-3x">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri();?>/assets/images/detail/process/1.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri();?>/assets/images/detail/process/2.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri();?>/assets/images/detail/process/3.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri();?>/assets/images/detail/process/4.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri();?>/assets/images/detail/process/5.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri();?>/assets/images/detail/process/6.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
        </div>
        <!-- Add Pagination -->
        <!--<div class="swiper-pagination slide6-pagination swiper-pagination-black"></div>-->
        <!-- Navigation -->
        <div class="swiper-button-next slide6-button-next swiper-button-black"></div>
        <div class="swiper-button-prev slide6-button-prev swiper-button-black"></div>
      </div>
    </div>
    <div class="mheight-sm mt-n-5x bg-white"></div>
  </section>
  <!-- /process --> 
  <!-- related -->
  <section id="related" class="mb-4x">
    <div class="container-fluid"> 
      <div class="swiper-container swiper-flat slide5">
        <h3 class="mb-3x">Related Products</h3>
        <div class="swiper-wrapper">     
          <?php get_template_part('woocommerce/single-product/related'); ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination slide5-pagination swiper-pagination-black"></div>
      </div>
      <div class="swiper-container swiper-flat slide5">
        <h3 class="mb-3x">Featured Products</h3>
        <div class="swiper-wrapper">
          <?php $args = array( 'post_type' => 'product','post_status'=> 'publish', 'stock' => 1, 'showposts' => 10,'meta_key'=>'_featured','meta_value' => 'yes','orderby' =>'date','order' => 'desc' );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();?>
              <div class="swiper-slide">
                <!-- entity -->
                <?php wc_get_template_part( 'content', 'product-col' ); ?>
                <!-- /entity -->
              </div>
            <?php endwhile; wp_reset_query(); ?>                                                  
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination slide5-pagination swiper-pagination-black"></div>
      </div>      
    </div>
  </section>
  <!-- /related -->
  <?php endwhile; // end of the loop. ?>   
  <!-- comments -->
  <section id="comments">
    <div class="container-fluid"><?php if (comments_open()) comments_template( '', true ); ?></div>
  </section>
  <!-- /comments --> 
</main>
<?php get_footer();?>
