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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/restaurants/edit.js":
/*!*************************************************!*\
  !*** ./resources/assets/js/restaurants/edit.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

EditRestaurant = new Vue({
  el: '#editRestaurant',
  data: {
    image: null,
    banner_image: null,
    error: {
      image: null,
      banner_image: null
    },
    data: {},
    share_link: ''
  },
  methods: {
    save: function save() {
      axios.post("/portal/restaurants", this.data).then(function (response) {
        if (response.data.success) {
          window.location.href = '/portal/products';
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        console.log(error);
        showAlertError('Cannot update restaurant');
      });
    },
    submit: function submit() {
      var _this = this;

      console.log('test');
      showLoading();
      this.$validator.validate().then(function (result) {
        var save = true;

        if (!result || !save) {
          hideLoading(); //set Window location to top

          window.scrollTo(0, 0);
        } else {
          _this.save();
        }
      });
    },
    copySharableLink: function copySharableLink() {
      var el = document.querySelector('#share-link');
      el.setAttribute('type', 'text'); // 不是 hidden 才能複製

      el.select();

      try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';
        alert('Link copied ' + msg);
      } catch (err) {
        alert('Oops, unable to copy');
      }
      /* unselect the range */


      el.setAttribute('type', 'hidden');
      window.getSelection().removeAllRanges();
    },
    showRestaurant: function showRestaurant() {
      var _this2 = this;

      this.data = {};
      axios.get("/portal/restaurants").then(function (response) {
        if (response.data.success) {
          _this2.data = response.data.data;
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        console.log(error);
      });
    },
    uploadProfile: function uploadProfile() {
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
    uploadBanner: function uploadBanner() {
      var _this4 = this;

      var input = event.target;

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          _this4.data.banner_image = e.target.result;
          _this4.error.banner_image = null;
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
  }
});

/***/ }),

/***/ 4:
/*!*******************************************************!*\
  !*** multi ./resources/assets/js/restaurants/edit.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\papa-deliver\e-menu\merchant\resources\assets\js\restaurants\edit.js */"./resources/assets/js/restaurants/edit.js");


/***/ })

/******/ });