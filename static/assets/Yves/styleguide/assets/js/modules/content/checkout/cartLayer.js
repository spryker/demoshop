import $ from 'jquery';
import { EVENTS as STEPPER_EVENTS } from '../../forms/stepper';
import { MessageService } from '../../common/messages';
import { EVENTS as CHECKOUT_EVENTS } from './checkout';

'use strict';


const ENDPOINTS = {
    CART: '/cart/overlay/'
};


const EVENTS = {
    UPDATE_CART: 'CARTLAYER_UPDATE_CART'
};


$(document).ready(function () {
    var $cartLayer = $('.cart-layer__inner');

    // #TODO:390 changes to cart items

    loadCart();

    $(document).on(EVENTS.UPDATE_CART, loadCart);

    $(document)
        .on('click', '.cart-item__delete', removeSku)
        .on('change', '[name="product_quantity"]', changeQty);


    function loadCart() {

        $.get(ENDPOINTS.CART)
        .done(function (data) {
            renderCart(data);
            setItemCount(data);
        });
    };

    $(document).on('click', '.cart-layer__amount .button--cta', function () {
        verifyMinimumCartValue();
    });

    function renderCart (data) {
        $cartLayer.html(data);
        $(document).trigger(CHECKOUT_EVENTS.UPDATE_CART, data);
        $(document).trigger(STEPPER_EVENTS.INITIALIZE_STEPPERS);
    };


    function setItemCount (data) {
        var $items, $trigger, itemCount;

        $items = $(data).find('.cart-item');
        $trigger = $('.navbar__link--cart');


        itemCount = 0;

        $items.each(function () {
            var $item = $(this);

            itemCount += parseInt($item.find('[name="product_quantity"]').val(), 10);
        });


        if (itemCount > 0) {
            $trigger.addClass('navbar__link--bubble').find('a').attr('data-count', itemCount);
        } else {
            $trigger.removeClass('navbar__link--bubble');
        }
    };

    function verifyMinimumCartValue() {

        var messageService = new MessageService();
        var minimumValue = parseInt($('#minimumCartValue').val(), 10);
        var totalCart = parseInt($('#totalCartForMinimumValueCheck').val(), 10);

        if(minimumValue > totalCart) {
            messageService.add({
                type: 'invalid message--cart',
                message: 'error.cart-total-is-too-low'
            });
        } else {
            window.location = '/checkout/';
        }
    }

    function changeQty (e) {
        e.preventDefault();

        var $input, $item, sku, groupKey, qty;

        $input = $(this);
        $item = $input.parents('.cart-item');

        sku = $item.data('sku');
        groupKey = $item.data('group-key');
        qty = parseInt($input.val(), 10);

        $.post('/cart/change/' + sku + '/' + groupKey + '/', {
            quantity: qty
        }).done(function (data) {
            renderCart(data);
            setItemCount(data);
        });

        $(document).trigger(CHECKOUT_EVENTS.CART_WILL_UPDATE);
    };

    function removeSku (e) {
        e.preventDefault();

        var $input, $item, sku, groupKey;

        $input = $(this);
        $item = $input.parents('.cart-item');

        sku = $item.data('sku');
        groupKey = $item.data('group-key');

        $.post('/cart/remove/' + sku + '/' + groupKey + '/')
        .done(function (data) {
            renderCart(data);
        }).always(function () {
            setItemCount();
        });

        $(document).trigger(CHECKOUT_EVENTS.CART_WILL_UPDATE);

    };
});

export { EVENTS };
