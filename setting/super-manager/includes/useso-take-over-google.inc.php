<?php
/**
 * Useso take over Google of Yiwell WordPress Theme
 * Description:用360前端公共库Useso接管Google字体库和Google公共库，无需设置，插件安装激活后即刻生效。
 * Plugin URI: http://www.brunoxu.com/useso-take-over-google.html
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

function useso_take_over_google_is_login_page() {
	return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if (is_admin()) {// init -> wp_loaded -> admin_menu -> admin_init -> wp -> admin_enqueue_scripts -> admin_head
	$action = 'admin_init'; // OK
	//$action = 'wp'; // NG
} elseif (useso_take_over_google_is_login_page()) {
	$action = 'wp_loaded'; // OK
	//$action = 'wp'; // NG
} else { // init -> wp_loaded -> wp -> template_redirect -> get_header -> wp_enqueue_scripts -> wp_head
	$action = 'template_redirect'; // OK
	//$action = 'get_header';// NG in theme 'pinnacle'(use redux framework)
}

add_action($action, 'useso_take_over_google_obstart');
function useso_take_over_google_obstart() {
	ob_start('useso_take_over_google_obend');
}

function useso_take_over_google_obend($content) {
	return useso_take_over_google_filter($content);
}

function useso_take_over_google_filter($content)
{
	$content = apply_filters('useso_take_over_google_content_filter_before', $content);

	/*
	<link rel="stylesheet" id="open-sans-css" href="//fonts.googleapis．com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&amp;subset=latin%2Clatin-ext&amp;ver=3.9.2" type="text/css" media="all">
	<script type="text/javascript" src="http://ajax.googleapis．com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	*/
	$regexp = "/<(link|script)([^<>]+)>/i";
	$content = preg_replace_callback(
		$regexp,
		"useso_take_over_google_str_handler",
		$content
	);

	/*
	@import url(http://fonts.googleapis．com/css?family=Roboto+Condensed:regular);
	@import url(http://fonts.googleapis．com/css?family=Merriweather:300,300italic,700,700italic);
	*/
	/*$regexp = "/@import\s+url\([^\(\)]+\);?/i";
	$content = preg_replace_callback(
		$regexp,
		"useso_take_over_google_str_handler",
		$content
	);*/

	return apply_filters('useso_take_over_google_content_filter_after', $content);
}

function useso_take_over_google_str_handler($matches)
{
	$str = $matches[0];

	if (!is_ssl()) {
		//$str = str_ireplace('//fonts.googleapis'.'.com/', '//fonts.useso.com/', $str);
		$str = str_ireplace('//ajax.googleapis'.'.com/', '//ajax.useso.com/', $str);
		$str = str_ireplace('//www.google'.'.com/', '//ajax.useso.com/', $str);

		//$str = str_ireplace('//fonts.googleapis'.'.com/', '//fonts.geekzu.org/', $str);
		//$str = str_ireplace('//ajax.googleapis'.'.com/', '//fdn.geekzu.org/ajax/', $str);
	} else {
		//$str = str_ireplace('//fonts.googleapis'.'.com/', '//fonts.lug.ustc.edu.cn/', $str);
		//$str = str_ireplace('//ajax.googleapis'.'.com/', '//ajax.lug.ustc.edu.cn/', $str);

		//$str = str_ireplace('//fonts.googleapis'.'.com/', '//fonts.geekzu.org/', $str);
		$str = str_ireplace('//ajax.googleapis'.'.com/', '//sdn.geekzu.org/ajax/', $str);
		$str = str_ireplace('//www.google'.'.com/', '//sdn.geekzu.org/ajax/', $str);
	}

	/*
	fix below references:
		https://fonts.useso.com/....
		https://ajax.useso.com/....
	*/
	if (!is_ssl()) {
		$str = str_ireplace('https://fonts.useso.com/', 'http://fonts.useso.com/', $str);
		$str = str_ireplace('https://ajax.useso.com/', 'http://ajax.useso.com/', $str);

		$str = str_ireplace('https://fonts.geekzu.org/', 'http://fonts.geekzu.org/', $str);
		$str = str_ireplace('https://fdn.geekzu.org/ajax/', 'http://fdn.geekzu.org/ajax/', $str);
	} else {
		//...
	}

	return $str;
}
