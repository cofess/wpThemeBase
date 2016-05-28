<?php
/**
 * Admin Init of Yiwell WordPress Theme
 * Description:初始化 - 后台初始化
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

add_theme_support( 'post-thumbnails' );//开启特色图像功能

/**
 * WordPress 给“特色图像”模块添加说明文字
 * http://www.wpdaxue.com/add-featured-image-instruction.html
 */
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction( $content ) {
	return $content .= '<p>特色图像将用来作为这篇文章的缩略图，请务必为文章选择一个特色图像。</p>';
}

/*
 * 用户列表隐藏超级管理员账户（ID为1的管理员）
 * From https://wordpress.org/support/topic/hide-admin-from-user-list-1
 */
add_action('pre_user_query','hide_wp_admin_account');
function hide_wp_admin_account($user_search) {
	$user = wp_get_current_user();
	if ($user->ID!=1) { // Is not administrator, remove administrator
		global $wpdb;
		$user_search->query_where = str_replace('WHERE 1=1',"WHERE 1=1 AND {$wpdb->users}.ID<>1",$user_search->query_where);
	}
}
 
/**
 * WordPress 4.2 修复仪表盘头像错位
 * http://www.wpdaxue.com/disable-emoji.html
 */
function fixed_activity_widget_avatar_style(){
  echo '<style type="text/css">
            #activity-widget #the-comment-list .avatar {
            position: absolute;
            top: 13px;
            width: 50px;
            height: 50px;
          }
          </style>';
}
add_action('admin_head', 'fixed_activity_widget_avatar_style' );

/**
 * 将 WordPress 3.8 仪表盘设置为单栏布局
 * http://www.wpdaxue.com/wordpress-3-8-single-column-dashboard.html
 */
function dashboard_screen_layout_columns($columns) {
	$columns['dashboard'] = 3;
	return $columns;
}
add_filter('screen_layout_columns', 'dashboard_screen_layout_columns');
 
function dashboard_screen_layout_column() { return 1; }
add_filter('get_user_option_screen_layout_dashboard', 'dashboard_screen_layout_column');

/**
 * 移除WP为仪表盘(dashboard)页面加载的小工具
 * http://yusi123.com/2904.html
 * http://www.wpdaxue.com/speed-up-wordpress.html
 */
function disable_dashboard_widgets() {   
    //remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');//近期评论 
    //remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal');//近期草稿
    remove_meta_box('dashboard_primary', 'dashboard', 'core');//wordpress博客  
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');//wordpress其它新闻  
    //remove_meta_box('dashboard_right_now', 'dashboard', 'core');//wordpress概况  
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');//wordresss链入链接  
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');//wordpress链入插件  
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');//wordpress快速发布   
}  
add_action('admin_menu', 'disable_dashboard_widgets');

/**
 * 在WordPress仪表盘“概况”小工具显示置顶文章
 * https://core.trac.wordpress.org/ticket/21046
 * http://wpninjas.com/add-information-to-the-right-now-dashboard-widget/
 * https://wordpress.org/support/topic/dashboard-at-a-glance-custom-post-types
 */
add_action( 'dashboard_glance_items' , 'sticky_posts_dashboard_widget' ); 
function sticky_posts_dashboard_widget() {
		$sticky = get_option( 'sticky_posts', array() );

		echo '<li class="post-count stickyposts">';
		echo '<a  href="edit.php?post_type=post&show_sticky=1">' . sprintf(_n('仅%s 篇置顶文章', '%s 篇置顶文章', count( $sticky ), 'CS_TEXTDOMAIN'), count( $sticky ) ) . '</a>';
		echo '</li>';
}
 
/**
 * WordPress 仪表盘显示待审核的文章列表
 * http://blog.wpjam.com/m/pending-posts-dashboard-widget/
 * Plugin URI:   http://wordpress.org/extend/plugins/pendig-reviews-dashboard-widget/
 */
define('BADashboard_PendingReview_DOMAIN', 'ba-dashboard-widget-pending-review');
define('BADashboard_PendingReview_OPTION_NAME', 'BADashboardPendingReview');
define('BADashboard_PendingReview_WidgetID', 'BADashboardPendingReview'); 
/** Main Widget function */
function BADashboardPendingReview_Main() {
	// Add the widget to the dashboard
	global $wpdb;
	$widget_options = BADashboardPendingReview_Options();

	$request = "SELECT $wpdb->posts.*, display_name as name FROM $wpdb->posts LEFT JOIN $wpdb->users ON $wpdb->posts.post_author=$wpdb->users.ID ";
	if ($widget_options['hidepages']) {
		$request .= "WHERE post_status='pending' AND post_type IN ('post') ";
	} else {
		$request .= "WHERE post_status='pending' AND post_type IN ('post','page') ";
	}

	$request .= "ORDER BY post_date DESC LIMIT ".$widget_options['items_view_count'];
	$posts = $wpdb->get_results($request);

	if ( $posts ) {
		echo "<ul id='ba-widget-pending-review-list'>\n";

		foreach ( $posts as $post ) {
			if (current_user_can( 'edit_post', $post->ID )) {
				$post_meta = sprintf('%s', '<a href="post.php?action=edit&amp;post=' . $post->ID . '">' . get_the_title($post->ID) . '</a> ' );
			} else {
				$post_meta = sprintf('%s', '<span style="text-decoration:underline">' . get_the_title() . '</span>' );
			}

			if($widget_options['showauthor']) {
				$post_meta.= sprintf('%s %s', __('by', 'CS_TEXTDOMAIN'), '<strong>'. $post->name .'</strong> ' );
			}

			if($widget_options['showtime']) {
				$time = get_post_time('G', true);

				if ( ( abs(time() - $time) ) < 86400 ) {
					$h_time = sprintf( __('%s 以前', 'CS_TEXTDOMAIN'), human_time_diff( $time ) );
				} else {
					$h_time = mysql2date(__('Y/m/d'), $post->post_date);
				}

				$post_meta.= sprintf( __('&#8212; %s', 'CS_TEXTDOMAIN'),'<abbr title="' . get_post_time(__('Y/m/d H:i:s')) . '">' . $h_time . '</abbr>' );
			}

			echo "<li class='post-meta'>" . $post_meta . "</li>";
		}

		echo "</ul>\n";
	} else {
		echo '<p>' . _e( "目前没有待审文章", 'CS_TEXTDOMAIN' ) . "</p>\n";
	}

}

/**
 * Setup the widget.
 * - reads the saved options from the database
 */
function BADashboardPendingReview_Setup() {
	$options = BADashboardPendingReview_Options();

	if ( 'post' == strtolower($_SERVER['REQUEST_METHOD']) && isset( $_POST['widget_id'] ) && BADashboard_PendingReview_WidgetID == $_POST['widget_id'] ) {
		foreach ( array( 'items_view_count', 'hidepages', 'showtime', 'showauthor' ) as $key )
		$options[$key] = $_POST[$key];
		update_option( BADashboard_PendingReview_OPTION_NAME, $options );
	}

	?>

<p>
  <label for="items_view_count">
    <?php _e('显示多少篇待审文章', 'CS_TEXTDOMAIN' ); ?>
    <select id="items_view_count" name="items_view_count">
      <?php
for ( $i = 5; $i <= 20; $i = $i + 1 )
echo "<option value='$i'" . ( $options['items_view_count'] == $i ? " selected='selected'" : '' ) . ">$i</option>";
?>
    </select>
  </label>
</p>
<p>
  <label for="hidepages">
    <input id="hidepages" name="hidepages"
	type="checkbox" value="1"
	<?php if ( $options['hidepages'] == 1 ) echo ' checked="checked"'; ?> />
    <?php _e('隐藏页面类型', 'CS_TEXTDOMAIN' ); ?>
  </label>
</p>
<p>
  <label for="showauthor">
    <input id="showauthor" name="showauthor"
	type="checkbox" value="1"
	<?php if ( $options['showauthor'] == 1 ) echo ' checked="checked"'; ?> />
    <?php _e('显示文章作者', 'CS_TEXTDOMAIN' ); ?>
  </label>
</p>
<p>
  <label for="showtime">
    <input id="showtime" name="showtime"
	type="checkbox" value="1"
	<?php if ( $options['showtime'] == 1 ) echo ' checked="checked"'; ?> />
    <?php _e('显示日期', 'CS_TEXTDOMAIN' ); ?>
  </label>
</p>
<?php
} //end function


/** Options */

/** Configuration Options of the widget */
function BADashboardPendingReview_Options() {
	$defaults = array( 'items_view_count' => 5, 'hidepages' => 0, 'showtime' => 1, 'showauthor' => 1);
	if ( ( !$options = get_option( BADashboard_PendingReview_OPTION_NAME ) ) || !is_array($options) )
	$options = array();
	return array_merge( $defaults, $options );
}

/** initial the widget */
function BADashboardPendingReview_Init() {
	if(current_user_can('manage_options')){ //只有管理员才能看到
		wp_add_dashboard_widget( BADashboard_PendingReview_WidgetID, __('待审文章', 'CS_TEXTDOMAIN'), 'BADashboardPendingReview_Main', 'BADashboardPendingReview_Setup');
	}
}

/** use hook, to integrate the widget */
add_action('wp_dashboard_setup', 'BADashboardPendingReview_Init');

/**
 * 更改编辑器默认视图为可视化
 * http://www.wpdaxue.com/tinymce-custom-methods.html
 */
add_filter('wp_default_editor', create_function('', 'return "tinymce";'));

//设置 HTML 为默认编辑器
//add_filter( 'wp_default_editor', create_function('', 'return "html";') );

/**
 * 让编辑器支持中文拼写检查
 * http://www.wpdaxue.com/tinymce-custom-methods.html
 */
function fb_mce_external_languages($initArray){
	$initArray['spellchecker_languages'] = '+Chinese=zh,English=en'; 
	return $initArray;
}
add_filter('tiny_mce_before_init', 'fb_mce_external_languages');

/**
 * 在WordPress仪表盘“概况”小工具显示自定义文章类型的数据
 * http://www.wpdaxue.com/include-custom-post-types-in-dashboard-widget.html
 * https://wordpress.org/support/topic/dashboard-at-a-glance-custom-post-types
 */ 
// Add Custom Post Type to WP-ADMIN Right Now Widget
// Ref Link: http://wpsnipp.com/index.php/functions-php/include-custom-post-types-in-right-now-admin-dashboard-widget/
// http://wordpress.org/support/topic/dashboard-at-a-glance-custom-post-types
// http://halfelf.org/2012/my-custom-posttypes-live-in-mu/
function vm_right_now_content_table_end() {
    $args = array(
        'public' => true ,
        '_builtin' => false
    );
    $output = 'object';
    $operator = 'and';
    $post_types = get_post_types( $args , $output , $operator );
    foreach( $post_types as $post_type ) {
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->name, $post_type->labels->name , intval( $num_posts->publish ) );
        if ( current_user_can( 'edit_posts' ) ) {
            $cpt_name = $post_type->name;
        }
        echo '<li class="post-count"><tr><a href="edit.php?post_type='.$cpt_name.'"><td class="first b b-' . $post_type->name . '"></td>' . $num . '&nbsp;<td class="t ' . $post_type->name . '">' . $text . '</td></a></tr></li>';
    }
    $taxonomies = get_taxonomies( $args , $output , $operator );
    foreach( $taxonomies as $taxonomy ) {
        $num_terms  = wp_count_terms( $taxonomy->name );
        $num = number_format_i18n( $num_terms );
        $text = _n( $taxonomy->labels->name, $taxonomy->labels->name , intval( $num_terms ));
        if ( current_user_can( 'manage_categories' ) ) {
            $cpt_tax = $taxonomy->name;
        }
        echo '<li class="post-count"><tr><a href="edit-tags.php?taxonomy='.$cpt_tax.'"><td class="first b b-' . $taxonomy->name . '"></td>' . $num . '&nbsp;<td class="t ' . $taxonomy->name . '">' . $text . '</td></a></tr></li>';
    }
}
add_action( 'dashboard_glance_items' , 'vm_right_now_content_table_end' );

/**
 * WordPress 添加自定义文章类型的存档页面到菜单
 * http://www.wpdaxue.com/add-custom-post-types-archive-to-nav-menus.html
 */
if( !class_exists('CustomPostTypeArchiveInNavMenu') ) {
	class CustomPostTypeArchiveInNavMenu {
		function CustomPostTypeArchiveInNavMenu() {
			add_action( 'admin_head-nav-menus.php', array( &$this, 'cpt_navmenu_metabox' ) );
			add_filter( 'wp_get_nav_menu_items', array( &$this,'cpt_archive_menu_filter'), 10, 3 );
		}
		function cpt_navmenu_metabox() {
			add_meta_box( 'add-cpt', __('自定义文章类型存档'), array( &$this, 'cpt_navmenu_metabox_content' ), 'nav-menus', 'side', 'default' );
		}
		function cpt_navmenu_metabox_content() {
			$post_types = get_post_types( array( 'show_in_nav_menus' => true, 'has_archive' => true ), 'object' );
			if( $post_types ) {
				foreach ( $post_types as &$post_type ) {
					$post_type->classes = array();
					$post_type->type = $post_type->name;
					$post_type->object_id = $post_type->name;
					$post_type->title = $post_type->labels->name . __( '存档' );
					$post_type->object = 'cpt-archive';
				}
				$walker = new Walker_Nav_Menu_Checklist( array() );
				echo '<div id="cpt-archive" class="posttypediv">';
				echo '<div id="tabs-panel-cpt-archive" class="tabs-panel tabs-panel-active">';
				echo '<ul id="ctp-archive-checklist" class="categorychecklist form-no-clear">';
				echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $post_types), 0, (object) array( 'walker' => $walker) );
				echo '</ul>';
				echo '</div><!-- /.tabs-panel -->';
				echo '</div>';
				echo '<p class="button-controls">';
				echo '<span class="add-to-menu">';
				echo '<input type="submit"' . disabled( $nav_menu_selected_id, 0 ) . ' class="button-secondary submit-add-to-menu right" value="'. __('添加至菜单') . '" name="add-ctp-archive-menu-item" id="submit-cpt-archive" />';
				echo '<span class="spinner"></span>';
				echo '</span>';
				echo '</p>';
			} else {
				echo '没有自定义文章类型';
			}
		}
		function cpt_archive_menu_filter( $items, $menu, $args ) {
			foreach( $items as &$item ) {
				if( $item->object != 'cpt-archive' ) continue;
				$item->url = get_post_type_archive_link( $item->type );
				if( get_query_var( 'post_type' ) == $item->type ) {
					$item->classes[] = 'current-menu-item';
					$item->current = true;
				}
			}
			return $items;
		}
	}
	$CustomPostTypeArchiveInNavMenu = new CustomPostTypeArchiveInNavMenu();
}


