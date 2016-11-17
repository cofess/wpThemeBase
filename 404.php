<?php get_header();?>
<!-- main -->
<main class="main" id="main" role="main">
<section class="page-content">
  <div class="container pv-5x">
    <div class="row text-center">
      <i class="fa fa-frown-o fa-5x"></i>
      <h1 class="mb-5x fa-3x">oops! Page Not Found!</h1>
      <div class="work-content">
        <h3 class="heading-work">This is somewhat embarrassing, isn’t it?</h3>
        <p>It looks like nothing was found at this location. Maybe try to start over?</p>
        <div class="links-404 mv-2x">
          <a href="javascript:history.go(-1);" class="btn bg-sub bg-inverse b-no"><i class="fa fa-arrow-circle-left mr-4x"></i>Go Back </a> 
          <span>or</span> 
          <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" class="btn bg-main bg-inverse b-no"> Go Home <i class="fa fa-arrow-circle-right ml-4x"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <?php get_template_part( "templates/public/all-searchform" ) ?>
      </div>
    </div>
  </div>
</section>
</main>
<!-- /main --> 
<?php get_footer();?>