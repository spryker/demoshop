import $ from 'jquery';
import { EVENTS as STEPPER_EVENTS } from '../../forms/stepper';
import { MessageService } from '../../common/messages';
import { EVENTS as CHECKOUT_EVENTS } from './checkout';

'use strict';


const ENDPOINTS = {
    CART: '/cart/overlay/'
};


const EVENTS = {
    UPDATE_CART: 'CARTLAYER_UPDATE_CART',
    UPDATED_CARTLAYER: 'CARTLAYER_UPDATED_CARTLAYER'
};


$(document).ready(function () {
    var $cartLayer, firstRender;

    $cartLayer = $('.cart-layer__inner');
    firstRender = true;


    loadCart();
    $(document).on(EVENTS.UPDATE_CART, loadCart);


    $(document).on('click', '.cart-item__delete-icon', removeSku);
    $(document).on('change', '[name="product_quantity"]', changeQty);


    function loadCart() {

        $.get(ENDPOINTS.CART)
        .done(function (data) {
            renderCart(data);
            setItemCount(data);
        });
    }

    $(document).on('click', '.cart-layer .button--cta', function (event) {

        if (!verifyMinimumCartValue()) {
            event.preventDefault();

            var messageService = new MessageService();
            messageService.add({
                type: 'invalid message--cart',
                message: 'error.cart-total-is-too-low'
            });
        }
    });

    function renderCart (data) {
        $cartLayer.html(data);

        $(document).trigger(EVENTS.UPDATED_CARTLAYER);
        $(document).trigger(CHECKOUT_EVENTS.UPDATE_CART, data);
        $(document).trigger(STEPPER_EVENTS.INITIALIZE_STEPPERS);

        enableCartLink();
    }


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
    }

    function verifyMinimumCartValue() {

        var minimumValue, totalCart, valid;

        minimumValue = parseInt($('#minimumCartValue').val(), 10);
        totalCart = parseInt($('#totalCartForMinimumValueCheck').val(), 10);

        valid = minimumValue <= totalCart;

        return valid;
    }

    function changeQty (e) {
        e.preventDefault();

        var $input, $item, sku, groupKey, qty;

        $input = $(this);
        $item = $input.parents('.cart-item');

        sku = $item.data('sku');
        groupKey = $item.data('group-key');
        qty = parseInt($input.val(), 10);

        disableCartLink();

        $.post('/cart/change/' + sku + '/' + groupKey + '/', {
            quantity: qty
        }).done(function (data) {
            renderCart(data);
            setItemCount(data);
        });

        $(document).trigger(CHECKOUT_EVENTS.CART_WILL_UPDATE);
    }

    function removeSku (e) {
        e.preventDefault();

        var $input, $item, sku, groupKey;

        $input = $(this);
        $item = $input.parents('.cart-item');

        sku = $item.data('sku');
        groupKey = $item.data('group-key');

        disableCartLink();

        $.post('/cart/remove/' + sku + '/' + groupKey + '/')
        .done(function (data) {
            renderCart(data);
            setItemCount(data);
        });

        $(document).trigger(CHECKOUT_EVENTS.CART_WILL_UPDATE);

    }


    function disableCartLink () {
        $cartLayer.find('.button--cta').addClass('button--disabled');
    }

    function enableCartLink () {
        $cartLayer.find('.button--cta').removeClass('button--disabled');
    }

});

export { EVENTS };
