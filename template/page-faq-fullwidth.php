<?php
/**
 * Template Name: 常见问题全屏
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
  <section class="page-content pv-4x">   
      <div class="container-fluid">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array( 'post_type' => 'faq','post_status'=> 'publish', 'posts_per_page' => 100,'paged' => $paged);
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) : 
        $i=1;
        $class="";
        $arrow="";
    ?>
        <div class="timeline timeline-xs-normal">
          <article class="timeline-item active hidden-xs">
            <div class="timeline-caption">
              <div class="panel b-no shadow-no">
                <div class="b b-light r-circle ring-hover"><img src="<?php bloginfo('template_url');?>/assets/images/asta-logo-square.png" class="thumb-md p-1x"></div>
              </div>
            </div>
          </article>
          <?php while ( $loop->have_posts() ) : $loop->the_post();
         if(($i%2)==1){
          $class="";
          $arrow="left";
        } else{
          $class="alt";
          $arrow="right";
        }
      ?>
          <article class="timeline-item <?php echo $class;?>">
            <div class="timeline-caption">
              <div class="panel b-light r-no ml-xs-no">
                <div class="panel-body"> <span class="arrow <?php echo $arrow;?> hidden-xs"></span> <span class="timeline-icon hidden-xs"><i class="fa fa-question-circle time-icon"></i></span>
                  <h3 class="fs-sm"><span class="color-main">Q: </span><?php the_title(); ?></h3>
                  <div class="media">
                    <div class="media-left"><span class="pull-left color-sub fs-sm pt">A:</span></div>
                    <div class="media-body"><?php the_content(); ?></div>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <?php $i++;endwhile;?>
          <div class="timeline-footer hidden-xs"><a><i class="fa fa-ellipsis-h time-icon bg-light text-muted"></i></a></div>
        </div>
        <?php else : ?>
        <?php get_template_part( "content/public/not-found" ) ?>
        <?php endif; wp_reset_query(); ?>
        <section id="comments">
          <?php if (comments_open()) comments_template( '', true ); ?>
        </section>
      </div>   
  </section>
</main>
<?php get_footer(); ?>