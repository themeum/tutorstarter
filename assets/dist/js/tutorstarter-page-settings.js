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
var __ = wp.i18n.__;
var Fragment = wp.element.Fragment;
var _wp$components = wp.components,
  SelectControl = _wp$components.SelectControl,
  ToggleControl = _wp$components.ToggleControl;
var PageSettingsFields = function PageSettingsFields(_ref) {
  var updatedValue = _ref.updatedValue,
    updateMeta = _ref.updateMeta;
  var is_page = tutorstarter_admin_page.is_page;
  if ('1' === is_page) {
    return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(SelectControl, {
      label: __('Sidebar', 'tutorstarter'),
      value: null !== updatedValue ? updatedValue.sidebar_select : 'no-sidebar',
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
        return updateMeta(value, 'sidebar_select');
      }
    }), /*#__PURE__*/React.createElement(SelectControl, {
      label: __('Footer', 'tutorstarter'),
      value: null !== updatedValue ? updatedValue.footer_select : '',
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
        return updateMeta(value, 'footer_select');
      }
    }), /*#__PURE__*/React.createElement(ToggleControl, {
      label: __('Disable Title?', 'tutorstarter'),
      checked: null !== updatedValue ? updatedValue.page_title_toggle : false,
      onChange: function onChange(value) {
        return updateMeta(value, 'page_title_toggle');
      }
    }), /*#__PURE__*/React.createElement(ToggleControl, {
      label: __('Disable Header?', 'tutorstarter'),
      checked: null !== updatedValue ? updatedValue.header_toggle : false,
      onChange: function onChange(value) {
        return updateMeta(value, 'header_toggle');
      }
    }), /*#__PURE__*/React.createElement(ToggleControl, {
      label: __('Enable Transparent Header?', 'tutorstarter'),
      checked: null !== updatedValue ? updatedValue.header_trans_toggle : false,
      onChange: function onChange(value) {
        return updateMeta(value, 'header_trans_toggle');
      }
    }), /*#__PURE__*/React.createElement(ToggleControl, {
      label: __('Disable Footer?', 'tutorstarter'),
      checked: null !== updatedValue ? updatedValue.footer_toggle : false,
      onChange: function onChange(value) {
        return updateMeta(value, 'footer_toggle');
      }
    }));
  } else {
    return /*#__PURE__*/React.createElement(Fragment, null);
  }
};
/* harmony default export */ __webpack_exports__["default"] = (PageSettingsFields);

/***/ }),

/***/ "./inc/Custom/Page/reactjs/src/page-settings/index.js":
/*!************************************************************!*\
  !*** ./inc/Custom/Page/reactjs/src/page-settings/index.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _fields_page_settings_fields__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./fields/page-settings-fields */ "./inc/Custom/Page/reactjs/src/page-settings/fields/page-settings-fields.js");
function _typeof(o) {
  "@babel/helpers - typeof";

  return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
    return typeof o;
  } : function (o) {
    return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
  }, _typeof(o);
}
function ownKeys(e, r) {
  var t = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    r && (o = o.filter(function (r) {
      return Object.getOwnPropertyDescriptor(e, r).enumerable;
    })), t.push.apply(t, o);
  }
  return t;
}
function _objectSpread(e) {
  for (var r = 1; r < arguments.length; r++) {
    var t = null != arguments[r] ? arguments[r] : {};
    r % 2 ? ownKeys(Object(t), !0).forEach(function (r) {
      _defineProperty(e, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) {
      Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return e;
}
function _defineProperty(e, r, t) {
  return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, {
    value: t,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : e[r] = t, e;
}
function _toPropertyKey(t) {
  var i = _toPrimitive(t, "string");
  return "symbol" == _typeof(i) ? i : i + "";
}
function _toPrimitive(t, r) {
  if ("object" != _typeof(t) || !t) return t;
  var e = t[Symbol.toPrimitive];
  if (void 0 !== e) {
    var i = e.call(t, r || "default");
    if ("object" != _typeof(i)) return i;
    throw new TypeError("@@toPrimitive must return a primitive value.");
  }
  return ("string" === r ? String : Number)(t);
}
var __ = wp.i18n.__;
var compose = wp.compose.compose;
var PluginDocumentSettingPanel = wp.editPost.PluginDocumentSettingPanel;
var _wp$data = wp.data,
  select = _wp$data.select,
  withSelect = _wp$data.withSelect,
  withDispatch = _wp$data.withDispatch;

var PageSettingsFieldsData = compose([withSelect(function () {
  return {
    updatedValue: select('core/editor').getEditedPostAttribute('meta')._tutorstarter_page_metadata
  };
}), withDispatch(function (dispatch) {
  return {
    updateMeta: function updateMeta(value, prop) {
      var meta = select('core/editor').getEditedPostAttribute('meta')._tutorstarter_page_metadata;
      meta = _objectSpread({
        sidebar_select: '',
        footer_select: '',
        page_title_toggle: false,
        header_toggle: false,
        header_trans_toggle: false,
        footer_toggle: false
      }, meta);
      meta[prop] = value;
      dispatch('core/editor').editPost({
        meta: {
          _tutorstarter_page_metadata: meta
        }
      });
    }
  };
})])(_fields_page_settings_fields__WEBPACK_IMPORTED_MODULE_0__["default"]);
var TutorStarterPageSettingsPanel = function TutorStarterPageSettingsPanel() {
  return /*#__PURE__*/React.createElement(PluginDocumentSettingPanel, {
    name: "tutorstarter-settings-panel",
    title: __('Tutor Starter Page Settings', 'tutorstarter')
  }, /*#__PURE__*/React.createElement(PageSettingsFieldsData, null));
};
/* harmony default export */ __webpack_exports__["default"] = (TutorStarterPageSettingsPanel);

/***/ }),

/***/ "./inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js":
/*!*******************************************************************!*\
  !*** ./inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js ***!
  \*******************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _page_settings__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./page-settings */ "./inc/Custom/Page/reactjs/src/page-settings/index.js");
var registerPlugin = wp.plugins.registerPlugin;

var is_page = tutorstarter_admin_page.is_page;
if ('1' === is_page) {
  registerPlugin('tutorstarter-settings-panel', {
    render: _page_settings__WEBPACK_IMPORTED_MODULE_0__["default"],
    icon: ''
  });
}

/***/ }),

/***/ 4:
/*!*************************************************************************!*\
  !*** multi ./inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/nuralam/valet/template-import/wp-content/themes/tutorstarter/inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js */"./inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js");


/***/ })

/******/ });