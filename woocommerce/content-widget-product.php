<?php global $product; ?>
<li class="list-unstyled mb-1x clearfix">
  <div class="media">
  <div class="media-left">
    <a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>" class="thumb-sm b b-light">
      <?php echo $product->get_image(); ?>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>" class="text-nowrap-1x"><?php echo $product->get_title(); ?></a></h4>
    <p class="text-nowrap-2x hidden-xs"><?php echo mb_substr(get_the_excerpt(),0,70,"utf8").'...'?></p>
  </div>
</div>
</li>
