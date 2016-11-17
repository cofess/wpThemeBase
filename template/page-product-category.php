<?php 
/**
 * Template Name: 产品目录
 *
**/
get_header(); ?>
<!-- main -->
<main class="main" id="main" role="main">
  <section class="page-head">
    <div class="container">
      <div class="row mt-5x">
        <div class="col-md-8 col-md-offset-2">
          <?php get_template_part( "content/searchform-product-category" ) ?>
        </div>
      </div>
    </div>
  </section>
  <section class="page-content pv-4x">
    <div class="container-fluid">
      <div class="row">
        <!-- item -->
    <?php
      $prod_categories = get_terms( 'product_cat', array(
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => 0
    ));
    foreach( $prod_categories as $prod_cat ) :
        $product_cat_options=get_term_meta( $prod_cat->term_id, 'taxonomy_product_cat_options', true );
        if(is_array($product_cat_options) && $product_cat_options['sum']!=null){
          $product_count=$product_cat_options['sum'];
        }else{
          $product_count=wt_get_category_count($prod_cat->term_id);
        }
        //$product_count=($product_cat_options['sum']!=null) $product_cat_options['sum'] : wt_get_category_count($prod_cat->term_id);
        $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
        $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
        $term_link = get_term_link( $prod_cat, 'product_cat' );       
    ?>
        <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-2x">
          <div class="entity hover-up bg-white p-2x b b-light shadow-hover mheight-xl clearfix">
            <div class="entity-header text-center">
              <a href="<?php echo $term_link; ?>" title="<?php echo $prod_cat->name; ?>">
                <img src="<?php echo $cat_thumb_url; ?>" alt="<?php echo $prod_cat->name; ?>"/>
              </a>
            </div>
            <div class="entity-body text-center">
              <h3 class="fs-xs text-nowrap-1x"><a href="<?php echo $term_link; ?>" title="<?php echo $prod_cat->name; ?>"><?php echo $prod_cat->name; ?></a></h3>
              <div class="colored-line bg-black"></div>
              <p class="mv-1x text-nowrap-1x text-muted"><?php echo $product_count;?> total products</p>
            </div>
            <div class="entity-footer">
              <p class="mt-2x">
                <a class="btn btn-dark btn-outline btn-block clearfix" href="<?php echo $term_link; ?>" title="<?php echo $prod_cat->name; ?>">
                  <span class="pull-left">View Products</span>
                  <i class="fa fa-arrow-circle-right pull-right"></i>
                </a>
              </p>
              <?php if(is_array($product_cat_options) && $product_cat_options['category_downlink']!=null){?>
              <p class="mt-2x">
                <a href="<?php echo $product_cat_options['category_downlink'];?>" class="btn btn-main btn-outline btn-block clearfix" target="_blank" download="ASTA-<?php echo $prod_cat->name; ?> Product Catalog" title="ASTA-<?php echo $prod_cat->name; ?> Product Catalog">
                  <span class="pull-left">Download Category</span>
                  <i class="fa fa-arrow-circle-right pull-right"></i>
                </a>
              </p>
              <?php }?>
            </div>
          </div>
        </div>
        <?php endforeach; wp_reset_query(); ?> 
        <!-- /item -->
        <!-- item -->
        <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-2x">
          <div class="entity hover-up bg-white p-2x b b-light shadow-hover mheight-xl clearfix">
            <div class="entity-header text-center">
              <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) );?>" title="All Products">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/brands/asta.gif" alt="All Products"/>
              </a>
            </div>
            <div class="entity-body text-center">
              <h3 class="fs-xs text-nowrap-1x"><a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) );?>" title="All Products">All Products</a></h3>
              <div class="colored-line bg-black"></div>
              <p class="mv-1x text-nowrap-1x text-muted">
              <?php 
                if(cs_get_option('product_sum')!==null && cs_get_option('product_sum')!==''){
                  echo cs_get_option('product_sum');
                }else{
                  $args = array( 'post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1 );
                  $products = new WP_Query( $args );
                  echo $products->found_posts;
                }
                wp_reset_query();?>
               total products</p>
            </div>
            <div class="entity-footer">
              <p class="mt-2x">
                <a class="btn btn-dark btn-outline btn-block clearfix" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) );?>" title="All Products">
                  <span class="pull-left">View Products</span>
                  <i class="fa fa-arrow-circle-right pull-right"></i>
                </a>
              </p>
              <?php if(cs_get_option('category_downlink')!=null){?>
              <p class="mt-2x">
                <a href="<?php echo cs_get_option('category_downlink');?>" class="btn btn-main btn-outline btn-block clearfix" target="_blank" download="ASTA Full Product Catalog" title="ASTA Full Product Catalog">
                  <span class="pull-left">Download Category</span>
                  <i class="fa fa-arrow-circle-right pull-right"></i>
                </a>
              </p>
              <?php }?>
            </div>
          </div>
        </div>
        <!-- /item -->                                          
      </div>
      <!-- /row -->
    </div>   
  </section>
</main>
<?php get_footer(); ?>