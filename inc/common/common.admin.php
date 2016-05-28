<?php 
/**
 * Main Function of Yiwell WordPress Theme
 *
 * Package:       Yiwell
 * Version:       1.0.0
 * Author:        Lony <841995980@qq.com>
 * Author URI:    http://www.yiwell.com
 * Text Domain:   CS_TEXTDOMAIN
 * License:       http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * Copyright:     Copyright (c) 2014-2016, yiwell
**/

/* Cannot access pages directly  */ 
if ( ! defined( 'ABSPATH' ) ) { die; }

/**
 * 创建文件目录
 * http://stackoverflow.com/questions/2303372/create-a-folder-if-it-doesnt-already-exist
 * @param dirpath 文件目录
 * @param $mode   目录权限
 * @example createdir(WP_CONTENT_DIR.'/cache/timthumb/',0777)
 */
function createdir($dirpath,$mode=0777){
    if (!file_exists($dirpath)) {
        mkdir($dirpath, $mode, true);
    }
}
/**
 * 引入文件
 * function includes files in $dir, if $no_more set to true there no includes in subdirectories 
 * @param dir 文件目录
 * @param no_more 是否扫描子目录
 * @param f_name 文件名（只引入指定文件名文件，支持模糊查询）
 * @example include_files_in_dir('/../modules/', false, 'init.php');
**/
function include_files_in_dir( $dir, $no_more = false, $f_name = null ) {    
    $dir_init = $dir;
    $dir = dirname(__FILE__).$dir;  
    if (!file_exists($dir)) {
        throw new Exception("Folder $dir does not exist");
    }     
    $files = array();     
    if ($handle = opendir( $dir )) {
        while( false !== ($file = @readdir($handle)) ) {        
            if ( is_dir( $dir.$file ) && !preg_match('/^\./', $file) && !$no_more ) {
                include_files_in_dir($dir_init.$file."/", true, $f_name);
            }else {                
                if( $f_name && $f_name == $file ) {
                    $files[] = $dir.$file;
                }elseif( !$f_name && preg_match('/^[^~]{1}.*\.php$/', $file) ) {
                    $files[] = $dir.$file;
                }            
            }            
        }
        @closedir($handle);
    }  
    sort($files);  
    foreach($files as $file) {
        include_once $file;
    }
}

/*
Description:创建页面方法，用于插件或主题创建自定义页面
Author URI: http://www.iwebued.com/
用法：add_custom_page('取回密码','resetpass','user-resetpass.php'); 
*/
function add_custom_page($title,$slug,$page_template=''){   
    $allPages = get_pages();  
    $exists = false;   
    foreach( $allPages as $page ){   
        if( strtolower( $page->post_name ) == strtolower( $slug ) ){   
            $exists = true;   
        }   
    }   
    if( $exists == false ) {   
        $new_page_id = wp_insert_post(   
            array(   
                'post_title' => $title,   
                'post_type'     => 'page',   
                'post_name'  => $slug,   
                'comment_status' => 'closed',   
                'ping_status' => 'closed',   
                'post_content' => '',   
                'post_status' => 'publish',   
                'post_author' => 1,   
                'menu_order' => 0   
            )   
        );   
        if($new_page_id && $page_template!=''){   
            update_post_meta($new_page_id, '_wp_page_template',  $page_template);   
        }   
    }   
}
