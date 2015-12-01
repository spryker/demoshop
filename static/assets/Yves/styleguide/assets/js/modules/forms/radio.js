import $ from 'jquery';
import { validateRadio } from './validator';

'use strict';


const EVENTS = {
    UNCHECK: 'RADIO_UNCHECK',
    VALIDATE: 'RADIO_VALIDATE',
    VALIDATION_UPDATED: 'RADIO_VALIDATION_UPDATED'
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
            $(document).trigger(EVENTS.VALIDATION_UPDATED);

            validate();
        });

        $(document).on(EVENTS.VALIDATE, validate);


        $radio.on(EVENTS.UNCHECK, function () {
            $(this).removeClass('radio--checked');
        });


        $input.bind('focus', function () {
            $radio.addClass('radio--focussed');
        });

        $input.bind('blur', function () {
            $radio.removeClass('radio--focussed');
        });


        function validate () {
            var validationResult = validateRadio($radio);

            if (validationResult.valid) {
                $radio.removeClass('radio--invalid');

            } else {
                $radio.addClass('radio--invalid');
            }
        }
    });
});


export { EVENTS };