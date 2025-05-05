<?php
/**
 * Demo Importer
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Demos;

defined( 'ABSPATH' ) || exit;

/**
 * Demo Importer
 */
class Starter_Demo_Importer {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'ocdi/plugin_page_setup', array( $this, 'tutorstarter_demo_import_page_setup' ) );
		add_filter( 'ocdi/import_files', array( $this, 'tutorstarter_demo_import_files' ) );
		add_filter( 'ocdi/register_plugins', array( $this, 'tutorstarter_register_plugins' ) );
		add_action( 'ocdi/after_import', array( $this, 'tutorstarter_after_import_setup' ) );
	}

	/**
	 * Demo Import Page Setup
	 *
	 * @param array $default_settings Default settings for the demo import page.
	 *
	 * @return array Modified settings for the demo import page.
	 */
	public function tutorstarter_demo_import_page_setup( $default_settings ) {
		$default_settings['parent_slug']   = 'tutorstarter'; // No parent, making it a top-level menu item.
		$default_settings['page_title']    = esc_html__( 'Starter Sites', 'tutorstarter' );
		$default_settings['menu_title']    = esc_html__( 'Starter Sites', 'tutorstarter' );
		$default_settings['capability']    = 'import';
		$default_settings['menu_slug']     = 'tutorstarter-demo-import';
		$default_settings['menu_position'] = 59; // Just above Appearance (Appearance is 60).

		return $default_settings;
	}

	/**
	 * Demo Import Files
	 *
	 * @return array Array of demo import files.
	 */
	public function tutorstarter_demo_import_files() {
		return array(
			// Elementor.
			array(
				'import_file_name'             => 'University',
				'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/university/demo-content.xml',
				'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/university/widgets.wie',
				'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/Demos/university/customizer.dat',
				'import_preview_image_url'     => 'https://raw.githubusercontent.com/themeum/tutorstarter/refs/heads/dev/inc/demos/elementor/university/preview.png',
				'preview_url'                  => 'https://preview.tutorlms.com/university',
			),
			array(
				'import_file_name'             => 'Marketplace',
				'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/marketplace/demo-content.xml',
				'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/marketplace/widgets.wie',
				'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/marketplace/customizer.dat',
				'import_preview_image_url'     => 'https://raw.githubusercontent.com/themeum/tutorstarter/refs/heads/dev/inc/demos/elementor/marketplace/preview.png',
				'preview_url'                  => 'https://preview.tutorlms.com/marketplace/',
			),
			array(
				'import_file_name'             => 'Instructor',
				'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/instructor/demo-content.xml',
				'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/instructor/widgets.wie',
				'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/instructor/customizer.dat',
				'import_preview_image_url'     => 'https://raw.githubusercontent.com/themeum/tutorstarter/refs/heads/dev/inc/demos/elementor/instructor/preview.png',
				'preview_url'                  => 'https://preview.tutorlms.com/instructor/',
			),
			array(
				'import_file_name'             => 'Single Course',
				'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/single-course/demo-content.xml',
				'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/single-course/widgets.wie',
				'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/Demos/elementor/single-course/customizer.dat',
				'import_preview_image_url'     => 'https://raw.githubusercontent.com/themeum/tutorstarter/refs/heads/dev/inc/demos/elementor/single-course/preview.png',
				'preview_url'                  => 'https://preview.tutorlms.com/single-course/',
			),

		);
	}

	/**
	 * Register Plugins
	 *
	 * @param array $plugins Array of plugins to register.
	 *
	 * @return array Modified array of plugins to register.
	 */
	public function tutorstarter_register_plugins( $plugins ) {

		// Required: List of plugins used by all theme demos.
		$theme_plugins = array(
			array( // A WordPress.org plugin repository example.
				'name'     => 'Tutor LMS',  // Name of the plugin.
				'slug'     => 'tutor',      // Plugin slug - the same as on WordPress.org plugin repository.
				'required' => true,         // If the plugin is required or not.
			),
			array( // A WordPress.org plugin repository example.
				'name'     => 'Elementor',  // Name of the plugin.
				'slug'     => 'elementor',  // Plugin slug - the same as on WordPress.org plugin repository.
				'required' => true,         // If the plugin is required or not.
			),
			array( // A WordPress.org plugin repository example.
				'name'     => 'WPForms',    // Name of the plugin.
				'slug'     => 'wpforms-lite',   // Plugin slug - the same as on WordPress.org plugin repository.
				'required' => true,         // If the plugin is required or not.
			),
		);

		// Check if user is on the theme recommeneded plugins step and a demo was selected.
		if ( isset( $_GET['step'] ) && 'import' === $_GET['step'] && isset( $_GET['import'] ) ) {

			// List of all plugins only used by second demo import [overwrite the list] ('import' number = 2).
			if ( '0' === $_GET['import'] || '1' === $_GET['import'] || '2' === $_GET['import'] || '3' === $_GET['import'] ) {
				$theme_plugins = array(
					array( // A WordPress.org plugin repository example.
						'name'     => 'Tutor LMS',  // Name of the plugin.
						'slug'     => 'tutor',      // Plugin slug - the same as on WordPress.org plugin repository.
						'required' => true,         // If the plugin is required or not.
					),
					array( // A WordPress.org plugin repository example.
						'name'     => 'Elementor',  // Name of the plugin.
						'slug'     => 'elementor',  // Plugin slug - the same as on WordPress.org plugin repository.
						'required' => true,         // If the plugin is required or not.
					),
					array( // A WordPress.org plugin repository example.
						'name'     => 'WPForms',    // Name of the plugin.
						'slug'     => 'wpforms-lite',   // Plugin slug - the same as on WordPress.org plugin repository.
						'required' => true,         // If the plugin is required or not.
					),
				);
			}
		}

		return array_merge( $plugins, $theme_plugins );
	}


	/**
	 * After import setup
	 *
	 * @return void
	 */
	public function tutorstarter_after_import_setup() {

		// Get all published pages.
		$pages = get_posts(
			array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			)
		);

		// Loop through pages and update the page template.
		foreach ( $pages as $page ) {
			update_post_meta( $page->ID, '_wp_page_template', 'elementor_header_footer' ); // For full blank (no header/footer).
		}

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function in your theme.
			)
		);

		// Get the front page.
		$front_page = get_posts(
			array(
				'post_type'              => 'page',
				'title'                  => 'Home',
				'post_status'            => 'all',
				'numberposts'            => 1,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
			)
		);

		if ( ! empty( $front_page ) ) {
			update_option( 'page_on_front', $front_page[0]->ID );
		}

		// Get the blog page.
		$blog_page = get_posts(
			array(
				'post_type'              => 'page',
				'title'                  => 'News',
				'post_status'            => 'all',
				'numberposts'            => 1,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
			)
		);

		if ( ! empty( $blog_page ) ) {
			update_option( 'page_for_posts', $blog_page[0]->ID );
		}

		if ( ! empty( $blog_page ) || ! empty( $front_page ) ) {
			update_option( 'show_on_front', 'page' );
		}
	}
}
