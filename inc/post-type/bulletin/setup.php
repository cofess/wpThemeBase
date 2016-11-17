<?php
/*
 * 自定义内容分类 - 公告
 */
function custom_post_type_bulletin() {
  // 注册自定义类型
  $labels = array(
	'name'               => '公告',
	'singular_name'      => '公告',
	'add_new'            => '添加公告',
	'add_new_item'       => '添加新公告',
	'edit_item'          => '编辑',
	'new_item'           => '新公告',
	'all_items'          => '所有公告',
	'view_item'          => '查看公告',
	'search_items'       => '搜索公告',
	'not_found'          => '没找到公告',
	'not_found_in_trash' => '回收站中没有找到公告', 
	'menu_name'          => '公告',
	'parent_item_colon'  => '',
  );
  $args = array(
    'labels'             => $labels,
    'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'show_in_nav_menus'	 => true ,
	'query_var'          => true,
	'capability_type'    => 'post',
	'exclude_from_search'=> false,
	'has_archive'        => true,
	'hierarchical'       => true,
    'menu_position'      => 5,
    'rewrite'            => array( 'slug'  => 'bulletin', 'with_front'  => false ),
	//'taxonomies'         => array(	'menutype','post_tag'),
	'supports'           => array( 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions'),
	'menu_icon'          => 'dashicons-testimonial',
   );
  register_post_type( 'bulletin', $args );
  
  // 注册自定义类型分类
  $category_labels = array(
    'name'                         => '公告分类',
    'singular_name'                => '公告分类',
    'search_items'                 => '搜索公告分类',
    'popular_items'                => '热门公告分类',
    'all_items'                    => '所有公告分类',
    'parent_item'                  => '父级公告分类',
    'parent_item_colon'            => '父级公告分类目录:',
    'edit_item'                    => '编辑公告分类',
    'update_item'                  => '更新公告分类',
    'add_new_item'                 => '添加新公告分类',
    'new_item_name'                => '新公告分类',
    'separate_items_with_commas'   => '使用逗号分隔不同的公告分类',
    'add_or_remove_items'          => '添加或移除公告分类',
    'choose_from_most_used'        => '从使用最多的公告分类里选择',
    'menu_name'                    => '公告分类'
  );
  $category_args = array(
    'labels'        => $category_labels,
    'public'        => true,
	'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'bulletins','with_front'    => false),
  );
  register_taxonomy( 'bulletin_genre', 'bulletin', $category_args );  
} 
add_action('init', 'custom_post_type_bulletin');

/*
 * 自定义内容分类的内容更新信息 - 公告
 */
function bulletin_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['bulletin'] = array(
    0 => '', // 没有用，信息从索引 1 开始。
    1 => sprintf( __('公告已更新，<a href="%s">点击查看</a>', 'iwebued'), esc_url( get_permalink($post_ID) ) ),
    2 => __('自定义字段已更新。', 'iwebued'),
    3 => __('自定义字段已删除。', 'iwebued'),
    4 => __('公告已更新。', 'iwebued'),
    // translators: %s: 修订版本的日期与时间 
    5 => isset($_GET['revision']) ? sprintf( __('公告恢复到了 %s 这个修订版本。', 'iwebued'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('公告已发布，<a href="%s">点击查看</a>', 'iwebued'), esc_url( get_permalink($post_ID) ) ),
    7 => __('公告已保存', 'iwebued'),
    8 => sprintf( __('公告已提交， <a target="_blank" href="%s">点击预览</a>', 'iwebued'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('公告发布于：<strong>%1$s</strong>， <a target="_blank" href="%2$s">点击预览</a>', 'iwebued'),
      // translators: 发布选项日期格式，查看 http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('公告草稿已更新，<a target="_blank" href="%s">点击预览</a>', 'iwebued'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'bulletin_updated_messages' );
