<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<!-- main -->
<main class="main" id="content" role="main">
  <div class="page-content">
    <div class="container">
      <div class="row prelative">
        <div class="col-md-12 col-lg-3 sidebarbg br b-light hidden-xs hidden-sm hidden-md"></div>
        <?php get_sidebar(); ?>
        <div class="col-md-12 col-lg-9">
          <div class="p-md"> 
            <!--entity-->
            <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
            <section id="detail">
              <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entity-content">
                  <?php the_content(); ?>
                  <p class="meta-tags text-muted mv-lg">
                    <?php the_tags('<i class="fa fa-tags"></i> Tags：', ', ', ''); ?>
                  </p>
                </div>
              </article>
            </section>
            <?php endwhile;endif; ?>
            <!--/entity-->
            <section id="comments">
              <?php if (comments_open()) comments_template( '', true ); ?>
            </section>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</main>
<!-- /main -->
<?php get_footer(); ?>
