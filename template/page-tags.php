<?php
/**
 * Template Name: 标签归档
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
              <!-- entity-body -->
              <div class="entity-body lh">
                <div class="post-tags tags tagcloud">
                  <h3 class="page-header"><i class="fa fa-tags fa-fw"></i>Post Tags</h3>
                  <?php wp_tag_cloud('smallest=12&largest=18&unit=px&number=0&orderby=count&order=DESC');?>
                  <div class="clear"></div>
                </div>
                <div class="product-tags tags tagcloud">
                  <h3 class="page-header"><i class="fa fa-tags fa-fw"></i>Product Tags</h3>
                  <?php $args = array(
                    'smallest'                  => 12, 
                    'largest'                   => 18,
                    'unit'                      => 'pt', 
                    'number'                    => 45,  
                    'format'                    => 'flat',
                    'separator'                 => "\n",
                    'orderby'                   => 'name', 
                    'order'                     => 'ASC',
                    'exclude'                   => null, 
                    'include'                   => null, 
                    'topic_count_text_callback' => default_topic_count_text,
                    'link'                      => 'view', 
                    'taxonomy'                  => 'product_tag', 
                    'echo'                      => true,
                  ); ?>
                  <?php wp_tag_cloud( $args ); ?>
                  <div class="clear"></div>
                </div>
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