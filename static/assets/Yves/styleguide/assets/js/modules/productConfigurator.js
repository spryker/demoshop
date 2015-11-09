import $ from 'jquery';
import { getFormData } from './helpers';

'use strict';


$(document).ready(function () {

    var $configurator, $trigger, $close, $form;

    $configurator = $('.product-configurator');

    $trigger = $('.' + $configurator.data('trigger'));
    $close = $configurator.find('.close-button');
    $form = $configurator.find('form');

    $trigger.click(open);

    $close.click(close);
    $form.submit(function (e) {
        e.preventDefault();
        console.info(getFormData($form));
        // TODO: update customization info
        close();
    });

    $configurator.click(function (e) {
        var $target = $(e.target);

        if (!$target.parents('.product-configurator__inner').size() && !$target.hasClass('product-configurator__inner')) {
            close();
        }
    });

    function open () {
        $(document).trigger('DISABLE_SCROLLING');

        $configurator.addClass('product-configurator--background');
        setTimeout(function () {
          $configurator.addClass('product-configurator--show')
        }, 100);
    }

    function close () {
        $(document).trigger('ENABLE_SCROLLING');

        $configurator.removeClass('product-configurator--show')
        setTimeout(function () {
            $configurator.removeClass('product-configurator--background');
        }, 500);
    }
});
