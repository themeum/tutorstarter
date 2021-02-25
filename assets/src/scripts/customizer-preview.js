/**
 * Customizer preview
 */
(function () {
    // General customization.
    wp.customize('body_bg_color', function (value) {
        value.bind(function (updatedValue) {
            const bodySelector = document.querySelector('body');
            bodySelector.style.backgroundColor = updatedValue;
        })
    });
    wp.customize('body_text_color', function (value) {
        value.bind(function (updatedValue) {
            const bodySelector = document.querySelector('body');
            bodySelector.style.color = updatedValue;
        })
    });
    wp.customize('link_color', function (value) {
        value.bind(function (updatedValue) {
            const linkSelector = document.querySelectorAll('body a');
            linkSelector.forEach((link) => {
                link.style.color = updatedValue;
            })
        })
    });
    wp.customize('cart_color', function (value) {
        value.bind(function (updatedValue) {
            const cartSelector = document.querySelector('.tutor-navbar-cart .tutor-cart svg');
            const cartContentSelector = document.querySelector('.tutor-navbar-cart .tutor-cart a.tutor-cart-contents span.count');
            if (null !== cartSelector) {
                cartSelector.style.fill = updatedValue;
            }
            if (null !== cartContentSelector) {
                cartContentSelector.style.color = updatedValue;
                cartContentSelector.style.border = '1px solid' + updatedValue;
            }
        })
    });
    wp.customize('cart_color_trans', function (value) {
        value.bind(function (updatedValue) {
            const cartTransSelector = document.querySelector('.tutor-navbar-cart-transparent .tutor-cart svg');
            const cartTransContentSelector = document.querySelector('.tutor-navbar-cart-transparent .tutor-cart a.tutor-cart-contents span.count');
            if (null !== cartTransSelector) {
                cartTransSelector.style.fill = updatedValue;
            }
            if (null !== cartTransContentSelector) {
                cartTransContentSelector.style.color = updatedValue;
                cartTransContentSelector.style.border = '1px solid' + updatedValue;
            }
        })
    });
    wp.customize('body_font', function (value) {
        value.bind(function (updatedValue) {
            const bodySelector = document.querySelector('body');
            bodySelector.style.fontFamily = updatedValue;
        })
    });
    wp.customize('main_typography', function (value) {
        value.bind(function (updatedValue) {
            const bodySelector = document.querySelector('body');
            bodySelector.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
            bodySelector.style.fontWeight = updatedValue['fontWeight'];
            bodySelector.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
            bodySelector.style.textTransform = updatedValue['textTransform'];
        })
    });
    wp.customize('heading_font', function (value) {
        value.bind(function (updatedValue) {
            let headingSelector = document.querySelectorAll('h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6');
            if (null !== headingSelector) {
                headingSelector.forEach((heading) => {
                    heading.style.fontFamily = updatedValue;
                })
            }
        })
    });
    wp.customize('h1_typography', function (value) {
        value.bind(function (updatedValue) {
            const h1Selector = document.querySelector('h1, .h1');
            if (null !== h1Selector) {
                h1Selector.style.fontWeight = updatedValue['fontWeight'];
                h1Selector.style.textTransform = updatedValue['textTransform'];
                h1Selector.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
                h1Selector.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
            }
        })
    });
    wp.customize('h2_typography', function (value) {
        value.bind(function (updatedValue) {
            const h2Selector = document.querySelector('h2, .h2');
            if (null !== h2Selector) {
                h2Selector.style.fontWeight = updatedValue['fontWeight'];
                h2Selector.style.textTransform = updatedValue['textTransform'];
                h2Selector.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
                h2Selector.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
            }
        })
    });
    wp.customize('h3_typography', function (value) {
        value.bind(function (updatedValue) {
            const h3Selector = document.querySelector('h3, .h3');
            if (null !== h3Selector) {
                h3Selector.style.fontWeight = updatedValue['fontWeight'];
                h3Selector.style.textTransform = updatedValue['textTransform'];
                h3Selector.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
                h3Selector.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
            }
        })
    });
    wp.customize('h4_typography', function (value) {
        value.bind(function (updatedValue) {
            const h4Selector = document.querySelector('h4, .h4');
            if (null !== h4Selector) {
                h4Selector.style.fontWeight = updatedValue['fontWeight'];
                h4Selector.style.textTransform = updatedValue['textTransform'];
                h4Selector.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
                h4Selector.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
            }
        })
    });
    wp.customize('h5_typography', function (value) {
        value.bind(function (updatedValue) {
            const h5Selector = document.querySelector('h5, .h5');
            if (null !== h5Selector) {
                h5Selector.style.fontWeight = updatedValue['fontWeight'];
                h5Selector.style.textTransform = updatedValue['textTransform'];
                h5Selector.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
                h5Selector.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
            }
        })
    });
    wp.customize('h6_typography', function (value) {
        value.bind(function (updatedValue) {
            const h6Selector = document.querySelector('h6, .h6');
            if (null !== h6Selector) {
                h6Selector.style.fontWeight = updatedValue['fontWeight'];
                h6Selector.style.textTransform = updatedValue['textTransform'];
                h6Selector.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
                h6Selector.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
            }
        })
    });

    // Header customization.
    wp.customize('menu_bg_color', function (value) {
        value.bind(function (updatedValue) {
            let menuBg = document.querySelectorAll('#masthead, .alternative, .bg-primary, .menu-item ul.sub-menu');
            menuBg.forEach((menu) => {
                menu.style.backgroundColor = updatedValue;
            })
        })
    });
    wp.customize('menu_link_color', function (value) {
        value.bind(function (updatedValue) {
            let menuLinks = document.querySelectorAll('.bg-primary .navbar-toggler, .bg-primary a');
            let searchIcon = document.querySelector('.nav-search-icon');

            if (null !== searchIcon) {
                searchIcon.style.fill = updatedValue;
            }

            menuLinks.forEach((link) => {
                link.style.color = updatedValue;
            })
        })
    });
    wp.customize('menu_link_color_trans', function (value) {
        value.bind(function (updatedValue) {
            let menuLinks = document.querySelectorAll('.menu-one-transparent li a, .transparent-header .navbar-toggler');
            let searchIcon = document.querySelector('.nav-search-icon');

            if (null !== searchIcon) {
                searchIcon.style.fill = updatedValue;
            }

            menuLinks.forEach((link) => {
                link.style.color = updatedValue;
            })
        })
    });
    wp.customize('menu_link_active_color', function (value) {
        value.bind(function (updatedValue) {
            let menuLinks = document.querySelectorAll('.bg-primary .navbar-toggler, .bg-primary a');
            menuLinks.forEach((link) => {
                link.style.color = updatedValue;
                link.addEventListener('mouseenter', () => {
                    link.style.color = updatedValue;
                });
                link.addEventListener('mouseleave', () => {
                    link.style.color = '';
                });
            })
        })
    });
    wp.customize('menu_link_active_color_trans', function (value) {
        value.bind(function (updatedValue) {
            let menuLinks = document.querySelectorAll('.menu-one-transparent li a, .transparent-header .navbar-toggler');
            menuLinks.forEach((link) => {
                link.style.color = updatedValue;
                link.addEventListener('mouseenter', () => {
                    link.style.color = updatedValue;
                });
                link.addEventListener('mouseleave', () => {
                    link.style.color = '';
                });
            })
        })
    });
    wp.customize('header_link_typography', function (value) {
        value.bind(function (updatedValue) {
            let menuLinks = document.querySelectorAll('.navbar-nav .menu-item a');
            if (null !== menuLinks) {
            menuLinks.forEach((link) => {
                link.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
                link.style.fontWeight = updatedValue['fontWeight'];
                link.style.textTransform = updatedValue['textTransform'];
                link.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
            })
          }
        })
    });
    wp.customize('cta_text_toggle', function (value) {
        value.bind(function (updatedValue) {
            let ctaToggle = document.querySelector('.call-to-action');
            if (null !== ctaToggle) {
                if (true === updatedValue) {
                    ctaToggle.classList.remove('hide')
                } else {
                    ctaToggle.classList.add('hide');
                }
            }
        })
    })
    wp.customize('header_search_toggle', function (value) {
        value.bind(function (updatedValue) {
            let searchToggle = document.querySelector('.utils-search, .tutor-nav-search');
            if (null !== searchToggle) {
                if (true === updatedValue) {
                    searchToggle.classList.remove('hide')
                } else {
                    searchToggle.classList.add('hide');
                }
            }
        })
    })
    wp.customize('cta_background', function (value) {
        value.bind(function (updatedValue) {
            let ctaBackground = document.querySelector('.call-to-action');
            if (null !== ctaBackground) {
                ctaBackground.style.backgroundColor = updatedValue;
            }
        })
    });
    wp.customize('background_trans_cta', function (value) {
        value.bind(function (updatedValue) {
            let ctaBackground = document.querySelector('.tutor-navbar-cart-transparent .tutor-get-started-btn .call-to-action, .btn-transparent .call-to-action');
            if (null !== ctaBackground) {
                ctaBackground.style.backgroundColor = `rgba(${updatedValue.rgb.r}, ${updatedValue.rgb.g}, ${updatedValue.rgb.b}, ${updatedValue.rgb.a})`;
            }
        })
    });
    wp.customize('cta_border_color', function (value) {
        value.bind(function (updatedValue) {
            let ctaElement = document.querySelector('.call-to-action');
            if (null !== ctaElement) {
                ctaElement.style.borderColor = updatedValue;
            }
        })
    });
    wp.customize('cta_border_color_trans', function (value) {
        value.bind(function (updatedValue) {
            let ctaElement = document.querySelector('.btn-transparent .call-to-action');
            if (null !== ctaElement) {
                ctaElement.style.borderColor = updatedValue;
            }
        })
    });
    wp.customize('cta_border_width', function (value) {
        value.bind(function (updatedValue) {
            let ctaElement = document.querySelector('.call-to-action');
            if (null !== ctaElement) {
                ctaElement.style.borderWidth = updatedValue + 'px';
            }
        })
    });
    wp.customize('cta_border_radius', function (value) {
        value.bind(function (updatedValue) {
            let ctaElement = document.querySelector('.call-to-action');
            if (null !== ctaElement) {
                ctaElement.style.borderRadius = updatedValue + 'px';
            }
        })
    });
    wp.customize('cta_color', function (value) {
        value.bind(function (updatedValue) {
            let ctaElement = document.querySelector('.call-to-action');
            if (null !== ctaElement) {
                ctaElement.style.color = updatedValue;
            }
        })
    });
    wp.customize('cta_color_trans', function (value) {
        value.bind(function (updatedValue) {
            let ctaElement = document.querySelector('.btn-transparent .call-to-action');
            if (null !== ctaElement) {
                ctaElement.style.color = updatedValue;
            }
        })
    });
    wp.customize('cta_text', function (value) {
        value.bind(function (updatedValue) {
            let ctaElement = document.querySelector('.call-to-action');
            if (null !== ctaElement) {
                ctaElement.innerHTML = updatedValue;
            }
        })
    });
    wp.customize('cta_text_link', function (value) {
        value.bind(function (updatedValue) {
            let ctaElement = document.querySelector('.call-to-action');
            if (null !== ctaElement) {
                ctaElement.href = updatedValue;
            }
        })
    });
    wp.customize('cta_font_typography', function (value) {
        value.bind(function (updatedValue) {
            let ctaElement = document.querySelector('.call-to-action');
            if (null !== ctaElement) {
                ctaElement.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
                ctaElement.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
                ctaElement.style.textTransform = updatedValue['textTransform'];
                ctaElement.style.fontWeight = updatedValue['fontWeight'];
            }
        })
    });

    // Blog customization.
    wp.customize('blog_meta_toggle', function (value) {
        value.bind(function (updatedValue) {
            const postMetaSelctor = document.querySelectorAll('.entry-meta');
            if (null !== postMetaSelctor) {
                postMetaSelctor.forEach((meta) => {
                    if (true === updatedValue) {
                        meta.classList.remove('hide');
                    } else {
                        meta.classList.add('hide');
                    }
                })
            }
        })
    });
    wp.customize('featured_image_toggle', function (value) {
        value.bind(function (updatedValue) {
            const featuredImageSelctor = document.querySelectorAll('.post-thumbnail');
            if (null !== featuredImageSelctor) {
                featuredImageSelctor.forEach((image) => {
                    if (true === updatedValue) {
                        image.classList.remove('hide');
                    } else {
                        image.classList.add('hide');
                    }
                })
            }
        })
    });
    wp.customize('post_title_toggle', function (value) {
        value.bind(function (updatedValue) {
            const postTitleSelctor = document.querySelectorAll('.entry-title');
            if (null !== postTitleSelctor) {
                postTitleSelctor.forEach((title) => {
                    if (true === updatedValue) {
                        title.classList.remove('hide');
                    } else {
                        title.classList.add('hide');
                    }
                })
            }
        })
    });
    wp.customize('post_excerpt_toggle', function (value) {
        value.bind(function (updatedValue) {
            const postExcerptSelctor = document.querySelectorAll('.excerpt');
            if (null !== postExcerptSelctor) {
                postExcerptSelctor.forEach((excerpt) => {
                    if (true === updatedValue) {
                        excerpt.classList.remove('hide');
                    } else {
                        excerpt.classList.add('hide');
                    }
                })
            }
        })
    });
    wp.customize('post_readmore_toggle', function (value) {
        value.bind(function (updatedValue) {
            const postLinkSelctor = document.querySelectorAll('.read-more');
            if (null !== postLinkSelctor) {
                postLinkSelctor.forEach((link) => {
                    if (true === updatedValue) {
                        link.classList.remove('hide');
                    } else {
                        link.classList.add('hide');
                    }
                })
            }
        })
    });
    wp.customize('category_meta_toggle', function (value) {
        value.bind(function (updatedValue) {
            const postCategorySelctor = document.querySelectorAll('.blog-cats');
            if (null !== postCategorySelctor) {
                postCategorySelctor.forEach((category) => {
                    if (true === updatedValue) {
                        category.classList.remove('hide');

                    } else {
                        category.classList.add('hide');
                    }
                })
            }
        })
    });
    wp.customize('author_meta_toggle', function (value) {
        value.bind(function (updatedValue) {
            const postAuthorSelctor = document.querySelectorAll('.byline');
            if (null !== postAuthorSelctor) {
                postAuthorSelctor.forEach((author) => {
                    if (true === updatedValue) {
                        author.classList.remove('hide');
                    } else {
                        author.classList.add('hide');
                    }
                })
            }
        })
    });

    // Footer customization.
    wp.customize('footer_socialmedia_toggle', function (value) {
        value.bind(function (updatedValue) {
            let footerSocialMedia = document.querySelector('.site-info #footer-socialmedia');
            if (null !== footerSocialMedia) {
                if (true === updatedValue) {
                    footerSocialMedia.classList.remove('hide');
                } else {
                    footerSocialMedia.classList.add('hide');
                }
            }
        })
    });
    wp.customize('footer_logo', function (value) {
        value.bind(function (updatedValue) {
            let footerLogo = document.querySelector('.site-info img#logo-footer');
            if (null !== updatedValue) {
                footerLogo.src = updatedValue;
            } else {
                footerLogo.src = tutorstarter_vars.site_url + '/wp-content/themes/qubely-starters/assets/dist/images/zeus.png';
            }
        })
    });
    wp.customize('footer_widgets_bg_color', function (value) {
        value.bind(function (updatedValue) {
            let widgetSection = document.querySelector('.footer-widgets');
            widgetSection.style.backgroundColor = updatedValue;
        })
    });
    wp.customize('footer_bottom_bg_color', function (value) {
        value.bind(function (updatedValue) {
            let footerBottom = document.querySelector('.site-footer');
            footerBottom.style.backgroundColor = updatedValue;
        })
    });
    wp.customize('footer_widgets_text_color', function (value) {
        value.bind(function (updatedValue) {
            let widgetTitle = document.querySelectorAll('.footer-widgets .widget-title');
            let widgetText = document.querySelectorAll('.footer-widgets ul li a');
            widgetTitle.forEach((title) => {
                title.style.color = updatedValue;
            })
            widgetText.forEach((text) => {
                text.style.color = updatedValue;
            })
        })
    });
    wp.customize('footer_widget_title_typography', function (value) {
        value.bind(function (updatedValue) {
            let widgetText = document.querySelectorAll('.footer-widgets .widget-title');
            if (null !== widgetText) {
                widgetText.forEach((title) => {
                    title.style.fontWeight = updatedValue['fontWeight'];
                    title.style.textTransform = updatedValue['textTransform'];
                    title.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
                    title.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
                })
            }
        })
    });
    wp.customize('footer_widget_text_typography', function (value) {
        value.bind(function (updatedValue) {
            let widgetText = document.querySelectorAll('.footer-widgets .widget p, .footer-widgets ul li a');
            if (null !== widgetText) {
                widgetText.forEach((text) => {
                    text.style.fontWeight = updatedValue['fontWeight'];
                    text.style.textTransform = updatedValue['textTransform'];
                    text.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
                    text.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
                })
            }
        })
    });
    wp.customize('footer_bottom_text_color', function (value) {
        value.bind(function (updatedValue) {
            let footerBottomText = document.querySelector('.site-footer .site-info span.copyright');
            let footerBottomMenu = document.querySelectorAll('#secondary-menu li a');
            footerBottomText.style.color = updatedValue;

            footerBottomMenu.forEach((item) => {
                item.style.color = updatedValue;
            })
        })
    });
    wp.customize('footer_bottom_text', function (value) {
        value.bind(function (updatedValue) {
            let footerBottomText = document.querySelector('.copyright-container span.copyright');
            footerBottomText.innerHTML = updatedValue;
        })
    });
})();