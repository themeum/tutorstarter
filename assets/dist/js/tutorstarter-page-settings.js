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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
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
  var is_page = tutorstarter_admin.is_page;

  if ('1' === is_page) {
    return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(SelectControl, {
      label: __('Sidebar', 'tutorstarter'),
      value: updatedValue.sidebar_select,
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
    }), /*#__PURE__*/React.createElement(ToggleControl, {
      label: __('Disable Title?', 'tutorstarter'),
      checked: updatedValue.page_title_toggle,
      onChange: function onChange(value) {
        return updateMeta(value, 'page_title_toggle');
      }
    }), /*#__PURE__*/React.createElement(ToggleControl, {
      label: __('Disable Header?', 'tutorstarter'),
      checked: updatedValue.header_toggle,
      onChange: function onChange(value) {
        return updateMeta(value, 'header_toggle');
      }
    }), /*#__PURE__*/React.createElement(ToggleControl, {
      label: __('Disable Footer?', 'tutorstarter'),
      checked: updatedValue.footer_toggle,
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
function ownKeys(object, enumerableOnly) {
  var keys = Object.keys(object);

  if (Object.getOwnPropertySymbols) {
    var symbols = Object.getOwnPropertySymbols(object);
    if (enumerableOnly) symbols = symbols.filter(function (sym) {
      return Object.getOwnPropertyDescriptor(object, sym).enumerable;
    });
    keys.push.apply(keys, symbols);
  }

  return keys;
}

function _objectSpread(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};

    if (i % 2) {
      ownKeys(Object(source), true).forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    } else if (Object.getOwnPropertyDescriptors) {
      Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
    } else {
      ownKeys(Object(source)).forEach(function (key) {
        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
      });
    }
  }

  return target;
}

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

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
        sidebar_select: 'no-sidebar',
        page_title_toggle: false,
        header_toggle: false,
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
    title: "Tutor Starter Page Settings"
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

var is_page = tutorstarter_admin.is_page;

if ('1' === is_page) {
  registerPlugin('tutorstarter-settings-panel', {
    render: _page_settings__WEBPACK_IMPORTED_MODULE_0__["default"],
    icon: ''
  });
}

/***/ }),

/***/ 5:
/*!*************************************************************************!*\
  !*** multi ./inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js */"./inc/Custom/Page/reactjs/src/tutorstarter-page-settings.js");


/***/ })

/******/ });
=======
!function(e){var t={};function r(n){if(t[n])return t[n].exports;var a=t[n]={i:n,l:!1,exports:{}};return e[n].call(a.exports,a,a.exports,r),a.l=!0,a.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)r.d(n,a,function(t){return e[t]}.bind(null,a));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=5)}({5:function(e,t,r){e.exports=r("iSsb")},iSsb:function(e,t,r){"use strict";r.r(t);var n=wp.i18n.__,a=wp.element.Fragment,o=wp.components,l=o.SelectControl,i=o.ToggleControl,u=function(e){var t=e.updatedValue,r=e.updateMeta;return"1"===tutorstarter_admin.is_page?React.createElement(a,null,React.createElement(l,{label:n("Sidebar","tutorstarter"),value:t.sidebar_select,options:[{label:n("--Select Option--","tutorstarter"),value:""},{label:n("No Sidebar","tutorstarter"),value:"no-sidebar"},{label:n("Left Sidebar","tutorstarter"),value:"left-sidebar"},{label:n("Right Sidebar","tutorstarter"),value:"right-sidebar"}],onChange:function(e){return r(e,"sidebar_select")}}),React.createElement(i,{label:n("Disable Title?","tutorstarter"),checked:t.page_title_toggle,onChange:function(e){return r(e,"page_title_toggle")}}),React.createElement(i,{label:n("Disable Header?","tutorstarter"),checked:t.header_toggle,onChange:function(e){return r(e,"header_toggle")}}),React.createElement(i,{label:n("Disable Footer?","tutorstarter"),checked:t.footer_toggle,onChange:function(e){return r(e,"footer_toggle")}})):React.createElement(a,null)};function c(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function s(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var p=wp.compose.compose,g=wp.editPost.PluginDocumentSettingPanel,d=wp.data,b=d.select,f=d.withSelect,_=d.withDispatch,m=p([f((function(){return{updatedValue:b("core/editor").getEditedPostAttribute("meta")._tutorstarter_page_metadata}})),_((function(e){return{updateMeta:function(t,r){var n=b("core/editor").getEditedPostAttribute("meta")._tutorstarter_page_metadata;(n=function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?c(Object(r),!0).forEach((function(t){s(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):c(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({sidebar_select:"no-sidebar",page_title_toggle:!1,header_toggle:!1,footer_toggle:!1},n))[r]=t,e("core/editor").editPost({meta:{_tutorstarter_page_metadata:n}})}}}))])(u),O=function(){return React.createElement(g,{name:"tutorstarter-settings-panel",title:"Tutor Starter Page Settings"},React.createElement(m,null))},y=wp.plugins.registerPlugin;"1"===tutorstarter_admin.is_page&&y("tutorstarter-settings-panel",{render:O,icon:""})}});
>>>>>>> 0eba8e894f9f7572f123d5d65a719777540535fd
