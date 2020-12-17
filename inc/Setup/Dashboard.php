<?php
/**
 * Dashboard options page
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Setup;

defined( 'ABSPATH' ) || exit;

/**
 * Dashboard class
 */
class Dashboard {

	/**
	 * Register
	 */
	public function register() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ), 9 );
	}

	/**
	 * Add admin menu
	 */
	public function add_admin_menu() {

		$page_title = __( 'Qubely Starters Options', 'tutorstarter' );
		$menu_title = __( 'Qubely Starters', 'tutorstarter' );
		$capability = 'manage_options';
		$menu_slug  = 'tutorstarter';
		$callback   = array( $this, 'callback' );
		$icon       = 'dashicons-superhero-alt';

		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $callback, $icon );
		add_submenu_page( $menu_slug, $page_title, __( 'General', 'tutorstarter' ), $capability, $menu_slug, $callback );
	}

	/**
	 * Callback
	 */
	public function callback() {
		echo '<div id="qubelystarters-dashboard"></div>';
	}
}
