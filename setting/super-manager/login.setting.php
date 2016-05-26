<?php
/**
 * Login Setting of Yiwell WordPress Theme
 * Description:超级优化 - 后台登录（完结）
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
 * 重置非管理员用户到首页
 * http://www.wpdaxue.com/only-allow-administrators-to-access-wordpress-admin-area.html
 */
function redirect_non_admin_users() {
	if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
		wp_redirect( home_url() );
		exit;
	}
}
if (cs_get_manager_option('enable_admin_only_administrator')==true) { 
	add_action( 'admin_init', 'redirect_non_admin_users' ); 
}
/**
 * 禁用WordPress登录错误的提示信息
 * http://www.wpdaxue.com/modify-wordpress-login-error-message.html
 */ 
if (cs_get_manager_option('enable_login_error_messages')==true) { 
	add_filter('login_errors', 'disable_login_errors');
}
// Disable error messages on login page
function disable_login_errors($a)
{
	echo '<style type="text/css">#login_error { display: none; }</style>' . "\n";
	return null;
}
/**
 * 让WordPress支持用户名或邮箱登录
 * http://www.wpdaxue.com/login-with-username-or-email-address.html
 */
function dr_email_login_authenticate( $user, $username, $password ) {
	if ( is_a( $user, 'WP_User' ) )
		return $user;
 
	if ( !empty( $username ) ) {
		$username = str_replace( '&', '&', stripslashes( $username ) );
		$user = get_user_by( 'email', $username );
		if ( isset( $user, $user->user_login, $user->user_status ) && 0 == (int) $user->user_status )
			$username = $user->user_login;
	}
 
	return wp_authenticate_username_password( null, $username, $password );
}
 
//替换“用户名”为“用户名 / 邮箱”
function username_or_email_login() {
	if ( 'wp-login.php' != basename( $_SERVER['SCRIPT_NAME'] ) )
		return;
 
	?><script type="text/javascript">
	// Form Label
	if ( document.getElementById('loginform') )
		document.getElementById('loginform').childNodes[1].childNodes[1].childNodes[0].nodeValue = '<?php echo esc_js( __( '用户名/邮箱', 'email-login' ) ); ?>';
 
	// Error Messages
	if ( document.getElementById('login_error') )
		document.getElementById('login_error').innerHTML = document.getElementById('login_error').innerHTML.replace( '<?php echo esc_js( __( '用户名' ) ); ?>', '<?php echo esc_js( __( '用户名/邮箱' , 'email-login' ) ); ?>' );
	</script><?php
}
if (cs_get_manager_option('enable_login_multiWay')==true) { 
	remove_filter( 'authenticate', 'wp_authenticate_username_password', 20, 3 );
	add_filter( 'authenticate', 'dr_email_login_authenticate', 20, 3 );
	add_action( 'login_form', 'username_or_email_login' ); 
}

/**
 * WordPress 禁止多个人同时登录一个账号
 * http://www.wpdaxue.com/prevent-concurrent-logins.html
 */
function pcl_user_has_concurrent_sessions() {
	return ( is_user_logged_in() && count( wp_get_all_sessions() ) > 1 );
}
 
/**
 * Get the user's current session array
 *
 * @return array
 */
function pcl_get_current_session() {
	$sessions = WP_Session_Tokens::get_instance( get_current_user_id() );
 
	return $sessions->get( wp_get_session_token() );
}
 
/**
 * Only allow one session per user
 * @action init
 *
 * @return void
 */
function pcl_disallow_account_sharing() {
	if ( ! pcl_user_has_concurrent_sessions() ) {
		return;
	}
 
	$newest  = max( wp_list_pluck( wp_get_all_sessions(), 'login' ) );
	$session = pcl_get_current_session();
 
	if ( $session['login'] === $newest ) {
		wp_destroy_other_sessions();
	} else {
		wp_destroy_current_session();
	}
}
if (cs_get_manager_option('disable_account_sharing')==true) { 
	add_action( 'init', 'pcl_disallow_account_sharing' );
}

/**
 * 修改WordPress后台登录地址，提高安全性
 * http://www.wpdaxue.com/protected-wp-login.html
 */
/*if (cs_get_manager_option('enable_login_multiWay')==true && cs_get_manager_option('login_privateKey')!='') {  
	add_action( 'login_init', 'login_protection' );
}
function login_protection() {

	$form_request_local = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$form_request = $_SERVER['HTTP_REFERER'];
	$custom_url = site_url() . '/wp-login.php?q=' . cs_get_manager_option('login_privateKey');
	$redirect_url=(cs_get_manager_option('login_redirect_url')=='')? site_url() : cs_get_manager_option('login_redirect_url');

	if ( (is_user_logged_in(TRUE)) ) {
			return;
	}

	elseif (! ( ($form_request_local == $custom_url) || ($form_request == $custom_url) ) ) {
		
			wp_redirect( esc_url_raw ($redirect_url), 302 );
			die;
	}

}*/
if (cs_get_manager_option('enable_login_multiWay')==true && cs_get_manager_option('login_privateKey')!='') {  
	add_action('login_enqueue_scripts','login_protection'); 
} 
function login_protection(){  
	$redirect_url=(cs_get_manager_option('login_redirect_url')=='')? site_url() : cs_get_manager_option('login_redirect_url');
    if($_GET['q'] != ''.cs_get_manager_option('login_privateKey').'')header('Location: '.$redirect_url.'');  
}

/**
 * 自定义登录页面的LOGO图片
 * http://www.wpdaxue.com/custom-wordpress-login-page.html
 */
function login_logo_custom() {
    echo '<style type="text/css">
        h1 a { background-image:url('.cs_get_manager_option('custom_login_logo').') !important; }
    </style>';
}
// Hide login logo
function login_logo_hide() {
	echo '<style type="text/css">#login h1 a { display: none !important; }</style>';
}
if (cs_get_manager_option('login_logo_mode')=='2' && cs_get_manager_option('custom_login_logo')!='') {
	add_action('login_head', 'login_logo_custom');
}
if (cs_get_manager_option('login_logo_mode')=='3') {
	add_action('login_head', 'login_logo_hide');
}

/**
 * 自定义登录界面LOGO链接为任意链接
 * http://www.wpdaxue.com/custom-wordpress-login-page.html
 */
function custom_login_logo_url($url) {
	return cs_get_manager_option('custom_login_logo_url'); //修改URL地址
}
if (cs_get_manager_option('login_logo_url_mode')=='2') {
	add_filter( 'login_headerurl', 'custom_login_logo_url' );
}

/**
 * 自定义登录页面LOGO提示为任意文本
 * http://www.wpdaxue.com/custom-wordpress-login-page.html
 */
function custom_login_logo_title($url) {
    return cs_get_manager_option('custom_login_logo_title');//修改文本信息
}
if (cs_get_manager_option('login_logo_title_mode')=='2') {
	add_filter( 'login_headertitle', 'custom_login_logo_title' );
}

/**
 * 添加自定义CSS
 * http://www.wpdaxue.com/custom-wordpress-login-page.html
 */
function custom_login_style() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/inc/super-manager/assets/css/login_style'.cs_get_manager_option('login_style_mode').'.css" />';
	$background=cs_get_manager_option('custom_login_bg');
	if (cs_get_manager_option('login_style_mode')=='1' && $background['image']!='') {
		$html='<style type="text/css">';
		$html.='.login {
			background-color:'.$background['color'].';
			background-image: url('.$background['image'].'); 
			background-attachment:'.$background['attachment'].';
			background-position:'.$background['position'].'; 
			background-repeat:'.$background['repeat'].';
			}';
		$html.='</style>'."\n";
		echo $html;
	}
	if (cs_get_manager_option('login_style_mode')=='2') {
		echo '<style type="text/css">#login h1{background: '.cs_get_manager_option('custom_login_bgcolor').'!important;}</style>' . "\n";
	}
}
if (cs_get_manager_option('login_style_mode')!='3') {
	add_action('login_head', 'custom_login_style');
}

/**
 * 在登录页面添加额外的提示信息
 * https://wordpress.org/plugins/blue-login-style/
 */
if (cs_get_manager_option('custom_login_message')!='') { 
	add_filter( 'login_message', 'custom_login_message' );
}
function custom_login_message( $message ) {
	if ( empty($message) ){
		$options = cs_get_manager_option('custom_login_message');
		if ( !empty($options) ){
			return "<div class='fullwidth'><p class='tips'>" . $options ."<br></p></div>";
		}
	} else {
		return $message;
	}
}

/**
 * 在登录框添加额外的信息
 * http://www.wpdaxue.com/custom-wordpress-login-page.html
 */
function custom_login_form_info() {
    echo '<p>'.cs_get_manager_option('custom_login_form_info').'</p><br/>';
}
if (cs_get_manager_option('custom_login_form_info')!='') {
	add_action('login_form', 'custom_login_form_info');
}

/**
 * 自定义底部信息
 * http://www.wpdaxue.com/custom-wordpress-login-page.html
 */
function custom_login_footer() {
    echo '<div class="copyright">'.cs_get_manager_option('custom_login_footer').'</div>';
}
if (cs_get_manager_option('custom_login_footer')!='') {
	add_action('login_footer', 'custom_login_footer');
}