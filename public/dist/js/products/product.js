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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/products/product.js":
/*!*************************************************!*\
  !*** ./resources/assets/js/products/product.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

Product = new Vue({
  el: '#product',
  data: {
    image: null,
    error: {
      image: null
    },
    product_categories: product_categories,
    products: [],
    total: 0,
    data: {
      id: null,
      name: '',
      price: 0,
      sequence: 0,
      enable_status: 1,
      product_category_id: null,
      description: '',
      image: null
    },
    product_category_selected: undefined,
    product_category_id: null,
    is_loaded_product: 0
  },
  mounted: function mounted() {
    this.init();
  },
  methods: {
    init: function init() {
      var _this = this;

      axios.get("/portal/products/get").then(function (response) {
        _this.is_loaded_product = 1;

        if (response.data.success) {
          var _this$products;

          hideLoading();

          (_this$products = _this.products).push.apply(_this$products, _toConsumableArray(response.data.data.list));

          _this.total = response.data.data.total;
        } else {
          console.log('response not success');
        }
      });
    },
    formatCurrency: function formatCurrency(money) {
      var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2
      });
      return formatter.format(money);
    },
    save: function save() {
      var _this$data$id;

      showLoading();
      axios.post("/portal/products/".concat((_this$data$id = this.data.id) !== null && _this$data$id !== void 0 ? _this$data$id : ''), this.data).then(function (response) {
        if (response.data.success) {
          window.location.href = '/portal/products';
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot update product');
      });
    },
    submit: function submit() {
      var _this2 = this;

      showLoading();
      this.$validator.validate().then(function (result) {
        var save = true;

        if (!_this2.data.id && !_this2.data.image) {
          _this2.error.image = 'The Image field is required.';
          save = false;
        }

        if (!result || !save) {
          hideLoading(); //set Window location to top

          window.scrollTo(0, 0);
        } else {
          _this2.save();
        }
      });
    },
    uploadImage: function uploadImage(event) {
      var _this3 = this;

      var input = event.target;

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          _this3.data.image = e.target.result;
          _this3.error.image = null;
        };

        reader.readAsDataURL(input.files[0]);
      }
    },
    clearData: function clearData() {
      var _this4 = this;

      this.data = {
        id: null,
        name: '',
        price: 0,
        sequence: 0,
        enable_status: 1,
        product_category_id: null,
        description: '',
        image: null
      };
      setTimeout(function () {
        // this.$validator.errors.remove('name');
        _this4.$validator.errors.clear();

        _this4.error.image = '';
      }, 0);
    },
    setData: function setData(product) {
      this.data = Object.assign({}, {
        id: product.id,
        name: product.name_en,
        product_category_id: product.product_category_id,
        price: product.price,
        sequence: product.sequence,
        enable_status: product.enable_status,
        media: product.media,
        description: product.long_description
      });
      $('.product-category-select2').val(product.product_category_id ? product.product_category_id : null).trigger('change');
    },
    updateProductStatus: function updateProductStatus(value) {
      showLoading();
      axios.post("/portal/products/status/".concat(this.data.id), {
        enable_status: value
      }).then(function (response) {
        if (response.data.success) {
          window.location.href = '/portal/products';
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot update product');
      });
    },
    deleteProduct: function deleteProduct() {
      axios["delete"]("/portal/products/".concat(this.data.id)).then(function (response) {
        hideLoading();

        if (response.data.success) {
          window.location.href = '/portal/products';
        } else {
          showAlertError(response.data.message);
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot delete product');
      });
    }
  },
  computed: {
    resultQuery: function resultQuery() {
      var vm = this,
          lists = vm.products;
      return _.filter(lists, function (query) {
        var product_category = vm.product_category_id ? query.product_category_id == vm.product_category_id : true;
        return product_category;
      });
    }
  }
});

/***/ }),

/***/ 7:
/*!*******************************************************!*\
  !*** multi ./resources/assets/js/products/product.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\Work Project\emenu\merchant\resources\assets\js\products\product.js */"./resources/assets/js/products/product.js");


/***/ })

/******/ });