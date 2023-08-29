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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/products/product.js":
/*!*************************************************!*\
  !*** ./resources/assets/js/products/product.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

app = new Vue({
  el: '#product',
  data: {
    image: null,
    error: {
      image: null
    },
    product_categories: product_categories,
    products: products,
    total: 0,
    data: {
      id: null,
      code: '',
      name: '',
      price: 0,
      sequence: 0,
      enable_status: 1,
      category_id: null,
      description: '',
      image: null
    },
    product_category_selected: undefined,
    product_category_id: null,
    is_loaded_product: 0,
    isLoading: 0
    // search: search
  },
  mounted: function mounted() {
    this.init();
  },
  methods: {
    showMore: function showMore() {
      if (this.products.length >= this.total) {
        return;
      }
      this.init();
    },
    init: function init() {
      if (this.isLoading) {
        return;
      }
      // showLoading()
      // this.isLoading = true;
      // axios.get(`/admin/products/get?search=${this.search}&limit=24&offset=${this.products.length}`
      //     ).then(response => {
      //         this.isLoading = false;
      //         this.is_loaded_product =1

      //     if (response.data.success) {
      //         hideLoading()
      //         this.products.push(...response.data.data.list);
      //         this.total = response.data.data.total;
      //     } else {
      //         console.log('response not success');
      //     }
      // }).catch(err => {
      //     this.isLoading = false;
      //     hideLoading()
      // })
    },
    formatCurrency: function formatCurrency(money) {
      switch (restaurant.currency_code) {
        case 'khr':
          return number_format(money, 0, '', ',') + ' ៛';
        default:
          return '$' + number_format(money, 2, '.', ',');
      }
    },
    save: function save() {
      var _this$data$id;
      // showLoading();
      axios.post("/admin/products/".concat((_this$data$id = this.data.id) !== null && _this$data$id !== void 0 ? _this$data$id : ''), this.data).then(function (response) {
        if (response.data.success) {
          window.location.href = '/admin/products';
        } else {
          alert(response.data.message.code[0]);
          // hideLoading()
        }
      })["catch"](function (error) {
        // hideLoading();
        // showAlertError('Cannot update product');
      });
    },
    submit: function submit() {
      var _this = this;
      // showLoading();

      this.$validator.validate().then(function (result) {
        var save = true;
        if (!_this.data.id && !_this.data.image) {
          _this.error.image = 'The Image field is required.';
          save = false;
        }
        if (!result || !save) {
          // hideLoading();
          //set Window location to top
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
    clearData: function clearData() {
      var _this3 = this;
      this.data = {
        id: null,
        code: '',
        name: '',
        price: 0,
        sequence: 0,
        enable_status: 1,
        category_id: null,
        description: '',
        image: null
      };
      setTimeout(function () {
        // this.$validator.errors.remove('name');
        _this3.$validator.errors.clear();
        _this3.error.image = '';
      }, 0);
    },
    setData: function setData(product) {
      this.data = Object.assign({}, {
        id: product.id,
        code: product.code,
        name: product.name,
        category_id: product.category.id,
        price: product.price,
        sequence: product.sequence,
        enable_status: product.enable_status,
        media: product.media,
        description: product.description
      });
      $("#product_category").select2();
      $('.product-category-select2').val(product.category_id ? product.category_id : null).trigger('change');
    },
    updateProductStatus: function updateProductStatus(value) {
      // showLoading();
      axios.post("/admin/products/status/".concat(this.data.id), {
        enable_status: value
      }).then(function (response) {
        if (response.data.success) {
          window.location.href = '/admin/products';
        } else {
          // alert('Error')
          // showAlertError(response.data.message);
          // hideLoading();
        }
      })["catch"](function (error) {
        alert('Cannot update product');
        // hideLoading();
        // showAlertError('');
      });
    },
    deleteProduct: function deleteProduct() {
      axios["delete"]("/admin/products/".concat(this.data.id)).then(function (response) {
        // hideLoading();
        if (response.data.success) {
          window.location.href = '/admin/products';
        } else {
          alert(response.data.message);
          // showAlertError(response.data.message);
        }
      })["catch"](function (error) {
        alert('Cannot delete product');
        // hideLoading();
        // showAlertError('Cannot delete product');
      });
    },
    copy: function copy(text) {
      showToastSuccess("Link copied successfully");
      if (window.clipboardData && window.clipboardData.setData) {
        // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
        return window.clipboardData.setData("Text", text);
      } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
          return document.execCommand("copy"); // Security exception may be thrown by some browsers.
        } catch (ex) {
          console.warn("Copy to clipboard failed.", ex);
          return false;
        } finally {
          document.body.removeChild(textarea);
        }
      }
    }
  },
  computed: {
    resultQuery: function resultQuery() {
      var vm = this,
        lists = vm.products;
      return _.filter(lists, function (query) {
        var product_category = vm.category_ids ? query.category_ids == vm.category_ids : true;
        return product_category;
      });
    }
  }
});

/***/ }),

/***/ 7:
/*!*******************************************************!*\
  !*** multi ./resources/assets/js/products/product.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Sengs\OneDrive\Desktop\laravelvid\laravel-foodmenu\admin\resources\assets\js\products\product.js */"./resources/assets/js/products/product.js");


/***/ })

/******/ });