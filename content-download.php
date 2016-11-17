<?php
/**
 * Detailed download output
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
?>
<div class="item col-xs-12 col-sm-6 col-md-4 col-lg-4 mb-2x">
  <div class="entity bg-white b b-light shadow-hover clearfix">
    <div class="entity-header ph-1x pv-2x">
      <h3 class="text-nowrap fs mt-no"> <a href="<?php $dlm_download->the_download_link(); ?>" rel="nofollow" class="text-nowrap" title="<?php $dlm_download->the_title(); ?>">
        <?php $dlm_download->the_title(); ?>
        </a></h3>
      <p class="text-muted">
        <?php if ( $dlm_download->the_short_description() ) {echo mb_substr($dlm_download->the_short_description(),0,60,"utf8").'...';}?>
      </p>
      <p class="text-muted"><span class="mr-1x"><i class="fa fa-file fa-fw"></i>
        <?php if ( $dlm_download->has_version_number() ) {
	printf( __( 'Version %s', 'download-monitor' ), $dlm_download->get_the_version_number() );
} ?>
        </span> <span class="mr-1x"><i class="fa fa-download fa-fw"></i><?php printf( _n( '1 download', '%d downloads', $dlm_download->get_the_download_count(), 'download-monitor' ), $dlm_download->get_the_download_count() ) ?></span> <span class="mr-1x"><i class="fa fa-clock-o fa-fw"></i>
        <?php the_time('Y-m-d'); ?>
        </span> </p>
      <div class="clearfix"></div>
    </div>
    <div class="text-center pv-1x bt b-light"><a href="<?php $dlm_download->the_download_link(); ?>" rel="nofollow" class="text-sm color-orange-900"><span>Download Now</span><i class="fa fa-download ml-0x"></i></a></div>
  </div>
</div>
