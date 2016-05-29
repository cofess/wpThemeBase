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
// 高级设置               -
// ------------------------------
$options[]   = array(
  'name'     => 'plug_qiniu_section',
  'title'    => __('七牛云','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-cloud',
  'fields'   => array(

    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('七牛设置','CS_TEXTDOMAIN'),
    ),

    array(
      'id'         => 'qiniu_host',
      'type'       => 'text',
      'title'      => __('七牛域名','CS_TEXTDOMAIN'),
      'after'      => '<p>'.__('说明：设置为七牛提供的测试域名或者在七牛绑定的域名。<strong>注意要域名前面要加上 http://。</strong>
如果博客安装的是在子目录下，比如 http://www.xxx.com/blog，这里也需要带上子目录 /blog','CS_TEXTDOMAIN').'</p>',    
      'attributes' => array(
        'style'    => 'width: 100%;'
      ),
    ),

    array(
      'id'         => 'qiniu_bucket',
      'type'       => 'text',
      'title'      => __('七牛空间名','CS_TEXTDOMAIN'),
      'after'      => ' <span class="cs-text-warning">'.__('( 设置为你在七牛提供的空间名。 )','CS_TEXTDOMAIN').'</span>',
    ),

    array(
      'id'         => 'qiniu_access_key',
      'type'       => 'text',
      'title'      => __('ACCESS KEY','CS_TEXTDOMAIN'),  
    ),

    array(
      'id'         => 'qiniu_secret_key',
      'type'       => 'text',
      'title'      => __('SECRET KEY','CS_TEXTDOMAIN'),   
    ),

    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => __('本地设置','CS_TEXTDOMAIN'),
    ),

    array(
      'id'         => 'file_exts',
      'type'       => 'text',
      'title'      => __('扩展名','CS_TEXTDOMAIN'),
      'after'      => '<p>'.__('说明：设置要缓存静态文件的扩展名，请使用 | 分隔开，|前后都不要留空格。','CS_TEXTDOMAIN').'</p>',
      'default'    => 'js|css|png|jpg|jpeg|gif|ico',    
      'attributes' => array(
        'style'    => 'width: 100%;'
      ),
    ),

    array(
      'id'         => 'cdn_dirs',
      'type'       => 'text',
      'title'      => __('目录','CS_TEXTDOMAIN'),
      'after'      => '<p>'.__('说明：设置要缓存静态文件所在的目录，请使用 | 分隔开，|前后都不要留空格。','CS_TEXTDOMAIN').'</p>',
      'default'    => 'wp-content|wp-includes',    
      'attributes' => array(
        'style'    => 'width: 100%;'
      ),
    ),

    array(
      'id'         => 'local_domain',
      'type'       => 'text',
      'title'      => __('本地域名','CS_TEXTDOMAIN'),
      'after'      => '<p>'.__('如果图片等静态文件存储的域名和网站不同，可通过该字段设置。
使用该字段设置静态文件所在的域名之后，请确保 JS 和 CSS 等文件也在该域名下，否则将不会加速。','CS_TEXTDOMAIN').'</p>',
      'default'    => home_url(),    
      'attributes' => array(
        'style'    => 'width: 100%;'
      ),
    ),

    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => __('缩略图设置','CS_TEXTDOMAIN'),
    ),

    array(
      'id'            => 'thumb_default',
      'type'          => 'upload',
      'title'         => __('默认缩略图','CS_TEXTDOMAIN'),
      'attributes'    => array(
        'placeholder' => 'http://'
      ),
      'settings'      => array(
        'upload_type' => 'image',
        'button_title'=> __('上传','CS_TEXTDOMAIN'),
        'frame_title' => __('选择图像','CS_TEXTDOMAIN'),
        'insert_title'=> __('使用图像','CS_TEXTDOMAIN'),
      ),
      'after'      => '<p>'.__('如果日志没有特色图片，没有第一张图片，也没用高级缩略图的情况下所用的缩略图。可以填本地或者七牛的地址！','CS_TEXTDOMAIN').'</p>',
    ),  

    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => '<h3>'.__('远程图片设置','CS_TEXTDOMAIN').'</h3>
                    <ul>
                      <li>'.__('· 自动将远程图片镜像到七牛需要你的博客支持固定链接。','CS_TEXTDOMAIN').'</li>
                      <li>'.__('· 如果前面设置的静态文件域名和博客域名不一致，该功能也可能出问题。','CS_TEXTDOMAIN').'</li>
                      <li>'.__('· 远程 GIF 图片保存到七牛将失去动画效果，所以目前不支持 GIF 图片。','CS_TEXTDOMAIN').'</li>
                    </ul>',
    ), 

    array(
      'id'      => 'enable_save_remote',
      'type'    => 'switcher',
      'title'   => __('保存远程图片','CS_TEXTDOMAIN'),
      'default' => false,
      'label'   => __('自动将远程图片镜像到七牛。','CS_TEXTDOMAIN'),
    ),

    array(
      'id'      => 'remote_exceptions',
      'type'    => 'textarea',
      'title'   => __('例外','CS_TEXTDOMAIN'),
      'after'   => __('如果远程图片的链接中包含以上字符串或者域名，就不会被保存并镜像到七牛。','CS_TEXTDOMAIN'),
    ),  

    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => __('水印设置','CS_TEXTDOMAIN'),
    ), 

    array(
      'id'            => 'watermark',
      'type'          => 'upload',
      'title'         => __('水印图片','CS_TEXTDOMAIN'),
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
      'id'      => 'watermark_alpha',
      'type'    => 'number',
      'title'   => __('透明度','CS_TEXTDOMAIN'),
      'after'   => '<span class="cs-text-muted"> '.__('透明度，取值范围1-100，缺省值为100（完全不透明）','CS_TEXTDOMAIN').'</span>',
      'default' => '100',
    ), 

    array(
      'id'         => 'watermark_position',
      'type'       => 'select',
      'title'      => __('水印位置','CS_TEXTDOMAIN'),
      'options'    => array(
        'SouthEast'=> '右下角',
        'SouthWest'=> '左下角',
        'NorthEast'=> '右上角',
        'NorthWest'=> '左上角',
        'Center'   => '正中间',
        'West'     => '左中间',
        'East'     => '右中间',
        'North'    => '上中间',
        'South'    => '下中间',
      ),
      'default'    => 'SouthEast',
    ),

    array(
      'id'      => 'watermark_dx',
      'type'    => 'number',
      'title'   => __('横轴边距','CS_TEXTDOMAIN'),
      'after'   => '<span class="cs-text-muted"> '.__('横轴边距，单位:像素(px)，缺省值为10','CS_TEXTDOMAIN').'</span>',
      'default' => '10',
    ), 

    array(
      'id'      => 'watermark_dy',
      'type'    => 'number',
      'title'   => __('纵轴边距','CS_TEXTDOMAIN'),
      'after'   => '<span class="cs-text-muted"> '.__('纵轴边距，单位:像素(px)，缺省值为10','CS_TEXTDOMAIN').'</span>',
      'default' => '10',
    ),  

  ),
);
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
