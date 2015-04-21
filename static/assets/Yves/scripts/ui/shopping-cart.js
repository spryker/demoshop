'use strict';

var $ = require('jquery'),
    overlay = require('./overlay'),
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

module.exports = {

  init: function() {
    $cart = $('.js-shopping-cart');
    $('.js-cart-toggle').on('click', function() {
      if (isExpanded) {
        hideCart();
      } else {
        showCart();
      }
    });
    $('.js-cart-close').on('click', hideCart);
  }
};
