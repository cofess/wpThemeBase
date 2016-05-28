<?php
/**
 * Senior Setting of Yiwell WordPress Theme
 * Description:超级优化 - 高级设置（完结）
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

/*
Plugin Name: 增强 WordPress 用户搜索
Plugin URI: http://blog.wpjam.com/m/enhance-wordpress-user-query/
Description: WordPress 技巧：增强 WordPress 用户搜索
Version: 0.1
Author: Denis
Author URI: http://blog.wpjam.com/
*/
if (cs_get_manager_option('enable_enhance_user_query')==true) { 	
	add_action( 'pre_user_query', 'wpjam_enhance_user_query', 9 );
}
function wpjam_enhance_user_query($query){
	
    if(!empty($query->query_vars['search'])){
        global $wpdb;
        $keyword = $query->query_vars['search'];
        $keyword = str_replace('*','',$keyword);
        $query->query_where = $wpdb->prepare(" WHERE 1=1 AND (user_login LIKE %s OR user_email LIKE %s OR user_nicename LIKE %s OR display_name LIKE %s OR UM.meta_value LIKE  %s) AND UM.meta_key='nickname'","%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%","%".$keyword."%");
        $query->query_fields .= " ,$wpdb->users.display_name, UM.meta_value as nickname";
        $query->query_from .= " left join $wpdb->usermeta UM on ($wpdb->users.ID=UM.user_id) ";
    }
} 
 
/**
 * 去掉页面头部的后台导航（管理员工具条）
 * 来自 http://shanmao.me/web-system/wordpress/wordpress-qu-diao-ye-mian-tou-bu-de-hou-tai-dao-hang
 */
if (cs_get_manager_option('enable_adminBar')==false) { 	
	add_filter('show_admin_bar', '__return_false');
}

/**
 * WP前台顶部清理,删除 wp_head 中无关紧要的代码
 * 来自 http://www.wpdaxue.com/speed-up-wordpress.html
 */
if (cs_get_manager_option('enable_header_clean')==true) { 
	function wp_header_clean_up(){
    	if (!is_admin()) {
        	foreach(array('index_rel_link','start_post_rel_link') as $clean){remove_action('wp_head',$clean);}
        	remove_action( 'wp_head', 'feed_links_extra', 3 );
        	remove_action( 'wp_head', 'feed_links', 2 );
        	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
        	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
        	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
        	foreach(array('single_post_title','bloginfo','wp_title','category_description','list_cats','comment_author','comment_text','the_title','the_content','the_excerpt') as $where){
         		remove_filter ($where, 'wptexturize');
       	 	}
        	/*remove_filter( 'the_content', 'wpautop' );
        	remove_filter( 'the_excerpt', 'wpautop' );*/
        	wp_deregister_script( 'l10n' );
    	}
	}
}

/**
 * 移除 WordPress 菜单输出的多余的CSS选择器id或class
 * 来自 http://www.wpdaxue.com/remove-wordpress-nav-classes.html
 */
if (cs_get_manager_option('enable_menu_css_excess')==true) {
	add_filter('nav_menu_css_class', 'optimizer_css_attributes_filter', 100, 1);
	add_filter('nav_menu_item_id', 'optimizer_css_attributes_filter', 100, 1);
	add_filter('page_css_class', 'optimizer_css_attributes_filter', 100, 1);
	function optimizer_css_attributes_filter($var) {
		return is_array($var) ? array_intersect($var, array('current-menu-item','current-post-ancestor','current-menu-ancestor','current-menu-parent')) : '';
	}
}

/**
 * WordPress后台的文章、分类，媒体，页面，评论,链接等所有信息中显示ID并将ID设置为第一列
 * 参考：http://www.cnblogs.com/huangtailang/p/4228913.html
 */
// 添加一个新的列 ID
function ssid_column($columns) {
    
    //将ID设置为第一列
    return array_merge(array('ssid' => 'ID'), $columns);
}
 
// 显示 ID
function ssid_value($column_name, $id) {
    if ($column_name == 'ssid')
        echo $id;
}
 
function ssid_return_value($value, $column_name, $id) {
    if ($column_name == 'ssid')
        $value = $id;
    return $value;
}
function ssid_css() {
    echo "<style>.column-ssid,#ssid{width: 50px!important;text-align: center!important;}</style>";
}
 
// 通过动作/过滤器输出各种表格和CSS
function ssid_add() {
    add_action('admin_head', 'ssid_css');
 
    //文章
    add_filter('manage_posts_columns', 'ssid_column');
    add_action('manage_posts_custom_column', 'ssid_value', 10, 2);
    // 页面
    add_filter('manage_pages_columns', 'ssid_column');
    add_action('manage_pages_custom_column', 'ssid_value', 10, 2);
 
    // 媒体
    add_filter('manage_media_columns', 'ssid_column');
    add_action('manage_media_custom_column', 'ssid_value', 10, 2);
 
    // 连接
    add_filter('manage_link-manager_columns', 'ssid_column');
    add_action('manage_link_custom_column', 'ssid_value', 10, 2);
 
    // 连接分类
    add_action('manage_edit-link-categories_columns', 'ssid_column');
    add_filter('manage_link_categories_custom_column', 'ssid_return_value', 10, 3);
 
    foreach ( get_taxonomies() as $taxonomy ) {
        add_action("manage_edit-${taxonomy}_columns", 'ssid_column');            
        add_filter("manage_${taxonomy}_custom_column", 'ssid_return_value', 10, 3);
    }
 
    // 用户
    add_action('manage_users_columns', 'ssid_column');
    add_filter('manage_users_custom_column', 'ssid_return_value', 10, 3);
    // 评论
    add_action('manage_edit-comments_columns', 'ssid_column');
    add_action('manage_comments_custom_column', 'ssid_value', 10, 2);
} 

if (cs_get_manager_option('enable_show_ids')==true) {
	add_action('admin_init', 'ssid_add');
}

/**
 * 不使用插件实现对Wordpress默认编辑器的增强
 * 参考：http://www.vsay.cn/no-plug-in-to-enhance-wordpress-default-editor.html
 */ 
function addEditor_btn($btnEditor) {   
//下面每一行代码都代表着一个功能按钮   
//而后面的值就是wordpress内建的一些编辑功能   
//您可以修改值里引号中的值（请参考文章后面的所有key）   
//您也可以任意增加按钮和删除按钮   
//方法就是删除下面的行或者复制出一行出来   
$btnEditor[] = 'fontselect';   
$btnEditor[] = 'fontsizeselect';   
$btnEditor[] = 'cleanup';   
$btnEditor[] = 'styleselect';   
$btnEditor[] = 'hr';   
$btnEditor[] = 'del';   
$btnEditor[] = 'sub';   
$btnEditor[] = 'sup';   
$btnEditor[] = 'copy';   
$btnEditor[] = 'paste';   
$btnEditor[] = 'cut';   
$btnEditor[] = 'undo';   
$btnEditor[] = 'image';   
$btnEditor[] = 'anchor';   
$btnEditor[] = 'backcolor';   
$btnEditor[] = 'wp_page';   
$btnEditor[] = 'charmap';   
return $btnEditor;   
}   
if (cs_get_manager_option('enable_editor_extend')==true) {
	add_filter("mce_buttons_3", "addEditor_btn");
}

/**
 * 禁止WordPress向站内链接发送PingBack引用通告
 * 参考：http://www.wpdaxue.com/disable-self-ping.html
 */
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) ) unset($links[$l]);
}
if (cs_get_manager_option('enable_self_pingback')==false) {
	add_action( 'pre_ping', 'no_self_ping' );
}

/**
 * 关闭pingback和trackback
 * 参考：http://www.wfuyu.com/wordpress/609.html
 */
// Remove pingback method
function disable_trackbacks_step1($method) {
	unset($method['pingback.ping']);
	return $method;
}

// Remove header
function disable_trackbacks_step2($headers) {
	if(isset($headers['X-Pingback'])) {
		unset($headers['X-Pingback']);
	}
	return $headers;
}

// Remove trackback rewrite
function disable_trackbacks_step3($rules) {
	foreach($rules as $rule => $rewrite) {
		if(preg_match('/trackback\/\?\$$/i', $rule)) {
			unset($rules[$rule]);
		}
	}
	return $rules;
}

// Remove bloginfo(pingback_url)
function disable_trackbacks_step4($output, $show) {
	if($show == 'pingback_url') {
		$output = '';
	}
	return $output;
}

// Disable XMLRPC
function disable_trackbacks_step5($action) {
	if($action == 'pingback.ping') {
		wp_die('Pingbacks are not supported', 'Not Allowed!', array('response' => 403));
	}
} 
if (cs_get_manager_option('enable_trackbacks')==false) {
	add_filter('xmlrpc_methods', 'disable_trackbacks_step1', 10, 1);
	add_filter('wp_headers', 'disable_trackbacks_step2', 10, 1);
	add_filter('rewrite_rules_array', 'disable_trackbacks_step3');
	add_filter('bloginfo_url', 'disable_trackbacks_step4', 10, 2);
	add_action('xmlrpc_call', 'disable_trackbacks_step5');
}


/**
 * 禁用 WordPress 的 JSON REST API 
 * http://www.wpdaxue.com/disable-json-rest-api-in-wordpress.html
 */
if (cs_get_manager_option('enable_json_rest_api')==false) {
	add_filter('json_enabled', '__return_false');
	add_filter('json_jsonp_enabled', '__return_false');
} 