<?php
/**
 * Rewrite Setting of Yiwell WordPress Theme
 * Description:超级优化 - 固定链接(完结)
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
 * 分类url去除category字样
 * 参考：http://www.boke8.net/wordpress-auto-rename-file.html
 * Plugin URI: http://www.aips.me/wordpress-upload-pictures-renamed.html
 */
if (cs_get_manager_option('enable_no_categoty')==true && !function_exists("no_category_base_refresh_rules")) {
	function no_category_base_refresh_rules()
	{
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}
	function no_category_base_deactivate()
	{
		remove_filter("category_rewrite_rules", "no_category_base_rewrite_rules");
		no_category_base_refresh_rules();
	}
	function no_category_base_permastruct()
	{
		global $wp_rewrite;
		global $wp_version;

		if (version_compare($wp_version, "3.4", "<")) {
			$wp_rewrite->extra_permastructs["category"][0] = "%category%";
		}
		else {
			$wp_rewrite->extra_permastructs["category"]["struct"] = "%category%";
		}
	}
	function no_category_base_rewrite_rules($category_rewrite)
	{
		$category_rewrite = array();
		$categories = get_categories(array("hide_empty" => false));

		foreach ($categories as $category ) {
			$category_nicename = $category->slug;

			if ($category->parent == $category->cat_ID) {
				$category->parent = 0;
			}
			else if ($category->parent != 0) {
				$category_nicename = get_category_parents($category->parent, false, "/", true) . $category_nicename;
			}

			$category_rewrite["(" . $category_nicename . ")/(?:feed/)?(feed|rdf|rss|rss2|atom)/?\$"] = "index.php?category_name=\$matches[1]&feed=\$matches[2]";
			$category_rewrite["(" . $category_nicename . ")/page/?([0-9]{1,})/?\$"] = "index.php?category_name=\$matches[1]&paged=\$matches[2]";
			$category_rewrite["(" . $category_nicename . ")/?\$"] = "index.php?category_name=\$matches[1]";
		}

		global $wp_rewrite;
		$old_category_base = (get_option("category_base") ? get_option("category_base") : "category");
		$old_category_base = trim($old_category_base, "/");
		$category_rewrite[$old_category_base . "/(.*)\$"] = "index.php?category_redirect=\$matches[1]";
		return $category_rewrite;
	}
	function no_category_base_query_vars($public_query_vars)
	{
		$public_query_vars[] = "category_redirect";
		return $public_query_vars;
	}
	function no_category_base_request($query_vars)
	{
		if (isset($query_vars["category_redirect"])) {
			$catlink = trailingslashit(get_option("home")) . user_trailingslashit($query_vars["category_redirect"], "category");
			status_header(301);
			header("Location: $catlink");
			exit();
		}

		return $query_vars;
	}
	register_activation_hook(__FILE__, "no_category_base_refresh_rules");
	add_action("created_category", "no_category_base_refresh_rules");
	add_action("edited_category", "no_category_base_refresh_rules");
	add_action("delete_category", "no_category_base_refresh_rules");
	register_deactivation_hook(__FILE__, "no_category_base_deactivate");
	add_action("init", "no_category_base_permastruct");
	add_filter("category_rewrite_rules", "no_category_base_rewrite_rules");
	add_filter("query_vars", "no_category_base_query_vars");
	add_filter("request", "no_category_base_request");
}

/**
 * 修改搜索结果的链接
 * 参考：http://www.wpdaxue.com/redirect-wordpress-searches.html
 */ 
function redirect_search() {
	if (is_search() && !empty($_GET['s'])) {
		wp_redirect(home_url("/search/").urlencode(get_query_var('s')));
		exit();
	}
}
if (cs_get_manager_option('enable_search_link_redirect')==true) {
	add_action('template_redirect', 'redirect_search' );
}

/**
 * 将任意二维数组转换一维数组(键值对数组)  
 * 参考：https://raremvc.googlecode.com/svn/branches/addon/other/array.class.php
 */ 
function toHash($arr,$k,$vk=null){
	if(!is_array($arr))return array();
	$result=array();
	foreach ($arr as $one){
		if(isset($one[$k])){
			$value=empty($vk)?$one:(isset($one[$vk])?trim($one[$vk]):"");
			$result[trim($one[$k])]=$value;
		} 
	}
	return $result;
} 

/**
 * 自定义文章类型固定链接：别名形式
 * 参考：http://yfdxs.com/custom-post-type-permalink.html
 */  
/**$post_name_rewrites = array(
	'dwqa-question' => 'question',//问答自定义文章类型
); */
$post_name_rewrites=toHash(cs_get_manager_option('post_name_rewrites'),'post_type','post_type_slug');  
add_filter('post_type_link', 'post_type_name_rewrites', 1, 3);
function post_type_name_rewrites( $link, $post = 0 ){
    global $post_name_rewrites;
    if ( in_array( $post->post_type,array_keys($post_name_rewrites) ) ){
        return home_url( $post_name_rewrites[$post->post_type].'/' . $post->post_name .'.html' );
    } else {
        return $link;
    }
}
add_action( 'init', 'post_type_name_rewrites_init' );
function post_type_name_rewrites_init(){
    global $post_name_rewrites;
    foreach( $post_name_rewrites as $k => $v ) {
        add_rewrite_rule(
            $v.'/([一-龥a-zA-Z0-9_-]+)?.html([sS]*)?$',
            'index.php?post_type='.$k.'&name=$matches[1]',
            'top' );
    }
} 

/**
 * 自定义文章类型固定链接：ID形式
 * 参考：http://yfdxs.com/custom-post-type-permalink.html
 */ 
/**$post_id_rewrites = array(
	'product' => 'product',//Woocommerce产品自定义文章类型
); */
$post_id_rewrites=toHash(cs_get_manager_option('post_id_rewrites'),'post_type','post_type_slug'); 
add_filter('post_type_link', 'post_type_id_rewrites', 1, 3);
function post_type_id_rewrites( $link, $post = 0 ){
    global $post_id_rewrites;
    if ( in_array( $post->post_type,array_keys($post_id_rewrites) ) ){
        return home_url( $post_id_rewrites[$post->post_type].'/' . $post->ID .'.html' );
    } else {
        return $link;
    }
}
add_action( 'init', 'post_type_id_rewrites_init' );
function post_type_id_rewrites_init(){
    global $post_id_rewrites;
    foreach( $post_id_rewrites as $k => $v ) {
        add_rewrite_rule(
            $v.'/([0-9]+)?.html$',
            'index.php?post_type='.$k.'&p=$matches[1]',
            'top' );
    }
}  
