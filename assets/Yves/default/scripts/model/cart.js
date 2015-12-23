'use strict';

var $ = require('jquery'),
    xhr = require('../utils/xhr');

var cart = null;

module.exports = {

  cart: cart,

  loadCart: function() {
    var that = this;
    return xhr.loadCart().done(function(data) {
      that.cart = data;
    });
  },

  addProduct: function(id, quantity) {
    quantity = quantity || 1;
    return xhr.addToCart(id, quantity);
  }

}