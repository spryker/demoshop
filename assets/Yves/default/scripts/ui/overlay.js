'use strict';

var $ = require('jquery'),
    scrollPosition = 0;

module.exports = {

  init: function() {
    $('.js-overlay-close').click(module.exports.hide);
  },

  show: function() {
    scrollPosition = $(window).scrollTop();
    $(window).scrollTop(0);
    $('html').toggleClass('overlay-visible');
  },

  hide: function() {
    $('html').toggleClass('overlay-visible');
    $(window).scrollTop(scrollPosition);
    $('.overlay').removeClass('overlay--login');
    scrollPosition = 0;
  }
};

