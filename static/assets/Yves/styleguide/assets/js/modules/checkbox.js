import $ from 'jquery';

'use strict';


$(document).ready(function () {
  var $checkboxes = $('.checkbox');

  $checkboxes.each(function () {
    var $checkbox, $input;

    $checkbox = $(this);
    $input = $checkbox.find('.checkbox__input');

    $input.bind('change', function () {

      if ($input.prop('checked')) {
        $checkbox.addClass('checkbox--checked');

      } else {
        $checkbox.removeClass('checkbox--checked');
      }

    });
  });
});
