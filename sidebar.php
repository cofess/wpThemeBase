<div class="col-md-12 col-lg-4 col-xl-3 sidebarbg bl b-light hidden-xs hidden-sm hidden-md"></div>
<div class="col-md-12 col-lg-4 col-xl-3 hidden-xs hidden-sm hidden-md">
<div class="ph-1x pv-3x">
  <?php
  wp_reset_query();
  if ( is_category() ){//列表页侧边栏
  	if(is_active_sidebar('category-sidebar')){
		dynamic_sidebar('category-sidebar');
	} else {
      echo '<div class="the_tips">'.__('Please go to "<a target="_blank" href="/wp-admin/widgets.php"> Appearance > Widgets </a>" to set "Primary Widget Area" , Or "<a target="_blank" href="/wp-admin/admin.php?page=panel"> Theme Setting </a>" to Set [Sidebars] option .','CS_TEXTDOMAIN').'</div>';
    }
  } elseif (is_single()) {//文章详情页侧边栏
  	if(is_active_sidebar('single-sidebar')){
		dynamic_sidebar('single-sidebar');
	} else {
      echo '<div class="the_tips">'.__('Please go to "<a target="_blank" href="/wp-admin/widgets.php"> Appearance > Widgets </a>" to set "Primary Widget Area" , Or "<a target="_blank" href="/wp-admin/admin.php?page=panel"> Theme Setting </a>" to Set [Sidebars] option .','CS_TEXTDOMAIN').'</div>';
    }	
  } else {//页面侧边栏
  	if(is_active_sidebar('pages-sidebar')){
		dynamic_sidebar('pages-sidebar');
	} else {
      echo '<div class="the_tips">'.__('Please go to "<a target="_blank" href="/wp-admin/widgets.php"> Appearance > Widgets </a>" to set "Primary Widget Area" , Or "<a target="_blank" href="/wp-admin/admin.php?page=panel"> Theme Setting </a>" to Set [Sidebars] option .','CS_TEXTDOMAIN').'</div>';
    }
  }
  ?>
  </div>
</div>
