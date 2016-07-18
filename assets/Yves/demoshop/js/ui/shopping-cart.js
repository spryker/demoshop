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
    // TODO we need a general solution for choosing a right locale in JS
    var url = window.location.pathname;
    var locale = url.substring(1, 3);
    var localizedUrl = '/cart/overlay';

    if (locale === 'en' | locale === 'de') {
        localizedUrl = '/'+ locale + localizedUrl;
    }

    $.get(localizedUrl)
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

    var optionValueIds = getSelectedProductOptionValueIds();

    $.post('/cart/add/' + sku, { quantity: qty, optionValueIds: optionValueIds })
        .done(function (data) {
            renderCart(data);
            showCart();
        });
};

var getSelectedProductOptionValueIds = function() {
    var optionValueIds = [];
    var index = 0;
    $('#product-options input:checked').each(function(i, el) {
        optionValueIds[index++] = $(el).val();
    });

    return optionValueIds;
};

var changeQty = function (e, changeQty) {
    e.preventDefault();

    var sku = $(e.target).parents('.cart-item').data('sku');
    var qty = parseInt($(e.target).parents('.cart-item').find('.cart-quantity').val());

    $.post('/cart/change/' + sku + '/' + qty)
        .done(function (data) {
            renderCart(data);
        });
};

var removeSku = function (e) {
    e.preventDefault();

    var sku = $(e.target).parents('.cart-item').data('sku');
    var groupKey = $(e.target).parents('.cart-item').data('group-key');

    $.post('/cart/remove/' + sku + '/' + groupKey)
        .done(function (data) {
            renderCart(data);
        });
};

var increaseQty = function (e) {
    var sku = $(e.target).parents('.cart-item').data('sku');
    var groupKey = $(e.target).parents('.cart-item').data('group-key');

    $.post('/cart/increase/' + sku + '/' + groupKey)
        .done(function (data) {
            renderCart(data);
        });
};

var decreaseQty = function (e) {
    var sku = $(e.target).parents('.cart-item').data('sku');
    var groupKey = $(e.target).parents('.cart-item').data('group-key');

    $.post('/cart/decrease/' + sku + '/' + groupKey)
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

        $('.overlay').on('click', hideCart).children().click(function (e) {
            return false;
        });
    }
};
