<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => __('超级优化', 'CS_TEXTDOMAIN'),
  'menu_type'       => 'submenu', // menu, submenu, options, theme, etc.
  'menu_parent'     => 'theme-setting',
  'menu_slug'       => 'manager-setting',
  //'menu_icon'  => 'dashicons-sos',
  //'ajax_save'       => true,
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
// 高级设置               -
// ------------------------------
$options[]   = array(
  'name'     => 'manager_senior_section',
  'title'    => __('高级设置','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-toggle-on',
  'fields'   => array(

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('基本设置','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_adminBar',
        'type'    => 'switcher',
        'title'   => __('前台顶部管理员工具条','CS_TEXTDOMAIN'),
		'default' => false,
		'label' => __('为使页面干净，建议隐藏','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_header_clean',
        'type'    => 'switcher',
        'title'   => __('前台头部清理（建议开启）','CS_TEXTDOMAIN'),
		'default' => true,
		'label'   => __('移除多余的Feed属性、meta属性等','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_menu_css_excess',
        'type'    => 'switcher',
        'title'   => __('移除菜单的多余id和css选择器 （建议开启）','CS_TEXTDOMAIN'),
		'default' => true,
		'label'   => __('菜单选择器包括ID和class选择器，如果没有相关选择器的css样式，建议移除。','CS_TEXTDOMAIN'),
    ),

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('功能拓展','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_iframe_break',
        'type'    => 'switcher',
        'title'   => __('禁止站点被其他网站通过iframe框架引用','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('防止WordPress站点被别人通过iframe框架引用','CS_TEXTDOMAIN'),
    ),

    /*array(
        'id'    => 'break_frames_except',
        'type'  => 'textarea',
        'title' => __('以下网站除外','CS_TEXTDOMAIN'),
        'desc'  => __('站点以英文逗号“,”隔开','CS_TEXTDOMAIN'),
    ),  */  

    array(
        'id'      => 'enable_mouseReturn',
        'type'    => 'switcher',
        'title'   => __('禁用鼠标右键','CS_TEXTDOMAIN'),
    'default' => false,
    'label'   => __('禁用鼠标右键访客将无法复制网站内容','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_email_transfer',
        'type'    => 'switcher',
        'title'   => __('转义文章和评论中的邮箱地址','CS_TEXTDOMAIN'),
    'default' => true,
    'label'   => __('能够有效屏蔽邮箱地址采集器以防被恶意采集','CS_TEXTDOMAIN'),
    ),

  )
);

// ------------------------------
// 功能拓展               -
// ------------------------------
/*$options[]   = array(
  'name'     => 'manager_extend_section',
  'title'    => __('功能拓展','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-plug',
  'fields'   => array(



  )
);*/

// ------------------------------
// 网站加速                      -
// ------------------------------
$options[]   = array(
  'name'     => 'manager_flash_section',
  'title'    => __('网站加速','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-flash',

  // begin: fields
  'fields'    => array(

        array(
          'id'      => 'enable_gzip',
          'type'    => 'switcher',
          'title'   => __('Gzip压缩','CS_TEXTDOMAIN'),
		  'default' => false,
		  'label'   => __('网页启用Gzip压缩,提升网页加载速度','CS_TEXTDOMAIN'),
		  'help'    => __('Gzip开启以后会将输出到用户浏览器的数据进行压缩的处理，这样就会减小通过网络传输的数据量，提高浏览的速度。','CS_TEXTDOMAIN'),
        ),

        array(
          'id'      => 'enable_compress_html',
          'type'    => 'switcher',
          'title'   => __('Html压缩','CS_TEXTDOMAIN'),
		  'default' => false,
		  'label'   => __('压缩页面源代码,提升网页加载速度','CS_TEXTDOMAIN'),
        ),

        array(
          'id'      => 'enable_replace_google_cdn',
          'type'    => 'switcher',
          'title'   => __('替换Google公共库为360公共库','CS_TEXTDOMAIN'),
		  'default' => true,
        ),

        array(
          'id'             => 'google_fonts_lib',
          'type'           => 'select',
          'title'          => __('Google字体库','CS_TEXTDOMAIN'),
          'options'        => array(
            '1'            => __('禁用Google Open Sans字体','CS_TEXTDOMAIN'),
            '2'            => __('替换为360镜像加载源','CS_TEXTDOMAIN'),
          ),
		  'default'        => '2',
          'default_option' => __('请选择','CS_TEXTDOMAIN'),
          'help'           => __('如果您在主要客户在国内，选择一个','CS_TEXTDOMAIN'),
        ),

        array(
          'id'             => 'gravatar_server',
          'type'           => 'select',
          'title'          => __('Gravatar全球通用头像服务器','CS_TEXTDOMAIN'),
          'options'        => array(
		    '1'            => __('使用https方式（SSL）调用头像','CS_TEXTDOMAIN'),
            '2'            => __('Gravatar中国服务器，cn.gravatar.com','CS_TEXTDOMAIN'),
			'3'            => __('自定义第三方Gravatar镜像服务器','CS_TEXTDOMAIN'),
			'4'            => __('本地缓存头像（不推荐）','CS_TEXTDOMAIN'),
          ),
		  'default'        => '1',
          'default_option' => __('请选择','CS_TEXTDOMAIN'),
          'help'           => __('如果您在主要客户在国内，选择一个','CS_TEXTDOMAIN'),
        ),

        array(
          'id'     => 'custom_gravatar_server',
          'type'   => 'text',
          'title'  => __('自定义第三方Gravatar镜像服务器','CS_TEXTDOMAIN'),
		  'dependency'    => array( 'gravatar_server', '==', '3' ),
		  'attributes'    => array(
            'placeholder' => __('输入Gravatar镜像服务器地址','CS_TEXTDOMAIN'),
          )
        ),

        array(
          'type'       => 'content',
		  'dependency' => array( 'gravatar_server', '==', '3' ),
          'content'    => __('<h3>国内第三方Gravatar镜像服务器列表</h3><ul><li>1、多说镜像服务器，gravatar.duoshuo.com</li><li>2、极客族镜像服务器，sdn.geekzu.org</li><li>3、七牛镜像服务器，gravatar2.u.qiniudn.com</li></ul>','CS_TEXTDOMAIN'),
        ),

        array(
          'id'      => 'gravatar_cacheDays',
          'type'    => 'number',
          'title'   => __('Gravatar头像缓存天数','CS_TEXTDOMAIN'),
          'after'   => __('<span class="cs-text-muted">(天)</span>','CS_TEXTDOMAIN'),
		  'default' => '7',
		  'dependency'    => array( 'gravatar_server', '==', '4' ),
        ),

        array(
          'type'       => 'content',
		  'dependency' => array( 'gravatar_server', '==', '4' ),
          'content'    => __('<h3>Gravatar头像缓存说明</h3><ul><li>1、确保WordPress安装根目录有“avatar”文件夹（与wp-content等文件夹同一目录下）和default.png默认头像，并设置权限为777</li><li>2、缺点:只能缓存一个尺寸的头像，国内主机无法使用，如有报错等异常，可能你的主机不支持，请选择其他方式</li></ul>','CS_TEXTDOMAIN'),
        ),

		array(
          'id'      => 'enable_jquery_cdn',
          'type'    => 'switcher',
          'title'   => __('自定义前台Jquery库','CS_TEXTDOMAIN'),
          'default' => true,
		  'label'   => __('启用后将禁用wordpress自带Jquery库','CS_TEXTDOMAIN'),
        ),

        array(
          'id'     => 'jquery_cdn_url',
          'type'   => 'text',
          'title'  => __('Jquery 引用地址','CS_TEXTDOMAIN'),
          'after'  => '<p class="cs-text-muted">'.__('说明：百度、新浪、谷歌提供常用的JS库CDN加速服务，引用这些资源获取更快的访问速度','CS_TEXTDOMAIN').'</p>',
		  'dependency'    => array( 'enable_jquery_cdn', '==', 'true' ),
		  'default' => get_template_directory_uri()."/lib/base/js/jquery-1.9.1.min.js",
		  'attributes'    => array(
            'placeholder' => __('输入Jquery引用地址','CS_TEXTDOMAIN'),
          )
        ),

		array(
          'id'      => 'enable_footer_load_js',
          'type'    => 'switcher',
          'title'   => __('所有JS移到页面底部加载','CS_TEXTDOMAIN'),
		  'default' => false,
		),

   ), // end: fields
);

// ------------------------------
// 邮件设置               -
// ------------------------------
$options[]   = array(
  'name'     => 'manager_smtp_section',
  'title'    => __('邮件设置','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-envelope',
  'fields'   => array(

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('基本设置','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_smtp',
        'type'    => 'switcher',
        'title'   => __('使用SMTP发送邮件','CS_TEXTDOMAIN'),
		'default' => false,
		'label'   => __('开启后，整个网站都使用此方式发送邮件，包括注册、找回密码、回复通知等。','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'smtp_host',
        'type'    => 'text',
        'title'   => __('SMTP服务器','CS_TEXTDOMAIN'),
		'default' => 'mail.example.com',
	    'attributes'    => array(
            'placeholder' => __('SMTP服务器器地址','CS_TEXTDOMAIN'),
        ),
    ),

    array(
        'id'      => 'smtp_port',
        'type'    => 'text',
        'title'   => __('SMTP端口','CS_TEXTDOMAIN'),
		'default' => '25',
	    'attributes'    => array(
            'placeholder' => __('SMTP服务器器端口','CS_TEXTDOMAIN'),
        ),
    ),

    array(
        'id'      => 'smtp_secure',
        'type'    => 'radio',
        'title'   => __('SMTP加密方式','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            'none'=> __('无','CS_TEXTDOMAIN'),
            'ssl' => __('SSL','CS_TEXTDOMAIN'),
			'tls' => __('TLS','CS_TEXTDOMAIN'),
        ),
		'default' => 'ssl',
    ),

    array(
        'id'      => 'smtp_auth',
        'type'    => 'radio',
        'title'   => __('SMTP身份验证','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            'no'   => 'No',
            'yes'   => 'Yes',
        ),
		'default' => 'yes',
		'help'   => __('启用SMTP身份验证则以下的账户、密码字段必填','CS_TEXTDOMAIN'),
    ),		

    array(
        'id'      => 'smtp_auth_email',
        'type'    => 'text',
        'title'   => __('账户（电子邮件地址）','CS_TEXTDOMAIN'),
		'dependency'   => array( 'smtp_auth_yes', '==', 'true' ),
    ),

    array(
        'id'      => 'smtp_auth_pass',
        'type'    => 'password',
        'title'   => __('密码','CS_TEXTDOMAIN'),
		'dependency'   => array( 'smtp_auth_yes', '==', 'true' ),
    ),

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('默认发件人','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'smtp_from_name',
        'type'    => 'text',
        'title'   => __('发件人昵称','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'smtp_from_email',
        'type'    => 'text',
        'title'   => __('发件人邮箱','CS_TEXTDOMAIN'),
		'after'   => ' <span class="cs-text-muted">'.__('主要用于用户回复您时的邮件接收邮箱','CS_TEXTDOMAIN').'</span>',
    ),

    /*array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('测试邮件，请先保存设置再发送测试邮件测试邮件功能是否正常','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'mail_to_email',
        'type'    => 'text',
        'title'   => __('收件人邮箱','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'mail_to_title',
        'type'    => 'text',
        'title'   => __('测试邮件主题','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'mail_to_content',
        'type'    => 'textarea',
        'title'   => __('测试邮件内容','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'mail_to_sentTest',
        'type'    => 'submit',
        'button_title'   => __('发送测试邮件','CS_TEXTDOMAIN'),
    ),	*/

  )
);


// ------------------------------
// 网站维护                       -
// ------------------------------
$options[]   = array(
  'name'     => 'manager_maintenance_section',
  'title'    => __('维护模式','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-bug',
  'fields'   => array(

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('基本设置，与wordpress自带Jquery库不兼容（网站维护，ThemeFuse Maintenance Mode <a href="https://wordpress.org/plugins/themefuse-maintenance-mode/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>）','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_maintenance',
        'type'    => 'switcher',
        'title'   => __('网站维护','CS_TEXTDOMAIN'),
		'label'   => __('启用网站维护模式后，网站无法正常访问','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'enable_maintenance_notice',
        'type'    => 'switcher',
        'title'   => __('维护通知','CS_TEXTDOMAIN'),
		'label'   => __('启用后，将在后台提示您网站正处于维护模式','CS_TEXTDOMAIN'),
		'default' => true,
    ),

    array(
        'id'      => 'enable_maintenance_503',
        'type'    => 'switcher',
        'title'   => __('503 HTTP状态码','CS_TEXTDOMAIN'),
		'default' => true,
		'label'   => __('503是一种HTTP状态码,表示由于临时的服务器维护或者过载，服务器当前无法处理请求','CS_TEXTDOMAIN'),
    ),

    array(
		'id'       => 'maintenance_page_title',
		'type'     => 'text',
		'title'    => __('维护页面标题','CS_TEXTDOMAIN'),
		'after'    => ' <small class="cs-text-warning">'.__('( * 必填 )','CS_TEXTDOMAIN').'</small>',
		'default'  => __('网站维护中','CS_TEXTDOMAIN'),
		'attributes'    => array(
            'placeholder' => __('例如：网站维护中','CS_TEXTDOMAIN'),
		)
    ),

    array(
		'id'       => 'maintenance_subject',
		'type'     => 'text',
		'title'    => __('维护主题','CS_TEXTDOMAIN'),
		'after'    => ' <small class="cs-text-warning">'.__('( * 必填 )','CS_TEXTDOMAIN').'</small>',
		'default'  => __('网站例行维护','CS_TEXTDOMAIN'),
		'attributes'    => array(
            'placeholder' => __('例如：网站例行维护','CS_TEXTDOMAIN'),
		)
    ),

    array(
        'id'      => 'maintenance_progress',
        'type'    => 'number',
        'title'   => __('维护进度','CS_TEXTDOMAIN'),
		'default' => '10',
		'after'   => ' <span class="cs-text-muted">'.__('( %，网站当前维护进度)','CS_TEXTDOMAIN').'</span>',
    ),

    array(
		'id'       => 'maintenance_completeDate',
		'type'     => 'text',
		'title'    => __('维护完成时间','CS_TEXTDOMAIN'),
		'after'    => ' <small class="cs-text-muted">( '.__('例如：2015/01/01，时间格式：年/月/日','CS_TEXTDOMAIN').' )</small>',
		//'validate' => 'required',
    ),

	array(
        'id'      => 'enable_maintenance_auto_end',
        'type'    => 'switcher',
        'title'   => __('到达指定的维护完成时间自动结束维护模式','CS_TEXTDOMAIN'),
        'default' => true,
    ),

    array(
        'id'       => 'maintenance_content',
        'type'     => 'wysiwyg',
		'title'    => __('维护内容','CS_TEXTDOMAIN'),
		'info'     => '<p class="cs-text-muted">'.__('例如：网站临时维护中，请稍后访问，程序员正在疯狂加班！','CS_TEXTDOMAIN').'</p>',
		'default'  => __('网站临时维护中，请稍后访问，程序员正在疯狂加班！','CS_TEXTDOMAIN'),
		'settings' => array(
            'textarea_rows' => 3,
            'tinymce'       => false,
            'media_buttons' => false,
        )
    ),

    array(
        'id'       => 'maintenance_footer',
        'type'     => 'wysiwyg',
		'title'    => __('页脚内容','CS_TEXTDOMAIN'),
		'info'     => '<p class="cs-text-muted">'.__('例如：网站版权信息！','CS_TEXTDOMAIN').'</p>',
		//'default'  => 'Copyright ©&nbsp;'.date('Y').'&nbsp;'.get_bloginfo('name'). __('版权所有','CS_TEXTDOMAIN'),
		'settings' => array(
            'textarea_rows' => 3,
            'tinymce'       => false,
            'media_buttons' => false,
        )
    ),

    array(
        'id'       => 'maintenance_ip_exclude',
        'type'     => 'textarea',
		'title'    => __('IP白名单','CS_TEXTDOMAIN'),
		'desc'     => '<small class="cs-text-muted">'.__('( 以下IP可以正常访问网站 )','CS_TEXTDOMAIN').'</small>',
		'info'     => '<span class="cs-text-warning">'.__('一个IP地址一行','CS_TEXTDOMAIN').'</span>',
    ),

    array(
        'id'      => 'enable_maintenance_social',
        'type'    => 'switcher',
        'title'   => __('显示社交链接','CS_TEXTDOMAIN'),
		'default' => false,
    ),

    array(
        'id'              => 'maintenance_social',
        'type'            => 'group',
        'title'           => __('自定义社交链接','CS_TEXTDOMAIN'),
        'button_title'    => __('添加链接','CS_TEXTDOMAIN'),
        'accordion_title' => __('链接','CS_TEXTDOMAIN'),
		'dependency'      => array( 'enable_maintenance_social', '==', 'true' ),
        'fields'          => array(

            array(
              'id'          => 'maintenance_social_title',
              'type'        => 'text',
              'title'       => __('链接标题','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => __('例如：我的微博','CS_TEXTDOMAIN'),
			  )
            ),

            array(
              'id'          => 'maintenance_social_url',
              'type'        => 'text',
              'title'       => __('社交链接','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  )
            ),

            array(
              'id'          => 'maintenance_social_class',
              'type'        => 'text',
              'title'       => __('自定义的class类（方便添加CSS样式）','CS_TEXTDOMAIN'),
            ),

			/*array(
			  'id'      => 'maintenance_social_iconStyle',
			  'type'    => 'radio',
			  'title'   => __('图标类型','CS_TEXTDOMAIN'),
			  'class'   => 'horizontal',
			  'options' => array(
				'icon'   => __('字体图标','CS_TEXTDOMAIN'),
				'img'    => __('自定义图片','CS_TEXTDOMAIN'),
			  ),
			  'default' => 'icon',
			),	*/

			array(
			  'id'      => 'maintenance_social_icon',
			  'type'    => 'icon',
			  'title'   => __('字体图标','CS_TEXTDOMAIN'),
			  'button_title' => __('添加图标','CS_TEXTDOMAIN'),
			  //'dependency'   => array( 'maintenance_social_iconStyle_icon', '==', 'true' ),
			  'attributes'    => array(
				'button_title' => __('添加图标','CS_TEXTDOMAIN'),
			  )
			),

			/*array(
			  'id'      => 'maintenance_social_color',
			  'type'    => 'color_picker',
			  'title'   => __('字体图标颜色','CS_TEXTDOMAIN'),
			  'default' => '#333333',
			  'rgba'    => false,
			),

			array(
			  'id'      => 'maintenance_social_border_color',
			  'type'    => 'color_picker',
			  'title'   => __('字体图标边框颜色','CS_TEXTDOMAIN'),
			  'default' => '#333333',
			  'rgba'    => false,
			),

			array(
			  'id'      => 'maintenance_social_hover_background',
			  'type'    => 'color_picker',
			  'title'   => __('字体图标鼠标经过背景颜色','CS_TEXTDOMAIN'),
			  'default' => '#333333',
			  'rgba'    => false,
			),*/

			/*array(
			  'id'            => 'maintenance_social_image',
			  'type'          => 'upload',
			  'title'         => __('自定义图片','CS_TEXTDOMAIN'),
			  'dependency'   => array( 'maintenance_social_iconStyle_img', '==', 'true' ),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  ),
			  'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => __('上传','CS_TEXTDOMAIN'),
				'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
				'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
			  ),
			),*/

        ),
    ),

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('外观设置','CS_TEXTDOMAIN'),
    ),

    array(
        'id'      => 'maintenance_theme',
        'type'    => 'radio',
        'title'   => __('维护页面模板','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            'style1'   => 'Style1',
            'style2'   => 'Style2',
			'style3'   => 'Style3',
        ),
		'default' => 'style1',
    ),

	array(
        'id'            => 'maintenance_logo',
        'type'          => 'upload',
        'title'         => __('维护页面LOGO','CS_TEXTDOMAIN'),
		'default'       => get_template_directory_uri()."/assets/images/logo.png",
		'settings'      => array(
			'upload_type'  => 'image',
			'button_title' => __('上传','CS_TEXTDOMAIN'),
			'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
			'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
		),
	),

    array(
        'id'      => 'maintenance_body_background',
        'type'    => 'color_picker',
        'title'   => __('页面整体背景色（body）','CS_TEXTDOMAIN'),
        'default' => '#f1f1f1',
		'rgba'    => false,
    ),

    array(
        'id'    => 'maintenance_background',
        'type'  => 'background',
        'title' => __('页面背景图片','CS_TEXTDOMAIN'),
        'desc'  => __('设置维护页面背景','CS_TEXTDOMAIN'),
		'default'      => array(
			'image'      => get_template_directory_uri()."/lib/images/bg/parallax5.jpg",
			'repeat'     => 'no-repeat',
			'position'   => 'center center',
			'attachment' => 'fixed',
			'color'      => '#f1f1f1',
		),
    ),

    array(
        'id'      => 'maintenance_subject_color',
        'type'    => 'color_picker',
        'title'   => __('维护主题文字颜色','CS_TEXTDOMAIN'),
        'default' => '#ea5504',
		//'rgba'    => false,
    ),

    array(
        'id'      => 'maintenance_content_color',
        'type'    => 'color_picker',
        'title'   => __('维护内容文字颜色','CS_TEXTDOMAIN'),
        //'default' => '#333333',
		//'rgba'    => false,
    ),

    array(
        'id'      => 'maintenance_footer_color',
        'type'    => 'color_picker',
        'title'   => __('页脚内容文字颜色','CS_TEXTDOMAIN'),
        //'default' => '#666666',
		//'rgba'    => false,
    ),

    array(
        'id'      => 'maintenance_date_color',
        'type'    => 'color_picker',
        'title'   => __('维护完成时间文字颜色','CS_TEXTDOMAIN'),
        'default' => '#ea5504',
		//'rgba'    => false,
    ),

    array(
        'id'      => 'maintenance_process_color',
        'type'    => 'color_picker',
        'title'   => __('维护进度条背景色','CS_TEXTDOMAIN'),
        'default' => '#ea5504',
		//'rgba'    => false,
    ),

    array(
        'id'       => 'maintenance_custom_style',
        'type'     => 'textarea',
		'title'    => __('自定义CSS样式','CS_TEXTDOMAIN'),
		'info'     => '<span class="cs-text-warning">'.__('无需使用&lt;style&gt;标签','CS_TEXTDOMAIN').'</span>',
    ),

  )
);

// ------------------------------
// rewrite                      -
// ------------------------------
$options[]   = array(
  'name'     => 'manager_rewrite_section',
  'title'    => __('固定链接','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-link',
  'fields'   => array(

        array(
          'type'    => 'content',
          'content' => __('修改设置后，请访问WP后台 - 设置 - 固定链接，填写与以下设置对应的规则，保存设置即可。如果访问页面出现 404 错误，很可能是你的主机不支持伪静态，请联系你的主机商。','CS_TEXTDOMAIN'),
        ),

        array(
            'type'    => 'notice',
            'class'   => 'info',
            'content' => __('分类链接','CS_TEXTDOMAIN'),
        ),

        array(
            'id'      => 'enable_no_categoty',
            'type'    => 'switcher',
            'title'   => __('分类url去除category','CS_TEXTDOMAIN'),
    		'default' => true,
    		'label'   => __('主题已内置no-category插件功能，请不要安装插件；开启后请去设置-固定连接中点击保存即可','CS_TEXTDOMAIN'),
        ),

        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('搜索链接美化','CS_TEXTDOMAIN'),
        ),

        array(
          'id'      => 'enable_search_link_redirect',
          'type'    => 'switcher',
          'title'   => __('搜索页面URL重写','CS_TEXTDOMAIN'),
		  'default' => '1',
		  'help'    => __('注：需要主机支持伪静态（即支持 rewrite）','CS_TEXTDOMAIN'),
		  'label'   => '<span class="cs-text-warning">'.__('搜索结果页面的默认链接是这样的：','CS_TEXTDOMAIN').'domain/?s=keywordk，'.__('你可以将它修改为','CS_TEXTDOMAIN').'domain/search/keyword</span>',
        ),

        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('自定义文章类型固定链接：别名形式','CS_TEXTDOMAIN'),
        ),

        array(
          'id'              => 'post_name_rewrites',
          'type'            => 'group',
          'title'           => __('自定义伪静态规则','CS_TEXTDOMAIN'),
          'button_title'    => __('添加规则','CS_TEXTDOMAIN'),
          'accordion_title' => __('规则','CS_TEXTDOMAIN'),
          'fields'          => array(

			array(
			  'id'             => 'post_type',
			  'type'           => 'select',
			  'title'          => __('选择文章类型','CS_TEXTDOMAIN'),
			  'options'        => 'post_types',
			  'class'          => 'chosen',
			  'attributes'           => array(
				  'data-placeholder' => __('请选择','CS_TEXTDOMAIN'),
				  //'multiple'       => 'only-key',
				  'style'            => 'width: 200px;'
			  ),
			),

            array(
              'id'          => 'post_type_slug',
              'type'        => 'text',
              'title'       => __('别名','CS_TEXTDOMAIN'),
            ),

          ),
        ),

        array(
          'id'    => 'enable_post_name_rewrites',
          'type'  => 'switcher',
          'title' => __('是否启用该伪静态规则','CS_TEXTDOMAIN'),
        ),

        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('自定义文章类型固定链接：ID形式','CS_TEXTDOMAIN'),
        ),

        array(
          'id'              => 'post_id_rewrites',
          'type'            => 'group',
          'title'           => __('自定义伪静态规则','CS_TEXTDOMAIN'),
          'button_title'    => __('添加规则','CS_TEXTDOMAIN'),
          'accordion_title' => __('规则','CS_TEXTDOMAIN'),
          'fields'          => array(

			array(
			  'id'             => 'post_type',
			  'type'           => 'select',
			  'title'          => __('选择文章类型','CS_TEXTDOMAIN'),
			  'options'        => 'post_types',
			  'class'          => 'chosen',
			  'attributes'           => array(
				  'data-placeholder' => __('请选择','CS_TEXTDOMAIN'),
				  //'multiple'       => 'only-key',
				  'style'            => 'width: 200px;'
			  ),
			),

            array(
              'id'          => 'post_type_slug',
              'type'        => 'text',
              'title'       => __('别名','CS_TEXTDOMAIN'),
            ),

          ),
        ),

        array(
          'id'    => 'enable_post_id_rewrites',
          'type'  => 'switcher',
          'title' => __('是否启用该伪静态规则','CS_TEXTDOMAIN'),
        ),

  )
);

// ------------------------------
// 浏览器升级                       -
// ------------------------------
$options[]   = array(
  'name'     => 'manager_browser_section',
  'title'    => __('浏览器升级','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-chrome',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => __('当用户的浏览器不支持你的网站时，弹出浏览器升级提示','CS_TEXTDOMAIN'),
    ),  

    array(
      'id'    => 'enable_outdated_browser',
      'type'  => 'switcher',
      'title' => __('是否启用浏览器升级提示','CS_TEXTDOMAIN'),
    ), 
	
    array(
        'id'             => 'ie_browser',
        'type'           => 'select',
        'title'          => __('微软 IE 浏览器','CS_TEXTDOMAIN'),
        'options'        => array(
            '0'          => __('禁用','CS_TEXTDOMAIN'),
            '11'         => 'IE 11',
			'10'         => 'IE 10',
			'9'          => 'IE 9',
			'8'          => 'IE 8',
			'7'          => 'IE 7',
			'6'          => 'IE 6',
        ),
		'default'        => '9',
		'before'         => __('从版本：','CS_TEXTDOMAIN'),
        'help'           => __('如果主题不支持老旧浏览器，提醒访客升级浏览器','CS_TEXTDOMAIN'),
    ),
	
    array(
        'id'             => 'chrome_browser',
        'type'           => 'select',
        'title'          => __('谷歌 Chrome 浏览器','CS_TEXTDOMAIN'),
        'options'        => array(
            '0'          => __('禁用','CS_TEXTDOMAIN'),
            '46'         => '46',
			'45'         => '45',
			'44'         => '44',
			'43'         => '43',
			'42'         => '42',
			'41'         => '41',
            '40'         => '40',
			'39'         => '39',
			'38'         => '38',
			'37'         => '37',
			'36'         => '36',
			'35'         => '35',
            '34'         => '34',
			'33'         => '33',
			'32'         => '32',
			'31'         => '31',
			'30'         => '30',
			'29'         => '29',
			'28'         => '28',
			'27'         => '27',
			'26'         => '26',
            '25'         => '25',
			'24'         => '24',
			'23'         => '23',
			'22'         => '22',
			'21'         => '21',
			'20'         => '20',
            '19'         => '19',
			'18'         => '18',
			'17'         => '17',
			'16'         => '16',
			'15'         => '15',			
        ),
		'default'        => '32',
		'before'         => __('从版本：','CS_TEXTDOMAIN'),
        'help'           => __('如果主题不支持老旧浏览器，提醒访客升级浏览器','CS_TEXTDOMAIN'),
    ),
	
    array(
        'id'             => 'firefox_browser',
        'type'           => 'select',
        'title'          => __('火狐 Firefox 浏览器','CS_TEXTDOMAIN'),
        'options'        => array(
            '0'          => __('禁用','CS_TEXTDOMAIN'),
			'41'         => '41',
            '40'         => '40',
			'39'         => '39',
			'38'         => '38',
			'37'         => '37',
			'36'         => '36',
			'35'         => '35',
            '34'         => '34',
			'33'         => '33',
			'32'         => '32',
			'31'         => '31',
			'30'         => '30',
			'29'         => '29',
			'28'         => '28',
			'27'         => '27',
			'26'         => '26',
            '25'         => '25',
			'24'         => '24',
			'23'         => '23',
			'22'         => '22',
			'21'         => '21',
			'20'         => '20',
            '19'         => '19',
			'18'         => '18',
			'17'         => '17',
			'16'         => '16',
			'15'         => '15',			
        ),
		'default'        => '28',
		'before'         => __('从版本：','CS_TEXTDOMAIN'),
        'help'           => __('如果主题不支持老旧浏览器，提醒访客升级浏览器','CS_TEXTDOMAIN'),
    ),
	
    array(
        'id'             => 'safari_browser',
        'type'           => 'select',
        'title'          => __('Safari 浏览器','CS_TEXTDOMAIN'),
        'options'        => array(
            '0'          => __('禁用','CS_TEXTDOMAIN'),
            '9'          => '9',
			'8'          => '8',
			'7.1'        => '7.1',
			'7'          => '7',
			'6.1'        => '6.1',
			'6'          => '6',
			'5.1'        => '5.1',
			'5'          => '5',
			'4'          => '4',
			'3.2'        => '3.2',
			'3.1'        => '3.1',
        ),
		'default'        => '5',
		'before'         => __('从版本：','CS_TEXTDOMAIN'),
        'help'           => __('如果主题不支持老旧浏览器，提醒访客升级浏览器','CS_TEXTDOMAIN'),
    ),
	
    array(
        'id'             => 'opera_browser',
        'type'           => 'select',
        'title'          => __('Opera 浏览器','CS_TEXTDOMAIN'),
        'options'        => array(
            '0'          => __('禁用','CS_TEXTDOMAIN'),
			'32'         => '32',
			'31'         => '31',
			'30'         => '30',
			'29'         => '29',
			'28'         => '28',
			'27'         => '27',
			'26'         => '26',
            '25'         => '25',
			'24'         => '24',
			'23'         => '23',
			'22'         => '22',
			'21'         => '21',
			'20'         => '20',
            '19'         => '19',
			'18'         => '18',
			'12.1'       => '12.1',
			'11.5'       => '11.5',
			'10.5'       => '10.5',			
        ),
		'default'        => '11.5',
		'before'         => __('从版本：','CS_TEXTDOMAIN'),
        'help'           => __('如果主题不支持老旧浏览器，提醒访客升级浏览器','CS_TEXTDOMAIN'),
    ),	
		
    array(
        'id'     => 'outdated_browser_tips',
        'type'   => 'textarea',
        'before' => '<h4>'.__('提示信息','CS_TEXTDOMAIN').'</h4>',
        'after'  => '<p class="cs-text-muted">'.__('说明：当用户的浏览器不支持你的网站时，这个通知信息将会显示。','CS_TEXTDOMAIN').'</p>',
		'default'=> __('为了更佳的浏览体验，将您的浏览器保持最新。在这里您可以获得最新的版本。','CS_TEXTDOMAIN'),
		'sanitize' => false,
    ),  	

  )
);

// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'manager_backup_section',
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

CSManager::instance( $settings, $options );
