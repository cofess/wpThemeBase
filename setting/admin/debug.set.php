<?php
/**
 * User Setting of Yiwell WordPress Theme
 * Description:超级优化 - 用户管理（完结）
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
 * 显示页面查询次数、加载时间和内存占用
 * http://www.wpdaxue.com/wordpress-queries-time-memory.html
*/
function performance( $visible = false ) {
	$stat = sprintf(  '%d queries in %.3f seconds, using %.2fMB memory',
		get_num_queries(),
		timer_stop( 0, 3 ),
		memory_get_peak_usage() / 1024 / 1024
	);
	echo $visible ? $stat : "<!-- {$stat} -->" ;
}
if (cs_get_admin_option('enable_show_performance')==true){
	add_action( 'wp_footer', 'performance', 20 );
}

/**
 * 用户切换
 * https://wordpress.org/plugins/user-switching/
*/
if (cs_get_admin_option('enable_user_switch')==true){
	require_once SETTING_DIR . '/admin/includes/user-switching.inc.php';
}