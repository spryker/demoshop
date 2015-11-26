import $ from 'jquery';
import { EVENTS } from '../checkout/cartLayer';
import { getFormData } from '../../common/helpers';

'use strict';


$(document).ready(function () {

    // TODO: js-class
    $('.product-options').each(function () {

        var $options, $stickyLimiter, optionsOffset, $configurator, $submit, $weightSelect, $weight, $totalPrice, $relativePrice, productConfig;

        $options = $(this);
        $stickyLimiter = $('.product-accordion');
        updateOffset();

        $submit = $('.product-options__button');
        $weightSelect = $('.product-options__select select');
        $weight = $('.product-info__subtitle, .product-options__weight');
        $totalPrice = $('.product-options__total');
        $relativePrice = $('.product-options__relative');
        $configurator = $('.product-configurator form');

        // TODO: submit
        $submit.click(addProduct);
        $weightSelect.change(updateProductConfig);

        productConfig = {};

        // TODO: window/document variables
        $(window).scroll(updateStickyPosition);


        // TODO: debounce
        $(window).resize(updateOffset);


        function updateOffset () {
            $options.removeClass('js-sticky')
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

            var $button, $form, sku, quantity

            $button = $(this);
            $form = $button.parents('form');
            sku = $button.data('sku');
            quantity = $form.find('[name=quantity]').val();

            var postData = getFormData($configurator);
            for (let i in Object.keys(postData)) {
                var key = Object.keys(postData)[i];

                // api expecs array
                if (typeof postData[key] === 'string') {
                    postData[key] = [postData[key]];
                }
            }

            $.post($form.attr('action'), {
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
                if (!$options.hasClass('js-sticky')) {
                    $options.addClass('js-sticky')
                    $options.css('top', optionsOffset);
                }

            } else {
                if ($options.hasClass('js-sticky')) {
                    $options.removeClass('js-sticky')
                    $options.css('top', limit);
                }
            }
        }
    });

});