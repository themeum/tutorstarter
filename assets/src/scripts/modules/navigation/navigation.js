/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens 
 */

(function () {
    /* Navbar toggler */
    const toggleBtn = document.querySelector('.navbar-toggler');
    const navbarNav = document.querySelector('.navbar-nav');
    const navCloseBtn = document.querySelector('.btn-nav-close');
    const searchCloseBtn = document.querySelector('.search-field-popup .close-btn');
    const mediaQuery = window.matchMedia('(max-width: 991px)');
    let lastMenuItem = [...document.querySelectorAll('#menu-primary li')];
    lastMenuItem = lastMenuItem[lastMenuItem.length - 1];


    if (null !== toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            navbarNav.classList.add('active');
        });
    }

    if (null !== navCloseBtn) {
        navCloseBtn.addEventListener('click', () => {
            navbarNav.classList.remove('active');
        });
    }

    /* Add icon on .menu-item if dropdown exists */
    const navItems = document.querySelectorAll('.menu-item');

    if (null !== navItems) {
        navItems.forEach((item) => {
            const hasDropdowns = item.querySelector('.sub-menu') !== null;
            if (hasDropdowns) {
                item.classList.add('icon');
            }
        });
    }

    /*  Sticky header */
    window.addEventListener('scroll', () => {
        const stickyHeader = document.querySelector('.header-sticky');
        if (null !== stickyHeader) {
            stickyHeader.classList.toggle('sticky-on', window.scrollY > 200);
        }
    });

    /* Popup search field */
    const searchBtn = document.querySelector('.navbar-utils .btn-search');
    const popupWrapper = document.querySelector('.search-field-popup');
    if (null !== searchBtn) {
        searchBtn.addEventListener('click', () => {
            if (null !== popupWrapper) {
                popupWrapper.classList.toggle('show');
            }
        });
    }

    if (null !== searchCloseBtn) {
        searchCloseBtn.addEventListener('click', (e) => {
            e.preventDefault();
            popupWrapper.classList.remove('show');
        });
    }

    const navbarToggler = document.querySelector('.navbar-toggler');
    if (null !== navbarToggler || undefined !== navbarToggler || 'undefined' !== navbarToggler) {
        window.addEventListener('resize', () => {
            if (mediaQuery.matches) {
                navbarToggler.addEventListener('click', (e) => {
                    if (lastMenuItem) {
                        lastMenuItem.addEventListener('keydown', addTabLoopFeature, false);
                    }
                    navCloseBtn.addEventListener('click', () => {
                        const firstLink = document.querySelector('header + div a');
                        firstLink.focus();
                    });
                });
            } else {
                if (lastMenuItem) {
                    lastMenuItem.removeEventListener('keydown', addTabLoopFeature, false);
                }
            }
        });
    }

    function addTabLoopFeature(e) {
        e.preventDefault();
        navCloseBtn.focus();
    }

    const subMenu = document.querySelector('.tutor-header-profile-menu-items');

    if (null !== subMenu) {
        subMenu.addEventListener('click', function () {
            subMenu.classList.toggle('active');
        })
    }

})();
