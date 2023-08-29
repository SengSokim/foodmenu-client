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

/***/ "./resources/assets/js/sales/edit.js":
/*!*******************************************!*\
  !*** ./resources/assets/js/sales/edit.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

app = new Vue({
  el: '#editSale',
  data: {
    data: data,
    image: null,
    password: '',
    confirm_password: '',
    is_invalid_password: false,
    is_invalid_confirm_password: false,
    is_match: false,
    is_has_password: false,
    new_password: '',
    confirm_new_password: '',
    is_invalid_new_password: false,
    is_invalid_confirm_new_password: false,
    is_match_password: false
  },
  methods: {
    save: function save() {
      axios.post("/admin/sales/update/".concat(this.data.id), {
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
        image: this.image
      }).then(function (response) {
        if (response.data.success) {
          window.location.href = "/admin/sales/view/".concat(data.id);
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot edit sale!');
        console.log(error);
      });
    },
    submit: function submit() {
      var _this = this;
      showLoading();
      this.$validator.validate().then(function (result) {
        if (!_this.is_has_password) result = true;
        if (!result) {
          hideLoading();
          window.scrollTo(0, 0);
        } else {
          _this.save();
        }
      });
    },
    updatePassword: function updatePassword() {
      var _this2 = this;
      showLoading();
      axios.post("/admin/sales/update/password/".concat(this.data.id), {
        password: this.new_password
      }).then(function (response) {
        if (response.data.success) {
          _this2.new_password = '';
          _this2.confirm_new_password = '';
          hideLoading();
          $('#modal-update-password').modal('hide');
          showToastSuccess('Password was changed successfully!');
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot update password!');
        console.log(error);
      });
    },
    submitUpdatePassword: function submitUpdatePassword() {
      var _this3 = this;
      this.$validator.validate().then(function (result) {
        if (!_this3.new_password) result = false;
        _this3.is_invalid_new_password = !_this3.new_password ? true : false;
        if (!_this3.confirm_new_password) result = false;
        _this3.is_invalid_confirm_new_password = !_this3.confirm_new_password ? true : false;
        if (_this3.new_password && _this3.confirm_new_password) result = true;
        if (_this3.confirm_new_password && _this3.new_password) {
          if (_this3.confirm_new_password !== _this3.new_password) result = false;
          _this3.is_match_password = _this3.confirm_new_password !== _this3.new_password ? true : false;
        }
        if (!result) {
          hideLoading();
          window.scrollTo(0, 0);
        } else {
          _this3.updatePassword();
        }
      });
    }
  },
  mounted: function mounted() {
    var _this4 = this;
    $("#birthday").datetimepicker({
      orientation: 'bottom',
      format: "YYYY-MM-DD",
      autoclose: true
    });
    $("#birthday").on("change.datetimepicker", function () {
      _this4.data.birthday = $("#birthday_input").val();
    });
    $("#birthday").on("hide.datetimepicker", function () {
      _this4.data.birthday = $("#birthday_input").val();
    });
    $("#join_date").datetimepicker({
      orientation: 'bottom',
      format: "YYYY-MM-DD",
      autoclose: true
    });
    $("#join_date").on("change.datetimepicker", function () {
      _this4.data.join_date = $("#join_date_input").val();
    });
    $("#join_date").on("hide.datetimepicker", function () {
      _this4.data.join_date = $("#join_date_input").val();
    });
  }
});

/***/ }),

/***/ 9:
/*!*************************************************!*\
  !*** multi ./resources/assets/js/sales/edit.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\NU lessons\Year IV School Lessons\Theses\project\admin\resources\assets\js\sales\edit.js */"./resources/assets/js/sales/edit.js");


/***/ })

/******/ });