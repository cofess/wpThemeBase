<?php
//使用自定义分类法创建过滤器
function filter_portfolio_list() {
    $screen = get_current_screen();
    global $wp_query;
    if ( $screen->post_type == 'portfolio' ) {
        wp_dropdown_categories( array(
            'show_option_all' => '查看所有分类',
            'taxonomy' => 'portfolio_genre',
            'name' => 'portfolio_genre',
            'orderby' => 'name',
            'selected' => (isset( $wp_query->query['portfolio_genre'] ) ? $wp_query->query['portfolio_genre'] : '暂无分类' ),
            'hierarchical' => false,
            'depth' => 3,
            'show_count' => true,
            'hide_empty' => false,
        ) );
    }
}
add_action( 'restrict_manage_posts', 'filter_portfolio_list' );
//查询
function perform_filtering_portfolio( $query ) {
    $qv = &$query->query_vars;
    if ( ( $qv['portfolio_genre'] ) && is_numeric( $qv['portfolio_genre'] ) ) {
        $term = get_term_by( 'id', $qv['portfolio_genre'], 'portfolio_genre' );
        $qv['portfolio_genre'] = $term->slug;
    }
}
//显示过滤后的结果
add_filter( 'parse_query','perform_filtering_portfolio' );