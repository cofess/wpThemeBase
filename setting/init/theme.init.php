<?php
/**
 * Admin Init of Yiwell WordPress Theme
 * Description:初始化 - 主题初始化
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
 * WordPress 4.1 就添加了新的方法在主题中显示标题，取代之前的 wp_title() 函数用法
 * http://blog.rpgsky.net/archives/6025
 * wp_get_document_title()
 */
function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' ); 
/**
 * 摘要长度
 * http://isharefree.com/wordpress/wordpress-modify-the-excerpt-lenth/  
 */ 
/*function custom_excerpt_length( $length ){
return 14;
}
add_filter( 'excerpt_length', 'custom_excerpt_length');*/
 
/**
 * 菜单初始化
 */
add_action( 'init', 'my_custom_menus' );
function my_custom_menus() {
	register_nav_menus(
		array(
			'main-menu'   => __( '主导航'),
			'sub-menu'    => __( '副导航'),
		)
	);
} 

 
/**
 * 边栏初始化
 */  
if ( function_exists('register_sidebar') ) {   
  register_sidebar(array(   
    'name'            => '侧边栏1',  
	'id'              => 'category-sidebar',
	'description'     => '列表页侧边栏', 
    'before_widget'   => '<div class="widget sidebar_item %2$s">',   
    'after_widget'    => '</div>',   
    'before_title'    => '<h3><span>',   
    'after_title'     => '</span></h3>',   
  )); 
  register_sidebar(array(   
    'name'            => '侧边栏2',  
	'id'              => 'single-sidebar',
	'description'     => '文章详情页侧边栏', 
    'before_widget'   => '<div class="sidebar_item %2$s">',   
    'after_widget'    => '</div>', 
    'before_title'    => '<h3><span>',   
    'after_title'     => '</span></h3>',   
  )); 
  register_sidebar(array(   
    'name'            => '侧边栏3',  
	'id'              => 'woocommerce-sidebar',
	'description'     => 'woocommerce侧边栏', 
    'before_widget'   => '<div class="sidebar_item %2$s">',   
    'after_widget'    => '</div>', 
    'before_title'    => '<h3><span>',   
    'after_title'     => '</span></h3>',   
  ));   
  register_sidebar(array(   
    'name'            => '侧边栏4',  
	'id'              => 'supports-sidebar',
	'description'     => '服务与支持栏目页侧边栏', 
    'before_widget'   => '<div class="sidebar_item %2$s">',   
    'after_widget'    => '</div>', 
    'before_title'    => '<h3><span>',   
    'after_title'     => '</span></h3>',   
  ));   
  register_sidebar(array(   
    'name'           => '侧边栏5',  
	'id'             => 'pages-sidebar',
	'description'    => '其他页侧边栏', 
    'before_widget'  => '<div class="sidebar_item %2$s">',   
    'after_widget'   => '</div>',   
    'before_title'   => '<h3><span>',  
    'after_title'    => '</span></h3>',  
  ));  
 }