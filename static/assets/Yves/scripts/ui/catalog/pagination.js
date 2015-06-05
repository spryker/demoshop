'use strict';

var $ = require('jquery'),
    catalog = require('./index'),
    URLManager = require('./URLManager'),
    animationTime = 100;

var currentPage = URLManager.getParam('page') || 1,
    maxPage = $('.pagination-max-page').html();

var paginate = function(forward) {
  if (!forward && currentPage == 1) {
    return;
  }

  if (forward && currentPage == maxPage) {
    return;
  }

  var $current = $('.js-products-current'),
      $prev = $('.js-products-prev'),
      $next = $('.js-products-next');

  if (forward) {
    $current.removeClass('js-products-current').addClass('js-products-prev');

    currentPage++;

    if ($next.length > 0) {
      $($next[0]).removeClass('js-products-next');
      window.setTimeout(function() {
        $($next[0]).addClass('js-products-current');
      }, animationTime);
    } else {
      insertNext();
    }
  } else {
    $current.removeClass('js-products-current').addClass('js-products-next');

    currentPage--;

    if ($prev.length > 0) {
      $($prev[$prev.length - 1]).removeClass('js-products-prev');
      window.setTimeout(function() {
          $($prev[$prev.length - 1]).addClass('js-products-current');
      }, animationTime);
    } else {
      insertPrev();
    }
  }

  $('html, body').delay(500).animate({
    scrollTop: $current.offset().top - 143
  }, 300);

  updateURL();
};

var sort = function(field, order) {
    var $current = $('.js-products-current'),
        $prev = $('.js-products-prev'),
        $next = $('.js-products-next'),
        params = getParams();

    $prev.remove();
    $next.remove();

    params.sort = field;
    params.sort_order = order;

    catalog.loadProducts(URLManager.getPath(), URLManager.paramsToString(params), $current);

    URLManager.setParams(params);
};

var insertNext = function() {
  var $next = $(catalog.template),
      params = getParams();

  $next.addClass('js-products-current').appendTo('.js-products-holder');
  catalog.loadProducts(URLManager.getPath(), URLManager.paramsToString(params), $next);
};

var insertPrev = function() {
  var $prev = $(catalog.template),
      params = getParams();
  $prev.addClass('js-products-current').prependTo('.js-products-holder')
  catalog.loadProducts(URLManager.getPath(), URLManager.paramsToString(getParams()), $prev);
};

var updateURL = function() {
  URLManager.setParams(getParams());
};

var getParams = function() {
  var params = URLManager.getParams();
  params.page = currentPage.toString();
  return params;
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

    $('.sorting__button--inc.price').click(function(e) {
        sort('price', 'asc')
    });

    $('.sorting__button--dec.price').click(function(e) {
        sort('price', 'desc')
    });

    $('.sorting__button--inc.name').click(function(e) {
        sort('name', 'asc')
    });

    $('.sorting__button--dec.name').click(function(e) {
        sort('name', 'desc')
    });
  }

};
