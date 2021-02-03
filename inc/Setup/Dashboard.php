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

		$page_title = __( 'Tutor Starter Options', 'tutorstarter' );
		$menu_title = __( 'Tutor Starter', 'tutorstarter' );
		$capability = 'manage_options';
		$menu_slug  = 'tutorstarter';
		$callback   = array( $this, 'dashboard_callback' );
		$icon       = get_template_directory_uri() . '/assets/dist/images/admin-logo.png';

		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $callback, $icon );
		add_submenu_page( $menu_slug, $page_title, __( 'General', 'tutorstarter' ), $capability, $menu_slug, $callback );
	}

	/**
	 * Callback
	 */
	public function dashboard_callback() {
		echo '<div id="tutorstarter-dashboard"></div>';
	}
}
