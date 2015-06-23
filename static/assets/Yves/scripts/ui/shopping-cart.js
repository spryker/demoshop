'use strict';

var $ = require('jquery'),
    _ = require('underscore'),
    model = require('../model/cart'),
    overlay = require('./overlay'),
    spinner = require('./spinner'),
    templateSrc = require('../templates/cart-item'),
    template,
    $cart,
    isExpanded = false;

var showCart = function() {
  $cart.addClass('cart--expanded');
  overlay.show();
  isExpanded = true;
};

var hideCart = function() {
  $cart.removeClass('cart--expanded');
  overlay.hide();
  isExpanded = false;
};

var renderCart = function() {
  //@todo add waiting gfx
  $.get('/cart/overlay')
      .done(function (data) {
        $('#cart-overlay').html(data);
      })
      .always(function () {
        setItemCount();
        //@todo remove waiting gfx
      })
  ;
}

var setItemCount = function() {
  var itemsCount = $('.cart__item-name').length;
  if (itemsCount > 0) {
    $('.js-shopping-cart').addClass('js-cart-has-items').attr('data-item-count', itemsCount);
  } else {
    $('.js-shopping-cart').removeClass('js-cart-has-items');
  }
};

module.exports = {
  init: function() {
    $cart = $('.js-shopping-cart');

    renderCart();

    $('.js-cart-toggle').on('click', function() {
        if (isExpanded) {
            hideCart();
        } else {
            showCart();
        }
    });

    $('.js-cart-close').on('click', hideCart);

    $('.product__add-button').click(function () {
        $.post('/cart/add/' + $('[value=sku]').val(), {
            quantity: $('[name=quantity]').val()
        }, function (data) {
            console.log(data);
        }); return false;
    });
  }
};
