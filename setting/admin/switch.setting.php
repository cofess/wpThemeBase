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
 * 禁用所有文章类型的修订版本
 * http://my.oschina.net/9iphp/blog/378348
 * http://www.zhiyanblog.com/wordpress-4-x-continuous-posts-id.html
*/
if (cs_get_admin_option('disable_wp_revisions')==true){
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
if (cs_get_admin_option('disable_wp_image_link')==true){
	//add_action('admin_init', 'wpc_imagelink_setup', 10);
	update_option('image_default_link_type', 'none');
} else {
	update_option('image_default_link_type', 'file');
}

/**
 * 添加友情链接功能
 * http://jingyan.baidu.com/article/1e5468f9239311484861b77e.html
*/
if (cs_get_admin_option('enable_friendlyLink_type')==true){
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}

/**
 * WordPress Browse Happy
 * http://browsehappy.com/
 */
if (cs_get_admin_option('enable_wp_browse_happy')==false){
	add_action('admin_init', create_function( '$a', "remove_action('in_admin_footer', 'browse_happy');"));
}

/**
 * 禁用 Emoji 表情
 */
if (cs_get_admin_option('enable_wp_default_emoji')==false) {
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
if (cs_get_admin_option('enable_wp_xmlrpc')==false){
	add_filter( 'xmlrpc_methods', 'remove_xmlrpc_pingback_ping' );//WordPress 关闭 XML-RPC 的 pingback 端口
	remove_action('wp_head','rsd_link');
	remove_action('wp_head','wlwmanifest_link');
	add_filter('xmlrpc_enabled', '__return_false'); 
}