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

/***/ "./resources/assets/js/charts/chart.js":
/*!*********************************************!*\
  !*** ./resources/assets/js/charts/chart.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

new Vue({
  el: '#chart',
  data: {
    selected_month_year: null,
    selected_year: null,
    totalPerMonth: [],
    chart: [],
    monthYear: [],
    data: []
  },
  mounted: function mounted() {
    new Chart("saleChart", {
      type: "bar",
      data: {
        labels: [],
        datasets: [{
          label: 'ទឹកប្រាក់លក់បាន',
          backgroundColor: 'rgba(23,162,184,1)',
          fillColor: 'rgba(210, 214, 222, 1)',
          strokeColor: 'rgba(210, 214, 222, 1)',
          pointColor: 'rgba(210, 214, 222, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: []
        }]
      },
      options: {
        legend: {
          display: true
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
    new Chart("saleMonthly", {
      type: "bar",
      data: {
        labels: [],
        datasets: [{
          label: 'ទឹកប្រាក់លក់បានក្នុងមួយខែ',
          backgroundColor: 'rgba(40,167,69,1)',
          fillColor: 'rgba(210, 214, 222, 1)',
          strokeColor: 'rgba(210, 214, 222, 1)',
          pointColor: 'rgba(210, 214, 222, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: []
        }]
      },
      options: {
        legend: {
          display: true
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
  methods: {
    changeSaleDate: function changeSaleDate() {
      var _this = this;
      if (!this.selected_month_year) {
        $('#saleDivChart').html("\n                    <canvas id=\"saleChart\" style=\"width:100%; max-width: 100%\"></canvas>\n                ");
        return;
      }
      var monthYear = this.selected_month_year.split("-");
      var year = monthYear[0];
      var month = monthYear[1];
      if (this.chart[this.selected_month_year]) {
        this.setChart(this.chart[this.selected_month_year]);
        return;
      }
      showLoading();
      axios.get("/admin/dashboard/chart/".concat(year, "/").concat(month)).then(function (response) {
        hideLoading();
        if (response.data.success) {
          _this.chart[_this.selected_month_year] = response.data.data;
          _this.setChart(response.data.data);
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        console.log(error);
        showAlertError('Cannot get data');
      });
    },
    setChart: function setChart(data) {
      $('#saleDivChart').html("\n                <canvas id=\"saleChart\" style=\"width:100%; max-width: 100%\"></canvas>\n            ");
      new Chart("saleChart", {
        type: "bar",
        data: {
          labels: _.range(1, data.grand_total.length + 1),
          datasets: [{
            label: 'ទឹកប្រាក់លក់បាន',
            backgroundColor: 'rgba(23,162,184,1)',
            fillColor: 'rgba(210, 214, 222, 1)',
            strokeColor: 'rgba(210, 214, 222, 1)',
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: data.grand_total
          }]
        },
        options: {
          legend: {
            display: true
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    },
    changeSalePerMonth: function changeSalePerMonth() {
      var _this2 = this;
      if (!this.selected_year) {
        $('#MonthlySaleDiv').html("\n                    <canvas id=\"saleMonthly\" style=\"width:100%; max-width: 100%\"></canvas>\n                ");
        return;
      }
      var monthYear = this.selected_year.split("-");
      var year = monthYear[0];
      if (this.totalPerMonth[this.selected_year]) {
        this.monthlyChart(this.totalPerMonth[this.selected_year]);
        return;
      }
      showLoading();
      axios.get("/admin/dashboard/totalPerMonth/".concat(year)).then(function (response) {
        hideLoading();
        if (response.data.success) {
          _this2.totalPerMonth[_this2.selected_year] = response.data.data;
          _this2.monthlyChart(response.data.data);
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        console.log(error);
        showAlertError('Cannot get data');
      });
    },
    monthlyChart: function monthlyChart(data) {
      $('#MonthlySaleDiv').html("\n                <canvas id=\"saleMonthly\" style=\"width:100%; max-width: 100%\"></canvas>\n            ");
      new Chart("saleMonthly", {
        type: "bar",
        data: {
          labels: _.range(1, data.grand_total.length + 1),
          datasets: [{
            label: 'ទឹកប្រាក់លក់បានក្នុងមួយខែ',
            backgroundColor: 'rgba(40,167,69,1)',
            fillColor: 'rgba(210, 214, 222, 1)',
            strokeColor: 'rgba(210, 214, 222, 1)',
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: data.grand_total
          }]
        },
        options: {
          legend: {
            display: true
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    }
  }
});

/***/ }),

/***/ 12:
/*!***************************************************!*\
  !*** multi ./resources/assets/js/charts/chart.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Projects\Food Menu\admin\resources\assets\js\charts\chart.js */"./resources/assets/js/charts/chart.js");


/***/ })

/******/ });