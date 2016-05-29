<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
$login_privateUrl=site_url().'/wp-login.php?q='.cs_get_manager_option( 'login_privateKey' );//加密后台登录地址
$current_loginUrl=(cs_get_manager_option( 'enable_loginPrivate' )==true && cs_get_manager_option( 'login_privateKey' ))? $login_privateUrl : site_url().'/wp-login.php';//当前后台登录地址
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
// 功能开关               -
// ------------------------------
$options[]   = array(
  'name'     => 'admin_switch_section',
  'title'    => __('功能开关','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-toggle-on',
  'fields'   => array(
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

  ), // end: fields

);
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
        'content' => __('功能拓展','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_friendlyLink_type',
        'type'    => 'switcher',
        'title'   => __('友情链接功能','CS_TEXTDOMAIN'),
    'default' => false,
    ),

    array(
        'id'      => 'enable_page_taxonomies',
        'type'    => 'switcher',
        'title'   => __('页面（page）添加标签和分类功能','CS_TEXTDOMAIN'),
    'default' => false,
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
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('文件重命名','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'file_rename',
        'type'    => 'radio',
        'title'   => __('上传文件重命名','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            '1'   => __('所有文件','CS_TEXTDOMAIN'),
            '2'   => __('仅中文名称文件','CS_TEXTDOMAIN'),
            '3'   => __('禁用','CS_TEXTDOMAIN'),
        ),
        'default' => '1',
    ),

    array(
        'id'      => 'file_rename_mode',
        'type'    => 'radio',
        'title'   => __('文件重命名方式','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            '1'   => __('命名方式：时间戳+随机数字（MD5加密文件名）','CS_TEXTDOMAIN'),
            '2'   => __('命名方式：随机数字（MD5加密文件名）','CS_TEXTDOMAIN'),
        ),
        'default' => '1',
        'dependency' => array( 'file_rename_3', '==', 'false' ),
    ),

  ), // end: fields

);
// ------------------------------
// 高级设置               -
// ------------------------------
$options[]   = array(
  'name'     => 'admin_senior_section',
  'title'    => __('高级设置','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-cogs',
  'fields'   => array(

  )
);

// ------------------------------
// hideWordpress section               -
// ------------------------------
$options[]   = array(
  'name'     => 'admin_hideWordpress_section',
  'title'    => __('WP定制','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-wordpress',
  'fields'   => array(  

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('WP信息','CS_TEXTDOMAIN'),
    ),  

    array(
        'id'      => 'enable_wp_generator',
        'type'    => 'switcher',
        'title'   => __('移除网站头部的wordpress版本信息','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('移除前台网站头部wordpress generator信息','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_wp_rss_version',
        'type'    => 'switcher',
        'title'   => __('移除RSS订阅中wordpress版本信息','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('移除RSS订阅（feed）中wordpress generator信息','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_wp_dashboard_version',
        'type'    => 'switcher',
        'title'   => __('移除仪表盘“概况”的WordPress版本信息','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('移除  仪表盘>概况 的WordPress版本信息“您正在使用WordPress xxxx”','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_code_version',
        'type'    => 'switcher',
        'title'   => __('移除css和js后面的版本号','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('加载的css或者js后面的?ver=xxx 版本号','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_wp_title',
        'type'    => 'switcher',
        'title'   => __('删除标题title中“wordpress”文字','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('删除后台标题title中“wordpress”文字','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_wp_bar_logo',
        'type'    => 'switcher',
        'title'   => __('移除后台管理员工具条wordpress logo','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('后台左上角wordpress logo','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'wp_footer_text',
        'type'    => 'radio',
        'title'   => __('网站后台底部版权信息','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
          '1'     => __('不显示','CS_TEXTDOMAIN'),
          '2'     => __('自定义','CS_TEXTDOMAIN'),
        ),
    'default' => '1',
    ),

    array(
        'id'         => 'custom_wp_footer_text_left',
        'type'       => 'text',
        'title'      => __('自定义后台底部文字-left','CS_TEXTDOMAIN'),
    'after'      => '<span class="cs-text-warning">( '.__('后台底部左侧文字信息','CS_TEXTDOMAIN').' )</span>',
    'dependency' => array( 'wp_footer_text_2', '==', 'true' ),
    ),

    array(
        'id'     => 'custom_wp_footer_text_right',
        'type'   => 'text',
        'title'  => __('自定义后台底部文字-right','CS_TEXTDOMAIN'),
    'after'  => ' <span class="cs-text-warning">( '.__('后台底部右侧文字信息','CS_TEXTDOMAIN').' )</span>',
    'dependency'   => array( 'wp_footer_text_2', '==', 'true' ),
    ),  

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('后台菜单','CS_TEXTDOMAIN'),
    ),    

    array(
        'id'      => 'enable_wp_options_show_link',
        'type'    => 'switcher',
        'title'   => __('移除后台“显示选项”','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('移除后台右上角“显示选项”（对管理员无效）','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_wp_help_link',
        'type'    => 'switcher',
        'title'   => __('移除后台“帮助”','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('后台右上角“帮助”','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_wp_dashboard_menu',
        'type'    => 'switcher',
        'title'   => __('仪表盘菜单','CS_TEXTDOMAIN'),
        'label'   => __('只有特定权限的用户可以访问，其他用户访问自动跳转','CS_TEXTDOMAIN'),
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

  )
);

// ------------------------------
// customLogin section               -
// ------------------------------
$options[]   = array(
  'name'     => 'admin_customLogin_section',
  'title'    => __('后台登录','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-lock',
  'fields'   => array(

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('基本设置','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_admin_only_administrator',
        'type'    => 'switcher',
        'title'   => __('只允许超级管理员访问WordPress后台','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('启用后超级管理员以外的用户无法访问后台','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_login_error_messages',
        'type'    => 'switcher',
        'title'   => __('禁用WordPress登录错误的提示信息','CS_TEXTDOMAIN'),
    'default' => false,
    ),

    array(
        'id'      => 'enable_login_multiWay',
        'type'    => 'switcher',
        'title'   => __('后台支持用户名或邮箱登录','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('允许站点通过用户名或邮箱登录，提高用户体验','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'disable_account_sharing',
        'type'    => 'switcher',
        'title'   => __('禁止多人同时登录同一账号（建议开启）','CS_TEXTDOMAIN'),
    'default' => true,
    ),

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('后台加密','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_loginPrivate',
        'type'    => 'switcher',
        'title'   => __('加密后台登录地址','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('修改后台登录地址，提高安全性','CS_TEXTDOMAIN'),
    ),

    array(
        'id'     => 'login_redirect_url',
        'type'   => 'text',
        'title'  => __('验证失败，重定向到','CS_TEXTDOMAIN'),
    'default'=> site_url(),
    'after'  => ' <span class="cs-text-muted">( '.__('默认返回网站首页','CS_TEXTDOMAIN').' )</span>',
    'dependency'    => array( 'enable_loginPrivate', '==', 'true' ),
    'attributes'    => array(
            'placeholder' => __('输入地址','CS_TEXTDOMAIN'),
        )
    ),

    array(
        'id'     => 'login_privateKey',
        'type'   => 'text',
        'title'  => __('验证密钥','CS_TEXTDOMAIN'),
    'after'  => ' <span class="cs-text-muted">( '.__('您当前的登录地址为：','CS_TEXTDOMAIN').''.$current_loginUrl.' )</span>',
    'dependency'    => array( 'enable_loginPrivate', '==', 'true' ),
    'attributes'    => array(
            'placeholder' => __('输入密钥','CS_TEXTDOMAIN'),
        )
    ),

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('自定义登录页面','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'login_logo_mode',
        'type'    => 'radio',
        'title'   => __('登录页面的LOGO','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
          '1'    => __('默认','CS_TEXTDOMAIN'),
          '2'    => __('自定义','CS_TEXTDOMAIN'),
      '3'    => __('隐藏','CS_TEXTDOMAIN'),
        ),
    'default'=> '1',
    ),

    array(
        'id'      => 'custom_login_logo',
        'type'    => 'upload',
        'title'   => __('自定义LOGO','CS_TEXTDOMAIN'),
    'default' => get_template_directory_uri()."/lib/images/login-logo.png",
    'dependency'   => array( 'login_logo_mode_2', '==', 'true' ),
    'settings'     => array(
      'upload_type'  => 'image',
      'button_title' => __('上传','CS_TEXTDOMAIN'),
      'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
      'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
    ),
    ),

    array(
        'id'      => 'login_logo_url_mode',
        'type'    => 'radio',
        'title'   => __('登录页面LOGO链接','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
          '1'     => __('默认','CS_TEXTDOMAIN'),
          '2'     => __('自定义','CS_TEXTDOMAIN'),
        ),
    'default'=> '1',
    ),

    array(
        'id'     => 'custom_login_logo_url',
        'type'   => 'text',
        'title'  => __('自定义LOGO链接','CS_TEXTDOMAIN'),
    'default'=> get_bloginfo('url'),
        'dependency'   => array( 'login_logo_url_mode_2', '==', 'true' ),
    ),

    array(
        'id'      => 'login_logo_title_mode',
        'type'    => 'radio',
        'title'   => __('登录页面LOGO标题（title）','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
          '1'    => __('默认','CS_TEXTDOMAIN'),
          '2'    => __('自定义','CS_TEXTDOMAIN'),
        ),
    'default'=> '1',
    ),

    array(
        'id'     => 'custom_login_logo_title',
        'type'   => 'text',
        'title'  => __('自定义LOGO标题','CS_TEXTDOMAIN'),
    'default'=> get_bloginfo('name'),
    'after'  => ' <span class="cs-text-warning">( '.__('鼠标经过LOGO时显示的文字信息','CS_TEXTDOMAIN').' )</span>',
        'dependency'   => array( 'login_logo_title_mode_2', '==', 'true' ),
    ),

    array(
        'id'      => 'login_style_mode',
        'type'    => 'radio',
        'title'   => __('登录页面样式','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
          '1'    => __('自定义样式1：左右布局','CS_TEXTDOMAIN'),
          '2'    => __('自定义样式2：上下布局','CS_TEXTDOMAIN'),
      '3'    => __('默认样式','CS_TEXTDOMAIN'),
        ),
    'default'=> '1',
    ),

    array(
        'id'    => 'custom_login_bg',
        'type'  => 'background',
        'title' => __('自定义登录页面背景','CS_TEXTDOMAIN'),
    'dependency'   => array( 'login_style_mode_1', '==', 'true' ),
    'default'      => array(
      'image'      => get_template_directory_uri()."/lib/images/bg/parallax1.jpg",
      'repeat'     => 'no-repeat',
      'position'   => 'center center',
      'attachment' => 'fixed',
      'color'      => '#f1f1f1',
    ),
    ),

    array(
        'id'      => 'custom_login_bgcolor',
        'type'    => 'color_picker',
        'title'   => __('LOGO区域背景色','CS_TEXTDOMAIN'),
        'rgba'    => false,
    'default' => '#f1f1f1',
    'dependency'   => array( 'login_style_mode_2', '==', 'true' ),
    ),

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('额外信息','CS_TEXTDOMAIN'),
    ),

    array(
        'id'     => 'custom_login_message',
        'type'   => 'wysiwyg',
        'before' => '<h4>'.__('登录页面额外的信息','CS_TEXTDOMAIN').'</h4>',
        'after'  => '<p class="cs-text-muted">'.__('说明：在登录页面添加额外的提示信息，显示在logo下面','CS_TEXTDOMAIN').'</p>',
    'settings' => array(
            'textarea_rows' => 5,
            'tinymce'       => false,
            'media_buttons' => false,
        )
    ),

    array(
        'id'     => 'custom_login_form_info',
        'type'   => 'wysiwyg',
        'before' => '<h4>'.__('自定义登录框内容','CS_TEXTDOMAIN').'</h4>',
        'after'  => '<p class="cs-text-muted">'.__('说明：在登录框内添加额外的信息，显示在登录表单内','CS_TEXTDOMAIN').'</p>',
    'settings' => array(
            'textarea_rows' => 5,
            'tinymce'       => false,
            'media_buttons' => false,
        )
    ),

    array(
        'id'     => 'custom_login_footer',
        'type'   => 'wysiwyg',
        'before' => '<h4>'.__('自定义底部内容','CS_TEXTDOMAIN').'</h4>',
    'settings' => array(
            'textarea_rows' => 5,
            'tinymce'       => false,
            'media_buttons' => false,
        )
    ),

  )
);


// ------------------------------
// user section               -
// ------------------------------
$options[]   = array(
  'name'     => 'admin_user_section',
  'title'    => __('用户管理','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-users',
  'fields'   => array(

    /*array(
        'id'      => 'enable_wp_admin_account_hide',
        'type'    => 'switcher',
        'title'   => __('隐藏超级管理员账户','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('后台用户列表，超级管理员账户对超级管理员以外的用户隐藏','CS_TEXTDOMAIN'),
    ), */

    array(
        'id'      => 'enable_enhance_user_query',
        'type'    => 'switcher',
        'title'   => __('增强后台用户搜索','CS_TEXTDOMAIN'),
    'default' => true,
    ),

    array(
        'id'      => 'enable_custom_gravatar',
        'type'    => 'switcher',
        'title'   => __('用户自定义头像','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('上传本地图片作为注册用户个人资料头像','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_user_register_date',
        'type'    => 'switcher',
        'title'   => __('显示用户注册时间','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('后台用户列表显示用户注册时间。','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_user_login_lastDate',
        'type'    => 'switcher',
        'title'   => __('记录用户上次登录时间','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('开启后会在用户登录时记录时间，并在用户列表中显示（注：无法获取使用社交账号登录的时间）。','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_user_nickname',
        'type'    => 'switcher',
        'title'   => __('显示用户昵称','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('后台用户列表显示用户昵称','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_user_sort_by_post',
        'type'    => 'switcher',
        'title'   => __('用户根据文章数进行排序','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('后台用户列表可以根据文章数进行排序','CS_TEXTDOMAIN'),
    ),

    /*array(
        'id'      => 'enable_user_search_extend',
        'type'    => 'switcher',
        'title'   => __('后台用户列表可以搜索名字、姓氏和公开显示名','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('默认情况下，在WordPress后台的用户列表中，只能通过用户名和邮箱搜索用户。','CS_TEXTDOMAIN'),
    ),  */

  )
);

// ------------------------------
// debug section               -
// ------------------------------
$options[]   = array(
  'name'     => 'admin_debug_section',
  'title'    => __('开发调试','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-code-fork',
  'fields'   => array(

    array(
        'id'      => 'enable_show_performance',
        'type'    => 'switcher',
        'title'   => __('显示页面查询次数、加载时间和内存占用','CS_TEXTDOMAIN'),
        'default' => false,
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
