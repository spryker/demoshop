'use strict';

var $ = require('jquery'),
    catalog = require('./index'),
    URLManager = require('./URLManager'),
    animationTime = 500;

var currentPage = URLManager.getParam('page') || 1;

var paginate = function(forward) {
  if (!forward && currentPage === 1) {
    return;
  }
  var $current = $('.js-products-current');
  var $prev = $('.js-products-prev');
  var $next = $('.js-products-next');

  if (forward) {
    $prev.remove();
    $current.removeClass('js-products-current').addClass('js-products-prev');
    $next.removeClass('js-products-next')
    window.setTimeout(function() {
      $next.addClass('js-products-current');
    }, animationTime);
    insertNext();
    currentPage++;
  } else {
    $next.remove();
    $current.removeClass('js-products-current').addClass('js-products-next');
    $prev.removeClass('js-products-prev');
    window.setTimeout(function() {
      $prev.addClass('js-products-current');
    }, animationTime);
    insertPrev();
    currentPage--;
  }

  $('html, body').delay(500).animate({
    scrollTop: $current.offset().top - 143
  }, 300);

  updateURL();
};

var insertNext = function() {
  var $next = $(catalog.template);
  $next.addClass('js-products-next').appendTo('.js-products-holder');
  catalog.loadProducts('/catalog-mock.html', $next);
};

var insertPrev = function() {
  var $prev = $(catalog.template);
  $prev.addClass('js-products-prev').prependTo('.js-products-holder');
  catalog.loadProducts('/catalog-mock.html', $prev);
};

var loadProducts = function(url, $products) {
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
      }, 200);
    });
  }, 5000);
};

var updateURL = function() {
  var params = URLManager.getParams();
  params.page = currentPage.toString();
  URLManager.setParams(params);
};

module.exports = {
  init: function() {
    $('.js-pagination-prev').click(function(e) {
      $(e.target).attr('disabled', true);
      paginate(false);
      window.setTimeout(function() { $(e.target).attr('disabled', false); }, animationTime)
    });

    $('.js-pagination-next').click(function(e) {
      $(e.target).attr('disabled', true);
      paginate(true);
      window.setTimeout(function() { $(e.target).attr('disabled', false); }, animationTime)
    });
  }

};