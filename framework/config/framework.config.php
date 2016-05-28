<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => __('主题设置', 'CS_TEXTDOMAIN'),
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  //'menu_parent'     => 'themes.php',
  'menu_slug'       => 'theme-setting',
  'menu_icon'  => 'dashicons-art',
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
  'name'     => 'media_section',
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
  'name'     => 'extend_section',
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
// 品牌                       -
// ------------------------------
$options[]   = array(
  'name'     => 'brand_section',
  'title'    => __('品牌','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-globe',
  'sections' => array(

    // -----------------------------
    // 基本信息        -
    // -----------------------------
    array(
      'name'      => 'brand_base_options',
      'title'     => __('基本信息','CS_TEXTDOMAIN'),
      'icon'      => 'fa fa-cog',

      // begin: fields
      'fields'    => array(		
	    		  
        array(
          'id'            => 'company_logo',
          'type'          => 'upload',
          'title'         => __('品牌LOGO','CS_TEXTDOMAIN'),
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
		  'default' => get_template_directory_uri()."/lib/images/logo.png",
		  'settings'      => array(
			'upload_type'  => 'image',
			'button_title' => __('上传','CS_TEXTDOMAIN'),
			'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
			'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
		  ),
        ),

		array(
          'id'            => 'company_brandQrcode',
          'type'          => 'upload',
          'title'         => __('品牌二维码','CS_TEXTDOMAIN'),
		  'default'       => get_template_directory_uri()."/assets/images/brandQrcode.png",
		  'after'         => ' <span class="cs-text-warning">'.__('( 微信公众号二维码或官方网站二维码等 )','CS_TEXTDOMAIN').'</span>',
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
		  'settings'      => array(
			'upload_type'  => 'image',
			'button_title' => __('上传','CS_TEXTDOMAIN'),
			'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
			'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
		  ),
		),
		
        array(
          'id'     => 'company_video',
          'type'   => 'text',
          'title'  => __('品牌宣传视频','CS_TEXTDOMAIN'),
		  'after'  => ' <span class="cs-text-warning">'.__('( 线上视频地址，建议上传到优酷或youtube )','CS_TEXTDOMAIN').'</span>',
          'attributes'    => array(
            'placeholder' => 'http://'
          ),		  
        ), 		
		
        array(
          'id'     => 'company_name',
          'type'   => 'text',
          'title'  => __('公司名称','CS_TEXTDOMAIN'),
        ),  
  
		array(
		  'id'       => 'company_email',
		  'type'     => 'text',
		  'title'    => __('企业邮箱','CS_TEXTDOMAIN'),
		  //'validate' => 'email',
		),

		array(
		  'id'       => 'company_tel',
		  'type'     => 'text',
		  'title'    => __('公司电话','CS_TEXTDOMAIN'),
		  //'validate' => 'numeric',
		),

		array(
		  'id'       => 'company_fax',
		  'type'     => 'text',
		  'title'    => __('传真号','CS_TEXTDOMAIN'),
		  //'validate' => 'numeric',
		),			
		
        array(
          'id'         => 'company_add',
          'type'       => 'text',
          'title'      => __('公司地址','CS_TEXTDOMAIN'),
          'attributes' => array(
            'style'    => 'width: 100%;'
          ),
        ),		
		
        array(
          'id'         => 'company_adwords',
          'type'       => 'text',
          'title'      => __('宣传语','CS_TEXTDOMAIN'),
		  'after'      => '<p class="cs-text-muted">'.__('说明：一句话广告语，体现公司的核心优势，支持html','CS_TEXTDOMAIN').'</p>',
		  'sanitize'   => false,	  
		  'attributes' => array(
            'style'    => 'width: 100%;'
          ),
        ),
		
        array(
          'id'       => 'company_profile',
          'type'     => 'wysiwyg',
		  'before'   => '<h4>'.__('公司简介','CS_TEXTDOMAIN').'</h4>',		  
        ),
		
        array(
          'id'       => 'company_patent_disclaimer',
          'type'     => 'textarea',
		  'before'   => '<h4>'.__('专利免责声明','CS_TEXTDOMAIN').'</h4>',	
		  'sanitize' => false,		  
        ),		
				
      ), // end: fields

    ),	
  
    // -----------------------------
    // 其他信息         -
    // -----------------------------
    array(
      'name'      => 'brand_other_options',
      'title'     => __('其他信息','CS_TEXTDOMAIN'),
      'icon'      => 'fa fa-code',

      // begin: fields
      'fields'    => array(		  
        array(
          'id'              => 'company_social',
          'type'            => 'group',
          'title'           => __('自定义社交链接','CS_TEXTDOMAIN'),
          'button_title'    => __('添加链接','CS_TEXTDOMAIN'),
          'accordion_title' => __('链接','CS_TEXTDOMAIN'),
          'fields'          => array(

            array(
              'id'          => 'social_title',
              'type'        => 'text',
              'title'       => __('链接标题','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => __('例如：我的微博','CS_TEXTDOMAIN'),
			  )
            ),
			
            array(
              'id'          => 'social_url',
              'type'        => 'text',
              'title'       => __('社交链接','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  )
            ),	
			
            array(
              'id'          => 'social_class',
              'type'        => 'text',
              'title'       => __('自定义的class类（方便添加CSS样式）','CS_TEXTDOMAIN'),
            ),				

			/*array(
			  'id'      => 'social_iconStyle',
			  'type'    => 'radio',
			  'title'   => __('图标类型','CS_TEXTDOMAIN'),
			  'class'   => 'horizontal',
			  'options' => array(
				'icon'  => __('字体图标','CS_TEXTDOMAIN'),
				'img'   => __('自定义图片','CS_TEXTDOMAIN'),
			  ),
			  'default' => 'icon',
			),	*/

			array(
			  'id'      => 'social_icon',
			  'type'    => 'icon',
			  'title'   => __('字体图标','CS_TEXTDOMAIN'),
			  'button_title' => __('添加图标','CS_TEXTDOMAIN'),
			  //'dependency'   => array( 'social_iconStyle_icon', '==', 'true' ),
			  'attributes'    => array(
				'button_title' => __('添加图标','CS_TEXTDOMAIN'),
			  )
			),
			
			/*array(
			  'id'            => 'social_image',
			  'type'          => 'upload',
			  'title'         => __('自定义图片','CS_TEXTDOMAIN'),
			  'dependency'    => array( 'social_iconStyle_img', '==', 'true' ),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  ),
			  'settings'      => array(
				'upload_type' => 'image',
				'button_title'=> __('上传','CS_TEXTDOMAIN'),
				'frame_title' => __('选择图像','CS_TEXTDOMAIN'),
				'insert_title'=> __('使用图像','CS_TEXTDOMAIN'),
			  ),
			),*/					

          ),
        ),

        array(
          'id'              => 'company_advantage',
          'type'            => 'group',
          'title'           => __('品牌核心优势','CS_TEXTDOMAIN'),
          'button_title'    => __('添加优势','CS_TEXTDOMAIN'),
          'accordion_title' => __('优势','CS_TEXTDOMAIN'),
          'fields'          => array(

            array(
              'id'          => 'advantage_title',
              'type'        => 'text',
              'title'       => __('标题','CS_TEXTDOMAIN'),
            ),
			
            array(
              'id'           => 'advantage_url',
              'type'         => 'text',
              'title'        => __('链接','CS_TEXTDOMAIN'),
			  'attributes'   => array(
				'placeholder'=> 'http://'
			  )
            ),

            array(
              'id'          => 'advantage_description',
              'type'        => 'textarea',
              'title'       => __('描述','CS_TEXTDOMAIN'),
            ),			

			array(
			  'id'      => 'advantage_iconStyle',
			  'type'    => 'radio',
			  'title'   => __('图标类型','CS_TEXTDOMAIN'),
			  'class'   => 'horizontal',
			  'options' => array(
				'icon'  => __('字体图标','CS_TEXTDOMAIN'),
				'img'   => __('自定义图片','CS_TEXTDOMAIN'),
			  ),
			  'default' => 'icon',
			),	

			array(
			  'id'      => 'advantage_icon',
			  'type'    => 'icon',
			  'title'   => __('字体图标','CS_TEXTDOMAIN'),
			  'button_title'   => __('添加图标','CS_TEXTDOMAIN'),
			  'dependency'     => array( 'advantage_iconStyle_icon', '==', 'true' ),
			  'attributes'     => array(
				'button_title' => __('添加图标','CS_TEXTDOMAIN'),
			  )
			),
			
			array(
			  'id'            => 'advantage_image',
			  'type'          => 'upload',
			  'title'         => __('自定义图片','CS_TEXTDOMAIN'),
			  'dependency'    => array( 'advantage_iconStyle_img', '==', 'true' ),
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

          ),
        ),	

        array(
          'id'              => 'company_history',
          'type'            => 'group',
          'title'           => __('发展历程','CS_TEXTDOMAIN'),
          'button_title'    => __('添加历程','CS_TEXTDOMAIN'),
          'accordion_title' => __('历程','CS_TEXTDOMAIN'),
          'fields'          => array(

            array(
              'id'          => 'history_title',
              'type'        => 'text',
              'title'       => __('时间','CS_TEXTDOMAIN'),
            ),
			
            array(
              'id'          => 'history_add',
              'type'        => 'text',
              'title'       => __('地点','CS_TEXTDOMAIN'),
            ),

            array(
              'id'          => 'history_description',
              'type'        => 'textarea',
              'title'       => __('描述','CS_TEXTDOMAIN'),
            ),				
			
			array(
			  'id'            => 'history_image',
			  'type'          => 'upload',
			  'title'         => __('自定义图片','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  ),
			  'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => __('上传','CS_TEXTDOMAIN'),
				'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
				'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
			  ),
			),					

          ),
        ),	

        array(
          'id'              => 'company_facts',
          'type'            => 'group',
          'title'           => __('数据事实（SOME FUN FACTS）','CS_TEXTDOMAIN'),
          'button_title'    => __('添加数据','CS_TEXTDOMAIN'),
          'accordion_title' => __('数据','CS_TEXTDOMAIN'),
          'fields'          => array(

            array(
              'id'          => 'facts_number',
              'type'        => 'text',
              'title'       => __('事实数字','CS_TEXTDOMAIN'),
            ),

            array(
              'id'          => 'facts_description',
              'type'        => 'text',
              'title'       => __('数字说明','CS_TEXTDOMAIN'),
            ),			
			
            array(
              'id'          => 'facts_url',
              'type'        => 'text',
              'title'       => __('链接','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  )
            ),	
			
            array(
              'id'          => 'facts_class',
              'type'        => 'text',
              'title'       => __('自定义的class类（方便添加CSS样式）','CS_TEXTDOMAIN'),
            ),				

			array(
			  'id'      => 'facts_icon',
			  'type'    => 'icon',
			  'title'   => __('字体图标','CS_TEXTDOMAIN'),
			  'button_title' => __('添加图标','CS_TEXTDOMAIN'),
			  //'dependency'   => array( 'social_iconStyle_icon', '==', 'true' ),
			  'attributes'    => array(
				'button_title' => __('添加图标','CS_TEXTDOMAIN'),
			  )
			),						

          ),
        ),		       

      ), // end: fields

    ), 
	
  ),
);

// ------------------------------
// 在线客服                      -
// ------------------------------
$options[]   = array(
  'name'     => 'onlineService_section',
  'title'    => __('客服','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-users',
  'fields'   => array(

        array(
          'id'    => 'enable_onlineService',
          'type'  => 'switcher',
          'title' => __('是否启用在线客服','CS_TEXTDOMAIN'),
        ), 

        array(
          'id'      => 'enable_onlineService_mobile',
          'type'    => 'switcher',
          'title'   => __('移动端是否显示客服','CS_TEXTDOMAIN'),
		  'default' => false,
        ),	

        array(
          'id'      => 'enable_onlineService_ec',
          'type'    => 'switcher',
          'title'   => ''.__('腾讯EC营客通','CS_TEXTDOMAIN').' <a href="http://ec.qq.com/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
		  'default' => false,
		  'label'   => '<span class="cs-text-warning">'.__('需要额外引入JS','CS_TEXTDOMAIN').'</span>',
        ),		

        array(
          'id'          => 'onlineService_ec_js',
          'type'        => 'textarea',
          'title'       => __('腾讯EC营客通JS代码','CS_TEXTDOMAIN'),
		  'dependency'  => array( 'enable_onlineService_ec', '==', 'true' ),
        ),	

        array(
          'id'        => 'enable_onlineService_ec_skin',
          'type'      => 'switcher',
          'title'     => __('隐藏腾讯EC营客通默认样式','CS_TEXTDOMAIN'),
		  'default'   => false,
		  'dependency'=> array( 'enable_onlineService_ec', '==', 'true' ),
        ),			

        array(
          'id'      => 'enable_onlineService_name',
          'type'    => 'switcher',
          'title'   => __('是否显示客服名称','CS_TEXTDOMAIN'),
		  'default' => true,
        ),
		
        array(
          'id'       => 'onlineService_otherInfo',
          'type'     => 'wysiwyg',
          'title'    => __('其他信息','CS_TEXTDOMAIN'),
		  'after'    => '<p class="cs-text-warning">'.__('支持HTML语言，可加入第三方代码','CS_TEXTDOMAIN').'</p>',
        ),

        array(
          'id'              => 'onlineService',
          'type'            => 'group',
          'title'           => __('在线客服','CS_TEXTDOMAIN'),
          'button_title'    => __('添加客服','CS_TEXTDOMAIN'),
          'accordion_title' => __('客服','CS_TEXTDOMAIN'),
          'fields'          => array(

            array(
              'id'          => 'onlineService_name',
              'type'        => 'text',
              'title'       => __('客服名称','CS_TEXTDOMAIN'),
            ),

            array(
              'id'          => 'onlineService_description',
              'type'        => 'textarea',
              'title'       => __('客服简介','CS_TEXTDOMAIN'),
            ),

			array(
			  'id'      => 'onlineService_type',
			  'type'    => 'radio',
			  'title'   => __('客服类型','CS_TEXTDOMAIN'),
			  'class'   => 'horizontal',
			  'options' => array(
				'1'     => __('售前客服','CS_TEXTDOMAIN'),
				'2'     => __('售后客服','CS_TEXTDOMAIN'),
				'3'     => __('技术支持','CS_TEXTDOMAIN'),
			  ),
			  'default' => '1',
			),			
			
			array(
			  'id'            => 'onlineService_thumb',
			  'type'          => 'upload',
			  'title'         => __('客服大头贴（正方形图片）','CS_TEXTDOMAIN'),
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
			
			/**array(
			  'id'            => 'onlineService_image',
			  'type'          => 'upload',
			  'title'         => __('客服生活照（长方形图片）','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  ),
			  'settings'      => array(
				'upload_type' => 'image',
				'button_title'=> __('上传','CS_TEXTDOMAIN'),
				'frame_title' => __('选择图像','CS_TEXTDOMAIN'),
				'insert_title'=> __('使用图像','CS_TEXTDOMAIN'),
			  ),
			),	*/	

            array(
              'id'          => 'onlineService_mobileNum',
              'type'        => 'text',
              'title'       => __('手机号','CS_TEXTDOMAIN'),
            ),

            array(
              'id'          => 'onlineService_telNum',
              'type'        => 'text',
              'title'       => __('座机号','CS_TEXTDOMAIN'),
            ),
			
            array(
              'id'          => 'onlineService_qq',
              'type'        => 'text',
              'title'       => __('QQ账号','CS_TEXTDOMAIN'),
            ),	

            array(
              'id'          => 'onlineService_skype',
              'type'        => 'text',
              'title'       => __('Skype账号','CS_TEXTDOMAIN'),
            ),

            array(
              'id'          => 'onlineService_ec',
              'type'        => 'text',
              'title'       => __('腾讯EC营客通账号','CS_TEXTDOMAIN'),
            ),			

          ),
        ),		

  )
);

// ------------------------------
// 外观                       -
// ------------------------------
$options[]   = array(
  'name'     => 'appearance_section',
  'title'    => __('外观','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-paint-brush',
  'sections' => array(

    // -----------------------------
    // 基本设置        -
    // -----------------------------
    array(
      'name'      => 'appearance_base_options',
      'title'     => __('基本设置','CS_TEXTDOMAIN'),
      'icon'      => 'fa fa-cog',

      // begin: fields
      'fields'    => array(
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('主题设置','CS_TEXTDOMAIN'),
        ),
		
        array(
          'id'      => 'enable_site_gray',
          'type'    => 'switcher',
          'title'   => __('网站整体变灰','CS_TEXTDOMAIN'),
		  'default' => false,
		  'label'   => __('哀悼日,网站整体变灰','CS_TEXTDOMAIN'),
		  'help'    => __('支持IE、Chrome，基本上覆盖了大部分用户，不会降低访问速度','CS_TEXTDOMAIN'),
        ), 		
		
        array(
          'id'           => 'theme_switch',
          'type'         => 'image_select',
          'title'        => __('自定义主题','CS_TEXTDOMAIN'),
          'options'      => array(
            '1'    => get_template_directory_uri()."/lib/images/theme/color-default.png",
            '2'    => get_template_directory_uri()."/lib/images/theme/color-blue.png",
            '3'    => get_template_directory_uri()."/lib/images/theme/color-green.png",
            '4'    => get_template_directory_uri()."/lib/images/theme/color-orange.png",
			'5'    => get_template_directory_uri()."/lib/images/theme/color-custom.png",
          ),
          'radio'        => true,
          'default'      => '1'
        ),
		
        array(
          'id'      => 'theme_custom_color',
          'type'    => 'color_picker',
          'title'   => __('自定义背景色','CS_TEXTDOMAIN'),
          'default' => '#ffffff',
		  'dependency'   => array( 'theme_switch_5', '==', 'true' ),
        ),		
		
        array(
          'id'           => 'theme_pattern',
          'type'         => 'image_select',
          'title'        => __('纹理背景填充','CS_TEXTDOMAIN'),
          'options'      => array(
            '0'    => get_template_directory_uri()."/lib/images/pattern/no-pattern.jpg",
            '1'    => get_template_directory_uri()."/lib/images/pattern/pattern1.jpg",
            '2'    => get_template_directory_uri()."/lib/images/pattern/pattern2.jpg",
            '3'    => get_template_directory_uri()."/lib/images/pattern/pattern3.jpg",
			'4'    => get_template_directory_uri()."/lib/images/pattern/pattern4.jpg",
			'5'    => get_template_directory_uri()."/lib/images/pattern/pattern5.jpg",
			'6'    => get_template_directory_uri()."/lib/images/pattern/pattern6.jpg",
			'7'    => get_template_directory_uri()."/lib/images/pattern/pattern7.jpg",
            '8'    => get_template_directory_uri()."/lib/images/pattern/pattern8.jpg",
            '9'    => get_template_directory_uri()."/lib/images/pattern/pattern9.jpg",
			'10'   => get_template_directory_uri()."/lib/images/pattern/pattern10.jpg",
			'11'   => get_template_directory_uri()."/lib/images/pattern/pattern11.jpg",
			'12'   => get_template_directory_uri()."/lib/images/pattern/pattern12.jpg",
            '13'   => get_template_directory_uri()."/lib/images/pattern/pattern13.jpg",
            '14'   => get_template_directory_uri()."/lib/images/pattern/pattern14.jpg",
			'15'   => get_template_directory_uri()."/lib/images/pattern/pattern15.jpg",
          ),
          'radio'        => true,
          'default'      => '0'
        ),			
	    
        array(
          'id'      => 'enable_skinSwitch',
          'type'    => 'switcher',
          'title'   => __('前台换肤','CS_TEXTDOMAIN'),
		  'default' => false,
		  'label'   => __('此项禁用，前台换肤小工具失效；一旦开启，自定义主题将失效','CS_TEXTDOMAIN'),
        ),			
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('基本设置','CS_TEXTDOMAIN'),
        ), 		

        array(
          'id'      => 'custom_favicon',
          'type'    => 'upload',
          'title'   => __('Favicon图标','CS_TEXTDOMAIN'),
		  'default' => get_template_directory_uri()."/assets/images/ico/favicon.ico",
		  'settings'=> array(
			'upload_type'  => 'image',
			'button_title' => __('上传','CS_TEXTDOMAIN'),
			'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
			'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
		  ),		  
        ),
		
        array(
          'id'      => 'custom_logoStyle',
          'type'    => 'radio',
          'title'   => __('网站标志','CS_TEXTDOMAIN'),
          'class'   => 'horizontal',
          'options' => array(
            '1'     => __('显示LOGO','CS_TEXTDOMAIN'),
            '2'     => __('显示网站标题','CS_TEXTDOMAIN'),
			'3'     => __('显示字体图标','CS_TEXTDOMAIN'),
          ),
		  'default' => '1',
        ),			

        array(
          'id'      => 'custom_logo',
          'type'    => 'upload',
          'title'   => __('网站LOGO','CS_TEXTDOMAIN'),
		  'dependency'   => array( 'custom_logoStyle_1', '==', 'true' ),
		  'default' => get_template_directory_uri()."/assets/images/logo.png",
		  'settings'=> array(
			'upload_type'  => 'image',
			'button_title' => __('上传','CS_TEXTDOMAIN'),
			'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
			'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
		  ),			  
        ),
		
        array(
          'id'      => 'enable_logoTextAnimate',
          'type'    => 'switcher',
          'title'   => __('网站标题动画','CS_TEXTDOMAIN'),
		  'dependency'   => array( 'custom_logoStyle_2', '==', 'true' ),
		  'default' => false,
        ),			

		array(
			'id'      => 'custom_logoIcon',
			'type'    => 'icon',
			'title'   => __('字体图标','CS_TEXTDOMAIN'),
			'button_title' => __('添加图标','CS_TEXTDOMAIN'),
			'dependency'   => array( 'custom_logoStyle_3', '==', 'true' ),
			'attributes'   => array(
				'button_title' => __('添加图标','CS_TEXTDOMAIN'),
			)
	    ),	
	  
        array(
          'id'      => 'enable_friendlyLink',
          'type'    => 'switcher',
          'title'   => __('前台友情链接','CS_TEXTDOMAIN'),
		  'default' => false,
		  'label'   => '<span class="cs-text-warning">'.__('前提是要先开启“友情链接”功能','CS_TEXTDOMAIN').'</span>',
        ), 
			  
        array(
          'id'      => 'enable_tags_postNum',
          'type'    => 'switcher',
          'title'   => __('标签tag显示包含文章数量','CS_TEXTDOMAIN'),
		  'default' => true,
		  'label'   => __('在标签后显示当前标签下的文章数','CS_TEXTDOMAIN'),
        ),			
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('页脚（显示在网站前台底部）','CS_TEXTDOMAIN'),
        ), 	  
	    
        array(
          'id'      => 'enable_gotoTop',
          'type'    => 'switcher',
          'title'   => __('回到页面顶部按钮','CS_TEXTDOMAIN'),
		  'default' => true,
        ),
	    
        array(
          'id'      => 'enable_siteQrcode',
          'type'    => 'switcher',
          'title'   => __('站点二维码','CS_TEXTDOMAIN'),
		  'default' => false,
        ),		

		array(
          'id'            => 'siteQrcode',
          'type'          => 'upload',
          'title'         => __('插入二维码','CS_TEXTDOMAIN'),
		  'default'       => get_template_directory_uri()."/assets/images/siteQrcode.png",
          'attributes'    => array(
            'placeholder' => 'http://'
          ),
		  'settings'      => array(
			'upload_type' => 'image',
			'button_title'=> __('上传','CS_TEXTDOMAIN'),
			'frame_title' => __('选择图像','CS_TEXTDOMAIN'),
			'insert_title'=> __('使用图像','CS_TEXTDOMAIN'),
		  ),
		  'dependency'    => array( 'enable_siteQrcode', '==', 'true' ),
		),		
		
        array(
          'id'     => 'footer_copyright',
          'type'   => 'textarea',
          'title'  => __('版权信息','CS_TEXTDOMAIN'),
		  'attributes' => array(
			'placeholder' => 'All Rights Reserved.',			
          ),
        ), 	
		
        array(
          'id'       => 'footer_otherInfo',
          'type'     => 'wysiwyg',
          'title'    => __('其他信息','CS_TEXTDOMAIN'),
        ),			 

      ), // end: fields

    ),

	// ------------------------------
	// 边栏设置                     -
	// ------------------------------
    array(
	  'name'     => 'appearance_sidebar_options',
      'title'    => __('边栏设置','CS_TEXTDOMAIN'),
      'icon'     => 'fa fa-sliders',
      'fields'   => array(
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('侧边栏设置','CS_TEXTDOMAIN'),
        ),  		
  
        array(
          'id'      => 'enable_sideBar',
          'type'    => 'switcher',
          'title'   => __('侧边栏','CS_TEXTDOMAIN'),
        ),
		
        array(
          'id'      => 'sideBar_style',
          'type'    => 'image_select',
          'title'   => __('侧边栏位置','CS_TEXTDOMAIN'),
          'options' => array(
            '1'     => get_template_directory_uri()."/lib/images/layout/sidebar-1.png",
            '2'     => get_template_directory_uri()."/lib/images/layout/sidebar-2.png",
            '3'     => get_template_directory_uri()."/lib/images/layout/sidebar-3.png",
            '4'     => get_template_directory_uri()."/lib/images/layout/sidebar-none.png",
          ),
          'radio'   => true,
          'default' => '1'
        ),	 		
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('底边栏设置','CS_TEXTDOMAIN'),
        ),  
  
        array(
          'id'      => 'enable_footerBar',
          'type'    => 'switcher',
          'title'   => __('底边栏','CS_TEXTDOMAIN'),
        ), 
		
        array(
          'id'      => 'footerBar_col',
          'type'    => 'radio',
          'title'   => __('分栏方式','CS_TEXTDOMAIN'),
          'class'   => 'horizontal',
          'options' => array(
            '1'     => __('一栏','CS_TEXTDOMAIN'),
            '2'     => __('二栏','CS_TEXTDOMAIN'),
			'3'     => __('三栏','CS_TEXTDOMAIN'),
			'4'     => __('四栏','CS_TEXTDOMAIN'),
          ),
        ),		

      )
    ),	
  
    // -----------------------------
    // 自定义代码         -
    // -----------------------------
    array(
      'name'      => 'appearance_custom_options',
      'title'     => __('自定义代码','CS_TEXTDOMAIN'),
      'icon'      => 'fa fa-code',

      // begin: fields
      'fields'    => array(	    	  
	    
        array(
          'id'     => 'custom_header',
          'type'   => 'textarea',
          'before' => '<h4>'.__('网站头部添加额外代码','CS_TEXTDOMAIN').'</h4>',
          'after'  => '<p class="cs-text-muted">'.__('说明：代码将添加到&lt;head&gt;标签中，您可以添加一些额外的CSS、JS或各种Meta验证。','CS_TEXTDOMAIN').'</p>',	
		  'sanitize' => false,		  
        ), 
		
        array(
          'id'     => 'custom_footer',
          'type'   => 'textarea',
          'before' => '<h4>'.__('网站底部添加额外代码','CS_TEXTDOMAIN').'</h4>',
          'after'  => '<p class="cs-text-muted">'.__('说明：代码将添加到&lt;footer&gt;标签中，可以添加第三方代码（一般用于放置百度商桥代码、站长统计代码、谷歌翻译代码等）。','CS_TEXTDOMAIN').'</p>',
		  'sanitize' => false,
        ),   

      ), // end: fields

    ), 
	
  ),
);


// ------------------------------
// SEO优化                       -
// ------------------------------
$options[]   = array(
  'name'     => 'seo_section',
  'title'    => 'SEO',
  'icon'     => 'fa fa-flag-checkered',
  'fields'   => array(
  
        array(
          'type'    => 'notice',
		  'class'   => 'info',
		  'content' => ''.__('基本设置，推荐使用WordPress SEO by Yoast插件','CS_TEXTDOMAIN').' <a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),
	    
        array(
          'id'      => 'enable_custom_seo',
          'type'    => 'switcher',
          'title'   => __('启用主题自带SEO','CS_TEXTDOMAIN'),
		  'default' => false,
		  'label'   => __('如果启用其他SEO插件，请禁用主题自带SEO避免引起冲突','CS_TEXTDOMAIN'),
        ),
		
        array(
          'id'         => 'seo_title_divider',
          'type'       => 'text',
          'title'      => __('标题间隔符','CS_TEXTDOMAIN'),
          'default'    => '-',
		  'after'  => '<span class="cs-text-warning">'.__('（网站标题分隔符:如果针对的是百度，分隔符可以选择_ |，针对谷歌的话，就选择 - , 及空格。）','CS_TEXTDOMAIN').'</span>',
          'attributes' => array(
            'style'    => 'width: 50px;'
          ),		  
        ),		
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
		  'content' => __('网站名称与副标题','CS_TEXTDOMAIN'),
        ),
		
        array(
          'id'         => 'blogName',
          'type'       => 'text',
          'title'      => __('网站名称','CS_TEXTDOMAIN'),
          'attributes' => array(
            //'readonly' => 'only-key'
          ),
          'default'    => get_bloginfo('name'),
		  'validate'   => 'required',
        ),
		
        array(
          'id'         => 'blogDescription',
          'type'       => 'text',
          'title'      => __('副标题','CS_TEXTDOMAIN'),
          'attributes' => array(
            //'readonly' => 'only-key'
          ),
          'default'    => get_bloginfo('description'),
		  'validate'   => 'required',
        ),		
  
        array(
          'type'    => 'notice',
		  'class'   => 'info',
          'content' => __('首页设置','CS_TEXTDOMAIN'),
        ), 	

        array(
          'id'      => 'seo_home_title_mode',
          'type'    => 'radio',
          'title'   => __('首页标题（title）','CS_TEXTDOMAIN'),
          'class'   => 'horizontal',
          'options' => array(
		    '1'     => __('网站名称+副标题（默认）','CS_TEXTDOMAIN'),
            '2'     => __('网站名称+宣传语（大公司常用）','CS_TEXTDOMAIN'),
            '3'     => __('网站关键词+网站名称（推荐）','CS_TEXTDOMAIN'),
			'4'     => __('自定义','CS_TEXTDOMAIN'),
          ),
		  'default' => '1',
        ),
		
		array(
		  'type'    => 'content',
		  'content' => ''.__('当前宣传语：','CS_TEXTDOMAIN').'<strong class="cs-text-warning" style="margin:auto 20px;">'.cs_get_option( 'company_adwords' ).'</strong>'.__('（如需修改请到 “品牌” 设置页面修改）','CS_TEXTDOMAIN').'',
		  'dependency'   => array( 'seo_home_title_mode_2', '==', 'true' ),
		),		
		
        array(
          'id'         => 'seo_title',
          'type'       => 'text',
		  'before'     => '<h4>'.__('标题（title）','CS_TEXTDOMAIN').'</h4>',
		  'after'      => '<p class="cs-text-warning">'.__('说明：页面标题，一般不超过80个字符。','CS_TEXTDOMAIN').'</p>',
          'attributes' => array(
            'style'       => 'width: 100%;',
			'maxlength'   => 80,
			'placeholder' => __('网站标题','CS_TEXTDOMAIN'),
          ),
		  'dependency'   => array( 'seo_home_title_mode_4', '==', 'true' ),
        ),
		
        array(
          'id'     => 'seo_keywords',
          'type'   => 'textarea',
          'before' => '<h4>'.__('关键词（KeyWords）','CS_TEXTDOMAIN').'</h4>',
          'after'  => '<p class="cs-text-warning">'.__('说明：页面关键词，一般不超过100个字符。多个关键词请用英文半角逗号","或英文半角竖线"|"隔开。','CS_TEXTDOMAIN').'</p>',
		  'attributes'    => array(
			'maxlength'   => 100,
			'placeholder' => __('网站关键词','CS_TEXTDOMAIN'),
		  ),
        ), 
		
        array(
          'id'     => 'seo_description',
          'type'   => 'textarea',
          'before' => '<h4>'.__('描述（Description）','CS_TEXTDOMAIN').'</h4>',
          'after'  => '<p class="cs-text-warning">'.__('说明：页面简短描述，一般不超过200个字符，可将公司的具体联系方式写入描述中，方便客户直接联系。','CS_TEXTDOMAIN').'</p>',
		  'attributes'    => array(
			'maxlength'   => 200,
			'placeholder' => __('网站描述','CS_TEXTDOMAIN'),
		  ),
        ), 
  
        array(
          'type'    => 'notice',
		  'class'   => 'info',
          'content' => __('内页设置','CS_TEXTDOMAIN'),
        ), 

        array(
          'id'      => 'seo_page_title_mode',
          'type'    => 'radio',
          'title'   => __('内页标题（title）','CS_TEXTDOMAIN'),
          'class'   => 'horizontal',
          'options' => array(
            '1'     => __('内容标题','CS_TEXTDOMAIN'),
            '2'     => __('内容标题+关键词','CS_TEXTDOMAIN'),
			'3'     => __('内容标题+网站名称(推荐)','CS_TEXTDOMAIN'),
			'4'     => __('内容标题+关键词+网站名称','CS_TEXTDOMAIN'),
          ),
		  'default' => '3',
		  'after'   => '<span class="cs-text-warning">'.__('内页的标题(title)构成方式，您也可以在编辑/添加内容时自定义对应页面的SEO标题(title)，如果SEO标题为空则使用上面设置的title构成方式。','CS_TEXTDOMAIN').'</span>',
        ),			
  
        array(
          'type'    => 'notice',
		  'class'   => 'info',
          'content' => ''.__('图片ALT和TITLE属性','CS_TEXTDOMAIN').'，SEO Friendly Images <a href="https://wordpress.org/plugins/seo-image/" target="_blank" style="outline:none;border:none" onFocus="this.blur()"><i class="cs-icon fa fa-external-link"></i></a>',
        ),
		
		array(
		  'type'    => 'content',
		  'content' => '<p>'.__('自动更新图片的 ALT和TITLE属性，图片的ALT和TITLE属性对于搜索引擎优化来说是非常重要的','CS_TEXTDOMAIN').'</p>
						<p class="cs-text-warning">'.__('您可以使用以下标签或者任何其他的文字：','CS_TEXTDOMAIN').'</p>
						<ul>
						<li>%title    - '.__('替换为文章标题','CS_TEXTDOMAIN').'</li>
						<li>%name     - '.__('替换为图像的文件名（不带扩展名）','CS_TEXTDOMAIN').'</li>
						<li>%category - '.__('替换为文章分类目录','CS_TEXTDOMAIN').'</li>
						<li>%tags     - '.__('替换为文章标签','CS_TEXTDOMAIN').'</li></ul>',
		),
		
        array(
          'id'         => 'seo_image_alt',
          'type'       => 'text',
		  'title'      => __('图片alt属性','CS_TEXTDOMAIN'),
		  'help'       => __('说明：图像不能正常显示（网速慢、图片链接错误）后显示的替换文本','CS_TEXTDOMAIN'),
		  'default'    => '%name %title',
        ),		
		
        array(
          'id'         => 'seo_image_title',
          'type'       => 'text',
		  'title'      => __('图片title属性','CS_TEXTDOMAIN'),
		  'help'       => __('说明：鼠标移至图片显示的文字','CS_TEXTDOMAIN'),
		  'default'    => '%title',
        ),

        array(
          'id'         => 'enable_seo_image',
          'type'       => 'checkbox',
          'title'      => __('图片alt和title属性覆盖设置','CS_TEXTDOMAIN'),
          'class'      => 'horizontal',
          'options'    => array(
            'alt'      => __('替换默认的图片alt属性（推荐）','CS_TEXTDOMAIN'),
            'title'    => __('替换默认的图片title属性','CS_TEXTDOMAIN'),
          ),
          'default'    => array( 'alt'),
        ),		
  
        array(
          'type'    => 'notice',
		  'class'   => 'info',
          'content' => __('高级设置','CS_TEXTDOMAIN'),
        ),  
  
        array(
          'id'      => 'enable_post_link_nofollow_external',
          'type'    => 'switcher',
          'title'   => __('文章站外链接自动添加nofollow属性和新窗口打开页面','CS_TEXTDOMAIN'),
		  'default' => '1',
        ),
  
        array(
          'id'      => 'enable_comment_link_nofollow_external',
          'type'    => 'switcher',
          'title'   => __('评论站外链接自动添加nofollow属性和新窗口打开页面','CS_TEXTDOMAIN'),
		  'default' => '1',
        ),		
  
        array(
          'id'      => 'enable_post_tag_link',
          'type'    => 'switcher',
          'title'   => __('自动为文章tag添加链接','CS_TEXTDOMAIN'),
        ),	

		array(
		  'id'      => 'post_tag_minNum',
		  'type'    => 'number',
		  'title'   => __('一个标签在文章中出现少于多少次不添加链接','CS_TEXTDOMAIN'),
		  'default' => '1',
		  'after'   => ' <span class="cs-text-muted">( '.__('次','CS_TEXTDOMAIN').' )</span>',
		  'dependency'   => array( 'enable_post_tag_link', '==', 'true' ),
		),

		array(
		  'id'      => 'post_tag_linkNum',
		  'type'    => 'number',
		  'title'   => __('一篇文章中同一个标签添加几次链接','CS_TEXTDOMAIN'),
		  'default' => '1',
		  'after'   => ' <span class="cs-text-muted">( '.__('次','CS_TEXTDOMAIN').' )</span>',
		  'dependency'   => array( 'enable_post_tag_link', '==', 'true' ),
		),		
		
  )
);

// ------------------------------
// 轮播                       -
// ------------------------------
$options[]   = array(
  'name'     => 'carousel_section',
  'title'    => __('轮播','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-image',
  'fields'   => array(
  
    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('首页幻灯片','CS_TEXTDOMAIN'),
    ),  
  
    array(
        'id'      => 'enable_home_banner',
        'type'    => 'switcher',
        'title'   => __('开启首页幻灯片','CS_TEXTDOMAIN'),
		'default' => false,
    ),  
  
    /*array(
        'id'      => 'home_banner_autoPlay',
        'type'    => 'switcher',
        'title'   => __('自动播放','CS_TEXTDOMAIN'),
		'default' => true,
    ), 
  
    array(
        'id'      => 'home_banner_cyclePlay',
        'type'    => 'switcher',
        'title'   => __('循环播放','CS_TEXTDOMAIN'),
		'default' => true,
    ), 
  
    array(
        'id'      => 'home_banner_autoHeight',
        'type'    => 'switcher',
        'title'   => __('自动调整高度','CS_TEXTDOMAIN'),
		'default' => flase,
    ), */
		
    array(
        'id'      => 'home_banner_width',
        'type'    => 'number',
        'title'   => __('幻灯片宽度','CS_TEXTDOMAIN'),
        'after'   => '<span class="cs-text-muted">(px，'.__('像素','CS_TEXTDOMAIN').')</span>',
		'default' => '1920',
		//'validate' => 'numeric',
    ),	
		
    array(
        'id'      => 'home_banner_height',
        'type'    => 'number',
        'title'   => __('幻灯片高度','CS_TEXTDOMAIN'),
        'after'   => '<span class="cs-text-muted">(px，'.__('像素','CS_TEXTDOMAIN').')</span>',
		'default' => '650',
		//'validate' => 'numeric',
    ),

    /*array(
        'id'      => 'home_banner_mode',
        'type'    => 'radio',
        'title'   => __('幻灯片来源','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            '1'   => __('文章','CS_TEXTDOMAIN'),
			'2'   => __('页面','CS_TEXTDOMAIN'),
            '3'   => __('分类','CS_TEXTDOMAIN'),
			//'4'   => __('标签','CS_TEXTDOMAIN'),
			//'5'   => __('内容类型','CS_TEXTDOMAIN'),
			'4'   => __('自定义','CS_TEXTDOMAIN'),
        ),
    ),	

    array(
        'id'                 => 'home_banner_posts',
        'type'               => 'select',
        'title'              => __('展示文章','CS_TEXTDOMAIN'),
        'options'            => 'posts',
        'class'              => 'chosen',
		'dependency'         => array( 'home_banner_mode_1', '==', 'true' ),
        'attributes'         => array(
            'data-placeholder' => __('请选择','CS_TEXTDOMAIN'),
            'multiple'         => 'only-key',
            'style'            => 'width: 200px;'
        ),
    ),

    array(
        'id'                 => 'home_banner_pages',
        'type'               => 'select',
        'title'              => __('展示页面','CS_TEXTDOMAIN'),
        'options'            => 'pages',
        'class'              => 'chosen',
		'dependency'         => array( 'home_banner_mode_2', '==', 'true' ),
        'attributes'         => array(
            'data-placeholder' => __('请选择','CS_TEXTDOMAIN'),
            'multiple'         => 'only-key',
            'style'            => 'width: 200px;'
        ),
    ),

    array(
        'id'                 => 'home_banner_categories',
        'type'               => 'select',
        'title'              => __('展示分类','CS_TEXTDOMAIN'),
        'options'            => 'categories',
        'class'              => 'chosen',
		'dependency'         => array( 'home_banner_mode_3', '==', 'true' ),
        'attributes'         => array(
            'data-placeholder' => __('请选择','CS_TEXTDOMAIN'),
            'multiple'         => 'only-key',
            'style'            => 'width: 200px;'
        ),
    ),*/

    array(
        'id'              => 'home_banner',
        'type'            => 'group',
        'title'           => __('自定义幻灯片','CS_TEXTDOMAIN'),
        'button_title'    => __('添加Banner','CS_TEXTDOMAIN'),
        'accordion_title' => 'Banner',
		//'dependency'      => array( 'home_banner_mode_4', '==', 'true' ),
        'fields'          => array(

            array(
              'id'          => 'home_banner_title',
              'type'        => 'text',
              'title'       => __('标题','CS_TEXTDOMAIN'),
            ),		
		
			array(
			  'id'            => 'home_banner_image',
			  'type'          => 'upload',
			  'title'         => __('图片','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  ),
			  'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => __('上传','CS_TEXTDOMAIN'),
				'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
				'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
			  ),
			),		
			
            array(
              'id'            => 'home_banner_url',
              'type'          => 'text',
              'title'         => __('链接','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  )
            ),	

            array(
              'id'          => 'home_banner_description',
              'type'        => 'textarea',
              'title'       => __('描述','CS_TEXTDOMAIN'),
            ),			

        ),
    ),	
  
    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('产品幻灯片','CS_TEXTDOMAIN'),
    ), 
  
    array(
        'id'      => 'enable_product_banner',
        'type'    => 'switcher',
        'title'   => __('开启产品幻灯片','CS_TEXTDOMAIN'),
		'default' => false,
    ),  
		
    array(
        'id'      => 'product_banner_width',
        'type'    => 'number',
        'title'   => __('幻灯片宽度','CS_TEXTDOMAIN'),
        'after'   => '<span class="cs-text-muted">(px，'.__('像素','CS_TEXTDOMAIN').')</span>',
		'default' => '1920',
		//'validate' => 'numeric',
    ),	
		
    array(
        'id'      => 'product_banner_height',
        'type'    => 'number',
        'title'   => __('幻灯片高度','CS_TEXTDOMAIN'),
        'after'   => '<span class="cs-text-muted">(px，'.__('像素','CS_TEXTDOMAIN').')</span>',
		'default' => '650',
		//'validate' => 'numeric',
    ),

    array(
        'id'              => 'product_banner',
        'type'            => 'group',
        'title'           => __('自定义幻灯片','CS_TEXTDOMAIN'),
        'button_title'    => __('添加Banner','CS_TEXTDOMAIN'),
        'accordion_title' => 'Banner',
        'fields'          => array(

            array(
              'id'          => 'product_banner_title',
              'type'        => 'text',
              'title'       => __('标题','CS_TEXTDOMAIN'),
            ),		
		
			array(
			  'id'            => 'product_banner_image',
			  'type'          => 'upload',
			  'title'         => __('图片','CS_TEXTDOMAIN'),
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
              'id'            => 'product_banner_url',
              'type'          => 'text',
              'title'         => __('链接','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  )
            ),	

            array(
              'id'          => 'product_banner_description',
              'type'        => 'textarea',
              'title'       => __('描述','CS_TEXTDOMAIN'),
            ),			

        ),
    ),		

  )
);


// ------------------------------
// 公告                       -
// ------------------------------
$options[]   = array(
  'name'     => 'notice_section',
  'title'    => __('公告','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-bullhorn',
  'fields'   => array(
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('首页公告栏','CS_TEXTDOMAIN'),
    ),  
  
    array(
        'id'      => 'enable_bulletin',
        'type'    => 'switcher',
        'title'   => __('首页公告栏','CS_TEXTDOMAIN'),
		'default' => false,
    ), 
	
    array(
        'id'              => 'bulletin',
        'type'            => 'group',
        'title'           => __('自定义公告','CS_TEXTDOMAIN'),
        'button_title'    => __('添加公告','CS_TEXTDOMAIN'),
        'accordion_title' => __('公告','CS_TEXTDOMAIN'),
        'fields'          => array(			

            array(
              'id'          => 'bulletin_title',
              'type'        => 'text',
              'title'       => __('标题','CS_TEXTDOMAIN'),
            ),
			
            array(
              'id'            => 'bulletin_url',
              'type'          => 'text',
              'title'         => __('链接','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => 'http://'
			  )
            ),	

            array(
              'id'          => 'bulletin_description',
              'type'        => 'textarea',
              'title'       => __('描述','CS_TEXTDOMAIN'),
            ),	

            array(
              'id'            => 'bulletin-date',
              'type'          => 'text',
              'title'         => __('日期','CS_TEXTDOMAIN'),
			  'attributes'    => array(
				'placeholder' => __('例如：2015/06/26','CS_TEXTDOMAIN'),
			  )
            ),			

        ),
    ),	
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('自定义弹窗公告','CS_TEXTDOMAIN'),
    ),
			
	array(
		'id'      => 'enable_lightbox',
		'type'    => 'switcher',
		'title'   => __('弹窗公告','CS_TEXTDOMAIN'),
		'default' => false,
	), 	
		
	array(
		'id'            => 'lightbox_image',
		'type'          => 'upload',
		'title'         => __('图片','CS_TEXTDOMAIN'),
		'attributes'    => array(
			'placeholder' => 'http://'
		),
		'settings'      => array(
			'upload_type'  => 'image',
			'button_title' => __('上传','CS_TEXTDOMAIN'),
			'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
			'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
		),
	),		

    array(
        'id'          => 'lightbox_title',
        'type'        => 'text',
        'title'       => __('标题','CS_TEXTDOMAIN'),
    ),
			
    array(
        'id'             => 'lightbox_url',
        'type'           => 'text',
        'title'          => __('链接','CS_TEXTDOMAIN'),
		'attributes'     => array(
			'placeholder'=> 'http://'
		)
    ),	

    array(
        'id'          => 'lightbox_description',
        'type'        => 'textarea',
        'title'       => __('描述','CS_TEXTDOMAIN'),
    ),
			
	array(
		'id'        => 'lightbox_showPages',
		'type'      => 'radio',
		'class'     => 'horizontal',
		'title'     => __('展示页面','CS_TEXTDOMAIN'),
		'options'   => array(
			'1'     => __('首页展示','CS_TEXTDOMAIN'),
			'2'     => __('全站展示','CS_TEXTDOMAIN'),
		),
		'default'   => '1',
	),
			
	array(
		'id'        => 'lightbox_mode',
		'type'      => 'radio',
		'class'     => 'horizontal',
		'title'     => __('展示方式','CS_TEXTDOMAIN'),
		'options'   => array(
			'1'     => __('纯图片','CS_TEXTDOMAIN'),
			'2'     => __('纯文字','CS_TEXTDOMAIN'),
			'3'     => __('图文','CS_TEXTDOMAIN'),
		),
		'default'   => '3',
	),	

  )
);


// ------------------------------
// 列表                       -
// ------------------------------
$options[]   = array(
  'name'     => 'lists_section',
  'title'    => __('列表','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-th-list',
  'fields'   => array(
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('归档设置','CS_TEXTDOMAIN'),
    ),  

    array(
        'id'      => 'author_link_rewrite',
        'type'    => 'radio',
        'title'   => __('作者存档页面URL重写','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            '1'   => __('作者存档链接中的用户名改为用户ID','CS_TEXTDOMAIN'),
            '2'   => __('作者存档链接中的用户名改为昵称','CS_TEXTDOMAIN'),
        ),
		'default' => '1',
		'desc'    => __('注：需要主机支持伪静态Rewrite','CS_TEXTDOMAIN'),
        'after'   => '<span class="cs-text-warning">'.__('避免直接使用用户名，提高安全性，推荐使用用户ID，使用昵称可能会存在昵称相同的情况，这时候只会显示ID较早的用户（解决思路是修改个人资料时，如果使用了相同昵称，进行提示。）注意：昵称不要包含空格，同时不建议使用中文，此外，使用昵称方式记得将“公开显示为”设置为非用户名，这样就OK啦！','CS_TEXTDOMAIN').'</span>',
    ),	
	
    array(
        'type'    => 'notice',
        'class'   => 'info',
        'content' => __('置顶文章','CS_TEXTDOMAIN'),
    ),
  
    array(
        'id'      => 'enable_stickPost',
        'type'    => 'switcher',
        'title'   => __('推荐置顶文章','CS_TEXTDOMAIN'),
		'default' => false,
    ), 	
		
    array(
        'id'      => 'stickPost_num',
        'type'    => 'number',
        'title'   => __('置顶文章展示','CS_TEXTDOMAIN'),
        'after'   => '<span class="cs-text-muted">('.__('篇','CS_TEXTDOMAIN').')</span>',
		'default' => '4',
		//'validate' => 'numeric',
		'dependency'   => array( 'enable_stickPost', '==', 'true' ),
    ),	
	
    /**array(
        'id'            => 'stickPost_thumb',
        'type'          => 'upload',
        'title'         => __('置顶文章默认缩略图','CS_TEXTDOMAIN'),
		'default'       => get_template_directory_uri()."/assets/images/stickPost_thumb.png",
        'attributes'    => array(
            'placeholder' => 'http://'
        ),
		'settings'      => array(
			'upload_type'  => 'image',
			'button_title' => __('上传','CS_TEXTDOMAIN'),
			'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
			'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
		),
		'dependency'   => array( 'enable_stickPost', '==', 'true' ),
    ),*/	
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('阅读更多设置','CS_TEXTDOMAIN'),
    ),	
  
    array(
        'id'      => 'enable_post_readMore',
        'type'    => 'switcher',
        'title'   => __('自定义阅读更多','CS_TEXTDOMAIN'),
		'default' => true,
    ), 
  
    array(
        'id'      => 'enable_post_filterHtml',
        'type'    => 'switcher',
        'title'   => __('不过滤html标签','CS_TEXTDOMAIN'),
		'default' => false,
		'help'    => __('支持中英文并且不过滤html标签，但对html标签支持不好，截取时会把标签截断而导致显示不全，所以建议配合文章的more标签一起使用','CS_TEXTDOMAIN'),
    ), 	
		
    array(
        'id'      => 'post_excerptLength',
        'type'    => 'number',
        'title'   => __('自定义文章摘要长度','CS_TEXTDOMAIN'),
        'after'   => '<span class="cs-text-muted">('.__('字符','CS_TEXTDOMAIN').')</span>',
		'default' => '80',
		//'validate' => 'numeric',
    ),
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('时间格式','CS_TEXTDOMAIN'),
    ),	

    array(
        'id'      => 'list_date_format',
        'type'    => 'radio',
        'title'   => __('时间显示格式','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            '1'   => __('传统格式','CS_TEXTDOMAIN'),
            '2'   => __('“多久前”格式','CS_TEXTDOMAIN'),
			'3'   => __('不显示','CS_TEXTDOMAIN'),
        ),
		'default' => '1',
    ),
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('分页设置','CS_TEXTDOMAIN'),
    ),
		
    array(
        'id'      => 'custom_paginationStyle',
        'type'    => 'radio',
        'title'   => __('分页方式','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
			'1'   => __('Ajax无限加载','CS_TEXTDOMAIN'),
			'2'   => __('下一页/前一页按钮','CS_TEXTDOMAIN'),
			'3'   => __('页码','CS_TEXTDOMAIN'),
        ),
		'default' => '3',
    ),	
		
    array(
        'id'      => 'ajax_loadPages',
        'type'    => 'number',
        'title'   => __('ajax无限加载页数','CS_TEXTDOMAIN'),
        'after'   => '<span class="cs-text-muted">('.__('页','CS_TEXTDOMAIN').')</span>',
		'default' => '2',
		//'validate' => 'numeric',
		'dependency'   => array( 'custom_paginationStyle_1', '==', 'true' ),
    ),	
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('列表样式','CS_TEXTDOMAIN'),
    ),	

    array(
        'id'      => 'list_showStyle',
        'type'    => 'radio',
        'title'   => __('列表展示方式','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            '1'   => __('小缩略图+标题+摘要','CS_TEXTDOMAIN'),
            '2'   => __('大缩略图+标题+摘要','CS_TEXTDOMAIN'),
			'3'   => __('简单标题列表','CS_TEXTDOMAIN'),
        ),
		'default' => '1',
    ),	
	
  )
);


// ------------------------------
// 归档                       -
// ------------------------------
/**$options[]   = array(
  'name'     => 'archive_section',
  'title'    => __('归档','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-bookmark',
  'fields'   => array(  

  )
);*/

// ------------------------------
// 文章                       -
// ------------------------------
$options[]   = array(
  'name'     => 'post_section',
  'title'    => __('文章','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-newspaper-o',
  'fields'   => array(
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('文章形式设置','CS_TEXTDOMAIN'),
    ),	
  
    array(
        'id'      => 'enable_post_formats',
        'type'    => 'switcher',
        'title'   => __('文章形式','CS_TEXTDOMAIN'),
		'default' => false,
    ),		

    array(
        'id'                 => 'post_formats',
        'type'               => 'select',
        'title'              => __('选择要启用的文章形式','CS_TEXTDOMAIN'),
        'class'              => 'chosen',
        'help'               => __('可多选，文章形式(Post Formats),是文章的一种属性,决定文章的显示方式。','CS_TEXTDOMAIN'),
		'dependency'         => array( 'enable_post_formats', '==', 'true' ),
		'options'            => array(
            'standard'       => __('标准','CS_TEXTDOMAIN'),
			'aside'          => __('日志','CS_TEXTDOMAIN'),
            'gallery'        => __('相册','CS_TEXTDOMAIN'),
            'link'           => __('链接','CS_TEXTDOMAIN'),
            'image'          => __('图像','CS_TEXTDOMAIN'),
            'quote'          => __('引用','CS_TEXTDOMAIN'),
            'status'         => __('状态','CS_TEXTDOMAIN'),
            'video'          => __('视频','CS_TEXTDOMAIN'),
            'audio'          => __('音频','CS_TEXTDOMAIN'),
			'chat'           => __('聊天','CS_TEXTDOMAIN'),
        ),
		'attributes'         => array(
            'data-placeholder' => __('请选择','CS_TEXTDOMAIN'),
            'multiple'         => 'only-key',
            'style'            => 'width: 80%;'
        ),
    ),   
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('文章常规设置','CS_TEXTDOMAIN'),
    ),
  
    array(
        'id'      => 'enable_post_views',
        'type'    => 'switcher',
        'title'   => __('浏览次数统计','CS_TEXTDOMAIN'),
		'default' => true,
    ), 	
  
    array(
        'id'      => 'enable_post_like',
        'type'    => 'switcher',
        'title'   => __('访客点赞','CS_TEXTDOMAIN'),
		'default' => false,
    ),	
  
    array(
        'id'      => 'enable_post_thumbnail',
        'type'    => 'switcher',
        'title'   => __('特色图像','CS_TEXTDOMAIN'),
		'default' => true,
    ), 
  
    array(
        'id'      => 'enable_post_copyright',
        'type'    => 'switcher',
        'title'   => __('转载声明','CS_TEXTDOMAIN'),
		'default' => true,
    ),
  
    array(
        'id'      => 'enable_post_authorInfo',
        'type'    => 'switcher',
        'title'   => __('作者信息','CS_TEXTDOMAIN'),
		'default' => false,
    ),	
  
    array(
        'id'      => 'enable_post_shareButton',
        'type'    => 'switcher',
        'title'   => __('分享按钮','CS_TEXTDOMAIN'),
		'default' => true,
    ),		
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('文章相关链接设置','CS_TEXTDOMAIN'),
    ), 
  
    array(
        'id'      => 'enable_post_pager',
        'type'    => 'switcher',
        'title'   => __('文章的上一篇和下一篇链接','CS_TEXTDOMAIN'),
		'default' => true,
    ),
  
    array(
        'id'      => 'enable_postRelated',
        'type'    => 'switcher',
        'title'   => __('相关文章','CS_TEXTDOMAIN'),
		'default' => true,
    ),

    /**array(
        'id'            => 'postRelated_thumb',
        'type'          => 'upload',
        'title'         => __('相关文章默认缩略图','CS_TEXTDOMAIN'),
		'default'       => get_template_directory_uri()."/assets/images/postRelated_thumb.png",
        'attributes'    => array(
            'placeholder' => 'http://'
        ),
		'settings'      => array(
			'upload_type'  => 'image',
			'button_title' => __('上传','CS_TEXTDOMAIN'),
			'frame_title'  => __('选择图像','CS_TEXTDOMAIN'),
			'insert_title' => __('使用图像','CS_TEXTDOMAIN'),
		),
		'dependency'   => array( 'enable_postRelated', '==', 'true' ),
    ),*/	
		
    array(
        'id'      => 'postRelated_num',
        'type'    => 'number',
        'title'   => __('相关文章展示','CS_TEXTDOMAIN'),
        'after'   => '<span class="cs-text-muted">('.__('篇','CS_TEXTDOMAIN').')</span>',
		'default' => '8',
		//'validate' => 'numeric',
		'dependency'   => array( 'enable_postRelated', '==', 'true' ),
    ),	

    array(
        'id'      => 'postRelated_style',
        'type'    => 'radio',
        'title'   => __('相关文章展示方式','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            '1'   => __('无序列表','CS_TEXTDOMAIN'),
            '2'   => __('图文列表','CS_TEXTDOMAIN'),
        ),
		'default' => '1',
		'dependency'   => array( 'enable_postRelated', '==', 'true' ),
    ),	
  
    array(
		'type'    => 'notice',
        'class'   => 'info',
        'content' => __('文章时间格式','CS_TEXTDOMAIN'),
    ),	

    array(
        'id'      => 'post_date_format',
        'type'    => 'radio',
        'title'   => __('文章时间显示格式','CS_TEXTDOMAIN'),
        'class'   => 'horizontal',
        'options' => array(
            '1'   => __('传统格式','CS_TEXTDOMAIN'),
            '2'   => __('“多久前”格式','CS_TEXTDOMAIN'),
			'3'   => __('不显示','CS_TEXTDOMAIN'),
        ),
		'default' => '1',
    ),	

  )
);

// ------------------------------
// 搜索设置               -
// ------------------------------
$options[]   = array(
  'name'     => 'search_section',
  'title'    => __('搜索','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-search',
  'fields'   => array(	

        /*array(
          'id'             => 'unique_select_8',
          'type'           => 'select',
          'title'          => 'Select with post_types',
          'options'        => 'post_types',
          'default_option' => 'Select a post_type'
        ), 

        array(
          'id'             => 'unique_select_9',
          'type'           => 'select',
          'title'          => 'Select with menus',
          'options'        => 'menus',
          'default_option' => 'Select a menu'
        ),	

        array(
          'id'             => 'unique_select_10',
          'type'           => 'select',
          'title'          => 'Select with sidebars',
          'options'        => 'sidebars',
          'default_option' => 'Select a sidebar'
        ),

        array(
          'id'             => 'unique_select_11',
          'type'           => 'select',
          'title'          => 'Select with roles',
          'options'        => 'roles',
          'default_option' => 'Select a role'
        ),	*/		

        array(
          'id'      => 'search_mode',
          'type'    => 'radio',
          'title'   => __('搜索方式','CS_TEXTDOMAIN'),
          'class'   => 'horizontal',
          'options' => array(
            '1'     => __('仅标题','CS_TEXTDOMAIN'),
            '2'     => __('标题+内容','CS_TEXTDOMAIN'),
			'3'     => __('标题+内容+标签tag','CS_TEXTDOMAIN'),
          ),
		  'default' => '1',
          //'after'   => '<div class="cs-text-muted">Reference site about Lorem Ipsum, a random Lipsum generator.</div>',
        ),		
  
        array(
          'id'      => 'enable_search_all_type',
          'type'    => 'switcher',
          'title'   => __('搜索结果包含自定义文章类型','CS_TEXTDOMAIN'),
		  'default' => '1',
		  'label'   => '<span class="cs-text-warning">'.__('注：默认搜索结果不包含自定义文章类型的内容，开启则包含关键词的自定义文章类型的内容也将出现在搜索结果中','CS_TEXTDOMAIN').'</span>',
        ), 
  
        array(
          'id'      => 'enable_search_keywords_highlight',
          'type'    => 'switcher',
		  'default' => '1',
          'title'   => __('搜索结果关键字高亮显示','CS_TEXTDOMAIN'),
        ),
  
        array(
          'id'      => 'enable_search_result_one_rewrite',
          'type'    => 'switcher',
          'title'   => __('搜索结果只有一条记录时，自动跳转到该页','CS_TEXTDOMAIN'),
		  'default' => '1',
		  'label'   => '<span class="cs-text-warning">'.__('注：如果返回的结果只有一篇文章，我们可以直接让它跳转到这篇文章，提高用户体验。','CS_TEXTDOMAIN').'</span>',
        ),	
  
        array(
          'id'      => 'enable_search_result_match',
          'type'    => 'switcher',
          'title'   => __('提高搜索结果的相关性(准确度)','CS_TEXTDOMAIN'),
		  'default' => '1',
		  'label'   => '<span class="cs-text-warning">'.__('注：默认搜索结果是按照发布时间排序的，这样的搜索结果相关性并不强，应该让搜索结果按照内容相关性排序','CS_TEXTDOMAIN').'</span>',
        ),
  
        array(
          'id'      => 'enable_search_exclude_allpage',
          'type'    => 'switcher',
          'title'   => __('搜索结果排除所有页面','CS_TEXTDOMAIN'),
        ),		
		
        array(
          'id'    => 'search_exclude_id',
          'type'  => 'text',
          'title' => __('搜索结果中排除指定ID的页面或者文章','CS_TEXTDOMAIN'),
          'desc'  => __('输入页面或文章ID，多个用英文逗号隔开','CS_TEXTDOMAIN'),
        ),	
		
        array(
          'id'    => 'search_filter_cat',
          'type'  => 'text',
          'title' => __('搜索过滤','CS_TEXTDOMAIN'),
          'desc'  => __('输入分类ID，多个用英文逗号隔开','CS_TEXTDOMAIN'),
		  'after' => '<p class="cs-text-info">'.__('分类ID，前面加负号表示排除；如果直接写ID，则表示只在该ID中搜索','CS_TEXTDOMAIN').'</p> ',
        ),		

  )
);

// ------------------------------
// 评论设置                       -
// ------------------------------
$options[]   = array(
  'name'     => 'comment_section',
  'title'    => __('评论','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-comments',
  'fields'   => array( 
  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('温馨提示：网站启用第三方评论以下设置有可能会失效！','CS_TEXTDOMAIN'),
        ),  
  
        array(
          'id'      => 'enable_comment_autoSave',
          'type'    => 'switcher',
          'title'   => __('评论自动保存','CS_TEXTDOMAIN'),
        ), 		
  
        array(
          'id'      => 'enable_loginToComment',
          'type'    => 'switcher',
          'title'   => __('用户必须注册并登录才可以发表评论','CS_TEXTDOMAIN'),
        ), 
  
        array(
          'id'      => 'enable_loginToComment',
          'type'    => 'switcher',
          'title'   => __('评论者必须填写姓名和电子邮件','CS_TEXTDOMAIN'),
		  'default' => '1',
        ),
  
        array(
          'id'      => 'enable_comment_url',
          'type'    => 'switcher',
          'title'   => __('评论网址URL表单','CS_TEXTDOMAIN'),
        ), 
  
        array(
          'id'      => 'enable_comments_author_link',
          'type'    => 'switcher',
          'title'   => __('评论人名字的链接','CS_TEXTDOMAIN'),
		  'label'   => __('此方法只对使用 WordPress 默认评论表单的主题才有效','CS_TEXTDOMAIN'),
        ), 			
  
        array(
          'id'      => 'enable_commentMail',
          'type'    => 'switcher',
          'title'   => __('评论邮箱提醒功能','CS_TEXTDOMAIN'),
		  'label'   => __('需要主机空间支持mail()函数，或者通过安装WP-Mail-SMTP插件实现','CS_TEXTDOMAIN'),
        ), 
  
        array(
          'id'      => 'enable_avatarLazyload',
          'type'    => 'switcher',
          'title'   => __('头像Lazyload功能','CS_TEXTDOMAIN'),
		  'default' => true,
        ), 	
  
        array(
          'id'      => 'enable_commentAjax',
          'type'    => 'switcher',
          'title'   => __('AJAX无刷新评论','CS_TEXTDOMAIN'),
		  'default' => true,
        ),
  
        array(
          'id'      => 'enable_commentEmoji',
          'type'    => 'switcher',
          'title'   => __('启用表情','CS_TEXTDOMAIN'),
		  'default' => false,
        ),		
  
        array(
          'id'      => 'enable_commentFilter',
          'type'    => 'switcher',
          'title'   => __('过滤垃圾评论','CS_TEXTDOMAIN'),
		  'default' => true,
        ),
  
        array(
          'id'      => 'enable_commentMinLimit',
          'type'    => 'switcher',
          'title'   => __('限制评论内容最小字数','CS_TEXTDOMAIN'),
		  'default' => false,
        ),	
  
        array(
          'id'      => 'commentMinLimit',
          'type'    => 'number',
          'title'   => __('评论内容最小字数','CS_TEXTDOMAIN'),
		  'default' => '10',
		  //'validate' => 'numeric',
		  'dependency'    => array( 'enable_commentMinLimit', '==', 'true' ),
		  'after'   => '<span class="cs-text-muted">('.__('字符','CS_TEXTDOMAIN').')</span>',
        ),		

  )
);


// ------------------------------
// 广告                       -
// ------------------------------
$options[]   = array(
  'name'     => 'advert_section',
  'title'    => __('广告','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-gift',
  'fields'   => array(
  	  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('Promo Bar宣传栏设置','CS_TEXTDOMAIN'),
        ),
		
		array(
          'id'      => 'enable_footer_promo_bar',
          'type'    => 'switcher',
          'title'   => __('启用宣传栏','CS_TEXTDOMAIN'),
          'default' => false,
        ),	
		
		array(
          'id'      => 'footer_promo_bar_mode',
          'type'    => 'radio',
          'title'   => __('宣传栏展示形式','CS_TEXTDOMAIN'),
		  'class'   => 'horizontal',
          'options' => array(
			'1'   => __('文字+按钮','CS_TEXTDOMAIN'),
			'2'   => __('文字+箭头(Full Bar Link)',	'CS_TEXTDOMAIN'),
			'3'   => __('纯文字(Full Bar Link)','CS_TEXTDOMAIN'),
          ),
		  'default' => '1',
		  'dependency' => array( 'enable_footer_promo_bar', '==', 'true' ),
        ),		
  	  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('弹窗广告','CS_TEXTDOMAIN'),
        ),		
  	  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('列表页广告','CS_TEXTDOMAIN'),
        ),
  	  
        array(
          'type'    => 'notice',
          'class'   => 'info',
          'content' => __('详情页广告','CS_TEXTDOMAIN'),
        ),		

  )
);
  
// ------------------------------
// 翻译                       -
// ------------------------------
$options[]   = array(
  'name'     => 'label_section',
  'title'    => __('标签','CS_TEXTDOMAIN'),
  //'icon'     => 'fa fa-buysellads',
  'icon'     => 'fa fa-language',
  'fields'   => array(
	
    array(
        'id'          => 'post_readMoreLabel',
        'type'        => 'text',
        'title'       => __('自定义阅读更多的标签文字','CS_TEXTDOMAIN'),
		'default'     => __('阅读更多','CS_TEXTDOMAIN'),
    ),  
  
    array(
        'id'      => 'post_previousLabel',
        'type'    => 'text',
        'title'   => __('上一篇标签文字','CS_TEXTDOMAIN'),
		'default' => __('上一篇','CS_TEXTDOMAIN'),
    ),	
  
    array(
        'id'      => 'post_nextLabel',
        'type'    => 'text',
        'title'   => __('下一篇标签文字','CS_TEXTDOMAIN'),
		'default' => __('下一篇','CS_TEXTDOMAIN'),
    ),
	
    array(
        'id'      => 'postRelated_label',
        'type'    => 'text',
        'title'   => __('相关文章标签文字','CS_TEXTDOMAIN'),
		'default' => __('相关文章','CS_TEXTDOMAIN'),
    ),	
	
    array(
        'id'          => 'ajax_moreLabel',
        'type'        => 'text',
        'title'       => __('ajax无限加载中下一页的标签文字','CS_TEXTDOMAIN'),
		'default'     => __('加载更多','CS_TEXTDOMAIN'),
    ),	
	
    array(
        'id'          => 'ajax_nomoreLabel',
        'type'        => 'text',
        'title'       => __('ajax无限加载完结的标签文字','CS_TEXTDOMAIN'),
		'default'     => __('没有更多文章了','CS_TEXTDOMAIN'),
    ),	

  )
);
  
// ------------------------------
// 备份                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_framework_section',
  'title'    => __('备份','CS_TEXTDOMAIN'),
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
  'name'     => 'license_section',
  'title'    => __('关于','CS_TEXTDOMAIN'),
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => __('关于易唯','CS_TEXTDOMAIN'),
    ),
	
    array(
      'type'    => 'content',
      'content' => __('易唯设计','CS_TEXTDOMAIN'),
    ),

  )
);

CSFramework::instance( $settings, $options );

if(cs_get_option( 'blogName' )!=""){
	update_option('blogname', cs_get_option( 'blogName' ));//更新网站名称
}
if(cs_get_option( 'blogDescription' )!=""){
	update_option('blogdescription', cs_get_option( 'blogDescription' ));//更新网站副标题
}
