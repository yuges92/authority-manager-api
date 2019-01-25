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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  // $("button").click(function(){
  //   $("p").slideToggle();
  // });
  console.log('Hello World!');
  $('.topic-btn').click(function (event) {
    var table = $(this).addClass('active');
    openSubtopicTab(table);
  }); // $('.example').wizard();
  // $('.select-all-checkbox').click(function() {
  // var checked= $(this).prop('checked');
  // var targetGroup= $(this).prop('data-target');
  // console.log(checked);
  // $('#'+targetGroup).find('input:checkbox').prop('checked', checked);
  // });

  $('.select-all-checkbox').on('click', function () {
    // $('#'+targetGroup).find('input:checkbox').not(this).prop('checked', this.checked);
    $(this).next('label').text('Select All Topics');
    var targetGroup = $(this).attr('data-target');
    console.log(targetGroup);

    if (this.checked) {
      $(this).next('label').text('Unselect All Topics');
    }

    $('#' + targetGroup).find('input:checkbox').prop('checked', this.checked);
  });
  $('#table_id').DataTable();
  var table = $('.data-table').DataTable();
  var table1 = $('#table_id1').DataTable();
  var table2 = $('#table_id2').DataTable(); // addToSubtopicList(table);

  $('.js-example-basic-multiple').select2();
  $('.data-table tbody').on('click', '.btn-add-subTopic', function () {
    table.row($(this).parents('tr')).remove().draw();
  });
  $(".tst1").click(function () {
    $.toast({
      heading: 'New Package Saved',
      text: 'A new package has been added, please choosed the main topics for the package.',
      position: 'bottom-right',
      loaderBg: '#ff4949',
      icon: 'success',
      hideAfter: 5000,
      stack: 6
    });
  });
  deleteForm();
});

function openSubtopicTab() {
  console.log('Done');
}

function addToSubtopicList(table) {
  $('.btn-add-subTopic').on('click', function (event) {
    console.log('clicked');
    /* Act on the event */
    // var subTopicID= $(this).attr('data-row');
    // $('#'+subTopicID).remove();

    var row = $(this).closest('tr');
    console.log(row);
    console.log(table);
    table.row(row).remove().draw();
  });
}

function deleteForm() {
  $('form.deleteForm').submit(function (event) {
    var _this = this;

    event.preventDefault();
    swal({
      title: "Are you sure?",
      text: '',
      icon: "warning",
      buttons: true,
      dangerMode: true
    }).then(function (willDelete) {
      if (willDelete) {
        $(_this).unbind('submit').submit(); // swal("Poof! Your imaginary file has been deleted!", {
        //   icon: "success",
        // });
      }
    }); // }
  });
}

function sweetAlertConfirm() {}

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\16396\Documents\Websites\authority-manager\resources\js\custom.js */"./resources/js/custom.js");


/***/ })

/******/ });