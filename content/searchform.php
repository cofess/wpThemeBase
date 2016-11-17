<form class="" id="searchform" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
    <div class="top-search-input-wrap">
        <input class="top-search-input" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search..." x-webkit-speech />
    </div>
	<input class="top-search-submit" type="submit" id="go" value="">
	<span class="top-icon-search fa fa-search"></span>
</form>