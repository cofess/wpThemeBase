<?php
/**
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
  <section class="page-content">   
    <div class="container-fluid">
      <div class="row relative">
        <!-- content -->
        <div class="col-md-12 col-lg-8 col-xl-9 pv-3x">
          <div id="content">
            <!-- article -->
            <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
            <article class="entity">
              <!-- entity-header -->
              <div class="entity-header">
                <h2 class="page-header fs-sm mheight-ss mt-2x"><?php the_title(); ?></h2>
              </div>
              <!-- /entity-header -->
              <!-- entity-body -->
              <div class="entity-body mv-4x lh">
                <?php the_content(); ?>
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
