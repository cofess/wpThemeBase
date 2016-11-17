<?php
//创建一个该自定义文章类型专用的模板
add_filter( 'template_include', 'include_template_portfolio_function',1);
function include_template_portfolio_function( $template_path ) {
if ( get_post_type() == 'portfolio' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-portfolio.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = get_bloginfo('template_directory'). '/single-portfolio.php';
            }
        }
        elseif ( is_archive() || is_category() ) {
            if ( $theme_file = locate_template( array ( 'archive-portfolio1.php' ) ) ) {
                $template_path = $theme_file;
            } else { $template_path = get_bloginfo('template_directory'). '/archive-portfolio1.php';
 
            }
        }
    }
    return $template_path;
}