const cartCounter = document.querySelector('.cart-contents .tutor_native_cart_count');

// Add an event listener for the custom event
document.addEventListener('tutorCartCount', (event) => {
	cartCounter.textContent = event.detail.cart_count;
});