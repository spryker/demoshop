import $ from 'jquery';

'use strict';


const EVENTS = {
    UNCHECK: 'UNCHECK'
};


$(document).ready(function () {
  var $radios = $('.radio');

  $radios.each(function () {
    var $radio, $input;

    $radio = $(this);
    $input = $radio.find('.radio__input');

    $input.bind('change', function () {
        if ($input.prop('checked')) {
            $radio.addClass('radio--checked');
        }

        var $siblings = $radio.siblings('.radio');
        $siblings.trigger(EVENTS.UNCHECK);
    });

    $radio.on(EVENTS.UNCHECK, function () {
        $(this).removeClass('radio--checked');
    });


    $input.bind('focus', function () {
        $radio.addClass('radio--focussed');
    });

    $input.bind('blur', function () {
        $radio.removeClass('radio--focussed');
    });
  });
});
