<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * 
 * wordpress分类目录标题重写优化
 * http://www.wpdaxue.com/question/18668.html
 *  
 * Description:扫描指定目录下的文件并引入
 * Author：xiaoxu
 * Author URI: www.iwebued.com
 */ 
add_action('edit_category_form_fields', 'category_function');
function category_function(){
if(isset($_GET['action']) && $_GET['action'] == 'edit') $value = get_option('cat_set_' . $_GET['tag_ID']);
$title = 'cat_title';
$keywords = 'cat_keywords';
$description = 'cat_description';
?>

<table class="form-table">

</table>

<h2>自定义SEO信息</h2>
<table class="form-table">
<tbody>

<tr class="form-field">
<th scope="row" valign="top"><label for="<?php echo $title ?>">标题</label></th>
<td><input name="<?php echo $title ?>" id="<?php echo $title ?>" type="text" value="<?php echo esc_attr(stripslashes($value['title']));
?>">
<p class="description">默认调用分类名称作为Head中Title信息。</p>
</td>
</tr>

<tr class="form-field">
<th scope="row" valign="top"><label for="<?php echo $keywords;
?>">关键词</label></th>
<td><input name="<?php echo $keywords;
?>" id="<?php echo $keywords;
?>" type="text" value="<?php echo $value['keywords'];
?>">
<p class="description">多个关键词用小写逗号“,”分隔开；默认调用分类名称作为Head中KeyWords信息。</p>
</td>
</tr>

<tr class="form-field">
<th scope="row" valign="top"><label for="<?php echo $description;
?>">描述</label></th>
<td><textarea name="<?php echo $description;
?>" id="<?php echo $description;
?>" rows="3" cols="30"><?php echo stripslashes($value['description']);
?></textarea>
<p class="description">若未设置，将显示为“关于‘某某’分类下的所有文章。”作为Head中Description信息。</p>
</td>
</tr>

</tbody>
</table>

<?php
}
add_action('edit_category', 'save_category_function');
function save_category_function(){
if(isset($_POST['action']) && isset($_POST['taxonomy']) && $_POST['action'] == 'editedtag' && $_POST['taxonomy'] == 'category'){
update_option('cat_set_' . $_POST['tag_ID'], array('title' => $_POST['cat_title'], 'description' => $_POST['cat_description'], 'keywords' => $_POST['cat_keywords'], 'template' => $_POST['cat_template'], 'orderby' => $_POST['cat_orderby'], 'per_page' => $_POST['cat_per_page'],));
}
};