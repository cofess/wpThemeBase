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
if (cs_get_manager_option('enable_wp_coreUpdate')==false) { 	
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
if (cs_get_manager_option('enable_wp_themeUpdate')==false) { 
	remove_action( 'load-update-core.php', 'wp_update_themes' );// 移除主题更新的加载项
	add_filter( 'pre_site_transient_update_themes', create_function( '$c', "return null;" ) );// 关闭主题更新提示
}

/**
 * 隐藏插件更新提示 WP 3.0+
 * 来自 http://wordpress.org/plugins/disable-wordpress-plugin-updates/
 */
if (cs_get_manager_option('enable_wp_pluginUpdate')==false) { 
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
if (cs_get_manager_option('enable_plugin_actionLinks')==false) { 
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
if (!current_user_can('manage_options') && cs_get_manager_option('enable_theme_select')==false) { 
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
if (!current_user_can('manage_options') && cs_get_manager_option('enable_theme_editor')==false) { 
    add_action('admin_menu', 'disable_editor_menu', 1);
}

/**
 * 禁用所有文章类型的修订版本
 * http://my.oschina.net/9iphp/blog/378348
 * http://www.zhiyanblog.com/wordpress-4-x-continuous-posts-id.html
*/
if (cs_get_manager_option('disable_wp_revisions')==true){
	add_filter( 'wp_revisions_to_keep', 'specs_wp_revisions_to_keep', 10, 2 );
	function specs_wp_revisions_to_keep( $num, $post ) {
    	return 0;
	}
}

/**
 * 关闭WordPress的图片默认链接功能
 * http://www.kuqin.com/shuoit/20131118/336381.html
 * http://www.wpdaxue.com/images-auto-link-post.html
 * http://www.wpdaxue.com/image-default-size-align-link-type.html
*/
if (cs_get_manager_option('disable_wp_image_link')==true){
	//add_action('admin_init', 'wpc_imagelink_setup', 10);
	update_option('image_default_link_type', 'none');
} else {
	update_option('image_default_link_type', 'file');
}

/**
 * 添加友情链接功能
 * http://jingyan.baidu.com/article/1e5468f9239311484861b77e.html
*/
if (cs_get_manager_option('enable_friendlyLink_type')==true){
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}

/**
 * WordPress Browse Happy
 * http://browsehappy.com/
 */
if (cs_get_manager_option('enable_wp_browse_happy')==false){
	add_action('admin_init', create_function( '$a', "remove_action('in_admin_footer', 'browse_happy');"));
}

/**
 * 禁用 Emoji 表情
 */
if (cs_get_manager_option('enable_wp_default_emoji')==false) {
	function disable_emojis() {
    	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    	remove_action( 'wp_print_styles', 'print_emoji_styles' );
    	remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}
	add_action( 'init', 'disable_emojis' );
	/**
 	* Filter function used to remove the tinymce emoji plugin.
 	* 
 	* @param    array  $plugins  
 	* @return   array             Difference betwen the two arrays
 	*/
	function disable_emojis_tinymce( $plugins ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	}
}


/**
 * XML-PRC接口，即XML远程方法调用
 * http://www.wopus.org/wordpress-deepin/tech/2358.html
 */
//WordPress 关闭 XML-RPC 的 pingback 端口
function remove_xmlrpc_pingback_ping( $methods ) {
	unset( $methods['pingback.ping'] );
	return $methods;
} 
if (cs_get_manager_option('enable_wp_xmlrpc')==false){
	add_filter( 'xmlrpc_methods', 'remove_xmlrpc_pingback_ping' );//WordPress 关闭 XML-RPC 的 pingback 端口
	remove_action('wp_head','rsd_link');
	remove_action('wp_head','wlwmanifest_link');
	add_filter('xmlrpc_enabled', '__return_false'); 
}