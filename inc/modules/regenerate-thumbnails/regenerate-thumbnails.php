<?php /*

**************************************************************************
Plugin Name:  Regenerate Thumbnails汉化版
Plugin URI:   http://www.luoxiao123.cn/
Description:  允许您改变缩略图的大小后，重新生成所有缩略图。更多主题汉化、插件汉化、以及其他wordpress问题，请访问<strong><a href="http://www.luoxiao123.cn">逍遥乐IT博客</a>   <a href="http://www.luoxiao123.cn">www.luoxiao123.cn</a></strong>  主题汉化不容易，请到<a href="https://me.alipay.com/xiaoyaole">支付宝</a>赞助我，不论多少，心意最重要，谢谢！请大家认准 逍遥乐汉化 ！
Version:      2.2.4
Author:       逍遥乐汉化
Author URI:   http://www.luoxiao123.cn/
**************************************************************************/

class RegenerateThumbnails {
	var $menu_id;

	// Plugin initialization
	function RegenerateThumbnails() {
		// Load up the localization file if we're using WordPress in a different language
		// Place it in this plugin's "localization" folder and name it "regenerate-thumbnails-[value in wp-config].mo"
		load_plugin_textdomain( 'regenerate-thumbnails', false, '/regenerate-thumbnails/localization' );

		add_action( 'admin_menu',                              array( &$this, 'add_admin_menu' ) );
		add_action( 'admin_enqueue_scripts',                   array( &$this, 'admin_enqueues' ) );
		add_action( 'wp_ajax_regeneratethumbnail',             array( &$this, 'ajax_process_image' ) );
		add_filter( 'media_row_actions',                       array( &$this, 'add_media_row_action' ), 10, 2 );
		//add_filter( 'bulk_actions-upload',                     array( &$this, 'add_bulk_actions' ), 99 ); // A last minute change to 3.1 makes this no longer work
		add_action( 'admin_head-upload.php',                   array( &$this, 'add_bulk_actions_via_javascript' ) );
		add_action( 'admin_action_bulk_regenerate_thumbnails', array( &$this, 'bulk_action_handler' ) ); // Top drowndown
		add_action( 'admin_action_-1',                         array( &$this, 'bulk_action_handler' ) ); // Bottom dropdown (assumes top dropdown = default value)

		// Allow people to change what capability is required to use this plugin
		$this->capability = apply_filters( 'regenerate_thumbs_cap', 'manage_options' );
	}


	// Register the management page
	function add_admin_menu() {
		$this->menu_id = add_management_page( __( '重建缩略图', 'regenerate-thumbnails' ), __( '重建缩略图', 'regenerate-thumbnails' ), $this->capability, 'regenerate-thumbnails', array(&$this, 'regenerate_interface') );
	}


	// Enqueue the needed Javascript and CSS
	function admin_enqueues( $hook_suffix ) {
		if ( $hook_suffix != $this->menu_id )
			return;

		// WordPress 3.1 vs older version compatibility
		if ( wp_script_is( 'jquery-ui-widget', 'registered' ) )
			wp_enqueue_script( 'jquery-ui-progressbar', get_template_directory_uri() . '/inc/modules/regenerate-thumbnails/jquery-ui/jquery.ui.progressbar.min.js', array( 'jquery-ui-core', 'jquery-ui-widget' ), '1.8.6' );
		else
			wp_enqueue_script( 'jquery-ui-progressbar', get_template_directory_uri() . '/inc/modules/regenerate-thumbnails/jquery-ui/jquery.ui.progressbar.min.1.7.2.js', array( 'jquery-ui-core' ), '1.7.2' );

		wp_enqueue_style( 'jquery-ui-regenthumbs', get_template_directory_uri() . '/inc/modules/regenerate-thumbnails/jquery-ui/redmond/jquery-ui-1.7.2.custom.css', array(), '1.7.2' );
	}


	// Add a "Regenerate Thumbnails" link to the media row actions
	function add_media_row_action( $actions, $post ) {
		if ( 'image/' != substr( $post->post_mime_type, 0, 6 ) || ! current_user_can( $this->capability ) )
			return $actions;

		$url = wp_nonce_url( admin_url( 'tools.php?page=regenerate-thumbnails&goback=1&ids=' . $post->ID ), 'regenerate-thumbnails' );
		$actions['regenerate_thumbnails'] = '<a href="' . esc_url( $url ) . '" title="' . esc_attr( __( "重新生成这一张图片的缩略图", 'regenerate-thumbnails' ) ) . '">' . __( '重新生成缩略图', 'regenerate-thumbnails' ) . '</a>';

		return $actions;
	}


	// Add "Regenerate Thumbnails" to the Bulk Actions media dropdown
	function add_bulk_actions( $actions ) {
		$delete = false;
		if ( ! empty( $actions['delete'] ) ) {
			$delete = $actions['delete'];
			unset( $actions['delete'] );
		}

		$actions['bulk_regenerate_thumbnails'] = __( '重新生成缩略图', 'regenerate-thumbnails' );

		if ( $delete )
			$actions['delete'] = $delete;

		return $actions;
	}


	// Add new items to the Bulk Actions using Javascript
	// A last minute change to the "bulk_actions-xxxxx" filter in 3.1 made it not possible to add items using that
	function add_bulk_actions_via_javascript() {
		if ( ! current_user_can( $this->capability ) )
			return;
?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('select[name^="action"] option:last-child').before('<option value="bulk_regenerate_thumbnails"><?php echo esc_attr( __( '重新生成缩略图', 'regenerate-thumbnails' ) ); ?></option>');
			});
		</script>
<?php
	}


	// Handles the bulk actions POST
	function bulk_action_handler() {
		if ( empty( $_REQUEST['action'] ) || ( 'bulk_regenerate_thumbnails' != $_REQUEST['action'] && 'bulk_regenerate_thumbnails' != $_REQUEST['action2'] ) )
			return;

		if ( empty( $_REQUEST['media'] ) || ! is_array( $_REQUEST['media'] ) )
			return;

		check_admin_referer( 'bulk-media' );

		$ids = implode( ',', array_map( 'intval', $_REQUEST['media'] ) );

		// Can't use wp_nonce_url() as it escapes HTML entities
		wp_redirect( add_query_arg( '_wpnonce', wp_create_nonce( 'regenerate-thumbnails' ), admin_url( 'tools.php?page=regenerate-thumbnails&goback=1&ids=' . $ids ) ) );
		exit();
	}


	// The user interface plus thumbnail regenerator
	function regenerate_interface() {
		global $wpdb;

		?>

<div id="message" class="updated fade" style="display:none"></div>

<div class="wrap regenthumbs">
	<h2><?php _e('重新生成缩略图', 'regenerate-thumbnails'); ?></h2>

<?php

		// If the button was clicked
		if ( ! empty( $_POST['regenerate-thumbnails'] ) || ! empty( $_REQUEST['ids'] ) ) {
			// Capability check
			if ( ! current_user_can( $this->capability ) )
				wp_die( __( 'Cheatin&#8217; uh?' ) );

			// Form nonce check
			check_admin_referer( 'regenerate-thumbnails' );

			// Create the list of image IDs
			if ( ! empty( $_REQUEST['ids'] ) ) {
				$images = array_map( 'intval', explode( ',', trim( $_REQUEST['ids'], ',' ) ) );
				$ids = implode( ',', $images );
			} else {
				// Directly querying the database is normally frowned upon, but all
				// of the API functions will return the full post objects which will
				// suck up lots of memory. This is best, just not as future proof.
				if ( ! $images = $wpdb->get_results( "SELECT ID FROM $wpdb->posts WHERE post_type = 'attachment' AND post_mime_type LIKE 'image/%' ORDER BY ID DESC" ) ) {
					echo '	<p>' . sprintf( __( "无法找到任何图像。你确定 <a href='%s'>一些存在</a>?", 'regenerate-thumbnails' ), admin_url( 'upload.php?post_mime_type=image' ) ) . "</p></div>";
					return;
				}

				// Generate the list of IDs
				$ids = array();
				foreach ( $images as $image )
					$ids[] = $image->ID;
				$ids = implode( ',', $ids );
			}

			echo '	<p>' . __( "请耐心等待，重新生成缩略图。这可能需要一段时间，如果你的服务器很慢（廉价的虚拟主机），或者如果你有很多的图像。请不要离开此页面导航，直到完成这个脚本，否则将不能调整大小或缩略图。重新生成完成时，您将在本页面收到通知。", 'regenerate-thumbnails' ) . '</p>';

			$count = count( $images );

			$text_goback = ( ! empty( $_GET['goback'] ) ) ? sprintf( __( '返回到前一页， <a href="%s">点击这里</a>.', 'regenerate-thumbnails' ), 'javascript:history.go(-1)' ) : '';
			$text_failures = sprintf( __( '完成! %1$s 图像被成功调整大小 %2$s 秒，有 %3$s 个失败。 再次尝试，重新生成失败的图像， <a href="%4$s">点击这里</a>。 %5$s', 'regenerate-thumbnails' ), "' + rt_successes + '", "' + rt_totaltime + '", "' + rt_errors + '", esc_url( wp_nonce_url( admin_url( 'tools.php?page=regenerate-thumbnails&goback=1' ), 'regenerate-thumbnails' ) . '&ids=' ) . "' + rt_failedlist + '", $text_goback );
			$text_nofailures = sprintf( __( '完成! %1$s 图像被成功调整大小 %2$s 秒,有0个失败。 %3$s', 'regenerate-thumbnails' ), "' + rt_successes + '", "' + rt_totaltime + '", $text_goback );
?>


	<noscript><p><em><?php _e( '您必须启用Javascript才能继续进行！', 'regenerate-thumbnails' ) ?></em></p></noscript>

	<div id="regenthumbs-bar" style="position:relative;height:25px;">
		<div id="regenthumbs-bar-percent" style="position:absolute;left:50%;top:50%;width:300px;margin-left:-150px;height:25px;margin-top:-9px;font-weight:bold;text-align:center;"></div>
	</div>

	<p><input type="button" class="button hide-if-no-js" name="regenthumbs-stop" id="regenthumbs-stop" value="<?php _e( '中止调整图片大小', 'regenerate-thumbnails' ) ?>" /></p>

	<h3 class="title"><?php _e( '调试信息', 'regenerate-thumbnails' ) ?></h3>

	<p>
		<?php printf( __( '图片总数： %s', 'regenerate-thumbnails' ), $count ); ?><br />
		<?php printf( __( '调整大小后的图片：: %s', 'regenerate-thumbnails' ), '<span id="regenthumbs-debug-successcount">0</span>' ); ?><br />
		<?php printf( __( '调整失败: %s', 'regenerate-thumbnails' ), '<span id="regenthumbs-debug-failurecount">0</span>' ); ?>
	</p>

	<ol id="regenthumbs-debuglist">
		<li style="display:none"></li>
	</ol>

	<script type="text/javascript">
	// <![CDATA[
		jQuery(document).ready(function($){
			var i;
			var rt_images = [<?php echo $ids; ?>];
			var rt_total = rt_images.length;
			var rt_count = 1;
			var rt_percent = 0;
			var rt_successes = 0;
			var rt_errors = 0;
			var rt_failedlist = '';
			var rt_resulttext = '';
			var rt_timestart = new Date().getTime();
			var rt_timeend = 0;
			var rt_totaltime = 0;
			var rt_continue = true;

			// Create the progress bar
			$("#regenthumbs-bar").progressbar();
			$("#regenthumbs-bar-percent").html( "0%" );

			// Stop button
			$("#regenthumbs-stop").click(function() {
				rt_continue = false;
				$('#regenthumbs-stop').val("<?php echo $this->esc_quotes( __( '停止...', 'regenerate-thumbnails' ) ); ?>");
			});

			// Clear out the empty list element that's there for HTML validation purposes
			$("#regenthumbs-debuglist li").remove();

			// Called after each resize. Updates debug information and the progress bar.
			function RegenThumbsUpdateStatus( id, success, response ) {
				$("#regenthumbs-bar").progressbar( "value", ( rt_count / rt_total ) * 100 );
				$("#regenthumbs-bar-percent").html( Math.round( ( rt_count / rt_total ) * 1000 ) / 10 + "%" );
				rt_count = rt_count + 1;

				if ( success ) {
					rt_successes = rt_successes + 1;
					$("#regenthumbs-debug-successcount").html(rt_successes);
					$("#regenthumbs-debuglist").append("<li>" + response.success + "</li>");
				}
				else {
					rt_errors = rt_errors + 1;
					rt_failedlist = rt_failedlist + ',' + id;
					$("#regenthumbs-debug-failurecount").html(rt_errors);
					$("#regenthumbs-debuglist").append("<li>" + response.error + "</li>");
				}
			}

			// Called when all images have been processed. Shows the results and cleans up.
			function RegenThumbsFinishUp() {
				rt_timeend = new Date().getTime();
				rt_totaltime = Math.round( ( rt_timeend - rt_timestart ) / 1000 );

				$('#regenthumbs-stop').hide();

				if ( rt_errors > 0 ) {
					rt_resulttext = '<?php echo $text_failures; ?>';
				} else {
					rt_resulttext = '<?php echo $text_nofailures; ?>';
				}

				$("#message").html("<p><strong>" + rt_resulttext + "</strong></p>");
				$("#message").show();
			}

			// Regenerate a specified image via AJAX
			function RegenThumbs( id ) {
				$.ajax({
					type: 'POST',
					url: ajaxurl,
					data: { action: "regeneratethumbnail", id: id },
					success: function( response ) {
						if ( response !== Object( response ) || ( typeof response.success === "undefined" && typeof response.error === "undefined" ) ) {
							response = new Object;
							response.success = false;
							response.error = "<?php printf( esc_js( __( '调整大小请求异常终止 (ID %s). 这可能是由于图像超过可用内存或一些其他类型的致命错误。', 'regenerate-thumbnails' ) ), '" + id + "' ); ?>";
						}

						if ( response.success ) {
							RegenThumbsUpdateStatus( id, true, response );
						}
						else {
							RegenThumbsUpdateStatus( id, false, response );
						}

						if ( rt_images.length && rt_continue ) {
							RegenThumbs( rt_images.shift() );
						}
						else {
							RegenThumbsFinishUp();
						}
					},
					error: function( response ) {
						RegenThumbsUpdateStatus( id, false, response );

						if ( rt_images.length && rt_continue ) {
							RegenThumbs( rt_images.shift() );
						}
						else {
							RegenThumbsFinishUp();
						}
					}
				});
			}

			RegenThumbs( rt_images.shift() );
		});
	// ]]>
	</script>
<?php
		}

		// No button click? Display the form.
		else {
?>
	<form method="post" action="">
<?php wp_nonce_field('regenerate-thumbnails') ?>

	<p><?php printf( __( "使用这个工具重新生成所有已经上传到你的博客的图像的缩略图。这是非常有用的，如果你需要改变任何缩略图尺寸 <a href='%s'>媒体设置页面</a>. 由于硬编码的URL，以避免任何破碎的形象，将保留旧缩略图。", 'regenerate-thumbnails' ), admin_url( 'options-media.php' ) ); ?></p>

	<p><?php printf( __( "您可以重新生成特定的图像（而不是全部图片） <a href='%s'>媒体库</a> 页面。 将鼠标悬停在图像的行，单击该链接来调整只是一个图像或使用复选框和批量操作下拉调整多个图像（仅WordPress 3.1+）。", 'regenerate-thumbnails '), admin_url( 'upload.php' ) ); ?></p>

	<p><?php _e( "缩略图再生是不可逆的，如果你不喜欢这个结果，你可以再次单击该按钮，改变你的缩略图尺寸回到原来的值。", 'regenerate-thumbnails' ); ?></p>

	<p><?php _e( '要开始，只需按下面的按钮。', 'regenerate-thumbnails '); ?></p>

	<p><input type="submit" class="button hide-if-no-js" name="regenerate-thumbnails" id="regenerate-thumbnails" value="<?php _e( '重新生成所有缩略图', 'regenerate-thumbnails' ) ?>" /></p>

	<noscript><p><em><?php _e( '必须启用Javascript才能继续进行！', 'regenerate-thumbnails' ) ?></em></p></noscript>

	</form>
<?php
		} // End if button
?>
</div>

<?php
	}


	// Process a single image ID (this is an AJAX handler)
	function ajax_process_image() {
		@error_reporting( 0 ); // Don't break the JSON result

		header( 'Content-type: application/json' );

		$id = (int) $_REQUEST['id'];
		$image = get_post( $id );

		if ( ! $image || 'attachment' != $image->post_type || 'image/' != substr( $image->post_mime_type, 0, 6 ) )
			die( json_encode( array( 'error' => sprintf( __( '调整大小失败: %s 是无效的图像ID。', 'regenerate-thumbnails' ), esc_html( $_REQUEST['id'] ) ) ) ) );

		if ( ! current_user_can( $this->capability ) )
			$this->die_json_error_msg( $image->ID, __( "您的用户帐户没有权限调整图像", 'regenerate-thumbnails' ) );

		$fullsizepath = get_attached_file( $image->ID );

		if ( false === $fullsizepath || ! file_exists( $fullsizepath ) )
			$this->die_json_error_msg( $image->ID, sprintf( __( '最初上传图像文件不能被发现 %s', 'regenerate-thumbnails' ), '<code>' . esc_html( $fullsizepath ) . '</code>' ) );

		@set_time_limit( 900 ); // 5 minutes per image should be PLENTY

		$metadata = wp_generate_attachment_metadata( $image->ID, $fullsizepath );

		if ( is_wp_error( $metadata ) )
			$this->die_json_error_msg( $image->ID, $metadata->get_error_message() );
		if ( empty( $metadata ) )
			$this->die_json_error_msg( $image->ID, __( '未知的失败原因。', 'regenerate-thumbnails' ) );

		// If this fails, then it just means that nothing was changed (old value == new value)
		wp_update_attachment_metadata( $image->ID, $metadata );

		die( json_encode( array( 'success' => sprintf( __( '&quot;%1$s&quot; (ID %2$s) 成功调整大小 %3$s 秒.', 'regenerate-thumbnails' ), esc_html( get_the_title( $image->ID ) ), $image->ID, timer_stop() ) ) ) );
	}


	// Helper to make a JSON error message
	function die_json_error_msg( $id, $message ) {
		die( json_encode( array( 'error' => sprintf( __( '&quot;%1$s&quot; (ID %2$s) 未能调整大小。错误信息： %3$s', 'regenerate-thumbnails' ), esc_html( get_the_title( $id ) ), $id, $message ) ) ) );
	}


	// Helper function to escape quotes in strings for use in Javascript
	function esc_quotes( $string ) {
		return str_replace( '"', '\"', $string );
	}
}

// Start up this plugin
add_action( 'init', 'RegenerateThumbnails' );
function RegenerateThumbnails() {
	global $RegenerateThumbnails;
	$RegenerateThumbnails = new RegenerateThumbnails();
}

?>