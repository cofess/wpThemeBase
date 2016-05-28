<?php
/**
 * Flash Setting of Yiwell WordPress Theme
 * Description:超级优化 - 网站加速（完结）
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

/*
 * 开启Gzip压缩，加速浏览你的站点
 * From http://www.banghui.org/9361.html
 */ 
function gzippy() {
 ob_start('ob_gzhandler');
}
if(!stristr($_SERVER['REQUEST_URI'], 'tinymce') && !ini_get('zlib.output_compression') && cs_get_manager_option('enable_gzip')==true) {
 add_action('init', 'gzippy');
} 
/*
 * 压缩html代码
 * From http://zhangge.net/4731.html
 */
function wp_compress_html(){
    function wp_compress_html_main ($buffer){
        $initial=strlen($buffer);
        $buffer=explode("<!--wp-compress-html-->", $buffer);
        $count=count ($buffer);
        for ($i = 0; $i <= $count; $i++){
            if (stristr($buffer[$i], '<!--wp-compress-html no compression-->')) {
                $buffer[$i]=(str_replace("<!--wp-compress-html no compression-->", " ", $buffer[$i]));
            } else {
                $buffer[$i]=(str_replace("\t", " ", $buffer[$i]));
                $buffer[$i]=(str_replace("\n\n", "\n", $buffer[$i]));
                $buffer[$i]=(str_replace("\n", "", $buffer[$i]));
                $buffer[$i]=(str_replace("\r", "", $buffer[$i]));
                while (stristr($buffer[$i], '  ')) {
                    $buffer[$i]=(str_replace("  ", " ", $buffer[$i]));
                }
            }
            $buffer_out.=$buffer[$i];
        }
        $final=strlen($buffer_out);   
        $savings=($initial-$final)/$initial*100;   
        $savings=round($savings, 2);   
        $buffer_out.="\n<!--压缩前的大小: $initial bytes; 压缩后的大小: $final bytes; 节约：$savings% -->";   
    return $buffer_out;
}
ob_start("wp_compress_html_main");
}
if (cs_get_manager_option('enable_compress_html')==true) {  
	add_action('get_header', 'wp_compress_html'); 
}

/*
 * 替换Google公共库为360公共库（针对后台，不完美）
 * From https://wordpress.org/plugins/googleapis-to-useso/
 * https://wordpress.org/plugins/useso-take-over-google/
 */
/*if(is_admin() && cs_get_manager_option('enable_replace_google_cdn')==true)
{
    function replace_google_cdn_callback($buffer) {return str_replace('googleapis.com', 'useso.com', $buffer);}
    function replace_google_buffer_start() {ob_start("replace_google_cdn_callback");}
    function replace_google_buffer_end() {ob_end_flush();}
    add_action('init', 'replace_google_buffer_start');
    add_action('shutdown', 'replace_google_buffer_end');
}*/
if (cs_get_manager_option('enable_replace_google_cdn')==true) {
	require_once SETTING_DIR . '/manager/includes/useso-take-over-google.inc.php';
}

/*
 * 禁用open-sans字体或者将加载源从Google Fonts换为360 CDN
 * From http://devework.com/replace-open-sans.html
 */
//禁用open-sans字体
if (!function_exists('remove_google_open_sans')) {
	function remove_google_open_sans() {   
		wp_deregister_style( 'open-sans' );   
		wp_register_style( 'open-sans', false );   
	}
}  
if (cs_get_manager_option('google_fonts_lib')=='1') { 
	//add_action('wp_enqueue_scripts', 'remove_google_open_sans');// 前台删除Google字体CSS   
	//add_action('admin_enqueue_scripts', 'remove_google_open_sans');// 后台删除Google字体CSS 
	add_action('init', 'remove_google_open_sans');// 后台删除Google字体CSS
}
//替换字体加载源 
if (!function_exists('replace_google_open_sans')) { 
	function replace_google_open_sans() {
		wp_deregister_style('open-sans');
		wp_register_style( 'open-sans', '//fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,300,400,600' );
		wp_enqueue_style( 'open-sans');
	}
}
if (cs_get_manager_option('google_fonts_lib')=='2') { 
	//add_action( 'wp_enqueue_scripts', 'replace_google_open_sans' );//前台加载，看需要注释之；
	//add_action('admin_enqueue_scripts', 'replace_google_open_sans');//后台加载，应该都需要的了
	add_action('init', 'replace_google_open_sans');
}

/************************************************************
 * Gravatar头像被墙的四种解决方案
 * From http://www.weeiy.com/wordpress-gravatar-4.html
 ************************************************************/

/*
 * 使用https方式（SSL）调用头像
 * Use https gravatar server to replace none-https.
 * Simplely replace from "http://*.gravatar.com" to "https://secure.gravatar.com".
 */
function replace_gravatar_to_ssl($avatar){
	$avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
	return $avatar;
}
if (cs_get_manager_option('gravatar_server')=='1') {
	add_filter('get_avatar', 'replace_gravatar_to_ssl');
}

/*
 * Gravatar中国服务器，cn.gravatar.com
 */
function replace_gravatar_to_cn($avatar){
	$avatar = str_replace(array('www.gravatar.com','0.gravatar.com','1.gravatar.com','2.gravatar.com','s.gravatar.com'),'cn.gravatar.com',$avatar);
	return $avatar;
}
if (cs_get_manager_option('gravatar_server')=='2') {
	add_filter('get_avatar', 'replace_gravatar_to_cn');
}


/*
 * 自定义第三方Gravatar镜像服务器,多说：gravatar.duoshuo.com,
 */
function replace_gravatar_to_custom($avatar){
	$avatar = str_replace(array('www.gravatar.com','0.gravatar.com','1.gravatar.com','2.gravatar.com','s.gravatar.com'),cs_get_manager_option('custom_gravatar_server'),$avatar);
	return $avatar;
}
if (cs_get_manager_option('gravatar_server')=='3' && cs_get_manager_option('custom_gravatar_server')!='') {
	add_filter('get_avatar', 'replace_gravatar_to_custom');
}

/*
 * Gravatar头像缓存到本地,国内主机无法使用（无法访问国外网络）
 * http://www.wpdaxue.com/gravatar-is-blocked.html
 */
function my_avatar($avatar) {
  $tmp = strpos($avatar, 'http');
  $g = substr($avatar, $tmp, strpos($avatar, "'", $tmp) - $tmp);
  $tmp = strpos($g, 'avatar/') + 7;
  $f = substr($g, $tmp, strpos($g, "?", $tmp) - $tmp);
  $w = get_bloginfo('wpurl');
  $e = ABSPATH .'avatar/'. $f .'.jpg';
  //$t = 1209600; //設定14天, 單位:秒
  $t = cs_get_manager_option('gravatar_cacheDays')*86400; //設定14天, 單位:秒
  if ( !is_file($e) || (time() - filemtime($e)) > $t ) { //當頭像不存在或文件超過14天才更新
    copy(htmlspecialchars_decode($g), $e);
  } else  $avatar = strtr($avatar, array($g => $w.'/avatar/'.$f.'.jpg'));
  if (filesize($e) < 500) copy($w.'/avatar/default.jpg', $e);
  return $avatar;
}
if (cs_get_manager_option('gravatar_server')=='4' && cs_get_manager_option('gravatar_cacheDays')!=0) {
	add_filter('get_avatar', 'my_avatar');
}

/*
 * 替换WordPress 自带默认的 jQuery库
 * http://devework.com/replace-the-default-wordpress-jquery-library-loaded-footer.html
 * wp大学：http://www.wpdaxue.com/wordpress-include-jquery-css.html
 */
 
if (cs_get_manager_option('enable_jquery_cdn')==true && cs_get_manager_option('jquery_cdn_url')!='') {   
function myScripts() {          
    if ( !is_admin() ) { /** Load Scripts and Style on Website Only */  
        wp_deregister_script( 'jquery' ); 
		wp_register_script( 'jquery', cs_get_manager_option('jquery_cdn_url'));   
        wp_enqueue_script( 'jquery' );   
    }  
}  
add_action( 'init', 'myScripts' );
}

/**
 * 在 Footer 载入 jQuery 代码
 * 来自 http://www.arefly.com/wordpress-move-script-to-footer/
 */
if (cs_get_manager_option('enable_footer_load_js')==true) {
	//在 Footer 载入 jQuery 代码
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);
	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
}
