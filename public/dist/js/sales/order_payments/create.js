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
/******/ 	return __webpack_require__(__webpack_require__.s = 12);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/sales/order_payments/create.js":
/*!************************************************************!*\
  !*** ./resources/assets/js/sales/order_payments/create.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

app = new Vue({
  el: '#createSaleOrderPayment',
  data: {
    data: {
      order_ids: [],
      sale_id: sale_id,
      commission: null
    },
    image: '',
    orders: orders,
    is_select_all: false
  },
  methods: {
    save: function save() {
      axios.post("/admin/sales/order_payment/create/" + this.data.sale_id, {
        order_ids: this.data.order_ids,
        sale_id: this.data.sale_id,
        commission: this.data.commission,
        payment_image: this.image
      }).then(function (response) {
        if (response.data.success) {
          window.location.href = '/admin/payment_histories/view/' + response.data.data.id;
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot add order payment!');
        console.log(error);
      });
    },
    submit: function submit() {
      var _this = this;
      showLoading();
      this.$validator.validate().then(function (result) {
        if (!result) {
          hideLoading();
          window.scrollTo(0, 0);
        } else {
          _this.save();
        }
      });
    },
    selectAllOrderIds: function selectAllOrderIds() {
      var _this2 = this;
      if ($("#all_orders").is(":checked")) {
        this.orders.orders.forEach(function (e) {
          _this2.data.order_ids.push(e.id);
        });
      } else {
        this.data.order_ids = [];
      }
    },
    uploadImage: function uploadImage(event, param) {
      var _this3 = this;
      var input = event.target;
      if (input.files && input.files[0]) {
        var size = (input.files[0].size / 1024 / 1024).toFixed(2);
        if (size <= 1) {
          var reader = new FileReader();
          reader.onload = function (e) {
            switch (param) {
              case 'commission':
                _this3.image = e.target.result;
                break;
            }
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    }
  }
});

/***/ }),

/***/ 12:
/*!******************************************************************!*\
  !*** multi ./resources/assets/js/sales/order_payments/create.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\NU lessons\Year IV School Lessons\Theses\project\admin\resources\assets\js\sales\order_payments\create.js */"./resources/assets/js/sales/order_payments/create.js");


/***/ })

/******/ });