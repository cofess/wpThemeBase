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
function get_post_views(){
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  return $views;
}

/**
 * Archives 文章存档 
 * 
 */
function zww_archives_list() {
    if( !$output = get_option('zww_archives_list') ){
        $the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1' ); //update: 加上忽略置顶文章
        $year=0; $mon=0; $i=0; $j=0;
        while ( $the_query->have_posts() ) : $the_query->the_post();
            $year_tmp = get_the_time('Y');
            $mon_tmp = get_the_time('m');
            $y=$year; $m=$mon;
            if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></article></section>';
            if ($year != $year_tmp && $year > 0) $output .= '</div></div></div>';
            if ($year != $year_tmp) {
                $year = $year_tmp;
                $output .= '<div class="chapter">';
                $output .= '<div class="container"><div class="chapter-header clearfix">';
                $output .= '<h3 class="archives_year m-no">'. $year .'</h3></div>'; //输出年份
                $output .= '<button type="button" class="chapterTogger"></button></div>';
                $output .= '<div class="container"><div class="chapter-body">';

                //不同年份相同月份
                if ($mon == $mon_tmp) {
                    $mon = $mon_tmp;                
                    $output .= '<section><header><h4>'. $year .'/'. $mon .'</h4></header>';
                    $output .= '<article><ul class="list-unstyled">';
                }
            } 
            //不同年份不同月份        
            if ($mon != $mon_tmp) {
                $mon = $mon_tmp;                
                $output .= '<section><header><h4>'. $year .'/'. $mon .'</h4></header>';
                $output .= '<article><ul class="list-unstyled">';
            }
            $output .= '<li><h3 class="fs-xs text-nowrap-2x"><a href="'. get_permalink() .'" title="'. get_the_title() .'">▪ '. get_the_title() .'</a></h3><p class="text-muted"><span class="meta-date"><i class="fa fa-calendar-check-o fa-fw"></i> '. get_the_time('y/m/d') .' </span><span class="meta-comment mh-1x"><i class="fa fa-comment-o fa-fw"></i> '. get_comments_number('0', '1', '%') .' </span><span class="meta-view"><i class="fa fa-eye fa-fw"></i> '. get_post_views() .' </span></p></li>';
        endwhile;
        wp_reset_postdata();
		$output .= '</div>';
        update_option('zww_archives_list', $output);
    }
    echo $output;
}
function clear_zal_cache() {
    update_option('zww_archives_list', ''); // 清空 zww_archives_list
}
//add_action('init', 'clear_zal_cache');
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
//add_filter('the_time','Bing_filter_time');
