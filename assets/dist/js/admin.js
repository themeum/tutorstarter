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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/scripts/admin.js":
/*!*************************************!*\
  !*** ./assets/src/scripts/admin.js ***!
  \*************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_schema_schema__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/schema/schema */ "./assets/src/scripts/modules/schema/schema.js");
/* harmony import */ var _modules_schema_schema__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_modules_schema_schema__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./assets/src/scripts/modules/schema/schema.js":
/*!*****************************************************!*\
  !*** ./assets/src/scripts/modules/schema/schema.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  var mainSchemaSelect = document.querySelector('#main_schema_select');
  var subSchemaSelect = document.querySelector('.meta-sub-schema');
  var name = document.querySelector('.meta-name');
  var description = document.querySelector('.meta-description');
  var logoUrl = document.querySelector('.meta-logo');
  var address = document.querySelector('.meta-address');
  var phone = document.querySelector('.meta-phone');
  var city = document.querySelector('.meta-city');
  var stateRegion = document.querySelector('.meta-state-region');
  var zipCode = document.querySelector('.meta-zip-code');
  var country = document.querySelector('.meta-country');
  var poBox = document.querySelector('.meta-po-box');
  var jobTitle = document.querySelector('.meta-job-title');
  var height = document.querySelector('.meta-height');
  var birthDate = document.querySelector('.meta-birth-date');
  var birthPlace = document.querySelector('.meta-birth-place');
  var nationality = document.querySelector('.meta-nationality');
  var duration = document.querySelector('.meta-duration');
  var uploadDate = document.querySelector('.meta-upload-date');
  var contentUrl = document.querySelector('.meta-content-url');
  var embedUrl = document.querySelector('.meta-embed-url');
  var interactionCount = document.querySelector('.meta-interaction-count');
  var ratingValue = document.querySelector('.meta-rating-value');
  var reviewedProduct = document.querySelector('.meta-reviewed-product');
  var reviewedBy = document.querySelector('.meta-reviewed-by');
  var datePublished = document.querySelector('.meta-date-published');
  var publisherType = document.querySelector('.meta-publisher-type');
  var publisherName = document.querySelector('.meta-publisher-name');
  var keywords = document.querySelector('.meta-keywords');
  var articleBody = document.querySelector('.meta-article-body');
  var providerName = document.querySelector('.meta-provider-name');

  if (null !== mainSchemaSelect) {
    mainSchemaSelect.addEventListener('change', function () {
      if ('Course' === mainSchemaSelect.value) {
        null !== logoUrl ? logoUrl.style.display = 'none' : '';
        null !== address ? address.style.display = 'none' : '';
        null !== phone ? phone.style.display = 'none' : '';
        null !== city ? city.style.display = 'none' : '';
        null !== stateRegion ? stateRegion.style.display = 'none' : '';
        null !== zipCode ? zipCode.style.display = 'none' : '';
        null !== country ? country.style.display = 'none' : '';
        null !== poBox ? poBox.style.display = 'none' : '';
        null !== jobTitle ? jobTitle.style.display = 'none' : '';
        null !== height ? height.style.display = 'none' : '';
        null !== birthDate ? birthDate.style.display = 'none' : '';
        null !== birthPlace ? birthPlace.style.display = 'none' : '';
        null !== nationality ? nationality.style.display = 'none' : '';
        null !== duration ? duration.style.display = 'none' : '';
        null !== uploadDate ? uploadDate.style.display = 'none' : '';
        null !== contentUrl ? contentUrl.style.display = 'none' : '';
        null !== embedUrl ? embedUrl.style.display = 'none' : '';
        null !== interactionCount ? interactionCount.style.display = 'none' : '';
        null !== ratingValue ? ratingValue.style.display = 'none' : '';
        null !== reviewedProduct ? reviewedProduct.style.display = 'none' : '';
        null !== reviewedBy ? reviewedBy.style.display = 'none' : '';
        null !== datePublished ? datePublished.style.display = 'none' : '';
        null !== publisherType ? publisherType.style.display = 'none' : '';
        null !== publisherName ? publisherName.style.display = 'none' : '';
        null !== keywords ? keywords.style.display = 'none' : '';
        null !== articleBody ? articleBody.style.display = 'none' : '';
        null !== subSchemaSelect ? subSchemaSelect.style.display = 'none' : '';
      }
    });
  }
})();

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./assets/src/scripts/admin.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/wp-tutor-starter/wp-content/themes/tutorstarter/assets/src/scripts/admin.js */"./assets/src/scripts/admin.js");


/***/ })

/******/ });