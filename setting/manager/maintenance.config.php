<?php
/**
 * Maintenance Setting of Yiwell WordPress Theme
 * Description:超级优化 - 网站维护（完结）
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

// 激活维护模式 Activate maintenance mode?
if (cs_get_manager_option('enable_maintenance')==true) { 
	add_action('template_redirect', 'load_maintenance_mode');
}
// Do maintenance mode
function load_maintenance_mode() {
	
	// Load theme and other variables
	$theme = cs_get_manager_option('maintenance_theme');
	
	// 未设置主题或者IP白名单用户关闭维护模式 Do some checks
	if($theme == '' || check_ip_exclude()) {
		return false;
	}
	// 开启“到达指定的维护完成时间自动结束维护模式”并且服务器当前时间大于维护完成时间时关闭维护模式
	if(cs_get_manager_option('enable_maintenance_auto_end') && date('Y/m/d',current_time('timestamp')) > cs_get_manager_option('maintenance_completeDate')){
		return false;
	}	
	
	// Start output
	nocache_headers();
	ob_start();
	
	// Set 503?
	if(cs_get_manager_option('enable_maintenance_503')==true) {
		status_header(503);//设置 503 HTTP状态码
	}
	
	// Set actions
	add_action('mm_header', 'maintenance_mode_header');
	add_action('mm_footer', 'maintenance_mode_footer');

	// Load template
	include_once(dirname( __FILE__ ) . '/maintenance_themes/'. $theme .'.php');
	ob_flush();
	exit();
}

// Check if this IP is to be excluded
function check_ip_exclude() {
	
	$is_excluded = false;
	$addresses = cs_get_manager_option('maintenance_ip_exclude');
	
	if($addresses != '') {
		$addresses = preg_split("/\n/", $addresses);
		
		// Loop
		foreach($addresses as $address) {
			$address = trim($address);
			if((!empty($_SERVER['REMOTE_ADDR']) AND strstr($_SERVER['REMOTE_ADDR'], $address)) OR (!empty($_SERVER['REQUEST_URI']) AND strstr($_SERVER['REQUEST_URI'], $address))) {
				$is_excluded = true;
				break;
			}
		}
	}

	return $is_excluded;
}

// Header for maintenance mode
function maintenance_mode_header() {
	
	// Create tags used in tempate
	$theme = cs_get_manager_option('maintenance_theme');
	$robots = (get_option('blog_public') == 0) ? 'noindex, nofollow' : 'index, follow';
	$robots = apply_filters('meta_robots', $robots);
	echo '<meta name="robots" content="'. esc_attr($robots) .'" />' . "\r\n";
	
	// Load styles and scripts
	global $wp_styles;
	wp_register_style('mm_style',  SETTING_URI .'/manager/maintenance_themes/assets/css/style.css');
		
	if ( !is_admin() ) { /** Load Scripts and Style on Website Only */  
		// Output styles and scripts
		$wp_styles->do_items('mm_style');
		$background=cs_get_manager_option('maintenance_background');
		$html='<style type="text/css">';
		if(cs_get_manager_option('maintenance_body_background')) $html.='body{background-color:'.cs_get_manager_option('maintenance_body_background').'!important;}';
		if(cs_get_manager_option('maintenance_subject_color')) $html.='.subject{color:'.cs_get_manager_option('maintenance_subject_color').'!important;}';
		if(cs_get_manager_option('maintenance_content_color')) $html.='.content{color:'.cs_get_manager_option('maintenance_content_color').'!important;}';
		if(cs_get_manager_option('maintenance_footer_color')) $html.='.copyright{color:'.cs_get_manager_option('maintenance_footer_color').'!important;}';
		if(cs_get_manager_option('maintenance_date_color')) $html.='.counter ul{color:'.cs_get_manager_option('maintenance_date_color').'!important;}';
		if($background['image']) {
			$html.='.parallax {
			background-color:'.$background['color'].';
			background-image: url('.$background['image'].'); 
			background-attachment:'.$background['attachment'].';
			background-position:'.$background['position'].'; 
			background-repeat:'.$background['repeat'].';
			}';
		}
		//social style
		/*if(cs_get_manager_option('enable_maintenance_social')){
			foreach (cs_get_manager_option('maintenance_social') as $key=>$val) {
				if($val['maintenance_social_color']) $html.='.'.$val['maintenance_social_class'].'{color:'.$val['maintenance_social_color'].'!important;}';
				if($val['maintenance_social_border_color']) $html.='.'.$val['maintenance_social_class'].'{border-color:'.$val['maintenance_social_border_color'].'!important;}';
				if($val['maintenance_social_hover_background']) $html.='.'.$val['maintenance_social_class'].':hover{background-color:'.$val['maintenance_social_hover_background'].'!important;color:#fff!important;border-color:'.$val['maintenance_social_hover_background'].'!important;}';
			}
		}*/
		//custom style
		if(cs_get_manager_option('maintenance_custom_style')){
			$html.=cs_get_manager_option('maintenance_custom_style');
		}
		$html.='</style>'."\n";
		echo $html;		
	}
}

// Footer for maintenance mode
function maintenance_mode_footer() {
	# Not used right now
	global $wp_scripts;
	wp_register_script('mm_frontend', SETTING_URI .'/manager/maintenance_themes/assets/js/maintenance_mode.js', 'jquery');
	if ( !is_admin() ) { /** Load Scripts and Style on Website Only */ 
		$wp_scripts->do_items('jquery');
		$wp_scripts->do_items('mm_frontend');
	}
}

// Show maintenance mode notice
if(cs_get_manager_option('enable_maintenance')==true && cs_get_manager_option('enable_maintenance_notice')==true) {
	add_action('admin_notices', 'my_maintenance_mode_notice');
}
// Show maintenance mode notice
function my_maintenance_mode_notice() {
	?>
    <div class="error awpm">
		<p><?php echo __('温馨提示：网站已开启维护模式，无法正常访问，维护完成后别忘记关闭维护模式！', 'CS_TEXTDOMAIN'); ?></p>
    </div>
    <?php
}