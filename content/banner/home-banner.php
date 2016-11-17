<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * 焦点图 banner
 */
if(!wp_is_mobile() && cs_get_option('enable_home_banner') && cs_get_option('home_banner')){ 
?>
  <div class="swiper-container banner">
    <div class="swiper-wrapper">
      <?php foreach (cs_get_option('home_banner') as $key=>$val) {
        if($val['home_banner_url']){
          echo '<div class="swiper-slide"><a href="'.$val['home_banner_url'].'"><img data-src="'.$val['home_banner_image'].'"  alt="'.$val['home_banner_title'].'" class="swiper-lazy img-responsive"></a><div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div></div>';
        } else{
          echo '<div class="swiper-slide"><img data-src="'.$val['home_banner_image'].'"  alt="'.$val['home_banner_title'].'" class="swiper-lazy img-responsive"><div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div></div>';
        }}?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination banner-pagination swiper-pagination-black"></div>
    <!-- Navigation -->
    <div class="swiper-button-next banner-button-next swiper-button-black"></div>
    <div class="swiper-button-prev banner-button-prev swiper-button-black"></div>
  </div>
<?php }  