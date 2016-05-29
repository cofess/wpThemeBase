<?php
/**
 * Hide Wordpress Setting of Yiwell WordPress Theme
 * Description:超级优化 - wordpress定制，隐藏wordpress信息（完结）
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
 * 移除网站头部的wordpress版本信息
 */
if (cs_get_admin_option('enable_wp_generator')==true) { 
	remove_action( 'wp_head','wp_generator' ); 
}	

/**
 * 移除RSS订阅中wordpress版本信息
 */
if (cs_get_admin_option('enable_wp_rss_version')==true) { 
	add_filter('the_generator', '__return_false');
}

//移除 WordPress 仪表盘欢迎面板
//remove_action('welcome_panel', 'wp_welcome_panel');

/**
 * 去掉仪表盘“概况”下的WordPress版本信息
 * http://www.wpdaxue.com/remove-dash-wordpress-version.html
 */
function remove_dash_wordpress_version(){
  echo '<style type="text/css">
            #wp-version-message {display:none!important}
          </style>';
}
if (cs_get_admin_option('enable_wp_dashboard_version')==true) {
	add_action('admin_head', 'remove_dash_wordpress_version' );
}
 
/**
 * 移除 WordPress 加载的JS和CSS链接中的版本号
 * http://www.wpdaxue.com/remove-js-css-version.html
 */
function remove_code_version( $src ) {
	if( strpos( $src, 'ver='. get_bloginfo( 'version' ) ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
if (cs_get_admin_option('enable_code_version')==true) { 
	add_filter( 'style_loader_src', 'remove_code_version', 999 );
	add_filter( 'script_loader_src', 'remove_code_version', 999 );
}
 
/**
 * Remove the word "Wordpress" from title
 * 删除后台标题title中“wordpress”文字
 */
function remove_admin_title_wordpress($admin_title, $title) {
	return $title .' &lsaquo; '. get_bloginfo('name');
}
if (cs_get_admin_option('enable_wp_title')==true) { 
	add_filter('admin_title', 'remove_admin_title_wordpress', 10, 2);
}

/**
 * Remove admin logo
 * 删除后台左上角wordpress logo
 */
function remove_admin_logo() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}
// Remove logo in admin bar
if (cs_get_admin_option('enable_wp_bar_logo')==true) { 
	add_action('wp_before_admin_bar_render', 'remove_admin_logo');
}

/**
 * Modify footer text LEFT
 * 自定义后台底部文字-left
 */
add_filter('admin_footer_text', 'admin_footer_text_left');
function admin_footer_text_left($text) {
	// 左边信息
	if(cs_get_admin_option('wp_footer_text') == '1' || cs_get_admin_option('custom_wp_footer_text_left') == ''){
		$text = ''; 
	} else {
		$text = '<span id="footer-thankyou">'.cs_get_admin_option('custom_wp_footer_text_left').'</span>'; 
	}
	return $text;
}

/**
 * Modify footer text RIGHT
 * 自定义后台底部文字-right
 */
add_filter('update_footer', 'admin_footer_text_right', 1234);
function admin_footer_text_right($text) {
	// 右边信息
	if(cs_get_admin_option('wp_footer_text') == '1' || cs_get_admin_option('custom_wp_footer_text_right') == ''){
		$text = '';
	} else {
		$text = cs_get_admin_option('custom_wp_footer_text_right');
	}
	return $text;
}

/**
 * 隐藏WordPress后台显示选项链接
 * http://www.solagirl.net/how-to-remove-screen-options-help-tabs.html
 */
if (!current_user_can('manage_options') && cs_get_admin_option('enable_wp_options_show_link')==true) { 
	add_filter('screen_options_show_screen', '__return_false');
}

/**
 * 隐藏WordPress后台帮助链接
 * http://www.solagirl.net/how-to-remove-screen-options-help-tabs.html
 */
function wp_remove_help_link($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}
if (cs_get_admin_option('enable_wp_help_link')==true) { 
	add_filter( 'contextual_help', 'wp_remove_help_link', 999, 3 );
}

/**
 * 隐藏WordPress后台仪表盘菜单链接
 */
if (cs_get_admin_option('enable_wp_dashboard_menu')==false) { 
	require_once SETTING_DIR . '/admin/includes/wp-hide-dashboard.inc.php';
}

/**
 * WordPress 移除插件列表所有“编辑”和“停用”链接
 * http://www.wpdaxue.com/remove-plugin-actions.html
 */
if( ! function_exists( 'remove_plugin_actions' ) ) {
	function remove_plugin_actions( $actions, $plugin_file, $plugin_data, $context ){
    	// 移除所有“编辑”链接
    	if ( isset( $actions['edit'] ) ){
        	unset( $actions['edit'] );
    	}
    	// 移除插件的“停用”链接
    	if( isset( $actions['deactivate'] ) ){
        	unset( $actions['deactivate'] );
    	}
    	return $actions;
	}
}
if (cs_get_admin_option('enable_plugin_actionLinks')==false) { 
	add_filter( 'plugin_action_links', 'remove_plugin_actions', 10, 4 );
}

/**
 * WordPress 禁止切换主题
 * http://www.endskin.com/disable-change-theme.html
*/
if( ! function_exists( 'disable_theme_select' ) ) {
	function disable_theme_select(){
		global $submenu, $userdata;
		get_currentuserinfo();
		//if( $userdata->ID != 1 ) unset( $submenu['themes.php'][5] );
		unset( $submenu['themes.php'][5] );
	}
}
if (!current_user_can('manage_options') && cs_get_admin_option('enable_theme_select')==false) { 
	add_action( 'admin_init', 'disable_theme_select' );
}

/**
 * WordPress 禁止在线编辑主题
 * http://www.wpdaxue.com/prevent-a-user-to-edit-the-theme-file-online.html
*/
if( ! function_exists( 'disable_editor_menu' ) ) {
	function disable_editor_menu() {
  		remove_action('admin_menu', '_add_themes_utility_last', 101);
	} 
}
if (!current_user_can('manage_options') && cs_get_admin_option('enable_theme_editor')==false) { 
    add_action('admin_menu', 'disable_editor_menu', 1);
}