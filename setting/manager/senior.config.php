<?php
/**
 * Senior Setting of Yiwell WordPress Theme
 * Description:超级优化 - 高级设置（完结）
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
 * 去掉页面头部的后台导航（管理员工具条）
 * 来自 http://shanmao.me/web-system/wordpress/wordpress-qu-diao-ye-mian-tou-bu-de-hou-tai-dao-hang
 */
if (cs_get_manager_option('enable_adminBar')==false) { 	
	add_filter('show_admin_bar', '__return_false');
}

/**
 * WP前台顶部清理,删除 wp_head 中无关紧要的代码
 * 来自 http://www.wpdaxue.com/speed-up-wordpress.html
 */
if (cs_get_manager_option('enable_header_clean')==true) { 
	function wp_header_clean_up(){
    	if (!is_admin()) {
        	foreach(array('index_rel_link','start_post_rel_link') as $clean){remove_action('wp_head',$clean);}
        	remove_action( 'wp_head', 'feed_links_extra', 3 );
        	remove_action( 'wp_head', 'feed_links', 2 );
        	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
        	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
        	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
        	foreach(array('single_post_title','bloginfo','wp_title','category_description','list_cats','comment_author','comment_text','the_title','the_content','the_excerpt') as $where){
         		remove_filter ($where, 'wptexturize');
       	 	}
        	/*remove_filter( 'the_content', 'wpautop' );
        	remove_filter( 'the_excerpt', 'wpautop' );*/
        	wp_deregister_script( 'l10n' );
    	}
	}
}

/**
 * 移除 WordPress 菜单输出的多余的CSS选择器id或class
 * 来自 http://www.wpdaxue.com/remove-wordpress-nav-classes.html
 */
if (cs_get_manager_option('enable_menu_css_excess')==true) {
	add_filter('nav_menu_css_class', 'optimizer_css_attributes_filter', 100, 1);
	add_filter('nav_menu_item_id', 'optimizer_css_attributes_filter', 100, 1);
	add_filter('page_css_class', 'optimizer_css_attributes_filter', 100, 1);
	function optimizer_css_attributes_filter($var) {
		return is_array($var) ? array_intersect($var, array('current-menu-item','current-post-ancestor','current-menu-ancestor','current-menu-parent')) : '';
	}
}