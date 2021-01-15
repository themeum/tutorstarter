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

if ( ! function_exists( 'sanitize_select_range_value' ) ) {
	/**
	 * Sanitize values for select and range inputs.
	 *
	 * @param string $input Control input.
	 *
	 * @return float
	 */
	function sanitize_select_range_value( $input ) {
		$range_value            = json_decode( $input, true );
		$range_value['desktop'] = is_numeric( $range_value['desktop'] ) ? floatval( $range_value['desktop'] ) : '';
		$range_value['tablet']  = is_numeric( $range_value['tablet'] ) ? floatval( $range_value['tablet'] ) : '';
		$range_value['mobile']  = is_numeric( $range_value['mobile'] ) ? floatval( $range_value['mobile'] ) : '';
		return wp_json_encode( $range_value );

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
			// array(
			// 	'name'               => esc_html__( 'Tutor LMS – eLearning and online course solution', 'tutorstarter' ),
			// 	'slug'               => 'tutor',
			// 	'required'           => true,
			// 	'version'            => '',
			// 	'force_activation'   => true,
			// 	'force_deactivation' => false,
			// 	'external_url'       => esc_url( 'https://downloads.wordpress.org/plugin/tutor.zip' ),
			// ),
			// array(
			// 	'name'               => esc_html__( 'Qubely - Advanced Gutenberg Blocks', 'tutorstarter' ),
			// 	'slug'               => 'qubely',
			// 	'required'           => false,
			// 	'version'            => '',
			// 	'force_activation'   => false,
			// 	'force_deactivation' => false,
			// 	'external_url'       => esc_url( 'https://downloads.wordpress.org/plugin/qubely.zip' ),
			// ),
			// array(
			// 	'name'               => esc_html__( 'One Click Demo Import', 'tutorstarter' ),
			// 	'slug'               => 'one-click-demo-import',
			// 	'required'           => false,
			// 	'version'            => '',
			// 	'force_activation'   => false,
			// 	'force_deactivation' => false,
			// 	'external_url'       => esc_url( 'https://downloads.wordpress.org/plugin/one-click-demo-import.2.6.1.zip' ),
			// ),
			// array(
			// 	'name'               => esc_html__( 'Cheetah Performance', 'tutorstarter' ),
			// 	'slug'               => 'cheetah',
			// 	'source'             => get_stylesheet_directory() . '/plugins/cheetah.zip',
			// 	'required'           => false,
			// 	'version'            => '',
			// 	'force_activation'   => false,
			// 	'force_deactivation' => false,
			// ),
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

add_action('wp_ajax_nopriv_ajaxregister', 'tutor_theme_ajax_register_new_user');
add_action('wp_ajax_ajaxregister', 'tutor_theme_ajax_register_new_user');

function tutor_theme_ajax_register_new_user() {	
	// check_ajax_referer( 'ajax-register-nonce', 'security' );
	$username 			= 	sanitize_text_field(isset( $_POST['username'] ) ? $_POST['username'] : '');
	$email 				= 	sanitize_text_field(isset( $_POST['email'] ) ? $_POST['email'] : '');
	$password 			= 	sanitize_text_field(isset( $_POST['password'] ) ? $_POST['password'] : '');
	$confirm_password 	= 	sanitize_text_field(isset( $_POST['confirm_password'] ) ? $_POST['confirm_password'] : '');
	if(!$username) {
		echo json_encode(array( 'loggedin' => false, 'message'=> __('Wrong!!! Username field is empty.','tutorstarter') ));
		die();
	}elseif(!$email) {
		echo json_encode(array( 'loggedin' => false, 'message'=> __('Wrong!!! Email field is empty.','tutorstarter') ));
		die();
	}elseif(!$password) {
		echo json_encode(array( 'loggedin' => false, 'message'=> __('Wrong!!! Password field is empty.','tutorstarter') ));
		die();
	}elseif(!$confirm_password) {
		echo json_encode(array( 'loggedin' => false, 'message'=> __('Wrong!!! Confirm Password field is empty.','tutorstarter') ));
		die();
	}else {
		if(username_exists($username)) {
			echo json_encode(array( 'loggedin' => false, 'message'=> __('Wrong!!! Username already exits.','tutorstarter') ));
			die();
		}elseif(!is_email($email)) {
			echo json_encode(array( 'loggedin' => false, 'message'=> __('Wrong!!! Email address is not correct.','tutorstarter') ));
			die();
		}elseif(email_exists($email)) {
			echo json_encode(array( 'loggedin' => false, 'message'=> __('Wrong!!! Email user already exits in this site.','tutorstarter') ));
			die();
		}elseif(strlen($password) <= 6) {
			echo json_encode(array( 'loggedin' => false, 'message'=> __('Wrong!!! Password must 7 character or more.','tutorstarter') ));
			die();
		}elseif( strcmp($password, $confirm_password) !== 0 ) {
			echo json_encode( array( 'loggedin' => false, 'message' => __('Wrong!!! Passwords do not match.') ));
			die();
		}else {
			$user_input = array (
				'user_login'     =>  $username,
				'display_name'   =>  $username,
				'user_email'     =>  $email,
				'user_pass'      =>  $password
			);
			$user_id = wp_insert_user( $user_input );
			if ( ! is_wp_error( $user_id ) ) {
				$login_data = array();  
				$login_data['user_login'] = $username;  
				$login_data['user_password'] = $password;  
				$login_data['remember'] = false;  
			
				$user_verify = wp_signon( $login_data, false );
			
				if ( is_wp_error($user_verify) ) {
					echo json_encode(array( 'loggedin' => false, 'message'=> __('Something went wrong!!!','tutorstarter') ));
					die();	
				} else {
					echo json_encode(array( 'loggedin' => true, 'message'=> __('Registration successful, redireting ... ... .. .','tutorstarter') ));
					die();
				}
			}else{
				echo json_encode(array('loggedin' => false, 'message'=> 'Wrong username or password.'));
				die();
			}
		}
	}
}


add_action('wp_ajax_nopriv_ajaxlogin', 'tutor_theme_ajax_login');
add_action('wp_ajax_ajaxlogin', 'tutor_theme_ajax_login');

function tutor_theme_ajax_login() {
	$email 				= 	sanitize_text_field(isset( $_POST['email'] ) ? $_POST['email'] : '');
	$password 			= 	sanitize_text_field(isset( $_POST['password'] ) ? $_POST['password'] : '');
	if(!$email) {
		echo json_encode(array( 'loggedin' => false, 'message'=> __('Wrong!!! Email field is empty.','tutorstarter') ));
		die();
	}elseif(!$password) {
		echo json_encode(array( 'loggedin' => false, 'message'=> __('Wrong!!! Password field is empty.','tutorstarter') ));
		die();
	} else {
		$login_data = array();  
		$login_data['user_login'] = $email;  
		$login_data['user_password'] = $password;  
		$login_data['remember'] = false;  
	
		$user_verify = wp_signon( $login_data, false );
	
		if ( is_wp_error($user_verify) ) {
			echo json_encode(array( 'loggedin' => false, 'message'=> __('Invalid login details','tutorstarter') ));
			die();			
		} else {
			echo json_encode(array( 'loggedin' => true, 'message'=> __('Signin successful, redireting ... ... .. .','tutorstarter') ));
			die();
		}
	}
}

/**
 * tutor starter header cart
 */

if ( ! function_exists( 'tutor_starter_header_cart' ) ) {
	function tutor_starter_header_cart() { ?>

		<svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M6 16C4.9 16 4.01 16.9 4.01 18C4.01 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16ZM0 0V2H2L5.6 9.59L4.25 12.04C4.09 12.32 4 12.65 4 13C4 14.1 4.9 15 6 15H18V13H6.42C6.28 13 6.17 12.89 6.17 12.75L6.2 12.63L7.1 11H14.55C15.3 11 15.96 10.59 16.3 9.97L19.88 3.48C19.96 3.34 20 3.17 20 3C20 2.45 19.55 2 19 2H4.21L3.27 0H0ZM16 16C14.9 16 14.01 16.9 14.01 18C14.01 19.1 14.9 20 16 20C17.1 20 18 19.1 18 18C18 16.9 17.1 16 16 16Z"
			/>
		</svg>
		<a id="mini-cart-count" class="tutor-cart-contents" href="<?php echo get_template_directory_uri() . '/cart' ?>" title="view your shopping cart">
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
		
		<a id="mini-cart-count" class="tutor-cart-contents" data-toggle="modal" href="<?php echo get_template_directory_uri() . '/cart' ?>" title="View your shopping cart">
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


/**
 * login with google
 */
add_action('wp_ajax_nopriv_ajaxgoogleauth', 'tutor_theme_ajax_googleauth');
add_action('wp_ajax_ajaxgoogleauth', 'tutor_theme_ajax_googleauth');

function tutor_theme_ajax_googleauth() {

	//echo json_encode( $_POST );
	$usermail = $_POST['useremail'];
    if( $usermail ){
        $userdata = get_user_by( 'email', $usermail );
        if(isset($userdata->ID)){
            wp_set_current_user( $userdata->ID );
            wp_set_auth_cookie( $userdata->ID );
            echo json_encode(array( 'loggedin' => true, 'message' => 'Login successful, redirecting...' ));
        }else{
            $user_name = substr( $usermail, 0, strpos( $usermail, '@' ));
            
            if( username_exists( $user_name ) ){
                while( 2 > 1 ){
                    $random     = substr( str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 2 );
                    $user_name  = $user_name + $random;
                    if( !username_exists( $user_name ) ){ break; }
                }
            }
            $user_input = array(
                'first_name'    =>  $_POST['userfirst'],
                'last_name'     =>  $_POST['userlast'],
                'user_login'    =>  $user_name,
                'user_email'    =>  $usermail,
              	'display_name'	=>  $user_name,
                'user_pass'     =>  NULL
            );
            $user_id = wp_insert_user( $user_input );
            if ( ! is_wp_error( $user_id ) ) {
                wp_set_current_user( $user_id );
                wp_set_auth_cookie( $user_id );
                echo json_encode(array( 'loggedin' => true, 'message' => 'Login successful, redirecting...' ));
            } else {
                echo json_encode(array('loggedin' => false, 'message' => 'Wrong username or password.'));
            }            
        }
        die();
    }
}

function google_footer_function_login_script() {
    $google_client_ID = '140541384047-gf7004n9f58kh18gns7692armduvmm62.apps.googleusercontent.com';
    $google_client_ID_script =  "<script type='text/javascript'> var google_client_ID = '{$google_client_ID}' </script>";
    ?>
	<script type="text/javascript">

		let googleSignInBtn = document.getElementById('gSignIn2');
		if(null !== googleSignInBtn) {
			startApp();
		}

        var googleUser = {};
        var startApp = function() {
            gapi.load('auth2', function(){
                // Retrieve the singleton for the GoogleAuth library and set up the client.
                auth2 = gapi.auth2.init({
                    //373496230444-uf119vqdp0hsrkujdjt6ucms3scp4v0d.apps.googleusercontent.com
                    client_id: google_client_ID,
                    cookiepolicy: 'single_host_origin',
                    // Request scopes in addition to 'profile' and 'email'
                    //scope: 'additional_scope'
                });
                attachSignin(document.getElementById('gSignIn2'));
            });
		};

		function attachSignin(element) {
			auth2.attachClickHandler(element, {},
                function(googleUser) {
					var profile = googleUser.getBasicProfile();
					var id_token = googleUser.getAuthResponse().id_token;
					console.log('google auth api ' + google_client_ID);
					//Google AJAX Login

					let request          =  new XMLHttpRequest();
					let ajaxurl          =  tutorstarter_vars.ajaxurl;
					let authRedirectUrl  =  tutorstarter_vars.authRedirectUrl;
					// let reg_status       =  document.querySelector('.signup-status');

					let data             =  new FormData();
					data.append('id_token', id_token);
					data.append('useremail', profile.getEmail());
					data.append('userfirst', profile.getGivenName());
					data.append('userlast', profile.getFamilyName());
					data.append('action', 'ajaxgoogleauth');

					request.open("POST", ajaxurl);
					
					request.onreadystatechange = function(data) {
						if(this.readyState === 4 && this.status === 200) {
							let response = JSON.parse(this.responseText);
							let reg_status  =  document.querySelector('.signup-status');
							if(null !== reg_status) {
								reg_status.style.visibility = "visible";
								if (response.loggedin == true) {
									reg_status.style.color = "#4285F4";
									reg_status.innerText = response.message;
									window.location.replace(authRedirectUrl);
								} else {
									reg_status.style.color = "#dc3545";
									reg_status.innerText = response.message;
								}
							}
						}
					};
					request.send(data);

                }, function(error) {
                    alert(JSON.stringify(error, undefined, 2));
                });
		}
		
	</script>
<?php }

add_action( 'wp_footer', 'google_footer_function_login_script' );

if($google_client_ID){
    add_action('wp_enqueue_scripts','load_google_login_script');
}

add_action('wp_enqueue_scripts', 'load_google_login_script');

if( ! function_exists('load_google_login_script')){
	function load_google_login_script(){
		wp_enqueue_script( 'google-login-api-client', 'https://apis.google.com/js/api:client.js', array(), false, false );
	}
}