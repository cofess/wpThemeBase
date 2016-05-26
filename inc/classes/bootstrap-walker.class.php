<?php 
/**
 * Bootstrap Walker of Yiwell WordPress Theme
 * Description:类 - 导航菜单结构
 *
 * @package   Yiwell
 * @version   1.0.0
 * @date      2015.12.5
 * @author    Lony <841995980@qq.com>
 * @site      yiwell <www.yiwell.com>
 * @copyright Copyright (c) 2014-2015, yiwell
 * @license   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link      http://www.yiwell.com
**/

/* Cannot access pages directly  */ 
if ( ! defined( 'ABSPATH' ) ) { die; } 

class Bootstrap_Walker extends Walker_Nav_Menu
{  
    function start_lvl(&$output, $depth = 0, $args = array()){
    	$indent = ($depth) ? str_repeat("\t", $depth) : '';
        $output .= "\n{$indent}<ul role='menu' class='dropdown-menu {$this->settings->submenu_dropdown_alignment}'>";
    } 
	             
    function end_lvl( &$output, $depth = 0, $args = array() ) 
    {
        if ($depth == 0) { // This is actually the end of the level-1 submenu ($depth is misleading here too!)
            
            // we don't have anything special for Bootstrap, so we'll just leave an HTML comment for now
            $output .= '<!--.dropdown-->';
        }
        $tabs = str_repeat("\t", $depth);
        $output .= "\n{$tabs}</ul>\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
    {    
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        /* This is the stock Wordpress code that builds the <li> with all of its attributes */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . ' text-uppercase"';
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>'; 
		
		$description  = ! empty( $item->attr_title ) ? '<i class="' . esc_attr( $item->attr_title ) . '"></i>' : '';
 
        if($depth != 0) {
            $description = $append = $prepend = "";
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        }      
		     
        $attributes  = ! empty( $item->title ) ? ' title="'  . esc_attr( $item->title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $item_output = $args->before;
                    
        /* If this item has a dropdown menu, make clicking on this link toggle it */
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $description . $args->link_after;
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        /* Output the actual caret for the user to click on to toggle the menu */            
        if ($item->hasChildren && $depth == 0) {
            $item_output .= '<span class="caret"></span></a>';
        } else {
            $item_output .= '</a>';
        }

        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        return;
    }
    
    /* Close the <li>
     * Note: the <a> is already closed
     * Note 2: $depth is "correct" at this level
     */        
    function end_el ( &$output, $item, $depth = 0, $args = array() )
    {
        $output .= '</li>';
        return;
    }
    
    /* Add a 'hasChildren' property to the item
     * Code from: http://wordpress.org/support/topic/how-do-i-know-if-a-menu-item-has-children-or-is-a-leaf#post-3139633 
     */
    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        // check whether this item has children, and set $item->hasChildren accordingly
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);

        // continue with normal behavior
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }        
}