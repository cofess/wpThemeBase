              <div class="item p-1x mb-2x b b-light clearfix">
                <h3 class="fs-xs text-nowrap-2x mheight-ss"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="text-break">▪ <?php the_title(); ?></a></h3>
                <p class="text-muted"> 
                  <span class="meta-date"><i class="fa fa-calendar-check-o fa-fw"></i> <?php the_time('Y-m-d'); ?> </span>
                  <span class="meta-comment mh-1x"><i class="fa fa-comment-o fa-fw"></i> <?php comments_popup_link('No comment', '1 comment', '% comments'); ?> </span> 
                  <span class="meta-view"><i class="fa fa-eye fa-fw"></i> <?php post_views(' ', ''); ?> </span>
                </p>
              </div>          