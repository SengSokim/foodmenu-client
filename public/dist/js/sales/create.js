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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/sales/create.js":
/*!*********************************************!*\
  !*** ./resources/assets/js/sales/create.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

app = new Vue({
  el: '#createSale',
  data: {
    data: {
      name: '',
      gender: '',
      phone: '',
      note1: '',
      note2: '',
      birthday: '',
      join_date: '',
      address: '',
      type: '',
      id_card_number: null,
      password: '',
      confirm_password: ''
    },
    image: '',
    is_invalid_password: false,
    is_invalid_confirm_password: false,
    is_match: false,
    is_has_password: true
  },
  methods: {
    save: function save() {
      axios.post("/admin/sales/store", {
        name: this.data.name,
        gender: this.data.gender,
        phone: this.data.phone,
        note1: this.data.note1,
        note2: this.data.note2,
        birthday: this.data.birthday,
        join_date: this.data.join_date,
        address: this.data.address,
        type: this.data.type,
        id_card_number: this.data.id_card_number,
        password: this.data.password,
        image: this.image
      }).then(function (response) {
        if (response.data.success) {
          window.location.href = '/admin/sales/view/' + response.data.data.id;
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot add sale!');
        console.log(error);
      });
    },
    submit: function submit() {
      var _this = this;
      showLoading();
      this.$validator.validate().then(function (result) {
        if (!_this.data.password) result = false;
        _this.is_invalid_password = !_this.data.password ? true : false;
        if (!_this.data.confirm_password) result = false;
        _this.is_invalid_confirm_password = !_this.data.confirm_password ? true : false;
        if (_this.data.confirm_password && _this.data.password) {
          if (_this.data.confirm_password !== _this.data.password) result = false;
          _this.is_match = _this.data.confirm_password !== _this.data.password ? true : false;
        }
        if (!result) {
          hideLoading();
          window.scrollTo(0, 0);
        } else {
          _this.save();
        }
      });
    }
  },
  watch: {
    'password': function password() {
      if (!this.data.password) this.is_invalid_password = true;
    },
    'confirm_password': function confirm_password() {
      if (!this.data.confirm_password) this.is_invalid_confirm_password = true;
    }
  },
  mounted: function mounted() {
    var _this2 = this;
    $("#birthday").datetimepicker({
      orientation: 'bottom',
      format: "YYYY-MM-DD",
      autoclose: true
    });
    $("#birthday").on("change.datetimepicker", function () {
      _this2.data.birthday = $("#birthday_input").val();
    });
    $("#birthday").on("hide.datetimepicker", function () {
      _this2.data.birthday = $("#birthday_input").val();
    });
    $("#join_date").datetimepicker({
      orientation: 'bottom',
      format: "YYYY-MM-DD",
      autoclose: true
    });
    $("#join_date").on("change.datetimepicker", function () {
      _this2.data.join_date = $("#join_date_input").val();
    });
    $("#join_date").on("hide.datetimepicker", function () {
      _this2.data.join_date = $("#join_date_input").val();
    });
  }
});

/***/ }),

/***/ 8:
/*!***************************************************!*\
  !*** multi ./resources/assets/js/sales/create.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\NU lessons\Year IV School Lessons\Theses\project\admin\resources\assets\js\sales\create.js */"./resources/assets/js/sales/create.js");


/***/ })

/******/ });