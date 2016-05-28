<?php
/**
 * Install Plugin Init of Yiwell WordPress Theme
 * Description:初始化 - 插件安装初始化
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

/* 必备与推荐插件安装提醒 */
function tin_register_required_plugins() {
	$plugins = array(
		// netease-music
		array(
			'name' => '网易云音乐插件',
			'slug' => 'netease-music',
			'source' => '/netease-music.zip',
			'required' => false,
			'version' => '1.4.0',
			'force_activation' => false,
			'force_deactivation' => false
		),

	);
	$config = array(
		'domain'       		=> 'CS_TEXTDOMAIN',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> THEME_DIR .'/plugins',                         	// Default absolute path to pre-packaged plugins
		//'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		//'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'tin_register_required_plugins' );