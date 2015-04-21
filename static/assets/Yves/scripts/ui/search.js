'use strict';

var $ = require('jquery'),
    $searchElement,
    $searchButton,
    $searchBox,
    isActive = false,
    isFocussed = false;

var focusSearchBox = function() {
  if (!isFocussed) {
    $searchBox.focus();
    isFocussed = true;
  }
};

var activateSearchBox = function() {
  if (!isActive) {
    $searchElement.addClass('active');
    focusSearchBox();
    isActive = true;
  }
};

var deactivateSearchBox = function() {
  if (isActive && !isFocussed && $('.js-search-box').val().length === 0) {
    $searchElement.removeClass('active');
    isActive = false;
  }
};

module.exports = {

  init: function() {
    $searchElement = $('.js-search');
    $searchBox = $('.js-search-box');
    $searchElement.hover(activateSearchBox, deactivateSearchBox);
    $searchBox.focus(function() {
      isFocussed = true;
      activateSearchBox();
    });
    $searchBox.blur(function() {
      isFocussed = false;
      deactivateSearchBox();
    });
  }
};
