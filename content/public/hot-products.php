            <div class="swiper-container dot-static slide51">
              <div class="swiper-wrapper">
              <?php $args = array( 'post_type' => 'product','post_status'=> 'publish', 'stock' => 1, 'showposts' => 10,'meta_key'=>'_featured','meta_value' => 'yes','orderby' =>'date','order' => 'desc' );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();?>
                <div class="swiper-slide">
                  <!-- entity -->
                  <?php get_template_part( "content/item-product" ) ?>
                  <!-- /entity -->
                </div>
                <?php endwhile; wp_reset_query(); ?>
              </div>
              <!-- Add Pagination -->
              <div class="swiper-pagination slide51-pagination swiper-pagination-black"></div>
            </div>