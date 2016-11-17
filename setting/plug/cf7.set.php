<?php
/**
 * Plugin Init of Yiwell WordPress Theme
 * Description:初始化 - 插件初始化
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
 * wordpress contact form 7 disable email
 * 禁用邮件通知
 * http://stackoverflow.com/questions/20016228/wordpress-contact-form-7-disable-email
 */
function my_skip_mail($f){
    $submission = WPCF7_Submission::get_instance();    
        return true; // DO NOT SEND E-MAIL
}
if (cs_get_plug_option('enable_cf7_email')==false) {
	add_filter('wpcf7_skip_mail','my_skip_mail');
}