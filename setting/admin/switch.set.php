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

/**
 * 禁止WordPress向站内链接发送PingBack引用通告
 * 参考：http://www.wpdaxue.com/disable-self-ping.html
 */
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) ) unset($links[$l]);
}
if (cs_get_admin_option('enable_self_pingback')==false) {
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
if (cs_get_admin_option('enable_trackbacks')==false) {
  add_filter('xmlrpc_methods', 'disable_trackbacks_step1', 10, 1);
  add_filter('wp_headers', 'disable_trackbacks_step2', 10, 1);
  add_filter('rewrite_rules_array', 'disable_trackbacks_step3');
  add_filter('bloginfo_url', 'disable_trackbacks_step4', 10, 2);
  add_action('xmlrpc_call', 'disable_trackbacks_step5');
}


/**
 * 禁用 WordPress 的 JSON REST API 
 * http://www.wpdaxue.com/disable-json-rest-api-in-wordpress.html
 * http://www.mfbuluo.com/21008.html
 */
if (cs_get_admin_option('enable_json_rest_api')==false) {
  // add_filter('json_enabled', '__return_false');
  // add_filter('json_jsonp_enabled', '__return_false');
  add_filter('rest_enabled', '_return_false');
  add_filter('rest_jsonp_enabled', '_return_false');
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
} 

/**
 * wordpress 4.4禁用embeds功能 移除wp-embed.min.js文件
 * http://www.iztwp.com/article/disable-embeds.html
 */
function disable_embeds_init() {
    /* @var WP $wp */
    global $wp;

    // Remove the embed query var.
    $wp->public_query_vars = array_diff( $wp->public_query_vars, array(
        'embed',
    ) );

    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off
    add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );

    // Remove all embeds rewrite rules.
    add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}
if (cs_get_admin_option('enable_wp_embed')==false) {
  add_action( 'init', 'disable_embeds_init', 9999 );
}

/**
 * Removes the 'wpembed' TinyMCE plugin.
 *
 * @since 1.0.0
 *
 * @param array $plugins List of TinyMCE plugins.
 * @return array The modified list.
 */
function disable_embeds_tiny_mce_plugin( $plugins ) {
    return array_diff( $plugins, array( 'wpembed' ) );
}

/**
 * Remove all rewrite rules related to embeds.
 *
 * @since 1.2.0
 *
 * @param array $rules WordPress rewrite rules.
 * @return array Rewrite rules without embeds rules.
 */
function disable_embeds_rewrites( $rules ) {
    foreach ( $rules as $rule => $rewrite ) {
        if ( false !== strpos( $rewrite, 'embed=true' ) ) {
            unset( $rules[ $rule ] );
        }
    }

    return $rules;
}

/**
 * Remove embeds rewrite rules on plugin activation.
 *
 * @since 1.2.0
 */
function disable_embeds_remove_rewrite_rules() {
    add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'disable_embeds_remove_rewrite_rules' );

/**
 * Flush rewrite rules on plugin deactivation.
 *
 * @since 1.2.0
 */
function disable_embeds_flush_rewrite_rules() {
    remove_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'disable_embeds_flush_rewrite_rules' );