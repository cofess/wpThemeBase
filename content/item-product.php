<div class="entity hover-up bg-white b b-light shadow-hover clearfix">
  <div class="entity-header">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php  echo my_woocommerce_get_product_thumbnail('shop_thumbnail'); ?></a>
  </div>
  <div class="entity-body ph-1x">
    <h3 class="fs-xs text-nowrap-1x"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="text-break"><?php the_title(); ?></a></h3>
    <div class="colored-line bg-black"></div>
    <div class="mheight-ss">
      <p class="text-nowrap-2x text-muted"><?php echo get_the_excerpt()?></p>
    </div>
    <p class="mb-2x"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" role="button">Learn More<i class="fa fa-arrow-circle-right ml-2x"></i></a></p>
  </div>
</div>