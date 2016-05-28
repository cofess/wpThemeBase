<?php 
/**
 * Main Function of Yiwell WordPress Theme
 *
 * Package:       Yiwell
 * Version:       1.0.0
 * Author:        Lony <841995980@qq.com>
 * Author URI:    http://www.yiwell.com
 * Text Domain:   CS_TEXTDOMAIN
 * License:       http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * Copyright:     Copyright (c) 2014-2016, yiwell
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
 * 加载
 */ 
require_once dirname( __FILE__ ) . '/inc/common/common.admin.php';
require_once dirname( __FILE__ ) . '/inc/common/common.theme.php';

/**
 * 加载类
 */
require_once dirname( __FILE__ ) . '/inc/classes/bootstrap-walker.class.php';//导航菜单
require_once dirname( __FILE__ ) . '/inc/classes/breadcrumb.class.php';//面包屑导航
require_once dirname( __FILE__ ) . '/inc/classes/tgm-plugin-activation.class.php';//安装插件

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
define( 'CS_ACTIVE_ADMIN',      true  ); // 自定义
define( 'CS_ACTIVE_MANAGER',    true  ); // 自定义
define( 'CS_ACTIVE_PLUG',       true  );

/**
 * 初始化
 */
require_once SETTING_DIR . '/init/admin.init.php';//后台初始化  
require_once SETTING_DIR . '/init/theme.init.php';//主题初始化
require_once SETTING_DIR . '/init/plugin.init.php';//插件初始化
require_once SETTING_DIR . '/init/script.init.php';//加载Style和JS
require_once SETTING_DIR . '/init/installplugin.init.php';//加载Style和JS

/**
 * 主题设置
 */
require_once SETTING_DIR . '/framework/search.config.php';//搜索设置
require_once SETTING_DIR . '/framework/appearance.config.php';//外观设置

/**
 * 后台设置
 */
require_once SETTING_DIR . '/admin/general.setting.php';//常规设置  

/**
 * 超级优化 super manager
 */ 
require_once SETTING_DIR . '/manager/senior.setting.php';//高级设置
require_once SETTING_DIR . '/manager/extend.setting.php';//功能拓展
require_once SETTING_DIR . '/manager/flash.setting.php';//网站加速
require_once SETTING_DIR . '/manager/wp-custom.setting.php';//wp定制
require_once SETTING_DIR . '/manager/login.setting.php';//后台登录
require_once SETTING_DIR . '/manager/user.setting.php';//用户管理
require_once SETTING_DIR . '/manager/smtp.setting.php';//邮件设置
require_once SETTING_DIR . '/manager/maintenance.setting.php';//维护
require_once SETTING_DIR . '/manager/rewrite.setting.php';//固定链接
require_once SETTING_DIR . '/manager/browser.setting.php';//浏览器升级提示

/**
 * 小工具
 */
//require_once dirname( __FILE__ ) . '/inc/widgets/widget-icon/widget-icon.php';//小工具图标
//require_once dirname( __FILE__ ) . '/inc/widgets/simple-widget-classes/simple-widget-classes.php';//小工具class类
//require_once dirname( __FILE__ ) . '/inc/widgets/widgets-thisCategory.php';	
 
/**
 * 拓展模块
 */
require_once dirname( __FILE__ ) . '/inc/modules/wp_bootstrap_pagination.php';//分页 
require_once dirname( __FILE__ ) . '/inc/modules/regenerate-thumbnails/regenerate-thumbnails.php';//重建缩略图 
require_once dirname( __FILE__ ) . '/inc/modules/rewrite-rules-inspector.php';//查看网站所有伪静态Rewrite规则

/*刷新固定链接缓存*/
function flush_rules(){
	flush_rewrite_rules();
}
add_action('init','flush_rules');

function ludou_add_categories_tags_to_attachments() {
   register_taxonomy_for_object_type( 'media-category', 'attachment' );

}
add_action( 'init' , 'ludou_add_categories_tags_to_attachments' );