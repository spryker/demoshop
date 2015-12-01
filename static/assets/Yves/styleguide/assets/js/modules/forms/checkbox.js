import $ from 'jquery';
import { validateCheckbox } from './validator';

'use strict';


const EVENTS = {
    VALIDATION_UPDATED: 'CHECKBOX_VALIDATION_UPDATED'
};


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

          validate();
        });

        $input.bind('focus', function () {
            $checkbox.addClass('checkbox--focussed');
        });

        $input.bind('blur', function () {
            $checkbox.removeClass('checkbox--focussed');
        });


        function validate () {
            var validationResult = validateCheckbox($checkbox);

            if (validationResult.valid) {
                $checkbox.removeClass('checkbox--invalid');

            } else {
                $checkbox.addClass('checkbox--invalid');
            }

            $(document).trigger(EVENTS.VALIDATION_UPDATED);
        }
    });
});


export { EVENTS }
