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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./inc/Custom/Schema/reactjs/src/schema/fields/schema-fields.js":
/*!**********************************************************************!*\
  !*** ./inc/Custom/Schema/reactjs/src/schema/fields/schema-fields.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _select_options__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./select-options */ "./inc/Custom/Schema/reactjs/src/schema/fields/select-options.js");
var __ = wp.i18n.__;
var Fragment = wp.element.Fragment;
var _wp$components = wp.components,
    SelectControl = _wp$components.SelectControl,
    TextControl = _wp$components.TextControl,
    TextareaControl = _wp$components.TextareaControl;


var SchemaFields = function SchemaFields(_ref) {
  var updatedValue = _ref.updatedValue,
      updateMeta = _ref.updateMeta;
  var optionsGroup = [];
  var is_blog_post = tutorstarter_admin.is_post;
  var post_title = tutorstarter_admin.post_title;
  var post_excerpt = tutorstarter_admin.post_excerpt;
  var post_content = tutorstarter_admin.post_content;
  var post_thumbnail = tutorstarter_admin.post_thumbnail;

  var selectOptions = function selectOptions(input) {
    if ('LocalBusiness' === input) {
      optionsGroup = _select_options__WEBPACK_IMPORTED_MODULE_0__["localBusiness"];
    } else if ('Organization' === input) {
      optionsGroup = _select_options__WEBPACK_IMPORTED_MODULE_0__["organization"];
    } else if ('Person' === input) {
      optionsGroup = _select_options__WEBPACK_IMPORTED_MODULE_0__["person"];
    } else if ('Review' === input) {
      optionsGroup = _select_options__WEBPACK_IMPORTED_MODULE_0__["review"];
    }

    return optionsGroup;
  };

  if ('1' === is_blog_post) {
    return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(TextControl, {
      label: __('Schema Type', 'tutorstarter'),
      value: "Blog Post",
      disabled: true,
      style: {
        backgroundColor: '#eeeeee',
        cursor: 'not-allowed'
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Title', 'tutorstarter'),
      placeholder: __('e.g: My Awesome Post', 'tutorstarter'),
      value: updatedValue.name ? updatedValue.name : post_title,
      onChange: function onChange(value) {
        return updateMeta(value, 'name');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Image URL', 'tutorstarter'),
      placeholder: __('e.g: https://site.com/image-url.jpg', 'tutorstarter'),
      value: updatedValue.logo_url ? updatedValue.logo_url : post_thumbnail,
      onChange: function onChange(value) {
        return updateMeta(value, 'logo_url');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Keywords', 'tutorstarter'),
      placeholder: __('e.g: seo wordpress blog', 'tutorstarter'),
      value: updatedValue.keywords,
      onChange: function onChange(value) {
        return updateMeta(value, 'keywords');
      }
    }), /*#__PURE__*/React.createElement(TextareaControl, {
      label: __('Description', 'tutorstarter'),
      placeholder: __('e.g: Awesome Description', 'tutorstarter'),
      value: updatedValue.description ? updatedValue.description : post_excerpt,
      onChange: function onChange(value) {
        return updateMeta(value, 'description');
      }
    }), /*#__PURE__*/React.createElement(TextareaControl, {
      label: __('Article Body', 'tutorstarter'),
      placeholder: __('e.g: Awesome Post Content', 'tutorstarter'),
      value: updatedValue.article_body ? updatedValue.article_body : post_content,
      onChange: function onChange(value) {
        return updateMeta(value, 'article_body');
      }
    }));
  } else {
    return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(SelectControl, {
      label: __('Schema Type', 'tutorstarter'),
      value: updatedValue.main_schema_select,
      options: [{
        label: __('--Select--', 'tutorstarter'),
        value: ''
      }, {
        label: __('Local Business', 'tutorstarter'),
        value: 'LocalBusiness'
      }, {
        label: __('Organization', 'tutorstarter'),
        value: 'Organization'
      }, {
        label: __('Web Page', 'tutorstarter'),
        value: 'WebPage'
      }, {
        label: __('Video', 'tutorstarter'),
        value: 'Video'
      }, {
        label: __('Review', 'tutorstarter'),
        value: 'Review'
      }, {
        label: __('Person', 'tutorstarter'),
        value: 'Person'
      }],
      onChange: function onChange(value) {
        return updateMeta(value, 'main_schema_select');
      }
    }), 'WebPage' !== updatedValue.main_schema_select && 'Video' !== updatedValue.main_schema_select && /*#__PURE__*/React.createElement(SelectControl, {
      label: 'Person' === updatedValue.main_schema_select ? __('Gender', 'tutorstarter') : __('Sub Schema Type', 'tutorstarter'),
      value: updatedValue.sub_schema_select,
      options: selectOptions(updatedValue.main_schema_select),
      onChange: function onChange(value) {
        return updateMeta(value, 'sub_schema_select');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Name', 'tutorstarter'),
      placeholder: __('e.g: John Doe', 'tutorstarter'),
      value: updatedValue.name,
      onChange: function onChange(value) {
        return updateMeta(value, 'name');
      }
    }), 'Person' === updatedValue.main_schema_select && /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(TextControl, {
      label: __('Job Title', 'tutorstarter'),
      placeholder: __('e.g: Software Engineer', 'tutorstarter'),
      value: updatedValue.job_title,
      onChange: function onChange(value) {
        return updateMeta(value, 'job_title');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Height', 'tutorstarter'),
      placeholder: __('e.g: 165 cm', 'tutorstarter'),
      value: updatedValue.height,
      onChange: function onChange(value) {
        return updateMeta(value, 'height');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Email', 'tutorstarter'),
      placeholder: __('e.g: john@doe.com', 'tutorstarter'),
      value: updatedValue.email,
      onChange: function onChange(value) {
        return updateMeta(value, 'email');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Birth Date', 'tutorstarter'),
      placeholder: __('e.g: YYYY-MM-DD', 'tutorstarter'),
      value: updatedValue.birth_date,
      onChange: function onChange(value) {
        return updateMeta(value, 'birth_date');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Birth Place', 'tutorstarter'),
      placeholder: __('e.g: Zurich, Switzerland', 'tutorstarter'),
      value: updatedValue.birth_place,
      onChange: function onChange(value) {
        return updateMeta(value, 'birth_place');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Nationality', 'tutorstarter'),
      placeholder: __('e.g: American', 'tutorstarter'),
      value: updatedValue.nationality,
      onChange: function onChange(value) {
        return updateMeta(value, 'nationality');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('PO Box', 'tutorstarter'),
      placeholder: __('e.g: 4521', 'tutorstarter'),
      value: updatedValue.po_box,
      onChange: function onChange(value) {
        return updateMeta(value, 'po_box');
      }
    })), 'Person' !== updatedValue.main_schema_select && 'WebPage' !== updatedValue.main_schema_select && /*#__PURE__*/React.createElement(TextControl, {
      label: 'Video' === updatedValue.main_schema_select ? __('Thumbnail URL', 'tutorstarter') : __('Logo/Image URL', 'tutorstarter'),
      placeholder: __('e.g: https://site.com/image-url.jpg', 'tutorstarter'),
      value: updatedValue.logo_url,
      onChange: function onChange(value) {
        return updateMeta(value, 'logo_url');
      }
    }), 'Person' !== updatedValue.main_schema_select && /*#__PURE__*/React.createElement(TextareaControl, {
      label: __('Description', 'tutorstarter'),
      placeholder: __('e.g: Awesome description', 'tutorstarter'),
      value: updatedValue.description,
      onChange: function onChange(value) {
        return updateMeta(value, 'description');
      }
    }), 'Organization' === updatedValue.main_schema_select && /*#__PURE__*/React.createElement(TextControl, {
      label: __('PO Box', 'tutorstarter'),
      placeholder: __('e.g: 4521', 'tutorstarter'),
      value: updatedValue.po_box,
      onChange: function onChange(value) {
        return updateMeta(value, 'po_box');
      }
    }), 'WebPage' !== updatedValue.main_schema_select && 'Video' !== updatedValue.main_schema_select && 'Review' !== updatedValue.main_schema_select && /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(TextControl, {
      label: __('Address', 'tutorstarter'),
      placeholder: __('e.g: 45, johnson road', 'tutorstarter'),
      value: updatedValue.address,
      onChange: function onChange(value) {
        return updateMeta(value, 'address');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Phone Number', 'tutorstarter'),
      placeholder: __('e.g: +1 22 33 4567', 'tutorstarter'),
      value: updatedValue.phone,
      onChange: function onChange(value) {
        return updateMeta(value, 'phone');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('City', 'tutorstarter'),
      placeholder: __('e.g: New York', 'tutorstarter'),
      value: updatedValue.city,
      onChange: function onChange(value) {
        return updateMeta(value, 'city');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('State/Region', 'tutorstarter'),
      placeholder: __('e.g: California(CA)', 'tutorstarter'),
      value: updatedValue.state_region,
      onChange: function onChange(value) {
        return updateMeta(value, 'state_region');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Zip/Postal Code', 'tutorstarter'),
      placeholder: __('e.g: 1234', 'tutorstarter'),
      value: updatedValue.zip_code,
      onChange: function onChange(value) {
        return updateMeta(value, 'zip_code');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Country', 'tutorstarter'),
      placeholder: __('e.g: USA', 'tutorstarter'),
      value: updatedValue.country,
      onChange: function onChange(value) {
        return updateMeta(value, 'country');
      }
    })), 'Video' === updatedValue.main_schema_select && /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(TextControl, {
      label: __('Upload Date', 'tutorstarter'),
      help: __('Format it like this YYYY-MM-DD and the time with "T then hour:minute:second+timezone"', 'tutorstarter'),
      placeholder: __('e.g: 2020-10-10T08:00:00+08:00', 'tutorstarter'),
      value: updatedValue.upload_date,
      onChange: function onChange(value) {
        return updateMeta(value, 'upload_date');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Duration', 'tutorstarter'),
      help: __('Format it like this: PT then 1 minute and then 30 second', 'tutorstarter'),
      placeholder: __('e.g: PT1M30S', 'tutorstarter'),
      value: updatedValue.duration,
      onChange: function onChange(value) {
        return updateMeta(value, 'duration');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Content URL', 'tutorstarter'),
      placeholder: __('e.g: https://example.com/video-url.mp4', 'tutorstarter'),
      value: updatedValue.content_url,
      onChange: function onChange(value) {
        return updateMeta(value, 'content_url');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Embed URL', 'tutorstarter'),
      placeholder: __('e.g: https://example.com/videoplayer.swf?video=123', 'tutorstarter'),
      value: updatedValue.embed_url,
      onChange: function onChange(value) {
        return updateMeta(value, 'embed_url');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Interaction Count', 'tutorstarter'),
      placeholder: __('e.g: 1254', 'tutorstarter'),
      value: updatedValue.interaction_count,
      onChange: function onChange(value) {
        return updateMeta(value, 'interaction_count');
      }
    })), 'Review' === updatedValue.main_schema_select && /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(TextControl, {
      label: __('Rating Value', 'tutorstarter'),
      placeholder: __('e.g: 4', 'tutorstarter'),
      value: updatedValue.rating_value,
      onChange: function onChange(value) {
        return updateMeta(value, 'rating_value');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Reviewed Item', 'tutorstarter'),
      placeholder: __('e.g: iPhone 11 Pro Case', 'tutorstarter'),
      value: updatedValue.reviewed_product,
      onChange: function onChange(value) {
        return updateMeta(value, 'reviewed_product');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Reviewed By', 'tutorstarter'),
      placeholder: __('e.g: Mr John Doe', 'tutorstarter'),
      value: updatedValue.reviewed_by,
      onChange: function onChange(value) {
        return updateMeta(value, 'reviewed_by');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Date Published', 'tutorstarter'),
      help: __('Format it like this YYYY-MM-DD', 'tutorstarter'),
      placeholder: __('e.g: 2020-10-10', 'tutorstarter'),
      value: updatedValue.date_published,
      onChange: function onChange(value) {
        return updateMeta(value, 'date_published');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Review Publisher Type', 'tutorstarter'),
      placeholder: __('e.g: Organization', 'tutorstarter'),
      value: updatedValue.publisher_type,
      onChange: function onChange(value) {
        return updateMeta(value, 'publisher_type');
      }
    }), /*#__PURE__*/React.createElement(TextControl, {
      label: __('Publisher Name', 'tutorstarter'),
      placeholder: __('e.g: iPhone 11 Pro Case Inc.', 'tutorstarter'),
      value: updatedValue.publisher_name,
      onChange: function onChange(value) {
        return updateMeta(value, 'publisher_name');
      }
    })));
  }
};

/* harmony default export */ __webpack_exports__["default"] = (SchemaFields);

/***/ }),

/***/ "./inc/Custom/Schema/reactjs/src/schema/fields/select-options.js":
/*!***********************************************************************!*\
  !*** ./inc/Custom/Schema/reactjs/src/schema/fields/select-options.js ***!
  \***********************************************************************/
/*! exports provided: localBusiness, organization, person, review */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "localBusiness", function() { return localBusiness; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "organization", function() { return organization; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "person", function() { return person; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "review", function() { return review; });
var __ = wp.i18n.__;
var localBusiness = [{
  label: __('--Select--', 'tutorstarter'),
  value: ''
}, {
  label: __('Accounting Service', 'tutorstarter'),
  value: 'AccountingService'
}, {
  label: __('Amusement Park', 'tutorstarter'),
  value: 'AmusementPark'
}, {
  label: __('Animal Shelter', 'tutorstarter'),
  value: 'AnimalShelter'
}, {
  label: __('Art Gallery', 'tutorstarter'),
  value: 'ArtGallery'
}, {
  label: __('Automotive Business', 'tutorstarter'),
  value: 'AutomotiveBusiness'
}, {
  label: __('Auto Body Shop', 'tutorstarter'),
  value: 'AutoBodyShop'
}, {
  label: __('Auto Dealer', 'tutorstarter'),
  value: 'AutoDealer'
}, {
  label: __('Auto Parts Store', 'tutorstarter'),
  value: 'AutoPartsStore'
}, {
  label: __('Auto Rental', 'tutorstarter'),
  value: 'AutoRental'
}, {
  label: __('Auto Repair', 'tutorstarter'),
  value: 'AutoRepair'
}, {
  label: __('Auto Wash', 'tutorstarter'),
  value: 'AutoWash'
}, {
  label: __('Bakery', 'tutorstarter'),
  value: 'Bakery'
}, {
  label: __('Bar Or Pub', 'tutorstarter'),
  value: 'BarOrPub'
}, {
  label: __('Beauty Salon', 'tutorstarter'),
  value: 'BeautySalon'
}, {
  label: __('Cafe Or Coffee Shop', 'tutorstarter'),
  value: 'CafeOrCoffeeShop'
}, {
  label: __('Casino', 'tutorstarter'),
  value: 'Casino'
}, {
  label: __('Child Care', 'tutorstarter'),
  value: 'ChildCare'
}, {
  label: __('Comedy Club', 'tutorstarter'),
  value: 'ComedyClub'
}, {
  label: __('Day Spa', 'tutorstarter'),
  value: 'DaySpa'
}, {
  label: __('Dry Cleaning Or Laundry', 'tutorstarter'),
  value: 'DryCleaningOrLaundry'
}, {
  label: __('Emergency Service', 'tutorstarter'),
  value: 'EmergencyService'
}, {
  label: __('Employment Agency', 'tutorstarter'),
  value: 'EmploymentAgency'
}, {
  label: __('Entertainment Business', 'tutorstarter'),
  value: 'EntertainmentBusiness'
}, {
  label: __('Fast Food Restaurant', 'tutorstarter'),
  value: 'FastFoodRestaurant'
}, {
  label: __('Fire Station', 'tutorstarter'),
  value: 'FireStation'
}, {
  label: __('Gas Station', 'tutorstarter'),
  value: 'GasStation'
}, {
  label: __('Hair Salon', 'tutorstarter'),
  value: 'HairSalon'
}, {
  label: __('Health And Beauty Business', 'tutorstarter'),
  value: 'HealthAndBeautyBusiness'
}, {
  label: __('Health Club', 'tutorstarter'),
  value: 'HealthClub'
}, {
  label: __('Hospital', 'tutorstarter'),
  value: 'Hospital'
}, {
  label: __('Ice Cream Shop', 'tutorstarter'),
  value: 'IceCreamShop'
}, {
  label: __('Insurance Agency', 'tutorstarter'),
  value: 'InsuranceAgency'
}, {
  label: __('Motorcycle Dealer', 'tutorstarter'),
  value: 'MotorcycleDealer'
}, {
  label: __('Motorcycle Repair', 'tutorstarter'),
  value: 'MotorcycleRepair'
}, {
  label: __('Movie Theater', 'tutorstarter'),
  value: 'MovieTheater'
}, {
  label: __('Nail Salon', 'tutorstarter'),
  value: 'NailSalon'
}, {
  label: __('Night Club', 'tutorstarter'),
  value: 'NightClub'
}, {
  label: __('Police Station', 'tutorstarter'),
  value: 'PoliceStation'
}, {
  label: __('Restaurant', 'tutorstarter'),
  value: 'Restaurant'
}, {
  label: __('Tatto Parlor', 'tutorstarter'),
  value: 'TattoParlor'
}];
var organization = [{
  label: __('--Select--', 'tutorstarter'),
  value: ''
}, {
  label: __('Organization', 'tutorstarter'),
  value: 'Organization'
}, {
  label: __('Corporation', 'tutorstarter'),
  value: 'Corporation'
}, {
  label: __('Educational Organization', 'tutorstarter'),
  value: 'EducationalOrganization'
}, {
  label: __('Government Organization', 'tutorstarter'),
  value: 'GovernmentOrganization'
}, {
  label: __('NGO', 'tutorstarter'),
  value: 'NGO'
}, {
  label: __('Performing Group', 'tutorstarter'),
  value: 'PerformingGroup'
}, {
  label: __('Sports Team', 'tutorstarter'),
  value: 'SportsTeam'
}];
var person = [{
  label: __('--Select--', 'tutorstarter'),
  value: ''
}, {
  label: __('Male', 'tutorstarter'),
  value: 'Male'
}, {
  label: __('Female', 'tutorstarter'),
  value: 'Female'
}, {
  label: __('Other', 'tutorstarter'),
  value: 'Other'
}];
var review = [{
  label: __('--Select--', 'tutorstarter'),
  value: ''
}, {
  label: __('Product', 'tutorstarter'),
  value: 'Product'
}, {
  label: __('Book', 'tutorstarter'),
  value: 'Book'
}];

/***/ }),

/***/ "./inc/Custom/Schema/reactjs/src/schema/index.js":
/*!*******************************************************!*\
  !*** ./inc/Custom/Schema/reactjs/src/schema/index.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _fields_schema_fields__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./fields/schema-fields */ "./inc/Custom/Schema/reactjs/src/schema/fields/schema-fields.js");
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

var SchemaFieldsData = compose([withSelect(function () {
  return {
    updatedValue: select('core/editor').getEditedPostAttribute('meta')._tutorstarter_schema_metadata
  };
}), withDispatch(function (dispatch) {
  return {
    updateMeta: function updateMeta(value, prop) {
      var meta = select('core/editor').getEditedPostAttribute('meta')._tutorstarter_schema_metadata;

      meta = _objectSpread({
        main_schema_select: '',
        sub_schema_select: '',
        name: '',
        logo_url: '',
        description: '',
        address: '',
        phone: '',
        city: '',
        state_region: '',
        zip_code: '',
        country: '',
        po_box: '',
        job_title: '',
        height: '',
        birth_date: '',
        birth_place: '',
        nationality: '',
        duration: '',
        upload_date: '',
        content_url: '',
        embed_url: '',
        interaction_count: '',
        rating_value: '',
        reviewed_product: '',
        reviewed_by: '',
        date_published: '',
        publisher_type: '',
        publisher_name: '',
        keywords: '',
        article_body: ''
      }, meta);
      meta[prop] = value;
      dispatch('core/editor').editPost({
        meta: {
          _tutorstarter_schema_metadata: meta
        }
      });
    }
  };
})])(_fields_schema_fields__WEBPACK_IMPORTED_MODULE_0__["default"]);

var TutorStarterSchemaPanel = function TutorStarterSchemaPanel() {
  return /*#__PURE__*/React.createElement(PluginDocumentSettingPanel, {
    name: "tutorstarter-schema-panel",
    title: "Tutor Starter Schema Settings"
  }, /*#__PURE__*/React.createElement(SchemaFieldsData, null));
};

/* harmony default export */ __webpack_exports__["default"] = (TutorStarterSchemaPanel);

/***/ }),

/***/ "./inc/Custom/Schema/reactjs/src/tutorstarter-schema.js":
/*!**************************************************************!*\
  !*** ./inc/Custom/Schema/reactjs/src/tutorstarter-schema.js ***!
  \**************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _schema__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./schema */ "./inc/Custom/Schema/reactjs/src/schema/index.js");
var registerPlugin = wp.plugins.registerPlugin;

registerPlugin('tutorstarter-schema-panel', {
  render: _schema__WEBPACK_IMPORTED_MODULE_0__["default"],
  icon: ''
});

/***/ }),

/***/ 4:
/*!********************************************************************!*\
  !*** multi ./inc/Custom/Schema/reactjs/src/tutorstarter-schema.js ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/zaman/Local Sites/tutorstarter/app/public/wp-content/themes/tutorstarter/inc/Custom/Schema/reactjs/src/tutorstarter-schema.js */"./inc/Custom/Schema/reactjs/src/tutorstarter-schema.js");


/***/ })

/******/ });
=======
!function(e){var t={};function r(a){if(t[a])return t[a].exports;var l=t[a]={i:a,l:!1,exports:{}};return e[a].call(l.exports,l,l.exports,r),l.l=!0,l.exports}r.m=e,r.c=t,r.d=function(e,t,a){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(r.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var l in e)r.d(a,l,function(t){return e[t]}.bind(null,l));return a},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=4)}({4:function(e,t,r){e.exports=r("EJew")},EJew:function(e,t,r){"use strict";r.r(t);var a=wp.i18n.__,l=[{label:a("--Select--","tutorstarter"),value:""},{label:a("Accounting Service","tutorstarter"),value:"AccountingService"},{label:a("Amusement Park","tutorstarter"),value:"AmusementPark"},{label:a("Animal Shelter","tutorstarter"),value:"AnimalShelter"},{label:a("Art Gallery","tutorstarter"),value:"ArtGallery"},{label:a("Automotive Business","tutorstarter"),value:"AutomotiveBusiness"},{label:a("Auto Body Shop","tutorstarter"),value:"AutoBodyShop"},{label:a("Auto Dealer","tutorstarter"),value:"AutoDealer"},{label:a("Auto Parts Store","tutorstarter"),value:"AutoPartsStore"},{label:a("Auto Rental","tutorstarter"),value:"AutoRental"},{label:a("Auto Repair","tutorstarter"),value:"AutoRepair"},{label:a("Auto Wash","tutorstarter"),value:"AutoWash"},{label:a("Bakery","tutorstarter"),value:"Bakery"},{label:a("Bar Or Pub","tutorstarter"),value:"BarOrPub"},{label:a("Beauty Salon","tutorstarter"),value:"BeautySalon"},{label:a("Cafe Or Coffee Shop","tutorstarter"),value:"CafeOrCoffeeShop"},{label:a("Casino","tutorstarter"),value:"Casino"},{label:a("Child Care","tutorstarter"),value:"ChildCare"},{label:a("Comedy Club","tutorstarter"),value:"ComedyClub"},{label:a("Day Spa","tutorstarter"),value:"DaySpa"},{label:a("Dry Cleaning Or Laundry","tutorstarter"),value:"DryCleaningOrLaundry"},{label:a("Emergency Service","tutorstarter"),value:"EmergencyService"},{label:a("Employment Agency","tutorstarter"),value:"EmploymentAgency"},{label:a("Entertainment Business","tutorstarter"),value:"EntertainmentBusiness"},{label:a("Fast Food Restaurant","tutorstarter"),value:"FastFoodRestaurant"},{label:a("Fire Station","tutorstarter"),value:"FireStation"},{label:a("Gas Station","tutorstarter"),value:"GasStation"},{label:a("Hair Salon","tutorstarter"),value:"HairSalon"},{label:a("Health And Beauty Business","tutorstarter"),value:"HealthAndBeautyBusiness"},{label:a("Health Club","tutorstarter"),value:"HealthClub"},{label:a("Hospital","tutorstarter"),value:"Hospital"},{label:a("Ice Cream Shop","tutorstarter"),value:"IceCreamShop"},{label:a("Insurance Agency","tutorstarter"),value:"InsuranceAgency"},{label:a("Motorcycle Dealer","tutorstarter"),value:"MotorcycleDealer"},{label:a("Motorcycle Repair","tutorstarter"),value:"MotorcycleRepair"},{label:a("Movie Theater","tutorstarter"),value:"MovieTheater"},{label:a("Nail Salon","tutorstarter"),value:"NailSalon"},{label:a("Night Club","tutorstarter"),value:"NightClub"},{label:a("Police Station","tutorstarter"),value:"PoliceStation"},{label:a("Restaurant","tutorstarter"),value:"Restaurant"},{label:a("Tatto Parlor","tutorstarter"),value:"TattoParlor"}],o=[{label:a("--Select--","tutorstarter"),value:""},{label:a("Organization","tutorstarter"),value:"Organization"},{label:a("Corporation","tutorstarter"),value:"Corporation"},{label:a("Educational Organization","tutorstarter"),value:"EducationalOrganization"},{label:a("Government Organization","tutorstarter"),value:"GovernmentOrganization"},{label:a("NGO","tutorstarter"),value:"NGO"},{label:a("Performing Group","tutorstarter"),value:"PerformingGroup"},{label:a("Sports Team","tutorstarter"),value:"SportsTeam"}],n=[{label:a("--Select--","tutorstarter"),value:""},{label:a("Male","tutorstarter"),value:"Male"},{label:a("Female","tutorstarter"),value:"Female"},{label:a("Other","tutorstarter"),value:"Other"}],u=[{label:a("--Select--","tutorstarter"),value:""},{label:a("Product","tutorstarter"),value:"Product"},{label:a("Book","tutorstarter"),value:"Book"}],c=wp.i18n.__,s=wp.element.Fragment,i=wp.components,m=i.SelectControl,b=i.TextControl,h=i.TextareaControl,d=function(e){var t,r=e.updatedValue,a=e.updateMeta,i=[],d=tutorstarter_admin.is_post,p=tutorstarter_admin.post_title,g=tutorstarter_admin.post_excerpt,v=tutorstarter_admin.post_content,_=tutorstarter_admin.post_thumbnail;return"1"===d?React.createElement(s,null,React.createElement(b,{label:c("Schema Type","tutorstarter"),value:"Blog Post",disabled:!0,style:{backgroundColor:"#eeeeee",cursor:"not-allowed"}}),React.createElement(b,{label:c("Title","tutorstarter"),placeholder:c("e.g: My Awesome Post","tutorstarter"),value:r.name?r.name:p,onChange:function(e){return a(e,"name")}}),React.createElement(b,{label:c("Image URL","tutorstarter"),placeholder:c("e.g: https://site.com/image-url.jpg","tutorstarter"),value:r.logo_url?r.logo_url:_,onChange:function(e){return a(e,"logo_url")}}),React.createElement(b,{label:c("Keywords","tutorstarter"),placeholder:c("e.g: seo wordpress blog","tutorstarter"),value:r.keywords,onChange:function(e){return a(e,"keywords")}}),React.createElement(h,{label:c("Description","tutorstarter"),placeholder:c("e.g: Awesome Description","tutorstarter"),value:r.description?r.description:g,onChange:function(e){return a(e,"description")}}),React.createElement(h,{label:c("Article Body","tutorstarter"),placeholder:c("e.g: Awesome Post Content","tutorstarter"),value:r.article_body?r.article_body:v,onChange:function(e){return a(e,"article_body")}})):React.createElement(s,null,React.createElement(m,{label:c("Schema Type","tutorstarter"),value:r.main_schema_select,options:[{label:c("--Select--","tutorstarter"),value:""},{label:c("Local Business","tutorstarter"),value:"LocalBusiness"},{label:c("Organization","tutorstarter"),value:"Organization"},{label:c("Web Page","tutorstarter"),value:"WebPage"},{label:c("Video","tutorstarter"),value:"Video"},{label:c("Review","tutorstarter"),value:"Review"},{label:c("Person","tutorstarter"),value:"Person"}],onChange:function(e){return a(e,"main_schema_select")}}),"WebPage"!==r.main_schema_select&&"Video"!==r.main_schema_select&&React.createElement(m,{label:"Person"===r.main_schema_select?c("Gender","tutorstarter"):c("Sub Schema Type","tutorstarter"),value:r.sub_schema_select,options:(t=r.main_schema_select,"LocalBusiness"===t?i=l:"Organization"===t?i=o:"Person"===t?i=n:"Review"===t&&(i=u),i),onChange:function(e){return a(e,"sub_schema_select")}}),React.createElement(b,{label:c("Name","tutorstarter"),placeholder:c("e.g: John Doe","tutorstarter"),value:r.name,onChange:function(e){return a(e,"name")}}),"Person"===r.main_schema_select&&React.createElement(s,null,React.createElement(b,{label:c("Job Title","tutorstarter"),placeholder:c("e.g: Software Engineer","tutorstarter"),value:r.job_title,onChange:function(e){return a(e,"job_title")}}),React.createElement(b,{label:c("Height","tutorstarter"),placeholder:c("e.g: 165 cm","tutorstarter"),value:r.height,onChange:function(e){return a(e,"height")}}),React.createElement(b,{label:c("Email","tutorstarter"),placeholder:c("e.g: john@doe.com","tutorstarter"),value:r.email,onChange:function(e){return a(e,"email")}}),React.createElement(b,{label:c("Birth Date","tutorstarter"),placeholder:c("e.g: YYYY-MM-DD","tutorstarter"),value:r.birth_date,onChange:function(e){return a(e,"birth_date")}}),React.createElement(b,{label:c("Birth Place","tutorstarter"),placeholder:c("e.g: Zurich, Switzerland","tutorstarter"),value:r.birth_place,onChange:function(e){return a(e,"birth_place")}}),React.createElement(b,{label:c("Nationality","tutorstarter"),placeholder:c("e.g: American","tutorstarter"),value:r.nationality,onChange:function(e){return a(e,"nationality")}}),React.createElement(b,{label:c("PO Box","tutorstarter"),placeholder:c("e.g: 4521","tutorstarter"),value:r.po_box,onChange:function(e){return a(e,"po_box")}})),"Person"!==r.main_schema_select&&"WebPage"!==r.main_schema_select&&React.createElement(b,{label:"Video"===r.main_schema_select?c("Thumbnail URL","tutorstarter"):c("Logo/Image URL","tutorstarter"),placeholder:c("e.g: https://site.com/image-url.jpg","tutorstarter"),value:r.logo_url,onChange:function(e){return a(e,"logo_url")}}),"Person"!==r.main_schema_select&&React.createElement(h,{label:c("Description","tutorstarter"),placeholder:c("e.g: Awesome description","tutorstarter"),value:r.description,onChange:function(e){return a(e,"description")}}),"Organization"===r.main_schema_select&&React.createElement(b,{label:c("PO Box","tutorstarter"),placeholder:c("e.g: 4521","tutorstarter"),value:r.po_box,onChange:function(e){return a(e,"po_box")}}),"WebPage"!==r.main_schema_select&&"Video"!==r.main_schema_select&&"Review"!==r.main_schema_select&&React.createElement(s,null,React.createElement(b,{label:c("Address","tutorstarter"),placeholder:c("e.g: 45, johnson road","tutorstarter"),value:r.address,onChange:function(e){return a(e,"address")}}),React.createElement(b,{label:c("Phone Number","tutorstarter"),placeholder:c("e.g: +1 22 33 4567","tutorstarter"),value:r.phone,onChange:function(e){return a(e,"phone")}}),React.createElement(b,{label:c("City","tutorstarter"),placeholder:c("e.g: New York","tutorstarter"),value:r.city,onChange:function(e){return a(e,"city")}}),React.createElement(b,{label:c("State/Region","tutorstarter"),placeholder:c("e.g: California(CA)","tutorstarter"),value:r.state_region,onChange:function(e){return a(e,"state_region")}}),React.createElement(b,{label:c("Zip/Postal Code","tutorstarter"),placeholder:c("e.g: 1234","tutorstarter"),value:r.zip_code,onChange:function(e){return a(e,"zip_code")}}),React.createElement(b,{label:c("Country","tutorstarter"),placeholder:c("e.g: USA","tutorstarter"),value:r.country,onChange:function(e){return a(e,"country")}})),"Video"===r.main_schema_select&&React.createElement(s,null,React.createElement(b,{label:c("Upload Date","tutorstarter"),help:c('Format it like this YYYY-MM-DD and the time with "T then hour:minute:second+timezone"',"tutorstarter"),placeholder:c("e.g: 2020-10-10T08:00:00+08:00","tutorstarter"),value:r.upload_date,onChange:function(e){return a(e,"upload_date")}}),React.createElement(b,{label:c("Duration","tutorstarter"),help:c("Format it like this: PT then 1 minute and then 30 second","tutorstarter"),placeholder:c("e.g: PT1M30S","tutorstarter"),value:r.duration,onChange:function(e){return a(e,"duration")}}),React.createElement(b,{label:c("Content URL","tutorstarter"),placeholder:c("e.g: https://example.com/video-url.mp4","tutorstarter"),value:r.content_url,onChange:function(e){return a(e,"content_url")}}),React.createElement(b,{label:c("Embed URL","tutorstarter"),placeholder:c("e.g: https://example.com/videoplayer.swf?video=123","tutorstarter"),value:r.embed_url,onChange:function(e){return a(e,"embed_url")}}),React.createElement(b,{label:c("Interaction Count","tutorstarter"),placeholder:c("e.g: 1254","tutorstarter"),value:r.interaction_count,onChange:function(e){return a(e,"interaction_count")}})),"Review"===r.main_schema_select&&React.createElement(s,null,React.createElement(b,{label:c("Rating Value","tutorstarter"),placeholder:c("e.g: 4","tutorstarter"),value:r.rating_value,onChange:function(e){return a(e,"rating_value")}}),React.createElement(b,{label:c("Reviewed Item","tutorstarter"),placeholder:c("e.g: iPhone 11 Pro Case","tutorstarter"),value:r.reviewed_product,onChange:function(e){return a(e,"reviewed_product")}}),React.createElement(b,{label:c("Reviewed By","tutorstarter"),placeholder:c("e.g: Mr John Doe","tutorstarter"),value:r.reviewed_by,onChange:function(e){return a(e,"reviewed_by")}}),React.createElement(b,{label:c("Date Published","tutorstarter"),help:c("Format it like this YYYY-MM-DD","tutorstarter"),placeholder:c("e.g: 2020-10-10","tutorstarter"),value:r.date_published,onChange:function(e){return a(e,"date_published")}}),React.createElement(b,{label:c("Review Publisher Type","tutorstarter"),placeholder:c("e.g: Organization","tutorstarter"),value:r.publisher_type,onChange:function(e){return a(e,"publisher_type")}}),React.createElement(b,{label:c("Publisher Name","tutorstarter"),placeholder:c("e.g: iPhone 11 Pro Case Inc.","tutorstarter"),value:r.publisher_name,onChange:function(e){return a(e,"publisher_name")}})))};function p(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,a)}return r}function g(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var v=wp.compose.compose,_=wp.editPost.PluginDocumentSettingPanel,f=wp.data,y=f.select,C=f.withSelect,R=f.withDispatch,P=v([C((function(){return{updatedValue:y("core/editor").getEditedPostAttribute("meta")._tutorstarter_schema_metadata}})),R((function(e){return{updateMeta:function(t,r){var a=y("core/editor").getEditedPostAttribute("meta")._tutorstarter_schema_metadata;(a=function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?p(Object(r),!0).forEach((function(t){g(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):p(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({main_schema_select:"",sub_schema_select:"",name:"",logo_url:"",description:"",address:"",phone:"",city:"",state_region:"",zip_code:"",country:"",po_box:"",job_title:"",height:"",birth_date:"",birth_place:"",nationality:"",duration:"",upload_date:"",content_url:"",embed_url:"",interaction_count:"",rating_value:"",reviewed_product:"",reviewed_by:"",date_published:"",publisher_type:"",publisher_name:"",keywords:"",article_body:""},a))[r]=t,e("core/editor").editPost({meta:{_tutorstarter_schema_metadata:a}})}}}))])(d),E=function(){return React.createElement(_,{name:"tutorstarter-schema-panel",title:"Tutor Starter Schema Settings"},React.createElement(P,null))};(0,wp.plugins.registerPlugin)("tutorstarter-schema-panel",{render:E,icon:""})}});
>>>>>>> 0eba8e894f9f7572f123d5d65a719777540535fd
