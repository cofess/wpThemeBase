<?php get_header(); ?>
<!-- main -->
<main class="main" id="main" role="main">
  <?php get_template_part( "content/banner/home-banner" ) ?>
  <!-- products -->
  <section id="products" class="pv-4x">
    <!--<div class="container-fluid">-->
      <h3 class="text-center text-uppercase">Featured Products</h3>
      <p class="text-center">Released more than 16 brands 2000 models</p>
      <div class="tabbable-line">
        <div class="center-tabs mb-2x">
        <ul class="nav nav-tabs">
          <li class="active"> <a href="#tab_new_products" data-toggle="tab" aria-expanded="true">New Products</a> </li>
          <li class=""> <a href="#tab_hot_products" data-toggle="tab" aria-expanded="false">HOT Products</a> </li>
          <li class="hidden-xs"> <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Products' ) ) ); ?>" class="bg-no" aria-expanded="false">All Products</a> </li>
        </ul>
        </div>
        <div class="tab-content">
          <!-- tab-pane -->
          <div class="tab-pane active" id="tab_new_products">
            <div class="container-fluid">
              <?php get_template_part( "content/public/new-products" ) ?>
            </div>              
          </div>
          <!-- /tab-pane -->
          <!-- tab-pane -->
          <div class="tab-pane" id="tab_hot_products">
            <div class="container-fluid">
              <?php get_template_part( "content/public/hot-products" ) ?>
            </div>         
          </div>
          <!-- /tab-pane -->
        </div>
      </div>
    <!--</div>-->
  </section>
  <!-- /products -->
  <!-- OUR ADVANTAGES -->
  <?php if(!wp_is_mobile()){ ?>
  <section id="section-advantages" class="hidden-xs">
    <div class="pv-4x">
      <div class="container-fluid">
        <h3 class="text-center text-uppercase">Our Advantages</h3>
        <p class="text-muted text-center mb-4x"><?php echo strip_tags(cs_get_option('company_adwords'));?></p>
        <?php get_template_part( "content/public/advantages" ) ?>
      </div>
    </div>
  </section>
  <?php } ?>
  <!-- /OUR ADVANTAGES -->
  <!-- news -->
  <section id="news">
    <div class="pv-4x">
      <div class="container-fluid">
        <h3 class="text-center text-uppercase mb-4x">Latest News</h3>
        <!--<p class="text-muted text-center mb-4x"><?php echo strip_tags(cs_get_option('company_adwords'));?></p>-->
        <div class="row news-list">
          <!-- col -->
          <div class="col-sm-6 col-md-6 col-lg-3 mt-2x">
            <div class="entity img-burn bg-white b b-light shadow-hover clearfix">
            <a href="<?php echo get_category_link(30);?>" class="entity-header ds-block bg-black bg-inverse pattern news-bg2">
              <h3 class="news-title color-white m-no ph-1x">Company News</h3>
            </a>
            <div class="entity-body ph-1x pv-2x">
              <ul class="list-unstyled">
              <?php $loop = new WP_Query( 'cat=30&showposts=4' );?>
              <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php get_template_part( "content/item-post-simple" ) ?>
              <?php endwhile; endif; wp_reset_query(); ?>
              </ul>
            </div>
          </div>
          </div>
          <!-- /col -->
          <!-- col -->
          <div class="col-sm-6 col-md-6 col-lg-3 mt-2x">
            <div class="entity img-burn bg-white b b-light shadow-hover clearfix">
            <a href="<?php echo get_category_link(33);?>" class="entity-header ds-block bg-black bg-inverse pattern news-bg4">
              <h3 class="news-title color-white m-no ph-1x">Product News</h3>
            </a>
            <div class="entity-body ph-1x pv-2x">
              <ul class="list-unstyled">
              <?php $loop = new WP_Query( 'cat=33&showposts=4' );?>
              <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php get_template_part( "content/item-post-simple" ) ?>
              <?php endwhile; endif; wp_reset_query(); ?>
              </ul>
            </div>
          </div>
          </div>
          <!-- /col -->          
          <!-- col -->
          <div class="col-sm-6 col-md-6 col-lg-3 mt-2x">
            <div class="entity img-burn bg-white b b-light shadow-hover clearfix">
            <a href="<?php echo get_category_link(32);?>" class="entity-header ds-block bg-black bg-inverse pattern news-bg3">
              <h3 class="news-title color-white m-no ph-1x">Exibition News</h3>
            </a>
            <div class="entity-body ph-1x pv-2x">
              <ul class="list-unstyled">
              <?php $loop = new WP_Query( 'cat=32&showposts=4' );?>
              <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php get_template_part( "content/item-post-simple" ) ?>
              <?php endwhile; endif; wp_reset_query(); ?>
              </ul>
            </div>
          </div>
          </div>
          <!-- /col -->
          <!-- col -->
          <div class="col-sm-6 col-md-6 col-lg-3 mt-2x hidden-xs">
            <div class="entity img-burn bg-white b b-light shadow-hover clearfix">
            <a href="<?php echo get_category_link(31);?>" class="entity-header ds-block bg-black bg-inverse pattern news-bg1">
              <h3 class="news-title color-white m-no ph-1x">Industry News</h3>
            </a>
            <div class="entity-body ph-1x pv-2x">
              <ul class="list-unstyled">
              <?php $loop = new WP_Query( 'cat=31&showposts=4' );?>
              <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php get_template_part( "content/item-post-simple" ) ?>
              <?php endwhile; endif; wp_reset_query(); ?>
              </ul>
            </div>
          </div>
          </div>
          <!-- /col -->          
        </div>
        <!-- /row -->
      </div>
    </div>
  </section>
  <!-- /news -->
  <!-- brand -->
  <section id="brand" class="hidden-xs hidden-sm hidden-md">
    <div class="pattern pattern1 mheight-md">
      <div class="container-fluid relative text-center pt-4x">
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 mb-2x pt-4x">
          <p class="text-nowrap-3x"><?php echo cs_get_option('company_profile');?></p>
        </div>
        <div class="col-md-4 text-center relative pv-4x">
          <div class="ph-3x relative z1">
            <h3 class="mt-no text-uppercase">ABOUT ASTA</h3>
            <div class="colored-line bg-main mv-2x"></div>
            <p class="text-nowrap-2x">10 Years OEM Service</p>
          </div>
          <div class="main-box hidden-xs"></div>
        </div>
        <div class="col-md-4 text-left mb-2x pt-4x">
          <a class="btn btn-dark btn-outline r-no" href="<?php echo esc_url( get_permalink( get_page_by_title( 'About ASTA' ) ) ); ?>" role="button">About ASTA<i class="fa fa-arrow-circle-right ml-4x"></i></a>
        </div>
      </div>
    </div>
  </section>
  <!-- /brand -->
  <!-- fun facts -->
  <section id="facts" class="pv-4x">
    <div class="container-fluid">
      <h3 class="text-center text-uppercase">Some Fun Facts</h3>
      <p class="text-center">Fun Facts that you always wanted to know!</p>
      <?php get_template_part( "content/public/funfacts" ) ?>
    </div>
  </section>
  <!-- /fun facts -->
  <!-- join --> 
  <?php get_template_part( "content/public/join" ) ?>
  <!-- /join --> 
</main>
<?php get_footer(); ?>