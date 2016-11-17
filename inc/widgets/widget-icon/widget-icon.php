<?php
/*
Plugin Name: Widget Icon
Description: Enhance your website with 640+ icons designed for Twitter Bootstrap. Just select an icon and display it in any widget on your WordPress site.
Version: 1.1.3
Author: dFactory
Author URI: http://www.dfactory.eu/
Plugin URI: http://www.dfactory.eu/plugins/widget-icon/
License: MIT License
License URI: http://opensource.org/licenses/MIT
*/


class Widget_Icon
{
	private $defaults = array(
		//'library' => 'font-awesome',
		'icon' => 'none',
		'icon_size' => 'standard',
		'place' => 'left',
		'padding_type' => 'pixel',
		'padding' => 10,
		'color_type' => 'inherit',
		'color' => '#000',
		'vertical_align' => 'inherit'
	);
	private $aligns = array('inherit', 'baseline', 'bottom', 'middle', 'sub', 'super', 'text-bottom', 'text-top', 'top');
	private $icon_sizes = array('standard', 'fa-lg', 'fa-2x', 'fa-3x', 'fa-4x', 'fa-5x');
	private $paddings = array('pixel', 'percent');
	private $color_types = array('inherit', 'custom');
	private $places = array('left', 'right', 'before-widget', 'after-widget', 'before-title', 'after-title');
	private $libraries = array('font-awesome');


	public function __construct()
	{
		//actions
		add_action('in_widget_form', array(&$this, 'display_admin_widget_box_options'), 10, 3);
		add_action('admin_enqueue_scripts', array(&$this, 'admin_widgets_scripts_styles'));
		//add_action('wp_enqueue_scripts', array(&$this, 'front_widgets_scripts_styles'));

		//filters
		add_filter('widget_display_callback', array(&$this, 'display_frontend_widgets'), 10, 3);
		add_filter('widget_update_callback', array(&$this, 'update_admin_widgets_options'), 10, 3);
		add_filter('plugin_action_links', array(&$this, 'plugin_settings_link'), 10, 2);
	}

	/**
	 * Add links to Widgets page
	*/
	function plugin_settings_link($links, $file) 
	{
		if(!is_admin() || !current_user_can('edit_theme_options'))
			return $links;

		static $plugin;

		$plugin = plugin_basename(__FILE__);

		if ($file == $plugin) 
		{
			$settings_link = sprintf('<a href="%s">%s</a>', admin_url('widgets.php'), __('小工具', 'widget-icon'));
			array_unshift($links, $settings_link);
		}

		return $links;
	}


	/**
	 * Loads admin-side scripts and styles
	*/
	public function admin_widgets_scripts_styles($page)
	{
		if($page !== 'widgets.php')
        	return;

		wp_enqueue_script('widget-icon', get_template_directory_uri().'/inc/widgets/widget-icon/js/widget-icon.js', array('wp-color-picker'));

		wp_enqueue_style('wp-color-picker');
	}


	/**
	 * Loads front-side scripts and styles
	*/
	/*public function front_widgets_scripts_styles($page)
	{
		global $wp_styles, $wp_scripts;
		//本主题将font-awesome和bootstrap3整合了所以无需加载font-awesome.min.css
		//wp_enqueue_style('font-awesome-style',get_template_directory_uri().'/inc/widgets/widget-icon/assets/font-awesome/css/font-awesome.min.css');
	}*/


	/**
	 * Displays widget box
	*/
	public function display_admin_widget_box_options($widget, $empty, $instance)
	{
		$icon = (isset($instance['wi_opt']['widget_icon']) ? $instance['wi_opt']['widget_icon'] : $this->defaults['icon']);
		//$library = (isset($instance['wi_opt']['widget_library']) ? $instance['wi_opt']['widget_library'] : $this->defaults['library']);
		$place = (isset($instance['wi_opt']['widget_place']) ? $instance['wi_opt']['widget_place'] : $this->defaults['place']);
		$padding_type = (isset($instance['wi_opt']['widget_padding_type']) ? $instance['wi_opt']['widget_padding_type'] : $this->defaults['padding_type']);
		$padding = (isset($instance['wi_opt']['widget_padding']) ? $instance['wi_opt']['widget_padding'] : $this->defaults['padding']);
		$color_type = (isset($instance['wi_opt']['widget_color_type']) ? $instance['wi_opt']['widget_color_type'] : $this->defaults['color_type']);
		$color = (isset($instance['wi_opt']['widget_color']) ? $instance['wi_opt']['widget_color'] : $this->defaults['color']);
		$icon_size = (isset($instance['wi_opt']['widget_icon_size']) ? $instance['wi_opt']['widget_icon_size'] : $this->defaults['icon_size']);
		$vertical_align = (isset($instance['wi_opt']['widget_vertical_align']) ? $instance['wi_opt']['widget_vertical_align'] : $this->defaults['vertical_align']);

		$widget_color_type = $widget->get_field_name('widget_color_type');
		$widget_color_type_str = str_replace(array('][', ']', '['), '-', $widget_color_type);
		$widget_padding_type = $widget->get_field_name('widget_padding_type');
		$widget_padding_type_str = str_replace(array('][', ']', '['), '-', $widget_padding_type);
		//$widget_library = $widget->get_field_name('widget_library');
		//$widget_library_str = str_replace(array('][', ']', '['), '-', $widget_library);

		echo '
		<div class="widget-icon">
		    <hr>
			<p class="label">'.__('小工具图标(Font Awesome)', 'widget-icon').'</p>
			<input class="widefat" type="text" name="'.$widget->get_field_name('widget_icon').'" value="'.$icon.'" placeholder="请输入图标类名"/>
			<p class="label">'.__('选择图标的位置', 'widget-icon').'</p>
			<select name="'.$widget->get_field_name('widget_place').'" class="widget-icon-place widefat">
				<option value="left" '.selected($place, 'left', FALSE).'>'.__('小工具标题左侧', 'widget-icon').'</option>
				<option value="right" '.selected($place, 'right', FALSE).'>'.__('小工具标题右侧', 'widget-icon').'</option>
				<option value="after-widget" '.selected($place, 'after-widget', FALSE).'>'.__('小工具之后', 'widget-icon').'</option>
				<option value="before-widget" '.selected($place, 'before-widget', FALSE).'>'.__('小工具之前', 'widget-icon').'</option>
				<option value="after-title" '.selected($place, 'after-title', FALSE).'>'.__('标题之后', 'widget-icon').'</option>
				<option value="before-title" '.selected($place, 'before-title', FALSE).'>'.__('标题之前', 'widget-icon').'</option>
			</select>
			<p class="label">'.__('图标内边距', 'widget-icon').'</p>
			<input type="text" name="'.$widget->get_field_name('widget_padding').'" value="'.$padding.'" size="4" />
			<input id="'.$widget_padding_type_str.'_pixel" type="radio" name="'.$widget_padding_type.'" value="pixel" '.checked($padding_type, 'pixel', FALSE).' /> <label for="'.$widget_padding_type_str.'_pixel">'.__('px', 'widget-icon').'</label>
			<input id="'.$widget_padding_type_str.'_percent" type="radio" name="'.$widget_padding_type.'" value="percent" '.checked($padding_type, 'percent', FALSE).' /> <label for="'.$widget_padding_type_str.'_percent">'.__('%', 'widget-icon').'</label>
			<p class="label">'.__('垂直对齐', 'widget-icon').'</p>
			<select class="widefat" name="'.$widget->get_field_name('widget_vertical_align').'">';

		foreach($this->aligns as $align)
		{
			echo '
				<option value="'.$align.'" '.selected($vertical_align, $align, FALSE).'>'.$align.'</option>';
		}

		echo '
			</select>
			<p class="label">'.__('图标大小', 'widget-icon').'</p>
			<select class="widefat" name="'.$widget->get_field_name('widget_icon_size').'">';

		foreach($this->icon_sizes as $size)
		{
			echo '
				<option value="'.$size.'" '.selected($icon_size, $size, FALSE).'>'.__($size, 'widget-icon').'</option>';
		}

		echo '
			</select>
			<p class="label">'.__('图标颜色', 'widget-icon').'</p>
			<input class="wi_ct_inheir" id="'.$widget_color_type_str.'_inherit" type="radio" name="'.$widget_color_type.'" value="inherit" '.checked($color_type, 'inherit', FALSE).' /> <label for="'.$widget_color_type_str.'_inherit">'.__('继承', 'widget-icon').'</label>
			<input class="wi_ct_custom" id="'.$widget_color_type_str.'_custom" type="radio" name="'.$widget_color_type.'" value="custom" '.checked($color_type, 'custom', FALSE).' /> <label for="'.$widget_color_type_str.'_custom">'.__('自定义', 'widget-icon').'</label>
			<div id="'.$widget_color_type_str.'_div"'.($color_type === 'inherit' ? ' style="display: none;"' : '').'><input type="text" value="'.$color.'" class="widget-icon-color-picker" name="'.$widget->get_field_name('widget_color').'" data-default-color="'.$color.'" /></div>
		</div>';
	}


	/**
	 * Saves widget box
	*/
	public function update_admin_widgets_options($instance, $new_instance)
	{
		//nothing set?
		if(!isset($new_instance['widget_icon'], $new_instance['widget_place'], $new_instance['widget_padding'], $new_instance['widget_padding_type'], $new_instance['widget_icon_size'], $new_instance['widget_vertical_align'], $new_instance['widget_color_type'], $new_instance['widget_color']))
			unset($instance['wi_opt']);
		else
		{
			//icon
			if(isset($new_instance['widget_icon']))
				$instance['wi_opt']['widget_icon'] = $new_instance['widget_icon'];
			else
				$instance['wi_opt']['widget_icon'] = $this->defaults['icon'];

			//place
			if(isset($new_instance['widget_place']) && in_array($new_instance['widget_place'], $this->places))
				$instance['wi_opt']['widget_place'] = $new_instance['widget_place'];
			else
				$instance['wi_opt']['widget_place'] = $this->defaults['place'];

			//padding
			if(isset($new_instance['widget_padding']))
				$instance['wi_opt']['widget_padding'] = (int)$new_instance['widget_padding'];
			else
				$instance['wi_opt']['widget_padding'] = $this->defaults['padding'];

			//padding type
			if(isset($new_instance['widget_padding_type']) && in_array($new_instance['widget_padding_type'], $this->paddings))
				$instance['wi_opt']['widget_padding_type'] = $new_instance['widget_padding_type'];
			else
				$instance['wi_opt']['widget_padding_type'] = $this->defaults['padding_type'];

			//icon size
			if(isset($new_instance['widget_icon_size']) && in_array($new_instance['widget_icon_size'], $this->icon_sizes))
				$instance['wi_opt']['widget_icon_size'] = $new_instance['widget_icon_size'];
			else
				$instance['wi_opt']['widget_icon_size'] = $this->defaults['icon_size'];

			//vertical align
			if(isset($new_instance['widget_vertical_align']) && in_array($new_instance['widget_vertical_align'], $this->aligns))
				$instance['wi_opt']['widget_vertical_align'] = $new_instance['widget_vertical_align'];
			else
				$instance['wi_opt']['widget_vertical_align'] = $this->defaults['vertical_align'];

			//color type
			if(isset($new_instance['widget_color_type']) && in_array($new_instance['widget_color_type'], $this->color_types))
			{
				if(($instance['wi_opt']['widget_color_type'] = $new_instance['widget_color_type']) === 'custom')
				{
					//color
					if(isset($new_instance['widget_color']))
					{
						if(preg_match('/^#[a-f0-9]{6}$/', $new_instance['widget_color']) === 1)
							$instance['wi_opt']['widget_color'] = $new_instance['widget_color'];
					}
					else $instance['wi_opt']['widget_color'] = $this->defaults['color'];
				}
			}
			else $instance['wi_opt']['widget_color_type'] = $this->defaults['color_type'];
		}

		return $instance;
	}


	/**
	 * Manages front-end display of widgets
	*/
	public function display_frontend_widgets($instance, $widget_class, $args)
	{
		if(isset($instance['wi_opt']['widget_icon']) && $instance['wi_opt']['widget_icon'] !== 'none')
		{
			$color = ($instance['wi_opt']['widget_color_type'] === 'inherit' ? '' : 'color: '.$instance['wi_opt']['widget_color'].';');

			$padding = ($instance['wi_opt']['widget_padding'] !== 0 ? ($instance['wi_opt']['widget_place'] === 'right' ? 'padding-left: ' : 'padding-right: ').$instance['wi_opt']['widget_padding'].($instance['wi_opt']['widget_padding_type'] === 'percent' ? '%' : 'px').';' : '');

			$vertical_align = ' vertical-align: '.$instance['wi_opt']['widget_vertical_align'].';';

			//$library = (isset($instance['wi_opt']['widget_library']) ? ($instance['wi_opt']['widget_library'] === 'font-awesome' ? 'font-awesome' : 'elusive') : 'elusive');

			$icon = ($instance['wi_opt']['widget_icon'] !== 'none' ? '<i style="'.$color.$padding.$vertical_align.'" class="'.$instance['wi_opt']['widget_icon'].($instance['wi_opt']['widget_icon_size'] !== 'standard' ? ' '.$instance['wi_opt']['widget_icon_size'] : '').'"></i>' : '');

			switch($instance['wi_opt']['widget_place'])
			{
				case 'left':
					$args['before_title'] = $args['before_title'].$icon;
					break;

				case 'right':
					$args['after_title'] = $icon.$args['after_title'];
					break;

				case 'before-widget':
					$args['before_widget'] = $icon.$args['before_widget'];
					break;

				case 'after-widget':
					$args['after_widget'] = $args['after_widget'].$icon;
					break;

				case 'before-title':
					$args['before_title'] = $icon.$args['before_title'];
					break;

				case 'after-title':
					$args['after_title'] = $args['after_title'].$icon;
					break;
			}

			$widget_class->widget($args, $instance);

			return FALSE;
		}

		else return $instance;
	}
}


$widget_icon = new Widget_Icon();
?>