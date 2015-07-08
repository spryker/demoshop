'use strict';

var $ = require('jquery'),
    _ = require('underscore'),
    templateSrc = require('../../templates/catalog-product'),
    xhr = require('../../utils/xhr.js'),
    URLManager = require('./URLManager');

var template;

var setProducts = function(data, container) {
    var html = '';

    _.each(data.products, function(product) {
        html += template(product);
    });

    container.children().remove();
    container.html(html);
    container.removeClass('js-products-spinning');

    $('.summary__total-count .amount').html(data.numFound);
    $('.pagination-max-page').html(data.maxPage);

    // but this timeout is necessary, to allow animations to finish
    window.setTimeout(function() {
        container.removeClass('js-products-loading');
    }, 100);

};

var setTitle = function(title) {
    $('.catalog__section-title').text(title);
};

var loadProducts = function(path, queryString, $products, callback) {
    $products.addClass('js-products-loading js-products-spinning');

    xhr.getProducts(path, queryString).done(function(data) {
        if (typeof data.category !== 'undefined') {
            setTitle(data.category.name);
        }

        setProducts(data, $products);

        if (typeof callback === "function") {
            callback(data.facets);
        }
    });
};

module.exports = {

  init: function() {
    template = _.template(templateSrc);
  },

  loadProducts: loadProducts,

  template: '<section class="catalog__products"></section>'

};
