<?php
/**
 * Header transparent
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

<!-- Search popup for .header-transparent -->
<div class="search-field-popup">
	<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div>
			<button class="close-btn">+</button>
			<input type="search" name="s" value="<?php echo get_search_query(); ?>"
				placeholder="<?php esc_attr_e( 'Search...', 'tutorstarter' ); ?>" />
		</div>
	</form>
</div>
<header
	class="header-transparent <?php echo true === get_theme_mod( 'header_sticky_toggle' ) ? 'header-sticky' : ''; ?>">
	<!-- .navbar .navbar-center .navbar-right .has-search-field .full-width -->
	<nav class="navbar <?php echo tutorstarter_header_switcher(); ?>">
		<div class="navbar-brand">
			<?php tutorstarter_transparent_logo(); ?>
			<!-- <?php tutorstarter_site_logo(); ?> -->
		</div>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<button class="navbar-toggler">
				<div class="toggle-icon"><span></span></div>
			</button>
		<?php endif; ?>
		<?php
		if ( has_nav_menu( 'primary' ) ) :
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'navbar-nav',
				)
			);
		endif;
		?>
		<?php
		if ( defined( 'TUTOR_VERSION' ) ) {
			?>
		<div class="navbar-utils">
			<?php if ( true === get_theme_mod( 'header_search_toggle' ) ) : ?>
				<div class="utils-search">
					<button class="btn-search">
						<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
							<path
								d="M11.3839 11.6808C12.3661 10.6987 12.8571 9.51934 12.8571 8.14286C12.8571 6.76637 12.3661 5.59077 11.3839 4.61607C10.4092 3.63393 9.23363 3.14286 7.85714 3.14286C6.48066 3.14286 5.30134 3.63393 4.3192 4.61607C3.34449 5.59077 2.85714 6.76637 2.85714 8.14286C2.85714 9.51934 3.34449 10.6987 4.3192 11.6808C5.30134 12.6555 6.48066 13.1429 7.85714 13.1429C9.23363 13.1429 10.4092 12.6555 11.3839 11.6808ZM18.5714 17.4286C18.5714 17.8155 18.4301 18.1503 18.1473 18.433C17.8646 18.7158 17.5298 18.8571 17.1429 18.8571C16.7411 18.8571 16.4063 18.7158 16.1384 18.433L12.3103 14.6161C10.9784 15.5387 9.49405 16 7.85714 16C6.79316 16 5.77381 15.7954 4.79911 15.3862C3.83185 14.9695 2.99479 14.4115 2.28795 13.7121C1.58854 13.0052 1.03051 12.1682 0.613839 11.2009C0.204613 10.2262 0 9.20684 0 8.14286C0 7.07887 0.204613 6.06324 0.613839 5.09598C1.03051 4.12128 1.58854 3.28423 2.28795 2.58482C2.99479 1.87798 3.83185 1.31994 4.79911 0.910713C5.77381 0.494047 6.79316 0.285713 7.85714 0.285713C8.92113 0.285713 9.93676 0.494047 10.904 0.910713C11.8787 1.31994 12.7158 1.87798 13.4152 2.58482C14.122 3.28423 14.6801 4.12128 15.0893 5.09598C15.506 6.06324 15.7143 7.07887 15.7143 8.14286C15.7143 9.77976 15.253 11.2641 14.3304 12.596L18.1585 16.4241C18.4338 16.6994 18.5714 17.0342 18.5714 17.4286Z"
								fill="white" />
						</svg>
					</button>
				</div>
			<?php endif; ?>
			<?php
			if ( class_exists( 'WooCommerce' ) && 'wc' === tutor_utils()->get_option( 'monetize_by' ) ) {
				global $woocommerce;
				$items = $woocommerce->cart->get_cart();
				?>
				<?php
				if ( true === get_theme_mod( 'cart_btn_toggle', true ) ) {
					?>
						<div class="utils-cart">
							<?php echo esc_html( tutor_starter_header_cart() ); ?>
						</div>
					<?php
				}
				?>
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
			?>
			<?php if ( defined( 'TDC_VERSION' ) && ! is_user_logged_in() ) : ?>
				<div class="tutor-landing-explore">
					<span><?php esc_html_e( 'Want to Explore!', 'tutorstarter' ); ?></span>
					<a class="tutor-version-new-btn"
						href="<?php echo esc_url( home_url() . '/login' ); ?>"><?php esc_html_e( 'Instant Login', 'tutorstarter' ); ?></a>
				</div>
			<?php endif; ?>
			<?php if ( class_exists( '\TUTOR\Utils' ) && is_user_logged_in() ) : ?>
				<div class="tutor-header-profile-menu-items">
					<?php $obj->tutor_multi_column_dropdown(); ?>
				</div><!-- .tutor-header-profile-menu -->
			<?php endif; ?>
			<?php if ( ! is_user_logged_in() || is_customize_preview() ) : ?>
				<?php if ( true === get_theme_mod( 'cta_text_toggle', true ) ) : ?>
					<div class="utils-btn"><a class="btn-getstarted" href="<?php echo esc_url( get_theme_mod( 'cta_text_link', '#' ) ); ?>"><?php printf( esc_html__( '%s', 'tutorstarter' ), get_theme_mod( 'cta_text', 'Getting Started' ) ); ?></a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php } ?>
	</nav>
</header>