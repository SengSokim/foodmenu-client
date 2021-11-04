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

/***/ "./resources/assets/js/register/register.js":
/*!**************************************************!*\
  !*** ./resources/assets/js/register/register.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

new Vue({
  el: '#register',
  data: {
    data: {
      restaurant_name: '',
      phone_number: '',
      password: '',
      verify_code: ''
    }
  },
  methods: {
    submitVerify: function submitVerify() {
      var _this = this;

      showLoading();
      this.$validator.validate().then(function (result) {
        if (!result) {
          hideLoading(); //set Window location to top

          window.scrollTo(0, 0);
        } else {
          axios.post("api/auth/register/check_phone", _this.data).then(function (response) {
            hideLoading();

            if (response.data.success) {
              if (response.data.data.is_login) {
                $('#modalLogin').modal('show');
              } else {
                Vue.set(_this.data, 'verify_code', response.data.data.verify_code);
                $('#modalVerify').modal('show');
              }
            } else {
              showAlertError(response.data.message);
            }
          })["catch"](function (error) {
            hideLoading();
            showAlertError('Something went wrong');
          });
        }
      });
    },
    submitRegister: function submitRegister() {
      var _this2 = this;

      showLoading();
      this.$validator.validate().then(function (result) {
        if (!result) {
          hideLoading(); //set Window location to top

          window.scrollTo(0, 0);
        } else {
          axios.post("/api/auth/register", _this2.data).then(function (response) {
            if (response.data.success) {
              console.log(response.data.success);
              window.location.href = '/auth/login/get?phone_number=' + _this2.data.phone_number + '&password=' + _this2.data.password;
            } else {
              showAlertError(response.data.message);
              hideLoading();
            }
          })["catch"](function (error) {
            hideLoading();
            showAlertError('Something went wrong');
          });
        }
      });
    }
  }
});

/***/ }),

/***/ 7:
/*!********************************************************!*\
  !*** multi ./resources/assets/js/register/register.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\papa-deliver\e-menu\merchant\resources\assets\js\register\register.js */"./resources/assets/js/register/register.js");


/***/ })

/******/ });