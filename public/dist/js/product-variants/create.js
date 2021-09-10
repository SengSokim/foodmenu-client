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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/product-variants/create.js":
/*!*************************************************!*\
  !*** ./resources/js/product-variants/create.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var CreateProductVariant = new Vue({
  el: "#createProductVariant",
  data: {
    data: {
      // product_id: product_id,
      name: '',
      sequence: 0,
      enable_status: true,
      is_required: true,
      values: []
    },
    data_adding: {
      name: '',
      extra_price: 0,
      sequence: 0,
      enable_status: true,
      isEdit: false
    },
    isAddNew: false,
    isEdit: false,
    selected_variant_index: null
  },
  methods: {
    addVariantValue: function addVariantValue() {
      this.data_adding = {
        //clear variant value after comfirm add
        name: '',
        extra_price: 0,
        sequence: 0,
        enable_status: true,
        isEdit: false
      };
      this.isAddNew = true; //show input add variant value in table

      this.isEdit = true;
    },
    confirmAdd: function confirmAdd() {
      this.isAddNew = false;
      this.isEdit = false;
      this.data.values.push(this.data_adding);
    },
    cancelAdd: function cancelAdd() {
      this.isAddNew = false;
      this.isEdit = false;
    },
    editVariantValue: function editVariantValue() {
      this.isEdit = true;
    },
    confirmEdit: function confirmEdit() {
      this.isEdit = false;
    },
    cancelEdit: function cancelEdit() {
      this.isEdit = false;
    },
    removeVariantValue: function removeVariantValue() {
      this.data.values.splice(this.selected_variant_index, 1);
    },
    save: function save() {
      var _this = this;

      axios.post("".concat(baseURL, "/portal/product-variants/"), this.data).then(function (response) {
        if (response.data.success) {
          window.location.href = baseURL + '/portal/product-variants?product_id=' + _this.data.product_id;
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Can not add product variant');
        console.log(error);
      });
    },
    submit: function submit() {
      var _this2 = this;

      showLoading();
      this.$validator.validate().then(function (result) {
        if (!result) {
          hideLoading(); //set Window location to top

          window.scrollTo(0, 0);
        } else {
          _this2.save();
        }
      });
    }
  }
});

/***/ }),

/***/ 2:
/*!*******************************************************!*\
  !*** multi ./resources/js/product-variants/create.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\papadeliver\emenu\portal\resources\js\product-variants\create.js */"./resources/js/product-variants/create.js");


/***/ })

/******/ });