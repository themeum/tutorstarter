const cartCounter = document.querySelector('.cart-contents .tutor_native_cart_count');

// Add an event listener for the custom event
document.addEventListener('tutorAddToCartEvent', (event) => {
	cartCounter.textContent = `(${event.detail.cart_count})`;
});

document.addEventListener('tutorRemoveCartEvent', (event) => {
	cartCounter.textContent = event.detail.cart_count ? `(${event.detail.cart_count})` : '';
});
