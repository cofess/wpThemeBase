<?php 
/**
 * Template Name: 联系我们
 *
**/
get_header(); ?>
<!-- main -->
<main class="main" id="main" role="main">
  <section class="page-head">
    <div class="pattern pattern3">
      <div class="container pv-5x text-center hidden-xs">
        <h1 class="text-uppercase">Contact us</h1>
        <div class="fs-xs">
          <?php if(get_field('headquarters_profile')) {
            echo '<p>'.get_field('headquarters_profile').'</p>';
          }?>
        </div>
      </div>
      <div class="container pv-4x">
        <div class="row">
          <?php if(get_field('headquarters_tel')) {?>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-1x">
            <div class="media">
              <div class="media-left">
                <div class="txt-border r-circle b-black">
                  <div class="txt r-circle bg-no"><i class="fa fa-phone fa-2x"></i></div>
                </div> 
              </div>
              <div class="media-body">
                <h4 class="media-heading">Hotline</h4>
                <p><?php echo get_field('headquarters_tel');?></p>
              </div>
            </div>
          </div>
          <?php }?>
          <?php if(get_field('headquarters_fax')) {?>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-1x">
            <div class="media">
              <div class="media-left">
                <div class="txt-border r-circle b-black">
                  <div class="txt r-circle bg-no"><i class="fa fa-print fa-2x"></i></div>
                </div> 
              </div>
              <div class="media-body">
                <h4 class="media-heading">Fax</h4>
                <p><?php echo get_field('headquarters_fax');?></p>
              </div>
            </div>
          </div>
          <?php }?>
          <?php if(get_field('headquarters_mail')) {?>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-1x">
            <div class="media">
              <div class="media-left">
                <div class="txt-border r-circle b-black">
                  <div class="txt r-circle bg-no"><i class="fa fa-envelope fa-2x"></i></div>
                </div> 
              </div>
              <div class="media-body">
                <h4 class="media-heading">Email</h4>
                <p><a href="mailto:<?php echo get_field('headquarters_mail');?>" class="color-black"><?php echo get_field('headquarters_mail');?></a></p>
              </div>
            </div>
          </div>
          <?php }?>
          <?php if(get_field('headquarters_site')) {?>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-1x">
            <div class="media">
              <div class="media-left">
                <div class="txt-border r-circle b-black">
                  <div class="txt r-circle bg-no"><i class="fa fa-globe fa-2x"></i></div>
                </div> 
              </div>
              <div class="media-body">
                <h4 class="media-heading">Site</h4>
                <p><?php echo get_field('headquarters_site');?></p>
              </div>
            </div>
          </div>
          <?php }?>                    
        </div>
      </div>      
    </div>
    <div class="grid small-grid-full large-grid-fit">
      <?php if(get_field('headquarters_add')) {?>
      <div class="grid-cell bg-main">
        <div class="p-2x text-right text-sm-left">
          <div class="bg-inverse mheight-xs">
            <h3 class="fs">Office Add</h3>
            <p><?php echo get_field('headquarters_add');?></p>
          </div>
          <?php if(get_field('headquarters_map')) {?>
          <p><a class="btn btn-default b-no" href="<?php echo get_field('headquarters_map');?>" target="_blank">View Map<i class="fa fa-arrow-circle-right ml-4x"></i></a></p>
          <?php }?>
        </div>
      </div>
      <?php }?>
      <?php if(get_field('headquarters_factory_add')) {?>
      <div class="grid-cell bg-black">
        <div class="p-2x">
          <div class="bg-inverse mheight-xs">
            <h3 class="fs">Factory Add</h3>
            <p><?php echo get_field('headquarters_factory_add');?></p>
          </div>
          <?php if(get_field('headquarters_factory_map')) {?>
          <p><a class="btn btn-default b-no" href="<?php echo get_field('headquarters_factory_map');?>" target="_blank">View Map<i class="fa fa-arrow-circle-right ml-4x"></i></a></p>
          <?php }?>
        </div>
      </div>
      <?php }?>
    </div>
  </section>
  <section class="page-content pv-3x">
    <div class="container-fluid">
      <h3 class="text-center text-uppercase">Branches</h3>
      <div class="swiper-container dot-static branches mt-4x">        
        <?php $branchs = get_field('branch');
        if($branchs){
          $output='';
          $output.='<div class="swiper-wrapper">';
          foreach($branchs as $branch){
            $output.='<div class="swiper-slide">';
            $output.='<div class="entity bg-white b b-light shadow-hover clearfix">';
            $output.='<div class="entity-header p-1x">';
            if($branch['branch_name']){
              $output.='<h3 class="fs text-nowrap-2x mheight-ss">'.$branch['branch_name'].'</h3>';
              $output.='<div class="colored-line bg-black"></div>';
            }
            $output.='</div>';
            $output.='<div class="entity-body ph-1x mheight-md">';
            $output.='<ul class="list-unstyled lh-md">';
            if($branch['branch_add']){
              $output.='<li class="lh"><i class="fa fa-map-marker fa-fw"></i>Add：'.$branch['branch_add'].'</li>';
            }
            if($branch['branch_tel']){
              $output.='<li><i class="fa fa-phone fa-fw"></i>Tel：'.$branch['branch_tel'].'</li>';
            }
            if($branch['branch_fax']){
              $output.='<li><i class="fa fa-print fa-fw"></i>Fax：'.$branch['branch_fax'].'</li>';
            }
            if($branch['branch_skype']){
              $nickname=($branch['branch_skype_nick'])? $branch['branch_skype_nick'] : $branch['branch_skype'];
              $output.='<li><i class="fa fa-skype fa-fw"></i>Skype：<a href="skype:'.$branch['branch_skype'].'?call">'.$nickname.'</a></li>';
            }
            if($branch['branch_mail']){
              $output.='<li><i class="fa fa-envelope-o fa-fw"></i>E-mail：<a href="mailto:'.$branch['branch_mail'].'">'.$branch['branch_mail'].'</a></li>';
            }
            if($branch['branch_site']){
              $output.='<li><i class="fa fa-link fa-fw"></i>site：<a href="'.$branch['branch_site'].'" target="_blank">'.$branch['branch_site'].'</a></li>';
            }
            $output.='</ul></div></div></div>';       
          } 
          $output.='</div>';      
          $output.='<div class="swiper-pagination swiper-pagination-black"></div>';
          echo $output;
        }?>
      </div>   
    </div>   
  </section>
  <!-- section-contact -->
  <?php if(get_field('contact_form')) {?>
  <section id="section-contact">
    <div class="pv-4x">
      <div class="container-fluid">
        <?php echo do_shortcode(get_field('contact_form'));?>
      </div>
    </div>
  </section>
  <?php }?>
  <!-- /section-contact -->   
</main>
<?php get_footer(); ?>