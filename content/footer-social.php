<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * 数据事实 funfacts
 */ 
if(cs_get_option('company_social')){ 
?>
<ul class="list-inline social-links mv-0x fs-sm">
<?php
    foreach (cs_get_option('company_social') as $key=>$val) {
        echo '<li><a href="'.$val['social_url'].'" title="'.$val['social_title'].'" target="_blank" rel="nofollow" class="'.$val['social_class'].'"><i class="'.$val['social_icon'].'"></i></a></li>';
    }
    unset($val); // 最后取消掉引用
?>
          <li><a href="<?php bloginfo('url'); ?>/feed/" target="_blank" class="color-warning"><i class="fa fa-rss"></i></a></li></ul>	
<?php 
}?>
