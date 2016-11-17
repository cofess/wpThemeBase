<?php
/**
 * Template Name: 全宽页面
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
        <!-- content -->
          <div id="content">
            <!-- article -->
            <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
            <article class="entity">
              <!-- entity-header -->
              <!--<div class="entity-header">
                <h1 class="fs-sm mheight-ss"><?php the_title(); ?></h1>
              </div>-->
              <!-- /entity-header -->
              <!-- entity-body -->
              <div class="entity-body mv-4x lh">
                <?php the_content(); ?>
                <p class="meta-tags text-muted mv-2x">
                  <?php the_tags('<i class="fa fa-tags"></i> Tags：', ', ', ''); ?>
                </p>
              </div>
              <!-- /entity-body -->
            </article>
            <?php endwhile; endif; ?>
            <!-- /article -->
          </div>
          <!--<div class="social-share" data-sites="facebook,twitter,google,linkedin"></div>-->
          <div id="comments">
            <?php if (comments_open()) comments_template( '', true ); ?>
          </div>
        <!-- /content -->                                                                              
      <!-- /row -->
    </div>   
  </section>
</main>
<?php get_footer(); ?>
