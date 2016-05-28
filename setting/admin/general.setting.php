<?php
/**
 * General Setting of Yiwell WordPress Theme
 * Description:超级优化 - 常规设置(完结)
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
 * 隐藏核心更新提示 WP 3.0+
 * 来自 http://wordpress.org/plugins/disable-wordpress-core-update/
 */
if (cs_get_admin_option('enable_wp_coreUpdate')==false) { 	
	remove_action( 'load-update-core.php', 'wp_update_core' );// 移除核心更新的加载项
	add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) ); // 关闭核心程序更新提示
	//remove_action('admin_init', '_maybe_update_core');    // 禁止 Wordpress 检查更新
    //add_action( 'admin_init', create_function('$a', "remove_action('admin_init', '_maybe_update_core');"), 3);// 禁止 WordPress 检查更新	
	//add_action( 'wp_version_check', create_function('$a', "remove_action('wp_version_check', 'wp_version_check');"), 3);
	//add_action( 'init', create_function( '$a', "remove_action('init', 'wp_version_check_mod');"), 3); // For WPCNG
}

/**
 * 隐藏主题更新提示 WP 3.0+
 * 来自 http://wordpress.org/plugins/disable-wordpress-theme-updates/
 */
if (cs_get_admin_option('enable_wp_themeUpdate')==false) { 
	remove_action( 'load-update-core.php', 'wp_update_themes' );// 移除主题更新的加载项
	add_filter( 'pre_site_transient_update_themes', create_function( '$c', "return null;" ) );// 关闭主题更新提示
}

/**
 * 隐藏插件更新提示 WP 3.0+
 * 来自 http://wordpress.org/plugins/disable-wordpress-plugin-updates/
 */
if (cs_get_admin_option('enable_wp_pluginUpdate')==false) { 
	remove_action( 'load-update-core.php', 'wp_update_plugins' );// 移除插件更新的加载项
	add_filter( 'pre_site_transient_update_plugins', create_function( '$b', "return null;" ) );// 关闭插件更新提示
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