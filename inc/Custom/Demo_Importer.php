<?php
/**
 * Handles fetching all demos from API
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Demo Importer Class
 */
class Demo_Importer {

	/**
	 * Private endpoint
	 *
	 * @var string
	 */
	private $endpoint = 'https://qubely.io/wp-json/restapi/v2/packs';

	/**
	 * Register Filter Hooks of the Importer Plugin
	 */
	public function register() {
		add_filter( 'pt-ocdi/import_files', array( $this, 'import_theme_demo' ) );
		add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
		add_filter( 'pt-ocdi/plugin_intro_text', array( $this, 'change_text' ) );
		add_filter( 'pt-ocdi/plugin_page_setup', array( $this, 'change_plugin_page' ) );
		add_action( 'pt-ocdi/after_import', array( $this, 'assign_defaults' ), 10, 1 );
	}

	/**
	 * Handles Theme Demo Imports for Content, Customizer and Widgets
	 *
	 * @return array $demo_list list of demos
	 */
	public function import_theme_demo() {

		$demo_list  = array();
		$packs_list = get_transient( 'qubelystarters_packs' );

		if ( is_admin() && false === $packs_list ) {

			try {

				$results    = wp_remote_get( $this->endpoint );
				$packs_list = json_decode( $results['body'], true );

				if ( is_array( $packs_list ) || ! empty( $packs_list ) ) {
					set_transient( 'qubelystarters_packs', $packs_list, DAY_IN_SECONDS );
				}
			} catch ( Exception $e ) {
				echo esc_html( $e->getMessage() );
				delete_transient( 'qubelystarters_packs' );
			}
		}

		if ( is_array( $packs_list ) || ! empty( $packs_list ) ) {

			foreach ( $packs_list as $packs ) {

				foreach ( $packs['categories'] as $category ) {
					$category['name'];
				}

				$list = array(
					'import_file_name'           => $packs['name'],
					'categories'                 => array( $category['name'] ),
					'import_file_url'            => $packs['content'],
					'import_widget_file_url'     => $packs['widget'],
					'import_customizer_file_url' => $packs['customizer'],
					'import_preview_image_url'   => $packs['preview_image'],
				);

				array_push( $demo_list, $list );
			}
		}

		return $demo_list;
	}

	/**
	 * Change default intro texts
	 *
	 * @param string $default_text string to change.
	 *
	 * @return string
	 */
	public function change_text( $default_text ) {
		$default_text .= '<div class="demo__intro-text"><h3>' . __( 'Welcome to Qubely Starters One Click Demo Import', 'tutorstarter' ) . '</h3></div>';

		return $default_text;
	}

	/**
	 * Change plugin page
	 *
	 * @param array $default_settings as arg.
	 *
	 * @return array $default_settings
	 */
	public function change_plugin_page( $default_settings ) {
		$default_settings['parent_slug'] = 'tutorstarter';
		$default_settings['page_title']  = esc_html__( 'Qubely Starters One Click Demo Import', 'tutorstarter' );
		$default_settings['menu_title']  = esc_html__( 'Demo Import', 'tutorstarter' );
		$default_settings['capability']  = 'import';
		$default_settings['menu_slug']   = 'qubelystarters-demo-import';

		return $default_settings;
	}

	/**
	 * Handles Setting up the FrontPage, Menus
	 *
	 * @param array $selected_import properties of the selected import.
	 */
	public function assign_defaults( $selected_import ) {
		// Assign menus to their locations.
		$primary   = get_term_by( 'name', 'Primary', 'nav_menu' );
		$secondary = get_term_by( 'name', 'Footer', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary'   => $primary->term_id,
				'secondary' => $secondary->term_id,
			)
		);

		// Assign front page.
		$front_page_id = get_page_by_title( $selected_import['import_file_name'] );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
	}
}
