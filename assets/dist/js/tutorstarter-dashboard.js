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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./inc/Setup/Settings/reactjs/src/general/index.js":
/*!*********************************************************!*\
  !*** ./inc/Setup/Settings/reactjs/src/general/index.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var __ = wp.i18n.__;
var General = function General() {
  var adminUrl = tutorstarter_dashboard.admin_url;
  return /*#__PURE__*/React.createElement("div", {
    className: "tutorstarter-opt-wrapper"
  }, /*#__PURE__*/React.createElement("header", {
    className: "tutorstarter-opt-header"
  }, /*#__PURE__*/React.createElement("div", {
    className: "tutorstarter-opt-container header-content"
  }, /*#__PURE__*/React.createElement("div", {
    className: "thm-title"
  }, /*#__PURE__*/React.createElement("h1", null, __('Tutor Starter', 'tutorstarter'))), /*#__PURE__*/React.createElement("p", {
    style: {
      fontWeight: 200,
      fontSize: '16px'
    }
  }, " - v", tutorstarter_dashboard.theme_version)), /*#__PURE__*/React.createElement("h4", {
    className: "title"
  }, /*#__PURE__*/React.createElement("span", null, __('Customizer Quick Links', 'tutorstarter')))), /*#__PURE__*/React.createElement("main", {
    className: "tutorstarter-opt-container"
  }, /*#__PURE__*/React.createElement("div", {
    className: "tutorstarter-opt-content"
  }, /*#__PURE__*/React.createElement("a", {
    className: "tutorstarter-opt-card",
    href: "".concat(adminUrl, "customize.php?autofocus[section]=tutorstarter_colors_section")
  }, /*#__PURE__*/React.createElement("span", {
    className: "dashicons dashicons-color-picker"
  }), /*#__PURE__*/React.createElement("p", null, __('Colors', 'tutorstarter'))), /*#__PURE__*/React.createElement("a", {
    className: "tutorstarter-opt-card",
    href: "".concat(adminUrl, "customize.php?autofocus[section]=tutorstarter_layout_section")
  }, /*#__PURE__*/React.createElement("span", {
    className: "dashicons dashicons-layout"
  }), /*#__PURE__*/React.createElement("p", null, __('Layouts', 'tutorstarter'))), /*#__PURE__*/React.createElement("a", {
    className: "tutorstarter-opt-card",
    href: "".concat(adminUrl, "customize.php?autofocus[section]=tutorstarter_header_section")
  }, /*#__PURE__*/React.createElement("span", {
    className: "dashicons dashicons-archive"
  }), /*#__PURE__*/React.createElement("p", null, __('Header', 'tutorstarter'))), /*#__PURE__*/React.createElement("a", {
    className: "tutorstarter-opt-card",
    href: "".concat(adminUrl, "customize.php?autofocus[section]=tutorstarter_footer_section")
  }, /*#__PURE__*/React.createElement("span", {
    className: "dashicons dashicons-table-row-before"
  }), /*#__PURE__*/React.createElement("p", null, __('Footer', 'tutorstarter'))), /*#__PURE__*/React.createElement("a", {
    className: "tutorstarter-opt-card",
    href: "".concat(adminUrl, "customize.php?autofocus[section]=tutorstarter_typography_section")
  }, /*#__PURE__*/React.createElement("span", {
    className: "dashicons dashicons-editor-spellcheck"
  }), /*#__PURE__*/React.createElement("p", null, __('Typography', 'tutorstarter'))), /*#__PURE__*/React.createElement("a", {
    className: "tutorstarter-opt-card",
    href: "".concat(adminUrl, "customize.php?autofocus[section]=tutorstarter_blog_section")
  }, /*#__PURE__*/React.createElement("span", {
    className: "dashicons dashicons-edit-page"
  }), /*#__PURE__*/React.createElement("p", null, __('Blog', 'tutorstarter'))))));
};
/* harmony default export */ __webpack_exports__["default"] = (General);

/***/ }),

/***/ "./inc/Setup/Settings/reactjs/src/index.js":
/*!*************************************************!*\
  !*** ./inc/Setup/Settings/reactjs/src/index.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _general__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./general */ "./inc/Setup/Settings/reactjs/src/general/index.js");
var Fragment = wp.element.Fragment;

var Dashboard = function Dashboard() {
  return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(_general__WEBPACK_IMPORTED_MODULE_0__["default"], null));
};
/* harmony default export */ __webpack_exports__["default"] = (Dashboard);

/***/ }),

/***/ "./inc/Setup/Settings/reactjs/src/tutorstarter-dashboard.js":
/*!******************************************************************!*\
  !*** ./inc/Setup/Settings/reactjs/src/tutorstarter-dashboard.js ***!
  \******************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index */ "./inc/Setup/Settings/reactjs/src/index.js");
var render = wp.element.render;

render(/*#__PURE__*/React.createElement(_index__WEBPACK_IMPORTED_MODULE_0__["default"], null), document.getElementById('tutorstarter-dashboard'));

/***/ }),

/***/ 5:
/*!************************************************************************!*\
  !*** multi ./inc/Setup/Settings/reactjs/src/tutorstarter-dashboard.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/nuralam/valet/template-import/wp-content/themes/tutorstarter/inc/Setup/Settings/reactjs/src/tutorstarter-dashboard.js */"./inc/Setup/Settings/reactjs/src/tutorstarter-dashboard.js");


/***/ })

/******/ });