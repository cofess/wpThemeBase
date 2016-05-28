<?php
/**
 * Search Config of Yiwell WordPress Theme
 * Description:主题设置 - 搜索
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
 * 搜索结果排除所有页面
 * 参考：http://www.wpdaxue.com/wordpress-search-filter.html
 */ 
function search_filter_page($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}
if (cs_get_option('enable_search_exclude_allpage')==true) {
	add_filter('pre_get_posts','search_filter_page');
}