import $ from 'jquery';

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
        close();
    });

    $configurator.click(function (e) {
        var $target = $(e.target);

        if (!$target.parents('.product-configurator__inner').size() && !$target.hasClass('product-configurator__inner')) {
            close();
        }
    });

    function open () {
        $configurator.addClass('product-configurator--show')
    }

    function close () {
        $configurator.removeClass('product-configurator--show')
    }
});