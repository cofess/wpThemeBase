<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">  <![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="noIE" lang="en-US">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta http-equiv="Cache-Control" content="no-transform"/>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="author" content="cofess | www.yiwell.com" />
<?php echo cs_get_option('custom_meta');?>
<meta name="title" content="<?php wp_title();?>">
<?php wp_head();?>
<!-- fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_url');?>/assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_url');?>/assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_url');?>/assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url');?>/assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="<?php bloginfo('template_url');?>/assets/ico/favicon.png">
<?php echo cs_get_option('custom_header');?>
<?php echo cs_get_option('onlineService_ec_css');?>
<?php wp_print_scripts('jquery');?>
<!--<script type='text/javascript' src='http://libs.baidu.com/jquery/2.0.3/jquery.js'></script>-->
<!--<script type="text/javascript"> 
!window.jQuery && document.write('<script src="<?php bloginfo('template_url');?>/lib/base/js/jquery-1.9.1.min.js"><\/script>'); 
</script>-->
<!--<script type="text/javascript" src="<?php bloginfo('template_url');?>/lib/base/js/modernizr.js"></script>-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="<?php bloginfo('template_url');?>/lib/base/js/html5shiv.min.js"></script>
  <script src="<?php bloginfo('template_url');?>/lib/base/js/respond.min.js"></script>
<![endif]-->
</head>
<body <?php body_class(); ?>>
<!-- header -->
<header class="header" id="header" role="banner">
  <div class="block bg bb b-light hidden-xs">
    <div class="container-fluid">
      <div class="row">
      <div class="col-xs-8 col-sm-4 col-md-5">
        <?php get_template_part( "content/header-social" ) ?>
      </div>
      <div class="col-xs-4 col-sm-8 col-md-7">
        <ul class="list-inline m-no pv pull-right">
          <li class="hidden-xs"><div id="translate-this" class="pull-right hidden-sm"><a style="margin-top: 3px" class="translate-this-button" href="https://www.translatecompany.com/translate-this/" rel="nofollow"></a></div></li>
          <?php if(cs_get_option('company_tel')){
            echo '<li class="hidden-xs"><i class="fa fa-phone-square fa-fw"></i>'.cs_get_option('company_tel').'</li>';
          } if(cs_get_option('company_email')){
            echo '<li class="hidden-xs"><a href="mailto:'.cs_get_option('company_email').'" class="color-black"><i class="fa fa-envelope fa-fw"></i>'.cs_get_option('company_email').'</a></li>';
          }?>  
        </ul>
      </div>
      </div>
    </div>
  </div>
  <div class="block top-pinned bg-white bb b-main">
    <div class="container-fluid">
      <div class="row">
       <div class="col-xs-12 col-sm-2 col-md-2 col-lg-5 col-xl-4">
        <div class="media brand">
          <div class="media-left">
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
              <?php if(cs_get_option('company_tel')){
                echo '<img src="'.cs_get_option('custom_logo').'" class="logo" alt="'.get_bloginfo('name').'|'.get_bloginfo('description').' - Logo">';
              } else {
                echo '<img src="'.bloginfo('template_url').'/assets/images/asta-logo.png" class="logo" alt="'.get_bloginfo('name').'|'.get_bloginfo('description').' - Logo">';
              }?>
            </a>
          </div>
          <div class="media-body">
            <h1 class="media-heading slogan m-no pt-1x fs-xs lh hidden-xs hidden-sm hidden-md"><?php echo cs_get_option('company_adwords');?></h1> 
            <button type="button" class="navbar-toggle pull-right mr-no" data-toggle="collapse" data-target=".navbar-collapse"> 
              <span class="sr-only">Toggle navigation</span> 
              <span class="icon-bar bg-black"></span> 
              <span class="icon-bar bg-black"></span> 
              <span class="icon-bar bg-black"></span> 
            </button>  
          </div>
        </div>
       </div>
       <div class="col-xs-12 col-sm-10 col-md-10 col-lg-7 col-xl-8">
        <nav class="row collapse navbar-collapse primarybar-collapse simple-search-navbar">
          <div class="top-search pull-right" id="top-search">
            <?php get_template_part( "content/searchform" ) ?>
          </div>
          <?php if ( has_nav_menu( 'main-menu' ) ) {
            wp_nav_menu( array( 
              'container'      => false,
              'theme_location' => 'main-menu',
              'items_wrap'     => '<ul id="main-menu" class="%2$s">%3$s</ul>',
              'menu_class'     => 'nav navbar-nav main-nav navbar-right', 
              'show_home'      => true  ,
              //'before'         => '<i class="fa fa-angle-double-right fa-fw"></i>',//显示在导航a标签之前
              //'link_before'     => '▪ ',//显示在导航链接名之后
              'fallback_cb'    => 'wp_page_menu',//备用的导航菜单函数，用于没有在后台设置导航时调用
              'walker'         => new Bootstrap_Walker()          
            ) );
          }?>
        </nav>
       </div>
      </div>
    </div>
  </div>
</header>