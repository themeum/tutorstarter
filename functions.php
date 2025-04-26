<?php
/**
 * Handles loading all the necessary files
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

// Content width.
if ( ! isset( $content_width ) ) {
	$content_width = apply_filters( 'tutorstarter_content_width', get_theme_mod( 'content_width_value', 1140 ) );
}

// Theme GLOBALS.
$theme = wp_get_theme();
define( 'TUTOR_STARTER_VERSION', $theme->get( 'Version' ) );

// Load autoloader.
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

// Include TGMPA class.
if ( file_exists( dirname( __FILE__ ) . '/inc/Custom/class-tgm-plugin-activation.php' ) ) :
	require_once dirname( __FILE__ ) . '/inc/Custom/class-tgm-plugin-activation.php';
endif;

// Register services.
if ( class_exists( 'Tutor_Starter\\Init' ) ) :
	Tutor_Starter\Init::register_services();
endif;

/* 
* Tutor Start Demo Import
*/

// Chnage Slug
function tutorstarter_demo_import_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php'; // No parent, making it a top-level menu item
    $default_settings['page_title']  = esc_html__( 'TutorStarter Demo', 'one-click-demo-import' );
    $default_settings['menu_title']  = esc_html__( 'TutorStarter Demo', 'one-click-demo-import' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'tutorstarter-demo-import';
    $default_settings['menu_position'] = 59; // Just above Appearance (Appearance is 60)

    return $default_settings;
}
add_filter( 'ocdi/plugin_page_setup', 'tutorstarter_demo_import_page_setup' );

// Demo Content
function tutorstarter_demo_import_files() {
	return [
	  // Elementor
	  [
		'import_file_name'             => 'University (Elementor)',
		'categories'                   => [ 'Elementor' ],
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/elementore/university/demo-content.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/elementore/university/widgets.wie',
		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demos/elementore/university/customizer.dat',
		'import_preview_image_url'     => 'https://tutorlms.com/wp-content/uploads/2021/07/tutor-starter-video-thumbnail.jpg',
		'preview_url'                  => 'http://www.your_domain.com/my-demo-1',
		'import_plugin_icon'          => '<i class="fab fa-elementor" style="color:#9146ff;"></i>', // Elementor FA icon
	  ],
	  [
		'import_file_name'             => 'Marketplace (Elementor)',
		'categories'                   => [ 'Elementor' ],
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/elementore/marketplace/demo-content.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demos/marketplace/widgets.wie',
		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demos/marketplace/customizer.dat',
		'import_preview_image_url'     => 'https://tutorlms.com/wp-content/uploads/2021/07/tutor-starter-video-thumbnail.jpg',
		'preview_url'                  => 'http://www.your_domain.com/my-demo-1',
	  ],
	  [
		'import_file_name'             => 'Instructor (Elementor)',
		'categories'                   => [ 'Elementor' ],
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/elementore/instructor/demo-content.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/elementore/instructor/widgets.wie',
		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demos/elementore/instructor/customizer.dat',
		'import_preview_image_url'     => 'https://tutorlms.com/wp-content/uploads/2021/07/tutor-starter-video-thumbnail.jpg',
		'preview_url'                  => 'http://www.your_domain.com/my-demo-1',
	  ],
	  [
		'import_file_name'             => 'Single Course (Elementor)',
		'categories'                   => [ 'Elementor' ],
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/elementore/single-course/demo-content.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/elementore/single-course/widgets.wie',
		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demos/elementore/single-course/customizer.dat',
		'import_preview_image_url'     => 'https://tutorlms.com/wp-content/uploads/2021/07/tutor-starter-video-thumbnail.jpg',
		'preview_url'                  => 'http://www.your_domain.com/my-demo-1',
	  ],

	];
}
add_filter( 'ocdi/import_files', 'tutorstarter_demo_import_files' );

// Install Required Plugins
function tutorstarter_register_plugins( $plugins ) {
 
	// Required: List of plugins used by all theme demos.
	$theme_plugins = [
	  [ // A WordPress.org plugin repository example.
		'name'     => 'Tutor LMS', 	// Name of the plugin.
		'slug'     => 'tutor', 		// Plugin slug - the same as on WordPress.org plugin repository.
		'required' => true,    		// If the plugin is required or not.
	  ],
	  [ // A WordPress.org plugin repository example.
		'name'     => 'Elementor', 	// Name of the plugin.
		'slug'     => 'elementor', 	// Plugin slug - the same as on WordPress.org plugin repository.
		'required' => true,        	// If the plugin is required or not.
	  ],
	  [ // A WordPress.org plugin repository example.
		'name'     => 'TutorMate', 	// Name of the plugin.
		'slug'     => 'tutormate', 	// Plugin slug - the same as on WordPress.org plugin repository.
		'required' => true,        	// If the plugin is required or not.
	  ],
	];
   
	// Check if user is on the theme recommeneded plugins step and a demo was selected.
	if (
	  isset( $_GET['step'] ) &&
	  $_GET['step'] === 'import' &&
	  isset( $_GET['import'] )
	) {
   
	  // List of all plugins only used by second demo import [overwrite the list] ('import' number = 2).
	  if ( $_GET['import'] === '4' ||  $_GET['import'] === '5' ||  $_GET['import'] === '6' ||  $_GET['import'] === '7') {
		$theme_plugins = [
			[ // A WordPress.org plugin repository example.
				'name'     => 'Tutor LMS', 	// Name of the plugin.
				'slug'     => 'tutor', 		// Plugin slug - the same as on WordPress.org plugin repository.
				'required' => true,    		// If the plugin is required or not.
			],
			[ // A WordPress.org plugin repository example.
				'name'     => 'Qubely', 	// Name of the plugin.
				'slug'     => 'qubely', 	// Plugin slug - the same as on WordPress.org plugin repository.
				'required' => true,        	// If the plugin is required or not.
			],
			[ // A WordPress.org plugin repository example.
				'name'     => 'TutorMate', 	// Name of the plugin.
				'slug'     => 'tutormate', 	// Plugin slug - the same as on WordPress.org plugin repository.
				'required' => true,        	// If the plugin is required or not.
			],
		];
	  }
	}
   
	return array_merge( $plugins, $theme_plugins );
}
add_filter( 'ocdi/register_plugins', 'tutorstarter_register_plugins' );