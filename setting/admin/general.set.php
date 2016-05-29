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
 * 添加友情链接功能
 * http://jingyan.baidu.com/article/1e5468f9239311484861b77e.html
*/
if (cs_get_admin_option('enable_friendlyLink_type')==true){
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );
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
 
if (cs_get_admin_option('enable_page_taxonomies')==true) {
	$ptcfp = new PTCFP();
} 

/**
 * WordPress后台的文章、分类，媒体，页面，评论,链接等所有信息中显示ID并将ID设置为第一列
 * 参考：http://www.cnblogs.com/huangtailang/p/4228913.html
 */
// 添加一个新的列 ID
function ssid_column($columns) {
    
    //将ID设置为第一列
    return array_merge(array('ssid' => 'ID'), $columns);
}
 
// 显示 ID
function ssid_value($column_name, $id) {
    if ($column_name == 'ssid')
        echo $id;
}
 
function ssid_return_value($value, $column_name, $id) {
    if ($column_name == 'ssid')
        $value = $id;
    return $value;
}
function ssid_css() {
    echo "<style>.column-ssid,#ssid{width: 50px!important;text-align: center!important;}</style>";
}
 
// 通过动作/过滤器输出各种表格和CSS
function ssid_add() {
    add_action('admin_head', 'ssid_css');
 
    //文章
    add_filter('manage_posts_columns', 'ssid_column');
    add_action('manage_posts_custom_column', 'ssid_value', 10, 2);
    // 页面
    add_filter('manage_pages_columns', 'ssid_column');
    add_action('manage_pages_custom_column', 'ssid_value', 10, 2);
 
    // 媒体
    add_filter('manage_media_columns', 'ssid_column');
    add_action('manage_media_custom_column', 'ssid_value', 10, 2);
 
    // 连接
    add_filter('manage_link-manager_columns', 'ssid_column');
    add_action('manage_link_custom_column', 'ssid_value', 10, 2);
 
    // 连接分类
    add_action('manage_edit-link-categories_columns', 'ssid_column');
    add_filter('manage_link_categories_custom_column', 'ssid_return_value', 10, 3);
 
    foreach ( get_taxonomies() as $taxonomy ) {
        add_action("manage_edit-${taxonomy}_columns", 'ssid_column');            
        add_filter("manage_${taxonomy}_custom_column", 'ssid_return_value', 10, 3);
    }
 
    // 用户
    add_action('manage_users_columns', 'ssid_column');
    add_filter('manage_users_custom_column', 'ssid_return_value', 10, 3);
    // 评论
    add_action('manage_edit-comments_columns', 'ssid_column');
    add_action('manage_comments_custom_column', 'ssid_value', 10, 2);
} 

if (cs_get_admin_option('enable_show_ids')==true) {
	add_action('admin_init', 'ssid_add');
}

/**
 * 不使用插件实现对Wordpress默认编辑器的增强
 * 参考：http://www.vsay.cn/no-plug-in-to-enhance-wordpress-default-editor.html
 */ 
function addEditor_btn($btnEditor) {   
//下面每一行代码都代表着一个功能按钮   
//而后面的值就是wordpress内建的一些编辑功能   
//您可以修改值里引号中的值（请参考文章后面的所有key）   
//您也可以任意增加按钮和删除按钮   
//方法就是删除下面的行或者复制出一行出来   
$btnEditor[] = 'fontselect';   
$btnEditor[] = 'fontsizeselect';   
$btnEditor[] = 'cleanup';   
$btnEditor[] = 'styleselect';   
$btnEditor[] = 'hr';   
$btnEditor[] = 'del';   
$btnEditor[] = 'sub';   
$btnEditor[] = 'sup';   
$btnEditor[] = 'copy';   
$btnEditor[] = 'paste';   
$btnEditor[] = 'cut';   
$btnEditor[] = 'undo';   
$btnEditor[] = 'image';   
$btnEditor[] = 'anchor';   
$btnEditor[] = 'backcolor';   
$btnEditor[] = 'wp_page';   
$btnEditor[] = 'charmap';   
return $btnEditor;   
}   
if (cs_get_admin_option('enable_editor_extend')==true) {
	add_filter("mce_buttons_3", "addEditor_btn");
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
  if ( cs_get_admin_option('file_rename')=='1'){//所有文件
    if ( cs_get_admin_option('file_rename_mode')=='1'){//命名方式：时间戳+随机数字（MD5加密文件名）
      $file['name'] = $time."".substr(md5($name), 0, 20).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
    } else {//命名方式：随机数字（MD5加密文件名）
      $file['name'] = "".substr(md5($name), 0, 20).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
    }
  } 
  if ( cs_get_admin_option('file_rename')=='2' && preg_match($cpattern,$file['name'])){//中文文件
    if ( cs_get_admin_option('file_rename_mode')=='1'){//命名方式：时间戳+随机数字（MD5加密文件名）
      $file['name'] = $time."".substr(md5($name), 0, 20).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
    } else {//命名方式：随机数字（MD5加密文件名）
      $file['name'] = "".substr(md5($name), 0, 20).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
    }
  }
  return $file;
}
if ( cs_get_admin_option('file_rename')!='3'){
  //add_filter('sanitize_file_name', 'rename_filename', 10);
  add_filter('wp_handle_upload_prefilter', 'rename_filename');
}