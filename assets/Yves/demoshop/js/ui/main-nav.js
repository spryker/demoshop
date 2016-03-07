'use strict';

var $ = require('jquery'),
    utils = require('../utils');

var $mainNavEl;
var mainNavHidden = false;

var setNavHeight = function() {
  var navHeight;
  $mainNavEl.css('height', '').removeClass('js-main-nav-animated');
  $('html').removeClass('js-main-nav-hidden');
  navHeight = $mainNavEl.innerHeight();
  $mainNavEl.css('height', navHeight);
  $mainNavEl.addClass('js-main-nav-animated');
  $('html').addClass('js-main-nav-hidden');
}

module.exports = {

  init: function() {
    $mainNavEl = $('.js-main-nav');

    setNavHeight();

    $('.js-nav-toggle').click(function(e) {
      $('html').toggleClass('js-main-nav-hidden');
      e.preventDefault();
    });

    $(window).resize(utils.debounce(setNavHeight, 250));
  }

};