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
/******/ 	return __webpack_require__(__webpack_require__.s = 9);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/users/user.js":
/*!*******************************************!*\
  !*** ./resources/assets/js/users/user.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var Users = new Vue({
  el: "#users",
  data: {
    image: null,
    error: {
      image: null
    },
    data: {
      username: '',
      gender: null,
      phone_number: '',
      password: '',
      description: null,
      roles: null,
      image: null,
      enable_status: true
    }
  },
  // roles: roles,
  methods: {
    save: function save() {
      console.log("data: ", this.data);
      axios.post("".concat(baseURL, "/users"), this.data).then(function (response) {
        console.log("response: ", response.data);

        if (response.data.success) {
          window.location.href = baseURL + '/users';
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Can not add user');
        console.log(error);
      });
    },
    submit: function submit() {
      var _this = this;

      showLoading();
      this.$validator.validate().then(function (result) {
        var save = true;

        if (!_this.data.image) {
          _this.error.image = 'The Image field is required.';
          save = false;
        }

        if (!result || !save) {
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
    removeRole: function removeRole(removeRoleId) {
      var i = 0;
      var length = this.data.roles.length;

      for (i; i < length; i++) {
        if (this.data.roles[i] == removeRoleId) {
          this.data.roles.splice(i, 1);
          break;
        }
      }
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

/***/ }),

/***/ 9:
/*!*************************************************!*\
  !*** multi ./resources/assets/js/users/user.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\papa-deliver\e-menu\merchant\resources\assets\js\users\user.js */"./resources/assets/js/users/user.js");


/***/ })

/******/ });