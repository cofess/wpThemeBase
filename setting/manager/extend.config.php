<?php
/**
 * Extend Setting of Yiwell WordPress Theme
 * Description:超级优化 - 功能拓展（完结）
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