<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * 
 * 基础功能
 *  
 * Description:基础功能拓展
 * Author：xiaoxu
 * Author URI: www.iwebued.com
 */ 
/* 访问计数 */
function record_visitors()
{
	if (is_singular())
	{
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID)
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1)))
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');
 
/// 函数名称：post_views
/// 函数作用：取得文章的阅读次数
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}
//分页导航
function par_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){
		echo '<ul class="pagination text-center">';
		if(!$paged){$paged = 1;}
		echo "<li";
		if($paged == 1)echo " class='disabled'";
		echo "><a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到第一页'>&laquo;</a></li>";
	    //if($paged != 1){echo "<li><a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到第一页'>&laquo;</a></li>";}
		//previous_posts_link(' 上一页 ');
    	if($max_page > $range){
			if($paged < $range){
				for($i = 1; $i <= ($range + 1); $i++){
					echo "<li";
					if($i==$paged)echo " class='active'";
					echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";
				}
			}
			elseif($paged >= ($max_page - ceil(($range/2)))){
				for($i = $max_page - $range; $i <= $max_page; $i++){
					echo "<li";
					if($i==$paged)echo " class='active'";
					echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";
				}
			}
			elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
				for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
					echo "<li";
					if($i==$paged) echo " class='active'";
					echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";
				}
			}
		}
    	else{
			for($i = 1; $i <= $max_page; $i++){
				echo "<li";
			    if($i==$paged)echo " class='active'";
				echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";}
		}
		echo "<li";
		if($paged == $max_page)echo " class='disabled'";
		echo "><a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'>&raquo;</a></li>";
		//next_posts_link('下一页');
    	//if($paged != $max_page){echo "<li><a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'>&raquo;</a></li>";}
		echo '</ul>';
	}
	else {echo "<h5 class='mtop20 mbottom20'><i class='fa fa-refresh mright5'></i>没有更多内容了</h5>";}
}
/**
 * WordPress 给“特色图像”模块添加说明文字
 * http://www.wpdaxue.com/add-featured-image-instruction.html
 */
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction( $content ) {
	return $content .= '<p>特色图像将用来作为这篇文章的缩略图，请务必为文章选择一个特色图像。</p>';
}
/* Archives 文章存档 */
class hacklog_archives
{
    function GetPosts()
    {
        global  $wpdb;
        if ( $posts = wp_cache_get( 'posts', 'ihacklog-clean-archives' ) )
            return $posts;
        $query="SELECT DISTINCT ID,post_date,post_date_gmt,comment_count,comment_status,post_password FROM $wpdb->posts WHERE post_type='post' AND post_status = 'publish' AND comment_status = 'open'";
        $rawposts =$wpdb->get_results( $query, OBJECT );
        foreach( $rawposts as $key => $post ) {
            $posts[ mysql2date( 'Y.m', $post->post_date ) ][] = $post;
            $rawposts[$key] = null;
        }
        $rawposts = null;
        wp_cache_set( 'posts', $posts, 'ihacklog-clean-archives' );;
        return $posts;
    }
    function PostList( $atts = array() )
    {
        global $wp_locale;
        global $hacklog_clean_archives_config;
        $atts = shortcode_atts(array(
            'usejs'        => $hacklog_clean_archives_config['usejs'],
            'monthorder'   => $hacklog_clean_archives_config['monthorder'],
            'postorder'    => $hacklog_clean_archives_config['postorder'],
            'postcount'    => '1',
            'commentcount' => '1',
        ), $atts);
        $atts=array_merge(array('usejs'=>1,'monthorder'   =>'new','postorder'    =>'new'),$atts);
        $posts = $this->GetPosts();
        ( 'new' == $atts['monthorder'] ) ? krsort( $posts ) : ksort( $posts );
        foreach( $posts as $key => $month ) {
            $sorter = array();
            foreach ( $month as $post )
                $sorter[] = $post->post_date_gmt;
            $sortorder = ( 'new' == $atts['postorder'] ) ? SORT_DESC : SORT_ASC;
            array_multisort( $sorter, $sortorder, $month );
            $posts[$key] = $month;
            unset($month);
        }
        $html = '<div class="car-container">';
        //if ( 1 == $atts['usejs'] ) $html .= '<a href="#" class="car-toggler">展开所有月份'."</a>\n\n";
        $html .= '<div class="panel-group panel-accordion mb-md" id="accordion" role="tablist" aria-multiselectable="true">' . "\n";
        $firstmonth = TRUE;
		$i=1;
        foreach( $posts as $yearmonth => $posts ) {
            list( $year, $month ) = explode( '.', $yearmonth );
            $firstpost = TRUE;
            foreach( $posts as $post ) {
                if ( TRUE == $firstpost ) {
					$html .= '<div class="panel panel-default r-no mt-sm no-shadow">';
					$html .= '<div class="panel-heading bg-no prelative" role="tab" id="heading'.$i.'">';
					$html .= '<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'" class="collapsed text-nowrap">'. sprintf( __('%1$s %2$d'), $wp_locale->get_month($month), $year );
					if ( '0' != $atts['postcount'] )
                    {
                        $html .= ' <span>(' . count($posts) . ' Posts)</span>';
                    }
                    $html .= '<i class="fa fa-plus text-active control-icon"></i><i class="fa fa-minus text control-icon"></i> </a> </h4>';
					$html .= "</div>\n";
					$html .= '<div id="collapse'.$i.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$i.'">';
					$html .= "<div class='panel-body'><ul class='list-square m-no p-no list-inside hl'>\n";
                    $firstpost = FALSE;
                }
                $html .= '          <li>' .  mysql2date( 'Y-m-d', $post->post_date ) . ': <a target="_blank" href="' . get_permalink( $post->ID ) . '">' . get_the_title( $post->ID ) . '</a>';
                if ( '0' != $atts['commentcount'] && ( 0 != $post->comment_count || 'closed' != $post->comment_status ) && empty($post->post_password) )
                    $html .= ' <span>(' . $post->comment_count . ')</span>';
                $html .= "</li>\n";
            }
            $html .= "</div>\n  </div>\n  </ul>\n  </div>\n";
			$i++;
        }
        $html .= "</div>\n</div>\n";
        return $html;
    }
    function PostCount()
    {
        $num_posts = wp_count_posts( 'post' );
        return number_format_i18n( $num_posts->publish );
    }
}
if(!empty($post->post_content))
{
    $all_config=explode(';',$post->post_content);
    foreach($all_config as $item)
    {
        $temp=explode('=',$item);
        $hacklog_clean_archives_config[trim($temp[0])]=htmlspecialchars(strip_tags(trim($temp[1])));
    }
}
else
{
    $hacklog_clean_archives_config=array('usejs'=>1,'monthorder'   =>'new','postorder'    =>'new');
}
$hacklog_archives=new hacklog_archives();