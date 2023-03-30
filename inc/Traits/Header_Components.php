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
		if ( ! class_exists( '\TUTOR\Utils' ) ) return; // @todo: cross check

		$default_menus = apply_filters( 'tutor_dashboard/nav_items', self::default_menus() );
		$current_user = wp_get_current_user();
		?>
		<div class="tutor-header-profile-photo">
			<?php
				// if ( function_exists( 'tutor_utils' ) ) {
					echo tutor_utils()->get_tutor_avatar( get_current_user_id() );
				// } else {
				// 	$get_avatar_url = get_avatar_url( get_current_user_id(), 'thumbnail' );
				// 	echo "<img src='$get_avatar_url' />";
				// }
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
				<?php if ( ! defined( 'TDC_VERSION' ) ) : ?>
					<div class="tutor-submenu-login-section-instructor">
						<div class="tutor-submenu-login-avatar">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/images/instructor-submenu-icon.svg' ); ?>" alt="profile avatar">
						</div>
						<div class="tutor-submenu-login-content">
							<div class="tutor-submenu-login-profile" style="margin-top: 10px;"><?php wp_kses_post( _e( 'Create a<br />New Course', 'tutorstarter' ) ) ?></div>
							<p class="tutor-mt-10 tutor-font-size-14" style="line-height: 1.5em; font-size:14px; margin-top:10px;"><?php wp_kses_post( _e( 'Get started with topics,<br />lessons and more', 'tutorstarter' ) ); ?></p>
						</div>
						<div class="tutor-submenu-login-btn">
							<a id="tutor-starter-create-course" class="tutor-submenu-login" href="<?php echo admin_url( 'post-new.php?post_type=' . tutor()->course_post_type ); ?>"><span class="dashicons dashicons-arrow-right-alt2" style="font-weight: bold;"></span></a>
						</div>
					</div>
				<?php else : ?>
					<div class="tutor-submenu-login-section">
						<div class="tutor-submenu-login-avatar">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/images/tutor-submenu-login-avatar.svg' ); ?>" alt="profile avatar">
						</div>
						<div class="tutor-submenu-login-content">
							<?php echo esc_html_x( 'Login as a ', 'Login as a student text', 'tutorstarter' ); ?><div class="tutor-submenu-login-profile"><?php esc_html_e( 'Student', 'tutorstarter' ); ?></div>
						</div>
						<div class="tutor-submenu-login-btn">
							<a class="student-login tutor-submenu-login tutor-icon-icon-light-right-line tutor-font-size-30 tutor-text-bold" href="#"></a>
						</div>
					</div>
				<?php endif; ?>
			<?php else : ?>
				<?php if ( ! defined( 'TDC_VERSION' ) ) : ?>
					<div class="tutor-submenu-login-section">
						<div class="tutor-submenu-login-avatar">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/images/student-sub-menu-icon.svg' ); ?>" alt="profile avatar">
						</div>
						<div class="tutor-submenu-login-content">
							<div class="tutor-submenu-login-profile" style="margin-top: 10px;"><?php wp_kses_post( _e( 'Let\'s Start<br />Learning', 'tutorstarter' ) ); ?></div>
							<p class="tutor-mt-10 tutor-font-size-14" style="line-height: 1.5em; font-size:14px; margin-top:10px;"><?php wp_kses_post( _e( 'Explore courses that will<br />unlock your potential.', 'tutorstarter' ) ); ?></p>
						</div>
						<div class="tutor-submenu-login-btn">
							<a class="tutor-submenu-login" href="<?php echo esc_url( tutor_utils()->course_archive_page_url() ) ?>"><span class="dashicons dashicons-arrow-right-alt2" style="font-weight: bold;"></span></a>
						</div>
					</div>
				<?php else : ?>
					<div class="tutor-submenu-login-section-instructor">
					<div class="tutor-submenu-login-avatar">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/images/tutor-submenu-login-instructor-avatar.svg' ); ?>" alt="profile avatar">
					</div>
					<div class="tutor-submenu-login-content">
						<?php echo esc_html_x( 'Login as an ', 'Login as an instructor text', 'tutorstarter' ); ?> <div class="tutor-submenu-login-profile"><?php esc_html_e( 'Instructor', 'tutorstarter' ); ?></div>
					</div>
					<div class="tutor-submenu-login-btn">
						<a class="instructor-login tutor-submenu-login tutor-icon-icon-light-right-line tutor-font-size-30 tutor-text-bold" href="#"></a>
					</div>
				</div>
				<?php endif; ?>
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
	 * 
	 * @return array
	 */
	public static function filtered_nav() {
		if ( ! class_exists( '\TUTOR\Utils' ) ) return;

		$instructor_menu = apply_filters( 'tutor_dashboard/instructor_nav_items', self::instructor_menus() );
		$common_navs     = array(
			'settings' => array(
				'title' => __( 'Settings', 'tutorstarter' ),
				'icon'  => 'tutor-icon-settings-filled',
			),
			'logout'   => array(
				'title' => __( 'Logout', 'tutorstarter' ),
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
	 * 
	 * @return bool
	 */
	public static function is_user_priviledged() {
		$user_is_priviledged = false;
		$current_user = wp_get_current_user();
		$predefined_roles = apply_filters( 'tutor_user_is_priviledged', array(
			'administrator',
			'tutor_instructor'
		) );

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
			'index'            => array(
				'title' => __( 'Dashboard', 'tutorstarter' ),
				'icon'  => 'tutor-icon-dashboard-filled',
			),
			'my-profile'       => array(
				'title' => __( 'My Profile', 'tutorstarter' ),
				'icon'  => 'tutor-icon-man-user-filled',
			),
			'enrolled-courses' => array(
				'title' => __( 'Enrolled  Courses', 'tutorstarter' ),
				'icon'  => 'tutor-icon-college-graduation-filled',
			),
			'wishlist'         => array(
				'title' => __( 'Wishlist', 'tutorstarter' ),
				'icon'  => 'tutor-icon-fav-full-filled',
			),
			'reviews'          => array(
				'title' => __( 'Reviews', 'tutorstarter' ),
				'icon'  => 'tutor-icon-star-full-filled',
			),
			'my-quiz-attempts' => array(
				'title' => __( 'My Quiz Attempts', 'tutorstarter' ),
				'icon'  => 'tutor-icon-quiz-attempt-filled',
			),
			'purchase_history' => array(
				'title' => __( 'Order History', 'tutorstarter' ),
				'icon'  => 'tutor-icon-cart-filled',
			),
			'question-answer'  => array(
				'title' => __( 'Question & Answer', 'tutorstarter' ),
				'icon'  => 'tutor-icon-question-filled',
			),
		);
	}

	/**
	 * Instructor Menus
	 */
	public static function instructor_menus() {
		return array(
			'separator-1'   => array(
				'title'    => __( 'Instructor', 'tutorstarter' ),
				'auth_cap' => tutor()->instructor_role,
				'type'     => 'separator',
			),
			'create-course' => array(
				'title'    => __( 'Create Course', 'tutorstarter' ),
				'show_ui'  => false,
				'auth_cap' => tutor()->instructor_role,
			),
			'my-courses'    => array(
				'title'    => __( 'My Courses', 'tutorstarter' ),
				'auth_cap' => tutor()->instructor_role,
				'icon'     => 'tutor-icon-space-filled',
			),
			'announcements' => array(
				'title'    => __( 'Announcements', 'tutorstarter' ),
				'auth_cap' => tutor()->instructor_role,
				'icon'     => 'tutor-icon-speaker-filled',
			),
			'withdraw'      => array(
				'title'    => __( 'Withdrawals', 'tutorstarter' ),
				'auth_cap' => tutor()->instructor_role,
				'icon'     => 'tutor-icon-wallet-filled',
			),
			'quiz-attempts' => array(
				'title'    => __( 'Quiz Attempts', 'tutorstarter' ),
				'auth_cap' => tutor()->instructor_role,
				'icon'     => 'tutor-icon-quiz-filled',
			),
		);
	}
}
