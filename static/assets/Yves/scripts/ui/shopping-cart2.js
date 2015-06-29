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
  var html = '';
  var $el = $('.js-cart-items');
  var $shipping = $('.js-cart-shipping');
  var $total = $('.js-cart-total');
  _.each(model.cart.items, function(item) {
    html += template(item);
  });
  $el.children().remove();
  $el.html(html);
  $shipping.html('€ '+model.cart.shipping);
  $total.html('€ '+model.cart.total);

  setItemCount();
  spinner.init();
}

var setItemCount = function() {
  var count = _.reduce(model.cart.items, function(total, item) {
    return total + parseInt(item.quantity);
  }, 0);
  $('.js-shopping-cart').addClass('js-cart-has-items').attr('data-item-count', count);
};

module.exports = {

  init: function() {
    $cart = $('.js-shopping-cart');
    template = _.template(templateSrc);

    model.loadCart()
      .done(function(data) {
        renderCart();
      });

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
