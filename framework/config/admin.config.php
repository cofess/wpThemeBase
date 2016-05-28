<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => __('后台设置', 'CS_TEXTDOMAIN'),
  'menu_type'       => 'submenu', // menu, submenu, options, theme, etc.
  'menu_parent'     => 'theme-setting',
  'menu_slug'       => 'admin-setting',
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
// 常规设置               -
// ------------------------------
$options[]   = array(
  'name'     => 'admin_general_section',
  'title'    => __('常规设置','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-cog',
  'fields'   => array(
 
    /*array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('本地化','CS_TEXTDOMAIN'),
    ), 
  
    array(
        'id'             => 'admin_language',
        'type'           => 'select',
        'title'          => __('后台语言','CS_TEXTDOMAIN'),
        'options'        => array(
            'zh-CN'         => __('中文','CS_TEXTDOMAIN'),
      'en-US'         => __('英语','CS_TEXTDOMAIN'),
        ),
    'default'        => 'zh-CN',
    ),  
  
    array(
        'id'             => 'site_language',
        'type'           => 'select',
        'title'          => __('站点语言','CS_TEXTDOMAIN'),
        'options'        => array(
            'zh-CN'         => __('中文','CS_TEXTDOMAIN'),
      'en-US'         => __('英语','CS_TEXTDOMAIN'),
        ),
    'default'        => 'zh-CN',
    ),*/

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('更新提示','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_wp_coreUpdate',
        'type'    => 'switcher',
        'title'   => __('核心程序更新提示','CS_TEXTDOMAIN'),
    'default' => false,
    ),

    array(
        'id'      => 'enable_wp_themeUpdate',
        'type'    => 'switcher',
        'title'   => __('主题更新提示','CS_TEXTDOMAIN'),
    'default' => false,
    ),

    array(
        'id'      => 'enable_wp_pluginUpdate',
        'type'    => 'switcher',
        'title'   => __('插件更新提示','CS_TEXTDOMAIN'),
    'default' => false,
    ),

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('菜单链接','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_plugin_actionLinks',
        'type'    => 'switcher',
        'title'   => __('插件列表的“编辑”和“停用”链接','CS_TEXTDOMAIN'),
    'default' => true,
    ),

    array(
        'id'      => 'enable_theme_select',
        'type'    => 'switcher',
        'title'   => __('更换主题','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('对网站管理员群组用户无效','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_theme_editor',
        'type'    => 'switcher',
        'title'   => __('在线编辑主题','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('对网站管理员群组用户无效','CS_TEXTDOMAIN'),
    ),

  ), // end: fields

);
// ------------------------------
// 功能开关               -
// ------------------------------
$options[]   = array(
  'name'     => 'admin_switch_section',
  'title'    => __('功能开关','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-cog',
  'fields'   => array(
    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('功能开关','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'disable_wp_revisions',
        'type'    => 'switcher',
        'title'   => __('禁用所有文章类型的修订版本','CS_TEXTDOMAIN'),
    'default' => true,
    ),

    array(
        'id'      => 'disable_wp_image_link',
        'type'    => 'switcher',
        'title'   => __('关闭WordPress的图片默认链接功能','CS_TEXTDOMAIN'),
    'default' => false,
    ),

    array(
        'id'      => 'enable_friendlyLink_type',
        'type'    => 'switcher',
        'title'   => __('友情链接功能','CS_TEXTDOMAIN'),
    'default' => false,
    ),

    array(
        'id'      => 'enable_wp_browse_happy',
        'type'    => 'switcher',
        'title'   => 'Browse Happy',
    'default' => false,
    ),

    array(
        'id'      => 'enable_wp_default_emoji',
        'type'    => 'switcher',
        'title'   => __('Emoji 表情（建议禁用）','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('4.2版本后，Emoji 表情api服务在国内是无法正常访问的，这就导致了网站加载缓慢','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_wp_xmlrpc',
        'type'    => 'switcher',
        'title'   => __('XML-PRC接口,即XML远程方法调用','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('如果没有使用离线编辑工具（如：微软Live Writer编辑器），建议禁用。','CS_TEXTDOMAIN'),
    ),

  ), // end: fields

);
// ------------------------------
// 高级设置               -
// ------------------------------
$options[]   = array(
  'name'     => 'admin_senior_section',
  'title'    => __('高级设置','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-toggle-on',
  'fields'   => array(

    array(
        'id'      => 'enable_enhance_user_query',
        'type'    => 'switcher',
        'title'   => __('增强后台用户搜索','CS_TEXTDOMAIN'),
    'default' => true,
    ),

    array(
        'id'      => 'enable_show_ids',
        'type'    => 'switcher',
        'title'   => __('在管理列表中显示 ID（建议开启）','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('后台文章、分类、页面、标签、评论、用户等管理列表显示 ID','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_editor_extend',
        'type'    => 'switcher',
        'title'   => __('默认编辑器增强','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('默认编辑器没有把所有的功能菜单都显示出来，启用可以找回这些功能菜单','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_self_pingback',
        'type'    => 'switcher',
        'title'   => __('站内文章互相 Pingback','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('比如某篇文章引用了另一篇本站的文章，导致会出现无用的 Pingback','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_trackbacks',
        'type'    => 'switcher',
        'title'   => __('Trackbacks（建议禁用）','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('Trackbacks会带来一些垃圾评论','CS_TEXTDOMAIN'),
    ),
  
    array(
        'id'      => 'enable_json_rest_api',
        'type'    => 'switcher',
        'title'   => __('JSON REST API（建议禁用）','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('JSON REST API 采用 GET 请求方式来获取数据,为 DDOS 攻击提供了一个新的攻击途径，如果有开发APP请开启','CS_TEXTDOMAIN'),
    ),  

  )
);
// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'admin_backup_section',
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
  'name'     => 'admin_license_section',
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

CSAdmin::instance( $settings, $options );
