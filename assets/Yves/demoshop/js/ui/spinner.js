'use strict';

var $ = require('jquery');

var initEvents = function($spinner) {
  var $incButton = $spinner.find('.js-spinner__increment'),
      $decButton = $spinner.find('.js-spinner__decrement'),
      $numberField = $spinner.find('.js-spinner__number');

  $incButton.click(function() {
    $numberField.val(parseInt($numberField.val())+1);
  });

  $decButton.click(function() {
    var val = $numberField.val();
    if (val > 1) {
      $numberField.val(val-1);
    }
  });
};

module.exports = {
  init: function() {
    $('.spinner').each(function(i, el) {
      initEvents($(el));
    });
  }
};

