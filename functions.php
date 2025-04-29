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
    $default_settings['parent_slug'] = 'tutorstarter'; // No parent, making it a top-level menu item
    $default_settings['page_title']  = esc_html__( 'Starter Sites', 'tutorstarter' );
    $default_settings['menu_title']  = esc_html__( 'Starter Sites', 'tutorstarter' );
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
		'import_file_name'             => 'University',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/university/demo-content.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/university/widgets.wie',
		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demos/university/customizer.dat',
		'import_preview_image_url'     => 'https://raw.githubusercontent.com/themeum/tutorstarter/refs/heads/dev/inc/demos/elementor/university/preview.png',
		'preview_url'                  => 'https://preview.tutorlms.com/university',
	  ],
	  [
		'import_file_name'             => 'Marketplace',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/marketplace/demo-content.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/marketplace/widgets.wie',
		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/marketplace/customizer.dat',
		'import_preview_image_url'     => 'https://raw.githubusercontent.com/themeum/tutorstarter/refs/heads/dev/inc/demos/elementor/marketplace/preview.png',
		'preview_url'                  => 'https://preview.tutorlms.com/marketplace/',
	  ],
	  [
		'import_file_name'             => 'Instructor',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/instructor/demo-content.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/instructor/widgets.wie',
		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/instructor/customizer.dat',
		'import_preview_image_url'     => 'https://raw.githubusercontent.com/themeum/tutorstarter/refs/heads/dev/inc/demos/elementor/instructor/preview.png',
		'preview_url'                  => 'https://preview.tutorlms.com/instructor/',
	  ],
	  [
		'import_file_name'             => 'Single Course',
		'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/single-course/demo-content.xml',
		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/single-course/widgets.wie',
		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demos/elementor/single-course/customizer.dat',
		'import_preview_image_url'     => 'https://raw.githubusercontent.com/themeum/tutorstarter/refs/heads/dev/inc/demos/elementor/single-course/preview.png',
		'preview_url'                  => 'https://preview.tutorlms.com/single-course/',
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
		'name'     => 'WPForms', 	// Name of the plugin.
		'slug'     => 'wpforms-lite', 	// Plugin slug - the same as on WordPress.org plugin repository.
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
	  if ( $_GET['import'] === '0' ||  $_GET['import'] === '1' ||  $_GET['import'] === '2' ||  $_GET['import'] === '3') {
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
				'name'     => 'WPForms', 	// Name of the plugin.
				'slug'     => 'wpforms-lite', 	// Plugin slug - the same as on WordPress.org plugin repository.
				'required' => true,        	// If the plugin is required or not.
			],
		];
	  }
	}
   
	return array_merge( $plugins, $theme_plugins );
}
add_filter( 'ocdi/register_plugins', 'tutorstarter_register_plugins' );

function tutorstarter_after_import_setup() {

	// Get all published pages
    $pages = get_posts( array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ) );

	// Loop through pages and update the page template
    foreach ( $pages as $page ) {
        update_post_meta( $page->ID, '_wp_page_template', 'elementor_header_footer' ); // For full blank (no header/footer)
    }

	// Assign menus to their locations.
	  $main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
	
	  set_theme_mod( 'nav_menu_locations', [
			  'primary' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function in your theme.
		  ]
	  );
	
	// Get the front page.
	$front_page = get_posts(
	  [
		'post_type'              => 'page',
		'title'                  => 'Home',
		'post_status'            => 'all',
		'numberposts'            => 1,
		'update_post_term_cache' => false,
		'update_post_meta_cache' => false,
	  ]
	);
   
	if ( ! empty( $front_page ) ) {
	  update_option( 'page_on_front', $front_page[0]->ID );
	}
   
	// Get the blog page.
	$blog_page = get_posts(
	  [
		'post_type'              => 'page',
		'title'                  => 'News',
		'post_status'            => 'all',
		'numberposts'            => 1,
		'update_post_term_cache' => false,
		'update_post_meta_cache' => false,
	  ]
	);
   
	if ( ! empty( $blog_page ) ) {
	  update_option( 'page_for_posts', $blog_page[0]->ID );
	}
   
	if ( ! empty( $blog_page ) || ! empty( $front_page ) ) {
	  update_option( 'show_on_front', 'page' );
	}
  }
  add_action( 'ocdi/after_import', 'tutorstarter_after_import_setup' );