'use strict';

var $ = require('jquery'),
    _ = require('underscore'),
    overlay = require('./overlay'),
    spinner = require('./spinner'),
    $cart,
    isExpanded = false;

var setItemCount = function() {
    var itemsCount = 0;
    $('#cart-overlay .cart__item-name').each(function () {
        itemsCount += parseInt($(this).parent().find('.cart-quantity').val());
    });
    if (itemsCount > 0 && !isExpanded) {
        $cart.addClass('js-cart-has-items').attr('data-item-count', itemsCount);
    } else {
        $cart.removeClass('js-cart-has-items');
    }
};

var showCart = function() {
    $cart.addClass('cart--expanded');
    $cart.removeClass('js-cart-has-items');
    overlay.show();
    isExpanded = true;
    setItemCount();
};

var hideCart = function() {
    $cart.removeClass('cart--expanded');
    setItemCount();
    overlay.hide();
    isExpanded = false;
    setItemCount();
};

var renderCart = function(data) {
    $('#cart-overlay').html(data);
};

var loadCart = function() {
    $.get('/cart/overlay')
        .done(function (data) {
            renderCart(data)
        })
        .always(function () {
            setItemCount();
        })
    ;
};

var addSku = function (e) {
    e.preventDefault();

    var sku = $(e.target).data('sku');
    var qty = $(e.target).parents('section').find('.spinner.product__quantity [name=quantity]').val();

    $.post('/cart/add/' + sku, { quantity: qty })
        .done(function (data) {
            renderCart(data);
            showCart();
        });
};

var removeSku = function (e) {
    e.preventDefault();

    var sku = $(e.target).parents('.cart-item').data('sku');

    $.post('/cart/remove/' + sku)
        .done(function (data) {
            renderCart(data);
        });
};

var increaseQty = function (e) {
    var sku = $(e.target).parents('.cart-item').data('sku');

    $.post('/cart/increase/' + sku)
        .done(function (data) {
            renderCart(data);
        });
};

var decreaseQty = function (e) {
    var sku = $(e.target).parents('.cart-item').data('sku');

    $.post('/cart/decrease/' + sku)
        .done(function (data) {
            renderCart(data);
        });
};

var changeQty = function (e, changeQty) {
    e.preventDefault();

    changeQty = typeof changeQty !== 'undefined' ? changeQty : 1;

    var sku = $(e.target).parents('.cart-item').data('sku');
    var qty = parseInt($(e.target).parents('.cart-item').find('.cart-quantity').val()) + changeQty;

    $.post('/cart/change/' + sku + '/' + qty)
        .done(function (data) {
            renderCart(data);
        });
};

module.exports = {
    init: function() {
        $cart = $('.js-shopping-cart');

        loadCart();

        $('.js-cart-toggle').on('click', function() {
            if (isExpanded) {
                hideCart();
            } else {
                showCart();
            }
        });

        $('.js-cart-close').on('click', hideCart);

        $('.product__add-button').on('click', addSku);

        $('#cart-overlay')
            .on('click', '.cart-remove', removeSku)
            .on('click', '.cart-increment', increaseQty)
            .on('click', '.cart-decrement', decreaseQty)
            .on('change', '.cart-quantity', changeQty)
        ;

        $('.overlay').on('click', hideCart);
    }
};
