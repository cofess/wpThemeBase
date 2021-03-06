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

/* 设置主题设置目录 （物理路径）*/
if ( !defined( 'SETTING_DIR' ) ) {
	define( 'SETTING_DIR', THEME_DIR.'/setting');
}

/* 设置主题设置目录 （物理路径）*/
if ( !defined( 'SETTING_URI' ) ) {
	define( 'SETTING_URI', THEME_URI.'/setting');
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
 * 加载网站核心文件
 */
require_once dirname( __FILE__ ) . '/inc/core/adminextend.core.php'; 
require_once dirname( __FILE__ ) . '/inc/core/wp_nav_menu_filter.core.php';//获取指定菜单的子菜单
require_once dirname( __FILE__ ) . '/inc/core/currentMenu.core.php';//获取当前菜单名称
//require_once dirname( __FILE__ ) . '/inc/core/function.core.php';//基础功能拓展
//require_once dirname( __FILE__ ) . '/inc/core/seo-category.core.php';//基础功能拓

/**
 * 自定义文章类型
 */
//require_once dirname( __FILE__ ) . '/inc/post-type/bulletin/init.php';//公告
//require_once dirname( __FILE__ ) . '/inc/post-type/portfolio/init.php';//作品 
require_once dirname( __FILE__ ) . '/inc/post-type/faq/init.php';//常见问题

/**
 * Codestar Framework v1.0.0初始化
 * github：https://github.com/Codestar/codestar-framework
 * site：http://codestarframework.com/
 */
require_once dirname( __FILE__ ) . '/framework/cs-framework.php';
define( 'CS_ACTIVE_FRAMEWORK',  true  ); // 主题设置
define( 'CS_ACTIVE_METABOX',    false ); // metabox
define( 'CS_ACTIVE_TAXONOMY',   true ); // 分类
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
//require_once SETTING_DIR . '/init/installplugin.init.php';//加载安装插件列表
//load_classes(SETTING_DIR . '/init/','*.init.php');

/**
 * 主题设置
 */
require_once SETTING_DIR . '/framework/search.set.php';//搜索设置
require_once SETTING_DIR . '/framework/appearance.set.php';//外观设置

/**
 * 后台设置
 */
require_once SETTING_DIR . '/admin/switch.set.php';//功能开关
require_once SETTING_DIR . '/admin/general.set.php';//常规设置
require_once SETTING_DIR . '/admin/senior.set.php';//高级设置  
require_once SETTING_DIR . '/admin/wp-custom.set.php';//wp定制
require_once SETTING_DIR . '/admin/login.set.php';//后台登录
require_once SETTING_DIR . '/admin/user.set.php';//用户管理
require_once SETTING_DIR . '/admin/debug.set.php';//开发调试

/**
 * 超级优化 manager
 */ 
require_once SETTING_DIR . '/manager/senior.set.php';//高级设置
require_once SETTING_DIR . '/manager/flash.set.php';//网站加速
require_once SETTING_DIR . '/manager/smtp.set.php';//邮件设置
require_once SETTING_DIR . '/manager/maintenance.set.php';//维护
require_once SETTING_DIR . '/manager/rewrite.set.php';//固定链接
require_once SETTING_DIR . '/manager/browser.set.php';//浏览器升级提示

/**
 * 插件设置
 */ 
require_once SETTING_DIR . '/plug/wpjam-qiniu/wpjam-qiniutek.php';//七牛云存储
require_once SETTING_DIR . '/plug/cf7.set.php';//Contact Form 7
require_once SETTING_DIR . '/plug/woocommerce.set.php';//Woocommerce

/**
 * 小工具
 */
require_once dirname( __FILE__ ) . '/inc/widgets/widget-icon/widget-icon.php';//小工具图标
require_once dirname( __FILE__ ) . '/inc/widgets/simple-widget-classes/simple-widget-classes.php';//小工具class类
require_once dirname( __FILE__ ) . '/inc/widgets/widgets-thisCategory.php';	
 
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

/**
 * 禁用 WordPress 4.4+ 的响应式图片功能
 * https://www.wpdaxue.com/disable-responsive-images.html
 */
add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );