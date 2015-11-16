import $ from 'jquery';

'use strict';


$(document).ready(function () {
  var $radios = $('.radio');

  $radios.each(function () {
    var $radio, $input;

    $radio = $(this);
    $input = $radio.find('.radio__input');

    $input.bind('change', function () {
      $radios.removeClass('radio--checked');

      if ($input.prop('checked')) {
        $radio.addClass('radio--checked');

      }
    });
  });
});
