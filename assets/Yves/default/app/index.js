/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

// add your custom common js here
// and/or change the existing one

var run = require('../lib/run');

function setJsEnabledMode() {
    $('html')
        .removeClass('no-js')
        .addClass('js');
}

$(function(){
    setJsEnabledMode();

    run([
        require('./components/aside'),
        require('./components/viewer'),
        require('./components/suggestions'),
        require('./components/carousel'),
        require('./components/add-to-wishlist'),
        require('./components/product-group'),
        require('./components/cart-item')
    ]);
});
