<?php
/**
 * Handles menu registration
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Setup;

defined( 'ABSPATH' ) || exit;

/**
 * Menus class
 */
class Menus {
	/**
	 * Register default hooks and actions for WordPress
	 */
	public function register() {
		add_action( 'after_setup_theme', array( $this, 'menus' ) );
	}

	/**
	 * List of registered menus
	 *
	 * @return void
	 */
	public function menus() {
		register_nav_menus(
			array(
				'primary'   => esc_html__( 'Primary', 'tutorstarter' ),
				'catmenu'   => esc_html__( 'CatMenu', 'tutorstarter' ),
				'secondary' => esc_html__( 'Footer', 'tutorstarter' ),
			)
		);
	}
}
