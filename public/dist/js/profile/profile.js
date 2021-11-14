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

/***/ "./resources/assets/js/profile.js":
/*!****************************************!*\
  !*** ./resources/assets/js/profile.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

editProfile = new Vue({
  el: '#editProfile',
  data: {
    error: {
      image: null
    },
    data: {}
  },
  methods: {
    save: function save() {
      axios.post("/portal/profile", this.data).then(function (response) {
        if (response.data.success) {
          window.location.href = '/portal/products';
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot update profile');
        console.log(error);
      });
    },
    submit: function submit() {
      var _this = this;

      showLoading();
      this.$validator.validate().then(function (result) {
        if (!result) {
          hideLoading(); //set Window location to top

          window.scrollTo(0, 0);
        } else {
          _this.save();
        }
      });
    },
    uploadImage: function uploadImage(event) {
      var _this2 = this;

      var input = event.target;

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          _this2.data.image = e.target.result;
          _this2.error.image = null;
        };

        reader.readAsDataURL(input.files[0]);
      }
    },
    viewProfile: function viewProfile() {
      var _this3 = this;

      this.data = {};
      setTimeout(function () {
        _this3.$validator.errors.clear();

        _this3.error.image = '';
      }, 0);
      axios.get("/portal/profile").then(function (response) {
        if (response.data.success) {
          _this3.data = response.data.data;
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        console.log(error);
      });
    }
  },
  created: function created() {
    this.$validator.extend('phone_number', {
      getMessage: function getMessage(field) {
        return 'The ' + field + ' field contains an invalid number.';
      },
      validate: function validate(value) {
        return new Promise(function (resolve) {
          var phone = new PhoneNumber(value, 'kh');
          resolve({
            valid: phone.isValid()
          });
        });
      }
    });
  }
});
updatePassword = new Vue({
  el: '#updatePassword',
  data: {
    data: {
      old_password: '',
      password: '',
      confirm_password: ''
    }
  },
  methods: {
    save: function save() {
      axios.post("/portal/profile/change_password", this.data).then(function (response) {
        if (response.data.success) {
          window.location.href = '/portal/products';
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot update profile');
        console.log(error);
      });
    },
    submit: function submit() {
      var _this4 = this;

      showLoading();
      this.$validator.validate().then(function (result) {
        if (!result) {
          hideLoading(); //set Window location to top

          window.scrollTo(0, 0);
        } else {
          if (_this4.data.password == _this4.data.confirm_password) {
            _this4.save();
          } else {
            showAlertError('The confirm password is not match!');
            hideLoading(); //set Window location to top

            window.scrollTo(0, 0);
          }
        }
      });
    }
  }
});

/***/ }),

/***/ 5:
/*!**********************************************!*\
  !*** multi ./resources/assets/js/profile.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\Work Project\emenu\merchant\resources\assets\js\profile.js */"./resources/assets/js/profile.js");


/***/ })

/******/ });