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
/******/ 	return __webpack_require__(__webpack_require__.s = 24);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/quotations/edit.js":
/*!************************************************!*\
  !*** ./resources/assets/js/quotations/edit.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

app = new Vue({
  el: "#editQuotation",
  data: {
    sales: sales,
    data: data,
    is_lock: true,
    is_english: true,
    is_english_tc: false
  },
  mounted: function mounted() {
    $("#quotation_date").datetimepicker({
      orientation: 'bottom',
      format: 'YYYY-MM-DD',
      autoclose: true,
      maxDate: date
    });
  },
  watch: {
    'data.price': function dataPrice() {
      if (!this.is_lock) {
        this.getDescription();
      }
    },
    'data.sale_id': function dataSale_id() {
      this.getSeller();
    },
    'data.is_show_money_no_vat_on_print': function dataIs_show_money_no_vat_on_print() {
      this.getTermCondition();
    }
  },
  methods: {
    getSeller: function getSeller() {
      var _this = this;
      if (this.data.sale_id) {
        this.sales.forEach(function (sale) {
          if (_this.data.sale_id == sale.id) {
            _this.data.seller = sale.name;
          }
        });
      }
    },
    getDescription: function getDescription() {
      if (this.is_lock) {
        return;
      }
      if (this.is_english) {
        this.data.descript = "\nService fee 12 month for staff attendance system at ".concat(this.data.campus_amount, " locations\n    - USD ").concat(this.data.price, " x ").concat(this.data.campus_amount, " = USD ").concat(this.data.price * this.data.campus_amount, "\n    - Installation fee: FREE\n    - QR Code device fee: FREE\n    - Get ADMIN SYSTEM, MOBILE APP, TELEGRAMBOT\n    - Applying for leave through the app, Applying for OT\n\nSpecial Offer \u17D6\n    - You can request a refund of the service fee when you are not satisfied within 30 days after the invoice date.");
        return;
      }
      this.data.descript = "\n\u1790\u17D2\u179B\u17C3\u179F\u17C1\u179C\u17B6\u1780\u1798\u17D2\u1798\u1794\u17D2\u179A\u1796\u17D0\u1793\u17D2\u1792\u179F\u17D2\u179A\u1784\u17CB\u179C\u178F\u17D2\u178F\u1798\u17B6\u1793\u1794\u17BB\u1782\u17D2\u1782\u179B\u17B7\u1780\u179A\u1799\u17C8\u1796\u17C1\u179B \u17E1\u17E2 \u1781\u17C2 \u1785\u17C6\u1793\u17BD\u1793 ".concat(this.data.campus_amount, " \u1791\u17B8\u178F\u17B6\u17C6\u1784\n    -\u200B USD ").concat(this.data.price, " x ").concat(this.data.campus_amount, " = USD ").concat(this.data.price, "\n    - \u1790\u17D2\u179B\u17C3\u178F\u17C6\u17A1\u17BE\u1784\u200B \u17D6 FREE\n    - \u1790\u17D2\u179B\u17C3\u17A7\u1794\u1780\u179A\u178E\u17CD QR \u1780\u17BC\u178A \u17D6 \u200B\u200B\u200B\u200B\u200BFREE\n    - \u1791\u1791\u17BD\u179B\u1794\u17B6\u1793 ADMIN SYSTEM, MOBILE APP, TELEGRAMBOT\n    - \u1798\u17BB\u1781\u1784\u17B6\u179A\u179F\u17C6\u1785\u17D2\u1794\u17B6\u1794\u17CB\u178F\u17B6\u1798 App\n\n\u1780\u17B6\u179A\u1795\u17D2\u178F\u179B\u17CB\u1787\u17BC\u1793\u1796\u17B7\u179F\u17C1\u179F \u17D6\n    - \u17A2\u17B6\u1785\u179F\u17D2\u1793\u17BE\u179F\u17BB\u17C6\u178A\u1780\u1799\u1780\u1790\u17D2\u179B\u17C3\u179F\u17C1\u179C\u17B6\u1780\u1798\u17D2\u1798\u179C\u17B7\u1789\u1794\u17B6\u1793 \u1796\u17C1\u179B\u178A\u17C2\u179B\u1798\u17B7\u1793\u1796\u17C1\u1789\u1785\u17B7\u178F\u17D2\u178F\u179A\u1799\u17C8\u1796\u17C1\u179B \u17E3\u17E0\u1790\u17D2\u1784\u17C3 \u1794\u1793\u17D2\u1791\u17B6\u1794\u17CB\u1796\u17B8\u1790\u17D2\u1784\u17C3\u1785\u17C1\u1789\u179C\u17B7\u1780\u17D0\u1799\u1794\u17D0\u178F\u17D2\u179A");
    },
    getTermCondition: function getTermCondition() {
      if (this.is_english_tc) {
        this.data.term_condition = "\n1. 12 month technology warranty\n2. 12 months maintenance warranty\n3. Payment: 50% upon registration and 50% upon installation\n4. No additional fees or other charges\n".concat(this.data.is_show_money_no_vat_on_print ? '5. This amount does not includes VAT' : '');
        return;
      }
      this.data.term_condition = "\n1. \u1780\u17B6\u179A\u1792\u17B6\u1793\u17B6\u179B\u17BE\u1794\u1785\u17D2\u1785\u17C1\u1780\u179C\u17B7\u1791\u17D2\u1799\u17B6\u179A\u1799\u17C8\u1796\u17C1\u179B 12 \u1781\u17C2\n2. \u1780\u17B6\u179A\u1792\u17B6\u1793\u17B6\u179B\u17BE\u1780\u17B6\u179A\u1790\u17C2\u1791\u17B6\u17C6\u179A\u1799\u17C8\u1796\u17C1\u179B 12 \u1781\u17C2\n3. \u1780\u17B6\u179A\u1794\u1784\u17CB\u1794\u17D2\u179A\u17B6\u1780\u17CB\u17D6 50% \u1796\u17C1\u179B\u1785\u17BB\u17C7\u1788\u17D2\u1798\u17C4\u17C7 \u1793\u17B7\u1784 50% \u1796\u17C1\u179B\u178F\u17C6\u17A1\u17BE\u1784\u179A\u17BD\u1785\u179A\u17B6\u179B\u17CB\n4. \u1798\u17B7\u1793\u1782\u17B7\u178F\u1790\u17D2\u179B\u17C3\u179F\u17C1\u179C\u17B6\u1794\u1793\u17D2\u1790\u17C2\u1798 \u17AC\u1780\u17B6\u179A\u1794\u1784\u17CB\u1794\u17D2\u179A\u17B6\u1780\u17CB\u1795\u17D2\u179F\u17C1\u1784\u1791\u17C0\u178F\u1791\u17C1\n".concat(this.data.is_show_money_no_vat_on_print ? '5. ចំនួនទឹកប្រាក់នេះ មិនរាប់បញ្ចូល VAT' : '');
    },
    save: function save() {
      var _this2 = this;
      axios.post('/admin/quotations/update/' + this.data.id, this.data).then(function (res) {
        if (res.data.success) {
          window.location.href = '/admin/quotations';
        } else {
          showAlertError(res.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        console.log(_this2.data);
        hideLoading();
        showAlertError('Can not update quotation');
        console.log(error);
      });
    },
    submit: function submit() {
      var _this3 = this;
      showLoading();
      this.$validator.validate().then(function (result) {
        var save = true;
        if (!result || !save) {
          hideLoading();
          //set Window location to top
          window.scrollTo(0, 0);
        } else {
          _this3.save();
        }
      });
    }
  }
});

/***/ }),

/***/ 24:
/*!******************************************************!*\
  !*** multi ./resources/assets/js/quotations/edit.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\NU lessons\Year IV School Lessons\Theses\project\admin\resources\assets\js\quotations\edit.js */"./resources/assets/js/quotations/edit.js");


/***/ })

/******/ });