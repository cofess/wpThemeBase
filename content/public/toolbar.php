<?php if ( !wp_is_mobile() ) {?>
<nav id="wah-menu" class="wah-menu green hidden-xs hidden-sm hidden-md">
  <div class="social-share" data-sites="facebook,twitter,google,linkedin"></div>
  <ul class="wah-ul minimized">
    <?php 
    if(cs_get_option('enable_onlineService') && cs_get_option('onlineService')){ 
      foreach (cs_get_option('onlineService') as $key=>$val) { 
        if( $val['enable_onlineService_show']){?>
          <li class="wah-item min"> 
            <a href="javascript:;" class="nosub" title="click talk with <?php echo $val['onlineService_name'];?>" onclick="var url = 'http://cs.ecqun.com/cs/?id=<?php echo $val['onlineService_ec'];?>';var w = window.open(url,'ECCSTalk', 'height=480,width=705,status=no,toolbar=no,menubar=no,location=no');"> 
              <span class="icon"><img src="<?php echo $val['onlineService_thumb'];?>" class="img-circle thumb-ss img-rotate" alt="<?php echo $val['onlineService_name'];?>-photo"></span> 
              <span class="label"><?php echo $val['onlineService_name'];?></span> 
            </a> 
          </li>
    <?php }} } ?>
    <li class="wah-item"></li>
    <!--<li class="wah-item"> <a href="javascript:void(0);" class="hassub" title="World Time"> <span class="fa fa-clock-o icon"></span> <span class="label">Gallery</span> </a>
      <div class="sub">
      <div class="header clearfix">
        <div class="header-wrap">
         <a href="javascript:void(0);" class="title"><span>World Time</span><i class="menu-close fa fa-close fa-fw"></i></a>
         <p class="description">Some popular videos from Vimeo - Embed Videos.</p>
        </div>
        </div>
        <div class="sidebar-scroll">
          <ul class="scrollable-content">
            <li > <a href="#"> <img src="sample-img/l1.png" alt="Antivirus"> <span>Antivirus</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/l2.png" alt="Goodies"> <span>Goodies</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/l3.png" alt="Circles"> <span>Circles</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/l4.png" alt="Favorites"> <span>Favorites</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/l5.png" alt="Painter"> <span>Painter</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/l6.png" alt="Target"> <span>Target</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/l7.png" alt="Key"> <span>Key</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/l8.png" alt="Weight"> <span>Weight</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/l9.png" alt="Quicksign"> <span>Quicksign</span> </a> </li>
          </ul>
        </div>
      </div>
    </li>
    <li class="wah-item"> <a href="javascript:void(0);" class="hassub" title="Recently Viewed"> <span class="fa fa-star-o icon"></span> <span class="label">Matrix</span> </a>
      <div class="sub" > 
      	<div class="header clearfix">
        <div class="header-wrap">
         <a href="javascript:void(0);" class="title"><span>Recently Viewed</span><i class="menu-close fa fa-close fa-fw"></i></a>
         <p class="description">Some popular videos from Vimeo - Embed Videos.</p>
        </div>
        </div>
        <div class="sidebar-scroll">
          <ul class="scrollable-content">
            <li > <a href="#"> <img src="sample-img/date1.jpg" /> <span>Business Solutions</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/levels1.jpg"  /> <span>Custom Solutions</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/circ1.jpg"  /> <span>Custom Solutions</span> </a> </li>
            <li > <a href="#"> <img src="sample-img/int1.jpg"  /> <span>Custom Solutions</span> </a> </li>
          </ul>
        </div>
      </div>
    </li>-->
    <li class="toggle">
      <ul>
        <li class="wah-item"> <a href="<?php bloginfo('url'); ?>" class="nosub" title="ASTA Home Page"> <span class="fa fa-home icon"></span> <span class="label">Home</span> </a></li>
        <?php if (cs_get_option('enable_siteQrcode')==true && cs_get_option('siteQrcode')!='') {?>
        <li class="wah-item relative"> <a href="#none" class="nosub"><i class="fa fa-qrcode icon"></i></a>
          <div class="mp_qrcode text-center"><img src="<?php echo cs_get_option('siteQrcode');?>" width="148" height="148" alt="Website Qrcode"/>
          <samll class="text-muted"> Website Qrcode</samll></div>
        </li>
        <?php }?>
        <?php if (cs_get_option('enable_gotoTop')==true) {?>
        <li class="wah-item"> <a id="backto-top" href="#" class="nosub" title="Back To Top"> <span class="fa fa-angle-up icon"></span> <span class="label">Back To Top</span> </a> </li>
        <?php }?>
      </ul>
      <div class="extend hide"> <span class="fa fa-angle-left icon"></span> <span class="fa fa-angle-right icon open"></span> </div>
    </li>
  </ul>
</nav>
<?php }