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
/* harmony import */ var _modules_auth_signup__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/auth/signup */ "./assets/src/scripts/modules/auth/signup.js");
/* harmony import */ var _modules_auth_signup__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_modules_auth_signup__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _modules_auth_signin__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/auth/signin */ "./assets/src/scripts/modules/auth/signin.js");
/* harmony import */ var _modules_auth_signin__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_modules_auth_signin__WEBPACK_IMPORTED_MODULE_2__);
/**
 * Manage module imports
 */




/***/ }),

/***/ "./assets/src/scripts/modules/auth/signin.js":
/*!***************************************************!*\
  !*** ./assets/src/scripts/modules/auth/signin.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * File signin.js.
 *
 * Handles sign in for new user
 */
(function () {
  var tutor_signin_form = document.querySelector('.tutor-signin-form');

  if (null != tutor_signin_form) {
    var userLogin = function userLogin(e) {
      e.preventDefault();
      var request = new XMLHttpRequest();
      var ajaxurl = tutorstarter_vars.ajaxurl;
      var authRedirectUrl = tutorstarter_vars.authRedirectUrl;
      var reg_status = document.querySelector('.signup-status');
      var data = new FormData();
      var email = document.querySelector('#login_email').value;
      var password = document.querySelector('#login_password').value;
      data.append('email', email);
      data.append('password', password);
      data.append('action', 'ajaxlogin');
      console.log(email, password);
      request.open("POST", ajaxurl);

      request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
          var response = JSON.parse(this.responseText);
          reg_status.style.visibility = "visible";

          if (response.loggedin == true) {
            reg_status.style.color = "#4285F4";
            reg_status.innerText = response.message;
            window.location.replace(authRedirectUrl);
          } else {
            reg_status.style.color = "#dc3545";
            reg_status.innerText = response.message;
          }
        }
      };

      request.send(data);
    };

    tutor_signin_form.addEventListener('submit', userLogin);
  }
})();

/***/ }),

/***/ "./assets/src/scripts/modules/auth/signup.js":
/*!***************************************************!*\
  !*** ./assets/src/scripts/modules/auth/signup.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * File signup.js.
 *
 * Handles sign up for new user
 */
(function () {
  var tutor_signup_form = document.querySelector('.tutor-signup-form');

  if (null != tutor_signup_form) {
    var registerUser = function registerUser(e) {
      e.preventDefault();
      var request = new XMLHttpRequest();
      var ajaxurl = tutorstarter_vars.ajaxurl;
      var authRedirectUrl = tutorstarter_vars.authRedirectUrl;
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
            window.location.replace(authRedirectUrl);
          } else {
            reg_status.style.color = "#dc3545";
            reg_status.innerText = response.message;
          }
        }
      };

      request.send(data);
    };

    tutor_signup_form.addEventListener('submit', registerUser);
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

__webpack_require__(/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/assets/src/scripts/app.js */"./assets/src/scripts/app.js");
__webpack_require__(/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/assets/src/sass/style.scss */"./assets/src/sass/style.scss");
__webpack_require__(/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/assets/src/sass/admin.scss */"./assets/src/sass/admin.scss");
__webpack_require__(/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/inc/Api/Customizer/reactjs/src/sass/all-controls.scss */"./inc/Api/Customizer/reactjs/src/sass/all-controls.scss");
module.exports = __webpack_require__(/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/inc/Setup/Settings/reactjs/src/sass/dashboard.scss */"./inc/Setup/Settings/reactjs/src/sass/dashboard.scss");


/***/ })

/******/ });
=======
!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=0)}({0:function(e,t,n){n("qGtB"),n("jxXz"),n("cWzd"),n("RkYc"),e.exports=n("1P/x")},"1P/x":function(e,t){},Mugk:function(e,t){!function(){var e=document.querySelector(".tutor-signup-form");if(null!=e){e.addEventListener("submit",(function(e){e.preventDefault();var t=new XMLHttpRequest,n=tutorstarter_vars.ajaxurl,r=tutorstarter_vars.authRedirectUrl,o=document.querySelector(".signup-status"),a=new FormData,i=document.querySelector("#fullname").value,u=document.querySelector("#email").value,c=document.querySelector("#password").value,s=document.querySelector("#confirm-password").value,l=document.querySelector("#signup-nonce").value;a.append("username",i),a.append("email",u),a.append("password",c),a.append("confirm_password",s),a.append("action","ajaxregister"),a.append("signupNonce",l),t.open("POST",n),t.onreadystatechange=function(){if(4===this.readyState&&200===this.status){var e=JSON.parse(this.responseText);o.style.visibility="visible",1==e.loggedin?(o.style.color="#4285F4",o.innerText=e.message,window.location.replace(r)):(o.style.color="#dc3545",o.innerText=e.message)}},t.send(a)}))}}()},RkYc:function(e,t){},cWzd:function(e,t){},jxXz:function(e,t){},qGtB:function(e,t,n){"use strict";n.r(t);n("vr5C"),n("vtT1"),n("Mugk"),n("wcBj")},vr5C:function(e,t){!function(){var e=document.querySelector(".navbar-toggler"),t=document.querySelector(".navbar-nav"),n=document.querySelector(".btn-nav-close");null!==e&&e.addEventListener("click",(function(){t.classList.toggle("active")})),null!==n&&n.addEventListener("click",(function(){t.classList.remove("active")}));var r=document.querySelector(".btn-search"),o=document.querySelector(".btn-search-close"),a=document.querySelector(".search-popup");null!==r&&r.addEventListener("click",(function(){a.classList.toggle("active")})),null!==o&&o.addEventListener("click",(function(){a.classList.remove("active")}));var i=document.querySelectorAll(".menu-item-has-children");null!==i&&i.forEach((function(e){e.classList.add("icon")}))}()},vtT1:function(e,t){var n,r;n=document.getElementById("gSignIn2"),r=tutorstarter_vars.google_client_ID,null!==n&&gapi.load("auth2",(function(){var e;auth2=gapi.auth2.init({client_id:r,cookiepolicy:"single_host_origin"}),e=document.getElementById("gSignIn2"),auth2.attachClickHandler(e,{},(function(e){var t=e.getBasicProfile(),n=e.getAuthResponse().id_token,r=new XMLHttpRequest,o=tutorstarter_vars.ajaxurl,a=tutorstarter_vars.authRedirectUrl,i=new FormData;i.append("id_token",n),i.append("useremail",t.getEmail()),i.append("userfirst",t.getGivenName()),i.append("userlast",t.getFamilyName()),i.append("action","ajaxgoogleauth"),r.open("POST",o),r.onreadystatechange=function(e){if(4===this.readyState&&200===this.status){var t=JSON.parse(this.responseText),n=document.querySelector(".signup-status");null!==n&&(n.style.visibility="visible",1==t.loggedin?(n.style.color="#4285F4",n.innerText=t.message,window.location.replace(a)):(n.style.color="#dc3545",n.innerText=t.message))}},r.send(i)}),(function(e){alert(JSON.stringify(e,void 0,2))}))}))},wcBj:function(e,t){!function(){var e=document.querySelector(".tutor-signin-form");if(null!=e){e.addEventListener("submit",(function(e){e.preventDefault();var t=new XMLHttpRequest,n=tutorstarter_vars.ajaxurl,r=tutorstarter_vars.authRedirectUrl,o=document.querySelector(".signup-status"),a=new FormData,i=document.querySelector("#login_email").value,u=document.querySelector("#login_password").value,c=document.querySelector("#signin-nonce").value;a.append("email",i),a.append("password",u),a.append("action","ajaxlogin"),a.append("signinNonce",c),t.open("POST",n),t.onreadystatechange=function(){if(4===this.readyState&&200===this.status){var e=JSON.parse(this.responseText);console.log(e),o.style.visibility="visible",1==e.loggedin?(o.style.color="#4285F4",o.innerText=e.message,window.location.replace(r)):(o.style.color="#dc3545",o.innerText=e.message)}},t.send(a)}))}}()}});
>>>>>>> 0eba8e894f9f7572f123d5d65a719777540535fd
