<?php 
/**
 * Appearance Config of Yiwell WordPress Theme
 * Description:主题设置 - 外观
 *
 * @package   Yiwell
 * @version   1.0.0
 * @date      2015.12.5
 * @author    Lony <841995980@qq.com>
 * @site      yiwell <www.yiwell.com>
 * @copyright Copyright (c) 2014-2015, yiwell
 * @license   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link      http://www.yiwell.com
**/

/* Cannot access pages directly  */ 
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
 * 网站整体变灰
 * 参考：http://jingyan.baidu.com/article/4ae03de33d34aa3eff9e6b92.html
 */ 
function site_gray(){
	echo '<style>html{overflow-y:scroll;filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(100%);}</style>';
} 
if (cs_get_option('enable_site_gray')==true) {  
	add_action('wp_head', 'site_gray' );
}

/**
 * 网站整体变灰
 * 参考：http://jingyan.baidu.com/article/4ae03de33d34aa3eff9e6b92.html
 */ 
function custom_meta(){
	echo cs_get_option('custom_meta');
} 
if (cs_get_option('custom_meta')!='') {  
	add_action('wp_meta', 'custom_meta' );
}