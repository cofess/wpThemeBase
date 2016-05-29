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
// 多媒体设置               -
// ------------------------------
$options[]   = array(
  'name'     => 'plug_media_section',
  'title'    => __('多媒体','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-crop',
    // begin: fields
      'fields'    => array( 
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '<h3>'.__('图片缩略图','CS_TEXTDOMAIN').'</h3><p>'.__('该主题使用 <a href="http://www.cmhello.com/timthumb.html" target="_blank" style="outline:none;border:none" onFocus="this.blur()">TimThumb</a> 来生成缩略图，请确保当前主题的根目录可写（755权限）。如果你使用的是外链图库，请在当前主题根目录下的 timthumb-config.php 添加图库的域名。使用timthumb.php程序进行裁剪，不需要通过wordpress自带的缩略图功能来裁剪，所以在后台——设置——多媒休中把图像的大小全部设置为0。','CS_TEXTDOMAIN').'</p>',
        ),  
    
        array(
          'id'      => 'enable_timthumb',
          'type'    => 'switcher',
          'title'   => __('TimThumb 截图','CS_TEXTDOMAIN'),
      'default' => true,
      'label'   => __('（建议开启）','CS_TEXTDOMAIN'),
        ),

        array(
          'id'      => 'thumb_mode',
          'type'    => 'radio',
          'title'   => __('生成方式','CS_TEXTDOMAIN'),
          //'class'   => 'horizontal',
          'options' => array(
        '1'   => __('缩放，缩放到固定高度和宽度（不裁剪，会变形）','CS_TEXTDOMAIN'),
            '2'   => __('裁剪，等比例缩小（适应最小边，裁剪大边，不变形）','CS_TEXTDOMAIN'),
            '3'   => __('留白，等比例缩小（适应最大边，小边补白，不变形）','CS_TEXTDOMAIN'),
          ),
      'default' => '3',
        ),
    
        array(
          'id'      => 'thumb_quality',
          'type'    => 'number',
          'title'   => __('缩略图质量','CS_TEXTDOMAIN'),
          'after'   => '<span class="cs-text-muted"> '.__('%，会影响图片清晰度','CS_TEXTDOMAIN').'</span>',
      'default' => '80',
        ),    
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => '<h3>'.__('缩略图显示原理：','CS_TEXTDOMAIN').'</h3>
            <ul>
            <li>1、'.__('文章设置了缩略图则显示设置的缩略图','CS_TEXTDOMAIN').'</li>
            <li>2、'.__('若没有设置缩略图，则获取文章第一张图片作为缩略图；','CS_TEXTDOMAIN').'</li>
            <li>3、'.__('文章无缩略图则显示文章默认缩略图</li><li>4、以上都不满足，则显示主题内置的随机缩略图','CS_TEXTDOMAIN').'</li>
            </ul>',
        ), 
    
        array(
          'id'      => 'enable_post_matchThumb',
          'type'    => 'switcher',
          'title'   => __('文章自动匹配缩略图','CS_TEXTDOMAIN'),
      'default' => true,
      'label'   => __('为每篇文章自动匹配缩略图。','CS_TEXTDOMAIN'),
        ),    

    array(
          'id'            => 'post_defaultThumb',
          'type'          => 'upload',
          'title'         => __('文章默认缩略图','CS_TEXTDOMAIN'),
      //'default'       => get_template_directory_uri()."/assets/images/thumb/post_defaultThumb.jpg",
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
      'settings'      => array(
      'upload_type' => 'image',
      'button_title'=> __('上传','CS_TEXTDOMAIN'),
      'frame_title' => __('选择图像','CS_TEXTDOMAIN'),
      'insert_title'=> __('使用图像','CS_TEXTDOMAIN'),
      ),
    ),
  
    array(
      'type'    => 'notice',
          'class'   => 'info',
          'content' => '<h3>'.__('Lightbox设置','CS_TEXTDOMAIN').'</h3>
            <p>'.__('图片弹窗：编辑文章插入图片时，从URL插入（外链）必须选择链接到：图像URL；本地上传，必须选择链接到：媒体文件，在a标签中需要添加“title=图片名称”，不然在前台图片弹窗中不会显示名称。','CS_TEXTDOMAIN').'</p>
            <p>'.__('视频弹窗：视频地址需要绝对地址（例如http://player.youku.com/player.php/sid/XMzMxNjY5MzI0/v.swf），需要在a标签中手动添加：class="lightbox"','CS_TEXTDOMAIN').'</p>
            <p>'.__('内容（网址）弹窗：可以为文本、图片等添加链接，链接地址为需要显示的网址（例如https://www.baidu.com/），需要在a标签中手动添加：class="lightbox"','CS_TEXTDOMAIN').'</p>',
    ),  
  
    array(
          'id'      => 'enable_media_lightbox',
          'type'    => 'switcher',
          'title'   => __('图片、视频、内容（网址）弹窗Lightbox效果','CS_TEXTDOMAIN'),
      'default' => true,
    ),    
  
    array(
      'type'    => 'notice',
          'class'   => 'info',
          'content' => __('图片延迟加载','CS_TEXTDOMAIN'),
    ),  
  
    array(
          'id'      => 'enable_imageLazyload',
          'type'    => 'switcher',
          'title'   => __('图片延迟加载Lazyload','CS_TEXTDOMAIN'),
      'default' => true,
    ), 

    array(
          'id'            => 'post_thumb_preLoad',
          'type'          => 'upload',
          'title'         => __('缩略图预加载图片','CS_TEXTDOMAIN'),
      'default'       => get_template_directory_uri()."/assets/images/thumb/post_thumb_preLoad.png",
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
      'settings'      => array(
      'upload_type' => 'image',
      'button_title'=> __('上传','CS_TEXTDOMAIN'),
      'frame_title' => __('选择图像','CS_TEXTDOMAIN'),
      'insert_title'=> __('使用图像','CS_TEXTDOMAIN'),
      ),
      'dependency'    => array( 'enable_imageLazyload', '==', 'true' ),
    ),  

    array(
          'id'            => 'post_image_preLoad',
          'type'          => 'upload',
          'title'         => __('文章图片预加载图片','CS_TEXTDOMAIN'),
      'default'       => get_template_directory_uri()."/assets/images/thumb/post_image_preLoad.png",
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
      'settings'      => array(
      'upload_type' => 'image',
      'button_title'=> __('上传','CS_TEXTDOMAIN'),
      'frame_title' => __('选择图像','CS_TEXTDOMAIN'),
      'insert_title'=> __('使用图像','CS_TEXTDOMAIN'),
      ),
      'dependency'    => array( 'enable_imageLazyload', '==', 'true' ),
    ),    
    
    ), // end: fields
); 
// ------------------------------
// 拓展功能               -
// ------------------------------
$options[]   = array(
  'name'     => 'plug_extend_section',
  'title'    => __('拓展','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-plug',
    // begin: fields
      'fields'    => array(
    
        array(
          'type'    => 'notice',
          'class'   => 'danger',
          'content' => __('温馨提示：按需开启各种扩展功能，每个扩展都会额外加载一些js或css','CS_TEXTDOMAIN'),
        ),
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('代码高亮','CS_TEXTDOMAIN'),
        ), 
    
    array(
          'id'      => 'enable_codeHighlight',
          'type'    => 'switcher',
          'title'   => __('代码高亮','CS_TEXTDOMAIN'),
          'default' => false,
      'label'   => __('使用pre标签把你的高亮代码包括起来','CS_TEXTDOMAIN'),
        ),  
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => ''.__('引用Github资源','CS_TEXTDOMAIN').'，WP Reposidget <a href="https://wordpress.org/plugins/wp-reposidget/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),  
    
    array(
          'id'      => 'enable_githubRepoWidget',
          'type'    => 'switcher',
          'title'   => __('引用Github项目','CS_TEXTDOMAIN'),
          'default' => false,
      'label'   => __('在文章/页面中嵌入 GitHub 仓库挂件','CS_TEXTDOMAIN'),
        ), 
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => ''.__('引用Coding资源','CS_TEXTDOMAIN').'，Reposidget For Coding <a href="https://wordpress.org/plugins/reposidget-for-coding/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),  
    
    array(
          'id'      => 'enable_codingRepoWidget',
          'type'    => 'switcher',
          'title'   => __('引用Github项目','CS_TEXTDOMAIN'),
          'default' => false,
      'label'   => __('在文章/页面中嵌入 Coding 仓库挂件','CS_TEXTDOMAIN'),
        ),        
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
      'content' => ''.__('文章二维码','CS_TEXTDOMAIN').'，jQuery.qrcode <a href="https://larsjung.de/jquery-qrcode/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),
    
    array(
          'id'      => 'enable_post_qrcode',
          'type'    => 'switcher',
          'title'   => __('动态生成文章二维码','CS_TEXTDOMAIN'),
          'default' => false,
      'label'   => __('使用jQuery.qrcode为文章动态生成二维码','CS_TEXTDOMAIN'),
        ), 
    
        array(
          'id'      => 'post_qrcodeColor',
          'type'    => 'color_picker',
          'title'   => __('二维码颜色','CS_TEXTDOMAIN'),
          'default' => '#333333',
      'dependency'   => array( 'enable_post_qrcode', '==', 'true' ),
        ),

        array(
          'id'      => 'post_qrcodeLogo',
          'type'    => 'upload',
          'title'   => __('嵌入图像','CS_TEXTDOMAIN'),
      'default' => get_template_directory_uri()."/assets/images/logo.png",
      'dependency'     => array( 'enable_post_qrcode', '==', 'true' ),
      'settings'       => array(
      'upload_type'  => 'image',
      'button_title' => __('上传','CS_TEXTDOMAIN'),
      'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
      'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
      ),        
        ),    
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
      'content' => ''.__('音乐播放器','CS_TEXTDOMAIN').'，Cue <a href="https://wordpress.org/plugins/cue/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),  
    
    array(
          'id'      => 'enable_player',
          'type'    => 'switcher',
          'title'   => __('音乐播放器','CS_TEXTDOMAIN'),
          'default' => false,
      'label'   => __('使用wordpress cue 音乐播放器插件','CS_TEXTDOMAIN'),
        ), 
    
        array(
          'id'      => 'player_bgColor',
          'type'    => 'color_picker',
          'title'   => __('播放器背景颜色','CS_TEXTDOMAIN'),
          'default' => '#333333',
      'dependency'   => array( 'enable_player', '==', 'true' ),
        ),
    
        array(
          'id'      => 'player_buttonColor',
          'type'    => 'color_picker',
          'title'   => __('播放器按钮颜色','CS_TEXTDOMAIN'),
          'default' => '#ffffff',
      'dependency'   => array( 'enable_player', '==', 'true' ),
        ),
    
    array(
          'id'      => 'player_id',
          'type'    => 'number',
          'title'   => __('歌单ID','CS_TEXTDOMAIN'),
          //'after'   => '<span class="cs-text-muted">(px，像素)</span>',
      //'default' => '8',
      //'validate' => 'numeric',
      'dependency'   => array( 'enable_player', '==', 'true' ),
    ),      
    
    array(
          'id'      => 'enable_player_mobile',
          'type'    => 'switcher',
          'title'   => __('移动端','CS_TEXTDOMAIN'),
          'default' => false,
        ), 
    
        array(
          'type'    => 'notice',
          'class'   => 'info',
      'content' => ''.__('导航菜单','CS_TEXTDOMAIN').'，Menu Icons <a href="https://wordpress.org/plugins/menu-icons/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),  
    
    array(
          'id'      => 'enable_menu_icon',
          'type'    => 'switcher',
          'title'   => __('为菜单添加字体图标','CS_TEXTDOMAIN'),
          'default' => false,
        ),    
    
    ), // end: fields 
); 
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
