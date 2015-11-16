import $ from 'jquery';

'use strict';


$(document).ready(function () {
  var $inputs = $('.input');

  $inputs.each(function () {
    var $input, $text;

    $input = $(this);
    $text = $input.find('.input__text');

    $text.bind('focus', function () {
        $input.addClass('input--focussed');
    });

    $text.bind('blur', function () {
        $input.removeClass('input--focussed');
    });

  });
});
