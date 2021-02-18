<?php
/**
 * Header One
 */
?>

<header id="masthead" class="default transparent-header">
	<div class="container-fluid">	
		<div class="tutor-nav">
			<div class="tutor-navbar-col tutor-navbar-brand">
				<div class="tutor-brand">
					<?php $logo = get_theme_mod( 'transparent_logo' );
						$logo_img = wp_get_attachment_image_src( $logo );
					?>
					<?php if ( $logo_img ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( $logo_img[0] ); ?>" alt="<?php esc_attr_e( bloginfo( 'name' ) ); ?>" />
						</a>
					<?php else : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/dist/images/tutor-white.png' ); ?>" alt="<?php esc_attr_e( bloginfo( 'name' ) ); ?>" />
						</a>
					<?php endif; ?>
				</div><!-- .tutor-brand -->
				<?php
				if ( taxonomy_exists( 'course-category' ) ) :
					$course_categories = get_terms( array(
						'taxonomy'   => 'course-category',
						'number'     => 8,
						'hide_empty' => false
					) );
					if ( count( $course_categories ) > 1 ) :
				?>
					<ul id="menu-footer-one" class="menu-one">
						<li id="menu-item-52" class="icon menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-52">
							<a href=""><?php esc_html_e( 'Browse', 'tutorstarter' ); ?></a>
							<ul class="sub-menu">
								<?php 
								foreach ( $course_categories as $course_cat ) {
									$category_link = get_term_link( $course_cat, 'course-category' );
								?>
									<li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53">
										<a href="<?php echo esc_url( $category_link ); ?>">
											<?php echo $course_cat->name; ?>
										</a>
									</li>
								<?php }; ?>
							</ul>
						</li>
					</ul><!-- ul#menu-footer-one -->
				<?php endif; endif; ?>
			</div>
			<div class="tutor-navbar-col tutor-navbar-menu">
				<div class="tutor-navbar-main-menu tutor-navbar-transparent-menu">
					<?php
						if ( has_nav_menu( 'primary' ) ) :
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'menu_class'     => 'navbar-nav menu-one-transparent',
								)
							);
						endif;
					?>
					<button class="navbar-toggler">
						<svg height="30px" id="nav-toggler-id" viewBox="0 0 32 28" width="32px" xml:space="preserve">
							<path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/>
						</svg>
					</button>
				</div><!-- .tutor-navbar-main-menu -->
				<div class="tutor-navbar-cart-transparent">

					<?php if ( class_exists( 'woocommerce' ) ) : ?>
						<div class="tutor-cart">
							<?php echo tutor_starter_header_cart(); ?>
						</div>
					<?php endif ?>
					<?php if ( ! is_user_logged_in() ) : ?>
						<div class="tutor-login-link">
							<a href="<?php echo esc_url( site_url() . '/sign-in' ); ?>">
								<?php esc_html_e( 'Log In', 'tutorstarter' ); ?>
							</a>
						</div><!-- .tutor-login-link -->
					<?php endif; ?>
					<?php if ( is_user_logged_in() ) : ?>
						<div class="tutor-header-profile-menu">
							<div class="tutor-header-profile-photo">
								<?php
									if ( function_exists( 'tutor_utils' ) ){
										echo tutor_utils()->get_tutor_avatar( get_current_user_id(), 'thumbnail' );
									} else {
										$get_avatar_url = get_avatar_url( get_current_user_id(), 'thumbnail' );
										echo "<img alt='' src='$get_avatar_url' />";
									}
								?>
							</div><!-- .tutor-header-profile-photo -->
							<ul>
								<?php
									if ( function_exists( 'tutor_utils' ) ) {
										$dashboard_page_id = tutor_utils()->get_option( 'tutor_dashboard_page_id' );
										$dashboard_pages = tutor_utils()->tutor_dashboard_pages();
				
										foreach ( $dashboard_pages as $dashboard_key => $dashboard_page ) {
											$menu_title = $dashboard_page;
											$menu_link = tutils()->get_tutor_dashboard_page_permalink( $dashboard_key );
											$separator = false;
											if ( is_array( $dashboard_page ) ) {
												if ( ! current_user_can( tutor()->instructor_role ) ) continue;
												$menu_title = tutor_utils()->array_get( 'title', $dashboard_page );
												/**
												 * Add new menu item property "url" for custom link
												 */
												if ( isset( $dashboard_page['url'] ) ) {
													$menu_link = $dashboard_page['url'];
												}
												if ( isset( $dashboard_page['type'] ) && $dashboard_page['type'] === 'separator' ) {
													$separator = true;
												}
											}
											if ( $separator ) {
												echo '<li class="tutor-dashboard-menu-divider"></li>';
												if ( $menu_title ) {
													echo "<li class='tutor-dashboard-menu-divider-header'>$menu_title</li>";
												}
											} else {
												if ( $dashboard_key === 'index') $dashboard_key = '';
												echo "<li><a href='" . esc_url( $menu_link ) . "'>" . esc_html( $menu_title ) . " </a></li>";
											}
										}
									}
								?>
							</ul>
						</div><!-- .tutor-header-profile-menu -->
					<?php endif; ?>

					<?php if ( ! is_user_logged_in() || is_customize_preview() ) : ?>
					<div class="tutor-get-started-btn">
						<?php if ( true === get_theme_mod( 'cta_text_toggle', true ) ) : ?>
							<a class="call-to-action" href="<?php echo esc_url( site_url() . get_theme_mod( 'cta_text_link', '#' ) ); ?>"><?php echo esc_html__( get_theme_mod( 'cta_text', 'Getting Started' ), 'tutorstarter' ); ?></a>
						<?php endif; ?>
					</div><!-- .tutor-get-started-btn -->
					<?php endif; ?>

				</div><!-- .tutor-navbar-cart -->
			</div><!-- .tutor-navbar-menu -->
		</div>
	</div>
</header>