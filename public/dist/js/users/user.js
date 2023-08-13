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
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/users/user.js":
/*!*******************************************!*\
  !*** ./resources/assets/js/users/user.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

Users = new Vue({
  el: "#Users",
  data: {
    image: null,
    error: {
      image: null
    },
    restaurant_users: restaurant_users,
    data: {
      id: '',
      name: '',
      gender: null,
      phone_number: '',
      password: '',
      address: null,
      role: null,
      image: null,
      enable_status: true
    }
  },
  methods: {
    clearData: function clearData() {
      var _this = this;
      this.data = {
        id: '',
        name: '',
        gender: null,
        phone_number: '',
        password: '',
        address: null,
        role: null,
        image: null,
        enable_status: true
      };
      setTimeout(function () {
        // this.$validator.errors.remove('name');
        _this.$validator.errors.clear();
        _this.error.image = '';
      }, 0);
    },
    setData: function setData(restaurant_users) {
      console.log(restaurant_users);
      this.data = Object.assign({}, {
        id: restaurant_users.id,
        name: restaurant_users.name,
        gender: restaurant_users.gender,
        phone_number: restaurant_users.phone_number,
        password: restaurant_users.password,
        address: restaurant_users.address,
        role: restaurant_users.role,
        media: restaurant_users.media,
        enable_status: restaurant_users.enable_status
      });
    },
    save: function save() {
      var _this2 = this;
      showLoading();
      var url = '/admin/users/';
      if (this.data.id) {
        url += this.data.id;
      }
      axios.post(url, this.data).then(function (response) {
        if (response.data.success) {
          window.location.href = '/admin/users';
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        console.log(error);
        if (_this2.data.id) {
          showAlertError('Cannot update user');
        } else {
          showAlertError('Cannot create user');
        }
      });
    },
    submit: function submit() {
      var _this3 = this;
      showLoading();
      this.$validator.validate().then(function (result) {
        var save = true;
        if (!_this3.data.id && !_this3.data.image) {
          _this3.error.image = 'The Image field is required.';
          save = false;
        }
        if (!result || !save) {
          hideLoading();
          //set Window location to top
          window.scrollTo(0, 0);
        } else {
          _this3.save();
        }
      });
    },
    uploadImage: function uploadImage(event) {
      var _this4 = this;
      var input = event.target;
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          _this4.data.image = e.target.result;
          _this4.error.image = null;
        };
        reader.readAsDataURL(input.files[0]);
      }
    },
    deleteUser: function deleteUser() {
      showLoading();
      axios["delete"]("/admin/users/".concat(this.data.id)).then(function (response) {
        hideLoading();
        console.log(response.data);
        if (response.data.success) {
          window.location.href = '/admin/users';
        } else {
          showAlertError(response.data.message);
        }
      })["catch"](function (error) {
        console.log(error);
        hideLoading();
        showAlertError();
      });
    }
  }
});

/***/ }),

/***/ 10:
/*!*************************************************!*\
  !*** multi ./resources/assets/js/users/user.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Projects\Food Menu\admin\resources\assets\js\users\user.js */"./resources/assets/js/users/user.js");


/***/ })

/******/ });