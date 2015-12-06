import $ from 'jquery';
import throttle from 'lodash/function/throttle';
import { MessageService } from '../../common/messages';
import { getFormData } from '../../common/helpers';

import { EVENTS } from '../checkout/cartLayer';

'use strict';


$(document).ready(function () {

    // TODO: js-class

    $('.js-product-options').each(function () {

        var $options, $configurator, $submit, $weightSelect, $weight, $totalPrice, $relativePrice, productConfig, messageService;

        messageService = new MessageService();

        $options = $(this);
        $weightSelect = $options.find('.js-product-weight-select select');
        $weight = $('.js-product-weight');
        $totalPrice = $('.js-product-price-total');
        $relativePrice = $('.js-product-options__relative');
        $configurator = $('.js-product-configurator form');

        // TODO: update pricings and configurator
        updateProductConfig();
        $weightSelect.change(updateProductConfig);

        $options.submit(addProduct);



        function updateProductConfig () {
            var weight, config;

            weight = $weightSelect.find('option:checked').text();
            config = window.productConfig.options[weight];

            $options.attr('data-sku', config.sku);
            $totalPrice.text(config.prices.total);
            $relativePrice.text(config.prices.relative);
            $weight.text(config.weight.value.replace('.',',') + config.weight.unit);

            updateConfigurator(config);
        }


        function updateConfigurator (config) {
            var content = ``;

            if (config.options.meat.length && window.productConfig.type !== 'simple') {
                content += `<h3 class="product-configurator__subheadline">${'Fleischsorten'}</h3>`;
                content += `<div class="product-configurator__composition">`;
                content += `<div class="product-configurator__composition-label">${'Wählen Sie Zutaten aus oder ab:'}</div>`;

                for (let option of config.options.meat) {
                    let label, sublabel;

                    label = window.translator.getTranslation('product-group.meat.' + option);
                    sublabel = window.translator.getTranslation('configurator.fixings.' + window.productConfig.pet + '.' + option);

                    content += `
                    <div class="image-checkbox">
                        <label class="image-checkbox__inner" for="meat_${option}" style="background: url(/images/product/meat_${option}.jpg);">
                            <input class="image-checkbox__checkbox" type="checkbox" id="meat_${option}" name="meat" value="${option}" checked>

                            <div class="image-checkbox__content">
                                <div class="image-checkbox__label">${label}</div>
                                <div class="image-checkbox__sublabel">${sublabel}</div>
                            </div>

                            <div class="image-checkbox__disabled" style="background: url(/images/product/meat_${option}_bw.jpg);"></div>
                        </label>
                    </div>`;
                }

                content += `</div>`;
            }

            if (config.options.carbs.length) {
                content += `<h3 class="product-configurator__subheadline">${'Kohlenhydrate'}</h3>`;
                content += `<div class="product-configurator__composition">`;
                content += `<div class="product-configurator__composition-label">${'Wählen Sie Zutaten aus oder ab:'}</div>`;

                for (let option of config.options.carbs) {

                    let label = window.translator.getTranslation('product-group.carbs.value.' + option);

                    content += `
                    <div class="image-checkbox">
                        <label class="image-checkbox__inner" for="carbs_${option}" style="background: url(/images/product/carbs_${option}.jpg);">
                            <input class="image-checkbox__checkbox" type="checkbox" id="carbs_${option}" name="carbs" value="${option}" checked>

                            <div class="image-checkbox__content">
                                <div class="image-checkbox__label">${label}</div>
                            </div>

                            <div class="image-checkbox__disabled" style="background: url(/images/product/carbs_${option}_bw.jpg);"></div>
                        </label>
                    </div>`;
                }

                content += `</div>`;
            }

            $configurator.find('.js-configurator-options').html(content);
        }




        function addProduct (event) {
            event.preventDefault();

            var $form, sku, quantity, quantityString

            $form = $(this);
            sku = $options.attr('data-sku');
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
                weight: $weightSelect.find('option:checked').text(),
                ingredients: postData
            })
            .done(function (data) {
                quantityString = (quantity > 1) ? 'Produkte' : 'Produkt';
                messageService.add({
                    type: 'valid message--cart',
                    message: `${quantity} ${quantityString} zum <a href="/checkout/">Warenkorb</a> hinzugefügt.`
                });

                $(document).trigger(EVENTS.UPDATE_CART);
            })
            .error(function () {
                quantityString = (quantity > 1) ? 'Die Produkte konnten' : 'Das Produkt konnte';
                messageService.add({
                    type: 'invalid message--cart',
                    message: `${quantityString} nicht zum Warenkorb hinzugefügt werden.`
                });
            })
            .always(function () {
                $form.find('button').prop('disabled', false);
            });
        };
    });

});