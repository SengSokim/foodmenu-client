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
/******/ 	return __webpack_require__(__webpack_require__.s = 12);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/chart/chart.js":
/*!********************************************!*\
  !*** ./resources/assets/js/chart/chart.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

new Vue({
  el: '#chart',
  data: {
    daily_order: daily_order,
    monthly_order: monthly_order
  },
  methods: {
    filterConfirmedOrder: function filterConfirmedOrder(yearAndMonth) {
      var _this = this;
      showLoading();
      var monthYear = yearAndMonth.split("-");
      var y = monthYear[0];
      var m = monthYear[1];
      axios.get("/admin/chart/daily_order/".concat(y, "/").concat(m)).then(function (response) {
        if (response.data.success) {
          hideLoading();
          _this.OrderChart(response.data.data.total, "confirmed_order");
          console.log(response.data.data.total);
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot get data confirmed order!');
        console.log(error);
      });
    },
    filterPendingOrder: function filterPendingOrder(yearAndMonth) {
      var _this2 = this;
      showLoading();
      var monthYear = yearAndMonth.split("-");
      var y = monthYear[0];
      var m = monthYear[1];
      axios.get("/admin/chart/monthly_order/".concat(y, "/").concat(m)).then(function (response) {
        if (response.data.success) {
          hideLoading();
          _this2.OrderChart(response.data.data.total, "pending_order");
          console.log(response.data.data.total);
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot get data pending order!');
        console.log(error);
      });
    },
    OrderChart: function OrderChart(val, check_type) {
      new Chart(check_type, {
        type: "bar",
        data: {
          labels: _.range(1, val.length + 1),
          datasets: [{
            label: '',
            backgroundColor: 'rgb(18,44,75)',
            data: val
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              },
              scaleLabel: {
                display: false
              }
            }]
          },
          legend: {
            display: false,
            labels: {
              fontColor: '#122C4B',
              fontFamily: "'Muli', sans-serif",
              padding: 25,
              boxWidth: 25,
              fontSize: 14
            }
          }
        }
      });
    }
  },
  mounted: function mounted() {
    // $("#filter_date_confirmed_order").datetimepicker({
    //     defaultDate: new Date(),
    //     orientation: 'bottom',
    //     format: 'yyyy-MM',
    //     autoclose: true,
    //     viewMode: 'months',
    //     dateFormat: 'MM yy',
    //     changeMonth: true,
    //     changeYear: true,
    //     showButtonPanel: true,
    // }),
    // $("#filter_date_confirmed_order").on("change.datetimepicker", (e) => {
    //     this.filterConfirmedOrder($('#filter_date_confirmed_order_input').val());
    // });

    // $("#filter_date_pending_order").datetimepicker({
    //     defaultDate: new Date(),
    //     orientation: 'bottom',
    //     format: 'yyyy-MM',
    //     autoclose: true,
    //     viewMode: 'months',
    //     dateFormat: 'MM yy',
    //     changeMonth: true,
    //     changeYear: true,
    //     showButtonPanel: true,
    // }),
    // $("#filter_date_pending_order").on("change.datetimepicker", (e) => {
    //     this.filterPendingOrder($('#filter_date_pending_order_input').val());
    // });

    new Chart("daily_order", {
      type: "line",
      data: {
        labels: _.range(1, this.daily_order.length + 1),
        datasets: [{
          label: '',
          backgroundColor: 'rgb(18,44,75)',
          data: this.daily_order
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            scaleLabel: {
              display: false
            }
          }]
        },
        legend: {
          display: false,
          labels: {
            fontColor: '#122C4B',
            fontFamily: "'Muli', sans-serif",
            padding: 25,
            boxWidth: 25,
            fontSize: 14
          }
        }
      }
    });
    new Chart("monthly_order", {
      type: "bar",
      data: {
        labels: _.range(1, this.monthly_order.length + 1),
        datasets: [{
          label: '',
          backgroundColor: 'rgb(18,44,75)',
          data: this.monthly_order
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            scaleLabel: {
              display: false
            }
          }]
        },
        legend: {
          display: false,
          labels: {
            fontColor: '#122C4B',
            fontFamily: "'Muli', sans-serif",
            padding: 25,
            boxWidth: 25,
            fontSize: 14
          }
        }
      }
    });
  }
});

/***/ }),

/***/ 12:
/*!**************************************************!*\
  !*** multi ./resources/assets/js/chart/chart.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Projects\Food Menu\admin\resources\assets\js\chart\chart.js */"./resources/assets/js/chart/chart.js");


/***/ })

/******/ });