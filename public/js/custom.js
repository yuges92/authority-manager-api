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

// require('./sara/saraPackage');
$(document).ready(function () {
  // $("button").click(function(){
  //   $("p").slideToggle();
  // });
  console.log('Hello World!');
  $('.topic-btn').click(function (event) {
    var table = $(this).addClass('active');
    openSubtopicTab(table);
  });
  $('.select-all-checkbox').on('change', function (e) {
    // $(this).next('label').text('Select All Topics')
    var targetGroup = $(this).attr('data-target');
    var $inputs = $('#' + targetGroup).find('input:checkbox'); // var parentCheckbox=$(this).attr('data-parent');

    if (e.originalEvent === undefined) {
      var allChecked = true;
      $inputs.each(function () {
        allChecked = allChecked && this.checked;
      });
      this.checked = allChecked;
    } else {
      // $(this).next('label').text('Unselect All Topics')
      $inputs.prop('checked', this.checked);
    }
  });
  $('.subtopic-checkbox').on('change', function () {
    $('.select-all-checkbox').trigger('change');
  });
  $('.main-topic-checkbox').on('change', function () {
    // console.log('main changed');
    var checkbox = $(this).attr('data-checkbox'); // $(checkbox).prop('checked', this.checked);
    // $(checkbox).trigger('change');

    if (!this.checked) {
      // console.log(checkbox);
      $(this).parent().siblings().find('input:checkbox').prop('checked', false);
    }
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
  $('button[type=submit]').on('click', function (event) {
    $(this).attr('disabled');
    /* Act on the event */
  });
  $('form').on('submit', function (event) {
    $(this).find('input[type=submit]').val('loading...');
    $(this).find('button[type=submit]').html('loading...');
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
  $(document).on('click', 'form.deleteForm', function () {
    $(this).submit(function (event) {
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
      });
    }); // }
  });
} // function deleteFormHandler() {
//   $(this).submit(function(event) {
//     event.preventDefault();
//     swal({
//       title: "Are you sure?",
//       text: '',
//       icon: "warning",
//       buttons: true,
//       dangerMode: true,
//     })
//     .then((willDelete) => {
//       if (willDelete) {
//         $(this).unbind('submit').submit()
//
//         // swal("Poof! Your imaginary file has been deleted!", {
//         //   icon: "success",
//         // });
//       }
//     });
//
//   });
// }


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