<?php 
/**
 * Template Name: 代理申请
 *
**/
get_header(); ?>
<!-- main -->
<main class="main" id="main" role="main">
  <section class="page-head relative">
    <div class="pattern pattern2 mheight-sl">
      <div class="container pv-5x text-center">
        <h1 class="color-main">ASTA GLOBAL AGENT WANTED</h1>
        <div class="fs-xs">
          <p>We sincerely invite you to be one of members in ASTA Family. </p>
          <p>Getting together to fight for our success.Let business booming worldwide!</p>
          <p>ASTA will be your best partner.</p>
        </div>
        <p class="mt-5x">
          <a class="btn bg-sub bg-inverse b-no hidden-xs" href="<?php echo esc_url( get_permalink( get_page_by_title( 'About ASTA' ) ) ); ?>" role="button">About ASTA<i class="fa fa-arrow-circle-right ml-4x"></i></a>
          <a class="btn bg-main bg-inverse b-no" href="#section-join" role="button">Apply Now<i class="fa fa-arrow-circle-right ml-4x"></i></a>
        </p>
      </div>
    </div>
    <!--<div class="wave hidden-xs">
      <div id="banner_bolang_bg_1" class="setactive"></div>
      <div id="banner_bolang_bg_2" class="setactive"></div>
    </div>-->
  </section>
  <!-- OUR ADVANTAGES -->
  <section id="section-advantages">
    <div class="pv-4x">
      <div class="container-fluid">
        <h3 class="text-center text-uppercase mb-4x">Agent Advantages</h3>
        <!--<p class="text-muted text-center mb-4x"><?php echo strip_tags(cs_get_option('company_adwords'));?></p>-->
        <?php get_template_part( "content/public/advantages" ) ?>
      </div>
    </div>
  </section>
  <!-- /OUR ADVANTAGES -->   
  <!-- Special support -->
  <section id="section-support">
    <div class="bg-black pattern pattern6 bg-inverse pv-4x">
      <div class="container-fluid">
        <h3 class="text-center text-uppercase mb-4x">Agent Supports</h3>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 text-center mt-2x ring-hover">
            <div class="item-opacity mheight-sm p-1x"> <i class="fa-2x">01</i>
              <p>Internet Marketing Promotion Support</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 text-center mt-2x ring-hover">
            <div class="item-opacity mheight-sm p-1x"> <i class="fa-2x">02</i>
              <p>New Product Development Support</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 text-center mt-2x ring-hover">
            <div class="item-opacity mheight-sm p-1x"> <i class="fa-2x">03</i>
              <p>Priority Free Sample Support</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 text-center mt-2x ring-hover">
            <div class="item-opacity mheight-sm p-1x"> <i class="fa-2x">04</i>
              <p>Professional Agent Salesman Service</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 text-center mt-2x ring-hover">
            <div class="item-opacity mheight-sm p-1x"> <i class="fa-2x">05</i>
              <p>Promotional Brand Gifts Support</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 text-center mt-2x ring-hover">
            <div class="item-opacity mheight-sm p-1x"> <i class="fa-2x">06</i>
              <p>Regional Customer Resource Support</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 text-center mt-2x ring-hover">
            <div class="item-opacity mheight-sm p-1x"> <i class="fa-2x">07</i>
              <p>Full Brand Toner & Copier Cartridge Model Support</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 text-center mt-2x ring-hover">
            <div class="item-opacity mheight-sm p-1x"> <i class="fa-2x">08</i>
              <p>Professional Foreign Engineer Technology & After Sales Support</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Special support -->
  <!-- Joining condition -->
  <section id="section-condition">
    <div class="pv-4x hidden-xs hidden-sm">
      <div class="container">
        <h3 class="text-center text-uppercase mb-4x">Agent Condition</h3>
        <div class="row">
          <div class="col-xs-12 col-md-6 mt-2x">
            <div class="media">
              <div class="media-left"><span class="mr-2x color-main"><i class="fa-4x">1</i></span></div>
              <div class="media-body">
                <p class="mt-2x fs-xs">The ASTA corporate culture, business philosophy and development strategy can be recognized.</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6 mt-2x">
            <div class="media">
              <div class="media-left"><span class="mr-2x color-main"><i class="fa-4x">2</i></span></div>
              <div class="media-body">
                <p class="mt-2x fs-xs">A registered company in the local area and equipped with basic business configuration.</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6 mt-2x">
            <div class="media">
              <div class="media-left"><span class="mr-2x color-main"><i class="fa-4x">3</i></span></div>
              <div class="media-body">
                <p class="mt-2x fs-xs">Relatively stable customer resources and sustainable development of buesiness.</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6 mt-2x">
            <div class="media">
              <div class="media-left"><span class="mr-2x color-main"><i class="fa-4x">4</i></span></div>
              <div class="media-body">
                <p class="mt-2x fs-xs">Stronger Market operation ability of the local area with good reputation.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Joining condition -->
  <!-- Joining process -->
  <section id="section-process" class="hidden-xs">
    <div class="bg pt-4x">
      <div class="container-fluid">
        <h3 class="text-center text-uppercase mb-4x">Agent Process</h3>
        <div class="row">
          <div class="process-grids text-center wow bounce" data-wow-delay="0.4s">
            <div class="col-sm-6 col-md-3 process-grid process-grid1 bg-inverse wow bounceInUp" data-wow-delay="0.4s"> <span class="p-icon1"><i class="fa fa-edit fa-3x"></i></span>
              <h4>Apply</h4>
            </div>
            <div class="col-sm-6 col-md-3 process-grid process-grid2 bg-inverse wow bounceInDown" data-wow-delay="0.4s"> <span class="p-icon2"><i class="fa fa-comments fa-3x"></i></span>
              <h4>Communicate</h4>
            </div>
            <div class="col-sm-6 col-md-3 process-grid process-grid3 bg-inverse wow bounceInUp" data-wow-delay="0.4s"> <span class="p-icon3"><i class="fa fa-clock-o fa-3x"></i></span>
              <h4>Verify</h4>
            </div>
            <div class="col-sm-6 col-md-3 process-grid process-grid4 bg-inverse wow bounceInDown" data-wow-delay="0.4s"> <span class="p-icon4"><i class="fa fa-check fa-3x"></i></span>
              <h4>Success</h4>
            </div>
            <div class="clearfix"> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Joining process -->
  <!-- Online application -->
  <?php if(get_field('agent_form')) {?>
  <section id="section-join">
    <div class="pv-4x">
      <div class="container-fluid">
        <?php echo do_shortcode(get_field('agent_form'));?>
      </div>
    </div>
  </section>
  <?php }?>
  <!-- /Online application -->      
</main>
<?php get_footer(); ?>