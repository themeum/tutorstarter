<?php
/**
 * Helpers methods
 * List of all functions for global use
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

add_action( 'tgmpa_register', 'tutorstarter_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function tutorstarter_register_required_plugins() {

	// Array of plugin arrays. Required keys are name and slug.
	$plugins = array(
		array(
			'name'     => 'TutorMate',
			'slug'     => 'tutormate',
			'required' => false,
		),
	);

	// Array of configuration settings.
	$config = array(
		'id'           => 'tutorstarter',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
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
		if ( class_exists( 'WooCommerce' ) && 'header_default' === $header_type ) {
			return true;
		} elseif ( class_exists( 'WooCommerce' ) && 'header_right' === $header_type ) {
			return true;
		} elseif ( class_exists( 'WooCommerce' ) && 'header_fullwidth' === $header_type ) {
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
		if ( class_exists( 'WooCommerce' ) && 'header_transparent' === $header_type ) {
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

if ( ! function_exists( 'control_active_callback_std_menu' ) ) {
	/**
	 * Control active callback for std menu color
	 */
	function control_active_callback_std_menu() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );
		if ( 'header_default' === $header_type ) {
			return true;
		} elseif ( 'header_right' === $header_type ) {
			return true;
		} elseif ( 'header_fullwidth' === $header_type ) {
			return true;
		} elseif ( 'header_fullwidth_center' === $header_type ) {
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
		if ( 'header_transparent' === $header_type ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'control_active_callback_sticky_header' ) ) {
	/**
	 * Control active callback for sticky header bg
	 */
	function control_active_callback_sticky_header() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );
		$header_sticky_on = get_theme_mod( 'header_sticky_toggle' );
		if ( true === $header_sticky_on && 'header_transparent' === $header_type ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'control_active_callback_non_trans' ) ) {
	/**
	 * Control active callback for non-transparent header
	 */
	function control_active_callback_non_trans() {
		// Get the appropriate theme mod.
		$header_type = get_theme_mod( 'header_type_select' );
		if ( 'header_default' == $header_type ) {
			return true;
		} elseif ( 'header_right' === $header_type ) {
			return true;
		} elseif ( 'header_fullwidth' === $header_type ) {
			return true;
		} elseif ( 'header_fullwidth_center' === $header_type ) {
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
		if ( 'footer_five' === $selected_footer || 'footer_six' === $selected_footer ) {
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
		if ( 'footer_five' === $selected_footer || 'footer_six' === $selected_footer ) {
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
add_action( 'wp_ajax_nopriv_ajaxlogin', 'tutor_theme_ajax_login' );

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
		<span class="btn-cart">
			<svg
				xmlns="http://www.w3.org/2000/svg"
				fill="none"
				height="19"
				viewBox="0 0 21 19"
				width="21"
			>
				<path
					d="m18.9375 10.832 1.6523-7.31247c.0704-.25781.0235-.49219-.1406-.70312-.164-.21094-.3867-.31641-.668-.31641h-13.81636l-.3164-1.582031c-.04688-.1875-.15235-.339844-.31641-.457031-.14062-.140626-.30469-.210938-.49219-.210938h-3.62109c-.234375 0-.433594.082031-.597656.246094-.164063.164062-.246094.363281-.246094.597656v.5625c0 .23438.082031.43359.246094.59766.164062.16406.363281.24609.597656.24609h2.46094l2.46093 12.0586c-.30468.1875-.55078.4336-.73828.7383-.16406.3047-.24609.6328-.24609.9843 0 .5391.1875.9961.5625 1.3711.39844.3985.86719.5977 1.40625.5977s.99609-.1992 1.37109-.5977c.39844-.375.59766-.8437.59766-1.4062 0-.5391-.19922-.9961-.59766-1.3711h7.38281c-.3984.375-.5977.832-.5977 1.3711 0 .5625.1876 1.0312.5626 1.4062.3984.3985.8671.5977 1.4062.5977s.9961-.1992 1.3711-.5977c.3984-.375.5977-.832.5977-1.3711 0-.375-.1055-.7148-.3165-1.0195-.1875-.3281-.457-.5742-.8085-.7383l.2109-.8789c.0469-.2578-.0117-.4922-.1758-.7031s-.375-.3164-.6328-.3164h-9.45704l-.21094-1.125h10.30078c.1875 0 .3516-.0586.4922-.1758.1641-.1172.2695-.2812.3164-.4922z"
					
				/>
			</svg>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'tutorstarter' ); ?>">
				<span>(<?php echo WC()->cart->get_cart_contents_count(); ?>)</span>
			</a>
		</span>
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
		
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'tutorstarter' ); ?>">
			<span>(<?php echo WC()->cart->get_cart_contents_count(); ?>)</span>
		</a>
          
        <?php
        $fragments['a.cart-contents'] = ob_get_clean();
        return $fragments;
    }
}

/**
 * Changing order button html output
 */
add_filter( 'woocommerce_order_button_html', 'tutorstarter_order_btn_html' );

if ( ! function_exists( 'tutorstarter_order_btn_html' ) ) {
 
	function tutorstarter_order_btn_html( $button ) {
		
		$order_button_text = __( 'Complete Payment', 'tutorstarter' );

		$button = '<input type="submit" class="checkout-order-button checkout-button" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />';
		
		return $button;
	}
}

/**
 * Header switcher
 */
function tutorstarter_header_switcher() {
	$page_meta            = get_post_meta( get_the_ID(), '_tutorstarter_page_metadata', true );
	$trans_header_toggle  = ( ! empty( $page_meta['header_trans_toggle'] ) ? $page_meta['header_trans_toggle'] : false );

	$selected_header     = get_theme_mod( 'header_type_select', 'header_default' );
	$active_header_class = 'navbar-center';

	if ( ! empty( $trans_header_toggle ) && true === $trans_header_toggle ) {
		$active_header_class = 'navbar-left';
	} else {
		switch ( $selected_header ) {
			case 'header_default':
				$active_header_class = 'navbar-center';
				break;
			case 'header_transparent':
				$active_header_class = 'navbar-left';
				break;
			case 'header_right':
				$active_header_class = 'navbar-right';
				break;
			case 'header_fullwidth':
				$active_header_class = 'navbar-right full-width';
				break;
			case 'header_fullwidth_center':
				$active_header_class = 'navbar-center full-width';
				break;
		}
	}

	return $active_header_class;
}

/**
 * Site logo parser
 */
if ( ! function_exists( 'tutorstarter_site_logo' ) ) {
	function tutorstarter_site_logo() {
        $logo          = get_theme_mod( 'custom_logo' );
        $logo_img      = ! empty( $logo ) ? wp_get_attachment_image_url( $logo, 'full' ) : false;
        $logo_retina   = get_theme_mod( 'retina_logo' );
		$retina_imgset = 'srcset="' . esc_url( $logo_retina ) . ' 1x, ' . esc_url( $logo_retina ) . ' 2x"';
        
		if ( $logo_img ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo esc_url( $logo_img ); ?>" <?php echo $logo_retina ?  $retina_imgset : ''; ?> alt="<?php printf( esc_attr__( '%s', 'tutorstarter' ), bloginfo( 'name' ) ); ?>" />
            </a>
        <?php else : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'title' ); ?>
            </a>
        <?php endif; 
	}
}

/**
 * Transparent logo parser
 */
if ( ! function_exists( 'tutorstarter_transparent_logo' ) ) {
	function tutorstarter_transparent_logo() {
		$logo          = get_theme_mod( 'transparent_logo' );
        $logo_retina   = get_theme_mod( 'retina_trans_logo' );
		$retina_imgset = 'srcset="' . esc_url( $logo_retina ) . ' 1x, ' . esc_url( $logo_retina ) . ' 2x"';

        if ( $logo ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo esc_url( $logo ); ?>" <?php echo $logo_retina ?  $retina_imgset : ''; ?> alt="<?php printf( esc_attr__( '%s', 'tutorstarter' ), bloginfo( 'name' ) ); ?>" />
            </a>
        <?php else : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'title' ); ?>
			</a>
        <?php endif; 
	}
}

/**
 * Footer logo parser
 */
if ( ! function_exists( 'tutorstarter_footer_logo' ) ) {
	function tutorstarter_footer_logo() {
		$footer_logo   = get_theme_mod( 'footer_logo' );
		$logo_retina   = get_theme_mod( 'footer_retina_logo' );
		$retina_imgset = 'srcset="' . esc_url( $logo_retina ) . ' 1x, ' . esc_url( $logo_retina ) . ' 2x"';
		if ( ! empty( $footer_logo ) ) : ?>
			<img height="24" width="92" class="logo-footer" src="<?php echo esc_url( $footer_logo ); ?>" <?php echo $logo_retina ?  $retina_imgset : ''; ?> alt="<?php echo esc_attr( bloginfo( 'name' ) ) ?>">
		<?php endif;
	}
}

/**
 * Footer transparent logo parser
 */
if ( ! function_exists( 'tutorstarter_footer_trans_logo' ) ) {
	function tutorstarter_footer_trans_logo() {
		$footer_logo_trans = get_theme_mod( 'footer_logo_trans' );
		$logo_retina       = get_theme_mod( 'footer_retina_trans_logo' );
		$retina_imgset     = 'srcset="' . esc_url( $logo_retina ) . ' 1x, ' . esc_url( $logo_retina ) . ' 2x"';
		if ( ! empty( $footer_logo_trans ) ) : ?>
			<img height="24" width="92" class="logo-footer trans" src="<?php echo esc_url( $footer_logo_trans ); ?>" <?php echo $logo_retina ?  $retina_imgset : ''; ?> alt="<?php echo esc_attr( bloginfo( 'name' ) ) ?>">
		<?php endif;
	}
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function tutorstarter_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'tutorstarter_skip_link_focus_fix' );