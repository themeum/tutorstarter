<?php
/**
 * Handles displaying of custom components
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Custom;

use Tutor_Starter\Traits\Header_Components;

defined( 'ABSPATH' ) || exit;

/**
 * Component handler class
 */
class Component_Handler {

	/**
	 * Register
	 */
	public function register() {
		add_filter( 'wp_nav_menu_items', array( $this, 'add_new_items' ), 10, 2 );
	}

	/**
	 * Add new items to the primary menu
	 *
	 * @param mixed|array new menu items.
	 * @param array array of args.
	 *
	 * @return mixed|array
	 */
	public function add_new_items( $items, $args ) {

		if ( 'primary' === $args->theme_location ) {
			$items = Header_Components::navbar_toggler() . $items;
		}
		return $items;
	}
}
