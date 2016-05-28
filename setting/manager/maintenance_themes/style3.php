<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php echo cs_get_manager_option('maintenance_page_title');?>
<?php wp_title( '', true, '' ); ?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta http-equiv="Cache-Control" content="no-transform"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<!-- Bootstrap -->
<link href="<?php bloginfo('template_url');?>/lib/bootstrap/css/bootstrap.css" rel="stylesheet">
<?php do_action('mm_header'); ?>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="<?php bloginfo('template_url');?>/lib/js/html5shiv.min.js"></script>
	<script src="<?php bloginfo('template_url');?>/lib/js/respond.min.js"></script>
<![endif]-->
</head>
<body class="bg-grey">
<div class="container-fluid bg-black parallax text-center top">
  <div class="result">
    <?php if(cs_get_manager_option('maintenance_logo')){
    echo '<div class="logo-circle" data-toggle="tooltip" data-placement="top" title="70%"> <span><img src="'.cs_get_manager_option('maintenance_logo').'" alt="'.get_bloginfo('name').'"/></span> </div>';
  }?>
    <div class="example-container" id="example-circle-container"></div>
  </div>
</div>
<div class="container-fluid">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3">
      <?php if(cs_get_manager_option('maintenance_subject')){
      	echo '<h1 class="subject">'.cs_get_manager_option('maintenance_subject').'</h1>';
      }
	  if(cs_get_manager_option('maintenance_content')){
      	echo '<p class="content">'.cs_get_manager_option('maintenance_content').'</p>';
      }?>
    </div>
  </div>
  <div class="row"> 
    <!-- ******* CountDown timer / Sidebar ***************************** -->
    <?php if(cs_get_manager_option('maintenance_completeDate')){
    echo '<div class="col-sm-12 counter">
      <ul class="countdown-timer list-inline text-center" data-countdown="'.cs_get_manager_option('maintenance_completeDate').'">
      </ul>
    </div>';
	}?>
    <!-- ****** END CountDown timer / Sidebar **************** --> 
  </div>
</div>
<div class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="row top-buffer">
          <div class="col-md-12 text-center">
            <?php
			  if(cs_get_manager_option('enable_maintenance_social')){
				foreach (cs_get_manager_option('maintenance_social') as $key=>$val) {
					/*$style='style="';
					if($val['maintenance_social_color']) $style.='color:'.$val['maintenance_social_color'].'!important;';
					if($val['maintenance_social_border_color']) $style.='border-color:'.$val['maintenance_social_border_color'].'!important;';
					$style.='"';*/
    				echo '<a class="btn btn-social '.$val['maintenance_social_class'].'" href="'.$val['maintenance_social_url'].'" title="'.$val['maintenance_social_title'].'" target="_blank" '.$style.'><i class="'.$val['maintenance_social_icon'].'"></i></a>';
				}
				unset($val); // 最后取消掉引用
			  }
			 ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if(cs_get_manager_option('maintenance_footer')){
	echo '<p class="copyright text-center">'.cs_get_manager_option('maintenance_footer').'</p>';
  }else{
	echo '<p class="copyright text-center">Copyright © '.date('Y').' <a href="'.get_bloginfo('url').'" title="'.get_bloginfo('name').'">'.get_bloginfo('name').'</a> 版权所有</p>';
  }?>
</div>
<?php do_action('mm_footer'); ?>
<script src="<?php bloginfo('template_url');?>/lib/bootstrap/js/bootstrap.min.js"></script> 
<script>
(function($){
	// initialize countdown script
	$('[data-countdown]').each(function() {
		var $this = $(this), finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function(event) {
			$(this).html(event.strftime(
				'<li><span class="digit">%D</span><span class="time">Days</span></li>'
	       		+ '<li><span class="digit">%H</span><span class="time">Hours</span></li>'
	       		+ '<li><span class="digit">%M</span><span class="time">Min</span></li>'
	       		+ '<li><span class="digit">%S</span><span class="time">Sec</span></li>'
			));
		});
	});
	//ProgressBar init
	var circle = new ProgressBar.Circle('#example-circle-container', {
		color: '<?php echo cs_get_manager_option('maintenance_process_color');?>',
		strokeWidth: 2,
		fill: '#fff'
	});
	circle.animate(0.7);
	//tooltip
	$('[data-toggle="tooltip"]').tooltip().show();	
})(jQuery);
</script>
</body>
</html>
