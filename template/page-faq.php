<?php
/**
 * Template Name: 常见问题
 *
 * @package   Yiwell
 * @version   1.0.0
 * @author    Lony <841995980@qq.com>
 * @copyright Copyright (c) 2014-2016, yiwell
 * @license   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link      http://www.yiwell.com
**/

get_header(); ?>
<!-- main -->
<main class="main" id="main" role="main">
  <section class="page-head pinned bg bb b-light lh-md hidden-xs hidden-sm">
    <div class="container-fluid">
    <div class="navbar-header">
      <?php if ( function_exists( 'bread_crumb' ) ) bread_crumb(); ?>    
    </div>
    <ul class="nav navbar-nav navbar-right">
       <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>  
    </ul>
  </div>
  </section>
  <section class="page-content">   
    <div class="container-fluid">
      <div class="row relative">
        <!-- content -->
        <div class="col-md-12 col-lg-8 col-xl-9 pv-3x">
          <div id="content">
          <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array( 'post_type' => 'faq','post_status'=> 'publish', 'posts_per_page' => 10,'paged' => $paged);
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) : ?>
            <div class="panel-group panel-accordion" id="accordion" role="tablist" aria-multiselectable="true">
              <?php while ( $loop->have_posts() ) : $loop->the_post();?>
              <div class="panel panel-default r-no mt-2x no-shadow">
                <div class="panel-heading bg-no prelative" role="tab" id="heading<?php the_ID(); ?>">
                  <h4 class="panel-title"> <a title="<?php the_title(); ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php the_ID(); ?>" aria-expanded="false" aria-controls="collapse<?php the_ID(); ?>" class="collapsed text-nowrap"> <span class="color-orange-800">Q：</span>
                    <?php the_title(); ?>
                    <i class="fa fa-plus text-active control-icon pull-right"></i><i class="fa fa-minus text control-icon pull-right"></i> </a> </h4>
                </div>
                <div id="collapse<?php the_ID(); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php the_ID(); ?>">
                  <div class="panel-body"><span class="pull-left color-green-500">A：</span>
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>
              <?php endwhile;?>
            </div>
            <nav class="text-xs-center text-sm-center">
        <?php if(function_exists('bootstrap_pagination')) { bootstrap_pagination($loop->max_num_pages); } ?>
        <form class="form-inline navbar-right mr-no mv-2x hidden-xs hidden-sm" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="get">
          <div class="form-group"> 
            <label for="pageNumber">Total <?php echo $loop->max_num_pages;?> pages，Go to</label>
            <div class="input-group"> 
              <input class="form-control r-no" type="text" placeholder="Jump to" size="6" name="paged"> 
              <span class="input-group-btn"> 
                <input class="btn btn-default r-no" value="Go" type="submit"> 
              </span>
            </div>
          </div>
        </form> 
      </nav>
            <?php else : ?>
            <?php get_template_part( "content/public/not-found" ) ?>
            <?php endif; wp_reset_query(); ?>
          </div>
          <div id="comments">
            <?php if (comments_open()) comments_template( '', true ); ?>
          </div>
        </div>
        <!-- /content -->
        <!-- side -->
        <?php get_sidebar(); ?>
       <!-- /side -->                                                                               
      </div>
      <!-- /row -->
    </div>   
  </section>
</main>
<?php get_footer(); ?>