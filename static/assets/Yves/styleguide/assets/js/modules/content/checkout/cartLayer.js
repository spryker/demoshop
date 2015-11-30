import $ from 'jquery';
import { EVENTS as STEPPER_EVENTS } from '../../forms/stepper';

'use strict';


const ENDPOINTS = {
    CART: '/cart/overlay/'
};


const EVENTS = {
    UPDATE_CART: 'UPDATE_CART'
};


$(document).ready(function () {
    var $cartLayer = $('.cart-layer__inner');

    // #TODO:390 changes to cart items

    loadCart();

    $(document).on(EVENTS.UPDATE_CART, loadCart);

    $cartLayer
        .on('click', '.cart-item__delete', removeSku)
        .on('change', '[name="product_quantity"]', changeQty)


    function loadCart() {
        $.get(ENDPOINTS.CART)
            .done(function (data) {
                renderCart(data)
            })
            .always(function () {
                setItemCount();
            });
    };


    function renderCart(data) {
        $cartLayer.html(data);
        $(document).trigger(STEPPER_EVENTS.INITIALIZE_STEPPERS);
    };


    function setItemCount() {
        var $items, $trigger, itemCount;

        $items = $('.cart-layer .cart-item');
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


    function changeQty (e) {
        e.preventDefault();

        var $input = $(this);
        var $item = $input.parents('.cart-item');

        var sku = $item.data('sku');
        var groupKey = $item.data('group-key');
        var qty = parseInt($input.val(), 10);

        $.post('/cart/change/' + sku + '/' + groupKey + '/', {
            quantity: qty
        }).done(function (data) {
            renderCart(data);
        }).always(function () {
            setItemCount();
        });
    };

    function removeSku (e) {
        e.preventDefault();

        var $input = $(this);
        var $item = $input.parents('.cart-item');

        var sku = $item.data('sku');

        $.post('/cart/remove/' + sku + '/')
            .done(function (data) {
                renderCart(data);
            }).always(function () {
                setItemCount();
            });
    };
});

export { EVENTS };
