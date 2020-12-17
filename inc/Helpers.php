<?php
/**
 * Helpers methods
 * List all static functions for global use
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'starts_with' ) ) {
	/**
	 * Determine if a given string starts with a given substring.
	 *
	 * @param string       $haystack search arg.
	 * @param string|array $needles search term.
	 * @return bool
	 */
	function starts_with( $haystack, $needles ) {
		foreach ( (array) $needles as $needle ) {
			if ( '' !== $needle && substr( $haystack, 0, strlen( $needle ) ) === (string) $needle ) {
				return true;
			}
		}
		return false;
	}
}

if ( ! function_exists( 'control_active_callback' ) ) {
	/**
	 * Control active callback
	 */
	function control_active_callback() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );

		if ( 'header_one' === $header_type ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'control_active_callback_meta' ) ) {
	/**
	 * Control active callback for post meta
	 */
	function control_active_callback_meta() {
		// Get the appropriate theme mod.
		$is_active_meta = get_theme_mod( 'blog_meta_toggle' );

		if ( $is_active_meta ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'control_active_callback_grid' ) ) {
	/**
	 * Control active callback for layout grid
	 */
	function control_active_callback_grid() {
		// Get the appropriate theme mod.
		$is_active_grid = get_theme_mod( 'blog_layout_select' );

		if ( 'grid_view' === $is_active_grid ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'control_active_callback_search' ) ) {
	/**
	 * Control active callback for search icon
	 */
	function control_active_callback_search() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );
		if ( 'header_one' !== $header_type ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'control_active_callback_footer_logo' ) ) {
	/**
	 * Control active callback for footer logo
	 */
	function control_active_callback_footer_logo() {
		// Get the appropriate theme mod.
		$is_enabled = get_theme_mod( 'footer_logo_toggle' );
		if ( true === $is_enabled ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'sanitize_range_value' ) ) {
	/**
	 * Sanitize values for range inputs.
	 *
	 * @param string $input Control input.
	 *
	 * @return float
	 */
	function sanitize_range_value( $input ) {
		$range_value            = json_decode( $input, true );
		$range_value['desktop'] = is_numeric( $range_value['desktop'] ) ? floatval( $range_value['desktop'] ) : '';
		$range_value['tablet']  = is_numeric( $range_value['tablet'] ) ? floatval( $range_value['tablet'] ) : '';
		$range_value['mobile']  = is_numeric( $range_value['mobile'] ) ? floatval( $range_value['mobile'] ) : '';
		return wp_json_encode( $range_value );
	}
}

if ( ! function_exists( 'sanitize_select_radio' ) ) {
	/**
	 * Control sanitize select and radio callback
	 */
	function sanitize_select_radio( $input, $setting ) {
		$input   = sanitize_key( $input );
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

if ( ! function_exists( 'sanitize_fonts' ) ) {
	/**
	 * Control sanitize fonts callback
	 */
	function sanitize_fonts( $input ) {
		return $input;
	}
}

if ( ! function_exists( 'allowed_html' ) ) {
	/**
	 * Permitted htl tags list
	 *
	 * @return array array of allowed html tags.
	 */
	function allowed_html() {
		$allowed_html = array(
			'a'      => array(
				'href'  => array(),
				'title' => array(),
			),
			'strong' => array(),
			'&copy'  => array(),
		);

		return $allowed_html;
	}
}

if ( ! function_exists( 'mix' ) ) {
	/**
	 * Get the path to a versioned Mix file.
	 *
	 * @param  string $path path of arg.
	 * @param  string $manifest_directory manifest.json.
	 * @return \Illuminate\Support\HtmlString
	 *
	 * @throws \Exception Throws exception.
	 */
	function mix( $path, $manifest_directory = '' ) {

		global $wp_filesystem;

		require_once ABSPATH . '/wp-admin/includes/file.php';
		WP_Filesystem();

		if ( ! $manifest_directory ) {
			// Setup path for standard Tutor_Starter-Folder-Structure.
			$manifest_directory = 'assets/dist/';
		}
		static $manifest;
		if ( ! starts_with( $path, '/' ) ) {
			$path = "/{$path}";
		}
		if ( $manifest_directory && ! starts_with( $manifest_directory, '/' ) ) {
			$manifest_directory = "/{$manifest_directory}";
		}
		$root_dir = dirname( __FILE__, 2 );
		if ( file_exists( $root_dir . '/' . $manifest_directory . '/hot' ) ) {
			return getenv( 'WP_SITEURL' ) . ':8080' . $path;
		}
		if ( ! $manifest ) {
			$manifest_path = $root_dir . $manifest_directory . 'mix-manifest.json';
			if ( ! file_exists( $manifest_path ) ) {
				throw new Exception( 'The Mix manifest does not exist.' );
			}
			$manifest = json_decode( $wp_filesystem->get_contents( $manifest_path ), true );
		}

		if ( starts_with( $manifest[ $path ], '/' ) ) {
			$manifest[ $path ] = ltrim( $manifest[ $path ], '/' );
		}

		$path = $manifest_directory . $manifest[ $path ];

		return get_template_directory_uri() . $path;
	}
}

if ( ! function_exists( 'assets' ) ) {
	/**
	 * Easily point to the assets dist folder.
	 *
	 * @param  string $path as arg.
	 */
	function assets( $path ) {
		if ( ! $path ) {
			return;
		}

		echo esc_attr( get_template_directory_uri() . '/assets/dist/' . $path );
	}
}

if ( ! function_exists( 'svg' ) ) {
	/**
	 * Easily point to the assets dist folder.
	 *
	 * @param string $path as arg.
	 */
	function svg( $path ) {
		if ( ! $path ) {
			return;
		}

		echo esc_attr( get_template_part( 'assets/dist/svg/inline', $path . '.svg' ) );
	}
}

/**
 * TGMPA Plugin Activation
 */
add_action( 'tgmpa_register', 'tutorstarter_plugin_activation' );

if ( ! function_exists( 'tutorstarter_plugin_activation' ) ) :

	/**
	 * Plugin activation
	 *
	 * @return void
	 */
	function tutorstarter_plugin_activation() {
		$plugins = array(
			array(
				'name'               => esc_html__( 'Tutor LMS – eLearning and online course solution', 'tutorstarter' ),
				'slug'               => 'tutor',
				'required'           => true,
				'version'            => '',
				'force_activation'   => true,
				'force_deactivation' => false,
				'external_url'       => esc_url( 'https://downloads.wordpress.org/plugin/tutor.zip' ),
			),
			array(
				'name'               => esc_html__( 'Qubely - Advanced Gutenberg Blocks', 'tutorstarter' ),
				'slug'               => 'qubely',
				'required'           => false,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => esc_url( 'https://downloads.wordpress.org/plugin/qubely.zip' ),
			),
			array(
				'name'               => esc_html__( 'One Click Demo Import', 'tutorstarter' ),
				'slug'               => 'one-click-demo-import',
				'required'           => false,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => esc_url( 'https://downloads.wordpress.org/plugin/one-click-demo-import.2.6.1.zip' ),
			),
			array(
				'name'               => esc_html__( 'Cheetah Performance', 'tutorstarter' ),
				'slug'               => 'cheetah',
				'source'             => get_stylesheet_directory() . '/plugins/cheetah.zip',
				'required'           => false,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
			),
		);

		$config = array(
			'id'               => 'tutorstarter',
			'default_path'     => '',
			'parent_menu_slug' => 'themes.php',
			'parent_url_slug'  => 'themes.php',
			'menu'             => 'install-required-plugins',
			'has_notices'      => true,
			'is_automatic'     => false,
			'message'          => '',
			'strings'          => array(
				'page_title'       => esc_html__( 'Install Required Plugins', 'tutorstarter' ),
				'menu_title'       => esc_html__( 'Install Plugins', 'tutorstarter' ),
				// Translators: installing plugin translation.
				'installing'       => esc_html__( 'Installing Plugin: %s', 'tutorstarter' ),
				'oops'             => esc_html__( 'Something went wrong with the plugin API.', 'tutorstarter' ),
				'return'           => esc_html__( 'Return to Required Plugins Installer', 'tutorstarter' ),
				'plugin_activated' => esc_html__( 'Plugin activated successfully.', 'tutorstarter' ),
				// Translators: plugin installation complete translation.
				'complete'         => esc_html__( 'All plugins installed and activated successfully. %s', 'tutorstarter' ),
			),
		);

		tgmpa( $plugins, $config );
	}
endif;



