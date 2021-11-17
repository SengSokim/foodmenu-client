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

/***/ "./resources/assets/js/product-categories/product-category.js":
/*!********************************************************************!*\
  !*** ./resources/assets/js/product-categories/product-category.js ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

new Vue({
  el: '#productCategory',
  data: {
    selected_id: null,
    product_categories: product_categories,
    data: {
      id: null,
      name: null,
      sequence: 0,
      enable_status: 1
    }
  },
  methods: {
    clearData: function clearData() {
      var _this = this;

      this.data = {
        id: null,
        name: '',
        sequence: 0,
        enable_status: 1
      };
      setTimeout(function () {
        _this.$validator.errors.remove('name');

        _this.$validator.errors.remove('sequence');
      }, 0);
    },
    setData: function setData(product_category) {
      this.clearData();
      this.data = Object.assign({}, {
        id: product_category.id,
        name: product_category.name_en,
        sequence: product_category.sequence,
        enable_status: product_category.enable_status
      });
    },
    save: function save() {
      var _this$data$id;

      showLoading();
      axios.post("/portal/product-categories/".concat((_this$data$id = this.data.id) !== null && _this$data$id !== void 0 ? _this$data$id : ''), this.data).then(function (response) {
        if (response.data.success) {
          hideLoading();
          window.location.href = '/portal/product-categories';
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        console.log(error);
        showAlertError('Cannot update product category');
      });
    },
    submit: function submit() {
      var _this2 = this;

      showLoading();
      this.$validator.validate().then(function (result) {
        var save = true;

        if (!result || !save) {
          hideLoading(); //set Window location to top

          window.scrollTo(0, 0);
        } else {
          _this2.save();
        }
      });
    },
    deleteCategory: function deleteCategory() {
      showLoading();
      axios["delete"]("/portal/product-categories/".concat(this.data.id)).then(function (response) {
        hideLoading();
        console.log(response.data);

        if (response.data.success) {
          window.location.href = '/portal/product-categories';
        } else {
          showAlertError(response.data.message);
        }
      })["catch"](function (error) {
        console.log(error);
        hideLoading();
        showAlertError('Cannot delete task');
      });
    }
  }
});

/***/ }),

/***/ 3:
/*!**************************************************************************!*\
  !*** multi ./resources/assets/js/product-categories/product-category.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\papa-deliver\e-menu\merchant\resources\assets\js\product-categories\product-category.js */"./resources/assets/js/product-categories/product-category.js");


/***/ })

/******/ });