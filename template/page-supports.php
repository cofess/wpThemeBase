<?php 
/**
 * Template Name: 技术支持
 *
**/
get_header(); ?>
<!-- main -->
<main class="main" id="main" role="main">
  <section class="page-head">
    <div class="pattern pattern12">
      <div class="container pv-5x text-center hidden-xs">
        <h1 class="text-uppercase"><?php the_title(); ?></h1>
        <div class="fs-xs">
          <p><?php echo strip_tags(cs_get_option('company_adwords'));?></p>
        </div>
      </div>
      <div class="container pv-4x">
        <div class="row">
          <?php if(cs_get_option('company_tel')){?>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-1x">
            <div class="media">
              <div class="media-left">
                <div class="txt-border r-circle b-black">
                  <div class="txt r-circle bg-no"><i class="fa fa-phone fa-2x"></i></div>
                </div> 
              </div>
              <div class="media-body">
                <h4 class="media-heading">Hotline</h4>
                <p><?php echo cs_get_option('company_tel')?></p>
              </div>
            </div>
          </div>
          <?php }?>
          <?php if(cs_get_option('company_fax')){?>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-1x">
            <div class="media">
              <div class="media-left">
                <div class="txt-border r-circle b-black">
                  <div class="txt r-circle bg-no"><i class="fa fa-print fa-2x"></i></div>
                </div> 
              </div>
              <div class="media-body">
                <h4 class="media-heading">Fax</h4>
                <p><?php echo cs_get_option('company_fax')?></p>
              </div>
            </div>
          </div>
          <?php }?>
          <?php if(cs_get_option('company_email')){?>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-1x">
            <div class="media">
              <div class="media-left">
                <div class="txt-border r-circle b-black">
                  <div class="txt r-circle bg-no"><i class="fa fa-envelope fa-2x"></i></div>
                </div> 
              </div>
              <div class="media-body">
                <h4 class="media-heading">Email</h4>
                <p><a href="mailto:<?php echo cs_get_option('company_email')?>" class="color-black"><?php echo cs_get_option('company_email')?></a></p>
              </div>
            </div>
          </div>
          <?php }?>
          <?php if(cs_get_option('company_site')){?>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-1x">
            <div class="media">
              <div class="media-left">
                <div class="txt-border r-circle b-black">
                  <div class="txt r-circle bg-no"><i class="fa fa-globe fa-2x"></i></div>
                </div> 
              </div>
              <div class="media-body">
                <h4 class="media-heading">Site</h4>
                <p><a href="<?php echo cs_get_option('company_site')?>"><?php echo cs_get_option('company_site')?></a></p>
              </div>
            </div>
          </div> 
          <?php }?>                   
        </div>
      </div>      
    </div>
    <!--<div class="grid small-grid-full large-grid-fit">
      <div class="grid-cell bg-main">
        <div class="p-2x text-right text-sm-left">
          <div class="bg-inverse mheight-xs">
            <h3 class="fs">Office Add</h3>
            <p>2nd floor, Block B, Caogen Pioneering Park, Longcheng square metro station exit A , Longgang District, Shenzhen, China.</p>
          </div>
          <p><a class="btn btn-default b-no" href="http://map.baidu.com/" target="_blank">View Map<i class="fa fa-arrow-circle-right ml-4x"></i></a></p>
        </div>
      </div>
      <div class="grid-cell bg-black">
        <div class="p-2x">
          <div class="bg-inverse mheight-xs">
            <h3 class="fs">Factory Add</h3>
            <p>No. 199, Longcheng Avenue, Longhua Town, Boluo County, Huizhou City, Guangdong Province, China</p>
          </div>
          <p><a class="btn btn-default b-no" href="http://map.baidu.com/" target="_blank">View Map<i class="fa fa-arrow-circle-right ml-4x"></i></a></p>
        </div>
      </div>
    </div>-->
  </section>
  <section id="culture">
    <div class="pull-in">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 bg">
          <div class="pv-4x">
            <div class="text-center"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'AFTER-SALE SERVICE' ) ) ); ?>"><span class="icon-lg b r-circle"><i class="fa fa-print fa-2x"></i></span></a></div>
            <div class="mheight-xs text-center">
              <h3 class="text-nowrap text-uppercase">After-sale service</h3>
              <p>All-round customer service</p>
              <p><a class="btn btn-default b-no" href="<?php echo esc_url( get_permalink( get_page_by_title( 'AFTER-SALE SERVICE' ) ) ); ?>" target="_blank">Learn More<i class="fa fa-arrow-circle-right ml-4x"></i></a></p>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 bg-light">
          <div class="pv-4x">
            <div class="text-center"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'FAQ' ) ) ); ?>"><span class="icon-lg b r-circle"><i class="fa fa-question fa-2x"></i></span></a></div>
            <div class="mheight-xs text-center">
              <h3 class="text-nowrap text-uppercase">FAQ</h3>
              <p>Common problems and solutions to the problem</p>
              <p><a class="btn btn-default b-no" href="<?php echo esc_url( get_permalink( get_page_by_title( 'FAQ' ) ) ); ?>" target="_blank">Learn More<i class="fa fa-arrow-circle-right ml-4x"></i></a></p>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 bg-grey">
          <div class="pv-4x">
            <div class="text-center"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Downloads' ) ) ); ?>"><span class="icon-lg b r-circle"><i class="fa fa-cloud-download fa-2x"></i></span></a></div>
            <div class="mheight-xs text-center">
              <h3 class="text-nowrap text-uppercase">downloads</h3>
              <p>Technical documents and files download</p>
              <p><a class="btn btn-default b-no" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Downloads' ) ) ); ?>" target="_blank">Learn More<i class="fa fa-arrow-circle-right ml-4x"></i></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </section> 
</main>
<?php get_footer(); ?>