<?php
/**
 * Checkout coupon form
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>
<div class="woocommerce-form-coupon-toggle">
	<?php wc_print_notice( apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'tutorstarter' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'tutorstarter' ) . '</a>' ), 'notice' ); ?>
</div>
<div class="woocommerce-coupon-form">
	<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">

		<p class="form-row">
			<label><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'tutorstarter' ); ?></label>
		</p>
		<p class="form-row form-row-first">
			<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'tutorstarter' ); ?>" id="coupon_code" value="" />
		</p>

		<p class="form-row form-row-last">
			<button type="submit" class="coupon-button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'tutorstarter' ); ?>"><?php esc_html_e( 'Apply coupon', 'tutorstarter' ); ?></button>
		</p>

		<div class="clear"></div>
	</form>
</div>

