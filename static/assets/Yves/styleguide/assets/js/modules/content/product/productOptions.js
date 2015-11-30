import $ from 'jquery';
import throttle from 'lodash/function/throttle';
import { MessageService } from '../../common/messages';
import { getFormData } from '../../common/helpers';

import { EVENTS } from '../checkout/cartLayer';

'use strict';


$(document).ready(function () {

    // TODO: js-class

    $('.js-product-options').each(function () {

        var $options, $stickyLimiter, optionsOffset, $configurator, $submit, $weightSelect, $weight, $totalPrice, $relativePrice, productConfig, messageService;

        messageService = new MessageService();

        $options = $(this);

        $weightSelect = $options.find('.js-product-weight-select select');
        $weight = $options.find('.js-product-weight');
        $totalPrice = $options.find('.js-product-options__total');
        $relativePrice = $options.find('.js-product-options__relative');
        $configurator = $options.find('.js-product-configurator form');

        $options.submit(addProduct);

        // TODO: update pricings and configurator
        $weightSelect.change(updateProductConfig);

        productConfig = {};

        // TODO: window/document variables



        // TODO: separate components: sticky / productoptions
        $stickyLimiter = $($options.data('sticky-limit'));

        if ($stickyLimiter.size()) {
            updateOffset();
            $(window).scroll(updateStickyPosition);
            $(window).resize(throttle(updateOffset, 250));
        }




        function updateOffset () {
            $options.removeClass('product-options--sticky')
            $options.css('top', 0);

            setTimeout(function () {
                optionsOffset = $options.offset().top;
                updateStickyPosition();
            });
        }

        function updateProductConfig () {
            productConfig.weight = $(this).find('option:checked').text();
            productConfig.pricing = window.pricings[productConfig.weight];

            $totalPrice.text(productConfig.pricing.absolute);
            $relativePrice.text(productConfig.pricing.relative);
            $weight.text(productConfig.weight);
        }

        function addProduct (event) {
            event.preventDefault();

            var $form, sku, quantity, quantityString

            $form = $(this);
            sku = $options.data('sku');
            quantity = $options.find('[name=quantity]').val();

            var postData = getFormData($configurator);
            for (let i in Object.keys(postData)) {
                var key = Object.keys(postData)[i];

                // api expecs array
                if (typeof postData[key] === 'string') {
                    postData[key] = [postData[key]];
                }
            }

            $form.find('button').prop('disabled', true);

            $.post($options.attr('action'), {
                sku: sku,
                quantity: quantity,
                weight: productConfig.weight,
                ingredients: postData
            })
            .done(function (data) {
                quantityString = (quantity > 1) ? 'Produkte' : 'Produkt';
                messageService.add({ type: 'valid message--cart', message: `${quantity} ${quantityString} zum Warenkorb hinzugefügt.` });

                $(document).trigger(EVENTS.UPDATE_CART);
            })
            .error(function () {
                quantityString = (quantity > 1) ? 'Die Produkte konnten' : 'Das Produkt konnte';
                messageService.add({ type: 'invalid message--cart', message: `${quantityString} nicht zum Warenkorb hinzugefügt werden.` });
            })
            .always(function () {
                $form.find('button').prop('disabled', false);
            });
        };


        function updateStickyPosition () {
            var limit, scrollTop, padding;

            padding = 20;

            limit = $stickyLimiter.offset().top - (optionsOffset + $options.outerHeight() + padding);
            scrollTop = $(window).scrollTop();

            if (scrollTop <= limit) {
                if (!$options.hasClass('product-options--sticky')) {
                    $options.addClass('product-options--sticky')
                    $options.css('top', optionsOffset);
                }

            } else {
                if ($options.hasClass('product-options--sticky')) {
                    $options.removeClass('product-options--sticky')
                    $options.css('top', limit);
                }
            }
        }
    });

});