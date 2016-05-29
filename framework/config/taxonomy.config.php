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

    array(
      'id'      => 'sum',
      'type'    => 'number',
      'title'   => __('总产品数','CS_TEXTDOMAIN'),
      //'after'   => __('<span class="cs-text-muted">(天)</span>','CS_TEXTDOMAIN'),
      //'default' => '7',
    ),
  ),
);

$options[]   = array(
  'id'       => '_custom_taxonomy_options',
  'taxonomy' => 'cpt-tag', // category, post_tag or your custom taxonomy name
  'fields'   => array(

    array(
      'id'    => 'section_1_text',
      'type'  => 'text',
      'title' => 'Text Field',
    ),

  ),
);

CSFramework_Taxonomy::instance( $options );
