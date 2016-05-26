<?php
/**
 * User Setting of Yiwell WordPress Theme
 * Description:超级优化 - 用户管理（完结）
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
 * 用户列表隐藏超级管理员账户
 * From https://wordpress.org/support/topic/hide-admin-from-user-list-1
 */
/*if (is_admin() && cs_get_manager_option('enable_wp_admin_account_hide')==true) { 
	add_action('pre_user_query','hide_wp_admin_account');
}
function hide_wp_admin_account($user_search) {
	$user = wp_get_current_user();
	if ($user->ID!=1) { // Is not administrator, remove administrator
		global $wpdb;
		$user_search->query_where = str_replace('WHERE 1=1',"WHERE 1=1 AND {$wpdb->users}.ID<>1",$user_search->query_where);
	}
}*/
 
/**
 * WordPress 后台用户列表显示注册时间
 * http://www.wpdaxue.com/display-user-registerdate.html
 */
class RRHE {
	// Register the column - Registered
	public static function registerdate($columns) {
		$columns['registerdate'] = __('注册时间', 'registerdate');
		return $columns;
	}
 
	// Display the column content
	public static function registerdate_columns( $value, $column_name, $user_id ) {
		if ( 'registerdate' != $column_name )
			return $value;
		$user = get_userdata( $user_id );
		$registerdate = get_date_from_gmt($user->user_registered);
		return $registerdate;
	}
 
	public static function registerdate_column_sortable($columns) {
		$custom = array(
		  // meta column id => sortby value used in query
			'registerdate'    => 'registered',
			);
		return wp_parse_args($custom, $columns);
	}
 
	public static function registerdate_column_orderby( $vars ) {
		if ( isset( $vars['orderby'] ) && 'registerdate' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				'meta_key' => 'registerdate',
				'orderby' => 'meta_value'
				) );
		}
		return $vars;
	}
 
}
if (cs_get_manager_option('enable_user_register_date')==true) {  
	// Actions
	add_filter( 'manage_users_columns', array('RRHE','registerdate'));
	add_action( 'manage_users_custom_column',  array('RRHE','registerdate_columns'), 15, 3);
	add_filter( 'manage_users_sortable_columns', array('RRHE','registerdate_column_sortable') );
	add_filter( 'request', array('RRHE','registerdate_column_orderby') ); 
}

/**
 * WordPress 后台用户列表添加上次登录时间
 * http://www.wpdaxue.com/wp-user-last-login-date.html
 */
// 创建一个新字段存储用户登录时间
function insert_last_login( $login ) {
	global $user_id;
	$user = get_userdatabylogin( $login );
	update_user_meta( $user->ID, 'last_login', current_time( 'mysql' ) );
}
 
// 添加一个新栏目“上次登录”
function add_last_login_column( $columns ) {
	$columns['last_login'] = '上次登录';
	return $columns;
}
 
// 显示登录时间到新增栏目
function add_last_login_column_value( $value, $column_name, $user_id ) {
	$user = get_userdata( $user_id );
	if ( 'last_login' == $column_name && $user->last_login )
		$value = get_user_meta( $user->ID, 'last_login', ture );
	else $value = '从未登录';
	return $value;
}
if (cs_get_manager_option('enable_user_login_lastDate')==true) { 
	add_action( 'wp_login', 'insert_last_login' );
	add_filter( 'manage_users_columns', 'add_last_login_column' );
	add_action( 'manage_users_custom_column', 'add_last_login_column_value', 10, 3 );
}

/**
 * WordPress 后台用户列表显示用户昵称
 * http://www.wpdaxue.com/add-user-nickname-column.html
 */
function add_user_nickname_column($columns) {
	$columns['user_nickname'] = '昵称';
	return $columns;
}
function show_user_nickname_column_content($value, $column_name, $user_id) {
	$user = get_userdata( $user_id );
	$user_nickname = $user->nickname;
	if ( 'user_nickname' == $column_name )
		return $user_nickname;
	return $value;
}
if (cs_get_manager_option('enable_user_nickname')==true) { 
	add_filter('manage_users_columns', 'add_user_nickname_column');
	add_action('manage_users_custom_column','show_user_nickname_column_content', 20, 3);
}

/*
 * Plugin Name: Sort Users by Post Count
 * WordPress 让后台用户列表可以根据文章数进行排序
 * Description: Add a column to the Users page in the admin to sort users by post counts.https://github.com/ksemel/sort-users-by-post-count
 * http://www.wpdaxue.com/wordpress-sort-users-by-post-count.html
 * Author: Katherine Semel
*/
if ( ! class_exists('Sort_Users_By_Post_Count') && cs_get_manager_option('enable_user_sort_by_post')==true) {
    class Sort_Users_By_Post_Count {
        function Sort_Users_By_Post_Count() {
            // Make user table sortable by post count
            add_filter( 'manage_users_sortable_columns', array( $this, 'add_custom_user_sorts' ) );
        }
        /* Add sorting by post count to user page */
        function add_custom_user_sorts( $columns ) {
            $columns['posts'] = 'post_count';
            return $columns;
        }
    }
    $Sort_Users_By_Post_Count = new Sort_Users_By_Post_Count();
}