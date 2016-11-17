<?php

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