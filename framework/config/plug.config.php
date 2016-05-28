<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => __('插件设置', 'CS_TEXTDOMAIN'),
  'menu_type'       => 'submenu', // menu, submenu, options, theme, etc.
  'menu_parent'     => 'theme-setting',
  'menu_slug'       => 'plug-setting',
  //'menu_icon'  => 'dashicons-sos',
  'ajax_save'       => true,
  'show_reset_all'  => true,
  'framework_title' => 'ThemeBase <small>by <a href="http://www.yiwell.com" target="_blank" style="outline:none;border:none;text-decoration:none" onfocus="this.blur()">Yiwell</a></small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'plug_backup_section',
  'title'    => __('备份设置','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-database',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => __('您可以保存当前设置。下载备份和导入设置。','CS_TEXTDOMAIN'),
    ),

    array(
      'type'    => 'backup',
    ),

  )
);

// ------------------------------
// license                      -
// ------------------------------
$options[]   = array(
  'name'     => 'plug_license_section',
  'title'    => __('关于插件','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => __('超级优化（super manager）','CS_TEXTDOMAIN'),
    ),
    array(
      'type'    => 'content',
      'content' => __('超级优化（super manager）旨在通过优化使网站加载速度更快、更安全！提升用户体验！','CS_TEXTDOMAIN'),
    ),

    /* array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => '<iframe src="'.get_template_directory_uri().'/inc/super-manager/content/jquery.cdn.html" width="100%"></iframe>',
    ),*/	

  )
);

CSPlug::instance( $settings, $options );
