<?php 
/**
 * Main Function of Yiwell WordPress Theme
 *
 * @package   Yiwell
 * @version   1.0.0
 * @author    Lony <841995980@qq.com>
 * @copyright Copyright (c) 2014-2016, yiwell
 * @license   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link      http://www.yiwell.com
**/
 
/* File Security Check */ 
if ( ! defined( 'ABSPATH' ) ) { die; } 
 
/* Sets the path to the parent theme directory. */
if ( !defined( 'THEME_DIR' ) ) {
	define( 'THEME_DIR', get_template_directory() );
}

/* Sets the path to the parent theme directory URI. */
if ( !defined( 'THEME_URI' ) ) {
	define( 'THEME_URI', get_template_directory_uri() );
}

/* 设置主题设置目录 */
if ( !defined( 'SETTING_DIR' ) ) {
	define( 'SETTING_DIR', THEME_DIR.'/setting');
}

/* 设置主题自带插件目录 */
if ( !defined( 'PLUGIN_DIR' ) ) {
	define( 'PLUGIN_DIR', THEME_DIR.'/plugin');
}

/**
 * 加载语言包
 */ 
add_action('after_setup_theme', 'load_theme_lang');
function load_theme_lang(){
    load_theme_textdomain( 'CS_TEXTDOMAIN', THEME_DIR . '/languages' );// 加载语言包
} 

/**
 * Codestar Framework v1.0.0初始化
 * github：https://github.com/Codestar/codestar-framework
 * site：http://codestarframework.com/
 */
require_once dirname( __FILE__ ) . '/framework/cs-framework.php';
define( 'CS_ACTIVE_FRAMEWORK',  true  ); // 主题设置
define( 'CS_ACTIVE_METABOX',    false ); // metabox
define( 'CS_ACTIVE_TAXONOMY',   false ); // 分类
define( 'CS_ACTIVE_SHORTCODE',  false ); // shortcode
define( 'CS_ACTIVE_CUSTOMIZE',  false ); // 外观自定义