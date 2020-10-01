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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/compare-forms/laravel.add.js":
/*!***************************************************!*\
  !*** ./resources/js/compare-forms/laravel.add.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("document.addEventListener(\"DOMContentLoaded\", function () {\n  document.querySelector('#experience').addEventListener('click', function (e) {\n    if (e.target.classList.contains('removeTag')) {\n      e.preventDefault();\n      var row = e.target.closest('tr');\n      var text = row.querySelector('input').value.trim();\n\n      if (text) {\n        if (confirm(document.getElementById('experienceContainer').dataset.translateRemoveTag.replace(/\\${text}/g, text))) {\n          row.remove();\n        }\n      } else {\n        row.remove();\n      }\n    }\n  });\n  document.getElementById('additionalLanguageBtn').addEventListener('click', function (e) {\n    var table = this.closest('table');\n    table.querySelector('tbody').insertAdjacentHTML(\"beforeend\", table.dataset.template);\n  });\n\n  if (document.querySelector('#additionalLanguages > tbody').children.length == 0) {\n    document.getElementById('additionalLanguageBtn').click();\n  }\n\n  function addExperience() {\n    var container = document.getElementById('experienceContainer');\n    var nextKey = container.dataset.nextkey;\n    container.insertAdjacentHTML('beforeend', container.dataset.template.replace(/__index1__/g, nextKey));\n    container.dataset.nextkey = parseInt(nextKey) + 1;\n    container.querySelector('.experience:last-child .additionalFrameworkBtn').click();\n  }\n\n  document.getElementById('addExperienceBtn').addEventListener('click', function (e) {\n    addExperience();\n  });\n  document.getElementById('experienceContainer').addEventListener('click', function (e) {\n    if (e.target.classList.contains('removeJob')) {\n      e.preventDefault();\n      var container = e.target.closest('.experience');\n\n      if (confirm(document.getElementById('experienceContainer').dataset.translateRemoveJob)) {\n        container.remove();\n      }\n    }\n  });\n  document.getElementById('experienceContainer').addEventListener('click', function (e) {\n    if (e.target.classList.contains('additionalFrameworkBtn')) {\n      e.preventDefault();\n      var table = e.target.closest('table');\n      table.querySelector('tbody').insertAdjacentHTML(\"beforeend\", table.dataset.template);\n    }\n  });\n\n  if (document.querySelector('#experienceContainer .experience') === null) {\n    addExperience();\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY29tcGFyZS1mb3Jtcy9sYXJhdmVsLmFkZC5qcz8yMmMyIl0sIm5hbWVzIjpbImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsInF1ZXJ5U2VsZWN0b3IiLCJlIiwidGFyZ2V0IiwiY2xhc3NMaXN0IiwiY29udGFpbnMiLCJwcmV2ZW50RGVmYXVsdCIsInJvdyIsImNsb3Nlc3QiLCJ0ZXh0IiwidmFsdWUiLCJ0cmltIiwiY29uZmlybSIsImdldEVsZW1lbnRCeUlkIiwiZGF0YXNldCIsInRyYW5zbGF0ZVJlbW92ZVRhZyIsInJlcGxhY2UiLCJyZW1vdmUiLCJ0YWJsZSIsImluc2VydEFkamFjZW50SFRNTCIsInRlbXBsYXRlIiwiY2hpbGRyZW4iLCJsZW5ndGgiLCJjbGljayIsImFkZEV4cGVyaWVuY2UiLCJjb250YWluZXIiLCJuZXh0S2V5IiwibmV4dGtleSIsInBhcnNlSW50IiwidHJhbnNsYXRlUmVtb3ZlSm9iIl0sIm1hcHBpbmdzIjoiQUFDQUEsUUFBUSxDQUFDQyxnQkFBVCxDQUEwQixrQkFBMUIsRUFBNkMsWUFBSTtBQUU3Q0QsVUFBUSxDQUFDRSxhQUFULENBQXVCLGFBQXZCLEVBQXNDRCxnQkFBdEMsQ0FBdUQsT0FBdkQsRUFBZ0UsVUFBU0UsQ0FBVCxFQUFZO0FBQ3hFLFFBQUdBLENBQUMsQ0FBQ0MsTUFBRixDQUFTQyxTQUFULENBQW1CQyxRQUFuQixDQUE0QixXQUE1QixDQUFILEVBQTZDO0FBQ3pDSCxPQUFDLENBQUNJLGNBQUY7QUFDQSxVQUFJQyxHQUFHLEdBQUdMLENBQUMsQ0FBQ0MsTUFBRixDQUFTSyxPQUFULENBQWlCLElBQWpCLENBQVY7QUFDQSxVQUFJQyxJQUFJLEdBQUdGLEdBQUcsQ0FBQ04sYUFBSixDQUFrQixPQUFsQixFQUEyQlMsS0FBM0IsQ0FBaUNDLElBQWpDLEVBQVg7O0FBRUEsVUFBR0YsSUFBSCxFQUFRO0FBQ0osWUFBR0csT0FBTyxDQUFDYixRQUFRLENBQUNj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TkQ7O0FBUUEsTUFBR3JCLFFBQVEsQ0FBQ0UsYUFBVCxDQUF1QixrQ0FBdkIsTUFBK0QsSUFBbEUsRUFBdUU7QUFDbkV1QixpQkFBYTtBQUNoQjtBQUVKLENBOUREIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2NvbXBhcmUtZm9ybXMvbGFyYXZlbC5hZGQuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJcbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJET01Db250ZW50TG9hZGVkXCIsKCk9PntcblxuICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNleHBlcmllbmNlJykuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgICAgIGlmKGUudGFyZ2V0LmNsYXNzTGlzdC5jb250YWlucygncmVtb3ZlVGFnJykpIHtcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIGxldCByb3cgPSBlLnRhcmdldC5jbG9zZXN0KCd0cicpO1xuICAgICAgICAgICAgbGV0IHRleHQgPSByb3cucXVlcnlTZWxlY3RvcignaW5wdXQnKS52YWx1ZS50cmltKCk7XG5cbiAgICAgICAgICAgIGlmKHRleHQpe1xuICAgICAgICAgICAgICAgIGlmKGNvbmZpcm0oZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2V4cGVyaWVuY2VDb250YWluZXInKS5kYXRhc2V0LnRyYW5zbGF0ZVJlbW92ZVRhZy5yZXBsYWNlKC9cXCR7dGV4dH0vZywgdGV4dCkpKXsgICAgXG4gICAgICAgICAgICAgICAgICAgIHJvdy5yZW1vdmUoKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9ZWxzZXtcbiAgICAgICAgICAgICAgICByb3cucmVtb3ZlKCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9KTtcblxuICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdhZGRpdGlvbmFsTGFuZ3VhZ2VCdG4nKS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcbiAgICAgICAgbGV0IHRhYmxlID0gdGhpcy5jbG9zZXN0KCd0YWJsZScpO1xuICAgICAgICB0YWJsZS5xdWVyeVNlbGVjdG9yKCd0Ym9keScpLmluc2VydEFkamFjZW50SFRNTChcImJlZm9yZWVuZFwiLCB0YWJsZS5kYXRhc2V0LnRlbXBsYXRlKTtcbiAgICB9KTtcblxuICAgIGlmKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNhZGRpdGlvbmFsTGFuZ3VhZ2VzID4gdGJvZHknKS5jaGlsZHJlbi5sZW5ndGggPT0gMCl7XG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdhZGRpdGlvbmFsTGFuZ3VhZ2VCdG4nKS5jbGljaygpO1xuICAgIH1cblxuICAgIGZ1bmN0aW9uIGFkZEV4cGVyaWVuY2UoKXtcbiAgICAgICAgbGV0IGNvbnRhaW5lciA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdleHBlcmllbmNlQ29udGFpbmVyJyk7XG4gICAgICAgIGxldCBuZXh0S2V5ID0gY29udGFpbmVyLmRhdGFzZXQubmV4dGtleTtcbiAgICAgICAgY29udGFpbmVyLmluc2VydEFkamFjZW50SFRNTCgnYmVmb3JlZW5kJywgY29udGFpbmVyLmRhdGFzZXQudGVtcGxhdGUucmVwbGFjZSgvX19pbmRleDFfXy9nLCBuZXh0S2V5KSk7XG4gICAgICAgIGNvbnRhaW5lci5kYXRhc2V0Lm5leHRrZXkgPSBwYXJzZUludChuZXh0S2V5KSArIDE7XG4gICAgICAgIGNvbnRhaW5lci5xdWVyeVNlbGVjdG9yKCcuZXhwZXJpZW5jZTpsYXN0LWNoaWxkIC5hZGRpdGlvbmFsRnJhbWV3b3JrQnRuJykuY2xpY2soKTtcbiAgICB9XG5cbiAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnYWRkRXhwZXJpZW5jZUJ0bicpLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xuICAgICAgICBhZGRFeHBlcmllbmNlKCk7XG4gICAgfSk7XG5cbiAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZXhwZXJpZW5jZUNvbnRhaW5lcicpLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xuICAgICAgICBpZihlLnRhcmdldC5jbGFzc0xpc3QuY29udGFpbnMoJ3JlbW92ZUpvYicpKSB7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICBsZXQgY29udGFpbmVyID0gZS50YXJnZXQuY2xvc2VzdCgnLmV4cGVyaWVuY2UnKTtcblxuICAgICAgICAgICAgaWYoY29uZmlybShkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZXhwZXJpZW5jZUNvbnRhaW5lcicpLmRhdGFzZXQudHJhbnNsYXRlUmVtb3ZlSm9iKSl7XG4gICAgICAgICAgICAgICAgY29udGFpbmVyLnJlbW92ZSgpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZXhwZXJpZW5jZUNvbnRhaW5lcicpLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xuICAgICAgICBpZihlLnRhcmdldC5jbGFzc0xpc3QuY29udGFpbnMoJ2FkZGl0aW9uYWxGcmFtZXdvcmtCdG4nKSkge1xuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgbGV0IHRhYmxlID0gZS50YXJnZXQuY2xvc2VzdCgndGFibGUnKTtcbiAgICAgICAgICAgIHRhYmxlLnF1ZXJ5U2VsZWN0b3IoJ3Rib2R5JykuaW5zZXJ0QWRqYWNlbnRIVE1MKFwiYmVmb3JlZW5kXCIsIHRhYmxlLmRhdGFzZXQudGVtcGxhdGUpO1xuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICBpZihkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjZXhwZXJpZW5jZUNvbnRhaW5lciAuZXhwZXJpZW5jZScpID09PSBudWxsKXtcbiAgICAgICAgYWRkRXhwZXJpZW5jZSgpO1xuICAgIH1cblxufSk7XG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/compare-forms/laravel.add.js\n");

/***/ }),

/***/ 2:
/*!*********************************************************!*\
  !*** multi ./resources/js/compare-forms/laravel.add.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/gregor/www/compare-forms-laravel/resources/js/compare-forms/laravel.add.js */"./resources/js/compare-forms/laravel.add.js");


/***/ })

/******/ });