'use strict';

var $ = require('jquery'),
    _ = require('underscore'),
    templateSrc = require('../../templates/catalog-product'),
    xhr = require('../../utils/xhr.js'),
    URLManager = require('./URLManager');

var template;

module.exports = {

  init: function() {
    template = _.template(templateSrc);
  },

  loadProducts: function(reqString, $products) {
    $products.addClass('js-products-loading js-products-spinning');

    // this timeout is fake, to simulate slow loading time
    // so you'll need to remove it
    window.setTimeout(function() {
      xhr.getProducts(reqString).done(function(data) {
        var html = '';
        _.each(data.products, function(product) {
          html += template(product);
        });
        $products.children().remove();
        $products.html(html);
        $products.removeClass('js-products-spinning');

        // but this timeout is necessary, to allow animations to finish
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
