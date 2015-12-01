import $ from 'jquery';
import { validateInput } from './validator';

'use strict';


const EVENTS = {
    VALIDATE: 'INPUT_VALIDATE'
};


$(document).ready(function () {
    var $inputs = $('.input');

    $inputs.each(function () {
        var $input, $inputField, $text, type;

        $input = $(this);
        $inputField = $input.find('.input__field');
        $text = $input.find('.input__text');
        type = $text.attr('type');


        if (type !== 'hidden') {
            $text.bind('focus', function () {
                $input.addClass('input--focussed');
            });

            $text.bind('blur', function () {
                $input.removeClass('input--focussed');

                validateAfter();
            });


            $text.bind('keyup', validateInstant);

            $(document).on(EVENTS.VALIDATE, validateAfter);
        }


        function validateInstant () {
            var validationResult = validateInput($input);

            $input.removeClass('input--valid');
            $inputField.find('.input--error').remove();

            if (validationResult.valid) {
                $input.removeClass('input--invalid');

            } else {
                $input.addClass('input--invalid');

                if (validationResult.messages.length) {
                    $inputField.append($(`<div class="input__error">${validationResult.messages[0]}</div>`));
                }
            }
        }

        function validateAfter () {
            var validationResult = validateInput($input);

            if ($text.val().length && validationResult.valid) {
                $input.addClass('input--valid');
            }
        }
    });
});


export { EVENTS };