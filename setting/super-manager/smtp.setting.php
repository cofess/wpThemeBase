<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * 
 * 超级优化：邮件设置
 * 
 * Description:邮件设置SMTP（完结）
 * Author：xiaoxu
 * Author URI: www.iwebued.com
 */
 
/* Cannot access pages directly  */ 
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
add_action('phpmailer_init', 'mail_smtp');
function mail_smtp( $phpmailer ) { 
    $phpmailer->FromName = '发信名'; 
    $phpmailer->Host = 'smtp.exmail.qq.com';
    $phpmailer->Port = 465; 
    $phpmailer->Username = '显示邮箱'; 
    $phpmailer->Password = '密码'; 
    $phpmailer->From = '发信邮箱'; 
    $phpmailer->SMTPAuth = true; 
    $phpmailer->SMTPSecure = 'ssl'; //tls or ssl （port=25留空，465为ssl）
    $phpmailer->IsSMTP();
}
*/
add_action('phpmailer_init', 'my_phpmailer',10,1);
function my_phpmailer($phpmailer){
	if( cs_get_manager_option('enable_smtp')!=true || cs_get_manager_option('smtp_host')=='' || cs_get_manager_option('smtp_from_email')=='' ){
		return;
	}
	$phpmailer->IsSMTP();
	$phpmailer->Host = ''.cs_get_manager_option('smtp_host').'';
	$phpmailer->Port = cs_get_manager_option('smtp_port'); 
	$phpmailer->From = ''.cs_get_manager_option('smtp_from_email').'';
	$phpmailer->FromName = ''.cs_get_manager_option('smtp_from_name').'';
	$phpmailer->SMTPSecure = ''.cs_get_manager_option('smtp_secure').''; //tls or ssl （port=25留空，465为ssl）
	$phpmailer->SMTPAuth = (cs_get_manager_option('smtp_auth')=='yes') ? true : false;
	if($phpmailer->SMTPAuth){
		$phpmailer->Username = ''.cs_get_manager_option('smtp_auth_email').'';
		$phpmailer->Password = ''.cs_get_manager_option('smtp_auth_pass').'';
	}
}

/**
 * 修改 WordPress 发送邮件的默认邮箱和发件人
 * http://www.wpdaxue.com/change-wordpress-mail-from-info.html
 */  
function custom_from_name($email){
    $wp_from_name = cs_get_manager_option('smtp_from_name');
    return $wp_from_name;
}
 
function custom_from_email($email) {
    $wp_from_email = cs_get_manager_option('smtp_from_email');
    return $wp_from_email;
}
if (cs_get_manager_option('smtp_from_name')!='') {  
	add_filter('wp_mail_from_name', 'custom_from_name');
}
if (cs_get_manager_option('smtp_from_email')!='' && is_email(cs_get_manager_option('smtp_from_email'))) { 
	add_filter('wp_mail_from', 'custom_from_email');
}
