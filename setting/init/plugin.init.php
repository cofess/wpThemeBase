<?php
/**
 * Plugin Init of Yiwell WordPress Theme
 * Description:初始化 - 插件初始化
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

if ( ! function_exists( 'my_woocommerce_get_product_thumbnail' ) ) {

	/**
	 * Get the product thumbnail, or the placeholder if not set.
	 *
	 * @subpackage	Loop
	 * @param string $size (default: 'shop_catalog')
	 * @param int $deprecated1 Deprecated since WooCommerce 2.0 (default: 0)
	 * @param int $deprecated2 Deprecated since WooCommerce 2.0 (default: 0)
	 * @return string
	 */
	add_filter('woocommerce_get_product_thumbnail', 'my_woocommerce_get_product_thumbnail'); 
	 
	function my_woocommerce_get_product_thumbnail( $size = 'shop_thumbnail', $deprecated1 = 0, $deprecated2 = 0 ) {
		global $post, $product;
		$attachment_ids = $product->get_gallery_attachment_ids();
		$attachment_id = $attachment_ids[0];

		if ( has_post_thumbnail() ) {
			//return get_the_post_thumbnail( $post->ID, $size );
      //$post_thumbnail_src = wp_get_attachment_url(get_post_meta($post->ID,'_thumbnail_id',true));
      //return '<img data-original="'.$post_thumbnail_src.'" alt="'.the_title_attribute(array('echo'=>false)).'" class="lazy w-full" /><noscript><img src="'.$post_thumbnail_src.'" alt="'.the_title_attribute(array('echo'=>false)).'" class="w-full" /></noscript>';
      $post_thumbnail_src = wp_get_attachment_image_src($attachment_id,$size);
      return '<img data-original="'.$post_thumbnail_src[0].'" alt="'.the_title_attribute(array('echo'=>false)).'" class="lazy w-full" /><noscript><img src="'.$post_thumbnail_src[0].'" alt="'.the_title_attribute(array('echo'=>false)).'" class="w-full" /></noscript>';
		} elseif($attachment_ids){
			//return wp_get_attachment_image( $attachment_id ,apply_filters( 'shop_catalog_image_size', 'shop_catalog' )); 
      $post_thumbnail_src = wp_get_attachment_image_src($attachment_id,$size);
      return '<img data-original="'.$post_thumbnail_src[0].'" alt="'.the_title_attribute(array('echo'=>false)).'" class="lazy w-full" /><noscript><img src="'.$post_thumbnail_src[0].'" alt="'.the_title_attribute(array('echo'=>false)).'" class="w-full" /></noscript>';
		} elseif ( wc_placeholder_img_src() ) {
			return wc_placeholder_img( $size );
		}
	}
	
}
/*-----------------------------------woocommerce 初始化-------------------------------------------------------*/ 
/**
 * woocommerce产品属性列表撑破表格
 * http://www.wpdaxue.com/disable-emoji.html
 */
function fixed_woocommerce_product_attributes_table(){
  echo '<style type="text/css">
        .attributes-table .attribute-terms {display: block;width:60px!important;overflow: hidden !important; text-overflow: ellipsis !important; white-space: nowrap !important; word-wrap: normal !important;}
        </style>';
}
add_action('admin_head', 'fixed_woocommerce_product_attributes_table' ); 

//主题支持woocommerce 
add_theme_support('woocommerce');

// 禁用WooCommerce默认样式Disable WooCommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/* 
 * 禁用WooCommerce默认样式Disable WooCommerce styles
 http://dessky.com/blog/disable-woocommerce-scripts-and-styles/
 */
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );
/**
 * Remove WooCommerce Generator tag, styles, and scripts from all areas other than store
 * Tested and works with WooCommerce 2.0+
 */
function child_manage_woocommerce_styles() {
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
	//if ( !is_woocommerce() && !is_page('store') && !is_shop() && !is_product_category() && !is_product() && !is_cart() && !is_checkout() ) {
		wp_dequeue_style( 'woocommerce_frontend_styles' );
		wp_dequeue_style( 'woocommerce_fancybox_styles' );
		wp_dequeue_style( 'woocommerce_chosen_styles' );
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		wp_dequeue_script( 'wc_price_slider' );
		wp_dequeue_script( 'wc-single-product' );
		wp_dequeue_script( 'wc-add-to-cart' );
		wp_dequeue_script( 'wc-cart-fragments' );
		wp_dequeue_script( 'wc-checkout' );
		wp_dequeue_script( 'wc-add-to-cart-variation' );
		wp_dequeue_script( 'wc-single-product' );
		wp_dequeue_script( 'wc-cart' );
		wp_dequeue_script( 'wc-chosen' );
		wp_dequeue_script( 'woocommerce' );
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
		wp_dequeue_script( 'jquery-blockui' );
		wp_dequeue_script( 'jquery-placeholder' );
		wp_dequeue_script( 'fancybox' );
		wp_dequeue_script( 'jqueryui' );
//}
}

//隐藏价格Hide price
/*add_filter( 'woocommerce_get_price_html', 'woocommerce_hide_price' );
function woocommerce_hide_price( $price ){
    return '';
}*/

//隐藏购买按钮Hide buy button
add_action( 'init', 'woocommerce_hide_buy_button' );
function woocommerce_hide_buy_button(){
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
}

//修改首页和分类页面每页产品数量
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );

//修改相关产品列表每行产品数量
add_filter( 'woocommerce_output_related_products_args', 'wc_custom_related_products_args' );
function wc_custom_related_products_args( $args ){
    $args = array(
        'posts_per_page' => 16, //共显示多少产品
        'columns' => 2, //分几栏显示
        'orderby' => 'rand'
    );
    return $args;
}

//修改面包屑导航的参数 Code source： https://gist.github.com/dwiash/4064836
function my_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
 
add_filter( 'woocommerce_breadcrumb_defaults', 'my_woocommerce_breadcrumbs' );

//删除默认的面包屑导航
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);


// Unhook the WooCommerce wrappers;
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/**--------------disqus初始化-------------------**/
/**
 * woocommerce产品页面使用disqus第三方评论框
 * https://github.com/woothemes/woocommerce/issues/1392
 */
function disqus_override_tabs($tabs){
    if ( has_filter( 'comments_template', 'dsq_comments_template' ) ){
        remove_filter( 'comments_template', 'dsq_comments_template' );
        add_filter('comments_template', 'dsq_comments_template',90);
    }else{

    }
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'disqus_override_tabs', 98);
add_filter( 'comments_template', 'disqus_override_tabs', 98);

/*-----------------------------------jetpack 初始化-------------------------------------------------------*/ 
function dequeue_devicepx() {
	wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_devicepx', 20 );
add_action( 'customize_controls_enqueue_scripts', 'dequeue_devicepx', 20);
add_action( 'admin_enqueue_scripts', 'dequeue_devicepx', 20);
//add_action('wp_enqueue_scripts', create_function(null, "wp_dequeue_script('devicepx');"), 20);//移除devicepx-jetpack.js

// First, make sure Jetpack doesn't concatenate all its CSS
add_filter( 'jetpack_implode_frontend_css', '__return_false' );

// Then, remove each CSS file, one at a time
function jeherve_remove_all_jp_css() {
  wp_deregister_style( 'AtD_style' ); // After the Deadline
  wp_deregister_style( 'jetpack_likes' ); // Likes
  wp_deregister_style( 'jetpack_related-posts' ); //Related Posts
  wp_deregister_style( 'jetpack-carousel' ); // Carousel
  wp_deregister_style( 'grunion.css' ); // Grunion contact form
  wp_deregister_style( 'the-neverending-homepage' ); // Infinite Scroll
  wp_deregister_style( 'infinity-twentyten' ); // Infinite Scroll - Twentyten Theme
  wp_deregister_style( 'infinity-twentyeleven' ); // Infinite Scroll - Twentyeleven Theme
  wp_deregister_style( 'infinity-twentytwelve' ); // Infinite Scroll - Twentytwelve Theme
  wp_deregister_style( 'noticons' ); // Notes
  wp_deregister_style( 'post-by-email' ); // Post by Email
  wp_deregister_style( 'publicize' ); // Publicize
  wp_deregister_style( 'sharedaddy' ); // Sharedaddy
  wp_deregister_style( 'sharing' ); // Sharedaddy Sharing
  wp_deregister_style( 'stats_reports_css' ); // Stats
  wp_deregister_style( 'jetpack-widgets' ); // Widgets
  wp_deregister_style( 'jetpack-slideshow' ); // Slideshows
  wp_deregister_style( 'presentations' ); // Presentation shortcode
  wp_deregister_style( 'jetpack-subscriptions' ); // Subscriptions
  wp_deregister_style( 'tiled-gallery' ); // Tiled Galleries
  wp_deregister_style( 'widget-conditions' ); // Widget Visibility
  wp_deregister_style( 'jetpack_display_posts_widget' ); // Display Posts Widget
  wp_deregister_style( 'gravatar-profile-widget' ); // Gravatar Widget
  wp_deregister_style( 'widget-grid-and-list' ); // Top Posts widget
  wp_deregister_style( 'jetpack-widgets' ); // Widgets
}
add_action('wp_print_styles', 'jeherve_remove_all_jp_css' );

/*-----------------------------------contact form 7 初始化-------------------------------------------------------*/ 




/*-----------------------------------Download monitor 初始化-------------------------------------------------------*/ 
function dlm_remove_all_frontend_css() {
  wp_deregister_style( 'dlm-frontend' ); // remove frontend css
  wp_register_style( 'dlm-frontend', false ); 
}
add_action('wp_enqueue_scripts', 'dlm_remove_all_frontend_css' );


/*-----------------------------------radykal-fancy-gallery 初始化-------------------------------------------------------*/ 
function fancy_gallery_remove_scripts() {
  wp_deregister_style( 'fancybox-buttons' );
  wp_deregister_style( 'fancybox-thumbs' );
  wp_deregister_style( 'mejs' );
  wp_deregister_style( 'mejs-skins' );
  wp_deregister_style( 'font-awesome-4' );
  wp_deregister_style( 'fancybox' );

  wp_deregister_script( 'svg-js');
}
add_action('wp_enqueue_scripts','fancy_gallery_remove_scripts');

function remove_plugin_meta_box() {   
  remove_meta_box('jetpack_summary_widget', 'dashboard', 'core');
  remove_meta_box('dlm_popular_downloads', 'dashboard', 'core');
  remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'core');
  remove_meta_box('woocommerce_dashboard_status', 'dashboard', 'core');
  remove_meta_box('woocommerce_dashboard_recent_reviews', 'dashboard', 'core');
}  
add_action('admin_menu', 'remove_plugin_meta_box');