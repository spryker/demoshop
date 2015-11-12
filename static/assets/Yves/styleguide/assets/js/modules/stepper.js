import $ from 'jquery';

'use strict';


$(document).ready(function () {

    $('.js-stepper').each(function () {

        var $stepper, $addButton, $removeButton;

        $stepper = $(this);
        $stepper.wrap(`<div class="stepper"></div>`);
        $addButton = $(`<button type="button" class="stepper__button stepper__button--add"></button>`);
        $removeButton = $(`<button type="button" class="stepper__button stepper__button--remove"></button>`);

        $stepper.after($addButton);
        $stepper.after($removeButton);

        $removeButton.click(function () {
            var val = parseInt($stepper.val(), 10);
            $stepper.val(Math.max(1, val - 1));
        });

        $addButton.click(function () {
            var val = parseInt($stepper.val(), 10);
            $stepper.val(Math.min(99, val + 1));
        });
    });

});