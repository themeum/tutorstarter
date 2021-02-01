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

		if ( 'header_four' !== $header_type ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'control_active_cart_callback' ) ) {
	/**
	 * Control active cart callback
	 */
	function control_active_cart_callback() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );
		if ( class_exists( 'woocommerce' ) && 'header_one' === $header_type ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'control_active_cart_trans_callback' ) ) {
	/**
	 * Control active cart transparent callback
	 */
	function control_active_cart_trans_callback() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );
		if ( class_exists( 'woocommerce' ) && 'header_one_trans' === $header_type ) {
			return true;
		} else {
			return false;
		}
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
	 * Control active callback for transparent menu color
	 */
	function control_active_callback_search() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );
		if ( 'header_four' === $header_type ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'control_active_callback_std_menu' ) ) {
	/**
	 * Control active callback for std menu color
	 */
	function control_active_callback_std_menu() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );
		if ( 'header_one' === $header_type ) {
			return true;
		} elseif ( 'header_two' === $header_type ) {
			return true;
		} elseif ( 'header_four' === $header_type ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'control_active_callback_transparent' ) ) {
	/**
	 * Control active callback for transparent header
	 */
	function control_active_callback_transparent() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );
		if ( 'header_one_trans' === $header_type ) {
			return true;
		} elseif ( 'header_three' === $header_type ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'control_active_callback_non_trans' ) ) {
	/**
	 * Control active callback for transparent header
	 */
	function control_active_callback_non_trans() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );
		if ( 'header_one' == $header_type ) {
			return true;
		} elseif ( 'header_two' === $header_type ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'tutorstarter_sanitize_color' ) ) {
	/**
	 * Sanitize colors.
	 *
	 * @param array $value The color.
	 * 
	 * @return array
	 */
	function tutorstarter_sanitize_color( $value ) {
		return $value;
	}
}

if ( ! function_exists( 'control_active_callback_footer_layout' ) ) {
	/**
	 * Control active callback for footer layouts except five
	 */
	function control_active_callback_footer_layout() {
		// Get the appropriate theme mod.
		$selected_footer = get_theme_mod( 'footer_type_select' );
		if ( 'footer_five' === $selected_footer ) {
			return false;
		}
		return true;
	}
}

if ( ! function_exists( 'control_active_callback_footer_logo_trans' ) ) {
	/**
	 * Control active callback for footer transparent logo
	 */
	function control_active_callback_footer_logo_trans() {
		// Get the appropriate theme mod.
		$selected_footer = get_theme_mod( 'footer_type_select' );
		if ( 'footer_five' === $selected_footer ) {
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

if ( ! function_exists( 'sanitize_select_range_value' ) ) {
	/**
	 * Sanitize values for select and range inputs.
	 *
	 * @param string|int $input Control input.
	 *
	 * @return string|int
	 */
	function sanitize_select_range_value( $input ) {
	
		return $input;
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

if ( ! function_exists( 'tutorstarter_post_pagination' ) ) {
	/**
	 * Custom pagination
	 */
	function tutorstarter_post_pagination() {
	  global $wp_query;
	  $paged = 999999999; // need an unlikely integer
  
		 echo paginate_links( array(
			  'base' => str_replace( $paged, '%#%', esc_url( get_pagenum_link( $paged ) ) ),
			  'format' => '?paged=%#%',
			  'current' => max( 1, get_query_var('paged') ),
			  'mid_size' => 2,
			  'prev_text' => __( '<', 'tutorstarter' ),
			  'next_text' => __( '>', 'tutorstarter' ),
			  'total' => $wp_query->max_num_pages
		 ) );
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
				'name'               => esc_html__( 'Tutormate', 'tutorstarter' ),
				'slug'               => 'tutormate',
				'required'           => false,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => esc_url( '' ), //@TODO Will be added later.
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

/**
 * Tutor starter ajax signup
 */
add_action( 'wp_ajax_nopriv_ajaxregister', 'tutor_theme_ajax_register_new_user' );

function tutor_theme_ajax_register_new_user() {	
	if ( ! check_ajax_referer( 'tutor-starter-signup-nonce','signupNonce' ) ) {
		echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Cheating huh?', 'tutorstarter' ) ) );
		die();
	}
	$username 		  = isset( $_POST['username'] ) ? sanitize_text_field( $_POST['username'] ) : '';
	$email 			  = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$password 		  = isset( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '';
	$confirm_password = isset( $_POST['confirm_password'] ) ? sanitize_text_field( $_POST['confirm_password'] ) : '';

	if ( ! $username ) {
		echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Please provide a username.', 'tutorstarter' ) ) );
		die();
	} elseif ( ! $email ) {
		echo json_encode( array( 'loggedin' => false, 'message'=> __( 'A valid email is required.', 'tutorstarter' ) ) );
		die();
	} elseif ( ! $password ) {
		echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Please provide a strong password.', 'tutorstarter' ) ) );
		die();
	} elseif ( ! $confirm_password ) {
		echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Please confirm the password.', 'tutorstarter' ) ) );
		die();
	} else {
		if ( username_exists( $username ) ) {
			echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Username already exists.', 'tutorstarter' ) ) );
			die();
		} elseif (! is_email( $email ) ) {
			echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Email address is not valid.', 'tutorstarter' ) ) );
			die();
		} elseif ( email_exists( $email ) ) {
			echo json_encode( array( 'loggedin' => false, 'message'=> __( 'This Email already exists.', 'tutorstarter' ) ) );
			die();
		} elseif ( strlen( $password ) <= 6 ) {
			echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Password must be 7 characters or more.', 'tutorstarter' ) ) );
			die();
		} elseif ( strcmp( $password, $confirm_password ) !== 0 ) {
			echo json_encode( array( 'loggedin' => false, 'message' => __( 'Password does not match.', 'tutorstarter' ) ) );
			die();
		} else {
			$user_input = array (
				'user_login'   =>  $username,
				'display_name' =>  $username,
				'user_email'   =>  $email,
				'user_pass'    =>  $password
			);

			$user_id = wp_insert_user( $user_input );
			if ( ! is_wp_error( $user_id ) ) {
				$login_data                  = array();  
				$login_data['user_login']    = $username;  
				$login_data['user_password'] = $password;  
				$login_data['remember']      = false;  
			
				$user_verify = wp_signon( $login_data, false );
			
				if ( is_wp_error( $user_verify ) ) {
					echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Something went wrong! Please try again later.', 'tutorstarter' ) ) );
					die();
				} else {
					echo json_encode( array( 'loggedin' => true, 'message'=> __( 'Registration successful, redirecting...', 'tutorstarter' ) ) );
					die();
				}
			} else {
				echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Incorrect username or password.', 'tutorstarter' ) ) );
				die();
			}
		}
	}
}
/**
 * Tutor starter ajax signin
 */
add_action('wp_ajax_nopriv_ajaxlogin', 'tutor_theme_ajax_login');

function tutor_theme_ajax_login() {
	if ( ! check_ajax_referer( 'tutor-starter-signin-nonce', 'signinNonce' ) ) {
		echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Cheating huh?', 'tutorstarter') ) );
		die();
	}
	$email 	  = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$password = isset( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '';
	
	if ( ! $email ) {
		echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Email is not valid.', 'tutorstarter' ) ) );
		die();
	} elseif ( ! $password ) {
		echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Password field is empty.', 'tutorstarter' ) ) );
		die();
	} else {
		$login_data                  = array();  
		$login_data['user_login']    = $email;
		$login_data['user_password'] = $password;
		$login_data['remember']      = false;
	
		$user_verify = wp_signon( $login_data, false );
	
		if ( is_wp_error( $user_verify ) ) {
			echo json_encode( array( 'loggedin' => false, 'message'=> __( 'Invalid login details', 'tutorstarter' ) ) );
			die();			
		} else {
			echo json_encode( array( 'loggedin' => true, 'message'=> __( 'Signin successful, redirecting...', 'tutorstarter' ) ) );
			die();
		}
	}
}

/**
 * Tutor starter header cart
 */
if ( ! function_exists( 'tutor_starter_header_cart' ) ) {
	function tutor_starter_header_cart() { ?>

		<svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M6 16C4.9 16 4.01 16.9 4.01 18C4.01 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16ZM0 0V2H2L5.6 9.59L4.25 12.04C4.09 12.32 4 12.65 4 13C4 14.1 4.9 15 6 15H18V13H6.42C6.28 13 6.17 12.89 6.17 12.75L6.2 12.63L7.1 11H14.55C15.3 11 15.96 10.59 16.3 9.97L19.88 3.48C19.96 3.34 20 3.17 20 3C20 2.45 19.55 2 19 2H4.21L3.27 0H0ZM16 16C14.9 16 14.01 16.9 14.01 18C14.01 19.1 14.9 20 16 20C17.1 20 18 19.1 18 18C18 16.9 17.1 16 16 16Z"
			/>
		</svg>
		<a id="mini-cart-count" class="tutor-cart-contents" href="/cart" title="view your shopping cart">
			<span class="count">
				<?php 
					echo wp_kses_data( 
						sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'tutorstarter' ), 
						WC()->cart->get_cart_contents_count() )
					);
				?>
			</span>
		</a>
        <?php
    }
}

/**
 * Cart Fragments
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'tutor_starter_cart_link_fragment' );
if ( ! function_exists( 'tutor_starter_cart_link_fragment' ) ) {
    function tutor_starter_cart_link_fragment( $fragments ) {
        global $woocommerce;
		ob_start(); ?>
		
		<a id="mini-cart-count" class="tutor-cart-contents" data-toggle="modal" href="/cart" title="View your shopping cart">
			<span class="count">
				<?php 
					echo wp_kses_data( 
						sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'tutorstarter' ), 
						WC()->cart->get_cart_contents_count() )
					);
				?>
			</span>
		</a>
          
        <?php
        $fragments['#mini-cart-count'] = ob_get_clean();
        return $fragments;
    }
}