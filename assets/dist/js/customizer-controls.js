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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./inc/Api/Customizer/reactjs/src/common/common.js":
/*!*********************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/common/common.js ***!
  \*********************************************************/
/*! exports provided: maybeParseJson, isObject, mergeDeep, getIntValAsResponsive */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "maybeParseJson", function() { return maybeParseJson; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isObject", function() { return isObject; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "mergeDeep", function() { return mergeDeep; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getIntValAsResponsive", function() { return getIntValAsResponsive; });
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

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

var maybeParseJson = function maybeParseJson(input) {
  if (typeof input !== 'string') {
    return input;
  }

  try {
    JSON.parse(input);
  } catch (error) {
    return input;
  }

  return JSON.parse(input);
};
/**
 * Simple object check.
 * @param item
 * @returns {boolean}
 */

var isObject = function isObject(item) {
  return item && _typeof(item) === 'object' && !Array.isArray(item);
};
/**
 * Deep merge two objects.
 */

var mergeDeep = function mergeDeep(target) {
  for (var _len = arguments.length, sources = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
    sources[_key - 1] = arguments[_key];
  }

  if (!sources.length) return target; // Use first object we want to merge with and remove it from the start.

  var source = sources.shift();

  if (isObject(target) && isObject(source)) {
    // Loop over each key in one source.
    for (var key in source) {
      if (isObject(source[key])) {
        // Merge inside keys if we have an object.
        if (!target[key]) Object.assign(target, _defineProperty({}, key, {}));
        mergeDeep(target[key], source[key]);
      } else {
        // Reassign with source.
        Object.assign(target, _defineProperty({}, key, source[key]));
      }
    }
  } // Run recursively for multiple.


  return mergeDeep.apply(void 0, [target].concat(sources));
};
var getIntValAsResponsive = function getIntValAsResponsive(value) {
  value = maybeParseJson(value);

  if (_typeof(value) === 'object' && Object.prototype.hasOwnProperty.call(value, 'desktop') && Object.prototype.hasOwnProperty.call(value, 'tablet') && Object.prototype.hasOwnProperty.call(value, 'mobile')) {
    return value;
  }

  if (typeof value === 'number') {
    value = {
      desktop: value,
      tablet: value,
      mobile: value
    };
    return value;
  }

  return value;
};

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/common/responsive.js":
/*!*************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/common/responsive.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

function _createSuper(Derived) {
  var hasNativeReflectConstruct = _isNativeReflectConstruct();

  return function _createSuperInternal() {
    var Super = _getPrototypeOf(Derived),
        result;

    if (hasNativeReflectConstruct) {
      var NewTarget = _getPrototypeOf(this).constructor;

      result = Reflect.construct(Super, arguments, NewTarget);
    } else {
      result = Super.apply(this, arguments);
    }

    return _possibleConstructorReturn(this, result);
  };
}

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(Reflect.construct(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}


var __ = wp.i18n.__;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;
var _wp$components = wp.components,
    Button = _wp$components.Button,
    Dashicon = _wp$components.Dashicon,
    Tooltip = _wp$components.Tooltip,
    ButtonGroup = _wp$components.ButtonGroup;

var ResponsiveControl = /*#__PURE__*/function (_Component) {
  _inherits(ResponsiveControl, _Component);

  var _super = _createSuper(ResponsiveControl);

  function ResponsiveControl(props) {
    var _this;

    _classCallCheck(this, ResponsiveControl);

    _this = _super.call(this, props);
    _this.state = {
      view: 'desktop'
    };

    _this.linkResponsiveButtons();

    return _this;
  }

  _createClass(ResponsiveControl, [{
    key: "render",
    value: function render() {
      var view = this.state.view;
      var devices = {
        desktop: {
          tooltip: __('Desktop', 'tutorstarter'),
          icon: 'desktop'
        },
        tablet: {
          tooltip: __('Tablet', 'tutorstarter'),
          icon: 'tablet'
        },
        mobile: {
          tooltip: __('Mobile', 'tutorstarter'),
          icon: 'smartphone'
        }
      };
      var excluded = this.props.excluded;
      var deviceMap = {};
      Object.keys(devices).map(function (key) {
        if (excluded) {
          if (excluded.includes(key)) {
            return false;
          }
        }

        deviceMap[key] = devices[key];
      });
      var _this$props = this.props,
          controlLabel = _this$props.controlLabel,
          hideResponsive = _this$props.hideResponsive;
      return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement("div", {
        className: "tutorstarter-responsive-control-bar"
      }, controlLabel && /*#__PURE__*/React.createElement("span", {
        className: "customize-control-title"
      }, controlLabel), !hideResponsive && /*#__PURE__*/React.createElement("div", {
        className: "floating-controls"
      }, /*#__PURE__*/React.createElement(ButtonGroup, null, Object.keys(deviceMap).map(function (device, index) {
        var _deviceMap$device = deviceMap[device],
            tooltip = _deviceMap$device.tooltip,
            icon = _deviceMap$device.icon;
        return /*#__PURE__*/React.createElement(Tooltip, {
          text: tooltip,
          key: index
        }, /*#__PURE__*/React.createElement(Button, {
          className: (device === view ? 'active-device ' : '') + device,
          onClick: function onClick() {
            var event = new CustomEvent('tutorstarterChangedRepsonsivePreview', {
              detail: device
            });
            document.dispatchEvent(event);
          }
        }, /*#__PURE__*/React.createElement(Dashicon, {
          icon: icon
        })));
      })))), this.props.children && /*#__PURE__*/React.createElement("div", {
        className: "tutorstarter-responsive-controls-content"
      }, this.props.children));
    }
  }, {
    key: "changeViewType",
    value: function changeViewType(device) {
      this.setState({
        view: device
      });
      wp.customize.previewedDevice(device);
      this.props.onChange(device);
    }
  }, {
    key: "linkResponsiveButtons",
    value: function linkResponsiveButtons() {
      var self = this;
      document.addEventListener('tutorstarterChangedRepsonsivePreview', function (e) {
        self.changeViewType(e.detail);
      });
    }
  }]);

  return ResponsiveControl;
}(Component);

ResponsiveControl.propTypes = {
  onChange: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).func,
  controlLabel: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).string,
  hideResponsive: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).bool,
  children: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).any,
  excluded: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).array
};
/* harmony default export */ __webpack_exports__["default"] = (ResponsiveControl);

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/customizer-controls.js":
/*!***************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/customizer-controls.js ***!
  \***************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _typography_control__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./typography/control */ "./inc/Api/Customizer/reactjs/src/typography/control.js");
/* harmony import */ var _font_family_control__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./font-family/control */ "./inc/Api/Customizer/reactjs/src/font-family/control.js");
/* harmony import */ var _radio_image_control__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./radio-image/control */ "./inc/Api/Customizer/reactjs/src/radio-image/control.js");
/* harmony import */ var _range_slider_control__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./range-slider/control */ "./inc/Api/Customizer/reactjs/src/range-slider/control.js");
/* harmony import */ var _toggle_switch_control__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./toggle-switch/control */ "./inc/Api/Customizer/reactjs/src/toggle-switch/control.js");
/* harmony import */ var _responsive_range_slider_control__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./responsive-range-slider/control */ "./inc/Api/Customizer/reactjs/src/responsive-range-slider/control.js");






wp.customize.controlConstructor.tutorstarter_typography = _typography_control__WEBPACK_IMPORTED_MODULE_0__["TypographyControl"];
wp.customize.controlConstructor.tutorstarter_font_family = _font_family_control__WEBPACK_IMPORTED_MODULE_1__["FontFamilyControl"];
wp.customize.controlConstructor.tutorstarter_radio_image = _radio_image_control__WEBPACK_IMPORTED_MODULE_2__["RadioImageControl"];
wp.customize.controlConstructor.tutorstarter_range_slider = _range_slider_control__WEBPACK_IMPORTED_MODULE_3__["RangeSliderControl"];
wp.customize.controlConstructor.tutorstarter_toggle_switch = _toggle_switch_control__WEBPACK_IMPORTED_MODULE_4__["ToggleSwitchControl"];
wp.customize.controlConstructor.tutorstarter_responsive_range_slider = _responsive_range_slider_control__WEBPACK_IMPORTED_MODULE_5__["ResponsiveRangeSliderControl"];

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/font-family/control.js":
/*!***************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/font-family/control.js ***!
  \***************************************************************/
/*! exports provided: FontFamilyControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FontFamilyControl", function() { return FontFamilyControl; });
/* harmony import */ var _font_family_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./font-family-component */ "./inc/Api/Customizer/reactjs/src/font-family/font-family-component.js");

var FontFamilyControl = wp.customize.Control.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render( /*#__PURE__*/React.createElement(_font_family_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/font-family/font-family-component.js":
/*!*****************************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/font-family/font-family-component.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var _font_family_selector_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./font-family-selector.js */ "./inc/Api/Customizer/reactjs/src/font-family/font-family-selector.js");
function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

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

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

function _createSuper(Derived) {
  var hasNativeReflectConstruct = _isNativeReflectConstruct();

  return function _createSuperInternal() {
    var Super = _getPrototypeOf(Derived),
        result;

    if (hasNativeReflectConstruct) {
      var NewTarget = _getPrototypeOf(this).constructor;

      result = Reflect.construct(Super, arguments, NewTarget);
    } else {
      result = Super.apply(this, arguments);
    }

    return _possibleConstructorReturn(this, result);
  };
}

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(Reflect.construct(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}



var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;

var FontFamilyComponent = /*#__PURE__*/function (_Component) {
  _inherits(FontFamilyComponent, _Component);

  var _super = _createSuper(FontFamilyComponent);

  function FontFamilyComponent(props) {
    var _this;

    _classCallCheck(this, FontFamilyComponent);

    _this = _super.call(this, props);
    var value = props.control.setting.get();
    _this.state = {
      fontFamily: value,
      fontFamilySource: null
    };
    var defaultParams = {
      default_is_inherit: false
    };
    _this.controlParams = props.control.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), JSON.parse(props.control.params.input_attrs)) : defaultParams;
    return _this;
  }

  _createClass(FontFamilyComponent, [{
    key: "maybe_get_typekit_font",
    value: function maybe_get_typekit_font(font) {
      if (Object.prototype.hasOwnProperty.call(tutorstarter_customizer, 'typekitSlugs') === false) {
        return font;
      }

      var typekitSlugs = tutorstarter_customizer.typekitSlugs;

      if (Object.prototype.hasOwnProperty.call(typekitSlugs, font)) {
        return typekitSlugs[font];
      }

      return font;
    }
  }, {
    key: "render",
    value: function render() {
      var self = this;
      return /*#__PURE__*/React.createElement(Fragment, null, this.props.control.params.label && /*#__PURE__*/React.createElement("span", {
        className: "customize-control-title"
      }, this.props.control.params.label), /*#__PURE__*/React.createElement("div", {
        className: "tutorstarter-typeface-control tutorstarter-background-control"
      }, /*#__PURE__*/React.createElement(_font_family_selector_js__WEBPACK_IMPORTED_MODULE_1__["default"], {
        selected: this.state.fontFamily,
        onFontChoice: function onFontChoice(fontFamilySource, fontFamily) {
          self.setState({
            fontFamily: fontFamily,
            fontFamilySource: fontFamilySource
          });
          self.updateControl();
        },
        inheritDefault: this.controlParams.default_is_inherit,
        maybeGetTypekit: this.maybe_get_typekit_font
      })));
    }
  }, {
    key: "updateControl",
    value: function updateControl() {
      var _this2 = this;

      setTimeout(function () {
        _this2.props.control.setting.set(_this2.maybe_get_typekit_font(_this2.state.fontFamily));

        wp.customize.previewer.send('font-selection', {
          value: _this2.maybe_get_typekit_font(_this2.state.fontFamily),
          source: _this2.state.fontFamilySource,
          controlId: _this2.props.control.id,
          inherit: _this2.controlParams.default_is_inherit
        });
      }, 100);
    }
  }]);

  return FontFamilyComponent;
}(Component);

FontFamilyComponent.propTypes = {
  control: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (FontFamilyComponent);

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/font-family/font-family-selector.js":
/*!****************************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/font-family/font-family-selector.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var _font_preview_link__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./font-preview-link */ "./inc/Api/Customizer/reactjs/src/font-family/font-preview-link.js");
!(function webpackMissingModule() { var e = new Error("Cannot find module 'react-visibility-sensor'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

function _createSuper(Derived) {
  var hasNativeReflectConstruct = _isNativeReflectConstruct();

  return function _createSuperInternal() {
    var Super = _getPrototypeOf(Derived),
        result;

    if (hasNativeReflectConstruct) {
      var NewTarget = _getPrototypeOf(this).constructor;

      result = Reflect.construct(Super, arguments, NewTarget);
    } else {
      result = Super.apply(this, arguments);
    }

    return _possibleConstructorReturn(this, result);
  };
}

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(Reflect.construct(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}




var __ = wp.i18n.__;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;
var _wp$components = wp.components,
    Popover = _wp$components.Popover,
    Button = _wp$components.Button,
    TextControl = _wp$components.TextControl,
    Dashicon = _wp$components.Dashicon,
    Spinner = _wp$components.Spinner;

var FontFamilySelector = /*#__PURE__*/function (_Component) {
  _inherits(FontFamilySelector, _Component);

  var _super = _createSuper(FontFamilySelector);

  function FontFamilySelector(props) {
    var _this;

    _classCallCheck(this, FontFamilySelector);

    _this = _super.call(this, props);
    localStorage.setItem('localFonts', JSON.stringify(tutorstarter_customizer.fonts));
    var getFonts = JSON.parse(localStorage.getItem('localFonts'));

    if (getFonts.Google.length < tutorstarter_customizer.fonts.Google.length) {
      localStorage.removeItem('localFonts');
    }

    _this.state = {
      fonts: getFonts ? getFonts : [],
      isVisible: false,
      search: '',
      loadUntil: 20,
      delayFontInclusion: true
    };
    return _this;
  }

  _createClass(FontFamilySelector, [{
    key: "getFonts",
    value: function getFonts() {
      var fontGroups = this.state.fonts;
      var self = this;
      var result = {};
      Object.keys(fontGroups).map(function (key) {
        result[key] = fontGroups[key].filter(function (value) {
          return value.toLowerCase().includes(self.state.search.toLowerCase());
        });
      });
      return result;
    }
  }, {
    key: "getFontList",
    value: function getFontList() {
      var _this2 = this;

      var fontGroups = this.getFonts();
      var options = [];
      var self = this;
      options.push( /*#__PURE__*/React.createElement("li", {
        key: "default",
        className:  true ? 'selected' : undefined
      }, /*#__PURE__*/React.createElement(_font_preview_link__WEBPACK_IMPORTED_MODULE_1__["default"], {
        fontFace: "default",
        delayLoad: false,
        label: this.props.inheritDefault ? __('Inherit', 'tutorstarter') : __('Default', 'tutorstarter'),
        onClick: function onClick() {
          _this2.setState({
            isVisible: false
          });

          _this2.props.onFontChoice('system', false);
        }
      })));
      Object.keys(fontGroups).map(function (key) {
        fontGroups[key].length > 0 && options.push( /*#__PURE__*/React.createElement("li", {
          className: "font-group-header",
          key: key
        }, key));
        fontGroups[key].map(function (font, index) {
          if (index < self.state.loadUntil) {
            options.push( /*#__PURE__*/React.createElement("li", {
              key: font,
              className: font === _this2.props.selected ? 'selected' : ''
            }, /*#__PURE__*/React.createElement(_font_preview_link__WEBPACK_IMPORTED_MODULE_1__["default"], {
              delayLoad: _this2.state.delayFontInclusion,
              label: font,
              fontFace: _this2.props.maybeGetTypekit(font),
              onClick: function onClick() {
                _this2.setState({
                  isVisible: false
                });

                _this2.props.onFontChoice(key, font);
              }
            })));
          }
        });
      });

      if (this.state.loadUntil < options.length && this.state.search === '') {
        options.push( /*#__PURE__*/React.createElement(!(function webpackMissingModule() { var e = new Error("Cannot find module 'react-visibility-sensor'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()), {
          key: "load-more",
          onChange: function onChange(isVisible) {
            if (isVisible) {
              _this2.setState({
                loadUntil: self.state.loadUntil + 5,
                delayFontInclusion: false
              });
            }
          }
        }, /*#__PURE__*/React.createElement("li", {
          className: "load-more"
        }, /*#__PURE__*/React.createElement(Spinner, null))));
      }

      return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement("div", {
        className: "popover-content"
      }, /*#__PURE__*/React.createElement("div", {
        className: "popover-header"
      }, /*#__PURE__*/React.createElement("div", {
        className: "search"
      }, /*#__PURE__*/React.createElement(TextControl, {
        placeholder: __('Search', 'tutorstarter') + '...',
        value: this.state.search,
        onChange: function onChange(e) {
          _this2.setState({
            search: e,
            loadUntil: 20
          });
        }
      }), /*#__PURE__*/React.createElement("a", {
        className: "close-font-selector",
        onClick: function onClick(e) {
          e.preventDefault();
          e.stopPropagation();

          _this2.setState({
            isVisible: false
          });
        }
      }, /*#__PURE__*/React.createElement(Dashicon, {
        icon: "no"
      })))), /*#__PURE__*/React.createElement("ul", {
        className: "tutorstarter-fonts-list"
      }, options.length ? options : /*#__PURE__*/React.createElement("li", {
        className: "no-result",
        key: "no-results"
      }, __('No results.', 'tutorstarter')))));
    }
  }, {
    key: "render",
    value: function render() {
      var _this3 = this; // eslint-disable-next-line max-len


      var defaultFontface = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
      var font = this.props.maybeGetTypekit(this.props.selected);
      return /*#__PURE__*/React.createElement("div", {
        className: "tutorstarter-font-family-control"
      }, /*#__PURE__*/React.createElement("span", {
        className: "customize-control-title"
      }, __('Font Family', 'tutorstarter')), /*#__PURE__*/React.createElement(Button, {
        className: "font-family-selector-toggle",
        isSecondary: true,
        onClick: function onClick() {
          _this3.setState({
            isVisible: true
          });
        }
      }, /*#__PURE__*/React.createElement("span", {
        className: "ff-name"
      }, this.props.selected || (this.props.inheritDefault ? __('Inherit', 'tutorstarter') : __('Default', 'tutorstarter'))), /*#__PURE__*/React.createElement("span", {
        className: "ff-preview",
        style: {
          fontFamily: font || defaultFontface
        }
      }, "Abc"), this.state.isVisible && /*#__PURE__*/React.createElement(Popover, {
        position: "bottom left",
        onFocusOutside: function onFocusOutside() {
          return _this3.setState({
            isVisible: false
          });
        }
      }, this.state.fonts ? this.getFontList() : __('Loading...', 'tutorstarter'))));
    }
  }]);

  return FontFamilySelector;
}(Component);

FontFamilySelector.propTypes = {
  onFontChoice: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).func.isRequired,
  maybeGetTypekit: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).func.isRequired,
  inheritDefault: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).bool.isRequired,
  selected: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).oneOfType([!(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).string, !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).bool])
};
/* harmony default export */ __webpack_exports__["default"] = (FontFamilySelector);

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/font-family/font-preview-link.js":
/*!*************************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/font-family/font-preview-link.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
!(function webpackMissingModule() { var e = new Error("Cannot find module 'react-visibility-sensor'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

function _createSuper(Derived) {
  var hasNativeReflectConstruct = _isNativeReflectConstruct();

  return function _createSuperInternal() {
    var Super = _getPrototypeOf(Derived),
        result;

    if (hasNativeReflectConstruct) {
      var NewTarget = _getPrototypeOf(this).constructor;

      result = Reflect.construct(Super, arguments, NewTarget);
    } else {
      result = Super.apply(this, arguments);
    }

    return _possibleConstructorReturn(this, result);
  };
}

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(Reflect.construct(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}



var Component = wp.element.Component;

var FontPreviewLink = /*#__PURE__*/function (_Component) {
  _inherits(FontPreviewLink, _Component);

  var _super = _createSuper(FontPreviewLink);

  function FontPreviewLink(props) {
    var _this;

    _classCallCheck(this, FontPreviewLink);

    _this = _super.call(this, props);
    _this.state = {
      previewWasRendered: false
    };
    return _this;
  }

  _createClass(FontPreviewLink, [{
    key: "render",
    value: function render() {
      var _this2 = this;

      var style = {
        fontFamily: this.props.fontFace + ', sans-serif'
      };
      return /*#__PURE__*/React.createElement("a", {
        onClick: function onClick(e) {
          e.stopPropagation();

          _this2.props.onClick();
        }
      }, /*#__PURE__*/React.createElement("span", {
        className: "tutorstarter-font-family"
      }, this.props.label || this.props.fontFace), /*#__PURE__*/React.createElement(!(function webpackMissingModule() { var e = new Error("Cannot find module 'react-visibility-sensor'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()), {
        onChange: function onChange(isVisible) {
          if (isVisible) {
            _this2.setState({
              previewWasRendered: true
            });
          }
        }
      }, this.state.previewWasRendered || this.props.delayLoad === false ? /*#__PURE__*/React.createElement("span", {
        className: "tutorstarter-font-preview",
        style: style
      }, "Abc") : /*#__PURE__*/React.createElement("span", {
        className: "tutorstarter-font-preview "
      }, "...")));
    }
  }]);

  return FontPreviewLink;
}(Component);

FontPreviewLink.propTypes = {
  fontFace: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).string.isRequired,
  delayLoad: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).bool.isRequired,
  onClick: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).func.isRequired,
  label: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).string
};
/* harmony default export */ __webpack_exports__["default"] = (FontPreviewLink);

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/radio-image/control.js":
/*!***************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/radio-image/control.js ***!
  \***************************************************************/
/*! exports provided: RadioImageControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "RadioImageControl", function() { return RadioImageControl; });
/* harmony import */ var _radio_image_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./radio-image-component */ "./inc/Api/Customizer/reactjs/src/radio-image/radio-image-component.js");

var RadioImageControl = wp.customize.Control.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render( /*#__PURE__*/React.createElement(_radio_image_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/radio-image/radio-image-component.js":
/*!*****************************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/radio-image/radio-image-component.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
!(function webpackMissingModule() { var e = new Error("Cannot find module 'classnames'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
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



var useState = wp.element.useState;

var RadioImageComponent = function RadioImageComponent(_ref) {
  var control = _ref.control;

  var _useState = useState(control.setting.get()),
      _useState2 = _slicedToArray(_useState, 2),
      value = _useState2[0],
      setValue = _useState2[1];

  var _control$params = control.params,
      choices = _control$params.choices,
      label = _control$params.label;

  var updateValue = function updateValue(newVal) {
    setValue(newVal);
    control.setting.set(newVal);
  };

  var renderOptions = function renderOptions() {
    return Object.keys(choices).map(function (choice, index) {
      var _choices$choice = choices[choice],
          name = _choices$choice.name,
          image = _choices$choice.image;
      var buttonClass = !(function webpackMissingModule() { var e = new Error("Cannot find module 'classnames'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())([{
        active: choice === value
      }]);
      return /*#__PURE__*/React.createElement("div", {
        className: "option",
        key: index
      }, /*#__PURE__*/React.createElement("label", null, name && /*#__PURE__*/React.createElement("span", null, name), /*#__PURE__*/React.createElement("button", {
        className: buttonClass,
        onClick: function onClick(e) {
          e.preventDefault();
          updateValue(choice);
        }
      }, /*#__PURE__*/React.createElement("img", {
        src: image,
        alt: name || "Option ".concat(choice)
      }))));
    });
  };

  return /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    className: "tutorstarter-control-header"
  }, label && /*#__PURE__*/React.createElement("span", {
    className: "customize-control-title"
  }, label)), /*#__PURE__*/React.createElement("div", {
    className: "tutorstarter-radio-image"
  }, renderOptions()));
};

RadioImageComponent.propTypes = {
  control: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (RadioImageComponent);

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/range-slider/control.js":
/*!****************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/range-slider/control.js ***!
  \****************************************************************/
/*! exports provided: RangeSliderControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "RangeSliderControl", function() { return RangeSliderControl; });
/* harmony import */ var _range_slider_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./range-slider-component */ "./inc/Api/Customizer/reactjs/src/range-slider/range-slider-component.js");

var RangeSliderControl = wp.customize.Control.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render( /*#__PURE__*/React.createElement(_range_slider_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/range-slider/range-slider-component.js":
/*!*******************************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/range-slider/range-slider-component.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
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


var RangeControl = wp.components.RangeControl;
var _wp$element = wp.element,
    useState = _wp$element.useState,
    useEffect = _wp$element.useEffect;

var RangeSliderComponent = function RangeSliderComponent(_ref) {
  var control = _ref.control;
  useEffect(function () {
    document.addEventListener('tutorstarter-customizer-event', function (e) {
      if (!e.detail) return false;
      if (e.detail.id !== control.id) return false;
      updateValues(e.detail.value);
    });
  }, []);

  var _useState = useState(control.setting.get()),
      _useState2 = _slicedToArray(_useState, 2),
      value = _useState2[0],
      setValue = _useState2[1];

  var defaults = {
    min: 0,
    max: 100,
    defaultVal: 16,
    step: 1
  };

  var controlProps = _objectSpread(_objectSpread({}, defaults), control.params.input_attrs || {});

  var label = control.params.label;
  var defaultVal = controlProps.defaultVal,
      min = controlProps.min,
      max = controlProps.max,
      step = controlProps.step;

  var updateValues = function updateValues(newVal) {
    setValue(newVal);
    control.setting.set(newVal);
  };

  return /*#__PURE__*/React.createElement("div", {
    className: "tutorstarter-background-control tutorstarter-range-control"
  }, /*#__PURE__*/React.createElement("div", {
    className: "tutorstarter-control-header"
  }, label && /*#__PURE__*/React.createElement("span", {
    className: "customize-control-title"
  }, label)), /*#__PURE__*/React.createElement("div", {
    className: "range-wrap"
  }, /*#__PURE__*/React.createElement(RangeControl, {
    resetFallbackValue: defaultVal === 0 ? 0 : defaultVal || '',
    value: parseInt(value) === 0 ? 0 : value || '',
    min: min < 0 ? min : 0,
    max: max || 100,
    step: step || 1,
    allowReset: true,
    onChange: updateValues
  })));
};

RangeSliderComponent.propTypes = {
  control: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (RangeSliderComponent);

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/responsive-range-slider/control.js":
/*!***************************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/responsive-range-slider/control.js ***!
  \***************************************************************************/
/*! exports provided: ResponsiveRangeSliderControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ResponsiveRangeSliderControl", function() { return ResponsiveRangeSliderControl; });
/* harmony import */ var _responsive_range_slider_component_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./responsive-range-slider-component.js */ "./inc/Api/Customizer/reactjs/src/responsive-range-slider/responsive-range-slider-component.js");

var render = wp.element.render;
var ResponsiveRangeSliderControl = wp.customize.Control.extend({
  renderContent: function renderContent() {
    var control = this;
    render( /*#__PURE__*/React.createElement(_responsive_range_slider_component_js__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/responsive-range-slider/responsive-range-slider-component.js":
/*!*****************************************************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/responsive-range-slider/responsive-range-slider-component.js ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
!(function webpackMissingModule() { var e = new Error("Cannot find module 'classnames'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var _common_responsive__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../common/responsive */ "./inc/Api/Customizer/reactjs/src/common/responsive.js");
/* harmony import */ var _common_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../common/common */ "./inc/Api/Customizer/reactjs/src/common/common.js");
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





var _wp$element = wp.element,
    useState = _wp$element.useState,
    useEffect = _wp$element.useEffect;
var _wp$components = wp.components,
    RangeControl = _wp$components.RangeControl,
    Button = _wp$components.Button;

var ResponsiveRangeSliderComponent = function ResponsiveRangeSliderComponent(_ref) {
  var control = _ref.control;
  var parsedValue = Object(_common_common__WEBPACK_IMPORTED_MODULE_2__["maybeParseJson"])(control.setting.get());

  var _useState = useState('desktop'),
      _useState2 = _slicedToArray(_useState, 2),
      currentDevice = _useState2[0],
      setCurrentDevice = _useState2[1];

  var _useState3 = useState(parsedValue),
      _useState4 = _slicedToArray(_useState3, 2),
      value = _useState4[0],
      setValue = _useState4[1];

  useEffect(function () {
    // If a value is int, make it responsive.
    var responsiveConverted = Object(_common_common__WEBPACK_IMPORTED_MODULE_2__["getIntValAsResponsive"])(control.setting.get());

    if (value !== responsiveConverted) {
      setValue(responsiveConverted);
    }

    document.addEventListener('tutorstarter-changed-customizer-value', function (e) {
      if (!e.detail) return false;
      if (e.detail.id !== control.id) return false; // Make sure we translate int values to responsive values.

      var incomingValue = Object(_common_common__WEBPACK_IMPORTED_MODULE_2__["getIntValAsResponsive"])(e.detail.value);
      setValue(Object(_common_common__WEBPACK_IMPORTED_MODULE_2__["maybeParseJson"])(incomingValue));
      control.setting.set(JSON.stringify(incomingValue));
    });
  }, []);
  var label = control.params.label;
  var _control$params$input = control.params.input_attrs,
      hideResponsive = _control$params$input.hideResponsive,
      units = _control$params$input.units,
      defaultVal = _control$params$input.defaultVal,
      step = _control$params$input.step,
      min = _control$params$input.min,
      max = _control$params$input.max;

  var unitButtons = function unitButtons() {
    if (!units) {
      return null;
    }

    if (units.length === 1) {
      return /*#__PURE__*/React.createElement(Button, {
        isSmall: true,
        disabled: true,
        className: "active alone"
      }, units[0]);
    }

    return units.map(function (unit, index) {
      var buttonClass = !(function webpackMissingModule() { var e = new Error("Cannot find module 'classnames'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())({
        active: value[self.state.currentDevice + '-unit'] === unit
      });
      return /*#__PURE__*/React.createElement(Button, {
        key: index,
        isSmall: true,
        className: buttonClass,
        onClick: function onClick() {
          var nextValue = _objectSpread({}, value);

          nextValue[currentDevice + '-unit'] = unit;

          if (unit !== 'em') {
            nextValue[currentDevice] = mapValues(nextValue[currentDevice], function (value) {
              return value ? parseInt(value) : value;
            });
          }

          setValue(nextValue);
          control.setting.set(nextValue);
        }
      }, unit);
    });
  };

  var controlHeader = function controlHeader() {
    return /*#__PURE__*/React.createElement("div", {
      className: "tutorstarter-responsive-control-header"
    }, label && /*#__PURE__*/React.createElement("span", {
      className: "customize-control-title"
    }, label), /*#__PURE__*/React.createElement(_common_responsive__WEBPACK_IMPORTED_MODULE_1__["default"], {
      onChange: function onChange(device) {
        return setCurrentDevice(device);
      },
      hideResponsive: hideResponsive || false
    }), /*#__PURE__*/React.createElement("div", {
      className: "tutorstarter-units"
    }, unitButtons()));
  };

  var updateValues = function updateValues(newValue) {
    var nextValue = _objectSpread({}, value);

    nextValue[currentDevice] = newValue;
    setValue(nextValue);
    control.setting.set(JSON.stringify(nextValue));
  };

  var displayValue = parseInt(value[currentDevice]);
  displayValue = displayValue === 0 ? 0 : displayValue || '';
  return /*#__PURE__*/React.createElement("div", {
    className: "tutorstarter-background-control tutorstarter-range-control"
  }, controlHeader(), /*#__PURE__*/React.createElement("div", {
    className: "range-wrap"
  }, /*#__PURE__*/React.createElement(RangeControl, {
    resetFallbackValue: defaultVal[currentDevice],
    value: displayValue,
    min: min < 0 ? min : 0,
    max: max || 100,
    step: step || 1,
    allowReset: true,
    onChange: function onChange(nextValue) {
      updateValues(nextValue);
    }
  })));
};

ResponsiveRangeSliderComponent.propTypes = {
  control: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (ResponsiveRangeSliderComponent);

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/toggle-switch/control.js":
/*!*****************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/toggle-switch/control.js ***!
  \*****************************************************************/
/*! exports provided: ToggleSwitchControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ToggleSwitchControl", function() { return ToggleSwitchControl; });
/* harmony import */ var _toggle_switch_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./toggle-switch-component */ "./inc/Api/Customizer/reactjs/src/toggle-switch/toggle-switch-component.js");

var ToggleSwitchControl = wp.customize.Control.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render( /*#__PURE__*/React.createElement(_toggle_switch_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/toggle-switch/toggle-switch-component.js":
/*!*********************************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/toggle-switch/toggle-switch-component.js ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
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
var ToggleControl = wp.components.ToggleControl;
var _wp$element = wp.element,
    useState = _wp$element.useState,
    useEffect = _wp$element.useEffect;

var ToggleSwitchComponent = function ToggleSwitchComponent(_ref) {
  var control = _ref.control;
  useEffect(function () {
    document.addEventListener('tutorstarter-customizer-event', function (e) {
      if (!e.detail) {
        return false;
      }

      if (e.detail.id !== control.id) {
        return false;
      }

      setValue(e.detail.value);
    });
  }, []);

  var _useState = useState(control.setting.get()),
      _useState2 = _slicedToArray(_useState, 2),
      value = _useState2[0],
      setValue = _useState2[1];

  return /*#__PURE__*/React.createElement("div", {
    className: "tutorstarter-background-control flex-contents"
  }, /*#__PURE__*/React.createElement(ToggleControl, {
    className: "tutorstarter-toggle-control",
    checked: value,
    label: control.params.label,
    onChange: function onChange(updatedValue) {
      setValue(updatedValue);
      control.setting.set(updatedValue);
    }
  }));
};

ToggleSwitchComponent.propTypes = {
  control: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (ToggleSwitchComponent);

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/typography/control.js":
/*!**************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/typography/control.js ***!
  \**************************************************************/
/*! exports provided: TypographyControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "TypographyControl", function() { return TypographyControl; });
/* harmony import */ var _typography_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./typography-component */ "./inc/Api/Customizer/reactjs/src/typography/typography-component.js");

var render = wp.element.render;
var TypographyControl = wp.customize.Control.extend({
  renderContent: function renderContent() {
    var control = this;
    render( /*#__PURE__*/React.createElement(_typography_component__WEBPACK_IMPORTED_MODULE_0__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./inc/Api/Customizer/reactjs/src/typography/typography-component.js":
/*!***************************************************************************!*\
  !*** ./inc/Api/Customizer/reactjs/src/typography/typography-component.js ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var _common_responsive__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../common/responsive */ "./inc/Api/Customizer/reactjs/src/common/responsive.js");
!(function webpackMissingModule() { var e = new Error("Cannot find module 'classnames'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

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

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

function _createSuper(Derived) {
  var hasNativeReflectConstruct = _isNativeReflectConstruct();

  return function _createSuperInternal() {
    var Super = _getPrototypeOf(Derived),
        result;

    if (hasNativeReflectConstruct) {
      var NewTarget = _getPrototypeOf(this).constructor;

      result = Reflect.construct(Super, arguments, NewTarget);
    } else {
      result = Super.apply(this, arguments);
    }

    return _possibleConstructorReturn(this, result);
  };
}

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(Reflect.construct(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}




var __ = wp.i18n.__;
var _wp$components = wp.components,
    SelectControl = _wp$components.SelectControl,
    RangeControl = _wp$components.RangeControl,
    Button = _wp$components.Button;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;

var TypographyComponent = /*#__PURE__*/function (_Component) {
  _inherits(TypographyComponent, _Component);

  var _super = _createSuper(TypographyComponent);

  function TypographyComponent(props) {
    var _this;

    _classCallCheck(this, TypographyComponent);

    _this = _super.call(this, props);
    var value = props.control.setting.get();
    var defaultParams = {
      weight_default: 400,
      text_transform: 'none',
      font_sizes: {
        desktop: 16,
        mobile: 13,
        tablet: 13
      },
      line_heights: {
        desktop: 20,
        mobile: 20,
        tablet: 20
      }
    };

    if (!value) {
      value = _this.getEmptyValue();
    }

    if (props.control.params.input_attrs.length) {
      var input_attrs = JSON.parse(props.control.params.input_attrs);

      if (input_attrs.default_is_empty) {
        defaultParams = _this.getEmptyDefault();
      }
    }

    _this.controlParams = props.control.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), JSON.parse(props.control.params.input_attrs)) : defaultParams;

    var defaultFontSizes = _objectSpread(_objectSpread({}, defaultParams.font_sizes), _this.controlParams.defaultParams.font_sizes);

    var defaultLineHeights = _objectSpread(_objectSpread({}, defaultParams.line_heights), _this.controlParams.defaultParams.line_heights);

    _this.state = {
      currentDevice: 'desktop',
      defaultFontSizes: defaultFontSizes,
      defaultLineHeights: defaultLineHeights,
      fontWeight: value.fontWeight,
      textTransform: value.textTransform,
      fontSize: _objectSpread(_objectSpread({}, defaultFontSizes), typeof value.fontSize !== 'undefined' && value.fontSize),
      lineHeight: _objectSpread(_objectSpread({}, defaultLineHeights), typeof value.lineHeight !== 'undefined' && value.lineHeight)
    };
    _this.renderFontSize = _this.renderFontSize.bind(_assertThisInitialized(_this));
    _this.renderFontWeight = _this.renderFontWeight.bind(_assertThisInitialized(_this));
    _this.controlHeader = _this.controlHeader.bind(_assertThisInitialized(_this));
    _this.unitButtons = _this.unitButtons.bind(_assertThisInitialized(_this));
    _this.renderTextTransform = _this.renderTextTransform.bind(_assertThisInitialized(_this));
    _this.updateValues = _this.updateValues.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(TypographyComponent, [{
    key: "getEmptyValue",
    value: function getEmptyValue() {
      var prop = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
      var emptyValue = {
        fontWeight: 700,
        textTransform: 'none'
      };

      if (prop && emptyValue[prop]) {
        return emptyValue[prop];
      }

      return emptyValue;
    }
  }, {
    key: "getEmptyDefault",
    value: function getEmptyDefault() {
      return {
        weight_default: 700,
        text_transform: 'none'
      };
    }
  }, {
    key: "unitButtons",
    value: function unitButtons(units, key) {
      var _this2 = this;

      if (!units) {
        return null;
      }

      if (units.length === 1) {
        return /*#__PURE__*/React.createElement(Button, {
          isSmall: true,
          disabled: true,
          className: "active alone"
        }, units[0]);
      }

      return units.map(function (unit, index) {
        var currentDevice = _this2.state.currentDevice;
        var value = _this2.state[key];
        var buttonClass = !(function webpackMissingModule() { var e = new Error("Cannot find module 'classnames'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())({
          active: value[currentDevice + '-unit'] === unit
        });
        return /*#__PURE__*/React.createElement(Button, {
          key: index,
          isSmall: true,
          className: buttonClass,
          onClick: function onClick() {
            var nextValue = _objectSpread({}, value);

            nextValue[currentDevice + '-unit'] = unit;

            if (unit !== 'em') {
              nextValue[currentDevice] = mapValues(nextValue[currentDevice], function (value) {
                return value ? parseInt(value) : value;
              });
            }

            _this2.setState(_defineProperty({}, key, nextValue));

            _this2.updateValues(_defineProperty({}, key, nextValue));
          }
        }, unit);
      });
    }
  }, {
    key: "controlHeader",
    value: function controlHeader(label, key, units) {
      var _this3 = this;

      var hideResponsive = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : false;
      return /*#__PURE__*/React.createElement("div", {
        className: "tutorstarter-responsive-control-header"
      }, label && /*#__PURE__*/React.createElement("span", {
        className: "customize-control-title"
      }, __(label, 'tutorstarter')), /*#__PURE__*/React.createElement(_common_responsive__WEBPACK_IMPORTED_MODULE_1__["default"], {
        onChange: function onChange(currentDevice) {
          return _this3.setState({
            currentDevice: currentDevice
          });
        },
        hideResponsive: hideResponsive || false
      }), /*#__PURE__*/React.createElement("div", {
        className: "tutorstarter-units"
      }, this.unitButtons(units, this.state[key], key)));
    }
  }, {
    key: "renderFontSize",
    value: function renderFontSize() {
      var _this4 = this;

      var _this$state = this.state,
          fontSize = _this$state.fontSize,
          defaultFontSizes = _this$state.defaultFontSizes,
          currentDevice = _this$state.currentDevice;
      var _this$controlParams$f = this.controlParams.font_sizes,
          min = _this$controlParams$f.min,
          max = _this$controlParams$f.max,
          units = _this$controlParams$f.units;
      return /*#__PURE__*/React.createElement("div", {
        className: "select-inline font-size"
      }, this.controlHeader('Font Sizes', 'fontSize', units), /*#__PURE__*/React.createElement(RangeControl, {
        step: 1,
        min: min,
        max: max,
        allowReset: true,
        isShiftStepEnabled: true,
        value: fontSize[currentDevice],
        resetFallbackValue: defaultFontSizes[currentDevice],
        onChange: function onChange(newValue) {
          _this4.setState(function (prevState) {
            return {
              fontSize: _objectSpread(_objectSpread({}, prevState.fontSize), {}, _defineProperty({}, currentDevice, newValue))
            };
          });

          _this4.updateValues({
            fontSize: _objectSpread(_objectSpread({}, fontSize), {}, _defineProperty({}, currentDevice, newValue))
          });
        }
      }));
    }
  }, {
    key: "renderLineHeight",
    value: function renderLineHeight() {
      var _this5 = this;

      var _this$state2 = this.state,
          lineHeight = _this$state2.lineHeight,
          defaultLineHeights = _this$state2.defaultLineHeights,
          currentDevice = _this$state2.currentDevice;
      var _this$controlParams$l = this.controlParams.line_heights,
          min = _this$controlParams$l.min,
          max = _this$controlParams$l.max,
          units = _this$controlParams$l.units;
      return /*#__PURE__*/React.createElement("div", {
        className: "select-inline line-height"
      }, this.controlHeader('Line Height', 'lineHeight', units), /*#__PURE__*/React.createElement(RangeControl, {
        step: 1,
        min: min,
        max: max,
        allowReset: true,
        isShiftStepEnabled: true,
        value: lineHeight[currentDevice],
        resetFallbackValue: defaultLineHeights[currentDevice],
        onChange: function onChange(newValue) {
          _this5.setState(function (prevState) {
            return {
              lineHeight: _objectSpread(_objectSpread({}, prevState.lineHeight), {}, _defineProperty({}, currentDevice, newValue))
            };
          });

          _this5.updateValues({
            lineHeight: _objectSpread(_objectSpread({}, lineHeight), {}, _defineProperty({}, currentDevice, newValue))
          });
        }
      }));
    }
  }, {
    key: "render",
    value: function render() {
      return /*#__PURE__*/React.createElement(Fragment, null, this.props.control.params.label && /*#__PURE__*/React.createElement("span", {
        className: "customize-control-title"
      }, this.props.control.params.label), /*#__PURE__*/React.createElement("div", {
        className: "tutorstarter-typography-control tutorstarter-background-control"
      }, this.renderFontSize(), this.renderLineHeight(), this.renderFontWeight(), this.renderTextTransform()));
    }
  }, {
    key: "updateValues",
    value: function updateValues(value) {
      this.props.control.setting.set(_objectSpread(_objectSpread({}, this.props.control.setting.get()), value));
    }
  }, {
    key: "renderFontWeight",
    value: function renderFontWeight() {
      var _this6 = this;

      return /*#__PURE__*/React.createElement("div", {
        className: "select-inline font-weight"
      }, /*#__PURE__*/React.createElement("span", {
        className: "customize-control-title"
      }, __('Font Weight', 'tutorstarter')), /*#__PURE__*/React.createElement(SelectControl, {
        value: this.state.fontWeight,
        options: [{
          value: 100,
          label: '100'
        }, {
          value: 200,
          label: '200'
        }, {
          value: 300,
          label: '300'
        }, {
          value: 400,
          label: '400'
        }, {
          value: 500,
          label: '500'
        }, {
          value: 600,
          label: '600'
        }, {
          value: 700,
          label: '700'
        }, {
          value: 800,
          label: '800'
        }, {
          value: 900,
          label: '900'
        }],
        onChange: function onChange(fontWeight) {
          _this6.setState({
            fontWeight: fontWeight
          });

          _this6.updateValues({
            fontWeight: fontWeight
          });
        }
      }));
    }
  }, {
    key: "renderTextTransform",
    value: function renderTextTransform() {
      var _this7 = this;

      return /*#__PURE__*/React.createElement("div", {
        className: "select-inline text-transform"
      }, /*#__PURE__*/React.createElement("span", {
        className: "customize-control-title"
      }, __('Text Transform', 'tutorstarter')), /*#__PURE__*/React.createElement(SelectControl, {
        value: this.state.textTransform,
        options: [{
          value: 'none',
          label: __('None', 'tutorstarter')
        }, {
          value: 'capitalize',
          label: __('Capitalize', 'tutorstarter')
        }, {
          value: 'lowercase',
          label: __('Lowercase', 'tutorstarter')
        }, {
          value: 'uppercase',
          label: __('Uppercase', 'tutorstarter')
        }],
        onChange: function onChange(textTransform) {
          _this7.setState({
            textTransform: textTransform
          });

          _this7.updateValues({
            textTransform: textTransform
          });
        }
      }));
    }
  }]);

  return TypographyComponent;
}(Component);

TypographyComponent.propTypes = {
  control: !(function webpackMissingModule() { var e = new Error("Cannot find module 'prop-types'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()).object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (TypographyComponent);

/***/ }),

/***/ 3:
/*!*********************************************************************!*\
  !*** multi ./inc/Api/Customizer/reactjs/src/customizer-controls.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/tutortheme/wp-content/themes/tutorstarter/inc/Api/Customizer/reactjs/src/customizer-controls.js */"./inc/Api/Customizer/reactjs/src/customizer-controls.js");


/***/ })

/******/ });