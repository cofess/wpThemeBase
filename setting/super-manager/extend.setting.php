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
 * 用户个人资料添加本地头像
 * 参考：https://wordpress.org/plugins/simple-local-avatars/
 */
if (cs_get_manager_option('enable_custom_gravatar')==true) {
	require_once dirname(dirname( __FILE__ )) . '/super-manager/includes/simple-local-avatars.inc.php';
}

/**
 * 为WordPress页面（page）添加标签和分类功能
 * 参考：http://www.wpdaxue.com/post-tags-and-categories-for-pages.html
 */
class PTCFP{
 
  function __construct(){
 
    add_action( 'init', array( $this, 'taxonomies_for_pages' ) );
 
    /**
     * 确保这些查询修改不会作用于管理后台，防止文章和页面混杂 
     */
    if ( ! is_admin() ) {
      add_action( 'pre_get_posts', array( $this, 'category_archives' ) );
      add_action( 'pre_get_posts', array( $this, 'tags_archives' ) );
    } // ! is_admin
 
  } // __construct
 
  /**
   * 为“页面”添加“标签”和“分类”
   *
   * @uses register_taxonomy_for_object_type
   */
  function taxonomies_for_pages() {
      register_taxonomy_for_object_type( 'post_tag', 'page' );
      register_taxonomy_for_object_type( 'category', 'page' );
  } // taxonomies_for_pages
 
  /**
   * 在标签存档中包含“页面”
   */
  function tags_archives( $wp_query ) {
 
    if ( $wp_query->get( 'tag' ) )
      $wp_query->set( 'post_type', 'any' );
 
  } // tags_archives
 
  /**
   * 在分类存档中包含“页面”
   */
  function category_archives( $wp_query ) {
 
    if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
      $wp_query->set( 'post_type', 'any' );
 
  } // category_archives
 
} // PTCFP
 
if (cs_get_manager_option('enable_page_taxonomies')==true) {
	$ptcfp = new PTCFP();
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

/**
 * 让主题支持wordpress上传文件自动重命名
 * 参考：http://www.boke8.net/wordpress-auto-rename-file.html
 * Plugin URI: http://www.aips.me/wordpress-upload-pictures-renamed.html
 */
function rename_filename($file){
	$time=date("Y-m-d H:i:s");//获取当前时间
	$cpattern = '/[\x7f-\xff]/';//中文正则表达式
	$info = pathinfo($filename);//获取上传文件信息
	$ext = empty($info['extension']) ? '' : '.' . $info['extension'];//上传文件后缀
	$name = basename($filename, $ext);//获取文件名
	if ( cs_get_manager_option('file_rename')=='1'){//所有文件
		if ( cs_get_manager_option('file_rename_mode')=='1'){//命名方式：时间戳+随机数字（MD5加密文件名）
			$file['name'] = $time."".substr(md5($name), 0, 20).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
		} else {//命名方式：随机数字（MD5加密文件名）
			$file['name'] = "".substr(md5($name), 0, 20).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
		}
	} 
	if ( cs_get_manager_option('file_rename')=='2' && preg_match($cpattern,$file['name'])){//中文文件
		if ( cs_get_manager_option('file_rename_mode')=='1'){//命名方式：时间戳+随机数字（MD5加密文件名）
			$file['name'] = $time."".substr(md5($name), 0, 20).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
		} else {//命名方式：随机数字（MD5加密文件名）
			$file['name'] = "".substr(md5($name), 0, 20).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
		}
	}
	return $file;
}
if ( cs_get_manager_option('file_rename')!='3'){
	//add_filter('sanitize_file_name', 'rename_filename', 10);
	add_filter('wp_handle_upload_prefilter', 'rename_filename');
}