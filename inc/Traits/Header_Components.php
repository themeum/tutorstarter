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
	 * Tutor Multi column dropdown menu
	 */
	public static function tutor_multi_column_dropdown() {
		if ( ! class_exists( '\TUTOR\Utils' ) ) return;

		$default_menus = apply_filters( 'tutor_dashboard/nav_items', tutor_utils()->default_menus() );
		$current_user = wp_get_current_user();
		?>
		<div class="tutor-header-profile-photo">
			<?php
				if ( function_exists( 'tutor_utils' ) ) {
					echo tutor_utils()->get_tutor_avatar( get_current_user_id(), 'thumbnail' );
				} else {
					$get_avatar_url = get_avatar_url( get_current_user_id(), 'thumbnail' );
					echo "<img alt='' src='$get_avatar_url' />";
				}
			?>
		</div><!-- .tutor-header-profile-photo -->
		<div class="tutor-header-profile-content">
			<div class="tutor-header-profile-content-text"><?php esc_html_e( 'Hello', 'tutorstarter' ); ?></div>
			<div class="tutor-header-profile-submenu">
				<div class="tutor-header-profile-name"><?php echo esc_html( ucfirst( $current_user->display_name ) ); ?></div>
				<div class="tutor-header-submenu-icon tutor-icon-icon-light-down-line tutor-font-size-20 tutor-text-400">
				</div>
			</div>
		</div>
		<div class="tutor-header-submenu">
			<?php if ( self::is_user_priviledged() && is_user_logged_in() ) : ?>
			<div class="tutor-submenu-login-section">
				<div class="tutor-submenu-login-avatar">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/images/tutor-submenu-login-avatar.svg' ); ?>" alt="profile avatar">
				</div>
				<div class="tutor-submenu-login-content">
					Login as a <div class="tutor-submenu-login-profile">Student</div>
				</div>
				<div class="tutor-submenu-login-btn">
					<a class="student-login tutor-submenu-login tutor-icon-icon-light-right-line tutor-font-size-30 tutor-text-bold" href="#"></a>
				</div>
			</div>
			<?php else : ?>
			<div class="tutor-submenu-login-section-instructor">
				<div class="tutor-submenu-login-avatar">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/images/tutor-submenu-login-instructor-avatar.svg' ); ?>" alt="profile avatar">
				</div>
				<div class="tutor-submenu-login-content">
					Login as a <div class="tutor-submenu-login-profile">Instructor</div>
				</div>
				<div class="tutor-submenu-login-btn">
					<a class="instructor-login tutor-submenu-login tutor-icon-icon-light-right-line tutor-font-size-30 tutor-text-bold" href="#"></a>
				</div>
			</div>
			<?php endif; ?>
			<div class="tutor-submenu-links">
				<ul>
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

						if ( $menu_key === 'index' ) $menu_key = '';
						echo "<li><a href='" . esc_url( $menu_link ) . "'>" . esc_html( $menu_title ) . " </a></li>";

					}
					?>
				</ul>
			</div>
			<div class="tutor-submenu-links">
				<ul>
					<?php
					$filtered_nav_items = self::filtered_nav();

					foreach ( $filtered_nav_items as $nav_key => $nav_item ) {
						$menu_title = $nav_item;
						$menu_link  = tutor_utils()->get_tutor_dashboard_page_permalink( $nav_key );

						if ( is_array( $nav_item ) ) {
							$menu_title = tutor_utils()->array_get( 'title', $nav_item );
							
							if ( isset( $nav_item['url'] ) ) {
								$menu_link = $nav_item['url'];
							}
						}

						if ( isset( $nav_item['type'] ) && 'separator' === $nav_item['type'] ) {
							echo '';
						} else {
							echo "<li><a href='" . esc_url( $menu_link ) . "'>" . esc_html( $menu_title ) . " </a></li>";
						}
					}
					?>
				</ul>
			</div>
		</div>

	<?php }

	/**
	 * Filtered nav items based on capabilities
	 */
	public static function filtered_nav() {
		if ( ! class_exists( '\TUTOR\Utils' ) ) return;

		$instructor_menu = apply_filters( 'tutor_dashboard/instructor_nav_items', tutor_utils()->instructor_menus() );
		$common_navs     = array(
			'settings' => array(
				'title' => __( 'Settings', 'tutor' ),
				'icon'  => 'tutor-icon-settings-filled',
			),
			'logout'   => array(
				'title' => __( 'Logout', 'tutor' ),
				'icon'  => 'tutor-icon-signout-filled',
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
	 */
	public static function is_user_priviledged() {
		$user_is_priviledged = false;
		$current_user = wp_get_current_user();
		$predefined_roles = array(
			'administrator',
			'tutor_instructor'
		);

		if ( array_intersect( $current_user->roles, $predefined_roles ) ) {
			$user_is_priviledged = true;
		} else {
			$user_is_priviledged = false;
		}

		return $user_is_priviledged;
	}
}
