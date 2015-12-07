import $ from 'jquery';

'use strict';


const EVENTS = {
    INITIALIZE_STEPPERS: 'INITIALIZE_STEPPERS'
};


$(document).ready(function () {

    init();

    $(document).on(EVENTS.INITIALIZE_STEPPERS, init);

});

function init () {
    $('.stepper').each(function () {

        var $stepper, $input, $addButton, $removeButton;

        $stepper = $(this);

        // cleanup
        $stepper.find('button').remove();

        $input = $stepper.find('input');
        $addButton = $(`<button type="button" class="stepper__button stepper__button--add"></button>`);
        $removeButton = $(`<button type="button" class="stepper__button stepper__button--remove"></button>`);

        $stepper.append($addButton);
        $stepper.append($removeButton);

        $removeButton.click(function () {
            var val = parseInt($input.val(), 10);
            $input.val(Math.max(1, val - 1));
            $input.trigger('change');
        });

        $addButton.click(function () {
            var val = parseInt($input.val(), 10);
            $input.val(Math.min(99, val + 1));
            $input.trigger('change');
        });

        $input.focus(function () {
            $stepper.addClass('stepper--focussed');
        });

        $input.blur(function () {
            $stepper.removeClass('stepper--focussed');
        });
    });
}


export { EVENTS };
