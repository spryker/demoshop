import $ from 'jquery';
import throttle from 'lodash/function/throttle';
import { EVENTS } from '../checkout/cartLayer';
import { getFormData } from '../../common/helpers';

'use strict';


$(document).ready(function () {

    // TODO: js-class

    $('.js-product-options').each(function () {

        var $options, $stickyLimiter, optionsOffset, $configurator, $submit, $weightSelect, $weight, $totalPrice, $relativePrice, productConfig;

        $options = $(this);

        $weightSelect = $options.find('.js-product-weight-select select');
        $weight = $options.find('.js-product-weight');
        $totalPrice = $options.find('.js-product-options__total');
        $relativePrice = $options.find('.js-product-options__relative');
        $configurator = $options.find('.js-product-configurator form');

        // TODO: submit
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
            $options.css('top', 'none');

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

            var $button, sku, quantity

            $button = $(this);
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

            $.post($options.attr('action'), {
                sku: sku,
                quantity: quantity,
                weight: productConfig.weight,
                ingredients: postData

            }).done(function (data) {
                $(document).trigger(EVENTS.UPDATE_CART);
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