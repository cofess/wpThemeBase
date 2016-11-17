<?php
//使用自定义分类法创建过滤器
function filter_faq_list() {
    $screen = get_current_screen();
    global $wp_query;
    if ( $screen->post_type == 'faq' ) {
        wp_dropdown_categories( array(
            'show_option_all' => '查看所有分类',
            'taxonomy' => 'faq_genre',
            'name' => 'faq_genre',
            'orderby' => 'name',
            'selected' => (isset( $wp_query->query['faq_genre'] ) ? $wp_query->query['faq_genre'] : '暂无分类' ),
            'hierarchical' => false,
            'depth' => 3,
            'show_count' => true,
            'hide_empty' => false,
        ) );
    }
}
add_action( 'restrict_manage_posts', 'filter_faq_list' );
//查询
function perform_filtering_faq( $query ) {
    $qv = &$query->query_vars;
    if ( ( $qv['faq_genre'] ) && is_numeric( $qv['faq_genre'] ) ) {
        $term = get_term_by( 'id', $qv['faq_genre'], 'faq_genre' );
        $qv['faq_genre'] = $term->slug;
    }
}
//显示过滤后的结果
add_filter( 'parse_query','perform_filtering_faq' );