'use strict';

var $ = require('jquery'),
    slick = require('slick-carousel');

module.exports = {

  init: function() {
    $('.js-featured-carousel').slick({
      autoplay: true,
      dots: true,
      nextArrow: '<button type="button" class="slick-next featured__carousel-next">&rsaquo;</button>',
      prevArrow: '<button type="button" class="slick-prev featured__carousel-prev">&lsaquo;</button>',
    });
  }

};