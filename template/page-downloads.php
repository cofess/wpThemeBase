<?php
/**
 * Template Name: 资料下载
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
<main class="main bg" id="main" role="main">
  <section class="page-head relative hidden-xs">
    <div class="bg pattern pattern10 mheight-md">
      <div class="container pv-5x text-center">
        <h3 class="mb-3x"><?php echo get_the_title();?></h3>
        <p><a class="btn btn-default b-no" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Supports' ) ) ); ?>" role="button">Supports<i class="fa fa-arrow-circle-right ml-4x"></i></a></p>
      </div>
    </div>
  </section>
  <section class="page-content pv-3x">
    <?php if ( have_posts() ) :  ?>
    <div class="container-fluid">
      <div class="row">
        <!-- item -->
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile;?>
        <!-- /item -->                                                                                     
      </div>
      <!-- /row -->
      <!--<nav class="text-xs-center text-sm-center">
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
      </nav>-->
    </div>
    <?php else : ?>
      <?php get_template_part( "content/public/not-found" ) ?>
    <?php endif;wp_reset_query(); ?>  
  </section>
</main>
<?php get_footer(); ?>