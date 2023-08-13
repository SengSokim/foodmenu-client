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
/******/ 	return __webpack_require__(__webpack_require__.s = 17);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/orders/create.js":
/*!**********************************************!*\
  !*** ./resources/assets/js/orders/create.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

app = new Vue({
  el: '#createOrder',
  data: {
    customers: customers,
    sales: sales,
    products: products,
    data: {
      customer: {},
      customer_id: null,
      total: '',
      note: '',
      referral_payment_id: null,
      closed_payment_id: null,
      referral_sale_id: null,
      close_sale_id: null,
      commission: null,
      product_ids: []
    },
    name: '',
    file: '',
    ext: '',
    is_select_type: false,
    is_required_file: false,
    types: [{
      "type": "quotation",
      "name": "",
      "file": "",
      "ext": ""
    }, {
      "type": "invoice",
      "name": "",
      "file": "",
      "ext": ""
    }]
  },
  methods: {
    selectType: function selectType(type) {
      this.data.type = type;
    },
    save: function save() {
      axios.post("/admin/orders/store", {
        customer_id: this.data.customer.id,
        product_ids: this.data.product_ids,
        total: this.data.total,
        note: this.data.note,
        referral_sale_id: this.data.referral_sale_id,
        close_sale_id: this.data.close_sale_id,
        types: Object.assign({}, this.types)
      }).then(function (response) {
        if (response.data.success) {
          window.location.href = '/admin/orders/view/' + response.data.data.id;
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot add order!');
        console.log(error);
      });
    },
    submit: function submit() {
      var _this = this;
      showLoading();
      this.$validator.validate().then(function (result) {
        if (!_this.types[0].file && !_this.types[1].file) result = false;
        _this.is_required_file = !_this.types[0].file && !_this.types[1].file ? true : false;
        if (!result) {
          hideLoading();
          window.scrollTo(0, 0);
        } else {
          _this.save();
        }
      });
    },
    uploadFile: function uploadFile(event, index) {
      var _this2 = this;
      var input = event.target;
      if (input.files && input.files[0]) {
        var size = (input.files[0].size / 1024 / 1024).toFixed(2);
        if (size > 1) {
          showAlertError("Image size must be less than or equal to 1MB");
          return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
          _this2.types[index].file = e.target.result;
          _this2.types[index].name = input.files[0].name.split('.').slice(0, -1).join('.');
          _this2.types[index].ext = input.files[0].name.substr(input.files[0].name.lastIndexOf('.') + 1);
        };
        reader.readAsDataURL(input.files[0]);
      }
    },
    removeFile: function removeFile(index) {
      var _this3 = this;
      this.types.forEach(function (e, i) {
        if (index === i) {
          _this3.types[index].file = '';
          _this3.types[index].ext = '';
          _this3.types[index].name = '';
        }
      });
    },
    getGenerateData: function getGenerateData() {
      showLoading();
      if (this.data.customer.sale_id) {
        this.data.referral_sale_id = this.data.customer.sale_id;
        $('#referral_sale').val(this.data.customer.sale_id).trigger('change');
      } else {
        this.data.referral_sale_id = null;
        $('#referral_sale').val(null).trigger('change');
      }
      if (this.data.customer.closer_sale_id) {
        this.data.close_sale_id = this.data.customer.closer_sale_id;
        $('#close_sale').val(this.data.customer.closer_sale_id).trigger('change');
      } else {
        this.data.closed_payment_id = null;
        $('#close_sale').val(null).trigger('change');
      }
      hideLoading();
    }
  },
  watch: {
    'types': {
      handler: function handler(val) {
        this.is_required_file = val[0].file || val[1].file ? false : true;
      },
      deep: true
    }
  }
});

/***/ }),

/***/ 17:
/*!****************************************************!*\
  !*** multi ./resources/assets/js/orders/create.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\NU lessons\Year IV School Lessons\Theses\project\admin\resources\assets\js\orders\create.js */"./resources/assets/js/orders/create.js");


/***/ })

/******/ });