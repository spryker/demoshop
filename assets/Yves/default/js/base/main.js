/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

'use strict';

// add your custom common js here
// and/or change the existing one

var $ = require('jquery');
var bootstrap = require('./libs/bootstrap');

$(function(){
    bootstrap([
        require('./components/aside'),
        require('./components/viewer'),
        require('./components/suggestions')
    ]);
});

