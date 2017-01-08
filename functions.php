<?php

function portfolio_theme_setup() {
  add_theme_support('menus');
  register_nav_menus(array(
    'primary' => ('Primary Nav')
  ));
}

add_action('init', 'portfolio_theme_setup');

function portfolio_enqueue() {
  //styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    //scripts
    wp_register_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7');
  wp_enqueue_script('bootstrapjs');
  wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'portfolio_enqueue');

//wordpress nav walker //
class CSS_Menu_Walker extends Walker {

	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;

		/* Add active class */
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}

		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}



add_theme_support('custom-header');
add_theme_support('post-formats', array ('gallery', 'link'));
add_theme_support('post-thumbnails', array ('post', 'page', 'attatchment'));
add_theme_support('custom-header');
add_theme_support('custom-logo');
