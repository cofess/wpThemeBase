<!-- footer -->
<footer class="footer bt b-light clearfix" id="footer" role="contentinfo">
  <div class="layout pv-3x bb b-light text-dark">
  	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-4 col-lg-3">
                <?php if(cs_get_option('company_patent_disclaimer')){
                    echo '<h3 class="text-uppercase">Patent Disclaimer</h3>
                        <p>'.cs_get_option('company_patent_disclaimer').'</p>';
                }?>
                <img src="<?php echo get_template_directory_uri()?>/assets/images/certification.png" class="img-responsive">
            </div>
            
            <div class="col-md-5 col-lg-5 hidden-xs">
            	<h3 class="text-uppercase">Products</h3>
                <?php
                wp_nav_menu(array(
                    'menu'       => 'main-menu',
                    'submenu'    => 'Products', //Using parameter of Page Name
                    'container'  => false,
                    'menu_class' => 'nav-product list-inline list-fixwidth lh',
                ));?>
            </div>
            <div class="col-lg-2 hidden-xs hidden-sm hidden-md">
            	<h3 class="text-uppercase">About us</h3>
                <?php
                wp_nav_menu(array(
                    'menu'       => 'main-menu',
                    'submenu'    => 'about', //Using parameter of Page Name
                    'container'  => false,
                    'menu_class' => 'list-unstyled lh',
                ));?>
            </div>
            <div class="col-md-3 col-lg-2 hidden-xs hidden-sm">
            	<h3 class="text-uppercase">Contact us</h3>
              <ul class="list-unstyled lh">
                <?php if(cs_get_option('company_tel')){
                  echo '<li><i class="fa fa-phone-square fa-fw"></i> '.cs_get_option('company_tel').'</li>';
                } if(cs_get_option('company_email')){
                  echo '<li><a href="mailto:'.cs_get_option('company_email').'" class="color-black"><i class="fa fa-envelope fa-fw"></i> '.cs_get_option('company_email').'</a></li>';
                }?> 
              </ul>
              <form class="form-inline form-Subscribe mt-2x">
                <div class="form-group pull-right">
                  <!--<label class="control-label text-uppercase">Newsletter</label>-->
                  <!--<div class="input-group">
                    <input type="email" class="form-control r-no" id="exampleInputAmount" placeholder="Amount">
                    <span class="input-group-btn">
                      <button class="btn r-no" type="submit">Subscribe</button>
                    </span>
                  </div>-->
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>
	<div class="copyright pv-1x">
    	<div class="container-fluid">
      		<div class="row">
        		<div class="col-sm-4 col-md-5">
              <?php get_template_part( "content/footer-social" ) ?>
        		</div>
        		<div class="col-sm-8 col-md-7 text-right text-dark hidden-xs">
              <?php if ( has_nav_menu( 'sub-menu' ) ) {
                wp_nav_menu( array( 
                  'container'      => false,
                  'theme_location' => 'sub-menu',
                  'items_wrap'     => '<ul id="sub-menu" class="list-inline">%3$s</ul>',
                  'menu_class'     => 'list-inline',   
                  'show_home'      => true    ,
                  'fallback_cb'    => 'wp_page_menu',//备用的导航菜单函数，用于没有在后台设置导航时调用                   
                ) );
              }?>
              <?php if(cs_get_option('footer_copyright')){
                echo '<p>'.str_replace("{year}",date('Y',time()),cs_get_option('footer_copyright')).'</p>';
              }else{
                echo '<p>© '.date('Y',time()).'.<a href='.get_bloginfo('url').' title='.get_bloginfo('name').'-'.get_bloginfo('description').'>'.get_bloginfo('name').'</a> All rights reserved.</p>';  
              }?>  
        		</div>
      		</div>
    	</div>
  	</div>
</footer>
<?php get_template_part( "content/public/toolbar" ) ?>
<?php wp_footer(); ?>
<?php echo cs_get_option('onlineService_ec_js');?>
<?php echo cs_get_option('custom_footer');?>
<script defer type="text/javascript" src="<?php bloginfo('template_url');?>/assets/js/translate/translate.min.js"></script>
</body>
</html>