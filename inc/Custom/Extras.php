<?php
/**
 * Handles Extra functionalities
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Extras class
 */
class Extras {

	/**
	 * Register default hooks and actions for WordPress
	 */
	public function register() {
		add_filter( 'body_class', array( $this, 'body_class' ) );
	}

	/**
	 * Body class
	 *
	 * @param [type] $classes as args.
	 *
	 * @return array $classes
	 */
	public function body_class( $classes ) {

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}
