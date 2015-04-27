'use strict';

var $ = require('jquery'),
    spinner = require('./ui/spinner'),
    search = require('./ui/search'),
    cart = require('./ui/shopping-cart'),
    overlay = require('./ui/overlay'),
    loginForm = require('./ui/login-form'),
    filter = require('./ui/catalog/filters'),
    pagination = require('./ui/catalog/pagination');

$(function() {

  if (window.innerWidth < 1000) {
    $('html').addClass('mobile');
  }

  spinner.init();
  search.init();
  cart.init();
  overlay.init();
  loginForm.init();

  // TODO only call this on catalog page
  filter.init();
  pagination.init();

  // TODO remove, probably
  window.$ = $;
});
