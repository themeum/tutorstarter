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
    let lastMenuItem = [...document.querySelectorAll('#menu-all-pages li')];
    lastMenuItem = lastMenuItem[lastMenuItem.length - 1];


    if ( null !== toggleBtn ) {
        toggleBtn.addEventListener('click', () => {
            navbarNav.classList.add('active');
        });
    }

    if ( null !== navCloseBtn ) {
        navCloseBtn.addEventListener('click', () => {
            navbarNav.classList.remove('active');
        });
    }

    /* Add icon on .menu-item if dropdown exists */
    const navItems = document.querySelectorAll('.menu-item');

    if ( null !== navItems ) {
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
        if ( null !== stickyHeader ) {
            stickyHeader.classList.toggle('sticky-on', window.scrollY > 200);
        }
    });

    /* Popup search field */
    const searchBtn = document.querySelector('.navbar-utils .btn-search');
    const popupWrapper = document.querySelector('.search-field-popup');
    if ( null !== searchBtn ) {
        searchBtn.addEventListener('click', () => {
            if ( null !== popupWrapper ) {
                popupWrapper.classList.toggle('show');
            }
        });
    }

    if ( null !== searchCloseBtn ) {
        searchCloseBtn.addEventListener('click', (e) => {
            e.preventDefault();
            popupWrapper.classList.remove('show');
        });
    }

    const navbarToggler = document.querySelector('.navbar-toggler');

    window.addEventListener('resize', () => {
        if (mediaQuery.matches) {
            navbarToggler.addEventListener('click', (e) => {
                lastMenuItem.addEventListener('keydown', addTabLoopFeature, false);
                navCloseBtn.addEventListener('click', () => {
                    const firstLink = document.querySelector('header + div a');
                    firstLink.focus();
                });
            });
        } else {
            lastMenuItem.removeEventListener('keydown', addTabLoopFeature, false);
        }
    });
    
    function addTabLoopFeature(e) {
        e.preventDefault();
        navCloseBtn.focus();
    }
    
})();
