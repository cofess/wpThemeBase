<?php 
/**
 * Template Name: 新闻资讯
 *
**/
get_header(); ?>
<!-- main -->
<main class="main bg" id="main" role="main">
  <section class="page-head mb-1x hidden-xs">
    <div class="pattern pattern5 mheight-md">
      <div class="container pv-4x text-center">
        <h3 class="mb-3x"><?php echo get_the_title();?></h3>
        <p><a class="btn btn-default b-no" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Archives' ) ) ); ?>" role="button">Archives<i class="fa fa-arrow-circle-right ml-4x"></i></a></p>
      </div>
    </div>
    <?php if($my_active_menu_title){?>
    <nav class="bread-navbar pinned bg-white bb b-light text-center">
      <?php
        wp_nav_menu(array(
          'menu' => 'main-menu',
          //'submenu' => 'about ', //Using parameter of Page Name
          'submenu' => ''.$my_active_menu_title.'', //Using parameter of Page Name
          'container'      => false,
          'menu_class'     => 'list-inline text-dark m-no'
        ));
      ?>
    </nav>
    <?php }?>
  </section>
  <section class="page-content pv-3x">
  <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array( 'post_type' => 'post','post_status'=> 'publish','paged' => $paged );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) : ?>
    <div class="container-fluid">
      <div class="row">
        <!-- item -->
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-2x">
          <?php get_template_part( "content/item-post" ) ?>
        </div>
        <?php endwhile;?>
        <!-- /item -->                                                                                     
      </div>
      <!-- /row -->
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
    </div>
    <?php else : ?>
      <?php get_template_part( "content/public/not-found" ) ?>
    <?php endif;wp_reset_query(); ?> 
  </section>
</main>
<?php get_footer(); ?>