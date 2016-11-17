<?php
/**
 * Template Name: 相册
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
    <div class="bg pattern pattern11 mheight-md">
      <div class="container pv-5x text-center">
        <h3 class="mb-3x"><?php echo get_the_title();?></h3>
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
    </div>
    <?php else : ?>
      <?php get_template_part( "content/public/not-found" ) ?>
    <?php endif;wp_reset_query(); ?>  
  </section>
</main>
<?php get_footer(); ?>