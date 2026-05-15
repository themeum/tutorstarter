<?php
/**
 * Header default
 */

use Tutor\Ecommerce\CartController;
use Tutor_Starter\Traits\Header_Components;

/**
 * For php8.1&8.2 compatibility
 */
class Header_COMP {
	use Header_Components;
}
$obj = new Header_COMP();
?>

<header class="header-default">
	<!-- .navbar .navbar-center .navbar-right .has-search-field .full-width -->
	<nav
		class="navbar <?php echo tutorstarter_header_switcher(); ?> <?php echo 'navbar-right' === tutorstarter_header_switcher() ? 'has-search-field' : ''; ?>">
		<div class="navbar-brand">
			<?php tutorstarter_site_logo(); ?>
		</div>
		<!-- .has-search-field must use with .navbar-right -->
		<div class="search-field">
			<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" name="s" value="<?php echo get_search_query(); ?>"
					placeholder="<?php esc_attr_e( 'Search...', 'tutorstarter' ); ?>" />
			</form>
		</div>
		<?php if ( has_nav_menu( 'primary' ) ) { ?>
			<button class="navbar-toggler">
				<div class="toggle-icon"><span></span></div>
			</button>
		<?php } ?>
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'navbar-nav',
				)
			);
		}
		?>
		<?php
		if ( defined( 'TUTOR_VERSION' ) ) {
			?>
		<div class="navbar-utils">
			<?php
			if ( class_exists( 'WooCommerce' ) && 'wc' === tutor_utils()->get_option( 'monetize_by' ) && 'header_fullwidth_center' !== get_theme_mod( 'header_type_select' ) ) {
				global $woocommerce;
				$items = $woocommerce->cart->get_cart();
				if ( true === get_theme_mod( 'cart_btn_toggle', true ) ) {
					?>
					<div class="utils-cart">
						<?php echo esc_html( tutor_starter_header_cart() ); ?>
					</div>
					<?php
				}
				if ( defined( 'TDC_VERSION' ) && ! is_user_logged_in() ) {
					?>
					<div class="tutor-landing-explore">
						<span><?php esc_html_e( 'Want to Explore!', 'tutorstarter' ); ?></span>
						<a class="tutor-version-new-btn"
							href="<?php echo esc_url( home_url() . '/login' ); ?>">
							<?php esc_html_e( 'Instant Login', 'tutorstarter' ); ?>
						</a>
					</div>
				<?php } ?>
			<?php } ?>

			<?php
			if ( class_exists( 'Tutor\Ecommerce\CartController' ) && 'tutor' === tutor_utils()->get_option( 'monetize_by' ) && 'header_fullwidth_center' !== get_theme_mod( 'header_type_select' ) ) {
				$tutor_native_cart_controller = new CartController();
				?>
				<?php
				if ( true === get_theme_mod( 'cart_btn_toggle', true ) ) {
					$items = $tutor_native_cart_controller->get_cart_items()['courses'];
					?>
					<a class="cart-contents" href="<?php echo esc_url( $tutor_native_cart_controller->get_page_url() ); ?>"
						title="<?php esc_attr_e( 'View your shopping cart', 'tutorstarter' ); ?>">
						<span class="btn-cart">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" height="19" viewBox="0 0 21 19" width="21">
								<path d="m18.9375 10.832 1.6523-7.31247c.0704-.25781.0235-.49219-.1406-.70312-.164-.21094-.3867-.31641-.668-.31641h-13.81636l-.3164-1.582031c-.04688-.1875-.15235-.339844-.31641-.457031-.14062-.140626-.30469-.210938-.49219-.210938h-3.62109c-.234375 0-.433594.082031-.597656.246094-.164063.164062-.246094.363281-.246094.597656v.5625c0 .23438.082031.43359.246094.59766.164062.16406.363281.24609.597656.24609h2.46094l2.46093 12.0586c-.30468.1875-.55078.4336-.73828.7383-.16406.3047-.24609.6328-.24609.9843 0 .5391.1875.9961.5625 1.3711.39844.3985.86719.5977 1.40625.5977s.99609-.1992 1.37109-.5977c.39844-.375.59766-.8437.59766-1.4062 0-.5391-.19922-.9961-.59766-1.3711h7.38281c-.3984.375-.5977.832-.5977 1.3711 0 .5625.1876 1.0312.5626 1.4062.3984.3985.8671.5977 1.4062.5977s.9961-.1992 1.3711-.5977c.3984-.375.5977-.832.5977-1.3711 0-.375-.1055-.7148-.3165-1.0195-.1875-.3281-.457-.5742-.8085-.7383l.2109-.8789c.0469-.2578-.0117-.4922-.1758-.7031s-.375-.3164-.6328-.3164h-9.45704l-.21094-1.125h10.30078c.1875 0 .3516-.0586.4922-.1758.1641-.1172.2695-.2812.3164-.4922z" />
							</svg>
							<span class="tutor_native_cart_count"> 
							<?php
							if ( $items && $items['total_count'] ) {
								?>
								(<?php echo esc_html( $tutor_native_cart_controller->get_cart_items()['courses']['total_count'] ); ?>)
							<?php } ?>
							</span>
						</span>
					</a>
					<?php
				}
				if ( defined( 'TDC_VERSION' ) && ! is_user_logged_in() ) {
					?>
					<div class="tutor-landing-explore">
						<span><?php esc_html_e( 'Want to Explore!', 'tutorstarter' ); ?></span>
						<a class="tutor-version-new-btn"
							href="<?php echo esc_url( home_url() . '/login' ); ?>"><?php esc_html_e( 'Instant Login', 'tutorstarter' ); ?></a>
					</div>
					<?php
				}
			}
			if ( ! is_user_logged_in() || is_customize_preview() ) {
				?>
				<?php if ( true === get_theme_mod( 'cta_text_toggle', true ) ) { ?>
					<div class="utils-btn">
						<a class="btn-getstarted"
							href="<?php echo esc_url( get_theme_mod( 'cta_text_link', '#' ) ); ?>">
							<!-- <?php echo esc_html( get_theme_mod( 'cta_text', __( 'Getting Started', 'tutorstarter' ) ) ); ?> -->
							<?php echo esc_html( get_theme_mod( 'cta_text', __( 'Getting Started', 'tutorstarter' ) ) ); ?>
						</a>
					</div>
					<?php
				}
			}
			if ( is_user_logged_in() ) {
				if ( class_exists( '\TUTOR\Utils' ) && is_user_logged_in() ) {
					?>
					<div class="tutor-header-profile-menu-items">
						<?php $obj->tutor_multi_column_dropdown(); ?>
					</div> <!-- .tutor-header-profile-menu -->
					<?php
				}
			}
			?>
		</div>
		<?php } ?>
	</nav>
</header>