/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens 
 */

(function () {

    /* Navbar toggler */
    const toggleBtn = document.querySelector(".navbar-toggler");
    const navbarNav = document.querySelector(".navbar-nav");
    const navCloseBtn = document.querySelector(".btn-nav-close");

    if (toggleBtn !== null) {
        toggleBtn.addEventListener("click", () => {
            navbarNav.classList.toggle("active");
        });
    }

    if (navCloseBtn !== null) {
        navCloseBtn.addEventListener("click", () => {
            navbarNav.classList.remove("active");
        });
    }

    /* Search popup */
    const searchBtn = document.querySelector(".btn-search");
    const searchBtnClose = document.querySelector(".btn-search-close");
    const searchPopup = document.querySelector(".search-popup");

    if (searchBtn !== null) {
        searchBtn.addEventListener("click", () => {
            searchPopup.classList.toggle("active");
        });
    }

    if (searchBtnClose !== null) {
        searchBtnClose.addEventListener("click", () => {
            searchPopup.classList.remove("active");
        });
    }

    /* Add icon on .nav-item if dropdown exists */
    const hasDropdowns = document.querySelectorAll(".menu-item-has-children");

    if (hasDropdowns !== null) {
        hasDropdowns.forEach(item => {
            item.classList.add('icon');
        })
    }
})();
