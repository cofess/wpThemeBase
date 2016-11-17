<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// TAXONOMY OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options     = array();

// -----------------------------------------
// Taxonomy Options                        -
// -----------------------------------------
$options[]   = array(
  'id'       => 'taxonomy_product_cat_options',
  'taxonomy' => 'product_cat', // category, post_tag or your custom taxonomy name
  'fields'   => array(

    /*array(
      'id'    => 'thumbnail',
      'type'  => 'upload',
      'title' => __('缩略图','CS_TEXTDOMAIN'),
      'settings'      => array(
        'upload_type'  => 'image',
        'button_title' => __('上传','CS_TEXTDOMAIN'),
        'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
        'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
      ),
      'attributes' => array(
        'style'    => 'width: 80%;',
      ),
    ),*/
    array(
      'id'         => 'category_downlink',
      'type'       => 'upload',
      'title'      => __('目录下载地址','CS_TEXTDOMAIN'),   
      'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
      ),
    ),

    array(
      'id'      => 'sum',
      'type'    => 'number',
      'title'   => __('总产品数','CS_TEXTDOMAIN'),
    ),
  ),
);

// -----------------------------------------
// Taxonomy Options                        -
// -----------------------------------------
$options[]   = array(
  'id'       => 'taxonomy_post_tag_options',
  'taxonomy' => 'post_tag', // category, post_tag or your custom taxonomy name
  'fields'   => array(

    array(
      'id'    => 'thumbnail',
      'type'  => 'upload',
      'title' => __('缩略图','CS_TEXTDOMAIN'),
      'settings'      => array(
        'upload_type'  => 'image',
        'button_title' => __('上传','CS_TEXTDOMAIN'),
        'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
        'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
      ),
      'attributes' => array(
        'style'    => 'width: 80%;',
      ),
    ),
  ),
);

$options[]   = array(
  'id'       => '_custom_taxonomy_options',
  'taxonomy' => 'category', // category, post_tag or your custom taxonomy name
  'fields'   => array(

    array(
      'id'    => 'thumbnail',
      'type'  => 'upload',
      'title' => __('缩略图','CS_TEXTDOMAIN'),
      'settings'      => array(
        'upload_type'  => 'image',
        'button_title' => __('上传','CS_TEXTDOMAIN'),
        'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
        'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
      ),
      'attributes' => array(
        'style'    => 'width: 80%;',
      ),
    ),

  ),
);

CSFramework_Taxonomy::instance( $options );
