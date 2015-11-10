import $ from 'jquery';

'use strict';


$(document).ready(function () {

    $('.js-stepper').each(function () {

        var $stepper, $addButton, $removeButton;

        $stepper = $(this);
        $stepper.wrap(`<div class="stepper"></div>`);
        $addButton = $(`<div class="stepper__button stepper__button--add"></div>`);
        $removeButton = $(`<div class="stepper__button stepper__button--remove"></div>`);

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