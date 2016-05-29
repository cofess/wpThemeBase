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
 * WordPress主题Single.php页面获取当前文章所属分类的一级分类的id
 * http://www.capfu.com/132.html
 <?php echo get_category_root_id(get_article_category_ID()); ?>
 */
function get_category_root_id($cat){
	$this_category = get_category($cat);
	while($this_category->category_parent){
		$this_category = get_category($this_category->category_parent);
	}
	return $this_category->term_id;
}
function get_article_category_ID(){
	$category = get_the_category();
	return $category[0]->cat_ID;
}

/**
 * WordPress获取特定分类文章数
 * http://www.ludou.org/wordpress-get-category-count.html
 */
function wt_get_category_count($input = '') {
	global $wpdb;
	if($input == '')
	{
		$category = get_the_category();
		return $category[0]->category_count;
	}
	elseif(is_numeric($input))
	{
		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
		return $wpdb->get_var($SQL);
	}
	else
	{
		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
		return $wpdb->get_var($SQL);
	}
}

/**
 * 正确获取日志摘要,正确统计中文字数
 * http://blog.wpjam.com/m/get_post_excerpt/
 */
/*function get_post_excerpt($post, $excerpt_length=240){
    if(!$post) $post = get_post();

    $post_excerpt = $post->post_excerpt;
    if($post_excerpt == ''){
        $post_content = $post->post_content;
        $post_content = do_shortcode($post_content);
        $post_content = wp_strip_all_tags( $post_content );

        $post_excerpt = mb_strimwidth($post_content,0,$excerpt_length,'…','utf-8');
    }

    $post_excerpt = wp_strip_all_tags( $post_excerpt );
    $post_excerpt = trim( preg_replace( "/[\n\r\t ]+/", ' ', $post_excerpt ), ' ' );

    return $post_excerpt;
}*/

/**
 * 访问计数
 * 
 */
function record_visitors(){
	if (is_singular()){
	 	global $post;
	  	$post_ID = $post->ID;
	  	if($post_ID){
			$post_views = (int)get_post_meta($post_ID, 'views', true);
			if(!update_post_meta($post_ID, 'views', ($post_views+1))){
				add_post_meta($post_ID, 'views', 1, true);
		  	}
	  	}
	}
}
add_action('wp_head', 'record_visitors');

/**
 * 函数名称：post_views
 * 函数作用：取得文章的阅读次数
 */
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1){
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}

/**
 * Archives 文章存档 
 * 
 */
function zww_archives_list() {
    if( !$output = get_option('zww_archives_list') ){
        $output = '<div id="archives"><p>[<a id="all_expand_collapse">全部展开/收缩</a>] <em>(注: 点击月份可以展开或者收缩)</em></p>';
        $the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1' ); //update: 加上忽略置顶文章
        $year=0; $mon=0; $i=0; $j=0;
        while ( $the_query->have_posts() ) : $the_query->the_post();
            $year_tmp = get_the_time('Y');
            $mon_tmp = get_the_time('m');
            $y=$year; $m=$mon;
            if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
            if ($year != $year_tmp && $year > 0) $output .= '</ul>';
            if ($year != $year_tmp) {
                $year = $year_tmp;
                $output .= '<h3 class="archives_year">'. $year .' 年</h3><ul class="foldList clearfix">'; //输出年份
            }
            if ($mon != $mon_tmp) {
                $mon = $mon_tmp;
                $output .= '<li><h5 class="hint--left hint--always" data-hint="'. $year .' 年'. $mon .' 月">'. $year .' 年'. $mon .' 月</h5><div class="foldContent clearfix">';
				$output .= '<div class="poptip poptip-danger"> <span class="poptip-arrow poptip-arrow-left"><em>◆</em><i>◆</i></span>';
				$output .= '<h3>'. $year .' 年'. $mon .' 月</h3>';
				$output .= '<ul class="all_post_list">'; //输出月份
            }
            $output .= '<li><i class="fa fa-angle-double-right"></i>'. get_the_time('d日: ') .'<a href="'. get_permalink() .'">'. get_the_title() .'</a> <em>('. get_comments_number('0', '1', '%') .')</em></li>'; //输出文章日期和标题
        endwhile;
        wp_reset_postdata();
        $output .= '</ul></div></div></li></ul>';
		$output .= '<div class="time-line-last">......</div>';
		$output .= '</div>';
        update_option('zww_archives_list', $output);
    }
    echo $output;
}
function clear_zal_cache() {
    update_option('zww_archives_list', ''); // 清空 zww_archives_list
}
add_action('save_post', 'clear_zal_cache'); // 新发表文章/修改文章时 

/**
 * WordPress 修改时间的显示格式为几天前
 * http://www.wpdaxue.com/time-ago.html
 */
function Bing_filter_time(){
    global $post ;
    $to = time();
    $from = get_the_time('U') ;
    $diff = (int) abs($to - $from);
    if ($diff <= 3600) {
        $mins = round($diff / 60);
        if ($mins <= 1) {
            $mins = 1;
        }
        $time = sprintf(_n('%s 分钟', '%s 分钟', $mins), $mins) . __( '前' , 'Bing' );
    }
    else if (($diff <= 86400) && ($diff > 3600)) {
        $hours = round($diff / 3600);
        if ($hours <= 1) {
            $hours = 1;
        }
        $time = sprintf(_n('%s 小时', '%s 小时', $hours), $hours) . __( '前' , 'Bing' );
    }
    elseif ($diff >= 86400) {
        $days = round($diff / 86400);
        if ($days <= 1) {
            $days = 1;
            $time = sprintf(_n('%s 天', '%s 天', $days), $days) . __( '前' , 'Bing' );
        }
        elseif( $days > 29){
            $time = get_the_time(get_option('date_format'));
        }
        else{
            $time = sprintf(_n('%s 天', '%s 天', $days), $days) . __( '前' , 'Bing' );
        }
    }
    return $time;
}
add_filter('the_time','Bing_filter_time');
