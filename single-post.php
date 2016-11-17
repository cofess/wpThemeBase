<?php get_header(); ?>
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
                <h1 class="page-header fs-sm mheight-ss mt-2x"><?php the_title(); ?></h1>
                <p class="text-muted">
                  <span class="mr-1x"><i class="fa fa-folder-open fa-fw"></i>
                  <?php 
$cat = get_the_category();
foreach($cat as $key=>$category) 
{ 
    echo '<a href="'.get_category_link( $category->cat_ID ).'" title="'.$category->cat_name.'" class="mr-xs">'.$category->cat_name.'</a>'; 
} 
?>
                  </span>
                  <span class="mr-1x"><i class="fa fa-calendar-check-o fa-fw"></i><?php the_time('Y-m-d'); ?></span>
                  <span class="mr-1x"><i class="fa fa-eye fa-fw"></i><?php post_views(' ', ''); ?></span>
                  <span class="mr-1x"><i class="fa fa-comment-o fa-fw"></i><?php comments_popup_link('No comment', '1 comment', '% comments'); ?></span>
                  
                </p>
              </div>
              <!-- /entity-header -->
              <!-- entity-body -->
              <div class="entity-body mv-4x lh">
                <?php the_content(); ?>
                <p class="meta-tags text-muted mv-2x">
                  <?php the_tags('<i class="fa fa-tags"></i> Tags：', ', ', ''); ?>
                </p>
              </div>
              <!-- /entity-body -->
              <!-- entity-footer -->
              <div class="entity-footer">
                <nav>
                  <ul class="pager">
                  <?php $prev_post = get_previous_post();
                    if (!empty( $prev_post )): ?>
                    <li class="previous"><a href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo $prev_post->post_title; ?>"><span aria-hidden="true">&larr;</span> Previous</a></li>
                  <?php endif; ?>
                  <?php $next_post = get_next_post();
                    if (!empty( $next_post )): ?>
                    <li class="next"><a href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo $next_post->post_title; ?>">Next <span aria-hidden="true">&rarr;</span></a></li>
                    <?php endif; ?>
                  </ul>
                </nav>
              </div>
              <!-- entity-footer -->
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