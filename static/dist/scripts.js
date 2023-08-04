/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/scripts.js":
/*!*********************************!*\
  !*** ./resources/js/scripts.js ***!
  \*********************************/
/***/ (() => {

eval("$(document).ready(function () {\n  $(\"#hamburger-menu .menu-item-has-children > a\").on(\"click\", function (e) {\n    e.preventDefault();\n    $(this).parent().find(\"ul.sub-menu:first\").toggle(\"slow\");\n  });\n  $(\".hamburger-menu-open\").on(\"click\", function (e) {\n    e.preventDefault();\n    $(\".hamburger-menu-wrapper\").fadeIn();\n    $(\".hamburger-menu-container\").animate({ left: \"0\" });\n  });\n  $(\".hamburger-menu-close\").on(\"click\", function () {\n    $(\".hamburger-menu-container\").animate({ left: \"-100%\" });\n    $(\".hamburger-menu-wrapper\").fadeOut();\n  });\n\n  const themeUrl = $(\"#themeUrl\").val();\n  $(\".wp-block-gallery\").slick({\n    arrows: false,\n    dots: true,\n    slidesToShow: 2,\n  });\n\n  $(\".tabs > li a\").on(\"click\", function (e) {\n    e.preventDefault();\n    $(\".tabs > li .active\").removeClass(\"active\");\n    $(this).addClass(\"active\");\n    const target = $(this).attr(\"data-tab\");\n\n    $(\".tabs-container .active\").removeClass(\"active\");\n    $(`.tabs-container #${target}`).addClass(\"active\");\n  });\n\n  $(\"#changeTheme\").on('click', function() {\n    console.log('trigger')\n    $('body').toggleClass('dark')\n  })\n  \n});\n\n\n//# sourceURL=webpack://blank-theme/./resources/js/scripts.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/scripts.js"]();
/******/ 	
/******/ })()
;