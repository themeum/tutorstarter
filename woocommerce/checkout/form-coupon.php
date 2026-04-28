<?php
/**
 * Checkout coupon form
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>
<div class="woocommerce-form-coupon-toggle">
	<?php
		/**
		 * Filter checkout coupon message.
		 *
		 * @param string $message coupon message.
		 * @return string Filtered message.
		 *
		 * @since 1.0.0
		 */
		wc_print_notice( apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'tutorstarter' ) . ' <a href="#" role="button" aria-label="' . esc_attr__( 'Enter your coupon code', 'tutorstarter' ) . '" aria-controls="woocommerce-checkout-form-coupon" aria-expanded="false" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'tutorstarter' ) . '</a>' ), 'notice' );
	?>
</div>
<div class="woocommerce-coupon-form">
	<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none" id="woocommerce-checkout-form-coupon">

		<p class="form-row">
			<label><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'tutorstarter' ); ?></label>
		</p>
		<p class="form-row form-row-first">
			<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'tutorstarter' ); ?></label>
			<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'tutorstarter' ); ?>" id="coupon_code" value="" />
		</p>

		<p class="form-row form-row-last">
			<button type="submit" class="coupon-button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'tutorstarter' ); ?>"><?php esc_html_e( 'Apply coupon', 'tutorstarter' ); ?></button>
		</p>

		<div class="clear"></div>
	</form>
</div>

