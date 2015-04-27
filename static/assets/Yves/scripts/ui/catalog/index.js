'use strict';

var $ = require('jquery'),
    URLManager = require('./URLManager');

module.exports = {

  loadProducts: function(url, $products) {
    $products.addClass('js-products-loading js-products-spinning');
    window.setTimeout(function() {
      $.ajax({
        url: url
      }).done(function(data) {
        $products.children().remove();
        $(data).appendTo($products);
        $products.removeClass('js-products-spinning');
        window.setTimeout(function() {
          $products.removeClass('js-products-loading');
        }, 100);
      });
    }, 5000);
  },

  template: '<ul class="catalog__products">'+
    '  <li class="catalog__product"></li>'+
    '  <li class="catalog__product"></li>'+
    '  <li class="catalog__product"></li>'+
    '  <li class="catalog__product"></li>'+
    '  <li class="catalog__product"></li>'+
    '  <li class="catalog__product"></li>'+
    '  <li class="catalog__product"></li>'+
    '  <li class="catalog__product"></li>'+
    '  <li class="catalog__product"></li>'+
    '</ul>'

};
