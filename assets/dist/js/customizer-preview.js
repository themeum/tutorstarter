<<<<<<< HEAD
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/scripts/customizer-preview.js":
/*!**************************************************!*\
  !*** ./assets/src/scripts/customizer-preview.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customizer preview
 */
(function () {
  // General customization.
  wp.customize('body_bg_color', function (value) {
    value.bind(function (updatedValue) {
      var bodySelector = document.querySelector('body');
      bodySelector.style.backgroundColor = updatedValue;
    });
  });
  wp.customize('body_text_color', function (value) {
    value.bind(function (updatedValue) {
      var bodySelector = document.querySelector('body');
      bodySelector.style.color = updatedValue;
    });
  });
  wp.customize('link_color', function (value) {
    value.bind(function (updatedValue) {
      var linkSelector = document.querySelectorAll('body a');
      linkSelector.forEach(function (link) {
        link.style.color = updatedValue;
      });
    });
  });
  wp.customize('body_font', function (value) {
    value.bind(function (updatedValue) {
      var bodySelector = document.querySelector('body');
      bodySelector.style.fontFamily = updatedValue;
    });
  });
  wp.customize('main_typography', function (value) {
    value.bind(function (updatedValue) {
      var bodySelector = document.querySelector('body');
      bodySelector.style.fontSize = updatedValue['fontSize']['desktop'] + 'px';
      bodySelector.style.fontWeight = updatedValue['fontWeight'];
      bodySelector.style.lineHeight = updatedValue['lineHeight']['desktop'] + 'px';
      bodySelector.style.textTransform = updatedValue['textTransform'];
    });
  });
  wp.customize('heading_font', function (value) {
    value.bind(function (updatedValue) {
      var headingSelector = document.querySelectorAll('h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6');

      if (null !== headingSelector) {
        headingSelector.forEach(function (heading) {
          heading.style.fontFamily = updatedValue;
        });
      }
    });
  });
  wp.customize('h1_font_size', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h1Selector = document.querySelector('h1, .h1');

      if (null !== h1Selector) {
        h1Selector.style.fontSize = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h1_font_weight', function (value) {
    value.bind(function (updatedValue) {
      var h1Selector = document.querySelector('h1, .h1');

      if (null !== h1Selector) {
        h1Selector.style.fontWeight = updatedValue;
      }
    });
  });
  wp.customize('h1_font_lineheight', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h1Selector = document.querySelector('h1, .h1');

      if (null !== h1Selector) {
        h1Selector.style.lineHeight = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h1_font_transform', function (value) {
    value.bind(function (updatedValue) {
      var h1Selector = document.querySelector('h1, .h1');

      if (null !== h1Selector) {
        h1Selector.style.textTransform = updatedValue;
      }
    });
  });
  wp.customize('h2_font_size', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h2Selector = document.querySelector('h2, .h2');

      if (null !== h2Selector) {
        h2Selector.style.fontSize = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h2_font_weight', function (value) {
    value.bind(function (updatedValue) {
      var h2Selector = document.querySelector('h2, .h2');

      if (null !== h2Selector) {
        h2Selector.style.fontWeight = updatedValue;
      }
    });
  });
  wp.customize('h2_font_lineheight', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h2Selector = document.querySelector('h2, .h2');

      if (null !== h2Selector) {
        h2Selector.style.lineHeight = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h2_font_transform', function (value) {
    value.bind(function (updatedValue) {
      var h2Selector = document.querySelector('h2, .h2');

      if (null !== h2Selector) {
        h2Selector.style.textTransform = updatedValue;
      }
    });
  });
  wp.customize('h3_font_size', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h3Selector = document.querySelector('h3, .h3');

      if (null !== h3Selector) {
        h3Selector.style.fontSize = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h3_font_weight', function (value) {
    value.bind(function (updatedValue) {
      var h3Selector = document.querySelector('h3, .h3');

      if (null !== h3Selector) {
        h3Selector.style.fontWeight = updatedValue;
      }
    });
  });
  wp.customize('h3_font_lineheight', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h3Selector = document.querySelector('h3, .h3');

      if (null !== h3Selector) {
        h3Selector.style.lineHeight = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h3_font_transform', function (value) {
    value.bind(function (updatedValue) {
      var h3Selector = document.querySelector('h3, .h3');

      if (null !== h3Selector) {
        h3Selector.style.textTransform = updatedValue;
      }
    });
  });
  wp.customize('h4_font_size', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h4Selector = document.querySelector('h4, .h4');

      if (null !== h4Selector) {
        h4Selector.style.fontSize = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h4_font_weight', function (value) {
    value.bind(function (updatedValue) {
      var h4Selector = document.querySelector('h4, .h4');

      if (null !== h4Selector) {
        h4Selector.style.fontWeight = updatedValue;
      }
    });
  });
  wp.customize('h4_font_lineheight', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h4Selector = document.querySelector('h4, .h4');

      if (null !== h4Selector) {
        h4Selector.style.lineHeight = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h4_font_transform', function (value) {
    value.bind(function (updatedValue) {
      var h4Selector = document.querySelector('h4, .h4');

      if (null !== h4Selector) {
        h4Selector.style.textTransform = updatedValue;
      }
    });
  });
  wp.customize('h5_font_size', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h5Selector = document.querySelector('h5, .h5');

      if (null !== h5Selector) {
        h5Selector.style.fontSize = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h5_font_weight', function (value) {
    value.bind(function (updatedValue) {
      var h5Selector = document.querySelector('h5, .h5');

      if (null !== h5Selector) {
        h5Selector.style.fontWeight = updatedValue;
      }
    });
  });
  wp.customize('h5_font_lineheight', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h5Selector = document.querySelector('h5, .h5');

      if (null !== h5Selector) {
        h5Selector.style.lineHeight = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h5_font_transform', function (value) {
    value.bind(function (updatedValue) {
      var h5Selector = document.querySelector('h5, .h5');

      if (null !== h5Selector) {
        h5Selector.style.textTransform = updatedValue;
      }
    });
  });
  wp.customize('h6_font_size', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h6Selector = document.querySelector('h6, .h6');

      if (null !== h6Selector) {
        h6Selector.style.fontSize = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h6_font_weight', function (value) {
    value.bind(function (updatedValue) {
      var h6Selector = document.querySelector('h6, .h6');

      if (null !== h6Selector) {
        h6Selector.style.fontWeight = updatedValue;
      }
    });
  });
  wp.customize('h6_font_lineheight', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var h6Selector = document.querySelector('h6, .h6');

      if (null !== h6Selector) {
        h6Selector.style.lineHeight = newValue.desktop + 'px';
      }
    });
  });
  wp.customize('h6_font_transform', function (value) {
    value.bind(function (updatedValue) {
      var h6Selector = document.querySelector('h6, .h6');

      if (null !== h6Selector) {
        h6Selector.style.textTransform = updatedValue;
      }
    });
  }); // Header customization.

  wp.customize('menu_bg_color', function (value) {
    value.bind(function (updatedValue) {
      var menuBg = document.querySelectorAll('#masthead, .alternative, .bg-primary, .menu-item ul.sub-menu');
      menuBg.forEach(function (menu) {
        menu.style.backgroundColor = updatedValue;
      });
    });
  });
  wp.customize('menu_link_color', function (value) {
    value.bind(function (updatedValue) {
      var menuLinks = document.querySelectorAll('.bg-primary .navbar-toggler, .bg-primary a, .bg-transparent .navbar-toggler, .bg-transparent a');
      var searchIcon = document.querySelector('.nav-search-icon');

      if (null !== searchIcon) {
        searchIcon.style.fill = updatedValue;
      }

      menuLinks.forEach(function (link) {
        link.style.color = updatedValue;
      });
    });
  });
  wp.customize('menu_link_active_color', function (value) {
    value.bind(function (updatedValue) {
      var menuLinks = document.querySelectorAll('.bg-primary .navbar-toggler, .bg-primary a, .bg-transparent .navbar-toggler, .bg-transparent a');
      menuLinks.forEach(function (link) {
        link.style.color = updatedValue;
        link.addEventListener('mouseenter', function () {
          link.style.color = updatedValue;
        });
        link.addEventListener('mouseleave', function () {
          link.style.color = '';
        });
      });
    });
  });
  wp.customize('menu_link_font_size', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var menuLinks = document.querySelectorAll('.navbar-nav .menu-item a');
      menuLinks.forEach(function (link) {
        link.style.fontSize = newValue.desktop + 'px';
      });
    });
  });
  wp.customize('menu_link_font_weight', function (value) {
    value.bind(function (updatedValue) {
      var menuLinks = document.querySelectorAll('.navbar-nav .menu-item a');
      menuLinks.forEach(function (link) {
        link.style.fontWeight = updatedValue;
      });
    });
  });
  wp.customize('cta_text_toggle', function (value) {
    value.bind(function (updatedValue) {
      var ctaToggle = document.querySelector('.call-to-action');

      if (null !== ctaToggle) {
        if (true === updatedValue) {
          ctaToggle.classList.remove('hide');
        } else {
          ctaToggle.classList.add('hide');
        }
      }
    });
  });
  wp.customize('header_search_toggle', function (value) {
    value.bind(function (updatedValue) {
      var searchToggle = document.querySelector('.utils-search');

      if (null !== searchToggle) {
        if (true === updatedValue) {
          searchToggle.classList.remove('hide');
        } else {
          searchToggle.classList.add('hide');
        }
      }
    });
  });
  wp.customize('cta_background', function (value) {
    value.bind(function (updatedValue) {
      var ctaBackground = document.querySelector('.call-to-action');
      ctaBackground.style.backgroundColor = updatedValue;
    });
  });
  wp.customize('cta_color', function (value) {
    value.bind(function (updatedValue) {
      var ctaElement = document.querySelector('.call-to-action');
      ctaElement.style.color = updatedValue;
    });
  });
  wp.customize('cta_text', function (value) {
    value.bind(function (updatedValue) {
      var ctaElement = document.querySelector('.call-to-action');
      ctaElement.innerHTML = updatedValue;
    });
  });
  wp.customize('cta_text_link', function (value) {
    value.bind(function (updatedValue) {
      var ctaElement = document.querySelector('.call-to-action');
      ctaElement.href = updatedValue;
    });
  });
  wp.customize('cta_font_size', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var ctaElement = document.querySelector('.call-to-action');
      ctaElement.style.fontSize = newValue.desktop + 'px';
    });
  });
  wp.customize('cta_text_font_weight', function (value) {
    value.bind(function (updatedValue) {
      var ctaElement = document.querySelector('.call-to-action');
      ctaElement.style.fontWeight = updatedValue;
    });
  }); // Blog customization.

  wp.customize('blog_meta_toggle', function (value) {
    value.bind(function (updatedValue) {
      var postMetaSelctor = document.querySelectorAll('.entry-meta');

      if (null !== postMetaSelctor) {
        postMetaSelctor.forEach(function (meta) {
          if (true === updatedValue) {
            meta.classList.remove('hide');
          } else {
            meta.classList.add('hide');
          }
        });
      }
    });
  });
  wp.customize('featured_image_toggle', function (value) {
    value.bind(function (updatedValue) {
      var featuredImageSelctor = document.querySelectorAll('.post-thumbnail');

      if (null !== featuredImageSelctor) {
        featuredImageSelctor.forEach(function (image) {
          if (true === updatedValue) {
            image.classList.remove('hide');
          } else {
            image.classList.add('hide');
          }
        });
      }
    });
  });
  wp.customize('post_title_toggle', function (value) {
    value.bind(function (updatedValue) {
      var postTitleSelctor = document.querySelectorAll('.entry-title');

      if (null !== postTitleSelctor) {
        postTitleSelctor.forEach(function (title) {
          if (true === updatedValue) {
            title.classList.remove('hide');
          } else {
            title.classList.add('hide');
          }
        });
      }
    });
  });
  wp.customize('post_excerpt_toggle', function (value) {
    value.bind(function (updatedValue) {
      var postExcerptSelctor = document.querySelectorAll('.excerpt');

      if (null !== postExcerptSelctor) {
        postExcerptSelctor.forEach(function (excerpt) {
          if (true === updatedValue) {
            excerpt.classList.remove('hide');
          } else {
            excerpt.classList.add('hide');
          }
        });
      }
    });
  });
  wp.customize('post_readmore_toggle', function (value) {
    value.bind(function (updatedValue) {
      var postLinkSelctor = document.querySelectorAll('.read-more');

      if (null !== postLinkSelctor) {
        postLinkSelctor.forEach(function (link) {
          if (true === updatedValue) {
            link.classList.remove('hide');
          } else {
            link.classList.add('hide');
          }
        });
      }
    });
  });
  wp.customize('category_meta_toggle', function (value) {
    value.bind(function (updatedValue) {
      var postCategorySelctor = document.querySelectorAll('.blog-cats');

      if (null !== postCategorySelctor) {
        postCategorySelctor.forEach(function (category) {
          if (true === updatedValue) {
            category.classList.remove('hide');
          } else {
            category.classList.add('hide');
          }
        });
      }
    });
  });
  wp.customize('author_meta_toggle', function (value) {
    value.bind(function (updatedValue) {
      var postAuthorSelctor = document.querySelectorAll('.byline');

      if (null !== postAuthorSelctor) {
        postAuthorSelctor.forEach(function (author) {
          if (true === updatedValue) {
            author.classList.remove('hide');
          } else {
            author.classList.add('hide');
          }
        });
      }
    });
  }); // Footer customization.

  wp.customize('footer_logo_toggle', function (value) {
    value.bind(function (updatedValue) {
      var footerLogo = document.querySelector('.site-info img#logo-footer');

      if (null !== footerLogo) {
        if (true === updatedValue) {
          footerLogo.classList.remove('hide');
        } else {
          footerLogo.classList.add('hide');
        }
      }
    });
  });
  wp.customize('footer_socialmedia_toggle', function (value) {
    value.bind(function (updatedValue) {
      var footerSocialMedia = document.querySelector('.site-info #footer-socialmedia');

      if (null !== footerSocialMedia) {
        if (true === updatedValue) {
          footerSocialMedia.classList.remove('hide');
        } else {
          footerSocialMedia.classList.add('hide');
        }
      }
    });
  });
  wp.customize('footer_logo', function (value) {
    value.bind(function (updatedValue) {
      var footerLogo = document.querySelector('.site-info img#logo-footer');

      if (null !== updatedValue) {
        footerLogo.src = updatedValue;
      } else {
        footerLogo.src = tutorstarter_vars.site_url + '/wp-content/themes/qubely-starters/assets/dist/images/zeus.png';
      }
    });
  });
  wp.customize('footer_widgets_bg_color', function (value) {
    value.bind(function (updatedValue) {
      var widgetSection = document.querySelector('.footer-widgets');
      widgetSection.style.backgroundColor = updatedValue;
    });
  });
  wp.customize('footer_bottom_bg_color', function (value) {
    value.bind(function (updatedValue) {
      var footerBottom = document.querySelector('.site-footer');
      footerBottom.style.backgroundColor = updatedValue;
    });
  });
  wp.customize('footer_widgets_text_color', function (value) {
    value.bind(function (updatedValue) {
      var widgetTitle = document.querySelectorAll('.footer-widgets .widget-title');
      var widgetText = document.querySelectorAll('.footer-widgets ul li a');
      widgetTitle.forEach(function (title) {
        title.style.color = updatedValue;
      });
      widgetText.forEach(function (text) {
        text.style.color = updatedValue;
      });
    });
  });
  wp.customize('footer_widget_font_size', function (value) {
    value.bind(function (updatedValue) {
      var newValue = JSON.parse(updatedValue);
      var widgetText = document.querySelectorAll('.footer-widgets .widget-title');
      widgetText.forEach(function (title) {
        title.style.fontSize = newValue.desktop + 'px';
      });
    });
  });
  wp.customize('footer_widget_font_weight', function (value) {
    value.bind(function (updatedValue) {
      var widgetText = document.querySelectorAll('.footer-widgets .widget-title');
      widgetText.forEach(function (title) {
        title.style.fontWeight = updatedValue;
      });
    });
  });
  wp.customize('footer_bottom_text_color', function (value) {
    value.bind(function (updatedValue) {
      var footerBottomText = document.querySelector('.site-footer .site-info span.copyright');
      var footerBottomMenu = document.querySelectorAll('#secondary-menu li a');
      footerBottomText.style.color = updatedValue;
      footerBottomMenu.forEach(function (item) {
        item.style.color = updatedValue;
      });
    });
  });
  wp.customize('footer_bottom_text', function (value) {
    value.bind(function (updatedValue) {
      var footerBottomText = document.querySelector('.copyright-container span.copyright');
      footerBottomText.innerHTML = updatedValue;
    });
  });
})();

/***/ }),

/***/ 2:
/*!********************************************************!*\
  !*** multi ./assets/src/scripts/customizer-preview.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/assets/src/scripts/customizer-preview.js */"./assets/src/scripts/customizer-preview.js");


/***/ })

/******/ });
=======
!function(t){var e={};function o(n){if(e[n])return e[n].exports;var i=e[n]={i:n,l:!1,exports:{}};return t[n].call(i.exports,i,i.exports,o),i.l=!0,i.exports}o.m=t,o.c=e,o.d=function(t,e,n){o.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},o.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)o.d(n,i,function(e){return t[e]}.bind(null,i));return n},o.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return o.d(e,"a",e),e},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},o.p="/",o(o.s=2)}({2:function(t,e,o){t.exports=o("c1XJ")},c1XJ:function(t,e){wp.customize("body_bg_color",(function(t){t.bind((function(t){document.querySelector("body").style.backgroundColor=t}))})),wp.customize("body_text_color",(function(t){t.bind((function(t){document.querySelector("body").style.color=t}))})),wp.customize("link_color",(function(t){t.bind((function(t){document.querySelectorAll("body a").forEach((function(e){e.style.color=t}))}))})),wp.customize("body_font",(function(t){t.bind((function(t){document.querySelector("body").style.fontFamily=t}))})),wp.customize("body_font_size",(function(t){t.bind((function(t){var e=JSON.parse(t);document.querySelector("body").style.fontSize=e.desktop+"px"}))})),wp.customize("body_font_weight",(function(t){t.bind((function(t){document.querySelector("body").style.fontWeight=t}))})),wp.customize("body_font_lineheight",(function(t){t.bind((function(t){var e=JSON.parse(t);document.querySelector("body").style.lineHeight=e.desktop+"px"}))})),wp.customize("body_font_transform",(function(t){t.bind((function(t){document.querySelector("body").style.textTransform=t}))})),wp.customize("heading_font",(function(t){t.bind((function(t){var e=document.querySelectorAll("h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6");null!==e&&e.forEach((function(e){e.style.fontFamily=t}))}))})),wp.customize("h1_font_size",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h1, .h1");null!==o&&(o.style.fontSize=e.desktop+"px")}))})),wp.customize("h1_font_weight",(function(t){t.bind((function(t){var e=document.querySelector("h1, .h1");null!==e&&(e.style.fontWeight=t)}))})),wp.customize("h1_font_lineheight",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h1, .h1");null!==o&&(o.style.lineHeight=e.desktop+"px")}))})),wp.customize("h1_font_transform",(function(t){t.bind((function(t){var e=document.querySelector("h1, .h1");null!==e&&(e.style.textTransform=t)}))})),wp.customize("h2_font_size",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h2, .h2");null!==o&&(o.style.fontSize=e.desktop+"px")}))})),wp.customize("h2_font_weight",(function(t){t.bind((function(t){var e=document.querySelector("h2, .h2");null!==e&&(e.style.fontWeight=t)}))})),wp.customize("h2_font_lineheight",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h2, .h2");null!==o&&(o.style.lineHeight=e.desktop+"px")}))})),wp.customize("h2_font_transform",(function(t){t.bind((function(t){var e=document.querySelector("h2, .h2");null!==e&&(e.style.textTransform=t)}))})),wp.customize("h3_font_size",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h3, .h3");null!==o&&(o.style.fontSize=e.desktop+"px")}))})),wp.customize("h3_font_weight",(function(t){t.bind((function(t){var e=document.querySelector("h3, .h3");null!==e&&(e.style.fontWeight=t)}))})),wp.customize("h3_font_lineheight",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h3, .h3");null!==o&&(o.style.lineHeight=e.desktop+"px")}))})),wp.customize("h3_font_transform",(function(t){t.bind((function(t){var e=document.querySelector("h3, .h3");null!==e&&(e.style.textTransform=t)}))})),wp.customize("h4_font_size",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h4, .h4");null!==o&&(o.style.fontSize=e.desktop+"px")}))})),wp.customize("h4_font_weight",(function(t){t.bind((function(t){var e=document.querySelector("h4, .h4");null!==e&&(e.style.fontWeight=t)}))})),wp.customize("h4_font_lineheight",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h4, .h4");null!==o&&(o.style.lineHeight=e.desktop+"px")}))})),wp.customize("h4_font_transform",(function(t){t.bind((function(t){var e=document.querySelector("h4, .h4");null!==e&&(e.style.textTransform=t)}))})),wp.customize("h5_font_size",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h5, .h5");null!==o&&(o.style.fontSize=e.desktop+"px")}))})),wp.customize("h5_font_weight",(function(t){t.bind((function(t){var e=document.querySelector("h5, .h5");null!==e&&(e.style.fontWeight=t)}))})),wp.customize("h5_font_lineheight",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h5, .h5");null!==o&&(o.style.lineHeight=e.desktop+"px")}))})),wp.customize("h5_font_transform",(function(t){t.bind((function(t){var e=document.querySelector("h5, .h5");null!==e&&(e.style.textTransform=t)}))})),wp.customize("h6_font_size",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h6, .h6");null!==o&&(o.style.fontSize=e.desktop+"px")}))})),wp.customize("h6_font_weight",(function(t){t.bind((function(t){var e=document.querySelector("h6, .h6");null!==e&&(e.style.fontWeight=t)}))})),wp.customize("h6_font_lineheight",(function(t){t.bind((function(t){var e=JSON.parse(t),o=document.querySelector("h6, .h6");null!==o&&(o.style.lineHeight=e.desktop+"px")}))})),wp.customize("h6_font_transform",(function(t){t.bind((function(t){var e=document.querySelector("h6, .h6");null!==e&&(e.style.textTransform=t)}))})),wp.customize("menu_bg_color",(function(t){t.bind((function(t){document.querySelectorAll("#masthead, .alternative, .bg-primary, .menu-item ul.sub-menu").forEach((function(e){e.style.backgroundColor=t}))}))})),wp.customize("menu_link_color",(function(t){t.bind((function(t){var e=document.querySelectorAll(".bg-primary .navbar-toggler, .bg-primary a, .bg-transparent .navbar-toggler, .bg-transparent a"),o=document.querySelector(".nav-search-icon");null!==o&&(o.style.fill=t),e.forEach((function(e){e.style.color=t}))}))})),wp.customize("menu_link_active_color",(function(t){t.bind((function(t){document.querySelectorAll(".bg-primary .navbar-toggler, .bg-primary a, .bg-transparent .navbar-toggler, .bg-transparent a").forEach((function(e){e.style.color=t,e.addEventListener("mouseenter",(function(){e.style.color=t})),e.addEventListener("mouseleave",(function(){e.style.color=""}))}))}))})),wp.customize("menu_link_font_size",(function(t){t.bind((function(t){var e=JSON.parse(t);document.querySelectorAll(".navbar-nav .menu-item a").forEach((function(t){t.style.fontSize=e.desktop+"px"}))}))})),wp.customize("menu_link_font_weight",(function(t){t.bind((function(t){document.querySelectorAll(".navbar-nav .menu-item a").forEach((function(e){e.style.fontWeight=t}))}))})),wp.customize("cta_text_toggle",(function(t){t.bind((function(t){var e=document.querySelector(".call-to-action");null!==e&&(!0===t?e.classList.remove("hide"):e.classList.add("hide"))}))})),wp.customize("header_search_toggle",(function(t){t.bind((function(t){var e=document.querySelector(".utils-search");null!==e&&(!0===t?e.classList.remove("hide"):e.classList.add("hide"))}))})),wp.customize("cta_background",(function(t){t.bind((function(t){document.querySelector(".call-to-action").style.backgroundColor=t}))})),wp.customize("cta_color",(function(t){t.bind((function(t){document.querySelector(".call-to-action").style.color=t}))})),wp.customize("cta_text",(function(t){t.bind((function(t){document.querySelector(".call-to-action").innerHTML=t}))})),wp.customize("cta_text_link",(function(t){t.bind((function(t){document.querySelector(".call-to-action").href=t}))})),wp.customize("cta_font_size",(function(t){t.bind((function(t){var e=JSON.parse(t);document.querySelector(".call-to-action").style.fontSize=e.desktop+"px"}))})),wp.customize("cta_text_font_weight",(function(t){t.bind((function(t){document.querySelector(".call-to-action").style.fontWeight=t}))})),wp.customize("blog_meta_toggle",(function(t){t.bind((function(t){var e=document.querySelectorAll(".entry-meta");null!==e&&e.forEach((function(e){!0===t?e.classList.remove("hide"):e.classList.add("hide")}))}))})),wp.customize("featured_image_toggle",(function(t){t.bind((function(t){var e=document.querySelectorAll(".post-thumbnail");null!==e&&e.forEach((function(e){!0===t?e.classList.remove("hide"):e.classList.add("hide")}))}))})),wp.customize("post_title_toggle",(function(t){t.bind((function(t){var e=document.querySelectorAll(".entry-title");null!==e&&e.forEach((function(e){!0===t?e.classList.remove("hide"):e.classList.add("hide")}))}))})),wp.customize("post_excerpt_toggle",(function(t){t.bind((function(t){var e=document.querySelectorAll(".excerpt");null!==e&&e.forEach((function(e){!0===t?e.classList.remove("hide"):e.classList.add("hide")}))}))})),wp.customize("post_readmore_toggle",(function(t){t.bind((function(t){var e=document.querySelectorAll(".read-more");null!==e&&e.forEach((function(e){!0===t?e.classList.remove("hide"):e.classList.add("hide")}))}))})),wp.customize("category_meta_toggle",(function(t){t.bind((function(t){var e=document.querySelectorAll(".blog-cats");null!==e&&e.forEach((function(e){!0===t?e.classList.remove("hide"):e.classList.add("hide")}))}))})),wp.customize("author_meta_toggle",(function(t){t.bind((function(t){var e=document.querySelectorAll(".byline");null!==e&&e.forEach((function(e){!0===t?e.classList.remove("hide"):e.classList.add("hide")}))}))})),wp.customize("footer_logo_toggle",(function(t){t.bind((function(t){var e=document.querySelector(".site-info img#logo-footer");null!==e&&(!0===t?e.classList.remove("hide"):e.classList.add("hide"))}))})),wp.customize("footer_socialmedia_toggle",(function(t){t.bind((function(t){var e=document.querySelector(".site-info #footer-socialmedia");null!==e&&(!0===t?e.classList.remove("hide"):e.classList.add("hide"))}))})),wp.customize("footer_logo",(function(t){t.bind((function(t){var e=document.querySelector(".site-info img#logo-footer");e.src=null!==t?t:tutorstarter_vars.site_url+"/wp-content/themes/qubely-starters/assets/dist/images/zeus.png"}))})),wp.customize("footer_widgets_bg_color",(function(t){t.bind((function(t){document.querySelector(".footer-widgets").style.backgroundColor=t}))})),wp.customize("footer_bottom_bg_color",(function(t){t.bind((function(t){document.querySelector(".site-footer").style.backgroundColor=t}))})),wp.customize("footer_widgets_text_color",(function(t){t.bind((function(t){var e=document.querySelectorAll(".footer-widgets .widget-title"),o=document.querySelectorAll(".footer-widgets ul li a");e.forEach((function(e){e.style.color=t})),o.forEach((function(e){e.style.color=t}))}))})),wp.customize("footer_widget_font_size",(function(t){t.bind((function(t){var e=JSON.parse(t);document.querySelectorAll(".footer-widgets .widget-title").forEach((function(t){t.style.fontSize=e.desktop+"px"}))}))})),wp.customize("footer_widget_font_weight",(function(t){t.bind((function(t){document.querySelectorAll(".footer-widgets .widget-title").forEach((function(e){e.style.fontWeight=t}))}))})),wp.customize("footer_bottom_text_color",(function(t){t.bind((function(t){var e=document.querySelector(".site-footer .site-info span.copyright"),o=document.querySelectorAll("#secondary-menu li a");e.style.color=t,o.forEach((function(e){e.style.color=t}))}))})),wp.customize("footer_bottom_text",(function(t){t.bind((function(t){document.querySelector(".copyright-container span.copyright").innerHTML=t}))}))}});
>>>>>>> 0eba8e894f9f7572f123d5d65a719777540535fd
