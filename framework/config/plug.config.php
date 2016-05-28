<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => __('插件设置', 'CS_TEXTDOMAIN'),
  'menu_type'       => 'options', // menu, submenu, options, theme, etc.
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
// ----------------------------------------
// a option section for options overview  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'overwiew',
  'title'       => 'Overview',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

    // begin: a field
    array(
      'id'      => 'text_1',
      'type'    => 'text',
      'title'   => 'Text',
    ),
    // end: a field

    array(
      'id'      => 'textarea_1',
      'type'    => 'textarea',
      'title'   => 'Textarea',
      'help'    => 'This option field is useful. You will love it!',
    ),

    array(
      'id'      => 'upload_1',
      'type'    => 'upload',
      'title'   => 'Upload',
      'help'    => 'Upload a site logo for your branding.',
    ),

    array(
      'id'      => 'switcher_1',
      'type'    => 'switcher',
      'title'   => 'Switcher',
      'label'   => 'You want to update for this framework ?',
    ),

    array(
      'id'      => 'color_picker_1',
      'type'    => 'color_picker',
      'title'   => 'Color Picker',
      'default' => '#3498db',
    ),

    array(
      'id'      => 'checkbox_1',
      'type'    => 'checkbox',
      'title'   => 'Checkbox',
      'label'   => 'Did you like this framework ?',
    ),

    array(
      'id'      => 'radio_1',
      'type'    => 'radio',
      'title'   => 'Radio',
      'options' => array(
        'yes'   => 'Yes, Please.',
        'no'    => 'No, Thank you.',
      ),
      'help'    => 'Are you sure for this choice?',
    ),

    array(
      'id'             => 'select_1',
      'type'           => 'select',
      'title'          => 'Select',
      'options'        => array(
        'bmw'          => 'BMW',
        'mercedes'     => 'Mercedes',
        'volkswagen'   => 'Volkswagen',
        'other'        => 'Other',
      ),
      'default_option' => 'Select your favorite car',
    ),

    array(
      'id'      => 'number_1',
      'type'    => 'number',
      'title'   => 'Number',
      'default' => '10',
      'after'   => ' <i class="cs-text-muted">$ (dollars)</i>',
    ),

    array(
      'id'        => 'image_select_1',
      'type'      => 'image_select',
      'title'     => 'Image Select',
      'options'   => array(
        'value-1' => 'http://codestarframework.com/assets/images/placeholder/100x80-2ecc71.gif',
        'value-2' => 'http://codestarframework.com/assets/images/placeholder/100x80-e74c3c.gif',
        'value-3' => 'http://codestarframework.com/assets/images/placeholder/100x80-ffbc00.gif',
        'value-4' => 'http://codestarframework.com/assets/images/placeholder/100x80-3498db.gif',
        'value-5' => 'http://codestarframework.com/assets/images/placeholder/100x80-555555.gif',
      ),
    ),

    array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => 'This is info notice field for your highlight sentence.',
    ),

    array(
      'id'      => 'background_1',
      'type'    => 'background',
      'title'   => 'Background',
    ),

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => 'This is info warning field for your highlight sentence.',
    ),

    array(
      'id'      => 'icon_1',
      'type'    => 'icon',
      'title'   => 'Icon',
      'desc'    => 'Some description here for this option field.',
    ),

    array(
      'id'      => 'text_2',
      'type'    => 'text',
      'title'   => 'Text',
      'desc'    => 'Some description here for this option field.',
    ),

    array(
      'id'        => 'textarea_2',
      'type'      => 'textarea',
      'title'     => 'Textarea',
      'info'      => 'Some information here for this option field.',
      'shortcode' => true,
    ),

  ), // end: fields
);
// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_plug_section',
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
  'name'     => 'license_plug_section',
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
