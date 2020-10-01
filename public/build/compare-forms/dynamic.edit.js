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

/***/ "./resources/js/compare-forms/dynamic.edit.js":
/*!****************************************************!*\
  !*** ./resources/js/compare-forms/dynamic.edit.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("document.addEventListener(\"DOMContentLoaded\", function () {\n  document.querySelector('#experience').addEventListener('click', function (e) {\n    if (e.target.classList.contains('removeTag')) {\n      e.preventDefault();\n      var row = e.target.closest('tr');\n      var text = row.querySelector('input').value.trim();\n\n      if (text) {\n        if (confirm(document.getElementById('experienceContainer').dataset.translateRemoveTag.replace(/\\${text}/g, text))) {\n          row.remove();\n        }\n      } else {\n        row.remove();\n      }\n    }\n  });\n  document.getElementById('additionalLanguageBtn').addEventListener('click', function (e) {\n    var table = this.closest('table');\n    table.querySelector('tbody').insertAdjacentHTML(\"beforeend\", table.dataset.template);\n  });\n\n  if (document.querySelector('#additionalLanguages > tbody').children.length == 0) {\n    document.getElementById('additionalLanguageBtn').click();\n  }\n\n  function addExperience() {\n    var container = document.getElementById('experienceContainer');\n    var nextKey = container.dataset.nextkey;\n    container.insertAdjacentHTML('beforeend', container.dataset.template.replace(/__index1__/g, nextKey));\n    container.dataset.nextkey = parseInt(nextKey) + 1;\n    container.querySelector('.experience:last-child .additionalFrameworkBtn').click();\n  }\n\n  document.getElementById('addExperienceBtn').addEventListener('click', function (e) {\n    addExperience();\n  });\n  document.getElementById('experienceContainer').addEventListener('click', function (e) {\n    if (e.target.classList.contains('removeJob')) {\n      e.preventDefault();\n      var container = e.target.closest('.experience');\n\n      if (confirm(document.getElementById('experienceContainer').dataset.translateRemoveJob)) {\n        container.remove();\n      }\n    }\n  });\n  document.getElementById('experienceContainer').addEventListener('click', function (e) {\n    if (e.target.classList.contains('additionalFrameworkBtn')) {\n      e.preventDefault();\n      var table = e.target.closest('table');\n      table.querySelector('tbody').insertAdjacentHTML(\"beforeend\", table.dataset.template);\n    }\n  });\n\n  if (document.querySelector('#experienceContainer .experience') === null) {\n    addExperience();\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY29tcGFyZS1mb3Jtcy9keW5hbWljLmVkaXQuanM/MTM3OCJdLCJuYW1lcyI6WyJkb2N1bWVudCIsImFkZEV2ZW50TGlzdGVuZXIiLCJxdWVyeVNlbGVjdG9yIiwiZSIsInRhcmdldCIsImNsYXNzTGlzdCIsImNvbnRhaW5zIiwicHJldmVudERlZmF1bHQiLCJyb3ciLCJjbG9zZXN0IiwidGV4dCIsInZhbHVlIiwidHJpbSIsImNvbmZpcm0iLCJnZXRFbGVtZW50QnlJZCIsImRhdGFzZXQiLCJ0cmFuc2xhdGVSZW1vdmVUYWciLCJyZXBsYWNlIiwicmVtb3ZlIiwidGFibGUiLCJpbnNlcnRBZGphY2VudEhUTUwiLCJ0ZW1wbGF0ZSIsImNoaWxkcmVuIiwibGVuZ3RoIiwiY2xpY2siLCJhZGRFeHBlcmllbmNlIiwiY29udGFpbmVyIiwibmV4dEtleSIsIm5leHRrZXkiLCJwYXJzZUludCIsInRyYW5zbGF0ZVJlbW92ZUpvYiJdLCJtYXBwaW5ncyI6IkFBQ0FBLFFBQVEsQ0FBQ0MsZ0JBQVQsQ0FBMEIsa0JBQTFCLEVBQTZDLFlBQUk7QUFFN0NELFVBQVEsQ0FBQ0UsYUFBVCxDQUF1QixhQUF2QixFQUFzQ0QsZ0JBQXRDLENBQXVELE9BQXZELEVBQWdFLFVBQVNFLENBQVQsRUFBWTtBQUN4RSxRQUFHQSxDQUFDLENBQUNDLE1BQUYsQ0FBU0MsU0FBVCxDQUFtQkMsUUFBbkIsQ0FBNEIsV0FBNUIsQ0FBSCxFQUE2QztBQUN6Q0gsT0FBQyxDQUFDSSxjQUFGO0FBQ0EsVUFBSUMsR0FBRyxHQUFHTCxDQUFDLENBQUNDLE1BQUYsQ0FBU0ssT0FBVCxDQUFpQixJQUFqQixDQUFWO0FBQ0EsVUFBSUMsSUFBSSxHQUFHRixHQUFHLENBQUNOLGFBQUosQ0FBa0IsT0FBbEIsRUFBMkJTLEtBQTNCLENBQWlDQyxJQUFqQyxFQUFYOztBQUVBLFVBQUdGLElBQUgsRUFBUTtBQUNKLFlBQUdHLE9BQU8sQ0FBQ2IsUUFBUSxDQUFD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QU5EOztBQVFBLE1BQUdyQixRQUFRLENBQUNFLGFBQVQsQ0FBdUIsa0NBQXZCLE1BQStELElBQWxFLEVBQXVFO0FBQ25FdUIsaUJBQWE7QUFDaEI7QUFFSixDQTlERCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9jb21wYXJlLWZvcm1zL2R5bmFtaWMuZWRpdC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIlxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcIkRPTUNvbnRlbnRMb2FkZWRcIiwoKT0+e1xuXG4gICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2V4cGVyaWVuY2UnKS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcbiAgICAgICAgaWYoZS50YXJnZXQuY2xhc3NMaXN0LmNvbnRhaW5zKCdyZW1vdmVUYWcnKSkge1xuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgbGV0IHJvdyA9IGUudGFyZ2V0LmNsb3Nlc3QoJ3RyJyk7XG4gICAgICAgICAgICBsZXQgdGV4dCA9IHJvdy5xdWVyeVNlbGVjdG9yKCdpbnB1dCcpLnZhbHVlLnRyaW0oKTtcblxuICAgICAgICAgICAgaWYodGV4dCl7XG4gICAgICAgICAgICAgICAgaWYoY29uZmlybShkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZXhwZXJpZW5jZUNvbnRhaW5lcicpLmRhdGFzZXQudHJhbnNsYXRlUmVtb3ZlVGFnLnJlcGxhY2UoL1xcJHt0ZXh0fS9nLCB0ZXh0KSkpeyAgICBcbiAgICAgICAgICAgICAgICAgICAgcm93LnJlbW92ZSgpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1lbHNle1xuICAgICAgICAgICAgICAgIHJvdy5yZW1vdmUoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH0pO1xuXG4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2FkZGl0aW9uYWxMYW5ndWFnZUJ0bicpLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xuICAgICAgICBsZXQgdGFibGUgPSB0aGlzLmNsb3Nlc3QoJ3RhYmxlJyk7XG4gICAgICAgIHRhYmxlLnF1ZXJ5U2VsZWN0b3IoJ3Rib2R5JykuaW5zZXJ0QWRqYWNlbnRIVE1MKFwiYmVmb3JlZW5kXCIsIHRhYmxlLmRhdGFzZXQudGVtcGxhdGUpO1xuICAgIH0pO1xuXG4gICAgaWYoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2FkZGl0aW9uYWxMYW5ndWFnZXMgPiB0Ym9keScpLmNoaWxkcmVuLmxlbmd0aCA9PSAwKXtcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2FkZGl0aW9uYWxMYW5ndWFnZUJ0bicpLmNsaWNrKCk7XG4gICAgfVxuXG4gICAgZnVuY3Rpb24gYWRkRXhwZXJpZW5jZSgpe1xuICAgICAgICBsZXQgY29udGFpbmVyID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2V4cGVyaWVuY2VDb250YWluZXInKTtcbiAgICAgICAgbGV0IG5leHRLZXkgPSBjb250YWluZXIuZGF0YXNldC5uZXh0a2V5O1xuICAgICAgICBjb250YWluZXIuaW5zZXJ0QWRqYWNlbnRIVE1MKCdiZWZvcmVlbmQnLCBjb250YWluZXIuZGF0YXNldC50ZW1wbGF0ZS5yZXBsYWNlKC9fX2luZGV4MV9fL2csIG5leHRLZXkpKTtcbiAgICAgICAgY29udGFpbmVyLmRhdGFzZXQubmV4dGtleSA9IHBhcnNlSW50KG5leHRLZXkpICsgMTtcbiAgICAgICAgY29udGFpbmVyLnF1ZXJ5U2VsZWN0b3IoJy5leHBlcmllbmNlOmxhc3QtY2hpbGQgLmFkZGl0aW9uYWxGcmFtZXdvcmtCdG4nKS5jbGljaygpO1xuICAgIH1cblxuICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdhZGRFeHBlcmllbmNlQnRuJykuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgICAgIGFkZEV4cGVyaWVuY2UoKTtcbiAgICB9KTtcblxuICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdleHBlcmllbmNlQ29udGFpbmVyJykuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgICAgIGlmKGUudGFyZ2V0LmNsYXNzTGlzdC5jb250YWlucygncmVtb3ZlSm9iJykpIHtcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIGxldCBjb250YWluZXIgPSBlLnRhcmdldC5jbG9zZXN0KCcuZXhwZXJpZW5jZScpO1xuXG4gICAgICAgICAgICBpZihjb25maXJtKGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdleHBlcmllbmNlQ29udGFpbmVyJykuZGF0YXNldC50cmFuc2xhdGVSZW1vdmVKb2IpKXtcbiAgICAgICAgICAgICAgICBjb250YWluZXIucmVtb3ZlKCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9KTtcblxuICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdleHBlcmllbmNlQ29udGFpbmVyJykuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgICAgIGlmKGUudGFyZ2V0LmNsYXNzTGlzdC5jb250YWlucygnYWRkaXRpb25hbEZyYW1ld29ya0J0bicpKSB7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICBsZXQgdGFibGUgPSBlLnRhcmdldC5jbG9zZXN0KCd0YWJsZScpO1xuICAgICAgICAgICAgdGFibGUucXVlcnlTZWxlY3RvcigndGJvZHknKS5pbnNlcnRBZGphY2VudEhUTUwoXCJiZWZvcmVlbmRcIiwgdGFibGUuZGF0YXNldC50ZW1wbGF0ZSk7XG4gICAgICAgIH1cbiAgICB9KTtcblxuICAgIGlmKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNleHBlcmllbmNlQ29udGFpbmVyIC5leHBlcmllbmNlJykgPT09IG51bGwpe1xuICAgICAgICBhZGRFeHBlcmllbmNlKCk7XG4gICAgfVxuXG59KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/compare-forms/dynamic.edit.js\n");

/***/ }),

/***/ 1:
/*!**********************************************************!*\
  !*** multi ./resources/js/compare-forms/dynamic.edit.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/gregor/www/compare-forms-laravel/resources/js/compare-forms/dynamic.edit.js */"./resources/js/compare-forms/dynamic.edit.js");


/***/ })

/******/ });