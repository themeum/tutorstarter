<?php
/**
 * Handles registering header components
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Traits;

defined( 'ABSPATH' ) || exit;

/**
 * Header components trait
 */
trait Header_Components {

	/**
	 * Navbar toggler
	 */
	public static function navbar_toggler() {
		$toggler_html = '<li class="nav-close"><button class="btn-nav-close"><span class="close-btn">+</span></button></li>';
		return $toggler_html;
	}

	/**
	 * Tutor multi-column dropdown menu
	 */
	public static function tutor_multi_column_dropdown() {
		if ( ! class_exists( '\TUTOR\Utils' ) ) {
			return; // @todo: cross check
		}

		$default_menus = self::default_menus();
		$current_user  = wp_get_current_user();
		?>
		<div class="tutor-header-profile-photo">
			<?php
			$profile_pic = tutor_utils()->get_tutor_avatar( get_current_user_id() );
			?>
		</div><!-- .tutor-header-profile-photo -->
		<div class="tutor-header-profile-content">
			<div class="tutor-header-profile-submenu">
				<?php echo $profile_pic; ?>
				<span role="button" class="d-flex align-items-center gap-1 fs-5 py-3 text-black-80" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
					<?php echo esc_html( ucfirst( $current_user->display_name ) ); ?>
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.11285 6.29697L8.17285 9.3503L11.2329 6.29697L12.1729 7.23697L8.17285 11.237L4.17285 7.23697L5.11285 6.29697Z" fill="currentColor"></path>
					</svg>
				</span>
			</div>
		</div>
		<div class="tutor-header-submenu">
			<?php if ( is_user_logged_in() ) : ?>
				<div class="tutor-submenu-links">
					<ul>
						<div class="profile-name">
							<?php echo esc_html( ucfirst( $current_user->display_name ) ); ?>
						</div>
						<?php
						foreach ( $default_menus as $menu_key => $menu_item ) {
							$menu_title = $menu_item;
							$menu_link  = tutor_utils()->get_tutor_dashboard_page_permalink( $menu_key );
							if ( is_array( $menu_item ) ) {
								$menu_title = tutor_utils()->array_get( 'title', $menu_item );
								if ( isset( $menu_item['url'] ) ) {
									$menu_link = $menu_item['url'];
								}
							}
							if ( 'index' === $menu_key ) {
								$menu_key = '';
							}
							ob_start();
							?>
							<li>
								<a href="<?php echo esc_url( $menu_link ); ?>">
									<span class="tutor-dashboard-menu-item-icon tutor-d-flex" aria-hidden="true">
										<?php echo isset( $menu_item['icon'] ) ? $menu_item['icon'] : ''; ?>
									</span>
									<?php echo esc_html( $menu_title ); ?>
								</a>
							</li>
							<?php
							$menu_list_item = ob_get_clean();
							echo $menu_list_item;
						}
						?>
					</ul>
				</div>
			<?php else : ?>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * Filtered nav items based on capabilities
	 *
	 * @return array
	 */
	public static function filtered_nav() {
		if ( ! class_exists( '\TUTOR\Utils' ) ) {
			return;
		}

		$instructor_menu = apply_filters( 'tutor_dashboard/instructor_nav_items', tutor_utils()->instructor_menus() );
		$common_navs     = array(
			'dashboard-page' => array(
				'title' => __( 'Dashboard', 'tutorstarter' ),
				'icon'  => 'tutor-icon-settings',
			),
			'settings'       => array(
				'title' => __( 'Account Settings', 'tutorstarter' ),
				'icon'  => 'tutor-icon-settings',
			),
			'logout'         => array(
				'title' => __( 'Logout', 'tutorstarter' ),
				'icon'  => 'tutor-icon-signout',
			),
		);

		$all_nav_items = array_merge( $instructor_menu, $common_navs );

		foreach ( $all_nav_items as $nav_key => $nav_item ) {

			if ( is_array( $nav_item ) ) {

				if ( isset( $nav_item['show_ui'] ) && ! tutor_utils()->array_get( 'show_ui', $nav_item ) ) {
					unset( $all_nav_items[ $nav_key ] );
				}

				if ( isset( $nav_item['auth_cap'] ) && ! current_user_can( $nav_item['auth_cap'] ) ) {
					unset( $all_nav_items[ $nav_key ] );
				}
			}
		}

		return $all_nav_items;
	}

	/**
	 * Check role
	 *
	 * @return bool
	 */
	public static function is_user_priviledged() {
		$user_is_priviledged = false;
		$current_user        = wp_get_current_user();
		$predefined_roles    = apply_filters(
			'tutor_user_is_priviledged',
			array(
				'administrator',
				'tutor_instructor',
			)
		);

		if ( array_intersect( $current_user->roles, $predefined_roles ) ) {
			$user_is_priviledged = true;
		} else {
			$user_is_priviledged = false;
		}

		return $user_is_priviledged;
	}

	/**
	 * Default Menus
	 */
	public static function default_menus() {
		$icons = self::header_submenu_icon_svgs();

		if ( ! self::tutor_version_compare( 4 ) ) {
			return array(
				''           => array(
					'title' => __( 'Dashboard', 'tutorstarter' ),
					'icon'  => $icons['dashboard'],
				),
				'my-profile' => array(
					'title' => __( 'My profile', 'tutorstarter' ),
					'icon'  => $icons['profile'],
				),
				'settings'   => array(
					'title' => __( 'Account Settings', 'tutorstarter' ),
					'icon'  => $icons['settings'],
				),
				'logout'     => array(
					'title' => __( 'Logout', 'tutorstarter' ),
					'icon'  => $icons['logout'],
				),
			);
		}

		return array(
			''                  => array(
				'title' => __( 'Dashboard', 'tutorstarter' ),
				'icon'  => $icons['dashboard'],
			),
			'account/profile/'  => array(
				'title' => __( 'My profile', 'tutorstarter' ),
				'icon'  => $icons['profile'],
			),
			'account/settings/' => array(
				'title' => __( 'Account Settings', 'tutorstarter' ),
				'icon'  => $icons['settings'],
			),
			'logout'            => array(
				'title' => __( 'Logout', 'tutorstarter' ),
				'icon'  => $icons['logout'],
				'url'   => wp_logout_url( tutor_utils()->tutor_dashboard_url() ),
			),
		);
	}

	/**
	 * Inline SVG markup for header profile submenu items (unique clip-path ids per icon).
	 *
	 * @return array{dashboard:string,profile:string,settings:string,logout:string}
	 */
	private static function header_submenu_icon_svgs() {
		return array(
			'dashboard' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><g fill="currentColor" fill-rule="evenodd" clip-path="url(#tutor-hdr-submenu-dash-clip)" clip-rule="evenodd"><path d="M0 9.6a8 8 0 0 1 16 0c0 1.718-.537 3.417-1.618 4.662a.4.4 0 1 1-.604-.524C14.71 12.664 15.2 11.162 15.2 9.6a7.2 7.2 0 0 0-14.4 0c0 1.562.49 3.064 1.422 4.138a.4.4 0 0 1-.604.524C.538 13.017 0 11.318 0 9.6"/><path d="M10.99 4.048a.4.4 0 0 1 .162.542L8.92 8.734c-.244.454-.948.075-.704-.379l2.232-4.145a.4.4 0 0 1 .542-.162"/><path d="M8 8.8a.8.8 0 1 0 0 1.6.8.8 0 0 0 0-1.6m-1.6.8a1.6 1.6 0 1 1 3.2 0 1.6 1.6 0 0 1-3.2 0"/></g><defs><clipPath id="tutor-hdr-submenu-dash-clip"><path fill="currentColor" d="M0 0h16v16H0z"/></clipPath></defs></svg>',
			'profile'   => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><g clip-path="url(#tutor-hdr-submenu-profile-clip)"><path fill="currentColor" fill-rule="evenodd" d="M14.86 16c1.164 0 1.577-1.54.57-2.124-1.53-.882-3.259-1.344-4.954-1.797a.124.124 0 0 1-.094-.117v-.774c0-.038.023-.07.053-.094 1.185-.883 1.907-1.958 2.143-2.947.005-.022-.008-.048.023-.063a2.6 2.6 0 0 0 .641-1.093c.11-.45-.054-.91-.443-1.132V4.488C12.8 2.018 10.52 0 8 0 5.482 0 3.2 2.018 3.2 4.488v1.371c-.378.216-.54.65-.451 1.093.064.318.333.829.65 1.132.02.02.015.035.02.053.233.992.956 2.071 2.146 2.958.03.023.053.055.053.093v.774a.125.125 0 0 1-.095.117c-1.695.453-3.423.915-4.953 1.797C-.437 14.46-.024 16 1.14 16zm0-.8H1.14c-.346 0-.469-.458-.17-.631 1.468-.85 3.133-1.283 4.76-1.717a.93.93 0 0 0 .688-.89v-.774a.92.92 0 0 0-.375-.734c-1.02-.76-1.657-1.67-1.85-2.52a.85.85 0 0 0-.242-.428c-.199-.192-.377-.51-.418-.712-.024-.116.016-.243.143-.268A.4.4 0 0 0 4 6.134V4.488C4 2.443 5.915.8 8 .8s4 1.643 4 3.688v1.646a.4.4 0 0 0 .323.392c.127.025.167.15.144.268-.041.201-.219.52-.42.712a.93.93 0 0 0-.25.464c-.2.832-.826 1.72-1.816 2.465-.24.18-.4.447-.4.753v.774c0 .416.288.783.689.89 1.628.435 3.288.87 4.76 1.717.299.173.176.631-.17.631" clip-rule="evenodd"/></g><defs><clipPath id="tutor-hdr-submenu-profile-clip"><path fill="currentColor" d="M0 0h16v16H0z"/></clipPath></defs></svg>',
			'settings'  => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M10.402 8a2.4 2.4 0 1 1-4.8 0 2.4 2.4 0 0 1 4.8 0m-4 0A1.6 1.6 0 1 0 9.6 8a1.6 1.6 0 0 0-3.2 0" clip-rule="evenodd"/><path fill="currentColor" fill-rule="evenodd" d="M13.583 5.688c.231.558.777.864 1.38.787A.924.924 0 0 1 16 7.394v1.212a.924.924 0 0 1-1.037.919c-.603-.077-1.149.229-1.38.787a1.28 1.28 0 0 0 .386 1.507c.427.35.5.926.14 1.347a8 8 0 0 1-.95.947c-.403.337-.978.274-1.32-.12-.388-.447-.96-.644-1.527-.41-.546.226-.85.752-.791 1.339.055.552-.304 1.011-.857 1.053a8 8 0 0 1-1.34-.006c-.532-.049-.897-.516-.845-1.046a1.28 1.28 0 0 0-.791-1.34 1.28 1.28 0 0 0-1.507.386c-.338.414-.928.487-1.338.145a8 8 0 0 1-.953-.948c-.35-.41-.277-1.005.14-1.347.456-.373.613-.96.387-1.507-.231-.558-.778-.864-1.38-.787A.924.924 0 0 1 0 8.606V7.394a.923.923 0 0 1 1.037-.919c.602.076 1.149-.229 1.38-.787A1.28 1.28 0 0 0 2.03 4.18c-.422-.347-.493-.921-.143-1.34q.43-.511.946-.95c.42-.36.997-.288 1.348.14.373.455.96.612 1.507.386s.85-.752.791-1.339C6.424.526 6.783.067 7.335.025c.45-.034.899-.035 1.343.006.53.049.895.516.843 1.046a1.28 1.28 0 0 0 .791 1.34c.604.25 1.136.005 1.553-.439a.936.936 0 0 1 1.29-.093c.343.285.658.603.953.945.362.42.292.998-.138 1.35a1.28 1.28 0 0 0-.387 1.508M15.2 7.394a.123.123 0 0 0-.137-.125c-.97.123-1.847-.375-2.219-1.275-.366-.881-.116-1.83.618-2.432.068-.056.096-.144.04-.21a7 7 0 0 0-.857-.85c-.064-.053-.155-.03-.207.034-.601.736-1.55.986-2.432.62C9.125 2.79 8.63 1.944 8.724.999c.009-.082-.037-.164-.12-.171A7 7 0 0 0 7.396.824c-.086.006-.129.088-.12.174.094.947-.4 1.793-1.282 2.158-.882.366-1.83.116-2.432-.619-.055-.067-.144-.095-.21-.038a7 7 0 0 0-.852.856c-.054.066-.028.153.038.207.734.601.984 1.55.618 2.432-.374.9-1.25 1.397-2.22 1.275-.073-.01-.136.05-.136.125v1.212c0 .074.062.135.135.125.97-.123 1.847.375 2.221 1.275.366.882.116 1.83-.618 2.432-.078.064-.086.156-.023.229.259.3.54.582.84.832.064.053.154.028.207-.036.601-.734 1.55-.984 2.432-.619s1.376 1.212 1.282 2.157c-.009.083.038.164.12.171.4.038.8.035 1.207.004.087-.006.13-.088.121-.174-.094-.947.4-1.793 1.282-2.158s1.832-.116 2.433.62c.053.064.143.088.208.034a7 7 0 0 0 .855-.852c.056-.066.027-.154-.04-.208-.734-.602-.984-1.55-.618-2.432.372-.9 1.249-1.398 2.22-1.275.073.01.136-.051.136-.125z" clip-rule="evenodd"/></svg>',
			'logout'    => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><g fill="currentColor" clip-path="url(#tutor-hdr-submenu-logout-clip)"><path fill-rule="evenodd" d="M0 1.38C0 .619.618 0 1.38 0H9.2a.4.4 0 0 1 0 .8H1.38a.58.58 0 0 0-.58.58v12.44c0 .32.26.58.58.58H9.2a.4.4 0 0 1 0 .8H1.38A1.38 1.38 0 0 1 0 13.82z" clip-rule="evenodd"/><path d="M12.683 4.117a.4.4 0 1 0-.566.566L14.634 7.2H4.4a.4.4 0 0 0 0 .8h10.234l-2.517 2.517a.4.4 0 1 0 .566.566l3.2-3.2a.4.4 0 0 0 0-.566z"/></g><defs><clipPath id="tutor-hdr-submenu-logout-clip"><path fill="currentColor" d="M0 0h16v16H0z"/></clipPath></defs></svg>',
		);
	}

	/**
	 * Check if Tutor major version is 4+.
	 *
	 * @param int $version Major version to compare against.
	 * @return bool
	 */
	private static function tutor_version_compare( $version ) {
		if ( ! defined( 'TUTOR_VERSION' ) ) {
			return false;
		}

		if ( preg_match( '/^(\d+)\./', TUTOR_VERSION, $version_parts ) ) {
			return (int) $version_parts[1] >= $version;
		}

		return false;
	}
}