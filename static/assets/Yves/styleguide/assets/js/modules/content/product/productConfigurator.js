import $ from 'jquery';

import { EVENTS as BODY_EVENTS } from '../../common/bodyScrolling';

'use strict';


$(document).ready(function () {

    var $configurator, $trigger, $close, $form, $status;

    $configurator = $('.product-configurator');

    $trigger = $('.' + $configurator.data('trigger'));
    $close = $configurator.find('.close-button');
    $form = $configurator.find('form');
    $status = $('.product-info__status');

    $trigger.click(open);

    $close.click(close);
    $form.submit(function (e) {
        e.preventDefault();
        updateStatus();
        close();
    });

    $configurator.click(function (e) {
        var $target = $(e.target);

        if (!$target.parents('.product-configurator__inner').size() && !$target.hasClass('product-configurator__inner')) {
            close();
        }
    });

    function open () {
        $(document).trigger(BODY_EVENTS.DISABLE_SCROLLING);

        $configurator.addClass('product-configurator--background');
        setTimeout(function () {
          $configurator.addClass('product-configurator--show')
        });
    }

    function close () {
        $(document).trigger(BODY_EVENTS.ENABLE_SCROLLING);

        $configurator.removeClass('product-configurator--show');
        setTimeout(function () {
            $configurator.removeClass('product-configurator--background');
        }, 500);
    }

    function updateStatus () {
        if (!$status.size()) {
            $status = $(`<div class="product-info__status"></div>`);
            $status.insertAfter($('.product-info__subtitle'));
        }

        var unchecked = [];
        $form.find('input:checkbox').each(function() {
            if (!this.checked) {
                // remove line breaks #TODO:730 translation
                unchecked.push($(this).parent('label').find('.image-checkbox__label').text().replace(/\r?\n|\r|\s/g, ''));
            }
        });

        $status.text(unchecked.length ? 'Ohne ' + unchecked.join(', ') : '');
    }
});
