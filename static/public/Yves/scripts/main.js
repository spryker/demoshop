'use strict';

var $ = require('jquery'),
    spinner = require('./ui/spinner'),
    search = require('./ui/search'),
    cart = require('./ui/shopping-cart'),
    overlay = require('./ui/overlay'),
    loginForm = require('./ui/login-form'),
    filter = require('./ui/catalog/filters'),
    pagination = require('./ui/catalog/pagination'),
    homepage = require('./ui/homepage'),
    catalog = require('./ui/catalog'),
    checkout = require('./ui/checkout'),
    mainNav = require('./ui/main-nav'),
    slick = require('slick-carousel');

$(function() {

  if (window.innerWidth < 1000) {
    $('html').addClass('mobile');
  }

  mainNav.init();
  spinner.init();
  search.init();
  cart.init();
  catalog.init();
  overlay.init();
  loginForm.init();
  checkout.init();

  // TODO only call this on catalog page
  filter.init();
  pagination.init();

  // TODO only call this on homepage
  homepage.init();



  // TODO remove, probably
  // it's only for in-browser debugging
  window.$ = $;
});
