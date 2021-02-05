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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./inc/Custom/Page/reactjs/src/page-settings/fields/page-settings-fields.js":
/*!**********************************************************************************!*\
  !*** ./inc/Custom/Page/reactjs/src/page-settings/fields/page-settings-fields.js ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _slicedToArray(arr, i) {
  return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest();
}

function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return _arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
}

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }

  return arr2;
}

function _iterableToArrayLimit(arr, i) {
  if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return;
  var _arr = [];
  var _n = true;
  var _d = false;
  var _e = undefined;

  try {
    for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}

var __ = wp.i18n.__;
var _wp$element = wp.element,
    Fragment = _wp$element.Fragment,
    useState = _wp$element.useState;
var _wp$components = wp.components,
    SelectControl = _wp$components.SelectControl,
    ToggleControl = _wp$components.ToggleControl;

var PageSettingsFields = function PageSettingsFields() {
  var page_meta = JSON.parse(tutorstarter_admin_schema.page_meta);

  var _useState = useState(page_meta.page_title_toggle),
      _useState2 = _slicedToArray(_useState, 2),
      page_title_toggle = _useState2[0],
      setDisableTitle = _useState2[1];

  var _useState3 = useState(page_meta.header_toggle),
      _useState4 = _slicedToArray(_useState3, 2),
      header_toggle = _useState4[0],
      setDisableHeader = _useState4[1];

  var _useState5 = useState(page_meta.footer_toggle),
      _useState6 = _slicedToArray(_useState5, 2),
      footer_toggle = _useState6[0],
      setDisableFooter = _useState6[1];

  var _useState7 = useState(page_meta.sidebar_select),
      _useState8 = _slicedToArray(_useState7, 2),
      sidebar_select = _useState8[0],
      setSidebar = _useState8[1];

  var _useState9 = useState(page_meta.header_select),
      _useState10 = _slicedToArray(_useState9, 2),
      header_select = _useState10[0],
      setHeader = _useState10[1];

  var _useState11 = useState(page_meta.footer_select),
      _useState12 = _slicedToArray(_useState11, 2),
      footer_select = _useState12[0],
      setFooter = _useState12[1];

  return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(SelectControl, {
    label: __('Sidebar', 'tutorstarter'),
    id: "sidebar_select",
    name: "sidebar_select",
    value: sidebar_select,
    options: [{
      label: __('--Select Option--', 'tutorstarter'),
      value: ''
    }, {
      label: __('No Sidebar', 'tutorstarter'),
      value: 'no-sidebar'
    }, {
      label: __('Left Sidebar', 'tutorstarter'),
      value: 'left-sidebar'
    }, {
      label: __('Right Sidebar', 'tutorstarter'),
      value: 'right-sidebar'
    }],
    onChange: function onChange(value) {
      return setSidebar(value);
    }
  }), /*#__PURE__*/React.createElement(SelectControl, {
    label: __('Header', 'tutorstarter'),
    id: "header_select",
    name: "header_select",
    value: header_select,
    options: [{
      label: __('--Select Header--', 'tutorstarter'),
      value: ''
    }, {
      label: __('Fullwidth', 'tutorstarter'),
      value: 'header_one'
    }, {
      label: __('Fullwidth Transparent', 'tutorstarter'),
      value: 'header_one_trans'
    }, {
      label: __('Standard', 'tutorstarter'),
      value: 'header_two'
    }, {
      label: __('Standard Transparent', 'tutorstarter'),
      value: 'header_three'
    }, {
      label: __('Centered Logo', 'tutorstarter'),
      value: 'header_four'
    }],
    onChange: function onChange(value) {
      return setHeader(value);
    }
  }), /*#__PURE__*/React.createElement(SelectControl, {
    label: __('Footer', 'tutorstarter'),
    id: "footer_select",
    name: "footer_select",
    value: footer_select,
    options: [{
      label: __('--Select Footer--', 'tutorstarter'),
      value: ''
    }, {
      label: __('Type 1', 'tutorstarter'),
      value: 'footer_one'
    }, {
      label: __('Type 2', 'tutorstarter'),
      value: 'footer_two'
    }, {
      label: __('Type 3', 'tutorstarter'),
      value: 'footer_three'
    }, {
      label: __('Type 4', 'tutorstarter'),
      value: 'footer_four'
    }, {
      label: __('Type 5', 'tutorstarter'),
      value: 'footer_five'
    }],
    onChange: function onChange(value) {
      return setFooter(value);
    }
  }), /*#__PURE__*/React.createElement(ToggleControl, {
    label: __('Disable Title?', 'tutorstarter'),
    id: "page_title_toggle",
    name: "page_title_toggle",
    checked: page_title_toggle,
    onChange: function onChange(value) {
      return setDisableTitle(value);
    }
  }), /*#__PURE__*/React.createElement(ToggleControl, {
    label: __('Disable Header?', 'tutorstarter'),
    id: "header_toggle",
    name: "header_toggle",
    checked: header_toggle,
    onChange: function onChange(value) {
      return setDisableHeader(value);
    }
  }), /*#__PURE__*/React.createElement(ToggleControl, {
    label: __('Disable Footer?', 'tutorstarter'),
    id: "footer_toggle",
    name: "footer_toggle",
    checked: footer_toggle,
    onChange: function onChange(value) {
      return setDisableFooter(value);
    }
  }));
};

/* harmony default export */ __webpack_exports__["default"] = (PageSettingsFields);

/***/ }),

/***/ "./inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js":
/*!*******************************************************************!*\
  !*** ./inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js ***!
  \*******************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _page_settings_fields_page_settings_fields__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./page-settings/fields/page-settings-fields */ "./inc/Custom/Page/reactjs/src/page-settings/fields/page-settings-fields.js");
var render = wp.element.render;

render( /*#__PURE__*/React.createElement(_page_settings_fields_page_settings_fields__WEBPACK_IMPORTED_MODULE_0__["default"], null), document.getElementById('tutorstarter-page-settings'));

/***/ }),

/***/ 4:
/*!*************************************************************************!*\
  !*** multi ./inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Volumes/Web/Projects/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js */"./inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js");


/***/ })

/******/ });