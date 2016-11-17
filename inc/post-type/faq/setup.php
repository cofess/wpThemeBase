<?php
/*
 * 自定义内容分类 - FAQ
 */
function custom_post_type_faq() {
  // 注册自定义类型
  $labels = array(
	'name'               => 'FAQ',
	'singular_name'      => 'faq',
	'add_new'            => '添加FAQ',
	'add_new_item'       => '添加新FAQ',
	'edit_item'          => '编辑',
	'new_item'           => '新FAQ',
	'all_items'          => '所有FAQ',
	'view_item'          => '查看FAQ',
	'search_items'       => '搜索FAQ',
	'not_found'          => '没找到FAQ',
	'not_found_in_trash' => '回收站中没有找到FAQ', 
	'menu_name'          => 'FAQ',
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
    'rewrite'            => array( 'slug'  => 'faq', 'with_front'  => false ),
	//'taxonomies'         => array(	'menutype','post_tag'),
	'supports' 				=> array( 'title','editor','page-attributes','comments' ),
	'menu_icon'          => 'dashicons-editor-help',
   );
  register_post_type( 'faq', $args );
  
  // 注册自定义类型分类
  /*$category_labels = array(
    'name'                         => 'FAQ分类',
    'singular_name'                => 'FAQ分类',
    'search_items'                 => '搜索FAQ分类',
    'popular_items'                => '热门FAQ分类',
    'all_items'                    => '所有FAQ分类',
    'parent_item'                  => '父级FAQ分类',
    'parent_item_colon'            => '父级FAQ分类目录:',
    'edit_item'                    => '编辑FAQ分类',
    'update_item'                  => '更新FAQ分类',
    'add_new_item'                 => '添加新FAQ分类',
    'new_item_name'                => '新FAQ分类',
    'separate_items_with_commas'   => '使用逗号分隔不同的FAQ分类',
    'add_or_remove_items'          => '添加或移除FAQ分类',
    'choose_from_most_used'        => '从使用最多的FAQ分类里选择',
    'menu_name'                    => '分类'
  );
  $category_args = array(
    'labels'        => $category_labels,
    'public'        => true,
	'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'faq-category','with_front'    => false),
  );
  register_taxonomy( 'faq-category', 'faq', $category_args );*/
  
  // 注册自定义类型标签
  /*$tag_labels = array(
    'name'                       => 'FAQ标签',
    'singular_name'              => 'FAQ标签',
    'search_items'               =>  '搜索FAQ标签',
    'popular_items'              => '热门FAQ标签',
    'all_items'                  => '所有FAQ标签',
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => '编辑FAQ标签', 
    'update_item'                => '更新FAQ标签',
    'add_new_item'               => '添加新FAQ标签',
    'new_item_name'              => '新FAQ标签',
    'separate_items_with_commas' => '用逗号分隔标签',
    'add_or_remove_items'        => '添加或删除FAQ标签',
    'choose_from_most_used'      => '选择最常用的FAQ标签',
    'menu_name'                  => 'FAQ标签',
    ); 
  $tag_args = array(
    'hierarchical'  => false,
    'labels'        => $tag_labels,
    'show_ui'       => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'     => true,
    'rewrite'       => array( 'slug' => 'faq-tag','with_front'    => false),
  );
  register_taxonomy('faq-tag','faq',$tag_args);*/
} 
add_action('init', 'custom_post_type_faq');

/*
 * 自定义内容分类的内容更新信息 - FAQ
 */
function faq_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['faq'] = array(
    0 => '', // 没有用，信息从索引 1 开始。
    1 => sprintf( __('FAQ已更新，<a href="%s">点击查看</a>', 'iwebued'), esc_url( get_permalink($post_ID) ) ),
    2 => __('自定义字段已更新。', 'iwebued'),
    3 => __('自定义字段已删除。', 'iwebued'),
    4 => __('FAQ已更新。', 'iwebued'),
    // translators: %s: 修订版本的日期与时间 
    5 => isset($_GET['revision']) ? sprintf( __('FAQ恢复到了 %s 这个修订版本。', 'iwebued'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('FAQ已发布，<a href="%s">点击查看</a>', 'iwebued'), esc_url( get_permalink($post_ID) ) ),
    7 => __('FAQ已保存', 'iwebued'),
    8 => sprintf( __('FAQ已提交， <a target="_blank" href="%s">点击预览</a>', 'iwebued'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('FAQ发布于：<strong>%1$s</strong>， <a target="_blank" href="%2$s">点击预览</a>', 'iwebued'),
      // translators: 发布选项日期格式，查看 http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('FAQ草稿已更新，<a target="_blank" href="%s">点击预览</a>', 'iwebued'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'faq_updated_messages' );