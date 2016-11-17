<?php get_header(); ?>
<!-- main -->
<main class="main bg" id="main" role="main">
  <section class="page-head mb-1x hidden-xs">
    <?php if(!is_search()){
      get_template_part( "content/banner/product-banner" );
    }?>
    <div class="pinned bg-white bb b-light hidden-xs">
      <div class="text-center">
        <?php get_template_part( "content/searchform-product" );?>
      </div>
    </div>
  </section>
  <section class="page-content pv-3x">
    <?php if ( have_posts() ) : ?>    
    <div class="container-fluid">
      <div class="row">
        <!-- item -->
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-2x">        
          <?php wc_get_template_part( 'content', 'product-col' ); ?>          
        </div>
        <?php endwhile; // end of the loop. ?>
        <!-- /item -->                                                                                                                        
      </div>
      <!-- /row -->
      <nav class="text-xs-center text-sm-center">
        <?php if(function_exists('bootstrap_pagination')) { bootstrap_pagination($loop->max_num_pages); } ?>
        <form class="form-inline navbar-right mr-no mv-2x hidden-xs hidden-sm" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="get">
          <div class="form-group"> 
            <label for="pageNumber">Total <?php echo $wp_query->max_num_pages;?> pages，Go to</label>
            <div class="input-group"> 
              <input class="form-control r-no" type="text" placeholder="Jump to" size="6" name="paged"> 
              <span class="input-group-btn"> 
                <input class="btn btn-default r-no" value="Go" type="submit"> 
              </span>
            </div>
          </div>
        </form> 
      </nav>
    </div>
    <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
      <?php wc_get_template( 'loop/no-products-found.php' ); ?>
    <?php endif; wp_reset_query();?>  
  </section>
</main>
<!-- footer -->
<?php get_footer(); ?>