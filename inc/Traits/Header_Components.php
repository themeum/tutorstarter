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

		// $default_menus = apply_filters( 'tutor_dashboard/nav_items', self::default_menus() );
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
				<!-- <div class="tutor-header-profile-name">
				</div> -->
				<!-- <div class="tutor-header-submenu-icon tutor-icon-icon-light-down-line tutor-font-size-20 tutor-text-400">
				</div> -->
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
							ob_start();?>
							<li>
								<a href="<?php echo esc_url( $menu_link ) ?>"> 
									<span class="tutor-dashboard-menu-item-icon <?php echo $menu_item['icon'];  ?>"></span>
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
		return array(
			'' => array(
				'title' => __( 'Dashboard', 'tutorstarter' ),
				'icon'  => 'tutor-icon-dashboard',
			),
			'my-profile'       => array(
				'title' => __( 'My profile', 'tutorstarter' ),
				'icon'  => 'tutor-icon-user-bold',
			),
			'settings'       => array(
				'title' => __( 'Account Settings', 'tutorstarter' ),
				'icon'  => 'tutor-icon-gear',
			),
			'logout'         => array(
				'title' => __( 'Logout', 'tutorstarter' ),
				'icon'  => 'tutor-icon-signout',
			),
		);
	}
}