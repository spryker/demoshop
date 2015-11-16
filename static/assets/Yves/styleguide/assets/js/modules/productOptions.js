import $ from 'jquery';
import { EVENTS } from './cartLayer';

'use strict';


$(document).ready(function () {


    $('.product__add-button').on('click', addSku);


    function addSku (event) {
        event.preventDefault();

        var $button, $form, sku, quantity

        $button = $(this);
        $form = $button.parents('form');
        sku = $button.data('sku');
        quantity = $form.find('[name=quantity]').val();

        $.post($form.attr('action') + sku, { quantity: quantity })
            .done(function (data) {
                $(document).trigger(EVENTS.UPDATE_CART);
            });
    };

});