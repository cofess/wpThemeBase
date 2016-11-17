<?php 
/*
Description:指定分类的文章
Author: 晓旭
Author URI: http://www.iwebued.com/
*/
$theme_name='ASTA';
/*****************************
 * 指定分类调用文章
 ******************************/
class thisCategory extends WP_Widget {
    /** 构造函数 */
    function thisCategory() {
    	global $theme_name;
        parent::WP_Widget(false, $name = '指定分类('.$theme_name.')');	
    }

    /*输出工具内容*/
	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( '指定分类' ) : $instance['title'], $instance, $this->id_base );

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
//图片模式
?>
<?php if($instance['style'] == "img"){?>

<div class="sideMenu accordion-list">
  <?php
$query_posts = new WP_Query('caller_get_posts=1&showposts='.$instance['number'].'&cat='.$instance['cat']);
$i = 1; 
?>
  <?php while ($query_posts->have_posts()) : $query_posts->the_post(); ?>
  <!--标题-->
  <h3 <?php if($i==1) {?> class="on" <?php } ?>> <span class="date">
    <?php the_time('m-d') ?>
    </span><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
    <i class="fa fa-angle-double-right"></i><?php the_title(); ?>
    </a></h3>
  <div class="clearfix"> 
    <!--缩略图-->
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    <?php function_exists('wpjam_post_thumbnail')? wpjam_post_thumbnail(array(86,86),$crop=1):post_thumbnail(86,86)?>
    </a>
    <!--摘要-->
    <?php the_excerpt(); ?>
    <span class="readmore"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">去看看&gt;&gt;</a></span> </div>
  <?php $i++; ?>
  <?php endwhile; wp_reset_query();?>
</div>
<?php }elseif($instance['style'] == "text"){ ?>
<ul>
  <?php
$query_posts = new WP_Query('caller_get_posts=1&showposts='.$instance['number'].'&cat='.$instance['cat']);
?>
  <?php while ($query_posts->have_posts()) : $query_posts->the_post(); ?>
  <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    <?php the_title(); ?>
    </a></li>
  <?php endwhile; ?>
</ul>
<?php } 
		echo $after_widget;
	}
    /** 选项保存过程 */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** 在管理界面输出选项表单 */
    function form($instance) {		
	    $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 8;
		$style = isset($instance['style']) ? esc_attr($instance['style']) : '';
		$cat = esc_attr($instance['cat']);
        ?>
<strong>说明</strong>
<p>调用指定分类下的文章，两种展示方式</p>
<ol>
  <li>文字模式，以UL列表的方式展示</li>
  <li>图文模式，以手风琴的方式展示，需要引入superslide(js)</li>
</ol>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">标题：
    <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('number'); ?>">数量：</label>
  <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text"  value="<?php echo $number; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('cat'); ?>">分类ID：</label>
  <input id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="text"  value="<?php echo $cat; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('style'); ?>">样式：</label>
  <select for="<?php echo $this->get_field_id('style'); ?>" id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" >
    <option value="img" <?php if($style == "img"){ echo("selected='selected'"); } ?>>图文</option>
    <option value="text" <?php if($style == "text"){ echo("selected='selected'"); } ?>>文字</option>
  </select>
</p>
<?php 
    }

} 
add_action('widgets_init', create_function('', 'return register_widget("thisCategory");'));


