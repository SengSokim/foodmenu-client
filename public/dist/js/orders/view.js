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
/******/ 	return __webpack_require__(__webpack_require__.s = 19);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/orders/view.js":
/*!********************************************!*\
  !*** ./resources/assets/js/orders/view.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

app = new Vue({
  el: '#viewOrder',
  data: {
    document: {
      id: null,
      name: '',
      type: '',
      file: '',
      ext: '',
      note: ''
    },
    order: {
      id: null,
      note: '',
      status: ''
    },
    price: {
      total: null,
      note: ''
    },
    upload_new_file: {
      types: [{
        "type": "quotation",
        "name": "",
        "file": "",
        "ext": ""
      }, {
        "type": "invoice",
        "name": "",
        "file": "",
        "ext": ""
      }],
      is_required_file: false
    },
    type: {
      quatation: null,
      invoice: null
    },
    data: data,
    notes: notes.reverse(),
    documents: documents.reverse(),
    is_show_invalid: false,
    is_update_order_note: false,
    is_update_order_document: false,
    is_show_form_note: false,
    is_show_form_document: false
  },
  methods: {
    // document
    hideModalDocument: function hideModalDocument() {
      this.is_show_form_document = false;
      this.is_show_invalid = false;
      this.hideFormOrderDocument();
      $('#modal_order_document').modal('hide');
    },
    pushTypeValue: function pushTypeValue(item) {
      $('#typ_value').val(item);
      this.document.type = item;
    },
    uploadOrderDocument: function uploadOrderDocument(event) {
      var _this = this;
      var input = event.target;
      if (input.files && input.files[0]) {
        var size = (input.files[0].size / 1024 / 1024).toFixed(2);
        if (size <= 1) {
          var reader = new FileReader();
          reader.onload = function (e) {
            _this.document.file = e.target.result;
            _this.document.name = input.files[0].name.split('.').slice(0, -1).join('.');
            _this.document.ext = input.files[0].name.substr(input.files[0].name.lastIndexOf('.') + 1);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    },
    // Hide form create document for order
    hideFormOrderDocument: function hideFormOrderDocument() {
      this.document = {
        id: null,
        name: '',
        type: '',
        file: '',
        ext: '',
        note: ''
      };
      $('#file_name').val('');
      this.is_show_form_document = false;
      this.is_show_invalid = false;
    },
    // save document
    createOrderDocument: function createOrderDocument() {
      var _this2 = this;
      axios.post("/admin/orders/documents/store/".concat(this.data.id), this.document).then(function (response) {
        if (response.data.success) {
          hideLoading();
          _this2.is_show_form_document = false;
          _this2.hideFormOrderDocument();
          documents.unshift(response.data.data);
          showToastSuccess('Document was created successfully!');
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot add document');
        console.log(error);
      });
    },
    submitOrderDocument: function submitOrderDocument() {
      var _this3 = this;
      showLoading();
      this.$validator.validate().then(function (result) {
        result = _this3.document.file && _this3.document.name && _this3.document.type ? true : false;
        if (!result) {
          _this3.is_show_invalid = true;
          hideLoading();
          window.scrollTo(0, 0);
        } else {
          _this3.createOrderDocument();
        }
      });
    },
    // Show document
    showOrderDocument: function showOrderDocument(item) {
      this.is_update_order_document = true;
      this.document = Object.assign({}, item);
      $("#file_name").val(item.name + '.' + item.ext);
      this.is_show_form_document = true;
    },
    // Update document
    updateOrderDocument: function updateOrderDocument() {
      var _this4 = this;
      showLoading();
      axios.post("/admin/orders/documents/update/".concat(this.data.id), this.document).then(function (response) {
        if (response.data.success) {
          hideLoading();
          documents[documents.findIndex(function (item) {
            return item.id === response.data.data.id;
          })] = response.data.data;
          showToastSuccess('Document was updated successfully!');
          _this4.hideFormOrderDocument();
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot update document');
        console.log(error);
      });
    },
    selectDocumentIndex: function selectDocumentIndex(id) {
      this.document.id = id;
      $('#modal_delete_order_document').modal('show');
    },
    deleteOrderDocument: function deleteOrderDocument() {
      var _this5 = this;
      showLoading();
      axios.post("/admin/orders/documents/delete/".concat(this.document.id), {
        id: this.document.id
      }).then(function (response) {
        if (response.data.success) {
          hideLoading();
          var index = _this5.documents[_this5.documents.findIndex(function (item) {
            return item.id === _this5.data.id;
          })];
          _this5.documents.splice(index, 1);
          $('#modal_delete_order_document').modal('hide');
          showToastSuccess('Document was deleted successfully!');
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot delete document');
        console.log(error);
      });
    },
    // Note
    hideModalOrderNote: function hideModalOrderNote() {
      this.order.note = "";
      this.is_show_invalid = false;
      $("#modal_order_note").modal('hide');
    },
    hideModelFormOrderNote: function hideModelFormOrderNote() {
      this.order.note = '';
      this.is_show_invalid = false;
      this.is_show_form_note = false;
    },
    showModalCreateOrderNote: function showModalCreateOrderNote() {
      this.is_update_order_note = false;
      this.is_show_form_note = true;
    },
    // save note
    saveOrderNote: function saveOrderNote() {
      var _this6 = this;
      showLoading();
      axios.post("/admin/orders/notes/store/".concat(this.data.id), {
        note: this.order.note
      }).then(function (response) {
        if (response.data.success) {
          hideLoading();
          _this6.is_show_invalid = false;
          notes.unshift(response.data.data);
          _this6.hideModelFormOrderNote();
          showToastSuccess("Note was saved successfully!");
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Cannot update status');
        console.log(error);
      });
    },
    submitOrderNote: function submitOrderNote() {
      var _this7 = this;
      this.$validator.validate().then(function (result) {
        result = !_this7.order.note ? false : true;
        if (!result) {
          hideLoading();
          _this7.is_show_invalid = true;
          window.scrollTo(0, 0);
        } else {
          _this7.saveOrderNote();
        }
      });
    },
    formatDateTime: function formatDateTime(val) {
      if (!val) return;
      return moment(val).format("DD MMMM YYYY - h:mm A");
    },
    hideModalUpdatePrice: function hideModalUpdatePrice() {
      this.price.note = '';
      this.price.total = '';
      this.is_show_invalid = false;
      $('#modal_order_update_price').modal('hide');
    },
    updatePrice: function updatePrice() {
      showLoading();
      axios.post("/admin/orders/update/price/".concat(this.data.id), {
        total: this.price.total,
        note: this.price.note
      }).then(function (response) {
        if (response.data.success) {
          window.location.reload();
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Can not update price');
        console.log(error);
      });
    },
    submitUpdatePrice: function submitUpdatePrice() {
      var _this8 = this;
      this.$validator.validate().then(function (result) {
        if (_this8.price.total) result = true;
        _this8.is_show_invalid = !_this8.price.total ? true : false;
        if (!result) {
          hideLoading();
          window.scrollTo(0, 0);
        } else {
          _this8.updatePrice();
        }
      });
    },
    // Upload New File
    uploadFile: function uploadFile(event, index) {
      var _this9 = this;
      var input = event.target;
      if (input.files && input.files[0]) {
        var size = (input.files[0].size / 1024 / 1024).toFixed(2);
        if (size > 1) {
          showAlertError("Image size must be less than or equal to 1MB");
          return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
          _this9.upload_new_file.types[index].file = e.target.result;
          _this9.upload_new_file.types[index].name = input.files[0].name.split('.').slice(0, -1).join('.');
          _this9.upload_new_file.types[index].ext = input.files[0].name.substr(input.files[0].name.lastIndexOf('.') + 1);
        };
        reader.readAsDataURL(input.files[0]);
      }
    },
    removeFile: function removeFile(index) {
      var _this10 = this;
      this.upload_new_file.types.forEach(function (e, i) {
        if (index === i) {
          _this10.upload_new_file.types[index].file = '';
          _this10.upload_new_file.types[index].ext = '';
          _this10.upload_new_file.types[index].name = '';
        }
      });
    },
    hideModalUploadNewFile: function hideModalUploadNewFile() {
      $('#modal_upload_new_file').modal('hide');
      this.upload_new_file = {
        order_id: null,
        types: [{
          "type": "quotation",
          "name": "",
          "file": "",
          "ext": ""
        }, {
          "type": "invoice",
          "name": "",
          "file": "",
          "ext": ""
        }],
        is_required_file: false
      };
    },
    uploadNewFile: function uploadNewFile() {
      showLoading();
      axios.post("/admin/orders/upload/new_file/".concat(this.data.id), {
        types: Object.assign({}, this.upload_new_file.types)
      }).then(function (response) {
        if (response.data.success) {
          window.location.reload();
        } else {
          showAlertError(response.data.message);
          hideLoading();
        }
      })["catch"](function (error) {
        hideLoading();
        showAlertError('Can not upload new file');
        console.log(error);
      });
    },
    submitUploadNewFile: function submitUploadNewFile() {
      var _this11 = this;
      this.$validator.validate().then(function (result) {
        if (!_this11.upload_new_file.types[0].file && !_this11.upload_new_file.types[1].file) result = false;
        if (_this11.upload_new_file.types[0].file || _this11.upload_new_file.types[1].file) result = true;
        _this11.upload_new_file.is_required_file = !_this11.upload_new_file.types[0].file && !_this11.upload_new_file.types[1].file ? true : false;
        if (!result) {
          hideLoading();
          window.scrollTo(0, 0);
        } else {
          _this11.uploadNewFile();
        }
      });
    }
  },
  watch: {
    'upload_new_file.types': {
      handler: function handler(val) {
        if (val[0].file || val[1].file) this.upload_new_file.is_required_file = false;
      },
      deep: true
    }
  }
});

/***/ }),

/***/ 19:
/*!**************************************************!*\
  !*** multi ./resources/assets/js/orders/view.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\NU lessons\Year IV School Lessons\Theses\project\admin\resources\assets\js\orders\view.js */"./resources/assets/js/orders/view.js");


/***/ })

/******/ });