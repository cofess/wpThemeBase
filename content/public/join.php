<?php if(cs_get_option('company_adwords')){?>
  <section id="join" class="bg-main bg-inverse pattern pattern8 pv-4x">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-9 col-lg-7">
          <h3 class="fs mt-2x"><?php echo strip_tags(cs_get_option('company_adwords'));?></h3>
        </div>
        <div class="col-md-3 col-lg-5">
          <a class="btn bg-inverse b-white r-no mt-1x" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Agent Application' ) ) ); ?>" role="button">Join ASTA<i class="fa fa-arrow-circle-right ml-2x"></i></a>
        </div>
      </div>
    </div>   
  </section>
<?php }