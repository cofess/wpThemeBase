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

/**
 * 防止WordPress站点被别人通过iframe框架引用
 * 参考：http://www.wpdaxue.com/break-out-of-frames-for-wordpress.html
 */
// Automatically break out of iframes
function iframe_breaker(){
    ?>
    <script type='text/javascript'>
        <!--
        try {
            var location_parent = new String(parent.location);
            var location_top = new String(top.location);
            var location_current = new String(document.location);
            location_parent = location_parent.toLowerCase(); location_top = location_top.toLowerCase(); location_current = location_current.toLowerCase();
        
            if((location_top != location_current) && location_parent.indexOf('{<?php echo strtolower( get_site_url() ); ?>}') != 0) {
                top.location.href = document.location.href;
            }
        } catch(err) { }
        //-->
    </script>
    <?php
}
// Automatically break out of iframes
if (cs_get_manager_option('enable_iframe_break')==true) {
    add_action('wp_footer', 'iframe_breaker');
}

/*-----------------------------------------------------------------------------------*/
# 禁止鼠标右键
/*-----------------------------------------------------------------------------------*/
if ( cs_get_manager_option('enable_mouseReturn')==true){
    function disable_oncontext_menu() { 
        echo '<script type="text/javascript">document.oncontextmenu=function(){ return false }</script>'; 
    } 
    add_action('wp_footer', 'disable_oncontext_menu',10,3);
}

/**
 * WordPress转义文章和评论中的邮箱地址以防被恶意采集
 * 参考：http://www.wpdaxue.com/security-remove-emails.html
 */
function security_remove_emails($content) {
    $pattern = '/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4})/i';
    $fix = preg_replace_callback($pattern,"security_remove_emails_logic", $content);
 
    return $fix;
}
function security_remove_emails_logic($result) {
    return antispambot($result[1]);
}
if (cs_get_manager_option('enable_email_transfer')==true) {
    add_filter( 'the_content', 'security_remove_emails', 20 );
    add_filter( 'widget_text', 'security_remove_emails', 20 );
}