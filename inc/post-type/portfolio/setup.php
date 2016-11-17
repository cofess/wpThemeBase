<?php
/*
 * 自定义内容分类 - 作品
 */
function custom_post_type_portfolio() {
  // 注册自定义类型
  $labels = array(
	'name'               => '作品',
	'singular_name'      => '作品',
	'add_new'            => '添加作品',
	'add_new_item'       => '添加作品资料',
	'edit_item'          => '编辑',
	'new_item'           => '新作品',
	'all_items'          => '所有作品',
	'view_item'          => '查看作品',
	'search_items'       => '搜索作品',
	'not_found'          => '没找到作品',
	'not_found_in_trash' => '回收站中没有找到作品', 
	'menu_name'          => '作品',
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
    'rewrite'            => array( 'slug'  => 'portfolio', 'with_front'  => false ),
	//'taxonomies'         => array(	'menutype','post_tag'),
	'supports'           => array( 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions'),
	'menu_icon'          => 'dashicons-lightbulb',
   );
  register_post_type( 'portfolio', $args );
  
  // 注册自定义类型分类
  $category_labels = array(
    'name'                         => '作品分类',
    'singular_name'                => '作品分类',
    'search_items'                 => '搜索作品分类',
    'popular_items'                => '热门作品分类',
    'all_items'                    => '所有作品分类',
    'parent_item'                  => '父级作品分类',
    'parent_item_colon'            => '父级作品分类目录:',
    'edit_item'                    => '编辑作品分类',
    'update_item'                  => '更新作品分类',
    'add_new_item'                 => '添加新作品分类',
    'new_item_name'                => '新作品分类',
    'separate_items_with_commas'   => '使用逗号分隔不同的作品分类',
    'add_or_remove_items'          => '添加或移除作品分类',
    'choose_from_most_used'        => '从使用最多的作品分类里选择',
    'menu_name'                    => '作品分类'
  );
  $category_args = array(
    'labels'        => $category_labels,
    'public'        => true,
	'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolios','with_front'    => false),
  );
  register_taxonomy( 'portfolio_genre', 'portfolio', $category_args );  
  
  // 注册自定义类型标签
  $tag_labels = array(
    'name'                       => '作品标签',
    'singular_name'              => '作品标签',
    'search_items'               =>  '搜索作品标签',
    'popular_items'              => '热门作品标签',
    'all_items'                  => '所有作品标签',
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => '编辑作品标签', 
    'update_item'                => '更新作品标签',
    'add_new_item'               => '添加新作品标签',
    'new_item_name'              => '新作品标签',
    'separate_items_with_commas' => '用逗号分隔标签',
    'add_or_remove_items'        => '添加或删除作品标签',
    'choose_from_most_used'      => '选择最常用的作品标签',
    'menu_name'                  => '作品标签',
    ); 
  $tag_args = array(
    'hierarchical'  => false,
    'labels'        => $tag_labels,
    'show_ui'       => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'     => true,
    'rewrite'       => array( 'slug' => 'portfolio-tag','with_front'    => false),
  );
  register_taxonomy('portfolio-tag','portfolio',$tag_args);
} 
add_action('init', 'custom_post_type_portfolio');

/*
 * 自定义内容分类的内容更新信息 - 作品
 */
function portfolio_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['portfolio'] = array(
    0 => '', // 没有用，信息从索引 1 开始。
    1 => sprintf( __('作品已更新，<a href="%s">点击查看</a>', 'iwebued'), esc_url( get_permalink($post_ID) ) ),
    2 => __('自定义字段已更新。', 'iwebued'),
    3 => __('自定义字段已删除。', 'iwebued'),
    4 => __('作品已更新。', 'iwebued'),
    // translators: %s: 修订版本的日期与时间 
    5 => isset($_GET['revision']) ? sprintf( __('作品恢复到了 %s 这个修订版本。', 'iwebued'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('作品已发布，<a href="%s">点击查看</a>', 'iwebued'), esc_url( get_permalink($post_ID) ) ),
    7 => __('作品已保存', 'iwebued'),
    8 => sprintf( __('作品已提交， <a target="_blank" href="%s">点击预览</a>', 'iwebued'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('作品发布于：<strong>%1$s</strong>， <a target="_blank" href="%2$s">点击预览</a>', 'iwebued'),
      // translators: 发布选项日期格式，查看 http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('作品草稿已更新，<a target="_blank" href="%s">点击预览</a>', 'iwebued'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'portfolio_updated_messages' );