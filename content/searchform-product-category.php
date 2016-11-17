<form role="search" method="get" class="woocommerce-product-search quick-search-form clearfix" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
    <div class="input-group input-group-lg">
       	<input type="hidden" name="post_type" value="product">
       	<input type="search" class="search-field form-control b-light" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" title="Search"> 
        <span class="input-group-btn">
            <button class="btn btn-default b-light r-no" type="submit"><i class="fa fa-search"></i></button>
        </span>
   	</div><!-- /input-group -->
</form>