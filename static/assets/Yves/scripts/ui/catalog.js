'use strict';

require ('jquery-ui/slider');
var $ = require('jquery');

var updateValues = function(event, ui) {
  var min = ui.values[0];
  var max = ui.values[1];
  $('.js-filter-price-min').html(min);
  $('.js-filter-price-max').html(max);
};

var updateColorFilter = function() {
  $('.js-color-name').each(function(i, el) {
    var color = $(el).siblings(':radio').data('color');
    $(el).css('background-color', color);
  });
};

module.exports = {
  init: function() {
    $('.js-price-slider').slider({
      range: true,
      max: 200,
      values: [0, 200],
      animate: 'fast',
      slide: updateValues
    });

    updateColorFilter();
  },

  initColorFilter: updateColorFilter

}