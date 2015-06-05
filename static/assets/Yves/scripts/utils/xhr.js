'use strict';

var $ = require('jquery');

var urls = {
  loadCart: '/mocks/load-cart.json',
  addToCart: '/mocks/add-to-cart.json',
  catalog: '/meere'
};

module.exports = {

  loadCart: function() {
    return $.get(urls.loadCart);
  },

  addToCart: function(id, quantity) {
    return $.get(urls.addToCart);
  },

  getProducts: function(path, queryString) {
    return $.get(path +'?'+ queryString);
  }

}
