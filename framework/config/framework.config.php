<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => __('高级设置', 'CS_TEXTDOMAIN'),
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  //'menu_parent'     => 'themes.php',
  'menu_slug'       => 'theme-setting',
  'menu_icon'  => 'dashicons-art',
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
// 品牌                       -
// ------------------------------
$options[]   = array(
  'name'     => 'brand_section',
  'title'    => '品牌',
  'icon'     => 'fa fa-globe',
  'fields'   => array(

        array(
          'id'            => 'company_logo',
          'type'          => 'upload',
          'title'         => '品牌LOGO',
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
      'default' => get_template_directory_uri()."/assets/images/asta-logo.png",
      'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
      ),
        ),

    array(
          'id'            => 'company_brandQrcode',
          'type'          => 'upload',
          'title'         => '品牌二维码',
      'default'       => get_template_directory_uri()."/assets/images/brandQrcode.png",
      'after'         => ' <span class="cs-text-warning">( 微信公众号二维码或官方网站二维码等 )</span>',
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
      'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
      ),
    ),
    
        array(
          'id'     => 'company_video',
          'type'   => 'text',
          'title'  => '品牌宣传视频',
      'after'  => ' <span class="cs-text-warning">( 线上视频地址，建议上传到优酷或youtube )</span>',
          'attributes'    => array(
            'placeholder' => 'http://'
          ),      
        ),    
    
        array(
          'id'     => 'company_name',
          'type'   => 'text',
          'title'  => '公司名称',
        ),  
        array(
          'id'     => 'company_site',
          'type'   => 'text',
          'title'  => '公司网站',
        ), 
  
    array(
      'id'       => 'company_email',
      'type'     => 'text',
      'title'    => '企业邮箱',
      //'validate' => 'email',
    ),

    array(
      'id'       => 'company_tel',
      'type'     => 'text',
      'title'    => '公司电话',
      //'validate' => 'numeric',
    ),

    array(
      'id'       => 'company_fax',
      'type'     => 'text',
      'title'    => '传真号',
      //'validate' => 'numeric',
    ),      
    array(
      'id'       => 'company_skype',
      'type'     => 'text',
      'title'    => 'Skype',
      //'validate' => 'numeric',
    ),
        array(
          'id'         => 'company_add',
          'type'       => 'text',
          'title'      => '公司地址',
          'attributes' => array(
            'style'    => 'width: 100%;'
          ),
        ),    
    
        array(
          'id'     => 'company_adwords',
          'type'   => 'textarea',
          'title' => '宣传语',
      'after'  => '<p class="cs-text-muted">说明：一句话广告语，体现公司的核心优势，支持html</p>',
          'settings' => array(
            'textarea_rows' => 2,
            //'tinymce'       => false,
            'media_buttons' => false,
          )     
        ),
    
        array(
          'id'     => 'company_profile',
          'type'   => 'wysiwyg',
          'title' => '公司简介',
          'settings' => array(
            'textarea_rows' => 2,
            //'tinymce'       => false,
            'media_buttons' => false,
          )       
        ),
    
        array(
          'id'     => 'company_patent_disclaimer',
          'type'   => 'textarea',
          'title' => '专利免责声明',
          'settings' => array(
            'textarea_rows' => 2,
            //'tinymce'       => false,
            'media_buttons' => false,
          )       
        ),    

        array(
          'id'              => 'company_social',
          'type'            => 'group',
          'title'           => '自定义社交链接',
          'button_title'    => '添加链接',
          'accordion_title' => '链接',
          'fields'          => array(

            array(
              'id'          => 'social_title',
              'type'        => 'text',
              'title'       => '链接标题',
        'attributes'    => array(
        'placeholder' => '例如：我的微博'
        )
            ),
      
            array(
              'id'          => 'social_url',
              'type'        => 'text',
              'title'       => '社交链接',
        'attributes'    => array(
        'placeholder' => 'http://'
        )
            ),  
      
            array(
              'id'          => 'social_class',
              'type'        => 'text',
              'title'       => '自定义的class类（方便添加CSS样式）',
            ),        

      /*array(
        'id'      => 'social_iconStyle',
        'type'    => 'radio',
        'title'   => '图标类型',
        'class'   => 'horizontal',
        'options' => array(
        'icon'   => '字体图标',
        'img'    => '自定义图片',
        ),
        'default' => 'icon',
      ),  */

      array(
        'id'      => 'social_icon',
        'type'    => 'icon',
        'title'   => '字体图标',
        'button_title' => '添加图标',
        //'dependency'   => array( 'social_iconStyle_icon', '==', 'true' ),
        'attributes'    => array(
        'button_title' => '添加图标'
        )
      ),
      
      /*array(
        'id'            => 'social_image',
        'type'          => 'upload',
        'title'         => '自定义图片',
        'dependency'   => array( 'social_iconStyle_img', '==', 'true' ),
        'attributes'    => array(
        'placeholder' => 'http://'
        ),
        'settings'      => array(
        'upload_type'  => 'image',
        'button_title' => '上传',
        'frame_title'  => '选择图像',
        'insert_title' => '使用图像',
        ),
      ),*/          

          ),
        ),

        array(
          'id'              => 'company_advantage',
          'type'            => 'group',
          'title'           => '品牌核心优势',
          'button_title'    => '添加优势',
          'accordion_title' => '优势',
          'fields'          => array(

            array(
              'id'          => 'advantage_title',
              'type'        => 'text',
              'title'       => '标题',
            ),
      
            array(
              'id'          => 'advantage_url',
              'type'        => 'text',
              'title'       => '链接',
        'attributes'    => array(
        'placeholder' => 'http://'
        )
            ),

            array(
              'id'          => 'advantage_description',
              'type'        => 'textarea',
              'title'       => '描述',
            ),      

      array(
        'id'      => 'advantage_iconStyle',
        'type'    => 'radio',
        'title'   => '图标类型',
        'class'   => 'horizontal',
        'options' => array(
        'icon'   => '字体图标',
        'img'    => '自定义图片',
        ),
        'default' => 'icon',
      ),  

      array(
        'id'      => 'advantage_icon',
        'type'    => 'icon',
        'title'   => '字体图标',
        'button_title' => '添加图标',
        'dependency'   => array( 'advantage_iconStyle_icon', '==', 'true' ),
        'attributes'    => array(
        'button_title' => '添加图标'
        )
      ),
      
      array(
        'id'            => 'advantage_image',
        'type'          => 'upload',
        'title'         => '自定义图片',
        'dependency'   => array( 'advantage_iconStyle_img', '==', 'true' ),
        'attributes'    => array(
        'placeholder' => 'http://'
        ),
        'settings'      => array(
        'upload_type'  => 'image',
        'button_title' => '上传',
        'frame_title'  => '选择图像',
        'insert_title' => '使用图像',
        ),
      ),          

          ),
        ),  

        array(
          'id'              => 'company_history',
          'type'            => 'group',
          'title'           => '发展历程',
          'button_title'    => '添加历程',
          'accordion_title' => '历程',
          'fields'          => array(

            array(
              'id'          => 'history_title',
              'type'        => 'text',
              'title'       => '时间',
            ),
      
            array(
              'id'          => 'history_add',
              'type'        => 'text',
              'title'       => '地点',
            ),

            array(
              'id'          => 'history_description',
              'type'        => 'textarea',
              'title'       => '描述',
            ),        
      
      array(
        'id'            => 'history_image',
        'type'          => 'upload',
        'title'         => '自定义图片',
        'attributes'    => array(
        'placeholder' => 'http://'
        ),
        'settings'      => array(
        'upload_type'  => 'image',
        'button_title' => '上传',
        'frame_title'  => '选择图像',
        'insert_title' => '使用图像',
        ),
      ),          

          ),
        ),  

        array(
          'id'              => 'company_facts',
          'type'            => 'group',
          'title'           => '数据事实（SOME FUN FACTS）',
          'button_title'    => '添加数据',
          'accordion_title' => '数据',
          'fields'          => array(

            array(
              'id'          => 'facts_number',
              'type'        => 'text',
              'title'       => '事实数字',
            ),

            array(
              'id'      => 'facts_after',
              'type'    => 'text',
              'title'   => __('后缀','CS_TEXTDOMAIN'),
              //'default' => false,
            ),

            array(
              'id'          => 'facts_description',
              'type'        => 'text',
              'title'       => '数字说明',
            ),      
      
            array(
              'id'          => 'facts_url',
              'type'        => 'text',
              'title'       => '链接',
        'attributes'    => array(
        'placeholder' => 'http://'
        )
            ),  
      
            array(
              'id'          => 'facts_class',
              'type'        => 'text',
              'title'       => '自定义的class类（方便添加CSS样式）',
            ),        

      array(
        'id'      => 'facts_icon',
        'type'    => 'icon',
        'title'   => '字体图标',
        'button_title' => '添加图标',
        //'dependency'   => array( 'social_iconStyle_icon', '==', 'true' ),
        'attributes'    => array(
        'button_title' => '添加图标'
        )
      ),            

          ),
        ),    

  )
);


// ------------------------------
// 在线客服                      -
// ------------------------------
$options[]   = array(
  'name'     => 'onlineService_section',
  'title'    => '客服',
  'icon'     => 'fa fa-users',
  'fields'   => array(

        array(
          'id'    => 'enable_onlineService',
          'type'  => 'switcher',
          'title' => '是否启用在线客服',
        ), 

        array(
          'id'    => 'enable_onlineService_mobile',
          'type'  => 'switcher',
          'title' => '移动端是否显示客服',
      'default' => false,
        ),  

        array(
          'id'    => 'enable_onlineService_ec',
          'type'  => 'switcher',
          'title' => '腾讯EC营客通 <a href="http://ec.qq.com/" target="_blank" style="outline:none;border:none" onFocus="this.blur()" title="打开营客通官网"><i class="cs-icon fa fa-external-link"></i></a>',
      'default' => false,
      'label'   => '<span class="cs-text-warning">需要额外引入JS</span>',
        ),      
    
        array(
          'id'     => 'onlineService_ec_js',
          'type'   => 'textarea',
          'title'  => '腾讯EC营客通JS代码',
      'sanitize' => false,
      'dependency'   => array( 'enable_onlineService_ec', '==', 'true' ),
        ), 
    
        array(
          'id'     => 'onlineService_ec_css',
          'type'   => 'textarea',
      'title' => '腾讯EC营客通自定义样式',
      'sanitize' => false,
      'dependency'   => array( 'enable_onlineService_ec', '==', 'true' ),
        ),      

        /*array(
          'id'    => 'enable_onlineService_ec_skin',
          'type'  => 'switcher',
          'title' => '隐藏腾讯EC营客通默认样式',
      'default' => false,
      'dependency'   => array( 'enable_onlineService_ec', '==', 'true' ),
        ),      

        array(
          'id'    => 'enable_onlineService_name',
          'type'  => 'switcher',
          'title' => '是否显示客服名称',
      'default' => true,
        ),
    
        array(
          'id'       => 'onlineService_otherInfo',
          'type'     => 'wysiwyg',
          'title'    => '其他信息',
      'after'    => '<p class="cs-text-warning">支持HTML语言，可加入第三方代码</p>',
        ),*/

        array(
          'id'              => 'onlineService',
          'type'            => 'group',
          'title'           => '在线客服',
          'button_title'    => '添加客服',
          'accordion_title' => '客服',
          'fields'          => array(

            array(
              'id'          => 'onlineService_name',
              'type'        => 'text',
              'title'       => '客服名称',
            ),

            array(
              'id'          => 'onlineService_description',
              'type'        => 'textarea',
              'title'       => '客服简介',
            ),

      array(
        'id'      => 'onlineService_type',
        'type'    => 'radio',
        'title'   => '客服类型',
        'class'   => 'horizontal',
        'options' => array(
        '1'    => '售前客服',
        '2'    => '售后客服',
        '3'    => '技术支持',
        ),
        'default' => '1',
      ),  

      array(
        'id'     => 'enable_onlineService_show',
        'type'   => 'switcher',
        'title'  => '是否在前端显示',
        'default'=> true
      ),      
      
      array(
        'id'            => 'onlineService_thumb',
        'type'          => 'upload',
        'title'         => '客服大头贴（正方形图片）',
        'attributes'    => array(
        'placeholder' => 'http://'
        ),
        'settings'      => array(
        'upload_type' => 'image',
        'button_title'=> '上传',
        'frame_title' => '选择图像',
        'insert_title'=> '使用图像',
        ),        
        'default'       =>get_template_directory_uri()."/assets/images/avatar/avatar.png",
      ),
      
      /**array(
        'id'            => 'onlineService_image',
        'type'          => 'upload',
        'title'         => '客服生活照（长方形图片）',
        'attributes'    => array(
        'placeholder' => 'http://'
        ),
        'settings'      => array(
        'upload_type'  => 'image',
        'button_title' => '上传',
        'frame_title'  => '选择图像',
        'insert_title' => '使用图像',
        ),
      ),  */  

            array(
              'id'          => 'onlineService_mobileNum',
              'type'        => 'text',
              'title'       => '手机号',
            ),

            array(
              'id'          => 'onlineService_telNum',
              'type'        => 'text',
              'title'       => '座机号',
            ),
      
            array(
              'id'          => 'onlineService_qq',
              'type'        => 'text',
              'title'       => 'QQ账号',
            ),  

            array(
              'id'          => 'onlineService_skype',
              'type'        => 'text',
              'title'       => 'Skype账号',
            ),

            array(
              'id'          => 'onlineService_ec',
              'type'        => 'text',
              'title'       => '腾讯EC营客通账号',
            ),      

          ),
        ),    

  )
);

// ------------------------------
// 基本设置                      -
// ------------------------------
$options[]   = array(
  'name'     => 'general_section',
  'title'     => __('基本设置','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-cog',
      // begin: fields
      'fields'    => array(
  
        /**array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '主题设置',
        ),
    
        array(
          'id'           => 'theme_switch',
          'type'         => 'image_select',
          'title'        => '自定义主题',
          'options'      => array(
            '1'    => get_template_directory_uri()."/lib/theme/colorthemes/default.png",
            '2'    => get_template_directory_uri()."/lib/theme/colorthemes/blue.png",
            '3'    => get_template_directory_uri()."/lib/theme/colorthemes/green.png",
            '4'    => get_template_directory_uri()."/lib/theme/colorthemes/orange.png",
      '5'    => get_template_directory_uri()."/lib/theme/colorthemes/custom.png",
          ),
          'radio'        => true,
          'default'      => '4'
        ),    
      
        array(
          'id'      => 'enable_skinSwitch',
          'type'    => 'switcher',
          'title'   => '前台换肤',
      'default' => false,
      'label' => '此项禁用，前台换肤小工具失效；一旦开启，自定义主题将失效',
        ),*/
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
      'content' => '网站名称与副标题',
      //'content' => '网站名称与副标题：进入网站管理后台，在左边栏中找到“外观”一栏，并从子栏目中找到“自定义”栏目，点击进入修改 <a href="'.admin_url().'customize.php" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),
    
        array(
          'id'         => 'blogName',
          'type'       => 'text',
          'title'      => '网站名称',
          'attributes' => array(
            //'readonly' => 'only-key'
          ),
          'default'    => get_bloginfo('name'),
      'validate' => 'required',
        ),
    
        array(
          'id'         => 'blogDescription',
          'type'       => 'text',
          'title'      => '副标题',
          'attributes' => array(
            //'readonly' => 'only-key'
          ),
          'default'    => get_bloginfo('description'),
      'validate' => 'required',
        ),    
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '基本设置',
        ),    

        /*array(
          'id'      => 'custom_favicon',
          'type'    => 'upload',
          'title'   => 'Favicon图标',
      'default' => get_template_directory_uri()."/assets/images/ico/favicon.ico",
      'settings'=> array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
      ),      
        ),*/
    
        array(
          'id'      => 'custom_logoStyle',
          'type'    => 'radio',
          'title'   => '网站标志',
          'class'   => 'horizontal',
          'options' => array(
            '1'    => '显示LOGO',
            '2'    => '显示网站标题',
      '3'    => '显示字体图标',
          ),
      'default' => '1',
        ),      

        array(
          'id'      => 'custom_logo',
          'type'    => 'upload',
          'title'   => '网站LOGO',
      'dependency'   => array( 'custom_logoStyle_1', '==', 'true' ),
      'default' => get_template_directory_uri()."/assets/images/asta-logo.png",
      'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
      ),        
        ),
    
        array(
          'id'      => 'enable_logoTextAnimate',
          'type'    => 'switcher',
          'title'   => '网站标题动画',
      'dependency'   => array( 'custom_logoStyle_2', '==', 'true' ),
      'default' => false,
        ),      

    array(
      'id'      => 'custom_logoIcon',
      'type'    => 'icon',
      'title'   => '字体图标',
      'button_title' => '添加图标',
      'dependency'   => array( 'custom_logoStyle_3', '==', 'true' ),
      'attributes'    => array(
        'button_title' => '添加图标'
      )
      ),  
    
        array(
          'id'      => 'enable_friendlyLink',
          'type'    => 'switcher',
          'title'   => '前台友情链接',
      'default' => false,
      'label'   => '<span class="cs-text-warning">前提是要先开启“友情链接”功能</span>',
        ), 
        
        /*array(
          'id'      => 'enable_tags_postNum',
          'type'    => 'switcher',
          'title'   => '标签tag显示包含文章数量',
      'default' => true,
      'label'   => '在标签后显示当前标签下的文章数',
        ),*/
  
        /*array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '表单设置',
        ),      
    
        array(
          'id'         => 'contact_form',
          'type'       => 'text',
          'title'      => '联系表单',
      'sanitize'   => false,  
      //'validate' => 'required',
        ),
    
        array(
          'id'         => 'agent_form',
          'type'       => 'text',
          'title'      => '代理表单', 
      'sanitize'   => false,  
      //'validate' => 'required',
        ),*/  
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '页脚（显示在网站前台底部）',
        ),    
      
        array(
          'id'      => 'enable_gotoTop',
          'type'    => 'switcher',
          'title'   => '回到页面顶部按钮',
      'default' => true,
        ),
      
        array(
          'id'      => 'enable_siteQrcode',
          'type'    => 'switcher',
          'title'   => '站点二维码',
      'default' => false,
        ),    

    array(
          'id'            => 'siteQrcode',
          'type'          => 'upload',
          'title'         => '插入二维码',
      'default'       => get_template_directory_uri()."/assets/images/site-qrcode.png",
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
      'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
      ),
      'dependency'   => array( 'enable_siteQrcode', '==', 'true' ),
    ),    
    
        array(
          'id'     => 'footer_copyright',
          'type'   => 'textarea',
          'title' => '版权信息',
      'attributes' => array(
      'placeholder' => 'All Rights Reserved.',      
          ),
        ),  
    
        /*array(
          'id'       => 'footer_otherInfo',
          'type'     => 'wysiwyg',
          'title'    => '其他信息',
        ),  */ 
    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => '产品',
    ),
    array(
      'id'      => 'product_sum',
      'type'    => 'text',
      'title'   => __('总产品数','CS_TEXTDOMAIN'),
    ),
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

  ), // end: fields
);

// ------------------------------
// 自定义代码                   -
// ------------------------------
$options[]   = array(
  'name'     => 'custom_code_section',
  'title'     => __('自定义代码','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-code',

      // begin: fields
      'fields'    => array(
      
        array(
          'id'     => 'custom_meta',
          'type'   => 'textarea',
          'before' => '<h4>网站头部添加Meta代码</h4>',
          'after'  => '<p class="cs-text-muted">说明：可以用于各种Meta验证。</p>',
      'sanitize' => false,      
        ),    
      
        array(
          'id'     => 'custom_header',
          'type'   => 'textarea',
          'before' => '<h4>网站头部添加额外代码</h4>',
          'after'  => '<p class="cs-text-muted">说明：代码将添加到&lt;head&gt;标签中，您可以添加一些额外的CSS或JS。</p>',
          'sanitize' => false,      
        ), 
    
        array(
          'id'     => 'custom_footer',
          'type'   => 'textarea',
          'before' => '<h4>网站底部添加额外代码</h4>',
          'after'  => '<p class="cs-text-muted">说明：代码将添加到&lt;footer&gt;标签中，可以添加第三方代码（一般用于放置百度商桥代码、站长统计代码、谷歌翻译代码等）。</p>',
      'sanitize' => false,
        ),   

      ), // end: fields
);

// ------------------------------
// SEO优化                       -
// ------------------------------
$options[]   = array(
  'name'     => 'seo_section',
  'title'    => 'SEO',
  'icon'     => 'fa fa-flag-checkered',
  'fields'   => array(
  
       /** array(
          'type'    => 'notice',
      'class'   => 'info',
          'content' => '基本设置',
        ),   
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
      'content' => '网站名称与副标题',
      //'content' => '网站名称与副标题：进入网站管理后台，在左边栏中找到“外观”一栏，并从子栏目中找到“自定义”栏目，点击进入修改 <a href="'.admin_url().'customize.php" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),
    
        array(
          'id'         => 'blogName',
          'type'       => 'text',
          'title'      => '网站名称',
          'attributes' => array(
            //'readonly' => 'only-key'
          ),
          'default'    => get_bloginfo('name'),
      'validate' => 'required',
        ),
    
        array(
          'id'         => 'blogDescription',
          'type'       => 'text',
          'title'      => '副标题',
          'attributes' => array(
            //'readonly' => 'only-key'
          ),
          'default'    => get_bloginfo('description'),
      'validate' => 'required',
        ),
    
    array(
      'type'    => 'content',
      'content' => '当前宣传语：<strong class="cs-text-warning" style="margin:auto 20px;">'.cs_get_option( 'company_adwords' ).'</strong>（如需修改请到 “品牌” 设置页面修改）',
    ),
    
        array(
          'id'         => 'seo_title_divider',
          'type'       => 'text',
          'title'      => '标题间隔符',
          'default'    => '-',
      'after'  => '<span class="cs-text-warning">（网站标题分隔符:如果针对的是百度，分隔符可以选择_ |，针对谷歌的话，就选择 - , 及空格。）</span>',
          'attributes' => array(
            'style'    => 'width: 50px;'
          ),      
        ),    
  
        array(
          'type'    => 'notice',
      'class'   => 'info',
          'content' => '首页设置',
        ),  

        array(
          'id'      => 'seo_home_title_mode',
          'type'    => 'radio',
          'title'   => '首页标题（title）',
          'class'   => 'horizontal',
          'options' => array(
        '1'     => '网站名称+副标题（默认）',
            '2'     => '网站名称+宣传语（大公司常用）',
            '3'     => '网站关键词+网站名称（推荐）',
      '4'     => '自定义',
          ),
      'default' => '1',
        ),    
    
        array(
          'id'         => 'seo_title',
          'type'       => 'text',
      'before' => '<h4>标题（title）</h4>',
      'after'  => '<p class="cs-text-warning">说明：页面标题，一般不超过80个字符。</p>',
          'attributes' => array(
            'style'    => 'width: 100%;',
      'maxlength'   => 80,
      'placeholder' => '网站标题',      
          ),
      'dependency'   => array( 'seo_home_title_mode_4', '==', 'true' ),
        ),
    
        array(
          'id'     => 'seo_keywords',
          'type'   => 'textarea',
          'before' => '<h4>关键词（KeyWords）</h4>',
          'after'  => '<p class="cs-text-warning">说明：页面关键词，一般不超过100个字符。多个关键词请用英文半角逗号","或英文半角竖线"|"隔开。</p>',
      'attributes'    => array(
      'maxlength'   => 100,
      'placeholder' => '网站关键词',
      ),
        ), 
    
        array(
          'id'     => 'seo_description',
          'type'   => 'textarea',
          'before' => '<h4>描述（Description）</h4>',
          'after'  => '<p class="cs-text-warning">说明：页面简短描述，一般不超过200个字符，可将公司的具体联系方式写入描述中，方便客户直接联系。</p>',
      'attributes'    => array(
      'maxlength'   => 200,
      'placeholder' => '网站描述',
      ),
        ), 
  
        array(
          'type'    => 'notice',
      'class'   => 'info',
          'content' => '内页设置',
        ), 

        array(
          'id'      => 'seo_page_title_mode',
          'type'    => 'radio',
          'title'   => '内页标题（title）',
          'class'   => 'horizontal',
          'options' => array(
            '1'     => '内容标题',
            '2'     => '内容标题+关键词',
      '3'     => '内容标题+网站名称(推荐)',
      '4'     => '内容标题+关键词+网站名称',
          ),
      'default' => '3',
      'after'   => '<div class="cs-text-warning">内页的标题(title)构成方式，您也可以在编辑/添加内容时自定义对应页面的SEO标题(title)，如果SEO标题为空则使用上面设置的title构成方式。</div>',
        ),**/     
  
        array(
          'type'    => 'notice',
      'class'   => 'info',
          'content' => '图片ALT和TITLE属性，SEO Friendly Images <a href="https://wordpress.org/plugins/seo-image/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),
    
    array(
      'type'    => 'content',
      'content' => '<p>自动更新图片的 ALT和TITLE属性，图片的ALT和TITLE属性对于搜索引擎优化来说是非常重要的</p>
            <p class="cs-text-warning">您可以使用以下标签或者任何其他的文字：</p>
            <ul>
            <li>%site - 替换网站名称</li>
            <li>%title - 替换为文章标题</li>
            <li>%name - 替换为图像的文件名（不带扩展名）</li>
            <li>%category - 替换为文章分类目录</li>
            <li>%tag - 替换为文章标签</li></ul>',
    ),
    
        array(
          'id'         => 'image_alt_text',
          'type'       => 'text',
      'title'      => '图片alt属性',
      'help'       => '说明：图像不能正常显示（网速慢、图片链接错误）后显示的替换文本',
      'default'    => '%name %title',
        ),    
    
        array(
          'id'         => 'image_title_text',
          'type'       => 'text',
      'title'      => '图片title属性',
      'help'       => '说明：鼠标移至图片显示的文字',
      'default'    => '%title',
        ),
  
        array(
          'id'      => 'enable_image_alt_override',
          'type'    => 'switcher',
          'title'   => '替换默认的图片alt属性',
        ),  
  
        array(
          'id'      => 'enable_image_title_override',
          'type'    => 'switcher',
          'title'   => '替换默认的图片title属性',
        ),    

        /*array(
          'id'         => 'enable_seo_image',
          'type'       => 'checkbox',
          'title'      => '图片alt和title属性覆盖设置',
          'class'      => 'horizontal',
          'options'    => array(
            'alt'      => '替换默认的图片alt属性（推荐）',
            'title'    => '替换默认的图片title属性',
          ),
          'default'    => array( 'alt'),
        ),  */  
  
        /**array(
          'type'    => 'notice',
      'class'   => 'info',
          'content' => '高级设置',
        ),  
  
        array(
          'id'      => 'enable_post_link_nofollow_external',
          'type'    => 'switcher',
          'title'   => '文章站外链接自动添加nofollow属性和新窗口打开页面',
      'default' => '1',
        ),
  
        array(
          'id'      => 'enable_comment_link_nofollow_external',
          'type'    => 'switcher',
          'title'   => '评论站外链接自动添加nofollow属性和新窗口打开页面',
      'default' => '1',
        ),    
  
        array(
          'id'      => 'enable_post_tag_link',
          'type'    => 'switcher',
          'title'   => '自动为文章tag添加链接',
        ),  

    array(
      'id'      => 'post_tag_minNum',
      'type'    => 'number',
      'title'   => '一个标签在文章中出现少于多少次不添加链接',
      'default' => '1',
      'after'   => ' <span class="cs-text-muted">( 次 )</span>',
      'dependency'   => array( 'enable_post_tag_link', '==', 'true' ),
    ),

    array(
      'id'      => 'post_tag_linkNum',
      'type'    => 'number',
      'title'   => '一篇文章中同一个标签添加几次链接',
      'default' => '1',
      'after'   => ' <span class="cs-text-muted">( 次 )</span>',
      'dependency'   => array( 'enable_post_tag_link', '==', 'true' ),
    ),**/   
    
  )
);

// ------------------------------
// 轮播                       -
// ------------------------------
$options[]   = array(
  'name'     => 'carousel_section',
  'title'    => '轮播',
  'icon'     => 'fa fa-image',
  'fields'   => array(
  
    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => '首页幻灯片',
    ),  
  
    array(
        'id'      => 'enable_home_banner',
        'type'    => 'switcher',
        'title'   => '开启首页幻灯片',
    'default' => false,
    ),  
  
    /*array(
        'id'      => 'home_banner_autoPlay',
        'type'    => 'switcher',
        'title'   => '自动播放',
    'default' => true,
    ), 
  
    array(
        'id'      => 'home_banner_cyclePlay',
        'type'    => 'switcher',
        'title'   => '循环播放',
    'default' => true,
    ), 
  
    array(
        'id'      => 'home_banner_autoHeight',
        'type'    => 'switcher',
        'title'   => '自动调整高度',
    'default' => false,
    ), */
    
    array(
        'id'      => 'home_banner_width',
        'type'    => 'number',
        'title'   => '幻灯片宽度',
        'after'   => '<span class="cs-text-muted">(px，像素)</span>',
    'default' => '1920',
    //'validate' => 'numeric',
    ),  
    
    array(
        'id'      => 'home_banner_height',
        'type'    => 'number',
        'title'   => '幻灯片高度',
        'after'   => '<span class="cs-text-muted">(px，像素)</span>',
    'default' => '650',
    //'validate' => 'numeric',
    ),

    /*array(
        'id'      => 'home_banner_mode',
        'type'    => 'radio',
        'title'   => '幻灯片来源',
        'class'   => 'horizontal',
        'options' => array(
            '1'   => '文章',
      '2'   => '页面',
            '3'   => '分类',
      //'4'   => '标签',
      //'5'   => '内容类型',
      '4'   => '自定义',
        ),
    ),  

    array(
        'id'                 => 'home_banner_posts',
        'type'               => 'select',
        'title'              => '展示文章',
        'options'            => 'posts',
        'class'              => 'chosen',
    'dependency'         => array( 'home_banner_mode_1', '==', 'true' ),
        'attributes'         => array(
            'data-placeholder' => '请选择',
            'multiple'         => 'only-key',
            'style'            => 'width: 200px;'
        ),
    ),

    array(
        'id'                 => 'home_banner_pages',
        'type'               => 'select',
        'title'              => '展示页面',
        'options'            => 'pages',
        'class'              => 'chosen',
    'dependency'         => array( 'home_banner_mode_2', '==', 'true' ),
        'attributes'         => array(
            'data-placeholder' => '请选择',
            'multiple'         => 'only-key',
            'style'            => 'width: 200px;'
        ),
    ),

    array(
        'id'                 => 'home_banner_categories',
        'type'               => 'select',
        'title'              => '展示分类',
        'options'            => 'categories',
        'class'              => 'chosen',
    'dependency'         => array( 'home_banner_mode_3', '==', 'true' ),
        'attributes'         => array(
            'data-placeholder' => '请选择',
            'multiple'         => 'only-key',
            'style'            => 'width: 200px;'
        ),
    ),*/

    array(
        'id'              => 'home_banner',
        'type'            => 'group',
        'title'           => '自定义幻灯片',
        'button_title'    => '添加Banner',
        'accordion_title' => 'Banner',
    //'dependency'      => array( 'home_banner_mode_4', '==', 'true' ),
        'fields'          => array(

            array(
              'id'          => 'home_banner_title',
              'type'        => 'text',
              'title'       => '标题',
            ),    
    
      array(
        'id'            => 'home_banner_image',
        'type'          => 'upload',
        'title'         => '图片',
        'attributes'    => array(
        'placeholder' => 'http://'
        ),
        'settings'      => array(
        'upload_type'  => 'image',
        'button_title' => '上传',
        'frame_title'  => '选择图像',
        'insert_title' => '使用图像',
        ),
      ),    
      
            array(
              'id'          => 'home_banner_url',
              'type'        => 'text',
              'title'       => '链接',
        'attributes'    => array(
        'placeholder' => 'http://'
        )
            ),  

            array(
              'id'          => 'home_banner_description',
              'type'        => 'textarea',
              'title'       => '描述',
            ),      

        ),
    ),  
  
    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => '产品幻灯片',
    ), 
  
    array(
        'id'      => 'enable_product_banner',
        'type'    => 'switcher',
        'title'   => '开启产品幻灯片',
    'default' => false,
    ),  
    
    array(
        'id'      => 'product_banner_width',
        'type'    => 'number',
        'title'   => '幻灯片宽度',
        'after'   => '<span class="cs-text-muted">(px，像素)</span>',
    'default' => '1920',
    //'validate' => 'numeric',
    ),  
    
    array(
        'id'      => 'product_banner_height',
        'type'    => 'number',
        'title'   => '幻灯片高度',
        'after'   => '<span class="cs-text-muted">(px，像素)</span>',
    'default' => '650',
    //'validate' => 'numeric',
    ),

    array(
        'id'              => 'product_banner',
        'type'            => 'group',
        'title'           => '自定义幻灯片',
        'button_title'    => '添加Banner',
        'accordion_title' => 'Banner',
        'fields'          => array(

            array(
              'id'          => 'product_banner_title',
              'type'        => 'text',
              'title'       => '标题',
            ),    
    
      array(
        'id'            => 'product_banner_image',
        'type'          => 'upload',
        'title'         => '图片',
        'attributes'    => array(
        'placeholder' => 'http://'
        ),
        'settings'      => array(
        'upload_type'  => 'image',
        'button_title' => '上传',
        'frame_title'  => '选择图像',
        'insert_title' => '使用图像',
        ),
      ),    
      
            array(
              'id'          => 'product_banner_url',
              'type'        => 'text',
              'title'       => '链接',
        'attributes'    => array(
        'placeholder' => 'http://'
        )
            ),  

            array(
              'id'          => 'product_banner_description',
              'type'        => 'textarea',
              'title'       => '描述',
            ),      

        ),
    ),    

  )
);


// ------------------------------
// 公告                       -
// ------------------------------
/*$options[]   = array(
  'name'     => 'notice_section',
  'title'    => '公告',
  'icon'     => 'fa fa-bullhorn',
  'fields'   => array(
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '首页公告栏',
    ),  
  
    array(
        'id'      => 'enable_bulletin',
        'type'    => 'switcher',
        'title'   => '首页公告栏',
    'default' => false,
    ), 
  
    array(
        'id'              => 'bulletin',
        'type'            => 'group',
        'title'           => '自定义公告',
        'button_title'    => '添加公告',
        'accordion_title' => '公告',
        'fields'          => array(     

            array(
              'id'          => 'bulletin_title',
              'type'        => 'text',
              'title'       => '标题',
            ),
      
            array(
              'id'          => 'bulletin_url',
              'type'        => 'text',
              'title'       => '链接',
        'attributes'    => array(
        'placeholder' => 'http://'
        )
            ),  

            array(
              'id'          => 'bulletin_description',
              'type'        => 'textarea',
              'title'       => '描述',
            ),  

            array(
              'id'          => 'bulletin-date',
              'type'        => 'text',
              'title'       => '日期',
        'attributes'    => array(
        'placeholder' => '例如：2015/06/26'
        )
            ),      

        ),
    ),  
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '自定义弹窗公告',
    ),
      
  array(
    'id'      => 'enable_lightbox',
    'type'    => 'switcher',
    'title'   => '弹窗公告',
    'default' => false,
  ),  
    
  array(
    'id'            => 'lightbox_image',
    'type'          => 'upload',
    'title'         => '图片',
    'attributes'    => array(
      'placeholder' => 'http://'
    ),
    'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
    ),
  ),    

    array(
        'id'          => 'lightbox_title',
        'type'        => 'text',
        'title'       => '标题',
    ),
      
    array(
        'id'          => 'lightbox_url',
        'type'        => 'text',
        'title'       => '链接',
    'attributes'    => array(
      'placeholder' => 'http://'
    )
    ),  

    array(
        'id'          => 'lightbox_description',
        'type'        => 'textarea',
        'title'       => '描述',
    ),
      
  array(
    'id'        => 'lightbox_showPages',
    'type'      => 'radio',
    'class'   => 'horizontal',
    'title'     => '展示页面',
    'options'   => array(
      '1'     => '首页展示',
      '2'      => '全站展示',
    ),
    'default'   => '1',
  ),
      
  array(
    'id'        => 'lightbox_mode',
    'type'      => 'radio',
    'class'   => 'horizontal',
    'title'     => '展示方式',
    'options'   => array(
      '1'     => '纯图片',
      '2'      => '纯文字',
      '3'      => '图文',
    ),
    'default'   => '3',
  ),  

  )
);*/


// ------------------------------
// 列表                       -
// ------------------------------
/**$options[]   = array(
  'name'     => 'lists_section',
  'title'    => '列表',
  'icon'     => 'fa fa-th-list',
  'fields'   => array(
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '归档设置',
    ),  

    array(
        'id'      => 'author_link_rewrite',
        'type'    => 'radio',
        'title'   => '作者存档页面URL重写',
        'class'   => 'horizontal',
        'options' => array(
            '1'   => '作者存档链接中的用户名改为用户ID',
            '2'   => '作者存档链接中的用户名改为昵称',
        ),
    'default' => '1',
    'desc'    => '注：需要主机支持伪静态（即支持 rewrite）',
        'after'   => '<div class="cs-text-warning">避免直接使用用户名，提高安全性，推荐使用用户ID，使用昵称可能会存在昵称相同的情况，这时候只会显示ID较早的用户（解决思路是修改个人资料时，如果使用了相同昵称，进行提示。）注意：昵称不要包含空格，同时不建议使用中文，此外，使用昵称方式记得将“公开显示为”设置为非用户名，这样就OK啦！</div>',
    ),  
  
    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => '置顶文章',
    ),
  
    array(
        'id'      => 'enable_stickPost',
        'type'    => 'switcher',
        'title'   => '推荐置顶文章',
    'default' => false,
    ),  
    
    array(
        'id'      => 'stickPost_num',
        'type'    => 'number',
        'title'   => '置顶文章展示',
        'after'   => '<span class="cs-text-muted">(条)</span>',
    'default' => '4',
    //'validate' => 'numeric',
    'dependency'   => array( 'enable_stickPost', '==', 'true' ),
    ),  
  
    array(
        'id'            => 'stickPost_thumb',
        'type'          => 'upload',
        'title'         => '置顶文章默认缩略图',
    'default'       => get_template_directory_uri()."/assets/images/stickPost_thumb.png",
        'attributes'    => array(
            'placeholder' => 'http://'
        ),
    'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
    ),
    'dependency'   => array( 'enable_stickPost', '==', 'true' ),
    ),  
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '阅读更多设置',
    ),  
  
    array(
        'id'      => 'enable_post_readMore',
        'type'    => 'switcher',
        'title'   => '自定义阅读更多',
    'default' => true,
    ), 
  
    array(
        'id'      => 'enable_post_filterHtml',
        'type'    => 'switcher',
        'title'   => '不过滤html标签',
    'default' => false,
    'help'    => '支持中英文并且不过滤html标签，但对html标签支持不好，截取时会把标签截断而导致显示不全，所以建议配合文章的more标签一起使用',
    ),  
    
    array(
        'id'      => 'post_excerptLength',
        'type'    => 'number',
        'title'   => '自定义文章摘要长度',
        'after'   => '<span class="cs-text-muted">(字符)</span>',
    'default' => '80',
    //'validate' => 'numeric',
    ),
  
    array(
        'id'          => 'post_readMoreLabel',
        'type'        => 'text',
        'title'       => '自定义阅读更多的标签文字',
    'default'     => '阅读更多',
    ),
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '时间格式',
    ),  

    array(
        'id'      => 'list_date_format',
        'type'    => 'radio',
        'title'   => '时间显示格式',
        'class'   => 'horizontal',
        'options' => array(
            '1'   => '传统格式',
            '2'   => '“多久前”格式',
      '3'   => '不显示',     
        ),
    'default' => '1',
    ),
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '分页设置',
    ),
    
    array(
        'id'      => 'custom_paginationStyle',
        'type'    => 'radio',
        'title'   => '分页方式',
        'class'   => 'horizontal',
        'options' => array(
      '1'    => 'Ajax无限加载',
      '2'    => '下一页/前一页按钮',
      '3'    => '页码',
        ),
    'default' => '3',
    ),  
    
    array(
        'id'      => 'ajax_loadPages',
        'type'    => 'number',
        'title'   => 'ajax无限加载页数',
        'after'   => '<span class="cs-text-muted">(页)</span>',
    'default' => '2',
    //'validate' => 'numeric',
    'dependency'   => array( 'custom_paginationStyle_1', '==', 'true' ),
    ),  
  
    array(
        'id'          => 'ajax_moreLabel',
        'type'        => 'text',
        'title'       => 'ajax无限加载中下一页的标签文字',
    'default'     => '加载更多',
    'dependency'   => array( 'custom_paginationStyle_1', '==', 'true' ),
    ),  
  
    array(
        'id'          => 'ajax_nomoreLabel',
        'type'        => 'text',
        'title'       => 'ajax无限加载完结的标签文字',
    'default'     => '没有更多文章了',
    'dependency'   => array( 'custom_paginationStyle_1', '==', 'true' ),
    ),
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '列表样式',
    ),  

    array(
        'id'      => 'list_showStyle',
        'type'    => 'radio',
        'title'   => '列表展示方式',
        'class'   => 'horizontal',
        'options' => array(
            '1'   => '小缩略图+标题+摘要',
            '2'   => '大缩略图+标题+摘要',
      '3'   => '简单标题列表',      
        ),
    'default' => '1',
    ),  
  
  )
);**/


// ------------------------------
// 归档                       -
// ------------------------------
/**$options[]   = array(
  'name'     => 'archive_section',
  'title'    => '归档',
  'icon'     => 'fa fa-bookmark',
  'fields'   => array(  

  )
);*/

// ------------------------------
// 文章                       -
// ------------------------------
/**$options[]   = array(
  'name'     => 'post_section',
  'title'    => '文章',
  'icon'     => 'fa fa-newspaper-o',
  'fields'   => array(
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '文章形式设置',
    ),  
  
    array(
        'id'      => 'enable_post_formats',
        'type'    => 'switcher',
        'title'   => '文章形式',
    'default' => false,
    ),    

    array(
        'id'                 => 'post_formats',
        'type'               => 'select',
        'title'              => '选择要启用的文章形式',
        'options'            => array(
            'standard'       => '标准',
      'aside'          => '日志',
            'gallery'        => '相册',
            'link'           => '链接',
            'image'          => '图像',
            'quote'          => '引用',
            'status'         => '状态',
            'video'          => '视频',
            'audio'          => '音频',
      'chat'           => '聊天',
        ),
        'class'              => 'chosen',
        'attributes'         => array(
            'data-placeholder' => '请选择',
            'multiple'         => 'only-key',
            'style'            => 'width: 80%;'
        ),
        'help'               => '可多选，文章形式(Post Formats),是文章的一种属性,决定文章的显示方式。',
    ),   
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '文章常规设置',
    ),
  
    array(
        'id'      => 'enable_post_views',
        'type'    => 'switcher',
        'title'   => '浏览次数统计',
    'default' => true,
    ),  
  
    array(
        'id'      => 'enable_post_like',
        'type'    => 'switcher',
        'title'   => '访客点赞',
    'default' => false,
    ),  
  
    array(
        'id'      => 'enable_post_thumbnail',
        'type'    => 'switcher',
        'title'   => '特色图像',
    'default' => true,
    ), 
  
    array(
        'id'      => 'enable_post_copyright',
        'type'    => 'switcher',
        'title'   => '转载声明',
    'default' => true,
    ),
  
    array(
        'id'      => 'enable_post_authorInfo',
        'type'    => 'switcher',
        'title'   => '作者信息',
    'default' => false,
    ),  
  
    array(
        'id'      => 'enable_post_shareButton',
        'type'    => 'switcher',
        'title'   => '分享按钮',
    'default' => true,
    ),    
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '文章相关链接设置',
    ), 
  
    array(
        'id'      => 'enable_post_pager',
        'type'    => 'switcher',
        'title'   => '文章的上一篇和下一篇链接',
    'default' => true,
    ),
  
    array(
        'id'      => 'post_previousLabel',
        'type'    => 'text',
        'title'   => '上一篇标签文字',
    'default' => '上一篇',
    'dependency'   => array( 'enable_post_pager', '==', 'true' ),
    ),  
  
    array(
        'id'      => 'post_nextLabel',
        'type'    => 'text',
        'title'   => '下一篇标签文字',
    'default' => '下一篇',
    'dependency'   => array( 'enable_post_pager', '==', 'true' ),
    ),  
  
    array(
        'id'      => 'enable_postRelated',
        'type'    => 'switcher',
        'title'   => '相关文章',
    'default' => true,
    ),

    array(
        'id'            => 'postRelated_thumb',
        'type'          => 'upload',
        'title'         => '相关文章默认缩略图',
    'default'       => get_template_directory_uri()."/assets/images/postRelated_thumb.png",
        'attributes'    => array(
            'placeholder' => 'http://'
        ),
    'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
    ),
    'dependency'   => array( 'enable_postRelated', '==', 'true' ),
    ),  
    
    array(
        'id'      => 'postRelated_num',
        'type'    => 'number',
        'title'   => '相关文章展示',
        'after'   => '<span class="cs-text-muted">(条)</span>',
    'default' => '8',
    //'validate' => 'numeric',
    'dependency'   => array( 'enable_postRelated', '==', 'true' ),
    ),  

    array(
        'id'      => 'postRelated_style',
        'type'    => 'radio',
        'title'   => '相关文章展示方式',
        'class'   => 'horizontal',
        'options' => array(
            '1'   => '无序列表',
            '2'   => '图文列表',
        ),
    'default' => '1',
    'dependency'   => array( 'enable_postRelated', '==', 'true' ),
    ),
  
    array(
        'id'      => 'postRelated_label',
        'type'    => 'text',
        'title'   => '相关文章标签文字',
    'default' => '相关文章',
    'dependency'   => array( 'enable_postRelated', '==', 'true' ),
    ),    
  
    array(
    'type'    => 'notice',
        'class'   => 'info',
        'content' => '文章时间格式',
    ),  

    array(
        'id'      => 'post_date_format',
        'type'    => 'radio',
        'title'   => '文章时间显示格式',
        'class'   => 'horizontal',
        'options' => array(
            '1'   => '传统格式',
            '2'   => '“多久前”格式',
      '3'   => '不显示',     
        ),
    'default' => '1',
    ),  

  )
);*/

// ------------------------------
// 搜索设置               -
// ------------------------------
$options[]   = array(
  'name'     => 'search_section',
  'title'    => '搜索',
  'icon'     => 'fa fa-search',
  'fields'   => array(
  
        /*array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '搜索地址栏优化',
        ),  
    array(
      'type'    => 'content',
      'content' => 'WordPress搜索结果页面的默认链接是这样的：domain/?s=keywordk，你可以将它修改为domain/search/keyword',
    ),    
  
        array(
          'id'      => 'enable_search_link_redirect',
          'type'    => 'switcher',
          'title'   => '搜索页面URL重写',
      'default' => '1',
      'label'   => '<span class="cs-text-warning">注：需要主机支持伪静态（即支持 rewrite）</span>',
        ),*/

        array(
          'id'      => 'search_mode',
          'type'    => 'radio',
          'title'   => '搜索方式',
          'class'   => 'horizontal',
          'options' => array(
            '1'    => '仅标题',
            '2'    => '标题+内容',
      '3'    => '标题+内容+标签tag',
          ),
      'default' => '1',
          //'after'   => '<div class="cs-text-muted">Reference site about Lorem Ipsum, a random Lipsum generator.</div>',
        ),    
  
        array(
          'id'      => 'enable_search_all_type',
          'type'    => 'switcher',
          'title'   => '搜索结果包含自定义文章类型',
      'default' => '1',
      'label'   => '<span class="cs-text-warning">注：默认搜索结果不包含自定义文章类型的内容，开启则包含关键词的自定义文章类型的内容也将出现在搜索结果中</span>',
        ), 
  
        array(
          'id'      => 'enable_search_keywords_highlight',
          'type'    => 'switcher',
      'default' => '1',
          'title'   => '搜索结果关键字高亮显示',
        ),
  
        array(
          'id'      => 'enable_search_result_one_rewrite',
          'type'    => 'switcher',
          'title'   => '搜索结果只有一条记录时，自动跳转到该页',
      'default' => '1',
      'label'   => '<span class="cs-text-warning">注：如果返回的结果只有一篇文章，我们可以直接让它跳转到这篇文章，提高用户体验。</span>',
        ),  
  
        array(
          'id'      => 'enable_search_result_match',
          'type'    => 'switcher',
          'title'   => '提高搜索结果的相关性(准确度)',
      'default' => '1',
      'label'   => '<span class="cs-text-warning">注：默认搜索结果是按照发布时间排序的，这样的搜索结果相关性并不强，应该让搜索结果按照内容相关性排序</span>',
        ),
  
        array(
          'id'      => 'enable_search_exclude_allpage',
          'type'    => 'switcher',
          'title'   => '搜索结果排除所有页面',
        ),  
    
        array(
          'id'    => 'search_exclude_id',
          'type'  => 'text',
          'title' => '搜索结果中排除指定ID的页面或者文章',
          'desc'  => '输入页面或文章ID，多个用英文逗号隔开',
        ),  
    
        array(
          'id'    => 'search_filter_cat',
          'type'  => 'text',
          'title' => '搜索过滤',
          'desc'  => '输入分类ID，多个用英文逗号隔开',
      'after' => '<p class="cs-text-info">分类ID，前面加负号表示排除；如果直接写ID，则表示只在该ID中搜索</p> ',
        ),    

  )
);

// ------------------------------
// 评论设置                       -
// ------------------------------
/*$options[]   = array(
  'name'     => 'comment_section',
  'title'    => '评论',
  'icon'     => 'fa fa-comments',
  'fields'   => array( 
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '温馨提示：网站启用第三方评论以下设置有可能会失效！',
        ),  
  
        array(
          'id'      => 'enable_comment_autoSave',
          'type'    => 'switcher',
          'title'   => '评论自动保存',
        ),    
  
        array(
          'id'      => 'enable_loginToComment',
          'type'    => 'switcher',
          'title'   => '用户必须注册并登录才可以发表评论',
        ), 
  
        array(
          'id'      => 'enable_loginToComment',
          'type'    => 'switcher',
          'title'   => '评论者必须填写姓名和电子邮件',
      'default' => '1',
        ),
  
        array(
          'id'      => 'enable_comment_url',
          'type'    => 'switcher',
          'title'   => '评论网址URL表单',
        ), 
  
        array(
          'id'      => 'enable_comments_author_link',
          'type'    => 'switcher',
          'title'   => '评论人名字的链接',
      'label'   => '此方法只对使用 WordPress 默认评论表单的主题才有效',
        ),      
  
        array(
          'id'      => 'enable_commentMail',
          'type'    => 'switcher',
          'title'   => '评论邮箱提醒功能',
      'label' => '需要主机空间支持mail()函数，或者通过安装WP-Mail-SMTP插件实现',
        ), 
  
        array(
          'id'      => 'enable_avatarLazyload',
          'type'    => 'switcher',
          'title'   => '头像Lazyload功能',
      'default' => true,
        ),  
  
        array(
          'id'      => 'enable_commentAjax',
          'type'    => 'switcher',
          'title'   => 'AJAX无刷新评论',
      'default' => true,
        ),
  
        array(
          'id'      => 'enable_commentEmoji',
          'type'    => 'switcher',
          'title'   => '启用表情',
      'default' => false,
        ),    
  
        array(
          'id'      => 'enable_commentFilter',
          'type'    => 'switcher',
          'title'   => '过滤垃圾评论',
      'default' => true,
        ),
  
        array(
          'id'      => 'enable_commentMinLimit',
          'type'    => 'switcher',
          'title'   => '限制评论内容最小字数',
      'default' => false,
        ),  
  
        array(
          'id'      => 'commentMinLimit',
          'type'    => 'number',
          'title'   => '评论内容最小字数',
      'default' => '10',
      //'validate' => 'numeric',
      'dependency'    => array( 'enable_commentMinLimit', '==', 'true' ),
      'after'   => '<span class="cs-text-muted">(字符)</span>',
        ),    

  )
);*/


// ------------------------------
// 广告                       -
// ------------------------------
/*$options[]   = array(
  'name'     => 'advert_section',
  'title'    => '广告',
  'icon'     => 'fa fa-gift',
  'fields'   => array(

  )
);*/

// ------------------------------
// 拓展功能               -
// ------------------------------
/**$options[]   = array(
  'name'     => 'extend_section',
  'title'    => '拓展',
  'icon'     => 'fa fa-plug',
    // begin: fields
      'fields'    => array(
    
        array(
          'type'    => 'notice',
          'class'   => 'danger',
          'content' => '温馨提示：按需开启各种扩展功能，每个扩展都会额外加载一些js或css',
        ),
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '代码高亮',
        ), 
    
    array(
          'id'      => 'enable_codeHighlight',
          'type'    => 'switcher',
          'title'   => '代码高亮',
          'default' => false,
      'label' => '使用pre标签把你的高亮代码包括起来',
        ),  
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '引用Github资源，WP Reposidget <a href="https://wordpress.org/plugins/wp-reposidget/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),  
    
    array(
          'id'      => 'enable_githubRepoWidget',
          'type'    => 'switcher',
          'title'   => '引用Github项目',
          'default' => false,
      'label' => '在文章/页面中嵌入 GitHub 仓库挂件',
        ), 
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '引用Coding资源，Reposidget For Coding <a href="https://wordpress.org/plugins/reposidget-for-coding/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),  
    
    array(
          'id'      => 'enable_codingRepoWidget',
          'type'    => 'switcher',
          'title'   => '引用Github项目',
          'default' => false,
      'label' => '在文章/页面中嵌入 Coding 仓库挂件',
        ),        
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
      'content' => '文章二维码，jQuery.qrcode <a href="https://larsjung.de/jquery-qrcode/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),
    
    array(
          'id'      => 'enable_post_qrcode',
          'type'    => 'switcher',
          'title'   => '动态生成文章二维码',
          'default' => false,
      'label' => '使用jQuery.qrcode为文章动态生成二维码',
        ), 
    
        array(
          'id'      => 'post_qrcodeColor',
          'type'    => 'color_picker',
          'title'   => '二维码颜色',
          'default' => '#333333',
      'dependency'   => array( 'enable_post_qrcode', '==', 'true' ),
        ),

        array(
          'id'      => 'post_qrcodeLogo',
          'type'    => 'upload',
          'title'   => '嵌入图像',
      'default' => get_template_directory_uri()."/assets/images/logo.png",
      'dependency'   => array( 'enable_post_qrcode', '==', 'true' ),
      'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
      ),        
        ),    
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
      'content' => '音乐播放器，Cue <a href="https://wordpress.org/plugins/cue/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),  
    
    array(
          'id'      => 'enable_player',
          'type'    => 'switcher',
          'title'   => '音乐播放器',
          'default' => false,
      'label' => '使用wordpress cue 音乐播放器插件',
        ), 
    
        array(
          'id'      => 'player_bgColor',
          'type'    => 'color_picker',
          'title'   => '播放器背景颜色',
          'default' => '#333333',
      'dependency'   => array( 'enable_player', '==', 'true' ),
        ),
    
        array(
          'id'      => 'player_buttonColor',
          'type'    => 'color_picker',
          'title'   => '播放器按钮颜色',
          'default' => '#ffffff',
      'dependency'   => array( 'enable_player', '==', 'true' ),
        ),
    
    array(
          'id'      => 'player_id',
          'type'    => 'number',
          'title'   => '歌单ID',
          //'after'   => '<span class="cs-text-muted">(px，像素)</span>',
      //'default' => '8',
      //'validate' => 'numeric',
      'dependency'   => array( 'enable_player', '==', 'true' ),
    ),      
    
    array(
          'id'      => 'enable_player_mobile',
          'type'    => 'switcher',
          'title'   => '移动端',
          'default' => false,
        ), 
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
      'content' => '导航菜单，Menu Icons <a href="https://wordpress.org/plugins/menu-icons/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),  
    
    array(
          'id'      => 'enable_menu_icon',
          'type'    => 'switcher',
          'title'   => '为菜单添加字体图标',
          'default' => false,
        ),    
    
    ), // end: fields 
); **/

// ------------------------------
// 多媒体设置               -
// ------------------------------
/**$options[]   = array(
  'name'     => 'media_section',
  'title'    => '多媒体',
  'icon'     => 'fa fa-crop',
    // begin: fields
      'fields'    => array( 
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '<h3>图片缩略图</h3><p>该主题使用 <a href="http://www.cmhello.com/timthumb.html" target="_blank" style="outline:none;border:none" onFocus="this.blur()">TimThumb</a> 来生成缩略图，请确保当前主题的根目录可写（755权限）。如果你使用的是外链图库，请在当前主题根目录下的 timthumb-config.php 添加图库的域名。使用timthumb.php程序进行裁剪，不需要通过wordpress自带的缩略图功能来裁剪，所以在后台——设置——多媒休中把图像的大小全部设置为0。</p>',
        ),  
    
        array(
          'id'      => 'enable_timthumb',
          'type'    => 'switcher',
          'title'   => 'TimThumb 截图',
      'default' => true,
      'label'   => '（建议开启）',
        ),

        array(
          'id'      => 'thumb_mode',
          'type'    => 'radio',
          'title'   => '生成方式',
          //'class'   => 'horizontal',
          'options' => array(
        '1'   => '缩放，缩放到固定高度和宽度（不裁剪，会变形）',
            '2'   => '裁剪，等比例缩小（适应最小边，裁剪大边，不变形）',
            '3'   => '留白，等比例缩小（适应最大边，小边补白，不变形）',
          ),
      'default' => '3',
        ),
    
        array(
          'id'      => 'thumb_quality',
          'type'    => 'number',
          'title'   => '缩略图质量',
          'after'   => '<span class="cs-text-muted"> %，会影响图片清晰度</span>',
      'default' => '80',
        ),    
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '<h3>缩略图显示原理：</h3><ul><li>1、文章设置了缩略图则显示设置的缩略图</li><li>2、若没有设置缩略图，则获取文章第一张图片作为缩略图；</li><li>3、文章无缩略图则显示文章默认缩略图</li><li>4、以上都不满足，则显示主题内置的随机缩略图</li></ul>',
        ), 
    
        array(
          'id'      => 'enable_post_matchThumb',
          'type'    => 'switcher',
          'title'   => '文章自动匹配缩略图',
      'default' => true,
      'label'   => '为每篇文章自动匹配缩略图。',
        ),    

    array(
          'id'            => 'post_defaultThumb',
          'type'          => 'upload',
          'title'         => '文章默认缩略图',
      //'default'       => get_template_directory_uri()."/assets/images/thumb/post_defaultThumb.jpg",
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
      'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
      ),
    ),
  
    array(
      'type'    => 'notice',
          'class'   => 'info',
          'content' => '<h3>Lightbox设置</h3>
            <p>图片弹窗：编辑文章插入图片时，从URL插入（外链）必须选择链接到：图像URL；本地上传，必须选择链接到：媒体文件，在a标签中需要添加“title=图片名称”，不然在前台图片弹窗中不会显示名称。</p>
            <p>视频弹窗：视频地址需要绝对地址（例如http://player.youku.com/player.php/sid/XMzMxNjY5MzI0/v.swf），需要在a标签中手动添加：class="lightbox"</p>
            <p>内容（网址）弹窗：可以为文本、图片等添加链接，链接地址为需要显示的网址（例如https://www.baidu.com/），需要在a标签中手动添加：class="lightbox"</p>',
    ),  
  
    array(
          'id'      => 'enable_media_lightbox',
          'type'    => 'switcher',
          'title'   => '图片、视频、内容（网址）弹窗Lightbox效果',
      'default' => true,
    ),    
  
    array(
      'type'    => 'notice',
          'class'   => 'info',
          'content' => '图片延迟加载',
    ),  
  
    array(
          'id'      => 'enable_imageLazyload',
          'type'    => 'switcher',
          'title'   => '图片延迟加载Lazyload',
      'default' => true,
    ), 

    array(
          'id'            => 'post_thumb_preLoad',
          'type'          => 'upload',
          'title'         => '缩略图预加载图片',
      'default'       => get_template_directory_uri()."/assets/images/thumb/post_thumb_preLoad.png",
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
      'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
      ),
      'dependency'   => array( 'enable_imageLazyload', '==', 'true' ),
    ),  

    array(
          'id'            => 'post_image_preLoad',
          'type'          => 'upload',
          'title'         => '文章图片预加载图片',
      'default'       => get_template_directory_uri()."/assets/images/thumb/post_image_preLoad.png",
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
      'settings'      => array(
      'upload_type'  => 'image',
      'button_title' => '上传',
      'frame_title'  => '选择图像',
      'insert_title' => '使用图像',
      ),
      'dependency'   => array( 'enable_imageLazyload', '==', 'true' ),
    ),    
    
    ), // end: fields
); **/
  
// ------------------------------
// 备份                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => '备份',
  'icon'     => 'fa fa-database',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => '您可以保存当前设置。下载备份和导入设置。',
    ),

    array(
      'type'    => 'backup',
    ),

  )
);

// ------------------------------
// license                      -
// ------------------------------
/*$options[]   = array(
  'name'     => 'license_section',
  'title'    => '关于',
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => '100% GPL License, Yes it is free!'
    ),
    array(
      'type'    => 'content',
      'content' => 'Codestar Framework is <strong>free</strong> to use both personal and commercial. If you used commercial, <strong>please credit</strong>. Read more about <a href="http://www.gnu.org/licenses/gpl-2.0.txt" target="_blank">GNU License</a>',
    ),

  )
);*/

CSFramework::instance( $settings, $options );

if(cs_get_option( 'blogName' )!=""){
	update_option('blogname', cs_get_option( 'blogName' ));//更新网站名称
}
if(cs_get_option( 'blogDescription' )!=""){
	update_option('blogdescription', cs_get_option( 'blogDescription' ));//更新网站副标题
}
