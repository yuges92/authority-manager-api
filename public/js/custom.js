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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 48);
/******/ })
/************************************************************************/
/******/ ({

/***/ 48:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(49);


/***/ }),

/***/ 49:
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

/***/ })

/******/ });