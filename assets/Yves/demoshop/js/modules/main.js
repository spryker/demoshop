/**
 * Demoshop theme main module
 */

'use strict';

require('jquery-ui');
require('slick-carousel');
require('../../sass/main.scss');

var spinner = require('../ui/spinner');
var search = require('../ui/search');
var cart = require('../ui/shopping-cart');
var overlay = require('../ui/overlay');
var loginForm = require('../ui/login-form');
var filter = require('../ui/catalog/filters');
var pagination = require('../ui/catalog/pagination');
var homepage = require('../ui/homepage');
var catalog = require('../ui/catalog');
var checkout = require('../ui/checkout');
var mainNav = require('../ui/main-nav');
var footer = require('../ui/footer');

var imagesRequire = require.context('../../img', true);
imagesRequire.keys().forEach(function(key) {
    imagesRequire(key);
});

$(function() {
    if (window.innerWidth < 1000) {
        $('html').addClass('mobile');
    }

    mainNav.init();
    spinner.init();
    footer.init();
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
});
