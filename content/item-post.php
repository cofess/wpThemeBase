          <div class="entity img-burn bg-white b b-light shadow-hover clearfix">
            <?php  if(wpjam_has_post_thumbnail()){?>
            <div class="entity-header m-1x">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php wpjam_post_thumbnail(array(300,180),$crop=1,$class="w-full");?>
              </a>
            </div>
            <?php } ?>
            <div class="entity-body ph-1x">
              <h3 class="fs-xs text-nowrap-2x mheight-ss">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="text-break"><?php the_title(); ?></a>
              </h3>
              <div class="mheight-ss">
                <p class="text-nowrap-2x text-muted"><?php echo get_the_excerpt()?></p>
              </div>
              <p class="text-muted mb-2x clearfix"> 
                <span class="meta-date"><i class="fa fa-calendar-check-o fa-fw"></i> <?php the_time('Y-m-d'); ?> </span>
                <!--<span class="pull-left mh-1x"><i class="fa fa-comment-o fa-fw"></i> <?php comments_popup_link('0', '1', '%'); ?> </span>--> 
                <span class="mh-1x"><i class="fa fa-eye fa-fw"></i> <?php post_views(' ', ''); ?> </span>
                <span class="social-share share-noborder pull-right" data-sites="facebook,twitter,google,linkedin" data-title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-description="<?php echo get_the_excerpt()?>" data-image="<?php echo wpjam_get_post_thumbnail_uri($post->ID);?>"></span>
              </p> 
            </div>
          </div>