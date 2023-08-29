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
/******/ 	return __webpack_require__(__webpack_require__.s = 21);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/static_notification/createNotificationRead.js":
/*!***************************************************************************!*\
  !*** ./resources/assets/js/static_notification/createNotificationRead.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var _static_notification$;
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
new Vue({
  el: '#createNotificationRead',
  data: {
    static_notification: static_notification.list,
    total: (_static_notification$ = static_notification.total) !== null && _static_notification$ !== void 0 ? _static_notification$ : 0,
    isLoading: false,
    is_show_more: true
  },
  methods: {
    showMoreList: function showMoreList() {
      if (this.static_notification.length >= this.total) {
        return;
      }
      this.isLoading = true;
      this.getMoreList();
    },
    getMoreList: function getMoreList() {
      var _this = this;
      axios.get("/admin/notification/more?offset=".concat(this.static_notification.length)).then(function (res) {
        if (res.data.success) {
          var _this$static_notifica;
          _this.isLoading = false;
          (_this$static_notifica = _this.static_notification).push.apply(_this$static_notifica, _toConsumableArray(res.data.data.list));
          _this.is_show_more = _this.static_notification.length === _this.total ? false : true;
        } else {
          console.log('response not success');
        }
      })["catch"](function (err) {
        _this.isLoading = false;
        console.log('response error');
      });
    },
    createNotificationRead: function createNotificationRead(list) {
      var url;
      switch (list.from_type) {
        // Feature Sale
        case 'App\\Models\\Sale':
          url = '/admin/sales/view/';
          break;
        case 'App\\Models\\SaleDocument':
          url = '/admin/sales/view/';
          break;
        case 'App\\Models\\SaleNote':
          url = '/admin/sales/view/';
          break;

        // Feature Cusomter
        case 'App\\Models\\Customer':
          url = '/admin/customers/view/';
          break;
        case 'App\\Models\\CustomerDocument':
          url = '/admin/customers/view/';
          break;
        case 'App\\Models\\CustomerNote':
          url = '/admin/customers/view/';
          break;

        // Feature Order
        case 'App\\Models\\Order':
          url = '/admin/orders/view/';
          break;
        case 'App\\Models\\OrderDocument':
          url = '/admin/orders/view/';
          break;
        case 'App\\Models\\OrderNote':
          url = '/admin/orders/view/';
          break;
        case 'App\\Models\\OrderImage':
          url = '/admin/orders/view/';
          break;
        default:
          url = null;
          break;
      }
      window.location.href = url + list.from_id;
      this.storeNotificationRead(list.id);
    },
    storeNotificationRead: function storeNotificationRead(id) {
      axios.post("/admin/notifications/create_notification_read", {
        static_notification_id: id
      }).then(function (response) {
        if (response.data.success) {
          console.log(response.data.success);
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Can not create notification!');
        console.log(error);
      });
    }
  }
});

/***/ }),

/***/ 21:
/*!*********************************************************************************!*\
  !*** multi ./resources/assets/js/static_notification/createNotificationRead.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\NU lessons\Year IV School Lessons\Theses\project\admin\resources\assets\js\static_notification\createNotificationRead.js */"./resources/assets/js/static_notification/createNotificationRead.js");


/***/ })

/******/ });