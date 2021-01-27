/******/ (function(modules) {
	// webpackBootstrap
	/******/ // The module cache
	/******/ var installedModules = {}; // The require function
	/******/
	/******/ /******/ function __webpack_require__(moduleId) {
		/******/
		/******/ // Check if module is in cache
		/******/ if (installedModules[moduleId]) {
			/******/ return installedModules[moduleId].exports;
			/******/
		} // Create a new module (and put it into the cache)
		/******/ /******/ var module = (installedModules[moduleId] = {
			/******/ i: moduleId,
			/******/ l: false,
			/******/ exports: {},
			/******/
		}); // Execute the module function
		/******/
		/******/ /******/ modules[moduleId].call(module.exports, module, module.exports, __webpack_require__); // Flag the module as loaded
		/******/
		/******/ /******/ module.l = true; // Return the exports of the module
		/******/
		/******/ /******/ return module.exports;
		/******/
	} // expose the modules object (__webpack_modules__)
	/******/
	/******/
	/******/ /******/ __webpack_require__.m = modules; // expose the module cache
	/******/
	/******/ /******/ __webpack_require__.c = installedModules; // define getter function for harmony exports
	/******/
	/******/ /******/ __webpack_require__.d = function(exports, name, getter) {
		/******/ if (!__webpack_require__.o(exports, name)) {
			/******/ Object.defineProperty(exports, name, { enumerable: true, get: getter });
			/******/
		}
		/******/
	}; // define __esModule on exports
	/******/
	/******/ /******/ __webpack_require__.r = function(exports) {
		/******/ if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
			/******/ Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
			/******/
		}
		/******/ Object.defineProperty(exports, '__esModule', { value: true });
		/******/
	}; // create a fake namespace object // mode & 1: value is a module id, require it // mode & 2: merge all properties of value into the ns // mode & 4: return value when already ns object // mode & 8|1: behave like require
	/******/
	/******/ /******/ /******/ /******/ /******/ /******/ __webpack_require__.t = function(value, mode) {
		/******/ if (mode & 1) value = __webpack_require__(value);
		/******/ if (mode & 8) return value;
		/******/ if (mode & 4 && typeof value === 'object' && value && value.__esModule) return value;
		/******/ var ns = Object.create(null);
		/******/ __webpack_require__.r(ns);
		/******/ Object.defineProperty(ns, 'default', { enumerable: true, value: value });
		/******/ if (mode & 2 && typeof value != 'string')
			for (var key in value)
				__webpack_require__.d(
					ns,
					key,
					function(key) {
						return value[key];
					}.bind(null, key)
				);
		/******/ return ns;
		/******/
	}; // getDefaultExport function for compatibility with non-harmony modules
	/******/
	/******/ /******/ __webpack_require__.n = function(module) {
		/******/ var getter =
			module && module.__esModule
				? /******/ function getDefault() {
						return module['default'];
				  }
				: /******/ function getModuleExports() {
						return module;
				  };
		/******/ __webpack_require__.d(getter, 'a', getter);
		/******/ return getter;
		/******/
	}; // Object.prototype.hasOwnProperty.call
	/******/
	/******/ /******/ __webpack_require__.o = function(object, property) {
		return Object.prototype.hasOwnProperty.call(object, property);
	}; // __webpack_public_path__
	/******/
	/******/ /******/ __webpack_require__.p = '/'; // Load entry module and return exports
	/******/
	/******/
	/******/ /******/ return __webpack_require__((__webpack_require__.s = 0));
	/******/
})(
	/************************************************************************/
	/******/ {
		/***/ './assets/src/sass/admin.scss':
			/*!************************************!*\
  !*** ./assets/src/sass/admin.scss ***!
  \************************************/
			/*! no static exports found */
			/***/ function(module, exports) {
				// removed by extract-text-webpack-plugin
				/***/
			},

		/***/ './assets/src/sass/style.scss':
			/*!************************************!*\
  !*** ./assets/src/sass/style.scss ***!
  \************************************/
			/*! no static exports found */
			/***/ function(module, exports) {
				// removed by extract-text-webpack-plugin
				/***/
			},

		/***/ './assets/src/scripts/app.js':
			/*!***********************************!*\
  !*** ./assets/src/scripts/app.js ***!
  \***********************************/
			/*! no exports provided */
			/***/ function(module, __webpack_exports__, __webpack_require__) {
				'use strict';
				__webpack_require__.r(__webpack_exports__);
				/* harmony import */ var _modules_navigation_navigation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
					/*! ./modules/navigation/navigation */ './assets/src/scripts/modules/navigation/navigation.js'
				);
				/* harmony import */ var _modules_navigation_navigation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/ __webpack_require__.n(
					_modules_navigation_navigation__WEBPACK_IMPORTED_MODULE_0__
				);
				/* harmony import */ var _modules_auth_google_signin__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(
					/*! ./modules/auth/google_signin */ './assets/src/scripts/modules/auth/google_signin.js'
				);
				/* harmony import */ var _modules_auth_google_signin__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/ __webpack_require__.n(
					_modules_auth_google_signin__WEBPACK_IMPORTED_MODULE_1__
				);
				/* harmony import */ var _modules_auth_signup__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(
					/*! ./modules/auth/signup */ './assets/src/scripts/modules/auth/signup.js'
				);
				/* harmony import */ var _modules_auth_signup__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/ __webpack_require__.n(
					_modules_auth_signup__WEBPACK_IMPORTED_MODULE_2__
				);
				/* harmony import */ var _modules_auth_signin__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(
					/*! ./modules/auth/signin */ './assets/src/scripts/modules/auth/signin.js'
				);
				/* harmony import */ var _modules_auth_signin__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/ __webpack_require__.n(
					_modules_auth_signin__WEBPACK_IMPORTED_MODULE_3__
				);
				/**
				 * Manage module imports
				 */

				/***/
			},

		/***/ './assets/src/scripts/modules/auth/google_signin.js':
			/*!**********************************************************!*\
  !*** ./assets/src/scripts/modules/auth/google_signin.js ***!
  \**********************************************************/
			/*! no static exports found */
			/***/ function(module, exports) {
				/**
				 * File google_signin.js.
				 *
				 * Handles google_signin in for new user
				 */
				(function() {
					var googleSignInBtn = document.getElementById('gSignIn2');
					var google_client_ID = tutorstarter_vars.google_client_ID;
					var googleUser = {};

					var startApp = function startApp() {
						gapi.load('auth2', function() {
							// Retrieve the singleton for the GoogleAuth library and set up the client.
							auth2 = gapi.auth2.init({
								//373496230444-uf119vqdp0hsrkujdjt6ucms3scp4v0d.apps.googleusercontent.com
								client_id: google_client_ID,
								cookiepolicy: 'single_host_origin', // Request scopes in addition to 'profile' and 'email'
								//scope: 'additional_scope'
							});
							attachSignin(document.getElementById('gSignIn2'));
						});
					};

					function attachSignin(element) {
						auth2.attachClickHandler(
							element,
							{},
							function(googleUser) {
								var profile = googleUser.getBasicProfile();
								var id_token = googleUser.getAuthResponse().id_token;
								var request = new XMLHttpRequest();
								var ajaxurl = tutorstarter_vars.ajaxurl;
								var authRedirectUrl = tutorstarter_vars.authRedirectUrl;
								var data = new FormData();
								data.append('id_token', id_token);
								data.append('useremail', profile.getEmail());
								data.append('userfirst', profile.getGivenName());
								data.append('userlast', profile.getFamilyName());
								data.append('action', 'ajaxgoogleauth');
								request.open('POST', ajaxurl);

								request.onreadystatechange = function(data) {
									if (this.readyState === 4 && this.status === 200) {
										var response = JSON.parse(this.responseText);
										var reg_status = document.querySelector('.signup-status');

										if (null !== reg_status) {
											reg_status.style.visibility = 'visible';

											if (response.loggedin == true) {
												reg_status.style.color = '#4285F4';
												reg_status.innerText = response.message;
												window.location.replace(authRedirectUrl);
											} else {
												reg_status.style.color = '#dc3545';
												reg_status.innerText = response.message;
											}
										}
									}
								};

								request.send(data);
							},
							function(error) {
								console.log(JSON.stringify(error, undefined, 2));
							}
						);
					}

					if (null !== googleSignInBtn) {
						startApp();
					}
				})();

				/***/
			},

		/***/ './assets/src/scripts/modules/auth/signin.js':
			/*!***************************************************!*\
  !*** ./assets/src/scripts/modules/auth/signin.js ***!
  \***************************************************/
			/*! no static exports found */
			/***/ function(module, exports) {
				/**
				 * File signin.js.
				 *
				 * Handles sign in for new user
				 */
				(function() {
					var tutor_signin_form = document.querySelector('.tutor-signin-form');

					if (null !== tutor_signin_form) {
						var userLogin = function userLogin(e) {
							e.preventDefault();
							var request = new XMLHttpRequest();
							var ajaxurl = tutorstarter_vars.ajaxurl;
							var authRedirectUrl = tutorstarter_vars.authRedirectUrl;
							var reg_status = document.querySelector('.signup-status');
							var data = new FormData();
							var email = document.querySelector('#login_email').value;
							var password = document.querySelector('#login_password').value;
							var signinNonce = document.querySelector('#signin-nonce').value;
							data.append('email', email);
							data.append('password', password);
							data.append('action', 'ajaxlogin');
							data.append('signinNonce', signinNonce);
							request.open('POST', ajaxurl);

							request.onreadystatechange = function() {
								if (this.readyState === 4 && this.status === 200) {
									var response = JSON.parse(this.responseText);
									console.log(response);
									reg_status.style.visibility = 'visible';

									if (response.loggedin == true) {
										reg_status.style.color = '#4285F4';
										reg_status.innerText = response.message;
										window.location.replace(authRedirectUrl);
									} else {
										reg_status.style.color = '#dc3545';
										reg_status.innerText = response.message;
									}
								}
							};

							request.send(data);
						};

						tutor_signin_form.addEventListener('submit', userLogin);
					}
				})();

				/***/
			},

		/***/ './assets/src/scripts/modules/auth/signup.js':
			/*!***************************************************!*\
  !*** ./assets/src/scripts/modules/auth/signup.js ***!
  \***************************************************/
			/*! no static exports found */
			/***/ function(module, exports) {
				/**
				 * File signup.js.
				 *
				 * Handles sign up for new user
				 */
				(function() {
					var tutor_signup_form = document.querySelector('.tutor-signup-form');

					if (null !== tutor_signup_form) {
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
							var signupNonce = document.querySelector('#signup-nonce').value;
							data.append('username', username);
							data.append('email', email);
							data.append('password', password);
							data.append('confirm_password', confirm_password);
							data.append('action', 'ajaxregister');
							data.append('signupNonce', signupNonce);
							request.open('POST', ajaxurl);

							request.onreadystatechange = function() {
								if (this.readyState === 4 && this.status === 200) {
									var response = JSON.parse(this.responseText);
									reg_status.style.visibility = 'visible';

									if (response.loggedin == true) {
										reg_status.style.color = '#4285F4';
										reg_status.innerText = response.message;
										window.location.replace(authRedirectUrl);
									} else {
										reg_status.style.color = '#dc3545';
										reg_status.innerText = response.message;
									}
								}
							};

							request.send(data);
						};

						tutor_signup_form.addEventListener('submit', registerUser);
					}
				})();

				/***/
			},

		/***/ './assets/src/scripts/modules/navigation/navigation.js':
			/*!*************************************************************!*\
  !*** ./assets/src/scripts/modules/navigation/navigation.js ***!
  \*************************************************************/
			/*! no static exports found */
			/***/ function(module, exports) {
				/**
				 * File navigation.js.
				 *
				 * Handles toggling the navigation menu for small screens
				 */
				(function() {
					/* Navbar toggler */
					var toggleBtn = document.querySelector('.navbar-toggler');
					var navbarNav = document.querySelector('.navbar-nav');
					var navCloseBtn = document.querySelector('.btn-nav-close');

					if (toggleBtn !== null) {
						toggleBtn.addEventListener('click', function() {
							navbarNav.classList.toggle('active');
						});
					}

					if (navCloseBtn !== null) {
						navCloseBtn.addEventListener('click', function() {
							navbarNav.classList.remove('active');
						});
					}
					/* Search popup */

					var searchBtn = document.querySelector('.btn-search');
					var searchBtnClose = document.querySelector('.btn-search-close');
					var searchPopup = document.querySelector('.search-popup');

					if (searchBtn !== null) {
						searchBtn.addEventListener('click', function() {
							searchPopup.classList.toggle('active');
						});
					}

					if (searchBtnClose !== null) {
						searchBtnClose.addEventListener('click', function() {
							searchPopup.classList.remove('active');
						});
					}
					/* Add icon on .nav-item if dropdown exists */

					var hasDropdowns = document.querySelectorAll('.menu-item-has-children');

					if (hasDropdowns !== null) {
						hasDropdowns.forEach(function(item) {
							item.classList.add('icon');
						});
					}
				})();

				/***/
			},

		/***/ './inc/Api/Customizer/reactjs/src/sass/all-controls.scss':
			/*!***************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/sass/all-controls.scss ***!
  \***************************************************************/
			/*! no static exports found */
			/***/ function(module, exports) {
				// removed by extract-text-webpack-plugin
				/***/
			},

		/***/ './inc/Setup/Settings/reactjs/src/sass/dashboard.scss':
			/*!************************************************************!*\
  !*** ./inc/Setup/Settings/reactjs/src/sass/dashboard.scss ***!
  \************************************************************/
			/*! no static exports found */
			/***/ function(module, exports) {
				// removed by extract-text-webpack-plugin
				/***/
			},

		/***/ 0:
			/*!****************************************************************************************************************************************************************************************************************!*\
  !*** multi ./assets/src/scripts/app.js ./assets/src/sass/style.scss ./assets/src/sass/admin.scss ./inc/Api/Customizer/reactjs/src/sass/all-controls.scss ./inc/Setup/Settings/reactjs/src/sass/dashboard.scss ***!
  \****************************************************************************************************************************************************************************************************************/
			/*! no static exports found */
			/***/ function(module, exports, __webpack_require__) {
				__webpack_require__(
					/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/assets/src/scripts/app.js */ './assets/src/scripts/app.js'
				);
				__webpack_require__(
					/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/assets/src/sass/style.scss */ './assets/src/sass/style.scss'
				);
				__webpack_require__(
					/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/assets/src/sass/admin.scss */ './assets/src/sass/admin.scss'
				);
				__webpack_require__(
					/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/inc/Api/Customizer/reactjs/src/sass/all-controls.scss */ './inc/Api/Customizer/reactjs/src/sass/all-controls.scss'
				);
				module.exports = __webpack_require__(
					/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/inc/Setup/Settings/reactjs/src/sass/dashboard.scss */ './inc/Setup/Settings/reactjs/src/sass/dashboard.scss'
				);

				/***/
			},

		/******/
	}
);
