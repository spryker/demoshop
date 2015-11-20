import $ from 'jquery';
import { scrollTo } from './helpers';

'use strict';


$(document).ready(function () {

    var $steps, current;

    current = 0;
    $steps = $('.checkout__step');

    if ($steps.size()) {
        update();

        $steps.each(function (index) {
            var $step, $button, $summary;

            $step = $(this);
            $button = $step.find('.checkout__step-button');
            $summary = $step.find('.checkout__summary');

            $button.click(function () {
                if (validate($step)) {
                    nextStep();
                }
            });

            $summary.click(function () {
                if (validate($step)) {
                    showStep(index);
                }
            });
        });
    }

    function validate ($step) {
        // TODO: validation implementation
        return true
    }

    function nextStep () {
        if (current < $steps.size() - 1) {
            current += 1;

            update();
        }
    }

    function showStep (index) {
        if (index < current && index < $steps.size() - 1) {
            current = index;

            update();
        }
    }

    function update () {
        $steps.each(function (index) {
            var $step = $(this);

            if (index !== current ) {
                $step.removeClass('checkout__step--current');
            } else {
                $step.addClass('checkout__step--current');
            }

            if (index < current) {
                $step.addClass('checkout__step--done');
            } else {
                $step.removeClass('checkout__step--done');
            }
        });

        scrollTo($steps.eq(current));
    };

});
