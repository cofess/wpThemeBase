<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * 
 * 获取当前菜单
 *  
 * Description:获取当前菜单名称
 * Author：xiaoxu
 * Author URI: www.iwebued.com
 */ 
/**
 * 获取当前菜单
 * http://www.tuicool.com/articles/vqyMZb
 */
/*add_filter( 'wp_nav_menu_objects', 'wpse16243_wp_nav_menu_objects' );
function wpse16243_wp_nav_menu_objects( $sorted_menu_items )
{
  foreach ( $sorted_menu_items as $menu_item ) {
    if ( $menu_item->current ) {
      $GLOBALS['my_active_menu_title'] = $menu_item->title;
      break;
    }
  }
  return $sorted_menu_items;
} */ 
 
/**
 * 获取父级菜单
 * http://www.tuicool.com/articles/vqyMZb
 */
function get_active_menu_item_ids( $classes )
{   
//set up defaults for menu retrieval
$dosmenudefaults = array( 'menu' => '', 'container' => 'div', 'container_class' => '', 'container_id' => '', 'menu_class' => 'menu', 'menu_id' => '',
'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
'depth' => 0, 'walker' => '', 'theme_location' => '' );

$dosargs = wp_parse_args( $dosargs, $dosmenudefaults );
$dosargs = apply_filters( 'wp_nav_menu_args', $dosargs );
$dosargs = (object) $dosargs;

// Get the nav menu based on the requested menu
$dosmenu = wp_get_nav_menu_object( $dosargs->menu );

// Get the nav menu based on the theme_location
if ( ! $dosmenu && $dosargs->theme_location && ( $doslocations = get_nav_menu_locations() ) && isset( $doslocations[ $dosargs->theme_location ] ) )
    $dosmenu = wp_get_nav_menu_object( $doslocations[ $dosargs->theme_location ] );

// Get the first menu that has items if we still can't find a menu
if ( ! $dosmenu && !$dosargs->theme_location ) {
    $dosmenus = wp_get_nav_menus();
    foreach ( $dosmenus as $dosmenu_maybe ) {
        if ( $dosmenu_items = wp_get_nav_menu_items($dosmenu_maybe->term_id) ) {
            $dosmenu = $dosmenu_maybe;
            break;
        }
    }
}

// If the menu exists, get its items.
if ( $dosmenu && ! is_wp_error($dosmenu) && !isset($dosmenu_items) )
    $dosmenu_items = wp_get_nav_menu_items( $dosmenu->term_id );    
$dosmenu = $dosmenu_items;

// Get the $menu_item variables
 _wp_menu_item_classes_by_context( $dosmenu );

 //create empty parents array
 $dosparents = array();

 //Iterate through the menu items and get the active item and its parent items
 foreach ($dosmenu as $dosmenuitem)
    {
    if ($dosmenuitem->current == '1')
        {
        $dosactivemenuids['current']= $dosmenuitem->title;
        }
    if (($dosmenuitem->current_item_parent == '1')||($dosmenuitem->current_item_ancestor == '1'))
        {
        $dosparents[$dosmenuitem->menu_order] = $dosmenuitem->title;
        }
    if(is_array($dosparents))
        {
        krsort($dosparents);
        foreach ($dosparents as $key =>$value)
            {
            $dosactivemenuids['parents'][$key]= $value;
            }
        }
     }
//return $dosactivemenuids;
if (is_array($dosactivemenuids['parents']) && !empty($dosactivemenuids['parents'])){
    foreach ( $dosactivemenuids['parents'] as $key=>$value)
        {
        $classes[] = 'menu-item-'.$value;
		$GLOBALS['my_active_menu_title']=$value;
        }
} else{
	if ($dosactivemenuids['current'] != ''){
    	$classes[] = 'menu-item-'.$dosactivemenuids['current'];
		$GLOBALS['my_active_menu_title']=$dosactivemenuids['current'];
	}
}

return $classes;
}
add_filter( 'body_class', 'get_active_menu_item_ids'); 