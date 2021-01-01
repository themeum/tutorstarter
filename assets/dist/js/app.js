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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/sass/admin.scss":
/*!************************************!*\
  !*** ./assets/src/sass/admin.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./assets/src/sass/style.scss":
/*!************************************!*\
  !*** ./assets/src/sass/style.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./assets/src/scripts/app.js":
/*!***********************************!*\
  !*** ./assets/src/scripts/app.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_navigation_navigation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/navigation/navigation */ "./assets/src/scripts/modules/navigation/navigation.js");
/* harmony import */ var _modules_navigation_navigation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_modules_navigation_navigation__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _modules_auth_registration__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/auth/registration */ "./assets/src/scripts/modules/auth/registration.js");
/* harmony import */ var _modules_auth_registration__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_modules_auth_registration__WEBPACK_IMPORTED_MODULE_1__);
/**
 * Manage module imports
 */



/***/ }),

/***/ "./assets/src/scripts/modules/auth/registration.js":
/*!*********************************************************!*\
  !*** ./assets/src/scripts/modules/auth/registration.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  var tutor_signin_form = document.querySelector('.tutor-signin-form');
  tutor_signin_form.addEventListener('submit', registerUser);

  function registerUser(e) {
    e.preventDefault();
    var request = new XMLHttpRequest();
    var ajaxurl = tutorstarter_vars.ajaxurl;
    var reg_status = document.querySelector('.signup-status');
    var data = new FormData();
    var username = document.querySelector('#fullname').value;
    var email = document.querySelector('#email').value;
    var password = document.querySelector('#password').value;
    var confirm_password = document.querySelector('#confirm-password').value;
    data.append('username', username);
    data.append('email', email);
    data.append('password', password);
    data.append('confirm_password', confirm_password);
    data.append('action', 'ajaxregister');
    request.open("POST", ajaxurl);

    request.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        var response = JSON.parse(this.responseText);
        reg_status.style.visibility = "visible";

        if (response.loggedin == true) {
          reg_status.style.color = "#4285F4";
          reg_status.innerText = response.message;
        } else {
          reg_status.style.color = "#dc3545";
          reg_status.innerText = response.message;
        }
      }
    };

    request.send(data);
  }
})();

/***/ }),

/***/ "./assets/src/scripts/modules/navigation/navigation.js":
/*!*************************************************************!*\
  !*** ./assets/src/scripts/modules/navigation/navigation.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens 
 */
(function () {
  /* Navbar toggler */
  var toggleBtn = document.querySelector(".navbar-toggler");
  var navbarNav = document.querySelector(".navbar-nav");
  var navCloseBtn = document.querySelector(".btn-nav-close");

  if (toggleBtn !== null) {
    toggleBtn.addEventListener("click", function () {
      navbarNav.classList.toggle("active");
    });
  }

  if (navCloseBtn !== null) {
    navCloseBtn.addEventListener("click", function () {
      navbarNav.classList.remove("active");
    });
  }
  /* Search popup */


  var searchBtn = document.querySelector(".btn-search");
  var searchBtnClose = document.querySelector(".btn-search-close");
  var searchPopup = document.querySelector(".search-popup");

  if (searchBtn !== null) {
    searchBtn.addEventListener("click", function () {
      searchPopup.classList.toggle("active");
    });
  }

  if (searchBtnClose !== null) {
    searchBtnClose.addEventListener("click", function () {
      searchPopup.classList.remove("active");
    });
  }
  /* Add icon on .nav-item if dropdown exists */


  var hasDropdowns = document.querySelectorAll(".menu-item-has-children");

  if (hasDropdowns !== null) {
    hasDropdowns.forEach(function (item) {
      item.classList.add('icon');
    });
  }
})();

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/sass/all-controls.scss":
/*!***************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/sass/all-controls.scss ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./inc/Setup/Settings/reactjs/src/sass/dashboard.scss":
/*!************************************************************!*\
  !*** ./inc/Setup/Settings/reactjs/src/sass/dashboard.scss ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** multi ./assets/src/scripts/app.js ./assets/src/sass/style.scss ./assets/src/sass/admin.scss ./inc/Api/Customizer/reactjs/src/sass/all-controls.scss ./inc/Setup/Settings/reactjs/src/sass/dashboard.scss ***!
  \****************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Applications/MAMP/htdocs/tutortheme/wp-content/themes/tutorstarter/assets/src/scripts/app.js */"./assets/src/scripts/app.js");
__webpack_require__(/*! /Applications/MAMP/htdocs/tutortheme/wp-content/themes/tutorstarter/assets/src/sass/style.scss */"./assets/src/sass/style.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/tutortheme/wp-content/themes/tutorstarter/assets/src/sass/admin.scss */"./assets/src/sass/admin.scss");
__webpack_require__(/*! /Applications/MAMP/htdocs/tutortheme/wp-content/themes/tutorstarter/inc/Api/Customizer/reactjs/src/sass/all-controls.scss */"./inc/Api/Customizer/reactjs/src/sass/all-controls.scss");
module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/tutortheme/wp-content/themes/tutorstarter/inc/Setup/Settings/reactjs/src/sass/dashboard.scss */"./inc/Setup/Settings/reactjs/src/sass/dashboard.scss");


/***/ })

/******/ });