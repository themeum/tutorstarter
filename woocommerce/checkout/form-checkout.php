<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$order_button_text = __( 'Complete Payment', 'tutorstarter' );
?>
<div class="checkout-top-spacing"></div>
<?php do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'tutorstarter' ) ) );
	return;
}

?>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
	<div class="tutorstarter-checkout-container tutorstarter-cart-container">
		<div class="checkout-contents" id="customer_details">
			<div class="checkout-payment">
				<h2 class="checkout-heading"><?php esc_html( the_title() ); ?></h2>
				<?php 
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						// Check if there are non-virtual products
						if ( ! $cart_item['data']->is_virtual() && ! $cart_item['data']->is_downloadable() ) {
							do_action( 'woocommerce_checkout_billing' );
						}
					} 
				?>
				<?php wc_get_template( 'checkout/payment.php' ); ?>
				<h2 class="order-details-heading cart-page-heading"><?php esc_html_e( 'Order Details', 'tutorstarter' ); ?></h2>
				<div class="cart-contents-wrapper">
				<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
				
				<div class="cart-contents">
					<div class="cart-product-image">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'cart-image-thumb' ), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}
						?>
					</div><!-- .cart-product-image -->
					<div class="cart-product-title">
						<?php
							if ( ! $product_permalink ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
							} else {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
							}

							do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

							// Meta data.
							echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

							// Backorder notification.
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'tutorstarter' ) . '</p>', $product_id ) );
							}
						?>
					</div><!-- .cart-product-title -->
					<div class="cart-product-actions">
						<div class="cart-product-price">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</div><!-- .cart-product-price -->
					</div><!-- .cart-product-actions -->
				</div><!-- .cart-contents -->
				<?php }
			} ?>
			</div>
		</div><!-- .checkout-payment -->
	</div>
	<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
	<?php endif; ?>
	
	<div class="checkout-order-summary">
		<h2 class="checkout-heading cart-page-heading"><?php esc_html_e( 'Summary', 'tutorstarter' ); ?></h2>
		<div class="cart-collaterals">
			<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
	
			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php wc_get_template( 'checkout/review-order.php' ); ?>
			</div>
			
			<?php do_action( 'woocommerce_review_order_before_submit' ); ?>
	
			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	
			<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>
	
			<?php do_action( 'woocommerce_review_order_after_submit' ); ?>
	
			<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
		</div>
	</div>
</div><!-- .tutorstarter-checkout-container -->
</form><!-- .checkout -->

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
