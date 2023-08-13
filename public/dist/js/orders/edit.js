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
/******/ 	return __webpack_require__(__webpack_require__.s = 18);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/orders/edit.js":
/*!********************************************!*\
  !*** ./resources/assets/js/orders/edit.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

app = new Vue({
  el: '#editOrder',
  data: {
    data: data,
    name: '',
    file: '',
    ext: '',
    is_select_type: false,
    is_required_type: false,
    is_required_file: false
  },
  methods: {
    selectType: function selectType(type) {
      this.data.type = type;
    },
    save: function save() {
      axios.post("/admin/orders/update/" + this.data.id, {
        customer_id: this.data.customer_id,
        total: this.data.total,
        type: this.data.type,
        note: this.data.note,
        file: this.file,
        ext: this.ext,
        name: this.name
      }).then(function (response) {
        if (response.data.success) {
          window.location.href = "/admin/orders/view/".concat(data.id);
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot edit order!');
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
    uploadFile: function uploadFile(event) {
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
          _this2.file = e.target.result;
          _this2.name = input.files[0].name.split('.').slice(0, -1).join('.');
          _this2.ext = input.files[0].name.substr(input.files[0].name.lastIndexOf('.') + 1);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  }
});

/***/ }),

/***/ 18:
/*!**************************************************!*\
  !*** multi ./resources/assets/js/orders/edit.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\NU lessons\Year IV School Lessons\Theses\project\admin\resources\assets\js\orders\edit.js */"./resources/assets/js/orders/edit.js");


/***/ })

/******/ });