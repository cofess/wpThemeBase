<?php
/*
Plugin Name: WPJAM 七牛镜像存储
Description: 使用七牛云存储实现 WordPress 博客静态文件 CDN 加速！
Plugin URI: http://blog.wpjam.com/project/wpjam-qiniutek/
Author: Denis
Author URI: http://blog.wpjam.com/
Version: 1.4.3
*/

define('WPJAM_QINIUTEK_PLUGIN_URL', SETTING_URI.'/plug/wpjam-qiniu');
define('WPJAM_QINIUTEK_PLUGIN_DIR', SETTING_DIR.'/plug/wpjam-qiniu');

if(cs_get_plug_option('enable_thumb_advanced')==true){
	include(WPJAM_QINIUTEK_PLUGIN_DIR.'/term-thumbnail.php');
}
include(WPJAM_QINIUTEK_PLUGIN_DIR.'/wpjam-thumbnail.php');
include(WPJAM_QINIUTEK_PLUGIN_DIR.'/wpjam-posts.php');

//定义在七牛绑定的域名。
if(cs_get_plug_option('qiniu_host')){
	define('CDN_HOST',untrailingslashit(cs_get_plug_option('qiniu_host')));
}else{
	define('CDN_HOST',untrailingslashit(home_url()));
}
if(cs_get_plug_option('local_host')){
	define('LOCAL_HOST',untrailingslashit(cs_get_plug_option('local_host')));
}else{
	define('LOCAL_HOST',untrailingslashit(home_url()));
}

//add_action('wp_loaded', 'wpjam_qiniutek_ob_cache');

if(!is_admin()){

	if(wpjam_qiniutek_get_setting('remote') && get_option('permalink_structure')){
		add_filter('the_content', 		'wpjam_qiniutek_content',1);
		add_filter('query_vars', 		'wpjam_qiniutek_query_vars');
		add_action('template_redirect',	'wpjam_qiniutek_template_redirect', 5);
	}

	add_filter('script_loader_src',		'wpjam_qiniutek_loader_src',10,2);
	add_filter('style_loader_src',		'wpjam_qiniutek_loader_src',10,2);
}

if(get_option('permalink_structure')){
	add_action('generate_rewrite_rules',	'wpjam_qiniutek_generate_rewrite_rules');
}

function wpjam_qiniutek_content($content){
	return preg_replace_callback('|<img.*?src=[\'"](.*?)[\'"].*?>|i','wpjam_qiniutek_replace_remote_image',do_shortcode($content));
}

function wpjam_qiniutek_replace_remote_image($matches){
	$qiniu_image_url = $image_url = $matches[1];

	if(empty($image_url)) return;

	$pre = apply_filters('pre_qiniu_remote', false, $image_url);

	if($pre == false && strpos($image_url,LOCAL_HOST) === false && strpos($image_url,CDN_HOST) === false ){
		$img_type = strtolower(pathinfo($image_url, PATHINFO_EXTENSION));

		if($img_type != 'gif'){
			$img_type = ($img_type == 'png')?$img_type:'jpg';

			$md5 = md5($image_url);
			$qiniu_image_url = CDN_HOST.'/qiniu/'.get_the_ID().'/image/'.$md5.'.'.$img_type;
		}
	}

	$width = (int)wpjam_qiniutek_get_setting('width');

	if($width){
		if(preg_match('|<img.*?width=[\'"](.*?)[\'"].*?>|i',$matches[0],$width_matches)){
			$width = $width_matches[1];
		}

		$height = 0;

		if(preg_match('|<img.*?height=[\'"](.*?)[\'"].*?>|i',$matches[0],$height_matches)){
			$height = $height_matches[1];
		}

		if($width || $height){
			$qiniu_image_url = wpjam_get_qiniu_thumbnail($qiniu_image_url, $width, $height, 0);
		}
	}

	$pre = apply_filters('pre_qiniu_watermark', false, $image_url);

	if($pre == false ){
		$qiniu_image_url = wpjam_get_qiniu_watermark($qiniu_image_url);
	}

	return str_replace($image_url, $qiniu_image_url, $matches[0]);
}

add_filter('pre_qiniu_remote','wpjam_pre_qiniu_remote',10,2);
function wpjam_pre_qiniu_remote($false, $image_url){
	$exceptions	= explode("\n", wpjam_qiniutek_get_setting('exceptions'));

	if($exceptions){
		foreach ($exceptions as $exception) {
			if(trim($exception) && strpos($image_url, trim($exception)) !== false ){
				return true;
			}
		}
	}

	return $false;		
}

function wpjam_qiniutek_generate_rewrite_rules($wp_rewrite){
    $new_rules['qiniu/([^/]+)/image/([^/]+)\.([^/]+)?$']	= 'index.php?p=$matches[1]&qiniu_image=$matches[2]&qiniu_image_type=$matches[3]';
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

function wpjam_qiniutek_query_vars($public_query_vars) {
    $public_query_vars[] = 'qiniu_image';
    $public_query_vars[] = 'qiniu_image_type';
    return $public_query_vars;
}

function wpjam_qiniutek_template_redirect(){
    $qiniu_image 		= get_query_var('qiniu_image');
    $qiniu_image_type 	= get_query_var('qiniu_image_type');

    if($qiniu_image && $qiniu_image_type){
    	include(WPJAM_QINIUTEK_PLUGIN_DIR.'/template/image.php');
    	exit;
	}
}

function wpjam_qiniutek_loader_src($src, $handle){
	if(get_option('timestamp')){
		$src = remove_query_arg(array('ver'), $src);
		$src = add_query_arg('ver',get_option('timestamp'),$src);
	}
	return $src;		
}