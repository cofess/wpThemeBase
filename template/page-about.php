<?php 
/**
 * Template Name: 关于我们
 *
**/
get_header(); ?>
<!-- main -->
<main class="main" id="main" role="main">
  <section class="page-head relative hidden-xs">
    <div class="pattern pattern7 mheight-sl">
      <div class="container pv-5x text-center">
        <h1 class="color-main">ASTA</h1>
        <h3 class="fs-xs">Manufacturer with the widest range of <em class="color-main">Laser Printer & Copier</em> consumables in China</h3>
        <h3 class="fs-xs">Set up a good example for Chinese <em class="color-sub">Laser Consumables Suppliers</em></h3>
        <p class="mt-5x">
          <a class="btn bg-sub bg-inverse b-no" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact ASTA' ) ) ); ?>" role="button">Contact ASTA<i class="fa fa-arrow-circle-right ml-4x"></i></a>
          <?php if(cs_get_option('company_video')){?>
          <button class="btn bg-main bg-inverse b-no" data-toggle="modal" data-target="#myModal">Company Video<i class="fa fa-play-circle ml-4x"></i></button>
          <?php }?>
        </p>
      </div>
    </div>
    <div class="wave hidden-xs">
      <div id="banner_bolang_bg_1" class="setactive"></div>
      <div id="banner_bolang_bg_2" class="setactive"></div>
    </div>
  </section>
  <!-- profile -->
  <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
  <section id="profile" class="pv-4x">
    <div class="container">
      <h3 class="text-center text-uppercase">Who We Are</h3>
      <p class="text-muted text-center">Manufacturer with the widest range of Laser Printer & Copier consumables in China</p>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="text-center mv-3x"><img src="<?php echo get_template_directory_uri()?>/assets/images/toner.png"></div>
          <div class="lh">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endwhile; endif; ?>
  <!-- /profile -->
  <section class="bg-main" id="culture">
    <div class="pull-in">
      <div class="row">
        <div class="col-sm-12 col-md-8">
          <div class="row">
          <div class="iconBox col-sm-6 col-md-6 bg text-center pv-0x"> 
            <i class="fa fa-road"></i>
            <div class="mheight-xs text-center">
              <h3 class="text-nowrap text-uppercase"><?php echo get_field('tenet');?></h3>
              <p><?php echo get_field('tenet_desc');?></p>
            </div>
          </div>
          <div class="iconBox col-sm-6 col-md-6 bg-light text-center pv-0x"> 
            <i class="fa fa-paper-plane"></i>
            <div class="mheight-xs text-center">
              <h3 class="text-nowrap text-uppercase"><?php echo get_field('mission');?></h3>
              <p><?php echo get_field('mission_desc');?></p>
            </div>
          </div>
          </div>
          <div class="row">
          <div class="iconBox col-sm-6 col-md-6 bg pull-right pull-xs-no text-center pv-0x"> 
            <i class="fa fa-puzzle-piece"></i>
            <div class="mheight-xs text-center">
              <h3 class="text-nowrap text-uppercase"><?php echo get_field('vision');?></h3>
              <p><?php echo get_field('vision_desc');?></p>
            </div>
          </div>
          <div class="iconBox col-sm-6 col-md-6 bg-light text-center pv-0x"> 
            <i class="fa fa-group"></i>
            <div class="mheight-xs text-center">
              <h3 class="text-nowrap text-uppercase"><?php echo get_field('talent');?></h3>
              <p><?php echo get_field('talent_desc');?></p>
            </div>
          </div>
          </div>
        </div>
        <div class="iconBox col-sm-12 col-md-4 bg-inverse text-center pv-5x hidden-xs hidden-sm">
          <i class="fa fa-lightbulb-o"></i>
          <div class="mheight-xs text-center">
              <h3 class="text-nowrap text-uppercase"><?php echo get_field('team');?></h3>
              <p><?php echo get_field('team_desc');?></p>
            </div>
        </div>
      </div>
    </div>
  </section>   
  <!-- history -->
  <?php if(get_field('history')){;?>
  <section id="history" class="pv-4x hidden-xs">
    <div class="container-fluid">
      <h3 class="text-center text-uppercase">development history</h3>
      <p class="text-muted text-center mb-3x">One line, one dream. Setting up a good sample for China Laser consumable suppliers. </p>
      <div class="timeline">
        <article class="timeline-item active">
          <div class="timeline-caption">
            <div class="panel b-no shadow-no">
              <div class="b b-light r-circle ring-hover"><img src="<?php echo get_template_directory_uri()?>/assets/images/asta-logo-square.png" class="thumb-md p-1x"></div>
            </div>
          </div>
        </article>
        <?php $histories = get_field('history');
        $i=1;
        $class="";
        $arrow="";
        foreach($histories as $history){
          if(($i%2)==1){
            $class="";
            $arrow="left";
          } else{
            $class="alt";
            $arrow="right";
          }     
        ?>
        <article class="timeline-item <?php echo $class;?>">
          <div class="timeline-caption">
            <div class="panel b-light">
              <div class="panel-body"> <span class="arrow <?php echo $arrow;?>"></span> <span class="timeline-icon"><i class="fa fa-clock-o time-icon bg-light"></i></span> <span class="timeline-date"><?php echo $history['time'];?></span>
                <div class="text-sm"><?php echo $history['event'];?></div>
              </div>
            </div>
          </div>
        </article>
        <?php $i++;}?>
        <div class="timeline-footer"><a><i class="fa fa-ellipsis-h time-icon bg-light text-muted"></i></a></div>
      </div>
    </div>
  </section>
  <?php }?>
  <!-- /history -->
  <!-- brand -->
  <section id="brand">
    <div class="pattern pattern9 mheight-xl">
      <div class="container-fluid relative text-center pt-4x">
        <h3 class="text-uppercase color-main mb-3x">More Then 10 Years</h3>
        <p class="fs-sm">Serious at what we do .</p>
        <p>Focus on Top-quality and one-stop solution for compatible toner cartridge and copier toner .</p>
        <img src="<?php echo get_template_directory_uri()?>/assets/images/brand.png" class="img-brand">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/child.png" class="img-child hidden-xs">
      </div>
    </div>
    <div class="container-fluid hidden-xs">
      <div class="row">
        <div class="col-sm-6 col-md-4 text-right text-xs-left mb-2x pt-4x">
          <p class="mheight-xs">Dedicated to providing our worldwide business partners an one-stop solution for their printing businesses for more than 10 years.</p>
          <a class="btn btn-dark btn-outline r-no" href="contact.html" role="button">Contact ASTA<i class="fa fa-arrow-circle-right ml-5x"></i></a>
        </div>
        <div class="col-md-4 text-center relative pv-4x hidden-sm">
          <div class="ph-3x relative z1">
            <h3 class="mt-no text-uppercase">ASTA Brand</h3>
            <div class="colored-line bg-main mv-2x"></div>
            <p class="text-nowrap-2x">ONE LINE ONE DREAM</p>
          </div>
          <div class="main-box hidden-xs"></div>
        </div>
        <div class="col-sm-6 col-md-4 text-left mb-2x pt-4x">
          <p class="mheight-xs">Released more than 16 brands 2000 models. ASTA beating more than 99.5% competitors of printing and copier consumables suppliers.</p>
          <a class="btn btn-dark btn-outline r-no" href="products.html" role="button">All Products<i class="fa fa-arrow-circle-right ml-4x"></i></a>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <?php get_template_part( "content/public/funfacts" ) ?>
    </div>
  </section>
  <!-- /brand -->
  <!-- honors -->
  <section id="honors" class="bg pt-4x">
    <div class="container-fluid">
      <h3 class="text-center text-uppercase">Our Honors</h3>
      <p class="text-muted text-center">To help tackling the global problem of finite energy resources, ASTA will strive to realize the infinite possibilities in energy saving technology.</p>
      <div class="swiper-container slide6 mt-3x">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri()?>/assets/images/certifications/iso_web.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri()?>/assets/images/certifications/BVI_web.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri()?>/assets/images/certifications/CE-BK Toner Cartridge_web.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri()?>/assets/images/certifications/CE-Color Toner Cartridge_web.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri()?>/assets/images/certifications/ISO9001_web.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri()?>/assets/images/certifications/ISO14001_web.jpg" class="swiper-lazy w-full">
            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
          </div>
          <div class="swiper-slide">
            <img data-src="<?php echo get_template_directory_uri()?>/assets/images/certifications/stmc_certification_web.jpg" class="swiper-lazy w-full">
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
  <!-- /honors -->
  <!-- join --> 
  <?php get_template_part( "content/public/join" ) ?>
  <!-- /join --> 
</main>
<!-- Modal -->
<?php if(cs_get_option('company_video')){?>
<div class="modal fade modal-alpha" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <iframe width="560" height="315" src="<?php echo cs_get_option('company_video');?>" frameborder="0" allowfullscreen></iframe> 
      </div>
    </div>
  </div>
</div>
<?php }?>
<!-- footer -->
<?php get_footer(); ?>