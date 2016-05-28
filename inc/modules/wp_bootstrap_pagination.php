<?php
/**
 * WordPress Bootstrap Pagination
 */

/**
 * 自定义每页显示文章数
 * http://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops
 */
// posts per page based on CPT
function custom_posts_per_page($query){
    switch ( $query->query_vars['post_type'] ){
        case 'food':  // Post Type named 'food'
            $query->query_vars['posts_per_page'] = 1;
            break;

        case 'event':  // Post Type named 'event'
            $query->query_vars['posts_per_page'] = 4;
            break;

        case 'post':  // Post Type named 'event'
            $query->query_vars['posts_per_page'] = 1;
            break;			

        default:
            break;
    }
    return $query;
}

if( !is_admin() ){
    add_filter( 'pre_get_posts', 'custom_posts_per_page' );
}


function bootstrap_pagination($pages = '', $range = 2){  
     $showitems = ($range * 2)+1;  

     global $paged,$prev,$next;
     if(empty($paged)) $paged = 1;

     if($pages == ''){
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages){$pages = 1;}
     }
	 
	 if($paged == 1){
		 $prev="class='disabled'";
	 } elseif($paged == $pages){
		 $next="class='disabled'";
	 } else{
		 $prev='';
		 $next='';
	 }

     if(1 != $pages){
         echo "<ul class='pagination pagination-lg pagination-basic'>";
         if($pages > 2 ) echo "<li ".$prev."><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";//首页
         if($pages > 1 ) echo "<li ".$prev."><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";//上一页

         for ($i=1; $i <= $pages; $i++){
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                 echo ($paged == $i)? "<li><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }
         
         if ($pages > 1) echo "<li ".$next."><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>"; //下一页
         if ($pages > 2) echo "<li ".$next."><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";//尾页
         echo "</ul>\n";
     }
}