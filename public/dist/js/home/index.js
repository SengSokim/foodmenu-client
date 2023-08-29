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
/******/ 	return __webpack_require__(__webpack_require__.s = 16);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/home/index.js":
/*!*******************************************!*\
  !*** ./resources/assets/js/home/index.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var app = new Vue({
  el: "#homePage",
  data: {
    data: data.data,
    productDetail: "",
    toAdd: {
      code: '',
      name: '',
      img: '',
      qty: '',
      price: '',
      subtotal: '',
      description: ''
    },
    carts: [],
    orderDetails: {
      customer_name: "",
      phone_number: "",
      address: "",
      total_order: "",
      product_ids: ""
    },
    grandtotal: 0
  },
  methods: {
    getDetail: function getDetail(product) {
      this.productDetail = product;
      this.toAdd = {
        id: this.productDetail.id,
        code: this.productDetail.code,
        name: this.productDetail.name,
        img: this.productDetail.image.url,
        price: this.productDetail.price,
        description: this.productDetail.description,
        qty: 1,
        subtotal: this.productDetail.price
      };
    },
    incrementQtyAdd: function incrementQtyAdd(item) {
      item.qty += 1;
    },
    decrementQtyAdd: function decrementQtyAdd(item) {
      item.qty -= 1;
    },
    incrementQty: function incrementQty(item) {
      item.qty += 1;
      this.calculateSubtotal(item);
      this.orderDetails.product_ids = this.orderInfo();
      this.orderDetails.total_order = this.calculateGrandtotal();
    },
    decrementQty: function decrementQty(item) {
      item.qty -= 1;
      this.calculateSubtotal(item);
      this.orderDetails.product_ids = this.orderInfo();
      this.orderDetails.total_order = this.calculateGrandtotal();
    },
    addToCart: function addToCart(id) {
      var _this$carts;
      var existingItem = (_this$carts = this.carts) === null || _this$carts === void 0 ? void 0 : _this$carts.find(function (item) {
        return item.id === id;
      });
      if (existingItem) {
        existingItem.qty += this.toAdd.qty;
        existingItem.subtotal = existingItem.price * existingItem.qty;
        this.grandtotal = this.calculateGrandtotal();
        showToastSuccess("".concat(existingItem.name, " +").concat(this.toAdd.qty));
      } else {
        var newItem = _objectSpread(_objectSpread({}, this.toAdd), {}, {
          subtotal: this.toAdd.price * this.toAdd.qty
        });
        this.carts.push(newItem);
        showToastSuccess('Added to Cart!');
        this.grandtotal = this.calculateGrandtotal();
        this.orderDetails.product_ids = this.orderInfo();
        this.orderDetails.total_order = this.calculateGrandtotal();
      }
    },
    orderInfo: function orderInfo() {
      var details = this.carts.map(function (item) {
        return {
          product_id: item.id,
          qty: item.qty,
          total: item.subtotal
        };
      });
      return details;
    },
    removefromCart: function removefromCart(index) {
      this.carts.splice(index - 1);
      this.grandtotal = this.calculateGrandtotal();
    },
    calculateSubtotal: function calculateSubtotal(item) {
      item.subtotal = item.price * item.qty;
      this.grandtotal = this.calculateGrandtotal();
    },
    calculateGrandtotal: function calculateGrandtotal() {
      return this.carts.map(function (product) {
        return product.subtotal;
      }).reduce(function (acc, curr) {
        return acc + curr;
      }, 0);
    },
    formatNumber: function formatNumber(number, decimals, decPoint, thousandsSep) {
      number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
      var n = !isFinite(+number) ? 0 : +number;
      var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);
      var sep = typeof thousandsSep === 'undefined' ? ',' : thousandsSep;
      var dec = typeof decPoint === 'undefined' ? '.' : decPoint;
      var s = '';
      var toFixedFix = function toFixedFix(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    },
    formatCurrency: function formatCurrency(number) {
      var prefix = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '$';
      var decimal = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 2;
      var formattedNumber = this.formatNumber(number, decimal, '.', ',');
      return prefix + formattedNumber;
    },
    clear: function clear() {
      this.productDetail = "";
      this.orderDetails = {
        customer_name: "",
        phone_number: "",
        address: "",
        total_order: "",
        product_ids: ""
      }, this.carts = [];
      this.grandtotal = "";
    },
    submit: function submit() {
      var _this = this;
      // showLoading();

      this.$validator.validate().then(function (result) {
        var save = true;
        if (!result || !save) {
          // hideLoading();
          //set Window location to top
          window.scrollTo(0, 0);
        } else {
          _this.createOrder();
        }
      });
    },
    createOrder: function createOrder() {
      axios.post('/createorder', this.orderDetails).then(function (response) {
        if (response.status === 200) {
          showToastSuccess('Order has been created!');
          $('#myModal').modal('toggle');
          $('#invoiceModal').modal('toggle');
        }
      })["catch"](function (error) {
        alert('Cannot create order' + " " + error);
      });
    },
    showLoading: function (_showLoading) {
      function showLoading() {
        return _showLoading.apply(this, arguments);
      }
      showLoading.toString = function () {
        return _showLoading.toString();
      };
      return showLoading;
    }(function () {
      showLoading();
    })
  }
});

/***/ }),

/***/ 16:
/*!*************************************************!*\
  !*** multi ./resources/assets/js/home/index.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Sengs\OneDrive\Desktop\laravelvid\laravel-foodmenu\admin\resources\assets\js\home\index.js */"./resources/assets/js/home/index.js");


/***/ })

/******/ });