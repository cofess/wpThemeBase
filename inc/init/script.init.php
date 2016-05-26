<?php
/**
 * Style And Javascript Init of Yiwell WordPress Theme
 * Description:初始化 - 加载Style和JS
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
 * 为WordPress的可视化编辑器添加样式实现实时预览
 * From http://www.mywpku.com/wordpress-tinymce-realtime-preview-css-style.html
 */ 
/*function load_editor_styles() {
	add_theme_support( 'editor-style' );
	if (is_admin() ) {
		add_editor_style('lib/bootstrap/css/bootstrap.min.css');
		add_editor_style('style.css');
	}
}
add_action( 'init', 'load_editor_styles' );*/
 
/*
 * 正确加载 Javascript 和 CSS 到 WordPress
 * From http://www.wpdaxue.com/wordpress-include-jquery-css.html
 */ 
//后台加载Style和JS 
function load_admin_style_and_scripts() {  
    if (is_admin() ) { 
    }  
}  
add_action( 'wp_enqueue_scripts', 'load_admin_style_and_scripts' ); 

//前端加载css
function load_front_style() { 
    if (!is_admin() ) { 
		//Load Bootstrap CSS
    	wp_register_style( 'bootstrap_css', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css');  
    	wp_enqueue_style( 'bootstrap_css' );
		//Load FontAwesome CSS
    	wp_register_style( 'fontawesome_css', get_template_directory_uri() . '/lib/bootstrap/css/font-awesome.min.css');  
    	wp_enqueue_style( 'fontawesome_css' );
		//Load Default CSS
		wp_register_style( 'default', get_template_directory_uri() . '/assets/css/doc.css',  array(), '', 'all' );  
    	wp_enqueue_style( 'default' );
    }  
}  
add_action( 'init', 'load_front_style' ); 

//前端加载JS 
function load_front_scripts() { 
    if (!is_admin() ) { 
		//load Bootstrap Style and JS
		wp_register_script( 'bootstrap_js', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js');  
    	wp_enqueue_script( 'bootstrap_js' );  
    }  
}  
add_action( 'wp_enqueue_scripts', 'load_front_scripts' ); 
 