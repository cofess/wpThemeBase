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
  <section class="page-head pinned bg bb b-light lh-md hidden-xs hidden-sm">
    <div class="container-fluid">
    <div class="navbar-header">
      <?php if ( function_exists( 'bread_crumb' ) ) bread_crumb(); ?>    
    </div>
  </div>
  </section>
  <section class="page-content">   
    <div class="container-fluid">
      <div class="row relative">
        <!-- content -->
        <div class="col-md-12 col-lg-8 col-xl-9 pv-4x">
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <?php get_template_part( "content/item-search" ) ?>
            <?php endwhile;?>
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